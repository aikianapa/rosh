<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/engine/drivers/json/init.php';
use Nahid\JsonQ\Jsonq;

class phoneAuthClass extends cmsFormsClass
{
    public $driver;
    public $phone;
    public $ip;

    const FORM_NAME = 'phoneAuth';
    const SMS_PASSWORD_DELAY = 30;
    const SMS_TRANSFER = true;

    public function __construct($app)
    {
        parent::__construct($app);
        $this->driver = new JsonDrv($this->app);

        if(!$this->driver->tableExist(self::FORM_NAME)){
            $this->driver->tableCreate(self::FORM_NAME);
        }

        $app->vars->set("_sess.user", null);
        $app->vars->set("_env.user", null);
        setcookie("user", "", time()-3600, "/");
    }

    public function save($data)
    {
        return $this->driver->itemSave(self::FORM_NAME, $data);
    }

    private function get_ip()
    {
        return $_SERVER['REMOTE_ADDR'];
    }

    private function new_entry()
    {
        $password = str_pad(rand(1, 100000), 6, '0', STR_PAD_LEFT);
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $auth = $this->save([
            'phone' => $this->phone,
            'ip' => $this->ip,
            'password' => $password_hash,
            'time_elapsed' => time() + self::SMS_PASSWORD_DELAY
        ]);

        $this->send_password($password);

        return [
            'status' => 'ok',
            'messages' => '',
            //'password' => $password
        ];
    }

    private function allow_request(){
        $list = $this->driver->itemList(self::FORM_NAME, ['filter' => ['ip' => $this->ip]]);

        //Человек уже запрашивал код со своего ip
        if($list['count'] > 0){

            $entry = array_shift($list['list']);

            if(time() >= $entry['time_elapsed']){
                return true;
            }else{
                //... 30 секунд еще не прошли
                return false;
            }

        }else{
            return true;
        }
    }

    public function getAuth(){

        //Проверяем не было ли запроса с текущего ip
        if($this->allow_request()){
            //Проверяем наличие логина в БД
            $list = $this->driver->itemList(self::FORM_NAME, ['filter' => ['phone' => $this->phone]]);

            if($list['count'] > 0){
                $item = array_shift($list['list']);
                $this->driver->itemRemove(self::FORM_NAME, $item['id']);
            }

            $res = $this->new_entry();

        }else{
            $res = [
                'status' => 'error',
                'message' => 'Вы можете получить смс код раз в ' . self::SMS_PASSWORD_DELAY . ' секунд'
            ];
        }


        header("Content-type: application/json");
        return(json_encode($res));
    }

    public function send_password($password)
    {
        if(self::SMS_TRANSFER == true){
            $ch = curl_init("https://sms.targetsms.ru/sendsms.php?user=ROSH&pwd=smsrosh12&name_delivery=auth&sadr=ROSH&dadr={$this->phone}&text=Ваш смс код: {$password}");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_exec($ch);
            curl_close($ch);
        }
    }

    public function get_code()
    {
        $this->phone = $_POST['phone'];
        $this->ip = $this->get_ip();

        //Удаляем записи с просроченными time_elapsed
        $list = $this->driver->itemList(self::FORM_NAME);
        foreach($list['list'] as $id => $item){
            if(time() > $item['time_elapsed']){
                $this->driver->itemRemove(self::FORM_NAME, $item['id']);
            }
        }

        header("Content-type: application/json");
        return (json_encode($this->getAuth()));
    }

    public function check_code()
    {
        $this->phone = $_POST['phone'];
        $code = $_POST['code'];

        $list = $this->driver->itemList(self::FORM_NAME, ['filter' => ['phone' => $this->phone]]);
        if($list['count'] > 0){
            foreach($list['list'] as $id => $item){
                if($item['phone'] == $this->phone){
                    if((password_verify($code, $item['password'])) && (time() <= $item['time_elapsed'])){
                        header("Content-type: application/json");
                        return (json_encode([
                            'status' => 'ok',
                            'message' => 'Пароль принят. Перенаправление в личный кабинет.'
                        ]));
                    }
                }
                break;
            }
        }

        $res = [
            'status' => 'error',
            'message' => 'Одноразовый пароль введен неверно или время его жизни истекло.'
        ];

        header("Content-type: application/json");
        return (json_encode($res));
    }

    public function createUser(){

        //Нормализуем номер телефона
        $phone = preg_replace('/\D/', '', $_POST['phone']);
        $app = $this->app;

        //Смотрим есть ли соответствующий пользователь в БД
        $users = $this->driver->itemList('users', ['filter' => ['phone' => $phone]]);

        if($users['count'] == 0){
            //Регистрируем нового пользователя

            $this->driver->itemSave('users', [
                'phone' => $phone,
                'password' => md5($_POST['password']),
                'role' => 'client',
                'active' => 'on'
            ]);

            //Авторизуем его
            //unset($_SESSION['user']);
            $user = $app->checkUser($phone, 'phone', $_POST['password']);

        }else{

            foreach($users['list'] as $id => $user)
            {
                $user = $app->arrayToObj($user);
                break;
            }
        }

        $app->login($user);
        $res = ['status' => 'ok', 'user' => $user];

        header("Content-type: application/json");
        return (json_encode($res));

    }


}

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/engine/drivers/json/init.php';
use Nahid\JsonQ\Jsonq;

class emailAuthClass extends cmsFormsClass
{
    public $driver;
    public $app;
    const EMAIL = 'mail@idees.ru';

    public function __construct($app)
    {
        parent::__construct($app);
        $this->driver = &$app;
        //$this->driver = new JsonDrv($this->app);

        $app->vars->set("_sess.user", null);
        $app->vars->set("_env.user", null);
        setcookie("user", "", time()-3600, "/");
    }

    public function get_reg_message($email, $password){
$message = <<<MESSAGE
Вы успешно зарегистрированы на сайте ROSH.

Ваши данные для входа:

Логин: $email
Пароль: $password
MESSAGE;

    return $message;

    }

    public function get_recover_message($password){
$message = <<<MESSAGE
Ваш пароль на сайте ROSH изменен.

Новый пароль: $password
MESSAGE;

    return $message;

    }

    public function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $app = $this->app;

        $user = $app->checkUser($email, 'email', $password);

        if($user !== false){
            $app->login($user);
            $res = ['status' => 'ok', 'message' => 'Авторизация пройдена. Перенаправление в личный кабинет', 'user' => $user];
        }else{
            $res = ['status' => 'error', 'message' => 'Ошибка авторизации'];
        }

        header("Content-type: application/json");
        return (json_encode($res));
    }

    public function register()
    {
        $email = $_POST['email'];
        $app = $this->app;


        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $users = $this->driver->itemList('users', ['filter' => ['email' => $email]]);
            if($users['count'] == 0){
                $password = $app->passwordGenerate();

                //Регистрируем нового пользователя
                $this->driver->itemSave('users', [
                    'email' => $email,
                    'password' => md5($password),
                    'role' => 'client',
                    'active' => 'on'
                ]);

                //Авторизуем его
                $user = $app->checkUser($email, 'email', $password);
                $app->login($user);

                //Отправляем пароль
                wbMail(self::EMAIL, $email, 'Ваш пароль от аккаунта', $this->get_reg_message($email, $password));
                $res = ['status' => 'ok', 'message' => 'Вы успешно зарегистрированы. Пароль от аккаунта отправлен на ваш email. Перенаправление в личный кабинет.', 'user' => $user];


            }else{
                $res = ['status' => 'busy', 'message' => 'Email занят'];
            }
        }else{
            $res = ['status' => 'error', 'message' => 'Указан некорректный email'];
        }



        header("Content-type: application/json");
        return (json_encode($res));
    }

    public function recover()
    {
        $email = $_POST['email'];
        $app = $this->app;
        $res = ['status' => 'error', 'message' => 'Указан некорректный email'];
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $users = $this->driver->itemList('users', ['filter' => ['email' => $email]]);

            if($users['count'] == 0){
                $res = ['error' => 'error', 'message' => 'Пользователь не найден'];
            }else{
                $user = array_shift($users['list']);
                $password = $app->passwordGenerate();
                $user['password'] = md5($password);

                $this->driver->itemSave('users', $user);

                //Отправляем пароль
                if (wbMail(self::EMAIL, $email, 'Ваш пароль от аккаунта', $this->get_recover_message($password))) {
                    $res = ['status' => 'ok', 'message' => 'Новый пароль отправлен на ваш email'];
                }
            }
        }
        header("Content-type: application/json");
        return (json_encode($res));
    }
}

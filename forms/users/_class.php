<?php
use Nahid\JsonQ\Jsonq;

class usersClass extends cmsFormsClass
{
    public function profile()
    {
        $out = $this->app->getForm('users', 'profile');
        $out->find('[name=phone]')->attr('disabled', true);
        $out->fetch();
        $out->find('[name=phone]')->removeAttr('name');
        echo $out;
    }

    public function beforeItemShow(&$item)
    {
        $item['phone'] = $this->app->phoneFormat($item['phone']);
        $item['birthdate'] = date('d.m.Y',strtotime($item['birthdate']));
        return $item;
    }

    public function afterItemRead(&$item)
    {
        isset($item['phone']) ? null : $item['phone'] = '';
        $item['phone'] = preg_replace('/[^0-9]/', '', $item['phone']);
        $item['fullname'] = trim($item['first_name'].' '.$item['middle_name'].' '.$item['last_name']);
        if ($item['role'] == 'expert') {
            $list = wbItemList('experts',["filter"=>[
                "active"=>"on",
                "login"=>$item['id']
            ]]);
            if ($list['count'] > 0) {
                $item['expert'] = array_pop($list['list']);
            }
        }


        return $item;
    }

    public function beforeItemSave(&$item)
    {
        isset($item['phone']) ? null : $item['phone'] = wbDigitsOnly($item['phone']);
        if (!isset($item['middle_name'])) $item['middle_name'] = '';
        if (!$this->app->vars('_route._post.fullname') && $this->app->vars('_route._post.first_name') > '' ) {
            $item['fullname'] = trim($item['first_name'].' '.$item['middle_name'].' '.$item['last_name']);
        }
        $this->changePassword($item);
        foreach($item as $key => $val) {
            if (strpos(' '.$key,'date')) $item[$key] = date('Y-m-d H:i:s',strtotime($item[$key]));
            if (substr($key,0,4) == 'pwd_') unset($item[$key]);
        }
        return $item;
    }

    function changePassword(&$item=null) {
        if ($item == null OR !isset($item['pwd_current']) OR $item['pwd_current'] == '') return;
        if ($this->app->vars('_sess.user.id') !== $item['id']) return;
        if (wbPasswordCheck($item['pwd_current'], $item['password'])) {
            if ($item['pwd_new'] !== $item['pwd_check']) {
                header('Content-type: application/json; charset=utf-8');
                echo '{"error":true,"msg":"Новый пароль и повторный пароль не совпадают!"}';
                exit;
            } else {
                $item['password'] = wbPasswordMake($item['pwd_new']);
            }
        } else {
            header('Content-type: application/json; charset=utf-8');
            echo '{"error":true,"msg":"Неверный текущий пароль!"}';
            exit;
        }
    }

    function getClient() {
        if (!wbApiKey()) return;
        $item = wbItemRead('users',$this->app->route->item);
        $this->beforeItemShow($item);
        if ($item['active'] == 'on' && $item['role'] == 'client') {
            unset($item['password']);
            header('Content-type: application/json; charset=utf-8');
            return json_encode($item,JSON_UNESCAPED_UNICODE);
        }
    }

    function setClient() {
        if (!wbApiKey()) return;
        if ($this->app->vars('_route.item') > '') {
            $post = $this->app->vars('_post');
            $post['id'] = $this->app->vars('_route.item');
            $item = wbItemSave('users',$post,true);
            if ($item) {
                $this->beforeItemShow($item);
                header('Content-type: application/json; charset=utf-8');
                return json_encode($item,JSON_UNESCAPED_UNICODE);
            }
        }
    }

    function createClient($data = null) {
        if ($data == null) return; // чтобы не вызывалась через api
        $data['role'] = 'client';
        $data['active'] = 'on';
        return wbItemSave('users',$data,true);
    }

    function checkClient($phone = null) {
        if ($phone == null) return; // чтобы не вызывалась через api
        $result = ['error'=>true,'msg'=>'','code'=>'','data'=>[]];
        $phonenum = wbDigitsOnly($phone);
        $client = wbItemList('users',['filter'=>['phone' => $phonenum]]);
        if ($client['count'] > 0) {
            // если есть записи с указанным телефоном, то проверяем их активность
            $list = $this->app->json($client['list']);
            $list = $list->where('active','on')->get();
            if (count($list)) {
                $list = $this->app->json($list);
                $list = $list->where('role','neq','client')->get();
                if (count($list)) {
                    $result['msg'] = "Пользователь с номером телефона {$phone} существует, но не является клиентом.";
                    $result['code'] = 'noclient';
                } else {
                    $result['error'] = false;
                    $result['msg'] = "Клиент с номером телефона {$phone} найден.";
                    $result['code'] = 'success';
                    $result['data'] = array_pop($list);
                }
            } else {
                $result['msg'] = "Пользователь с номером телефона {$phone} существует, но учётная запись отключена.";
                $result['code'] = 'inactive';
            }
        } else {
            $result['msg'] = "Пользователь с номером телефона {$phone} не найден.";
            $result['code'] = 'empty';
        }
        return $result;
    }
}

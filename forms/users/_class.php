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
    }

    public function afterItemRead(&$item)
    {
        isset($item['phone']) ? null : $item['phone'] = '';
        $item['phone'] = preg_replace('/[^0-9]/', '', $item['phone']);
        return $item;
    }

    public function beforeItemSave(&$item)
    {
        isset($item['phone']) ? null : $item['phone'] = $this->app->phoneFormat($item['phone']);
        if (!isset($item['middle_name'])) $item['middle_name'] = '';
        if (!$this->app->vars('_route._post.fullname')) {
            $item['fullname'] = trim($item['first_name'].' '.$item['middle_name'].' '.$item['last_name']);
        }
        $this->changePassword($item);
        foreach($item as $key => $val) {
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
}

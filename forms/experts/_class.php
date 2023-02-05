<?php
class expertsClass extends cmsFormsClass
{
    function afterItemRead(&$item) {
        $item['header'] = $item['name'];
    }

    function beforeItemSave(&$item) {
        $url = '/about/experts/'.wbFurlGenerate($item['name']);
        if (!yongerCheckUrl($url,'experts',$item['id'])) {
            header("Content-type:application/json");
            echo json_encode(['error'=>true,'msg'=>'Такое имя уже существует! Пожалуйста, измените.']);
            exit;
        }
        if (isset($item['_removed'])) return;
        $user = ($item['login']>'') ? $this->app->itemRead('users', $item['login']) : false;
        if (!$user) {
            $user['id'] = $this->app->newId();
            $user['avatar'] = $item['image'];
            $user['role'] = 'expert';
            $user['email'] = $item['email'];
            $user['password'] = wbPasswordMake($item['password']);
            $user['_form'] = 'users';
            unset($item['email']);
            unset($item['password']);
        } 
        $user['fullname'] = $item['name'];
        $tmp = explode(' ',trim($item['name']));
        if (count($tmp) == 3) {
            $user['first_name'] = $tmp[1];
            $user['last_name'] = $tmp[0];
            $user['middle_name'] = $tmp[2];
        } else if (count($tmp) == 2) {
            $user['first_name'] = $tmp[1];
            $user['last_name'] = $tmp[0];
            $user['middle_name'] = '';
        } else {
            $user['first_name'] = $tmp[0];
            $user['last_name'] = $user['middle_name'] = '';
        }
        $user['active'] = $item['active'];
        $user = $this->app->itemSave('users',$user, true);
    }
}
?>
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
        $item['birthdate'] = @date('d.m.Y',strtotime($item['birthdate']));
        //image,  division, stages, spec, licenses, education,  experience, blocks, srvtype,  _sort
        @$item['expert'] = [
            'id' => &$item['id'],
            'name' => &$item['fullname'],
            'image' => &$item['image'],
            'division' => &$item['division'],
            'stages' => &$item['stages'],
            'spec' => &$item['spec'],
            'licenses' => &$item['licenses'],
            'education' => &$item['education'],
            'experience' => &$item['experience'],
            'srvtype' => &$item['srvtype']
        ];
        return $item;
    }

    public function afterItemRead(&$item)
    {
        $data = $this->app->dot($item);
        isset($item['phone']) ? null : $item['phone'] = '';
        $item['phone'] = preg_replace('/[^0-9]/', '', $item['phone']);
        $item['fullname'] = trim($data->get('last_name').' '.$data->get('first_name').' '.$data->get('middle_name'));
        return $item;
    }

    public function beforeItemSave(&$item)
    {
        $data = $this->app->dot($item);
        isset($item['email']) ? $item['email'] = strtolower($item['email']) : null;
        $item['phone'] = isset($item['phone']) ? wbDigitsOnly($item['phone']) : '';
        if (!isset($item['middle_name'])) $item['middle_name'] = '';
        if (!$this->app->vars('_route._post.fullname') && $this->app->vars('_route._post.first_name') > '' ) {
            $item['fullname'] = trim($item['last_name'].' '.$item['first_name'].' '.$item['middle_name']);
        } else if (isset($item['fullname'])) {
            $fullname = explode(' ',trim($item['fullname']));
            $item['last_name'] = @$fullname[0];
            $item['first_name'] = @$fullname[1];
            $item['middle_name'] = @$fullname[2];
        }
        $item['header'] = $item['fullname'];
        if ($item['isgroup'] !== 'on' && $item['email'] == '') {
            return $item;
        }
        $this->changePassword($item);
        foreach($item as $key => $val) {
            if (strpos(' '.$key,'date')) $item[$key] = date('Y-m-d H:i:s',strtotime($item[$key]));
            if (substr($key,0,4) == 'pwd_') unset($item[$key]);
        }
        return $item;
    }

    function changePassword(&$item=null) {
        if (isset($item['new_password'])) {
            // при создании нового специалиста
            $item['password'] = wbPasswordMake($item['new_password']);
            unset($item['new_password']);
            return;
        }


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
	function change_password(&$item=null) {
		$post = $this->app->vars('_post');
        $user_id = $post['id'] ?? '';
        $pwd_current = $post['old_password'] ?? '';
        $pwd_new = $post['new_password'] ?? '';
        $pwd_check = $post['new_password_repeat'] ?? '';
		$user = wbItemRead('users',$this->app->vars('_sess.user.id'));

        if (!$pwd_current || !$pwd_current) return;
        if (wbPasswordCheck($pwd_current, $user['password'])) {
            if ($pwd_new !== $pwd_check) {
                header('Content-type: application/json; charset=utf-8');
                echo '{"error":true,"msg":"Новый пароль и повторный пароль не совпадают!"}';
                exit;
            } else {
                $user['password'] = wbPasswordMake($pwd_new);
            }
			$user = wbItemSave('users',$user, true);
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

    function sort()
    {
        // сортировка для экспертов
        $data = $this->app->vars('_post');
        $res = ['error' => true];
        foreach ($data as $sort => $item) {
            $this->app->itemSave($this->app->route->form, [
                'id' => $item,
                '_sort' => wbSortIndex($sort)
            ], true);
            $res = ['error' => false];
        }
        $this->app->tableFlush($this->app->route->form);
        header("Content-type:application/json");
        echo json_encode($res);
        exit;
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

<?php
//use Nahid\JsonQ\Jsonq;

class quotesClass extends cmsFormsClass {
    function beforeItemSave(&$item) {
        $item['login'] = $this->app->vars('_sess.user.login');
        isset($item['status']) ? null : $item['status'] = 'new';
//        isset($item['payment']) ? null : $item['payment'] = 'unpay';
    }

    function afterItemRead(&$item)
    {
        if ($this->app->vars('_route.module') == 'api' && $this->app->vars('_route.mode') == 'list') {
            $this->prepareApiItem($item);
        }
    }

    function prepareApiItem(&$item) {
        $item['date'] = date('d.m.Y',strtotime($item['_created']));
        $item['time'] = date('H:i',strtotime($item['_created']));
        if (isset($item['client'])) {
            $users = $this->app->formClass('users');
            $client = wbItemRead('users',$item['client']);
            $users->beforeItemShow($client);
            $client['phone'] = wbPhoneFormat($client['phone']);
            $item['clientData'] = &$client;
        }
    }


    function getQuote() {
        $result = '{"error":true,"msg":"Что-то пошло не так, заявку не удалось отправить. Попробуйте позже."}';
        $item = $this->app->vars('_post');
        $users = $this->app->formClass('users');
        $client = $users->checkClient($this->app->vars('_post.phone'));
        if ($client['error'] == false) {
            $item['client'] = $client['data']['id'];
        } else if ($client['code'] == 'empty') {
            // создаём пользователя
            $fields = ['phone','fullname','email'];
            $newClient = [];
            foreach($item as $f => $v) {
                if (in_array($f,$fields)) $newClient[$f] = $v;
            }
            $client = $users->createClient($newClient);
            if ($client) $item['client'] = $client['id'];
        } else {
            return $result;
        }
        unset($item['fullname'],$item['phone']);
        $item['type'] = 'online';
        $item = wbItemSave('quotes',$item);
        header('Content-type: application/json; charset=utf-8');
        if ($item) return json_encode($item);
        return $result;
    }
}
?>
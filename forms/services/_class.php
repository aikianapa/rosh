<?php

class servicesClass extends cmsFormsClass
{
    function beforeItemSave(&$item) {
        $url = '/services/'.wbFurlGenerate($item['header']);
        if (!yongerCheckUrl($url,'services',$item['id'])) {
            header("Content-type:application/json");
            echo json_encode(['error'=>true,'msg'=>'Такое наименование уже существует! Пожалуйста, измените.']);
            exit;
        }
    }

    function sort()
    {
        $data = $this->app->vars('_post');
        $res = ['error'=>true];
        foreach ($data as $sort => $item) {
            $this->app->itemSave($this->app->route->form, [
                    'id'=>$item,
                    '_sort' => wbSortIndex($sort)
                ], false);
            $res = ['error'=>false];
        }
        $this->app->tableFlush($this->app->route->form);
        header("Content-type:application/json");
        echo json_encode($res);
        exit;
    }


}
?>
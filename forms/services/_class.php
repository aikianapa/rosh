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
}
?>
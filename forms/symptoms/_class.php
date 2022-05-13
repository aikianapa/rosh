<?php

class symptomsClass extends cmsFormsClass
{
    function beforeItemSave(&$item) {
        $url = '/symptoms/'.wbFurlGenerate($item['header']);
        if (!yongerCheckUrl($url,'symptoms',$item['id'])) {
            header("Content-type:application/json");
            echo json_encode(['error'=>true,'msg'=>'Такое наименование уже существует! Пожалуйста, измените.']);
            exit;
        }
    }
}
?>
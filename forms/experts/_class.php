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
    }
}
?>
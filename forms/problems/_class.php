<?php
use Nahid\JsonQ\Jsonq;

class problemsClass extends cmsFormsClass
{
    function beforeItemSave(&$item) {
        $url = '/problems/'.wbFurlGenerate($item['header']);
        if (!yongerCheckUrl($url,'problems',$item['id'])) {
            header("Content-type:application/json");
            echo json_encode(['error'=>true,'msg'=>'Такое наименование уже существует! Пожалуйста, измените.']);
            exit;
        }
    }
}
?>
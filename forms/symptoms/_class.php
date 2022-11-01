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

/*
    function clear() {
        // удаление дублированных симптомов
        $list=wbItemList('symptoms', ['sort'=>'header'])['list'];
        header("Content-type:text/html");
        $prev = "";
        foreach($list as $item) {
            if ($prev == $item['header']) {
                echo "&nbsp;&nbsp;&nbsp;{$item['header']}<br>";
                wbItemRemove('symptoms', $item['id'], false);
            } else {
                echo "{$item['header']}<br>";
            }
            $prev = $item['header'];
        }
        wbTableFlush('symptoms');
    }
    */
}

?>
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

    function mainfilter() {
        $types = wbItemRead('catalogs','srvtype')['tree']['data'];
        $scats = wbItemRead('catalogs','srvcat')['tree']['data'];
        $texts = wbItemRead('catalogs','mainfilter_text');
        $sympt = wbItemList('symptoms',['filter'=>['active'=>'on']])['list'];
        $servs = wbItemList('services',['filter'=>['active'=>'on']])['list'];
        $prbms = wbItemList('problems',['filter'=>['active'=>'on']])['list'];


        foreach ($scats as &$s) {
            $s['items'] = [];
        }

        foreach($types as &$t) {
            $t['cats'] = $scats;
        }

        $texts = ($texts['active'] == 'on') ? $texts['tree']['data'] : [];

        $filter = [
            'services'  =>$scats,
            'problems'  =>$types,
            'symptoms'  =>$sympt,
            'texts'     =>$texts
        ];

        foreach($servs as $srv) {
            $srv['category'] = (array)$srv['category'];
            $srv['type'] = (array)$srv['srvtype'];
            // Услуги
            foreach ($filter['services'] as $cat) {
                if (@!isset($filter['services'][$cat['id']]['items'])) @$filter['services'][$cat['id']]['items'] = [];
                if (in_array($cat['id'],$srv['category'])) {
                    $filter['services'][$cat['id']]['items'][] = $srv;
                }
            }
        }
        // Проблемы
        foreach($prbms as $problem) {
            foreach($filter['problems'] as &$prb) {
                if ($problem['srvtype'] == $prb['id']) {
                    foreach($problem['category'] as $cat) {
                        $prb['cats'][$cat]['items'][] = $problem;
                    }
                }
            }
        }
        return $filter;
    }

}
?>
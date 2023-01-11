<?php

use Nahid\JsonQ\Jsonq;

class problemsClass extends cmsFormsClass
{
    public function beforeItemSave(&$item)
    {
        $url = '/problems/'.wbFurlGenerate($item['header']);
        if (!yongerCheckUrl($url, 'problems', $item['id'])) {
            header("Content-type:application/json");
            echo json_encode(['error'=>true,'msg'=>'Такое наименование уже существует! Пожалуйста, измените.']);
            exit;
        }
    }

    public function afterItemSave($item)
    {
        if ($this->app->route->mode == 'save') {
            $this->app->shadow('/cms/ajax/form/pages/list');
        }
    }

    public function mainfilter()
    {
        $types = wbItemRead('catalogs', 'srvtype')['tree']['data'];
        $scats = wbItemRead('catalogs', 'srvcat')['tree']['data'];
        $texts = wbItemRead('catalogs', 'mainfilter_text');
        $sympt = wbItemList('symptoms', ['sort'=>'header','filter'=>['active'=>'on'],'return'=>'id,header,category,active,data'])['list'];
        $servs = wbItemList('services', ['filter'=>['active'=>'on'],'return'=>'id,name,header,type,category,active,data'])['list'];
        $prbms = wbItemList('problems', ['filter'=>['active'=>'on'],'return'=>'id,header,srvtype,category,active,symptoms'])['list'];
        $srvlab = wbItemList('price', ['sort'=>'header','filter'=>['active'=>'on']])['list'];

        foreach ($scats as &$s) {
            $s['items'] = [];
        }

        foreach ($types as &$t) {
            $t['cats'] = $scats;
        }

        $texts = ($texts['active'] == 'on') ? $texts['tree']['data'] : [];

        $filter = [
            'services'  =>$scats,
            'problems'  =>$types,
            'symptoms'  =>$sympt,
            'texts'     =>$texts,
            'prbms'     =>$prbms
        ];

        foreach ($servs as $srv) {
            $srv['category'] = @(array)$srv['category'];
            $srv['type'] = @(array)$srv['srvtype'];
            // Услуги
            foreach ($filter['services'] as $cat) {
                if (@!isset($filter['services'][$cat['id']]['items'])) {
                    @$filter['services'][$cat['id']]['items'] = [];
                }
                if (in_array($cat['id'], $srv['category'])) {
                    $filter['services'][$cat['id']]['items'][] = $srv;
                }
            }
        }
        $filter['services']['lab']['items'] = $srvlab;

        // Проблемы
        foreach ($prbms as $problem) {
            foreach ($filter['problems'] as &$prb) {
                if ($problem['srvtype'] == $prb['id']) {
                    foreach ($problem['category'] as $cat) {
                        $prb['cats'][$cat]['items'][] = $problem;
                    }
                }
            }
        }
        return $filter;
    }
}

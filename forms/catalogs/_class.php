<?php
//use Nahid\JsonQ\Jsonq;

class catalogsClass extends cmsFormsClass {
    function getQuoteStatus() {
        $item = wbItemRead('catalogs','quote_status');
        $list = [];
        foreach($item['tree']['data'] as $line) {
            $line = (object)$line;
            if ($line->active == 'on') {
                $list[] = [
                    "id"    => $line->id,
                    'name'  => $line->name,
                    'color' => $line->data['color'],
                    'type'  => $line->data['type']
                ];
            }
        }
        return $list;
    }

    function getQuotePay() {
        $item = wbItemRead('catalogs','quote_pay');
        $list = [];
        foreach($item['tree']['data'] as $line) {
            $line = (object)$line;
            if ($line->active == 'on') {
                $list[] = [
                    "id"    => $line->id,
                    'name'  => $line->name
                ];
            }
        }
        return $list;
    }

    function getQuoteType() {
        $item = wbItemRead('catalogs','quote_type');
        $list = [];
        foreach($item['tree']['data'] as $line) {
            $line = (object)$line;
            if ($line->active == 'on') {
                $list[] = [
                    "id"    => $line->id,
                    'name'  => $line->name
                ];
            }
        }
        return $list;
    }

    function sort()
    {
        $data = $this->app->vars('_post');
        $res = ['error' => true];
        foreach ($data as $sort => $item) {
            $this->app->itemSave('catalogs', [
                'id' => $item,
                '_sort' => wbSortIndex($sort)
            ], false);
            $res = ['error' => false];
        }
        $this->app->tableFlush('catalogs');
        header("Content-type:application/json");
        echo json_encode($res);
        exit;
    }
}
?>
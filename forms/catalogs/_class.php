<?php
//use Nahid\JsonQ\Jsonq;

class catalogsClass extends cmsFormsClass {
    function getQuoteStatuses() {
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
}
?>
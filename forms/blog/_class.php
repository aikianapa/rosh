<?php
class blogClass extends cmsFormsClass {

    function beforeItemShow(&$item) {
        isset($item['lang']) ? $lang = $item['lang'][$this->app->vars('_sess.lang')] : $lang = [];
        $item = (array)$lang + (array)$item;
        isset($item['header'])  AND isset($item['header'][$_SESSION['lang']]) ? $item['header'] = $item['header'][$_SESSION['lang']] : null;
        isset($item['date']) ? $item['date'] = date('d.m.Y H:i',strtotime($item['date'])) : null;
    }

    function afterItemSave($item) {
        if (!isset($item['_table']) OR  $item['_table'] == '') return;
        if (!isset($item['_id']) OR  $item['_id'] == '') return;
        $app = $this->app;
        $index = file_get_contents($app->vars('_env.dba').'/url.idx');
        $index = json_decode($index,true);
        $index ? null : $index = [];
        $index[$item['_table']] ? $idx = $index[$item['_table']] : $idx = [];
        foreach($idx as $u => $id) {
            if ($id == $item['_id']) unset($idx[$u]);
        }
        foreach($item['header'] as $l => $h) {
            if ($h > '') {
                $url = '/blog/'.$item['_id'].'/'.$app->furlGenerate($h);
                break;
            }
        }
        if (!isset($url)) {
            $url = '/blog/'.$item['_id'].'/'.date('Ymd_His');
        }
        $idx[$url] = $item['_id'];
        $index[$item['_table']] = $idx;
        $index = json_encode($index);
        file_put_contents($app->vars('_env.dba').'/url.idx',$index,  LOCK_EX);

        regenerate_map();
    }

    function getPeriods()
    {
        $app = $this->app;
        $blog = json_decode(file_get_contents($app->vars('_env.dba').'/blog.json'), true);


        $periods = [
            'years' => [],
            'months' => []
        ];

        foreach($blog as $item){
            $periods['years'][] = date('Y', strtotime($item['date']));
            $periods['months'][] = date('m', strtotime($item['date']));
        }

        $periods['years'] = array_unique($periods['years']);
        sort($periods['years']);

        $periods['months'] = array_unique($periods['months']);
        sort($periods['months']);

        header("Content-type: application/json");
        exit(json_encode($periods));
    }

    function getDates(){

        $month = ($_POST['month'] == 'Все')?null:$_POST['month'];
        $year = ($_POST['year'] == 'Все')?null:$_POST['year'];

        $app = $this->app;
        $blog = json_decode(file_get_contents($app->vars('_env.dba').'/blog.json'), true);
        $res = [];

        foreach($blog as $item){
            $item_date = strtotime($item['date']);
            $item_month = date('m', $item_date);
            $item_year = date('Y', $item_date);

            switch (true){
                case (!empty($month) && !empty($year)):
                    if(($item_year == $year) && ($item_month == $month)){
                        $res[] = $item['id'];
                    }
                    break;
                case (empty($month) || empty($year)):
                    if($item_year == $year){
                        $res[] = $item['id'];
                    }

                    if($item_month == $month){
                        $res[] = $item['id'];
                    }
                    break;

            }


        }

        header("Content-type: application/json");
        exit(json_encode($res));

    }
}
?>
<?php
setlocale(LC_ALL, 'ru_RU.utf8');
date_default_timezone_set('Europe/Moscow');

@include_once(__DIR__ . '/engine/modules/yonger/common/scripts/functions.php');

function datetext($date)
{
    return strftime('%e %B %Y', strtotime($date));
}

function dateform($date)
{
    return date('d.m.Y', strtotime($date));
}

function text2tel($str) {
    return preg_replace("/\D/", '', $str);
}

function fmtPrice($sum) {
    return number_format($sum, 0, '.', ' ');
}

function headerByPath($path='/') {
    $app = $_ENV['app'];
    $json = json_decode(file_get_contents($app->route->path_app.'/database/_yonmap.json'),true);
    $json = $app->json($json);
    $res = $json->where('u',$path)->get();
    if (count($res)) $res = array_pop($res);
    $item = wbItemRead($res['f'],$res['i']);
    $header = '';
    if ($item && isset($item['header'])) {
        if ((array)$item['header'] === $item['header']) {
            $header = $item['header'][$_SESSION['lang']];
        } else {
            $header = $item['header'];
        }
    }
    return $header;
}

function get_blog_remains($num){
    $matrix = [];
    switch ($num){
        case 1:
            $matrix[] = 100;
            break;
        case 2:
            foreach(range(1,2) as $num){
                $matrix[] = 50;
            }
            break;
        case 3:
            $matrix[] = 100;
            foreach(range(1,2) as $num){
                $matrix[] = 50;
            }
            break;
        case 4:
            $matrix[] = 100;
            foreach(range(1,3) as $num){
                $matrix[] = 33;
            }
            break;
        case 5:
            $matrix[] = 100;
            foreach(range(1,4) as $num){
                $matrix[] = 50;
            }
            break;
    }

    return $matrix;
}

function get_blog_matrix()
{
    $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
    $rs = json_decode(file_get_contents($url . '/api/v2/list/blog/'), true);
    $items = [];
    foreach($rs as $rs_item){
        if($rs_item['active'] == 'on')
        {
            $items[] = $rs_item;
        }
    }

    $count = count($items);

    if($count < 6){
        return get_blog_remains($count);
    }else{
        $matrix = [];
        $matrix_cycles = floor($count / 6);
        for($i = 1; $i <= $matrix_cycles; $i++){
            $matrix[] = 100;
            foreach(range(1,2) as $num){
                $matrix[] = 50;
            }
            foreach(range(1,3) as $num){
                $matrix[] = 33;
            }
        }

        $matrix_cycles_remains = $count % 6;
        if($matrix_cycles_remains > 0){
            $remains = get_blog_remains($matrix_cycles_remains);
            return array_merge($matrix, $remains);
        }

        return $matrix;
    }

}

function get_similar_blogs($id, $tags){
    $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
    $rs = json_decode(file_get_contents($url . '/api/v2/list/blog/'), true);

    $blog_tags = explode(',', $tags);

    $items = [];
    foreach($rs as $rs_item){
        if(!empty($rs_item['tags']) && $rs_item['id'] != $id){
            $item_tags = explode(',', $rs_item['tags']);

            foreach($item_tags as $tag){
                if(in_array($tag, $blog_tags)){
                    $items[] = $rs_item['id'];
                }
            }
        }
    }

    if(empty($items)){
        return 0;
    }else{
        return array_unique($items);
    }
}

function getRecommend($id){
    $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
    $rs = json_decode(file_get_contents($url . '/api/v2/list/blog/'), true);

    foreach($rs as $rs_item){
        if($rs_item['id'] == $id){

            $txt = '';

            foreach($rs_item['blocks'] as $block){
                if(!empty($block['text'])){
                    $txt = $block['text'];
                    break;
                }
            }

            return [
                'header' => $rs_item['header'],
                'image' => $rs_item['cover'][0]['img'],
                'text' => $txt
            ];


        }
    }

    return 0;

}

function is_hover_logo($uri)
{
    $uris = [
        '/lnd',
        '/shop'
    ];

    if(in_array($uri, $uris)){
        return 1;
    }else{
        return 0;
    }
}

function log_message($message, $collect = false){
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/log.txt', $message, ($collect)?FILE_APPEND:null);
}

function regenerate_map()
{
    $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
    file_get_contents($url . '/form/pages/list');
}


function beforeShow(&$out)
{
    $map = json_decode(file_get_contents($_ENV['dba'].'/_yonmap.json'), true);
    $fr = $to = [];
    foreach ($map as $m) {
        if ($m['f'] == 'pages') {
            $fr[] = urlencode('['.$m['n'].']');
            $fr[] = ('[' . $m['n'] . ']');
            $to[] = $m['u'];
            $to[] = $m['u'];
        }
    }
    $out = str_replace($fr, $to, $out);
    $out = str_replace(' done=""', ' ', $out);
    $out = str_replace(' type="wbapp"', ' type="text/wbapp"', $out);
    $out = str_replace('wbapp type="text/wbapp"', 'type="text/wbapp"', $out);
    return $out;
}

?>
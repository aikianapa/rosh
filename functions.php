<?php
setlocale(LC_ALL, 'ru_RU.utf8');

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

@include_once(__DIR__ . '/engine/modules/yonger/common/scripts/functions.php');

?>
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

@include_once(__DIR__ . '/engine/modules/yonger/common/scripts/functions.php');

?>
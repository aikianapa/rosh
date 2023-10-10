<?php
header('Content-Type: text/plain; charset=utf-8');
$res = shell_exec('/var/www/rosh.dev && git pull --no-edit origin dev ');
echo $res;
?>
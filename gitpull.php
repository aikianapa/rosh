<?php
header('Content-Type: text/plain; charset=utf-8');
exec('/var/www/rosh.dev && git pull origin dev -a', $res);
echo $res;
?>
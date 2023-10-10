<?php
header('Content-Type: text/plain; charset=utf-8');
exec('/var/www/rosh.dev && git pull --no-edit origin dev ', $res);
echo $res;
?>
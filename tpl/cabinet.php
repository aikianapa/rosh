<wb-include wb-tpl="cabinet/{{_sess.user.role}}{{_route.val}}.php" wb-if="in_array('{{_sess.user.role}}',['main','client','expert'])"></wb-include>
<wb-module wb="module=yonger&mode=render&view=popups-cabinet" />
<wb-include wb-tpl="404.php" wb-if="in_array('{{_sess.user.role}}',['admin',''])"></wb-include>
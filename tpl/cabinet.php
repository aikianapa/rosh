<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />

<script>
    if ('{{_sess.user.role}}' == 'admin') document.location.href = '/workspace'
</script>
<wb-include wb-tpl="cabinet/{{_sess.user.role}}{{_route.val}}.php" wb-if="in_array('{{_sess.user.role}}',['main','client','expert'])"></wb-include>
<wb-include wb-tpl="404.php" wb-if="in_array('{{_sess.user.role}}',['admin',''])"></wb-include>
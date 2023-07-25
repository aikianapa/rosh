<script>
    if ('{{_sess.user.role}}' == 'admin') document.location.href = '/workspace'
</script>
<wb-include wb-tpl="cabinet/{{_sess.user.role}}{{_route.val}}.php" wb-if="in_array('{{_sess.user.role}}',['main','client','expert'])"></wb-include>
<wb-include wb-tpl="404.php" wb-if="in_array('{{_sess.user.role}}',['admin',''])"></wb-include>
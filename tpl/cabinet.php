<wb-include wb-tpl="lk-{{_sess.user.role}}.php" wb-if="'{{_sess.user.role}}'>''"></wb-include>
<wb-include wb-tpl="404.php" wb-if="'{{_sess.user.role}}'==''"></wb-include>
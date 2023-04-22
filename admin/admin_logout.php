<?php 
session_start();
session_unset();
session_destroy();
echo "ĐĂNG XUẤT THÀNH CÔNG";
header('Location: admin_login.php');
exit;

?>
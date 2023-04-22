<?php 
session_start();
session_unset();
session_destroy();
echo "ĐĂNG XUẤT THÀNH CÔNG";
header('Location: ../index.php');
exit;

?>
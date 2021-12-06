<<<<<<< HEAD
<?php
require('server.php');
=======
﻿<?php
	require_once 'init.php';
	$page = 'Trang chu';
?>
<?php include 'header.php'; ?>
<?php if ($_SESSION['user']):?>
Chào bạn <?php echo $_SESSION['user']['displayName'] ?> đã quay lại
<?php else: ?>
CHÀO MỪNG QUÝ KHÁCH ĐẾN CỬA HÀNG
<?php endif ?>
<?php include 'footer.php';?>
>>>>>>> parent of 10e9e36 (nothing)

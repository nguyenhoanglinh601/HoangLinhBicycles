<?php
session_start();
if (!isset($_SESSION['username'])) {
	 header('Location: login.php');
}
?>
<html>
<head>
	<title>trang chủ</title>
	<meta charset="utf-8">
</head>
<body>
	Chúc mừng bạn có username là <?php echo $_SESSION['username'];  ?> đã đăng nhập thành công !
</body>
</html>

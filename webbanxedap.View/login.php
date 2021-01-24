
<html>
<head>
	<title>Đăng nhập</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css"/>
	<link rel="stylesheet" href="../webbanxedap.view/style.css"/>
	<meta charset="utf-8">
</head>
<body>
<?php
	require_once("../webbanxedap.Model/connection.php");
	if (isset($_POST["btn_submit"])) {
		$username = $_POST["username"];
		$password = $_POST["password"];
		$username = strip_tags($username);
		$username = addslashes($username);
		$password = strip_tags($password);
		$password = addslashes($password);
		if ($username == "" || $password == "") {
			echo "username hoặc password không được để trống!";
		}else{
			$sql = "select * from user where username = '$username' and password = '$password' ";
			$query = mysqli_query($conn,$sql);
			$num_rows = mysqli_num_rows($query);
			if ($num_rows==0) {
				echo "tên đăng nhập hoặc mật khẩu không đúng !";
			}else{
				$_SESSION['username'] = $username;
                header('Location: product.php');
			}
		}
	}
?>
	<form method="POST" action="../webbanxedap.controller/controller.php?action=checkLogin">
	<div class="imgcontainer">
		<h2>Welcome</h2>
    <img src="image/xd04.png" alt="Avatar" class="avatar">
    </div>

  <div class="container">
    <input type="text" placeholder="Username" name="username" required><br>

    <input type="password" placeholder="Password" name="password" required>
	<input type="hidden" name="action"	value="productmanagement"/>
	<button type="submit" name="btn_submit">Login</button>
	<br>
      <input type="checkbox" id="check" name="remember"> 
      <label for="check"> Remember me</label>
  </div>
  </form>

</body>
</html>


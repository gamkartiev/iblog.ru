<?php
header('Content-type: text/html; charset=utf-8');
session_start();

if($_SESSION['admin']){
	header("Location: index.php");
	exit;
}
$admin = 'admin';
$pass = '21232f297a57a5a743894a0e4a801fc3';
if($_POST['submit']){
	if($admin == $_POST['user']&& $pass == md5($_POST['pass'])){
		$_SESSION['admin'] = $admin;
		header("Location: index.php");
		exit;
	} else echo '<p> Логин или пароль неверны! </p>';
}

 ?>

<!DOCTYPE>
<!DOCTYPE html>
<html>
<head>
	<title> Вход в систему администрирования</title>
	<link rel="stylesheet" type="text/css" href="/views/css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>

<div class="form_admin">
<p><a class="submit1" href="/index.php"> На главную </a></p>

  <form class="open_admin" method="post">
	<input type="text" name="user" placeholder="Логин" /><br />
	<input type="password" name="pass" placeholder="Пароль" /><br />
	<input type="submit" class="" name="submit" value="Войти">
  </form>
</div>

</body>
</html>

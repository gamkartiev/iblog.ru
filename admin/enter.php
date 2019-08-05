<?php
header('Content-type: text/html; charset=utf-8');
session_start();

if($_SESSION['admin']){
	header("Location: index.php");
	exit;
}
$admin = 'admin';
$pass = 'a029d0df84eb5549c641e04a9ef389e5';
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
	Логин: <input type="text" name="user" /><br />
	Пароль: <input type="password" name="pass" /><br />
	<input type="submit" class="" name="submit" value="Войти">
  </form>
</div>

</body>
</html>

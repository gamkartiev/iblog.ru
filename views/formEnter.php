<?php
if($_SESSION['login']) //Если в аккаунт уже вошел - переходим на основной сайт
{
	header("Location: index.php");
	exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title> Вход в аккаунт</title>
	<link rel="stylesheet" type="text/css" href="/views/css/style_form.css">
</head>

<body>

<section class="formEnter">
	
	<?php
		echo $status_get_user; //Если неправильный логин-пароль - выдает ошибку, иначе пустая
	 ?>

	<p>Вход</p>
	<a class="submit1" href="/index.php"> На главную </a>

	<form class="open_admin" method="post">
		<input type="text" name="login" placeholder="Логин" required/><br />
		<input type="password" name="password" placeholder="Пароль" required/><br />
		<button name="button" type="submit"> Войти </button>
	</form>
</section>

<div class="layout_footer">
	<p>Ещё нет аккаунта? <a href="index.php?authentication=registration"> Зарегистрируйтесь </a> </p>
</div>



</body>
</html>

<!DOCTYPE html>
<html>
<head>
	<title> Вход в систему администрирования</title>
	<link rel="stylesheet" type="text/css" href="/views/css/style_form.css">
</head>
<body>

<section class="formEnter">

	<?php
	echo $status_get_user; //если пользователь с таким логином уже существует - выведет это
	?>

	<p>Регистрация</p>
	<a class="submit1" href="/index.php"> На главную </a>

	<form class="open_admin" method="post" action="/index.php?authentication=<?=$_GET['authentication']?>">
		<input type="text" name="login" placeholder="Логин" required/><br />
		<input type="password" name="password" placeholder="Пароль" required/><br />
		<button name="button" type="submit"> Зарегистрироваться </button>
	</form>
</section>

<div class="layout_footer">
	<p> Уже зарегистрированы? <a href="index.php?authentication=registration"> Войдите </a> </p>
</div>

</body>
</html>

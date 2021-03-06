<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
 	<title>Мой первый блог</title>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="/views/css/style.css">
</head>
<body>

<header>
    <?php include "header.php" ?>
</header>


<main>

<section class="quote">  <!-- quote - цитата -->
  <div class="blockquote">
   <!--  Книга, которая хорошо написана, всегда кажется мне слишком короткой. <br>
    Джейн Остин -->
  </div>
</section>

<section class="wrapper">
  <section class="section_article">   <!--Это секция со статьями -->
  </section>

  <!-- Боковая панель загружается из отдельного файла -->
  <?php include "aside.php" ?>
</section>

</main>


<footer>
 <?php include "footer.php" ?>
</footer>

    <script> document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>  <!--код для расширения livereload - автоматического обновления страницы сайта после сохранения кода -->
</body>
</html>

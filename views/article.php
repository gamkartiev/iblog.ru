<?php
// session_start();
$_SESSION['id'] = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Мой первый блог</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/views/css/style.css">
</head>
<body>

<header>
    <?php include "header.php"?>
</header>

<main>
<section class="wrapper">
  <section class="section_article">
      <h3><?=$article['title'] ?></h3>
      <em>Опубликовоно: <?=$article['data']?></em>
      <div class="cont_article_img"> <img class="article_img" src="../files/<?=$article['image']?>" alt=""> </div>
      <p class="article_content"><?=$article['content']?></p>

  </section>

  <!-- Боковая панель -->
  <?php include "aside.php" ?>
</section>

<section>
<div class="view_comment">
  <?php foreach ($allComment as $a): ?>
  <div class="title_comment">
  <p class="name_comment"> <b> <?=$a['user']?> </b></p>
  <p class="time_comment"> <?=date("H:i", $a['comment_time'])?> </p>
  <p class="data_comment"> <?=date("d.m.Y", $a['comment_time'])?> </p>
  </div>
  <div class="comment"> <?=$a['comment_text']?> </div>
  <?php endforeach ?>
</div>

  <hr>
  <h2>Оставить комментарий</h2>
<form method="post" action="article.php" class="form">
  <p> Ваше имя </p>
  <input type="text" name="login" class="form_name" value="<?=$_SESSION['login'] ?>" required>

  <p> Ваш комментарий </p>
  <textarea name="commentText" class="form_comment" required></textarea>
  <div class="text-center">
  <button name="enterComment" class="submit-button">Отправить</button>
  </div>
</form>
</section>

</main>

<footer>
 <?php include "footer.php" ?>
</footer>

    <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>  <!--код для расширения livereload - автоматического обновления страницы сайта после сохранения кода -->
</body>
</html>

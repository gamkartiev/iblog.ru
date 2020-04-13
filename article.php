<?php
  session_start();
  // error_reporting(E_ALL);
  header("Content-Type: text/html; charset=utf-8");
  require_once("database.php");
  require_once("models/articles.php");

  if (!isset($_GET['id'])) {
    $id_article = $_SESSION['id'];
  } else {
    $id_article = $_GET['id'];
  };

  $link = dbConnect();
  $article = articleGet($link, $id_article);

  $showTitle = showTitle($link);
  $showLastComment = showLastComment($link); //вывод последних комментов в aside

  if (isset($_POST['enterComment'])) {
    if (isset($_POST['login'])) {
      $user = $_POST['login'];//если логин в коментах был задан, то берем его
    } else {
        $user = $_SESSION['login']; //иначе, берем из сессии
      }
      $commentText = $_POST['commentText'];
     	newComment($link, $id_article, $user, $commentText);
     	header("Location: article.php?id=".$id_article);
      //если не задать article.php?id=".$id_article - то при добавлении
      //второго коммента на сайт - сбрасывается id и выдает ошибку
  } else {
      $allComment = allComment($link, $id_article);
      include("views/article.php");
  }

?>

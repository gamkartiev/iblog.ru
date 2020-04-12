<?php
  session_start();
  // error_reporting(E_ALL);
  header("Content-Type: text/html; charset=utf-8");
  require_once("database.php");
  require_once("models/articles.php");

  if(!isset($_GET['id']))
    { $id_article = $_SESSION['id']; }
  else
    { $id_article = $_GET['id']; };

  $link = db_connect();
  $article = article_get($link, $id_article);

  $show_title = show_title($link);
  $show_last_comment = show_last_comment($link); //вывод последних комментов в aside

  if(isset($_POST['enter_comment']))
  {
    if(isset($_POST['login'])) //если логин в коментах был задан, то берем его
      {$user = $_POST['login'];}
    else
      {$user = $_SESSION['login'];}; //иначе, берем из сессии
     	$comment_text = $_POST['comment_text'];

     	new_comment($link, $id_article, $user, $comment_text);
     	header("Location: article.php?id=".$id_article);
      //если не задать article.php?id=".$id_article - то при добавлении
      //второго коммента на сайт - сбрасывается id и выдает ошибку
  }
  else
  {
    $all_comment = all_comment($link, $id_article);
    include("views/article.php");
  }

?>

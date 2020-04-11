<?php
  session_start();
  header("Content-Type: text/html; charset=utf-8");
  require_once("database.php");
  require_once("models/articles.php");

  if(!isset($_GET['id']))
  {
    $id_article = $_SESSION['id'];
  }
  else{
    $id_article = $_GET['id'];
  }

  $link = db_connect();
  $article = article_get($link, $id_article);

  $show_title = show_title($link);

  if(isset($_POST['enter_comment']))
  {
  	$user = $_SESSION['login'];
   	$comment_text = $_POST['comment_text'];

   	new_comment($link, $id_article, $user, $comment_text);
    $id_article = $_GET['id'];
   	header("Location: article.php");
  }else{

  $all_comment = all_comment($link, $id_article);
  include("views/article.php");}

?>

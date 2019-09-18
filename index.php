<?php 
    header("Content-Type: text/html; charset=utf-8");
 //   error_reporting(E_ALL);
    require_once("database.php");
    require_once("models/articles.php");

    $link = db_connect();
    $articles = article_all($link);
    $show_title = show_title($link);

    include("views/articles.php")

    
?>

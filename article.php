<?php
    header("Content-Type: text/html; charset=utf-8");
    require_once("database.php");
    require_once("models/articles.php");
    
    $link = db_connect();
    $article = article_get($link, $_GET['id']);
//todo Не ззабудь удалить это позже
    include("views/article.php")
?>
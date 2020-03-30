<?php
    header("Content-Type: text/html; charset=utf-8");
 //   error_reporting(E_ALL);
    require_once("database.php");
    require_once("models/articles.php");

    $link = db_connect();
    if (isset($_GET['page'])){
      $page = $_GET['page'];
    } else {
      $page = 1;
    }

    $articles = article_all($link, $page);
    $show_title = show_title($link);



//Навигация по сайту
    if (isset($_GET['menu'])) {
    	$menu = $_GET['menu'];
    }else {
    	$menu = "";
    }

    if ($menu == 'favorites'){
    	include ("views/favorites.php");
    }
    elseif ($menu == 'resourses') {
    	include ("views/resourses.php");
    }
    else{
    	include("views/articles.php");
    }



?>

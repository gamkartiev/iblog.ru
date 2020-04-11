<?php
   session_start();
    header("Content-Type: text/html; charset=utf-8");
   //error_reporting(E_ALL);
    require_once("database.php");
    require_once("models/articles.php");

    $link = db_connect();
    // $login = "";

//Выход из аккаунта
    if(($_GET['do']) == 'logout')
    {
    	unset($_SESSION['admin']);
    	session_destroy();
      header("Location: index.php");
    }

 //Вход на сайт пользователя
  if(isset($_GET['authentication']))
    { $authentication = $_GET['authentication'];}

  if($authentication == 'enter')
    {
      include("views/formEnter.php");
      exit;
    }
  elseif($authentication == 'registration')
    {
      if(!empty($_POST))
      {
        save_user($link, $_POST['login'], $_POST['password']);
        header("Location: index.php");
      }
     include("views/formRegistration.php");
     exit;
    }
  //

  //Пагинация
    if(isset($_GET['page']))
      {$page = $_GET['page']; }
    else
      {$page = 1;}
  //

  $articles = article_all($link, $page);
  $show_title = show_title($link); //Вывод заголовков статей по популярности в блоке Интересное

  //Навигация по сайту
    if(isset($_GET['menu']))
      {$menu = $_GET['menu'];}
    else
      {$menu = "";}

    if($menu == 'favorites')
      {	include("views/favorites.php"); }
    elseif($menu == 'resourses')
      {	include("views/resourses.php"); }
    else
      { include("views/articles.php"); }
  //


?>

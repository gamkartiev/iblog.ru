<?php
   session_start();
    header("Content-Type: text/html; charset=utf-8");
   // error_reporting(E_ALL);
    require_once("database.php");
    require_once("models/articles.php");

    $link = db_connect();

//------Выход из аккаунта------//
  if(($_GET['do']) == 'logout')
  {
  	unset($_SESSION['admin']);
  	session_destroy();
    header("Location: index.php");
  }
//--------------//


//-----Вход на сайт пользователя------------
  if(isset($_GET['authentication']))
    { $authentication = $_GET['authentication'];}

  if($authentication == 'enter') //если первое обращение на добавление
    {
      if(isset($_POST['button'])) //Если форма входа не пуста то запрашиваем у бд данные
      {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $status_get_user ="";
        $get_user = get_user($link, $login, $password);
        if($get_user == false) //если данные не верны(логин и/или пароль), то выдаем ошибку
        {
          $status_get_user = "Вы ввели неправильный логин или пароль";
          include("views/formEnter.php");
          exit;
        }
      }else //если форма входа не была вызвана и заполнена ранее, то вызываем форму
      {
      include("views/formEnter.php");
      exit;
      }
    }
  elseif($authentication == 'registration') //если мы регистрируемся
    {
      if(!empty($_SESSION['login'])) //если пользователь сохранен или уже зареган - то переходим на главную
      {
        header("Location: index.php");
        exit;
      };

      if(!empty($_POST))
      {
        $save_user = save_user($link, $_POST['login'], $_POST['password']);

        //если пользователь с таким логином существует - то выкинет это и форму рег-ии
        if($save_user === false)
        {
          $status_get_user = "Пользователь с таким логином уже существует";
          include("views/formRegistration.php");
          exit;
        }
        header("Location: index.php");
      }
     include("views/formRegistration.php");
     exit;
    }
//---------------------//


//-----Пагинация------//
    if(isset($_GET['page']))
      {$page = $_GET['page']; }
    else
      {$page = 1;}
  //----------------//

  $articles = article_all($link, $page);
  $show_title = show_title($link); //Вывод заголовков статей по популярности в блоке Интересное
  $show_last_comment = show_last_comment($link); //вывод последних комментов в aside

//---------Навигация по сайту--------//
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
//-------------------//

?>

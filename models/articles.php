<?php
// header("Content-Type: text/html; charset=utf-8");


//Пагинация для главной страницы (вывод всех статей)
function getPagination($link)
{
  $kol = 4; //количество записей для вывода. Дублировано в function article_all
  $query = "SELECT COUNT(*) FROM `articles`"; //сколько эл-ов в табл.
  $result = mysqli_query ($link, $query);

  if (!$result)
    die(mysqli_error($link));

  $row = mysqli_fetch_row($result);
  $result = $row[0]; // всего записей

  $all_pages = ceil($result/$kol); //всего страниц

  for($i=1; $i<=$all_pages; $i++){
    echo "<a href = index.php?page=".$i.">".$i."</a>";
  }
}

//Вывод всех статей на главной странице
function article_all($link, $page)
{
    $kol = 5;  //количество записей для вывода. Дублировано в function getPagination
    $start = ($page*$kol)-$kol; //с какой страницы записи выводить

    // Запрос
    $query = "SELECT * FROM `articles`  ORDER BY id DESC LIMIT $start, $kol";
    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    // Извлечение из БД
    $n = mysqli_num_rows($result);
    $articles = array();

    for ($i = 0; $i < $n; $i++){
        $row = mysqli_fetch_assoc($result);
        $articles[] =$row;
    }
    return $articles;
}



//Вывод всех статей в админке
function article_all_admin($link)
{
    // Запрос
    $query = "SELECT * FROM `articles` ORDER BY id DESC";
    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    // Извлечение из БД
    $n = mysqli_num_rows($result);
    $articles = array();

    for ($i = 0; $i < $n; $i++){
        $row = mysqli_fetch_assoc($result);
        $articles[] =$row;
    }

    return $articles;
}


//Вывод одной статьи
function article_get($link, $id_article)
{
    views_counter($link, $id_article);

    // Запрос
    $query = "SELECT * FROM `articles` WHERE `id`=".(int)$id_article;
    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    $article = mysqli_fetch_assoc($result);

    return $article;
}



//Новая статья
function article_new($link, $title, $content, $data, $image)
{
    // Подготовка
    $title = trim($title);
    $content = trim($content);
    $image = trim($image);

    $views = 0;

    // Проверка
    if (!$title) {
        return false;
    }

    // Запрос
    $t = "INSERT INTO `articles` (`title`, `content`, `data`, `image`, `views`) VALUES ('%s', '%s', '%s', '%s', '%s')";

    $query=sprintf($t,
        mysqli_real_escape_string($link, $title),
        mysqli_real_escape_string($link, $content),
        mysqli_real_escape_string($link, $data),
        mysqli_real_escape_string($link, $image),
        mysqli_real_escape_string($link, $views));

    $qresult = mysqli_query($link, $query);

    if (!$qresult) {
        die(mysqli_error($link));
    }

    return true;
}




//Изменение статьи
function article_edit($link, $id, $title, $content, $data, $image)
{
    // Подготовка
    $title = trim($title);
    $content = trim($content);
    $data = trim($data);
    $image = trim($image);
    $id = (int)$id;

    // Проверка
    if ($title == '')
        return false;

    // Запрос
    $sql = "UPDATE articles SET title='%s', content='%s', data='%s', image='%s' WHERE id = %d";

    $query = sprintf($sql,
        mysqli_real_escape_string($link, $title),
        mysqli_real_escape_string($link, $content),
        mysqli_real_escape_string($link, $data),
        mysqli_real_escape_string($link, $image), $id);

    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));

    return mysqli_affected_rows($link);
}



//удаление статьи
function article_delete($link, $id)
{
    // Подготовка
    $id = (int)$id;

    // Проверка
    if ($id == '')
        return false;

    $query = sprintf("DELETE FROM articles WHERE id=%d", (int)$id);
    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    return mysqli_affected_rows($link);
}



//обрезка вывода текста статьи на главной странице
function article_intro($text, $len)
{
    return mb_substr($text, 0, $len);
}



// Нужно залить работу с изображениями сюда, в отдельную функцию
function image_processing() {}



//счетчик просмотра страницы. Проблема - записывает только после входа и выхода.
function views_counter($link, $id)
{
    $query = "UPDATE articles SET views = views + 1 WHERE id = $id";
    $result = mysqli_query($link, $query);
}



//Вывод заголовков статей по популярности в блоке Интересное
function show_title($link)
{
    // Запрос
    $query = "SELECT `id`, `title`, `views` FROM `articles` ORDER BY `views` DESC";
    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    // Извлечение из БД
    // $n = mysqli_num_rows($result);
    $show_title = array();

    for ($i = 0; $i < 11; $i++){
        $row = mysqli_fetch_assoc($result);
        $show_title[] = $row;
    }

    return $show_title;
}

//Вывод последних 7 комментарий
function show_last_comment($link)
{
  //
  $query = "SELECT * FROM `comment` ORDER BY `comment_time` DESC";
  $result = mysqli_query($link, $query);

  if(!$result)
    die(mysqli_error($link));

    //
    // $n = mysqli_num_rows($result);
    $show_last_comment = array();

    for($i = 0; $i < 7; $i++)
    {
      $row = mysqli_fetch_assoc($result);
      $show_last_comment[] = $row;
    }
    return $show_last_comment;
}

//Регистрация нового пользователя
function save_user($link, $login, $password)
{
  $login = trim($login);
  $password = trim($password);

  //get_secure_password($password); //шифруем наш пароль не заработало
  $password = md5($password);

  if(get_user_login($link, $login)===false){
    return false;
  }  //если это false, то echo - такой логин уже существует

  $t = "INSERT INTO users(login, password, status) VALUES ('%s', '%s', 'user')";

  $query = sprintf($t,
  mysqli_real_escape_string($link, $login),
  mysqli_real_escape_string($link, $password));

  $qresult = mysqli_query($link, $query);

  if(!$qresult)
    die(mysqli_error($link));

  $_SESSION['login'] = $login;
  $_SESSION['password'] = $password;

  return true;
}


//шифрует наш пароль - не заработало - почему?
function get_secure_password($password)
{
  $password = md5($password);
  return $password;
}


//проверка на существование логина(для регистрации нового пользователя на сайт)
function get_user_login($link, $login)
{
  $login = stripslashes($login);
  $login = htmlspecialchars($login);
  $login = trim($login);

  $query = "SELECT `login` FROM `users` WHERE login='$login'";
  $result = mysqli_query($link, $query);

  if(!$result)
    die(mysqli_error($link));

  $myrow = mysqli_fetch_array($result);

  if (empty($myrow))  //Если есть данные, значит возвращаем true = такой логин уже существует
    {  return true; }
  else          //если данных нет, то возращаем false - такого логина не существует
    {  return false;  };
}



//Получение логина и пароля для пользователей
function get_user($link, $login, $password)
{
  //Защита от тегов и скриптов
  $login = stripslashes($login);
  $login = htmlspecialchars($login);
  $password = stripslashes($password);
  $password = htmlspecialchars($password);
  //Убираем лишние пробелы
  $login = trim($login);
  $password = trim($password);

  $query = "SELECT * FROM `users` WHERE login='$login'";
  $result = mysqli_query($link, $query);

  if(!$result)
     die(mysqli_error($link));

  $myrow = mysqli_fetch_array($result);
  if(empty($myrow['password']))
  {
    //Если пользователя с таким логином не существует
    // echo "Извините, введенный Вами логин или пароль неверный";
    return false;
  }
  else
  {
    //Если сушествует, то шифруем пароль и
    //get_secure_password($password);
    $password = md5($password);
    //сверяем пароли
    if($myrow['password']==$password)
    {
      //Если пароли совпадают, то запускаем пользователю сессию
      $_SESSION['login'] = $myrow['login'];
      $_SESSION['id'] = $myrow['id'];
      $_SESSION['status'] = $myrow['status'];
    }
    else
    {
      // echo "Извините, введенный Вами логин или пароль неверный";
      return false;
    }
  }

}



//Добавление комментарий в БД
function new_comment($link, $id_article, $user, $comment_text)
{
  $user = trim($user);
  $id_article = trim($id_article);
  $comment_text = trim($comment_text);
  $comment_time =  time();

  //Запрос
  $t = "INSERT INTO `comment` (`id_article`, `user`, `comment_time`, `comment_text`) VALUES('%s', '%s', '%s', '%s')";
  $query = sprintf($t,
      mysqli_real_escape_string($link, $id_article),
      mysqli_real_escape_string($link, $user),
      mysqli_real_escape_string($link, $comment_time),
      mysqli_real_escape_string($link, $comment_text));

  $qresult = mysqli_query($link, $query);

  if (!$qresult) {
      die(mysqli_error($link));
  }

  return true;
}



//Вывод всеx комментарий статьи
function all_comment($link, $id_article)
{
  $query = "SELECT id_comments, user, comment_time, comment_text FROM `comment` WHERE id_article=".$id_article;
  $result = mysqli_query($link, $query);

  if (!$result) {
      die(mysqli_error($link));
  }

  // Извлечение из БД
  $n = mysqli_num_rows($result);
  $all_comment = array();

  for ($i = 0; $i < $n; $i++){
      $row = mysqli_fetch_assoc($result);
      $all_comment[] =$row;
  }

  return $all_comment;
}

?>

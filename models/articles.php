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

  $allPages = ceil($result/$kol); //всего страниц

  for($i=1; $i<=$allPages; $i++){
    echo "<a href = index.php?page=".$i.">".$i."</a>";
  }
}

//Вывод всех статей на главной странице
function articleAll($link, $page)
{
    $kol = 5;  //количество записей для вывода. Дублировано в function getPagination
    $start = ($page*$kol)-$kol; //с какой страницы записи выводить

    // Запрос
    $query = "SELECT * FROM `articles`  ORDER BY `id` DESC LIMIT $start, $kol";
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
function articleAllAdmin($link)
{
    // Запрос
    $query = "SELECT * FROM `articles` ORDER BY `id` DESC";
    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    // Извлечение из БД
    $n = mysqli_num_rows($result);
    $articles = array();

    for ($i = 0; $i < $n; $i++) {
        $row = mysqli_fetch_assoc($result);
        $articles[] =$row;
    }

    return $articles;
}


//Вывод одной статьи
function articleGet($link, $id_article)
{
    viewsCounter($link, $id_article);

    // Запрос
    $query = "SELECT * FROM `articles` WHERE `id`=".(int)$id_article;
    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    $article = mysqli_fetch_assoc($result);

    return $article;
}



//Новая статья
function articleNew($link, $title, $content, $data, $image)
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
function articleEdit($link, $id, $title, $content, $data, $image)
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
    $sql = "UPDATE `articles` SET `title`='%s', `content`='%s', `data`='%s', `image`='%s' WHERE `id` = %d";

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
function articleDelete($link, $id)
{
    // Подготовка
    $id = (int)$id;

    // Проверка
    if ($id == '')
        return false;

    $query = sprintf("DELETE FROM `articles` WHERE `id`=%d", (int)$id);
    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    return mysqli_affected_rows($link);
}



//обрезка вывода текста статьи на главной странице
function articleIntro($text, $len)
{
    return mb_substr($text, 0, $len);
}



// Нужно залить работу с изображениями сюда, в отдельную функцию
function imageProcessing() {}



//счетчик просмотра страницы. Проблема - записывает только после входа и выхода.
function viewsCounter($link, $id)
{
    $query = "UPDATE `articles` SET `views` = `views` + 1 WHERE `id` = $id";
    $result = mysqli_query($link, $query);
}



//Вывод заголовков статей по популярности в блоке Интересное
function showTitle($link)
{
    // Запрос
    $query = "SELECT `id`, `title`, `views` FROM `articles` ORDER BY `views` DESC";
    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    // Извлечение из БД
    // $n = mysqli_num_rows($result);
    $showTitle = array();

    for ($i = 0; $i < 11; $i++) {
        $row = mysqli_fetch_assoc($result);
        $showTitle[] = $row;
    }

    return $showTitle;
}

//Вывод последних 7 комментарий
function showLastComment($link)
{
  //
  $query = "SELECT * FROM `comments` ORDER BY `comment_time` DESC";
  $result = mysqli_query($link, $query);

  if(!$result)
    die(mysqli_error($link));

    //
    // $n = mysqli_num_rows($result);
    $showLastComment = array();

    for($i = 0; $i < 7; $i++) {
      $row = mysqli_fetch_assoc($result);
      $showLastComment[] = $row;
    }

    return $showLastComment;
}

//Регистрация нового пользователя
function saveUser($link, $login, $password)
{
  $login = trim($login);
  $password = trim($password);
  $passwordForSession = $password; //записываем сюда пароль, чтобы вызвать его для добавлении в сессию
  //иначе пароль шифруется два раза, не совпадает и не вызывается
  //get_secure_password($password); //шифруем наш пароль не заработало
  $password = md5($password);

  if (getUserLogin($link, $login)===false) {
    return false;
  }  //если это false, то echo - такой логин уже существует

  $t = "INSERT INTO `users`(`login`, `password`, `status`) VALUES ('%s', '%s', 'user')";

  $query = sprintf($t,
  mysqli_real_escape_string($link, $login),
  mysqli_real_escape_string($link, $password));

  $qresult = mysqli_query($link, $query);

  if(!$qresult)
    die(mysqli_error($link));

  getUser($link, $login, $passwordForSession);
  // $_SESSION['login'] = $login;
  // $_SESSION['password'] = $password;

  return true;
}


//шифрует наш пароль - не заработало - почему?
function getSecurePassword($password)
{
  $password = md5($password);
  return $password;
}


//проверка на существование логина(для регистрации нового пользователя на сайт)
function getUserLogin($link, $login)
{
  $login = stripslashes($login);
  $login = htmlspecialchars($login);
  $login = trim($login);

  $query = "SELECT `login` FROM `users` WHERE `login`='$login'";
  $result = mysqli_query($link, $query);

  if(!$result)
    die(mysqli_error($link));

  $myrow = mysqli_fetch_array($result);

  if (empty($myrow)) {
     return true;    //Если есть данные, значит возвращаем true = такой логин уже существует
  } else {
     return false; //если данных нет, то возращаем false - такого логина не существует
  };
}



//Получение логина и пароля для пользователей
function getUser($link, $login, $password)
{
  //Защита от тегов и скриптов
  $login = stripslashes($login);
  $login = htmlspecialchars($login);
  $password = stripslashes($password);
  $password = htmlspecialchars($password);
  //Убираем лишние пробелы
  $login = trim($login);
  $password = trim($password);

  $query = "SELECT * FROM `users` WHERE `login`='$login'";
  $result = mysqli_query($link, $query);

  if(!$result)
     die(mysqli_error($link));

  $myrow = mysqli_fetch_array($result);
  if (empty($myrow['password'])) {
    //Если пользователя с таким логином не существует
    // echo "Извините, введенный Вами логин или пароль неверный";
    return false;
  } else {
    //Если сушествует, то шифруем пароль и
    //get_secure_password($password);
    $password = md5($password);
    //сверяем пароли
    if ($myrow['password']==$password) {
      //Если пароли совпадают, то запускаем пользователю сессию
      $_SESSION['login'] = $myrow['login'];
      $_SESSION['id_users'] = $myrow['id'];
      $_SESSION['status'] = $myrow['status'];
    } else {
      // echo "Извините, введенный Вами логин или пароль неверный";
      return false;
    }
  }

}



//Добавление комментарий в БД
function newComment($link, $id_article, $user, $commentText)
{
  $user = trim($user);
  $id_article = trim($id_article);
  $commentText = trim($commentText);
  $commentTime =  time();

  //Запрос
  $t = "INSERT INTO `comments` (`id_article`, `user`, `comment_time`, `comment_text`) VALUES('%s', '%s', '%s', '%s')";
  $query = sprintf($t,
      mysqli_real_escape_string($link, $id_article),
      mysqli_real_escape_string($link, $user),
      mysqli_real_escape_string($link, $commentTime),
      mysqli_real_escape_string($link, $commentText));

  $qresult = mysqli_query($link, $query);

  if (!$qresult) {
      die(mysqli_error($link));
  }

  return true;
}



//Вывод всеx комментарий статьи
function allComment($link, $id_article)
{
  $query = "SELECT `id_comments`, `user`, `comment_time`, `comment_text` FROM `comments` WHERE `id_article`=".$id_article;
  $result = mysqli_query($link, $query);

  if (!$result) {
      die(mysqli_error($link));
  }

  // Извлечение из БД
  $n = mysqli_num_rows($result);
  $allComment = array();

  for ($i = 0; $i < $n; $i++) {
      $row = mysqli_fetch_assoc($result);
      $allComment[] =$row;
  }

  return $allComment;
}

?>

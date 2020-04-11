<!DOCTYPE html>
<html lang="ru">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
  <title>Мой первый блог</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/views/css/style.css">
</head>
<body>
  <div class="container">
      <h2>Панель администратора</h2>
      <div class="admin_p_btn">
          <a class="admin_p_btn_home" href="/index.php"> Главная           </a>
          <a class="admin_p_btn_logout" href="index.php?do=logout">Выход   </a><!-- </p> --> <!-- Выход из учетной записи администратора -->
      </div>

      <div>
          <a href="index.php?action=add">Добавить статью</a>
          <table class="table table-bordered">
              <tr>
                  <th>Дата</th>
                  <th>Заголовок</th>
                  <th>Кол-во просмотров</th>
                  <th></th>
                  <th></th>
              </tr>
              <?php foreach($articles as $a): ?>
              <tr>
                  <td><?=$a['data']?></td>
                  <td><?=$a['title']?></td>
                  <td><?=$a['views']?></td>
                  <td>
                      <a href="index.php?action=edit&id=<?=$a['id']?>">Редактировать</a>
                  </td>
                  <td>
                      <a href="index.php?action=delete&id=<?=$a['id']?>">Удалить</a>
                  </td>
              </tr>
              <?php endforeach ?>
          </table>
      </div>

  </div>

        <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>  <!--код для расширения livereload - автоматического обновления страницы сайта после сохранения кода -->
    </body>
</html>

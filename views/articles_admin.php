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
            <h1> Мой первый блог </h1>
            <p> <a href="/index.php"> Главная            </a></p>
            <p> <a href="index.php?do=logout">Выход     </a></p> <!-- Выход из учетной записи администратора -->
            <h3>Панель администратора</h3>
            <div>
                <a href="index.php?action=add">Добавить статью</a>
                <table class="table table-bordered">
                    <tr>
                        <th>Дата</th>
                        <th>Заголовок</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php foreach($articles as $a): ?>
                    <tr>
                        <td><?=$a['data']?></td>
                        <td><?=$a['title']?></td>
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
    </body>
</html>
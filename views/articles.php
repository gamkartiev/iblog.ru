<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <title>Мой первый блог</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   </head>
    <body>
        <div class="container">
            <h1>Мой первый блог</h1>
            <a href="admin">Панель администратора</a>
            <div>
                <?php foreach($articles as $a): ?>
                <div class="article">
                    <h3><a href="article.php?id=<?=$a['id']?>"><?=$a['title']?></a></h3>
                    <em>Опубликовоно: <?=$a['data']?></em>
                    <p><?=article_intro($a['content'])?></p>
                    <img src="../files/<?=$a['image']?>" alt="">
                </div>
                <?php endforeach ?>
            </div>
            <div class="footer">
                <p>Мой первый блог<br>Copyright &copy; 2016</p>
            </div>
        </div>
    </body>
</html>
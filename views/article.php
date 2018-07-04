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
            <div> 
                <div class="article">
                    <h3><?=$article['title'] ?></h3>
                    <em>Опубликовоно: <?=$article['data']?></em>
                    <p><?=$article['content']?></p>
                </div>
            </div>
            <div class="footer">
                <p>Мой первый блог<br>Copyright &copy; 2016</p>
            </div>
        </div>
    </body>
</html>
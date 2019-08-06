<!DOCTYPE html>
<html lang="ru">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Мой первый блог</title>
    <link rel="stylesheet" type="text/css" href="/views/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>

<header>
<?php include "heder.php" ?>
  
</header>

<main>      
 <section>
    <article>
     <h3><?=$article['title'] ?></h3>
     <p><?=$article['content']?></p>
     <em>Опубликовоно: <?=$article['data']?></em>
    </article>
 </section>            
</main>      


<footer> <p>Блог Ibragim Gamkartiev <br>Copyright &copy; 2019</p> </footer>
                
</body>
</html>
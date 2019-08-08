<!DOCTYPE html>
<html lang="ru">

<head>
 <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
 <title>Мой первый блог</title>
 <link rel="stylesheet" type="text/css" href="views/css/style.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>

<body>


<header>
  <?php include "heder.php" ?>
</header>
  

<main>
  <section>   <!--Это секция со статьями -->
    <?php foreach($articles as $a): ?>  <!--Это код для вывода всех статей по одному -->
    <article>   <!--Это отдельняя статья -->
      <h3><a href="article.php?id=<?=$a['id']?>"><?=$a['title']?></a></h3>
      <p><?=article_intro($a['content'])?></p>
      <img src="../files/<?=$a['image']?>" alt="">
      <em>Опубликовоно: <?=$a['data']?></em>
    </article>
    <?php endforeach ?>
  </section>

<?php 
// Проверяем нужны ли стрелки назад 
if ($page != 1) $pervpage = '<a href= ./page?page=1><<</a> 
                               <a href= ./page?page='. ($page - 1) .'><</a> '; 
// Проверяем нужны ли стрелки вперед 
if ($page != $total) $nextpage = ' <a href= ./page?page='. ($page + 1) .'>></a> 
                                   <a href= ./page?page=' .$total. '>>></a>'; 

// Находим две ближайшие станицы с обоих краев, если они есть 
if($page - 2 > 0) $page2left = ' <a href= ./page?page='. ($page - 2) .'>'. ($page - 2) .'</a> | '; 
if($page - 1 > 0) $page1left = '<a href= ./page?page='. ($page - 1) .'>'. ($page - 1) .'</a> | '; 
if($page + 2 <= $total) $page2right = ' | <a href= ./page?page='. ($page + 2) .'>'. ($page + 2) .'</a>'; 
if($page + 1 <= $total) $page1right = ' | <a href= ./page?page='. ($page + 1) .'>'. ($page + 1) .'</a>'; 

// Вывод меню 
echo $pervpage.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$nextpage; 

?>
</main>


<footer>
   <p>Блог Ibragim Gamkartiev <br>Copyright &copy; 2019</p>
</footer>


</body>
</html>
<!DOCTYPE html>
<html lang="ru">

<head>
 <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
 <title>Мой первый блог</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/views/css/style.css">
</head>

<body>


<header>
  <?php include "header.php" ?>
</header>
  

<main>
  <section>   <!--Это секция со статьями -->
    <?php foreach($articles as $a): ?>  <!--Это код для вывода всех статей по одному -->
    <article>   <!--Это отдельняя статья -->
      <h3><a href="article.php?id=<?=$a['id']?>"><?=$a['title']?></a></h3>
      <em>Опубликовоно: <?=$a['data']?></em>
      <p><?=article_intro($a['content'])?></p>
      <img class="articles_img" src="../files/<?=$a['image']?>" alt="">
    </article>
    <?php endforeach ?>
  </section>
</main>


<footer>
   <p>Блог G|I <br>Copyright &copy; 2019</p>
</footer>


</body>
</html>
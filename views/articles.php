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
  <nav>
    <ul>
      <li><a href="/index.php"> Рецензии   </a></li>
      <li><a href="#"> Избранное  </a></li>
      <li><a href="#"> Цитаты     </a></li>
      <li><a href="#"> Стихи      </a></li>
      <li><a href="#"> Списки     </a></li>
      <li><a href="#"> Ресурсы    </a></li>
    </ul>
  </nav>
</header>
  

<main>
  <section>   <!--Это секция со статьями -->
    <?php foreach($articles as $a): ?>  <!--Это код для вывода всех статей по одному -->
    <article>   <!--Это отдельняя статья -->
      <img class="article_img" src="../files/<?=$a['image']?>" alt="">
      <div class="article--cont">
      <h3><a href="article.php?id=<?=$a['id']?>"><?=$a['title']?></a></h3> 
      <em>Опубликовоно: <?=$a['data']?></em> <br /><br />
      <p><?=article_intro($a['content'])?></p> 
      </div>
    </article>
    <?php endforeach ?>
  </section>
</main>


<footer>
   <p>Блог G|I <br>Copyright &copy; 2019</p>
</footer>

    <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>  <!--код для расширения livereload - автоматического обновления страницы сайта после сохранения кода --> 

</body>
</html>
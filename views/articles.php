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

<section class="quote">  <!-- quote - цитата -->
  <div class="blockquote">
    Книга, которая хорошо написана, всегда кажется мне слишком короткой. <br>
Джейн Остин
  </div>
</section>

<section class="wrapper">
  <section class="section_article">   <!--Это секция со статьями -->
   <?php foreach($articles as $a): ?> 
    <article>
      <img class="article_img" src="../files/<?=$a['image']?>" alt="">
      <div class="article--cont">
        <h3><a href="article.php?id=<?=$a['id']?>"><?=$a['title']?></a></h3> 
        <em>Опубликовоно: <?=$a['data']?></em> <br /><br />
        <p> <i> Количество просмотров:</i><?=$a['views']; ?></p>        <!-- Переделать текст в значок и переставить место -->
        <p><?=article_intro($a['content'])?></p> 
        <p><a href="article.php?id=<?=$a['id']?>">Читать далее...</a></p>
        
      </div>
    </article>
    <?php endforeach ?>
  </section>

  <aside class="interesting"> 
    <div class="block_name"> Интересное </div>
    <div class="block_body"> 
      <?php 
      // убрать этот кусок кода в окончательной версии
      if(!isset($show_title)){
        echo "У тебя пустой массив";}
        elseif((!isset($show_title)) && is_array($show_title)){
          echo "У тебя не массив";
        } 
      else{ 
      foreach($show_title as $value): ?>
      <h4><a href="article.php?id=<?=$a['id']?>"> <?=$value['title']?> </a></h4>
    <?php endforeach; }?>


    </div>
  </aside>
  <aside class="last_comments"> 
    <div class="block_name"> Последние комментарии </div>
    <div class="block_body"> </div>
  </aside>
</section>

</main>


<footer>
  <div class="footer_cont">
    <p>Блог G|I <br>Copyright &copy; 2019</p>
    <nav>
      <ul>
        <li> <a href="/index.php"> Главное   </a></li>
        <li> <a href="/views/favorites.php"> Избранное  </a></li>
        <li> <a href="/views/resourses.php"> Ресурсы    </a></li>
      </ul>
    </nav>
  </div>
</footer>
  
    <script> document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>  <!--код для расширения livereload - автоматического обновления страницы сайта после сохранения кода --> 

</body>
</html>
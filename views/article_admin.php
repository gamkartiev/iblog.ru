<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Мой первый блог</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/views/css/style_form.css">
</head>

<body>
<header></header>

<main>
<h3><a href="/index.php">Главная</a></h3>
<h3><a href="/admin">Панель администратора</a></h3>
<h3>
<?php
  // Вывод слова добавление статьи или редактирования в зависимости от спецификатора $action
  if ($action == "add"){
     echo "Добавить статью";
   }else {
     echo "Редактировать статью";
   }
?>
</h3>

<form class="add_article" method="post" enctype="multipart/form-data" action="index.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>" >

  <div class="float_left">
  <label class="label_form">
      <p>Название:</p>
      <input type="text" name="title" value="<?=$article['title']?>" autofocus required>
  </label>

  <label class="label_form">
      <p>Дата:</p>
      <input type="date" name="data" value="<?php echo date('Y-m-d') ?>">
  </label>
  </div>

  <label class="button button-file-upload">
      <p>Выберите файл</p>
      <input class="submit" type="file" name="upload" value="<?=$article['image']?>">
      <input type="hidden" name="image" value="<?=$article['image']?>">
  </label>
  <?php
  if($article['image'] == ""){
    echo "Файл не был выбран";
  }else{
    echo '<img class="article_img" src="../files/'.$article['image'].'" />';
  };
  ?>

  <label class="label_form label_form_center">
      <p>Содержимое:</p>
      <textarea class="form_comment" name="content"  required><?=$article['content']?></textarea>
  </label>

  <button class="button" type="submit" > Сохранить </button>
</form>

</main>
<footer>
   <!--  <p>Мой первый блог<br>Copyright &copy; 2016</p> -->
    <script> document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>  <!--код для расширения livereload - автоматического обновления страницы сайта после сохранения кода -->
<footer>



</body>

</html>

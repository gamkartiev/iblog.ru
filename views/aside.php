<aside class="interesting">
<div class="block_name"> Популярное </div>
<div class="block_body">
  <ul class="menu_aside">
    <?php foreach($show_title as $value): ?>
    <li class="list_aside"><a class="link_aside" href="article.php?id=<?=$value['id']?>"><?=$value['title']?></a></li>
    <?php endforeach ?>
  </ul>

</div>
</aside>

<aside class="last_comments">
<div class="block_name"> Последние комментарии </div>
<div class="block_body"> </div>
</aside>

<script> document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>  <!--код для расширения livereload - автоматического обновления страницы сайта после сохранения кода -->

<aside class="interesting">
<div class="block_name"> <b> Популярное </b></div>
<div class="block_body">
  <ul class="menu_aside">
    <?php foreach($showTitle as $value): ?>
    <li class="list_aside"><a class="link_aside" href="article.php?id=<?=$value['id']?>"><?=$value['title']?></a></li>
    <?php endforeach ?>
  </ul>

</div>
</aside>

<aside class="last_comments">
<div class="block_name"> <b> Последние комментарии </b></div>
<div class="block_body">
  <ul class="menu_aside">
    <?php
    foreach($showLastComment as $a): ?>
    <li class="list_aside"><a class="link_aside" href="article.php?id=<?=$a['id_article']?>">
      <b><?=$a['user']?></b>
      <?=date("H:i", $a['comment_time'])?>
      <?=date("d.m", $a['comment_time'])?> <br />
      <?=articleIntro($a['comment_text'], 18)?>
    </a></li>
    <?php endforeach ?>
  </ul>
</div>
</aside>

<script> document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>  <!--код для расширения livereload - автоматического обновления страницы сайта после сохранения кода -->

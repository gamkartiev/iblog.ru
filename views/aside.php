<aside class="interesting"> 
    <div class="block_name"> Популярное </div>
    <div class="block_body"> 
      <?php 
        // убрать этот кусок кода в окончательной версии
        if(!isset($show_title))
        {
          echo "У тебя пустой массив";
        }
        elseif((!isset($show_title)) && is_array($show_title))
        {
            echo "У тебя не массив";
          } 
        else
        { 
        foreach($show_title as $value): ?>
          <ul class="menu_aside">
            <li class="list_aside"><a class="link_aside" href="article.php?id=<?=$value['id']?>"> <?=$value['title']?> </a>
            </li>
          </ul>
        <?php endforeach; 
        }
      ?>

    </div>
  </aside>
  <aside class="last_comments"> 
    <div class="block_name"> Последние комментарии </div>
    <div class="block_body"> </div>
  </aside>

  <script> document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>  <!--код для расширения livereload - автоматического обновления страницы сайта после сохранения кода --> 
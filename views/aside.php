<aside class="interesting"> 
    <div class="block_name"> Интересное </div>
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
      <h4><a href="article.php?id=<?=$value['id']?>"> <?=$value['title']?> </a></h4>
      <?php endforeach; }
      ?>

    </div>
  </aside>
  <aside class="last_comments"> 
    <div class="block_name"> Последние комментарии </div>
    <div class="block_body"> </div>
  </aside>
<nav class="nav_top">
  <ul class="menu_top">
    <li class="list_top"> <a class="link_top" href="/index.php"> Главное   </a></li>
    <li class="list_top"> <a class="link_top" href="/index.php?menu=favorites"> Избранное  </a></li>
    <li class="list_top"> <a class="link_top" href="/index.php?menu=resourses"> Ресурсы    </a></li>
  </ul>

<?php
if(empty($_SESSION['login'])) :?>
    <section>
      <a href="/index.php?authentication=enter" class="link_top"> Вход </a>
      <a href="/index.php?authentication=registration" class="link_top"> Регистрация </a>
    </section>
 <?php
 endif;

if(!empty($_SESSION['login'])): ?>
    <section>
      <div class="login"> <?=$_SESSION['login']?> </div>
      <a href="index.php?do=logout"> Выход </a>
    </section>
<?php endif; ?>

</nav>

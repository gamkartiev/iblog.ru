<nav class="nav_top">
  <ul class="menu_top">
    <li class="list_top"> <a class="link_top" href="/index.php"> Главное   </a></li>
    <li class="list_top"> <a class="link_top" href="/index.php?menu=favorites"> Избранное  </a></li>
    <li class="list_top"> <a class="link_top" href="/index.php?menu=resourses"> Ресурсы    </a></li>
  </ul>

<?php
if(empty($_SESSION['login'])) :?>
    <ul class="menu_top">
      <li class="list_top"> <a href="/index.php?authentication=enter" class="link_top"> Вход </a></li>
      <li class="list_top"> <a href="/index.php?authentication=registration" class="link_top"> Регистрация </a></li>
    </ul>
 <?php
 endif;

if((!empty($_SESSION['login'])) && ($_SESSION['status']=='admin')): ?>
    <section class="login">
      <div class="login_name"> <?=$_SESSION['login']?> </div>
      <a class="link_top" href="/admin/index.php"> Панель администратора </a>
      <a class="link_top" href="index.php?do=logout"> Выход </a>
    </section>
<?php endif;

if(!empty($_SESSION['login']) && ($_SESSION['status']!=='admin')):?>
     <section class="login">
       <div class="login_name"> <?=$_SESSION['login']?>  </div>
       <a class="link_top" href="index.php?do=logout"> Выход </a>
    </section>
<?php endif; ?>
</nav>

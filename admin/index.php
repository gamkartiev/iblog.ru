<?php
header("Content-Type: text/html; charset=utf-8");
ini_set('display_errors',1);
    require_once("../database.php");
    require_once("../models/articles.php");

    $link = db_connect();
    $article['title']='';       //это, чтобы не выдавало сообщение об ошибке в выводе статей
$article['data']='';
$article['content']='';
$article['author']='';
$article['image']='';


//-------------обработчик изображения----------
if(!empty($_FILES['upload']['tmp_name'])) {
    require_once ("../imageproc.php");
};// else{
 //   $image = "kakf" ;  //так как при последней операции мы меняем все имя на $image, то и тут его меняем. Можно поменять в конце на $filePath
//};


    if (isset($_GET['action']))
        $action = $_GET['action'];
    else
        $action ="";

    if ($action == "add"){
        if (!empty($_POST)){
            article_new($link, $_POST['title'], $_POST['content'], $_POST['data'], $image);
            header("Location: index.php");
        }
        include("../views/article_admin.php");    
    }
    else if ($action == "edit"){
        if (!isset($_GET['id']))
            header("Location: index.php");
        $id = (int)$_GET['id'];
        
        if (!empty($_POST) && $id > 0){
            article_edit($link, $id, $_POST['title'], $_POST['content'], $_POST['data'], $image);
            header("Location: index.php");
        }
        
        $article = article_get($link, $id);
        include("../views/article_admin.php");
    } else if ($action == "delete"){
        $id = $_GET['id'];
        article_delete($link, $id);
        header("Location: index.php");
    }
    else{
        $articles = article_all($link);
        include("../views/articles_admin.php");
    }
    
?>
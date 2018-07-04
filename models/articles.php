<?php
    header("Content-Type: text/html; charset=utf-8");
    function article_all($link){
        // Запрос
        $query = "SELECT * FROM `articles` ORDER BY id DESC";
        $result = mysqli_query($link, $query);
        
        if (!$result)
            die(mysqli_error($link));
        
        // Извлечение из БД
        $n = mysqli_num_rows($result);
        $articles = array();
        
        for ($i = 0; $i < $n; $i++){
            $row = mysqli_fetch_assoc($result);
            $articles[] =$row;
        }
        
        return $articles;
    }

    function article_get($link, $id_article){
        // Запрос
        $query = "SELECT * FROM `articles` WHERE id=".(int)$id_article;
        $result = mysqli_query($link, $query);
        
        if (!$result)
            die(mysqli_error($link));

        $article = mysqli_fetch_assoc($result);
        
        return $article;
    }

    function article_new($link, $title, $content, $data, $image){
        // Подготовка
        $title = trim($title);
        $content = trim($content);
        $image = trim($image);
     
        // Проверка
        if ($title == '')
            return false;

        // Запрос
        $t=  ("INSERT INTO articles (title, content, data, image) VALUES ('%s', '%s', '%s', '%s')");     
        
        $query=sprintf($t, 
            mysqli_real_escape_string($link, $title),
            mysqli_real_escape_string($link, $content),
            mysqli_real_escape_string($link, $data),
            mysqli_real_escape_string($link, $image));
        
        $qresult = mysqli_query($link, $query); 

        if(!$qresult)
            die(mysqli_error($link));

        return  true;
    }

    function article_edit($link, $id, $title, $content, $data, $image){
        // Подготовка
        $title = trim($title);
        $content = trim($content);
        $data = trim($data);
        $id = (int)$id;
        
        // Проверка
        if ($title == '')
            return false;
        
        // Запрос
        $sql = "UPDATE articles SET title='%s', content='%s', data='%s', image='%s' WHERE id = %d";
        
        $query = sprintf($sql, 
            mysqli_real_escape_string($link, $title),  
            mysqli_real_escape_string($link, $content),
            mysqli_real_escape_string($link, $data),
            mysqli_real_escape_string($link, $image), $id);
        
        $result = mysqli_query($link, $query);;
        if (!$result)
            die(mysqli_error($link));
            
        return mysqli_affected_rows($link);
    }

    function article_delete($link, $id){
        // Подготовка
        $id = (int)$id;
        
        // Проверка
        if ($id == '')
            return false;
        
        $query = sprintf("DELETE FROM articles WHERE id=%d", (int)$id);
        $result = mysqli_query($link, $query);
        
        if (!$result)
            die(mysqli_error($link));

        return mysqli_affected_rows($link);        
    }

    function article_intro($text, $len = 500){
        return mb_substr($text, 0, $len);
    }
?>
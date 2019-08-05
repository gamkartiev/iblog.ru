<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <title>Мой первый блог</title>
        <link rel="stylesheet" type="text/css" href="../style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   </head>
    <body>
        <div class="container">
            <h1>Мой первый блог</h1>
            <h3>Форма добавления статьи</h3>
            <div>
                <form class="form-horizontal" method="post" enctype="multipart/form-data" action="index.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>" >
                    <div class="form-group">
                    <label>
                        Название
                        <input type="text" name="title" value="<?=$article['title']?>" class="form-control" autofocus required>
                    </label>
                    </div>
                    <div class="form-group">
                    <label>
                        Дата
                        <input type="date" name="data" value="<?=$article['data']?>" class="form-control" required>
                    </label>
                    </div>
                    <div class="form-group">
                    <label>
                        Содержимое
                        <textarea name="content" class="form-control" required><?=$article['content']?></textarea>
                    </label>
                    <label>
                        <input type="file" name="upload" value="<?=$article['image']?>">
                        <input type="hidden" name="image" value="<?=$article['image']?>">
                    </label> <br/>
                    </div>
                    <input type="submit" value="Сохранить" class="btn">
                </form>
            </div>
            <div class="footer">
                <p>Мой первый блог<br>Copyright &copy; 2016</p>
            </div>
        </div>
    </body>
</html>
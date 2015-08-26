<?php
require_once('lib.php');

if(isset($_GET['file'])){
    //Получение названия файла
    $edit_file = clearInput($_GET['file'],'s');

    // Проверка на наличие файла в папке
    if(!check_file($edit_file,$files)){
        $errors[] = "Такого файла не существует!";
    }
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1000">
    <title>Просмотр</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="wrap">
    <div class="container">
        <h3>Просмотр текста</h3>
        <div>
            <?php
            echo file_read($edit_file);
            ?>

        </div>
        <a class="btn btn-back" href="index.php">вернуться на  галаную</a>
    </div>
</div>
</body>
</html>

<?php
require('lib.php');
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1000">
    <title>Главная</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="wrap">
    <div class="container">
        <h1>Задание 2</h1>

        <form action="dump.php" method="post">
            <div class="form-group">
                <label for="">Выберите таблицу</label>
                <select name="tables_name" >
                    <?php
                    show_all_tables($dbh);
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Выберите формат</label>

                <select name="format" >
                    <option value="csv">CSV</option>
                    <option value="xml">XML</option>
                    <option value="json">JSON</option>
                </select>
            </div>
            <div class="form-group">
                <input class="btn btn-success" type="submit" value="Экспортировать">
            </div>
        </form>

</div>
</body>
</html>

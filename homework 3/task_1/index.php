<?php
require_once('lib.php');
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
            <h1>Здравствуй, повелитель!</h1>
            <h3>Изменяй текст полностью =)</h3>
            <div>
                <a class="btn btn-success" href="add_file.php">Добавить файл</a>
            </div>
            <table class="table">
                <tbody>
                    <?php   foreach ($files as $file): ?>
                        <tr>
                            <td><a href="view.php?file=<?=$file ?>"><?=$file ?></a></td>
                            <td><a href="edit.php?file=<?=$file ?>">Редактировать</a></td>
                            <td><a href="delete.php?file=<?=$file ?>">Удалить</a></td>
                        </tr>
                     <?php    endforeach; ?>

                </tbody>
            </table>
    </div>
</div>
</body>
</html>

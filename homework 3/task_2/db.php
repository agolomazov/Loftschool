<?php

$dsn = 'mysql:dbname=loft_catalog;host=127.0.0.1';
$user = 'eugene';
$password = '12345';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Подключение не удалось: ' . $e->getMessage();
}

$sth = $dbh->query("SET NAMES 'utf8'");
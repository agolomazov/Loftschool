<?php
require_once('db.php');
require_once('lib.php');

if(isset($_POST['tables_name']) && isset($_POST['format']))
{
    $table_name = clearInput($_POST['tables_name'],'s');
    $format = clearInput($_POST['format'],'s');

    export($table_name,$format,$dbh);
}

?>
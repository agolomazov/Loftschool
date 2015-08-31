<?php
require_once('db.php');

    function show_all_tables($dbh)
    {
        $result = $dbh->query("show tables");

        while ($row = $result->fetch(PDO::FETCH_NUM)) {
            echo "<option>" . $row[0] . "</option>";
        }
    }

function clearInput($data, $type = 's'){

    switch($type){
        case 'i+':
            $data = abs((int)$data); break;
        case 'i':
            $data = (int)($data); break;
        case 'd':
            $data = (double)$data; break;
        case 's':
            $data = trim(strip_tags($data)); break;

    }
    return $data;
}

function export($table,$format,$dbh)
{
//Здесь закоментить
    $sth = $dbh->prepare("SELECT * FROM $table");

// Это раскоментить
//    $sth = $dbh->prepare("SELECT * FROM :table");
//    $sth->bindParam(':table', $table, PDO::PARAM_STR, 12);

    $sth->execute();

    while ($row = $sth->fetch(PDO::FETCH_NUM)) {
        $emparray[] = $row;
    }

// Это раскоментить
//    var_dump($emparray);
//    exit;

    if($format == 'csv'){

        $file_path = "tmp/$table.csv";
        $fp = fopen($file_path, 'w+');

        foreach ($emparray as $fields) {
            fputcsv($fp, $fields);
        }

        fclose($fp);

        file_dwonload($file_path);
       // unlink($file);
    }

    if($format == 'json') {
        $content = json_encode($emparray);

        $file_path = file_create($table,$format,$content);

        file_dwonload($file_path);

       // unlink($file);
    }

    if($format == 'xml'){
        $dom = new DOMDocument('1.0', 'UTF-8');

        $root = $dom->createElement($table);

        $dom->appendChild($root);

        foreach($emparray as $key => $element){
            $table_name = $dom->createElement('table');
            $root->appendChild($table_name);

            foreach($element as $key2 => $value){
                $column = $dom->createElement('column', $value);
                $table_name->appendChild($column);
            }
        }
        $file_xml = "tmp/{$table}.xml";

        $dom->save($file_xml);

//       header('Content-Type: text/xml');
//        echo $dom->saveXML();

        file_dwonload($file_xml);
    }
}

function file_create($name,$format,$content)
{
    $file = "tmp/{$name}.{$format}";

    file_put_contents($file, $content);

    return $file;
}

function file_dwonload($file_)
{
    header("Content-Disposition: attachment; filename=\"" . basename($file_) . "\"");
    header("Content-Type: application/force-download");
    header("Content-Length: " . filesize($file_));
    header("Connection: close");
}

?>
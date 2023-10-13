<?php
define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'production');

header('Access-Control-Allow-Origin: *');

require_once('./database/database.php');
$tableName = 'diaryEntries';
$path = './database.db';

// createTable('./database.db', "  
// $tableName(id integer primary key, entry)
// "); 

//insertIntoDatabase($path, 'INSERT INTO ' . $tableName . ' (entry) VALUES ("this is a test");');


$rows = selectFromDataBase($path, "SELECT * FROM $tableName");
//var_dump($rows);
$diaryEntries = [];
if(count($rows)>0) {
    foreach ($rows as $row => $value) {
        array_push($diaryEntries, $value);
    }
    echo json_encode($diaryEntries);
}
?>
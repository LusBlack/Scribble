<?php

if(!class_exists('database')) {
   
    class database extends SQLite3 {
         //to interact with sqlite datbase
        function __construct($path) {
            $this->open($path);
        }
    }

}
//creates a table in db
function createTable($path, $tableData) {
    $db = new database($path);
    if (!$db) {
        echo 'ERROR: Database does not exist';
        exit();
    }
    $sql = "CREATE TABLE ". $tableData . ";";
    $response = $db->exec($sql);
    if ($response == false) {
        echo "ERROR! Table creation failed";
        die();
    } else {   
        echo "Sql : " . $sql . " \n has been run successfully";
    }
}
function InsertIntoDatabase($path, $sql) {
    $db = new database($path);
    if(!$db) {
        echo 'ERROR: Database does not exist';
        exit();
    }
    $response = $db->exec($sql);
    if($response == false) {
        echo "ERROR! insert statement, failed";
        die();
    } else {
        echo "sql : " . $sql . " \n has been run successfully";
    }
}

function deleteFromDatabase($path, $sql) {
    $db = new database($path);
    if(!$db) {
        echo 'ERROR: Database does not exist';
        exit();
    }
    $response = $db->exec($sql);
    if($response == false) {
        echo "ERROR! Delete statement, failed";
        die();
    } else {
        echo "sql : " . $sql . " \n has been run successfully";
    }
}

function selectFromDataBase($path, $sql) {
    $db = new database($path);
    if(!$db) {
        echo "ERROR: Database does not exist";
        exit();
    }
    $response = $db->query($sql);
    if($response == false) {
        echo "ERROR! select failed";
        die();
    }
    $data = [];
    while($row = $response->fetchArray(SQLITE3_ASSOC))
    array_push($data, $row);
return $data;
}
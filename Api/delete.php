<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: *");

require_once('./database/database.php');
$tableName = 'diaryEntries';
$path = './database.db';

// if($_POST['id']) {
//     $id = intval($_POST['id']);
//     deleteFromDatabase($path, '
//     DELETE FROM '. $tableName, ' WHERE id = ' . $id . '; ');
// }

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $sql = 'DELETE FROM ' . $tableName . ' WHERE id = ' . $id;
    deleteFromDatabase($path, $sql);
}

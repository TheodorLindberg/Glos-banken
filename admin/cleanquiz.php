<?php

echo "This page will clean all the websites quizes";
include_once '../program-files/db/dbh-conn.php';

$mysqli = new SimpleMySQLi("localhost", "root", "", "glosbanken", "utf8mb4", "assoc");
$rows = $mysqli->query("DELETE FROM quizes");
echo $rows->affectedRows()."Rows deleted";

$rows = $mysqli->query("DELETE FROM userquizhistory");
echo $rows->affectedRows()."Rows deleted";


function recursiveRemove($dir) {
    $structure = glob(rtrim($dir, "/").'/*');
    if (is_array($structure)) {
        foreach($structure as $file) {
            if (is_dir($file)) recursiveRemove($file);
            elseif (is_file($file)) unlink($file);
        }
    }
    rmdir($dir);
}

recursiveRemove("../source/quizes/");
mkdir("../source/quizes/");

echo "\nDone, Removed all quizes from database and in c:drive \n";
echo "<a href='../'>Click to go back</a>";
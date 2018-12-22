<?php
echo "This page will clean all the websites quizes";
include_once '../program-files/db/dbh-conn.php';

$mysqli = new SimpleMySQLi("localhost", "root", "", "glosbanken", "utf8mb4", "assoc");
$rows = $mysqli->query("DELETE FROM users");
echo $rows->affectedRows()." Users deleted";

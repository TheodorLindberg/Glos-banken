
<?php

session_start();
$RootFolderPath= "../../";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../source/css/header.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <title>Document</title>
</head>
<body>
    <?php
    include_once "../header.php";

        include_once '../../program-files/db/dbh-conn.php';
        $mysqli = new SimpleMySQLi("localhost", "root", "", "glosbanken", "utf8mb4", "assoc");

            $arr = $mysqli->query("SELECT * FROM quizes WHERE creatorID=?", [$_SESSION['u_id']])->fetchAll("assoc");
 
            echo "You have: ".$mysqli->numRows(). " Quize(s)";

            
            echo "<table>";
            foreach($arr as $row_users){
                echo "<tr><td>
                      <a href="."../../".$row_users['phpPath'].">".$row_users['quizname']."<a/>".
                     "</td></tr>";
            }
            echo "</table>";
    ?>
</body>
</html>

    
		
<!-- Home page of the website-->
<?php
    session_start();
	//We need to have a session started on ALL pages
	if (!isset($_SESSION['u_id'])) {
        //Realized it is not possible to get here but if this code somehow gets runned without anyone logged in it will take you to some random page
        header("Location: Hacker?");
    } 
    $RootFolderPath= "../";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../source/css/header.css" type="text/css">
    <link rel="stylesheet" href="../source/css/style.css" type="text/css">
    <link rel="stylesheet" href="../source/css/homepage.css" type="text/css">
    <title>Glosbanken</title>
</head>
<body>
    <?php
        //Header
        include_once 'header.php';
    ?>

    <div class="grid">
        <div class="news">News  
        </div>
        <div class="mainContent">MainContent</div>
        <div class="recent">Recent
        <br>
        <?php include_once '../program-files/home/profile/quizes/loadrecent.php';?>
        </div>
        <div class="newFeaturs">New featurs</div>
        <div class="needPractise">Need practise</div>
        <div class="underMain">Under main</div>
    </div>
</body>
</html>
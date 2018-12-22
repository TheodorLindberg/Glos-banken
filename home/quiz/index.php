<?php
session_start();
if(!isset($RootFolderPath)){
    echo "Page is in progress";    
    exit();
}
include_once $RootFolderPath."program-files/quiz/quizes/js-file-encryption.php";
$data = readQuizInfoFromJs($JsFilepath);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo $RootFolderPath;?>source/css/header.css">
    <title>Document</title>
</head>
<body>
    <?php  include_once $RootFolderPath."home/header.php"; ?>
  
  
  </body>
</html>
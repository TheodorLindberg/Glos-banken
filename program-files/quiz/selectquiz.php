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
    <h1>Quizname: <?php echo $data["quizname"];?></h1> 
    <br>
    <p>Lang1: <?php echo $data["lang1"];?>     <br>  Lang2: <?php echo $data["lang2"];?></p> 
    <button id="startquiz">Start normal quiz</button> 
    <p>Other featurs will come soon</p>     
    <br>
    <br>
    <p>Edit which questions you want to practise</p>
    <br>
    <p style="float:left">Star from </p>
    <input id="star-unstar-from" style="float:left"type="number" min="0" max="<?php echo count($data['questionsAnswers']);?>" value="0">
    <p style="float:left"> To </p>
    <input id="star-unstar-to" style="float:left" type="number" min="0" max="<?php echo count($data['questionsAnswers']);?>" value="<?php echo (ceil(count($data['questionsAnswers'])/2));?>">
    <button id="star-unstar">Star</button>
    <br>
    <button id="star-unstar-all">Star/Unstar all</button>
    <p>
    <div id="questions">
    <?php
    foreach($data["questionsAnswers"] as $datas){
       
        echo '
        <div style="width:600px; background-color: lightgrey;">
            <div class="questions-question1" style="overflow: auto;float:left;padding:5px; width:200px; background-color: lightgrey; border:1px solid black">
                <p class="vals1">'.$datas[0].'</p>
            </div>
            <div class="questions-question2" style="overflow: auto;float:left;padding:5px; width:200px; background-color: lightgrey; border:1px solid black">
                <p class="vals2">'.$datas[1].'</p>
            </div>
            <label style="float:left; margin:5px;" for="startquestion">Star question</label>
            <input class="questions-star"style="float:left; margin:5px;"type="checkbox" name="startquestion">
        </div>';
    }
    ?>
    </div>
    </p>
    <form action="quiz/" method="POST" style="display:none">
        <input type="hidden" name="questions" id="post-questions">
        <input type="hidden" name="answers" id="post-answers">
        <button type="submit" name="submit" id="post-submit"></button>
    </form>

    <script src="<?php echo $RootFolderPath;?>source/external js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo $RootFolderPath;?>program-files/quiz/selectquiz.js">

    </script>
</body>
</html>
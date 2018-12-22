<?php
    //We need to have a session started on ALL pages
    session_start();
	if (!isset($_SESSION['u_id'])) {
        //check if the user is logged in else send it back to the start page and let the index.php file decide what to do
        header("Location: ../");
    } 
    //This varible is used in every document included in this file thats need to access files from the root folder
    if(!isset($RootFolderPath))
    {
        $RootFolderPath = "../../../";
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../source/css/header.css" type="text/css">
    <link rel="stylesheet" href="../../../source/css/style.css" type="text/css">
    <title>Glosbanken</title>
</head>
<body>
    <?php 
        include_once "../../header.php";
    ?>
    <!-- Template for question input form -->
    <div id="uploadquiz-QuestionInputFormTemplate" style="display:none;">
        <li class="uploadquiz-QuestionInputForm">
            <br>
            <p class="uploadquiz-QuestionInputForm-number">Question number</p>
            <input type="text" name="lang1"placeholder="lang1" class="uploadquiz-QuestionInputForm-lang1 uploadquiz-QuestionInputForm-lang">
            <input type="text" name="lang2"placeholder="lang2" class="uploadquiz-QuestionInputForm-lang2 uploadquiz-QuestionInputForm-lang">
            <button class="uploadquiz-QuestionInputForm-remove">remove question</button>
            <button class ="uploadquiz-QuestionInputForm-swap">Swap</button>
        </li>
    </div>  
    <div id="uploaddiv">
    <label for="uploadquiz-quizName">Enter name of quiz</label>
    <input type="text" id="uploadquiz-quizName">
    <button onclick="uploadquiz()">Upload quiz</button>
    <br>
    <br>
    <br>
    <label for="uploadquiz-lang1">Enter Language 1</label>
    <select id="uploadquiz-lang1">
        <option value="swedish">Svenska</option>
        <option value="english">Engelska</option>
        <option value="spanish">Spanska</option>
        <option value="france">Franska</option>
    </select>
<br>
    <label for="uploadquiz-lang2">Enter Language 2</label>
    <select id="uploadquiz-lang2">
        <option value="swedish">Svenska</option>
        <option value="english">Engelska</option>
        <option value="spanish">Spanska</option>
        <option value="france">Franska</option>
    </select>
    <br>
    <label for="quizQuestionAmount">Enter how many questions you will have</label>
    <input type="text" name="quizQuestionAmount" id="uploadquiz-quizQuestionAmount" placeholder="Enter amount of questions" style="margin-top:50px; margin-bottom:50px; width:200px;"  min="1" max="100">

    <br>
    <label for="rawData">Enter raw data if you want</label>
    <br>
    <textarea name="test" id="rawData" cols="30" rows="10"></textarea>
    <br>
    <button id="rawData-submitButton">Click here to inser your raw data</button>
    <br>
    <p style="display:none;" id="rawData-submitButton-result"></p>
    <br>
    <button id="swapQuestions">Click here to swap questions</button>


    <ul id="uploadquiz-questionList">

    </ul>
    
    </div>
    <div id="resultdiv" style="display:none;">
        <p></p>
        <a href="">Click this link to test your quiz</a>
    </div>
</body>
    <script src="../../../source/external js/jquery-3.3.1.min.js"></script>
    <script>
    function loadScript(url, callback) {
        var head = document.getElementsByTagName('head')[0];
        var script = document.createElement('script');

        script.type = 'text/javascript';
        script.src = url;
        script.onreadystatechange = callback;
        script.onload = callback;
        head.appendChild(script);
    }
        loadScript("../../../program-files/quiz/upload/upload.js",function(){});
    </script>
</html> 
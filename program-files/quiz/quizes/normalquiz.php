<?php
    //We need to have a session started on ALL pages
    session_start();
	if (!isset($_SESSION['u_id'])) {
        //check if the user is logged in else send it back to the start page and let the index.php file decide what to do
        header("Location: ../?x=quiz/normalquiz.php");
    } 
    //This varible is used in every document included in this file thats need to access files from the root folder
    
    if(!isset($RootFolderPath))
    {
        $RootFolderPath = "../";
    }
    else {
        $IsIncluded = "true";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo $RootFolderPath;?>source/css/header.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $RootFolderPath;?>source/css/style.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $RootFolderPath;?>source/css/normalquizstyle.css">
    <title>Glosbanken</title>
</head>
<body>
    <?php
        //Header
        if(isset($IsIncluded))
        {
            
            include_once $RootFolderPath.'home/header.php';
        }else {
            include_once '../home/header.php';
        }
    ?>
    <div class="glos-frame">
        <p id="glos-questions-state"></p>
        <div>
            <p id="glos-current-question"></p>
        </div>
        <p id="glos-endresult" style="display:none;"></p>
        <button id="glos-plagAgain-button" style="display:none" >Play again</button>
        <div id="glos-forminput">
            <input type="text" placeholder="" id="glos-form-textinput" class="glosinputfield">
            <button id="glos-form-submit-answer">Submit</button>
        </div>
        <div id="glos-answer">
            <p id="glos-answer-user"></p>
            <p id="glos-answer-correct"></p>
            <button id="glos-question-next">Next question</button>
            <button id="glos-question-again">Try again</button>
        </div>
    </div>
    <script src="<?php echo $RootFolderPath?>source/external js/jquery-3.3.1.min.js"></script>
    <script>
    function loadScript(url, callback)
    {
            var head   = document.getElementsByTagName('head')[0];
            var script = document.createElement('script');
  
            script.type               = 'text/javascript';
            script.src                = url;
            script.onreadystatechange = callback;
            script.onload             = callback;
            head.appendChild(script);
        }
            <?php
            if(isset($IsIncluded))
            {
                echo "var SQLRightAnswers=[".$_POST['answers']."];";
                echo "\n";

                echo "var SQLQuestion=[".$_POST['questions']."];";
                echo "\n";
            }
            else {
            }
            ?>
            loadScript("<?php echo($RootFolderPath)?>program-files/quiz/quizes/normalquiz.js",function(){});
/*
        $.ajax({
            method: "POST",
            url: "<?php echo $RootFolderPath.'quiz/updateuserquiz.php';?>",
            data: {"quizid": quiz_id},
            success: function(responseText) {
                console.log(responseText);
            }
        });*/
    //include_once ;
        
    </script>
</body>
</html>
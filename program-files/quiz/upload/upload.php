<?php
    session_start();
    if(!isset($_SESSION['u_id'])){
        echo "not loggedin";
    } 
    if(!(isset($_POST['questions']) && 
        isset($_POST['corranswer']) && 
        isset($_POST['quizname']) &&
        isset($_POST['lang1']) &&
        isset($_POST['lang2']) )){
        
        echo "empty";
        exit();    
    }

        include_once "../../db/dbh-conn.php";
        
        $quizname = $_POST['quizname'];
        $questions = $_POST['questions'];
        $correctanswer = $_POST['corranswer'];
        $lang1 = $_POST['lang1'];
        $lang2 = $_POST['lang2'];
        $quiznameURL = str_replace(" ","+",$quizname, $s);
        //echo $quiznameURL;
        
        $PathToQuiz = "../../../source/quizes/";

        $folderID = uniqid();
        $PathToPHPFile = $PathToQuiz . $folderID .'/'. $quiznameURL.".php";
        $PathToPHPFileFromRoot = "source/quizes/".$folderID .'/'. $quiznameURL.".php";

        $mysqli = new SimpleMySQLi("localhost", "root", "", "glosbanken", "utf8mb4", "assoc");

        $insert = $mysqli->query("INSERT INTO quizes (id, phpPath, quizname, lang1, lang2, creatorID)
                                  VALUES (?, ?, ?, ?, ?, ?);", 
                                  [$folderID, $PathToPHPFileFromRoot,$quizname,$lang1,$lang2, $_SESSION['u_id']]);
        //echo $insert->affectedRows();

        $arr = $mysqli->query("SELECT quiz_id FROM quizes WHERE id=?;", $folderID)->fetch("assoc");
        
        $quizid = $arr['quiz_id'];
         
        mkdir($PathToQuiz . $folderID);        


        
        $phpfile = fopen($PathToPHPFile, "w") or die("Unable to open file!");

        fwrite($phpfile, "<?php\n");
        fwrite($phpfile, '$RootFolderPath = "../../../";'."\n");
        fwrite($phpfile, '$JsFilepath = "'.$quizname.'.txt";'."\n");
        fwrite($phpfile, 'include_once("../../../program-files/quiz/selectquiz.php");'."\n");
       
        fclose($phpfile);
        mkdir($PathToQuiz . $folderID."/quiz");
        $phpfile = fopen($PathToQuiz . $folderID."/quiz/index.php", "w") or die("Unable to open file!");

        fwrite($phpfile, "<?php\n");
        fwrite($phpfile, '$RootFolderPath = "../../../../";'."\n");
        fwrite($phpfile, 'include_once("../../../../program-files/quiz/quizes/normalquiz.php");'."\n");
       
        fclose($phpfile);

        //File encryption here
        include_once '../quizes/js-file-encryption.php';
        writeQuizInfoToJs($PathToQuiz, $folderID,$quizname,$questions,$correctanswer,$quizid,$lang1,$lang2);
        
        echo "1,";
        echo "source/quizes/".$folderID .'/'. $quizname.".php";
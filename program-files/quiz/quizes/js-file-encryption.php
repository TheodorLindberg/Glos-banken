<?php

function writeQuizInfoToJs($PathToQuiz, $folderID,$quizname,$questions,$correctanswer,$quizid,$lang1,$lang2){
    $jsfile = fopen($PathToQuiz . $folderID .'/'.$quizname.".txt", "w") or die("Unable to open file!");

        
        $first = true;
        foreach ($questions as $question) {
            if($first == true){
                fwrite($jsfile,  $question);
                $first = false;
            } else {
                fwrite($jsfile, '½'. $question);
            }
        }
        
        fwrite($jsfile, "\n");
        

        $first = true;
        foreach ($correctanswer as $answer) {
            if($first == true){
                $first = false;
                fwrite($jsfile,  $answer);
            } else {
                fwrite($jsfile, '½'. $answer);
            }
        }

        fwrite($jsfile, "\n");

        fwrite($jsfile, $lang1."\n");
        fwrite($jsfile, $lang2."\n");
        fwrite($jsfile, $quizname."\n");
        fwrite($jsfile, $folderID."\n");
        fwrite($jsfile, $quizid."\n");
        fclose($jsfile);
}
//readQuizInfoFromJs("../../../source/quizes/5bc1bdf711e9e/test.txt");
function readQuizInfoFromJs($PathToFile){
    $data; 
    $rawdata;
    $txtfile = fopen($PathToFile, "r") or die("Unable to open file!");
    if ($txtfile) {
        while (($line = fgets($txtfile)) !== false) {
            $rawdata[] = $line;
        }
        fclose($txtfile);
    } else {
        // error opening the file.
    } 
    //var_dump($rawdata);
    $questions =  (explode("½",$rawdata[0]));
    $answers =  (explode("½",$rawdata[1]));
    $questionsAnswers;

    for($i = 0; $i < count($questions); $i++){
        $questionsAnswers[] = array( $questions[$i],$answers[$i]);
    }

    $data["questionsAnswers"] = $questionsAnswers;
    $data["lang1"] = $rawdata[2];
    $data["lang2"] = $rawdata[3];
    $data["quizname"] = $rawdata[4];
    $data["folderID"] = $rawdata[5];
    $data["quizid"] = $rawdata[6];
  
    return $data;
 
}
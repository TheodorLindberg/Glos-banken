<?php
if(!isset($RootFolderPath))
{
    $RootFolderPath = "../../../../";
}


include_once $RootFolderPath.'program-files/db/dbh-conn.php';

class LoadRecent
{
    private $mysqli;
    private $RootFolderPath;

    public function __construct($RootFolderPath)
    {
        $this->RootFolderPath = $RootFolderPath;
        $this->mysqli = new SimpleMySQLi("localhost", "root", "", "glosbanken", "utf8mb4", "assoc");
    }
    public function GetRecent()
    {
        $recentQuizes = $this->mysqli->query("SELECT * from userquizhistory where u_id=? order by lastload desc;", $_SESSION['u_id'])->fetchAll("assoc");
        return $recentQuizes;
    }
    public function PrintRecent()
    {
        $recentQuizes = $this->GetRecent();
        $recentQuizNum = count($recentQuizes);
        if($recentQuizNum > 0)
        {
            $quizids = array();

            foreach($recentQuizes as $quiz) {
                $quizids[] = $quiz['quiz_id'];
            }
            
            $sql = "SELECT * from quizes where ";
            
            $first = true;
            foreach($quizids as $quizid)
            {
                if($first)
                {
                    $sql .= "quiz_id=".$quizid." ";
                    $first= false;
                }
                else {
                    $sql .= " OR quiz_id=".$quizid;
                }
            }
            $sql .= ";";
            $RecentQuizInformation = $this->mysqli->query($sql)->fetchAll("assoc");
            foreach($RecentQuizInformation as $information) {
                echo 'Quiz: <a href="'. $this->RootFolderPath.$information['phpPath'].'">'.$information['quizname']."</a><br>";
            }
            echo "<br>";

        }
        else {
            echo '<a href="'.$RootFolderPath.'uploadquiz.php">Click here to create a quiz</a><br>';
        }
    }
}

$recent = new LoadRecent($RootFolderPath);
$recent->PrintRecent();
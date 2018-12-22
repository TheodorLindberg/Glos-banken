//Javascript file for normalquiz
//Giving each element from the html form a refrence in this js file P = pointer
var glosFrameP = document.getElementById("glos-frame");
var questionsStateP = document.getElementById("glos-questions-state");
var currentQuestionP = document.getElementById("glos-current-question");
var EndResultP = document.getElementById("glos-endresult");
var PlayAgainButtonP = document.getElementById("glos-plagAgain-button");

var formInputDivP = document.getElementById("glos-forminput");
var textInputP = document.getElementById("glos-form-textinput");
var submitAnswerP = document.getElementById("glos-form-submit-answer");

var answerDivP = document.getElementById("glos-answer");
var userAnswerP = document.getElementById("glos-answer-user");
var correctAnswerP = document.getElementById("glos-answer-correct");
var nextQuestionP = document.getElementById("glos-question-next");
var repeatQuestionP = document.getElementById("glos-question-again");

/*Startup code*/
//This can be removed(replace the array with the SQL verison) but i want the intelisense to work 

//Importing the glos test information 
var correctAnswers = Array(SQLRightAnswers.length);
var questions = Array(SQLQuestion.length);

answerDivP.style.display = "none";
formInputDivP.style.display = "block";

for (var i = 0; i < SQLRightAnswers.length; i++) {
    correctAnswers[i] = SQLRightAnswers[i];
}

for (var i = 0; i < SQLQuestion.length; i++) {
    questions[i] = SQLQuestion[i];
}

function ResetToDefault() {
    PlayAgainButtonP.style.display = "none";
    EndResultP.style.display = "none";
}

//Defining other varibels needed for the script

var totalQuestions = questions.length;
var currentQuestion = 0;
var usersAnswers = [];
var tabQue = [];


//event functions

repeatQuestionP.onmousedown = repeatQuestion;
nextQuestionP.onmousedown = nextQuestion;
submitAnswerP.onmousedown = answerHandelar;
//event functions code

repeatQuestionP.addEventListener("keypress", function(event) {
    if (event.keyCode === 13) {
        repeatQuestion();
    }
});

nextQuestionP.addEventListener("keypress", function(event) {
    if (event.keyCode === 13) {
        nextQuestion();
    }
});

textInputP.addEventListener("keypress", function(event) {
    if (event.keyCode === 13) {
        answerHandelar();
    }
});
document.addEventListener("keyup", function(event) {
    if (event.keyCode === 9) {
        if (tabQue.length > 0) {
            document.getElementById(tabQue[0]).focus();

        }
    }
});
showquestion(1);

//other functions
function showEndScreen() {
    answerDivP.style.display = "none";
    formInputDivP.style.display = "none";

    currentQuestionP.innerText = "You are finish";
    questionsStateP.style.display = "none";
    EndResultP.style.display = "block";
    EndResultP.innerText = "Result: " + usersAnswers;
    console.log(PlayAgainButtonP);
    PlayAgainButtonP.style.display = "block";
    PlayAgainButtonP.onclick = ResetAndStartOver;
    console.log(usersAnswers);
}

function ResetAndStartOver() {
    ResetToDefault();
    usersAnswers = [];
    showquestion(1);
    console.log("s");
}

function checkForFinish() {
    return (currentQuestion == totalQuestions)
}

function showquestion(question) {
    answerDivP.style.display = "none";
    formInputDivP.style.display = "block";

    textInputP.focus();
    textInputP.value = "";
    if (currentQuestion < question) {
        usersAnswers[question - 1] = [];
    }
    currentQuestion = question;

    currentQuestionP.innerText = questions[question - 1];
    questionsStateP.innerText = "Question: " + question + "/" + totalQuestions;

}

function answerHandelar() {
    var IsCorrect = false;
    var answer = textInputP.value;
    var correctAnswer = correctAnswers[currentQuestion - 1];
    if (String(answer).toLowerCase() == String(correctAnswer).toLowerCase()) {
        IsCorrect = true;
    }
    usersAnswers[currentQuestion - 1].push(answer);

    correctAnswerP.style.color = "green";

    answerDivP.style.display = "block";
    formInputDivP.style.display = "none";

    userAnswerP.innerText = "Your answer: " + answer;
    correctAnswerP.innerText = "Correct answer " + correctAnswer;
    if (IsCorrect) {
        userAnswerP.style.color = "green";
        nextQuestionP.focus();
    } else {
        userAnswerP.style.color = "red";
        nextQuestionP.focus();
    }
    if (checkForFinish()) {
        nextQuestionP.innerText = "Proceed to endscreen";
        nextQuestionP.focus();
    }
}

function nextQuestion() {
    if (!checkForFinish()) {
        showquestion(currentQuestion + 1);
    } else {
        showEndScreen();
    }
}

function repeatQuestion() {
    showquestion(currentQuestion);
}

//Code for the program
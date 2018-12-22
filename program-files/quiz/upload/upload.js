var QuestionInputFormTemplateP = document.getElementById("uploadquiz-QuestionInputFormTemplate");
var QuestionListP = document.getElementById("uploadquiz-questionList");
var QuizQuestionAmountP = document.getElementById("uploadquiz-quizQuestionAmount");
var QuizNameP = document.getElementById("uploadquiz-quizName");

var SelectLang1p = document.getElementById("uploadquiz-lang1");
var SelectLang2p = document.getElementById("uploadquiz-lang2");

var QuestionInputFormC = QuestionListP.getElementsByClassName("uploadquiz-QuestionInputForm");
var QuestionNumberDisplayC = QuestionListP.getElementsByClassName("uploadquiz-QuestionInputForm-number");
var QuestionRemoveC = QuestionListP.getElementsByClassName("uploadquiz-QuestionInputForm-remove");
var QuestionLangC = QuestionListP.getElementsByClassName("uploadquiz-QuestionInputForm-lang");
var QuestionLang1C = QuestionListP.getElementsByClassName("uploadquiz-QuestionInputForm-lang1");
var QuestionLang2C = QuestionListP.getElementsByClassName("uploadquiz-QuestionInputForm-lang2");

var rawDatap = document.getElementById("rawData");
var rawDataButtonP = document.getElementById("rawData-submitButton");
var rawDataResult = document.getElementById("rawData-submitButton-result");


//This function fix the questions so they are in number order.
function FixQuestionNumber() {
    for (var i = 0; i < QuestionNumberDisplayC.length; i++) {
        QuestionNumberDisplayC[i].innerHTML = "Question number: " + (i + 1);
    }
}

function UpdateLangDisplay() {
    var lang1 = SelectLang1p.value;
    var lang2 = SelectLang2p.value;
    for (var i = 0; i < QuestionLang1C.length; i++) {
        QuestionLang1C[i].placeholder = lang1;
        QuestionLang2C[i].placeholder = lang2;
    }
}

function AddQuestionsToQuestionList(amount = 1, focus = false, items = 0) {
    if (items != 0) {
        amount = items.length / 2;
    }
    for (var i = 0; i < amount; i++) {
        //Create a clone from the template
        var clone = QuestionInputFormTemplateP.firstElementChild.cloneNode(true);
        //Add it to the question list
        QuestionListP.appendChild(clone);
    }
    //Check if the last added element should be focused
    if (focus) {
        //Then focus it
        QuestionListP.lastChild.getElementsByClassName('uploadquiz-QuestionInputForm-lang1')[0].focus();
    }
    FixQuestionNumber();
}

function GetQuestionArray() {
    var questions = [];
    for (var i = 0; i < QuestionInputFormC.length; i++) {
        var question = QuestionInputFormC[i].getElementsByTagName("input");
        if (question[0].value != "" && question[1].value != "") {
            questions.push(question[0].value);
        }
    }
    return questions;
}

function GetCorrectAnswersArray() {
    var questions = [];
    for (var i = 0; i < QuestionInputFormC.length; i++) {
        var question = QuestionInputFormC[i].getElementsByTagName("input");
        if (question[0].value != "" && question[1].value != "") {
            questions.push(question[1].value);
        }
    }
    return questions;
}
//This function will take a value and change the quizlist to have the same amount of questions
function CreateQuestions(value) {
    //Varible to store the current amount of questions
    var CurrentQuestions = QuestionListP.childElementCount;
    //Check if we have to add elements
    if (value > CurrentQuestions) {
        AddQuestionsToQuestionList(value - CurrentQuestions);
    } else {
        for (var i = CurrentQuestions; i > value; i--) {
            QuestionListP.lastChild.remove();
        }
    }

    FixQuestionNumber();
}
//So we start off with 2 questions
AddQuestionsToQuestionList(2);
UpdateLangDisplay();

//Code so the question remove button removes the question
$("#swapQuestions").click(function(event) {
    for (var i = 0; i < QuestionLang1C.length; i++) {
        var temp = QuestionLang1C[i].value;
        QuestionLang1C[i].value = QuestionLang2C[i].value;
        QuestionLang2C[i].value = temp;
    }
});
rawDataButtonP.addEventListener('click', function(event) {
    var data = rawDatap.value;
    var splitted = data.split("\n");
    splitted = splitted.filter(v => v != '');
    var questions = splitted.length / 2;

    if (!(questions % 1 === 0)) {
        alert("Missing last translation (odd amounts of sentences)");
    } else {

        CreateQuestions(questions);
        for (var i = 0; i < questions; i++) {
            QuestionLang1C[i].value = splitted[i * 2];
            QuestionLang2C[i].value = splitted[i * 2 + 1];
        }
    }
});
QuestionListP.addEventListener('click', function(event) {
    if (event.target.matches(".uploadquiz-QuestionInputForm-remove")) {
        event.target.parentNode.remove();
        FixQuestionNumber();
    } else if (event.target.matches(".uploadquiz-QuestionInputForm-swap")) {
        var par = event.target.parentNode;
        var lang1 = par.getElementsByClassName("uploadquiz-QuestionInputForm-lang1")[0];
        var lang2 = par.getElementsByClassName("uploadquiz-QuestionInputForm-lang2")[0];
        var temp = lang1.value;
        lang1.value = lang2.value;
        lang2.value = temp;
    }
});
SelectLang1p.addEventListener('change', function(event) {
    UpdateLangDisplay();
});
SelectLang2p.addEventListener('change', function() { UpdateLangDisplay(); });

QuestionListP.addEventListener('keydown', function(event) {
    //Check if tab is pressed
    if (event.keyCode == 9) {
        //Checks if the event is happening on a lang2 input
        if (event.target.matches(".uploadquiz-QuestionInputForm-lang2")) {
            //Prevents the tabbing que
            event.preventDefault();
            //Check if the target is the last lang2 input
            if (event.target.isSameNode(QuestionLang2C[QuestionLang2C.length - 1])) {
                //If it is we have to add a new element and tab to it
                AddQuestionsToQuestionList(1, true);
            } else {
                //A for loop to find out the index of the lang 2 input
                for (var i = 0; i < QuestionLang2C.length; i++) {
                    if (QuestionLang2C[i].isSameNode(event.target)) {
                        //Now we just get the lang 1 input from the next row and focus it
                        QuestionListP.getElementsByClassName('uploadquiz-QuestionInputForm-lang1')[i + 1].focus();
                    }
                }
            }
        }
    }
})


QuizQuestionAmountP.addEventListener("keypress", function(event) {
    if (event.keyCode === 13) {
        CreateQuestions(event.target.value);
    }
});

String.prototype.replaceAt = function(index, charcount) {
    return this.substr(0, index) + this.substr(index + charcount);
}

function uploadquiz() {
    var questions = GetQuestionArray();
    var correctanswers = GetCorrectAnswersArray();
    console.log(correctanswers);
    var quizname = QuizNameP.value;
    var lang1 = SelectLang1p.value;
    var lang2 = SelectLang2p.value;
    $.ajax({
        method: "POST",
        url: "../../../program-files/quiz/upload/upload.php",
        data: {
            "questions": questions,
            "corranswer": correctanswers,
            "quizname": quizname,
            "lang1": lang1,
            "lang2": lang2
        },
        success: function(responseText) {
            // you can console the responseText and do what ever you want with responseText
            console.log(responseText);
            document.getElementById("uploaddiv").style.display = "none";
            var resdiv = document.getElementById("resultdiv");
            resdiv.style.display = "block";
            if (responseText[0] == "1") {
                var s = "../../../";
                s += responseText.replaceAt(0, 2);
                console.log("s");
                resdiv.getElementsByTagName("p")[0].innerHTML = "Uploaded successfully";
                resdiv.getElementsByTagName("a")[0].href = s;
            } else {
                resdiv.getElementsByTagName("p")[0].innerHTML = "Something went wrong";
            }

        },
        error: function(jqXHR, status, error) {
            if (jqXHR.status === 0) {
                alert('Not connected.\nPlease verify your network connection.');
            } else if (jqXHR.status == 404) {
                alert('The requested page not found. [404]');
            } else if (jqXHR.status == 500) {
                alert('Internal Server Error [500].');
            } else if (exception === 'parsererror') {
                alert('Requested JSON parse failed.');
            } else if (exception === 'timeout') {
                alert('Time out error.');
            } else if (exception === 'abort') {
                alert('Ajax request aborted.');
            } else {
                alert('Uncaught Error.\n' + jqXHR.responseText);
            }
        }
    });

}
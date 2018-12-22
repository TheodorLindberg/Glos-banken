var arr = $(".questions-star");
for (var i = 0; i < arr.length; i++) {
    arr[i].checked = true;
}

$("#questions").change(function(event) {
    if (event.target.matches(".questions-star")) {
        if (event.target.checked) {
            event.target.parentNode.getElementsByClassName("questions-question1")[0].style.backgroundColor = "lightgrey";
            event.target.parentNode.getElementsByClassName("questions-question2")[0].style.backgroundColor = "lightgrey";
        } else {
            event.target.parentNode.getElementsByClassName("questions-question1")[0].style.backgroundColor = "white";
            event.target.parentNode.getElementsByClassName("questions-question2")[0].style.backgroundColor = "white";

        }

    }
});

$("#star-unstar-all").click(function(event) {
    var arr = $(".questions-star");
    var set = !arr[0].checked;
    for (var i = 0; i < arr.length; i++) {
        arr[i].checked = set;
    }
    FixAll();
});

$("#startquiz").click(function(event) {
    var checked = $(".questions-star");
    var questionsarr = document.getElementsByClassName("vals1");
    var answersarr = document.getElementsByClassName("vals2");
    var questions = "";
    var answers = "";
    var first = true;
    for (var i = 0; i < checked.length; i++) {
        if (checked[i].checked) {

            if (first) {
                first = false;
            } else {
                answers += ',';
                questions += ',';
            }
            answers += "'" + answersarr[i].innerHTML + "'";
            questions += "'" + questionsarr[i].innerHTML + "'";
        }
    }
    answers = answers.trim();
    questions = questions.trim();

    var answers = answers.split("\n");
    var answerstrim = "";
    for (var i = 0; i < answers.length; i++) {
        answerstrim += answers[i];
    }
    var questions = questions.split("\n");
    var questiontrim = "";
    for (var i = 0; i < questions.length; i++) {
        questiontrim += questions[i];
    }

    $("#post-questions").val(questiontrim);
    $("#post-answers").val(answerstrim);
    console.log(answerstrim);
    console.log(questiontrim);
    console.log(answerstrim);
    console.log(questiontrim);
    $("#post-submit").trigger("click");
});

$("#star-unstar").click(function(event) {
    var arr = $(".questions-star");
    var from = $("#star-unstar-from").val();
    var to = $("#star-unstar-to").val();
    var maxvalue = document.getElementById("star-unstar-from").attributes.max.value;
    console.log(maxvalue);
    from = Math.min(from, maxvalue);
    to = Math.min(to, maxvalue);

    from = Math.max(from, 0);
    to = Math.max(to, 0);
    $("#star-unstar-from").val(from);
    $("#star-unstar-to").val(to);
    if (to > from) {

        for (var i = 0; i < maxvalue; i++) {
            arr[i].checked = false;
        }
        for (var i = from; i < to; i++) {
            arr[i].checked = true;
        }

    } else {
        //Removing and starting
        for (var i = 0; i < maxvalue; i++) {
            arr[i].checked = false;
        }
        for (var i = to; i < from; i++) {
            arr[i].checked = true;
        }
    }
    FixAll();
});


function FixAll() {
    var arr = $(".questions-star");
    for (var i = 0; i < arr.length; i++) {
        if (arr[i].checked) {
            arr[i].parentNode.getElementsByClassName("questions-question1")[0].style.backgroundColor = "lightgrey";
            arr[i].parentNode.getElementsByClassName("questions-question2")[0].style.backgroundColor = "lightgrey";
        } else {
            arr[i].parentNode.getElementsByClassName("questions-question1")[0].style.backgroundColor = "white";
            arr[i].parentNode.getElementsByClassName("questions-question2")[0].style.backgroundColor = "white";

        }
    }
}
var SQLRightAnswersSTRING = "'Vad vill ni ha / önskar ni / tar ni?','menyn','Jag vill ha /artigt jag vill ha',' jag önskar',' jag tar...','Kan ni hämta....?','Vad är det här?','Till att dricka','Förrätt','Till att börja med','Huvudrätt','Vi har bokat ett bord/ ett bord för...','Inte nu / inte för tillfället','Hur är maten?','Mycket gott','Mycket äckligt','Till / åt','Jag är överens / håller med','! Notan',' tack!','Hur mycket kostar det?','Det blir','jag tycker om','Jag tycker inte om','Vad dyrt/ Vad billigt!','Vad gott!','följ med här',' tack.','Jag är ledsen',' idag har vi inte..','dricks','Jag är allergisk mot...','Bröd','Dryck','Kaffe','Te','läsk','Rött vin/ vitt vin','En stor öl','En stor stark','En liten öl','Juice','Vatten','Med kolsyra','Utan kolsyra','Med is','Utan is','Salt','Peppar','Kött (stekt)','Nötkött','Griskött / Fläsk','Kyckling (grillad/friterad)','fisk (ugnsbakad)','grönsaker','frukt','Potatis (pommes)','Sallad','(till) Dessert / Efterrätt','Glass','Servitören / servitrisen',' Kyparen','Bestick'";
var SQLQuestionSTRING = "'¿Qué quieren / desean / tomáis?','El menú/ la carta','Quiero/quisiera',' deseo',' tomo...','Nos trae...','¿Qué es esto?','Para beber','Entrada / primer plato','Para empezar','Plato principal / segundo plato','Hemos reservado una mesa/ una mesa para...','Ahora no','¿Qué tal la comida?','Muy rico','Muy feo/ asqueroso','Para','Estoy de acuerdo','¡La cuenta por favor','¿Cuanto es?','Son','Me gusta','No me gusta','iQue caro / Que barato!','iQué rico!','por aquí',' por favor','Lo siento hoy no tenemos','Propina','Estoy alérgico/a a .....','el pan','la bebida','El café','el té','El refresco','el vino (tinto',' blanco)','Una cerveza grande','Una jarra de cerveza','Una caña','El jugo / zumo','el agua','con gas','sin gas','con hielo','sin hielo','la sal','la pimienta','la carne (a la plancha)','la carne de vaca / res/ ternera','El puerco','el pollo asado/frito','el pescado (al horno)','las verduras','La fruta','la patata / papa (patatas fritas)','la ensalada','(de) Postre','el helado','Camarero/a','Los cubiertos','La servieta','Una copa/Un vaso'";
$("#login-submit").click(function(event) {
    var uid = $("#login-uid").val();
    var pwd = $("#login-pwd").val();
    $.ajax({
        method: "POST",
        url: "../program-files/db/user/user.php",
        data: {
            "ajax": "true",
            "dir": "login",
            "uid": uid,
            "pwd": pwd
        },
        success: function(responseText) {
            if (responseText == "success") {
                location.reload();
            } else {
                alert(responseText);
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
});

$("#signup-submit").click(function(event) {
    alert("clicked");
    var first = $("#signup-first").val();
    var last = $("#signup-last").val();
    var email = $("#signup-email").val();
    var uid = $("#signup-uid").val();
    var pwd = $("#signup-pwd").val();
    $.ajax({
        method: "POST",
        url: "../program-files/db/user/user.php",
        data: {
            "ajax": "true",
            "dir": "signup",
            "first": first,
            "last": last,
            "email": email,
            "uid": uid,
            "pwd": pwd
        },
        success: function(responseText) {
            alert(responseText);
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
});
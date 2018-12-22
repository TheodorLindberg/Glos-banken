<?php
session_start();

if(isset($_SESSION['u_id'])){
    header("Location: ../");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Glosbanken</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="author" content="Theodor Lindberg">
    <link rel="stylesheet" href="../source/css/login.css">
</head>
<body>
    <header>
        <div class="container">
            <div id="branding">
                <h1><span class="highlight">Glos</span> Banken</h1>
            </div>
            <nav>
                <ul>
                    <li class="current"><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><button class="buttonNav" onclick="document.getElementById('login').style.display='block'" style="width:auto;">Login</button></li>
                    <li><button class="buttonNav" onclick="document.getElementById('Signup').style.display='block'" style="width:auto;">Signup</button></li>
                </ul>
            </nav>
        </div>
        <div id="login" class="modal">
            <div class="modal-content animate">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('login').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <img src="source/img/img_avatar2.png" alt="Avatar" class="avatar">
                </div>
                <div class="container">
                    <label for="uid"><b>Username</b></label>
                    <input id="login-uid" type="text" placeholder="Enter Username" name="uid" required>

                    <label for="pwd"><b>Password</b></label>
                    <input id="login-pwd"type="password" placeholder="Enter Password" name="pwd" required>

                    <button class="ButtonConnect" type="submit" name="submit" id="login-submit">Login</button>
                    <label><input type="checkbox" checked="checked" name="remember"> Remember me</label>
                
                </div>
                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('login').style.display='none'" class="cancelbtn">Cancel</button>
                    <span class="psw">Forgot <a href="#">password?</a></span>
                </div>
            </div>
        </div>

        <div id="Signup" class="modal" >
            <div class="modal-content animate">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('Signup').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <img src="source/img/img_avatar2.png" alt="Avatar" class="avatar">
                </div>
                <div class="container">
                    <label for="first"><b>First Name</b></label>
                    <input id="signup-first" type="text" placeholder="Enter Firstname" name="first" required>
                    <label for="last"><b>Last name</b></label>
                    <input id="signup-last" type="text" placeholder="Enter Lastname" name="last" required>

                    <label for="email"><b>Enter mail</b></label>
                    <input id="signup-email" type="email" placeholder="Enter email" name="email" required>

                    <label for="uname"><b>Username</b></label>
                    <input id="signup-uid" type="text" placeholder="Enter Username" name="uid" required>

                    <label for="pwd"><b>Password</b></label>
                    <input id="signup-pwd" type="password" placeholder="Enter Password" name="pwd" required>

                    <label><input type="checkbox" checked="checked" name="remember">Want us to send our newsletters?</label>

                    <button id="signup-submit" type="submit" name="submit" class="ButtonConnect">Signup</button>
                </div>
                <div class="container" style="background-color:#f1f1f1">
                    <button class="cancelbtn" type="button" onclick="document.getElementById('Signup').style.display='none'">Cancel</button>
                    <span class="psw">Forgot <a href="#">password?</a></span>
                </div>
            </div>
        </div>
    </header>
    <script src="../source/external js/jquery-3.3.1.min.js"></script>
    <script src="../program-files/glosbanken/loginpage/loginpage.js"></script>
</body>
</html>

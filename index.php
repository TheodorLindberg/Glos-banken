<?php

session_start();
if(!isset($_SESSION['u_id'])){
    header("Location: glosbanken/");
} else {
    header("Location: home/");
}
/*
var_dump($_SESSION);
?>
<form action="./program-files/db/user/user.php" method="post">
    <input type="hidden" name="dir" value="logout">
    <button type="submit">Logout</button>
</form>*/
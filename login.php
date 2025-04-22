<form method="POST">
    Login ID : <input type = "text" name = "login"><br>
    Password : <input type = "password" name = "password"><br>
    <input type = "submit" value = "Login">
</form>


<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $login = $_POST["login"];
        echo "Welcome, $login!";
    }
?>
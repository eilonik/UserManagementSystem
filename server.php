<?php
    $server="localhost";
    $database="DB";
    $dbUsername="guest";
    $dbPassword = "password";
    $name = $_GET["name"];
    $email = $_GET["email"];
    $password = $_GET["password"];

    function db_connect(){
        $conn = mysqli_connect($GLOBALS["server"], $GLOBALS["dbUsername"],
            $GLOBALS["dbPassword"], $GLOBALS["database"]);
        return $conn;
    }

    function db_login_stamp($email) {
        $now = date("Y-m-d h:i:sa");
        $query = "INSERT INTO logins VALUES('$email', '$now')";
        return $query;
    }
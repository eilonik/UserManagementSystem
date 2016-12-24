<?php
    $server="localhost";
    $database="DB";
    $dbUsername="guest";
    $dbPassword = "password";
    $dumpPath = "/usr/bin/mysqldump";
    $name = $_GET["name"];
    $email = $_GET["email"];
    $password = $_GET["password"];
    $admin="admin@admin";


    function db_connect(){
//        $conn = mysqli_connect($GLOBALS["server"], $GLOBALS["dbUsername"],
//            $GLOBALS["dbPassword"], $GLOBALS["database"]);
        $server = $GLOBALS["server"];
        $database = $GLOBALS["database"];
        $username = $GLOBALS["dbUsername"];
        $password = $GLOBALS["dbPassword"];
        $conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);
        return $conn;
    }

    function db_login_stamp($email) {
        $now = date("Y-m-d h:i:sa");
        $query = "INSERT INTO logins VALUES('$email', '$now')";
        return $query;
    }
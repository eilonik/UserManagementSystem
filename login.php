<html>
    <head>

    </head>
    <body>
        <?php
        include "server.php";
        $connection = db_connect();
        session_start();
        $_SESSION["user"] = "";
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            $email = $_REQUEST["email"];
            $password = $_REQUEST["password"];
            $password = hash('sha512', $password);

            $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
            $result = $connection->query($query);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $row = $result->fetch();
            if($row["email"] != "") {
                $_SESSION["user"]=$email;
                $connection->query(db_login_stamp($email));
                if($_SESSION["user"] == $admin){
                    header('Location: admin.php', true);
                    exit();
                }
                else {
                    header('Location: user.php', true);
                    exit();
                }
            }

            else{
                echo "One of the details you entered is wrong!";
            }

        }
        ?>
    </body>
</html>
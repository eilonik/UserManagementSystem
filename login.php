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

            // prepared statement to prevent SQL injection
            $query = "SELECT * FROM users WHERE email=? AND password=?";
            $statement = $connection->prepare($query);
            $statement->bind_param("ss", $email, $password);
            $statement->execute();
            $result = $statement->get_result();

            if ($result->num_rows > 0) {
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
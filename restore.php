<html>
    <body>
        <p>
            Enter email:
        </p>
        <form name="restore" action="restore.php" method="get">
            <input type="email" name="email">
            <input type="submit" title="restore">
            <?php
                include "server.php";
                if($_SERVER["REQUEST_METHOD"]=="GET"){
                    if($_REQUEST["email"] != ""){
                        $connection = db_connect();
                        $email = $_REQUEST["email"];
                        $query = "SELECT password FROM users WHERE email='$email'";
                        $result = $connection->query($query);
                        if($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $password = $row["password"];
                            mail($email,"password recovery",$password);
                            echo "Recovery mail sent";
                        }
                        else{
                            echo "user does not exist!";
                        }

                    }
                }
            ?>
        </form>
    </body>
</html>
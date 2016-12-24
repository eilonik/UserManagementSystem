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
                        if($result->rowCount() > 0) {
                            $row = $result->fetch();
                            $chars = "abcdefghijklmnopqrstuvwxyz123456789";
                            $tempPassword = "";
                            for($i = 0; $i < 9; $i++){
                                $tempPassword .= $chars[mt_rand(0, strlen($chars))];
                            }
                            $link = $GLOBALS["PHP_SELF"]."/UserManagmentSystem"."/recovery.php?email=$email";
                            $message = "Your temporary password is: ".$tempPassword.".  
                            please go <a href='$link'>here</a> to recover your account";
                            mail($email,"password recovery", $message);
                            echo "Recovery mail sent";
                            //TODO: REMOVE THIS!!!
                            echo "<br>message sent: <br>".$message;
                            $hashPass = hash('sha512', $tempPassword);
                            $query = "INSERT INTO recovery VALUES('$email', '$hashPass')";
                            $connection->query($query);
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
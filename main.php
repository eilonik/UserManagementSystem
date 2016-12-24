<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <h1 align="center">User Management System</h1>
        <h3>Login:</h3>
        <br>
        <form class="form-inline" name="loginForm" action="login.php" method="get">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name ="password" id="password" placeholder="Enter password">
            </div>
            <button type="submit">Login</button>
        </form>
        <br>
        <p>
            <a href="restore.php">forgot password</a>
        </p>
        <br><br>
        <p>

        <form class="form-horizontal" method="get" name="signupForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
            <div class="form-group">
                <label class="control-label col-sm-2"><h3>Sign up:</h3></label>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-xs-2">
                    <input type="email" class="form-control" name="email" id="fEmail" placeholder="Enter email">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Full name:</label>
                <div class="col-xs-2">
                    <input type="text" class="form-control" name="name" id="fName" placeholder="Enter name">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="password">Password:</label>
                <div class="col-xs-2">
                    <input type="password" class="form-control" name="password" id="fPassword" placeholder="Enter password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-1">
                    <button type="submit">Submit</button>
                </div>
            </div>
            <?php
            include "server.php";
            if($_SERVER["REQUEST_METHOD"] == "GET") {
                session_start();
                $_SESSION['user'] = "";

                if($name == "" || $password == "" || $email == "") {
                    echo "<div class='form-group'>
                                <label class='control-label col-sm-2'><p style='color: red'>All fields are required!</label>
                          </div>";
                }
                else {
                    try{
                        $connection = db_connect();
                        // prevent XSS
                        $email = htmlspecialchars($email);
                        $password = htmlspecialchars($password);
                        $name = htmlspecialchars($name);

                        $password = hash('sha512', $password);
                        try {
                            $query = "SELECT * FROM users WHERE email='$email'";
                            $result = $connection->query($query);
                            if($result->rowCount() > 0) {
                                echo "User already exists";
                            }
                            else{
                                $query = "INSERT INTO users VALUES('$email', '$name', '$password')";
                                $connection->exec($query);
                                $_SESSION['user'] = $email;
                                $connection->exec(db_login_stamp($email));
                                header('Location: user.php', true);
                                exit();
                            }
                        }
                        catch (Exception $e) {
                            echo "Error";
                        }
                    }catch (Exception $e){
                        echo "Connection Problem";
                    }
                }
            }
            ?>
        </form>
        </p>

    </body>
</html>

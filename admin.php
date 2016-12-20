<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <?php
            session_start();
            include "server.php";
            if($_SESSION["user"]==$admin){

                echo "<h2 align='center'>Administrator panel</h2>\n
                <form class='form-inline' name='deleteUser' action='admin.php' method='get'>
                <div class='form-group'>
                    <label for='email'>Email:</label>
                    <input type='email' class='form-control' name='email' id='email' placeholder='Enter email'>
                </div>
                <div class='radio'>
                  <label><input type='radio' name='action' value='view'>View logs</label>
                </div>
                <div class='radio'>
                  <label><input type='radio' name='action' value='delete'>Delete user</label>
                </div>
                <div class='radio'>
                  <label><input type='radio' name='action' value='generateDumps'>Generate dumps</label>
                </div>
                <button type='submit'>Send</button>
                </form> ";

                if($_SERVER["REQUEST_METHOD"] == "GET"){
                    $connection = db_connect();
                    if($_GET["action"] == "view") {
                        $email = $_GET["email"];
                        $query = "SELECT * FROM logins WHERE email='$email'";
                        $result = $connection->query($query);
                        echo "<table class='table table-hover'>
                                <thead>
                                  <tr>
                                    <th>user</th>
                                    <th>logins</th>
                                  </tr>
                                </thead>
                                <tbody>";
                                if($result->num_rows > 0){
                                    while($row = $result->fetch_assoc()){
                                        $login = $row["timestamp"];
                                        echo "<tr><td>$email</td><td>$login</td></tr>\n";
                                    }
                                }
                                echo "</tbody>
                                </table>
                                
                                <a href='admin.php'><button type='submit' action='admin.php' method='get'>Back to users</button></a>";
                                
                    }

                    elseif($_GET["action"] == "delete") {
                        $email = $_GET["email"];
                        $query = "DELETE FROM users WHERE email='$email'";
                        $connection->query($query);
                        header('Location: admin.php', true);
                        exit();
                    }

                    elseif ($_GET["action"] == "generateDumps") {
                        $dumpfile = $database . "_" . date("Y-m-d_H-i-s") . ".sql";
                        passthru($dumpPath." --opt --host=$server --user=$dbUsername --password=$dbPassword $database > $dumpfile");
                        echo "generated dump file ".$dumpfile;
                        echo "<br><a href='admin.php'><button type='submit' action='admin.php' method='get'>Back to users</button></a>";
                    }
                    else{
                        $query = "SELECT * FROM users";
                        $result = $connection->query($query);
                        echo "<table class='table table-hover'>
                                <thead>
                                  <tr>
                                    <th>user</th>
                                    <th>name</th>
                                    <th>password</th>
                                  </tr>
                                </thead>
                                <tbody>";
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                $email = $row["email"];
                                $name = $row["name"];
                                $password = $row["password"];
                                echo "<tr><td>$email</td><td>$name</td><td>$password</td></tr>\n";
                            }
                            echo "</tbody>
                                </table>";
                        }

                    }
                }
            }

            else{
                echo "Permission denied!";
            }
        ?>
    </body>
</html>

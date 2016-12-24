<html>
    <body>
    <?php
    include "server.php";
    $email = $_GET["email"];
    if($_GET['tempPass'] != "" && $_GET['newPass'] != "" && $_GET['repeatPass'] != ""
        && $_GET['newPass'] == $_GET['repeatPass']) {
        $connection = db_connect();
        $password = hash('sha512', $_GET['tempPass']);
        $query = "SELECT * FROM recovery WHERE email='$email' AND password='$password'";
        $result = $connection->query($query);
        if($result->rowCount() > 0){
            $newPass = hash('sha512',$_GET['newPass']);
            $query = "UPDATE users SET password='$newPass' WHERE email='$email'";
            $connection->query($query);
            $query = "DELETE FROM recovery WHERE email='$email'";
            $connection->query($query);
            echo "Password successfully changed!";
        }
    }
    else{
        echo "<form name='recoveryForm' action='recovery.php?email=$email' method='get'>
               password: <input type='password' name='tempPass'><br>
               new password:<input type='password' name='newPass'><br>
               repeat password:<input type='password' name='repeatPass'><br>
               <input type='hidden' name='email' value='$email'>
            <button type='submit'>Submit</button>
        </form>";
    }
    ?>
    </body>
</html>
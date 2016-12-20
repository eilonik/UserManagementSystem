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
            echo "<h2 align='center'>Welcome admin</h2>\n
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
            <button type='submit'>Send</button>
        </form> ";
            }
            else{
                echo "Permission denied!";
            }
        ?>
    </body>
</html>

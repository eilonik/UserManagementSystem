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
        <h1>Welcome <?php session_start(); echo $_SESSION["user"]; ?></h1>
        <h2>Logins:</h2>
        <?php
          include "server.php";
          $user = $_SESSION["user"];
          $connection = db_connect();
          $query = "SELECT * FROM logins WHERE email='$user'";
          $result = $connection->query($query);
          if($result->num_rows > 0){
              echo "<p>\n";
              while($row = $result->fetch_assoc()){
                  $time = $row["timestamp"];
                  echo "<br>$time\n";
              }
              echo "</p>";
          }
        ?>
    </body>
</html>
<html>
    <body>
        <p>
            Enter email:
        </p>
        <form name="restore" action="restore.php" method="get">
            <input type="email" name="email">
            <input type="submit" title="restore">
            <?php
                if($_SERVER["REQUEST_METHOD"]=="GET"){
                    if($_REQUEST["email"] != ""){
                        echo "****";
                    }
                }
            ?>
        </form>
    </body>
</html>
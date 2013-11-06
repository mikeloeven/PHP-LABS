<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>


<?php

session_start();
session_regenerate_id(true);

if (empty($_SESSION["isLoggedIn"])){
    header("Location:login.php");
    
}


?>

<h1>YOU MADE IT</h1

    </body>
</html>


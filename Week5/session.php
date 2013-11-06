<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>


<?php

session_start();

if (!isset($_SESSION["counter"])){
$_SESSION ["counter"] = 0; 
}
else {
    $_SESSION["counter"]++;
           
}

session_regenerate_id(true);

echo "<p>",  session_id(),"</p>";
echo "<p>you have ", $_SESSION["counter"]," visits</p>";

$_SESSION["maxlife"] = time();

//unset samples

/*
echo "<p>",$_SESSION["maxlife"],"</p>";

unset( $_SESSION["maxlife"]);

echo "<p>",$_SESSION["maxlife"],"</p>";
*/

if($_SESSION["maxlife"] > time() + Config::MAX_SESSION_TIME){
    echo "Session Time Out";
    session_destroy();
}
else {
    $_SESSION["maxlife"] == (time() + Config::MAX_SESSION_TIME);
}

        
        ?>
    </body>
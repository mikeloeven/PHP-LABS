<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

<?php

setcookie("lastvisit", date("m/d/y"), time()+60*60*24*30);

echo "<p>",$_COOKIE["lastvisit"],"</p>";

$_COOKIE[sha1("username") = sha1("randomname")];
        
print_r($_COOKIE);

?>

        
    </body>
</html>


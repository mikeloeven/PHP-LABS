<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        
        session_start();
        
        include 'Config.php';
        
        if ( !isset($_SESSION["counter"]) ) {
            $_SESSION["counter"] = 0;
        } else {
            $_SESSION["counter"]++;
        }
        
        session_regenerate_id(true);
        
        echo session_id(),"<br />";
        echo $_SESSION["counter"];
        
        
        if ( isset($_SESSION["maxlife"]) && $_SESSION["maxlife"] > (time() - Config::MAX_SESSION_TIME ) ){
            echo "Sorry you timed out";
            session_destroy();
        } else {
             $_SESSION["maxlife"] = (time() + Config::MAX_SESSION_TIME);
        }
        
         
        /*
        echo $_SESSION["maxlife"];
        
        unset($_SESSION["maxlife"]);
        
        echo $_SESSION["maxlife"];
        
        session_destroy();
         * 
         */
        ?>
    </body>
</html>

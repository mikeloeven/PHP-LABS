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
        session_regenerate_id(true);
        
        /*
         * If user is logged in redirect to admin page.
         */
        
        include 'Config.php';
        include 'validator.php';
        
        $token = uniqid();
        
        // advoid session highjacking
        if ( !isset($_SESSION["token"])  ){
               $_SESSION["token"] = $token;
        } else {
            if ( isset($_POST["token"]) && $_SESSION["token"] != $_POST["token"] ) {
                session_destroy();
                header("Location:login.php");
                exit();
            }
        }
        
        //advoid bots
        if ( !empty($_POST["email"]) ) {
            $_SESSION["wait"] = time()+Config::MAX_SESSION_TIME;
        }
        
        
        if ( isset($_SESSION["wait"]) 
                && $_SESSION["wait"] > (time() - Config::MAX_SESSION_TIME ) ){
            echo "Please come back";
            exit();
        }
        
        
        $_SESSION["token"] = $token;
        
        
        $username = ( isset($_POST["username"]) ? $_POST["username"] : "" );
        $password = ( isset($_POST["password"]) ? $_POST["password"] : "" );
        
      
        
            if ( !empty($username) 
                    && !empty($password) 
                    && Validator::loginIsValid($username,$password )
                ) {
               $_SESSION["isLoggedIn"] = true;
               header("Location:admin.php");
            } else {
                if (count($_POST))
                {
                echo "<p>Username or password is not correct</p>";
        
                }
        
        ?>
        
        
        <form name="mainform" action="login.php" method="post">
            
            username: <input type="text" name="username" /><br />
            password: <input type="password" name="password" /><br />
            
            <input type="hidden" name="token" value="<?php echo $token; ?>" />
            <input type="hidden" name="email" value="" />
          
            <input type="submit" value="Submit" />
            
        </form>
        
    </body>
</html>

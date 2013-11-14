<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Item C</title>
    </head>
    <body>
        <?php
        session_start();
        $_SESSION['auth']=false;
        print_r($_SESSION);
        
        if(isset($_SESSION['count'])==false)
        {
            $_SESSION['count']=0;
        }

        
        
        /*
        * Please follow the instructions below.
        * 
         * The super global $_SESSION is used to store data that can be
         * used on other pages.  Unlike $_POST and $_GET session data is
         * stored on the server and then populated back into Session
         * 
         * In order for session to work look at line 14.  That function
         * must run before sessions can be used in PHP
        * 
         * 1. Create a session variable called 'auth' and set it to false.
         * 
         * 2.When the user submits the form check for the passcode 'demo'
         * if the pass code is correct set the session variable auth to true and
         * redirect them to itemD.php
         * 
         * If you need a hint, look at itemD.php  you cannot enter the page unless
         * itemC.php is complete.
         */
        
        // put your code here
        echo count($_POST);
        if(count($_POST))
        {
            
            if($_SESSION['count'] > 5)
            {
                echo "<h1> ACCOUNT LOCKOUT <h1/>";
                if(filter_input(INPUT_POST, 'reset') == "y")
            {
                
                 $_SESSION['count'] = 0;
            
            }
            }
             

                
            
            else
            {
            if ((filter_input(INPUT_POST, 'passcode'))=='demo')
            {
                $_SESSION['count']=0;
                $_SESSION['auth']=true;
                header('Location: itemD.php');
                session_regenerate_id();
            }
            else 
            {
                $_SESSION['count'] ++;
                session_regenerate_id();
            }
            }
            
        }
        else
        $_SESSION['count'] ++;
        session_regenerate_id();
        ?>
        
        <form action="#" method="post">
          <label>Passcode: <label/>
          <input type="password" name="passcode" value="" />
          <label>Reset Attempts: y/n <label/>
          <input type="text" name="reset" value="" />
          <br />
          <br />
          <input type="submit" value="Submit" />
        </form>
    </body>
</html>

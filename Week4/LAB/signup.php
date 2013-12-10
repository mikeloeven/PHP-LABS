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
        
        if ( !empty($errorMsg) ) {
            echo "<p>",$errorMsg,"</p>";
        }
        
        if ( !empty($sucessMsg) ) {
            echo "<p>",$sucessMsg,"</p>";
        }
        
        ?>
        <form name="mainform" action="signupprocess.php" method="post">
            
            
            email: <input type="text" name="email" /><br />
            username: <input type="text" name="username" /><br />
            password: <input type="password" name="password" /><br />
          
            <input type="submit" value="Submit" />
            
            
        </form>
            
        
    </body>
</html>

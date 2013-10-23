<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

<?php
$uname = "";
$pwd = "";
    

?>
        
        <h1>Login Form</h1>
        
        
        <form name="login" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
        <label>Username</label> <input type="text" name="uname" value<?php echo $uname;?>/>
        <label>Password</label> <input type="password" name="pwd" value<?php echo $pwd;?>/>
        </form>

    </body>
</html>


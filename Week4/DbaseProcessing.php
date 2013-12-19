


<?php
include 'Config.php';
include 'Validator.php';





$db = new PDO(Config::DB_DNS,  Config::DB_USER, Config::DB_PASSWORD);

$email = (isset($_POST["email"]) ? $_POST["email"] : "" );
$username = (isset($_POST["username"]) ? $_POST["username"] : "" );
$password = (isset($_POST["password"]) ? $_POST["password"] : "" );


 if(Validator::validateEmail($email) && Validator::validateUsername($username) && Validator::validatePassword($password)){

    
    
 }
        include 'Signupform.php';
        
?>

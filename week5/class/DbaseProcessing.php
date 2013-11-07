


<?php
include 'Config.php';
include 'Validator.php';





$db = new PDO(Config::DB_DNS,  Config::DB_USER, Config::DB_PASSWORD);

$email = (isset($_POST["email"]) ? $_POST["email"] : "" );
$username = (isset($_POST["username"]) ? $_POST["username"] : "" );
$password = (isset($_POST["password"]) ? $_POST["password"] : "" );


 if(Validator::validateEmail($email) && Validator::validateUsername($username) && Validator::validatePassword($password)){

    
    try{
        $stmt = $db->prepare('insert into signup set email = :emailValue, username = :usernameValue, password = :passwordValue');
               
        $stmt->bindParam(':emailValue', $email, PDO::PARAM_STR);
        $stmt->bindParam(':usernameValue', $username, PDO::PARAM_STR);
        $stmt->bindParam(':passwordValue', $password, PDO::PARAM_STR);
        
        if($stmt->execute())
        {
            $successMsg = "<h3>INFO SUBMITTED</h3>";
        }
        else{
           $errorMsg = "<h3>INFO NOT SUBMITTED</h3>";
        }
       }
        
        catch(PDOException $e)
        {
            $errorMsg ="<h1>Database Error</h1>";
        }
 }
        include 'Signupform.php';
        
?>

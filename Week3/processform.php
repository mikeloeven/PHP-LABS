<?php

$fullname = "";
$email = "";
$comments = "";

if(count($_POST))
{
    if(array_key_exists("fullname", $_POST)){
        $fullname = $_POST["fullname"];
        echo "<h1>$fullname</h1>";
    }
    
    if(array_key_exists("email", $_POST)){
        $email = $_POST["email"];
        echo "<h1>$email</h1>";
    }
    
    if(array_key_exists("comments", $_POST)){
        $comments = $_POST["comments"];
        echo "<h1>$comments</h1>";
    }
}
    print_r($_POST);
    if(!empty($fullname) && !empty($email) && !empty($comments))
    {
      
    
    
    $dbh = new PDO("mysql:host=localhost;port=3306;dbname=phplab","root","");
    
    try{
        $stmt = $dbh->prepare('insert into week3 set fullname = :fullnameValue, email = :emailValue, comments = :commentsValue');
        
        $stmt->bindParam(':fullnameValue', $fullname, PDO::PARAM_STR);
        $stmt->bindParam(':emailValue', $email, PDO::PARAM_STR);
        $stmt->bindParam(':commentsValue', $comments, PDO::PARAM_STR);
        
        if($stmt->execute())
        {
            echo "<h1>Execute success</h1>";
        }
        else{
            echo "<h1>Execute FAIL</h1>";
        }
        echo "<h3>Info Submited</h3><p><a href='week3post'>BackToForm</a></p>";
        
        }
        catch(PDOException $e)
        {
            echo "<h1>Database Error</h1>";
        }
    }
    else
    {
    echo "<h3>Info Not Submited</h3><p><a href='week3post.php '>BackToForm</a></p>";
    }
        

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

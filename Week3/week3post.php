<html>
    <head></head>
    <body>
<?php

$fullname = "";
$email = "";
$comments = "";

if (count($_POST)){
    if(array_key_exists($fullname, $_POST)){
        $fullname = $_POST["fullname"];
    }
    
    if(array_key_exists($email, $_POST)){
        $email = $_POST["email"];
    }
    
    if(array_key_exists($comments, $_POST)){
        $comments = $_POST["comments"];
    }
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
        
        <form name="mainform" action="week3post.php" method="post">
            Full Name: <input type="text" name="fullname" value=" <?php echo $fullname; ?> " /> <br />
            Email: <input type="text" name="emial" value="<?php echo $email; ?>" /><br />
            Comments: <br /> <textarea cols="20" rows="5" name="comments" value="<?php echo $comments; ?>"></textarea> <br/>
            <input type="submit" value="submit" />
            
            
    </body>
</html>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php
        //j
            $fullname = "";
            $email = "";
            $comments = "";
        
            
            $fullnameErr = "";
            $emailErr = "";
            $commentsErr = "";
            
            if ( count($_POST) ) {
                
                if ( !array_key_exists("fullname", $_POST) || empty($_POST["fullname"]) ) {
                   $fullnameErr = "Please enter your full name";               
                }
                
				
// add validation for email, use filter_var
                
// add validation for comments
			
// display error messaages next to the field.
                
            }
       
        ?>
        
        <h1> Contact Form </h1>
        <form name="mainform" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">            
            <label>Name</label> <input type="text" name="fullname" value="<?php echo $fullname;?>" /> <?php echo $fullnameErr ?> <br />
            <label>Email</label> <input type="text" name="email" value="<?php echo $email;?>" /> <br />
            <label>Comments</label> <textarea name="comments"><?php echo $comments;?></textarea>
            <br />
            <input type="submit" value="Submit" />
        </form>
        
        
    </body>
</html>

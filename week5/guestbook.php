<!DOCTYPE html>

<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Guestbook Form</title>
        <link rel="stylesheet" href="css/style.css">
        <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    </head>
    
    <body>
         
      
            
        
        
    <form method="post" action="guestbook.php" class="login">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="">
        <br/>
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" value="">
        <br/>
        <label for="comments">Comments:</label>
        <textarea name="comments" id="comments" value=""></textarea>
        <br/>
        <br/>
        <button type="submit" class="login-button" style="text-align: left;">Login</button>
      
    </form>
        
        
        <div>
            <?php
        
        
        include 'dependancies.php';
        $guestbook = new GuestBook();
        
        
        //checks to see if the page was accessed without logging in
        Login::isLoggedIn();
        
      
        if (isset($_POST))
        {
            $guestbook ->guestBookValidate($_POST);
        }
         $guestbook -> getGuestbookData();
        
        
        ?>
        </div>
        
        
        
        
        
        
    </body>
    
</html>



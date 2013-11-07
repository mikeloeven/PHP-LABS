<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of processlogin
 *
 * @author Mikeloeven
 */
class processlogin {
    
    public static function processLogin()
    {
        //locks guestbook for unknown users
        $_SESSION["allowGuestbookAccess"]= false;
        if (isset($_POST["passcode"]) && $_POST["passcode"] == "test")
        {
            //unlocks guestbook once passcode is entered
            
            $_SESSION["allowGuestbookAccess"] = true;
            header("Location:guestbook.php");
        }
    }

    public static function isLoggedIn()
    {
        if(isset($_session["allowGuestbookAccess"]) || $_SESSION["allowGuestbookAccess"] != true)
        {
            header("Location:login.php");
        }
        
            
    }
    //put your code here
}

?>

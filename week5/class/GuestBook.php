<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GuestBook
 *
 * @author Mikeloeven
 */
class GuestBook extends DB {
    
    public static function getGuestbookData()
    {
        $result = array();
        $db = $this->getDB();
        
        foreach ($result as $value)
        {
            echo "<p>".$value."</p>";
        }
        
      
    }
    //validate input data and calls database input function
    public static function guestBookValidate($Post) 
    {
        if (Validator::validateUsername($Post['name'])&&Validator::validateEmail($Post['email'])&&Validator::validateUsername('comments'))
        {
            guestbookAdd($Post);
        }
        else
        {
            $errorMsg = "<h3>INFO NOT SUBMITTED</h3>";
            return $errorMsg;
        }
    }
    
    protected function guestbookAdd($Post)
    {
        $db = $this -> getDB();
        if (null != $db)
        {
                $stmnt = $db -> prepare('insert into guestbook set name=:nameValue email = :emailValue comments = :commentValue');
                $stmnt -> bindParam(':nameValue', $Post["name"], PDO::PARAM_STR);
                $stmnt -> bindParam(':emailValue', $Post["email"], PDO::PARAM_STR);
                $stmnt -> bindParam(':commentsValue', $Post["comments"], PDO::PARAM_STR);
                
        if($stmnt->execute())
        {
            $successMsg = "<h3>INFO SUBMITTED</h3>";
            return $successMsg;
        }
        else{
            
           $errorMsg = "<h3>INFO NOT SUBMITTED</h3>";
           return $errorMsg;
            }
        }
     }
}

?>

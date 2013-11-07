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
    
    public function getGuestbookData()
    {
        $result = array();
        $db = $this->getDB();
        
      
    }
    //validate input data and calls database input function
    public function guestbookValidate()
    {
        if (count($_POST))
        {
            // check validate fields using validator class 
            
            
        }    
    }
    
    protected function guestbookAdd()
    {
        $db = $this -> getDB();
        if (null != $db)
        {
                $stmt = $db -> prepare('insert into guestbook set name=:nameValue email = :emailValue comments = :commentValue');
                $stmnt -> bindParam(':nameValue', $_POST["name"], PDO::PARAM_STR);
        }
        }
}

?>

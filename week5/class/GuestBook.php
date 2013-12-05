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
        
        $db = $this->getDB();
        $statement = $db->prepare('select * from guestbook');
        $statement->execute();
        $Result = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        
        
        echo 
        '<table border="1" >
         <tr>
         <th>ID:</th>
         <th>Name:</th>
         <th>Email:</th>
         <th>Comments:</th>
         </tr>
        ';
        
        
        foreach ($Result as $Value)
        {
            echo '<tr>
                ';
            foreach ($Value as $Entry)
            {
                echo '<td>'.$Entry."</td>
                    ";
            }
            echo '
                </tr>
                ';
        }
        echo '</table>';
        
      
    }
    //validate input data and calls database input function
    public function guestBookValidate($Post) 
    {
        
        if (is_array($Post)&&count($Post)&&Validator::validateUsername($Post['name'])&&Validator::validateEmail($Post['email'])&&Validator::validateUsername('comments'))
        {
            
            $this -> guestbookAdd($Post);
        }
        else
        {
            $errorMsg = "<h3>INFO NOT SUBMITTED VALIDATION ISSUE</h3>";
            return $errorMsg;
        }
    }
    
    protected function guestbookAdd($Post)
    {
        print_r($Post);
        $db = $this -> getDB();
        if (null != $db)
        {
                $stmnt = $db -> prepare('insert into guestbook set name=:nameValue, email=:emailValue, comments = :commentValue');
                $stmnt -> bindParam(':nameValue', $Post["name"], PDO::PARAM_STR);
                $stmnt -> bindParam(':emailValue', $Post["email"], PDO::PARAM_STR);
                $stmnt -> bindParam(':commentValue', $Post["comments"], PDO::PARAM_STR);
                
        if($stmnt->execute())
        {
            $successMsg = "<h3>INFO SUBMITTED</h3>";
            echo $successMsg;
        }
        else{
            
           $errorMsg = "<h3>INFO NOT SUBMITTED DATABASE ISSUE</h3>";
           echo $errorMsg;
            }
        }
     }
}

?>

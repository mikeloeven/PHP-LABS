<?php

class Validator {
   
    public function __construct(){
    }
    
    public function validateUsername($username)
    {
        if (is_string($username) && !empty($username))
        {
            return true;
        }
        
        return false;
    }
    
    public function validateEmail($email)
    {
     
        if(is_string($email) && !empty($email))
        {
            return true;
        }
        return false;
        
        
    }
   public function validatePassword($password)
    {
     
        if(is_string($password) && !empty($password))
        {
            return true;
        }
        return false;
        
        
    }
    }
    
    
    
    


?>

<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Validator
 *
 * @author Mikeloeven
 */
class Validator {
   
    public function __construct(){
    }
    
    function validateFullName($fullname)
    {
        if (is_string($fullname) && !empty($fullname))
        {
            return true;
        }
        
        return false;
    }
    
    public static function validateEmail($email)
    {
     
        if(is_string($email) && !empty($email))
        {
            return true;
        }
        return false;
        
        
    }
    }
    
    
    
    


?>

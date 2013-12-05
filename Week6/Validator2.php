<?php

class Validator {
   
    public function __construct(){
    }
    
    public static function validatezip($zip)
    {
        if (is_string($zip) && !empty($zip) && strlen($zip) == 5)
        {
            return true;
        }
        
        return false;
    }
            
    
    public static function validatestring($name)
    {
        if (is_string($name) && !empty($name))
        {
            return true;
        }
        
        return false;
    }
    

        
        
    }
    
  
   
    
    
    
    


?>

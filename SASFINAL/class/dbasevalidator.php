<?php

class dbasevalidator {

      
    public static function validateEmail( $email ) 
        {
        
            if ( is_string($email) && !empty($email) ) 
            {
                $regxEmail = "/([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})/";
                if (preg_match($regxEmail, $email))
                {
                   return true;
                }
                else return false;
            }        
            else return false; 
        }
    
        
        public static function validateUrl( $url ) 
        {
            if ( is_string($url) && !empty($url) ) 
                {
                    if (preg_match('/^\pL+$/u', $url))
                    {
                    return true;
                    }
                    else return false;
                }        
            else return false; 
        }
    
    public static function validatePassword( $pwd ) 
        {
            if ( is_string($pwd) && !empty($pwd) ) 
                {
                    return true;
                }        
            return false; 
        }
    

    
    public static function validateCredentials( $username, $password ) 
        {
            $password = sha1($password);
            $db = new PDO(Config::DB_DNS ,Config::DB_USER,Config::DB_PASSWORD);
        
            $stmt = $db->prepare('select username, password from signup where username = :usernameValue limit 1');
            $stmt->bindParam(':usernameValue', $username, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll();
        
            if ( count($result) ) 
                {
            
                    if ( $result[0]["password"] == $password )
                    {
                        return true;
                    }
                }
        
            else return false; 
        }
     
       
        public static function duplicateEmail($email)
     {
         {
            $db = new PDO(saasConfig::DB_DNS ,saasConfig::DB_USER,saasConfig::DB_PASSWORD);
        
            $stmt = $db->prepare('select email from users where email = :emailValue limit 1');
            $stmt->bindParam(':emailValue', $email, PDO::PARAM_STR);
            
            
            $stmt->execute();
            $result = $stmt->fetchAll();
            if (count($result)) 
                {                
                    return true;
                }
        
            else return false; 
         }
    
    
    }
}

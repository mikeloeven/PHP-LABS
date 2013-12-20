<?php

class dbasevalidator {

   //regex for validating email format    
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
    
   //checks to make sure url is valid and not empty
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
    
        
        public static function validatePhone( $url ) 
        {
            if ( is_string($url) && !empty($url) ) 
                {
                    if (preg_match('\((?<AreaCode>\d{3})\)\s*(?<Number>\d{3}(?:-|\s*)\d{4})', $url))
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
    

    //checks user and password against database
        
    public static function validateCredentials( $email, $password ) 
        {
            $password = sha1($password);
            $db = new PDO(saasConfig::DB_DNS ,saasConfig::DB_USER,saasConfig::DB_PASSWORD);
        
            $stmt = $db->prepare('select email, password from users where email = :usernameValue limit 1');
            $stmt->bindParam(':usernameValue', $email, PDO::PARAM_STR);
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
    
    
        
    
    public static function getUID($email)
    {
        $db = new PDO(saasConfig::DB_DNS ,saasConfig::DB_USER,saasConfig::DB_PASSWORD);
        
            $stmt = $db->prepare('select user_id from users where email = :emailValue limit 1');
            $stmt->bindParam(':emailValue', $email, PDO::PARAM_STR);
            
            
            $stmt->execute();
            $result = $stmt->fetchColumn(0);
            
           
            return $result;
    }
    public static function getPAGEID($UID)
    {
        $db = new PDO(saasConfig::DB_DNS ,saasConfig::DB_USER,saasConfig::DB_PASSWORD);
        
            $stmt = $db->prepare('select title from page where user_id = :UIDValue limit 1');
            $stmt->bindParam(':UIDvalue', $UID, PDO::PARAM_STR);
            
            
            $stmt->execute();
            $result = $stmt->fetchColumn('user_id');
            
                        
                return $result;
    }
            
}

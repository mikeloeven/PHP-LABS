<?php

class dbasevalidator {
      
    public static function validateEmail( $eml ) {
        if ( is_string($eml) && !empty($eml) ) {
            return true;
        }        
        return false; 
    }
    
    public static function validateUser( $usr ) {
        if ( is_string($usr) && !empty($usr) ) {
            return true;
        }        
        return false; 
    }
    
    public static function validatePassword( $pwd ) {
        if ( is_string($pwd) && !empty($pwd) ) {
            return true;
        }        
        return false; 
    }
    

    
    public static function credentialsCheck( $username, $password ) {
        $password = sha1($password);
         $db = new PDO(Config::DB_DNS ,Config::DB_USER,Config::DB_PASSWORD);
        
        $stmt = $db->prepare('select username, password from signup where username = :usernameValue limit 1');
        $stmt->bindParam(':usernameValue', $username, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll();
        
        if ( count($result) ) {
            
            if ( $result[0]["password"] == $password )
                return true;
        }
        
        return false; 
    }
    
    
}

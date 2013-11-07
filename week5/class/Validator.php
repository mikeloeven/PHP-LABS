<?php

class Validator {
   
    public function __construct(){
    }
    
    public static function validateUsername($username)
    {
        if (is_string($username) && !empty($username))
        {
            return true;
        }
        
        return false;
    }
    
   public static  function validateEmail($email)
    {
     
        if(is_string($email) && !empty($email))
        {
            return true;
        }
        return false;
        
        
    }
   public static function validatePassword($password)
    {
     
        if(is_string($password) && !empty($password))
        {
            return true;
        }
        return false;
        
        
    }
    
    public static function LoginValidate($uname,$pwd){
    
        $db = new PDO(Config::DB_DNS,  Config::DB_USER, Config::DB_PASSWORD);
        $stmt = $db->prepare('select * from signup where USERNAME = :usernameValue limit 1');
        $stmt->bindParam(':usernameValue',$uname,PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll();
        print_r($result);
        
        if (count($result)){
            if ($result[0]["PASSWORD"] == $pwd){
                return true;
            }
        }
        return false;
      
    }
    }
    
    
    
    


?>

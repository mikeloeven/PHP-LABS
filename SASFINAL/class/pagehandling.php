<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pagehandling
 *
 * @author Mikeloeven
 */
class pagehandling 
{
    
    public static function pageinfobyGET($GET)
    {
        $db = new PDO(saasConfig::DB_DNS ,saasConfig::DB_USER,saasConfig::DB_PASSWORD);

            $stmt = $db->prepare('select * from page where user_id in(select user_id from users where website = :getValue)');
            $stmt->bindParam(':getValue', $GET, PDO::PARAM_STR);

            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
            
            if(!count($result))
            {
            return false;
            }
            else return $result;
    }
    public static function pageinfobyUsr($UID)
    {
            
            $db = new PDO(saasConfig::DB_DNS ,saasConfig::DB_USER,saasConfig::DB_PASSWORD);

            $stmt = $db->prepare('select * from page where user_id in(select user_id from users where email = :UIDValue)');
            $stmt->bindParam(':UIDValue', $UID, PDO::PARAM_STR);

            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
            
            if(!count($result))
            {
            return false;
            }
            else return $result;
    }
    
    public static function pageindex()
    {
        $db = new PDO(saasConfig::DB_DNS ,saasConfig::DB_USER,saasConfig::DB_PASSWORD);
        $stmt = $db->prepare('select website from users inner join page on users.user_id = page.user_id');
        $stmt ->execute();
        $result = array();
        
        $result = $stmt->fetchall(PDO::FETCH_ASSOC);
        
        if (!count($result))
            {
                return false;
            }
        else return $result;
    }

    //put your code here
}

?>

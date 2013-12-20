<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dbaseIO
 *
 * @author Mikeloeven
 */
class dbaseIO {
    public static function addUser($POST)
    {
        $db = new PDO(saasConfig::DB_DNS ,saasConfig::DB_USER,saasConfig::DB_PASSWORD);

        $url = $POST['SiteName'];
        $email =$POST['email'];
        $password = sha1($POST['password']);
        
        
        try{
        $stmt = $db->prepare('insert into users set website = :websiteValue, email = :emailValue, password = :passwordValue');

        $stmt->bindParam(':websiteValue', $url, PDO::PARAM_STR);
        $stmt->bindParam(':emailValue', $email, PDO::PARAM_STR);
        $stmt->bindParam(':passwordValue', $password, PDO::PARAM_STR);
        
        if($stmt->execute())
        {
            $Msg = 1;
        }
        else{
           $Msg = 2;
        }
        
       }
        
        catch(PDOException $e)
        {
            $Msg =0;
        }
        return $Msg;
    }
    
    
    public static function dumpPageData()
    {
        
    }
    
    
    public static function addPage($POST)
            

    {
        $db = new PDO(saasConfig::DB_DNS ,saasConfig::DB_USER,saasConfig::DB_PASSWORD);
        
        $UID = $POST['adminID'];
        $title = $POST['title'];
        $theme = $POST['theme'];
        $address = $POST['address'];
        $phone = $POST['phone'];
        $email = $POST['email'];
        $about = $POST['about'];
        
        
        
        try{
        $stmt = $db->prepare('
    delete * from page where user_id = :UIDValue;          
    insert into page set user_id = :uidValue, title = :titleValue, address = :addressvalue, phone = :phoneValue, about = :aboutValue;
    ');

        $stmt->bindParam(':uidValue', $UID, PDO::PARAM_STR);
        $stmt->bindParam(':titleValue', $title, PDO::PARAM_STR);
        $stmt->bindParam(':addressValue', $address, PDO::PARAM_STR);
        $stmt->bindParam(':phoneValue', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':emailValue', $email, PDO::PARAM_STR);
        $stmt->bindParam(':aboutValue', $about, PDO::PARAM_STR);
        
        if($stmt->execute())
        {
            $Msg = 1;
        }
        else{
           $Msg = 2;
        }
        
       }
        
        catch(PDOException $e)
        {
            $Msg =0;
        }
        return $Msg;
    }
    
    
    
            
}

?>

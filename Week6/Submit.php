<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Submit
 *
 * @author Mikeloeven
 */
class Submit {




public static function LoadDb($PostDump)
{
print_r($PostDump);

$db = new PDO(Config::DB_DNS,  Config::DB_USER, Config::DB_PASSWORD);

$address = (isset($PostDump["address"]) ? $PostDump["address"] : "" );
$city = (isset($PostDump["city"]) ? $PostDump["city"] : "" );
$state = (isset($PostDump["state"]) ? $PostDump["state"] : "" );
$zip = (isset($PostDump["zip"]) ? $PostDump["zip"] : "" );
$name = (isset($PostDump["name"]) ? $PostDump["name"] : "" );



 if(Validator::validatestring($address) && Validator::validatestring($city) && Validator::validatestring($state) && Validator::validatestring($name) && Validator::validatezip($zip)){

    
    try{
        $stmt = $db->prepare('insert into addressbook set address = :addressValue, city = :cityValue, state = :stateValue, zip = :zipValue, name = :nameValue');
               
        $stmt->bindParam(':addressValue', $address, PDO::PARAM_STR);
        $stmt->bindParam(':cityValue', $city, PDO::PARAM_STR);
        $stmt->bindParam(':stateValue', $state, PDO::PARAM_STR);
        $stmt->bindParam(':zipValue', $zip, PDO::PARAM_STR);
        $stmt->bindParam(':nameValue', $name, PDO::PARAM_STR);
        
        if($stmt->execute())
        {
            return "<h3>INFO SUBMITTED</h3>";
        }
        else{
           return "<h3>INFO NOT SUBMITTED</h3>";
        }
       }
        
        catch(PDOException $e)
        {
            return "<h1>Database Error</h1>";
        }
 }
 return "<h3>validator issue</h3>";


}
}
?>

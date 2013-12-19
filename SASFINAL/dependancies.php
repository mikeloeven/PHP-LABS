<?php

/*
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/

spl_autoload_register(function($class) 
{
    include 'class/'.$class.'.php';
});
// session
if (!isset($_SESSION))
{
session_start();
}
session_regenerate_id(true);
if(isset($_SESSION["loggedin"]))
{
    session_regenerate_id(true);
}
else{$_SESSION["loggedin"]=false;}

        
        
?>

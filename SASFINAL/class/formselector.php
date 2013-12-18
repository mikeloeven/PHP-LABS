<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of formselect
 *
 * @author Mikeloeven
 */
class formselector {
    public static function loginFormSelect($GET)
    {
       
        if (isset($GET))
            {
                if ($GET=='signup')
                {
                    
                    
                    echo '<script type="text/javascript">';
                    echo 'document.getElementById("signupdiv").className = "form"';
                    echo '</script>';
                }
                else if($GET=='login')
                {
                    echo '<script type="text/javascript">';
                    echo 'document.getElementById("logindiv").className = "form"';
                    echo '</script>';
                }
                else if($GET=='debug')
                {
                    echo '<script type="text/javascript">';
                    echo 'document.getElementById("logindiv").className = "form"';
                    echo '</script>';
                    echo '<script type="text/javascript">';
                    echo 'document.getElementById("signupdiv").className = "form"';
                    echo '</script>';
                }
            }
    }
}

?>

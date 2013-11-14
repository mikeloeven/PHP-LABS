<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>ItemF</title>
    </head>
    <body>
        <?php
        include 'dependancies.php';
        
        if (count($_POST))
        {
        
            echo '<h1>'.Submit::LoadDb($_POST).'</h1>';
        }
        
        else echo '<h1> You Must Enter Something</h2>'
// put your code here
        
        
        /*
         * From all your notes and assignments from previous weeks, you should
         * be able to create an address book form that can be submited to this page
         * and with the data collected should be able to save to the database.
         * 
         * 1. Start by creating the form and making sure you can collect the data from
         * the $_POST super global.
         * 
         * 2. Validate the data so at least something is being entered correctly.
         * 
         * 3. Take the validated data and insert into the database with bindparam 
         * before excuting
         */
        
        
        ?>
         <form name="mainform" action="#" method="post">
    
           
            Name: <input type="text" name="name" value="" /> <br />
            Address: <input type ="text" name="address" value=""/> <br />
            City: <input type ="text" name="city" value=""/> <br />
            State:<input type ="text" name="state" value=""/> <br />
            Zip: <input type ="text" name="zip" value=""/> <br />
            
            
            <input type="submit" value="submit"/>
            
        </form> 
        
    </body>
    
    
</html>

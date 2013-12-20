
<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="css/Minecraft.css">
    </head>
    <script type="text/javascript" src="js/jquery1.10.2.js"></script>
    <script type="text/javascript" src="js/UrlChk.js"></script>
    <?php
        include 'dependancies.php';
        if (!isset($_SESSION))
        {
            session_start();
            session_regenerate_id(true);
        }
     
        
        
        
        //RETURNS USER TO INDEX IF A FORM IS NOT SPECIFIED
        if(isset($_GET["logout"])&&$_GET["logout"]==true)
            {   
                $_SESSION["loggedIn"]=false;
                session_destroy();
               
            }
        else if (count($_GET)>=1)
        {

            if($_GET["form"]=="login")
            {
                
            }
            if($_GET["form"]=="signup")
            {
                
            }
            
        }
        else if($_SESSION["loggedIn"]==true)
        {
            header("Location:admin.php");
        }
        //returns you to the index if your form strings are empty
        else 
        {
            header("Location:Index.php");
        }
    ?>

    <body>
       <div class="title"><a href = "index.php" style="text-decoration: none"><h1 class="title">█ SAAS DEMO █</h1></a></div>
        <div class="navbar"><div class="button"><a href="login.php?form=login"><h3 class="title"> Login </h3></a></div><div class="button"><a href="login.php?form=signup"><h3 class="title"> Signup </h3></a></div></div>
        <div class="bodydiv">
            <?php 
           //checks if post is set before doing anything
           if (isset($_POST))
           {
               
           //counts post to see which form was submitted new user has 3 and login only has 2 variables
               if (count($_POST)==3)
               {    
                   
                   if (!dbasevalidator::validateUrl($_POST['SiteName']))
                   {
                       echo '<div class="errdiv"><h3 class="err">Url Cannot Be Blank<br/>Url Can Only Contain Letters</h3></div>';
                   }
                   else if (dbasevalidator::validateEmail($_POST['email'])==false)
                        {
                            echo '<div class="errdiv"><h3 class="err">Email Invalid</h3></div>';
                        }
                   else if (dbasevalidator::duplicateemail($_POST['email'])==true)
                       {
                           echo '<div class="errdiv"><h3 class="err">Email Exists</h3></div>';
                           
                       }
                   
                   else if (!dbasevalidator::validatePassword($_POST['password']))
                   {
                       echo '<div class="errdiv"><h3 class="err">Fields Cannot Be Blank</h3></div>';
                   }
                   else{ 
                      
                      $msg = dbaseIO::addUser($_POST);
                      
               
                      
                      switch($msg){
                      
                      case 0:
                          echo '<div class="errdiv"><h3 class="err">Internal Database Error</h3></div>';
                          break;
                          
                      case 1:
                          echo '<div class="sucdiv"><h3 class="suc">Info Submitted</h3></div>';
                          break;
                      case 2:
                          echo '<div class="errdiv"><h3 class="err">Info Failed to Submit</h3></div>';
                          break;
                      break;
                      }
                   }
               }
                          
               if (count($_POST)==2)     
               {           
                      
                   if (dbasevalidator::validateCredentials($_POST['LIemail'], $_POST['LIpassword']))
                   {
                       $_SESSION['loggedIn']=true;
                       $_SESSION['website']=  dbasevalidator::getPageName($_POST['LIemail']);
                       header("Location:admin.php");
                       
                             
                   }
                   else
                   {
                       echo '<div class="errdiv"><h3 class="err">Email or Password Is Incorrect</h3></div>';
                   }
                      
               }
           }     
                   
                   
                 
       
           
?>  
            
            <!-- html code for the forms -->
           <div id="signupdiv" class="hiddendiv"> 
               <h3 class ="subtitle">New User Registration</h3>
            
           
              
           <form name="signup" class="signup" action="" method="post">
           <br/>
           <br/>
           <Label> Enter Site Name: </Label> <br/>
           <input type="text" name="SiteName" value=""/>
           <br/>
           <br/>
           <Label> Email Address: </Label><br/>
           <input type="text" name="email" value=""/>
           <br/>
           <br/>
           <Label> Password: </Label><br/>
           <input type="password" name="password" value=""/>
           <br/>
           <br/>
           <input type="submit" value="submit"/>
           </form>
           </div>
            
            
            <div id="logindiv" class="hiddendiv">
                <h3 class ="subtitle">Login</h3>
                
                
           <form name="login" class="signup" action="" method="post">
           <Label> Email: </Label> <br/>
           <input type="text" name="LIemail" value=""/>
           <br/>
           <br/>   
           <Label> Password: </Label><br/>
           <input type="password" name="LIpassword" value=""/>
           <br/>
           <br/>
           <input type="submit" value="submit"/>
           </form>
           </div>
            
           
            
            
        
        
        
        
        
            <?php
            //CHECKS THE GET VARIABLE AND SHOWS THE PROPER FORM ENDERING DEBUG IN THE URL WILL SHOW BOTH FORMS AT THE SAME TIME FOR EDITING
            if (isset($_GET["form"]))
            {                
               formselector::loginFormSelect($_GET["form"]);
                            
            }
            ?>
    </body>
</html>


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
    <?php
        include 'dependancies.php';
     
        
        
        if($_SESSION["loggedin"]==true)
        {
            header("Location:admin.php");
        }
        //RETURNS USER TO INDEX IF A FORM IS NOT SPECIFIED
        if (count($_GET["form"])==1)
        {

            if($_GET["form"]=="login")
            {
                
            }
            if($_GET["form"]=="signup")
            {
                
            }
        }
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
           
           if (isset($_POST))
           {
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
                          
                      
                          
                      
                   
                      
                   }
                
                   
                   
                   /*$err=0;
                   if 
                   (
                   dbasevalidator::validateEmail($_POST['email'])==true
                   &&
                   dbasevalidator::validatePassword($_POST['password'])==true
                   &&
                   dbasevalidator::validateUser($_POST['username'])==true
                   )
                       
                       
                   {
                       
                       if (dbasevalidator::duplicateemail($_POST['email'])==true)
                       {
                           echo '<div class="errdiv"><h3 class="err">email exists</h3></div>';
                           
                       }
                   }
               }
               else if (count($_POST)==2)
               {
                   
               }
               else
               {
                   
               }*/
       
           
?>  
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
           <Label> UserName: </Label> <br/>
           <input type="text" name="LIusername" value=""/>
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

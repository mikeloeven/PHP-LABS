
<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <?PHP
        include'dependancies.php';
        if (isset($_SESSION['loggedIn']))
            {
                if ($_SESSION['loggedIn']==true)
                {
                    print_r($_SESSION);
                }
                else{              
                header("Location:login.php?form=login");
                }
            }
         else{              
                header("Location:login.php?form=login");
             }
        
        ?>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="css/Minecraft.css">
    </head>
    
    <body>
        <body>
       <div class="title"><a href = "index.php" style="text-decoration: none"><h1 class="title">█ SAAS DEMO █</h1></a></div>
        <div class="navbar"><div class="button"><a href="login.php?logout=true&form=login"><h3 class="title"> Logout </h3></a></div></div>
        <div class="bodydiv">
            <div id="logindiv" class="form">
                <h3 class ="subtitle">Login</h3>
                
           <?php
                include'dependancies.php';
                print_r($_POST);
                print_r($_SESSION);
                if (isset($_POST['update'])&&$_POST['update']=="update")
                {
                    
                    if (isset($_SESSION['adminID']))
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
                        
                        
                        
                        
                        $_POST['adminID']=$_SESSION['adminID'];
                        dbaseIO::addPage($_POST);
                        
                        
                        
                    }
                    
                    
                    
                    
                }
           ?>
           <form name="login" class="signup" action="" method="post">
           
               
           <Label> Title: </Label><br/>
           <input type="text" name="title" value=""/>
           <br/>
           <br/>            
           <Label> theme: </Label> <br/>
           <select name="theme">
               <option value="minecraft.css" selected>Minecraft</option>
               <option value="BlackLight.css">Black Light</option>
               <option value="Boring.css">Boring </option>
           </select>
           <br/>
           <br/>   
           <Label> Address: </Label><br/>
           <input type="text" name="address" value=""/>
           <br/>
           <br/>
           <Label> Phone: </Label><br/>
           <input type="text" name="phone" value=""/>
           <br/>
           <br/>
           <Label> Email: </Label><br/>
           <input type="text" name="email" value=""/>
           <br/>
           <br/>
           <Label> About: </Label><br/>
           <textarea name="About" rows ="10"></textarea>
           <br/>
           <br/>
           <input type="hidden" name ="update" value="update"/>
           <input type="submit" value="submit"/>
           </form>
           </div>
            
            
        </div
    </body>
</html>

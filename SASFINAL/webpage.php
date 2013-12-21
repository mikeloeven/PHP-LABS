
<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link id="theme" rel="stylesheet" type="text/css" href="css/Minecraft.css">
    </head>
    <body>
        <div class="title"><a href = "index.php" style="text-decoration: none"><h1 class="title">█ SAAS DEMO █</h1></a></div>
       <div class="navbar"><div class="button"><a href="webpage.php"><h3 class="title"> PageIndex </h3></a></div><div class="button"><a href="login.php?form=login"><h3 class="title"> Login </h3></a></div><div class="button"><a href="login.php?logout=true&form=login"><h3 class="title"> Logout </h3></a></div></div>
        <div class="bodydiv">
            
        
        <br/>
        <div class="boxdiv" id="showhide1"> <h3 class="title" id="subtitle" style="text-align: center"> </h3></div>
        <br/>
        <br/>
        <br/>
        
        <div class="boxdiv2" id="showhide2"> 
            <h3 class="title" style="text-align: center;   ">:Address: </h3>
            <h3 class="title" id="address" style="text-align: center;   "> </h3>
        </div>
         <div class="boxdiv2" id="showhide3"> 
             <h3 class="title"  style="text-align: center">:Phone Number </h3>
             <h3 class="title" id="phone" style="text-align: center"> </h3>
         </div>
          <div class="boxdiv2" id="showhide4"> 
              <h3 class="title"  style="text-align: center">:Email: </h3>
              <h3 class="title" id="email" style="text-align: center"> </h3>
          </div>
        
        <div class="boxdiv" id="showhide5"> 
            <h3 class="title" style="text-align: center"> :About: </h3>
        </div>
        
        <div class="boxdiv2" id="showhide6">              
              <p class="title" id="about" style="text-align: left"> </p>
        </div>
        
        <br/>
        <br/>
  
        
        
        
            
        
            
            <?php
            
            include 'dependancies.php';
            $existflag = false;
            if (isset($_GET['pagename']))
            {
                if(!pagehandling::pageinfobyGET($_GET['pagename']))
                {
                    
                    
                    $existflag = false;
                    
                }
                else 
                {
                    $pageinfo = pagehandling::pageinfobyGET($_GET['pagename']);
                    //formselector::themeSelect($pageinfo);
                    $pageinfo = $pageinfo[0];
                                 
                    formselector::themeSelect($pageinfo);
                    //INSERT DATA HERE 
                    echo '
                        <script type="text/javascript">
                      
                        document.getElementById("subtitle").innerHTML = "'.$pageinfo["title"].'";
                        document.getElementById("address").innerHTML = "'.$pageinfo["address"].'";
                        document.getElementById("phone").innerHTML = "'.$pageinfo["phone"].'";
                        document.getElementById("email").innerHTML = "'.$pageinfo["email"].'";
                        document.getElementById("about").innerHTML = "'.$pageinfo["about"].'";
                        
            
                        </script>';
                     //END OF DATA INSERTION       
                       
                   
                    
                    
                    
                    $existflag = true;
                }
                
                
            }
                
            if ($existflag == false)
            {
                //HIDE
                echo '
                        <script type="text/javascript">
                      
                        document.getElementById("showhide1").className = "hiddendiv";
                        document.getElementById("showhide2").className = "hiddendiv";
                        document.getElementById("showhide3").className = "hiddendiv";
                        document.getElementById("showhide4").className = "hiddendiv";
                        
            
                        </script>';
                
                echo '<h3>invalid page, showing index</h3>';
                    
                    $table = pagehandling::pageindex();
                    if (!$table)
                    {
                        echo '<h3>empty database</h3>';
                    }
                    else 
                    {
                        
                        foreach ($table as $col)
                        {
                            echo '<h3>';
                            echo '<a href=http://localhost/SASFINAL/webpage.php?pagename='.$col['website'].'>';
                            foreach ($col as $line)
                            {
                               echo $line;
                            }
                            echo '</a>';
                            echo '</h3>';
                            echo '<br/>';
                        }
                    }
            }
            ?>
        
        </div>
    </body>
</html>


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
            
        <h1 id="title" style="text-align: center;">test</h1>
        <br/>
        <br/>
        <br/>
        <br/>
        <div class="boxdiv"> <h3 class="title" id="subtitle" style="text-align: center"> </h3></div>
        <br/>
        <div class="boxdiv2"> <h3 class="title" id="OTHER" style="text-align: center;   ">SDFG </h3></div>
         <div class="boxdiv2"> <h3 class="title" id="OTHER" style="text-align: center">SDFG </h3></div>
          <div class="boxdiv2"> <h3 class="title" id="OTHER" style="text-align: center">SDFG </h3></div>
  
        
        
        
            
        
            
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
                    
                    echo '<script type="text/javascript">';
                    echo 'document.getElementById("subtitle").innerHTML = "'.$pageinfo["title"].'"';
                    echo '</script>';
                    
                    echo '<script type="text/javascript">';
                    echo 'document.getElementById("subtitle").innerHTML = "'.$pageinfo["title"].'"';
                    echo '</script>';
                    
                    echo '<script type="text/javascript">';
                    echo 'document.getElementById("subtitle").innerHTML = "'.$pageinfo["title"].'"';
                    echo '</script>';
                   
                    print_r($pageinfo);
                    
                    
                    $existflag = true;
                }
                
                
            }
            
            if ($existflag == false)
            {
                echo '<h3>invalid page, showing index</h3>';
                    
                    $table = pagehandling::pageindex();
                    if (!$table)
                    {
                        echo '<h3>empty database</h3>';
                    }
                    else 
                    {
                        print_r($table);
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


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
    <body>
        <div class="title"><a href = "index.php" style="text-decoration: none"><h1 class="title">█ SAAS DEMO █</h1></a></div>
        <div class="bodydiv"><h1 style="text-align: center;">test</h1>
        
            
            <?php
            include 'dependancies.php';
            if (isset($_GET['pagename']))
            {
                if(!pagehandling::pageinfobyGET($_GET['pagename']))
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
                            echo $col;
                            foreach ($col as $line)
                            {
                                echo $line;
                            }
                        }
                    }
                    
                    
                }
                else 
                {
                    $pageinfo = pagehandling::pageinfobyGET($_GET['pagename']);
                    print_r($pageinfo);
                    echo 'breakhere';
                }
                
                
            }
            else
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
                            echo '<a href=http://localhost/SASFINAL/webpage.php?pagename='.$col['title'].'>';
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

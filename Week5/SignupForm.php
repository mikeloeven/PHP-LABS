<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

<?php 

if (!empty($errorMsg)){
    echo "<p>",$errorMsg,"</p>";    
}
if (!empty($successMsg)){
    echo "<p>",$successMsg,"</p>";    
}

?>
        <form name="mainform" action="DbaseProcessing.php" method="post">
    
            Email: <input type="text" name="email" value="" /><br />
            UserName: <input type="text" name="username" value="" /> <br />
            {Password: <input type ="text" name="password" value">
            <input type="submit" value="submit"/>
            
        </form> 
        
        
        
        
        


    </body>
</html>
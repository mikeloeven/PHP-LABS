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
            UserName: <input type="text" name="fName" value="" /> <br />
            Comments: <br /> <textarea cols="20" rows="5" name="comments" value=""></textarea> <br/>
            <input type="submit" value="submit"/>
            
        </form> 
        
        
        
        
        
<?php

?>

    </body>
</html>
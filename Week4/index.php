
<body>

<?php

include 'validator.php';
include 'Config.php';

$valObj = new Validator();

$testEmail = "testemail
    ";

if ($valObj->validateEmail($testEmail)){

    echo "email is valid";
    
    
}
else{
    echo "email is not valid";
}


?>

</body>
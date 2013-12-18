<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        
        <?php
            include 'Config.php';
            include 'Validator.php';
            
            session_start();
            session_regenerate_id();
            
            $token = uniqid();
               
            
            //blocks session hijacking
            if(!isset($_SESSION["token"])){
                $_SESSION["token"] = $token;
            }
            else {
                if(isset($_POST['token']) && $_SESSION["token"] != $_POST["token"]){
                    
                    
                    session_destroy();
                    header("login.php");
                    exit();
                }
                
            }
            
            //avoids bots
            if (!empty($_POST["email"])){
                $_SESSION["wait"] = time()+config::MAX_SESSION_TIME;
                        
            }
            
            if (isset($_SESSION["wait"])&& $_SESSION["wait"] > (time() - config::MAX_SESSION_TIME)){
                echo "Please Come Back";
                exit();
            }
            
         
        $_SESSION["token"] = $token;
        
        $username = (isset($_POST["username"]) ) ? $_POST["username"]:"";
        $password = (isset($_POST["password"]) ) ? $_POST["password"]:"";
        print_r($_POST);
        if (!empty($username) && !empty($password) && Validator::LoginValidate($username,$password)){
            
            $_SESSION["isLoggedIn"] = true;
            header("Location:admin.php");
            
        }
        else{
            echo "<p>Username or Password is not Correct</p>";
            
        }
        ?>
        <form name="mainform" action="LoginForm.php" method="post">
    
           
            UserName: <input type="text" name="username" value="" /> <br />
            Password: <input type ="text" name="password" value=""/> <br />
            <input type="hidden" name="email"
            <input type="hidden" name="token" value="">
            <input type="submit" value="submit"/>
            
        </form> 

        
    </body>
</html>

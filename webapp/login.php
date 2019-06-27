<html>
    <head><title>user authentication</title>
    </head>
    <body>
        <?php
        ?>
        <?php
             function test_input($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
        ?>
        <?php include("dbactions.php"); ?>
        <?php
            $email = test_input($_POST["email"]);
            $password = $_POST["password"];
            if(authUser($email,$password) == TRUE){
                echo "<h1>"."logged in"."</h1>";
            }
            else{
                echo "<h1>"."wrong credentials"."</h1>";
            }   
        ?>
    </body>
</html>
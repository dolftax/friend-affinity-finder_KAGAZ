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
                $name = mappedQuery($email,"name");
                echo sprintf("<script type=\"text/javascript\">var name = '%s';</script>",$name);
                echo sprintf("<script type=\"text/javascript\">var email = '%s';</script>",$email);
                echo sprintf("<script type=\"text/javascript\">location.href = '%s';</script>","./userHome.php");
            }
            else{
                echo "<h1>"."wrong credentials"."</h1>";
                echo sprintf("<script type=\"text/javascript\">location.href = '%s';</script>","./login_page.php");
            }   
        ?>
    </body>
</html>
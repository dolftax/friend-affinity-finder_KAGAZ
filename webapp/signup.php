<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>kagaz signup</title>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CSS Flexbox Grid Login Page</title>

    <!--Font Awesome 4.7.0 CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="style.css">

  
  
      <link rel="stylesheet" href="./css/style.css">

  
</head>

<body>
<!DOCTYPE html>
<html lang="en">
<body>

<?php
                $name = $email = $password = $cnfpassword = "";
                
                if ($_SERVER["REQUEST_METHOD"] == "POST"){
                    if(empty($_POST["name"])){
                        $nameerr = "Name is required !";
                    } else{
                        $name = test_input($_POST["name"]);
                    }

                    if(empty($_POST["email"])){
                        $emailerr = "email is required !";
                    } else{
                        $email = test_input($_POST["email"]);
                    }

                    if(empty($_POST["password"])){
                        $pwderr = "password is required !";
                    } else{
                        $password = test_input($_POST["password"]);
                    }

                    if(empty($_POST["cnfpassword"])){
                        $cpwderr = "re-enter password !";
                    } else{
                        $cnfpassword = test_input($_POST["cnfpassword"]);
                    }
                }

            function test_input($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            

            ?>
        <div class="sct login">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <h3>kagaz signup</h3>
                  <span class="error"> * <?php echo $nameerr; ?> </span>
                <input type="text" name="name" placeholder="name" value = "<?php echo $name; ?>"/>
                  <span class="error"> * <?php echo $emailerr; ?> </span>
                <input type="email" name="email" placeholder="Email" value = "<?php echo $email?>" />
                  <span class="error"> * <?php echo $pwderr; ?> </span>                
                <input type="password" name="password" placeholder="Password" value="<?php echo $password?>"/>
                  <span class="error"> * <?php echo $cpwderr; ?> </span>
                <input type="password" name="cnfpassword" placeholder="Retype Password" value = "<?php echo $cnfpassword?>" />
                <input type="submit" name="register" value="register">
            </form>
        </div> <!--end login-->
        
        
</body>
</html>

</body>
</html>

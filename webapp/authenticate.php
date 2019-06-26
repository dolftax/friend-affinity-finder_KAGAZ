 <?php
                $name = $email = $password = $cnfpassword = "";
                
                if ($_SERVER["REQUEST_METHOD"] == "POST"){
                    if(empty($_POST["name"])){
                        $nameerr = "Name is required !";
                    } else{
                        $name = test_input($_POST["name"]);
                        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                            $nameErr = "Only letters and white space allowed";
                        }
                    }

                    if(empty($_POST["email"])){
                        $emailerr = "email is required !";
                    } else{
                        $email = test_input($_POST["email"]);
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            $emailErr = "Invalid email format";
                          }
                    }

                    if(empty($_POST["password"])){
                        $pwderr = "password is required !";
                    } else{
                        $password = test_input($_POST["password"]);
                    }

                    if(empty($_POST["cnfpassword"])){
                        $cpwderr = "re-enter password !";
                    } else{
                        if($_POST["cnfpassword"] != $_POST["password"]){
                            $cpwderr = "passwords don't match !";
                        }
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
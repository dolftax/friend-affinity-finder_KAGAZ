
<?php

    function addUser($userRow){
        $servername = "kagaz_mysql";
        $username = "messi";
        $password =  "messi";
        $database = "kagaz_db";
        $conn = new mysqli($servername,$username,$password,$database);

        if ($conn->connect_error) {
            die("Connection failed: ". $conn->connect_error);
        }
        $sql = sprintf("insert into kagaz_users(name,email,password) values('%s','%s','%s')",$userRow['name'],$userRow['email'],$userRow['password']);
        if($conn->query($sql) == TRUE){
            echo "registered !";
        } else{
            echo "email already registered !";
        }
        $conn->close();
    }
    // test statement
    // addUser(array("username" => 'bhai55',"password" => 'ghanti22', "name" => 'house'));

?>


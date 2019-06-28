
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
    function authUser($email,$password_arg){
        $servername = "kagaz_mysql";
        $username = "messi";
        $password =  "messi";
        $database = "kagaz_db";
        $conn = new mysqli($servername,$username,$password,$database);

        if ($conn->connect_error) {
            die("Connection failed: ". $conn->connect_error);
        }
        $sql = sprintf("select * from kagaz_users where email = '%s' AND password = '%s'",$email,$password_arg);
        $result = $conn->query($sql);
        if($result->num_rows == 0){
            return FALSE;
        } else{
            return logIn($email);
        }
        $conn->close();
    }

    function logIn($userEmail){
        $servername = "kagaz_mysql";
        $username = "messi";
        $password =  "messi";
        $database = "kagaz_db";
        $conn = new mysqli($servername,$username,$password,$database);

        if ($conn->connect_error) {
            die("Connection failed: ". $conn->connect_error);
        }
        $sql = sprintf("insert into loggedIn select sno from kagaz_users where email='%s';",$userEmail);
        if($conn->query($sql)){
            return TRUE;
        } else {
            return FALSE;
        }
        $conn->close();  
    }
    
    function mappedQuery($email,$key){
        $servername = "kagaz_mysql";
        $username = "messi";
        $password =  "messi";
        $database = "kagaz_db";
        $conn = new mysqli($servername,$username,$password,$database);

        if ($conn->connect_error) {
            die("Connection failed: ". $conn->connect_error);
        }
        echo $sql = sprintf("select %s from kagaz_users where email = '%s'",$key,$email);
        $result = $conn->query($sql);
        if($result->num_rows == 0){
            return "no user";
        } else{
            $row = $result->fetch_assoc();
            foreach($row as $x => $x_value){
                $ret = $x_value;
            }
            return $ret;
        }
        $conn->close();
        
    }
    //test call
    // echo mappedQuery("kingslayer@lannistermail.com","name");
?>


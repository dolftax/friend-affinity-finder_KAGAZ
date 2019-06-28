<! DOCTYPE html>
<html>
    <body>
        <?php
            echo "myfirst php script !" . "<br>"
        ?>
        <?php
        $servername = "kagaz_mysql";
        $username = "messi";
        $password =  "messi";
        $database = "kagaz_db";

        $conn = new mysqli($servername,$username,$password,$database);

        if ($conn->connect_error) {
            die("Connection failed: ". $conn->connect_error);
        }
        
        echo "<br>" . "Connected sucessfully" . "<br>";
        $result = $conn->query("use kagaz_db");
        // echo $result[0];
        // $result = $conn->query("show tables");
        if ($result = $conn->query("select * from kagaz_users")){
            // echo $result[0];
            if($result->num_rows > 0){
                echo "<br/>" . $result->num_rows . "<br/>";
                while($row = $result->fetch_assoc()){
                    foreach($row as $x => $x_value){
                        echo "field :" . $x . " value :" . $x_value;
                        echo "<br>";
                    }
                }
            }   else{
                echo "0 results";
            }
            // echo $result;
           
            $result->close();
        }
        $conn->close();
        ?>
    </body>
</html>
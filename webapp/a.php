 <?php
$servername = "kagaz";
$username = "root";
$pass = "jassi";
$dbname = "ibm_proj";


$conn = new mysqli($servername, $username, $pass, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

name=$HTTP_post["name"];
email=$HTTP_POST["email"];
passwd=$HTTP_POST["password"];
confpasswd=$HTTP_POST["cnfpassword"];
if(confpasswd==passwd){
     $sql = "INSERT INTO login (name,uname,password) values (name,email,passwd)";
}
VALUES ('John', 'Doe', 'john@example.com')";
?> 

<?php
$servername="localhost";
$username="root";
$pass="";
$db="project";
$conn = new mysqli($servername, $username, $pass, $db );
if($conn -> connect_error){
    die("connection failed:".$conn->connect_error);
}
echo "Succefful";
?>
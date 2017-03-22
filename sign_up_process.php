<?php

$id=$name=$password=$contact_no=$email="";


$id= $_POST["userid"];
$name= $_POST["name"];
$pass=$_POST["password"];
$contact_no=$_POST["contact_no"];
$email=$_POST["email"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "CFB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO USER_TAB
VALUES ('$id', '$name','$contact_no','$pass','CIT',0,'OSS', '$email')";

if ($conn->query($sql) === TRUE) {
  header('Location: login.php');
}
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<?php

$id=$password="";
$error="";
$loginFailed="";

$id= $_POST["userid"];
$pass=$_POST["password"];

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

$sql = "SELECT * FROM USER_TAB WHERE USERID='$id' and password='$pass'" ;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  header('Location: course_select.html');
}
  else {
  	
  	die(header("location:login.php?loginFailed=true&reason=password"));
}
$conn->close();
?>

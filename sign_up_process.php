<?php
session_start();

$id=$name=$password=$contact_no=$email="";
$id= $_POST["userid"];
$name= $_POST["name"];
$password_hash=$_POST["password"];
$contact_no=$_POST["contact_no"];
$email=$_POST["email"];
#$password_hash = password_hash($pass, PASSWORD_DEFAULT);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "CFB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if(!($stmt = $conn->prepare("INSERT INTO USER_TAB VALUES (?,?,?,?,'CIT',0,'OSS',?)"))){
        echo "Prepare failed: (" . $conn->errno . ")" . $conn->error;
    }

    if(!$stmt->bind_param('sssss', $id, $name, $contact_no, $password_hash, $email)){
     echo "Binding paramaters failed:(" . $stmt->errno . ")" . $stmt->error;
    }

    if(!$stmt->execute()){
     echo "Execute failed: (" . $stmt->errno .")" . $stmt->error;
    }

    if($stmt) {
         header("location:login.php?signUp=true&reason1=success");
    }

    else{
        echo "Registration failed";
    }

$conn->close();
?>

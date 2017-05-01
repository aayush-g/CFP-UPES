<?php
session_start();
$code=$_POST['coursecode'];
$subjname=$_POST['sbjname'];
$semester=$_POST['sem'];
$course=$_POST['bname'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "CFB";

echo $_SESSION['user'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    if(!($stmt = $conn->prepare("INSERT INTO COURSE_TAB VALUES(?,?,?,?,?)"))){
            echo "Prepare failed: (" . $conn->errno . ")" . $conn->error;
    }

    if(!$stmt->bind_param('sssss', $code,$subjname,$_SESSION['user'],$semester,$course)){
        echo "Bind failed: (" . $stmt->errno . ")" . $stmt->error;
    }

    if(!$stmt->execute()){
     echo "Execute failed: (" . $stmt->errno .")" . $stmt->error;
    }
$stmt->close();
$conn->close();
header("location:course_select.php");
?>

<?php
session_start();
$lecno=$_POST['lecNo'];
$plandate=$_POST['planedDate'];
$topiccov=$_POST['topicCovered'];
$executedate=$_POST['executedDate'];
$remark=$_POST['remarks'];

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

    if(!($stmt = $conn->prepare("INSERT INTO COURSE_DIARY VALUES(?,?,?,?,?,?,?)"))){
            echo "Prepare failed: (" . $conn->errno . ")" . $conn->error;
    }

    if(!$stmt->bind_param('ssssiss',$_SESSION['user'],$_SESSION['course'],$executedate,$topiccov,$lecno,$plandate,$remark)){
        echo "Bind failed: (" . $stmt->errno . ")" . $stmt->error;
    }

    if(!$stmt->execute()){
     echo "Execute failed: (" . $stmt->errno .")" . $stmt->error;
    }

$stmt->close();
$conn->close();
header("location:course_diary.php");

?>

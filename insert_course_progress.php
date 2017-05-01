<?php
session_start();
$month=$_POST['month'];
$percsyllabus=$_POST['percentsyllabus'];
$nolecture=$_POST['nolectures'];
$assignment=$_POST['assignment'];
$test=$_POST['test'];
$quiz=$_POST['quiz'];

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

    if(!($stmt = $conn->prepare("INSERT INTO COURSE_PROGRESS_TAB VALUES(?,?,?,?,?,?,?,?)"))){
            echo "Prepare failed: (" . $conn->errno . ")" . $conn->error;
    }

    if(!$stmt->bind_param('sssiiiii', $_SESSION['user'],$_SESSION['course'],$month,$nolecture,$percsyllabus,$assignment,$test,$quiz)){
        echo "Bind failed: (" . $stmt->errno . ")" . $stmt->error;
    }

    if(!$stmt->execute()){
     echo "Execute failed: (" . $stmt->errno .")" . $stmt->error;
    }
$stmt->close();
$conn->close();
header("location:course_progress.php");
?>

<?php

$id=$password="";
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

    if(!($stmt = $conn->prepare("SELECT PASSWORD FROM USER_TAB WHERE USERID = ?"))){
            echo "Prepare failed: (" . $mysqli->errno . ")" . $mysqli->error;
    }

    if(!$stmt->bind_param('s', $id)){
        echo "Bind failed: (" . $stmt->errno . ")" . $stmt->error;
    }

    if(!$stmt->execute()){
     echo "Execute failed: (" . $stmt->errno .")" . $stmt->error;
    }

    $userdata = $stmt->get_result();
    $row = $userdata->fetch_array(MYSQLI_ASSOC);

    $stmt->bind_result($password);
    $stmt->store_result();

             if($pass==$row['PASSWORD']){

            $_SESSION['user'] = $_POST['id'];
            header('Location: course_select.html');
            exit();
        }

    else{
        echo "Login Failed: (" . $stmt->errno .")" . $stmt->error;
    }
$stmt->close();
$conn->close();

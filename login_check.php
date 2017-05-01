<?php
session_start();

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

    if(!($stmt = $conn->prepare("SELECT NAME,PASSWORD FROM USER_TAB WHERE USERID = ?"))){
            echo "Prepare failed: (" . $conn->errno . ")" . $conn->error;
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
      $_SESSION['user'] = $id;
      $name=$row['NAME'];
      $_SESSION['name']=$name;
      header('Location: course_select.php');
      exit();
        }

    else{
        die(header("location:login.php?loginFailed=true&reason=password"));
    }
$stmt->close();
$conn->close();
?>

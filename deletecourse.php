<?php
    session_start();
    $course=$_POST['course'];
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

        if(!($stmt = $conn->prepare("DELETE FROM COURSE_TAB WHERE COURSE_CODE=? AND ALLOTTED_TO=? "))){
                echo "Prepare failed: (" . $conn->errno . ")" . $conn->error;
        }

        if(!$stmt->bind_param('ss', $course,$_SESSION['user'])){
            echo "Bind failed: (" . $stmt->errno . ")" . $stmt->error;
        }

        if(!$stmt->execute()){
         echo "Execute failed: (" . $stmt->errno .")" . $stmt->error;
        }
    $stmt->close();
    $conn->close();
  header("location: course_select.php");

/*
session_start();
  $user=$_SESSION['user'];
  $course=$_POST['course'];
$con=mysqli_connect("localhost","root","","CFB");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql = "DELETE FROM COURSE_DIARY WHERE ons ORDER BY LastName;";
$sql .= "SELECT Country FROM Customers";

// Execute multi query
if (mysqli_multi_query($con,$sql))
{
  do
    {
    // Store first result set
    if ($result=mysqli_store_result($con)) {
      // Fetch one and one row
      while ($row=mysqli_fetch_row($result))
        {
        printf("%s\n",$row[0]);
        }
      // Free result set
      mysqli_free_result($result);
      }
    }
  while (mysqli_next_result($con));
}

mysqli_close($con); */
?>

<?php
session_start();
?>

<!DOCTYPE>
<html>
<head>
<script type="text/javascript" src="count.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
<style>

table {
    border: 1px solid black;
	border-collapse:collapse;
	text-align: center;
}
th,td {
 padding :10px;
 border: 1px solid black;
	border-collapse:collapse;

 }

 .form1{
    width: 20%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

 #form{

  display: inline-block;
 }

 .myButton{

  width : 250px;

 }

</style>

</head>
<body>
<h2 class="head1" align="center" padding="0 px">Course Progress</h2>
<br><br>
<table id="myTable" align="center" width="100%" >

<tbody>

<tr>
<td>Month</td>
<td>No of Lecture Taken</td>
<td>%of Syllabus covered</td>
<td>Assignment</td>
<td>Test</td>
<td>quiz</td>
</tr>
<?php
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

    if(!($stmt = $conn->prepare("SELECT * FROM COURSE_PROGRESS_TAB WHERE USER = ?"))){
            echo "Prepare failed: (" . $conn->errno . ")" . $conn->error;
    }

    if(!$stmt->bind_param('s', $_SESSION['user'])){
        echo "Bind failed: (" . $stmt->errno . ")" . $stmt->error;
    }

    if(!$stmt->execute()){
     echo "Execute failed: (" . $stmt->errno .")" . $stmt->error;
    }

    $userdata = $stmt->get_result();
    while ($row = mysqli_fetch_array($userdata,MYSQL_ASSOC)) {
      echo "<tr>";
      echo "<td>" . $row['MONTH'] . "</td>";
      echo "<td>" . $row['NO_OF_LECTURES_TAKEN'] . "</td>";
      echo "<td>" . $row['PERC_SYLLABUS_COVERED'] . "</td>";
      echo "<td>" . $row['NO_OF_ASSIGNMENT'] . "</td>";
      echo "<td>" . $row['NO_OF_TEST'] . "</td>";
      echo "<td>" . $row['NO_OF_QUIZ'] . "</td>";
      echo "</tr>";
}



$stmt->close();
$conn->close();
?>

</tbody>
</table>
<br>
<div align="center">
<button align="center" class="myButton" id="submitcourseprogress">Add Row</button>
</div>
</form>

<script type="text/javascript">


 $(document).ready( function(){
         $("#myDiv").on('click', '#submitcourseprogress',function(){
            window.location="course_progress.php";
           });
        });

</script>

</body>

</html>

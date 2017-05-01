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

 form{

  display: inline-block;
 }
 .myButton{

  width : 250px;

 }
</style>

</head>
<body>
<h2 class="head1" align="center">Course Progress</h2>
<br><br>
<table id="myTable"align="center" >
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
  <form method="POST" action="insert_course_progress.php" id="formcourseprogress" name="formcourseprogress">
<td><input type="text" id="m"   name="month" required></td>
<td><input type="number" id="l" name="nolectures" required></td>
<td><input type="number" id="s" name="percentsyllabus" required></td>
<td><input type="number" id="a" name="assignment" required></td>
<td><input type="number" id="t" name="test" required></td>
<td><input type="number" id="q" name="quiz" required></td>

</tbody>
</table>
</form>
<br>
<div align="center">
<button class="myButton" id="home" width="50%">Back to Dashboard</button>
<button align="center" class="myButton" id="submitcourseprogress" onClick="submitForm()">Add Row</button>
</div>
<script type="text/javascript">

document.getElementById("home").onclick = function () {
        location.href = "dashboard.php";
    };
    
function submitForm(){

 document.getElementById('formcourseprogress').submit();
 
}

</script>

</body>

</html>

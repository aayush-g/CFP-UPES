<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>

<title> Course Progress</title>

<script type="text/javascript" src="count1.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
<style>

.myButton {

  width : 250px;
}


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
    width: 100%;
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




</style>

</head>

<h2 class="head1" align="center">Academic Diary</h2>
<body>
<br><br>
<table id="myTable" align="center">
<thead>
  <tr>
    <th >Lecture No.</th>
    <th>Planned Date</th>
    <th style="width:1300px text-algin:center" >Topics Covered</th>
    <th>Executed date</th>
    <th>Remarks</th>
  </tr>
  </thead>
  <tbody>
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

      if(!($stmt = $conn->prepare("SELECT * FROM COURSE_DIARY WHERE USER = ?"))){
              echo "Prepare failed: (" . $conn->errno . ")" . $conn->error;
      }

      if(!$stmt->bind_param('s', $_SESSION['user'])){
          echo "Bind failed: (" . $stmt->errno . ")" . $stmt->error;
      }

      if(!$stmt->execute()){
       echo "Execute failed: (" . $stmt->errno .")" . $stmt->error;
      }

      $userdata = $stmt->get_result();
    //  $row = $userdata->fetch_array(MYSQLI_ASSOC);
    //  $stmt->bind_result($password);
    //  $stmt->store_result();

      //echo count($row);
      /*foreach($row as $value)
      {
          echo "<li>$value</li>";
      }*/
      while ($row = mysqli_fetch_array($userdata,MYSQL_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['LECTURE_NO'] . "</td>";
        echo "<td>" . $row['PLAN_DATE'] . "</td>";
        echo "<td>" . $row['TOPICS_COVERED'] . "</td>";
        echo "<td>" . $row['DATE_OF_LECTURE'] . "</td>";
        echo "<td>" . $row['REMARKS'] . "</td>";

        echo "</tr>";
  }



  $stmt->close();
  $conn->close();
  ?>

<tbody>
   <tr>
     <form name="form1" method="POST" action="academicdiaryentry.php" id="form1">
       <td><input type="text" id="l" name = "lecNo" required></td>
       <td><input type="text" id="p" name = "planedDate" required></td>
       <td><input type="text" id="t" name = "topicCovered" required></td>
       <td><input type="text" id="e" name = "executedDate" required></td>
       <td><input type="text" id="r" name = "remarks" required></td>
    </tr>
</tbody>
    </table>
    <br><br>
</form>
<div align ="center" id="div1">
<button class="myButton" id="home" width="50%">Back to Dashboard</button>
<button class="myButton" id="submitform1" width="50%" onClick = "submitForm()">Add Row</button>
</div>

<script type="text/javascript">
  
 //$(document).ready( function(){
   //      $("div1").on('click', '#submitform1',function(){
     //         $("#form1").submit();
       //    });
       // });

//$(document).ready( function(){
  ///       $("#myDiv").on('click', '#home',function(){
         //     window.location ="dashboard.php";
     //      });
       // });
document.getElementById("home").onclick = function () {
        location.href = "dashboard.php";
    };

function submitForm(){

 var f = document.getElementsByTagName('form1')[0];
  if(f.checkValidity()) {
    f.submit();
  } else {
    alert(document.getElementById('example').validationMessage);
  }
 
}

</script>
</body>
</html>

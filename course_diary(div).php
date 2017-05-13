<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>

<title> Course Progress</title>
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
    width: 100%;
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
<h2 class="head1" align="center">Academic Diary</h2>
<body>
<br><br>
<table id="myTable" width="100%">
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

    </table>
    <br><br>
<div align="center"><button class="myButton" id="submitform1" >Add Row</button></div>
</form>

<script type="text/javascript">
  
 $(document).ready( function(){
         $("#myDiv").on('click', '#submitform1',function(){
              window.location="course_diary.php";
           });
        });
</script>
</body>
</html>

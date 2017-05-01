<?php
session_start();
if(!(isset($_SESSION['user']))){
  header('Location: login.php');
}
?>

<html>
  <head>
    <title>Course_Select
    </title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style.css">
  </head>
  <style>
    .mycButton {
      cursor: pointer;
      background: #33b5e5;
      width: 50%;
      border: 0;
      padding: 10px 15px;
      color: #ffffff;
      -webkit-transition: 0.3s ease;
      transition: 0.3s ease;
    }
    .para1{
      border:2px solid #ccc;
      border-color: white;
      padding: 50px 30px;
      max-width:400px;
      width:80%;
      background: white;
      margin:auto;
    }
  </style>
  <body>
    <main id="myContainer" class="MainContainer">
      <p class='head1'> Select Courses
      </p>
      <div class="boxed">
        <h2  align="center">Hi  <?php
    echo $_SESSION['name']; ?>!
        </h2>
        <br>
        <div class="para1">
          Already existing courses :
          <ul id ="courselist" >
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

        if(!($stmt = $conn->prepare("SELECT COURSE_TITLE FROM COURSE_TAB WHERE ALLOTTED_TO = ?"))){
                echo "Prepare failed: (" . $conn->errno . ")" . $conn->error;
        }

        if(!$stmt->bind_param('s', $_SESSION['user'])){
            echo "Bind failed: (" . $stmt->errno . ")" . $stmt->error;
        }

        if(!$stmt->execute()){
         echo "Execute failed: (" . $stmt->errno .")" . $stmt->error;
        }

        $userdata = $stmt->get_result();
      //  $row = $userdata->fetch_all(MYSQLI_ASSOC);
      //  $stmt->bind_result($password);
      //  $stmt->store_result();

  //      echo count($row);
        while ($row = mysqli_fetch_array($userdata,MYSQL_ASSOC)) {
        /*  echo "<tr>";
          echo "<td>" . $row['LECTURE_NO'] . "</td>";
          echo "<td>" . $row['PLAN_DATE'] . "</td>";
          echo "<td>" . $row['TOPICS_COVERED'] . "</td>";
          echo "<td>" . $row['DATE_OF_LECTURE'] . "</td>";
          echo "<td>" . $row['REMARKS'] . "</td>";

          echo "</tr>";
*/
          echo '<li><a href="dashboard.php?course='.$row["COURSE_TITLE"].'">'.$row["COURSE_TITLE"].'</a></li>';
        //echo "<li>{$row["COURSE_TITLE"]}</li>";
    }
    /*    foreach($row as $value)
        {
          foreach($value as $values)
          {
            echo '<li><a href="dashboard.php/?course='.$value.'">'.$value.'</a></li>';
        }}*/



    $stmt->close();
    $conn->close();
    ?>

          </ul>
          <br>
          <br>
          <br>
          <br>
          <br>
          <button id ="myBtn" class="mycButton" >Add Course!
          </button>
        </div>
        <br>
        <br>
        <br>
      </div>
    </main>
    <!-- Modal container it includes the overlay -->
    <div id="myModal" class="Modal is-hidden is-visuallyHidden">
      <!-- Modal content -->
      <div class="modal-body">
      </div>
      <div class="Modal-content">
        <span id="closeModal" class="Close">&times;
        </span>
        <p>
          Hi!
        </p>
        <form method="POST" action ="add_course.php">
        <p>
          Course Code :
          <br>
          <input align="center" type = "text" name="coursecode">
          <br>
          <br>
          Branch Name :
          <br>
          <input align="center" type = "text" id='bname1' name="bname">
          <br>
          <br>
          Subject Name :
          <br>
          <input align="center" type = "text" name="sbjname">
          <br>
          <br>
          Semester :
          <br>
          <input align="center" type = "text" name="sem">
          <br>
          <br>
        </p>
        <button class="myButton " type="submit" >Submit!
        </button>
        </form>
        <br>
        <br>
      </div>
    </div>
    <script src="app.min.js">
    </script>
    <script>
      var modal = document.getElementById('myModal');
      var btn = document.getElementById("myButton1");
      var span = document.getElementsByClassName("close")[0];
      btn.onclick = function() {
        modal.style.display = "block";
      }
      span.onclick = function() {
        modal.style.display = "none";
      }
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }
    </script>
  </body>
</html>

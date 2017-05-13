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
    .myButton {
      cursor: pointer;
      background: #33b5e5;
      width: 45%;
      border: 0;
      padding: 10px 15px;
      color: #ffffff;
      -webkit-transition: 0.3s ease;
      transition: 0.3s ease;
    }
    .para1{
      border:2px solid #ccc;
      border-color: white;
      padding: 50px 0px;
      max-width:100%;
      width:90%;
      background: white;
      margin:auto;
    }

    #myBtn1, #myBtn2{
         
         display:inline-block;


    }


    #coursetodelete{

   outline: none;
  display: block;
  width: 50%;
  border: 1px solid #d9d9d9;
  
  margin: 15 15 20px;
  padding: 10px 15px;
  box-sizing: border-box;
  font-weight: 400;
  -webkit-transition: 0.3s ease;
  transition: 0.3s ease;

    }
 
  #submitdelete{

   
  margin: 15 15 20px;
  padding: 10px 15px;


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

        if(!($stmt = $conn->prepare("SELECT COURSE_CODE FROM COURSE_TAB WHERE ALLOTTED_TO = ?"))){
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
         echo '<li><a href="dashboard.php?course='.$row["COURSE_CODE"].'">'.$row["COURSE_CODE"].'</a></li>';
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
          <div>
          
          <button id ="myBtn1" class="myButton" >Add Course
          </button>
          <button id ="myBtn2" class="myButton" onclick="display()" type="button" >Delete Course
          </button>
          
          </div>
        </div>
        <form style="display:none" id="formtodelete" action="deletecourse.php" method="POST">
            <input type="text" id="coursetodelete" name="course" >
            <input type ="submit" id="submitdelete" class="myButton">
        </form>
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
          <input align="center" type = "text" name="coursecode" required>
          <br>
          <br>
          Branch Name :
          <br>
          <input align="center" type = "text" id='bname1' name="bname" required>
          <br>
          <br>
          Subject Name :
          <br>
          <input align="center" type = "text" name="sbjname" required>
          <br>
          <br>
          Semester :
          <br>
          <input align="center" type = "text" name="sem" required>
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


    <script>
    var modal = document.getElementById("myModal"),
    body = document.getElementsByTagName("body"),
    container = document.getElementById("myContainer"),
    btnOpen = document.getElementById("myBtn1"),
    btnClose = document.getElementById("closeModal");
btnOpen.onclick = function() {
    modal.className = "Modal is-visuallyHidden", setTimeout(function() {
        container.className = "MainContainer is-blurred", modal.className = "Modal"
    }, 100), container.parentElement.className = "ModalOpen"
}, btnClose.onclick = function() {
    modal.className = "Modal is-hidden is-visuallyHidden", body.className = "", container.className = "MainContainer", container.parentElement.className = ""
}, window.onclick = function(e) {
    e.target == modal && (modal.className = "Modal is-hidden", body.className = "", container.className = "MainContainer", container.parentElement.className = "")
};
    </script>
    <script>
    
    function display() {
              
                document.getElementById("formtodelete").style.display = 'block';
        }


    </script>
  </body>
</html>

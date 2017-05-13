<?php
  session_start();
  if(!isset($_SESSION['user']))
  {
      header("Location: login.php");
  }
  if(isset($_GET['course']))
    $_SESSION["course"]=$_GET["course"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>

    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 1000px}

    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }

    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;}
    }

    .myButton1 {
   cursor: pointer;
  background: #e9e9e9;
  max-width: 48%;
  min-width: 48%;
  border: 0;
  padding: 10px 0px;
  color: black;
  -webkit-transition: 0.3s ease;
  transition: 0.3s ease;
  border: solid 1px #337ab7;
  border-top: solid 0.5px #337ab7;
}

 .myButton1:hover {
  background: #337ab7;
}



.myButton2 {
   cursor: pointer;
  background: #e9e9e9;
  width: 97%;
  min-width: 97%;
  border: 0;
  padding: 10px 15px;
  color: black;
  -webkit-transition: 0.3s ease;
  transition: 0.3s ease;
  border: solid 1px #337ab7;
}

 .myButton2:hover {
  background: #337ab7;
}

#leftCol {
    position: fixed;
    overflow-y: scroll;
    top: 0;
    bottom: 0;
}
#myDiv{

 position:absolute;
 margin-left: 420px;
 width:98%;

}

  </style>

</head>
<body>


<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3 sidenav hidden-xs" id="leftCol">
      <h1 class="head1"><img src="upes.jpg" height=70% width=70%></h1>
      <ul id = "a" class="nav nav-pills nav-stacked"  >
       <li class="active"><a href="#" id="load_home">Home</a></li>
         <li><a href="#" id="load_courseprogress">Course Progress</a></li>
         <li><a href="#" id="load_coursediary">Course Diary</a></li>
       <li><a href="#" id="jj">
         <form action="file_upload.php" method="POST" enctype="multipart/form-data">
              <input type="file" name="file" id="file" class="myButton2" name="syllabus"  />
         <div>
              <input value="Syllabus" class="myButton1" type="submit" id="syllabus" name="submit"  />
              <!--a href="file_upload.php?syllabus=syllabus" class="myButton2" >Upload</a-->
         </form>
              <button class="myButton1" id="Syllabus" onClick="showPDF(this)" type="button" >View </button>
         </div>
       </a></li>
       <li><a href="#" id="jj">
         <form action="file_upload.php" method="POST" enctype="multipart/form-data">
              <input type="file" name="file" id="file" class="myButton2"   />
         <div >
              <input value="Course Plan" class="myButton1" type="submit" id="cplan" name="submit" />
         </form>
              <button class="myButton1" id="Course Plan" onClick="showPDF(this)"  type="button" >View</button>
         </div>
       </a></li>
         <li><a href="#" id="jj">
           <form action="file_upload.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="file" id="file" class="myButton2"   />
           <div >
                <input value="Lab Manual" class="myButton1" type="submit" id="labman" name="submit" />
           </form>
                <button class="myButton1" id="Lab Manual" onClick="showPDF(this)"  type="button" >View Lab Manual</button>
           </div>
         </a></li>
         <li><a href="#" id="jj">
           <form action="file_upload.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="file" id="file" class="myButton2"   />
           <div >
                <input value="Upload Time Table" class="myButton1" type="submit" id="timtab" name="submit" />
           </form>
                <button class="myButton1" id="Time Table" onClick="showPDF(this)"  type="button" >View</button>
           </div>
         </a></li>
         </ul>
         <ul class ="nav nav-pills nav-stacked" >
         <li><a href="#" id="aa">
           <form action="file_upload.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="file" id="file" class="myButton2"   />
           <div >
                <input value="Assignment 1" class="myButton1" type="submit" id="assign1" name="submit" />
           </form>
                <button class="myButton1" id="Assignment 1" onClick="showPDF(this)"  type="button" >View</button>
           </div>
         </a></li>

         <li><a href="#" id="bb">

           <form action="file_upload.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="file" id="file" class="myButton2"   />
           <div >
                <input value="Assignment 2" class="myButton1" type="submit" id="assign2" name="submit" />
           </form>
                <button class="myButton1" id="Assignment 2" onClick="showPDF(this)"  type="button" >View</button>
           </div>
         </a></li>

         <li><a href="#" id="cc">
         	<form action="file_upload.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="file" id="file" class="myButton2"   />
           <div >
                <input value="Quiz 1" class="myButton1" type="submit" id="quiz1" name="submit" />
           </form>
                <button class="myButton1" id="Quiz 1" onClick="showPDF(this)"  type="button" >View</button>
           </div>

         </a></li>

         <li><a href="#" id="dd">
         <form action="file_upload.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="file" id="file" class="myButton2"   />
           <div >
                <input value="Quiz 2" class="myButton1" type="submit" id="quiz2" name="submit" />
           </form>
                <button class="myButton1" id="Quiz 2" onClick="showPDF(this)"  type="button" >View</button>
           </div>
         </a></li>
         <li><a href="#" id="ee">
         	<form action="file_upload.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="file" id="file" class="myButton2"   />
           <div >
                <input value="Mid Sem Q-Paper" class="myButton1" type="submit" id="qpms" name="submit" />
           </form>
                <button class="myButton1" id="Mid Sem Q-Paper" onClick="showPDF(this)"  type="button" >View</button>
           </div>

         </a></li>
         <li><a href="#" id="ff">
         	<form action="file_upload.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="file" id="file" class="myButton2"   />
           <div >
                <input value="End Sem Q-Paper" class="myButton1" type="submit" id="qpes" name="submit" />
           </form>
                <button class="myButton1" id="End Sem Q-Paper" onClick="showPDF(this)"  type="button" >View</button>
           </div>

         </a></li>
         <li><a href="#" id="gg">
         	<form action="file_upload.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="file" id="file" class="myButton2"   />
           <div >
                <input value="Class Test 1" class="myButton1" type="submit" id="ct1" name="submit" />
           </form>
                <button class="myButton1" id="Class Test 1" onClick="showPDF(this)"  type="button" >View</button>
           </div>

         </a></li>
         <li><a href="#" id="hh">
         	<form action="file_upload.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="file" id="file" class="myButton2" />
           <div >
                <input value="Class Test 2" class="myButton1" type="submit" id="ct2" name="submit" />
           </form>
                <button class="myButton1" id="Class Test 2" onClick="showPDF(this)"  type="button" >View</button>
           </div>

         </a></li>
         <li><a href="#" id="ii">
         	<form action="file_upload.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="file" id="file" class="myButton2"   />
           <div >
                <input value="Quiz 1 Solution" class="myButton1" type="submit" id="q1sol" name="submit" />
           </form>
                <button class="myButton1" id="Quiz 1 Solution" onClick="showPDF(this)"  type="button" >View</button>
           </div>
         </a></li>
         <li><a href="#" id="jj">
           <form action="file_upload.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="file" id="file" class="myButton2"   />
           <div >
                <input value="Quiz 2 Solution" class="myButton1" type="submit" id="q2sol" name="submit" />
           </form>
                <button class="myButton1" id="Quiz 2 Solution" onClick="showPDF(this)"  type="button" >View</button>
           </div>
         </a></li>
         <li><a href="#" id="kk">
           <form action="file_upload.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="file" id="file" class="myButton2"   />
           <div >
                <input value="Test 1 Solution" class="myButton1" type="submit" id="t1sol" name="submit" />
           </form>
                <button class="myButton1" id="Test 1 Solution" onClick="showPDF(this)"  type="button" >View</button>
           </div>
         </a></li>
         <li><a href="#" id="ll">
           <form action="file_upload.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="file" id="file" class="myButton2"   />
           <div >
                <input value="Test 2 Solution" class="myButton1" type="submit" id="t2sol" name="submit" />
           </form>
                <button class="myButton1" id="Test 2 Solution" onClick="showPDF(this)"  type="button" >View</button>
           </div>
         </a></li>
         <li><a href="#" id="mm">
           <form action="file_upload.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="file" id="file" class="myButton2"   />
           <div >
                <input value="Cont Assessment(Theory)" class="myButton1" type="submit" id="cassth" name="submit" />
           </form>
                <button class="myButton1" id="Cont Assessment(Theory)" onClick="showPDF(this)"  type="button" >View</button>
           </div>
         </a></li>
         <li><a href="#" id="nn">
           <form action="file_upload.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="file" id="file" class="myButton2"   />
           <div>
                <input value="Cont Assessment(Lab)" class="myButton1" type="submit" id="casslab" name="submit" />
           </form>
                <button class="myButton1" id="Cont Assessment(Lab)" onClick="showPDF(this)"  type="button" >View</button>
           </div>
         </a></li>
         </ul>
         <ul class="nav nav-sidebar">
           <li><a href="#" id="jj">
             <form action="file_upload.php" method="POST" enctype="multipart/form-data">
                  <input type="file" name="file" id="file" class="myButton2"   />
             <div >
                  <input value="Final Assessment" class="myButton1" type="submit" id="fass" name="submit" />
             </form>
                  <button class="myButton1" id="Final Assessment" onClick="showPDF(this)"  type="button" >View</button>
             </div>
           </a></li>
           <li>
              <form action="logout.php" method="POST">
              &nbsp  <input type="submit" value="Logout" class="myButton2" />
              </form>
              <br>
           </li>
        </ul>
    </div>
    <br>

    <div class="col-sm-9" >
      <div id="myDiv" >


      </div>
    </div>
 </div>
</div>

</body>

<script>
 $(document).ready( function() {
    $("#load_coursediary").on("click", function() {
        $("#myDiv").load("course_diary(div).php");

    });
});

$(document).ready( function() {
    $("#load_courseprogress").on("click", function() {
        $("#myDiv").load("course_progress(div).php");
    });
});

$(".nav a").on("click", function(){
  $(".nav").find(".active").removeClass("active");
  $(this).parent().addClass("active");
});

$(document).ready( function() {
    $("#load_home").on("click", function() {
        $("#myDiv").load("home.php");
    });
});

$(document).ready( function() {
        $("#myDiv").load("home.php");
});


</script>

<script type="text/javascript">
  // If absolute URL from the remote server is provided, configure the CORS
// header on that server.
var url = "<?php echo $_SESSION['user']; ?>";
var course = "<?php echo $_SESSION['course']; ?>"; 

function showPDF(ele){
// The workerSrc property shall be specified.
var id=ele.id;
var localurl=url+'/';
localurl+=course;
localurl+='/'
localurl+=id;
localurl+='.pdf'
var status = UrlExists(localurl);

if (status == 1){
//console.log(localurl);
document.getElementById('myDiv').innerHTML = '<div class="PDF"><object data="'+localurl+'" type="application/pdf" width="100%" height="900"></object></div>';
  }
else
  alert("No File Uploaded!");


}


function UrlExists(url) {
    var http = new XMLHttpRequest();
    http.open('HEAD', url, false);
    http.send();
    if (http.status != 404)
        return 1;
        //  do something
    else
        return 0;
        
}
</script>
</html>

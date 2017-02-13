<html>
<head>
<title>Course Select</title>
<!--script src="https://ajax.googleapis.com/ajlax/libs/jquery/3.1.1/jquery.min.js"></script-->
<!--script src="course_select_script.js"></script-->
</head>
<style>

.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 80%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 2px 16px;
    background-color: lightblue;
    color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
    padding: 2px 16px;
    background-color: lightblue;
    color: white;
}

body {
    background-color: lightblue;
    color: black;
    font-family: trebuchet ms;
    font-size: 20px;
}

.head1 {
    font-family: trebuchet ms;
    font-size: 70px;
    color: black;
    text-align: center;
    background-color: white ;
    border-style: solid;
    border-width: 2px;
    border-color: black;
    width: 100%;
    border-left: 2px solid;
    border-left-color: white;
    border-right: 2px solid;
    border-right-color: white;

}
.myButton {
	-moz-box-shadow:inset 0px 1px 0px 0px #2e333d;
	-webkit-box-shadow:inset 0px 1px 0px 0px #2e333d;
	box-shadow:inset 0px 1px 0px 0px #2e333d;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ffffff), color-stop(1, #ffffff));
	background:-moz-linear-gradient(top, #ffffff 5%, #ffffff 100%);
	background:-webkit-linear-gradient(top, #ffffff 5%, #ffffff 100%);
	background:-o-linear-gradient(top, #ffffff 5%, #ffffff 100%);
	background:-ms-linear-gradient(top, #ffffff 5%, #ffffff 100%);
	background:linear-gradient(to bottom, #ffffff 5%, #ffffff 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#ffffff',GradientType=0);
	background-color:#ffffff;
	border:1px solid #080808;
	display:inline-block;
	cursor:pointer;
	color:#000000;
	font-family:Arial;
	font-size:13px;
	font-weight:bold;
	padding:6px 12px;
	text-decoration:none;
}
.myButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ffffff), color-stop(1, #ffffff));
	background:-moz-linear-gradient(top, #ffffff 5%, #ffffff 100%);
	background:-webkit-linear-gradient(top, #ffffff 5%, #ffffff 100%);
	background:-o-linear-gradient(top, #ffffff 5%, #ffffff 100%);
	background:-ms-linear-gradient(top, #ffffff 5%, #ffffff 100%);
	background:linear-gradient(to bottom, #ffffff 5%, #ffffff 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#ffffff',GradientType=0);
	background-color:#ffffff;
}
.myButton:active {
	position:relative;
	top:1px;
}




</style>


<body>
<p class='head1'> Select Courses</p>

Hi there!
<br><br>Already existing courses :
   <ul id ="courselist">
   <li>
   <a href="Dashboard.html">Some Course</a>
   </li>
     
   </ul>

ADD New Course! --:>    


<button id ="myButton1" class="myButton" >Add Course!</button>

<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Add New</h2>
    </div>
    
    <div class="modal-body">
      <p>
      Hi!<br><br>
      Branch Name : <br><input type = "text" id='bname1' name="bname"><br><br>
      Subject Name :<br> <input type = "text" name="sbjname"><br><br>
      Semester : <br><input type = "integer" name="sem"><br><br>
      </p>
    
      <button class="myButton" onclick="submitFunction()" >Submit! </button><br><br>
      <script> 
       function submitFunction() {
        var ul = document.getElementById("courselist");
        var li = document.createElement("li");
        var addnewname = document.getElementById('bname1').value;
        li.appendChild(document.createTextNode(addnewname));
        ul.appendChild(li);
       alert("Submitted :)");
      }

    </script>
    </div>

    <div class="modal-footer">
      <h3> <br> </h3>
    </div>
   </div>
  </div>

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

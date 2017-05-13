<html>
<head>
<link rel="stylesheet" href="style.css">
<style>
	
#container{
	height:800px;
    position: relative;
    padding:50px 50px;
    background: #ffffff;
   
    width:90%;
    border-top: 5px solid #33b5e5;
    box-shadow: 3px 3px 3px #b7b7b7;
    margin: 0 auto;


}

.myButton{

  width:250px;


}

</style>
</head>

<body>
<div id="container"> 
 <h2>Welcome to Course File Builder</h2>
 <br>
 <button class='myButton' id="returnToDash"> Return To Courses </button>

</body>

<script type="text/javascript">
  
 $(document).ready( function(){
         $("#myDiv").on('click', '#returnToDash',function(){
              window.location="course_select.php";
           });
        });</script>
</script>
</html>

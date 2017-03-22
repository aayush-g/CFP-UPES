<html>

<head>
<title> Sign up Form</title>
<link rel="stylesheet" type="text/css" href="style.css">
<style>

 form{

  display: inline-block;
 }

 .form1{
    border:2px solid #ccc;
  border-color: white;
  padding: 50px 30px;
  max-width: 400px;
  width:80%;
  background: white;
  margin:auto;
}
</style>

</head>

<body>

 <h1 align="center" class="head1">
 <img src= "upes.jpg" align="left" style="width:100px;height:80px"">Course File Builder </h1><br>

  <div class="boxed">
   
   <form action="sign_up_process.php" method="POST" class="form1">
    <p><input align = "left" type="text" name="name" placeholder="Name" required></p>
    <p><input align = "left" type="text" name="userid" placeholder="College ID" required></p>
    <p><input align = "left" type="password" name="password" placeholder="Password" required></p>
    <p><input align = "left" type="text" name="contact_no" placeholder="Contact No." required></p>
    <p><input align = "left" type="Email" name="email" placeholder="Email Address" required></p>
    <p>
    <input class="myButton" type="submit" name="commit"></p>
  </form>
  
  </div>
</body>

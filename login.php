<html>
<head>
<title> Login Form</title>
<link rel="stylesheet" type="text/css" href="style.css">
<style>

 form{

  display: inline-block;
 }

 h2 {
  margin: 0 0 20px;
  color: #33b5e5;
  font-size: 18px;
  font-weight: 400;
  line-height: 1;
  
}

.form1 {
  border:2px solid #ccc;
  border-color: white;
  padding: 50px 30px;
  max-width:400px;
  width:80%;
  background: white;
  margin:auto;
 }

 .form2 { 
  padding:20px 20px;
}

</style>
</head>
<body>

  <h1 align="center" class="head1"> Course File Builder </h1><br>
  
   <div class="boxed" align="center">




     <form action="login_check.php" method="POST" class="form1">
     <h2>Login to your account</h2>
     <input type="text" name="userid" placeholder="Username or Email" required>
     <input align = "center" type="password" name=password placeholder="Password" required><br>
     <button align = "center" class ="myButton" type="submit">Login</button>
     <?php $reasons = array("password" => "Wrong Username or Password");
      if (isset($_GET["loginFailed"])) echo $reasons[$_GET["reason"]];?>

     </form>

     <br>
     
     <form action="sign_up.php" class="form2">
      <button align = "center" class="myButton" type="submit">Sign Up</button>
     </form>
     <form action="admin.html" class="form2">
      <button align = "center" class="myButton" type="submit">Admin</button><br>
     </form>

    </div>
    
</body>

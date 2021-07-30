<?php
$type="";
$address="";
$email="";
$phone="";
$name="";
$dateofbirth="";
$gender="";

include('../control/loginchk.php');

if(isset($_SESSION['username'])){
    if($type=="seller" ){
header("location: SellerHome.php");
$cookie_name = "user";
$cookie_value = $_SESSION['username'];
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");}
else if($type=="admin"){
  header("location: adminhome.php");
  $cookie_name = "user";
  $cookie_value = $_SESSION['username'];
  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");}
else if($type=="buyer"){
  header("location: buyerindex.php");
  $cookie_name = "user";
  $cookie_value = $_SESSION['username'];
  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");}
else if($type=="deliveryMan"){
  header("location: deliveryHome.php");
  $cookie_name = "user";
  $cookie_value = $_SESSION['username'];
  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");}
else{
   // echo "error";
}
}



?>
<!DOCTYPE html>

<html lang="en">
    <head>
    <link rel="stylesheet"  href="../CSS/body.css">
    <link rel="stylesheet"  href="../CSS/header.css">
    <link rel="stylesheet"  href="../CSS/mycss.css">

<script>
function validateForm() {
var username = document.getElementById("username").value;
var password = document.getElementById("password").value;
if (username == "" && password== "") {
alert("All fields must be filled out");
return false;
}
else if (username == "" || password== "") {
alert("User name and Password must be filled out");
return false;
}
}
window.onload = function() {
          document.getElementById("input1").onmouseover = function()
          {
              this.style.backgroundColor = "orange";
          }

          document.getElementById("input1").onmouseout = function()
          {
              this.style.backgroundColor = "white";
          }

}
</script>
</head>

<body>
  <div class="sticky">
<div class="header">
<h1 id="SHh1"><mark>Welcome To Our Shop</mark></h1>
</div>


<div class="topnav">
  <a href="loginhome.php">HOME</a>
  <a href="AboutUs.php">ABOUT US</a>
  <a href="Regform.php">REGISTER</a>
  
       <!-- <form action="Regform.php"> 
        <input type="submit" type="submit1" value="Register">
        </form>-->
</div>
</div>

<div class="column">
<form action="" method= "post" onsubmit="return validateForm()">  

    <label for="id" id="label1">User Name</label><br>
    <input type="text" name="username" id="username">
    <br>
    <br>
    <label for="password" id="label1" >Password</label><br>
    <input type="password" name="password" id="password">
  
    
    <br>
    <br>
    <?php echo $error; ?>
  <input type="submit" id="input1" name="submit" value="Log in" > 
  </form>
  <br>
</div>
<br>
    <br>
    <br>
    <br>
    <br>
    <br>


  <div class="footer">
        <?php include('../footer/footer.php');?>
</div>
  
    
</body>
</html>

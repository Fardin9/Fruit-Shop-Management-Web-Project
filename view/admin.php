<?php
session_start(); 
if(empty($_SESSION["username"])) 
{
header("Location: SellerHome.php"); // Redirecting To Home Page
header("Location: CustomerHome.php"); // Redirecting To Home Page
header("Location: DeliveryHome.php"); // Redirecting To Home Page
header("Location: adminhome.php"); // Redirecting To Home Page
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet"  href="../CSS/body.css">
    <link rel="stylesheet"  href="../CSS/header.css">
    <link rel="stylesheet"  href="../CSS/mycss.css">

</head>

<body>
<div class="sticky">
<div class="header">
<h1 id="SHh1"><mark>ADMIN PANEL</mark></h1>
<h3 id="SHh3">Welcome,</h3>
<h3 id="SHh3"><?php echo $_SESSION["username"];?></h3>
<h3 id="SHh3"><a href="../control/Logout.php">Logout</a></h3>   
</div>  
    
<div class="topnav">

  <a href="adminhome.php">HOME</a>

  <a href="sellerpanel.php">SELLER PANEL</a>

  <a href="">CUSTOMER PANEL</a>
  
  <a href="">DELIVERY PANEL</a>

</div>
</div>

<table>
<tr>

<th>Username</th>
<th>Gender</th>
<th>Email</th>
<th>Birthday</th>
<th>User Type</th>


</tr>

<br>
<br>
<br>
<br>
<br>


<input type="button" name="See Owner Profile" value="See Owner Profile">  

<input type="button" name="Delete " value="Delete ">  

<input type="button" name="Create" value="Create">

<input type="button" name="Update" value="Update">

<input type="button" name="Transactions" value="Transactions">




</table>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
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

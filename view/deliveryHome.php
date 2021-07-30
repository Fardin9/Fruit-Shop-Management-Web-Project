<?php
session_start(); 
if(empty($_SESSION["username"])) 
{
header("Location: loginhome.php"); // Redirecting To Home Page
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
<div class="header">
<h1 id="SHh1"><mark>DELIVERY MAN</mark></h1>
<h3 id="SHh3">Welcome,</h3>
<h3 id="SHh3"><?php echo $_SESSION["username"];?></h3>
<h3 id="SHh3"><a href="../control/Logout.php">Logout</a></h3>   
</div>

<div class="topnav">
<a href="deliveryHome.php">HOME</a>


<a href="viewprofileDeliveryman.php">VIEW PROFILE</a>
   
<a href="updatedeliveryprofile.php">UPDATE PROFILE</a>

<a href="ContactWithUsersForDman.php">MESSAGES</a>

</div>
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

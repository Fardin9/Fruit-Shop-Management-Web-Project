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


<div class="sticky">
<div class="header">
<h2 id="AIh2"><mark>CONTACT</mark></h2><br>
<h3 id="SHh3">Welcome,</h3>
<h3 id="SHh3"><?php echo $_SESSION["username"];?></h3>

<h3 id="SHh3"><a href="../control/Logout.php">Logout</a></h3>  
</div>
<div class="topnav">
  <a href="DmanReceiveMsg.php">INBOX</a>
  <a href="DmanSendMsg.php">SEND MESSAGE</a>
 
</div>
    </div>
    <br>

<body id="AIbody">


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

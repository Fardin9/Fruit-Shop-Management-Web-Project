<?php
include('../control/db.php');
session_start(); 
if(empty($_SESSION["username"]))// Destroying All Sessions
{
header("Location: ../control/loginhome.php"); // Redirecting To Home Page
}

?>

<?php

echo"<h3 id='SHh3'>User Name:</h3>";
$username=$_SESSION["username"];
echo "<h3 id='SHh3'>$username";

echo "<h3 id='SHh3'><a href=../control/Logout.php>Logout</a></h3>";

?>
<html>
<head>
  <link rel="stylesheet"  href="../CSS/body.css">
    <link rel="stylesheet"  href="../CSS/header.css">
    <link rel="stylesheet"  href="../CSS/mycss.css">
</head>
<body id="AIbody">
<h2 id="AIh2">Inbox</h2><br>
<form action="" method= "post">

</form>

</br>
</br>
<?php

//$sql="SELECT * from items";
$connection = new db();
$conn=$connection->OpenCon();
$userQuery=$connection->ViewMsg($conn,"messageout",$username);     

//$conn->query($sql);
echo "<table border='1'>
<tr>
<th>Sender</th>
<th>Receiver</th>
<th>Message</th>
<th>Time</th>
</tr>";



if($userQuery->num_rows > 0){
while($row=$userQuery->fetch_assoc())
{

echo "<tr>";
echo "<td>" . $row['sender'] . "</td>";
echo "<td>" . $row['receiver'] . "</td>";
echo "<td>" . $row['msg'] . "</td>";
echo "<td>" . $row['time'] . "</td>";
echo "</tr>";
}
echo "</table>";
//$conn->close();
//mysqli_close($conn);
}


?>
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

<?php
include('db.php');
session_start(); 

 $error="";
// store session data
if (isset($_POST['submit'])) {
  if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
  else
{
$username=$_POST['username'];
$password=$_POST['password'];

$connection = new db();
$conobj=$connection->OpenCon();

$userQuery=$connection->CheckUser($conobj,"userinfo",$username,$password);
$row=mysqli_fetch_array($userQuery);
$type=$row['type'];
$address=$row['address'];
$email=$row['email'];
$phone=$row['phone'];
$name=$row['name'];
$dateofbirth=$row['dateofbirth'];
$gender=$row['gender'];

if ($userQuery->num_rows > 0) {
$_SESSION["username"] = $username;
$_SESSION["password"] = $password;
$_SESSION["type"]=$type;
$_SESSION["address"]=$address;
$_SESSION["email"]=$email;
$_SESSION["phone"]=$phone;
$_SESSION["name"]=$name;
$_SESSION["dateofbirth"]=$dateofbirth;
$_SESSION["gender"]=$gender;

   }
 else {
$error = "Username or Password is invalid";
}
$connection->CloseCon($conobj);

}
}



?>

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

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet"  href="../CSS/body.css">
    <link rel="stylesheet"  href="../CSS/header.css">
    <link rel="stylesheet"  href="../CSS/mycss.css">

</head>
<body>
<?php

$Recipient = $messagebox =$email=" ";
 $recipienterror="";
 $messageboxerror="";
 $emailerror="";

 if(isset($_REQUEST['submit'])){

  if (empty($_POST['Recipient'])){
    $recipienterror = "please insert recipient name";
    }
    else{
       
       
       $Recipient=$_POST['Recipient'];
      
    }
    if (empty($_POST['messagebox'])){
        $messageboxerror = "please write a message here";
        }
        else{
            $messagebox=$_POST['messagebox'];
        }

                                  }
                                
                                      
 if ((!empty($_POST['Recipient'])) && (!empty($_POST['messagebox']))){
           // $sql = "INSERT INTO sellerinfo (username, name, email, password, address, phone, type, gender, dateofbirth) VALUES ('$username', ' $name ', '$email', '$password','$address','$phone','$type','$gender','$dateofbirth')";
           // $sql = "INSERT INTO usertable (username, pass) VALUES('$username','$password')";
           $connection = new db();
           $conn=$connection->OpenCon();    
           $userQuery=$connection->messageout($conn,"messageout",$Recipient,$messagebox,$username);  
          // $res = $conn->query($sql);//execute query
        $flag=1;
          if($flag==1){
             echo "sent successfully"; }
        else
        { 
            echo "error occurred"; }
            $conn->close();
        }




?>
    



<h2 id="AIh2">Compose Message</h2><br>
<body id="AIbody">

<form action="" method= "post">  
    <label for="Recipient">Recipient</label><br>
    <input type="text" name="Recipient" id="Recipient"><?php echo $recipienterror ?>
    <br>
    <br>
    <label for="name">Message</label><br>
    <input type="text" name="messagebox" id="inputbox"><?php echo $messageboxerror ?>
    <br>
    <br>
    
    
    <input type="submit" name="submit" value="Send" id="AIinput"> 
    </form>
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

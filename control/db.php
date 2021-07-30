<?php
class db{

function OpenCon(){
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db="fardin";
// Create connection
$conn=new mysqli($dbhost, $dbuser, $dbpass,$db); //MySQLi connection object
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);

}
return $conn;
}
function CheckUser($conn,$table,$username,$password)
 {
$result = $conn->query("SELECT username,password,type, address, email, phone,name,dateofbirth,gender FROM ". $table." WHERE username='". $username."' AND password='". $password."'");
 return $result;
 }
 function InsertItem($conn,$table,$itemname, $category,$itemno,$price,$description,$fileToUpload)
 {
$stmt = $conn->prepare("INSERT INTO $table (itemname, category, itemno, price, description,imgname) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss",$itemname, $category,$itemno,$price,$description,$fileToUpload);
$stmt->execute();  
$stmt->close();
return $stmt; 
 }
 function ShowItem($conn,$table)
 {
$result = $conn->query("SELECT * FROM  $table");
 return $result;
 }
 function SearchItem($conn,$table,$itemname)
 {
$result = $conn->query("SELECT itemname,category,itemno,price,description FROM  $table where itemname='$itemname'");
 return $result;
 }
 
 function UpdateItems($conn,$table,$itemname, $category,$price,$description,$itemno){
$result=$conn->query("UPDATE $table SET itemname='$itemname', category='$category', price='$price', description='$description' where itemno='$itemno'");
return $result; 
}
 function ViewSellerProfile($conn,$table,$username){
$result=$conn->query("SELECT name,email,password,address,phone,type,gender,dateofbirth FROM ". $table." WHERE username='". $username."'");
return $result;
}
function UpdateProfile($conn,$table,$name,$email, $password, $address, $phone, $dateofbirth,$username,$gender){
$result=$conn->query("UPDATE $table SET name='$name', email='$email', password='$password', address='$address', phone='$phone', dateofbirth='$dateofbirth', gender='$gender' where username='$username'");
return $result;
}
function Register($conn,$table,$username, $name,$email,$password,$address,$phone,$type,$gender,$dateofbirth){
    $stmt=$conn->prepare("INSERT INTO $table (username, name, email, password, address, phone, type, gender, dateofbirth) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss",$username, $name,$email,$password,$address,$phone,$type,$gender,$dateofbirth);
    $stmt->execute();  
    $stmt->close();
    return $stmt; 
  
    }
        function DeleteItems($conn,$table,$ditem){
            $result=$conn->query("Delete from $table where itemno='$ditem'");
            return $result;

        }

        function messageout($conn,$table,$Recipient,$messagebox,$username)
 {
$stmt = $conn->prepare("INSERT INTO $table (sender, receiver, msg) VALUES (?, ?, ?)");
$stmt->bind_param("sss",$username, $Recipient,$messagebox);
$stmt->execute();  
$stmt->close();
return $stmt; 
 }

 function Viewmsg($conn,$table,$username){
    $result=$conn->query("SELECT sender,receiver,msg,time FROM ". $table." WHERE receiver='". $username."'");
    return $result;
    }

    

    
    function ShowAllUsers($conn,$table)
		{
			$result = $conn->query("SELECT * FROM  $table");
			return $result;
		}
		
		function ShowAllUsersByType($conn,$table,$user_type)
		{
			$result = $conn->query("SELECT * FROM  $table  WHERE `type`='$user_type'");
			return $result;
        }
        
        
        function BuyerItems($conn,$table){
            $result=$conn->query("SELECT itemname,itemno,price FROM ". $table."");
            return $result;
            }
            function ViewBuyerProfile($conn,$table,$username){
                $result=$conn->query("SELECT name,email,password,address,phone,type,gender,dateofbirth FROM ". $table." WHERE username='". $username."'");
                return $result;
                }

                
                function ViewDeliveryProfile($conn,$table,$username){
                    $result=$conn->query("SELECT name,email,password,address,phone,type,gender,dateofbirth FROM ". $table." WHERE username='". $username."'");
                    return $result;
                    }

                    function OrderItems($conn,$table,$username, $address ){
                    $stmt = $conn->prepare("INSERT INTO $table (username,address) VALUES (?, ?)");
                    $stmt->bind_param("ss",$username, $address);
                    $stmt->execute();  
                    $stmt->close();
                    return $stmt; 
                    }



function CloseCon($conn)
 {
 $conn -> close();
 }
}

?>
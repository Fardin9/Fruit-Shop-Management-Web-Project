<?php
include('../control/db.php');
session_start(); 
if(empty($_SESSION["username"]))// Destroying All Sessions
{
header("Location: ../control/loginhome.php"); // Redirecting To Home Page
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
var itemname = document.getElementById("itemname").value;
var category = document.getElementById("category").value;
var itemno = document.getElementById("itemno").value;
var price = document.getElementById("price").value;
var description = document.getElementById("inputbox").value;

if (itemname == "" || category== "" || price == "" || itemno== "" || description== "" ) {
alert("Please fill all the fileds for Add items");
return false;
}
}
</script>
</head>
<body>
<?php

$itemname = $category =$itemno=$price=$description=$fileToUpload=" ";
 $itemnameerror="";
 $categoryerror="";
 $itemnoerror="";
 $priceerror="";
 $descriptionerror="";
 $target_dir = "images/";
 if(isset($_REQUEST['submit'])){

  if (empty($_POST['itemname'])){
    $itemnameerror = "please insert item name";
    }
    else{
       
       
       $itemname=$_POST['itemname'];
      
    }
    if (empty($_POST['category'])){
        $categoryerror = "please insert correct category";
        }
        else{
            $category=$_POST['category'];
        }
        if (empty($_POST['itemno'])){
            $itemnoerror = "please insert item no";
            }
            else{
                $itemno=$_POST['itemno'];
            }
            if (empty($_POST['price'])){
                $priceerror = "please insert price";
                }
                else{
                    $price=$_POST['price'];
                }
                if (empty($_POST['description'])){
                    $descriptionerror = "please fill up this field";
                    }
                    else{
                        $description=$_POST['description'];
                    }
                    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                   
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                      echo "The file ". htmlspecialchars (basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                      $fileToUpload=$_FILES["fileToUpload"]["name"];
                  } else {
                      echo "Sorry, there was an error uploading your image.";
                  
                }
                    
                }
              
                                      
 if ((!empty($_POST['itemname'])) && (!empty($_POST['category']))&&(!empty($_POST['itemno']))&&(!empty($_POST['price']))&&(!empty($_POST['description']))){

           $connection = new db();
           $conn=$connection->OpenCon();    
           $userQuery=$connection->InsertItem($conn,"items",$itemname, $category,$itemno,$price,$description,$fileToUpload); 
          
          $flag=1;
        if($flag==1){
             echo "new record inserted"; }
        else
        { 
            echo "error occurred"; }
            $conn->close();
        }
?>
<div class="sticky">
<div class="header">
<h1 id="SHh1"><mark>ADD ITEM</mark></h1>
<h3 id="SHh3">Welcome,</h3>
<h3 id="SHh3"><?php echo $_SESSION["username"];?></h3>
<h3 id="SHh3"><a href="../control/Logout.php">Logout</a></h3>   
</div>
<div class="topnav">
  <a href="SellerHome.php">BACK</a>
 
</div>
    </div>
<br>
<br>
<body id="AIbody">


<form action="" method= "post" enctype="multipart/form-data" onsubmit="return validateForm()">  
    <label for="itemname" id="label1">ITEM NAME</label><br>
    <input type="text" name="itemname" id="itemname"><?php echo $itemnameerror ?>
    <br>
    <br>
    <label for="category" id="label1">CATEGORY</label><br>
    <input type="text" name="category" id="category"><?php echo $categoryerror ?>
    <br>
    <br>
    <label for="itemno" id="label1">ITEM NO</label><br>
    <input type="text" name="itemno" id="itemno"><?php echo $itemnoerror ?>
    <br>
    <br>
    <label for="price" id="label1">PRICE</label><br>
    <input type="text" name="price" id="price"><?php echo $priceerror ?>
    <br>
    <br>
    <label for="description" id="label1">DESCRIPTION</label><br>
    <input type="text" name="description" id="inputbox"><?php echo $descriptionerror ?>
    <br>
    <br>
    <input type="file" name="fileToUpload" id="label1">
    <br>
    <br>
    
    <input type="submit" name="submit" value="ADD" id="AIinput"> 
    </form>
    <br>
    <div class="footer">
    <?php include('../footer/footerbyFardin.php');?>
    </div>
    



        
  
  
    
</body>
</html>

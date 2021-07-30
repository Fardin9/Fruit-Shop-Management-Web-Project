<?php
include('../control/db.php');
session_start(); 
if(empty($_SESSION["username"])) 
{
header("Location: loginhome.php"); // Redirecting To Home Page
}

$itemno=$price="";
$itemno=" ";

$username=$_SESSION["username"];
$address=$_SESSION["address"];
$type=$_SESSION["type"];
//echo $username;
//echo $address;
//echo $type;



 

 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["itemno"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["itemno"],  
                     'item_name'               =>     $_POST["itemname"],  
                     'item_price'          =>     $_POST["price"],  
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                  
                echo '<script>window.location="Buyerindex.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["itemno"],  
                'item_name'               =>     $_POST["itemname"],  
                'item_price'          =>     $_POST["price"],  
                'item_quantity'          =>     $_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["itemno"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                       
                     echo '<script>window.location="Buyerindex.php"</script>';  
                }  
           }  
      }  
 }  
 
 ?>  
  <?php 
 
          if(isset($_REQUEST['checkout'])){
               if (!empty($_SESSION["username"])){
                    $username=$_SESSION["username"];
                    echo $username;
                    }
              
                
               $connection = new db();
           $conn=$connection->OpenCon();    
           $userQuery=$connection->OrderItems($conn,"orderitems",$username,$address ); 
          
          $flag=1;
        if($flag==1){
             echo "new record inserted"; }
        else
        { 
            echo "error occurred"; }
            $conn->close();
        }

           ?>
 <!DOCTYPE html>  
 <html>  
      <head>  
      <link rel="stylesheet"  href="../CSS/body.css">
    <link rel="stylesheet"  href="../CSS/header.css">
    <link rel="stylesheet"  href="../CSS/mycss.css">          
      </head>  
      <body id="AIbody">  
      <div class="sticky">
<div class="header">
<h2 id="AIh2"><mark>SHOPPING CART</mark></h2><br>
<h3 id="SHh3">Welcome,</h3>
<h3 id="SHh3"><?php echo $_SESSION["username"];?></h3>
<h3 id="SHh3"><a href="../control/Logout.php">Logout</a></h3>  
</div>
<div class="topnav">
<a href="viewprofileBuyer.php">PROFILE</a>
<a href="viewitemBuyer.php">AVAILABLE ITEMS</a>
<a href="updatebuyerprofile.php">UPDATE YOUR PROFILE</a>
<a href="ContactWithUsersForDman.php">MESSAGES</a>
 
</div>
    </div>
           <br />  
           <div>  

             
                <?php  
                
                $connection = new db();
                $conn=$connection->OpenCon();
                $userQuery=$connection->BuyerItems($conn,"items");   
                
                     if($userQuery->num_rows > 0){
                       
                         while($row=$userQuery->fetch_assoc())
                         {
                              ?>
                              <div>  
                               <form method="post" action="Buyerindex.php?action=add&itemno=<?php echo $row["itemno"]; ?>">  
                               <div>  
                           <h4><?php echo $row["itemname"]; ?></h4>  
                               <h4>$ <?php echo $row["price"]; ?></h4>  
                              
                               <input type="text" name="quantity" class="form-control" value="0" />  
                               <input type="hidden" name="itemname" value="<?php echo $row["itemname"]; ?>" />  
                               <input type="hidden" name="price" value="<?php echo $row["price"]; ?>" />  
                               <input type="submit" name="add_to_cart" value="Add to Cart" /> 
                               
                               </div>
                               </form>
                               </div>    
                      <?php  
                         }
                      
                          
                    }
                    ?>
                   
                
                  
                <div></div>  
                <br />  
                <h3>Order Details</h3>  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th>Item Name</th>  
                               <th>Quantity</th>  
                               <th>Price</th>  
                               <th>Total</th>  
                               <th>Action</th>  
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td><?php echo '$'.$values["item_price"]; ?></td>  
                               <td><?php echo '$'. number_format ($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td><a href="Buyerindex.php?action=delete&itemno=<?php echo $values["item_id"]; ?>"><button >Cancel</button></a></td>  
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right"><br> Total </td> 

                               <td align="right"><br> <?php echo '$'. number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  
                          <?php  
                          }  
                         
                          ?>  
                     </table>
                     
                </div>  
           </div>  
           <br />  
           <input type="submit" id="input1" name="submit" value="Order" > 
           <br>
          
           <div class="footer">
<?php 
include('../footer/footer.php');?>
</div>
      </body> 
      <div>
 
</div> 
 </html>
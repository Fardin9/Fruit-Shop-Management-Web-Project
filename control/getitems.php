<?php
include('db.php');

$itemname = $_POST['itemname'];

if($itemname=="")
{
    echo "0 results";
}



$connection = new db();
$conn=$connection->OpenCon();
$userQuery=$connection->SearchItem($conn,"items",$itemname);  



if ($userQuery->num_rows > 0) {
    echo "<table><tr><th>ItemName</th><th>Category</th><th>Itemno</th><th>Price</th><th>Description</th><th>Product</th></tr>";
    // output data of each row
    while($row = $userQuery->fetch_assoc()) {
      $i=$row['itemno'];
      echo "<tr><td>".$row["itemname"]."</td><td>".$row["category"]."</td><td>".$row["itemno"]."</td><td>".$row["price"]."</td><td>".$row["description"]."</td><td><img src='images/$i.jpg' height='200' width='200'></td></tr>";
    }
    echo "</table>";
  } else {
    echo "0 results";
  }
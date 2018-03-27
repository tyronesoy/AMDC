<?php
$connect =mysqli_connect("localhost","root","");
   mysqli_select_db($connection, "itproject");

if(isset($_POST["addOrder"]))
{
 for($count = 0; $count < count($_POST["QTY"]); $count++)
 {  
  $query = $connect->prepare("INSERT INTO inventory_order_supplies 
  (supply_name, quantity, inventory_unit) 
  VALUES (?, ?, ?)");
  $quantity = $_POST["QTY"];
  $item		= $_POST["item"];
  $unit     = $_POST["unit"];
  $query->bind_param("sss", $quantity, $item, $unit);
 if(isset($result))
 {
  echo 'ok';
 }
}
header("Location: ../purchases");
?>
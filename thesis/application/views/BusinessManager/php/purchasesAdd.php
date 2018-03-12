<?php
$connection =mysqli_connect("localhost","root","");
mysqli_select_db($connection, "itproject");

  if (isset($_POST['addPurchases'])) {
  $sql = $connection->prepare("INSERT INTO purchase_orders (order_date, order_quantity, order_unit, po_unitprice, total, grand_total, po_remarks) VALUES (?, ?, ?, ?, ?, ?, ?)");  
 
  $orDate      = $_POST['orDate'];
  $quan        = $_POST['quan'];
  $unt         = $_POST['unt'];
  $unPrice     = $_POST['unPrice'];
  $toAmount    = $_POST['toAmount'];
  $granTotal   = $_POST['granTotal'];
  $rem         = $_POST['rem'];

  $sql->bind_param("sssssss", $orDate, $quan, $unt, $unPrice, $toAmount, $granTotal, $rem); 
  
  if($sql->execute()) {
  $success_message = "Added Successfully";
  } else {
  $error_message = "Problem in Adding New Record";
  }
  $sql->close();   
  $connection->close();
  } 
  header("Location: ../purchases");
?>
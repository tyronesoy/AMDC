<?php
$connection =mysqli_connect("localhost","root","");
mysqli_select_db($connection, "itproject");

  if (isset($_POST['addPurchases'])) {
  $sql = $connection->prepare("INSERT INTO purchase_orders (po_id, supplier, order_date) VALUES (?, ?, ?)");  
 
  $po         = $_POST['po'];
  $supp       = $_POST['supp'];
  $orDate      = $_POST['orDate'];


  $sql->bind_param("sss", $po, $supp, $orDate); 
  
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
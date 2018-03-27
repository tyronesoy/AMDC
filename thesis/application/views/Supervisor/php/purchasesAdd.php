<?php
$connection =mysqli_connect("localhost","root","");
mysqli_select_db($connection, "itproject");

  if (isset($_POST['addOrder'])) {
  $sql = $connection->prepare("INSERT INTO inventory_order (inventory_order_created_date, inventory_order_name, inventory_order_dept) VALUES (?, ?, ?)");  
 
  $orDate      = $_POST['orDate'];
  $name        = $_POST['custName'];
  $department  = $_POST['department'];

  $sql->bind_param("sss", $orDate, $name, $department); 
  
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
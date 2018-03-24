<?php
$connection =mysqli_connect("localhost","root","");
mysqli_select_db($connection, "itproject");

  if (isset($_POST['addOrder'])) {
  $sql = $connection->prepare("INSERT INTO inventory_order (inventory_order_created_date, inventory_order_name, inventory_order_dept, inventory_order_quantity, inventory_order_description) VALUES (?, ?, ?, ?, ?)");  
 
  $orDate      = $_POST['orDate'];
  $name        = $_POST['name'];
  $department  = $_POST['department'];
  $quantity    = $_POST['quantity'];
  $description = $_POST['description'];

  $sql->bind_param("sssss", $orDate, $name, $department, $quantity, $description); 
  
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
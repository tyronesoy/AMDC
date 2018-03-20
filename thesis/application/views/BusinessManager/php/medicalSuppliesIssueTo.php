 <?php
  $connection =mysqli_connect("localhost","root","");
   mysqli_select_db($connection, "itproject");
 if (isset($_POST['medIssueTo'])) {
      $sql = $connection->prepare("
        INSERT INTO request_supplies (request_date, issued_date, supply_type,   description, quantity_ordered, department_name, soft_deleted) VALUES (?, ?, 'Medical', ?, ?, ?, 'N')"); 

     /* $sql2= $connection->prepare("UPDATE supplies SET quantity_in_stock = (supplies.quantity_in_stock - request_supplies.quantity_ordered) FROM  WHERE supplies.supply_id =  request_supplies.supply_id  ") ; */

      $reqDate = $_POST['reqDate'];
      $issueDate = $_POST['issueDate'];
     // $time = $_POST['time'];
      $description = $_POST['description'];
      $quantity= $_POST['quantity'];
      $department = $_POST['department'];
      $sql->bind_param("sssss", $reqDate, $issueDate, $description, $quantity, $department);

      if($sql->execute()) {
        $success_message = "Added Successfully";
        } else {
        $error_message = "Problem in Adding New Record";
        }
        $sql->close();   
        $connection->close();

  }
  header("location: ../issuedSupplies");
?>
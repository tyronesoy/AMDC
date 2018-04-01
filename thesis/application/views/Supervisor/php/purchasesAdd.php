<?php
$connection =mysqli_connect("localhost","root","");
mysqli_select_db($connection, "itproject");

  /* if (isset($_POST['addOrder'])) {
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
  header("Location: ../purchases"); */

  if(isset($_POST['btn_action']))
{
  if($_POST['btn_action'] == 'Add')
  {
    $query = "
    INSERT INTO inventory_order (inventory_order_created_date, inventory_order_name, inventory_order_dept) 
    VALUES (:inventory_order_created_date, :inventory_order_name, :inventory_order_dept))
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':inventory_order_name'     =>  $_POST['custName'],
        ':inventory_order_dept'    =>  $_POST['department'],
        ':inventory_order_created_date' => $_POST['orDate']
      )
    );
    $result = $statement->fetchAll();
    $statement = $connect->query("SELECT LAST_INSERT_ID()");
    $inventory_order_id = $statement->fetchColumn();

    if(isset($inventory_order_id))
    {
      $total_amount = 0;
      for($count = 0; $count<count($_POST["QTY"]); $count++)
      {
        $sub_query = "INSERT INTO inventory_order_supplies
                      (supply_name, quantity, inventory_unit) 
                      VALUES (:inventory_order_id, :supply_name, :quantity, :inventory_unit)
                      ";
        $statement = $connect->prepare($sub_query);
        $statement->execute(
          array(
            ':inventory_order_id'   => $inventory_order_id,
            ':supply_name'  => $_POST["supply_name"][$count], 
            ':quantity' => $_POST["quantity"][$count], 
            ':inventory_unit'  => $_POST["inventory_unit"][$count]
          )
        );
       
      }
      
      $statement->execute();
      $result = $statement->fetchAll();
      if(isset($result))
      {
        echo 'Order Created...';
        echo '<br />';
        echo $inventory_order_id;
      }
    }
  }
}
?>
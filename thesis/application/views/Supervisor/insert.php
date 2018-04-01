<?php
//insert.php;
/*
if(isset($_POST["supply_name]"]))
{
 $connect = new PDO("mysql:host=localhost;dbname=itproject", "root", "");
 $inventory_order_id = uniqid();
 for($count = 0; $count < count($_POST["supply_name"]); $count++)
 {  
  $query = "INSERT INTO inventory_order_supplies
  (supply_name, quantity, inventory_unit) 
  VALUES (:inventory_order_id, :supply_name, :quantity, :inventory_unit)
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':inventory_order_id'   => $inventory_order_id,
    ':supply_name'  => $_POST["supply_name"][$count], 
    ':quantity' => $_POST["quantity"][$count], 
    ':inventory_unit'  => $_POST["inventory_unit"][$count]
   )
  );
 }
 $result = $statement->fetchAll();
 if(isset($result))
 {
  echo 'ok';
 }
}
*/
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
        ':inventory_order_created_date' => $_POST['orDate'];
      )
    );
    $result = $statement->fetchAll();
    $statement = $connect->query("SELECT LAST_INSERT_ID()");
    $inventory_order_id = $statement->fetchColumn();

    if(isset($inventory_order_id))
    {
      $total_amount = 0;
      for($count = 0; $count<count($_POST["product_id"]); $count++)
      {
        $product_details = fetch_product_details($_POST["QTY"][$count], $connect);
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
        echo $total_amount;
        echo '<br />';
        echo $inventory_order_id;
      }
    }
  }
}
?>
<?php
if(isset($_POST["number"]))
{
 $connect = new PDO("mysql:host=localhost;dbname=itproject", "root", "");
 $order_id = uniqid();

$query2 = "INSERT INTO inventory_order (inventory_order_uniq_id, inventory_order_created_date, inventory_order_name, inventory_order_dept) VALUES (:inventory_order_uniq_id, :inventory_order_created_date, :inventory_order_name, :inventory_order_dept)";
  $statement = $connect->prepare($query2);
  $statement->execute(
   array(
    ':inventory_order_uniq_id'       => $order_id,
    ':inventory_order_created_date'  => $_POST["orDate"], 
    ':inventory_order_name' => $_POST["custName"],
    ':inventory_order_dept' => $_POST["department"]
   )
  );

 for($count = 0; $count < count($_POST["number"]); $count++)
 {  
  $query = "INSERT INTO inventory_order_supplies
  (inventory_order_uniq_id, supply_name, unit_name, quantity) 
  VALUES (:inventory_order_uniq_id, :supply_name, :unit_name, :quantity)";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':inventory_order_uniq_id'   => $order_id,
    ':quantity'  => $_POST["number"][$count], 
    ':supply_name' => $_POST["neym"][$count],
    ':unit_name' => $_POST["unit"][$count]
   )
  );
 }
 $result = $statement->fetchAll();
 if(isset($result))
 {
  echo 'ok';
 }
}
?>


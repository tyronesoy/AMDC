<?php
if(isset($_POST["number"]))
{
 $connect = new PDO("mysql:host=localhost;dbname=itproject", "root", "");
 $datetoday = date('Y\-m\-d\ H:i:s A');
        $conn =mysqli_connect("localhost","root","");
        mysqli_select_db($conn, "itproject");
        $notif1 = "insert into logs (log_date,log_description,user,module) VALUES ('".$datetoday."','".$this->session->userdata('type')." ".$this->session->userdata('fname')." ".$this->session->userdata('lname')." has updated a request order','".$this->session->userdata('fname')." ".$this->session->userdata('lname')."','".$this->session->userdata('type')."')";
        $res1 = $conn->query($notif1);
 for($count = 0; $count < count($_POST["quantity"]); $count++)
 {  
  $query = "UPDATE inventory_order_supplies SET supply_name = :supply_name , quantity = :quantity WHERE inventory_order_supplies_id = :inventory_order_supplies_id ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':inventory_order_supplies_id' => $_POST["id"][$count],
    ':quantity'  => $_POST["quantity"][$count], 
    ':supply_name' => $_POST["supply"][$count]
   )
  );
 }

 for($count = 0; $count < count($_POST["number"]); $count++)
 {  
  $query = "INSERT INTO inventory_order_supplies
  (inventory_order_uniq_id, supply_name, unit_name, quantity) 
  VALUES (:inventory_order_uniq_id, :supply_name, :quantity)";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':inventory_order_uniq_id'   => $_POST["uniq_ID"],
    ':quantity'  => $_POST["number"][$count], 
    ':supply_name' => $_POST["neym"][$count]
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


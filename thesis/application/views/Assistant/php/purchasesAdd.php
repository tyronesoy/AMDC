<?php
$connection =mysqli_connect("localhost","root","");
mysqli_select_db($connection, "itproject");
$order_id = uniqid();
$random = mt_rand();
  if (isset($_POST['addOrder'])) {
  $sql = $connection->prepare("INSERT INTO purchase_order_bm (purchase_order_uniq_id, purchase_order_created_date, purchase_order_name, purchase_order_grandtotal, po_key) VALUES (?, ?, ?, ?, ?)");  
  $purchase_order_id = $order_id;
  $orDate      = $_POST['orDate'];
  $name        = $_POST['custName'];
  $gtotal      = ($_POST['unit_price'] * $_POST['quantity']) + ($_POST['unit_price2'] * $_POST['quantity2']) +($_POST['unit_price3'] * $_POST['quantity3']) + ($_POST['unit_price4'] * $_POST['quantity4']) + ($_POST['unit_price5'] * $_POST['quantity5']) + ($_POST['unit_price6'] * $_POST['quantity6']) + ($_POST['unit_price7'] * $_POST['quantity7']) + ($_POST['unit_price8'] * $_POST['quantity8']) + ($_POST['unit_price9'] * $_POST['quantity9']) + ($_POST['unit_price10'] * $_POST['quantity10']);
  $key = $random;

  $sql->bind_param("sssss", $purchase_order_id, $orDate, $name, $gtotal, $key); 
 
   $sql2 = $connection->prepare("INSERT INTO purchase_orders (order_date, purchase_order_uniq_id, order_unit, description, unit_price, order_quantity, supplier, total, po_key) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"); 

  $orDates      = $_POST['orDate'];
  $purchase_orders_id = $order_id;
  $unit_name        = $_POST['unit_name'];
  $supply_name      = $_POST['supply_name'];
  $unit_price        = $_POST['unit_price'];
  $quantity         = $_POST['quantity'];
  $supplier             = $_POST['supp'];
  $total            = $_POST['unit_price'] * $_POST['quantity'];
  $key2 = $random;

  $sql2->bind_param("sssssssss", $orDates, $purchase_orders_id,  $unit_name, $supply_name, $unit_price, $quantity, $supplier, $total, $key2);




    $sql3 = $connection->prepare("INSERT INTO purchase_orders (order_date, purchase_order_uniq_id, order_unit, description, unit_price, order_quantity, supplier, total, po_key) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"); 

  $orDates3      = $_POST['orDate'];
  $purchase_orders_id3 = $order_id;
  $unit_name3        = $_POST['unit_name2'];
  $supply_name3    = $_POST['supply_name2'];
  $unit_price3        = $_POST['unit_price2'];
  $quantity3         = $_POST['quantity2'];
  $supplier3             = $_POST['supp'];
  $total3            = $_POST['unit_price2'] * $_POST['quantity2'];
  $key3 = $random;


  $sql3->bind_param("sssssssss", $orDates3, $purchase_orders_id3,  $unit_name3, $supply_name3, $unit_price3, $quantity3, $supplier3, $total3, $key3);






  $sql4 = $connection->prepare("INSERT INTO purchase_orders (order_date, purchase_order_uniq_id, order_unit, description, unit_price, order_quantity, supplier, total, po_key) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"); 

  $orDates4      = $_POST['orDate'];
  $purchase_orders_id4 = $order_id;
  $unit_name4        = $_POST['unit_name3'];
  $supply_name4      = $_POST['supply_name3'];
  $unit_price4       = $_POST['unit_price3'];
  $quantity4         = $_POST['quantity3'];
  $supplier4             = $_POST['supp'];
  $total4            = $_POST['unit_price3'] * $_POST['quantity3'];
  $key4 = $random;

  $sql4->bind_param("sssssssss", $orDates4, $purchase_orders_id4,  $unit_name4, $supply_name4, $unit_price4, $quantity4, $supplier4, $total4, $key4);






  $sql5 = $connection->prepare("INSERT INTO purchase_orders (order_date, purchase_order_uniq_id, order_unit, description, unit_price, order_quantity, supplier, total, po_key) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"); 

  $orDates5      = $_POST['orDate'];
  $purchase_orders_id5 = $order_id;
  $unit_name5        = $_POST['unit_name4'];
  $supply_name5     = $_POST['supply_name4'];
  $unit_price5        = $_POST['unit_price4'];
  $quantity5         = $_POST['quantity4'];
  $supplier5             = $_POST['supp'];
  $total5            = $_POST['unit_price4'] * $_POST['quantity4'];
  $key5 = $random;

  $sql5->bind_param("sssssssss", $orDates5, $purchase_orders_id5,  $unit_name5, $supply_name5, $unit_price5, $quantity5, $supplier5, $total5, $key5);





  $sql6 = $connection->prepare("INSERT INTO purchase_orders (order_date, purchase_order_uniq_id, order_unit, description, unit_price, order_quantity, supplier, total, po_key) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"); 

  $orDates6      = $_POST['orDate'];
  $purchase_orders_id6 = $order_id;
  $unit_name6       = $_POST['unit_name5'];
  $supply_name6      = $_POST['supply_name5'];
  $unit_price6        = $_POST['unit_price5'];
  $quantity6         = $_POST['quantity5'];
  $supplier6             = $_POST['supp'];
  $total6            = $_POST['unit_price5'] * $_POST['quantity5'];
  $key6 = $random;

  $sql6->bind_param("sssssssss", $orDates6, $purchase_orders_id6,  $unit_name6, $supply_name6, $unit_price6, $quantity6, $supplier6, $total6, $key6);





  $sql7 = $connection->prepare("INSERT INTO purchase_orders (order_date, purchase_order_uniq_id, order_unit, description, unit_price, order_quantity, supplier, total, po_key) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"); 

  $orDates7      = $_POST['orDate'];
  $purchase_orders_id7 = $order_id;
  $unit_name7        = $_POST['unit_name6'];
  $supply_name7      = $_POST['supply_name6'];
  $unit_price7        = $_POST['unit_price6'];
  $quantity7         = $_POST['quantity6'];
  $supplier7             = $_POST['supp'];
  $total7            = $_POST['unit_price6'] * $_POST['quantity6'];
  $key7 = $random;

  $sql7->bind_param("sssssssss", $orDates7, $purchase_orders_id7,  $unit_name7, $supply_name7, $unit_price7, $quantity7, $supplier7, $total7, $key7);





  $sql8 = $connection->prepare("INSERT INTO purchase_orders (order_date, purchase_order_uniq_id, order_unit, description, unit_price, order_quantity, supplier, total, po_key) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"); 

  $orDates8     = $_POST['orDate'];
  $purchase_orders_id8 = $order_id;
  $unit_name8        = $_POST['unit_name7'];
  $supply_name8      = $_POST['supply_name7'];
  $unit_price8        = $_POST['unit_price7'];
  $quantity8        = $_POST['quantity7'];
  $supplier8             = $_POST['supp'];
  $total8            = $_POST['unit_price7'] * $_POST['quantity7'];
  $key8 = $random;

  $sql8->bind_param("sssssssss", $orDates8, $purchase_orders_id8,  $unit_name8, $supply_name8, $unit_price8, $quantity8, $supplier8, $total8, $key8);






  $sql9 = $connection->prepare("INSERT INTO purchase_orders (order_date, purchase_order_uniq_id, order_unit, description, unit_price, order_quantity, supplier, total, po_key) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"); 

  $orDates9      = $_POST['orDate'];
  $purchase_orders_id9 = $order_id;
  $unit_name9        = $_POST['unit_name8'];
  $supply_name9      = $_POST['supply_name8'];
  $unit_price9       = $_POST['unit_price8'];
  $quantity9         = $_POST['quantity8'];
  $supplier9             = $_POST['supp'];
  $total9            = $_POST['unit_price8'] * $_POST['quantity8'];
  $key9 = $random;

  $sql9->bind_param("sssssssss", $orDates9, $purchase_orders_id9,  $unit_name9, $supply_name9, $unit_price9, $quantity9, $supplier9, $total9, $key9);





  $sql10 = $connection->prepare("INSERT INTO purchase_orders (order_date, purchase_order_uniq_id, order_unit, description, unit_price, order_quantity, supplier, total, po_key) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"); 

  $orDates10      = $_POST['orDate'];
  $purchase_orders_id10 = $order_id;
  $unit_name10        = $_POST['unit_name9'];
  $supply_name10      = $_POST['supply_name9'];
  $unit_price10        = $_POST['unit_price9'];
  $quantity10         = $_POST['quantity9'];
  $supplier10             = $_POST['supp'];
  $total10            = $_POST['unit_price9'] * $_POST['quantity9'];
  $key10 = $random;

  $sql10->bind_param("sssssssss", $orDates10, $purchase_orders_id10,  $unit_name10, $supply_name10, $unit_price10, $quantity10, $supplier10, $total10, $key10);




  $sql11 = $connection->prepare("INSERT INTO purchase_orders (order_date, purchase_order_uniq_id, order_unit, description, unit_price, order_quantity, supplier, total, po_key) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"); 

  $orDates11      = $_POST['orDate'];
  $purchase_orders_id11 = $order_id;
  $unit_name11        = $_POST['unit_name10'];
  $supply_name11      = $_POST['supply_name10'];
  $unit_price11        = $_POST['unit_price10'];
  $quantity11         = $_POST['quantity10'];
  $supplier11             = $_POST['supp'];
  $total11            = $_POST['unit_price10'] * $_POST['quantity10'];
  $key11 = $random;

  $sql11->bind_param("sssssssss", $orDates11, $purchase_orders_id11,  $unit_name11, $supply_name11, $unit_price11, $quantity11, $supplier11, $total11, $key11);


   

  if($sql->execute() && $sql2->execute() && $sql3->execute() && $sql4->execute() && $sql5->execute() && $sql6->execute() && $sql7->execute() && $sql8->execute() && $sql9->execute() && $sql10->execute() && $sql11->execute()) {
  $success_message = "Added Successfully";
  } else {
  $error_message = "Problem in Adding New Record";
  }
  $sql->close();   
  $connection->close();
  } 
  header("Location: ../purchases");

?>
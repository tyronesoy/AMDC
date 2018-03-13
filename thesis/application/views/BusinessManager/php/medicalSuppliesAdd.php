<?php
  $host = "localhost";
  $user = "root";
  $password = "";
  $database = "itproject";

  $pdo = new PDO("mysql:host=localhost;dbname=itproject","root","");


   $connection =mysqli_connect("localhost","root","");
   mysqli_select_db($connection, "itproject");
                                // MEDICAL SUPPLY
  //CREATE or ADD MEDICAL SUPPLY
  if (isset($_POST['addMedicalSupply'])) {
      $sql = $connection->prepare("INSERT INTO supplies (supply_description, quantity_in_stock, unit, unit_price, supply_type, expiration_date) VALUES (?, ?, ?, ?, 'Medical', ?)");  
      $description=$_POST['Description'];
      $quantity = $_POST['Quantity'];
      $unit= $_POST['Unit'];
      $priceUnit= $_POST['priceUnit'];
      $expirationDate= $_POST['expirationDate'];
      $sql->bind_param("sssss", $description, $quantity, $unit, $priceUnit, $expirationDate);

      if($sql->execute()) {
        $success_message = "Added Successfully";
        } else {
        $error_message = "Problem in Adding New Record";
        }
        $sql->close();   
        $connection->close();
       
  }

   //header("Location: ../medicalSupplies");

   ?>
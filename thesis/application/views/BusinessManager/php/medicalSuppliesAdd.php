<?php
   $connection =mysqli_connect("localhost","root","");
   mysqli_select_db($connection, "itproject");
                                // MEDICAL SUPPLY
  //CREATE or ADD MEDICAL SUPPLY
  if (isset($_POST['addMedSupply'])) {
      $sql = $connection->prepare("INSERT INTO supplies (supply_description, brand_name, suppliers_id, quantity_in_stock, unit, unit_price, supply_type, expiration_date, soft_deleted, dep_name) VALUES (?, ?, ?, ?, ?, ?, 'Medical', ?, 'N', ?)");  
      $description=$_POST['Description'];
      $brandName= $_POST['brandname'];
      $supplier = $_POST['supplier'];
      $quantity = $_POST['Quantity'];
      $unit= $_POST['Unit'];
      $priceUnit= $_POST['priceUnit'];
      $expirationDate= $_POST['expirationDate'];
      $dep_name=$_POST['dep_name']
      $sql->bind_param("ssssssss", $description, $brandName, $supplier, $quantity, $unit, $priceUnit, $expirationDate, $dep_name);

      if($sql->execute()) {
        $success_message = "Added Successfully";
        $conn =mysqli_connect("localhost","root","");
        $datetoday = date('Y\-m\-d\ H:i:s A');
        mysqli_select_db($conn, "itproject");
        $notif = "insert into logs (log_date,log_description,user,module) VALUES ('".$datetoday."','Medical supply ".$description." with quantity ".$quantity." has been added','".$this->session->userdata('fname')." ".$this->session->userdata('lname')."','".$this->session->userdata('type')."')";
        $result = $conn->query($notif);
        } else {
        $error_message = "Problem in Adding New Record";
        }
        $sql->close();   
        $connection->close();
       
  }

   header("Location: ../medicalSupplies");

   ?>
<?php
   $connection =mysqli_connect("localhost","root","");
   mysqli_select_db($connection, "itproject");
                                // OFFICE SUPPLY
  //CREATE or ADD OFFICE SUPPLY
  if (isset($_POST['addOffSupply'])) {
      $sql = $connection->prepare("INSERT INTO supplies (supply_description, quantity_in_stock, unit, unit_price, supply_type, expiration_date, soft_deleted) VALUES (?, ?, ?, ?, 'Office', ?, 'N')");  
      $description=$_POST['Description'];
      $quantity = $_POST['Quantity'];
      $unit= $_POST['Unit'];
      $priceUnit= $_POST['priceUnit'];
      $expirationDate= $_POST['expirationDate'];
      $sql->bind_param("sssss", $description, $quantity, $unit, $priceUnit, $expirationDate);

      if($sql->execute()) {
        $conn =mysqli_connect("localhost","root","");
        $datetoday = date('Y\-m\-d\ H:i:s A');
        mysqli_select_db($conn, "itproject");
        $notif = "insert into logs (log_date,log_description,user,module) VALUES ('".$datetoday."','Office supply ".$description." with quantity ".$quantity." has been added','".$this->session->userdata('fname')." ".$this->session->userdata('lname')."','".$this->session->userdata('type')."')";
        $result = $conn->query($notif);
        $success_message = "Added Successfully";
        } else {
        $error_message = "Problem in Adding New Record";
        }
        $sql->close();   
        $connection->close();
       
  }

   header("Location: ../officeSupplies");

   ?>
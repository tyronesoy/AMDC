<?php
  $host = "localhost";
  $user = "root";
  $password = "";
  $database = "itproject2";

  $pdo = new PDO("mysql:host=localhost;dbname=itproject2","root","");

  $conn =mysqli_connect($host, $user, $password, $database) or die('Error connecting to MySQL server.'); // connection to the database
   
   $connection =mysqli_connect("localhost","root","");
   mysqli_select_db($connection, "itproject2");

   //DELETE MEDICAL SUPPLIES
  if(isset($_GET['medDelete'])){
    $id=$_GET['medDelete'];
    $sqldelete="DELETE FROM supplies WHERE supply_id='$id'";
    $result_delete=mysqli_query($conn,$sqldelete);
    if($result_delete){
        echo'<script>window.location.href="../medicalSupplies.php"</script>';
    }
    else{
        echo'<script>alert("Delete Failed")</script>';
    }
}// END OF DELETE MEDICAL SUPPLIES
   ?>
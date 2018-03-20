<?php
$con=mysqli_connect('localhost','root','','itproject');  

 //CREATE or ADD User Account
  if (isset($_POST['addMemo'])) {
  $sql = $con->prepare("INSERT INTO memo (memo_date, memo_description, soft_deleted) VALUES (?, ?, 'N')");  
  $memo_date = $_POST['memo_date'];
  $memo_description = $_POST['memo_description'];
  $sql->bind_param("ss", $memo_date, $memo_description);

  if($sql->execute()) {
  $success_message = "Added Successfully";
  } else {
  $error_message = "Problem in Adding New Record";
  }
  $sql->close();   
  $con->close();
  
  } 

  header("Location: ../memo");
?>
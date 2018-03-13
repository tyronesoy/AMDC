<?php
$con=mysqli_connect('localhost','root','','itproject');  

 //CREATE or ADD User Account
  if (isset($_POST['addUser'])) {
  $sql = $con->prepare("INSERT INTO users (username, user_type, fname, lname, user_contact, password, user_email) VALUES (?, ?, ?, ?, ?, MD5(?), ?)");  
  $username = $_POST['username'];
  $user = $_POST['usertype'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $user_contact = $_POST['user_contact'];
  $password = $_POST['password'];
  $user_email = $_POST['user_email'];


  $sql->bind_param("sssssss", $username, $user, $fname, $lname, $user_contact, $password, $user_email);

  if($sql->execute()) {
  $success_message = "Added Successfully";
  } else {
  $error_message = "Problem in Adding New Record";
  }
  $sql->close();   
  $con->close();
  
  } 

  header("Location: ../userAccounts");
?>
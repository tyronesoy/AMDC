<?php
$con=mysqli_connect('localhost','root','','itproject');  

 //CREATE or ADD User Account
  if (isset($_POST['passforget'])) { 
  $username = $_POST['username'];
  $sql = $con->prepare("UPDATE users SET password = 'amdc1234' where username = '".$username."' AND user_type = 'BusinessManager'");

  if($sql->execute()) {
  $conn =mysqli_connect("localhost","root","");
        $datetoday = date('Y\-m\-d\ H:i:s A');
        mysqli_select_db($conn, "itproject");
        $notif1 = "insert into logs (log_date,log_description,user,module) VALUES ('".$datetoday."','User ".$username." petition for password reset','','')";
        $res1 = $conn->query($notif1);
  $success_message = "Added Successfully";
  } else {
  $error_message = "Please proceed to the business manager for password reset";
  }
  $sql->close();   
  $con->close();
  
  } 
  
?>
<?php
$conn =mysqli_connect("localhost","root","");
mysqli_select_db($conn, "itproject");
$sql2 = "Select user_type from users where username = '".$username."'";
$result2 = $conn->query($sql2);
$typebm = "BusinessManager";
?>
<?php 
if ($result2->num_rows > 0) {
while($row = $result2->fetch_assoc()) {
  if($typebm == $row['user_type']){
 ?>
    <script type="text/javascript">alert("Password has been reset");history.go(-1);</script>
<?php
    }else{
?>
      <script type="text/javascript">alert("Please proceed to the business manager for password reset");history.go(-1);</script>
  <?php
}
  }
}

?>
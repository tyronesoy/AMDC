<?php
$con=mysqli_connect('localhost','root','','itproject');  

 //CREATE or ADD User Account
  if (isset($_POST['passdef'])) { 
  $oldpass = $_POST['oldpass'];
  $passw = $_POST['passw'];
  $passwconf = $_POST['passwconf'];
  
      
      $conn =mysqli_connect("localhost","root","", "itproject") or die('Error connecting to MySQL server.');
      $sql2 = "SELECT terms from invoices where invoice_id = 0";
      $result = $conn->query($sql2); 
      if ($result->num_rows > 0){
      while($row = $result->fetch_assoc()) {
          if($oldpass == $row['terms']){
                if($passw == $passwconf){
                    $sql = $con->prepare("UPDATE invoices SET terms = '".$passwconf."'");
                      if($sql->execute()) {
                      $conn =mysqli_connect("localhost","root","");
                            $datetoday = date('Y\-m\-d\ H:i:s A');
                            mysqli_select_db($conn, "itproject");
                            $notif1 = "insert into logs (log_date,log_description,user,module) VALUES ('".$datetoday."','".$this->session->userdata('type')." ".$fname." ".$lname." has changed the default password','".$this->session->userdata('fname')." ".$this->session->userdata('lname')."','".$this->session->userdata('type')."')";
                            $res1 = $conn->query($notif1);
                      $success_message = "Added Successfully";
                      } else {
                      $error_message = "Problem in Adding New Record";
                      }
                      $sql->close();   
                      $con->close();
                     ?>
                        <script type="text/javascript">alert("Default password has been changed");history.go(-1);</script>
                     <?php
                }else{
                     ?>
                <script type="text/javascript">alert("Password does not match");history.go(-1);</script>
                <?php
                }
          }else{
              ?>
              <script type="text/javascript">alert("Incorrect current password");history.go(-1);</script>
            <?php
          }
      }
      }
  } 
?>
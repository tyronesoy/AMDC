<?php
    $datetoday = date('Y\-m\-d\ H:i:s A');
    $con2 =mysqli_connect("localhost","root","");
        mysqli_select_db($con2, "itproject");
        $notif1 = "insert into logs (log_date,log_description,user,module) VALUES ('".$datetoday."','A supply has been returned','".$this->session->userdata('username')."','".$this->session->userdata('type')."')";
        $res1 = $con2->query($notif1);
    $conn =mysqli_connect("localhost","root","");
    mysqli_select_db($conn, "itproject");
    
    $id = $_GET['returnSupp'];

    $sql = $conn->prepare("UPDATE returns SET return_status='Returned' WHERE return_id='$id'");

        $sql->execute();
        $sql->close();   
        $conn->close();

    header ('Location: ../dashboard');
?> 

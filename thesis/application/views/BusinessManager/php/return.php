<?php

    $conn =mysqli_connect("localhost","root","");
    mysqli_select_db($conn, "itproject");
    
    $id = $_GET['returnSupp'];

    $sql = $conn->prepare("UPDATE returns SET return_status='Returned' WHERE return_id='$id'");

        $sql->execute();
        $sql->close();   
        $conn->close();

    header ('Location: ../dashboard');
?> 

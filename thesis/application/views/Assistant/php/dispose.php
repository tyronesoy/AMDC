
<?php 
	$datetoday = date('Y\-m\-d\ H:i:s A');
    $con2 =mysqli_connect("localhost","root","");
        mysqli_select_db($con2, "itproject");
        $notif1 = "insert into logs (log_date,log_description,user,module) VALUES ('".$datetoday."','An expired item has been deleted','".$this->session->userdata('username')."','".$this->session->userdata('type')."')";
        $res1 = $con2->query($notif1);
	$conn =mysqli_connect("localhost","root","");
	mysqli_select_db($conn, "itproject");

	//$del_id = $_GET['suppDelete'];
	//if (isset($_GET['suppDelete'])) { 
		//$desc_id = $conn->escape_string($_REQUEST('supplyDesc'));
		//$del_id = $conn->escape_string($_REQUEST['suppDelete']);
	//	$sql = "DELETE FROM supplies WHERE supplierProduct='$del_id'";  
		//$sql->bind_param('i', $_GET['suppDelete']); 
	//	$result = mysqli_query($sql, $query);
		//$sql->execute();
		//$sql->close(); 
		//$conn->close();
	//	header('location:../data3.php');
	//}
	$del_id = $_GET['disposeSupp'];
	
	$sql = $conn->prepare("UPDATE supplies SET soft_deleted='Y'  WHERE supply_id='$del_id'");
	$sql->execute();
	$sql->close();
	$conn->close();
	header("Location: ../dashboard");
?>
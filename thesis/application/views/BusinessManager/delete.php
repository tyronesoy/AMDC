<?php
$value = $_POST['log_description'];
$converted = urldecode($value);
$conn =mysqli_connect("localhost","root","");
                    mysqli_select_db($conn, "itproject");
                    $sql2 = "DELETE FROM logs WHERE log_description='".$converted."' LIMIT 1";
                    $result2 = $conn->query($sql2);
?>
<?php
if ($result2 == 1) { 
//if it updated
            header("Location: issuedSupplies"); /* Redirect browser */
            exit();
} else { 
//if it failed

            header("Location: issuedSupplies"); /* Redirect browser */
            exit();
} 
?>
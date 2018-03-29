<?php

$conn =mysqli_connect("localhost","root","");
                    mysqli_select_db($conn, "itproject");
                    $sql2 = "delete from logs where log_id > 0";
                    $result2 = $conn->query($sql2);
?>
<?php
if ($result2 > 0) { 
//if it updated
            header("Location: .\issuedSupplies"); /* Redirect browser */
            exit();
} else { 
//if it failed

            header("Location: .\issuedSupplies"); /* Redirect browser */
            exit();
} 
?>
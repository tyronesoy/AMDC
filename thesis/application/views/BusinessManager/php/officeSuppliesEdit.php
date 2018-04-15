<!-- daterange picker -->
  <link rel="stylesheet" href="../assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
<?php
$con=mysqli_connect('localhost','root','','itproject')
    or die("connection failed".mysqli_errno());

if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    $sql="select * from supplies WHERE supply_id=$id AND supply_type LIKE 'Office' AND soft_deleted='N'";
    $run_sql=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run_sql)){
        $per_id=$row[0];
      //  $per_supplierName=$row[1];
        $per_supplyDescription=$row[2];
        $per_supplyUnit=$row[4];
        $per_supplyQuantityInStock=$row[5];
        $per_supplyUnitPrice=$row[6];
        $per_supplyReorderLevel=$row[8];
        $per_supplyExpirationDate=$row[9];

    }//end while
?>
    <form class="form-horizontal" method="post" action ="">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                         <div class="col-md-2">
                                                <img src="../assets/dist/img/user3-128x128.png" alt="User Image" style="width:80px;height:80px;">
                                            </div>
                                            <div class="col-md-8">
                                                
                                                <div class="margin">
                                                    <center><h5>Assumption Medical Diagnostic Center</h5></center>
                                                    <center><h6>10 Assumption Rd., Baguio City</h6></center>
                                                    <center><h6>Philippines</h6></center>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end of modal header -->
                                        <div class="modal-body">
                                        <div class="box-header">
                                          <div class="margin">
                                              <center><h4><b>Update Supply Details</b></h4></center>
                                            </div>
                <form class="form-horizontal" method="post">
                    <table style="float:right;">
                    <tr>
                    <div class="box-body">
                             <div class="form-group" style="width:100%">
                            <label for="txtid">Supply ID</label>
                                <input type="number" class="form-control" id="txtid" name="txtid" hidden value="<?php echo $per_id;?>" readonly>
                            </div>

                            <div style="float:right;"> </div>
                            <div class="row">
                            <div class="col-md-6">
                            <div class="form-group" style="width:100%">
                            <label for="txtsupplyDescription">Description</label>
                                <input type="text" class="form-control" id="txtsupplyDescription" name="txtsupplyDescription" value="<?php echo $per_supplyDescription;?>">
                            </div>
                            </div>

                            <div class="col-md-6">
                            <div class="form-group" style="width:40%">
                            <label for="txtUnit">Unit</label>
                                <input type="text" class="form-control" id="txtUnit" name="txtUnit" value="<?php echo $per_supplyUnit;?>" readonly>
                        </div>
                        </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group" style="width:100%">
                            <label for="txtQuantityInStock">Current Quantity In Stock</label>
                                <input type="number" class="form-control" id="txtQuantityInStock" name="txtQuantityInStock" value="<?php echo $per_supplyQuantityInStock;?>" readonly>
                        </div>
                        </div>

                            <div class="col-md-6">
                            <div class="form-group" style="width:100%">
                            <label for="txtQuantityInStock">Add Quantity</label>
                                <input type="number" min="0" class="form-control" id="addQty" name="addQty" >
                        </div>
                        </div>
                        </div>

                            <div class="row">
                                <div class="col-md-6">
                            <div class="form-group" style="width:100%">
                            <label for="txtQuantityInStock">Current Unit Price</label>
                                <input type="number" class="form-control" id="txtUnitPrice" name="txtUnitPrice" value="<?php echo $per_supplyUnitPrice;?>" readonly>
                            </div>
                            </div>

                            <div class="col-md-6">
                            <div class="form-group" style="width:100%">
                            <label for="txtUnitPrice">Unit Price</label>
                                <input type="number" class="form-control" id="txtUnitPrice" name="txtUnitPrice" value="<?php echo $per_supplyUnitPrice;?>" min="0" >
                        </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-md-6">
                        <div class="form-group" style="width:100%">
                            <label for="txtReorderLevel">Reorder Level</label>
                                <input type="number" class="form-control" id="txtReorderLevel" name="txtReorderLevel" value="<?php echo $per_supplyReorderLevel;?>" readonly>
                        </div>
                        </div>
                            <div class="col-md-6">
                            <div class="form-group" style="width:100%">
                            <label for="txtExpirationDate">Expiration Date</label>
                                <input type="text" class="form-control" id="datepicker" name="txtExpirationDate" placeholder="yyyy-mm-dd" value="<?php echo $per_supplyExpirationDate;?>">
                        </div>
                        </div>
                        </div>

                        </tr>
                        </table>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancel</button>
                <button type="submit" class="btn btn-primary" name="medAdd"><i class="fa fa-edit"></i> Update</button>
            </div>
        </div>
    </form>
<?php
}//end if
?>

<!-- bootstrap datepicker -->
<script src="../assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script>
 // date and time 
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format : 'yyyy-mm-dd'
    })
  }) 
</script>
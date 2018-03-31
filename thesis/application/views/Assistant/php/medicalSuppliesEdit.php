<?php
$con=mysqli_connect('localhost','root','','itproject')
    or die("connection failed".mysqli_errno());

if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    $sql="select * from supplies WHERE supply_id=$id";
    $run_sql=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run_sql)){
        $per_id=$row[0];
      //  $per_supplierName=$row[1];
        $per_supplyDescription=$row[2];
        $per_supplyUnit=$row[4];
        $per_supplyQuantityInStock=$row[5];
        $per_supplyUnitPrice=$row[6];
        $per_supplyExpirationDate=$row[9];


    }//end while
?>
    <form class="form-horizontal" method="post" action ="">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <div class="margin">
                    <center><h3 class="modal-title"><b>Edit Supply Details</b></h3></center>
                </div>
            </div>
            
            <div class="modal-body">
                <form class="form-horizontal" method="post">

                    <tr>
                    <div class="box-body">
                             <div class="form-group">
                            <label for="txtid">Supply ID</label>
                                <input type="number" class="form-control" id="txtid" name="txtid" hidden value="<?php echo $per_id;?>" readonly>
                            </div>

                            <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                            <label for="txtsupplyDescription">Description</label>
                                <input type="text" class="form-control" id="txtsupplyDescription" name="txtsupplyDescription" value="<?php echo $per_supplyDescription;?>">
                            </div>
                            </div>

                            <div class="col-md-6">
                            <div class="form-group">
                            <label for="txtExpirationDate">Expiration Date</label>
                                <input type="date" class="form-control" id="txtExpirationDate" name="txtExpirationDate" placeholder="yyyy-mm-dd" value="<?php echo $per_supplyExpirationDate;?>">
                        </div>
                        </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                            <label for="txtQuantityInStock">Quantity In Stock</label>
                                <input type="number" class="form-control" id="txtQuantityInStock" min="0" name="txtQuantityInStock" value="<?php echo $per_supplyQuantityInStock;?>">
                        </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="txtUnit">Unit</label>
                                <input type="text" class="form-control" id="txtUnit" name="txtUnit" value="<?php echo $per_supplyUnit;?>">
                        </div>
                        </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                            <label for="txtUnitPrice">Unit Price</label>
                                <input type="number" class="form-control" id="txtUnitPrice" min="0" name="txtUnitPrice" value="<?php echo $per_supplyUnitPrice;?>">
                            </div>
                        </div>
                        </div>
                        
                        </tr>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancel</button>
                <button type="submit" class="btn btn-primary" name="medEdit"><i class="fa fa-save"></i> Save</button>
            </div>
        </div>
    </form>

<?php
}//end if
?>
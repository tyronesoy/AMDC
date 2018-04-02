<?php
/**
 for display full info. and edit data
 */
// start again
$con=mysqli_connect('localhost','root','','itproject'); 
if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    $sql="SELECT * FROM purchase_orders join purchase_order_bm USING(purchase_order_uniq_id) WHERE purchase_order_id=$id";
    $run_sql=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run_sql)){
        $per_id=$row[13];
        $per_orderDate=$row[2];
        $per_description=$row[7];
        $per_supplier=$row[10];
        $per_deliveryDate=$row[8];
        $per_quantity=$row[3];
        $per_status=$row[16];
        $per_unit=$row[4];

    }//end while
?>
    <form class="form-horizontal" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-md-2">
                    <img src="../assets/dist/img/user3-128x128.png" alt="User Image" style="width:80px;height:80px;">
                </div>
                <div class="col-md-8">
                    
                    <div class="margin">
                        <center><h5>Assumption Medical Diagnostic Center, Inc.</h5></center>
                        <center><h6>10 Assumption Rd., Baguio City</h6></center>
                        <center><h6>Philippines</h6></center>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post">
                    <div class="box-header">
                        <div class="margin">
                            <center><h4>Order Form</h4></center>
                        </div>
                    </div>
                    <div class="box-body">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label" for="txtid">Purchase Order ID</label>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control" id="txtpoid" name="txtpoid" hidden value="" readonly style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-sm-6 control-label" for="txtid">Order ID</label>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control" id="txtid" name="txtid" hidden value="<?php echo $per_id;?>" readonly style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="col-sm-6 control-label" for="txtdate">Order Date</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="txtdate" name="txtdate" value="<?php echo $per_orderDate;?>" readonly style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="txtdesc">Description</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="txtquantity">Quantity</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="txtunit">Unit</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    
                                </div>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="txtdesc" name="txtdesc" value="<?php echo $per_description;?>" readonly style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="txtquantity" name="txtquantity" value="<?php echo $per_quantity;?>" readonly style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="txtunit" name="txtunit" value="<?php echo $per_unit;?>" readonly style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                                    
                                    
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label" for="txtname">Supplier Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="txtname" name="txtname" value="<?php echo $per_supplier;?>" readonly style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label" for="txtstatus">Status</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="txtstatus" name="txtstatus" value="<?php echo $per_status;?>" readonly style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <!-- <button type="submit" class="btn btn-primary" name="">Save</button> -->
            </div>
        </div>
    </form>

<?php
}//end if
?>










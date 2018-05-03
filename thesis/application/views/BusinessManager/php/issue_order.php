<?php
/**
 for display full info. and edit data
 */
// start again
$con=mysqli_connect('localhost','root','','itproject'); 
if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    $sql="SELECT * FROM inventory_order JOIN inventory_order_supplies USING(inventory_order_uniq_id) JOIN supplies ON supplies.supply_description=inventory_order_supplies.supply_name WHERE inventory_order_id=$id AND quantity !=0";
    $run_sql=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run_sql)){
        $per_uniqid=$row[0];
        $per_id=$row[1];
        $per_date=$row[2];
        $per_name=$row[3];
        $per_department=$row[4];
        $per_status=$row[5];
        $per_remarks=$row[6];
        $per_issuedDate=$row[7];
        $per_inventorySupid=$row[8];
        $per_supplyName=$row[9];
        $per_supplyUnit=$row[10];
        $per_supplyQuantity=$row[11];
        $per_quantityIssued=$row[12];
        $per_supplyID=$row[13];
        $per_supplyType=$row[14];
        $per_supplyDesc=$row[15];
        $per_brandName=$row[16];
        $per_unit=$row[17];
        $per_quantityStock=$row[18];
        $per_unitPrice=$row[19];
        $per_unitOrder=$row[20];
        $per_reorderLevel=$row[21];
        $per_expiration=$row[22];

    }//end while
?>
    <form class="form-horizontal" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
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
            <div class="modal-body">
                <div class="box-header">
                    <div class="margin">
                        <center><h4>Departments Order Issue Form</h4></center>
                    </div>
                </div>
                <form class="form-horizontal" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-4 control-label hidden" for="txtid">Order ID</label>
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" id="txtid" name="txtid" hidden value="<?php echo $per_id;?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label hidden" for="txtuniqid">Order Unique ID</label>
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" id="txtuniqid" name="txtuniqid" hidden value="<?php echo $per_uniqid;?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-8 control-label hidden" for="txtstatus"></label>
                            <div class="col-sm-1">
                                <input type="hidden" class="form-control" id="txtstatus" name="txtstatus" hidden value="<?php echo $per_status;?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Supervisor Name</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <input type="text" class="form-control" id="custName" name="custName" value="<?php echo $per_name ?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="qtyStock">Quantity in Stock</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="qtyStock" name="qtyStock" value="<?php echo $per_quantityStock ?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="supplyName">Item Description</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="supplyName" name="supplyName" value="<?php echo $per_supplyName ?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="qtyOrdered">Quantity Ordered</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="qtyOrdered" name="qtyOrdered" value="<?php echo $per_supplyQuantity ?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="qtyIssued">Quantity to be Issued</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="qtyIssued" name="qtyIssued" value="<?php echo $per_quantityIssued ?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" min="0" max="<?php echo $per_supplyQuantity;?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn pull-left" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancel</button>
                <button type="submit" class="btn btn-warning" name="btnIssue"><i class="fa fa-retweet"></i> Issue</button>
            </div>
        </div>
    </form>

<?php
}//end if
?>

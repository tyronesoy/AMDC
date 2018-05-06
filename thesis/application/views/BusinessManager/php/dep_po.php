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
    <form class="form-horizontal" method="post" action="purchases/addPurchases">
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
                        <center><h4>Departments Order Purchase Form</h4></center>
                    </div>
                </div>
                <form class="form-horizontal" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-4 control-label hidden" for="txtid">Order ID</label>
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" id="txtid" name="txtid" value="<?php echo $per_id;?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label hidden" for="txtuniqid">Order Unique ID</label>
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" id="txtuniqid" name="txtuniqid" value="<?php echo $per_uniqid;?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-8 control-label hidden" for="txtstatus"></label>
                            <div class="col-sm-1">
                                <input type="hidden" class="form-control" id="txtstatus" name="txtstatus" value="<?php echo $per_status;?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Supervisor Name</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <input type="text" class="form-control" id="custName" name="custName" value="<?php echo $per_name ?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" margin="0px auto" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Supplier</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">       
                                            <i class="fa fa-group"></i>
                                        </div>
                                        <select class="form-group select2" name="supp" style="width:100%" required>
                                            <option value="">Select a Supplier</option>
                                                <?php
                                                $conn =mysqli_connect("localhost","root","");
                                                mysqli_select_db($conn, "itproject");
                                                $sql = "SELECT * FROM suppliers";
                                                $results = mysqli_query($conn, $sql);

                                                foreach($results as $supplier) { 
                                                ?>
                                            <option value="<?php echo $supplier["company_name"]; ?>" name="supp"><?php echo $supplier["company_name"]; ?></option>
                                                <?php 
                                                  }
                                                ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Purchase Order Date</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <?php $date = date("Y-m-d"); ?>
                                        <input type="text" class="form-control" name="orDate" value="<?php echo $date; ?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                    </div>
                                                    <!-- /.input group -->
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <span id="error"></span>
                            <table class="table table-bordered" id="item_table">
                                <tr>
                                    <th>Item Description</th>
                                    <th>Quantity</th>
                                </tr>
                                <tr>
                                    <td width="250">
                                        <select class="form-control select2" name="supply_name" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                            <option value="<?php echo $per_supplyName ?>"><?php echo $per_supplyName ?></option>
                                        </select>
                                    </td>
                                            
                                    <td width="50">
                                        <input type="text" name="quantity" class="form-control " min="0" style="width: 60px; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" required> 
                                    </td>

                                </tr>
                            </table>
                        </div>
                      
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn pull-left" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancel</button>
                <button type="submit" class="btn btn-success" name="btnOrder"><i class="fa fa-shopping-cart"></i> Order</button>
            </div>
        </div>
    </form>

<?php
}//end if
?>
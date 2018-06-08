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
        $per_issuedTo=$row[8];
        $per_orderID=$row[9];
        $per_inventorySupid=$row[10];
        $per_supplyName=$row[11];
        $per_supplyUnit=$row[12];
        $per_supplyQuantity=$row[13];
        $per_quantityIssued=$row[14];
        $per_quatntiyRemaining=$row[15];
        $per_supplyID=$row[16];
        $per_supplyType=$row[17];
        $per_supplyDesc=$row[18];
        $per_brandName=$row[19];
        $per_unit=$row[20];
        $per_quantityStock=$row[21];
        $per_unitPrice=$row[22];
        $per_unitOrder=$row[23];
        $per_reorderLevel=$row[24];
        $per_expiration=$row[25];
    }
    //end while
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box" style="overflow-y: scroll; max-height:85%;">
            <div class="box-header">
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
                        <center><h4><b>Department's Issue Order Form</b></h4></center>
                    </div>
                </div>
                <form class="form-horizontal" method="post">
                    
                    <div class="box-body">
                        <div class="form-group hidden">
                            <label class="col-sm-4 control-label hidden" for="txtid">Order ID</label>
                            <div class="col-sm-6 hidden">
                                <input type="hidden" class="form-control" id="txtid" name="txtid" hidden value="<?php echo $per_id;?>" readonly>
                            </div>
                        </div>


                        <div class="form-group hidden">
                            <label class="col-sm-4 control-label hidden" for="txtinventorysupid">Inventory Supplies ID</label>
                            <div class="col-sm-6 hidden">
                                <input type="hidden" class="form-control" id="txtinventorysupid" name="txtinventorysupid" hidden value=" <?php echo $per_inventorySupid;?>" readonly>
                            </div>
                        </div>


                        <div class="form-group hidden">
                            <label class="col-sm-4 control-label hidden" for="txtuniqid">Order Unique ID</label>
                            <div class="col-sm-6 hidden">
                                <input type="hidden" class="form-control" id="txtuniqid" name="txtuniqid" hidden value="<?php echo $per_uniqid;?>" readonly>
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
                                        <input type="text" class="form-control" id="custName" name="custName" value="<?php echo $per_name;?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black; background-color: #f1f1f1;" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Department Name</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-building"></i>
                                        </div>
                                        <input type="text" class="form-control" id="deptName" name="deptName" value="<?php echo $per_department;?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black; background-color: #f1f1f1;" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Order ID</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-id-badge"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ordid" name="ordid" value="<?php echo $per_orderID;?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black; background-color: #f1f1f1;" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Order Date</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control" id="ordDate" name="ordDate" value="<?php echo $per_date;?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black; background-color: #f1f1f1;" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php 
                                $sql="SELECT * FROM inventory_order JOIN inventory_order_supplies USING(inventory_order_uniq_id) JOIN supplies ON supplies.supply_description=inventory_order_supplies.supply_name WHERE inventory_order_id=$id AND quantity !=0";
                                $result = $con->query($sql);

                                $arrayOrdId = '';
                                $arrayOrdUniqId = '';
                                $arrayStatus = '';
                                $arraySupervisor = '';   
                                $arrayQtyStock = '';   
                                $arrayDesc = '';
                                $arrayQtyOrdered = '';
                                $arrayQtyIssued = '';
                                $arrayInventory = '';
                                $arraySupid = '';
                                $arrayUnit = '';
                                $arrayRemaining = '';
                                $zero = 0;
                        ?>
                        <div class="row">
                            
                            <span id="error"></span>
                            <table class="table table-bordered" id="item_table">
                                
                                <tr>
                                    <th width="12%">Qty in Stock</th>
                                    <th width="45%">Item Description</th>
                                    <th width="17%">Unit</th>
                                    <?php if($per_status != 'Partially Issued'){ ?>
                                    <th width="12%">Qty Ordered</th>
                                <?php }else{ ?>
                                    <th width="12%">Outstanding Balance</th>
                                <?php } ?>
                                    <th width="14%">Qty to be Issued</th>
                                    <th class="hidden">Status</th>
                                </tr>
                                <?php 
                                    if($result->num_rows > 0){
                                        while ($row = $result->fetch_assoc()) {
                                            $arrayOrdId .= $row['inventory_order_id'].', ';
                                            $arrayOrdUniqId .= $row['inventory_order_uniq_id'].', ';
                                            $arrayStatus .= $row['inventory_order_status'].', ';
                                            $arraySupervisor .= $row['inventory_order_name'].', ';   
                                            $arrayQtyStock .= $row['quantity_in_stock'].', ';   
                                            $arrayDesc .= $row['supply_name'].', ';
                                            $arrayQtyOrdered .= $row['quantity'].', ';
                                            $arrayQtyIssued .= $row['quantity_issued'].', ';
                                            $arrayInventory .= $row['inventory_order_supplies_id'].', ';
                                            $arraySupid .= $row['supply_id'].', ';
                                            $arrayUnit .= $row['unit'].', ';
                                            $arrayRemaining .= $row['quantity_remaining'].', ';

                                            $order_id = explode(", ", $arrayOrdId);
                                            $order_uniqid = explode(", ", $arrayOrdUniqId);
                                            $status = explode(", ", $arrayStatus);
                                            $supervisor = explode(", ", $arraySupervisor);
                                            $qty_stock = explode(", ", $arrayQtyStock);
                                            $item_desc = explode(", ", $arrayDesc);
                                            $qty_ordered = explode(", ", $arrayQtyOrdered);
                                            $qty_issued = explode(", ", $arrayQtyIssued);
                                            $inventory_supid = explode(", ", $arrayInventory);
                                            $supid = explode(", ", $arraySupid);
                                            $unit = explode(", ", $arrayUnit);
                                            $qty_remaining = explode(", ", $arrayRemaining);

                                        }
                                    
                                ?>
                                <tr>
                                    <?php 
                                        $count = count($order_id)-1;
                                        for ($x=0; $x < $count; $x++) { 
                                    ?>
                                    <td class="hidden">
                                        <input type="hidden" class="form-control hidden" id="inventorysupid<?php echo $x; ?>" name="inventorysupid<?php echo $x; ?>" value="<?php print_r($inventory_supid[$zero]);?>" hidden style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                    </td>
                                    <td class="hidden">
                                        <input type="hidden" class="form-control hidden" id="txtsupid<?php echo $x; ?>" name="txtsupid<?php echo $x; ?>" value="<?php print_r($supid[$zero]);?>" hidden style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                    </td>

                                    <td>
                                        <input type="text" class="form-control" id="qtyStock<?php echo $x; ?>" name="qtyStock<?php echo $x; ?>" value="<?php print_r($qty_stock[$zero]);?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black; background-color: #f1f1f1;" readonly>
                                    </td>

                                    <td>
                                        <input type="text" class="form-control" id="supplyName<?php echo $x; ?>" name="supplyName<?php echo $x; ?>" value="<?php print_r($item_desc[$zero]);?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black; background-color: #f1f1f1;" readonly>
                                    </td>

                                    <td>
                                        <input type="text" class="form-control" id="unit<?php echo $x; ?>" name="unit<?php echo $x; ?>" value="<?php print_r($unit[$zero]);?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black; background-color: #f1f1f1;" readonly>
                                    </td>
                                                
                                    <td>
                                        <?php if($status[$zero] != 'Partially Issued'){ ?>
                                        <input type="number" class="form-control" id="qtyOrdered<?php echo $x; ?>" name="qtyOrdered<?php echo $x; ?>" value="<?php print_r($qty_ordered[$zero]);?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black; background-color: #f1f1f1;" readonly> 
                                    <?php }else{ ?>
                                        <input type="number" class="form-control" id="qtyOrdered<?php echo $x; ?>" name="qtyOrdered<?php echo $x; ?>" value="<?php print_r($qty_remaining[$zero]);?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black; background-color: #f1f1f1;" readonly> 
                                    <?php } ?>
                                    </td>
                                    <td>
                                        <?php if($qty_stock[$zero] > 0){ 
                                            if($qty_ordered[$zero] <= $qty_stock[$zero]){ ?>
                                            <input type="number" class="form-control" id="qtyIssued<?php echo $x; ?>" name="qtyIssued<?php echo $x; ?>" value="<?php print_r($qty_issued[$zero]);?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" min="1" max="<?php print_r($qty_ordered[$zero]);?>" required>
                                            <?php }else { ?>
                                                <input type="number" class="form-control" id="qtyIssued<?php echo $x; ?>" name="qtyIssued<?php echo $x; ?>" value="<?php print_r($qty_issued[$zero]);?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" min="1" max="<?php print_r($qty_stock[$zero]);?>" required>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <center>
                                                <input type="text" class="form-control" id="qtyIssued<?php echo $x; ?>" name="qtyIssued<?php echo $x; ?>" value="Out of Stock" style="border: 0; outline: 0;  background: transparent;" min="1" max="<?php print_r($qty_stock[$zero]);?>" readonly>
                                            </center>
                                        <?php } ?>
                                        
                                    </td>
                                    <td class="hidden">
                                        <input type="hidden" class="form-control hidden" id="status<?php echo $x; ?>" name="status<?php echo $x; ?>" value="<?php print_r($status[$zero++]);?>" hidden style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                    </td>
                                </tr>
                                <?php 
                                }
                            }?>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Issued To</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <input type="text" class="form-control" id="issueName" name="issueName" value="" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Remarks</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-comments-o"></i>
                                        </div>
                                        <input type="text" class="form-control" id="remarks" name="remarks" value="" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancel</button>
                <?php 
                if($per_quantityStock == 0 || $per_quantityStock     == ''){
                ?>
                <button type="button" id="porder" name="porder" class="btn btn-success" data-toggle="modal" data-target="#porderModal" data-id="<?php echo $per_id;?>"><i class="glyphicon glyphicon-shopping-cart"></i> Order</button>
                <?php
                }
                ?>
                <button type="submit" class="btn btn-warning" name="btnIssue"><i class="fa fa-retweet"></i> Issue</button>
                
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>

<?php
}//end if
?>

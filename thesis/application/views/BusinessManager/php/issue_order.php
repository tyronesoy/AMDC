<?php
/**
 for display full info. and edit data
 */
// start again
$con=mysqli_connect('localhost','root','','itproject'); 
if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    $sql="SELECT * FROM inventory_order JOIN inventory_order_supplies USING(inventory_order_uniq_id) JOIN supplies ON supplies.supply_description=inventory_order_supplies.supply_name WHERE inventory_order_id=$id GROUP BY inventory_order_id";
    $run_sql=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run_sql)){
        $per_id=$row[1];
        $per_date=$row[2];
        $per_name=$row[3];
        $per_department=$row[4];
        $per_status=$row[5];
        $per_remarks=$row[6];
        $per_supplyName=$row[9];
        $per_supplyUnit=$row[10];
        $per_supplyQuantity=$row[11];
        $per_supplyID=$row[12];
        $per_expiration=$row[23];

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
                      <?php
                        $sql="SELECT * FROM inventory_order JOIN inventory_order_supplies USING(inventory_order_uniq_id) JOIN supplies ON supplies.supply_description=inventory_order_supplies.supply_name WHERE inventory_order_id=$id AND quantity !=0";
                        $result = $con->query($sql);    

                        $arrayExp = '';
                        $arraySuppId = '';
                        $arraySuppQty = '';
                        $arraySuppName = '';   
                        $arrayQuantity = '';   
                        $arrayIssuedQty = '';
                        $arrayDept = '';
                        $zero = 0;
                      ?>
                    <div class="table-responsive">
                        <span id="error"></span>
                        <table class="table table-bordered" id="item_table">
                            <tr>
                                <th class="hidden" style="text-align: center;">Expiration Date</th>
                                <th style="text-align: center;">Qty in Stock</th>
                                <th style="text-align: center;">Item Description</th>
                                <th style="text-align: center;">Qty Ordered</th>
                                <th style="text-align: center;">Qty to be Issued</th>
                            </tr>
                            <?php if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    $arrayExp .= $row['expiration_date'].', ';
                                    $arraySuppId .= $row['supply_id'].', ';
                                    $arraySuppQty .= $row['quantity_in_stock'].', ';
                                    $arraySuppName .= $row['supply_name'].', ';   
                                    $arrayQuantity .= $row['quantity'].', ';   
                                    $arrayIssuedQty .= $row['qty_issued'].', ';
                                    $arrayDept .= $row['inventory_order_dept'].', ';
                                                  
                                    $expiration_date = explode(", ", $arrayExp);
                                    $supply_id = explode(", ", $arraySuppId);
                                    $quantity_in_stock = explode(", ", $arraySuppQty);
                                    $supply_name = explode(", ", $arraySuppName);
                                    $quantity = explode(", ", $arrayQuantity);
                                    $quantity_issued = explode(", ", $arrayIssuedQty);
                                    $dept = explode(", ", $arrayDept);
                                }
                            ?>
                            <tr>
                                <?php 
                                    $countexp = count($expiration_date)-1;
                                    for($x=0; $x < $countexp; $x++){
                                ?>
                                <td class="hidden" width="75"><input class="form-control hidden" id="txtsupid<?php echo $x; ?>" name="txtsupid<?php echo $x; ?>" value="<?php print_r($supply_id[$zero]);?>" readonly style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                </td>

                                <td class="hidden" width="75"><input class="form-control hidden" id="txtexpiration<?php echo $x; ?>" name="txtexpiration<?php echo $x; ?>" value="<?php print_r($expiration_date[$zero]);?>" readonly style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                </td>

                                <td width="50"><input class="form-control" id="txtsupply<?php echo $x; ?>" name="txtsupply<?php echo $x; ?>" value="<?php print_r($quantity_in_stock[$zero]);?>" readonly style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                </td>

                                <td width="150"><input class="form-control" id="txtdesc<?php echo $x; ?>" name="txtdesc<?php echo $x; ?>" value="<?php print_r($supply_name[$zero]);?>" readonly style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                </td>
                                            
                                <td width="50"><input type="text" class="form-control" id="txtquantity<?php echo $x; ?>" name="txtquantity<?php echo $x; ?>" value="<?php print_r($quantity[$zero]);?>" readonly style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">  
                                </td>

                                <td width="50"><input type="text" class="form-control" id="txtissued<?php echo $x; ?>" name="txtissued<?php echo $x; ?>" value="<?php print_r($quantity_issued[$zero]);?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">  
                                </td>                                

                                <td class="hidden" width="75"><input class="form-control hidden" id="txtdept<?php echo $x; ?>" name="txtdept<?php echo $x; ?>" value="<?php print_r($inventory_order_dept[$zero++]);?>" readonly style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                </td>
                            </tr>
                            <?php 
                            }
                        }?>
                        </table>
                    </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancel</button>
                <button type="submit" class="btn btn-warning" name="btnIssue"><i class="fa fa-retweet"></i> Issue</button>
            </div>
        </div>
    </form>

<?php
}//end if
?>
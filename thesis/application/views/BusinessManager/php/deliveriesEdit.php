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
        $per_po_uniq_id=$row[0];
        $per_po_id=$row[1];
        $per_orderDate=$row[2];
        $per_quantity=$row[3];
        $per_unit=$row[4];
        $per_po_remarks=$row[5];
        $per_soft_deleted=$row[6];
        $per_description=$row[7];
        $per_deliveryDate=$row[8];
        $per_supply_type=$row[9];
        $per_supplier=$row[10];
        $per_unitprice=$row[11];
        $per_total=$row[12];
        $per_po_key=$row[13];
        $per_quantityDelivered=$row[14];
        $per_itemDeliveryRemarks=$row[15];
        $per_purch_id=$row[16];
        $per_orderCreateDate=$row[17];        
        $per_purchOrderName=$row[18];
        $per_purchOrderStatus=$row[19];
        $per_purchOrderRemarks=$row[20];
        $per_gtotal=$row[21];


    }//end while
?>
<form class="form-horizontal" method="post">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span></button>
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
                                        <!-- end of modal header -->
                                      <div class="modal-body">
                                        <div class="box-header">
                                          <div class="margin">
                                              <center><h4>Edit Deliveries Form</h4></center>
                                            </div>
                                        </div>
                                        <div class="box-body">                   
                                             <div class="form-group" style="width:100%">
                                                <label class="hidden" for="txtid">Purchase ID</label>
                                                    <input type="hidden" class="form-control" id="txtid" name="txtid" value="<?php echo $per_po_key;?>" readonly>
                                              </div>      
                                              <div class="row">
                                              <div class="col-md-5">
                                              <div class="form-group">
                                                  <label for="exampleInputEmail1">Name</label>
                                                  <div class="input-group">
                                                      <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                      </div>
                                                  <input type="text" class="form-control" id="custName" name="custName" value="<?php echo ( $this->session->userdata('fname')); echo' '; echo ( $this->session->userdata('lname'));?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                              </div>
                                              </div>
                                              </div>
                                              <div class="col-md-1">
                                              </div>

                                              <div class="col-md-5">
                                              <div class="form-group">
                                                  <label for="exampleInputEmail1">Supplier</label>

                                        <input type="text" class="form-control" id="txtsupplier" name="txtsupplier" value="<?php echo $per_supplier;?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">

                                              </div>
                                              </div>
                                            </div>
                                            <div class="row">

                                              <div class="col-md-5">
                                              <div class="form-group">
                                                    <label>Purchase Order Date</label>
                                                      <input type="text" class="form-control" id="txtdate" name="txtdate" value="<?php echo $per_orderDate;?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                                  </div>
                                                </div>
                                                <div class="col-md-1">
                                                </div>


                                                <div class="col-md-5">
                                <div class="form-group">
                                    <label for="txtstatus">Status</label>
                                        <input type="text" class="form-control" id="txtstatus" name="txtstatus" value="<?php echo $per_purchOrderStatus;?>" readonly style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">

                                </div>
                              </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                              <div class="form-group">
                                                    <label>Delivery Date</label>
                                                      <input type="text" class="form-control" id="txtdeliverydate" name="txtdeliverydate" value="<?php echo $per_deliveryDate;?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                                  </div>
                                                </div>
                            </div>
                                               <?php
                        $sql="select * from purchase_orders join purchase_order_bm USING(purchase_order_uniq_id) where purchase_order_id='$id' AND order_quantity != 0";
                        $result = $con->query($sql);
                        
                        $arrayPoId = '';
                        $arrayDesc = '';
                        $arrayUnit = '';
                        $arrayQuantity = '';   
                        $arrayQuantityDelivered = '';   
                        $arrayUnitPrice = ''; 
                      ?>

                                          
                                        <div class="table-responsive">
                                          <span id="error"></span>
                                          <table class="table table-bordered" id="item_table">
                                            <tr>
                                                <th class="hidden">ID</th>
                                               <th>Item Description</th>
                                               <th>Unit of Measure</th>
                                               <th>Quantity</th>
                                               <th>Quantity Delivered</th>
                                               <th>Unit Price</th>

                                              </tr>
                                              <?php if($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) { 
                                                  $arrayPoId .= $row['po_id'].', ';
                                                  $arrayDesc .= $row['description'].', ';
                                                  $arrayUnit .= $row['order_unit'].', ';
                                                  $arrayQuantity .= $row['order_quantity'].', ';   
                                                  $arrayQuantityDelivered .= $row['quantity_delivered'].', ';   
                                                  $arrayUnitPrice .= $row['unit_price'].', ';
                                                  
                                                  $poid = explode(", ", $arrayPoId);
                                                  $desc = explode(", ", $arrayDesc);
                                                  $unit = explode(", ", $arrayUnit);
                                                  $quantity = explode(", ", $arrayQuantity);
                                                  $quantityDelivered = explode(", ", $arrayQuantityDelivered);
                                                  $unitPrice = explode(", ", $arrayUnitPrice);
                                                  }
                                                  
                                              ?>
                                              <!-- index 0 -->
                                            <tr>

                                              <td class="hidden" width="100">
                                              <input class="form-control" id="txtpoid" name="txtpoid" value="<?php print_r($poid[0]);?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                              </td>

                                              <td width="250"><input class="form-control" id="txtdesc" name="txtdesc" value="<?php print_r($desc[0]);?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                              </td>

                                              <td width="100"><input class="form-control" id="txtunit" name="txtunit" value="<?php print_r($unit[0]);?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                              </td>
                                            
                                            <td width="50"><input type="text" class="form-control" id="txtquantity" name="txtquantity" value="<?php print_r($quantity[0]);?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>  </td>

                                            <td width="50"><input type="text" class="form-control" id="txtquantitydelivered" name="txtquantitydelivered" value="<?php print_r($quantityDelivered[0]); ?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" >  </td>

                                            <td width="50"><input type="text" id="unit_price" name="unit_price" class="form-control " value="&#8369 <?php print_r($unitPrice[0]); ?>" min="0" style="width: 75px; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly> </td>

                                            </tr>
                                            <!-- end index 0 -->

                                            <!-- index 1 -->
                                            <tr>

                                              <td class="hidden" width="10">
                                              <input class="form-control" id="txtpoid1" name="txtpoid1" value="<?php print_r($poid[1]);?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                              </td>

                                              <td width="250"><input class="form-control" id="txtdesc1" name="txtdesc1" value="<?php print_r($desc[1]);?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                              </td>

                                              <td width="100"><input class="form-control" id="txtunit1" name="txtunit1" value="<?php print_r($unit[1]);?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                              </td>
                                            
                                            <td width="50"><input type="text" class="form-control" id="txtquantity1" name="txtquantity1" value="<?php print_r($quantity[1]);?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>  </td>

                                            <td width="50"><input type="text" class="form-control" id="txtquantitydelivered1" name="txtquantitydelivered1" value="<?php print_r($quantityDelivered[1]); ?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" >  </td>

                                            <td width="50"><input type="text" id="unit_price1" name="unit_price1" class="form-control " value="&#8369 <?php print_r($unitPrice[1]); ?>" min="0" style="width: 75px; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly> </td>

                                            </tr>
                                            <!-- end index 1 -->

                                            <!-- index 2 -->
                                            <tr>

                                              <td class="hidden" width="10">
                                              <input class="form-control" id="txtpoid2" name="txtpoid2" value="<?php print_r($poid[2]);?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                              </td>

                                              <td width="250"><input class="form-control" id="txtdesc2" name="txtdesc2" value="<?php print_r($desc[2]);?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                              </td>

                                              <td width="100"><input class="form-control" id="txtunit2" name="txtunit2" value="<?php print_r($unit[2]);?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                              </td>
                                            
                                            <td width="50"><input type="text" class="form-control" id="txtquantity2" name="txtquantity2" value="<?php print_r($quantity[2]);?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>  </td>

                                            <td width="50"><input type="text" class="form-control" id="txtquantitydelivered2" name="txtquantitydelivered2" value="<?php print_r($quantityDelivered[2]); ?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" >  </td>

                                            <td width="50"><input type="text" id="unit_price2" name="unit_price2" class="form-control " value="&#8369 <?php print_r($unitPrice[2]); ?>" min="0" style="width: 75px; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly> </td>

                                            </tr>
                                            <!-- end index 2 -->

                                            <!-- index 3 -->
                                            <tr>

                                              <td class="hidden" width="10">
                                              <input class="form-control" id="txtpoid3" name="txtpoid3" value="<?php print_r($poid[3]);?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                              </td>

                                              <td width="250"><input class="form-control" id="txtdesc3" name="txtdesc3" value="<?php print_r($desc[3]);?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                              </td>

                                              <td width="100"><input class="form-control" id="txtunit3" name="txtunit3" value="<?php print_r($unit[3]);?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                              </td>
                                            
                                            <td width="50"><input type="text" class="form-control" id="txtquantity3" name="txtquantity3" value="<?php print_r($quantity[3]);?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>  </td>

                                            <td width="50"><input type="text" class="form-control" id="txtquantitydelivered3" name="txtquantitydelivered3" value="<?php print_r($quantityDelivered[3]); ?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" >  </td>

                                            <td width="50"><input type="text" id="unit_price3" name="unit_price3" class="form-control " value="&#8369 <?php print_r($unitPrice[3]); ?>" min="0" style="width: 75px; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly> </td>

                                            </tr>
                                            <!-- end index 3 -->

                                            <!-- index 4 -->
                                            <tr>

                                              <td class="hidden" width="10">
                                              <input class="form-control" id="txtpoid4" name="txtpoid4" value="<?php print_r($poid[4]);?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                              </td>

                                              <td width="250"><input class="form-control" id="txtdesc4" name="txtdesc4" value="<?php print_r($desc[4]);?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                              </td>

                                              <td width="100"><input class="form-control" id="txtunit4" name="txtunit4" value="<?php print_r($unit[4]);?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                              </td>
                                            
                                            <td width="50"><input type="text" class="form-control" id="txtquantity4" name="txtquantity4" value="<?php print_r($quantity[4]);?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>  </td>

                                            <td width="50"><input type="text" class="form-control" id="txtquantitydelivered4" name="txtquantitydelivered4" value="<?php print_r($quantityDelivered[4]); ?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" >  </td>

                                            <td width="50"><input type="text" id="unit_price4" name="unit_price4" class="form-control " value="&#8369 <?php print_r($unitPrice[4]); ?>" min="0" style="width: 75px; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly> </td>

                                            </tr>
                                            <!-- end index 4 -->

                                            <!-- index 5 -->
                                            <tr>

                                              <td class="hidden" width="10">
                                              <input class="form-control" id="txtpoid5" name="txtpoid5" value="<?php print_r($poid[5]);?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                              </td>

                                              <td width="250"><input class="form-control" id="txtdesc5" name="txtdesc5" value="<?php print_r($desc[5]);?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                              </td>

                                              <td width="100"><input class="form-control" id="txtunit5" name="txtunit5" value="<?php print_r($unit[5]);?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                              </td>
                                            
                                            <td width="50"><input type="text" class="form-control" id="txtquantity5" name="txtquantity5" value="<?php print_r($quantity[5]);?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>  </td>

                                            <td width="50"><input type="text" class="form-control" id="txtquantitydelivered5" name="txtquantitydelivered5" value="<?php print_r($quantityDelivered[5]); ?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" >  </td>

                                            <td width="50"><input type="text" id="unit_price5" name="unit_price5" class="form-control " value="&#8369 <?php print_r($unitPrice[5]); ?>" min="0" style="width: 75px; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly> </td>

                                            </tr>
                                            <!-- end index 5 -->

                                            <!-- index 6 -->
                                            <tr>

                                              <td class="hidden" width="10">
                                              <input class="form-control" id="txtpoid6" name="txtpoid6" value="<?php print_r($poid[6]);?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                              </td>

                                              <td width="250"><input class="form-control" id="txtdesc6" name="txtdesc6" value="<?php print_r($desc[6]);?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                              </td>

                                              <td width="100"><input class="form-control" id="txtunit6" name="txtunit6" value="<?php print_r($unit[6]);?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                              </td>
                                            
                                            <td width="50"><input type="text" class="form-control" id="txtquantity6" name="txtquantity6" value="<?php print_r($quantity[6]);?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>  </td>

                                            <td width="50"><input type="text" class="form-control" id="txtquantitydelivered6" name="txtquantitydelivered6" value="<?php print_r($quantityDelivered[6]); ?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" >  </td>

                                            <td width="50"><input type="text" id="unit_price6" name="unit_price6" class="form-control " value="&#8369 <?php print_r($unitPrice[6]); ?>" min="0" style="width: 75px; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly> </td>

                                            </tr>
                                            <!-- end index 6 -->

                                            <!-- index 7 -->
                                            <tr>

                                              <td class="hidden" width="10">
                                              <input class="form-control" id="txtpoid7" name="txtpoid7" value="<?php print_r($poid[7]);?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                              </td>

                                              <td width="250"><input class="form-control" id="txtdesc7" name="txtdesc7" value="<?php print_r($desc[7]);?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                              </td>

                                              <td width="100"><input class="form-control" id="txtunit7" name="txtunit7" value="<?php print_r($unit[7]);?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                              </td>
                                            
                                            <td width="50"><input type="text" class="form-control" id="txtquantity7" name="txtquantity7" value="<?php print_r($quantity[7]);?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>  </td>

                                            <td width="50"><input type="text" class="form-control" id="txtquantitydelivered7" name="txtquantitydelivered7" value="<?php print_r($quantityDelivered[7]); ?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" >  </td>

                                            <td width="50"><input type="text" id="unit_price7" name="unit_price7" class="form-control " value="&#8369 <?php print_r($unitPrice[7]); ?>" min="0" style="width: 75px; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly > </td>

                                            </tr>
                                            <!-- end index 7 -->

                                            <!-- index 8 -->
                                            <tr>

                                              <td class="hidden" width="10">
                                              <input class="form-control" id="txtpoid8" name="txtpoid8" value="<?php print_r($poid[8]);?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                              </td>

                                              <td width="250"><input class="form-control" id="txtdesc8" name="txtdesc8" value="<?php print_r($desc[8]);?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                              </td>

                                              <td width="100"><input class="form-control" id="txtunit8" name="txtunit8" value="<?php print_r($unit[8]);?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                              </td>
                                            
                                            <td width="50"><input type="text" class="form-control" id="txtquantity8" name="txtquantity8" value="<?php print_r($quantity[8]);?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>  </td>

                                            <td width="50"><input type="text" class="form-control" id="txtquantitydelivered8" name="txtquantitydelivered8" value="<?php print_r($quantityDelivered[8]); ?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" >  </td>

                                            <td width="50"><input type="text" id="unit_price8" name="unit_price8" class="form-control " value="&#8369 <?php print_r($unitPrice[8]); ?>" min="0" style="width: 75px; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly> </td>

                                            </tr>
                                            <!-- end index 8 -->

                                            <!-- index 9 -->
                                            <tr>

                                              <td class="hidden" width="10">
                                              <input class="form-control" id="txtpoid9" name="txtpoid9" value="<?php print_r($poid[9]);?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                              </td>

                                              <td width="250"><input class="form-control" id="txtdesc9" name="txtdesc9" value="<?php print_r($desc[9]);?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                              </td>

                                              <td width="100"><input class="form-control" id="txtunit9" name="txtunit9" value="<?php print_r($unit[9]);?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                              </td>
                                            
                                            <td width="50"><input type="text" class="form-control" id="txtquantity9" name="txtquantity9" value="<?php print_r($quantity[9]);?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>  </td>

                                            <td width="50"><input type="text" class="form-control" id="txtquantitydelivered9" name="txtquantitydelivered9" value="<?php print_r($quantityDelivered[9]); ?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" >  </td>

                                            <td width="50"><input type="text" id="unit_price9" name="unit_price9" class="form-control " value="&#8369 <?php print_r($unitPrice[9]); ?>" min="0" style="width: 75px; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly> </td>

                                            </tr>
                                            <!-- end index 9 -->

                                            <?php 
                              }
                            
                          ?>


                                          </table>
                                        </div>
                                      

                                          </div>
                                        </div> <!-- BOX-BODY -->
                                        <div class="modal-footer">
                   <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancel</button>
                   <button type="submit" class="btn btn-success" name="btnEdit"><i class="fa fa-save"></i> Save</button>
                </div>
                                      <div>
                                    </div>
                                    <!-- /.modal-content -->
                                  </div>
                                  <!-- /.modal-dialog -->
                                </div>
            <!-- end of Items FORM -->
              </form>
              <?php
}//end if

?>
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
        $per_unitprice=$row[11];

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
                                        <div class="box-body">                                      
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

                                              <div class="col-md-8">
                                              <div class="form-group">
                                                  <label for="exampleInputEmail1">Supplier</label>

                                        <input type="text" class="form-control" id="txtname" name="txtname" value="<?php echo $per_supplier;?>" readonly style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">

                                              </div>
                                              </div>

                                              <div class="col-md-6">
                                              <div class="form-group">
                                                    <label>Purchase Order Date</label>
                                                      <input type="text" class="form-control" id="txtdate" name="txtdate" value="<?php echo $per_orderDate;?>" readonly style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                                  </div>
                                                </div>


                                                <div class="col-md-4">
                                <div class="form-group">
                                    <label for="txtstatus">Status</label>
                                        <input type="text" class="form-control" id="txtstatus" name="txtstatus" value="<?php echo $per_status;?>" readonly style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">

                                </div>
                            </div>
                                              </div>


                                          
                                        <div class="table-responsive">
                                          <span id="error"></span>
                                          <table class="table table-bordered" id="item_table">
                                            <tr>
                                               <th>Item Description</th>
                                               <th>Unit of Measure</th>
                                               <th>Quantity</th>
                                               <th>Unit Price</th>
                                               <th>Total Amount</th>
                                              </tr>
                                            <tr>

                                              <td width="250"><input class="form-control" id="txtdesc" name="txtdesc" value="<?php echo $per_description;?>" readonly style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                              </td>

                                              <td width="100"><input class="form-control" id="txtunit" name="txtunit" value="<?php echo $per_unit;?>" readonly style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                              </td>
                                            
                                            <td width="50"><input type="text" class="form-control" id="txtquantity" name="txtquantity" value="<?php echo $per_quantity;?>" readonly style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">  </td>

                                            <td width="50"><input type="text" name="unit_price" class="form-control " value="<?php echo $per_unitprice ?>" min="0" style="width: 60px; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;"  /> </td>

                                            <td width="50"><input type="text" name="total" class="form-control " min="0" style="width: 60px; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;"  value="" /> </td>
                                            </tr>


                                          </table>
                                       <div class="row" >
                                               <div class="col-md-5">
                                              <div class="form-group">
                                                    <label>Grand Total</label>
                                                    <div class="input-group">
                                                      <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                      </div>
                                                      <input type="text" class="form-control pull-right" id="poid" name="poid" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                                    </div>
                                                    <!-- /.input group -->
                                                  </div>
                                                </div>
                                          </div>

                                        </div>
                                      

                                          </div>
                                        </div> <!-- BOX-BODY -->
                                        <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <!-- <button type="submit" class="btn btn-primary" name="">Save</button> -->
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
<?php
/**
 for display full info. and edit data
 */
// start again
 $connect = new PDO("mysql:host=localhost;dbname=itproject", "root", "");

function supply_dropdown($connect)
{ 
 $output = '';
 $query = "SELECT * FROM supplies ORDER BY supply_description ASC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["supply_description"].'">'.$row["supply_description"].'</option>';
 }
 return $output;
}

function unit_measure($connect)
{ 
 $output = '';
 $query = "SELECT * FROM unit_of_measure ORDER BY unit_name ASC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["unit_name"].'">'.$row["unit_name"].'</option>';
 }
 return $output;
}
 function dept($connect) {
  $sql = "SELECT department_name FROM departments JOIN users ON users.dept_ID=departments.department_id WHERE users.fname='".$this->session->userdata('fname')."' AND users.lname='".$this->session->userdata('lname')."' ";
$results = mysqli_query($conn, $sql);
}


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
        $per_description=$row[6];
        $per_deliveryDate=$row[7];
        $per_supply_type=$row[8];
        $per_supplier=$row[9];
        $per_unitprice=$row[10];
        $per_total=$row[11];
        $per_purch_id=$row[12];
        $per_qtyDelivered=$row[13];
        $per_delRemarks=$row[14];
        $per_notes=$row[15];
        $per_id=$row[16];
        $per_createdDate_=$row[17];
        $per_orderName=$row[18];  
        $per_status=$row[19];
        $per_purchRemarks=$row[20];
        $per_gtotal=$row[21];
        $per_key=$row[22];
        $per_itemdelRemarks=$row[23];
        $per_soft_deleted=$row[24];
        $date = date("Y-m-d");


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
                        <center><h4><b>Update Purchase Order Details</b></h4></center>
                    </div>
              <div class="box-body">                   
                <div class="form-group" style="width:100%">
                  <label class="hidden" for="txtid">Purchase ID</label>
                    <input type="hidden" class="form-control" id="txtid" name="txtid" value="<?php echo $per_id;?>" readonly>
                </div>
                <div class="form-group" style="width:100%">
                  <label class="hidden" for="txtuniqid">Purchase Unique ID</label>
                    <input type="hidden" class="form-control" id="txtuniqid" name="txtuniqid" value="<?php echo $per_key;?>" readonly>
                </div>       
                <div class="row">
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                              <i class="fa fa-user"></i>
                          </div>
                            <input type="text" class="form-control" id="custName" name="custName" value="<?php echo ( $this->session->userdata('fname')); echo' '; echo ( $this->session->userdata('lname'));?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly margin="0px auto">
                        </div>
                      </div>
                     </div>
                      <div class="col-md-1">
                      </div>

                      <div class="col-md-5">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Supplier</label>
                          <div class="input-group">
                          <div class="input-group-addon">
                              <i class="fa fa-group"></i>
                          </div>
                            <input type="text" class="form-control" id="txtsupplier" name="txtsupplier" value="<?php echo $per_supplier;?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                          </div>
                        </div>
                      </div>
                   </div>
                   <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label>Purchase Order Date</label>
                            <div class="input-group">
                          <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                          </div>
                           <input type="text" class="form-control" id="orDate" name="orDate" value="<?php echo $per_orderDate;?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-1"></div>
                      <div class="col-md-5">
                        <div class="form-group">
                            <label for="txtstatus">Status</label>
                          <div class="input-group">
                          <div class="input-group-addon">
                              <i class="fa fa-toggle-on"></i>
                          </div>
                            <input type="text" class="form-control" id="txtstatus" name="txtstatus" value="<?php echo $per_status;?>" readonly style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                        </div>
                      </div>
                    </div>
                  </div>
                      <div class="row">
                        <div class="col-md-5">
                           <div class="form-group">
                            <label for="txtdeliverydate">Delivery Date</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                 <i class="fa fa-calendar"></i>
                              </div>
                                  <?php $date = date("Y-m-d"); ?>
                                  
                                   <input type="date" class="form-control pull-right" id="txtdeliverydate" name="txtdeliverydate" value="<?php echo $per_deliveryDate;?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" margin="0px auto">
                          </div>
                        </div>
                      </div>
                </div>
                <?php
                $sql="select * from purchase_orders join purchase_order_bm USING(purchase_order_uniq_id) where purchase_order_id = $id";
                $result = $con->query($sql);

                  $arrayPoId = '';
                  $arrayDesc = '';
                  $arrayUnit = '';
                  $arrayQuantity = '';   
                  $arrayQuantityDelivered = '';   
                  $arrayUnitPrice = ''; 
                  $arraySupplier = ''; 
                  $zero = 0;    
                ?>

                  <div class="row">                 
                <div class="table-responsive">
                  <span id="error"></span>
                    <table class="table table-bordered" id="item_table">
                    <tr>
                      <th>Item Description</th>
                      <th>Unit of Measure</th>
                      <th>Quantity</th>
                      <th>Unit Price (&#8369)</th>
                     </tr>
                     <?php if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) { 

                           $arrayPoId .= $row['po_id'].', ';
                           $arrayDesc .= $row['description'].', ';
                           $arrayUnit .= $row['order_unit'].', ';
                           $arrayQuantity .= $row['order_quantity'].', ';   
                           $arrayQuantityDelivered .= $row['quantity_delivered'].', ';   
                           $arrayUnitPrice .= $row['unit_price'].', ';
                           $arraySupplier .= $row['supplier'].', ';
                           
                           $poid = explode(", ", $arrayPoId);
                           $desc = explode(", ", $arrayDesc);
                           $unit = explode(", ", $arrayUnit);
                           $quantity = explode(", ", $arrayQuantity);
                           $quantityDelivered = explode(", ", $arrayQuantityDelivered);
                           $unitPrice = explode(", ", $arrayUnitPrice);
                           $supplier = explode(", ", $arraySupplier);
                         }

                          ?>
                     <tr>
                     <?php 
                      $countpoid = count($poid)-1;
                       for($x=0; $x < $countpoid; $x++){
                                 ?>
                        <td class="hidden" width="100">
                          <input class="form-control" id="txtpoid<?php echo $x; ?>" name="txtpoid<?php echo $x; ?>" value="<?php print_r($poid[$zero]);?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                         </td>

                        <td width="250"><select class="form-control select2 inventory_order_supply_name" id="txtdesc<?php echo $x; ?>" name="txtdesc<?php echo $x; ?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" >
                        <option value="<?php print_r($desc[$zero]);?>"><?php print_r($desc[$zero]);?></option>
                         <?php echo supply_dropdown($connect);?>
                         </select>
                        </td>

                        <td width="100"><select class="form-control select2" id="txtunit<?php echo $x; ?>" name="txtunit<?php echo $x; ?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" >
                        <option value="<?php print_r($unit[$zero]);?>"><?php print_r($unit[$zero]);?></option>
                        <?php echo unit_measure($connect);?>
                        </select>
                        </td>

                        <td width="50"><input type="number" class="form-control" id="txtquantity<?php echo $x; ?>" name="txtquantity<?php echo $x; ?>" value="<?php print_r($quantity[$zero]);?>" min="0"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" ></td>

                        <td width="50"><input type="number" id="unit_price<?php echo $x; ?>" name="unit_price<?php echo $x; ?>" class="form-control " value=" <?php print_r($unitPrice[$zero]); ?>" min="0" style="width: 60px; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;"  /> </td>

                        <td class="hidden" width="250"><input class="form-control" id="txtsupplier<?php echo $x; ?>" name="txtsupplier<?php echo $x; ?>" value="<?php print_r($supplier[$zero++]);?>"  style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                         </td>

                         

                      </tr>

                   <?php } ?>
                                            <!-- end index 0 -->

                    <?php 
                       }       
                      ?>
                     </table>
                   </div>                          
                  </div>
                  <div class="modal-footer">
                   <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancel</button>
                   <button type="submit" class="btn btn-primary" name="btnEdit"><i class="fa fa-edit"></i> Update</button>
                </div>
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
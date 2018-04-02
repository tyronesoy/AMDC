<?php
/**
 for display full info. and edit data
 */
// start again
$con=mysqli_connect('localhost','root','','itproject'); 
if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    $sql="select * from inventory_order_supplies ios join inventory_order io on (ios.inventory_order_id = io.inventory_order_uniq_id) where io.inventory_order_id = $id AND supply_name != 0";
    $run_sql=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run_sql)){
        $ios_id=$row[0];
        $ioi_id=$row[1];
        $supName=$row[2];
        $unit=$row[3];
        $qty=$row[4];
        $io_id=$row[5];
        $ioiUN_id=$row[6];
        $iocd=$row[7];
        $io_name=$row[8];
        $io_dept=$row[9];

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
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-sm-6 control-label" for="txtid">Order ID</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="txtid" name="txtid" hidden value="<?php echo $ios_id;?>" readonly style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                   <table border="1px">
                      <?php
                        $sql="select * from inventory_order_supplies ios join inventory_order io on (ios.inventory_order_id = io.inventory_order_uniq_id) where io.inventory_order_id = $id AND supply_name != 0";
                        $result = $con->query($sql);    
                      ?>
                          <tr>
                              <th width="300"><center>Item</center></th>
                              <th width="200"><center>Unit</center></th>
                              <th width="150"><center>Quantity</center></th>
                          </tr>
                        <?php if($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) { ?>
                          <tr>

                              <td><?php echo $row["supply_name"]; ?></td>

                              <td><?php echo $row["unit_name"]; ?></td>
                            
                              <td><?php echo $row["quantity"]?></td>
                          </tr>
                          <?php 
                              }
                            }
                          ?>
            </table>

            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
                <!-- <button type="submit" class="btn btn-primary" name="">Save</button> -->
            </div>
        </div>
    </form>

<?php
}//end if
?>










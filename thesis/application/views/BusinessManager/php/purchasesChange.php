<?php
/**
 for display full info. and edit data
 */
// start again
$con=mysqli_connect('localhost','root','','itproject'); 
if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    $sql="select * from purchase_orders join purchase_order_bm USING(purchase_order_uniq_id) WHERE purchase_order_id=$id";
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
        $per_purch_id=$row[13];
        $per_id=$row[14];
        $per_createdDate_=$row[15];
        $per_status=$row[17];
        $per_orderName=$row[16];        
        $per_purchRemarks=$row[18];
        $per_gtotal=$row[19];
        $per_key=$row[20];
        $date = date("Y-m-d");
        

    }//end while
?>
    <form class="form-horizontal" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post">
                    <div class="box-body">
                        <center><h3 class="modal-title"><b>Are you sure to change the status of purchase order</h3><h2><b><u><?php echo $per_id;?></u>?</b></h2></b></center>
                        <div class="form-group">
                            <label hidden="true" class="col-sm-4 control-label" for="txtid">Purchase ID</label>
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" id="txtid" name="txtid" hidden value="<?php echo $per_key;?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-8 control-label" for="txtstatus"></label>
                            <div class="col-sm-1">
                                <input type="hidden" class="form-control" id="txtstatus" name="txtstatus" hidden value="<?php echo $per_status;?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                                     <input type="hidden" class="form-control pull-right"name="orDate" value="<?php echo $date; ?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" />
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancel</button>
                <button type="submit" class="btn btn-primary" name="btnUpdate"> <i class="fa fa-save"></i> Change</button>
            </div>
        </div>
    </form>

<?php
}//end if
?>
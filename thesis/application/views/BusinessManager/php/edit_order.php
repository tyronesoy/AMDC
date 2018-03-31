<?php
/**
 for display full info. and edit data
 */
// start again
$con=mysqli_connect('localhost','root','','itproject'); 
if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    $sql="select * from inventory_order WHERE inventory_order_id=$id";
    $run_sql=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run_sql)){
        $per_id=$row[0];
        $per_date=$row[1];
        $per_name=$row[2];
        $per_department=$row[3];
        $per_status=$row[4];
        $per_remarks=$row[7];

    }//end while
?>
    <form class="form-horizontal" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <div class="margin">
                    <h3>Orders</h3>
                </div>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label hidden="true" class="col-sm-4 control-label" for="txtid">Order ID</label>
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" id="txtid" name="txtid" hidden value="<?php echo $per_id;?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtsuppliername">Order Date</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtsuppliername" name="txtsuppliername" value="<?php echo $per_date;?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtcontactno">Supplier Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtcontactno" name="txtcontactno" value="<?php echo $per_name;?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtaddress">Department</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtaddress" name="txtaddress" value="<?php echo $per_department;?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtprodtype">Status</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtprodtype" name="txtprodtype" value="<?php echo $per_status;?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtremarks">Remarks</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtremarks" name="txtremarks" value="<?php echo $per_remarks;?>">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
                <button type="submit" class="btn btn-primary" name="btnEdit"><i class="fa fa-save"></i> Save</button>
            </div>
        </div>
    </form>

<?php
}//end if
?>










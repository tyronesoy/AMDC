<?php
/**
 for display full info. and edit data
 */
// start again
$con=mysqli_connect('localhost','root','','itproject'); 
if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    $sql=" SELECT * FROM purchase_orders WHERE po_id=$id";
    $run_sql=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run_sql)){
        $per_id=$row[0];
        $per_purchasesPurchaseDate=$row[1];
        $per_purchasesDescription=$row[2];
        $per_purchasesSupplier=$row[3];
        $per_purchasesQuantity=$row[4];
        $per_delete=$row[5];
        $per_purchasesDeliveryDate=$row[6];
        $per_purchasesStatus=$row[7];

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
                        <center><h3 class="modal-title"><b>Are you sure to delete this item?</b> </h3></center>
                        <div class="form-group">
                            <label hidden="true" class="col-sm-4 control-label" for="txtid">PO ID</label>
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" id="txtid" name="txtid" hidden value="<?php echo $per_id;?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-8 control-label" for="txtdelete"></label>
                            <div class="col-sm-1">
                                <input type="hidden" class="form-control" id="txtdelete" name="txtdelete" hidden value="<?php echo $per_delete;?>" readonly>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancel</button>
                <button type="submit" class="btn btn-danger" name="btnDelete"> <i class="fa fa-trash"></i> Remove</button>
            </div>
        </div>
    </form>

<?php
}//end if
?>
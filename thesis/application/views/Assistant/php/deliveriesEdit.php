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
		$per_purchasesDescription=$row[6];
		$per_purchasesSupplier=$row[9];
        $per_purchasesQuantity=$row[2];
        $per_purchasesUnit=$row[3];
        $per_purchasesDeliveryDate=$row[7];
		$per_purchasesStatus=$row[4];

    }//end while
?>
    <form class="form-horizontal" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"aria-label="Close"> <span aria-hidden="true">&times;</span></button>
				<div class="margin">
                <center><h3>Edit Purchases</h3></center>
				</div>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post">
                    <table style="float:right;">
                        <tr>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label hidden="true" for="txtid">PO ID</label>
                                            <input type="hidden" class="form-control" id="txtid" name="txtid" value="<?php echo $per_id;?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="txtdescription">Description</label>
                                            <input type="text" class="form-control" id="txtdescription" name="txtdescription" value="<?php echo $per_purchasesDescription;?>" readonly>
                                        </div>
                                    </div>
        						</div>
        						 
        						<div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="txtquantity">Quantity</label>
                                            <input type="number" class="form-control" id="txtquantity" name="txtquantity" value="<?php echo $per_purchasesQuantity;?>" readonly>

                                        </div>
                                    </div>
        						</div>
        						
        						<div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="txtunit">Unit</label>
                                            <input type="text" class="form-control" id="txtunit" name="txtunit" value="<?php echo $per_purchasesUnit;?>" readonly>
                                        </div>
                                    </div>

        						</div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="txtstatus">Status</label>
                                            <select class="form-control select2" id="txtstatus" name="txtstatus" style="width:40%">
                                                <option value="Delivered">Delivered</option>
                                                <option value="Fully Delivered" name="txtstatus">Fully Delivered</option>
                                                <option value="Partially Delivered" name="txtstatus">Partially Delivered</option>
                                            </select>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </tr>
                    </table>
				</form>
            </div>
			<div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancel</button>
                <button type="submit" class="btn btn-success" name="btnEdit"><i class="fa fa-save"></i> Save</button>
            </div>
        </div>
    </form>
<?php
}//end if
?>
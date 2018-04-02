<?php
/**
 for display full info. and edit data
 */
// start again
$con=mysqli_connect('localhost','root','','itproject'); 
if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    $sql=" SELECT * FROM purchase_orders join purchase_order_bm USING(purchase_order_uniq_id) WHERE purchase_order_id=$id";
    $run_sql=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run_sql)){
		$per_id=$row[13];
        $per_purchasesPurchaseDate=$row[2];
		$per_purchasesDescription=$row[7];
		$per_purchasesSupplier=$row[10];
        $per_purchasesQuantity=$row[3];
        $per_purchasesUnit=$row[4];
        $per_purchasesDeliveryDate=$row[8];
		$per_purchasesStatus=$row[16];

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
                        <div class="form-group" style="width:100%">
                            <label for="txtid">Purchase ID</label>
                                <input type="number" class="form-control" id="txtid" name="txtid" value="<?php echo $per_id;?>" readonly>
                        </div>
						 <div class="row">
                         <div class="col-md-6">
						<div class="form-group">
                            <label for="txtpurchasedate">Purchase Date</label>
                           <div class="input-group">
                            <div class="input-group-addon">
                             <i class="fa fa-calendar"></i>
                             </div>
                                <input type="date" class="form-control pull-right" id="txtpurchasedate" name="txtpurchasedate" value="<?php echo $per_purchasesPurchaseDate;?>">
                            </div>
                        </div>
						</div>
						
						  <div class="col-md-6">
						 <div class="form-group">
                            <label for="txtdescription">Description</label>
                                <input type="text" class="form-control" id="txtdescription" name="txtdescription" value="<?php echo $per_purchasesDescription;?>">
                            </div>
						 </div>
						 </div>
						 
						  <div class="row">
                          <div class="col-md-6">
						 <div class="form-group" style="width:100%">
                            <label for="txtsupplier">Supplier</label>
                                <input type="text" class="form-control" id="txtsupplier" name="txtsupplier" value="<?php echo $per_purchasesSupplier;?>">
                            </div>
                        </div>
						
						 <div class="col-md-6">
                        <div class="form-group">
                            <label for="txtquantity">Quantity</label>
                                <input type="number" class="form-control" id="txtquantity" name="txtquantity" value="<?php echo $per_purchasesQuantity;?>">
                            </div>
                        </div>
						</div>
						
						  <div class="row">
						   <div class="col-md-6">
                        <div class="form-group">
                            <label for="txtunit">Unit</label>
                                <input type="text" class="form-control" id="txtunit" name="txtunit" value="<?php echo $per_purchasesUnit;?>">
                            </div>
                        </div>
						
						   <div class="col-md-6">
						<div class="form-group">
                            <label for="txtdeliverydate">Delivery Date</label>
                           <div class="input-group">
                            <div class="input-group-addon">
                             <i class="fa fa-calendar"></i>
                             </div>
                                <input type="date" class="form-control pull-right" id="txtdeliverydate" name="txtdeliverydate" value="<?php echo $per_purchasesDeliveryDate;?>">
                            </div>
                        </div>
						</div>
						<div class="col-md-6">
						<div class="form-group">
                                   <label for="txtstatus">Status</label>
                               <br>
                                    <input type="radio" name="txtstatus" id="txtstatus" value="Active" > Active <br>
                                    <input type="radio" name="txtstatus" id="txtstatus" value="Inactive"> Inactive <br>
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
		</div>
		</div>
    </form>
<?php
}//end if
?>










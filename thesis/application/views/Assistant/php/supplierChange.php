<?php
/**
 for display full info. and edit data
 */
// start again
$con=mysqli_connect('localhost','root','','itproject'); 
if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    $sql="select * from suppliers WHERE supplier_id=$id";
    $run_sql=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run_sql)){
        $per_id=$row[0];
        $per_supplierName=$row[1];
        $per_supplierContact=$row[2];
        $per_supplierAddress=$row[3];
        $per_supplierProduct=$row[5];
        $per_supplierStatus=$row[4];
        $per_supplierRemarks=$row[6];

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
                        <center><h3 class="modal-title"><b>Do you want to change the status of <h2><b><u><?php echo $per_supplierName;?></u></b></h2></b></h3></center>
                        <div class="form-group">
                            <label hidden="true" class="col-sm-4 control-label" for="txtid">Suppliers ID</label>
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" id="txtid" name="txtid" hidden value="<?php echo $per_id;?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-8 control-label" for="txtsupplierstatus"></label>
                            <div class="col-sm-1">
                                <input type="hidden" class="form-control" id="txtsupplierstatus" name="txtsupplierstatus" hidden value="<?php echo $per_supplierStatus;?>" readonly>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" name="btnUpdate">Save</button>
            </div>
        </div>
    </form>

<?php
}//end if
?>
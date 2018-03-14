<?php
$con=mysqli_connect('localhost','root','','itproject');

if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    $sql="select * from supplies WHERE supply_id=$id";
    $run_sql=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run_sql)){
        $per_id=$row[0];
        $per_supplyExpirationDate=$row[9];
    }//end while
?>
    <form class="form-horizontal" method="post" action ="">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <center><h3 class="modal-title"><b>Edit Supply Details</b></h3></center>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post">
                    <div class="box-body">
                        <div class="form-group">
                             <div class="form-group">
                            <label hidden="true" class="col-sm-4 control-label" for="txtid">Supply ID</label>
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" id="txtid" name="txtid" hidden value="<?php echo $per_id;?>" readonly>
                            </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtReorderLevel">Old Reorder Level</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="txtReorderLevel" name="txtReorderLevel" value="<?php echo $per_supplyReorderLevel;?>" readonly>
                            </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtReorderLevel">New Reorder Level</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="txtReorderLevel" name="txtReorderLevel">
                            </div>
                        </form>
            </div>
            <div class="modal-footer">
                <a href="officeSuppliesTotalQuantityEdit"><button type="button" class="btn btn-danger">Cancel</button> </a>
                <button type="submit" class="btn btn-primary" name="offTQEdit">Save</button>
            </div>
        </div>
    </form>
<?php
}//end if
?>
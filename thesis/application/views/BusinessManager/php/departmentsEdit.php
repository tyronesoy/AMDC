<?php
/**
 for display full info. and edit data
 */
// start again
$con=mysqli_connect('localhost','root','','itproject'); 
if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    $sql="select * from departments WHERE department_id=$id";
    $run_sql=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run_sql)){
        $per_id=$row[0];
        $per_departmentName=$row[1];
        $per_departmentLocation=$row[2];
        //$per_reqId=$row[3];
        //$per_userId=$row[5];
        //$per_suppId=$row[4];
        //$per_suppId=$row[3];

    }//end while
?>
    <form class="form-horizontal" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <span aria-hidden="true">&times;</span></button>
                <div class="margin">
                    <center><h3>Edit Supplier's Information</h3></center>
                </div>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post">
                    <div class="box-body">
                        <div class="form-group">
                             <div class="form-group">
                            <label hidden="true" class="col-sm-4 control-label" for="txtid">Department ID</label>
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" id="txtid" name="txtid" hidden value="<?php echo $per_id;?>" readonly>
                            </div>
                            </div>
                            <label class="col-sm-4 control-label" for="txtdepartmentname">Department Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtdepartmentname" name="txtdepartmentname" value="<?php echo $per_departmentName;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtlocation">Location</label>
                            <div class="col-sm-6">
                                <select id="txtlocation" name="txtlocation">
                                    <option value="Baguio City" <?php echo ($per_departmentLocation =='Baguio City')?'selected':'' ?>>Baguio City</option>
                                    <option value="La Trinidad" <?php echo ($per_departmentLocation =='La Trinidad')?'selected':'' ?>>La Trinidad</option>
                                </select>
                                   <br>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancel</button>
                <button type="submit" class="btn btn-primary" name="btnEdit"><i class="fa fa-save"></i> Save</button>
            </div>
        </div>
    </form>
<?php
}//end if
?>










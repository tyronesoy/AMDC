<?php

$con=mysqli_connect('localhost','root','','itproject'); 


if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    $sql="SELECT * FROM memo WHERE memo_id=$id";
    $run_sql=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run_sql)){
       $per_memoid=$row[0];
        $per_memodate=$row[2];
        $per_memodescription=$row[3];
        $per_memostatus=$row[5];

    }//end while
?>


    <form class="form-horizontal" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="margin">
                        <center><h3>Edit Memo</h3></center>
                    </div>
            </div>
            
            <div class="modal-body">
                <form class="form-horizontal" method="post">
                    <div class="box-body">
                        <div class="form-group">

                            <div class="form-group">
                                    <label hidden="true" class="col-sm-4 control-label" for="txtid">Memo ID</label>
                                <div class="col-sm-6">
                                    <input type="hidden" class="form-control" id="txtid" name="txtid" hidden value="<?php echo $per_memoid;?>" readonly>
                                </div>
                             </div>

                             <div class="form-group">
                                     <label class="col-sm-4 control-label" for="txtmemodate">Memo Date</label>
                                 <div class="col-sm-6">
                                    <input type="date" class="form-control" id="txtmemodate" name="txtmemodate" value="<?php echo $per_memodate;?>">
                                </div>
                            </div>
                            
                             <div class="form-group">
                                    <label class="col-sm-4 control-label" for="txtmemodescription">Description</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="txtmemodescription" name="txtmemodescription" value="<?php echo $per_memodescription;?>"/>
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
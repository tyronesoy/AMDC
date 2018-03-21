<?php

$con=mysqli_connect('localhost','root','','itproject'); 


if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    $sql="SELECT * FROM memo WHERE memo_id=$id";
    $run_sql=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run_sql)){
       $per_memoid=$row[0];
        $per_memodate=$row[1];
        $per_memodescription=$row[2];
        $per_memostatus=$row[3];

    }//end while
?>


    <form class="form-horizontal" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="margin">
                        <h3>Edit Memo</h3>
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
                                    <textarea type="text" class="form-control" id="txtmemodescription" name="txtmemodescription" value="<?php echo $per_memodescription;?>"/>
                                </div>
                            </div>

                            <div class="form-group">
                                    <label class="col-sm-4 control-label" for="txtmemostatus">Status</label>
                                <div class="col-sm-6">
                                     <input type="radio" name="txtmemostatus" id="txtmemostatus" value="Not yet finished" >Not yet finished <br>
                                    <input type="radio" name="txtmemostatus" id="txtmemostatus" value="On the process" > On Process <br>
                                    <input type="radio" name="txtmemostatus" id="txtmemostatus" value="Finished"> Finished <br>
                                </div> 
                            </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <a href="memo">
                    <button type="button" class="btn btn-danger">Cancel</button> </a>
                    <button type="submit" class="btn btn-primary" name="btnEdit">Save</button>
            </div>
        </div>
    </form>
<?php
}//end if
?>
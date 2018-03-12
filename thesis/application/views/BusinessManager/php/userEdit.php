<?php

$con=mysqli_connect('localhost','root','','itproject'); 


if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    $sql="SELECT * FROM users WHERE user_id=$id";
    $run_sql=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run_sql)){
       
        $per_username=$row[2];
        $per_password=$row[3];
        $per_lname=$row[4];
         $per_id=$row[0];
        $per_fname=$row[5];
        $per_usercontact=$row[6];
        $per_email=$row[7];
         $per_status=$row[8];

    }//end while
?>


    <form class="form-horizontal" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="margin">
                        <h3>Edit User's Information</h3>
                    </div>
            </div>
            
            <div class="modal-body">
                <form class="form-horizontal" method="post">
                    <div class="box-body">
                        <div class="form-group">

                            <div class="form-group">
                                    <label hidden="true" class="col-sm-4 control-label" for="txtid">UserID</label>
                                <div class="col-sm-6">
                                    <input type="hidden" class="form-control" id="txtid" name="txtid" hidden value="<?php echo $per_id;?>" readonly>
                                </div>
                             </div>

                             <div class="form-group">
                                     <label class="col-sm-4 control-label" for="txtusername">User Name</label>
                                 <div class="col-sm-6">
                                    <input type="text" class="form-control" id="txtusername" name="txtusername" value="<?php echo $per_username;?>">
                                </div>
                            </div>

                            <div class="form-group">
                                    <label class="col-sm-4 control-label" for="txtpassword">Password</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control" id="txtpassword" name="txtpassword">
                                    <input type="checkbox" onclick="myFunction()">Show Password
                                        <script>
                                             function myFunction() {
                                              var x = document.getElementById("txtpassword");
                                              if (x.type === "password") {
                                                  x.type = "text";
                                              } else {
                                                  x.type = "password";
                                              }
                                          }
                                        </script>
                                </div>
                            </div>

                             <div class="form-group">
                                    <label class="col-sm-4 control-label" for="txtlname">Last Name</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="txtlname" name="txtlname" value="<?php echo $per_lname;?>">
                                </div>
                            </div>

                            <div class="form-group">
                                     <label class="col-sm-4 control-label" for="txtfname">First Name</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="txtfname" name="txtfname" value="<?php echo $per_fname;?>">
                                </div>
                            </div>

                            <div class="form-group">
                                    <label class="col-sm-4 control-label" for="txtuser_contact">Contact Number</label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control" id="txtuser_contact" name="txtuser_contact" value="<?php echo $per_usercontact;?>">
                                </div>
                            </div>

                            <div class="form-group">
                                    <label class="col-sm-4 control-label" for="txtemail">Email</label>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" id="txtemail" name="txtemail" value="<?php echo $per_email;?>">
                                </div>
                            </div>
                              
                            <div class="form-group">
                                    <label class="col-sm-4 control-label" for="txtstatus">Status</label>
                                <div class="col-sm-6">
                                    <input type="radio" name="txtstatus" id="txtstatus" value="Active"> Active <br>
                                    <input type="radio" name="txtstatus" id="txtstatus" value="Inactive"> Inactive <br>
                                </div> 
                            </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <a href="userAccounts">
                    <button type="button" class="btn btn-danger">Cancel</button> </a>
                    <button type="submit" class="btn btn-primary" name="btnEdit">Save</button>
            </div>
        </div>
    </form>
<?php
}//end if
?>
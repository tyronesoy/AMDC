<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AMDC IMS | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css" type="text/css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css" type="text/css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css"  type="text/css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css" type="text/css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css" type="text/css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
 
</head>
<body class="hold-transition login-page">

<div class="login-box">
  <div class="login-logo">
    <b>Assumption Medical and Diagnostic Center</b>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
      <center><img src="assets/dist/img/user3-128x128.png" alt="User Image" style="width:160px;height:160px;"></center>
    <p class="login-box-msg">Sign in to start your session</p>

    <form name="form1" method="post" action="<?php echo site_url('login/checklogin') ?>">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" placeholder="Username/Email" required/>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password" required/>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="row" style="display: flex; align-items: center; justify-content: center;color: red">
      <?php
        $info = $this->session->flashdata('info');
        if(!empty($info)){
          echo $info;
        }
      ?>

      </div>                                                   
<br>
      <div class="row" style="display: flex; align-items: center; justify-content: center;">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <br>
    <center><a type="submit"  data-toggle="modal" data-target="#modal-info" ><u>I forgot my password</u></a><br></center>
      <form name="form2" method="post">
                        <div class="modal fade" id="modal-info">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span></button>
                                        <div class="margin">
                                            <h3>Forgot Password</h3>
                                          </div>
                                      </div>
                                        <!-- end of modal header -->
                                      <div class="modal-body">
                                        <div class="box-body">
                                           
                                            <div class="form-group">
                                                  <label for="exampleInputEmail1">Username</label>
                                                  <input type="text" user="user"class="form-control" placeholder="Enter Username  ">
                                                  
                                                </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Next</button>
                                      </div>
                                    </div>
                                    <!-- /.modal-content -->
                                  </div>
                                   </form>
                                  <!-- /.modal-dialog -->
                                  <?php 
                                    $con=mysqli_connect('localhost','root','','itproject'); 
                                  if(isset($_GET['user'])){
                                      $username=$_GET['user'];
                                      $sql="select * from users WHERE username=$username";
                                      $run_sql=mysqli_query($con,$sql);
                                      while($row=mysqli_fetch_array($run_sql)){
                                          $per_userId=$row[0];
                                          $per_userName=$row[3];
                                          $per_password=$row[4];
                                          $per_type=$row[2];
                                          //$per_reqId=$row[3];
                                          //$per_userId=$row[5];
                                          //$per_suppId=$row[4];
                                          //$per_suppId=$row[3];

                                      }//end while
                                      if($per_type == 'BusinessManager'){
                                  ?>
                                </div>
                                <!-- MODAL -->
                                          <div class="modal fade" id="modal-default">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span></button>
                                                <div class="margin">
                                                    <h3>Forgot Password</h3>
                                                  </div>
                                              </div>
                                                <!-- end of modal header -->
                                              <div class="modal-body">
                                                <div class="box-body">

                                                      <div class="form-group">
                                                          <label for="exampleInputEmail1">Enter New Password</label>
                                                          <input type="email" class="form-control">
                                                        </div>
                                                      <div class="form-group">
                                                          <label for="exampleInputEmail1">Confirm New Password</label>
                                                          <input type="email" class="form-control">
                                                        </div>
                                                      <div class="form-group">
                                                          <label for="exampleInputEmail1">Security Question: Who is you favorite superhero?</label>
                                                          <input type="email" class="form-control" placeholder="Answer">
                                                        </div>
                                                </div>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-warning">Change Password</button>
                                              </div>
                                            </div>
                                            <!-- /.modal-content --> 
                                          </div>
                                          <!-- /.modal-dialog -->
                                        </div>
                                <!-- MODAL -->
                                    <div class="modal fade" id="modal-warning">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span></button>
                                  </div>
                                  <div class="modal-body">
                                    <h4>New Password Saved!</h4>
                                  </div>  
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                            <?php
                                }  
                              }
                              ?>

                            <!-- /.modal -->
    <!-- <center><a type="submit"  data-toggle="modal" data-target="#modal-info"><u>I forgot my password</u></a><br></center>
                      <form name="form2" method="post" action="<?php //echo site_url('forget/forgetPass') ?>"> 
                        <div class="modal fade" id="modal-info">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span></button>
                                        <div class="margin">
                                            <h3>Forgot Password</h3>
                                          </div>
                                      </div>
                                        <!- end of modal header -->
                                      <!-- <div class="modal-body">
                                        <div class="box-body">
                                           
                                            <div class="form-group">
                                                  <label for="exampleInputEmail1">Username</label>
                                                  <input type="text" name="uname" class="form-control" placeholder="Enter Username">
                                                  
                                                </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                                        <button type="submit" id="getEdit" class="btn btn-primary" data-toggle="modal" data-target="#forg">Next</button>
                                      </div>
                                    </div>
                                    <!- /.modal-content -->
                                  <!-- </div>
                                  <!- /.modal-dialog -->
                                <!-- </div> -->
                     <!--  </form> --> 
                                <!-- MODAL --> 
                                
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="assets/plugins/iCheck/icheck.min.js"></script>


<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>


<div class="modal fade" id="forg" role="dialog">
            <div class="modal-dialog">
                <div id="forg-data"></div>
            </div>
        </div>


<script>
        $(document).on('click','#getEdit',function(e){
            e.preventDefault();
            var per_userName=$(this).data('username');
            //alert(per_id);
            $('#forg-data').html('');
            $.ajax({
                url:'forget/editPass',
                type:'POST',
                data:'username='+per_userName,
                dataType:'html'
            }).done(function(data){
                $('#forg-data').html('');
                $('#forg-data').html(data);
            }).final(function(){
                $('#forg-data').html('<p>Error</p>');
            });
        });
    </script>

</body>
</html>
<?php 
$con=mysqli_connect('localhost','root','','itproject') or die('Error connecting to MySQL server.');
$pdo = new PDO("mysql:host=localhost;dbname=itproject","root","");
if(isset($_POST['change'])){
    $new_id=mysqli_real_escape_string($con,$_POST['txtid']);
    $new_password=mysqli_real_escape_string($con,$_POST['pwd']);
    $new_username=mysqli_real_escape_string($con,$_POST['txtusername']);

    $sqlupdate="UPDATE users SET password='$new_password' WHERE username='$new_username' ";
    $result_update=mysqli_query($con,$sqlupdate);

    if($result_update){
        echo '<script>window.location.href="login"</script>';
    }
    else{
        echo '<script>alert("Update Failed")</script>';
    }
}
?>
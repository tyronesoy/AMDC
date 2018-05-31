<?php
$connect = new PDO("mysql:host=localhost;dbname=itproject", "root", "");

function supply_dropdown($connect)
{ 
 $output = '';
 $query = "SELECT * FROM supplies WHERE soft_deleted= 'N' ORDER BY supply_description ASC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
    $output .= '<option value="'.$row["supply_description"].'">'.$row["supply_description"].'</option>';
 }
 return $output;
}

// function unit_measure($connect)
// { 
//  $output = '';
//  $query = "SELECT * FROM unit_of_measure ORDER BY unit_name ASC";
//  $statement = $connect->prepare($query);
//  $statement->execute();
//  $result = $statement->fetchAll();
//  foreach($result as $row)
//  {
//   $output .= '<option value="'.$row["unit_name"].'">'.$row["unit_name"].'</option>';
//  }
//  return $output;
// }

?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(!isset($_SESSION['first_run'])){
    $_SESSION['first_run'] = 1;
        $datetoday = date('Y\-m\-d\ H:i:s A');
        $conn =mysqli_connect("localhost","root","");
        mysqli_select_db($conn, "itproject");
        $notif1 = "insert into logs (log_date,log_description,user,module) VALUES ('".$datetoday."','".$this->session->userdata('type')." ".$this->session->userdata('fname')." ".$this->session->userdata('lname')." has logged in','".$this->session->userdata('username')."','".$this->session->userdata('type')."')";
        $res1 = $conn->query($notif1);
}
?>
<script type="text/javascript">
  $("select").on('focus', function () {
    previous = this.value;
    }).change(function() {
         $("select[value="+$(this).val()+"]").not(this).val(previous);
    });
</script>

<!DOCTYPE html>
<html>
<head>
   <title>Supervisor | Orders</title>
   <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
   <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables
  <link rel="stylesheet" href="../assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../assets/dist/css/skins/_all-skins.min.css">
  <script src="../assets/jquery/jquery-1.12.4.js"></script>
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <!-- daterange picker -->
  <link rel="stylesheet" href="../assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../assets/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../assets/bower_components/select2/dist/css/select2.min.css">
  <!-- datatable lib
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
 
  <link rel="stylesheet" href="../assets/table/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../assets/table/buttons.dataTables.min.css">

      <!-- Bootstrap 3.3.7 -->
  <script src="../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!--   <script src="../assets/table/jquery-1.12.4.js"></script> -->
    <script src="../assets/table/jquery.dataTables.min.js"></script>
    <script src="../assets/table/dataTables.buttons.min.js"></script>
    <script src="../assets/table/buttons.flash.min.js"></script>
    <script src="../assets/table/jszip.min.js"></script>
    <script src="../assets/table/pdfmake.min.js"></script>
    <script src="../assets/table/vfs_fonts.js"></script>
    <script src="../assets/table/buttons.html5.min.js"></script>
    <script src="../assets/table/buttons.print.min.js"></script>
    <script src="../assets/table/buttons.colVis.min.js"></script>
 <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">

<?php
  $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];   
      if(isset($_SESSION['logged_in']))  
      {  
           //echo 'dashboard';
      }  
      else if(!isset($_SESSION['logged_in'])) 
      {?>  
           <script>window.location.href = "lockscreen"</script>
           <?php    
      }  
      ?>
  
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo '../dashboard' ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>MDC</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="../assets/dist/img/amdc2.png" alt="User Image" style="width:160px;height:49px;"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <li class= "user user-menu">
                    <a class = "dropdown-toggle">
                        <span class="hidden-xs" id="demo"></span>
                        <script>
                           var d = new Date().toString();
                          d=d.split(' ').slice(0, 6).join(' ');
                          document.getElementById("demo").innerHTML = d
                        </script>
                    </a>
                </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
                <?php
                $conn =mysqli_connect("localhost","root","", "itproject") or die('Error connecting to MySQL server.');
                $pdo = new PDO("mysql:host=localhost;dbname=itproject","root","");
                $dtoday = date("Y/m/d");
                $date_select = date("Y-m-d", strtotime('-3 days') ) ;//minus three days
                $sql6 = "SELECT COUNT(*) AS total from logs where ((log_date BETWEEN '".$date_select."' AND '".$dtoday."') AND log_status = 1) AND log_description like '%order%'";
                $result6 = $conn->query($sql6);    
                ?>
                <?php if ($result6->num_rows > 0) {
                while($row = $result6->fetch_assoc()) { ?>
                <span class="label label-warning"><?php echo $row["total"]; 
                    $counted = $row["total"];
                    ?></span>
                <?php 
                      }
                    }
                ?>
            </a>
            <ul class="dropdown-menu">
              <li class="header"><i class="fa fa-warning text-yellow"></i> You have <?php echo $counted; ?> notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">  
                <table id="notify" class="table table-bordered table-striped">
                    <?php
                    $conn =mysqli_connect("localhost","root","");
                    mysqli_select_db($conn, "itproject");
                    $sql7 = "select log_id,log_date,log_description from logs where ((log_date BETWEEN '".$date_select."' AND '".$dtoday."') AND log_status = 1) AND log_description like '%order%' order by log_id DESC";
                    $result7 = $conn->query($sql7);
                    ?>
                    <?php 
                      if ($result7->num_rows > 0) {
                       while($row = $result7->fetch_assoc()) {
                        $logvalue = $row["log_description"];
                    ?>
                      <tr>
                        <?php
                        if(strpos($logvalue, 'order') !== false) { ?>
                            <td><small><a display="block" style="color:black" href="<?php echo 'order' ?>"><?php echo $row["log_description"];?></a></small></td>
                        <?php
                        }else{
                        ?>
                            <td><small><?php echo $row["log_description"];?></small></td>
                        <?php
                        }  
                        ?>
                        <td class="notif-delete">
                        <form action="delete" method="post">
                        <input type="hidden" name="log_id" value="<?php echo $row['log_id']; ?>">
                        <input type="hidden" name="log_description" value="<?php echo $row['log_description']; ?>">
                        <button class="btn-danger" type="submit" name="submit"><i class="glyphicon glyphicon-trash danger"></i></button>
                        </form>
                        </td>
                      </tr>
                    <?php 
                      }
                    }
                    ?>
                </table>
                </ul>
              </li>
              <li>
              <center>
              <form action="deleteall" method="post">
                        <button class="btn-danger" type="submit" name="submit"><i class="glyphicon glyphicon-trash"></i> Delete all Logs</button>
              </form>
              </center>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../assets/dist/img/user5-128x128.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo ( $this->session->userdata('fname'));?> <?php echo ( $this->session->userdata('lname'));?></span>     
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../assets/dist/img/user5-128x128.png" class="img-circle" alt="User Image">

                <p>
                 <span><?php echo ( $this->session->userdata('fname'));?>  <?php echo ( $this->session->userdata('lname'));?></span>
                 <small><?php echo ( $this->session->userdata('dept_name'));?> </small>
                 <small>Supervisor</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <!-- Menu Footer-->
              <li class="user-footer">
        <div class="pull-left">
                      <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#editprof"><i class="fa fa-edit"></i>Edit Profile</button>
                </div>
                <div class="pull-right">
                   <a href="<?php echo '../logout' ?>"  class="btn btn-danger"><i class="fa fa-sign-out"></i>Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
             <?php $identity =  $this->session->userdata('fname');?>
 
<div class="modal fade" id="editprof">
<form name="form1" id="user_form" method="post" action="dashboard/addUser">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <div class="col-md-2">
                        <img src="../assets/dist/img/user3-128x128.png" alt="User Image" style="width:80px;height:80px;">
                            </div>
                                <div class="col-md-8">
                                                
                                                <div class="margin">
                                                    <center><h5>Assumption Medical Diagnostic Center</h5></center>
                                                    <center><h6>10 Assumption Rd., Baguio City</h6></center>
                                                    <center><h6>Philippines</h6></center>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end of modal header -->
                                        <div class="modal-body">
                                        <div class="box-header">
                                          <div class="margin">
                                              <center><h4><b>Update Profile</b></h4></center>
                                            </div>
                                      </div>
                <div class="box-body">
                    
                        <?php
                          $conn =mysqli_connect("localhost","root","", "itproject") or die('Error connecting to MySQL server.');
                          $date = date("Y/m/d");
                          $sql = "Select * from users where user_id = ".$this->session->userdata('id')."";
                          $result = $conn->query($sql);    
                        ?>
                        <?php if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) { ?>
                            
                            <div class="form-group">
                          <label hidden="true" for="exampleInputEmail1">id</label>
                          <input type="text" class="hidden" name="prevname" id="prevname" value="<?php echo $identity; ?>" />
                        </div>
                    
                       <div class="col-md-13">
                       <div class="form-group">
                          <label for="exampleInputEmail1">Username</label>
                          <input type="text" class="form-control" name="username" id="username" value="<?php echo $row['username'] ?>" required />
                        </div>
                      </div>

                        <div class="row">
                          <div class="col-md-6">
                        <div class="form-group" style="width:100%">
                          <label for="exampleInputEmail1">First Name</label>
                          <input type="name" class="form-control" name="fname" id="fname" value="<?php echo $row['fname'] ?>" required />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Last Name</label>
                          <input type="name" class="form-control" name="lname" id="lname" value="<?php echo $row['lname'] ?>" required />
                        </div>
                      </div>
                      </div>

                      <div class="row">
                      <div class="col-md-6">
                      <div class="form-group" style="width:100%">
                          <label for="exampleInputEmail1">Email</label>
                          <input type="email" class="form-control" name="user_email" id="user_email" value="<?php echo $row['user_email'] ?>" placeholder="email@email.com" required />
                        </div>
                      </div>
                
                       <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Contact Number</label>
                          <input type="text" class="form-control" name="user_contact" id="user_contact" value="<?php echo $row['user_contact'] ?>" maxlength="11" placeholder="09XXXXXXXXX" pattern="^[0-9]{11}$" required />
                        </div>
                      </div>
                    </div>

                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group" style="width:100%">
                          <label for="exampleInputEmail1">Password</label>
                          <input type="password" class="form-control" name="password" onmouseover="mouseoverPass();" onmouseout="mouseoutPass();" id="password" value="<?php echo $row['password'] ?>" required />

                        <script>
                        function mouseoverPass(obj) {
                          var obj = document.getElementById('password');
                          obj.type = "text";
                        }
                        function mouseoutPass(obj) {
                          var obj = document.getElementById('password');
                          obj.type = "password";
                        }
                        </script>
                            
                        </div>
                          <?php 
                              }
                            }
                          ?>
                </div>
              </div>
              </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancel</button>
                <button type="submit" class="btn btn-primary" name="addUser"><i class="fa fa-edit"></i> Update</button>
              </div>
            </div>
            <!-- /.modal-content -->

          </div>
          <!-- /.modal-dialog -->
        </form> 
        </div>          
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../assets/dist/img/user5-128x128.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
           <p><?php echo ( $this->session->userdata('fname'));?>  <?php echo ( $this->session->userdata('lname'));?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Active</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Inventory System</li>
  <!-- DASHBOARD MENU -->
        <li>
          <a href="<?php echo '../dashboard' ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
    <!-- SUPPLIES MENU -->
        <li class="treeview">
          <li class="treeview">
            <a href="#"><i class="fa fa-briefcase"></i> Supplies
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo 'medicalSupplies' ?>"><i class="fa fa-medkit"></i>Medical Supplies</a></li>
              <li class="treeview">
                <li><a href="<?php echo 'officeSupplies' ?>"><i class="fa fa-pencil-square"></i>Office Supplies</a></li>
              </li>
            </ul>
          </li>
          <li><a href="<?php echo 'issuedSupplies' ?>"><i class="fa fa-retweet"></i>Issued Supplies</a></li>
          <li class="active"><a href="<?php echo 'order' ?>"><i class="fa fa-shopping-cart"></i><span>Orders</span></a></li>

        </li>
    
    <!---------------------------------------------------- CALENDAR MENU -------------------------------------------------------------->
        <li>
          <a href="<?php echo 'memo'?>">
            <i class="fa fa-tasks"></i> <span>Memo</span>
          </a>
        </li>
<!-- LOCKSCREEN MENU -->
        <li>
          <a href="<?php echo 'lockscreen' ?>">
            <i class="fa fa-lock"></i> <span>Lockscreen</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
            <i class="fa fa-shopping-cart"></i> <b>Orders</b>
        <!-- <small>Supplies</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Dashboard</li>
        <li class="active"><i class="fa fa-shopping-cart"></i> Orders</li>
      </ol>
    </section>

       <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Data Table With Full Features</h3> -->

              <table style="float: left;">
                    <tr>
                        <th> <div class="dropdownButton">
                        <select name="dropdown" class="form-group select2" style="width:100  %;" onchange="location=this.value;">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                          <span class="caret"></span>
                        </button>
                          <option value="orderPending">Pending</option>
                          <option value="order">All Orders</option>
                          <option value="orderAccepted">Accepted</option>
                          <option value="orderDeclined">Declined</option>
                        </select>
                      </div></th>
                    </tr>
                </table>

                <table style="float:right;">
                    <tr>
                        <th><button type="submit" class="btn btn-primary btn-block btn-success" data-toggle="modal" data-target="#modal-info"><i class=" fa fa-plus">Add Order</i></button>
            
                       <form id="add_name" name="add_name">
                        <div class="modal fade" id="modal-info">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span></button>
                                            <div class="col-md-2">
                                                <img src="../assets/dist/img/user3-128x128.png" alt="User Image" style="width:80px;height:80px;">
                                            </div>
                                            <div class="col-md-8">
                                                
                                                <div class="margin">
                                                    <center><h5>Assumption Medical Diagnostic Center, Inc.</h5></center>
                                                    <center><h6>10 Assumption Rd., Baguio City</h6></center>
                                                    <center><h6>Philippines</h6></center>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="modal-body">
                                        <div class="box-header">
                                          <div class="margin">
                                              <center><h4><b>Add New Order</b></h4></center>
                                            </div>
                                        <!-- end of modal header -->
                                        <div class="box-body">
                                          <div class="row">
                                              <div class="col-md-6" style="width:100%">
                                              <div class="form-group">
                                                   <label for="exampleInputEmail1">Department</label>
                                                <div class="input-group">
                                                      <div class="input-group-addon">
                                                        <i class="fa fa-institution"></i>
                                                      </div>
                                                       <?php
                                                          $conn =mysqli_connect("localhost","root","");
                                                          mysqli_select_db($conn, "itproject");
                                                          $dept = "SELECT dept_name FROM users WHERE fname='".$this->session->userdata('fname')."' AND users.lname='".$this->session->userdata('lname')."'";
                                                          $resulty = $conn->query($dept);
                                                          ?>
                                                          <?php 
                                                            if ($resulty->num_rows > 0) {
                                                             while($row = $resulty->fetch_assoc()) { 
                                                          ?>
                                                
                                                <input type="text" class="form-control" id="department" name="department" value="<?php echo $row['dept_name']; ?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                                   <?php 
                                                      }
                                                    }
                                                    ?>
                                          </div>
                                              </div>
                                            </div>
                                          </div>

                                              <div class="row">
                                              <div class="col-md-5">
                                              <div class="form-group">
                                                  <label for="exampleInputEmail1">Supervisor Name</label>
                                                  <div class="input-group">
                                                      <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                      </div>
                                                  <input type="text" class="form-control" id="custName" name="custName" value="<?php echo ( $this->session->userdata('fname')); echo' '; echo ( $this->session->userdata('lname'));?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                              </div>
                                              </div>
                                              </div>

                                              <div class="col-md-6">
                                              <div class="form-group">
                                                    <label>Order Date</label>
                                                    <div class="input-group">
                                                      <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                      </div>
                                                      <?php $date = date("Y-m-d"); ?>
                                                      <input type="date" class="form-control pull-right" name="orDate" value="<?php echo $date; ?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                                    </div>
                                                    <!-- /.input group -->
                                                  </div>
                                                </div>
                                              </div>

                                          
                                        <div class="table-responsive">
                                          <span id="error"></span>
                                          <table class="table table-bordered" id="dynamic_field">
                                            <tr>
                                              <th width="20%"> Quantity </th>
                                              <th width="70%"> Description </th>
                                              <th width="10%"><button type="button" name="add" id="add" class="btn btn-success">+</button></th>

                                              <!-- <th> Unit </th> -->
                                            
                                            </tr>
                                            
                                          </table>
                                       
                                        </div>
                                          </div>
                                        </div> <!-- BOX-BODY -->
                                      <div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancel</button>
                                         <button type="submit"  class="btn btn-success sendbutton" name="submit" id="submit" disabled="true"><i class="fa fa-plus"></i> Add </button>
                                          <!-- <script>
                                            $(document).ready(function(){
                                                $('.sendButton').attr('disabled',true);
                                                $('#supply').change(function(){
                                                    if($(this).val().length !=0)
                                                        $(document).ready(function(){
                                                        $('.sendButton').attr('disabled',true);
                                                        $('#quant').keyup(function(){
                                                            if($(this).val().length !=0)
                                                                $('.sendButton').attr('disabled', false);            
                                                            else
                                                                $('.sendButton').attr('disabled',true);
                                                        })
                                                    });            
                                                    else
                                                        $('.sendButton').attr('disabled',true);
                                                })
                                            });
                                            $(document).ready(function(){
                                                $('.sendButton').attr('disabled',true);
                                                $('#quant').keyup(function(){
                                                    if($(this).val().length !=0)
                                                        $(document).ready(function(){
                                                        $('.sendButton').attr('disabled',true);
                                                        $('#supply').change(function(){
                                                            if($(this).val().length !=0)
                                                                $('.sendButton').attr('disabled', false);            
                                                            else
                                                                $('.sendButton').attr('disabled',true);
                                                        })
                                                    });            
                                                    else
                                                        $('.sendButton').attr('disabled',true);
                                                })
                                            });
                                          </script> -->
                                        <!-- <input type="submit" class="btn btn-primary" name="addOrder" value="Add Order" />
                                      </div>
                                    </div>
                                    <!-- /.modal-content -->
                                  </div>
                                  <!-- /.modal-dialog -->
                                </div>
            <!-- end of Items FORM -->
                            </div>
              </form>
              </th>
                        
              
                    </tr>
                </table>      
            </div>
            <!-- /.box-header -->
                   <div class="box-body">
                   <table id="example" class="table table-bordered table-striped">
                      <?php
                        $conn =mysqli_connect("localhost","root","", "itproject") or die('Error connecting to MySQL server.');
                        $sql = "SELECT * FROM inventory_order JOIN inventory_order_supplies USING(inventory_order_uniq_id) WHERE inventory_order_name ='".$this->session->userdata('fname').' '.$this->session->userdata('lname')."' AND inventory_order_status = 'Pending' GROUP BY inventory_order_id ";
                        $result = $conn->query($sql);    
                      ?>
                      <thead>
                          <tr>
                              <th style="display: none;">ID </th>
                              <th>Order Date</th>
                              <th>Supervisor Name</th>
                              <th>Department</th>
                              <th>Status</th>
                              <th>Remarks</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) { ?>
                            <tr>
                              <td style="display: none;"><?php echo $row["inventory_order_supplies_id"];?></td>
                              <td><?php echo $row["inventory_order_created_date"]; ?></td>
                              <td><?php echo $row["inventory_order_name"]; ?></td>
                              <td><?php echo $row["inventory_order_dept"]; ?></td>
                              <td><?php echo $row["inventory_order_status"]; ?></td>
                              <td><?php echo $row["inventory_order_remarks"]; ?></td>
                              <td><div class="btn-group">
                            <?php if($row['inventory_order_status'] == 'Pending'){ ?>
                            <button type="button" id="getView" class="btn btn-info btn-xs" data-toggle="modal" data-target="#viewModal" data-id="<?php echo $row["inventory_order_id"]; ?>"><i class="glyphicon glyphicon-search"></i> View</button></div>  
                            <div class="btn-group">
                            <button type="button" id="getEdit" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewModal" data-id="<?php echo $row["inventory_order_id"]; ?>"><i class="glyphicon glyphicon-edit"></i> Update</button>
                            <?php } ?>
                        </div></td>
                            </tr>
                          <?php 
                              }
                            }
                          ?>
                        </tbody>
                      <tfoot>
                        <tr>
                              <th style="display: none;">ID</th>
                              <th>Order Date</th>
                              <th>Supervisor Name</th>
                              <th>Department</th>
                              <th>Remarks</th>
                              <th>Status</th>
                              <th>Action</th>
                          </tr>
                      </tfoot>
            </table>
            </div>

            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; AMDC INVENTORY MANAGEMENT SYSTEM. </strong> All rights
    reserved.
  </footer>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<style>
/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 50px;
  height: 24px;
}

/* Hide default HTML checkbox */
.switch input {display:none;}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 16px;
  width: 16px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 24px;
}

.slider.round:before {
  border-radius: 50%;
}    

table#addItem, tr.no_border td {
  border: 0;
}
</style>
<!-- jQuery 3
-->
<!-- DataTables
<script src="../assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script> -->
<!-- SlimScroll -->
<script src="../assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- Select2 -->
<script src="../assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="../assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>

<!-- bootstrap datepicker -->
<script src="../assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="../assets/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>
    <!-- bootstrap time picker -->
<script src="../assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>

<!--lockscreen              -->
<script>
 setTimeout(onUserInactivity, 1000 * 1800)
function onUserInactivity() {
  <?php unset($_SESSION['logged_in']);
  if(!isset($_SESSION['logged_in'])) { ?>
    window.location.href = "lockscreen"
   <?php } ?>
} 
</script>


<script>
$(document).ready(function(){
  var postURL = "order/addItem";
  var i=1;
  var supplyDrop = <?php echo(json_encode(supply_dropdown($connect))); ?>;
  // var unitDrop = <?php // echo(json_encode(unit_measure($connect))); ?>;
  $('#add').click(function(){
    // document.getElementById('submit').setAttribute("disabled", "false");
    if(i < 10){
    i++;
    $('#dynamic_field').append('<tr id="row'+i+'"></td> <td><input id="quant" type="text" name="number[]" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" required /></td><td><select class="form-control select2" name="neym[]" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;"><option value=""></option> '+supplyDrop+' </select></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">x</button></td></tr>');

    $("select.select2").change(function () {
    $("select.select2 option[value='" + $(this).data('index') + "']").prop('disabled', false);
    $(this).data('index', this.value);
    $("select.select2 option[value='" + this.value + "']:not([value=''])").prop('disabled', true);
    $(this).find("option[value='" + this.value + "']:not([value=''])").prop('disabled', false);
  });
}

  });
  
  $(document).on('click', '.btn_remove', function(){
    var button_id = $(this).attr("id"); 
    $('#row'+button_id+'').remove();
  });
  $(document).on('click', '#add', function(){
    $('.sendButton').attr('disabled',false);
  });
  
  $('#submit').click(function(){    
    $.ajax({
      url: postURL,
      method:"POST",
      data:$('#add_name').serialize(),
      type: 'json',
      success:function(data)
      {
          i=1;
                  $('.dynamic-added').remove();
                  $('#add_name')[0].reset();
            alert('Record Inserted Successfully.');
            location.reload();
      }
    });
  });
  
});
</script> 

<script>
  $("select.select2").change(function () {
    $("select.select2 option[value='" + $(this).data('index') + "']").prop('disabled', false);
    $(this).data('index', this.value);
    $("select.select2 option[value='" + this.value + "']:not([value=''])").prop('disabled', true);
    $(this).find("option[value='" + this.value + "']:not([value=''])").prop('disabled', false);
  });
</script>       
              
<script>
//date and time
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format : 'yyyy-mm-dd'
    })

  })
</script>

<script>
      $(document).ready(function() {
    var printCounter = 0;

    // $('a[data-toggle="tab"]').on( 'shown.bs.tab', function (e) {
    //     $.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust();
    // } );
     
    // $('table.table').DataTable( {
    //     scrollY:        200,
    //     scrollCollapse: true,
    //     paging:         false
    // } );
 
    $('#example').DataTable( {
        order : [[ 0, 'desc' ]],
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                exportOptions: {
                    columns: ':visible'
                },
                messageTop: function () {
                    printCounter++;
 
                    if ( printCounter === 1 ) {
                        return '<h4><img src="../assets/dist/img/AMDC.png" height="60px" width="200px"><center>Order</center></h4>';
                    }
                    
                },
                messageBottom: null
            },
        'colvis'
         ] //,
        // columnDefs: [ {
        //     targets: -1,
        //     visible: false
        // } ]
    } );

} );
    </script>

<!--create modal dialog for display detail info for edit on button cell click-->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div id="content-data"></div>
            </div>
        </div>

        <div class="modal fade" id="viewModal" role="dialog">
            <div class="modal-dialog">
                <div id="view-data"></div>
            </div>
        </div>

     <script>
        $(document).on('click','#getView',function(e){
            e.preventDefault();
            var per_id=$(this).data('id');
            //alert(per_id);
            $('#view-data').html('');
            $.ajax({
                url:'order/viewOrder',
                type:'POST',
                data:'id='+per_id,
                dataType:'html'
            }).done(function(data){
                $('#view-data').html('');
                $('#view-data').html(data);
            }).final(function(){
                $('#view-data').html('<p>Error</p>');
            });
        });
    </script>


    <script>
        $(document).on('click','#getEdit',function(e){
            e.preventDefault();
            var per_id=$(this).data('id');
            //alert(per_id);
            $('#view-data').html('');
            $.ajax({
                url:'order/editOrder',
                type:'POST',
                data:'id='+per_id,
                dataType:'html'
            }).done(function(data){
                $('#view-data').html('');
                $('#view-data').html(data);
            }).final(function(){
                $('#view-data').html('<p>Error</p>');
            });
        });
    </script>
</body>
</html>
<!-- <?php
    // if($result_update && $result_update1 && $result_update2 && $result_update3 && $result_update4 && $result_update5 && $result_update6 && $result_update7 && $result_update8 && $result_update9){
    //     $conn = mysqli_connect("localhost","root","");
    //     $datetoday = date('Y\-m\-d\ H:i:s A');
    //     mysqli_select_db($conn, "itproject");
    //     $notif = "insert into logs (log_date,log_description,user,module) VALUES ('".$datetoday."','".$new_supplyDescription." has been edited','".$this->session->userdata('fname')." ".$this->session->userdata('lname')."','".$this->session->userdata('type')."')";
    //     $result = $conn->query($notif);
    //     echo '<script>window.location.href="order"</script>';
    // }
    // else{
    //     echo '<script>alert("Update Failed")</script>';
    // } // END OF MEDICAL EDIT
?> -->
<?php 
  $con=mysqli_connect('localhost','root','','itproject');
  if(isset($_POST['update'])){
       $connect = new PDO("mysql:host=localhost;dbname=itproject", "root", "");

       for($count = 0; $count < count($_POST["ID"]); $count++)
       {  
        $query2 = "UPDATE inventory_order_supplies SET supply_name=:supply_name, quantity=:quantity, unit_name=:unit_name WHERE inventory_order_supplies_id=:inventory_order_supplies_id ";
        $statement2 = $connect->prepare($query2);
        $statement2->execute(
         array(
          ':inventory_order_supplies_id' => $_POST["ID"][$count], 
          ':supply_name' => $_POST["supplyDesc"][$count],
          ':quantity'  => $_POST["qty"][$count],
          ':unit_name'  => $_POST["unitName"][$count]
         )
        );
       }

       for($count = 0; $count < count($_POST["number"]); $count++)
       {  
        $query = "INSERT INTO inventory_order_supplies
        (inventory_order_uniq_id, supply_name, quantity) 
        VALUES (:inventory_order_uniq_id, :supply_name, :quantity)";
        $statement = $connect->prepare($query);
        $statement->execute(
         array(
          ':inventory_order_uniq_id'   => $_POST["uniq_ID"],
          ':quantity'  => $_POST["number"][$count], 
          ':supply_name' => $_POST["neym"][$count]
         )
        );
       }
       $result = $statement->fetchAll();
       $result2 = $statement2->fetchAll();
       if($result && $result2){
        echo '<script>window.location.href="orders"</script>';
       }else {
        echo '<script>alert("Update Failed")</script>';
       }
       $datetoday = date('Y\-m\-d\ H:i:s A');
             $conn =mysqli_connect("localhost","root","");
             mysqli_select_db($conn, "itproject");
             $notif1 = "insert into logs (log_date,log_description,user,module) VALUES ('".$datetoday."','".$this->session->userdata('type')." ".$this->session->userdata('fname')." ".$this->session->userdata('lname')." has updated a request order','".$this->session->userdata('fname')." ".$this->session->userdata('lname')."','".$this->session->userdata('type')."')";
             $res1 = $conn->query($notif1);
      
  }
?>

<script>
        $(document).on('click','#getAdd',function(e){
            e.preventDefault();
            var per_id=$(this).data('id');
            //alert(per_id);
            $('#content-data').html('');
            $.ajax({
                url:'dashboard/addUser',
                type:'POST',
                data:'id='+per_id,
                dataType:'html'
            }).done(function(data){
                $('#content-data').html('');
                $('#content-data').html(data);
            }).final(function(){
                $('#content-data').html('<p>Error</p>');
            });
        });
    </script>
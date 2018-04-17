<?php
//index.php

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

function unit_measure($connect)
{ 
 $output = '';
 $query = "SELECT * FROM unit_of_measure ORDER BY unit_name ASC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["unit_name"].'">'.$row["unit_name"].'</option>';
 }
 return $output;
}

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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <!-- daterange picker -->
  <link rel="stylesheet" href="../assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../assets/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../assets/bower_components/select2/dist/css/select2.min.css">
  <!-- datatable lib -->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
 
  <link rel="stylesheet" href="../assets/table/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../assets/table/buttons.dataTables.min.css">

    <script src="../assets/table/jquery-1.12.4.js"></script>
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
              <span class="hidden-xs">Hi! <?php echo ( $this->session->userdata('fname'));?> <?php echo ( $this->session->userdata('lname'));?></span>     
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../assets/dist/img/user5-128x128.png" class="img-circle" alt="User Image">

                <p>
                 <span><?php echo ( $this->session->userdata('fname'));?>  <?php echo ( $this->session->userdata('lname'));?></span>
                </p>
              </li>
              <!-- Menu Footer-->
              <!-- Menu Footer-->
              <li class="user-footer">
				<div class="pull-left">
                      <button type="submit" class="btn btn-default btn-flat" data-toggle="modal" data-target="#editprof">Edit Profile</button>
                </div>
                <div class="pull-right">
                   <a href="<?php echo '../logout' ?>"  class="btn btn-default btn-flat">Sign out</a>
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
                    
                       <div class="form-group">
                          <label for="exampleInputEmail1">Username</label>
                          <input type="text" class="form-control" name="username" id="username" value="<?php echo $row['username'] ?>" required />
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">First Name</label>
                          <input type="name" class="form-control" name="fname" id="fname" value="<?php echo $row['fname'] ?>" required />
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Last Name</label>
                          <input type="name" class="form-control" name="lname" id="lname" value="<?php echo $row['lname'] ?>" required />
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Contact Number</label>
                          <input type="number" class="form-control" name="user_contact" id="user_contact" value="<?php echo $row['user_contact'] ?>" required />
                        </div>
                        <div class="form-group">
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
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email</label>
                          <input type="email" class="form-control" name="user_email" id="user_email" value="<?php echo $row['user_email'] ?>" required />
                        </div>
                    
                          <?php 
                              }
                            }
                          ?>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancel</button>
                <button type="submit" class="btn btn-success" name="addUser"><i class="fa fa-save"></i> Save</button>
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
     	<li class="active treeview">
          <a href="#">
            <i class="fa fa-cubes"></i> <span>Inventory</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
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
		  <li class="active"><a href="<?php echo '' ?>"><i class="fa fa-dollar"></i><span>Orders</span></a></li>

          </ul>
        </li>
        
    <!-- SUPPLIERS MENU -->
        <li>
          <a href="<?php echo 'suppliers' ?>">
            <i class="fa fa-user"></i> <span>Suppliers</span>
          </a>
        </li>
   
		<!-- DEPARTMENTS MENU -->
        <li>
          <a href="<?php echo 'departments' ?>">
            <i class="fa fa-building"></i> <span>Departments</span>
          </a>
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
            <i class="fa fa-dollar"></i> <b>Orders</b>
        <!-- <small>Supplies</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Dashboard</li>
        <li class="active"><i class="fa fa-dollar"></i> Orders</li>
      </ol>
    </section>

       <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
                <table style="float:right;">
                    <tr>
                        <th><button type="submit" class="btn btn-primary btn-block btn-success" data-toggle="modal" data-target="#modal-info"><i class=" fa fa-plus">Add Order</i></button>
            
                       <form id="insert_form" method="post" action="order/addOrder">
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
                                                  <label for="exampleInputEmail1">Customer Name</label>
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
                                          <table class="table table-bordered" id="item_table">
                                            <tr>
                                              <th> Item Description </th>
                                              <th> Unit of Measure</th>
                                              <th> Quantity </th>
                                            </tr>
                                            <tr>

                                              <td width="250"><select class="form-control select2 inventory_order_supply_name" name="supply_name" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                                    <option></option>
                                                    <?php echo supply_dropdown($connect);?>
                                                  </select>
                                              </td>

                                              <td width="100"><select class="form-control select2 inventory_order_unit" name="unit_name" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                                    <option></option>
                                                    <?php echo unit_measure($connect);?>
                                                  </select>
                                              </td>
                                            
                                            <td width="50"><input type="text" name="quantity" class="form-control inventory_order_quantity" min="0" style="width: 60px; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;"  /> </td>
                                            </tr>

                                             <tr>

                                              <td width="250"><select class="form-control select2 inventory_order_supply_name" name="supply_name2" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                                    <option></option>
                                                    <?php echo supply_dropdown($connect);?>
                                                  </select>
                                              </td>

                                              <td width="100"><select class="form-control select2 inventory_order_unit" name="unit_name2" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                                    <option></option>
                                                    <?php echo unit_measure($connect);?>
                                                  </select>
                                              </td>
                                            
                                            <td width="50"><input type="text" name="quantity2" class="form-control inventory_order_quantity" min="0" style="width: 60px; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;"  /> </td>
                                            </tr>

                                            <tr>

                                              <td width="250"><select class="form-control select2 inventory_order_supply_name" name="supply_name3" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                                    <option></option>
                                                    <?php echo supply_dropdown($connect);?>
                                                  </select>
                                              </td>

                                              <td width="100"><select class="form-control select2 inventory_order_unit" name="unit_name3" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                                    <option></option>
                                                    <?php echo unit_measure($connect);?>
                                                  </select>
                                              </td>
                                            
                                            <td width="50"><input type="text" name="quantity3" class="form-control inventory_order_quantity" min="0" style="width: 60px; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;"  /> </td>
                                            </tr>

                                            <tr>

                                              <td width="250"><select class="form-control select2 inventory_order_supply_name" name="supply_name4" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                                    <option></option>
                                                    <?php echo supply_dropdown($connect);?>
                                                  </select>
                                              </td>

                                              <td width="100"><select class="form-control select2 inventory_order_unit" name="unit_name4" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                                    <option></option>
                                                    <?php echo unit_measure($connect);?>
                                                  </select>
                                              </td>
                                            
                                            <td width="50"><input type="text" name="quantity4" class="form-control inventory_order_quantity" min="0" style="width: 60px; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;"  /> </td>
                                            </tr>

                                            <tr>

                                              <td width="250"><select class="form-control select2 inventory_order_supply_name" name="supply_name5" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                                    <option></option>
                                                    <?php echo supply_dropdown($connect);?>
                                                  </select>
                                              </td>

                                              <td width="100"><select class="form-control select2 inventory_order_unit" name="unit_name5" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                                    <option></option>
                                                    <?php echo unit_measure($connect);?>
                                                  </select>
                                              </td>
                                            
                                            <td width="50"><input type="text" name="quantity5" class="form-control inventory_order_quantity" min="0" style="width: 60px; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;"  /> </td>
                                            </tr>

                                            <tr>

                                              <td width="250"><select class="form-control select2 inventory_order_supply_name" name="supply_name6" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                                    <option></option>
                                                    <?php echo supply_dropdown($connect);?>
                                                  </select>
                                              </td>

                                              <td width="100"><select class="form-control select2 inventory_order_unit" name="unit_name6" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                                    <option></option>
                                                    <?php echo unit_measure($connect);?>
                                                  </select>
                                              </td>
                                            
                                            <td width="50"><input type="text" name="quantity6" class="form-control inventory_order_quantity" min="0" style="width: 60px; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;"  /> </td>
                                            </tr>

                                            <tr>

                                              <td width="250"><select class="form-control select2 inventory_order_supply_name" name="supply_name7" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                                    <option></option>
                                                    <?php echo supply_dropdown($connect);?>
                                                  </select>
                                              </td>

                                              <td width="100"><select class="form-control select2 inventory_order_unit" name="unit_name7" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                                    <option></option>
                                                    <?php echo unit_measure($connect);?>
                                                  </select>
                                              </td>
                                            
                                            <td width="50"><input type="text" name="quantity7" class="form-control inventory_order_quantity" min="0" style="width: 60px; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;"  /> </td>
                                            </tr>

                                            <tr>

                                              <td width="250"><select class="form-control select2 inventory_order_supply_name" name="supply_name8" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                                    <option></option>
                                                    <?php echo supply_dropdown($connect);?>
                                                  </select>
                                              </td>

                                              <td width="100"><select class="form-control select2 inventory_order_unit" name="unit_name8" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                                    <option></option>
                                                    <?php echo unit_measure($connect);?>
                                                  </select>
                                              </td>
                                            
                                            <td width="50"><input type="text" name="quantity8" class="form-control inventory_order_quantity" min="0" style="width: 60px; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;"  /> </td>
                                            </tr>


                                            <tr>

                                              <td width="250"><select class="form-control select2 inventory_order_supply_name" name="supply_name9" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                                    <option></option>
                                                    <?php echo supply_dropdown($connect);?>
                                                  </select>
                                              </td>

                                              <td width="100"><select class="form-control select2 inventory_order_unit" name="unit_name9" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                                    <option></option>
                                                    <?php echo unit_measure($connect);?>
                                                  </select>
                                              </td>
                                            
                                            <td width="50"><input type="text" name="quantity9" class="form-control inventory_order_quantity" min="0" style="width: 60px; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;"  /> </td>
                                            </tr>

                                            <tr>

                                              <td width="250"><select class="form-control select2 inventory_order_supply_name" name="supply_name10" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                                    <option></option>
                                                    <?php echo supply_dropdown($connect);?>
                                                  </select>
                                              </td>

                                              <td width="100"><select class="form-control select2 inventory_order_unit" name="unit_name10" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                                    <option></option>
                                                    <?php echo unit_measure($connect);?>
                                                  </select>
                                              </td>
                                            
                                            <td width="50"><input type="text" name="quantity10" class="form-control inventory_order_quantity" min="0" style="width: 60px; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;"  /> </td>
                                            </tr>
                                          </table>
                                       
                                        </div>
                                          </div>
                                        </div> <!-- BOX-BODY -->
                                      <div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancel</button>
                                         <button type="submit" class="btn btn-success" name="addOrder"><i class="fa fa-plus"></i> Add </button>
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
                        $sql = "SELECT * FROM inventory_order JOIN inventory_order_supplies USING(inventory_order_uniq_id) WHERE inventory_order_name ='".$this->session->userdata('fname').' '.$this->session->userdata('lname')."' GROUP BY inventory_order_id ";
                        $result = $conn->query($sql);    
                      ?>
                      <thead>
                          <tr>
                              <th>Order Date</th>
                              <th>Customer Name</th>
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
                              <td><?php echo $row["inventory_order_created_date"]; ?></td>
                              <td><?php echo $row["inventory_order_name"]; ?></td>
                              <td><?php echo $row["inventory_order_dept"]; ?></td>
                              <td><?php echo $row["inventory_order_status"]; ?></td>
                              <td><?php echo $row["inventory_order_remarks"]; ?></td>
                              <td><div class="btn-group">
                            <?php if($row['inventory_order_status'] == 'Issued') { ?>
                            <button type="button" id="getView" class="btn btn-info btn-xs" data-toggle="modal" data-target="#viewModal" data-id="<?php echo $row["inventory_order_id"]; ?>"><i class="glyphicon glyphicon-search"></i> View</button></div>
                            <?php }else{ ?>
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
                              <th>Order Date</th>
                              <th>Customer Name</th>
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
<script src="../assets/bower_components/jquery/dist/jquery.min.js"></script>-->
<!-- Bootstrap 3.3.7 -->
<script src="../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
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

<!--lockscreen							-->
<script>
 setTimeout(onUserInactivity, 1000 * 120)
function onUserInactivity() {
  <?php unset($_SESSION['logged_in']);
  if(!isset($_SESSION['logged_in'])) { ?>
    window.location.href = "lockscreen"
   <?php } ?>
} 
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
      // $(function () {
      //   $('#example').DataTable()
      //   $('#example1').DataTable({
      //     'paging'      : true,
      //     'lengthChange': false,
      //     'searching'   : false,
      //     'ordering'    : true,
      //     'info'        : true,
      //     'autoWidth'   : true
      //   })
      // })

      $(document).ready(function() {
    var printCounter = 0;
 
    // Append a caption to the table before the DataTables initialisation
    //$('#example').append('<caption style="caption-side: bottom">A fictional company\'s staff table.</caption>');
 
    $('#example').DataTable( {
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
<?php
$con=mysqli_connect('localhost','root','','itproject') or die('Error connecting to MySQL server.');
$pdo = new PDO("mysql:host=localhost;dbname=itproject","root","");
if(isset($_POST['ordEdit'])){
    $new_uid = mysqli_real_escape_string($con,$_POST['txtuniqid']);


    $new_id = mysqli_real_escape_string($con,$_POST['txtiosid0']);
    $new_description = mysqli_real_escape_string($con,$_POST['txtdescription0']);
    $new_unit = mysqli_real_escape_string($con,$_POST['txtunit0']);
    $new_quantity = mysqli_real_escape_string($con,$_POST['txtquantity0']);

    $new_id1 = mysqli_real_escape_string($con,$_POST['txtiosid1']);
    $new_description1 = mysqli_real_escape_string($con,$_POST['txtdescription1']);
    $new_unit1 = mysqli_real_escape_string($con,$_POST['txtunit1']);
    $new_quantity1 = mysqli_real_escape_string($con,$_POST['txtquantity1']);

    $new_id2 = mysqli_real_escape_string($con,$_POST['txtiosid2']);
    $new_description2 = mysqli_real_escape_string($con,$_POST['txtdescription2']);
    $new_unit2 = mysqli_real_escape_string($con,$_POST['txtunit2']);
    $new_quantity2 = mysqli_real_escape_string($con,$_POST['txtquantity2']);

    $new_id3 = mysqli_real_escape_string($con,$_POST['txtiosid3']);
    $new_description3 = mysqli_real_escape_string($con,$_POST['txtdescription3']);
    $new_unit3 = mysqli_real_escape_string($con,$_POST['txtunit3']);
    $new_quantity3 = mysqli_real_escape_string($con,$_POST['txtquantity3']);

    $new_id4 = mysqli_real_escape_string($con,$_POST['txtiosid4']);
    $new_description4 = mysqli_real_escape_string($con,$_POST['txtdescription4']);
    $new_unit4 = mysqli_real_escape_string($con,$_POST['txtunit4']);
    $new_quantity4 = mysqli_real_escape_string($con,$_POST['txtquantity4']);


    $new_id5 = mysqli_real_escape_string($con,$_POST['txtiosid5']);
    $new_description5 = mysqli_real_escape_string($con,$_POST['txtdescription5']);
    $new_unit5 = mysqli_real_escape_string($con,$_POST['txtunit5']);
    $new_quantity5 = mysqli_real_escape_string($con,$_POST['txtquantity5']);

    $new_id6 = mysqli_real_escape_string($con,$_POST['txtiosid6']);
    $new_description6 = mysqli_real_escape_string($con,$_POST['txtdescription6']);
    $new_unit6 = mysqli_real_escape_string($con,$_POST['txtunit6']);
    $new_quantity6 = mysqli_real_escape_string($con,$_POST['txtquantity6']);

    $new_id7 = mysqli_real_escape_string($con,$_POST['txtiosid7']);
    $new_description7 = mysqli_real_escape_string($con,$_POST['txtdescription7']);
    $new_unit7 = mysqli_real_escape_string($con,$_POST['txtunit7']);
    $new_quantity7 = mysqli_real_escape_string($con,$_POST['txtquantity7']);

    $new_id8 = mysqli_real_escape_string($con,$_POST['txtiosid8']);
    $new_description8 = mysqli_real_escape_string($con,$_POST['txtdescription8']);
    $new_unit8 = mysqli_real_escape_string($con,$_POST['txtunit8']);
    $new_quantity8 = mysqli_real_escape_string($con,$_POST['txtquantity8']);

    $new_id9 = mysqli_real_escape_string($con,$_POST['txtiosid9']);
    $new_description9 = mysqli_real_escape_string($con,$_POST['txtdescription9']);
    $new_unit9 = mysqli_real_escape_string($con,$_POST['txtunit9']);
    $new_quantity9 = mysqli_real_escape_string($con,$_POST['txtquantity9']);    

          $sqlupdate = " UPDATE inventory_order_supplies SET supply_name = '$new_description', unit_name = '$new_unit' ,quantity = '$new_quantity' WHERE inventory_order_supplies_id = '$new_id' ";
          $result_update = mysqli_query($con,$sqlupdate);
         
           $sqlupdate1 = " UPDATE inventory_order_supplies SET supply_name = '$new_description1', unit_name = '$new_unit1' ,quantity = '$new_quantity1' WHERE inventory_order_supplies_id = '$new_id1' ";
          $result_update1 = mysqli_query($con,$sqlupdate1);

          $sqlupdate2 = " UPDATE inventory_order_supplies SET supply_name = '$new_description2', unit_name = '$new_unit2' ,quantity = '$new_quantity2' WHERE inventory_order_supplies_id = '$new_id2' ";
          $result_update2 = mysqli_query($con,$sqlupdate2);

          $sqlupdate3 = " UPDATE inventory_order_supplies SET supply_name = '$new_description3', unit_name = '$new_unit3' ,quantity = '$new_quantity3' WHERE inventory_order_supplies_id = '$new_id3' ";
          $result_update3 = mysqli_query($con,$sqlupdate3);

          $sqlupdate4 = " UPDATE inventory_order_supplies SET supply_name = '$new_description4', unit_name = '$new_unit4' ,quantity = '$new_quantity4' WHERE inventory_order_supplies_id = '$new_id4' ";
          $result_update4 = mysqli_query($con,$sqlupdate4);

          $sqlupdate5 = " UPDATE inventory_order_supplies SET supply_name = '$new_description5', unit_name = '$new_unit5' ,quantity = '$new_quantity5' WHERE inventory_order_supplies_id = '$new_id5' ";
          $result_update5 = mysqli_query($con,$sqlupdate5);

          $sqlupdate6 = " UPDATE inventory_order_supplies SET supply_name = '$new_description6', unit_name = '$new_unit6' ,quantity = '$new_quantity6' WHERE inventory_order_supplies_id = '$new_id6' ";
          $result_update6 = mysqli_query($con,$sqlupdate6);

          $sqlupdate7 = " UPDATE inventory_order_supplies SET supply_name = '$new_description7', unit_name = '$new_unit7' ,quantity = '$new_quantity7' WHERE inventory_order_supplies_id = '$new_id7' ";
          $result_update7 = mysqli_query($con,$sqlupdate7);

          $sqlupdate8 = " UPDATE inventory_order_supplies SET supply_name = '$new_description8', unit_name = '$new_unit8' ,quantity = '$new_quantity8' WHERE inventory_order_supplies_id = '$new_id8' ";
          $result_update8 = mysqli_query($con,$sqlupdate8);

          $sqlupdate9 = " UPDATE inventory_order_supplies SET supply_name = '$new_description9', unit_name = '$new_unit9' ,quantity = '$new_quantity9' WHERE inventory_order_supplies_id = '$new_id9' ";
          $result_update9 = mysqli_query($con,$sqlupdate9);         

    if($result_update && $result_update1 && $result_update2 && $result_update3 && $result_update4 && $result_update5 && $result_update6 && $result_update7 && $result_update8 && $result_update9){
        $conn = mysqli_connect("localhost","root","");
        $datetoday = date('Y\-m\-d\ H:i:s A');
        mysqli_select_db($conn, "itproject");
        $notif = "insert into logs (log_date,log_description,user,module) VALUES ('".$datetoday."','".$new_supplyDescription." has been edited','".$this->session->userdata('fname')." ".$this->session->userdata('lname')."','".$this->session->userdata('type')."')";
        $result = $conn->query($notif);
        echo '<script>window.location.href="order"</script>';
    }
    else{
        echo '<script>alert("Update Failed")</script>';
    }
} // END OF MEDICAL EDIT
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
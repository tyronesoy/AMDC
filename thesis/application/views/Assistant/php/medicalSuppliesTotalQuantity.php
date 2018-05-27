<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$connect = new PDO("mysql:host=localhost;dbname=itproject", "root", "");

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

function supplier($connect)
{ 
 $output = '';
 $query = "SELECT * FROM suppliers ORDER BY company_name ASC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["supplier_id"].'">'.$row["company_name"].'</option>';
 }
 return $output;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Assistant | Medical Supplies Total Quantity</title>
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
<!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />-->
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
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../dashboard" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>MDC</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>AMDC</b> Inc.</span>
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
                          document.getElementById("demo").innerHTML = d;
                        </script>
                    </a>
                </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <!--            BELL START-->
            <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
                <?php
                $conn =mysqli_connect("localhost","root","", "itproject") or die('Error connecting to MySQL server.');
                $pdo = new PDO("mysql:host=localhost;dbname=itproject","root","");
                $dtoday = date('Y\-m\-d\ H:i:s A');
                $date_select = date('Y\-m\-d\ H:i:s A', strtotime('-3 days') ) ;//minus three days
                $sql6 = "SELECT COUNT(*) AS total from logs where ((log_date BETWEEN '".$date_select."' AND '".$dtoday."') AND log_status = 1) AND (log_description like '%order%' OR log_description like '%profile%') <> (log_description like '%accepted%' OR log_description like '%declined%')";
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
                    $sql7 = "select log_id,log_date,log_description from logs where ((log_date BETWEEN '".$date_select."' AND '".$dtoday."') AND log_status = 1) AND (log_description like '%order%' OR log_description like '%profile%') <> (log_description like '%accepted%' OR log_description like '%declined%')";
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
                            <td><small><a display="block" style="color:black" href="<?php echo 'departmentsOrder' ?>"><?php echo $row["log_description"];?></a></small></td>
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
                        <!--            FLAG START-->
            <?php
                        $conn =mysqli_connect("localhost","root","");
                        mysqli_select_db($conn, "itproject");
                        $sql32 = "SELECT value2 from defaults where attribute = 'expirerange' LIMIT 1";
                        $result32 = $conn->query($sql32);
                          if ($result32->num_rows > 0) {
                            while($row = $result32->fetch_assoc()) {
                                $daysvalue = strtotime($row['value2']);
                                $num1 = 0;
                            }
                          }
                    ?>
                    <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php
                $conn =mysqli_connect("localhost","root","", "itproject") or die('Error connecting to MySQL server.');
                $pdo = new PDO("mysql:host=localhost;dbname=itproject","root","");
                $dtoday = date("Y/m/d");
                $date_futr = date("Y-m-d", strtotime('+30 days') ) ;
                $date_past = date("Y-m-d", strtotime('-1 year') ) ;
                $date_select = date("Y-m-d", strtotime('-3 days') ) ;//minus three days
                $sql5 = "SELECT COUNT(*) AS total from supplies where accounted_for = 'N' group by supply_description having SUM(quantity_in_stock) < MAX(reorder_level) order by SUM(quantity_in_stock)/MAX(reorder_level)";
                $number1 = $conn->query($sql5);
                if ($number1->num_rows > 0) {
                        while($row = $number1->fetch_assoc()) {
                            $num1 = $row["total"];
                        }
                }
                $sqlfive = "SELECT COUNT(*) AS total from supplies where (expiration_date BETWEEN '".$dtoday."' AND '".$date_futr."')";
                $number2 = $conn->query($sqlfive);
                if ($number2->num_rows > 0) {
                        while($row = $number2->fetch_assoc()) {
                            $num2 = $row["total"];
                        }
                }
                $sqlV = "SELECT COUNT(*) AS total from supplies where (expiration_date BETWEEN '".$date_past."' AND '".$dtoday."') AND soft_deleted = 'N'";
                $number3 = $conn->query($sqlV);
                if ($number3->num_rows > 0) {
                        while($row = $number3->fetch_assoc()) {
                            $num3 = $row["total"];
                        }
                }
                $flagtotal = $num1 + $num2 + $num3;
                ?>
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger"><?php echo $flagtotal ?></span>
            </a>
            <ul class="dropdown-menu">
               <?php
                    $conn =mysqli_connect("localhost","root","");
                    mysqli_select_db($conn, "itproject");
                        $sql2 = "select supply_description,SUM(quantity_in_stock) as `totalstock`,MAX(reorder_level) as `maximumreorder`,accounted_for as `expired` from supplies where accounted_for = 'N' group by supply_description having SUM(quantity_in_stock) < MAX(reorder_level) order by SUM(quantity_in_stock)/MAX(reorder_level)";
                    $result2 = $conn->query($sql2);
                  ?>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <!-- Task item reorder levels-->
                    <hr style="padding:0;margin:0;border-width:4px;border-color:black;">
                    <h5 style="padding:3px;margin:3px;">Items below reorder level</h5>
                    <hr style="padding:0;margin:0;border-width:4px;border-color:black;">
                    <li>
                    <?php 
                      if ($result2->num_rows > 0) {
                        while($row = $result2->fetch_assoc()) { ?>
                          <?php echo $row["supply_description"]; 
                                $newvalue = $row["totalstock"] * 100;
                                $percentage = $newvalue / $row["maximumreorder"];
                          ?>
                        <!--Reorder level meter-->
                      <?php
                      if($percentage < 25){
                      ?>
                      <small class="pull-right"><?php echo number_format($percentage) ?>%</small>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: <?php echo $percentage ?>%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                        </div>
                      </div>
                      <?php
                      }else if($percentage < 50){?>
                      <small class="pull-right"><?php echo number_format($percentage) ?>%</small>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: <?php echo $percentage ?>%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                        </div>
                      </div>
                      <?php
                      }else if($percentage < 100){?>
                      <small class="pull-right"><?php echo number_format($percentage) ?>%</small>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: <?php echo $percentage ?>%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                        </div>
                      </div>
                    <?php
                      }
                    }
                    }else{
                    ?>
                    <div>
                    <small>No items to display</small>
                    </div>
                    <?php    
                    }
                    ?>
                  </li>
                  <!-- end task item expiration notification-->
                    <hr style="padding:0;margin:0;border-width:4px;border-color:black;">
                    <h5 style="padding:3px;margin:3px;">Items nearing expiration</h5>
                    <hr style="padding:0;margin:0;border-width:4px;border-color:black;">
                    <?php
                        $conn =mysqli_connect("localhost","root","");
                        mysqli_select_db($conn, "itproject");
                        $sql3 = "SELECT supply_description,expiration_date from supplies where expiration_date > 0 order by expiration_date";
                        $result3 = $conn->query($sql3);
                        $strdatetoday = strtotime(date("Y/m/d"));
                        $strdatefuture = $strdatetoday + $daysvalue;//today + 30 days
                    ?>
                    <table id="exp" class="table table-bordered table-striped">
                    <small>
                            <?php 
                              if ($result3->num_rows > 0) {
                                while($row = $result3->fetch_assoc()) {
                                    $expdate = strtotime($row["expiration_date"]);
                                    $expvalue = abs((($expdate - $strdatetoday) / $daysvalue)*100);
                                if(($expdate >= $strdatetoday) && ($expdate <= $strdatefuture)) {
                            ?>
                                  <tr>
                                  <td><?php echo $row["supply_description"]; ?></td>
                                  <td><?php echo $row["expiration_date"]; ?></td>
                                  </tr>
                                    <!--Expiration meter-->
                                    <?php
                                      if($expvalue < 25){
                                    ?>
                                    <tr>
                                    <td><small class="pull-left"><?php echo number_format($expvalue) . "% to Exp"?></small></td>
                                    <td><div class="progress xs">
                                      <div class="progress-bar progress-bar-red" style="width: <?php echo $expvalue ?>%" role="progressbar"
                                           aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                      </div>
                                    </div></td>
                                    </tr>
                                    <?php
                                      }else if($expvalue < 50){?>
                                    <tr>
                                    <td><small class="pull-left"><?php echo number_format($expvalue) . "% to Exp"?></small></td>
                                    <td><div class="progress xs">
                                      <div class="progress-bar progress-bar-yellow" style="width: <?php echo $expvalue ?>%" role="progressbar"
                                           aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                      </div>
                                    </div></td>
                                    </tr>  
                                    <?php
                                      }else if($expvalue < 100){?>
                                    <tr>
                                    <td><small class="pull-left"><?php echo number_format($expvalue) . "% to Exp"?></small></td>
                                    <td><div class="progress xs">
                                      <div class="progress-bar progress-bar-green" style="width: <?php echo $expvalue ?>%" role="progressbar"
                                           aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                      </div>
                                    </div></td>
                                    </tr>
                                    <?php
                                    }
                                    }
                                }
                              }else{
                            ?>
                                <div>
                                <p>No items to display</p>
                                </div>
                            <?php      
                              }
                            ?>
                    </small>
                    </table>
                    <hr style="padding:0;margin:0;border-width:4px;border-color:black;">
                    <h5 style="padding:3px;margin:3px;">Expired Items</h5>
                    <hr style="padding:0;margin:0;border-width:4px;border-color:black;">
                    <?php
                        $conn =mysqli_connect("localhost","root","");
                        mysqli_select_db($conn, "itproject");
                        $sql4 = "SELECT supply_description,expiration_date from supplies where expiration_date > 0 AND soft_deleted = 'N'";
                        $result4 = $conn->query($sql4);
                        $strdatetoday = strtotime(date("Y/m/d"));
                    ?>
                    <table id="expdue" class="table table-bordered table-striped">
                    <small>
                            <?php 
                              if ($result4->num_rows > 0) {
                                while($row = $result4->fetch_assoc()) {
                                    $expdate = strtotime($row["expiration_date"]);
                                if($expdate < $strdatetoday){
                            ?>
                                  <tr class="danger">
                                  <td><?php echo $row["supply_description"]; ?></td>
                                  <td><?php echo $row["expiration_date"]; ?></td>
                                  </tr>
                            <?php
                                }
                              }
                            }else{
                            ?>
                            <div>
                            <p>No items to display</p>
                            </div>
                            <?php
                            }
                            ?>
                    </small>
                    </table>
                </ul>
              </li>
            </ul>
          </li>
<!--          FLAG END-->
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../assets/dist/img/Assistant.png" class="user-image" alt="User Image">
              <span class="hidden-xs">Hi! <?php echo ( $this->session->userdata('fname'));?> <?php echo ( $this->session->userdata('lname'));?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../assets/dist/img/Assistant.png" class="img-circle" alt="User Image">

                <p><?php echo ( $this->session->userdata('fname'));?> <?php echo ( $this->session->userdata('lname'));?>
        <small> Assistant</small>
        </p>
                </li>
              <!-- Menu Footer-->
              <li class="user-footer">
        
                <div class="pull-right">
                  <a href="<?php echo '../logout' ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
                <div class="pull-left">
                      <button type="submit" class="btn btn-default btn-flat" data-toggle="modal" data-target="#editprof">Edit Profile</button>
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
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../assets/dist/img/Assistant.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo ( $this->session->userdata('fname'));?> <?php echo ( $this->session->userdata('lname'));?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Active</a>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Inventory Management System</li>
  <!---------------------------------------------------- DASHBOARD MENU -------------------------------------------------------------->
         <li>
          <a href="<?php echo '../dashboard' ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
  <!---------------------------------------------------- USER ACCOUNTS MENU -------------------------------------------------------------->
        <li>
              <a href="<?php echo 'userAccounts' ?>">
                  <i class="fa fa-group"></i><span>Manage Accounts</span>  
              </a>
          </li>
  
    <!---------------------------------------------------- SUPPLIES MENU -------------------------------------------------------------->
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-cubes"></i> <span>Inventory</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active treeview">
              <a href="#"><i class="fa fa-briefcase"></i> Supplies
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="<?php echo 'medicalSupplies' ?>"><i class="fa fa-medkit"></i>Medical Supplies</a></li>
                <li class="treeview">
                  <li><a href="<?php echo 'officeSupplies' ?>"><i class="fa fa-pencil-square"></i>Office Supplies</a></li>
                </li>
              </ul>
            </li>
            <li><a href="<?php echo 'issuedSupplies' ?>"><i class="fa fa-retweet"></i>Issued Supplies</a></li>
      <li><a href="<?php echo 'departmentsOrder' ?>"><i class="fa fa-list"></i>Deparments Order</a></li>
      <li><a href="<?php echo 'purchases' ?>"><i class="fa fa-shopping-cart"></i>Purchase</a></li>
      <li><a href="<?php echo 'deliveries' ?>"><i class="fa fa-truck"></i>Delivery</a></li>
          </ul>
        </li>
    <!---------------------------------------------------- SUPPLIERS MENU -------------------------------------------------------------->
        <li>
          <a href="<?php echo 'suppliers' ?>">
            <i class="fa fa-user"></i> <span>Suppliers</span>
          </a>
        </li>
    <!---------------------------------------------------- DEPARTMENTS MENU -------------------------------------------------------------->
        <li>
          <a href="<?php echo 'departments' ?>">
            <i class="fa fa-building"></i> <span>Departments</span>
          </a>
        </li>
    <!---------------------------------------------------- CALENDAR MENU -------------------------------------------------------------->
        <li>
          <a href="<?php echo 'memo' ?>">
            <i class="fa fa-tasks"></i> <span>Memo</span>
          </a>
        </li>

        <!---------------------------------------------------- INVOICE MENU -------------------------------------------------------------->
        <li>
          <a href="<?php echo 'logs' ?>">
            <i class="fa fa-list-alt"></i> <span>Logs</span>
          </a>
        </li>

<!---------------------------------------------------- LOCKSCREEN MENU -------------------------------------------------------------->
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
         <i class="fa fa-medkit"></i> <b>Medical Supplies</b>
        <!-- <small>Supplies</small> -->
      </h1>
       <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><i class="fa fa-medkit"></i> Medical Supplies</li>
        <li class="active"><i class="fa fa-medkit"></i> Medical Supplies Total Quantity</li>
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
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Supplies
                          <span class="caret"></span>
                        </button>
                        <option><b>Total Quantity</b></option>
                          <option value="medicalSupplies">All Supplies</option>
                          
                        </select>
                      </div></th>
                    </tr>
                </table> 
                <table style="float:right;">
                    <tr>
                        <th><button type="submit" class="btn btn-primary btn-block btn-success" data-toggle="modal" data-target="#modal-info"><i class="glyphicon glyphicon-plus"></i> Add New Item</button>
                        
                        <form name="addSupply" method="post" action="medicalsupplies/addMedicalSupplies">
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
                                        <!-- end of modal header -->
                                        <div class="modal-body">
                                        <div class="box-header">
                                          <div class="margin">
                                              <center><h4><b>Add New Item</b></h4></center>
                                            </div>
                                        <div class="box-body">
                                          <!-- /.form group -->
                                            <div class="form-group" style="width:100%;">
                                                  <label for="exampleInputEmail1">Description</label>
                                                  <input type="text" class="form-control" id="Description" name="Description" required />
                                                </div>
                                              <div class="row">
                                              <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="exampleInputEmail1">Brand Name</label>
                                                  <input type="text" class="form-control" id="brandname" min="0" name="brandname" required />
                                                
                                              </div>
                                              </div>

                                              <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="exampleInputEmail1">Supplier</label>
                                                  <select class="form-control select2" name="supplier" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                                    <option value=""></option>
                                                    <?php echo supplier($connect);?>
                                                  </select>
                                              </div>
                                              </div>
                                              </div>
                                              <div class="row">
                                              <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="exampleInputEmail1">Quantity</label>
                                                  <input type="number" class="form-control" id="Quantity" min="0" name="Quantity" required />
                                                
                                              </div>
                                              </div>

                                              <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="exampleInputEmail1">Unit</label>
                                                  <select class="form-control select2" name="Unit" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                                                    <option value=""></option>
                                                    <?php echo unit_measure($connect);?>
                                                  </select>
                                              </div>
                                              </div>
                                              </div>
                                              <div class="row">
                                              <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="exampleInputEmail1">Unit Price</label>
                                                  <input type="number" class="form-control" id="priceUnit" name="priceUnit" min="0" required />
                                                </div>
                                              </div>
                                              <!-- Date and Time -->
                                              <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Expiration Date</label>

                                                    <div class="input-group">
                                                      <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                      </div>
                                                      <input type="text" class="form-control pull-right" id="datepicker2" name="expirationDate">
                                                    </div>
                                                          <!-- /.input group --> 
                                                  </div>
                                                  </div>
                                                  </div>

                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancel</button>
                                        <button type="button" class="btn btn-primary" class="btn btn-success" data-toggle="modal" data-target="#modal-success"><i class="fa fa-plus"></i> Add</button>
                                      </div>
                                    </div>
                                    <!-- /.modal-content -->
                                    
                                  </div>
                                  <!-- /.modal-dialog -->
                                </div>

                                <div class="modal modal-success fade" id="modal-success">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                          <h3>Are you sure to add this item?&hellip;</h3>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal"><i class="fa fa-close"></i> No</button>
                                          <button type="submit" class="btn btn-outline" name="addMedSupply"><i class="fa fa-check"></i> Yes </button>

                                        </div>
                                      </div>
                                      <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                  </div>
                                  <!-- /.modal -->
                                </form>
                            </th> 
                              
                            <!--- END OF ADD -->
                        <!---  ISSUE BUTTON -->
                        </th>
                    </tr>
                </table>      
            </div>
              
            <div class="box-body">
        <table id="example" class="table table-bordered table-striped">
         <?php // RETRIEVE or Display Medical Supplies
         $conn =mysqli_connect("localhost","root","");
          mysqli_select_db($conn, "itproject");
          $sql = "SELECT supply_id, supply_description, unit, FORMAT(SUM(quantity_in_stock),0) AS 'Total Quantity', CONCAT('₱', FORMAT(SUM(quantity_in_stock * unit_price), 2)) AS 'Total Amount', reorder_level
            FROM supplies WHERE supply_type='Medical' AND   (quantity_in_stock IS NOT NULL AND supply_description != ' ' AND (unit_price IS NOT NULL AND unit_price != 0))
            GROUP BY supply_description;";
          $result = $conn->query($sql);  ?>
          <col width="50%">
            <col width="auto">
            <col width="5%">
            <col width="13%">
            <col width="auto">
            <col width="5%">
          <thead>
            <tr>
                  <th>Description</th>
                  <th>Total Quantity in Stock</th>
                  <th>Unit</th>
                  <th>Total Amount </th>
                  <th>Reorder Level</th>
                  <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
          while($row = $result->fetch_assoc()) { ?>
            <tr>
            <td><?php echo $row["supply_description"]; ?></td>
            <td align="right"><?php echo $row["Total Quantity"]; ?></td>
            <td><?php echo $row["unit"]; ?></td>
            <td align="right"><?php echo $row["Total Amount"]; ?></td>
            <td align="right"><?php echo $row["reorder_level"]; ?></td>
            <td>
             <div class="btn-group">
                <button type="button" id="getEdit" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row["supply_id"]; ?>"><i class="glyphicon glyphicon-pencil"></i> Update</button>
            </div>  
            </td>          
            </tr>
          <?php 
              }
          ?>
        </tbody>
        <tfoot>
           <tr>
          
                  <th>Description</th>
                  <th>Total Quantity in Stock</th>
                  <th>Unit</th>
                  <th>Total Amount</th>
                  <th>Reorder Level</th>
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
    <strong>Copyright &copy; AMDC INVENTORY MANAGEMENT SYSTEM </strong> All rights
    reserved.
  </footer>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

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
<!-- page script -->

<div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div id="content-data"></div>
            </div>
        </div>

<script>
  // $(function () {
  //   $('#example1').DataTable()
  //   $('#example2').DataTable({
  //     'paging'      : true,
  //     'lengthChange': false,
  //     'searching'   : false,
  //     'ordering'    : true,
  //     'info'        : true,
  //     'autoWidth'   : false
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
                        return '<h2><img src="../assets/dist/img/AMDC.png" height="60px" width="200px"><center>Medical Supplies Total Quantity</center></h2>';
                    }
                    else {
                        return 'You have printed this document '+printCounter+' times';
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
<script>
//date and time
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
    //Date picker
    $('#datepicker2').datepicker({
      autoclose: true
    })
    //Date picker
    $('#datepicker3').datepicker({
      autoclose: true
    })
      
    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
<script>
        $(document).on('click','#getEdit',function(e){
            e.preventDefault();
            var per_id=$(this).data('id');
            //alert(per_id);
            $('#content-data').html('');
            $.ajax({
                url:'medicalSuppliesTotalQuantity/editMedicalSuppliesTotalQuantity',
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
</body>
</html>

<?php 
$conn=mysqli_connect('localhost','root','','itproject') or die('Error connecting to MySQL server.');
$pdo = new PDO("mysql:host=localhost;dbname=itproject","root","");

if(isset($_POST['medTQEdit'])){
    $new_id=mysqli_real_escape_string($conn,$_POST['txtid']);
    $new_supplyReorderLevel=mysqli_real_escape_string($conn,$_POST['txtReorderLevel']);

    $sqlupdate="UPDATE supplies SET reorder_level='$new_supplyReorderLevel' WHERE supply_id='$new_id' ";
    $result_update=mysqli_query($conn,$sqlupdate);

    if($result_update){
        $conn =mysqli_connect("localhost","root","");
        $datetoday = date('Y\-m\-d\ H:i:s A');
        mysqli_select_db($conn, "itproject");
        $notif1 = "insert into logs (log_date,log_description,user,module) VALUES ('".$datetoday."','Medical supply reorder level has been changed to ".$new_supplyReorderLevel."','".$this->session->userdata('fname')." ".$this->session->userdata('lname')."','".$this->session->userdata('type')."')";
        $res1 = $conn->query($notif1);
        echo '<script>window.location.href="medicalSuppliesTotalQuantity"</script>';
    }
    else{
        echo '<script>alert("Update Failed")</script>';
    }
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
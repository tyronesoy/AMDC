<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Business Manager | Departments Order</title>
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
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /> -->
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
                          document.getElementById("demo").innerHTML = d;
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
                $sql6 = "SELECT COUNT(*) AS total from logs where ((log_date BETWEEN '".$date_select."' AND '".$dtoday."') AND log_status = 1) AND (log_description like '%order%' OR log_description like '%profile%')";
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
                    $sql7 = "select log_id,log_date,log_description from logs where ((log_date BETWEEN '".$date_select."' AND '".$dtoday."') AND log_status = 1) AND (log_description like '%order%' OR log_description like '%profile%') order by log_id DESC";
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
                        }else if(strpos($logvalue, 'profile') !== false){
                        ?>
                            <td><small><a display="block" style="color:black" href="<?php echo 'BusinessManager/userAccounts' ?>"><?php echo $row["log_description"];?></a></small></td>
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
              <li class="footer"><a href="<?php echo 'logs' ?>">View all Logs</a></li>
              <li>
              <center>
              <form action="deleteall" method="post">
                        <button class="btn-danger" type="submit" name="submit"><i class="glyphicon glyphicon-trash"></i> Delete all Logs</button>
              </form>
              </center>
              </li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php
                $conn =mysqli_connect("localhost","root","", "itproject") or die('Error connecting to MySQL server.');
                $pdo = new PDO("mysql:host=localhost;dbname=itproject","root","");
                $dtoday = date("Y/m/d");
                $date_futr = date("Y-m-d", strtotime('+30 days') ) ;
                $date_past = date("Y-m-d", strtotime('-1 year') ) ;
                $date_select = date("Y-m-d", strtotime('-3 days') ) ;//minus three days
                $sql5 = "SELECT COUNT(*) AS total FROM supplies where quantity_in_stock < reorder_level";
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
                    $sql2 = "select supply_description,SUM(quantity_in_stock) as `totalstock`,MAX(reorder_level) as `maximumreorder` from supplies group by supply_description having SUM(quantity_in_stock) < MAX(reorder_level) order by SUM(quantity_in_stock)/MAX(reorder_level)";
                    $result2 = $conn->query($sql2);
                  ?>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <!-- Task item reorder levels-->
                    <h5>Items below reorder level</h5>
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
                    }
                    ?>
                  </li>
                  <!-- end task item expiration notification-->
                    <h5>Items nearing expiration</h5>
                    <?php
                        $conn =mysqli_connect("localhost","root","");
                        mysqli_select_db($conn, "itproject");
                        $sql3 = "SELECT supply_description,expiration_date from supplies where expiration_date > 0 order by expiration_date";
                        $result3 = $conn->query($sql3);
                        $strdatetoday = strtotime(date("Y/m/d"));
                        $strdatefuture = $strdatetoday + 2588400;//today + 30 days
                    ?>
                    <table id="exp" class="table table-bordered table-striped">
                    <small>
                            <?php 
                              if ($result3->num_rows > 0) {
                                while($row = $result3->fetch_assoc()) {
                                    $expdate = strtotime($row["expiration_date"]);
                                    $expvalue = abs((($expdate - $strdatetoday) / 2588400)*100);
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
                              }
                            ?>
                    </small>
                    </table>
                    <h5>Expired Items</h5>
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
                            }
                            ?>
                    </small>
                    </table>
                </ul>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
         <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../assets/dist/img/user2-128x128.png" class="user-image" alt="User Image">
              <span class="hidden-xs">Hi! <?php echo ( $this->session->userdata('fname'));?> <?php echo ( $this->session->userdata('lname'));?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../assets/dist/img/user2-128x128.png" class="img-circle" alt="User Image">

                <p><?php echo ( $this->session->userdata('fname'));?> <?php echo ( $this->session->userdata('lname'));?>
        <small> Business Manager</small>
        </p>
                </li>
              <!-- Menu Footer-->
              <li class="user-footer">
            
                <div class="pull-right">
                 <a href="<?php echo '../logout' ?>"  class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../assets/dist/img/user2-128x128.png" class="img-circle" alt="User Image">
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
      <li class="active"><a href="<?php echo 'departmentsOrder' ?>"><i class="fa fa-list"></i>Deparments Order</a></li>
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
        <b>Departments Order</b>
        <!-- <small>advanced tables</small> -->
      </h1>
        
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-list"></i> Departments Order</li>
      </ol>
    </section>

    <!-- Main content -->
      <section class="content">
          <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Office Supplies</h3> -->              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example" class="table table-bordered table-striped">
                <?php
                  $conn =mysqli_connect("localhost","root","", "itproject") or die('Error connecting to MySQL server.');
                  $sql = "SELECT * FROM inventory_order JOIN inventory_order_supplies USING(inventory_order_uniq_id) GROUP BY inventory_order_id";
                  $result = $conn->query($sql);    
                ?>
                <thead>
                  <tr>
                    <th>Order ID</th>
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
                      <td><?php echo $row["inventory_order_id"]; ?></td>
                      <td><?php echo $row["inventory_order_created_date"]; ?></td>
                      <td><?php echo $row["inventory_order_name"]; ?></td>
                      <td><?php echo $row["inventory_order_dept"]; ?></td>
                      <td><?php echo $row["inventory_order_status"]; ?></td>
                      <td><?php echo $row["inventory_order_remarks"]; ?></td>
                      <td>
                        <!-- to show the update/edit button -->
                        <?php if ($row["inventory_order_remarks"] == null && $row["inventory_order_status"] == 'Accepted') {?>
                          <div class="btn-group">
                              <button type="button" id="getEdit" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editModal" data-id="<?php echo $row["inventory_order_id"]; ?>"><i class="glyphicon glyphicon-pencil"></i> Update</button>
                          </div>
                        <?php } ?>

                        <!-- to show the issue button -->
                        <?php if ($row["inventory_order_status"] == 'Accepted') {?>
                          
                          <div class="btn-group">
                              <button type="button" id="issue" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#issueModal" data-id="<?php echo $row["inventory_order_id"]; ?>"><i class="glyphicon glyphicon-retweet"></i> Issue</button>
                          </div>

                          <!-- if the status is declined or issued it will not show any button -->
                        <?php }elseif ($row["inventory_order_status"] == 'Declined' || $row["inventory_order_status"] == 'Issued') {?>

                        <!-- the accept and decline button will be showed if the above statement will be false -->
                        <?php }else {?>
                          
                          <div class="btn-group">
                              <button type="button" id="accept" class="btn btn-success btn-xs" data-toggle="modal" data-target="#acceptModal" data-id="<?php echo $row["inventory_order_id"]; ?>" ><i class="glyphicon glyphicon-ok"> Accept</i></button>
                          </div>
                          <div class="btn-group">
                              <button type="button" id="decline" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#declineModal" data-id="<?php echo $row["inventory_order_id"]; ?>" ><i class="glyphicon glyphicon-remove"> Decline</i></button>
                          </div>
                        <?php } ?>

                        <!-- the view button will always show up -->
                        <div class="btn-group">
                            <button type="button" id="getView" class="btn btn-info btn-xs" data-toggle="modal" data-target="#viewModal" data-id="<?php echo $row["inventory_order_id"]; ?>"><i class="glyphicon glyphicon-search"></i> View</button>
                        </div>
                      </td>
                    </tr>
                  <?php 
                      }
                    }
                  ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Order ID</th>
                    <th>Order Date</th>
                    <th>Customer Name</th>
                    <th>Department</th>
                    <th>Status</th>
                    <th>Remarks</th>
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
</style>
<!-- Bootstrap 3.3.7 -->
<script src="../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables
<script src="../assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>-->
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
      // $(function () {
      //   $('#example').DataTable()
      //   $('#example1').DataTable({
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
                        return '<h4><img src="../assets/dist/img/AMDC.png" height="60px" width="200px"><center>Departments Order</center></h4>';
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
<!-- date and time -->
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

<!--create modal dialog for display detail info for edit on button cell click-->
        <div class="modal fade" id="editModal" role="dialog">
            <div class="modal-dialog">
                <div id="edit-data"></div>
            </div>
        </div>
        <div class="modal fade" id="viewModal" role="dialog">
            <div class="modal-dialog">
                <div id="content-data"></div>
            </div>
        </div>
        <div class="modal fade" id="acceptModal" role="dialog">
            <div class="modal-dialog">
                <div id="accept-data"></div>
            </div>
        </div>
        <div class="modal fade" id="declineModal" role="dialog">
            <div class="modal-dialog">
                <div id="decline-data"></div>
            </div>
        </div>
        <div class="modal fade" id="issueModal" role="dialog">
            <div class="modal-dialog">
                <div id="issue-data"></div>
            </div>
        </div>
   
    <!-- <script>
        $(document).ready(function(){
            var dataTable=$('#example').DataTable({
                "processing": true,
                "serverSide":true,
                "ajax":{
                    url:"departments/getDepartment",
                    type:"post"
                }
            });
        });
    </script> -->

    <!--script js for get edit data-->

    <script>
        $(document).on('click','#getEdit',function(e){
            e.preventDefault();
            var per_id=$(this).data('id');
            //alert(per_id);
            $('#edit-data').html('');
            $.ajax({
                url:'departmentsOrder/editOrder',
                type:'POST',
                data:'id='+per_id,
                dataType:'html'
            }).done(function(data){
                $('#edit-data').html('');
                $('#edit-data').html(data);
            }).final(function(){
                $('#edit-data').html('<p>Error</p>');
            });
        });
    </script>

    <script>
        $(document).on('click','#getView',function(e){
            e.preventDefault();
            var per_depId=$(this).data('id');
            //alert(per_id);
            $('#content-data').html('');
            $.ajax({
                url:'departmentsOrder/viewOrder',
                type:'POST',
                data:'id='+per_depId,
                dataType:'html'
            }).done(function(data){
                $('#content-data').html('');
                $('#content-data').html(data);
            }).final(function(){
                $('#content-data').html('<p>Error</p>');
            });
        });
    </script>

    <script>
        $(document).on('click','#accept',function(e){
            e.preventDefault();
            var per_id=$(this).data('id');
            //alert(per_id);
            $('#accept-data').html('');
            $.ajax({
                url:'departmentsOrder/acceptOrder',
                type:'POST',
                data:'id='+per_id,
                dataType:'html'
            }).done(function(data){
                $('#accept-data').html('');
                $('#accept-data').html(data);
            }).final(function(){
                $('#accept-data').html('<p>Error</p>');
            });
        });
    </script>

    <script>
        $(document).on('click','#decline',function(e){
            e.preventDefault();
            var per_id=$(this).data('id');
            //alert(per_id);
            $('#decline-data').html('');
            $.ajax({
                url:'departmentsOrder/declineOrder',
                type:'POST',
                data:'id='+per_id,
                dataType:'html'
            }).done(function(data){
                $('#decline-data').html('');
                $('#decline-data').html(data);
            }).final(function(){
                $('#decline-data').html('<p>Error</p>');
            });
        });
    </script>

    <script>
        $(document).on('click','#issue',function(e){
            e.preventDefault();
            var per_id=$(this).data('id');
            //alert(per_id);
            $('#issue-data').html('');
            $.ajax({
                url:'departmentsOrder/issueOrder',
                type:'POST',
                data:'id='+per_id,
                dataType:'html'
            }).done(function(data){
                $('#issue-data').html('');
                $('#issue-data').html(data);
            }).final(function(){
                $('#issue-data').html('<p>Error</p>');
            });
        });
    </script>


</body>
</html>

<?php
$con=mysqli_connect('localhost','root','','itproject') or die('Error connecting to MySQL server.');
$pdo = new PDO("mysql:host=localhost;dbname=itproject","root","");
if(isset($_POST['btnEdit'])){
    $new_id=mysqli_real_escape_string($con,$_POST['txtid']);
    $new_remarks=mysqli_real_escape_string($con,$_POST['txtremarks']);
    

    $sqlupdate="UPDATE inventory_order SET inventory_order_remarks='$new_remarks' WHERE inventory_order_id='$new_id' ";
    $result_update=mysqli_query($con,$sqlupdate);

    if($result_update){
        $conn =mysqli_connect("localhost","root","");
        $datetoday = date('Y\-m\-d\ H:i:s A');
        mysqli_select_db($conn, "itproject");
        $notif = "insert into logs (log_date,log_description,user,module) VALUES ('".$datetoday."','Department order ID #".$new_id." has been edited','".$this->session->userdata('fname')." ".$this->session->userdata('lname')."','".$this->session->userdata('type')."')";
        $result = $conn->query($notif);
        echo '<script>window.location.href="departmentsOrder"</script>';
    }
    else{
        echo '<script>alert("Update Failed")</script>';
    }
}
if(isset($_POST['btnAccept'])){
    $new_id=mysqli_real_escape_string($con,$_POST['txtid']);
    $new_status=mysqli_real_escape_string($con,$_POST['txtstatus']);

    $sqlupdate="UPDATE inventory_order SET inventory_order_status='Accepted' WHERE inventory_order_id='$new_id' ";
    $result_update=mysqli_query($con,$sqlupdate);

    if($result_update){
        $conn =mysqli_connect("localhost","root","");
        $datetoday = date('Y\-m\-d\ H:i:s A');
        mysqli_select_db($conn, "itproject");
        $notif = "insert into logs (log_date,log_description,user,module) VALUES ('".$datetoday."','Department order ID #".$new_id." has been accepted','".$this->session->userdata('fname')." ".$this->session->userdata('lname')."','".$this->session->userdata('type')."')";
        $result = $conn->query($notif);
        echo '<script>window.location.href="departmentsOrder"</script>';
    }
    else{
        echo '<script>alert("Update Failed")</script>';
    }
}
if(isset($_POST['btnDecline'])){
    $new_id=mysqli_real_escape_string($con,$_POST['txtid']);
    $new_status=mysqli_real_escape_string($con,$_POST['txtstatus']);

    $sqlupdate="UPDATE inventory_order SET inventory_order_status='Declined' WHERE inventory_order_id='$new_id' ";
    $result_update=mysqli_query($con,$sqlupdate);

    if($result_update){
        $conn =mysqli_connect("localhost","root","");
        $datetoday = date('Y\-m\-d\ H:i:s A');
        mysqli_select_db($conn, "itproject");
        $notif = "insert into logs (log_date,log_description,user,module) VALUES ('".$datetoday."','Department order ID #".$new_id." has been declined','".$this->session->userdata('fname')." ".$this->session->userdata('lname')."','".$this->session->userdata('type')."')";
        $result = $conn->query($notif);
        echo '<script>window.location.href="departmentsOrder"</script>';
    }
    else{
        echo '<script>alert("Update Failed")</script>';
    }
}
if(isset($_POST['btnIssue'])){
    $new_id=mysqli_real_escape_string($con,$_POST['txtid']);
    $new_status=mysqli_real_escape_string($con,$_POST['txtstatus']);
    $date=date("Y-m-d");
    $cust_name=mysqli_real_escape_string($con,$_POST['custName']);

    $new_issue0=mysqli_real_escape_string($con,$_POST['txtissued0']);
    $new_quantity0=mysqli_real_escape_string($con,$_POST['txtquantity0']);
    $new_supply0=mysqli_real_escape_string($con,$_POST['txtsupply0']);
    $new_supid0=mysqli_real_escape_string($con,$_POST['txtsupid0']);
    $subtract0=mysqli_real_escape_string($con,$_POST['txtsupply0']) - mysqli_real_escape_string($con,$_POST['txtissued0']);

    $new_issue1=mysqli_real_escape_string($con,$_POST['txtissued1']);
    $new_quantity1=mysqli_real_escape_string($con,$_POST['txtquantity1']);
    $new_supply1=mysqli_real_escape_string($con,$_POST['txtsupply1']);
    $new_supid1=mysqli_real_escape_string($con,$_POST['txtsupid1']);
    $subtract1=mysqli_real_escape_string($con,$_POST['txtsupply1']) - mysqli_real_escape_string($con,$_POST['txtissued1']);

    $new_issue2=mysqli_real_escape_string($con,$_POST['txtissued2']);
    $new_quantity2=mysqli_real_escape_string($con,$_POST['txtquantity2']);
    $new_supply2=mysqli_real_escape_string($con,$_POST['txtsupply2']);
    $new_supid2=mysqli_real_escape_string($con,$_POST['txtsupid2']);
    $subtract2=mysqli_real_escape_string($con,$_POST['txtsupply2']) - mysqli_real_escape_string($con,$_POST['txtissued2']);

    $new_issue3=mysqli_real_escape_string($con,$_POST['txtissued3']);
    $new_quantity3=mysqli_real_escape_string($con,$_POST['txtquantity3']);
    $new_supply3=mysqli_real_escape_string($con,$_POST['txtsupply3']);
    $new_supid3=mysqli_real_escape_string($con,$_POST['txtsupid3']);
    $subtract3=mysqli_real_escape_string($con,$_POST['txtsupply3']) - mysqli_real_escape_string($con,$_POST['txtissued3']);

    $new_issue4=mysqli_real_escape_string($con,$_POST['txtissued4']);
    $new_quantity4=mysqli_real_escape_string($con,$_POST['txtquantity4']);
    $new_supply4=mysqli_real_escape_string($con,$_POST['txtsupply4']);
    $new_supid4=mysqli_real_escape_string($con,$_POST['txtsupid4']);
    $subtract4=mysqli_real_escape_string($con,$_POST['txtsupply4']) - mysqli_real_escape_string($con,$_POST['txtissued4']);

    $new_issue5=mysqli_real_escape_string($con,$_POST['txtissued5']);
    $new_quantity5=mysqli_real_escape_string($con,$_POST['txtquantity5']);
    $new_supply5=mysqli_real_escape_string($con,$_POST['txtsupply5']);
    $new_supid5=mysqli_real_escape_string($con,$_POST['txtsupid5']);
    $subtract5=mysqli_real_escape_string($con,$_POST['txtsupply5']) - mysqli_real_escape_string($con,$_POST['txtissued5']);

    $new_issue6=mysqli_real_escape_string($con,$_POST['txtissued6']);
    $new_quantity6=mysqli_real_escape_string($con,$_POST['txtquantity6']);
    $new_supply6=mysqli_real_escape_string($con,$_POST['txtsupply6']);
    $new_supid6=mysqli_real_escape_string($con,$_POST['txtsupid6']);
    $subtract6=mysqli_real_escape_string($con,$_POST['txtsupply6']) - mysqli_real_escape_string($con,$_POST['txtissued6']);

    $new_issue7=mysqli_real_escape_string($con,$_POST['txtissued7']);
    $new_quantity7=mysqli_real_escape_string($con,$_POST['txtquantity7']);
    $new_supply7=mysqli_real_escape_string($con,$_POST['txtsupply7']);
    $new_supid7=mysqli_real_escape_string($con,$_POST['txtsupid7']);
    $subtract7=mysqli_real_escape_string($con,$_POST['txtsupply7']) - mysqli_real_escape_string($con,$_POST['txtissued7']);

    $new_issue8=mysqli_real_escape_string($con,$_POST['txtissued8']);
    $new_quantity8=mysqli_real_escape_string($con,$_POST['txtquantity8']);
    $new_supply8=mysqli_real_escape_string($con,$_POST['txtsupply8']);
    $new_supid8=mysqli_real_escape_string($con,$_POST['txtsupid8']);
    $subtract8=mysqli_real_escape_string($con,$_POST['txtsupply8']) - mysqli_real_escape_string($con,$_POST['txtissued8']);

    $new_issue9=mysqli_real_escape_string($con,$_POST['txtissued9']);
    $new_quantity9=mysqli_real_escape_string($con,$_POST['txtquantity9']);
    $new_supply9=mysqli_real_escape_string($con,$_POST['txtsupply9']);
    $new_supid9=mysqli_real_escape_string($con,$_POST['txtsupid9']);
    $subtract9=mysqli_real_escape_string($con,$_POST['txtsupply9']) - mysqli_real_escape_string($con,$_POST['txtissued9']);


      $sqlupdate0="UPDATE supplies, inventory_order_supplies, inventory_order SET quantity_in_stock='$subtract0', qty_issued='$new_issue0' WHERE supply_id ='$new_supid0' ";
      $result_update0=mysqli_query($con,$sqlupdate0);

      $sqlupdate1="UPDATE supplies, inventory_order_supplies, inventory_order SET quantity_in_stock='$subtract1', qty_issued='$new_issue1' WHERE supply_id='$new_supid1' ";
      $result_update1=mysqli_query($con,$sqlupdate1);

      $sqlupdate2="UPDATE supplies, inventory_order_supplies, inventory_order SET quantity_in_stock='$subtract2', qty_issued='$new_issue2' WHERE supply_id='$new_supid2' ";
      $result_update2=mysqli_query($con,$sqlupdate2);

      $sqlupdate3="UPDATE supplies, inventory_order_supplies, inventory_order SET quantity_in_stock='$subtract3', qty_issued='$new_issue3' WHERE supply_id='$new_supid3' ";
      $result_update3=mysqli_query($con,$sqlupdate3);

      $sqlupdate4="UPDATE supplies, inventory_order_supplies, inventory_order SET quantity_in_stock='$subtract4', qty_issued='$new_issue4' WHERE supply_id='$new_supid4' ";
      $result_update4=mysqli_query($con,$sqlupdate4);

      $sqlupdate5="UPDATE supplies, inventory_order_supplies, inventory_order SET quantity_in_stock='$subtract5', qty_issued='$new_issue5' WHERE supply_id='$new_supid5' ";
      $result_update5=mysqli_query($con,$sqlupdate5);

      $sqlupdate6="UPDATE supplies, inventory_order_supplies, inventory_order SET quantity_in_stock='$subtract6', qty_issued='$new_issue6' WHERE supply_id='$new_supid6' ";
      $result_update6=mysqli_query($con,$sqlupdate6);

      $sqlupdate7="UPDATE supplies, inventory_order_supplies, inventory_order SET quantity_in_stock='$subtract7', qty_issued='$new_issue7' WHERE supply_id='$new_supid7' ";
      $result_update7=mysqli_query($con,$sqlupdate7);

      $sqlupdate8="UPDATE supplies, inventory_order_supplies, inventory_order SET quantity_in_stock='$subtract8', qty_issued='$new_issue8' WHERE supply_id='$new_supid8' ";
      $result_update8=mysqli_query($con,$sqlupdate8);

      $sqlupdate9="UPDATE supplies, inventory_order_supplies, inventory_order SET quantity_in_stock='$subtract9', qty_issued='$new_issue9' WHERE supply_id='$new_supid9' ";
      $result_update9=mysqli_query($con,$sqlupdate9);


    $sqlupdate="UPDATE inventory_order SET inventory_order_status='Issued', inventory_order_remarks='The item has been issued to $cust_name', issued_date='$date' WHERE inventory_order_id='$new_id' ";
    $result_update=mysqli_query($con,$sqlupdate);

    if($result_update){
        $conn =mysqli_connect("localhost","root","");
        $datetoday = date('Y\-m\-d\ H:i:s A');
        mysqli_select_db($conn, "itproject");
        $notif = "insert into logs (log_date,log_description,user,module) VALUES ('".$datetoday."','Department order ID #".$new_id." has been issued','".$this->session->userdata('fname')." ".$this->session->userdata('lname')."','".$this->session->userdata('type')."')";
        $result = $conn->query($notif);
        echo '<script>window.location.href="departmentsOrder"</script>';
    }
    else{
        echo '<script>alert("Update Failed")</script>';
    }
}

?>
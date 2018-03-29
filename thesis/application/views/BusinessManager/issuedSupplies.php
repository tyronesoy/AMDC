<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(!isset($_SESSION['first_run'])){
    $_SESSION['first_run'] = 1;
        $datetoday = date("Y/m/d");
        $conn =mysqli_connect("localhost","root","");
        mysqli_select_db($conn, "itproject");
        $notif1 = "insert into logs (log_date,log_description,user,module) VALUES ('".$datetoday."','".$this->session->userdata('type')." ".$this->session->userdata('fname')." ".$this->session->userdata('lname')." has logged in','".$this->session->userdata('username')."','".$this->session->userdata('type')."')";
        $res1 = $conn->query($notif1);
}
?>
<!--$this->session->userdata('fname'));
echo ( $this->session->userdata('lname'))
-->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Business Manager | Issued Supplies</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../assets/dist/css/skins/_all-skins.min.css">
             <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../assets/plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
      <link rel="stylesheet" href="../assets/bower_components/select2/dist/css/select2.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
    <a href="<?php echo 'dashboard' ?>" class="logo">
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
                            var d = new Date();
                            document.getElementById("demo").innerHTML = d.toUTCString();
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
                $sql6 = "SELECT COUNT(*) AS total FROM logs where (log_date BETWEEN '".$date_select."' AND '".$dtoday."')  AND log_status = 1";
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
                    $sql7 = "select log_id,log_date,log_description from logs where (log_date BETWEEN '".$date_select."' AND '".$dtoday."') AND log_status = 1 order by log_id DESC";
                    $result7 = $conn->query($sql7);
                    ?>
                    <?php 
                      if ($result7->num_rows > 0) {
                       while($row = $result7->fetch_assoc()) { 
                    ?>
                      <tr>
                        <td><small><?php echo $row["log_description"];?></small></td>
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
              <li class="footer"><a href="../examples/invoice.php">View all Logs</a></li>
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
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">!</span>
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
                    <hr>
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
                    <hr>
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
                                  <tr class="warning">
                                  <td><?php echo $row["supply_description"]; ?></td>
                                  <td><?php echo $row["expiration_date"]; ?></td>
                                  </tr>
                                    <!--Expiration meter-->
                                    <?php
                                      if($expvalue < 25){
                                    ?>
                                    <tr class="warning">
                                    <td><small class="pull-left"><?php echo number_format($expvalue) . "% to Exp"?></small></td>
                                    <td><div class="progress xs">
                                      <div class="progress-bar progress-bar-red" style="width: <?php echo $expvalue ?>%" role="progressbar"
                                           aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                      </div>
                                    </div></td>
                                    </tr>
                                    <?php
                                      }else if($expvalue < 50){?>
                                    <tr class="warning">
                                    <td><small class="pull-left"><?php echo number_format($expvalue) . "% to Exp"?></small></td>
                                    <td><div class="progress xs">
                                      <div class="progress-bar progress-bar-yellow" style="width: <?php echo $expvalue ?>%" role="progressbar"
                                           aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                      </div>
                                    </div></td>
                                    </tr>  
                                    <?php
                                      }else if($expvalue < 100){?>
                                    <tr class="warning">
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
                    <hr>
                    <?php
                        $conn =mysqli_connect("localhost","root","");
                        mysqli_select_db($conn, "itproject");
                        $sql4 = "SELECT supply_description,expiration_date from supplies where expiration_date > 0";
                        $result4 = $conn->query($sql4);
                        $strdatetoday = strtotime(date("Y/m/d"));
                        $strdatelimit = $strdatetoday - 2588400;//today -30 days
                    ?>
                    <table id="expdue" class="table table-bordered table-striped">
                    <small>
                            <?php 
                              if ($result4->num_rows > 0) {
                                while($row = $result4->fetch_assoc()) {
                                    $expdate = strtotime($row["expiration_date"]);
                                if(($expdate < $strdatetoday) && ($expdate > $strdatelimit)){
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
              <li class="footer">
                <a href="../../dashboard.php">View all charts</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../assets/dist/img/user2-128x128.png" class="user-image" alt="User Image">
              <span class="hidden-xs">Hi! <?php echo ( $this->session->userdata('fname'));?>  <?php echo ( $this->session->userdata('lname'));?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../assets/dist/img/user2-128x128.png" class="img-circle" alt="User Image">

                <p>
                 Business Manager
                  <small>Member since Oct. 2017</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
             
                <div class="pull-right">
                  <a href="<?php echo '../logout' ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
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
          <p>Business Manager</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Active</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Inventory System</li>
	<!---------------------------------------------------- DASHBOARD MENU -------------------------------------------------------------->
        <li>
          <a href="<?php echo 'dashboard' ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
          <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
            <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Layout Options</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
            <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
          </ul>
        </li>
        <li>
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>UI Elements</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
            <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
            <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
            <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
          </ul>
        </li> -->
		<!---------------------------------------------------- MANAGE ACCOUNTS MENU -------------------------------------------------------------->
        <li>
          <a href="<?php echo 'userAccounts' ?>">
            <i class="fa fa-group"></i> <span>Manage Accounts</span>
          </a>
        </li>
		<!---------------------------------------------------- SUPPLIES MENU -------------------------------------------------------------->
        <li class = "treeview">
          <a href="#">
            <i class="fa fa-briefcase"></i> <span>Supplies</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="<?php echo 'medicalSupplies' ?>"><i class= "fa fa-medkit"></i> Medical Supplies</a></li>
			<li><a href="<?php echo 'officeSupplies' ?>"><i class="fa fa-pencil-square-o"></i> Office Supplies</a></li>
          </ul>
        </li>
        <!--------------------------------------------------- PURCHASES -------------------------------------------------->
          <li>
              <a href="<?php echo 'purchases' ?>">
                  <i class="fa fa-tags"></i><span>Purchases</span>  
              </a>
          </li>
        <!--------------------------------------------------- ISSUED SUPPLIES -------------------------------------------------->
            <li class="active">
                <a href="<?php echo 'issuedSupplies' ?>">
                <i class="fa fa-truck"></i><span>Issued Supplies</span> 
                </a>
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
          <a href="../calendar.html">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>
		<!---------------------------------------------------- INVOICE MENU -------------------------------------------------------------->
        <li>
          <a href="<?php echo 'logs' ?>">
            <i class="fa fa-print"></i> <span>Logs</span>
          </a>
        </li>
<!---------------------------------------------------- LOCKSCREEN MENU -------------------------------------------------------------->
        <li>
          <a href="<?php echo 'lockscreen' ?>">
            <i class="fa fa-lock"></i> <span>Lockscreen</span>
          </a>
        </li>
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>
        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          <b>Issued Supplies</b>
        <!-- <small>Supplies</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Distributed Supplies</a></li>
        <li class="active">Data tables</li>
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
                        <th> <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Branch
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                        <li><a href="php/issuedBaguio.php">Baguio City</a></li>
                        <li><a href="php/issuedLA.php">La Trinidad</a></li>
                        <li><a href="php/issuedSLU.php">SLU Hospital</a></li>
                        </ul>
                      </div></th>
                        <th> <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Issued To
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                          <li><a href="php/issuedToCardiac.php">Cardiac</a></li>
                          <li><a href="php/issuedToEndoscopy.php">Endoscopy</a></li>
                          <li><a href="php/IssuedToImaging.php">Imaging</a></li>
                          <li><a href="php/IssuedToLaboratory.php">Laboratory</a></li>
                        </ul>
                      </div></th>
                    </tr>
                </table>      
            </div>
            <!-- /.box-header -->
              
            <div class="box-body">
              <table id="example" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Request Date</th>
                      <th>Issue Date</th>
                      <th>Supply Type</th>
                      <th>Description</th>
                      <th>Quantity</th>
                      <th>Department</th>
                    </tr>
                    </thead>
                  
                <tfoot>
                <tr>
                  <th>Request Date</th>
                      <th>Issue Date</th>
                      <th>Supply Type</th>
                      <th>Description</th>
                      <th>Quantity</th>
                      <th>Department</th>
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
        <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="../examples/invoice-print6.php" target="_blank" class="btn btn-default pull-right"><i class="fa fa-print"></i> Print</a>
        </div>
      </div>
        
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; Bigornia, Cabalse, Calimlim, Calub, Duco, Malong, Siapno, Soy. </strong> All rights
    reserved.
  </footer>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
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
<!-- date-range-picker -->
<script src="../assets/bower_components/moment/min/moment.min.js"></script>
<script src="../assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
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

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>

<script>
        $(document).ready(function(){
            var dataTable=$('#example').DataTable({
                'autoWidth' : false,
                "processing": true,
                "serverSide": true,
                "ajax":{
                    url:"issuedsupplies/getIssuedSupplies",
                    type:"post"
                }
            });
        });
    </script>
</body>
</html>

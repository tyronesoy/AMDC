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
<!DOCTYPE html>
<html>
<head>
  <title>Business Manager | Dashboard</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="assets/bower_components/chart.js/chart.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="assets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <script src="../assets/jquery/jquery-1.12.4.js"></script>
<!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />-->
  <!-- Select2 -->
  <link rel="stylesheet" href="../bower_components/select2/dist/css/select2.min.css">
    <!-- datatable lib -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

   <!-- DataTables -->
  <link rel="stylesheet" href="assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <link rel="stylesheet" href="assets/dist/css/w3css.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php  
      if(isset($_SESSION['logged_in']))  
      {  
           echo 'dashboard';
      }  
      else if(!isset($_SESSION['logged_in'])) 
      {?>  
           <script>window.location.href = "BusinessManager/lockscreen"</script>
           <?php    
      }  
      ?>

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
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <li class="user user-menu">
                <a class="dropdown-toggle">
                    <span class="hidden-xs" id="demo"></span>
                    <script>
                        var d = new Date().toString();
                        d=d.split(' ').slice(0, 6).join(' ');
                        document.getElementById("demo").innerHTML = d;
                    </script>
                </a>
            </li>
          <!-- Messages: style can be found in dropdown.less-->
                   
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
              <img src="assets/dist/img/user2-128x128.png" class="user-image" alt="User Image">
              <span class="hidden-xs">Hi! <?php echo ( $this->session->userdata('fname'));?>  <?php echo ( $this->session->userdata('lname'));?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="assets/dist/img/user2-128x128.png" class="img-circle" alt="User Image">

                <p>
                 <?php echo ( $this->session->userdata('fname'));?>  <?php echo ( $this->session->userdata('lname'));?>
                  <small> Business Manager </small>
                </p>
                </li>
              <!-- Menu Footer-->
              <li class="user-footer">
            
                <div class="pull-right">
                  <a href="<?php echo 'logout' ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          </ul>
      </div>
    </nav>
  </header>
    <div class="modal fade" id="modal-default">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Change Password</h4>
                                  </div>
                                  <div class="modal-body">
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
                                  <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                                         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-warning">Save Password</button>
                                  </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
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
                            <!-- /.modal -->
                            
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="assets/dist/img/user2-128x128.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo ( $this->session->userdata('fname'));?>  <?php echo ( $this->session->userdata('lname'));?></p>
          <a href="#"><i class="fa fa-circle text-success"></i>Active</a>
        </div>
      </div>

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Inventory Management System</li>
  <!---------------------------------------------------- DASHBOARD MENU -------------------------------------------------------------->
        <li class= "active">
          <a href="<?php echo 'dashboard' ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
          
    <!---------------------------------------------------- MANAGE ACCOUNTS MENU -------------------------------------------------------------->
        <li>
          <a href="<?php echo 'BusinessManager/userAccounts' ?>">
              <i class="fa fa-group"></i> <span>Manage Accounts</span> </a>
        </li>
    <!---------------------------------------------------- SUPPLIES MENU -------------------------------------------------------------->
         <li class="treeview">
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
                <li><a href="<?php echo 'BusinessManager/medicalSupplies' ?>"><i class="fa fa-medkit"></i>Medical Supplies</a></li>
                <li class="treeview">
                  <li><a href="<?php echo 'BusinessManager/officeSupplies' ?>"><i class="fa fa-circle-o"></i>Office Supplies</a></li>
                </li>
              </ul>
            </li>
            <li><a href="<?php echo 'BusinessManager/issuedSupplies' ?>"><i class="fa fa-briefcase"></i>Issued Supplies</a></li>
			<li><a href="<?php echo 'BusinessManager/departmentsOrder' ?>"><i class="fa fa-list"></i>Deparments Order</a></li>
			<li><a href="<?php echo 'BusinessManager/purchases' ?>"><i class="fa fa-shopping-cart"></i>Purchase</a></li>
			<li><a href="<?php echo 'BusinessManager/deliveries' ?>"><i class="fa fa-truck"></i>Delivery</a></li>
          </ul>
        </li>
    <!---------------------------------------------------- SUPPLIERS MENU -------------------------------------------------------------->
        <li>
          <a href="<?php echo 'BusinessManager/suppliers' ?>">
            <i class="fa fa-user"></i> <span>Suppliers</span>
          </a>
        </li>
    <!---------------------------------------------------- DEPARTMENTS MENU -------------------------------------------------------------->
		<li>
          <a href="<?php echo 'BusinessManager/departments' ?>">
            <i class="fa fa-building"></i> <span>Departments</span>
          </a>
        </li>
    <!---------------------------------------------------- CALENDAR MENU -------------------------------------------------------------->
		<li>
          <a href="<?php echo 'BusinessManager/memo' ?>">
            <i class="fa fa-tasks"></i> <span>Memo</span>
          </a>
        </li>
    
    <!---------------------------------------------------- INVOICE MENU -------------------------------------------------------------->
        <li>
          <a href="<?php echo 'BusinessManager/logs' ?>">
            <i class="fa fa-print"></i> <span>Logs</span>
          </a>
        </li>
          <!---------------------------------------------------- LOCKSCREEN MENU -------------------------------------------------------------->
        <li>
          <a href="<?php echo 'BusinessManager/lockscreen' ?>">
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
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php
                    $conn =mysqli_connect("localhost","root","", "itproject") or die('Error connecting to MySQL server.');
          $pdo = new PDO("mysql:host=localhost;dbname=itproject","root","");
                  $sql = "SELECT COUNT(*) AS total FROM supplies JOIN suppliers WHERE quantity_in_stock <= reorder_level+10";
                  $result = $conn->query($sql);    
              ?>
                <?php if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) { ?>
                    <h3><?php echo $row["total"]; ?></h3>
                  <?php 
                      }
                    }
                  ?>

              <p>Reorder Supplies</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <button onclick="myFunction('Demo1')" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></button>
          </div>
        </div>
        <!-- ./col -->
          
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <?php
                    $conn =mysqli_connect("localhost","root","", "itproject") or die('Error connecting to MySQL server.');
          //$pdo = new PDO("mysql:host=localhost;dbname=itproject","root","");
                  $sql = "SELECT COUNT(*) as total FROM returns INNER JOIN supplies ON supplies_id = supply_id INNER JOIN suppliers ON returns.supplier_id = suppliers.supplier_id INNER JOIN purchase_orders USING(po_id) WHERE return_status ='Pending'";
                  $result = $conn->query($sql);    
              ?>
                <?php if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) { ?>
                    <h3><?php echo $row["total"]; ?></h3>
                  <?php 
                      }
                    }
                  ?>

              <p>Returned Supplies</p>
            </div>
            <div class="icon">
              <i class="ion ion-cube"></i>
            </div>
            <button onclick="myFunction2('Demo2')" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></button>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <?php
                  $conn =mysqli_connect("localhost","root","", "itproject") or die('Error connecting to MySQL server.');
          $pdo = new PDO("mysql:host=localhost;dbname=itproject","root","");
                  $date = date("Y/m/d");
                  $sql = "SELECT COUNT(*) AS total FROM supplies JOIN suppliers WHERE expiration_date <= '$date' && soft_deleted='N'";
                  $result = $conn->query($sql);    
                ?>
                <?php if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) { ?>
                    <h3><?php echo $row["total"]; ?></h3>
                  <?php 
                      }
                    }
                  ?>

              <p>Expired Supplies</p>
            </div>
            <div class="icon">
              <i class="ion ion-alert-circled"></i>
            </div>
            <button onclick="myFunction3('Demo3')" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></button>
          </div>
        </div>
        <!-- ./col -->
          
          <!-- TABLE FOR HIDDEN REORDER SUPPLIES TABLE -->
          <div id="Demo1" class="box-body w3-hide">
                <table id="example1" class="table table-bordered table-striped">
                <?php
                  $conn =mysqli_connect("localhost","root","", "itproject") or die('Error connecting to MySQL server.');
          $pdo = new PDO("mysql:host=localhost;dbname=itproject","root","");
                  $sql = "SELECT supply_type, supply_description, brand_name, quantity_in_stock, unit, reorder_level, company_name FROM supplies JOIN suppliers WHERE quantity_in_stock <= reorder_level+10";
                  $result = $conn->query($sql);    
                ?>
                <thead> 
                <tr>
                  <th>Supply Type</th>
                  <th>Brandname</th>
                  <th>Description</th>
                  <th>Supplier</th>
                  <th>Quantity in Stock</th>
                  <th>Unit</th>
                  <th>Reorder Level</th>
                </tr>
                </thead>
                <tbody>
                <?php if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) { ?>
                    <tr>
                    <td><?php echo $row["supply_type"]; ?></td>
                    <td><?php echo $row["brand_name"]; ?></td>
                    <td><?php echo $row["supply_description"]; ?></td>
                    <td><?php echo $row["company_name"]; ?></td>
                    <td><?php echo $row["quantity_in_stock"]; ?></td>
                    <td><?php echo $row["unit"]; ?></td>
                    <td><?php echo $row["reorder_level"]; ?></td>
                    </tr>
                  <?php 
                      }
                    }
                  ?>
                </tbody>
                <tfoot>
                   <tr>
                  <th>Supply Type</th>
                  <th>Brandname</th>
                  <th>Description</th>
                  <th>Supplier</th>
                  <th>Quantity in Stock</th>
                  <th>Unit</th>
                  <th>Reorder Level</th>
                </tr> 
                </tfoot>
              </table>
          </div>
          <!-- TABLE FOR HIDDEN RETURNED SUPPLIES TABLE -->
          <div id="Demo2" class="box-body w3-hide">
              <table id="example3" class="table table-bordered table-striped">
                <?php
                  $conn =mysqli_connect("localhost","root","", "itproject") or die('Error connecting to MySQL server.');
          $pdo = new PDO("mysql:host=localhost;dbname=itproject","root","");
                  $sql = "SELECT supplies.supply_type, return_date, supply_description, brand_name, company_name, quantity_in_stock, unit, reason FROM returns INNER JOIN supplies ON supplies_id = supply_id INNER JOIN suppliers ON returns.supplier_id = suppliers.supplier_id INNER JOIN purchase_orders USING(po_id) WHERE return_status ='Pending'";
                  $result = $conn->query($sql);    
                ?>
                <thead>
                <tr>
                  <th>Supply Type</th>
                  <th>Date Returned</th>
                  <th>Description</th>
                  <th>Brandname</th>
                  <th>Supplier</th>
                  <th>Quantity</th>
                  <th>Unit</th>
                  <th>Reason</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <?php if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) { ?>
                    <tr>
                      <td><?php echo $row["supply_type"]; ?></td>
                      <td><?php echo $row["return_date"]; ?></td>
                      <td><?php echo $row["supply_description"]; ?></td>
                      <td><?php echo $row["brand_name"]; ?></td>
                      <td><?php echo $row["company_name"]; ?></td>
                      <td><?php echo $row["quantity_in_stock"]; ?></td>
                      <td><?php echo $row["unit"]; ?></td>
                      <td><?php echo $row["reason"]; ?></td>
                      <td>
                          
                        <form action="return.php" method="get">
                          <input type="text" name="returnSupp" hidden value="">
                          <button type="submit" class="btn btn-success">Returned </button>
                        </form> 
                      </td>
                    </tr>
                  <?php 
                      }
                    }
                  ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Supply Type</th>
                    <th>Date Returned</th>
                    <th>Description</th>
                    <th>Brandname</th>
                    <th>Supplier</th>
                    <th>Quantity</th>
                    <th>Unit</th>
                    <th>Reason</th>
                    <th></th>
                  </tr> 
                </tfoot>
              </table>
          </div>
          <!-- TABLE FOR HIDDEN EXPIRED SUPPLIES TABLE ------>
          <div id="Demo3" class="box-body w3-hide">
              <table id="example5" class="table table-bordered table-striped">
                <?php
                  $conn =mysqli_connect("localhost","root","", "itproject") or die('Error connecting to MySQL server.');
          $pdo = new PDO("mysql:host=localhost;dbname=itproject","root","");
                  $date = date("Y/m/d");
                  $sql = "SELECT supply_id, expiration_date, supply_description, brand_name, company_name, quantity_in_stock, unit, soft_deleted FROM supplies JOIN suppliers WHERE expiration_date <= '$date' && soft_deleted='N' GROUP BY expiration_date";
                  $result = $conn->query($sql);    
                ?>
                <thead>
                <tr>
                  <th>Expiration Date</th>
                  <th>Description</th>
                  <th>Brandname</th>
                  <th>Supplier</th>
                  <th>Quantity</th>
                  <th>Unit</th>
                  <th>Shelf Life</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                  <?php if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) { ?>
                    <tr>
                      <td><?php echo $row["expiration_date"]; ?></td>
                      <td><?php echo $row["supply_description"]; ?></td>
                      <td><?php echo $row["brand_name"]; ?></td>
                      <td><?php echo $row["company_name"]; ?></td>
                      <td><?php echo $row["quantity_in_stock"]; ?></td>
                      <td><?php echo $row["unit"]; ?></td>
                      <td>
                         
                        <form action="BusinessManager/dispose" method="get">
                          <input type="text" name="disposeSupp" hidden value="<?php echo $row["supply_id"]; ?>">
                          <button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-trash">&nbsp;</i>Disposed </button>
                        </form> 
                      </td>
                    </tr>
                  <?php 
                      }
                    }
                  ?>
                </tbody>
                <tfoot>
                  <tr>
                      <th>Expiration Date</th>
                      <th>Description</th>
                      <th>Brandname</th>
                      <th>Supplier</th>
                      <th>Quantity</th>
                      <th>Unit</th>
                      <th>Shelf Life</th>
                      <th></th>
                  </tr> 
                </tfoot>
              </table>
          </div>
        

        <section class="content">
        <h3>Total Expenses per Department</h3>
        
          <!-- BAR CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
                Legend: <i class="fa fa-square text-red"></i> Medical Supplies
                <i class="fa fa-square text-blue"></i> Office Supplies

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart" style="height:300px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
            <div class="col-md-6">
          <!-- DONUT CHART -->
        <h3>Top 10 used supplies</h3>
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Medical Supplies</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                 <?php
                    $conn =mysqli_connect("localhost","root","", "itproject") or die('Error connecting to MySQL server.');
          //$pdo = new PDO("mysql:host=localhost;dbname=itproject","root","");
                    $sql = "SELECT supply_description, quantity_ordered FROM request_supplies inner join supplies using (supply_id) WHERE supply_type='Medical' ORDER BY quantity_ordered DESC LIMIT 10";
                    $result = $conn->query($sql);    
                  ?>
                 <thead>
                        <tr>
                            <th>Description</th>
                            <th>Total Quantity Used</th>
                        </tr>
                 </thead>
                    <tbody>
                      <?php if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) { ?>
                        <tr>
                        <td><?php echo $row["supply_description"]; ?></td>
                        <td><?php echo $row["quantity_ordered"]; ?></td>
                       <!--  <td><?php // echo $row[""]; ?></td>
                        <td><?php // echo $row[""]; ?></td>
                        <td><?php // echo $row[""]; ?></td>
                        <td><?php // echo $row[""]; ?></td>
                        <td><center><input type="checkbox"></center></td> -->
                        </tr>
                      <?php 
                          }
                        }
                      ?>
                    </tbody>
              </table>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
        <!-- /.col (LEFT) -->
          
        <div class="col-md-6">

         
        <!-- DONUT CHART -->
            <h3>&nbsp;</h3>
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Office Supplies</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                 <?php
                    $conn =mysqli_connect("localhost","root","", "itproject") or die('Error connecting to MySQL server.');
          //$pdo = new PDO("mysql:host=localhost;dbname=itproject","root","");
                    $sql = "SELECT supply_description, quantity_ordered FROM request_supplies inner join supplies using (supply_id) WHERE supply_type='Office' ORDER BY quantity_ordered DESC LIMIT 10 ";
                    $result = $conn->query($sql);    
                  ?>
                 <thead>
                        <tr>
                            <th>Description</th>
                            <th>Total Quantity Used</th>
                        </tr>
                 </thead>
                    <tbody>
                      <?php if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) { ?>
                        <tr>
                        <td><?php echo $row["supply_description"]; ?></td>
                        <td><?php echo $row["quantity_ordered"]; ?></td>
                       <!--  <td><?php // echo $row[""]; ?></td>
                        <td><?php // echo $row[""]; ?></td>
                        <td><?php // echo $row[""]; ?></td>
                        <td><?php // echo $row[""]; ?></td>
                        <td><center><input type="checkbox"></center></td> -->
                        </tr>
                      <?php 
                          }
                        }
                      ?>
                    </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (RIGHT) -->
    </section>
    <!-- /.content -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
      
      <!--Main Content -->
      <!-- BAR CHARTS -->
      
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

<!-- jQuery 3 -->
<script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="assets/bower_components/raphael/raphael.min.js"></script>
<script src="assets/bower_components/chart.js/chart.min.js"></script>
<!-- Sparkline -->
<script src="assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="assets/bower_components/moment/min/moment.min.js"></script>
<script src="assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    
<!-- ITO ANG LEGIT NA JAVASCRIPT NG CHARTS -->
<!-- ChartJS -->
<script src="assets/bower_components/Chart.js/Chart.js"></script>

<!-- page script -->

<script>
setTimeout(onUserInactivity, 1000 * 300)
function onUserInactivity() {
  <?php unset($_SESSION['logged_in']);
  if(!isset($_SESSION['logged_in'])) { ?>
    window.location.href = "BusinessManager/lockscreen"
   <?php } ?>
}
</script>

<!-- <script type="text/javascript">
setTimeout(onUserInactivity, 1000 * 120)
function onUserInactivity() {
   window.location.href = "<?php //echo 'BusinessManager/lockscreen'?>"
}
</script> -->
<!-- <?php
//$time = $_SESSION['Time'];
//$time_check=$time-120;
//if($time<$time_check) {
//  $_SESSION['login'] = 'False';
//  if($_SESSION['login'] == 'False'){
//    echo '<script>window.location.href="<?php echo "BusinessManager/lockscreen" ?>"</script>';
  }
}
  ?> -->
<!-- <script type="text/javascript">
inactivityTimeout = False
resetTimeout()
function onUserInactivity() {
   window.location.href = "lockscreen"
}
function resetTimeout() {
   clearTimeout(inactivityTimeout)
   inactivityTimeout = setTimeout(onUserInactivity, 1000 * 120)
}
window.onmousemove = resetTimeout
</script> -->
<!--- CHARTS -->
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    // This will get the first returned node in the jQuery collection.
    var barChart       = new Chart(barChartCanvas)

    var barChartData = {
      labels  : ['Cardiac, BC', 'Endoscopy, BC', 'Imaging, BC', 'Laboratory, BC', 'Management, BC', 'Imaging, LT', 'Laboratory, LT', 'Endoscopy, SLU H'],
      datasets: [
        {
          label               : 'Medical Supplies',
          fillColor           : 'rgb(242, 65, 65)',
          strokeColor         : 'rgb(242, 65, 65)',
          pointColor          : 'rgb(242, 65, 65)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [320000, 360000, 110000, 510000, 440000, 480000, 290000, 680000]
        },
        {
          label               : 'Office Supplies',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [280000, 480000, 470000, 190000, 150000, 340000, 670000, 600000]
        }
      ]
      
    }

    var barChartOptions = {
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : false,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot                : false,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : true,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }

    //Create the line chart
    barChart.Bar(barChartData, barChartOptions)

    
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
      {
        value    : 700,
        color    : '#f56954',
        highlight: '#f56954',
        label    : 'Face Mask'
      },
      {
        value    : 500,
        color    : '#00a65a',
        highlight: '#00a65a',
        label    : 'Hand Gloves'
      },
      {
        value    : 400,
        color    : '#f39c12',
        highlight: '#f39c12',
        label    : '5CC Syringe'
      },
      {
        value    : 600,
        color    : '#00c0ef',
        highlight: '#00c0ef',
        label    : '3CC Syringe'
      },
      {
        value    : 300,
        color    : '#3c8dbc',
        highlight: '#3c8dbc',
        label    : 'Red Tap Tubes'
      },
      {
        value    : 100,
        color    : '#d2d6de',
        highlight: '#d2d6de',
        label    : 'Violet Tap Tubes'
      }
    ]
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)

          //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart2').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
      {
        value    : 700,
        color    : '#f56954',
        highlight: '#f56954',
        label    : 'Ballpen'
      },
      {
        value    : 500,
        color    : '#00a65a',
        highlight: '#00a65a',
        label    : 'Masking Tape'
      },
      {
        value    : 400,
        color    : '#f39c12',
        highlight: '#f39c12',
        label    : 'Logbook'
      },
      {
        value    : 600,
        color    : '#00c0ef',
        highlight: '#00c0ef',
        label    : 'Short Bond Paper'
      },
      {
        value    : 300,
        color    : '#3c8dbc',
        highlight: '#3c8dbc',
        label    : 'Marker'
      },
      {
        value    : 100,
        color    : '#d2d6de',
        highlight: '#d2d6de',
        label    : 'Carbon Paper'
      }
    ]
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)
      
    //-------------
    //- BAR CHART 1 -
    //-------------
    var barChartCanvas                   = $('#barChart1').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = barChartData
    barChartData.datasets[1].fillColor   = '#00a65a'
    barChartData.datasets[1].strokeColor = '#00a65a'
    barChartData.datasets[1].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
      
    //-------------
    //- BAR CHART 2 -
    //-------------
    var barChartCanvas                   = $('#barChart2').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = barChartData
    barChartData.datasets[1].fillColor   = '#00a65a'
    barChartData.datasets[1].strokeColor = '#00a65a'
    barChartData.datasets[1].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
      
       //-------------
    //- BAR CHART 3 -
    //-------------
    var barChartCanvas                   = $('#barChart3').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = barChartData
    barChartData.datasets[1].fillColor   = '#00a65a'
    barChartData.datasets[1].strokeColor = '#00a65a'
    barChartData.datasets[1].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
  })
</script>

<!-- SCRIPT ON HIDDEN TABLES -->
<script>
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>
<script>
function myFunction2(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>
<script>
function myFunction3(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>
    
<!-- DATA TABLES -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })

    $('#example3').DataTable()
    $('#example4').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
    $('#example5').DataTable()
    $('#example6').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })

  })
</script>
</body>
</html>

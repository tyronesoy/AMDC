<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Assistant | Issued Supplies</title>
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
    <a href="<?php echo '../dashboard' ?>" class="logo">
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
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../assets/dist/img/assistant.png" class="user-image" alt="User Image">
              <span class="hidden-xs">Hi! <?php echo ( $this->session->userdata('fname'));?>  <?php echo ( $this->session->userdata('lname'));?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../assets/dist/img/assistant.png" class="img-circle" alt="User Image">

                <p>
                 <?php echo ( $this->session->userdata('fname'));?>  <?php echo ( $this->session->userdata('lname'));?>
                  <small>Assistant</small>
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
          <img src="../assets/dist/img/assistant.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo ( $this->session->userdata('fname'));?>  <?php echo ( $this->session->userdata('lname'));?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Active</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Inventory System</li>
	<!---------------------------------------------------- DASHBOARD MENU -------------------------------------------------------------->
        <li>
          <a href="<?php echo '../dashboard' ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
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
		<!---------------------------------------------------- MEMO MENU -------------------------------------------------------------->
        <li>
          <a href="<?php echo 'memo' ?>">
            <i class="fa fa-calendar"></i> <span>Memo</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
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
          <b>Issued Supplies</b>
        <!-- <small>Supplies</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Issued Supplies</a></li>
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
                  <?php
                    $conn =mysqli_connect("localhost","root","", "itproject") or die('Error connecting to MySQL server.');
                    $sql = "SELECT * FROM issuedsupplies";
                    $result = $conn->query($sql);    
                  ?>
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
                <?php if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) { ?>
                    <tr>
                      <td><?php echo $row["request_date"]; ?></td>
                      <td><?php echo $row["issued_date"]; ?></td>
                      <td><?php echo $row["supply_type"]; ?></td>
                      <td><?php echo $row["supply_description"]; ?></td>
                      <td><?php echo $row["quantity_in_stock"]; ?></td>
                      <td><?php echo $row["department_name"]; ?></td>
                    </tr>
                  <?php 
                      }
                    }
                  ?>
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
      $(function () {
        $('#example').DataTable()
        $('#example1').DataTable({
          'paging'      : true,
          'lengthChange': false,
          'searching'   : false,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : false
        })


      })
    </script>

<!-- <script>
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
    </script> -->
</body>
</html>

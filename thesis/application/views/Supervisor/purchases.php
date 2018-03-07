<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Supervisor | Data</title>
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
    <!-- daterange picker -->
  <link rel="stylesheet" href="../assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">

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
                            var d = new Date().toString();
                          d=d.split(' ').slice(0, 6).join(' ');
                          document.getElementById("demo").innerHTML = d;
                        </script>
                    </a>
                </li>
         
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../assets/dist/img/user2-128x128.png" class="user-image" alt="User Image">
                <span class="hidden-xs">Supervisor</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../assets/dist/img/user2-128x128.png" class="img-circle" alt="User Image">

                <p>
                 Supervisor
                  <small>Member since Oct. 2017</small>
                </p>
              </li>
              <!-- Menu Footer-->
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
          <p>Supervisor</p>
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

        <!--------------------------------------------------- ISSUED SUPPLIES -------------------------------------------------->
            <li><a href="<?php echo 'issuedSupplies' ?>">
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
          <b>Purchases</b>
        <!-- <small>Supplies</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Ordered Supplies</a></li>
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
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Suppliers
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                          <li><a href="#">Mercury Drug</a></li>
                          <li><a href="#">St. Joseph Drugstore</a></li>
                          <li><a href="#">Jet Bookstore</a></li>
                          <li><a href="#">Eva Goods</a></li>
                          <li><a href="#">Watsons</a></li>
                          <li><a href="#">Curamed Pharmacy</a></li>
                          <li><a href="#">National Bookstore</a></li>
                          <li><a href="#">Panghaoi</a></li>
                          <li><a href="#">Generic's Pharmacy</a></li>
                        </ul>
                      </div></th>
                    </tr>
                </table>  
                
            </div>
            <!-- /.box-header -->
              
           <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Order Date</th>
                  <th>Order Time</th>
                  <th>Description</th>
                  <th>Quantity</th>
                  <th>Unit</th>
                  <th>Delivery Date</th>
                  <th>Delivery Time</th>
                  <th>Unit Price</th>
                  <th>Total Amount</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>2016-05-11</td>
                  <td>11:34 A.M.</td>
                  <td>Red Tap Tubes </td>
                  <td>500</td>
                  <td>pieces</td>
                  <td>2016-05-12</td>
                  <td>09:34 A.M.</td>
                  <td align="right">&#8369; 100.00</td>
                  <td align="right">&#8369; 5000.00</td>
                  <td>
                    <center><input type="checkbox"></center>
                  </td>
                </tr>
                    
                <tr>
                  <td>2016-03-03</td>
                  <td>03:20 P.M.</td>
                  <td>Violet Tap Tubes</td>
                  <td>500</td>
                  <td>pieces</td>
                  <td>2016-03-14</td>
                  <td>09:00 A.M.</td>
                  <td align="right">&#8369; 100.00</td>
                  <td align="right">&#8369; 5000.00</td>
                  <td>
                    <center><input type="checkbox"></center>
                  </td>
                </tr>
                
                <tr>
                  <td>2016-12-15</td>
                  <td>04:00 P.M.</td>
                  <td>CD</td>
                  <td>500</td>
                  <td>pieces</td>
                  <td>2016-12-30</td>
                  <td>08:00 A.M.</td>
                  <td align="right">&#8369; 30.00</td>
                  <td align="right">&#8369; 15000.00 </td>
                  <td>
                    <center><input type="checkbox"></center>
                  </td>
                </tr>
                <tr>
                  <td>2017-02-28</td>
                  <td>02:30 P.M.</td>
                  <td>Face Mask</td>
                  <td>30</td>
                  <td>boxes</td>
                  <td>2017-03-07</td>
                  <td>09:36 A.M.</td>
                  <td align="right">&#8369; 120.00</td>
                  <td align="right">&#8369; 3600.00</td>
                  <td>
                    <center><input type="checkbox"></center>
                  </td>
                </tr><tr>
                  <td>2016-12-18</td>
                  <td>09:31 A.M.</td>
                  <td>Bond Paper</td>
                  <td>10</td>
                  <td>rims</td>
                  <td>2016-12-30</td>
                  <td>11:30 A.M.</td>
                  <td align="right">&#8369; 170.00</td>
                  <td align="right">&#8369; 1700.00</td>
                  <td>
                    <center><input type="checkbox"></center>
                  </td>
                </tr>
                <tr>
                  <td>2017-09-15</td>
                  <td>10:56 A.M.</td>
                  <td>INK</td>
                  <td>10</td>
                  <td>carts</td>
                  <td>2017-09-25</td>
                  <td>03:03 P.M.</td>
                  <td align="right">&#8369; 400.00</td>
                  <td align="right">&#8369; 4000.00</td>
                  <td>
                    <center><input type="checkbox"></center>
                  </td>
                </tr>
                <tr>
                  <td>2017-10-17</td>
                  <td>09:01 A.M.</td>
                  <td>Marker</td>
                  <td>10</td>
                  <td>boxes</td>
                  <td>2017-10-28</td>
                  <td>03:29 P.M.</td>
                  <td align="right">&#8369; 80.00</td>
                  <td align="right">&#8369; 800.00</td>
                  <td>
                    <center><input type="checkbox"></center>
                  </td>
                </tr>
                <tr>
                  <td>2017-04-15</td>
                  <td>07:56 A.M.</td>
                  <td>5CC Syringe</td>
                  <td>100</td>
                  <td>pieces</td>
                  <td>2017-04-26</td>
                  <td>02:39 P.M.</td>
                  <td align="right">&#8369; 230.00</td>
                  <td align="right">&#8369; 23,000.00</td>
                  <td>
                    <center><input type="checkbox"></center>
                  </td>
                </tr>
                <tr>
                  <td>2016-07-20</td>
                  <td>08:30 A.M.</td>
                  <td>3CC Syringe</td>
                  <td>100</td>
                  <td>pieces</td>
                  <td>2016-07-28</td>
                  <td>09:23 A.M.</td>
                  <td align="right">&#8369; 220.00</td>
                  <td align="right">&#8369; 22,000.00</td>
                  <td>
                    <center><input type="checkbox"></center>
                  </td>
                </tr>
                <tr>
                  <td>2017-07-28</td>
                  <td>05:00 P.M.</td>
                  <td>Hand Gloves</td>
                  <td>20</td>
                  <td>boxes</td>
                  <td>2017-08-09</td>
                  <td>12:30 P.M.</td>
                  <td align="right">&#8369; 110.00</td>
                  <td align="right">&#8369; 2200.00</td>
                  <td>
                    <center><input type="checkbox"></center>
                  </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Order Date</th>
                  <th>Order Time</th>
                  <th>Description</th>
                  <th>Quantity</th>
                  <th>Unit</th>
                  <th>Delivery Date</th>
                  <th>Delivery Time</th>
                  <th>Unit Price</th>
                  <th>Total Amount</th>
                  <th></th>
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
          <a href="../examples/invoice-print5.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
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
<script href="../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script href="../assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script href="../assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script href="../assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script href="../assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script href="../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script href="../assets/dist/js/demo.js"></script>
<!-- Select2 -->
<script href="../assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script href="../assets/plugins/input-mask/jquery.inputmask.js"></script>
<script href="../assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script href="../assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script href="../assets/bower_components/moment/min/moment.min.js"></script>
<script href="../assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script href="../assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script href="../assets/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script href="../assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- AdminLTE App -->
<script href="../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script href="../assets/dist/js/demo.js"></script>
<!-- page script -->
<script>
<!-- date and time -->
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
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
  })
</script>
<script>
<!-- date and time -->
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime2').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
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
  })
</script>
</body>
</html>
assets/
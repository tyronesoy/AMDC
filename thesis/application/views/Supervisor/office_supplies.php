<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Supervisor | Office Supplies</title>
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
      <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../assets/plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
  <link rel="stylesheet" href="../assets/bower_components/select2/dist/css/select2.min.css">

   <!-- datatable lib -->
    
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

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
    <a href="<?php echo 'dashboard' ?>"class="logo">
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
              <img src="../assets/dist/img/user5-128x128.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo ( $this->session->userdata('fname'));?>  <?php echo ( $this->session->userdata('lname'));?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../assets/dist/img/user5-128x128.png" class="img-circle" alt="User Image">

                <p>
                 <?php echo ( $this->session->userdata('fname'));?>  <?php echo ( $this->session->userdata('lname'));?>
                  <small>Supervisor</small>
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
          <img src="../assets/dist/img/user5-128x128.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo ( $this->session->userdata('fname'));?>  <?php echo ( $this->session->userdata('lname'));?></p>
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
	<!-- DASHBOARD MENU -->
         <li>
          <a href="<?php echo '../dashboard' ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>

		<!-- SUPPLIES MENU -->
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-briefcase"></i> <span>Supplies</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="<?php echo 'medicalSupplies' ?>"><i class= "fa fa-medkit"></i> Medical Supplies</a></li>
			<li class ="active"><a href="<?php echo 'officeSupplies' ?>"><i class="fa fa-pencil-square-o"></i> Office Supplies</a></li>
          </ul>
        </li>
 
        <!-- ISSUED SUPPLIES -->
            <li><a href="<?php echo 'issuedsupplies' ?>">
                <i class="fa fa-truck"></i><span>Issued Supplies</span> 
                </a>
          </li>
		<!-- SUPPLIERS MENU -->
        <li>
          <a href="<?php echo 'suppliers' ?>">
            <i class="fa fa-user"></i> <span>Suppliers</span>
          </a>
        </li>
		      <!--------------------------------------------------- PURCHASES -------------------------------------------------->
          <li >
              <a href="<?php echo 'purchases' ?>">
                  <i class="fa fa-tags"></i><span>Orders</span>  
              </a>
          </li>
		<!-- DEPARTMENTS MENU -->
        <li>
          <a href="<?php echo 'departments' ?>">
            <i class="fa fa-building"></i> <span>Departments</span>
          </a>
        </li>

<!-- LOCKSCREEN MENU -->
        <li>
          <a href="../examples/lockscreen.html">
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
          <b>Office Supplies</b>
        <!-- <small>Supplies</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo 'dashboard' ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="#">Supplies</li>
		<li><a href="<?php echo 'officeSupplies' ?>">Office Supplies</a></li>
       
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
                          <option><b>All Supplies</b></option>
							<option value="officeSuppliesTotalQuantity"><a href="<?php echo 'officeSupplies' ?>">Total Quantity</a></option>
                        </select>
                      </div></th>
                    </tr>
                </table> 
                
            </div>
              
      <div class="box-body">
        <table id="example" class="table table-bordered table-striped">
         
          <thead>
            <tr>
             <!-- <th>Date Received</th>
                  <th>Time Received</th> -->
                  <th>Expiration Date</th> 
                  <th>Description</th>
                  <th>Quantity in Stock</th>
                  <th>Unit</th>
                  <th>Unit Price</th>
             <!-- <th>Total Amount</th> -->
<!--
                  <th>Reorder Level</th>
                  <th>Good Condition</th>
                  <th>Damaged</th>
-->
<!--                  <th style="width:12.5%;"> Action</th> -->
            </tr>
        </thead>
        
        <tfoot>
           <tr>
             <!-- <th>Date Received</th>
                  <th>Time Received</th> -->
                  <th>Expiration Date</th> 
                  <th>Description</th>
                  <th>Quantity in Stock</th>
                  <th>Unit</th>
                  <th>Unit Price</th>
             <!-- <th>Total Amount</th> -->
<!--
                  <th>Reorder Level</th>
                  <th>Good Condition</th>
                  <th>Damaged</th>
-->
<!--                  <th> Action</th> -->
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
            <!--- PRINT AND PDF -->
              <div class="row no-print">
        <div class="col-xs-12">
          <button type="button" class="btn btn-default pull-right" style="margin-right: 1px;"><i class="fa fa-print"></i>
            <a href="../examples/officeSuppliesPrint.php"> Print</a>
          </button>

<!--
          <a href="officeSuppliesRecover" style="color:white;"><button type="button" class="btn btn-primary pull-left" style="margin-right: 1px;"><i class="fa fa-repeat"></i> Recover
          </a>
          </button>
-->
        </div>
      </div>
        <!-- END OF PRINT AND PDF -->
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
 

<script>
 // date and time 
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format : 'yyyy-mm-dd'
    })
    //Date picker
    $('#datepicker2').datepicker({
      autoclose: true,
      format : 'yyyy-mm-dd'
    })
    //Date picker
    $('#datepicker3').datepicker({
      autoclose: true,
      format : 'yyyy-mm-dd'
    })
      
    $('#datepicker4').datepicker({
      autoclose: true,
      format : 'yyyy-mm-dd'
    })
    //Timepicker
   /* $('.timepicker').timepicker({
      showInputs: false,
      format    : '%h:%i:%s %p'
    }) */
  }) 
</script>

<!--create modal dialog for display detail info for edit on button cell click-->
<!--
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div id="content-data"></div>
            </div>
        </div>
-->
   
    <script>
        $(document).ready(function(){
            var dataTable=$('#example').DataTable({
                'autoWidth' : false,
                "processing": true,
                "serverSide": true,
                "ajax":{
                    url:"officesupplies/getOfficeSupplies",
                    type:"post"
                }
            });
        });
    </script>

    <!--script js for get edit data-->
<!--
    <script>
        $(document).on('click','#getEdit',function(e){
            e.preventDefault();
            var per_id=$(this).data('id');
            //alert(per_id);
            $('#content-data').html('');
            $.ajax({
                url:'officesupplies/editOfficeSupplies',
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
-->
<!--

    <script>
        $(document).on('click','#getAdd',function(e){
            e.preventDefault();
            var per_id=$(this).data('id');
            //alert(per_id);
            $('#content-data').html('');
            $.ajax({
                url:'officesupplies/OfficeSuppliesadd',
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
-->
    
    <!--script js for get reconcile data-->
<!--
    <script>
        $(document).on('click','#getRecon',function(e){
            e.preventDefault();
            var per_id=$(this).data('id');
            //alert(per_id);
            $('#content-data').html('');
            $.ajax({
                url:'officeSupplies/reconcileOfficeSupplies',
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
-->

    <!--script js for release data-->
<!--
    <script>
        $(document).on('click','#getDelete',function(e){
            e.preventDefault();
            var per_id=$(this).data('id');
            //alert(per_id);
            $('#content-data').html('');
            $.ajax({
                url:'officesupplies/deleteOfficeSupplies',
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
-->
</body>
</html>

<?php 
$conn=mysqli_connect('localhost','root','','itproject') or die('Error connecting to MySQL server.');
$pdo = new PDO("mysql:host=localhost;dbname=itproject","root","");

//ADD on table FOR Office SUPPLIES
//if(isset($_POST['offAdd'])){
//
//    $sqladd= $conn->prepare("INSERT INTO supplies (quantity_in_stock, good_condition, damaged) VALUES (?, ?, ?)");
//    $addQty = $_POST['addQty'];
//    $addGC  = $_POST['addGC'];
//    $addDam = $_POST['addDam'];
//    $sqladd->bind_param("sss", $addQty, $addGC, $addDam);
//
//    if($sql->execute()) {
//        echo '<script>window.location.href="officeSupplies"</script>';
//        } else {
//        echo '<script>alert("Update Failed")</script>';
//        }
//        $sql->close();   
//        $connection->close();
//} // END OF OFFICE Add on table

//EDIT FOR OFFICE SUPPLIES
//if(isset($_POST['offEdit'])){
//    $new_id=mysqli_real_escape_string($conn,$_POST['txtid']);
//    $new_supplyDescription=mysqli_real_escape_string($conn,$_POST['txtsupplyDescription']);
//    $new_supplyUnit=mysqli_real_escape_string($conn,$_POST['txtUnit']);
//    $new_supplyQuantityInStock=mysqli_real_escape_string($conn,$_POST['txtQuantityInStock']);
//    $new_supplyUnitPrice=mysqli_real_escape_string($conn,$_POST['txtUnitPrice']);
//    $new_supplyReorderLevel=mysqli_real_escape_string($conn,$_POST['txtReorderLevel']);
//    $new_supplyExpirationDate=mysqli_real_escape_string($conn,$_POST['txtExpirationDate']);
//    $new_supplyGoodCondition=mysqli_real_escape_string($conn,$_POST['txtGoodCondition']);
//    $new_supplyDamaged=mysqli_real_escape_string($conn,$_POST['txtDamaged']);
//
//    $sqlupdate="UPDATE supplies SET supply_description='$new_supplyDescription', unit='$new_supplyUnit', quantity_in_stock='$new_supplyQuantityInStock', unit_price='$new_supplyUnitPrice', reorder_level='$new_supplyReorderLevel', expiration_date='$new_supplyExpirationDate', good_condition='$new_supplyGoodCondition', damaged='$new_supplyDamaged' WHERE supply_id='$new_id' ";
//    $result_update=mysqli_query($conn,$sqlupdate);
//
//    if($result_update){
//        echo '<script>window.location.href="officeSupplies"</script>';
//    }
//    else{
//        echo '<script>alert("Update Failed")</script>';
//    }
//} // END OF OFFICE EDIT


//RECONCILE FOR OFFICE SUPPLIES
//if(isset($_POST['offRecon'])){
//    $new_id=mysqli_real_escape_string($conn,$_POST['txtid']);
//    $new_supplyQuantityInStock=mysqli_real_escape_string($conn,$_POST['txtPhysicalCount']);
//    $sqlupdate="UPDATE supplies SET quantity_in_stock='$new_supplyQuantityInStock' WHERE supply_id='$new_id' ";
//    $result_update=mysqli_query($conn,$sqlupdate);
//
//    if($result_update){
//        echo '<script>window.location.href="officeSupplies"</script>';
//    }
//    else{
//        echo '<script>alert("Update Failed")</script>';
//    }
//} // END OF OFFICE RECONCILE
?>

<?php 
$con=mysqli_connect('localhost','root','','itproject') or die('Error connecting to MySQL server.');
$pdo = new PDO("mysql:host=localhost;dbname=itproject","root","");

//SOFT DELETED OFFICE SUPPLIES
//if(isset($_POST['offDelete'])){
//    $new_id=mysqli_real_escape_string($con,$_POST['txtid']);
//    $sqlupdate="UPDATE supplies SET soft_deleted='Y' WHERE supply_id='$new_id' ";
//    $result_update=mysqli_query($con,$sqlupdate);
//
//    if($result_update){
//        echo '<script>window.location.href="officeSupplies"</script>';
//    }
//    else{
//        echo '<script>alert("Update Failed")</script>';
//    }
//} // END OF SOFT DELETE OFFICE SUPPLIES

?>
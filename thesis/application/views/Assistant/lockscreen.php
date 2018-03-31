<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title>Assistant | Lockscreen</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../assets/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../assets/bower_components/chart.js/chart.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../assets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">

   <!-- DataTables -->
  <link rel="stylesheet" href="../assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <link rel="stylesheet" href="../assets/dist/css/w3css.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition lockscreen">

<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
      <a><b>Assumption Medical and Diagnostics Center</b></a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name">Assistant </div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="../assets/dist/img/assistant.png" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" method="get" action="<?php echo 'lockscreen/checklogin' ?>">
      <div class="input-group">
        <input type="text" name="username" placeholder="username" value="<?php echo $_SESSION["username"]; ?>" hidden/>
        <input type="password" name="password" class="form-control" placeholder="Password" required/>

        <div class="input-group-btn">
            <button type="submit" name="login" class="btn"><i class="fa fa-arrow-right text-muted"></i></a></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Enter your password to retrieve your session
  </div>
  <div class="text-center">
    <a href="<?php echo '../logout'?>"><u>Sign in as a Different User</u></a>
  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2017-2018 <br/><b><a href="https://adminlte.io" class="text-black">K.Bigornia, F.Cabalse, <br/>N.Calimlim, J.Calub, <br/>E.Duco, J.Malong, <br/>R.Siapno, T.Soy</a></b><br>
    All rights reserved
  </div>
</div>
<!-- /.center -->

<!-- jQuery 3 -->
<script src="../assests/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../assests/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>

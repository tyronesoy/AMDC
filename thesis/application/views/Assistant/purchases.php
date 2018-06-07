<?php
$connect = new PDO("mysql:host=localhost;dbname=itproject", "root", "");


function supply_dropdown($connect)
{ 
 $output = '';
 $query = "SELECT * FROM supplies WHERE soft_deleted='N' ORDER BY supply_description ASC";
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
<!DOCTYPE html>
<html>
<head>
  <title>Assistant | Purchases</title>
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
  <!-- <script src="../assets/jquery/jquery-1.12.4.js"></script>
  <!- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /> -->
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
      <span class="logo-lg"><img src="../assets/dist/img/amdc2.png" alt="User Image" style="width:160px;height:50px;"></span>
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
        <!--        BELL START-->
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
                        }else if(strpos($logvalue, 'profile') !== false){
                        ?>
                            <td><small><a display="block" style="color:black" href="<?php echo 'Assistant/userAccounts' ?>"><?php echo $row["log_description"];?></a></small></td>
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
          <!--            FLAG START-->
            <?php
                        $conn =mysqli_connect("localhost","root","");
                        mysqli_select_db($conn, "itproject");
                        $sql32 = "SELECT value2 from defaults where attribute = 'expirerange' LIMIT 1";
                        $result32 = $conn->query($sql32);
                          if ($result32->num_rows > 0) {
                            while($row = $result32->fetch_assoc()) {
                                $daysval = $row["value2"];
                                $datenow = strtotime(date("Y/m/d"));
                                $daysval2 = strtotime(date("Y-m-d",strtotime('+'.$daysval.' days')));
                                $daysvalue = $daysval2 - $datenow;
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
                    <center><h5 style="color:B11C1C">No items to display</h5></center>
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
                                <center><h5 style="color:B11C1C">No items to display</h5></center>
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
                            <center><h5 style="color:B11C1C">No items to display</h5></center>
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
              <?php

                        $con = mysqli_connect("localhost","root","","itproject");
                        $q = "SELECT * FROM users WHERE username = '".$this->session->userdata('username')."' ";
                        $result = $con->query($q);

                        while($row = $result->fetch_assoc()){
                   
                                if($row['image'] == ""){
                                        echo "<img width='100' class='user-image' height='100' src='../upload/default2.jpg' alt='Default Profile Pic'>";
                                } else {
                                        echo "<img width='100' height='100'  class='user-image' src='../upload/".$row['image']."' alt='Profile Pic'>";
                                }
                              
                        }
                ?>
              <span class="hidden-xs"><?php echo ( $this->session->userdata('fname'));?> <?php echo ( $this->session->userdata('lname'));?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
               <?php

                        $con = mysqli_connect("localhost","root","","itproject");
                        $q = "SELECT * FROM users WHERE username = '".$this->session->userdata('username')."' ";
                        $result = $con->query($q);

                        while($row = $result->fetch_assoc()){
                   
                                if($row['image'] == ""){
                                        echo "<img width='100' class='img-circle' height='100' src='../upload/default2.jpg' alt='Default Profile Pic'>";
                                } else {
                                        echo "<img width='100' height='100'  class='img-circle' src='../upload/".$row['image']."' alt='Profile Pic'>";
                                }
                              
                        }
                ?>

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
<form name="form1" id="user_form" method="post" action="dashboard/addUser" enctype="multipart/form-data">
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
                                  <center>
                                  <?php

                        $con = mysqli_connect("localhost","root","","itproject");
                        $q = "SELECT * FROM users WHERE username = '".$this->session->userdata('username')."' ";
                        $result = $con->query($q);

                        while($row = $result->fetch_assoc()){
                   
                                if($row['image'] == ""){
                                        echo "<img width='100' class='img-circle' height='100' src='../upload/default2.jpg' alt='Default Profile Pic'>";
                                } else {
                                        echo "<img width='100' height='100'  class='img-circle' src='../upload/".$row['image']."' alt='Profile Pic'>";
                                }
                                echo "<br>";
                        }
                ?>
                <br />
                <input type="file" name="file">
                   <br /></center>
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
                          <input type="email" class="form-control" name="user_email" id="user_email" value="<?php echo $row['user_email'] ?>" required />
                        </div>
                      </div>
                
                       <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Contact Number</label>
                          <input type="text" class="form-control" name="user_contact" id="user_contact" value="<?php echo $row['user_contact'] ?>" pattern="^[0-9]{11}$" required />
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
         <?php

                        $con = mysqli_connect("localhost","root","","itproject");
                        $q = "SELECT * FROM users WHERE username = '".$this->session->userdata('username')."' ";
                        $result = $con->query($q);

                        while($row = $result->fetch_assoc()){
                   
                                if($row['image'] == ""){
                                        echo "<img width='100' class='img-circle' height='100' src='../upload/default2.jpg' alt='Default Profile Pic'>";
                                } else {
                                        echo "<img width='100' height='100'  class='img-circle' src='../upload/".$row['image']."' alt='Profile Pic'>";
                                }
                              
                        }
                ?>
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
                  <a href="<?php echo 'officeSupplies' ?>"><i class="fa fa-pencil-square"></i>Office Supplies</a>
                </li>
              </ul>
            </li>
            <li><a href="<?php echo 'issuedSupplies' ?>"><i class="fa fa-retweet"></i>Issued Supplies</a></li>
      <li><a href="<?php echo 'departmentsOrder' ?>"><i class="fa fa-list"></i>Deparments Order</a></li>
      <li class="active"><a href="<?php echo 'purchases' ?>"><i class="fa fa-shopping-cart"></i>Purchases</a></li>
      <li><a href="<?php echo 'deliveries' ?>"><i class="fa fa-truck"></i>Deliveries</a></li>
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
            <i class="fa fa-shopping-cart"></i><b>Purchase Orders</b>
        <!-- <small>Supplies</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-shopping-cart"></i> Purchases</li>
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
                        <button  type="submit" class="btn btn-default btn-flat" data-toggle="modal" data-target="#printrep">Generate Report</button>
                        <th><button type="submit" class="btn btn-primary btn-block btn-success" data-toggle="modal" data-target="#modal-info"><i class=" fa fa-plus">Add Purchase Order</i></button>
            
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
                                                        <center><h4><b>Add Purchase Order</b></h4></center>
                                                  </div>
                                        <div class="box-body">                                      
                                              <div class="row">
                                              <div class="col-md-12">
                                              <div class="form-group">
                                                  <label for="exampleInputEmail1">Name</label>
                                                  <div class="input-group">
                                                      <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                      </div>
                                                  <input type="text" class="form-control" id="custName" name="custName" value="<?php echo ( $this->session->userdata('fname')); echo' '; echo ( $this->session->userdata('lname'));?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" margin="0px auto" readonly>
                                              </div>
                                              </div>
                                              </div>
                                              </div>

                                              <div class="row">
                                              <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="exampleInputEmail1">Supplier</label>
                                                  <div class="input-group">
                                                      <div class="input-group-addon">       
                                                        <i class="fa fa-group"></i>
                                                      </div>
                                                  <select class="form-group select2" name="supp" style="width:100%" required>
                                                <option value="">Select a Supplier</option>
                                                <?php
                                                 $conn =mysqli_connect("localhost","root","");
                                                mysqli_select_db($conn, "itproject");
                                                  $sql = "SELECT * FROM suppliers";
                                                  $results = mysqli_query($conn, $sql);

                                                  foreach($results as $supplier) { 
                                                ?>
                                                <option value="<?php echo $supplier["company_name"]; ?>" name="supp"><?php echo $supplier["company_name"]; ?></option>
                                                <?php 
                                                  }
                                                ?>
                                              </select>
                                              </div>
                                              </div>
                                            </div>
                                              <div class="col-md-6">
                                              <div class="form-group">
                                                    <label for="exampleInputEmail1">Purchase Order Date</label>
                                                    <div class="input-group">
                                                      <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                      </div>
                                                      <?php $date = date("Y-m-d"); ?>
                                                      <input type="text" class="form-control" name="orDate" value="<?php echo $date; ?>" style="border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" readonly>
                                                    </div>
                                                    <!-- /.input group -->
                                                  </div>
                                                </div>
                                              </div>

                                      
                                        <div class="table-responsive">
                                          <span id="error"></span>
                                          <table class="table table-bordered" id="dynamic_field">
                                            <tr>
                                              <th width="10%"> Quantity </th>
                                              <th> Description </th>
                                              <th></th>
                                            </tr>
                                            <tr id="row0">
                        <td><input id="quant" type="number" name="number[]" min="1" pattern="^[0-9]$" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" required />
                        </td>
                        <td>
                          <select class="form-control select2" id="supply" name="neym[]" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                            <option value=""></option>
                            <?php echo supply_dropdown($connect);?>
                          </select>
                        </td>
                        <td width="50px"><button type="button" name="add" id="add" class="btn btn-success">+</button> </td>        
                      </tr>

                      <tr id="row1" class="hidden">
                        <td><input type="number" name="number[]" min="1" pattern="^[0-9]$" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" required />
                        </td>
                        <td>
                          <select class="form-control select2" id="supply" name="neym[]" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                            <option value=""></option>
                            <?php echo supply_dropdown($connect);?>
                          </select>
                        </td>
                        <td><button type="button" name="remove" id="1" class="btn btn-danger btn_remove">x</button></td>        
                      </tr>

                      <tr id="row2" class="hidden">
                        <td><input type="number" name="number[]" min="1" pattern="^[0-9]$" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" required />
                        </td>
                        <td>
                          <select class="form-control select2" id="supply" name="neym[]" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                            <option value=""></option>
                            <?php echo supply_dropdown($connect);?>
                          </select>
                        </td>
                        <td><button type="button" name="remove" id="2" class="btn btn-danger btn_remove">x</button></td>        
                      </tr>

                      <tr id="row3" class="hidden">
                        <td><input type="number" name="number[]" min="1" pattern="^[0-9]$" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" required />
                        </td>
                        <td>
                          <select class="form-control select2" id="supply" name="neym[]" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                            <option value=""></option>
                            <?php echo supply_dropdown($connect);?>
                          </select>
                        </td>
                        <td><button type="button" name="remove" id="3" class="btn btn-danger btn_remove">x</button></td>        
                      </tr>

                      <tr id="row4" class="hidden">
                        <td><input type="number" name="number[]" min="1" pattern="^[0-9]$" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" required />
                        </td>
                        <td>
                          <select class="form-control select2" id="supply" name="neym[]" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                            <option value=""></option>
                            <?php echo supply_dropdown($connect);?>
                          </select>
                        </td>
                        <td><button type="button" name="remove" id="4" class="btn btn-danger btn_remove">x</button></td>        
                      </tr>

                      <tr id="row5" class="hidden">
                        <td><input type="number" name="number[]" min="1" pattern="^[0-9]$" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" required />
                        </td>
                        <td>
                          <select class="form-control select2" id="supply" name="neym[]" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                            <option value=""></option>
                            <?php echo supply_dropdown($connect);?>
                          </select>
                        </td>
                        <td><button type="button" name="remove" id="5" class="btn btn-danger btn_remove">x</button></td>        
                      </tr>

                      <tr id="row6" class="hidden">
                        <td><input type="number" name="number[]" min="1" pattern="^[0-9]$" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" required />
                        </td>
                        <td>
                          <select class="form-control select2" id="supply" name="neym[]" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                            <option value=""></option>
                            <?php echo supply_dropdown($connect);?>
                          </select>
                        </td>
                        <td><button type="button" name="remove" id="6" class="btn btn-danger btn_remove">x</button></td>        
                      </tr>

                      <tr id="row7" class="hidden">
                        <td><input type="number" name="number[]" min="1" pattern="^[0-9]$" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" required />
                        </td>
                        <td>
                          <select class="form-control select2" id="supply" name="neym[]" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                            <option value=""></option>
                            <?php echo supply_dropdown($connect);?>
                          </select>
                        </td>
                        <td><button type="button" name="remove" id="7" class="btn btn-danger btn_remove">x</button></td>        
                      </tr>

                      <tr id="row8" class="hidden">
                        <td><input type="number" name="number[]" min="1" pattern="^[0-9]$" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" required />
                        </td>
                        <td>
                          <select class="form-control select2" id="supply" name="neym[]" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                            <option value=""></option>
                            <?php echo supply_dropdown($connect);?>
                          </select>
                        </td>
                        <td><button type="button" name="remove" id="8" class="btn btn-danger btn_remove">x</button></td>        
                      </tr>

                      <tr id="row9" class="hidden">
                        <td><input type="number" name="number[]" min="1" pattern="^[0-9]$" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" required />
                        </td>
                        <td>
                          <select class="form-control select2" id="supply" name="neym[]" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                            <option value=""></option>
                            <?php echo supply_dropdown($connect);?>
                          </select>
                        </td>
                        <td><button type="button" name="remove" id="9" class="btn btn-danger btn_remove">x</button></td>        
                      </tr>

                      <tr id="row10" class="hidden">
                        <td><input type="number" name="number[]" min="1" pattern="^[0-9]$" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" required />
                        </td>
                        <td>
                          <select class="form-control select2" id="supply" name="neym[]" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                            <option value=""></option>
                            <?php echo supply_dropdown($connect);?>
                          </select>
                        </td>
                        <td><button type="button" name="remove" id="10" class="btn btn-danger btn_remove">x</button></td>        
                      </tr>

                      <tr id="row11" class="hidden">
                        <td><input type="number" name="number[]" min="1" pattern="^[0-9]$" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" required />
                        </td>
                        <td>
                          <select class="form-control select2" id="supply" name="neym[]" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;">
                            <option value=""></option>
                            <?php echo supply_dropdown($connect);?>
                          </select>
                        </td>
                        <td><button type="button" name="remove" id="11" class="btn btn-danger btn_remove">x</button></td>        
                      </tr>

                                          </table>
                                       
                                        </div>
                                        </div> <!-- BOX-BODY -->
                                      <div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancel</button>
                                        <button type="submit" class="btn btn-success sendbutton" name="submit" id="submit"><i class="fa fa-plus"></i> Add </button>
                                          <script>
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
                                          </script>
                                        <!--  <input type="submit" class="btn btn-primary" name="addOrder" value="Add Order" />
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
                        $sql = "SELECT * FROM purchase_orders join purchase_order_bm USING(purchase_order_uniq_id) group by purchase_order_uniq_id";
                        $result = $conn->query($sql);    
                      ?>
                      <thead>
                          <tr>
                              <th>Purchase ID</th>
                              <th>Supplier</th>
                              <th>Order Date</th>
                              <th>Delivery Date</th>
                              <th>Status</th>
                              <th>Action</th>     
                          </tr>
                      </thead>
                      <tbody>
                         <?php if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) { ?>
                    <tr>
                      <?php
                        $status = '';
                          if($row["purchase_order_status"] == 'Pending')
                          {
                              $status = '<span class="label label-danger">Pending</span>';
                          }
                          else
                          {
                              $status = '<span class="label label-success">Delivered</span>';
                          }
                      ?>
                      <td><?php echo $row["purchase_order_id"]; ?></td>
                      <td><?php echo $row["supplier"]; ?></td>
                      <td><?php echo $row["order_date"]; ?></td>
                      <td><?php echo $row["delivery_date"]; ?></td>
                      <td><?php echo $status; ?></td>
                      <td>

                      <?php if($row['po_remarks'] == 'Pending') {?>
                       <div class="btn-group">
                            <button type="button" id="getEdit" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editModal" data-id="<?php echo $row["purchase_order_id"]; ?>"><i class="fa fa-edit"></i> Update</button>
                        </div>
                        
                        <div class="btn-group">
                            <button type="button" id="getView" class="btn btn-info btn-xs" data-toggle="modal" data-target="#viewModal" data-id="<?php echo $row["purchase_order_id"]; ?>"><i class="glyphicon glyphicon-search"></i> View</button>
                        </div>
                        <div class="btn-group">
                            <button type="button" name="update" id="getUpdate" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modalUpdate" data-id="<?php echo $row["purchase_order_id"]; ?>"><i class="glyphicon glyphicon-random"></i> Change Status</button>
                        </div>

                        <?php }elseif($row['po_remarks'] == 'Delivered') { ?>
                        <div class="btn-group">
                            <button type="button" id="getView" class="btn btn-info btn-xs" data-toggle="modal" data-target="#viewModal" data-id="<?php echo $row["purchase_order_id"]; ?>"><i class="glyphicon glyphicon-search"></i> View</button>
                        </div>
                        <?php }else{ ?>
                          <div class="btn-group">
                            <button type="button" id="getEdit" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editModal" data-id="<?php echo $row["purchase_order_id"]; ?>"><i class="fa fa-edit"></i> Update</button>
                        </div>
                        
                        <div class="btn-group">
                            <button type="button" id="getView" class="btn btn-info btn-xs" data-toggle="modal" data-target="#viewModal" data-id="<?php echo $row["purchase_order_id"]; ?>"><i class="glyphicon glyphicon-search"></i> View</button>
                        </div>
                        <div class="btn-group">
                            <button type="button" name="update" id="getUpdate" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modalUpdate" data-id="<?php echo $row["purchase_order_id"]; ?>"><i class="glyphicon glyphicon-random"></i> Change Status</button>
                        </div>
                        <?php } ?>
                      </td>
                    </tr>
                  <?php 
                      }
                    }
                  ?>
                        </tbody>
                      <tfoot>
                        <tr>
                              <th>Purchase ID</th>
                              <th>Supplier</th>
                              <th>Order Date</th>
                              <th>Delivery Date</th>
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
<div id="printThis">
<div class="modal fade" id="printrep">
<form name="form42" id="user_form" method="post" action="purchases/addUser2">
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
                                              <center><h4><b>Purchases Report</b></h4></center>
                                            </div>
                                      </div>
                    <div class="box-body">

                <?php
                  $conn =mysqli_connect("localhost","root","", "itproject") or die('Error connecting to MySQL server.');
                  $date = date("Y/m/d");
                  $sql = "SELECT * FROM purchase_orders po join purchase_order_bm pob USING(purchase_order_uniq_id) where po.description != ''";
                  $result = $conn->query($sql);    
                ?>
            <table class="table table-striped table-bordered">
            <thead>
              <tr>
                  <th>Purchase Order Date</th>
                  <th>Status</th>
                  <th>Description</th>
                  <th>Quantity</th>    
              </tr>
            </thead>
                <?php if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    $podate = $row['order_date']; 
                    $status = $row['purchase_order_status'];
                    $desc = $row['description'];
                    $quant = $row['order_quantity'];
                ?>
                    <tr id="row0">
                      <td><?php echo $podate; ?></td>
                      <td><?php echo $status; ?></td>
                      <td><?php echo $desc; ?></td>
                      <td><?php echo $quant; ?></td>       
                      </tr>
                  <?php 
                      }
                    }
                  ?>
                </table>
        </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancel</button>
                <button id="btnPrint" type="button" class="btn btn-success" style="float:right;"><i class="glyphicon glyphicon-print"></i>&nbsp;Print</button>
              </div>
            </div>
            <!-- /.modal-content -->

          </div>
          <!-- /.modal-dialog -->
        </form> 
        </div>
    </div>
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
  var postURL = "purchases/addPurchases";
  var i=1;
  var supplyDrop = <?php echo(json_encode(supply_dropdown($connect))); ?>;
  // var unitDrop = <?php //echo(json_encode(unit_measure($connect))); ?>;
  $('#add').click(function(){
    if(i < 10){
      i++;
      document.getElementById('row'+i+'').setAttribute("class", " ");
        // $('#dynamic_field').append('<tr id="row'+i+'"> <td><input type="text" name="number[]" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" required /></td><td><select class="select2" id="supply'+i+'" name="neym[]" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;"><option value=""></option> '+supplyDrop+' </select></td> <td><select class="select2" id="unit'+i+'" name="unit[]" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;"><option value=""></option> '+unitDrop+' </select></td> <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">x</button></td></tr>');
        // $('#dynamic_field').append('<tr id="row'+i+'"><td width="10px"><input type="number" name="number[]" min="1" pattern="^[0-9]$" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;" required /></td><td width="250px"><select class="form-control select2" id="supply" name="neym[]" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;"><option value=""></option>'+supplyDrop+'</select></td><td width="120px"><select class=" select2" name="unit[]" id="unit" style="width: 100%; border: 0; outline: 0;  background: transparent; border-bottom: 1px solid black;"><option value=""></option>'+unitDrop+'</select></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">x</button></td></tr>');
    }



  });
  
  $(document).on('click', '.btn_remove', function(){
    var button_id = $(this).attr("id"); 
    document.getElementById('row'+button_id+'').setAttribute("class", "hidden");
    i--;
    // $('#row'+button_id+'').remove();
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
      $(document).ready(function() {
    var printCounter = 0;

    $('#example').DataTable( {
        order: [[0, 'desc']],
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
                        return '<h4><img src="../assets/dist/img/AMDC.png" height="60px" width="200px"><center>Purchases</center></h4>';
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
// date and time
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
        <div class="modal fade" id="viewModal" role="dialog">
            <div class="modal-dialog">
                <div id="view-data"></div>
            </div>
        </div>
        <div class="modal fade" id="editModal" role="dialog">
            <div class="modal-dialog">
                <div id="edit-data"></div>
            </div>
        </div>
          <div class="modal fade" id="modalUpdate" role="dialog">
            <div class="modal-dialog">
                <div id="data-content"></div>
            </div>
        </div>

   
    <!--<script>
        $(document).ready(function(){
            var dataTable=$('#example').DataTable({
                "processing": true,
                "serverSide":true,
                "ajax":{
                    url:"purchases/getPurchases",
                    type:"post"
                }
            });
        });
    </script>-->

    <!--script js for get edit data-->
    <script>  
        $(document).on('click','#getEdit',function(e){
            e.preventDefault();
            var per_id=$(this).data('id');
            //alert(per_id);
            $('#edit-data').html('');
            $.ajax({
                url:'purchases/editPurchases',
                type:'POST',
                data:'id='+per_id,
                dataType:'html'
            }).done(function(data){
                $('#edit-data').html('');
                $('#edit-data').html(data);
            }).fial(function(){
                $('#edit-data').html('<p>Error</p>');
            });
        });
    </script>

    <script>
        $(document).on('click','#getView',function(e){
            e.preventDefault();
            var per_id=$(this).data('id');
            //alert(per_id);
            $('#view-data').html('');
            $.ajax({
                url:'purchases/viewPurchases',
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
        $(document).on('click','#getUpdate',function(e){
            e.preventDefault();
            var per_id=$(this).data('id');
            //alert(per_id);
            $('#data-content').html('');
              $.ajax({
                  url:'purchases/getChange',
                  type:'POST',
                  data:'id='+per_id,
                  dataType:'html'
              }).done(function(data){
                  $('#data-content').html('');
                  $('#data-content').html(data);
              }).final(function(){
                  $('#data-content').html('<p>Error</p>');
              });
            
        });
    </script>

<?php
$con=mysqli_connect('localhost','root','','itproject') or die('Error connecting to MySQL server.');
$pdo = new PDO("mysql:host=localhost;dbname=itproject","root","");
if(isset($_POST["purchEdit"]))
{
 $connect = new PDO("mysql:host=localhost;dbname=itproject", "root", "");

 for($count = 0; $count < count($_POST["txtpoid"]); $count++)
 {  
  $query2 = "UPDATE purchase_orders SET description=:description, order_quantity=:order_quantity WHERE po_id=:po_id ";
  $statement2 = $connect->prepare($query2);
  $statement2->execute(
   array(
    ':po_id' => $_POST["txtpoid"][$count], 
    ':description' => $_POST["neym"][$count],
    ':order_quantity'  => $_POST["number"][$count]
   )
  );
 }

 $result = $statement->fetchAll();
 if(isset($result))
 {
  echo '<script>alert("Record Inserted Successfully.");</script>';
 }
}

if(isset($_POST['btnUpdate'])){
    $new_id=mysqli_real_escape_string($con,$_POST['txtid']);
    $new_purchasesStatus=mysqli_real_escape_string($con,$_POST['txtstatus']);
     $new_deliveryDate=mysqli_real_escape_string($con,$_POST['orDate']);

    if($new_purchasesStatus == 'Pending' && $new_id == $new_id){
      $new_purchasesStatus = 'Delivered';
    }else{
      $new_purchasesStatus = 'Pending';
      $new_deliveryDate = NULL;
    }

    $sqlupdate="UPDATE purchase_order_bm SET purchase_order_bm.purchase_order_status='$new_purchasesStatus', purchase_order_created_date='$new_deliveryDate' WHERE po_key='$new_id' ";
    $result_update=mysqli_query($con,$sqlupdate);

       $sqlupdate2="UPDATE purchase_orders SET purchase_orders.po_remarks='$new_purchasesStatus', purchase_orders.delivery_date='$new_deliveryDate' WHERE po_key='$new_id' ";
    $result_update2=mysqli_query($con,$sqlupdate2);

    if($result_update && $sqlupdate2){
        $conn =mysqli_connect("localhost","root","");
        $datetoday = date('Y\-m\-d\ H:i:s A');
        mysqli_select_db($conn, "itproject");
        $notif = "insert into logs (log_date,log_description,user,module) VALUES ('".$datetoday."','Purchase ID #".$new_id." status has been changed to ".$result_update."','".$this->session->userdata('fname')." ".$this->session->userdata('lname')."','".$this->session->userdata('type')."')";
        $result = $conn->query($notif);
        echo '<script>window.location.href="deliveries"</script>';
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
        
<script>
$(document).on('click','#getAdd',function(e){
    e.preventDefault();
    var per_id=$(this).data('id');
    //alert(per_id);
    $('#content-data').html('');
    $.ajax({
        url:'purchases/addUser2',
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
        
<!--
<script>
 function printcontent(el){
     var restorepage = document.body.innerHTML;
     //var iframe2 = document.getElementById('getView').click().innerHTML;
     var printcontent = document.getElementById(el).click().innerHTML;
     document.body.innerHTML = printcontent;
     window.print();
     document.body.innerHTML = restorepage;
 }
</script>
-->
        
<script>
document.getElementById("btnPrint").onclick = function () {
printElement(document.getElementById("printThis"));

window.print();
}

function printElement(elem) {
    var domClone = elem.cloneNode(true);
    
    var $printSection = document.getElementById("printSection");
    
    if (!$printSection) {
        var $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
    }
    
    $printSection.innerHTML = "";
    
    $printSection.appendChild(domClone);
}
</script>

<style>
@media screen {
  #printSection {
      display: none;
  }
}

@media print {
  body * {
    visibility:hidden;
  }
  #printSection, #printSection * {
    visibility:visible;
  }
  #printSection {
    position:absolute;
    left:0;
    top:0;
  }
}
</style>
    
</body>
</html>
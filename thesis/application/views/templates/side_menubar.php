<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../assets/dist/img/user2-128x128.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Supervisor</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Active</a>
        </div>
      </div>
      <!-- search form 
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>-->
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
      
        <!--- ISSUED SUPPLIES -->
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

    <!-- ORDERS -->
        <li class=" active treeview" id="mainOrdersNav">
              <a href="#">
                <i class="fa fa-dollar"></i>
                <span>Orders</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                  <li class="active" id="addOrderNav"><a href="<?php echo base_url('Supervisor/orders/create') ?>"><i class="fa fa-circle-o"></i> Add Order</a></li>
                <li id="manageOrdersNav"><a href="<?php echo '../purchases' ?>"><i class="fa fa-circle-o"></i> Views Orders</a></li>
           
              </ul>
            </li>

        </li>
    <!-- DEPARTMENTS MENU -->
        <li>
          <a href="<?php echo 'departments' ?>">
            <i class="fa fa-building"></i> <span>Departments</span>
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
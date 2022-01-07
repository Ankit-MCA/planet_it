<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>Admin_1/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url();?>Admin_1/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>Admin_1/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url();?>Admin_1/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>Admin_1/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url();?>Admin_1/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>Admin_1/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url();?>Admin_1/plugins/summernote/summernote-bs4.min.css">

  <link rel="stylesheet" href="<?php echo base_url();?>Admin_1/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>Admin_1/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>Admin_1/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>Admin_1/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>Admin_1/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?php echo base_url();?>Admin/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
    
    </ul>
    <ul class="navbar-nav ml-auto">
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?=base_url()?>dashbord/planet.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Planet Web It </span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url();?>Admin_1/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="" class="d-block"><?php echo $this->session->userdata("name") ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="<?=base_url('User/dashboard')?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
               <!--  <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          <br>


        <?php
        $id = $this->session->userdata('id');
        $this->db->select('*');
        $this->db->where('emp_name',$id);
        $select = $this->db->get('role');
        $data = $select->row_array();

       // echo $this->db->last_query();die;
       
        // User role
        $assign_role = explode(',', $data['assign_role']);

        // print_r($role);die;
 
        if(in_array("lead", $assign_role) || in_array("complet_lead", $assign_role) || in_array("payment", $assign_role) || in_array("maintenance", $assign_role) || in_array("payment_report", $assign_role) || in_array("maintenance_report", $assign_role) || in_array("other", $assign_role)|| in_array("employee", $assign_role) || in_array("salary", $assign_role) || in_array("attendance", $assign_role))
        {
        ?>
        <?php
            if(in_array("lead", $assign_role))
            {
            
            ?>
           <li class="nav-item">
            <a href="<?php echo base_url();?>User/lead" class="nav-link">
             <i class="nav-icon far fa-user"></i>
              <p>Add Leads</p>
            </a>
          </li>

          <?php
        }
        ?>




         
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Payment
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               <?php
            if(in_array("payment", $assign_role))
            {
            
            ?>
              <li class="nav-item">
                <a href="<?php echo base_url();?>User/payment_details" class="nav-link">
                  <i class="fa fa-eye" aria-hidden="true nav-icon"></i>
                  <p>Payment Details</p>
                </a>
              </li>
              <?php
            }
            ?>

             <?php
            if(in_array("maintenance", $assign_role))
            {
            
            ?>
              <li class="nav-item">
                <a href="<?php echo base_url();?>User/maintenance_costumers" class="nav-link">
                  <i class="fa fa-eye" aria-hidden="true nav-icon"></i>
                  <p>Maintenance Custumers</p>
                </a>
              </li>

              <?php
            }
            ?>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Report
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

               <?php
            if(in_array("payment_report", $assign_role))
            {
            
            ?>
              <li class="nav-item">
                <a href="<?php echo base_url();?>User/payment_details_list" class="nav-link">
                  <i class="fa fa-eye" aria-hidden="true nav-icon"></i>
                  <p>Payment Report</p>
                </a>
              </li>

              <?php
            }

            ?>

             <?php
            if(in_array("maintenance_report", $assign_role))
            {
            ?>
              <li class="nav-item">
                <a href="<?php echo base_url();?>User/maintenance_report_list" class="nav-link">
                  <i class="fa fa-eye" aria-hidden="true nav-icon"></i>
                  <p>Maintenance Report</p>
                </a>
              </li>

              <?php
            }

            ?>

             <?php
            if(in_array("other", $assign_role))
            {
            
            ?>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fa fa-eye" aria-hidden="true nav-icon"></i>
                  <p>Other Payment report</p>
                </a>
              </li>

              <?php
            }
            ?>
            </ul>
          </li>
          
                 <li class="nav-item">
            <a href="#" class="nav-link">
               <i class="nav-icon far fa-user "></i>
               <p>
                Employee Details
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">

              <?php
            if(in_array("employee", $assign_role))
            {
              ?>
               <li class="nav-item">
             <a href="<?php echo base_url();?>User/employee" class="nav-link">
               <i class="nav-icon fa fa-plus-circle" aria-hidden="true"></i>
              <p class="text">Add Employee</p>
            </a>
          </li>
          <?php
        }
        ?>

        <?php
            if(in_array("salary", $assign_role))
            {
              ?>
          
          <li class="nav-item">
             <a href="<?php echo base_url();?>User/salary" class="nav-link">
               <i class="nav-icon fa fa-plus-circle"></i>
              <p class="text">Add Employee Salary</p>
            </a>
          </li>

          <?php
        }
        ?>
          <?php
            if(in_array("attendance", $assign_role))
            {
              ?>
               <li class="nav-item">
             <a href="<?php echo base_url();?>user/attendance" class="nav-link">
               <i class="nav-icon fa fa-bars" aria-hidden="true""></i>
              <p class="text"> Employee Attendance</p>
            </a>
          </li>
          <?php
        }
        ?>
           <li class="nav-item">
            <a href="<?php echo base_url();?>user/emp_attendance_list" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p class="text"> Attendance List</p>
            </a>
          </li>
           <li class="nav-item">
            <a href="<?php echo base_url();?>user/old_employee" class="nav-link">
              <i class="nav-icon far fa fa-user-times" aria-hidden="true"></i>
              <p class="text"> Old Employee</p>
            </a>
          </li>
            </ul>
          </li>
          <?php
        }
  
        ?>
         
        

           <li class="nav-item">
            <a href="<?php echo base_url(); ?>User/logout" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Logout</p>
            </a>
          </li>
         
           
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
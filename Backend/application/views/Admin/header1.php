<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Interviewer Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="<?= base_url().'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback';?>">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?=base_url().'Assets/Admin/plugins/fontawesome-free/css/all.min.css';?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="<?= base_url().'Assets/Admin/dist/css/adminlte.min.css';?>">
  <link rel="stylesheet" href="<?= base_url().'Assets/Admin/plugins/summernote/summernote-bs4.css';?>">
  <style>
      .pt-150{
          padding-top:150px;
      }
      .brand-link{
          background-color: white;
      }
      /*.bg-blue{
        background-color:blue;
      }*/
  </style>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" >
    <!-- Left navbar links -->
    <?php
        $result=$this->session->userdata('employees');
        //print_r($result);
        //exit();

    ?>
    <div><b >Welcome, <?=$result['name'];?></b>   </div>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link btn btn-success" data-toggle="dropdown" href="#"><i class="fas fa-sign-out-alt">Logout</i></a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="<?=base_url('Admin/Employees/logout');?>" class="dropdown-item dropdown-footer" style="text-align:left;">LOGOUT</a>
          <a href="#" class="dropdown-item dropdown-footer" style="text-align:left;">CANCEL</a>
        </div>
      </li>  
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary bg-navy elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <h5 class="text-center" style="color:dimgray;">Admin</h5>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
                <a href="<?=base_url().'index.php/Admin/Employeescontrol/index';?>" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
          </li>
          <li class="nav-item ">
          <a href="<?=base_url('Admin/Interviewee/index')?>" class="nav-link <?= (!empty($mainModule) && $mainModule=='candidates')? 'active' : '';?>">
              <i class="nav-icon far fa-circle nav-icon"></i>
              <p>
                Candidates
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  
<?php
if( $this->session->userdata('level') == "")
{
  redirect(login);
}
 ?>
 <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/multiselect.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/custom.css">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url('Admin') ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>GT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>ASSET</b>MGT</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"><?php echo $this->session->userdata('firstname'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('Login/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
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
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('firstname'); ?> <a href="#"><i class="fa fa-circle text-success"></i> Online</a></p>
        </div>
      </div>
      <!-- search form -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>

          </a>

        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-barcode"></i>
            <span>Assets</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?php echo base_url('asset') ?>"><i class="fa fa-circle-o"></i> View  Assets</a></li>
  <li><a href="<?php echo base_url('asset/addAsset') ?>"><i class="fa fa-circle-o"></i> Create Assets</a></li>
          </ul>
        </li>

          <li><a href="<?php echo base_url('license') ?>"><i class="fa fa-floppy-o"></i> <span>Licenses</span></a></li>
          <li><a href="<?php echo base_url('asset/assetType') ?>">  <i class="fa fa-keyboard-o"></i> <span>Asset Types</span></a></li>
  <li><a href="<?php echo base_url('Admin/userListing') ?>">  <i class="fa fa-users"></i> <span>Users</span></a></li>

      <li class="treeview">
          <a href="#"><i class="fa fa-gear"></i> <span>Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('location') ?>"> Locations</a></li>
            <li><a href="<?php echo base_url('country') ?>">Country</a></li>
            <li><a href="<?php echo base_url('Admin/userListing') ?>"> Suppliers</a></li>
            <li><a href="<?php echo base_url('Admin/userListing') ?>"> Brand </a></li>
              <li><a href="<?php echo base_url('Admin/userListing') ?>"> Model </a></li>
          </ul>
        </li>
        <li class="treeview">
            <a href="#"><i class="fa fa-bar-chart"></i> <span>Reports</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href=""> Activity report </a></li>
                <li><a href=""> Audit Trail</a></li>
            </ul>
          </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

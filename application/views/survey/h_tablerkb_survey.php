<!DOCTYPE html>
<html style="height: auto;">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-RKBMD APP KOTA SURABAYA</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>ini_assets/plugins/datatables/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>ini_assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>ini_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>ini_assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>ini_assets/plugins/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="<?php echo base_url();?>ini_assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
     <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url();?>ini_assets/plugins/select2/css/select2.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo base_url();?>ini_assets/plugins/sweetalert2/sweetalert2.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="sidebar-mini layout-fixed" style="height: auto;">
<div class="wrapper">

  <!-- Navbar -->
 <nav class="main-header navbar navbar-expand border-bottom navbar-dark navbar-primary">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li> 
      <li class="navbar-item">
        <style type="text/css">
          @media screen and (min-width: 601px){
            .fontku{
              font-size: 17px;
              color: white;
            }
          }
          @media screen and (max-width: 600px){
            .fontku{
              font-size: 11px;
              color: white;
            }
          }
          .modal { overflow: auto !important; }
          .fontspan{
            color:white;
          }
        </style>
        <!--UNTUK NAMA DINASNYA-->
        <strong class="nav-link fontku"><font color="white"><?php echo $this->session->userdata('skpd');?></font></strong>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto fontku">
      <div id="clock"></div> &nbsp | &nbsp<div id="date"></div>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 sidebar-dark-danger">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link navbar-primary">
      <img src="<?php echo base_url();?>ini_assets/dist/img/surabaya.png" alt="Logo Surabaya" class="brand-image"
           style="opacity: 1.8">
      <center><span class="brand-text font-weight-bold fontspan">E-RKBMD 2021</span></center>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <hr>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <style type="text/css">
          @media screen and (min-width: 601px){
            .fontside{
              font-size: 14px;
            }
          }
          @media screen and (max-width: 600px){
            .fontside{
              font-size: 11px;
            }
          }
        </style>
        <ul class="nav nav-pills nav-sidebar flex-column fontside" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="<?php echo site_url('home_survey');?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <hr>
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Rencana Kebutuhan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('home/rkbform');?>" class="nav-link">
                  <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                  <p>Entry Belanja Aset</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('home/rkpform');?>" class="nav-link">
                  <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                  <p>Entry Belanja Persediaan</p>
                </a>
              </li>
            </ul>
          </li> -->
          <li class="nav-item has-treeview">
            <a href="<?php echo site_url('home_survey/entry_page');?>" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
               Entry Belanja Modal
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo site_url('home_survey/tabel_rkb');?>" class="nav-link">
              <i class="nav-icon fab fa-buffer"></i>
              <p>
                List Usulan BM Aset
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo site_url('home_survey/tabel_rkp');?>" class="nav-link">
              <i class="nav-icon fab fa-buffer"></i>
              <p>
                List Usulan BM Persediaan
              </p>
            </a>
          </li>

          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                List Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('home/tabel_rkb');?>" class="nav-link">
                  <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                  <p>Tabel RK Belanja Aset</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('home/tabel_rkp');?>" class="nav-link">
                  <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                  <p>Tabel RK Belanja Persediaan</p>
                </a>
              </li>
            </ul>
          </li>
         <li class="nav-item has-treeview">
            <a href="<?php echo site_url('home/desk_komponen');?>" class="nav-link">
              <i class="nav-icon fab fa-buffer"></i>
              <p>
                Keterangan Eksisting
                <span class="right badge badge-danger"><?php echo $exist?></span>
              </p>
            </a>
          </li> -->
         <!-- <li class="nav-header"><strong>KAMUS</strong></li>
         <li class="nav-item">
            <a href="<?php echo site_url('home/list_kegiatan');?>" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Kamus Kode Kegiatan
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Kamus Kode Komponen
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('home/list_komponen');?>" class="nav-link">
                  <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                  <p>Kode Komponen 5.2.3</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('home/list_komponen522');?>" class="nav-link">
                  <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                  <p>Kode Komponen 5.2.2</p>
                </a>
              </li>
            </ul>
          </li>  -->
          <!--
          <li class="nav-header"><storng>LAIN - LAIN</storng></li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Histori Hapus</p>
            </a>
          </li>
          -->

           <li class="nav-header"></li>
           <center>
           <li class="nav-item">
            <a href="<?php echo site_url('auth/logout');?>" class="nav-link active">
              <i class="fas fa-power-off"></i>
              <strong><p> &nbsp KELUAR APLIKASI</p></strong>
            </a>
          </li>
          </center>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-1">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('home_survey');?>">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $page;?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
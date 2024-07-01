<!DOCTYPE html>
<html style="height: auto; zoom: 87%;">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SI-IBMD APP KOTA SURABAYA</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url();?>ini_assets/plugins/fontawesome-free/css/all.min.css">
  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous"> -->
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>ini_assets/plugins/ionicons/ionicons.min.css">
  <!-- icon tab -->
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>ini_assets/image/surabaya1.png" />
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>ini_assets/plugins/datatables/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>ini_assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>ini_assets/plugins/toastr/toastr.min.css">
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
  <nav class="main-header navbar navbar-expand border-bottom navbar-dark navbar-cyan">
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
          .modal-backdrop {
              width: 100% !important;
              height: 100% !important;
          }
        </style>
        <!--UNTUK NAMA DINASNYA-->
        <strong class="nav-link fontku"><font color="white"><?php echo $this->session->userdata('skpd');?> KOTA SURABAYA - (<?php echo strtoupper($this->session->userdata('nama_login'));?>) </font></strong>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto fontku">
          <strong><u><?php echo $this->session->userdata('role');?></u></strong> 
    </ul>
    &nbsp; &nbsp; &nbsp;
    <ul class="navbar-nav ml-15 fontku">
      <ul class="navbar-nav ml-auto fontku">
      <div id="clock"></div> &nbsp | &nbsp<div id="date"></div>
    </ul>
      <!--<li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>-->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 sidebar-dark-danger">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link navbar-info">
      <img src="<?php echo base_url();?>ini_assets/dist/img/surabaya.png" alt="Logo Surabaya" class="brand-image"
           style="opacity: 1.8">
      <center><span class="brand-text font-weight-bold">SI-IBMD</span></center>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
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
            <a href="<?php echo site_url('');?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header"><strong>MENU UTAMA</strong></li>
          <li class="nav-item">
            <a href="<?php echo site_url('form_inv/input_petugas');?>" class="nav-link">
              <i class="nav-icon fa fa-address-book"></i>
              <p>
                Entry Petugas Inventarisasi
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Entry Form Inventarisasi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('form_inv/index/1');?>" class="nav-link">
                  <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                  <p>Tanah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('form_inv/index/2');?>" class="nav-link">
                  <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                  <p>Peralatan Mesin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('form_inv/index/3');?>" class="nav-link">
                  <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                  <p>Gedung dan Bangunan</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="<?php echo site_url('form_inv/index/4');?>" class="nav-link">
                  <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                  <p>Jalan, Irigasi dan Jaringan</p>
                </a>
              </li>
             <li class="nav-item">
                <a href="<?php echo site_url('form_inv/index/5');?>" class="nav-link">
                  <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                  <p>Aset Tetap Lainnya</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('form_inv/index/6');?>" class="nav-link">
                  <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                  <p>Aset Tak Berwujud</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header"><strong>MENU TAMBAHAN</strong></li>
          <li class="nav-item">
            <a href="<?php echo site_url('form_inv/list_tambak');?>" class="nav-link">
              <i class="nav-icon fas fa-leaf"></i>
              <p>
                List Tanah Tambak
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('form_inv/list_kendaraan')?>" class="nav-link">
              <i class="nav-icon fas fa-car"></i>
              <p>List Kendaraan</p>
            </a>
          </li>
          <li class="nav-header"><strong>STATUS REGISTER</strong></li>
          <li class="nav-item has-treeview">
            <a href="<?php echo site_url('status_form/cari_status_reg')?>" class="nav-link">
              <i class="nav-icon 	fas fa-glasses"></i>
              <p>
                Cari Status Register
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar-check"></i>
              <p>
                Register Terverifikasi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('status_form/verif_page/1');?>" class="nav-link">
                  <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                  <p>Tanah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('status_form/verif_page/2');?>" class="nav-link">
                  <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                  <p>Peralatan Mesin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('status_form/verif_page/3');?>" class="nav-link">
                  <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                  <p>Gedung dan Bangunan</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="<?php echo site_url('status_form/verif_page/4');?>" class="nav-link">
                  <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                  <p>Jalan, Irigasi dan Jaringan</p>
                </a>
              </li>
             <li class="nav-item">
                <a href="<?php echo site_url('status_form/verif_page/5');?>" class="nav-link">
                  <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                  <p>Aset Tetap Lainnya</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('status_form/verif_page/6');?>" class="nav-link">
                  <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                  <p>Aset Tak Berwujud</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clock"></i>
              <p>
                Register Proses Verifikasi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('status_form/index/1');?>" class="nav-link">
                  <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                  <p>Tanah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('status_form/index/2');?>" class="nav-link">
                  <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                  <p>Peralatan Mesin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('status_form/index/3');?>" class="nav-link">
                  <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                  <p>Gedung dan Bangunan</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="<?php echo site_url('status_form/index/4');?>" class="nav-link">
                  <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                  <p>Jalan, Irigasi dan Jaringan</p>
                </a>
              </li>
             <li class="nav-item">
                <a href="<?php echo site_url('status_form/index/5');?>" class="nav-link">
                  <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                  <p>Aset Tetap Lainnya</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('status_form/index/6');?>" class="nav-link">
                  <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                  <p>Aset Tak Berwujud</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header"><strong>MENU LAPORAN</strong></li>
          <li class="nav-item has-treeview">
            <a href="<?php echo site_url('status_form/halaman_buku_bantu')?>" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Buku Bantu
              </p>
            </a>
            <!-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('form_inv/export_excel_all_kibpm_user');?>" class="nav-link">
                  <i class="nav-icon fa fa-file"></i>
                  <p>
                      Status Register 1.3.2
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('form_inv/export_excel_reg_sudah_dikerjakan');?>" class="nav-link">
                  <i class="nav-icon fa fa-file"></i>
                  <p>
                      Detail Verifikasi Register 1.3.2
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('form_inv/export_excel_kondisi_kibpm_user');?>" class="nav-link">
                  <i class="nav-icon fa fa-file"></i>
                  <p>
                      Kondisi Barang 1.3.2
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('form_inv/export_excel_lokasi_kibpm_user');?>" class="nav-link">
                  <i class="nav-icon fa fa-file"></i>
                  <p>
                      Perubahan Lokasi 1.3.2
                  </p>
                </a>
              </li>
            </ul> -->
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo site_url('status_form/halaman_cetak_laporan')?>" class="nav-link">
              <i class="nav-icon fa fa-bookmark"></i>
              <p>
                Laporan Hasil Inventarisasi
              </p>
            </a>
            <!-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('status_form/cetak_form_kondisi_barang');?>" class="nav-link" target="_blank">
                  <i class="nav-icon fa fa-file"></i>
                  <p>
                      Perubahan Kondisi Barang
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('status_form/cetak_perubahan_data_barang');?>" class="nav-link" target="_blank">
                  <i class="nav-icon fa fa-file"></i>
                  <p>
                      Perubahan Data Barang
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('status_form/cetak_barang_tidak_ditemukan');?>" class="nav-link" target="_blank">
                  <i class="nav-icon fa fa-file"></i>
                  <p>
                      Barang Tidak Diketemukan
                  </p>
                </a>
              </li>
            </ul> -->
          </li>
         <li class="nav-header"><strong>KAMUS</strong></li>
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
              <!-- <li class="nav-item">
                <a href="<?php echo site_url('home/list_komponen522');?>" class="nav-link">
                  <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                  <p>Kode Komponen 5.2.2</p>
                </a>
              </li> -->
            </ul>
          </li> 
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
              <li class="breadcrumb-item"><a href="<?php echo site_url('home');?>">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $page;?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
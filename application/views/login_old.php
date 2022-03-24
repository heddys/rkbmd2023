<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>E-RKBMD APP KOTA SURABAYA</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url();?>ini_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>ini_assets/dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo base_url();?>ini_assets/plugins/sweetalert2/sweetalert2.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page" style="background: #c9daea;">
  <div><p></div>
  <?php if ($error==2) {?>
  <section class="content">
    <div class="container-fluid">
      <div class="callout callout-warning">
        <h4>Maaf !</h4>
          Sesi Anda Sebelumnya sudah habis, mohon login kembali.
      </div>
    </div>
  </section>
<?php }?>
<div class="login-box">
  <div class="login-logo mb-2">
    <center><img src="<?php echo base_url();?>ini_assets/dist/img/surabaya.png" alt="Logo Surabaya" class="img-responsive" width="150" height="200"></center>
    <a href="#"><b>E-RKBMD</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">
      <?php if ($error==1) { ?>
        <font color="red">Maaf, Username atau Password Salah! Silahkan Coba Lagi</font> 
      <?php } else { ?>
        Silahkan Sign In Untuk Masuk Ke Aplikasi
      <?php }?>
      </p>

      <form action="<?php echo site_url('auth/do_login');?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="usr" required>
          <div class="input-group-append input-group-text">
              <span class="fas fa-user"></span>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="psswd" required>
          <div class="input-group-append input-group-text">
              <span class="fas fa-lock"></span>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-success btn-block btn-lg">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p>
        <center><font size="2vm " color="grey">Login Bisa Dengan Username dan Password SIMBADA</font></center>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url();?>ini_assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>ini_assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>

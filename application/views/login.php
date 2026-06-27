<!doctype html>
<html lang="id">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SI-IBMD Kota Surabaya - Sistem Informasi Inventarisasi Barang Milik Daerah">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets_login/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets_login/css/style.css">

    <title>SI-IBMD Kota Surabaya | Log In</title>
  </head>
  <body>

  <!-- Particle Background -->
  <canvas id="particle-canvas"></canvas>

  <div class="login-wrapper">
    <div class="login-container">
      <div class="login-card animate-fade-in">
        
        <!-- Logo Surabaya -->
        <div class="logo-container">
          <img src="<?php echo base_url();?>assets_login/images/logo_sby.png" alt="Logo Pemkot Surabaya" class="logo-img">
        </div>

        <!-- Header Title -->
        <div class="login-header">
          <h3>SI-IBMD</h3>
          <h4>KOTA SURABAYA</h4>
          <p>Sistem Informasi Inventarisasi Barang Milik Daerah</p>
        </div>

        <!-- Validation Error Message -->
        <?php if(isset($error)): ?>
          <?php if($error == 1): ?>
            <div class="alert-box animate-shake" id="login-error">
              <i class="fa-solid fa-circle-exclamation alert-icon"></i>
              <span class="alert-text">Username atau Password salah!</span>
              <button type="button" class="alert-close" onclick="this.parentElement.remove();">&times;</button>
            </div>
          <?php elseif($error == 2): ?>
            <div class="alert-box animate-shake" id="login-error">
              <i class="fa-solid fa-circle-exclamation alert-icon"></i>
              <span class="alert-text">Kode CAPTCHA tidak sesuai!</span>
              <button type="button" class="alert-close" onclick="this.parentElement.remove();">&times;</button>
            </div>
          <?php endif; ?>
        <?php endif; ?>

        <!-- Login Form -->
        <form action="<?php echo site_url('auth/do_login'); ?>" method="post" id="login-form">
          
          <!-- Username Input -->
          <div class="form-group-custom">
            <i class="fa-regular fa-user input-icon"></i>
            <input type="text" name="usr" id="username" class="form-input" required autocomplete="off">
            <label for="username" class="form-label">Username</label>
            <span class="input-focus-line"></span>
          </div>

          <!-- Password Input -->
          <div class="form-group-custom">
            <i class="fa-solid fa-key input-icon"></i>
            <input type="password" name="psswd" id="password" class="form-input" required>
            <label for="password" class="form-label">Password</label>
            <span class="input-focus-line"></span>
            <button type="button" id="password-toggle" class="btn-password-toggle">
              <i class="fa-regular fa-eye-slash"></i>
            </button>
          </div>

          <!-- Captcha Code Input -->
          <div class="form-group-custom captcha-group" style="margin-bottom: 25px;">
            
            <!-- Captcha Display Area -->
            <div class="captcha-display-wrapper" style="display: flex; align-items: center; justify-content: center; gap: 10px; background: rgba(255,255,255,0.05); padding: 10px; border-radius: 8px; margin-bottom: 15px; border: 1px dashed rgba(255,255,255,0.2);">
              <div id="captcha-image" style="border-radius: 4px; overflow: hidden; display: flex;">
                <?php echo isset($captcha) ? $captcha : ''; ?>
              </div>
              <button type="button" class="btn-refresh" data-bs-toggle="tooltip" title="Muat ulang Captcha" style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.3); color: white; width: 45px; height: 45px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.3s ease;">
                <i class="fa-solid fa-arrows-rotate"></i>
              </button>
            </div>

            <!-- Captcha Input Area -->
            <div style="position: relative;">
              <i class="fa-solid fa-shield-halved input-icon"></i>
              <input type="number" name="captcha" id="captcha" class="form-input" required autocomplete="off" maxlength="5">
              <label for="captcha" class="form-label">Ketik 5 Angka di Atas</label>
              <span class="input-focus-line"></span>
            </div>
          </div>
          

          <!-- Submit Button -->
          <button type="submit" id="submit-btn" class="btn-submit">
            <span class="btn-text">MASUK</span>
            <span class="btn-spinner hidden"><i class="fa-solid fa-circle-notch fa-spin"></i> Memproses...</span>
          </button>

        </form>

        <!-- Footer -->
        <div class="login-footer">
          <p>&copy; <?php echo date('Y'); ?> BPKAD Kota Surabaya. All Rights Reserved.</p>
        </div>

      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="<?php echo base_url();?>assets_login/js/jquery-3.3.1.min.js"></script>
  <script src="<?php echo base_url();?>assets_login/js/popper.min.js"></script>
  <script src="<?php echo base_url();?>assets_login/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>assets_login/js/main.js"></script>
  
  <script>
    // Refresh captcha
      jQuery(document).ready(function(){
        jQuery('.btn-refresh').on('click', function(){
          var btn = jQuery(this);
          btn.find('i').addClass('fa-spin'); // Add spinning animation
          jQuery.get('<?php print site_url().'/Auth/refresh_captcha'; ?>', function(data) {
            jQuery('#captcha-image').html(data);
            btn.find('i').removeClass('fa-spin');
          });
        });
      });
  </script>

  </body>
</html>
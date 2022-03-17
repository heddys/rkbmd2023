<!DOCTYPE html>

<html lang="en-us" class="no-js">

  <head>
    <meta charset="utf-8">
        <title>Adminty - Premium Admin Template by Colorlib</title>
        <meta name="description" content="Comming soon page - flat able">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Codedthemes">
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo base_url();?>assets_login\img\favicon.ico">
        <link rel="stylesheet" href="<?php echo base_url();?>assets_login\css\style-minimal-flat.css">
    <script src="<?php echo base_url();?>assets_login\js\modernizr.custom.js"></script>
  </head>

  <style type="text/css">
    /*body {
      text-align: center;
    }
    form {
      display: inline-block;
    }*/
  </style>

    <body>

      <!-- Loading overlay -->
    <div id="loading" class="dark-back">
      <div class="loading-bar"></div>
      <span class="loading-text opacity-0">Yakin RKBMD ?</span>
    </div>

    <!-- Canvas for particles animation -->
    <div id="particles-js"></div>

      <!-- Informations bar on top of the screen -->
      <!-- <div class="info-bar bar-intro opacity-0">
        <div class="row">

          <div class="col-xs-12 col-sm-6 col-lg-6 info-bar-left">

            <p>Grand Opening in 5 Minutes <span id="countdown"></span></p>

          </div>

          <div class="col-xs-12 col-sm-6 col-lg-6 info-bar-right">

            <p class="social-text">
              <a href="#" target="_blank">TWITTER</a> / 
              <a href="#" target="_blank">FACEBOOK</a> / 
              <a href="#" target="_blank">YOUTUBE</a>
            </p>

            <p class="social-icon">
              <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
              <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
              <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
              <a href="#" target="_blank"><i class="fa fa-dribbble"></i></a>
              <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
            </p>

          </div>
        </div>
      </div> -->
      <!-- END - Informations bar on top of the screen -->

        <!-- Slider Wrapper -->
        <!-- <div id="slider" class="sl-slider-wrapper"> -->

      <!-- <div class="sl-slider"> -->
      
        <!-- SLIDE 1 / Home -->
        <div class="sl-slide bg-1" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
          
          <div class="sl-slide-inner">

            <div class="content-slide">

              <div class="container">

                <img src="<?php echo base_url();?>ini_assets/dist/img/surabaya.png" alt="" class="brand-logo text-intro opacity-0" width="100px">
              
                <h1 class="text-intro opacity-0">E-RKBMD</h1>

                <form action="<?php echo site_url('auth/do_login');?>" method="post">
                    <div class="form-group">
                        <div class="controls" style="text-align: center;">

                            <div style="width: 100%;">
                              <input type="text" id="mail-sub" name="usr" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" class="form-control email srequiredField text-intro opacity-0"><br>

                              <input type="password" id="mail-sub" name="psswd" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" class="form-control email srequiredField text-intro opacity-0">
                            </div>

                            <!-- Button -->
                            <button type="submit" class="action-btn trigger text-intro opacity-0">Submit</button>

                        </div>
                    </div>
                </form>

              </div>
            </div>
          </div>
        </div>
        <!-- END - SLIDE 1 / Home -->$

      <!-- </div> -->
      <!-- END - sl-slider -->

      

    </div>
    <!-- END - Slider Wrapper -->

    <!-- //////////////////////\\\\\\\\\\\\\\\\\\\\\\ -->
      <!-- ********** List of jQuery Plugins ********** -->
      <!-- \\\\\\\\\\\\\\\\\\\\\\////////////////////// -->
    
    <!-- * Libraries jQuery, Easing and Bootstrap - Be careful to not remove them * -->
    <script src="<?php echo base_url();?>assets_login\js\jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets_login\js\jquery.easings.min.js"></script>
    <script src="<?php echo base_url();?>assets_login\js\bootstrap.min.js"></script>

    <!-- SlitSlider plugin -->
    <script src="<?php echo base_url();?>assets_login\js\jquery.ba-cond.min.js"></script>
    <script src="<?php echo base_url();?>assets_login\js\jquery.slitslider.js"></script>

    <!-- Newsletter plugin -->
    <script src="<?php echo base_url();?>assets_login\js\notifyMe.js"></script>

    <!-- Popup Newsletter Form -->
    <script src="<?php echo base_url();?>assets_login\js\classie.js"></script>
    <script src="<?php echo base_url();?>assets_login\js\dialogFx.js"></script>

    <!-- Particles effect plugin on the right -->
    <script src="<?php echo base_url();?>assets_login\js\particles.js"></script>

    <!-- Custom Scrollbar plugin -->
    <script src="<?php echo base_url();?>assets_login\js\jquery.mCustomScrollbar.js"></script>

    <!-- Countdown plugin -->
    <script src="<?php echo base_url();?>assets_login\js\jquery.countdown.js"></script>

    <script>
    $("#countdown")
      // Year/Month/Day Hour:Minute:Second
      .countdown("2018/10/24 15:30:30", function(event) {
        $(this).html(
          event.strftime('%D Days %Hh %Mm %Ss')
        );
    });
    </script>

    <!-- Main application scripts -->
    <script src="<?php echo base_url();?>assets_login\js\main-flat.js"></script>

  </body>

</html>
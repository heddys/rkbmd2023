<!-- /.content-wrapper -->
<footer class="main-footer">
    <font size="2"><strong>IT BLPPA - APLIKASI E-RKBMD SURABAYA - Theme By AdminLTE.io</strong>
    All rights reserved.</font>
    <div class="float-right d-none d-sm-inline-block">
      <font size="2"><b>Version</b> RKBMD.Beta-01</font>
    </div>
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url();?>ini_assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url();?>ini_assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>ini_assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url();?>ini_assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url();?>ini_assets/plugins/jqvmap/jquery.vmap.min.js"></script>

<script src="<?php echo base_url();?>ini_assets/plugins/jqvmap/maps/jquery.vmap.world.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url();?>ini_assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url();?>ini_assets/plugins/jquery/jquery.min.js"></script>

<script src="<?php echo base_url();?>ini_assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url();?>ini_assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url();?>ini_assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url();?>ini_assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>ini_assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>ini_assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url();?>ini_assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>ini_assets/dist/js/demo.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url();?>ini_assets/plugins/select2/js/select2.full.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>ini_assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>ini_assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script>
    
    
  $(document).ready(function(){
    $("#tabel-home-dinkes").DataTable();
      
    function showTime() {
      var a_p = "";
      var today = new Date();
      var curr_hour = today.getHours();
      var curr_minute = today.getMinutes();
      var curr_second = today.getSeconds();

      curr_hour = checkTime(curr_hour);
      curr_minute = checkTime(curr_minute);
      curr_second = checkTime(curr_second);
      document.getElementById('clock').innerHTML=curr_hour + " : " + curr_minute + " : " + curr_second + " WIB";

      var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];  
      var date = new Date();  
      var day = date.getDate();  
      var month = date.getMonth();  
      var yy = date.getYear();  
      var year = (yy < 1000) ? yy + 1900 : yy;  
      document.getElementById('date').innerHTML=day + " / " + months[month] + " / " + year + " " + "";
    }
    
    function checkTime(i) {
        if (i < 10) {
             i = "0" + i;
        }
          return i;
    }
    setInterval(showTime, 50);
    
    var types = ['tanah', 'pm', 'gdb', 'jij', 'atl', 'atb'];
  
    // Aggregated totals
    var totalKib = 0;
    var totalProses = 0;
    var totalVerif = 0;
    var totalTolak = 0;
    var totalSisa = 0;
    
    var completedRequests = 0;

    function updateCard(type, data) {
      // Format numbers
      function fmt(num) {
        return new Intl.NumberFormat('id-ID').format(num);
      }
      
      // Update texts
      $('#' + type + '-register').html(fmt(data.jum_kib));
      $('#' + type + '-proses').html(fmt(data.proses));
      $('#' + type + '-verif').html(fmt(data.verif));
      $('#' + type + '-tolak').html(fmt(data.tolak));
      $('#' + type + '-sisa').html(fmt(data.sisa));
      
      // Update progress bar
      var progressHtml = '';
      if (data.sisa === 0) {
        progressHtml = '<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"><strong style="font-size: 20px;color: black;">100%</strong></div>';
      } else {
        progressHtml = '<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="'+data.persen+'" aria-valuemin="0" aria-valuemax="100" style="width: '+data.persen+'%"><strong style="font-size: 20px;color: black;">'+data.persen+'%</strong></div>';
      }
      $('#progress-' + type).html(progressHtml);
      
      // Add loaded class
      $('#card-' + type).addClass('card-loaded');
    }

    function updateTotalCard() {
      function fmt(num) {
        return new Intl.NumberFormat('id-ID').format(num);
      }
      
      $('#total-register').html(fmt(totalKib));
      $('#total-proses').html(fmt(totalProses));
      $('#total-verif').html(fmt(totalVerif));
      $('#total-tolak').html(fmt(totalTolak));
      $('#total-sisa').html(fmt(totalSisa));
      
      var totalPersen = 0;
      if (totalKib > 0) {
        totalPersen = (((totalKib - totalSisa) / totalKib) * 100).toFixed(3);
      }
      
      var progressHtml = '';
      if (totalSisa === 0) {
        progressHtml = '<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"><strong style="font-size: 20px;color: black;">100%</strong></div>';
      } else {
        progressHtml = '<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="'+totalPersen+'" aria-valuemin="0" aria-valuemax="100" style="width: '+totalPersen+'%"><strong style="font-size: 20px;color: black;">'+totalPersen+'%</strong></div>';
      }
      $('#progress-total').html(progressHtml);
      $('#card-total').addClass('card-loaded');
    }

    types.forEach(function(type) {
      $.ajax({
        url: '<?php echo site_url("home/get_card_data/"); ?>' + type,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
          if (!response.error) {
            updateCard(type, response);
            
            totalKib += response.jum_kib;
            totalProses += response.proses;
            totalVerif += response.verif;
            totalTolak += response.tolak;
            totalSisa += response.sisa;
          }
        },
        error: function() {
          console.error('Failed to load data for ' + type);
          $('#progress-' + type).html('<div class="text-danger p-1">Failed to load data</div>');
        },
        complete: function() {
          completedRequests++;
          if (completedRequests === types.length) {
            updateTotalCard();
          }
        }
      });
    });
  });
</script>
</body>
</html>
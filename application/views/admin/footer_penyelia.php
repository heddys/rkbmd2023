<!-- /.content-wrapper -->
<footer class="main-footer">
    <font size="2"><strong>IT BLPPA - APLIKASI E-RKBMD SURABAYA - Theme By AdminLTE.io</strong>
    All rights reserved.</font>
    <div class="float-right d-none d-sm-inline-block">
      <font size="2"><b>Version</b> RKBMD.Beta-01</font>
    </div>
  </footer>
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
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url();?>ini_assets/plugins/jquery-knob/jquery.knob.min.js"></script>
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
<!-- SweetAlert2 -->
<script src="<?php echo base_url();?>ini_assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url();?>ini_assets/plugins/toastr/toastr.min.js"></script>
<!-- PIE Chart JS -->
<script src="<?php echo base_url();?>ini_assets/plugins/chart.js/Chart.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>ini_assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>ini_assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script>

    $(document).ready(function(){
      $("#tabel-home").DataTable();
    });

    $('#select_lokasi').select2({
        width: 'resolve'
      });
    

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

    $(document).ready(function () {

      var proses = document.getElementById('proses').value;
      var tolak = document.getElementById('tolak').value;
      var verif = document.getElementById('verif').value;
     
        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieData        = {
        labels: [
            'Register Proses', 
            'Register Di Tolak',
            'Register Ter-Verifikasi', 
        ],
        datasets: [
            {
            data: [proses,tolak,verif],
            backgroundColor : ['#f56954', '#00a65a', '#f39c12'],
            }
        ]
        }

        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var pieOptions     = {
        maintainAspectRatio : false,
        responsive : true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var pieChart = new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions      
      });
    });

        function detail_hasil(no_unit) {
            $('#modal-hasil').modal();

            var html = '';

            $.ajax({
                  type: 'ajax',
                  method: 'post',
                  url: '<?php echo site_url();?>/Home_penyelia/get_rekapan_aset',
                  data:{unit:no_unit},
                  async: false,
                  dataType: 'json',
                  success: function(data){

                        html += '<div class="row">'+
                        '<div class="col-12">'+
                          '<div class="card">'+
                            '<div class="card-header bg-danger">'+
                              '<h5 class="card-title"><center><strong style="font-size: 20px;color: black;">Total Progres Aset Tetap Tanah</strong></center></h5>'+
                            '</div>'+
                            '<div class="card-body">'+
                              '<div class="row">'+
                                '<div class="col-md-12">'+
                                '<div class="progress" style="height:25px">'+
                                  '<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:'+data['persentase_tanah']+'%"><strong style="font-size: 20px;color: black;">'+data['persentase_tanah']+'%</strong></div>'+
                                  '</div>'+
                                '</div>'+  
                              '</div>'+
                            '</div>'+
                            '<div class="card-footer">'+
                              '<div class="row">'+
                                '<div class="col-sm col-6">'+
                                  '<div class="description-block border-right">'+
                                    '<h5 class="description-header">'+data['rekap_tot_tanah']+'</h5>'+
                                    '<span class="description-text">TOTAL REGISTER</span>'+
                                  '</div>'+
                                '</div>'+
                                '<div class="col-sm col-6">'+
                                  '<div class="description-block border-right">'+
                                    '<h5 class="description-header">'+data['rekap_pros_tanah']+'</h5>'+
                                    '<span class="description-text">PROSES VERIFIKASI</span>'+
                                  '</div>'+
                                '</div>'+
                                '<div class="col-sm col-6">'+
                                  '<div class="description-block border-right">'+
                                    '<h5 class="description-header">'+data['rekap_tolak_tanah']+'</h5>'+
                                    '<span class="description-text">REGISTER DI TOLAK</span>'+
                                  '</div>'+
                                '</div>'+
                                '<div class="col-sm col-6">'+
                                  '<div class="description-block border-right">'+
                                    '<h5 class="description-header">'+data['rekap_verif_tanah']+'</h5>'+
                                    '<span class="description-text">REGISTER TERVERIFIKASI</span>'+
                                  '</div>'+
                                '</div>'+
                                '<div class="col-sm col-6">'+
                                  '<div class="description-block">'+
                                    '<h5 class="description-header">'+data['rekap_sisa_tanah']+'</h5>'+
                                    '<span class="description-text">REGISTER BELUM DI KERJAKAN</span>'+
                                  '</div>'+
                                '</div>'+
                              '</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                      '</div>'+
                      '<hr>'+

                      // Batas Per Presentase

                      '<div class="row">'+
                        '<div class="col-12">'+
                          '<div class="card">'+
                            '<div class="card-header bg-primary">'+
                              '<h5 class="card-title"><center><strong style="font-size: 20px;color: black;">Total Progres Aset Tetap Peralatan dan Mesin</strong></center></h5>'+
                            '</div>'+
                            '<div class="card-body">'+
                              '<div class="row">'+
                                '<div class="col-md-12">'+
                                '<div class="progress" style="height:25px">'+
                                  '<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: '+data['persentase_pm']+'%"><strong style="font-size: 20px;color: black;">'+data['persentase_pm']+'%</strong></div>'+
                                  '</div>'+
                                '</div>'+  
                              '</div>'+
                            '</div>'+
                            '<div class="card-footer">'+
                              '<div class="row">'+
                                '<div class="col-sm col-6">'+
                                  '<div class="description-block border-right">'+
                                    '<h5 class="description-header">'+data['rekap_tot_pm']+'</h5>'+
                                    '<span class="description-text">TOTAL REGISTER</span>'+
                                  '</div>'+
                                '</div>'+
                                '<div class="col-sm col-6">'+
                                  '<div class="description-block border-right">'+
                                    '<h5 class="description-header">'+data['rekap_pros_pm']+'</h5>'+
                                    '<span class="description-text">PROSES VERIFIKASI</span>'+
                                  '</div>'+
                                '</div>'+
                                '<div class="col-sm col-6">'+
                                  '<div class="description-block border-right">'+
                                    '<h5 class="description-header">'+data['rekap_tolak_pm']+'</h5>'+
                                    '<span class="description-text">REGISTER DI TOLAK</span>'+
                                  '</div>'+
                                '</div>'+
                                '<div class="col-sm col-6">'+
                                  '<div class="description-block border-right">'+
                                    '<h5 class="description-header">'+data['rekap_verif_pm']+'</h5>'+
                                    '<span class="description-text">REGISTER TERVERIFIKASI</span>'+
                                  '</div>'+
                                '</div>'+
                                '<div class="col-sm col-6">'+
                                  '<div class="description-block">'+
                                    '<h5 class="description-header">'+data['rekap_sisa_pm']+'</h5>'+
                                    '<span class="description-text">REGISTER BELUM DI KERJAKAN</span>'+
                                  '</div>'+
                                '</div>'+
                              '</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                      '</div>'+
                      '<hr>'+

                      // Batas Per Presentase

                      '<div class="row">'+
                        '<div class="col-12">'+
                          '<div class="card">'+
                            '<div class="card-header bg-success">'+
                              '<h5 class="card-title"><center><strong style="font-size: 20px;color: black;">Total Progres Aset Tetap Gedung dan Bangunan</strong></center></h5>'+
                            '</div>'+
                            '<div class="card-body">'+
                              '<div class="row">'+
                                '<div class="col-md-12">'+
                                '<div class="progress" style="height:25px">'+
                                  '<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: '+data['persentase_gdb']+'%"><strong style="font-size: 20px;color: black;">'+data['persentase_gdb']+'%</strong></div>'+
                                  '</div>'+
                                '</div>'+  
                              '</div>'+
                            '</div>'+
                            '<div class="card-footer">'+
                              '<div class="row">'+
                                '<div class="col-sm col-6">'+
                                  '<div class="description-block border-right">'+
                                    '<h5 class="description-header">'+data['rekap_tot_gdb']+'</h5>'+
                                    '<span class="description-text">TOTAL REGISTER</span>'+
                                  '</div>'+
                                '</div>'+
                                '<div class="col-sm col-6">'+
                                  '<div class="description-block border-right">'+
                                    '<h5 class="description-header">'+data['rekap_pros_gdb']+'</h5>'+
                                    '<span class="description-text">PROSES VERIFIKASI</span>'+
                                  '</div>'+
                                '</div>'+
                                '<div class="col-sm col-6">'+
                                  '<div class="description-block border-right">'+
                                    '<h5 class="description-header">'+data['rekap_tolak_gdb']+'</h5>'+
                                    '<span class="description-text">REGISTER DI TOLAK</span>'+
                                  '</div>'+
                                '</div>'+
                                '<div class="col-sm col-6">'+
                                  '<div class="description-block border-right">'+
                                    '<h5 class="description-header">'+data['rekap_verif_gdb']+'</h5>'+
                                    '<span class="description-text">REGISTER TERVERIFIKASI</span>'+
                                  '</div>'+
                                '</div>'+
                                '<div class="col-sm col-6">'+
                                  '<div class="description-block">'+
                                    '<h5 class="description-header">'+data['rekap_sisa_gdb']+'</h5>'+
                                    '<span class="description-text">REGISTER BELUM DI KERJAKAN</span>'+
                                  '</div>'+
                                '</div>'+
                              '</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                      '</div>'+
                      '<hr>'+

                      // Batas Per Presentase

                      '<div class="row">'+
                        '<div class="col-12">'+
                          '<div class="card">'+
                            '<div class="card-header bg-info">'+
                              '<h5 class="card-title"><center><strong style="font-size: 20px;color: black;">Total Progres Aset Tetap Jalan,Irigasi dan Jaringan</strong></center></h5>'+
                            '</div>'+
                            '<div class="card-body">'+
                              '<div class="row">'+
                                '<div class="col-md-12">'+
                                '<div class="progress" style="height:25px">'+
                                  '<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: '+data['persentase_jij']+'%"><strong style="font-size: 20px;color: black;">'+data['persentase_jij']+'%</strong></div>'+
                                  '</div>'+
                                '</div>'+  
                              '</div>'+
                            '</div>'+
                            '<div class="card-footer">'+
                              '<div class="row">'+
                                '<div class="col-sm col-6">'+
                                  '<div class="description-block border-right">'+
                                    '<h5 class="description-header">'+data['rekap_tot_jij']+'</h5>'+
                                    '<span class="description-text">TOTAL REGISTER</span>'+
                                  '</div>'+
                                '</div>'+
                                '<div class="col-sm col-6">'+
                                  '<div class="description-block border-right">'+
                                    '<h5 class="description-header">'+data['rekap_pros_jij']+'</h5>'+
                                    '<span class="description-text">PROSES VERIFIKASI</span>'+
                                  '</div>'+
                                '</div>'+
                                '<div class="col-sm col-6">'+
                                  '<div class="description-block border-right">'+
                                    '<h5 class="description-header">'+data['rekap_tolak_jij']+'</h5>'+
                                    '<span class="description-text">REGISTER DI TOLAK</span>'+
                                  '</div>'+
                                '</div>'+
                                '<div class="col-sm col-6">'+
                                  '<div class="description-block border-right">'+
                                    '<h5 class="description-header">'+data['rekap_verif_jij']+'</h5>'+
                                    '<span class="description-text">REGISTER TERVERIFIKASI</span>'+
                                  '</div>'+
                                '</div>'+
                                '<div class="col-sm col-6">'+
                                  '<div class="description-block">'+
                                    '<h5 class="description-header">'+data['rekap_sisa_jij']+'</h5>'+
                                    '<span class="description-text">REGISTER BELUM DI KERJAKAN</span>'+
                                  '</div>'+
                                '</div>'+
                              '</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                      '</div>'+
                      '<hr>'+

                      // Batas Per Presentase

                      '<div class="row">'+
                        '<div class="col-12">'+
                          '<div class="card">'+
                            '<div class="card-header bg-warning">'+
                              '<h5 class="card-title"><center><strong style="font-size: 20px;color: black;">Total Progres Aset Tetap Lainnya</strong></center></h5>'+
                            '</div>'+
                            '<div class="card-body">'+
                              '<div class="row">'+
                                '<div class="col-md-12">'+
                                '<div class="progress" style="height:25px">'+
                                  '<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: '+data['persentase_atl']+'%"><strong style="font-size: 20px;color: black;">'+data['persentase_atl']+'%</strong></div>'+
                                  '</div>'+
                                '</div>'+  
                              '</div>'+
                            '</div>'+
                            '<div class="card-footer">'+
                              '<div class="row">'+
                                '<div class="col-sm col-6">'+
                                  '<div class="description-block border-right">'+
                                    '<h5 class="description-header">'+data['rekap_tot_atl']+'</h5>'+
                                    '<span class="description-text">TOTAL REGISTER</span>'+
                                  '</div>'+
                                '</div>'+
                                '<div class="col-sm col-6">'+
                                  '<div class="description-block border-right">'+
                                    '<h5 class="description-header">'+data['rekap_pros_atl']+'</h5>'+
                                    '<span class="description-text">PROSES VERIFIKASI</span>'+
                                  '</div>'+
                                '</div>'+
                                '<div class="col-sm col-6">'+
                                  '<div class="description-block border-right">'+
                                    '<h5 class="description-header">'+data['rekap_tolak_atl']+'</h5>'+
                                    '<span class="description-text">REGISTER DI TOLAK</span>'+
                                  '</div>'+
                                '</div>'+
                                '<div class="col-sm col-6">'+
                                  '<div class="description-block border-right">'+
                                    '<h5 class="description-header">'+data['rekap_verif_atl']+'</h5>'+
                                    '<span class="description-text">REGISTER TERVERIFIKASI</span>'+
                                  '</div>'+
                                '</div>'+
                                '<div class="col-sm col-6">'+
                                  '<div class="description-block">'+
                                    '<h5 class="description-header">'+data['rekap_sisa_atl']+'</h5>'+
                                    '<span class="description-text">REGISTER BELUM DI KERJAKAN</span>'+
                                  '</div>'+
                                '</div>'+
                              '</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                      '</div>'+
                      '<hr>'+

                      // Batas Per Presentase

                      '<div class="row">'+
                        '<div class="col-12">'+
                          '<div class="card">'+
                            '<div class="card-header bg-grey">'+
                              '<h5 class="card-title"><center><strong style="font-size: 20px;color: black;">Total Progres Aset Tak Berwujud</strong></center></h5>'+
                            '</div>'+
                            '<div class="card-body">'+
                              '<div class="row">'+
                                '<div class="col-md-12">'+
                                '<div class="progress" style="height:25px">'+
                                  '<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: '+data['persentase_atb']+'%"><strong style="font-size: 20px;color: black;">'+data['persentase_atb']+'%</strong></div>'+
                                  '</div>'+
                                '</div>'+  
                              '</div>'+
                            '</div>'+
                            '<div class="card-footer">'+
                              '<div class="row">'+
                                '<div class="col-sm col-6">'+
                                  '<div class="description-block border-right">'+
                                    '<h5 class="description-header">'+data['rekap_tot_atb']+'</h5>'+
                                    '<span class="description-text">TOTAL REGISTER</span>'+
                                  '</div>'+
                                '</div>'+
                                '<div class="col-sm col-6">'+
                                  '<div class="description-block border-right">'+
                                    '<h5 class="description-header">'+data['rekap_pros_atb']+'</h5>'+
                                    '<span class="description-text">PROSES VERIFIKASI</span>'+
                                  '</div>'+
                                '</div>'+
                                '<div class="col-sm col-6">'+
                                  '<div class="description-block border-right">'+
                                    '<h5 class="description-header">'+data['rekap_tolak_atb']+'</h5>'+
                                    '<span class="description-text">REGISTER DI TOLAK</span>'+
                                  '</div>'+
                                '</div>'+
                                '<div class="col-sm col-6">'+
                                  '<div class="description-block border-right">'+
                                    '<h5 class="description-header">'+data['rekap_verif_atb']+'</h5>'+
                                    '<span class="description-text">REGISTER TERVERIFIKASI</span>'+
                                  '</div>'+
                                '</div>'+
                                '<div class="col-sm col-6">'+
                                  '<div class="description-block">'+
                                    '<h5 class="description-header">'+data['rekap_sisa_atb']+'</h5>'+
                                    '<span class="description-text">REGISTER BELUM DI KERJAKAN</span>'+
                                  '</div>'+
                                '</div>'+
                              '</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                      '</div>'+
                      '<hr>';


                      $('#modal-hasil').find('#isi_body').html(html);                    
                    },
                    error: function() {
                      alert('Koneksi Gagal');
                    }
                });
                 
        }

    

</script>
</body>
</html>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <font size="2"><strong>IT BLPPA - APLIKASI E-RKBMD SURABAYA - Theme By AdminLTE.io</strong>
    All rights reserved.</font>
    <div class="float-right d-none d-sm-inline-block">
      <font size="2"><b>Version</b> RKBMD.Beta-01</font>
    </div>
  </footer>
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
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url();?>ini_assets/plugins/jquery-knob/jquery.knob.min.js"></script>
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
<!-- SweetAlert2 -->
<script src="<?php echo base_url();?>ini_assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url();?>ini_assets/plugins/toastr/toastr.min.js"></script>
<!-- PIE Chart JS -->
<script src="<?php echo base_url();?>ini_assets/plugins/chart.js/Chart.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>ini_assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>ini_assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script>

    $(document).ready(function(){
      $("#tabel-home").DataTable();
    });

    $('#select_lokasi').select2({
        width: 'resolve'
      });
    

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

    $(document).ready(function () {

      var proses = document.getElementById('proses').value;
      var tolak = document.getElementById('tolak').value;
      var verif = document.getElementById('verif').value;
     
        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieData        = {
        labels: [
            'Register Proses', 
            'Register Di Tolak',
            'Register Ter-Verifikasi', 
        ],
        datasets: [
            {
            data: [proses,tolak,verif],
            backgroundColor : ['#f56954', '#00a65a', '#f39c12'],
            }
        ]
        }

        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var pieOptions     = {
        maintainAspectRatio : false,
        responsive : true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var pieChart = new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions      
      });
    });

    function detail_hasil(no_unit) {
        $('#modal-hasil').modal();

        var html = '';

        $.ajax({
              type: 'ajax',
              method: 'post',
              url: '<?php echo site_url();?>/Home_penyelia/get_rekapan_aset',
              data:{unit:no_unit},
              async: false,
              dataType: 'json',
              success: function(data){

                    html += '<div class="row">'+
                    '<div class="col-12">'+
                      '<div class="card">'+
                        '<div class="card-header bg-danger">'+
                          '<h5 class="card-title"><center><strong style="font-size: 20px;color: black;">Total Progres Aset Tetap Tanah</strong></center></h5>'+
                        '</div>'+
                        '<div class="card-body">'+
                          '<div class="row">'+
                            '<div class="col-md-12">'+
                            '<div class="progress" style="height:25px">'+
                              '<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round((float)$data->presentase_tanah,3) . '%';?>"><strong style="font-size: 20px;color: black;"><?php echo round((float)$data->presentase_tanah,3) . '%';?></strong></div>'+
                              '</div>'+
                            '</div>'+  
                          '</div>'+
                        '</div>'+
                        '<div class="card-footer">'+
                          '<div class="row">'+
                            '<div class="col-sm col-6">'+
                              '<div class="description-block border-right">'+
                                '<h5 class="description-header">11</h5>'+
                                '<span class="description-text">TOTAL REGISTER</span>'+
                              '</div>'+
                            '</div>'+
                            '<div class="col-sm col-6">'+
                              '<div class="description-block border-right">'+
                                '<h5 class="description-header">22</h5>'+
                                '<span class="description-text">PROSES VERIFIKASI</span>'+
                              '</div>'+
                            '</div>'+
                            '<div class="col-sm col-6">'+
                              '<div class="description-block border-right">'+
                                '<h5 class="description-header">33</h5>'+
                                '<span class="description-text">REGISTER DI TOLAK</span>'+
                              '</div>'+
                            '</div>'+
                            '<div class="col-sm col-6">'+
                              '<div class="description-block border-right">'+
                                '<h5 class="description-header">44</h5>'+
                                '<span class="description-text">REGISTER TERVERIFIKASI</span>'+
                              '</div>'+
                            '</div>'+
                            '<div class="col-sm col-6">'+
                              '<div class="description-block">'+
                                '<h5 class="description-header">55</h5>'+
                                '<span class="description-text">REGISTER BELUM DI KERJAKAN</span>'+
                              '</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                      '</div>'+
                    '</div>'+
                  '</div>'+
                  '<hr>'+

                  // Batas Per Presentase

                  '<div class="row">'+
                    '<div class="col-12">'+
                      '<div class="card">'+
                        '<div class="card-header bg-primary">'+
                          '<h5 class="card-title"><center><strong style="font-size: 20px;color: black;">Total Progres Aset Tetap Peralatan dan Mesin}</strong></center></h5>'+
                        '</div>'+
                        '<div class="card-body">'+
                          '<div class="row">'+
                            '<div class="col-md-12">'+
                            '<div class="progress" style="height:25px">'+
                              '<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 67%"><strong style="font-size: 20px;color: black;">67</strong></div>'+
                              '</div>'+
                            '</div>'+  
                          '</div>'+
                        '</div>'+
                        '<div class="card-footer">'+
                          '<div class="row">'+
                            '<div class="col-sm col-6">'+
                              '<div class="description-block border-right">'+
                                '<h5 class="description-header">11</h5>'+
                                '<span class="description-text">TOTAL REGISTER</span>'+
                              '</div>'+
                            '</div>'+
                            '<div class="col-sm col-6">'+
                              '<div class="description-block border-right">'+
                                '<h5 class="description-header">22</h5>'+
                                '<span class="description-text">PROSES VERIFIKASI</span>'+
                              '</div>'+
                            '</div>'+
                            '<div class="col-sm col-6">'+
                              '<div class="description-block border-right">'+
                                '<h5 class="description-header">33</h5>'+
                                '<span class="description-text">REGISTER DI TOLAK</span>'+
                              '</div>'+
                            '</div>'+
                            '<div class="col-sm col-6">'+
                              '<div class="description-block border-right">'+
                                '<h5 class="description-header">44</h5>'+
                                '<span class="description-text">REGISTER TERVERIFIKASI</span>'+
                              '</div>'+
                            '</div>'+
                            '<div class="col-sm col-6">'+
                              '<div class="description-block">'+
                                '<h5 class="description-header">55</h5>'+
                                '<span class="description-text">REGISTER BELUM DI KERJAKAN</span>'+
                              '</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                      '</div>'+
                    '</div>'+
                  '</div>'+
                  '<hr>'+

                  // Batas Per Presentase

                  '<div class="row">'+
                    '<div class="col-12">'+
                      '<div class="card">'+
                        '<div class="card-header bg-success">'+
                          '<h5 class="card-title"><center><strong style="font-size: 20px;color: black;">Total Progres Aset Tetap Gedung dan Bangunan</strong></center></h5>'+
                        '</div>'+
                        '<div class="card-body">'+
                          '<div class="row">'+
                            '<div class="col-md-12">'+
                            '<div class="progress" style="height:25px">'+
                              '<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 67%"><strong style="font-size: 20px;color: black;">67</strong></div>'+
                              '</div>'+
                            '</div>'+  
                          '</div>'+
                        '</div>'+
                        '<div class="card-footer">'+
                          '<div class="row">'+
                            '<div class="col-sm col-6">'+
                              '<div class="description-block border-right">'+
                                '<h5 class="description-header">11</h5>'+
                                '<span class="description-text">TOTAL REGISTER</span>'+
                              '</div>'+
                            '</div>'+
                            '<div class="col-sm col-6">'+
                              '<div class="description-block border-right">'+
                                '<h5 class="description-header">22</h5>'+
                                '<span class="description-text">PROSES VERIFIKASI</span>'+
                              '</div>'+
                            '</div>'+
                            '<div class="col-sm col-6">'+
                              '<div class="description-block border-right">'+
                                '<h5 class="description-header">33</h5>'+
                                '<span class="description-text">REGISTER DI TOLAK</span>'+
                              '</div>'+
                            '</div>'+
                            '<div class="col-sm col-6">'+
                              '<div class="description-block border-right">'+
                                '<h5 class="description-header">44</h5>'+
                                '<span class="description-text">REGISTER TERVERIFIKASI</span>'+
                              '</div>'+
                            '</div>'+
                            '<div class="col-sm col-6">'+
                              '<div class="description-block">'+
                                '<h5 class="description-header">55</h5>'+
                                '<span class="description-text">REGISTER BELUM DI KERJAKAN</span>'+
                              '</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                      '</div>'+
                    '</div>'+
                  '</div>'+
                  '<hr>'+

                  // Batas Per Presentase

                  '<div class="row">'+
                    '<div class="col-12">'+
                      '<div class="card">'+
                        '<div class="card-header bg-info">'+
                          '<h5 class="card-title"><center><strong style="font-size: 20px;color: black;">Total Progres Aset Tetap Jalan,Irigasi dan Jaringan</strong></center></h5>'+
                        '</div>'+
                        '<div class="card-body">'+
                          '<div class="row">'+
                            '<div class="col-md-12">'+
                            '<div class="progress" style="height:25px">'+
                              '<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 67%"><strong style="font-size: 20px;color: black;">67</strong></div>'+
                              '</div>'+
                            '</div>'+  
                          '</div>'+
                        '</div>'+
                        '<div class="card-footer">'+
                          '<div class="row">'+
                            '<div class="col-sm col-6">'+
                              '<div class="description-block border-right">'+
                                '<h5 class="description-header">11</h5>'+
                                '<span class="description-text">TOTAL REGISTER</span>'+
                              '</div>'+
                            '</div>'+
                            '<div class="col-sm col-6">'+
                              '<div class="description-block border-right">'+
                                '<h5 class="description-header">22</h5>'+
                                '<span class="description-text">PROSES VERIFIKASI</span>'+
                              '</div>'+
                            '</div>'+
                            '<div class="col-sm col-6">'+
                              '<div class="description-block border-right">'+
                                '<h5 class="description-header">33</h5>'+
                                '<span class="description-text">REGISTER DI TOLAK</span>'+
                              '</div>'+
                            '</div>'+
                            '<div class="col-sm col-6">'+
                              '<div class="description-block border-right">'+
                                '<h5 class="description-header">44</h5>'+
                                '<span class="description-text">REGISTER TERVERIFIKASI</span>'+
                              '</div>'+
                            '</div>'+
                            '<div class="col-sm col-6">'+
                              '<div class="description-block">'+
                                '<h5 class="description-header">55</h5>'+
                                '<span class="description-text">REGISTER BELUM DI KERJAKAN</span>'+
                              '</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                      '</div>'+
                    '</div>'+
                  '</div>'+
                  '<hr>'+

                  // Batas Per Presentase

                  '<div class="row">'+
                    '<div class="col-12">'+
                      '<div class="card">'+
                        '<div class="card-header bg-warning">'+
                          '<h5 class="card-title"><center><strong style="font-size: 20px;color: black;">Total Progres Aset Tetap Lainnya</strong></center></h5>'+
                        '</div>'+
                        '<div class="card-body">'+
                          '<div class="row">'+
                            '<div class="col-md-12">'+
                            '<div class="progress" style="height:25px">'+
                              '<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 67%"><strong style="font-size: 20px;color: black;">67</strong></div>'+
                              '</div>'+
                            '</div>'+  
                          '</div>'+
                        '</div>'+
                        '<div class="card-footer">'+
                          '<div class="row">'+
                            '<div class="col-sm col-6">'+
                              '<div class="description-block border-right">'+
                                '<h5 class="description-header">11</h5>'+
                                '<span class="description-text">TOTAL REGISTER</span>'+
                              '</div>'+
                            '</div>'+
                            '<div class="col-sm col-6">'+
                              '<div class="description-block border-right">'+
                                '<h5 class="description-header">22</h5>'+
                                '<span class="description-text">PROSES VERIFIKASI</span>'+
                              '</div>'+
                            '</div>'+
                            '<div class="col-sm col-6">'+
                              '<div class="description-block border-right">'+
                                '<h5 class="description-header">33</h5>'+
                                '<span class="description-text">REGISTER DI TOLAK</span>'+
                              '</div>'+
                            '</div>'+
                            '<div class="col-sm col-6">'+
                              '<div class="description-block border-right">'+
                                '<h5 class="description-header">44</h5>'+
                                '<span class="description-text">REGISTER TERVERIFIKASI</span>'+
                              '</div>'+
                            '</div>'+
                            '<div class="col-sm col-6">'+
                              '<div class="description-block">'+
                                '<h5 class="description-header">55</h5>'+
                                '<span class="description-text">REGISTER BELUM DI KERJAKAN</span>'+
                              '</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                      '</div>'+
                    '</div>'+
                  '</div>'+
                  '<hr>'+

                  // Batas Per Presentase

                  '<div class="row">'+
                    '<div class="col-12">'+
                      '<div class="card">'+
                        '<div class="card-header bg-grey">'+
                          '<h5 class="card-title"><center><strong style="font-size: 20px;color: black;">Total Progres Aset Tak Berwujud</strong></center></h5>'+
                        '</div>'+
                        '<div class="card-body">'+
                          '<div class="row">'+
                            '<div class="col-md-12">'+
                            '<div class="progress" style="height:25px">'+
                              '<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 67%"><strong style="font-size: 20px;color: black;">67</strong></div>'+
                              '</div>'+
                            '</div>'+  
                          '</div>'+
                        '</div>'+
                        '<div class="card-footer">'+
                          '<div class="row">'+
                            '<div class="col-sm col-6">'+
                              '<div class="description-block border-right">'+
                                '<h5 class="description-header">11</h5>'+
                                '<span class="description-text">TOTAL REGISTER</span>'+
                              '</div>'+
                            '</div>'+
                            '<div class="col-sm col-6">'+
                              '<div class="description-block border-right">'+
                                '<h5 class="description-header">22</h5>'+
                                '<span class="description-text">PROSES VERIFIKASI</span>'+
                              '</div>'+
                            '</div>'+
                            '<div class="col-sm col-6">'+
                              '<div class="description-block border-right">'+
                                '<h5 class="description-header">33</h5>'+
                                '<span class="description-text">REGISTER DI TOLAK</span>'+
                              '</div>'+
                            '</div>'+
                            '<div class="col-sm col-6">'+
                              '<div class="description-block border-right">'+
                                '<h5 class="description-header">44</h5>'+
                                '<span class="description-text">REGISTER TERVERIFIKASI</span>'+
                              '</div>'+
                            '</div>'+
                            '<div class="col-sm col-6">'+
                              '<div class="description-block">'+
                                '<h5 class="description-header">55</h5>'+
                                '<span class="description-text">REGISTER BELUM DI KERJAKAN</span>'+
                              '</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                      '</div>'+
                    '</div>'+
                  '</div>'+
                  '<hr>';


                  $('#modal-hasil').find('#isi_body').html(html);                    
                },
                error: function() {
                  alert('Koneksi Gagal');
                }
            });
              
    }

    

</script>
</body>
</html>
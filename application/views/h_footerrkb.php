 <!-- /.content-wrapper -->
  <footer class="main-footer">
    <font size="2"><strong>IT BLPPA - APLIKASI SI-IBMD SURABAYA - Theme By AdminLTE.io</strong>
    All rights reserved.</font>
    <div class="float-right d-none d-sm-inline-block">
      <font size="2"><b>Version</b> RKBMD.Beta-01</font>
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url();?>ini_assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>ini_assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>ini_assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>ini_assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>ini_assets/plugins/fastclick/fastclick.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url();?>ini_assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url();?>ini_assets/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>ini_assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>ini_assets/dist/js/demo.js"></script>
<script src="<?php echo base_url();?>ini_assets/plugins/select2/js/select2.full.min.js"></script>
<script>

  //  $("#example1").DataTable();
   $('#tabel_cetak2').DataTable();
   $('#tabel_proses_verif2').DataTable();
   $('#tabel_petugas').DataTable();
   $('.select2').select2();
   $('.select_lokasi').select2({
    width: 'resolve'
   });
   

   function showTime() {
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

    function rupiah (angka){
       var reverse = angka.toString().split('').reverse().join(''),
       ribuan = reverse.match(/\d{1,3}/g);
       ribuan = ribuan.join('.').split('').reverse().join('');
       return ribuan;
    }
</script>
</body>
</html>

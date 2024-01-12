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
   $('#tabel_pbp').DataTable();
   $('#tabel_proses_verif2').DataTable();
   $('#tabel_petugas').DataTable({
    dom: 'Bfrtip',
    buttons: [
        'colvis',
        'excel',
        'print'
    ]
   });
   $('.select2').select2();
   $("#tabel_kendaraan").DataTable();
   $('.select_lokasi').select2({
    width: 'resolve'
   });

   $('.select_limit').select2({
    width: '5%',
    minimumResultsForSearch: Infinity
   });
   $('.select_lokasi_edit').select2({
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

    function get_data_petugas(id) {
      $.ajax({
              type: 'ajax',
              method: 'post',
              url: '<?php echo site_url();?>/home_penyelia/get_data_petugas',
              data:{id:id},
              async: false,
              dataType: 'json',
              success: function(data){
                    $('#edit_modal').modal({backdrop: 'static', keyboard: false});
                    document.getElementById("id").value=data['id'];
                    document.getElementById("nama").value=data['nama_petugas'];
                    document.getElementById("nip").value=data['nip_petugas'];
                    document.getElementById("pangkat_select").value=data['pangkat_petugas'];
                    $("#lokasi_select").val(data['nomor_lokasi']).change();
                    // $("#lokasi_select option[value="+data['nomor_lokasi']+"]").attr('selected', 'selected');
              },
                error: function() {
                  const Toast = Swal.mixin({
                    toast: true,
                    position: 'center',
                    showConfirmButton: false,
                    timer: 3000
                  });
                    Toast.fire({
                      type: 'error',
                      title: 'Oops! Koneksi Ke Database Gagal!!'
                    })
                }
            });
    }

    function show_sk() {
      $('#show_sk').modal({backdrop: 'static', keyboard: false});
    }

    function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + 'px';
    }

    $('#customFile').bind('change', function() {

    //this.files[0].size gets the size of your file.
    var pdf = document.getElementById('customFile');
    if(image.files.item(i).size > 8000000 || (image.files.item(i).type != "image/jpeg" && image.files.item(i).type != "image/jpg" && image.files.item(i).type != "image/png" )) {
        var html = "<div class='alert alert-danger alert-dismissible'>"+
                      "<h5><i class='icon fas fa-ban'></i> Oops!</h5>"+
                      "Mohon Maaf Salah Satu Tipe atau Ukuran File Lebih Dari 7 Mb, Silahkan Periksa Kembali Ukuran File Yang Anda Upload"+
                  "</div>";
                  
        $('#alert').html(html);
        document.getElementById("customFile").value = "";
      } else {
        var html = ""
        $('#alert').html(html);
      }
    });

    $("#show_sk").find(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

</script>
</body>
</html>

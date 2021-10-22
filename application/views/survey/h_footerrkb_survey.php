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

<script src="<?php echo base_url();?>ini_assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>ini_assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url();?>ini_assets/plugins/select2/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url();?>ini_assets/plugins/inputmask/jquery.inputmask.bundle.js"></script>
<script src="<?php echo base_url();?>ini_assets/plugins/moment/moment.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url();?>ini_assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url();?>ini_assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url();?>ini_assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>ini_assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>ini_assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>ini_assets/dist/js/demo.js"></script>
<script src="<?php echo base_url();?>ini_assets/plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?php echo base_url();?>ini_assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>ini_assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- Page script -->
<script>

    $(function(){
      $('.select2').select2()
      $('.select3').select2()
      $('.textarea').summernote()
      $("#example1").DataTable();
      $("#tabel_usulan").DataTable();
    })


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

   
    function hitung() {
      var x = document.getElementById("ideal").value;
      var y = document.getElementById("eksis").value;
      var z = x-y;
      if (z < 0) {
        z=0;
      } else {
          z;
        } 
      document.getElementById("hasil").placeholder=z;
      document.getElementById("gethasil").value=z;
    }

    function myFunction() {
      var x = document.getElementById("myInput").value;
      document.getElementById("demo").innerHTML = "You wrote: " + x;
    }

    
    $('#tabel_usulan').on('click','.delete_usulan',function(){
      var id = $(this).attr('data');
      $('#modal-lg').modal('show');
      $.ajax({
        type: 'ajax',
        method: 'post',
        url: '<?php echo site_url();?>/home_survey/get_usulan',
        data:{id:id},
        async: false,
        dataType: 'json',
        success: function(data){
          var html= '';
          var title='';
          var i=data.length;
          
          var x=data.opd;
          
          
          title+=data.opd+' - '+data.nama_komp
          $('#isi_modal').html(html+html2);
          
        }, 
         error: function() {
          alert('Koneksi Gagal');
        }
        
        
        })  
    })


    function rupiah (angka){
       var reverse = angka.toString().split('').reverse().join(''),
       ribuan = reverse.match(/\d{1,3}/g);
       ribuan = ribuan.join('.').split('').reverse().join('');
       return ribuan;
    }

    $('#example1').on('click','.rincian_kegiatan',function(){
      var id = $(this).attr('data');
      $('#modal-xl').modal('show');
      $.ajax({
        type: 'ajax',
        method: 'post',
        url: '<?php echo site_url();?>/home_survey/show_data_komponen',
        data:{id:id},
        async: false,
        dataType: 'json',
        success: function(data){
            var html = '';
            var title ='';
            var satuan='';
            var x=1;
            var jumsaldo=0;
            var jumnilai=0;
            var html2='';

              for (i=0; i < data.length; i++) {
                  html += 
                        '<tr>'+
                          '<td><center>'+x+'</center></td>'+
                          '<td><center>'+data[i].kode_keg+'</center></td>'+
                          '<td>'+data[i].nama_keg+'</td>'+
                          '<td><center>'+data[i].ket_koefisien+'</center></td>'+
                          '<td class="text-right">Rp.'+rupiah(data[i].nilai_anggaran)+',00</td>'+       
                          '<td>'+data[i].detail_name+'</td>'+
                          '</tr>';
                        x++;
                        jumnilai+=parseInt(data[i].nilai_anggaran);
                        jumsaldo+=parseInt(data[i].volume);
                        satuan=data[i].satuan;

              }
              title+= data[0].komp_name;
              html2+= '<tr><td colspan="3"><center><b>TOTAL</b></center></td>'+
                      '<td><center><b>'+jumsaldo+' '+satuan+'</b></center></td>'+
                      '<td class="text-right"><b>Rp. '+rupiah(jumnilai)+',00</b></td>'+
                      '<td colspan="2"></td></tr>';
              $('#modal-xl').find('#idku').text(title);
              $('#tampil_data').html(html+html2);

          },
          error: function() {
            alert('Koneksi Gagal');

          }
      });
    });

    // $('#tabel_usulan').on('click','.edit_usulan',function(){
    //   var id = $(this).attr('data');
    //   $('#modal-xl').modal('show');
    //   $.ajax({
    //     type: 'ajax',
    //     method: 'post',
    //     url: '<?php echo site_url();?>/home_survey/show_data_komponen',
    //     data:{id:id},
    //     async: false,
    //     dataType: 'json',
    //     success: function(data){

    //       },
    //       error: function() {
    //         alert('Koneksi Gagal');

    //       }
    //   });
    // });


</script>
</body>
</html>

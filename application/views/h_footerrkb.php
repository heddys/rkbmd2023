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
<script>

 $(function () {
   $("#example1").DataTable();

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

   $('#example1').on('click','.rincian_kegiatan',function(){
    var id = $(this).attr('data');
    $('#modal-xl').modal('show');
    $.ajax({
      type: 'ajax',
      method: 'post',
      url: '<?php echo site_url();?>/home/show_data_komponen',
      data:{id:id},
      async: false,
      dataType: 'json',
      success: function(data){
          var html = '';
          var title ='';
          var i=data.length;
          var x=1;
          var jumsaldo=0;
          var jumnilai=0;
          var html2='';
            for (i=0; i < data.length; i++) {
                html += 
                      '<tr>'+
                        '<td><center>'+x+'</center></td>'+
                        '<td><center>'+data[i].kode_kegiatan+'</center></td>'+
                        '<td>'+data[i].nama_kegiatan+'</td>'+
                        '<td><center>'+data[i].saldo_kegiatan+'</center></td>'+
                        '<td class="text-right">Rp.'+rupiah(data[i].nilai*data[i].saldo_kegiatan)+',00</td>'+       
                        '<td>'+data[i].keterangan+'</td>'+
                        '<td><center><a href="javascript:;" class="btn btn-sm btn-danger data-delete" data="'+data[i].id+'"><i class="far fa-trash-alt"></i></a>'+
                        '<form action="<?php echo site_url();?>/home/edit_data" method="post">'+
                        '<input type="hidden" name="idrkb" value="'+data[i].id+'">'+
                        '<input type="hidden" name="idkomp" value="'+data[i].id_komponen+'">'+
                        '<button type="submit" class="btn btn-sm btn-info" title="Edit Data Kegiatan"><i class="fas fa-edit"></i></a>'+
                        '</form></td></tr>';
                      x++;
                      jumnilai+=parseInt(data[i].nilai*data[i].saldo_kegiatan);
                      jumsaldo+=parseInt(data[i].saldo_kegiatan);

            }
            title+= data[0].nama_komponen+' - '+data[0].spek1;
            html2+= '<tr><td colspan="3"><center><b>TOTAL</b></center></td>'+
                    '<td><center><b>'+jumsaldo+'</b></center></td>'+
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

    const Toast = Swal.mixin({
      toast: true,
      position: 'mid-end',
      showConfirmButton: false,
      timer: 3000
    });

    const Toast2 = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 4000
    });

 $('#tampil_data').on('click', '.data-delete', function(){
    var idku=$(this).attr('data');
    $('#modal-xl').modal('hide');
    $('#modal-delete').modal('show');
    document.getElementById('id').value=idku;
 });

 $('#modal-delete').on('click', '.batal', function(){
    $('#modal-delete').modal('hide');
    $('#modal-xl').modal('show');
 });

 $('a.excel').click(function(){

    $.ajax({
      type: 'ajax',
      url: '<?php echo site_url();?>/home/cek_count',
      async: false,
      dataType: 'json',
      success: function(data){
          if(data==1){
            Toast2.fire({
                type: 'error',
                title: 'Maaf, Tidak bisa mencetak laporan, Masih ada beberapa komponen yang belum mencapai saldo kebutuhan'
            })
          } else {
                location.replace("<?php echo site_url();?>/home/download");
              }

        },
        error: function() {
            Toast2.fire({
                type: 'error',
                title: 'Koneksi Gagal'
            })
            function refresh() {
              location.reload();
            }
           setInterval(refresh,2500);
        }
      });
  });



 $('#modal-delete').on('click', '.delete', function(){
    var id = document.getElementById('id').value;
    $.ajax({
      type: 'ajax',
      method: 'post',
      url: '<?php echo site_url();?>/home/delete_data',
      data:{id:id},
      async: false,
      dataType: 'json',
      success: function(data){
            Toast.fire({
                type: 'success',  
                title: 'Penghapusan Data Komponen Berhasil.'
            })
            function refresh() {
              location.reload();
            }
           setInterval(refresh,2500);
        },
        error: function() {
            Toast.fire({
                type: 'error',
                title: 'Penghapusan Data Komponen Gagal.'
            })
        }
    });
  });

 });      
</script>
</body>
</html>

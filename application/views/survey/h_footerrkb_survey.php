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
<!-- Sweet Alert -->
<script src="<?php echo base_url();?>ini_assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url();?>ini_assets/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>ini_assets/dist/js/demo.js"></script>
<script src="<?php echo base_url();?>ini_assets/plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?php echo base_url();?>ini_assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>ini_assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- Page script -->

<script type="text/javascript">

    $(function(){
      $('.select2').select2();
      $('.select3').select2();
      $('.textarea').summernote();
      $("#example1").DataTable();
      $("#tabel_usulan").DataTable();

      

    });
      
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
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

   
    function hitung() {
      
      
      var x = document.getElementById("ideal").value;
      var y = document.getElementById("eksis").value;
      
    
      var z = x-y;
      if (z < 0) {
        z=0;
      } else {
          z;
        }
      document.getElementById("hasil").value=z;
      document.getElementById("gethasil").value=z;
      document.getElementById("getideal").value=x;
      document.getElementById("geteksis").value=y;

      
    }

    function myFunction() {
      var x = document.getElementById("myInput").value;
      document.getElementById("demo").innerHTML = "You wrote: " + x;
    }

    $('#tabel_usulan').on('click','.delete_usulan',function(){
      $('#modal-sm').modal('show');
      var idhapus=$(this).attr('data');
      document.getElementById("idhapus").value=idhapus;
    })


    $('#modal-sm').on('click','.delbtn',function(){
      var id=document.getElementById("idhapus").value;
        $.ajax({
          type: 'ajax',
          method: 'post',
          url: '<?php echo site_url();?>/home_survey/delete_usul_rk',
          data:{id:id},
          async: false,
          dataType: 'json',
            success: function(data){
              Toast.fire({
                type: 'success',
                title: 'Data Berhasil Dihapus'
              })
              function refresh() {
                location.reload();

                
              }
              setInterval(refresh,1500);

              
            },
            error: function() {
              Toast.fire({
                type: 'error',
                title: 'Oops! Data Gagal Dihapus. Mohon Ulangi Kembali'
              })
              function refresh() {
                location.reload();
              }
              setInterval(refresh,1500)

            }
        })
    })
    
    
    // $('#tabel_usulan').on('click','.delete_usulan',function(){
    //   var id = $(this).attr('data');
    //   $('#modal-default').modal('show');
    //   $.ajax({
    //     type: 'ajax',
    //     method: 'post',
    //     url: '<?php echo site_url();?>/home_survey/get_usulan',
    //     data:{id:id},
    //     async: false,
    //     dataType: 'json',
    //     success: function(data){
    //       var html= '';
    //       var title='';
    //       var i=data.length;
          
    //       var x=data.opd;
          
          
    //       title+=data.opd
    //       html+='<div class="row">'+
    //               '<div class="col-md-12">'+
    //                 '<div class="form-group">'+
    //                   '<label>Nama Komponen</label>'+
    //                   '<input type="text" class="form-control" placeholder="'+data.nama_komp+'" disabled>'+
    //                 '</div>'+
    //               '</div>'+
    //               '<div class="col-md-4">'+
    //                 '<div class="form-group">'+
    //                     '<label>Ideal : </label>'+
    //                     '<input type="text" class="form-control" placeholder="'+data.ideal+'" disabled>'+
    //                 '</div>'+
    //               '</div>'+
    //               '<div class="col-md-4">'+
    //                 '<div class="form-group">'+
    //                     '<label>Eksisting: </label>'+
    //                     '<input type="text" class="form-control" placeholder="'+data.exist+'" disabled>'+
    //                 '</div>'+
    //               '</div>'+
    //               '<div class="col-md-4">'+
    //                 '<div class="form-group">'+
    //                     '<label>Real : </label>'+
    //                     '<input type="text" class="form-control" placeholder="'+data.keb_real+'" disabled>'+
    //                 '</div>'+
    //               '</div>'+
    //               '<div class="col-md-12">'+
    //                 '<div class="form-group">'+
    //                     '<label>Keterangan : </label>'+
    //                     '<textarea class="form-control" rows="3">'+data.ket+'</textarea>'+
    //                 '</div>'+
    //               '</div>'+
    //             '</div>'+

    //             '<center><b>Anda Yakin Ingin Menghapus Data Ini ?</b></center>';
    //       $('#modal-default').find('#title').html(title);
    //       $('#modal-default').find('#isi_modal').html(html);
          
    //     }, 
    //      error: function() {
    //       alert('Koneksi Gagal');
    //     }
        
        
    //     })  
    // })

    
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

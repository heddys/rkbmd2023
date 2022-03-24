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
          var i=data.length;
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

$('a.excel').click(function(){

    $.ajax({
      type: 'ajax',
      url: '<?php echo site_url();?>/home/cek_count_rkp',
      async: false,
      dataType: 'json',
      success: function(data){
          if(data==1){
            Toast2.fire({
                type: 'error',
                title: 'Maaf, Tidak bisa mencetak laporan, Masih ada beberapa saldo komponen yang belum mencapai saldo kebutuhan'
            })
          } else {
                location.replace("<?php echo site_url();?>/home/download_rkp");
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

  
function rupiah (angka){
       var reverse = angka.toString().split('').reverse().join(''),
       ribuan = reverse.match(/\d{1,3}/g);
       ribuan = ribuan.join('.').split('').reverse().join('');
       return ribuan;
    }
  
 $('#modal-xl').on('click','a.detilreg',function(){
    var reg=$(this).attr('data');
    var opd=document.getElementById('kodeopd').value;
    var htmltabel ='';
          $.ajax({
                    type: 'ajax',
                    method: 'get',
                    url: 'https://simbada.surabaya.go.id/Simbada_2019/service/rkbmdreg.php',
                    data:{unit:opd,reg:reg},
                    async: true,
                    dataType: 'json',
                    xhrFields: {withCredentials: true},
                    success: function(data, status, xhr){
                    for (var i = 0; i < data.item.length; i++) {

                    htmltabel=  '<tr>'+
                                      '<td><center>'+data.item[i]['register']+'</center></td>'+
                                      '<td><center>'+data.item[i]['nama_barang']+'</center></td>'+
                                      '<td><center>'+data.item[i]['tahun']+'</center></td>'+
                                      '<td><center>'+data.item[i]['merk_alamat']+'</center></td>'+
                                      '<td><center>'+data.item[i]['tipe']+'</center></td>'+
                                  '</tr>';
                            } 
                              $('#modal-xl').modal('hide');
                              $('#modal-inforeg').find('#tampil_data').html(htmltabel);
                              $('#modal-inforeg').modal('show');


                              
                        },
                        error: function() {
                          alert('Tidak Bisa Koneksi');
                      }
                  });

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

 /*$('#tampil_data').on('click', '.data-edit', function(){
    var id=$(this).attr('data');
    $('#modal-xl').modal('hide');
    $('#modal-edit').modal('show');
    $.ajax({
      type: 'ajax',
      method: 'post',
      url: '<?php echo site_url();?>/home/edit_data',
      data:{id:id},
      async: false,
      dataType: 'json',
      success: function(data){
            var title1='';
                title1+= data['kode_kegiatan']+' - '+data['nama_kegiatan'] ;
            var title2 ='';
                title2+= data['kode_komponen']+' - '+data['nama_komponen']+' - '+data['spek1']+' - '+data['spek2']+' - '+data['merek'];
            var html = '';
                html+= '<div class="form-group">'+
                          '<label>Input Jumlah Kebutuhan Ideal : </label>'+
                          '<input type="number" class="form-control col-md-2" min="0" value="'+data["saldo_ideal_komponen"]+'" placeholder="Banyaknya" id="var1" name="keb_ideal" onInput="'+hitung()+'" required>'+
                        '</div>'+
                        '<div class="form-group">'+
                          '<label>Input Jumlah Existing : </label>'+
                          '<input type="number" class="form-control col-md-2" min="0" value="'+data["saldo_existing_komponen"]+'" placeholder="Banyaknya" id="var2" name="existing" onInput="'+hitung()+'" required>'+
                        '</div>'+
                        '<div class="form-group">'+
                          '<label>Kebutuhan Barang : '+
                            '<span id="vartotal" class="form-control">'+data["saldo_komponen"]+'</span>'+
                            '<input type="hidden" name="vartotal" id="vartotal2">'+
                            '<input type="hidden" name="kebutuhan" id="gettotal">'+
                         '</label>'+
                        '</div>'+
                        '<hr><textarea class="form-control col-sm-6" rows="3" placeholder="Keterangan" name="keterangan1">'+data["keterangan"]+'</textarea>'

                function hitung() {
                  var x = document.getElementById("var1").value;
                  var y = document.getElementById("var2").value;
                  var z = x-y;
                  if (z < 0) {
                    z=0;
                  } else {
                      z;
                    } 
                  document.getElementById('vartotal').innerHTML=z;
                  document.getElementById('gettotal').value=z;
                }
            $('#modal-edit').find('#idku').text(title2);
            $('#modal-edit').find('.modal-title').text(title1);
            $('#isibody').html(html);
        },
        error: function() {
            Toast.fire({
                type: 'error',
                title: 'Pengambilan Data Gagal.'
            })
        }
    });
 });*/


 $('#modal-delete').on('click', '.delete', function(){
    var id = document.getElementById('id').value;
    $.ajax({
      type: 'ajax',
      method: 'post',
      url: '<?php echo site_url();?>/home/delete_data_rkp',
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

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
<!-- Select2 -->
<script src="<?php echo base_url();?>ini_assets/plugins/select2/js/select2.full.min.js"></script>
<script>

 $(function () {
   $("#example1").DataTable();
   $("#example2").DataTable();

   $(function () {
                  //Initialize Select2 Elements
                  $('.select2').select2({ width: '50%'});
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
    }); 

   $('#example1').on('click','.rincian_kegiatan',function(){
    var id = $(this).attr('data');
    document.getElementById('idsementara').value=id;

    $('#modal-xl').modal('show');
    $('#modal-xl').find("#tampilannya").remove(); 
    $.ajax({
      type: 'ajax',
      method: 'post',
      url: '<?php echo site_url();?>/home/show_data_exist',
      data:{id:id},
      async: false,
      dataType: 'json',
      success: function(data){
          var html = '';
          var title ='';
          var i=data.length;
          var x=1;
            for (i=0; i < data.length; i++) {
              html += '<tr id="tampilannya">'+
                        '<td><center>'+data[i].register+'</center></td>'+
                        '<td><center>'+data[i].kondisi+'</center></td>'+
                        '<td>'+data[i].penggunaan+'</td>'+
                        '<td><center>'+data[i].dipakai_oleh+'</center></td>'+    
                        '<td>'+data[i].ket+'</td>'+
                        '<td><center><a href="javascript:;" class="btn btn-sm btn-danger data-delete" data1="'+data[i].id+'" data2="'+data[i].id_komponen+'"><i class="far fa-trash-alt"></i></a>'+
                      '</tr>';
                      x++;
            }
            

            $('#tampil_data').html(html);
            if(data[0].status == "true"){
              document.getElementById('tmbahrincian').disabled=true;
            } else {document.getElementById('tmbahrincian').disabled=false;}
        },
        error: function() {
          var html = '<tr id="tampilannya">'+
                        '<th colspan="6"><center>Data Kosong, Mohon Untuk Tambah Rincian Sesuai Dengan Banyak Saldo Eksisting</center></th>'+
                      '</tr>';
          $('#tampil_data').html(html);
          document.getElementById('tmbahrincian').disabled=false;
            }
    });
  });

    const Toast = Swal.mixin({
      toast: true,
      position: 'mid-end',
      showConfirmButton: false,
      timer: 3000
    });

 $('#tampil_data').on('click', '.data-delete', function(){
    var idku=$(this).attr('data1');
    var idkomp=$(this).attr('data2');
    $('#modal-xl').modal('hide');
    $('#modal-delete').modal('show');
    document.getElementById('id').value=idku;
    document.getElementById('idkomp').value=idkomp;
 });

 $('#modal-delete').on('click', '.batal', function(){
    $('#modal-delete').modal('hide');
    $('#modal-xl').modal('show');
 });

 $('#modal-xl').on('click', '#tmbahrincian', function(){
    $('#modal-xl').modal('hide');
    $('#modal-tambah').modal('show');
 });

 $('#modal-tambah').on('click', '.carireg', function(){
    $('#modal-tambah').modal('hide');
    $('#modal-carireg').modal('show');
 });

function rupiah($angka){
    
      $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
      return $hasil_rupiah;
     
    }

function get_tabel(){


                  $(this).parents("#tampil_tabel").remove(); 

                            
                 var kode_barang= document.getElementById('select_kodebar').value;
                 var kode_unit= document.getElementById('kodeopd').value;
                 var htmltabel= '';
                 var petik= "'";

                  $.ajax({
                    type: 'ajax',
                    method: 'get',
                    url: 'https://simbada.surabaya.go.id/Simbada_2019/service/rkbmd.php',
                    crossDomain: true,
                    data:{unit:kode_unit,kode:kode_barang},
                    async: true,
                    dataType: 'json',
                    xhrFields: {withCredentials: true},
                    success: function(data, status, xhr){

                    for (var i = 0; i < data.item.length; i++) {


                    htmltabel+=  '<tr>'+
                                      '<td><center>'+data.item[i]['register']+'</center></td>'+
                                      '<td><center>'+data.item[i]['nama_barang']+'</center></td>'+
                                      '<td><center>'+data.item[i]['merk_alamat']+'</center></td>'+
                                      '<td><center>'+data.item[i]['tipe']+'</center></td>'+
                                      '<td><center><a href="javascript:radio('+petik+data.item[i]['register']+petik+')" class="btn btn-success">Pilih</a></center></td>'+
                                  '</tr>';
                            } 

                              $('#modal-carireg').find('#tampil_tabel').html(htmltabel);
                              
                              
                        },
                        error: function() {
                          alert('Tidak Bisa Koneksi');
                      }
                  });
                }

function radio(pick){
                  
                  $('#modal-carireg').modal('hide');
                  document.getElementById('reg1').innerHTML=pick;
                  document.getElementById('regsave').value=pick;
                  $('#modal-tambah').modal('show');
                }


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
    var idkomp = document.getElementById('idkomp').value;
    $.ajax({
      type: 'ajax',
      method: 'post',
      url: '<?php echo site_url();?>/home/delete_data_exist',
      data:{id:id,idkomp:idkomp},
      async: false,
      dataType: 'json',
      success: function(data){
            Toast.fire({
                type: 'success',  
                title: data
            })

            function refresh(){

              location.reload();
            }

            setInterval(refresh,2500);
        },
        error: function(data) {
            Toast.fire({
                type: 'error',
                title: data
            })

        }
    });
  });     
</script>
</body>
</html>

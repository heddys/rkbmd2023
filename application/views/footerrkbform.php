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
<script src="<?php echo base_url();?>ini_assets/plugins/moment/moment.min.js"></script>

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
<!-- SweetAlert2 -->
<script src="<?php echo base_url();?>ini_assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script>

  $(document).ready(function(){

                $(function () {
                  //Initialize Select2 Elements
                  $('.select').select2({ width: '50%'})
                  $('.selectkeg').select2({ width: '50%'})
                })
                
                
                

  });
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      timer: 3000
                });

                var total_form=1;
                document.getElementById('vartotal2').value=total_form;

                  function tambahformrkb(){
                  var n = total_form + 1;
                  var parse= n;
                  var isi = '<div class="form-group custom_form'+total_form+'">'
                      isi +='<p><label>Pilih Kegiatan '+n+': </label><br>'
                      isi +='<select class="form-control col-sm-6 selectkeg" name="selectkegiatan'+n+'" required>'
                      isi +='<option></option><option disabled="disabled">Pilih Jenis Kegiatan</option>'
                      isi +='<?php foreach ($get_kegiatan->result() as $kegdata ) {?><option value="<?php echo $kegdata->id?>"><?php echo $kegdata->kode_kegiatan?> - <?php echo $kegdata->nama_kegiatan?></option><?php } ?>'
                      isi +='</select>'
                      isi +='<div class="input-group"><input type="number" class="form-control col-md-2" min="1" placeholder="Banyaknya" name="saldokeg'+n+'"><div class="input-group-append"><span class="input-group-text" id="satuan"></span></div></div><p><p>'
                      isi +='<p><textarea class="form-control col-sm-6" rows="3" placeholder="Keterangan" name="keterangan'+n+'"></textarea><div>'
                  $('.btn-group').before(isi);
                  $('.custom_form'+total_form).slideDown('medium');
                  total_form++;
                  document.getElementById('vartotal2').value=total_form;
                  get_satuan();
                  $('select').change(function () {
                    if ($('select option[value="' + $(this).val() + '"]:selected').length > 1) {
                     $(this).val('-1').change();
                      Toast.fire({
                          type: 'error',
                          title: 'Tidak Bisa Memilih 2 Kegiatan Yang Sama, Periksa Kembali Inputan Anda!'
                      })
                    }
                  });
                  
                }

                function tambahformrkp(){ 
                  var isi = '<p>'+                           
                              '<div class="input-group control-group after">'+
                                '<br><input type="text" class="form-control col-md-4" placeholder="Input Register SIMBADA" name="reg[]" ng-show="displayCondition" ng-required="displayCondition" required>'+
                                '<div class="col-xs-2">'+
                                  '&nbsp'+
                                '</div>'+
                                '<input type="number" class="form-control col-md-2" min="1" placeholder="Banyaknya" name="saldokeg[]" ng-show="displayCondition" ng-required="displayCondition" required>'+
                                  '<div class="input-group-append">'+
                                    '<span class="input-group-text" id="satuan"></span>'+
                                  '</div>'+
                                    '&nbsp'+
                                    '<a href="#" class="btn btn-danger hapusrkp"><i class="far fa-minus-square"></i></a>'+
                                '<p>'+
                              '</div>';
                  $(".after-add").after(isi);
                  get_satuan();
                }

                   $("#modal-reg").on("click",".hapusrkp",function(){ 
                      $(this).parents(".control-group").remove();
                  });

                function get_satuan() {

                  var elems = document.getElementsByClassName("input-group-text");
                  if(document.getElementById("satuan")==undifined){
                    for(var i = 0; i < elems.length; i++) {
                        elems[i].innerHTML = "";
                    }
                  } else {
                      for(var i = 0; i < elems.length; i++) {
                        elems[i].innerHTML = document.getElementById("satuan").value;
                      }
                    }
                }

                function hapusform(){
                  total_form--;
                  if (total_form<=1){
                    total_form = 1;
                  }
                  $('.custom_form'+total_form).slideUp('medium',function(){
                    $(this).remove();
                  });
                  document.getElementById('vartotal2').value=total_form;
                }

                $('#modal-nonreg').on('click','a.tambah',function(){
                  tambahformrkb();
                });

                $('a.tambah').click(function(){
                  tambahformrkb();
                });

                $('a.hapus').click(function(){
                  hapusform();
                });

                $('#modal-reg').on('click','a.tambahrkp',function(){
                  tambahformrkp();
                });

                $('#modal-nonreg').on('click','a.hapus',function(){
                  hapusform();
                });

                $('a.next').click(function(){
                  var cek = $('#selectkomponen').val();
                  var tanda = document.getElementById("cektanda").value;
                  if (cek == "null") {
                    Toast.fire({
                          type: 'error',
                          title: 'Silahkan Pilih Jenis Barang / Jenis Komponen Dahulu'
                      })
                  } else {
                      if (tanda == 1) {
                        var bodymodalreg='<style type="text/css"> #modal-body</style>'+
                            '<h5><strong> Alokasi Kebutuhan Barang Pada Kegiatan </strong></h5>'+
                            '<div class="form-group custom_form">'+
                              '<p><label>Pilih Kegiatan : </label><br>'+
                              '<select class="form-control col-sm-7 selectkeg" name="selectkegiatan1" required>'+
                                '<option></option>'+
                                '<option disabled="disabled">Pilih Jenis Kegiatan</option>'+
                                '<?php foreach ($get_kegiatan->result() as $kegdata ) {?>'+
                                 ' <option value="<?php echo $kegdata->id?>"><?php echo $kegdata->kode_kegiatan?> - <?php echo $kegdata->nama_kegiatan?></option>'+
                                '<?php } ?>'+
                              '</select>'+                         
                                '<div class="input-group control-group after-add">'+
                                  '<input type="text" class="form-control col-md-4" placeholder="Input Register SIMBADA" name="reg[]" required>'+
                                 '<div class="col-xs-2">'+
                                   ' &nbsp'+
                                 ' </div>'+
                                  '<input type="number" class="form-control col-md-2" min="1" placeholder="Banyaknya" name="saldokeg[]" required>'+
                                    '<div class="input-group-append">'+
                                      '<span class="input-group-text" id="satuan"></span>'+
                                    '</div>'+
                                    '&nbsp'+
                                    '<a href="#" class="btn btn-success tambahrkp"><i class="far fa-plus-square"></i></a>'+
                                '</div>'+
                             '<p>'+
                              '<p>'+ 
                              '<textarea class="form-control col-sm-7" rows="3" placeholder="Keterangan" name="keterangan1" id="ket"></textarea>'+
                            '</div>';
                            
                            $('#modal-reg').find('.modal-body').html(bodymodalreg);
                            $('#modal-reg').modal('show');
                      } else { 

                        var bodymodalnonreg='<style type="text/css"> #modal-body</style>'+
                            '<h5><strong> Alokasi Kebutuhan Barang Pada Kegiatan </strong></h5>'+
                              '<div class="form-group custom_form">'+
                                '<p><label>Pilih Kegiatan : </label><br>'+
                                '<select class="form-control col-sm-6 selopt" name="selectkegiatan1" required>'+
                                  '<option></option>'+
                                  '<option disabled="disabled">Pilih Jenis Kegiatan</option>'+
                                 ' <?php foreach ($get_kegiatan->result() as $kegdata ) {?>'+
                                    '<option value="<?php echo $kegdata->id?>"><?php echo $kegdata->kode_kegiatan?> - <?php echo $kegdata->nama_kegiatan?></option>'+
                                 ' <?php } ?>'+
                                '</select>'+
                                '<div class="input-group">'+
                                  '<input type="number" class="form-control col-md-2" min="1" placeholder="Banyaknya" name="saldokeg1" required>'+
                                    '<div class="input-group-append">'+
                                      '<span class="input-group-text" id="satuan"></span>'+
                                    '</div>'+
                                '</div>'+
                                '<p>'+
                                '<p>'+
                                 ' <textarea class="form-control col-sm-6" rows="3" placeholder="Keterangan" name="keterangan1" id="ket"></textarea>'+
                              '</div>'+
                               '<div class="btn-group">'+
                                  '<a href="#" class="btn btn-success tambah"><i class="far fa-plus-square"></i></a>'+
                                  '<a href="#" class="btn btn-danger hapus"><i class="far fa-minus-square"></i></a>'+
                               '</div>';
                            
                            $('#modal-nonreg').find('.modal-body').html(bodymodalnonreg);
                            $('#modal-nonreg').modal('show');
                        }
                    }
                });

  function get_option(){
    var id= document.getElementById('selectkomponen').value;
    
    $.ajax({
      type: 'ajax',
      method: 'post',
      url: '<?php echo site_url();?>/home/cek_data',
      data:{id:id},
      async: false,
      dataType: 'json',
      success: function(data){
        if (data['status'] == "false") {
          document.getElementById('var1').value="";
          document.getElementById('var1').disabled=false; 
          document.getElementById('var2').value="";
          document.getElementById('var2').disabled=false;
          document.getElementById('vartotal').innerHTML="0";
          document.getElementById('cek').value=1;
          //document.getElementById('satuan').innerHTML=data['satuan'];

          if(data['tanda'] == 1) {
              document.getElementById('cektanda').value=1;
              var htmlform="</form>"
            } else {
                  document.getElementById('cektanda').value=0;
                  var htmlform="</form>"
                }

            var elems = document.getElementsByClassName("input-group-text");
              for(var i = 0; i < elems.length; i++) {
                elems[i].innerHTML = data['satuan'];
                document.getElementById("satuan").value=data['satuan'];
              }  
        } else { 
             document.getElementById('var1baru').value=data['ideal'];
             document.getElementById('var2baru').value=data['existing'];        
             document.getElementById('var1').value=data['ideal']; 
             document.getElementById('var1').disabled=true; 
             document.getElementById('var2').value=data['existing']; 
             document.getElementById('var2').disabled=true; 
             document.getElementById('vartotal').innerHTML=data['kebutuhan']; 
             document.getElementById('gettotal').value=data['kebutuhan'];
             document.getElementById('cek').value=2;
             //document.getElementById('satuan').innerHTML=data['satuan'];
             var elems = document.getElementsByClassName("input-group-text");
            for(var i = 0; i < elems.length; i++) {
                elems[i].innerHTML = data['satuan'];
                document.getElementById("satuan").value=data['satuan'];
            }
            if(data['tanda'] == 1) {
              document.getElementById('cektanda').value=1;
            } else { document.getElementById('cektanda').value=0;}
          }
            
      },
        error: function() {    
        }
    });
  }


    function rupiah($angka){
    
      $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
      return $hasil_rupiah;
     
    } 

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

</script>
</body>
</html>

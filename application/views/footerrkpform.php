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
<script src="<?php echo base_url();?>ini_assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>ini_assets/plugins/datatables/dataTables.bootstrap4.js"></script>
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
                  $('.select2').select2({ width: '70%'});
                })

                $(function () {
                  //Initialize Select2 Elements
                  $('.select3').select2({ width: '70%'});
                })

                
  });


                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      timer: 3000
                });

                var total_form=1;
                var total_formreg=2;
                document.getElementById('vartotal2').value=total_form;

                  function tambahformrkb(){
                  var n = total_form + 1;
                  var parse= n;
                  var isi = '<div class="form-group custom_form'+total_form+'">'
                      isi +='<p><label>Pilih Kegiatan '+n+': </label><br>'
                      isi +='<select class="form-control col-sm-6 selopt" name="selectkegiatan'+n+'" required>'
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
                  var isi =  '<p><p><div class="after"><hr>'+
                              '<div class="input-group control-group">'+
                                
                                '<input type="text" class ="form-control col-md-4" name="reg[]" id="regsave'+total_formreg+'" value="" required onkeypress="return false;">'+
                                '<div class="input-group-append">'+
                                    '<button onclick="myfunc('+total_formreg+')" class="btn btn-success" value="'+total_formreg+'">Cari</button>'+
                                  '</div>'+
                                '<div class="col-xs-2">'+
                                  '&nbsp'+
                                '</div>'+
                                '<input type="number" class="form-control col-md-2" min="1" placeholder="Banyaknya" name="saldokeg[]" ng-show="displayCondition" ng-required="displayCondition" required>'+
                                  '<div class="input-group-append">'+
                                    '<span class="input-group-text" id="satuan"></span>'+
                                  '</div>'+
                                    '&nbsp'+
                                    '<a href="#" class="btn btn-danger hapusrkp"><i class="far fa-minus-square"></i></a>'+
                                    '<div class="input-group">'+
                                    'Informasi Register : '+
                                    '</div>'+
                                    '<div class="input-group">'+
                                      '<input type="text" class="form-control col-md-8" id="showinfo'+total_formreg+'" value="" required onkeypress="return false;">'+
                                      '<input type="hidden" name="nama_barang[]" id="nama_barang'+total_formreg+'" value="">'+
                                      '<input type="hidden" name="merk[]" id="merk'+total_formreg+'" value="">'+
                                      '<input type="hidden" name="tipe[]" id="tipe'+total_formreg+'" value="">'+
                                      '<input type="hidden" name="tahun[]" id="tahun'+total_formreg+'" value="">'+
                                      '<input type="hidden" name="nopol[]" id="nopol'+total_formreg+'" value="">'+
                                      '<input type="hidden" name="mesin[]" id="mesin'+total_formreg+'" value="">'+
                                      '<input type="hidden" name="rangka[]" id="rangka'+total_formreg+'" value="">'+
                                    '</div>'+
                                    '<div class="input-group">'+
                                    '&nbsp'+
                                    '</div>'+
                                    '<div class="input-group">'+
                                      '<textarea class="form-control col-sm-8" rows="4" placeholder="Keterangan" name="keterangan1[]" id="ket"></textarea>'+
                                    '</div>'
                                '<br>'+
                                '<p>'+
                              '</div></div>';
                  $(".after-add").after(isi);
                  get_satuan();
                  total_formreg++;
                }
                   $("#modal-reg").on("click",".hapusrkp",function(){ 
                      $(this).parents(".control-group").remove();
                  });

                function get_satuan() {

                  var elems = document.getElementsByClassName("input-group-text");
                      for(var i = 0; i < elems.length; i++) {
                    elems[i].innerHTML = document.getElementById("satuan").value;
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

                $('#modal-reg').on('click','a.tambah',function(){
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

                $('#modal-reg').on('click','a.hapus',function(){
                  hapusform();
                });

                 function radio(reg,nama,merk,tipe,nopol,tahun,mesin,rangka){

                  $('#modal-carireg').modal('hide');
                  var buttonsimpan = document.getElementById("simpanreg").value
                  var current='reg'+buttonsimpan;
                  var savereg='regsave'+buttonsimpan;
                  var showinfo='showinfo'+buttonsimpan;
                  var nam_bar='nama_barang'+buttonsimpan;
                  var merksave='merk'+buttonsimpan;
                  var tipesave='tipe'+buttonsimpan;
                  var tahunsave='tahun'+buttonsimpan;
                  var nopolsave='nopol'+buttonsimpan;
                  var mesinsave='mesin'+buttonsimpan;
                  var rangkasave='rangka'+buttonsimpan;

                  //document.getElementById(current).innerHTML=pick;
                  document.getElementById(savereg).value=reg;
                  document.getElementById(nam_bar).value=nama;
                  document.getElementById(merksave).value=merk;
                  document.getElementById(tipesave).value=tipe;
                  document.getElementById(tahunsave).value=tahun;
                  document.getElementById(nopolsave).value=nopol;
                  document.getElementById(mesinsave).value=mesin;
                  document.getElementById(rangkasave).value=rangka;
                  document.getElementById(showinfo).value=nama+' - '+merk+' - '+tipe+' - '+tahun+' - '+nopol+' - '+mesin;

                  $('#modal-reg').modal('show');
                }
                

                function myfunc(save=0){

                    $('#modal-reg').modal('hide');
                    $('#modal-carireg').modal('show');
                    document.getElementById("simpanreg").value=save;

                }

                function get_tabel(){

                  $(this).parents("#tampil_tabel").remove(); 
                 var kode_barang= document.getElementById('select_kodebar').value;
                 var kode_unit= document.getElementById('kodeopd').value;
                 var htmltabel= '';
                 var petik= "'";
                 var nopol= "";

                  $.ajax({
                    type: 'ajax',
                    method: 'get',
                    url: 'https://simbada.surabaya.go.id/Simbada_2019/service/rkbmd.php',
                    data:{unit:kode_unit,kode:kode_barang},
                    async: true,
                    json: 'callback',
                    dataType: 'json',
                    xhrFields: {withCredentials: true},
                    success: function(data, status, xhr){

                    for (var i = 0; i < data.item.length; i++) {

                    if (data.item[i]['nopol'] == "null") {
                      nopol=" - ";
                    } else { nopol = data.item[i]['nopol'];}
                    htmltabel+=  '<tr>'+
                                      '<td><center>'+data.item[i]['register']+'</center></td>'+
                                      '<td><center>'+data.item[i]['nama_barang']+'</center></td>'+
                                      '<td><center>'+data.item[i]['merk_alamat']+'</center></td>'+
                                      '<td><center>'+data.item[i]['tipe']+'</center></td>'+
                                      '<td><center>'+nopol+'</center></td>'+
                                      '<td><center><a href="javascript:radio('+petik+data.item[i]['register']+petik+','+petik+data.item[i]['nama_barang']+petik+','+petik+data.item[i]['merk_alamat']+petik+','+petik+data.item[i]['tipe']+petik+','+petik+data.item[i]['nopol']+petik+','+petik+data.item[i]['tahun']+petik+','+petik+data.item[i]['no_mesin']+petik+','+petik+data.item[i]['no_rangka_seri']+petik+')" class="btn btn-success">Pilih</a></center></td>'+
                                  '</tr>';
                            } 

                              $('#modal-carireg').find('#tampil_tabel').html(htmltabel);

                              
                        },
                        error: function() {
                          alert('Tidak Bisa Koneksi');
                      }
                  });
                }


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
                         $('#modal-reg').find('.modal-body').html("");
                        var bodymodalreg='<style type="text/css"> #modal-body</style>'+
                            '<h5><strong> Alokasi Kebutuhan Barang Pada Kegiatan </strong></h5>'+
                            '<div class="form-group custom_form">'+
                              '<p><label>Pilih Kegiatan : </label><br>'+
                              '<select class="form-control col-sm-8 selopt" name="selectkegiatan1" required>'+
                                '<option></option>'+
                                '<option disabled="disabled">Pilih Jenis Kegiatan</option>'+
                                '<?php foreach ($get_kegiatan->result() as $kegdata ) {?>'+
                                 ' <option value="<?php echo $kegdata->id?>"><?php echo $kegdata->kode_kegiatan?> - <?php echo $kegdata->nama_kegiatan?></option>'+
                                '<?php } ?>'+
                              '</select><p>'+
                                                    
                                '<div class="input-group control-group after-add">'+
                                  
                                  '<input type="text" class="form-control col-md-4" name="reg[]" id="regsave1" value="" required onkeypress="return false;">'+
                                  
                                  '<div class="input-group-append">'+
                                    '<button onclick="myfunc(1)" class="btn btn-success" id="buttoncari" value="1">Cari</button>'+
                                  '</div>'+
                                 '<div class="col-xs-2">'+
                                   '&nbsp'+
                                 ' </div>'+
                                  '<input type="number" class="form-control col-md-2" min="1" placeholder="Banyaknya" name="saldokeg[]" required>'+
                                    '<div class="input-group-append">'+
                                      '<span class="input-group-text" id="satuan"></span>'+
                                    '</div>'+
                                    '<a href="#" class="btn btn-success tambahrkp"><i class="far fa-plus-square"></i></a>'+
                                    '<div class="input-group">'+
                                    'Informasi Register : '+
                                    '</div>'+
                                    '<div class="input-group">'+
                                      '<input type="text" class="form-control col-md-8" id="showinfo1" value="" required onkeypress="return false;">'+
                                      '<input type="hidden" name="nama_barang[]" id="nama_barang1" value="">'+
                                      '<input type="hidden" name="merk[]" id="merk1" value="">'+
                                      '<input type="hidden" name="tipe[]" id="tipe1" value="">'+
                                      '<input type="hidden" name="tahun[]" id="tahun1" value="">'+
                                      '<input type="hidden" name="nopol[]" id="nopol1" value="">'+
                                      '<input type="hidden" name="mesin[]" id="mesin1" value="">'+
                                      '<input type="hidden" name="rangka[]" id="rangka1" value="">'+
                                    '</div>'+
                                    '<div class="input-group">'+
                                    '&nbsp'+
                                    '</div>'+
                                    '<div class="input-group">'+
                                      '<textarea class="form-control col-sm-8" rows="5" placeholder="Keterangan" name="keterangan1[]" id="ket"></textarea>'+
                                    '</div>'
                                '</div>'+
                              '<p>'+ 
                            '</div>';
                            $('#modal-reg').find('.modal-body').html(bodymodalreg);
                            $('#modal-reg').modal('show');
                            var elems = document.getElementsByClassName("input-group-text");
                            var satuannya=document.getElementById('satuansave').value;
                            for(var i = 0; i < elems.length; i++) {
                              elems[i].innerHTML = satuannya;
                              document.getElementById("satuan").value=satuannya;
                            } 
                            
                      } else { 
                        $('#modal-reg').find('.modal-body').html("");
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
                            
                            $('#modal-reg').find('.modal-body').html(bodymodalnonreg);
                            $('#modal-reg').modal('show');
                            var elems = document.getElementsByClassName("input-group-text");
                            var satuannya=document.getElementById('satuansave').value;
                            for(var i = 0; i < elems.length; i++) {
                              elems[i].innerHTML = satuannya;
                              document.getElementById("satuan").value=satuannya;
                            }
                        }
                    }
                });


  function get_option(){
    var id= document.getElementById('selectkomponen').value;
    
    $.ajax({
      type: 'ajax',
      method: 'post',
      url: '<?php echo site_url();?>/home/cek_data_rkp',
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
          document.getElementById('satuansave').value=data['satuan'];

          if(data['tanda'] == 1) {
              document.getElementById('cektanda').value=1;
              
            } else {
                  document.getElementById('cektanda').value=0;
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

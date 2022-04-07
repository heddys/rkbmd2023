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
<!-- DataTables -->
<script src="<?php echo base_url();?>ini_assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>ini_assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script>



  function rupiah (angka){
       var reverse = angka.toString().split('').reverse().join(''),
       ribuan = reverse.match(/\d{1,3}/g);
       ribuan = ribuan.join('.').split('').reverse().join('');
       return ribuan;
    }
    $("#tblkodebar").DataTable();
    

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

    function klik_cari_atrib(id){
      var isi_text = document.querySelector("#modal-search-register-atrib [id=search_register_atrib]").value;
      if(isi_text.length == 0 ) {
        alert("Mohon Untuk Mengisi Nama atau Register Yang Di Cari");
        $("input:radio[id=primary18]:checked")[0].checked = false;
      } else {
        if(id == true){
          
          // document.getElementById('penggunaan').value=isi_text;
          var id = isi_text;
            $('#modal-list-register').modal({backdrop: 'static', keyboard: false});
            function rupiah (angka){
                      var reverse = angka.toString().split('').reverse().join(''),
                      ribuan = reverse.match(/\d{1,3}/g);
                      ribuan = ribuan.join('.').split('').reverse().join('');
                      return ribuan;
                    }
            $.ajax({
              type: 'ajax',
              method: 'post',
              url: '<?php echo site_url();?>/form_inv/cari_data_register',
              data:{id:id},
              async: false,
              dataType: 'json',
              success: function(data){
                  var html = '';
                  var title ='';
                  var i=data.length;
                  var x=1;
                    for (i=0; i < data.length; i++) {
                        html += 
                              '<tr>'+
                                '<td><center>'+x+'</center></td>'+
                                '<td><center>'+data[i].kode108_baru+'</center></td>'+
                                '<td><center>'+data[i].register+'</center></td>'+
                                '<td>'+data[i].nama_barang+'</td>'+
                                '<td>'+data[i].tipe+'</td>'+    
                                '<td>'+data[i].merk_alamat+'</td>'+
                                '<td><center>'+data[i].tahun_pengadaan+'</center></td>'+
                                '<td class="text-left">Rp.'+rupiah(data[i].harga_baru)+',00</td>'+
                                '<td><center> <a href="#" class="btn btn-sm btn-success ambil_register" data-id="'+data[i].register+'"><i class="fa fa-plus"></i></a>'+
                                '</td></tr>';
                              x++;
                    }
                    $('#modal-list-register').find('#tampil_data').html(html);
                    $('#modal-list-register').find('#tblregister').DataTable();

                    
                },
                error: function() {
                  alert('Koneksi Gagal');
                }
            });
        } else {
          $("input:radio[id=primary18]:checked")[0].checked = false;
        }
      }
    }

    function klik_cari_ganda(id){
      var isi_text = document.querySelector("#modal-search-register-ganda [id=search_register_ganda]").value;
      if(isi_text.length == 0 ) {
        alert("Mohon Untuk Mengisi Nama atau Register Yang Di Cari");
        $("input:radio[id=primary36]:checked")[0].checked = false;
      } else {
        if(id == true){
          
          // document.getElementById('penggunaan').value=isi_text;
          var id = isi_text;
            $('#modal-list-register2').modal({backdrop: 'static', keyboard: false});
            function rupiah (angka){
                      var reverse = angka.toString().split('').reverse().join(''),
                      ribuan = reverse.match(/\d{1,3}/g);
                      ribuan = ribuan.join('.').split('').reverse().join('');
                      return ribuan;
                    }
            $.ajax({
              type: 'ajax',
              method: 'post',
              url: '<?php echo site_url();?>/form_inv/cari_data_register',
              data:{id:id},
              async: false,
              dataType: 'json',
              success: function(data){
                  var html = '';
                  var title ='';
                  var i=data.length;
                  var x=1;
                    for (i=0; i < data.length; i++) {
                        html += 
                              '<tr>'+
                                '<td><center>'+x+'</center></td>'+
                                '<td><center>'+data[i].kode108_baru+'</center></td>'+
                                '<td><center>'+data[i].register+'</center></td>'+
                                '<td>'+data[i].nama_barang+'</td>'+
                                '<td>'+data[i].tipe+'</td>'+    
                                '<td>'+data[i].merk_alamat+'</td>'+
                                '<td><center>'+data[i].tahun_pengadaan+'</center></td>'+
                                '<td class="text-left">Rp.'+rupiah(data[i].harga_baru)+',00</td>'+
                                '<td><center> <a href="#" class="btn btn-sm btn-success ambil_register2" data-id="'+data[i].register+'"><i class="fa fa-plus"></i></a>'+
                                '</td></tr>';
                              x++;
                    }
                    $('#modal-list-register2').find('#tampil_data2').html(html);
                    $('#modal-list-register2').find('#tblregister2').DataTable();

                    
                },
                error: function() {
                  alert('Koneksi Gagal');
                }
            });
        } else {
          $("input:radio[id=primary36]:checked")[0].checked = false;
        }
      }
    }
    
    function klik_destroy() {
      $('#tblregister').DataTable().destroy();
      $('#modal-list-register').modal('hide');
      $("input:radio[id=primary18]:checked")[0].checked = false;
    }

    function klik_destroy2() {
      $('#tblregister2').DataTable().destroy();
      $('#modal-list-register2').modal('hide');
      $("input:radio[id=primary36]:checked")[0].checked = false;
    }

    $('#modal-list-register').on('click', '.ambil_register', function(){
      var idku=$(this).attr('data-id');
      $('#tblregister').DataTable().destroy();
      $('#modal-list-register').modal('hide');
      document.getElementById('aset_atrib').value=idku;
    });

    $('#modal-list-register2').on('click', '.ambil_register2', function(){
      var idku=$(this).attr('data-id');
      $('#tblregister2').DataTable().destroy();
      $('#modal-list-register2').modal('hide');
      document.getElementById('catat_ganda').value=idku;
    });

    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    
    // Jquery Dependency

$("input[data-type='currency']").on({
    keyup: function() {
      formatCurrency($(this));
    },
    blur: function() { 
      formatCurrency($(this), "blur");
    }
});


function formatNumber(n) {
  // format number 1000000 to 1,234,567
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}


function formatCurrency(input, blur) {
    // appends $ to value, validates decimal side
    // and puts cursor back in right position.
    
    // get input value
    var input_val = input.val();
    
    // don't validate empty input
    if (input_val === "") { return; }
    
    // original length
    var original_len = input_val.length;

    // initial caret position 
    var caret_pos = input.prop("selectionStart");
      
    // check for decimal
    if (input_val.indexOf(".") >= 0) {

      // get position of first decimal
      // this prevents multiple decimals from
      // being entered
      var decimal_pos = input_val.indexOf(".");

      // split number by decimal point
      var left_side = input_val.substring(0, decimal_pos);
      var right_side = input_val.substring(decimal_pos);

      // add commas to left side of number
      left_side = formatNumber(left_side);

      // validate right side
      right_side = formatNumber(right_side);
      
      // On blur make sure 2 numbers after decimal
      if (blur === "blur") {
        right_side += "";
      }
      
      // Limit decimal to only 2 digits
      right_side = right_side.substring(0, 2);

      // join number by .
      input_val = "Rp" + left_side + "." + right_side;

    } else {
      // no decimal entered
      // add commas to number
      // remove all non-digits
      input_val = formatNumber(input_val);
      input_val = "Rp" + input_val;
      
      // final formatting
      if (blur === "blur") {
        input_val += "";
      }
    }
    
    // send updated string to input
    input.val(input_val);

    // put caret back in the right position
    var updated_len = input_val.length;
    caret_pos = updated_len - original_len + caret_pos;
    input[0].setSelectionRange(caret_pos, caret_pos);
}



  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function klik_kode_bar(id){
      if(id == false) {
        $("input:radio[id=primary4]:checked")[0].checked = false;
      } else {
        document.getElementById('kode_barang').value=id;
      }
    }

    function klik_nama_barang(id){
      if(id == true){
        var isi_text = document.querySelector("#modal-nama-barang [id=nama_barang]").value;
        document.getElementById('input_nama_barang').value=isi_text;
      } else {
        $("input:radio[id=primary6]:checked")[0].checked = false;
      }
    }

    function klik_spek_barang(id){
      if(id == true){
        var isi_text = document.querySelector("#modal-spek-barang [id=spek_barang]").value;
        document.getElementById('nama_spek_barang').value=isi_text;
      } else {
        $("input:radio[id=primary8]:checked")[0].checked = false;
      }
    }

    function klik_satuan_barang(id){
      if(id == true){
        var isi_text = document.querySelector("#modal-satuan-barang [id=select_satuan]").value;
        document.getElementById('satuan_barang').value=isi_text;
      } else {
        $("input:radio[id=primary12]:checked")[0].checked = false;
      }
    }

    function klik_keberadaan(id){
      if(id == true){
        var isi_text = document.querySelector("#modal-keberadaan [id=keberadaan]").value;
        document.getElementById('keberadaan_bar').value=isi_text;
      } else {
        $("input:radio[id=primary14]:checked")[0].checked = false;
      }
    }

    function klik_nilai(id){
      if(id == true){
        var isi_text = document.querySelector("#modal-nilai [id=input_nilai]").value;
        document.getElementById('nilai_perolehan').value=isi_text;
      } else {
        $("input:radio[id=primary16]:checked")[0].checked = false;
      }
    }

    function klik_alamat_barang(id){
      if(id == true){
        var isi_text = document.querySelector("#modal-merk-barang [id=input_merk]").value;
        document.getElementById('merk_barang').value=isi_text;
      } else {
        $("input:radio[id=primary20]:checked")[0].checked = false;
      }
    }

    function klik_kondisi_barang(id){
      if(id == true){
        var isi_text = document.querySelector("#modal-kondisi-barang [id=input_kondisi]").value;
        document.getElementById('kondisi_barang').value=isi_text;
      } else {
        $("input:radio[id=primary22]:checked")[0].checked = false;
      }
    }

    function klik_tipe_barang(id){
      if(id == true){
        var isi_text = document.querySelector("#modal-tipe-barang [id=input_tipe]").value;
        document.getElementById('tipe_barang').value=isi_text;
      } else {
        $("input:radio[id=primary24]:checked")[0].checked = false;
      }
    }

    function klik_nopol(id){
      if(id == true){
        var isi_text = document.querySelector("#modal-nopol [id=input_nopol]").value;
        document.getElementById('nopol').value=isi_text;
      } else {
        $("input:radio[id=primary26]:checked")[0].checked = false;
      }
    }

    function klik_noka(id){
      if(id == true){
        var isi_text = document.querySelector("#modal-norangka [id=input_norangka]").value;
        document.getElementById('noka').value=isi_text;
      } else {
        $("input:radio[id=primary28]:checked")[0].checked = false;
      }
    }

    function klik_nomesin(id){
      if(id == true){
        var isi_text = document.querySelector("#modal-nomesin [id=input_nomesin]").value;
        document.getElementById('no_mesin').value=isi_text;
      } else {
        $("input:radio[id=primary30]:checked")[0].checked = false;
      }
    }

    function klik_nobpkb(id){
      if(id == true){
        var isi_text = document.querySelector("#modal-bpkb [id=input_nobpkb]").value;
        document.getElementById('no_bpkb').value=isi_text;
      } else {
        $("input:radio[id=primary32]:checked")[0].checked = false;
      }
    }

    function klik_penggunaan(id){
      if(id == true){
        var isi_text = document.querySelector("#modal-penggunaan [id=input_penggunaan]").value;
        document.getElementById('penggunaan').value=isi_text;
      } else {
        $("input:radio[id=primary34]:checked")[0].checked = false;
      }
    }

    

    // function klik_cari_ganda(id){
    //   if(id == true){
    //     var isi_text = document.querySelector("#modal-cari-register-ganda [id=search_register_ganda]").value;
    //     // document.getElementById('penggunaan').value=isi_text;
    //   } else {
    //     $("input:radio[id=primary36]:checked")[0].checked = false;
    //   }
    // }
    

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $(document).ready(function () {
      $('#primary4').click(function () {
          if ($(this).is(':checked')) {
            $('#modal-kode-bar').modal({backdrop: 'static', keyboard: false});
          }
      });

      $('#primary6').click(function () {
          if ($(this).is(':checked')) {
              $('#modal-nama-barang').modal({backdrop: 'static', keyboard: false});
          }
      });
      $('#primary8').click(function () {
          if ($(this).is(':checked')) {
              $('#modal-spek-barang').modal({backdrop: 'static', keyboard: false});
          }  
      });
      $('#primary12').click(function () {
          if ($(this).is(':checked')) {
              $('#modal-satuan-barang').modal({backdrop: 'static', keyboard: false});
          }  
      });

      $('#primary14').click(function () {
          if ($(this).is(':checked')) {
              $('#modal-keberadaan').modal({backdrop: 'static', keyboard: false});
          }  
      });

      $('#primary16').click(function () {
          if ($(this).is(':checked')) {
              $('#modal-nilai').modal({backdrop: 'static', keyboard: false});
          }  
      });

      $('#primary20').click(function () {
          if ($(this).is(':checked')) {
              $('#modal-merk-barang').modal({backdrop: 'static', keyboard: false});
          }  
      });

      $('#primary22').click(function () {
          if ($(this).is(':checked')) {
              $('#modal-kondisi-barang').modal({backdrop: 'static', keyboard: false});
          }  
      });

      $('#primary24').click(function () {
          if ($(this).is(':checked')) {
              $('#modal-tipe-barang').modal({backdrop: 'static', keyboard: false});
          }  
      });

      $('#primary26').click(function () {
          if ($(this).is(':checked')) {
              $('#modal-nopol').modal({backdrop: 'static', keyboard: false});
          }  
      });

      $('#primary28').click(function () {
          if ($(this).is(':checked')) {
              $('#modal-norangka').modal({backdrop: 'static', keyboard: false});
          }  
      });

      $('#primary30').click(function () {
          if ($(this).is(':checked')) {
              $('#modal-nomesin').modal({backdrop: 'static', keyboard: false});
          }  
      });

      $('#primary32').click(function () {
          if ($(this).is(':checked')) {
              $('#modal-bpkb').modal({backdrop: 'static', keyboard: false});
          }  
      });

      $('#primary34').click(function () {
          if ($(this).is(':checked')) {
              $('#modal-penggunaan').modal({backdrop: 'static', keyboard: false});
          }  
      });

      $('#primary18').click(function () {
          if ($(this).is(':checked')) {
              $('#modal-search-register-atrib').modal({backdrop: 'static', keyboard: false});
          }  
      });

      $('#primary36').click(function () {
          if ($(this).is(':checked')) {
              $('#modal-search-register-ganda').modal({backdrop: 'static', keyboard: false});
          }  
      });


      
    });


</script>
</body>
</html>
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
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url();?>ini_assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>ini_assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>ini_assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url();?>ini_assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>ini_assets/dist/js/demo.js"></script>
<!-- PIE Chart JS -->
<script src="<?php echo base_url();?>ini_assets/plugins/chart.js/Chart.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>ini_assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>ini_assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url();?>ini_assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url();?>ini_assets/plugins/toastr/toastr.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url();?>ini_assets/plugins/select2/js/select2.full.min.js"></script>
<script>
  $(function () {
      
        $("#tabel_penyelia").DataTable();
        $("#tabel_opd").DataTable();
        $("#tabel_penyelia2").DataTable();
        $("#tabel_kunci_kodebar").DataTable({
            "language": {
              "emptyTable": "Tidak Ada Kode Barang Yang Dikunci"
            }
        });
        $("#tabel_kodebar").DataTable();
        $("#tabel_user").DataTable();
        $('.select_limit').select2({
          width: '5%',
          minimumResultsForSearch: Infinity
        });
        $('#select_lokasi').select2({
          width: 'resolve'
        });
        $('.select_pangkat').select2({
          width: 'resolve'
        });

  });


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

    $(document).ready(function () {
     

      var proses = document.getElementById('proses').value;
      var tolak = document.getElementById('tolak').value;
      var verif = document.getElementById('verif').value;

        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieData        = {
        labels: [
            'Register Proses', 
            'Register Di Tolak',
            'Register Ter-Verifikasi', 
        ],
        datasets: [
            {
            data: [proses,tolak,verif],
            backgroundColor : ['#f56954', '#00a65a', '#f39c12'],
            }
        ]
        }
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var pieOptions     = {
        maintainAspectRatio : false,
        responsive : true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var pieChart = new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions      
        });

    });

    function klik_detail_penyelia(nip) {
      var id=nip;
      $('#list_opd_penyelia').modal({backdrop: 'static', keyboard: false});
      $.ajax({
              type: 'ajax',
              method: 'post',
              url: '<?php echo site_url();?>/home_admin/get_list_opd_penyelia',
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
                                '<td><center>'+data[i].nomor_unit+'</center></td>'+
                                '<td><center>'+data[i].unit+'</center></td>'+
                                '<td><center> <a href="#" class="btn btn-sm btn-danger delete_opd" data-id="'+data[i].nomor_unit+'"><i class="fa fa-trash"></i></a>'+
                                '</td></tr>';
                              x++;
                    }
                    
                    $('#list_opd_penyelia').find('.isi_body').html(html);
                    $('#list_opd_penyelia').find('#tabel_list_opd').DataTable();

                    
                },
                error: function() {
                  alert('Koneksi Gagal');
                }
            });
    }  

    function klik_detail_kode(kode_sub) {
      var id=kode_sub;
      $('#tabel_rincian_kode').DataTable().clear();
      $('#list_detail_kode').modal({backdrop: 'static', keyboard: false});
      $.ajax({
              type: 'ajax',
              method: 'post',
              url: '<?php echo site_url();?>/home_admin/get_list_rincian_kode',
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
                                '<td><center>'+data[i].kode_sub_sub_kelompok+'</center></td>'+
                                '<td><center>'+data[i].sub_sub_kelompok+'</center></td>'+
                                '<button class="btn btn-sm btn-danger" title="Kunci Kode Sub Kelompok" onclick="klik_kunci_kode('+data[i].kode_sub_sub_kelompok+')"><i class="fa fa-lock" aria-hidden="true"></i></a>'
                                '</td></tr>';
                              x++;
                    }
                    title+=data[0].kode_sub_kelompok+" - "+data[0].sub_kelompok;
                    $('#list_detail_kode').find('#title').html(title);
                    $('#list_detail_kode').find('.rincian_kode').html(html);
                    $('#list_detail_kode').find('#tabel_rincian_kode').DataTable();

                    
                },
                error: function() {
                  alert('Koneksi Gagal');
                }
            });
      } 
      


      //Javascript Untuk Setting Kode Barang

      function klik_kunci_kode(id) {
        var id=id;
        
        $.ajax({
              type: 'ajax',
              method: 'post',
              url: '<?php echo site_url();?>/home_admin/kunci_kodebar',
              data:{id:id},
              async: false,
              dataType: 'json',
              success: function(data){
                const Toast = Swal.mixin({
                  toast: true,
                  position: 'center',
                  showConfirmButton: false,
                  timer: 3000
                });
                    Toast.fire({
                      type: 'success',
                      title: 'Success!! Mengunci Kode Barang.'
                    })
                    setTimeout(function(){ location.reload(); }, 2000);

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
                      title: 'Oops!! Tidak Bisa Mengunci Kode Barang.'
                    })
                    setTimeout(function(){ location.reload(); }, 2000);
                }
            });
      }

      function klik_buka_kunci_kode(id) {
        var id=id;
        
        $.ajax({
              type: 'ajax',
              method: 'post',
              url: '<?php echo site_url();?>/home_admin/buka_kunci_kodebar',
              data:{id:id},
              async: false,
              dataType: 'json',
              success: function(data){
                const Toast = Swal.mixin({
                  toast: true,
                  position: 'center',
                  showConfirmButton: false,
                  timer: 3000
                });
                    Toast.fire({
                      type: 'success',
                      title: 'Success!! Membuka Kode Barang.'
                    })
                    setTimeout(function(){ location.reload(); }, 2000);

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
                      title: 'Oops!! Tidak Bisa Mengunci Kode Barang.'
                    })
                    setTimeout(function(){ location.reload(); }, 2000);
                }
            });
      }


    
    //Javascript Untuk Fitur Setting Penyelia//


    $('#list_opd_penyelia').find('.isi_body').on('click', '.delete_opd', function(){
      var id=$(this).attr('data-id');
      $.ajax({
              type: 'ajax',
              method: 'post',
              url: '<?php echo site_url();?>/home_admin/hapus_opd_pemangku',
              data:{id:id},
              async: false,
              dataType: 'json',
              success: function(data){
                const Toast = Swal.mixin({
                  toast: true,
                  position: 'center',
                  showConfirmButton: false,
                  timer: 3000
                });
                    Toast.fire({
                      type: 'success',
                      title: 'Success!! Menghapus OPD.'
                    })
                    setTimeout(function(){ location.reload(); }, 2000);

                },
                error: function() {
                  const Toast = Swal.mixin({
                  toast: true,
                  position: 'center',
                  showConfirmButton: false,
                  timer: 3000
                });
                    Toast.fire({
                      type: 'success',
                      title: 'Success!! Menghapus OPD.'
                    })
                    setTimeout(function(){ location.reload(); }, 2000);
                }
            });
      });

    function klik_tambah_penyelia(id) {
      var id_kamus=id;
      $('#list_pilih_penyelia').modal({backdrop: 'static', keyboard: false});
      $(".modal-body #id_kamus").val( id_kamus );
    }

    $('#tombol_update').on('click', '.add_pengadaan', function(){
      document.getElementById('loader').className = 'loader'
      $.ajax({
              type: 'ajax',
              method: 'get',
              url: '<?php echo site_url();?>/home_admin/update_data_pengadaan',
              async: false,
              dataType: 'json',
              success: function(data){
                  if(data==TRUE) {
                    const Toast = Swal.mixin({
                    toast: true,
                    position: 'center',
                    showConfirmButton: false,
                    timer: 3000
                  });
                      Toast.fire({
                        type: 'success',
                        title: 'Success!! Menambahkan Data Register.'
                      })
                  } else {

                    const Toast = Swal.mixin({
                    toast: true,
                    position: 'center',
                    showConfirmButton: false,
                    timer: 3000
                  });
                      Toast.fire({
                        type: 'error',
                        title: 'Tidak Ada Penambahan Data Baru  '
                      })

                  }

              },
              complete: function(){
                document.getElementById('loader').className = 'hide-loader'
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
                      title: 'Data Gagal Di Tambahkan'
                    })
                }
        });
    });


            //Javasctipt Untuk Fitur Setting User//

      function klik_edit_user(id) {
        var id=id;
        $.ajax({
              type: 'ajax',
              method: 'post',
              url: '<?php echo site_url();?>/home_admin/get_detail_user',
              data:{id:id},
              async: false,
              dataType: 'json',
              success: function(data){
                $('#rincian_user').modal();
                document.getElementById("pd").value=data['nama_opd'];

                    
                },
                error: function() {
                  alert('Koneksi Gagal');
                }
        });
      }
</script>
</body>
</html>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- Untuk Pemberitahuan -->
        <div class="callout callout-info">
          <h4>Notice!</h4>
          Selamat Datang, Administrator
          <?php 
            echo $this->session->userdata('role')." | ";
            echo $this->session->userdata('no_lokasi_asli');
          ?>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-edit"></i>
                  Update Penambahan Register Baru (inc. Pengadaan, Inventarisasi, Hibah Masuk, dan Penambahan Lainnya)
                </h3>
              </div>
              <div class="card-body pad table-responsive" id="tombol_update">
                  <td>
                    <button type="button" class="btn btn-block btn-outline-primary btn-lg add_pengadaan">Update Now!</button>
                  </td>
              </div>
              <center><div class="hide-loader" id="loader"></div></center>
              <br>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.col -->
        </div>


        <!-- PIE CHART -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><center>Total Register Keseluruhan - <?php $all_reg=$get_data_chart->jumlah_proses+$get_data_chart->jumlah_tolak+$get_data_chart->jumlah_terverif+$get_data_chart->jumlah_reg_belum_diisi; echo number_format($all_reg)?> Register</center></h3>
                <input type="hidden" id="proses" value="<?php echo $get_data_chart->jumlah_proses;?>"></input>
                <input type="hidden" id="tolak" value="<?php echo $get_data_chart->jumlah_tolak;?>"></input>
                <input type="hidden" id="verif" value="<?php echo $get_data_chart->jumlah_terverif;?>"></input>
            </div>
            <div class="card-body">
                <canvas id="pieChart" style="height:230px"></canvas>
            </div>
        </div>
        <!-- /.card -->

        <!-- <div class="card card-info">
          <div class="card">
              <div class="card-header no-border ">
                <h3 class="card-title">Rekapan Per OPD</h3>
                <div class="card-tools">
                  <a href="<?php echo site_url('home_admin/export_excel_rekap_admin');?>" class="btn btn-tool btn-sm" title="Download Rekapan">
                    <i class="fas fa-download"></i>
                  </a>
                </div>
              </div>
              <div class="card-body p-3">
                <div style="overflow-x:auto;">
                  <table class="table table-striped table-hover responsive" id="tabel-home">
                    <thead class="thead-dark">
                    <tr>
                      <th><center>Perangkat Daerah<center></th>
                      <th>Total Register</th>
                      <th>Register Telah Di Verif</th>
                      <th>Register Masih Proses Verif</th>
                      <th>Register Di Tolak</th>
                      <th>Register Belum Terjamah</th>
                      <th>Persentase</th>
                      <th>Detail</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($rekap_opd as $row) { ?>
                      <tr>
                        <td>
                          <?php echo strtoupper($row->unit);?>
                        </td>
                        <td><center><?php echo number_format($row->total);?></center></td>
                        <td><center><?php echo number_format($row->verif);?></center></td>
                        <td><center><?php echo number_format($row->proses);?></center></td>
                        <td><center><?php echo number_format($row->tolak);?></center></td>
                        <td><center><?php echo number_format($row->sisa);?></center></td>
                        <td><center><?php echo round((float)$row->persentase,3) . '%';?></center></td>
                        <td>
                          <center>
                            <a href="#" id="expand_hasil" class="text-muted" data-id="<?php echo $row->nomor_unit;?>" onclick="detail_hasil(this.getAttribute('data-id'));">
                              <i class="fas fa-eye"></i>
                            </a>
                          </center>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
        </div> -->
        <!-- <div class="row">
            <div class="col-md-6">
                <div class="card card-widget widget-user-2">
                <div class="widget-user-header bg-success">
                    <h3 class="widget-user-username">Dalam Proses Verifikasi</h3>
                    <h5 class="widget-user-desc">Rekap Register Per OPD</h5>
                </div>
                <div class="card-footer p-0">
                    <ul class="nav flex-column">
                    
                        <?php foreach ($get_proses_reg as $key) {
                            echo "<li class='nav-item'><a href='#' class='nav-link'>";
                            echo strtoupper($key->unit)."<span class='float-right badge bg-primary'>".$key->jumlah."</span></a></li>";
                        }?>
                    
                    </ul>
                </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-widget widget-user-2">
                  <div class="widget-user-header bg-danger">
                      <h3 class="widget-user-username">Register Di Tolak</h3>
                      <h5 class="widget-user-desc">Rekap Register Per OPD</h5>
                  </div>
                  <div class="card-footer p-0">
                      <ul class="nav flex-column">
                        <li class="nav-item">
                          <?php foreach ($get_tolak_reg as $row) {
                              echo "<li class='nav-item'><a href='#' class='nav-link'>";
                              echo strtoupper($row->unit)."<span class='float-right badge bg-primary'>".$row->jumlah."</span></a></li>";
                          }?>
                        </li>
                      </ul>
                  </div>  
                </div>
            </div>
        </div> -->
        <center>
      
        <!-- /.row -->
        <!-- Main row -->
    </div>
    </section>
    <!-- /.content -->
  </div>

  <div class="modal fade" id="modal-hasil">
        <div class="modal-dialog modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <center><h4 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Hasil Inventarisasi</h4></center>
                </div>
                <div class="modal-body" id="isi_body">
                  
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>
            </div>
            <!-- modal-content --> 
        </div>
        <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
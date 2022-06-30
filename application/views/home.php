
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- Untuk Pemberitahuan -->
        <div class="callout callout-info">
          <h4>Notice!</h4>
          Selamat Datang, Tolong Untuk Mengisi Form Inventarisasi Terlebih Dahulu.
        </div>
        <div class="row">
         <div class="col-lg-12 col-12">
           <!-- small box -->
           <div class="small-box bg-success">
             <div class="inner">
               <center><h3>Form Inventarisasi</h3></center>
                 <center><p>Pengisian Form Untuk Memverifikasi Atribut Aset</p></center>
             </div>
            <div class="icon">
               <i class="ion ion-stats-bars"></i>
            </div>
                <a href="<?php echo site_url('/Form_inv/index/2');?>" class="small-box-footer">Isi Form Inventarisasi <i class="fas fa-arrow-circle-right"></i></a>
           </div>
         </div>
        </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Progres Pengisian Form Inventarisasi</h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                    <div class="progress" style="height:25px">
                      <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round((float)$rekap->persentase,3) . '%';?>"><strong style="font-size: 20px;color: black;"><?php echo round((float)$rekap->persentase,3) . '%';?></strong></div>
                      </div>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
                <!-- ./card-body -->
                <div class="card-footer">
                  <div class="row">
                    <div class="col-sm col-6">
                      <div class="description-block border-right">
                        <h5 class="description-header"><?php echo number_format($rekap->total);?></h5>
                        <span class="description-text">TOTAL REGISTER</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm col-6">
                      <div class="description-block border-right">
                        <h5 class="description-header"><?php echo number_format($rekap->proses);?></h5>
                        <span class="description-text">TOTAL REGISTER PROSES VERIFIKASI</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm col-6">
                      <div class="description-block border-right">
                        <h5 class="description-header"><?php echo number_format($rekap->tolak);?></h5>
                        <span class="description-text">TOTAL REGISTER DI TOLAK</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm col-6">
                      <div class="description-block border-right">
                        <h5 class="description-header"><?php echo number_format($rekap->verif);?></h5>
                        <span class="description-text">TOTAL REGISTER TERVERIFIKASI</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <div class="col-sm col-6">
                      <div class="description-block">
                        <h5 class="description-header"><?php echo number_format($rekap->sisa);?></h5>
                        <span class="description-text">TOTAL REGISTER BELUM DI KERJAKAN</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <?php if ($this->session->userdata('nip') == "198210182010011002") {?>
          <div class="row">
            <div class="col-lg-12 col-12">
            <div class="card card-info">
          <div class="card">
              <div class="card-header no-border ">
                <h3 class="card-title">Rekapan Per Puskesmas</h3>
                <div class="card-tools">
                  <!-- <a href="<?php echo site_url('home_penyelia/export_excel_rekap_penyelia')?>" class="btn btn-tool btn-sm" title="Download Rekapan"> -->
                    <i class="fas fa-download"></i>
                  </a>
                </div>
              </div>
              <div class="card-body p-3">
                <div style="overflow-x:auto;">
                  <table class="table table-striped table-hover responsive" id="tabel-home-dinkes">
                    <thead class="thead-dark">
                    <tr>
                      <th><center>Perangkat Daerah<center></th>
                      <th>Total Register</th>
                      <th>Register Telah Di Verif</th>
                      <th>Register Masih Proses Verif</th>
                      <th>Register Di Tolak</th>
                      <th>Register Belum Terjamah</th>
                      <th>Persentase</th>
                    </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          KANTOR DINAS KESEHATAN
                        </td>
                        <td><center><?php echo number_format($only_opd->total);?></center></td>
                        <td><center><?php echo number_format($only_opd->verif);?></center></td>
                        <td><center><?php echo number_format($only_opd->proses);?></center></td>
                        <td><center><?php echo number_format($only_opd->tolak);?></center></td>
                        <td><center><?php echo number_format($only_opd->sisa);?></center></td>
                        <td><center><?php echo round((float)$only_opd->persentase,3) . '%';?></center></td>
                      </tr>
                      <?php foreach ($rekap_upt as $row) { ?>
                      <tr>
                        <td>
                          <?php echo strtoupper($row->nama_lokasi);?>
                        </td>
                        <td><center><?php echo number_format($row->total);?></center></td>
                        <td><center><?php echo number_format($row->verif);?></center></td>
                        <td><center><?php echo number_format($row->proses);?></center></td>
                        <td><center><?php echo number_format($row->tolak);?></center></td>
                        <td><center><?php echo number_format($row->sisa);?></center></td>
                        <td><center><?php echo round((float)$row->persentase,3) . '%';?></center></td>
                      </tr>
                      <?php } ?> 
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
                      </div>
            </div>
          </div>
        <center>
        <?php }?>
        <?php if ($this->session->userdata('nip') == "197605082010011002") {?>
          <div class="row">
            <div class="col-lg-12 col-12">
            <div class="card card-info">
          <div class="card">
              <div class="card-header no-border ">
                <h3 class="card-title">Rekapan Per Puskesmas</h3>
                <div class="card-tools">
                  <!-- <a href="<?php echo site_url('home_penyelia/export_excel_rekap_penyelia')?>" class="btn btn-tool btn-sm" title="Download Rekapan"> -->
                    <i class="fas fa-download"></i>
                  </a>
                </div>
              </div>
              <div class="card-body p-3">
                <div style="overflow-x:auto;">
                  <table class="table table-striped table-hover responsive" id="tabel-home-dinkes">
                    <thead class="thead-dark">
                    <tr>
                      <th><center>Perangkat Daerah<center></th>
                      <th>Total Register</th>
                      <th>Register Telah Di Verif</th>
                      <th>Register Masih Proses Verif</th>
                      <th>Register Di Tolak</th>
                      <th>Register Belum Terjamah</th>
                      <th>Persentase</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($rekap_upt as $row) { ?>
                      <tr>
                        <td>
                          <?php echo strtoupper($row->nama_lokasi);?>
                        </td>
                        <td><center><?php echo number_format($row->total);?></center></td>
                        <td><center><?php echo number_format($row->verif);?></center></td>
                        <td><center><?php echo number_format($row->proses);?></center></td>
                        <td><center><?php echo number_format($row->tolak);?></center></td>
                        <td><center><?php echo number_format($row->sisa);?></center></td>
                        <td><center><?php echo round((float)$row->persentase,3) . '%';?></center></td>
                      </tr>
                      <?php } ?> 
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
                      </div>
            </div>
          </div>
        <center>
        <?php }?>
      
        
            
            <!-- ./col -->
          </div>
        </center>
      
        <!-- /.row -->
        <!-- Main row -->
    </div>

    </div>
    </section>
    <!-- /.content -->
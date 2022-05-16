
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
        <center>
          <div class="row">
            <!-- <div class="col-lg-4 col-6">
              <?php if($exist >= 1) {?>
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3><?php echo $exist?></h3>
                  <p>Eksisting Barang Belum Disertai Keterangan</p>
                </div>
                <div class="icon">
                  <i class="fas fa-exclamation-triangle"></i>
                </div>
                <a href="<?php echo site_url('home/desk_komponen');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div> -->
            <!-- <?php } else {?>
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php echo $exist?></h3>
                  <p>Semua Eksisting Barang Sudah Disertai Keterangan</p>
                </div>
                <div class="icon">
                  <i class="fas fa-check-circle"></i>
                </div>
                <a href="<?php echo site_url('home/desk_komponen');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            <?php }?>
            </div> -->
            <div class="col-lg-6 col-6">
              <!-- small box -->
              <!-- <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo $bmaset;?></h3>
                  <p>Jumlah Usulan Belanja Modal</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="<?php echo site_url('home/tabel_rkb');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div> -->
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-6">
              <!-- small box -->
              <!-- <div class="small-box bg-primary">
                <div class="inner">
                  <h3><?php echo $bmpersediaan?></h3>
                  <p>Jumlah Usulan Belanja Persediaan</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="<?php echo site_url('home/tabel_rkp');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div> -->
            </div>
            <!-- 
            <div class="col-lg-3 col-6">
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>44</h3>

                  <p>User Registrations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          -->
            <!-- ./col -->
            
            <!-- ./col -->
          </div>
        </center>
      
        <!-- /.row -->
        <!-- Main row -->
    </div>

    </div>
    </section>
    <!-- /.content -->
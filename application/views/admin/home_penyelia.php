
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- Untuk Pemberitahuan -->
        <div class="callout callout-info">
          <h4>Notice!</h4>
          Selamat Datang, <?php echo strtoupper($this->session->userdata('nama_login'));?>
        </div>
        <!-- PIE CHART -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><center>Total Register Keseluruhan - 25,750 Register</center></h3>
                <!-- <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button>
                </div> -->
            </div>
            <div class="card-body">
                <canvas id="pieChart" style="height:230px"></canvas>
            </div>
              <!-- /.card-body -->
        </div>
            <!-- /.card -->
        <div class="row">
            <div class="col-md-6">
                <!-- Widget: user widget style 2 -->
                <div class="card card-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-success">
                    <!-- /.widget-user-image -->
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
                <!-- /.widget-user -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                <!-- Widget: user widget style 2 -->
                <div class="card card-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-danger">
                    <!-- /.widget-user-image -->
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
                <!-- /.widget-user -->
            </div>
            <!-- /.col -->
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
            <!-- <div class="col-lg-6 col-6">
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo $bmaset;?></h3>
                  <p>Jumlah Usulan Belanja Modal</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="<?php echo site_url('home/tabel_rkb');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-6 col-6">
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3><?php echo $bmpersediaan?></h3>
                  <p>Jumlah Usulan Belanja Persediaan</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="<?php echo site_url('home/tabel_rkp');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div> -->
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
    </section>
    <!-- /.content -->
  </div>

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
                    <a href="<?php echo site_url('/Form_inv/isi_formulir');?>" class="small-box-footer">Isi Form Inventarisasi <i class="fas fa-arrow-circle-right"></i></a>
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
            <!-- ./col -->
            <div class="col-lg-6 col-6">
              <!-- small box -->
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
    </section>
    <!-- /.content -->
  </div>
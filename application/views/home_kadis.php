
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- Untuk Pemberitahuan -->
        <div class="callout callout-info">
          <h4>Hai!</h4>
          Selamat Datang Di Sistem Inventarisasi Barang Milik Daerah, Sistem ini akan membantu Perangkat Daerah untuk melakukan sensus terhadap aset - aset yang dimiliki.
        </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header bg-danger">
                  <h5 class="card-title"><center><strong style="font-size: 20px;color: black;">Total Progres Semua Aset Tetap Untuk Pengisian Form Inventarisasi</strong></center></h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                    <div class="progress" style="height:25px">
                      <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round((float)(($total_tanah->jum_kib+$total_pm->jum_kib+$total_gdb->jum_kib+$total_jij->jum_kib+$total_atl->jum_kib+$total_atb->jum_kib)-($sisa_tanah+$sisa_pm+$sisa_gdb+$sisa_jij+$sisa_atl+$sisa_atb))/($total_tanah->jum_kib+$total_pm->jum_kib+$total_gdb->jum_kib+$total_jij->jum_kib+$total_atl->jum_kib+$total_atb->jum_kib)*100,3) . '%';?>"><strong style="font-size: 20px;color: black;"><?php echo round((float)(($total_tanah->jum_kib+$total_pm->jum_kib+$total_gdb->jum_kib+$total_jij->jum_kib+$total_atl->jum_kib+$total_atb->jum_kib)-($sisa_tanah+$sisa_pm+$sisa_gdb+$sisa_jij+$sisa_atl+$sisa_atb))/($total_tanah->jum_kib+$total_pm->jum_kib+$total_gdb->jum_kib+$total_jij->jum_kib+$total_atl->jum_kib+$total_atb->jum_kib)*100,3) . '%';?></strong></div>
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
                        <h5 class="description-header"><?php echo number_format($total_tanah->jum_kib+$total_pm->jum_kib+$total_gdb->jum_kib+$total_jij->jum_kib+$total_atl->jum_kib+$total_atb->jum_kib);?></h5>
                        <span class="description-text">TOTAL REGISTER</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm col-6">
                      <div class="description-block border-right">
                        <h5 class="description-header"><?php echo number_format($rekap_tanah->proses+$rekap_pm->proses+$rekap_gdb->proses+$rekap_jij->proses+$rekap_atl->proses+$rekap_atb->proses);?></h5>
                        <span class="description-text">PROSES VERIFIKASI</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm col-6">
                      <div class="description-block border-right">
                        <h5 class="description-header"><?php echo number_format($rekap_tanah->tolak+$rekap_pm->tolak+$rekap_gdb->tolak+$rekap_jij->tolak+$rekap_atl->tolak+$rekap_atb->tolak);?></h5>
                        <span class="description-text">REGISTER DI TOLAK</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm col-6">
                      <div class="description-block border-right">
                        <h5 class="description-header"><?php echo number_format($rekap_tanah->verif+$rekap_pm->verif+$rekap_gdb->verif+$rekap_jij->verif+$rekap_atl->verif+$rekap_atb->verif);?></h5>
                        <span class="description-text">REGISTER TERVERIFIKASI</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <div class="col-sm col-6">
                      <div class="description-block">
                        <h5 class="description-header"><?php echo number_format($sisa_tanah+$sisa_pm+$sisa_gdb+$sisa_jij+$sisa_atl+$sisa_atb);?></h5>
                        <span class="description-text">REGISTER BELUM DI INVENTARISASI</span>
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
            <div class="col-md-6">
              <div class="card">
                <div class="card-header bg-warning">
                  <h5 class="card-title"><center><strong style="font-size: 20px;color: black;">Progres Aset Tetap Tanah Terhadap Pengisian Form Inventarisasi</strong></center></h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                    <div class="progress" style="height:25px">
                      <?php if ($sisa_tanah == 0) { ?>
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"><strong style="font-size: 20px;color: black;">100%</strong></div>
                      <?php } else {?>
                      <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round((float)($total_tanah->jum_kib-$sisa_tanah)/$total_tanah->jum_kib*100,3) . '%';?>"><strong style="font-size: 20px;color: black;"><?php echo round((float)($total_tanah->jum_kib-$sisa_tanah)/$total_tanah->jum_kib*100,3) . '%';?></strong></div>
                      <?php } ?>
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
                        <h5 class="description-header"><?php echo number_format($total_tanah->jum_kib);?></h5>
                        <span class="description-text">TOTAL REGISTER</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm col-6">
                      <div class="description-block border-right">
                        <h5 class="description-header"><?php echo number_format($rekap_tanah->proses);?></h5>
                        <span class="description-text">PROSES VERIFIKASI</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm col-6">
                      <div class="description-block border-right">
                        <h5 class="description-header"><?php echo number_format($rekap_tanah->tolak);?></h5>
                        <span class="description-text">REGISTER DI TOLAK</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm col-6">
                      <div class="description-block border-right">
                        <h5 class="description-header"><?php echo number_format($rekap_tanah->verif);?></h5>
                        <span class="description-text">REGISTER TERVERIFIKASI</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <div class="col-sm col-6">
                      <div class="description-block">
                        <h5 class="description-header"><?php echo number_format($sisa_tanah);?></h5>
                        <span class="description-text">REGISTER BELUM DI INVENTARISASI</span>
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

            <div class="col-md-6">
              <div class="card">
                <div class="card-header bg-success">
                  <h5 class="card-title"><center><strong style="font-size: 20px;color: black;">Progres Aset Tetap Peralatan dan Mesin Terhadap Pengisian Form Inventarisasi</strong></center></h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                    <div class="progress" style="height:25px">
                    <?php if ($sisa_pm == 0) { ?>
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"><strong style="font-size: 20px;color: black;">100%</strong></div>
                      <?php } else {?>
                      <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round((float)($total_pm->jum_kib-$sisa_pm)/$total_pm->jum_kib*100,3) . '%';?>"><strong style="font-size: 20px;color: black;"><?php echo round((float)($total_pm->jum_kib-$sisa_pm)/$total_pm->jum_kib*100,3) . '%';?></strong></div>
                      <?php } ?>
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
                        <h5 class="description-header"><?php echo number_format($total_pm->jum_kib);?></h5>
                        <span class="description-text">TOTAL REGISTER</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm col-6">
                      <div class="description-block border-right">
                        <h5 class="description-header"><?php echo number_format($rekap_pm->proses);?></h5>
                        <span class="description-text">PROSES VERIFIKASI</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm col-6">
                      <div class="description-block border-right">
                        <h5 class="description-header"><?php echo number_format($rekap_pm->tolak);?></h5>
                        <span class="description-text">REGISTER DI TOLAK</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm col-6">
                      <div class="description-block border-right">
                        <h5 class="description-header"><?php echo number_format($rekap_pm->verif);?></h5>
                        <span class="description-text">REGISTER TERVERIFIKASI</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <div class="col-sm col-6">
                      <div class="description-block">
                        <h5 class="description-header"><?php echo number_format($sisa_pm);?></h5>
                        <span class="description-text">REGISTER BELUM DI INVENTARISASI</span>
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

          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header bg-primary">
                  <h5 class="card-title"><center><strong style="font-size: 20px;color: black;">Progres Aset Tetap Gedung dan Bangunan Terhadap Pengisian Form Inventarisasi</strong></center></h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                    <div class="progress" style="height:25px">
                    <?php if ($sisa_gdb == 0) { ?>
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"><strong style="font-size: 20px;color: black;">100%</strong></div>
                      <?php } else {?>
                      <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round((float)($total_gdb->jum_kib-$sisa_gdb)/$total_gdb->jum_kib*100,3) . '%';?>"><strong style="font-size: 20px;color: black;"><?php echo round((float)($total_gdb->jum_kib-$sisa_gdb)/$total_gdb->jum_kib*100,3) . '%';?></strong></div>
                      <?php } ?>
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
                        <h5 class="description-header"><?php echo number_format($total_gdb->jum_kib);?></h5>
                        <span class="description-text">TOTAL REGISTER</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm col-6">
                      <div class="description-block border-right">
                        <h5 class="description-header"><?php echo number_format($rekap_gdb->proses);?></h5>
                        <span class="description-text">PROSES VERIFIKASI</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm col-6">
                      <div class="description-block border-right">
                        <h5 class="description-header"><?php echo number_format($rekap_gdb->tolak);?></h5>
                        <span class="description-text">REGISTER DI TOLAK</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm col-6">
                      <div class="description-block border-right">
                        <h5 class="description-header"><?php echo number_format($rekap_gdb->verif);?></h5>
                        <span class="description-text">REGISTER TERVERIFIKASI</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <div class="col-sm col-6">
                      <div class="description-block">
                        <h5 class="description-header"><?php echo number_format($sisa_gdb);?></h5>
                        <span class="description-text">REGISTER BELUM DI INVENTARISASI</span>
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
          

            <div class="col-md-6">
              <div class="card">
                <div class="card-header bg-info">
                  <h5 class="card-title"><center><strong style="font-size: 20px;color: black;">Progres Aset Tetap Jalan, Irigasi dan Jaringan Terhadap Pengisian Form Inventarisasi</strong></center></h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                    <div class="progress" style="height:25px">
                    <?php if ($sisa_jij == 0) { ?>
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"><strong style="font-size: 20px;color: black;">100%</strong></div>
                      <?php } else {?>
                      <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round((float)($total_jij->jum_kib-$sisa_jij)/$total_jij->jum_kib*100,3) . '%';?>"><strong style="font-size: 20px;color: black;"><?php echo round((float)($total_jij->jum_kib-$sisa_jij)/$total_jij->jum_kib*100,3) . '%';?></strong></div>
                      <?php } ?>
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
                        <h5 class="description-header"><?php echo number_format($total_jij->jum_kib);?></h5>
                        <span class="description-text">TOTAL REGISTER</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm col-6">
                      <div class="description-block border-right">
                        <h5 class="description-header"><?php echo number_format($rekap_jij->proses);?></h5>
                        <span class="description-text">PROSES VERIFIKASI</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm col-6">
                      <div class="description-block border-right">
                        <h5 class="description-header"><?php echo number_format($rekap_jij->tolak);?></h5>
                        <span class="description-text">REGISTER DI TOLAK</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm col-6">
                      <div class="description-block border-right">
                        <h5 class="description-header"><?php echo number_format($rekap_jij->verif);?></h5>
                        <span class="description-text">REGISTER TERVERIFIKASI</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <div class="col-sm col-6">
                      <div class="description-block">
                        <h5 class="description-header"><?php echo number_format($sisa_jij);?></h5>
                        <span class="description-text">REGISTER BELUM DI INVENTARISASI</span>
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
            <div class="col-md-6">
              <div class="card">
                <div class="card-header bg-success">
                  <h5 class="card-title"><center><strong style="font-size: 20px;color: black;">Progres Aset Tetap Lainnya Terhadap Pengisian Form Inventarisasi</strong></center></h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                    <div class="progress" style="height:25px">
                    <?php if ($sisa_atl == 0) { ?>
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"><strong style="font-size: 20px;color: black;">100%</strong></div>
                      <?php } else {?>
                      <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round((float)($total_atl->jum_kib-$sisa_atl)/$total_atl->jum_kib*100,3) . '%';?>"><strong style="font-size: 20px;color: black;"><?php echo round((float)($total_atl->jum_kib-$sisa_atl)/$total_atl->jum_kib*100,3) . '%';?></strong></div>
                      <?php } ?>
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
                        <h5 class="description-header"><?php echo number_format($total_atl->jum_kib);?></h5>
                        <span class="description-text">TOTAL REGISTER</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm col-6">
                      <div class="description-block border-right">
                        <h5 class="description-header"><?php echo number_format($rekap_atl->proses);?></h5>
                        <span class="description-text">PROSES VERIFIKASI</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm col-6">
                      <div class="description-block border-right">
                        <h5 class="description-header"><?php echo number_format($rekap_atl->tolak);?></h5>
                        <span class="description-text">REGISTER DI TOLAK</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm col-6">
                      <div class="description-block border-right">
                        <h5 class="description-header"><?php echo number_format($rekap_atl->verif);?></h5>
                        <span class="description-text">REGISTER TERVERIFIKASI</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <div class="col-sm col-6">
                      <div class="description-block">
                        <h5 class="description-header"><?php echo number_format($sisa_atl);?></h5>
                        <span class="description-text">REGISTER BELUM DI INVENTARISASI</span>
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
          
          
            <div class="col-md-6">
              <div class="card">
                <div class="card-header bg-gray">
                  <h5 class="card-title"><center><strong style="font-size: 20px;color: black;">Progres Aset Tidak Berwujud Terhadap Pengisian Form Inventarisasi</strong></center></h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                    <div class="progress" style="height:25px">
                    <?php if ($sisa_atb == 0) { ?>
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"><strong style="font-size: 20px;color: black;">100%</strong></div>
                      <?php } else {?>
                      <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round((float)($total_atb->jum_kib-$sisa_atb)/$total_atb->jum_kib*100,3) . '%';?>"><strong style="font-size: 20px;color: black;"><?php echo round((float)($total_atb->jum_kib-$sisa_atb)/$total_atb->jum_kib*100,3) . '%';?></strong></div>
                      <?php } ?>
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
                        <h5 class="description-header"><?php echo number_format($total_atb->jum_kib);?></h5>
                        <span class="description-text">TOTAL REGISTER</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm col-6">
                      <div class="description-block border-right">
                        <h5 class="description-header"><?php echo number_format($rekap_atb->proses);?></h5>
                        <span class="description-text">PROSES VERIFIKASI</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm col-6">
                      <div class="description-block border-right">
                        <h5 class="description-header"><?php echo number_format($rekap_atb->tolak);?></h5>
                        <span class="description-text">REGISTER DI TOLAK</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm col-6">
                      <div class="description-block border-right">
                        <h5 class="description-header"><?php echo number_format($rekap_atb->verif);?></h5>
                        <span class="description-text">REGISTER TERVERIFIKASI</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <div class="col-sm col-6">
                      <div class="description-block">
                        <h5 class="description-header"><?php echo number_format($sisa_atb);?></h5>
                        <span class="description-text">REGISTER BELUM DI INVENTARISASI</span>
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
          <?php if ($this->session->userdata('no_lokasi_asli') == "13.30.000701") {?>
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
        <?php if ($this->session->userdata('no_lokasi_asli') == "13.30.000801") {?>
          <div class="row">
            <div class="col-lg-12 col-12">
              <div class="card card-info">
                <div class="card">
                  <div class="card-header no-border ">
                    <h3 class="card-title">Rekapan Per Sekolah</h3>
                    <div class="card-tools">
                      <!-- <a href="<?php echo site_url('home_penyelia/export_excel_rekap_penyelia')?>" class="btn btn-tool btn-sm" title="Download Rekapan"> -->
                        <i class="fas fa-download"></i>
                      </a>
                    </div>
                  </div>
                  <div class="card-body p-3">
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
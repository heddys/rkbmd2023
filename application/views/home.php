
    <!-- Inline CSS for card loading animation -->
    <style>
      .card-loading-overlay {
        display: flex; align-items: center; justify-content: center;
        min-height: 80px; color: #888;
      }
      .card-loading-overlay i { margin-right: 8px; }
      .skeleton-val {
        display: inline-block; background: #e0e0e0; border-radius: 4px;
        width: 60px; height: 22px; animation: shimmer 1.2s infinite ease-in-out;
      }
      .skeleton-bar {
        background: #e0e0e0; border-radius: 4px; width: 100%; height: 25px;
        animation: shimmer 1.2s infinite ease-in-out;
      }
      @keyframes shimmer {
        0%   { opacity: 1; }
        50%  { opacity: 0.4; }
        100% { opacity: 1; }
      }
      .card-loaded .skeleton-val, .card-loaded .skeleton-bar { display: none; }
    </style>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Untuk Pemberitahuan -->
        <div class="callout callout-info">
          <h4>Hai!</h4>
          Selamat Datang Di Sistem Inventarisasi Barang Milik Daerah, Sistem ini akan membantu Perangkat Daerah untuk melakukan sensus terhadap aset - aset yang dimiliki.
        </div>

          <!-- ============================================================= -->
          <!-- CARD: Total Progres Semua Aset (aggregated client-side)        -->
          <!-- ============================================================= -->
          <div class="row">
            <div class="col-12">
              <div class="card" id="card-total">
                <div class="card-header bg-danger">
                  <h5 class="card-title"><center><strong style="font-size: 20px;color: black;">Total Progres Semua Aset Tetap Untuk Pengisian Form Inventarisasi</strong></center></h5>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="progress" style="height:25px" id="progress-total">
                        <div class="skeleton-bar"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-sm col-6">
                      <div class="description-block border-right">
                        <h5 class="description-header" id="total-register"><span class="skeleton-val"></span></h5>
                        <span class="description-text">TOTAL REGISTER</span>
                      </div>
                    </div>
                    <div class="col-sm col-6">
                      <div class="description-block border-right">
                        <h5 class="description-header" id="total-proses"><span class="skeleton-val"></span></h5>
                        <span class="description-text">PROSES VERIFIKASI</span>
                      </div>
                    </div>
                    <div class="col-sm col-6">
                      <div class="description-block border-right">
                        <h5 class="description-header" id="total-tolak"><span class="skeleton-val"></span></h5>
                        <span class="description-text">REGISTER DI TOLAK</span>
                      </div>
                    </div>
                    <div class="col-sm col-6">
                      <div class="description-block border-right">
                        <h5 class="description-header" id="total-verif"><span class="skeleton-val"></span></h5>
                        <span class="description-text">REGISTER TERVERIFIKASI</span>
                      </div>
                    </div>
                    <div class="col-sm col-6">
                      <div class="description-block">
                        <h5 class="description-header" id="total-sisa"><span class="skeleton-val"></span></h5>
                        <span class="description-text">REGISTER BELUM DI INVENTARISASI</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- ============================================================= -->
          <!-- ROW 1: Tanah & Peralatan Mesin                                -->
          <!-- ============================================================= -->
          <div class="row">
            <!-- CARD: Tanah -->
            <div class="col-md-6">
              <div class="card" id="card-tanah">
                <div class="card-header bg-warning">
                  <h5 class="card-title"><center><strong style="font-size: 20px;color: black;">Progres Aset Tetap Tanah Terhadap Pengisian Form Inventarisasi</strong></center></h5>
                </div>
                <div class="card-body">
                  <div class="row"><div class="col-md-12">
                    <div class="progress" style="height:25px" id="progress-tanah"><div class="skeleton-bar"></div></div>
                  </div></div>
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-sm col-6"><div class="description-block border-right"><h5 class="description-header" id="tanah-register"><span class="skeleton-val"></span></h5><span class="description-text">TOTAL REGISTER</span></div></div>
                    <div class="col-sm col-6"><div class="description-block border-right"><h5 class="description-header" id="tanah-proses"><span class="skeleton-val"></span></h5><span class="description-text">PROSES VERIFIKASI</span></div></div>
                    <div class="col-sm col-6"><div class="description-block border-right"><h5 class="description-header" id="tanah-tolak"><span class="skeleton-val"></span></h5><span class="description-text">REGISTER DI TOLAK</span></div></div>
                    <div class="col-sm col-6"><div class="description-block border-right"><h5 class="description-header" id="tanah-verif"><span class="skeleton-val"></span></h5><span class="description-text">REGISTER TERVERIFIKASI</span></div></div>
                    <div class="col-sm col-6"><div class="description-block"><h5 class="description-header" id="tanah-sisa"><span class="skeleton-val"></span></h5><span class="description-text">REGISTER BELUM DI INVENTARISASI</span></div></div>
                  </div>
                </div>
              </div>
            </div>

            <!-- CARD: Peralatan dan Mesin -->
            <div class="col-md-6">
              <div class="card" id="card-pm">
                <div class="card-header bg-success">
                  <h5 class="card-title"><center><strong style="font-size: 20px;color: black;">Progres Aset Tetap Peralatan dan Mesin Terhadap Pengisian Form Inventarisasi</strong></center></h5>
                </div>
                <div class="card-body">
                  <div class="row"><div class="col-md-12">
                    <div class="progress" style="height:25px" id="progress-pm"><div class="skeleton-bar"></div></div>
                  </div></div>
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-sm col-6"><div class="description-block border-right"><h5 class="description-header" id="pm-register"><span class="skeleton-val"></span></h5><span class="description-text">TOTAL REGISTER</span></div></div>
                    <div class="col-sm col-6"><div class="description-block border-right"><h5 class="description-header" id="pm-proses"><span class="skeleton-val"></span></h5><span class="description-text">PROSES VERIFIKASI</span></div></div>
                    <div class="col-sm col-6"><div class="description-block border-right"><h5 class="description-header" id="pm-tolak"><span class="skeleton-val"></span></h5><span class="description-text">REGISTER DI TOLAK</span></div></div>
                    <div class="col-sm col-6"><div class="description-block border-right"><h5 class="description-header" id="pm-verif"><span class="skeleton-val"></span></h5><span class="description-text">REGISTER TERVERIFIKASI</span></div></div>
                    <div class="col-sm col-6"><div class="description-block"><h5 class="description-header" id="pm-sisa"><span class="skeleton-val"></span></h5><span class="description-text">REGISTER BELUM DI INVENTARISASI</span></div></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- ============================================================= -->
          <!-- ROW 2: Gedung & Bangunan, Jalan Irigasi Jaringan              -->
          <!-- ============================================================= -->
          <div class="row">
            <!-- CARD: Gedung dan Bangunan -->
            <div class="col-md-6">
              <div class="card" id="card-gdb">
                <div class="card-header bg-primary">
                  <h5 class="card-title"><center><strong style="font-size: 20px;color: black;">Progres Aset Tetap Gedung dan Bangunan Terhadap Pengisian Form Inventarisasi</strong></center></h5>
                </div>
                <div class="card-body">
                  <div class="row"><div class="col-md-12">
                    <div class="progress" style="height:25px" id="progress-gdb"><div class="skeleton-bar"></div></div>
                  </div></div>
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-sm col-6"><div class="description-block border-right"><h5 class="description-header" id="gdb-register"><span class="skeleton-val"></span></h5><span class="description-text">TOTAL REGISTER</span></div></div>
                    <div class="col-sm col-6"><div class="description-block border-right"><h5 class="description-header" id="gdb-proses"><span class="skeleton-val"></span></h5><span class="description-text">PROSES VERIFIKASI</span></div></div>
                    <div class="col-sm col-6"><div class="description-block border-right"><h5 class="description-header" id="gdb-tolak"><span class="skeleton-val"></span></h5><span class="description-text">REGISTER DI TOLAK</span></div></div>
                    <div class="col-sm col-6"><div class="description-block border-right"><h5 class="description-header" id="gdb-verif"><span class="skeleton-val"></span></h5><span class="description-text">REGISTER TERVERIFIKASI</span></div></div>
                    <div class="col-sm col-6"><div class="description-block"><h5 class="description-header" id="gdb-sisa"><span class="skeleton-val"></span></h5><span class="description-text">REGISTER BELUM DI INVENTARISASI</span></div></div>
                  </div>
                </div>
              </div>
            </div>

            <!-- CARD: Jalan, Irigasi dan Jaringan -->
            <div class="col-md-6">
              <div class="card" id="card-jij">
                <div class="card-header bg-info">
                  <h5 class="card-title"><center><strong style="font-size: 20px;color: black;">Progres Aset Tetap Jalan, Irigasi dan Jaringan Terhadap Pengisian Form Inventarisasi</strong></center></h5>
                </div>
                <div class="card-body">
                  <div class="row"><div class="col-md-12">
                    <div class="progress" style="height:25px" id="progress-jij"><div class="skeleton-bar"></div></div>
                  </div></div>
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-sm col-6"><div class="description-block border-right"><h5 class="description-header" id="jij-register"><span class="skeleton-val"></span></h5><span class="description-text">TOTAL REGISTER</span></div></div>
                    <div class="col-sm col-6"><div class="description-block border-right"><h5 class="description-header" id="jij-proses"><span class="skeleton-val"></span></h5><span class="description-text">PROSES VERIFIKASI</span></div></div>
                    <div class="col-sm col-6"><div class="description-block border-right"><h5 class="description-header" id="jij-tolak"><span class="skeleton-val"></span></h5><span class="description-text">REGISTER DI TOLAK</span></div></div>
                    <div class="col-sm col-6"><div class="description-block border-right"><h5 class="description-header" id="jij-verif"><span class="skeleton-val"></span></h5><span class="description-text">REGISTER TERVERIFIKASI</span></div></div>
                    <div class="col-sm col-6"><div class="description-block"><h5 class="description-header" id="jij-sisa"><span class="skeleton-val"></span></h5><span class="description-text">REGISTER BELUM DI INVENTARISASI</span></div></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.row -->

          <!-- ============================================================= -->
          <!-- ROW 3: Aset Tetap Lainnya & Aset Tidak Berwujud               -->
          <!-- ============================================================= -->
          <div class="row">
            <!-- CARD: Aset Tetap Lainnya -->
            <div class="col-md-6">
              <div class="card" id="card-atl">
                <div class="card-header bg-success">
                  <h5 class="card-title"><center><strong style="font-size: 20px;color: black;">Progres Aset Tetap Lainnya Terhadap Pengisian Form Inventarisasi</strong></center></h5>
                </div>
                <div class="card-body">
                  <div class="row"><div class="col-md-12">
                    <div class="progress" style="height:25px" id="progress-atl"><div class="skeleton-bar"></div></div>
                  </div></div>
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-sm col-6"><div class="description-block border-right"><h5 class="description-header" id="atl-register"><span class="skeleton-val"></span></h5><span class="description-text">TOTAL REGISTER</span></div></div>
                    <div class="col-sm col-6"><div class="description-block border-right"><h5 class="description-header" id="atl-proses"><span class="skeleton-val"></span></h5><span class="description-text">PROSES VERIFIKASI</span></div></div>
                    <div class="col-sm col-6"><div class="description-block border-right"><h5 class="description-header" id="atl-tolak"><span class="skeleton-val"></span></h5><span class="description-text">REGISTER DI TOLAK</span></div></div>
                    <div class="col-sm col-6"><div class="description-block border-right"><h5 class="description-header" id="atl-verif"><span class="skeleton-val"></span></h5><span class="description-text">REGISTER TERVERIFIKASI</span></div></div>
                    <div class="col-sm col-6"><div class="description-block"><h5 class="description-header" id="atl-sisa"><span class="skeleton-val"></span></h5><span class="description-text">REGISTER BELUM DI INVENTARISASI</span></div></div>
                  </div>
                </div>
              </div>
            </div>

            <!-- CARD: Aset Tidak Berwujud -->
            <div class="col-md-6">
              <div class="card" id="card-atb">
                <div class="card-header bg-gray">
                  <h5 class="card-title"><center><strong style="font-size: 20px;color: black;">Progres Aset Tidak Berwujud Terhadap Pengisian Form Inventarisasi</strong></center></h5>
                </div>
                <div class="card-body">
                  <div class="row"><div class="col-md-12">
                    <div class="progress" style="height:25px" id="progress-atb"><div class="skeleton-bar"></div></div>
                  </div></div>
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-sm col-6"><div class="description-block border-right"><h5 class="description-header" id="atb-register"><span class="skeleton-val"></span></h5><span class="description-text">TOTAL REGISTER</span></div></div>
                    <div class="col-sm col-6"><div class="description-block border-right"><h5 class="description-header" id="atb-proses"><span class="skeleton-val"></span></h5><span class="description-text">PROSES VERIFIKASI</span></div></div>
                    <div class="col-sm col-6"><div class="description-block border-right"><h5 class="description-header" id="atb-tolak"><span class="skeleton-val"></span></h5><span class="description-text">REGISTER DI TOLAK</span></div></div>
                    <div class="col-sm col-6"><div class="description-block border-right"><h5 class="description-header" id="atb-verif"><span class="skeleton-val"></span></h5><span class="description-text">REGISTER TERVERIFIKASI</span></div></div>
                    <div class="col-sm col-6"><div class="description-block"><h5 class="description-header" id="atb-sisa"><span class="skeleton-val"></span></h5><span class="description-text">REGISTER BELUM DI INVENTARISASI</span></div></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
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
                          <th>Register Belum Di Inventarisasi</th>
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
                            <td><center>
                            <?php
                            $total  = isset($row->total)  ? $row->total  : 0;
                            $verif  = isset($row->verif)  ? $row->verif  : 0;
                            $proses = isset($row->proses) ? $row->proses : 0;
                            $tolak  = isset($row->tolak)  ? $row->tolak  : 0;

                            echo number_format($total - ($verif + $proses + $tolak));
                            ?>
                            </center></td>
                            <td><center><?php echo round((float)$row->verif/$row->total*100,3) . '%';?></center></td>
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
        </div>
      </div>

    </div>
    </section>
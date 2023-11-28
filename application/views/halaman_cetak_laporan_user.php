
  <section class="content">
    <div class="container-fluid">  
        <div class="row">    
            <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title"><center><b>LIST LAPORAN HASIL INVENTERASASI</b></center></h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div id="accordion">
                      <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->
                      <div class="card card-primary">
                        <div class="card-header">
                          <h4 class="card-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#menu1">
                            Cetak Laporan Perubahan Data Barang
                            </a>
                          </h4>
                        </div>
                        <div id="menu1" class="panel-collapse collapse in">
                          <div class="card-body">
                            Cetak Laporan untuk mengetahui perubahan setiap atribut barang yang telah diverifikasi.
                            <hr>
                            <!-- <a href="<?php echo site_url('status_form/cetak_perubahan_data_barang');?>" target="_blank" rel="noopener noreferrer" class="btn btn-default btn-block btn-flat">Cetak Laporan</a> -->
                            <table class="table">
                                <tr>
                                    <th>
                                        <a href="<?php echo site_url('status_form/cetak_perubahan_data_barang/1.3.1');?>" target="_blank" rel="noopener noreferrer" class="btn btn-block btn-outline-primary">Tanah</a>
                                    </th>
                                    <th>
                                        <a href="<?php echo site_url('status_form/cetak_perubahan_data_barang/1.3.2');?>" target="_blank" rel="noopener noreferrer" class="btn btn-block btn-outline-success">Peralatan dan Mesin</a>
                                    </th>
                                    <th>
                                        <a href="<?php echo site_url('status_form/cetak_perubahan_data_barang/1.3.3');?>" target="_blank" rel="noopener noreferrer" class="btn btn-block btn-outline-info">Gedung dan Bangunan</a>
                                    </th>
                                    <th>
                                        <a href="<?php echo site_url('status_form/cetak_perubahan_data_barang/1.3.4');?>" target="_blank" rel="noopener noreferrer" class="btn btn-block btn-outline-danger">jalan, Irigasi dan Jaringan</a>
                                    </th>
                                    <th>
                                        <a href="<?php echo site_url('status_form/cetak_perubahan_data_barang/1.3.5');?>" target="_blank" rel="noopener noreferrer" class="btn btn-block btn-outline-warning">Aset Tetap Lainnya</a>
                                    </th>
                                    <th>
                                        <a href="<?php echo site_url('status_form/cetak_perubahan_data_barang/1.5.3');?>" target="_blank" rel="noopener noreferrer" class="btn btn-block btn-outline-secondary">Aset Tidak Berwujud</a>
                                    </th>
                                </tr>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="card card-danger">
                        <div class="card-header">
                          <h4 class="card-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#menu2">
                            Cetak Laporan Perubahan Fisik Barang
                            </a>
                          </h4>
                        </div>
                        <div id="menu2" class="panel-collapse collapse">
                          <div class="card-body">
                            Cetak Laporan untuk mengetahui perubahan kondisi barang (Baik/Kurang Baik/Rusak Berat) barang yang telah diverifikasi.
                            <hr>
                            <a href="<?php echo site_url('status_form/cetak_form_kondisi_barang');?>" target="_blank" rel="noopener noreferrer" class="btn btn-default btn-block btn-flat">Cetak Laporan</a>
                          </div>
                        </div>
                      </div>
                      <div class="card card-success">
                        <div class="card-header">
                          <h4 class="card-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#menu3">
                            Cetak Laporan Barang Tidak Diketemukan
                            </a>
                          </h4>
                        </div>
                        <div id="menu3" class="panel-collapse collapse">
                          <div class="card-body">
                            Cetak Laporan untuk mengetahui status keberadaan barang yang tidak diketemukan dan yang telah diverifikasi.
                            <hr>
                            <a href="<?php echo site_url('status_form/cetak_barang_tidak_ditemukan');?>" target="_blank" rel="noopener noreferrer" class="btn btn-default btn-block btn-flat">Cetak Laporan</a>
                          </div>
                        </div>
                      </div>

                      <div class="card card-info">
                        <div class="card-header">
                          <h4 class="card-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#menu4">
                            Cetak Laporan Barang Hilang
                            </a>
                          </h4>
                        </div>
                        <div id="menu4" class="panel-collapse collapse">
                          <div class="card-body">
                            Cetak Laporan untuk mengetahui status keberadaan barang yang hilang dan yang telah diverifikasi.
                            <hr>
                            <a href="<?php echo site_url('status_form/laporan_barang_hilang');?>" target="_blank" rel="noopener noreferrer" class="btn btn-default btn-block btn-flat">Cetak Laporan</a>
                          </div>
                        </div>
                      </div>

                      <div class="card card-warning">
                        <div class="card-header">
                          <h4 class="card-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#menu5">
                            Cetak Barang Belum Dikapitalisasi dan Diketahui Induknya
                            </a>
                          </h4>
                        </div>
                        <div id="menu5" class="panel-collapse collapse">
                          <div class="card-body">
                            Cetak Laporan untuk mengetahui barang harusnya dikapitalisasi dengan barang lain yang diketahui induknya dan yang telah diverifikasi.
                            <hr>
                            <a href="<?php echo site_url('status_form/laporan_belum_dikapt_diketahui_induk');?>" target="_blank" rel="noopener noreferrer" class="btn btn-default btn-block btn-flat">Cetak Laporan</a>
                          </div>
                        </div>
                      </div>

                      <div class="card card-secondary">
                        <div class="card-header">
                          <h4 class="card-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#menu6">
                            Cetak Barang Belum Dikapitalisasi dan Tidak Diketahui Induknya
                            </a>
                          </h4>
                        </div>
                        <div id="menu6" class="panel-collapse collapse">
                          <div class="card-body">
                            Cetak Laporan untuk mengetahui barang harusnya dikapitalisasi dengan barang lain yang tida diketahui induknya dan yang telah diverifikasi.
                            <hr>
                            <a href="<?php echo site_url('status_form/laporan_belum_dikapt_tidak_diketahui_induk');?>" target="_blank" rel="noopener noreferrer" class="btn btn-default btn-block btn-flat">Cetak Laporan</a>
                          </div>
                        </div>
                      </div>

                      <div class="card card-primary">
                        <div class="card-header">
                          <h4 class="card-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#menu7">
                            Cetak Barang Tercatat Ganda
                            </a>
                          </h4>
                        </div>
                        <div id="menu7" class="panel-collapse collapse">
                          <div class="card-body">
                            Cetak Laporan untuk mengetahui barang tercatat ganda dan yang telah diverifikasi.
                            <hr>
                            <a href="<?php echo site_url('status_form/laporan_data_tercatat_ganda');?>" target="_blank" rel="noopener noreferrer" class="btn btn-default btn-block btn-flat">Cetak Laporan</a>
                          </div>
                        </div>
                      </div>

                      <div class="card card-success">
                        <div class="card-header">
                          <h4 class="card-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#menu8">
                            Cetak Barang Digunakan Pihak Lain
                            </a>
                          </h4>
                        </div>
                        <div id="menu8" class="panel-collapse collapse">
                          <div class="card-body">
                            Cetak Laporan untuk mengetahui informasi barang/aset yang digunakan oleh pihak lain dan yang telah diverifikasi.
                            <hr>
                            <a href="<?php echo site_url('status_form/laporan_data_digunakan_pihak_lain');?>" target="_blank" rel="noopener noreferrer" class="btn btn-default btn-block btn-flat">Cetak Laporan</a>
                          </div>
                        </div>
                      </div>

                      <div class="card card-secondary">
                        <div class="card-header">
                          <h4 class="card-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#menu9">
                            Cetak Barang Digunakan Pegawai Pemerintah Kota
                            </a>
                          </h4>
                        </div>
                        <div id="menu9" class="panel-collapse collapse">
                          <div class="card-body">
                            Cetak Laporan untuk mengetahui informasi barang/aset digunakan oleh pegawai pemerintah kota dan yang telah diverifikasi.
                            <hr>
                            <a href="<?php echo site_url('status_form/laporan_data_digunakan_pegawai_pemda');?>" target="_blank" rel="noopener noreferrer" class="btn btn-default btn-block btn-flat">Cetak Laporan</a>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
              <!-- /.col -->
        </div>
      </div>
    </section>

</div>
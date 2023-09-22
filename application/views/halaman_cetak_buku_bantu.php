
<section class="content">
    <div class="container-fluid">  
        <div class="row">    
            <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title"><center><b>LIST BUKU BANTU</b></center></h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div id="accordion">
                      <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->
                      <div class="card card-primary">
                        <div class="card-header">
                          <h4 class="card-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#menu1">
                            Buku Bantu Status Register
                            </a>
                          </h4>
                        </div>
                        <div id="menu1" class="panel-collapse collapse in">
                          <div class="card-body">
                            Cetak Buku Bantu untuk mengetahui status pengerjaan semua register.
                            <hr>
                            <table class="table">
                                <tr>
                                    <th>
                                        <a href="<?php echo site_url('form_inv/export_excel_all_kibpm_user/1.3.1');?>" target="_blank" rel="noopener noreferrer" class="btn btn-block btn-outline-primary">Tanah</a>
                                    </th>
                                    <th>
                                        <a href="<?php echo site_url('form_inv/export_excel_all_kibpm_user/1.3.2');?>" target="_blank" rel="noopener noreferrer" class="btn btn-block btn-outline-success">Peralatan dan Mesin</a>
                                    </th>
                                    <th>
                                        <a href="<?php echo site_url('form_inv/export_excel_all_kibpm_user/1.3.3');?>" target="_blank" rel="noopener noreferrer" class="btn btn-block btn-outline-info">Gedung dan Bangunan</a>
                                    </th>
                                    <th>
                                        <a href="<?php echo site_url('form_inv/export_excel_all_kibpm_user/1.3.4');?>" target="_blank" rel="noopener noreferrer" class="btn btn-block btn-outline-danger">jalan, Irigasi dan Jaringan</a>
                                    </th>
                                    <th>
                                        <a href="<?php echo site_url('form_inv/export_excel_all_kibpm_user/1.3.5');?>" target="_blank" rel="noopener noreferrer" class="btn btn-block btn-outline-warning">Aset Tetap Lainnya</a>
                                    </th>
                                    <th>
                                        <a href="<?php echo site_url('form_inv/export_excel_all_kibpm_user/1.5.3');?>" target="_blank" rel="noopener noreferrer" class="btn btn-block btn-outline-secondary">Aset Tidak Berwujud</a>
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
                           Buku Bantu Register Telah Di Kerjakan
                            </a>
                          </h4>
                        </div>
                        <div id="menu2" class="panel-collapse collapse">
                          <div class="card-body">
                            Cetak Laporan untuk mengetahui status register yang sudah di inventarisasi
                            <hr>
                            <table class="table">
                                <tr>
                                    <th>
                                        <a href="<?php echo site_url('form_inv/export_excel_reg_sudah_dikerjakan/1.3.1');?>" target="_blank" rel="noopener noreferrer" class="btn btn-block btn-outline-primary">Tanah</a>
                                    </th>
                                    <th>
                                        <a href="<?php echo site_url('form_inv/export_excel_reg_sudah_dikerjakan/1.3.2');?>" target="_blank" rel="noopener noreferrer" class="btn btn-block btn-outline-success">Peralatan dan Mesin</a>
                                    </th>
                                    <th>
                                        <a href="<?php echo site_url('form_inv/export_excel_reg_sudah_dikerjakan/1.3.3');?>" target="_blank" rel="noopener noreferrer" class="btn btn-block btn-outline-info">Gedung dan Bangunan</a>
                                    </th>
                                    <th>
                                        <a href="<?php echo site_url('form_inv/export_excel_reg_sudah_dikerjakan/1.3.4');?>" target="_blank" rel="noopener noreferrer" class="btn btn-block btn-outline-danger">jalan, Irigasi dan Jaringan</a>
                                    </th>
                                    <th>
                                        <a href="<?php echo site_url('form_inv/export_excel_reg_sudah_dikerjakan/1.3.5');?>" target="_blank" rel="noopener noreferrer" class="btn btn-block btn-outline-warning">Aset Tetap Lainnya</a>
                                    </th>
                                    <th>
                                        <a href="<?php echo site_url('form_inv/export_excel_reg_sudah_dikerjakan/1.5.3');?>" target="_blank" rel="noopener noreferrer" class="btn btn-block btn-outline-secondary">Aset Tidak Berwujud</a>
                                    </th>
                                </tr>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="card card-success">
                        <div class="card-header">
                          <h4 class="card-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#menu3">
                                Buku Bantu Kondisi Barang
                            </a>
                          </h4>
                        </div>
                        <div id="menu3" class="panel-collapse collapse">
                          <div class="card-body">
                            Cetak Laporan untuk mengetahui kondisi barang setelah adanya inventarisasi
                            <table class="table">
                                <tr>
                                    <th>
                                        <a href="<?php echo site_url('form_inv/export_excel_kondisi_kibpm_user/1.3.1');?>" target="_blank" rel="noopener noreferrer" class="btn btn-block btn-outline-primary">Tanah</a>
                                    </th>
                                    <th>
                                        <a href="<?php echo site_url('form_inv/export_excel_kondisi_kibpm_user/1.3.2');?>" target="_blank" rel="noopener noreferrer" class="btn btn-block btn-outline-success">Peralatan dan Mesin</a>
                                    </th>
                                    <th>
                                        <a href="<?php echo site_url('form_inv/export_excel_kondisi_kibpm_user/1.3.3');?>" target="_blank" rel="noopener noreferrer" class="btn btn-block btn-outline-info">Gedung dan Bangunan</a>
                                    </th>
                                    <th>
                                        <a href="<?php echo site_url('form_inv/export_excel_kondisi_kibpm_user/1.3.4');?>" target="_blank" rel="noopener noreferrer" class="btn btn-block btn-outline-danger">jalan, Irigasi dan Jaringan</a>
                                    </th>
                                    <th>
                                        <a href="<?php echo site_url('form_inv/export_excel_kondisi_kibpm_user/1.3.5');?>" target="_blank" rel="noopener noreferrer" class="btn btn-block btn-outline-warning">Aset Tetap Lainnya</a>
                                    </th>
                                    <th>
                                        <a href="<?php echo site_url('form_inv/export_excel_kondisi_kibpm_user/1.5.3');?>" target="_blank" rel="noopener noreferrer" class="btn btn-block btn-outline-secondary">Aset Tidak Berwujud</a>
                                    </th>
                                </tr>
                            </table>
                          </div>
                        </div>
                      </div>

                      <div class="card card-info">
                        <div class="card-header">
                          <h4 class="card-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#menu4">
                            Buku Bantu Perubahan Lokasi
                            </a>
                          </h4>
                        </div>
                        <div id="menu4" class="panel-collapse collapse">
                          <div class="card-body">
                            Cetak Laporan untuk mengetahui perubahan lokasi pada register-register yang telah di inventarisasi.
                            <hr>
                            <table class="table">
                                <tr>
                                    <th>
                                        <a href="<?php echo site_url('form_inv/export_excel_lokasi_kibpm_user/1.3.1');?>" target="_blank" rel="noopener noreferrer" class="btn btn-block btn-outline-primary">Tanah</a>
                                    </th>
                                    <th>
                                        <a href="<?php echo site_url('form_inv/export_excel_lokasi_kibpm_user/1.3.2');?>" target="_blank" rel="noopener noreferrer" class="btn btn-block btn-outline-success">Peralatan dan Mesin</a>
                                    </th>
                                    <th>
                                        <a href="<?php echo site_url('form_inv/export_excel_lokasi_kibpm_user/1.3.3');?>" target="_blank" rel="noopener noreferrer" class="btn btn-block btn-outline-info">Gedung dan Bangunan</a>
                                    </th>
                                    <th>
                                        <a href="<?php echo site_url('form_inv/export_excel_lokasi_kibpm_user/1.3.4');?>" target="_blank" rel="noopener noreferrer" class="btn btn-block btn-outline-danger">jalan, Irigasi dan Jaringan</a>
                                    </th>
                                    <th>
                                        <a href="<?php echo site_url('form_inv/export_excel_lokasi_kibpm_user/1.3.5');?>" target="_blank" rel="noopener noreferrer" class="btn btn-block btn-outline-warning">Aset Tetap Lainnya</a>
                                    </th>
                                    <th>
                                        <a href="<?php echo site_url('form_inv/export_excel_lokasi_kibpm_user/1.5.3');?>" target="_blank" rel="noopener noreferrer" class="btn btn-block btn-outline-secondary">Aset Tidak Berwujud</a>
                                    </th>
                                </tr>
                            </table>
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
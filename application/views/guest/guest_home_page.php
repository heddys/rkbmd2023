
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- Untuk Pemberitahuan -->
        <div class="callout callout-info">
          <h4>Notice!</h4>
          Selamat Datang, Pemeriksa - BPK RI
        </div>

        <!-- PIE CHART -->
        <div class="card card-info">
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
                      <th>No.</th>
                      <th><center>Perangkat Daerah<center></th>
                      <th>Total Register</th>
                      <th>Register Telah Di Verif</th>
                      <th>Register Masih Proses Verif</th>
                      <th>Register Di Tolak</th>
                      <th>Register Belum Dikerjakan</th>
                      <th>Persentase</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php $x=1; foreach ($rekap_opd as $row) { ?>
                      <tr>
                        <td><center><?php echo $x?></center></td>
                        <td><?php echo strtoupper($row->unit);?></td>
                        <td><center><?php echo number_format($row->total);?></center></td>
                        <td><center><?php echo number_format($row->verif);?></center></td>
                        <td><center><?php echo number_format($row->proses);?></center></td>
                        <td><center><?php echo number_format($row->tolak);?></center></td>
                        <td><center><?php echo number_format($row->sisa);?></center></td>
                        <td><center><?php echo round((float)$row->persentase,3) . '%';?></center></td>
                      </tr>
                      <?php $x++;} ?>
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
        </div>
      
        <!-- /.row -->
        <!-- Main row -->
    </div>
    </section>
    <!-- /.content -->
  </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- Untuk Pemberitahuan -->
        <div class="callout callout-info">
          <h4>Notice!</h4>
          Selamat Datang, Administrator
        </div>
        <!-- PIE CHART -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><center>Total Register Keseluruhan - <?php $all_reg=$get_data_chart->jumlah_proses+$get_data_chart->jumlah_tolak+$get_data_chart->jumlah_terverif+$get_data_chart->jumlah_reg_belum_diisi; echo number_format($all_reg)?> Register</center></h3>
                <!-- <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i> 
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button>
                </div> -->
                <input type="hidden" id="proses" value="<?php echo $get_data_chart->jumlah_proses;?>"></input>
                <input type="hidden" id="tolak" value="<?php echo $get_data_chart->jumlah_tolak;?>"></input>
                <input type="hidden" id="verif" value="<?php echo $get_data_chart->jumlah_terverif;?>"></input>
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
      
        <!-- /.row -->
        <!-- Main row -->
    </div>
    </section>
    <!-- /.content -->
  </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- Untuk Pemberitahuan -->
        <!-- general form elements disabled -->
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-info">
        <form role="form" action="save_usulan_rk" method="post">
          <div class="card-header">
            <h3 class="card-title">Form Edit Usulan RK</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                  <label>Pilih Perangkat Daerah : </label>
                  <select class="form-control select3" style="width: 100%;" id="selectopd" name="selectopd" required>
                    <option disabled="disabled">Pilih Komponen Barang</option>
                    <?php foreach ($get_opd->result() as $opd) { ?>
                      <option value="<?php echo $opd->kode_binprog?>"><font size="10 "><?php echo $opd->skpd?></font>
                      </option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label>Pilih Komponen : </label>
                  <select class="form-control select2" style="width: 100%;" id="selectkomp" name="selectkomp" required>
                    <option disabled="disabled">Pilih Komponen Barang</option>
                    <?php foreach ($get_komponen->result() as $kompdata) { ?>
                      <option value="<?php echo $kompdata->id?>"><font size="10 "><?php echo $kompdata->kode_komponen?> - <?php echo $kompdata->nama_komponen?> - <?php echo $kompdata->spek1?> - <?php echo $kompdata->spek2?> - <?php echo $kompdata->merek?> -<?php echo "Rp.".number_format($kompdata->nilai,2,',','.');?></font>
                      </option>
                    <?php } ?>
                  </select>
                </div>
              </div>  
              <!-- /.col -->
                <!-- /.form-group -->
                <div class="col-md-4">
                  <div class="form-group">
                      <label>Kebutuhan Ideal : </label>
                      <input type="number" class="form-control" min="0" id="ideal" name="ideal" onInput="hitung()" placeholder="Banyaknya..." required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <label>Eksisting : </label>
                      <input type="number" class="form-control" min="0" id="eksis" name="eksis" onInput="hitung()" placeholder="Banyaknya..." required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <label>Kebutuhan Real : </label>
                      <input type="number" class="form-control" id="hasil" placeholder="0" disabled>
                      <input type="hidden" id="gethasil" name="gethasil">
                  </div>
                </div>
                <!-- /.form-group -->
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Keterangan : </label>
                    <div class="card-body pad">
                      <div class="mb-4">
                        <textarea class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #fffff; padding: 10px;" name="keterangan">
                        </textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-block btn-info">Simpan Data</button>
          </div>
        </form>
        </div>
        <!-- /.card -->
            <!-- /.card -->
        <!-- /.row -->
        <!-- Main row -->
      </div>
    </section>
    <!-- /.content -->
  </div>

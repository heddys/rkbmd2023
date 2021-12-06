
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- Untuk Pemberitahuan -->
        <!-- general form elements disabled -->
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-info">
        <form role="form" action="<?php echo site_url();?>/home_survey/update_rk" method="post">
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
                    <option value="<?php echo $ambil_rk->id?>"><?php echo $ambil_rk->opd?></option>
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
                  <option value="<?php echo $ambil_rk->id?>"><?php echo $ambil_rk->nama_komp?></option>
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
                      <input type="number" class="form-control" min="0" id="ideal" onInput="hitung()" value="<?php echo $ambil_rk->ideal?>" required>
                      <input type="hidden" id="getideal" name="ideal" value="<?php echo $ambil_rk->ideal?>">
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <label>Eksisting : </label>
                      <input type="number" class="form-control" min="0" id="eksis" onInput="hitung()" value="<?php echo $ambil_rk->exist?>" required>
                      <input type="hidden" id="geteksis" name="eksis" value="<?php echo $ambil_rk->exist?>">
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <label>Kebutuhan Real : </label>
                      <input type="number" class="form-control" id="hasil" value="<?php echo $ambil_rk->keb_real?>" disabled>
                      <input type="hidden" id="gethasil" name="gethasil" value="<?php echo $ambil_rk->keb_real?>">
                  </div>
                </div>
                <!-- /.form-group -->
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Keterangan : </label>
                    <div class="card-body pad">
                      <div class="mb-4">
                        <textarea class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #fffff; padding: 10px;" name="keterangan"><?php echo $ambil_rk->ket?>
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
          <input type="hidden" name="id" value="<?php echo $ambil_rk->id?>">
            <button type="submit" class="btn btn-block btn-info" id="coba_button">Simpan Data</button>
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

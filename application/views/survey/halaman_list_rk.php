
<!-- Main content -->
      <section class="content">
         <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Table With Full Features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="overflow-x:auto;">
              <table id="tabel_usulan" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align: center; ">No.</th>
                  <th style="text-align: center; ">OPD</th>
                  <th style="text-align: center; ">Komponen</th>
                  <th style="text-align: center; ">Ideal</th>
                  <th style="text-align: center; ">Eksisting</th>
                  <th style="text-align: center; ">Real</th>
                  <th style="text-align: center; ">Keterangan</th>
                  <th style="text-align: center; ">Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach ($data_usulan->result() as $usulan) { ?>
                <tr>
                  <td style="text-align: center; vertical-align: middle;">
                    <?php echo $no?>
                  </td>
                  <td style="text-align: left; vertical-align: middle;">
                    <?php echo $usulan->opd?>
                  </td>
                  <td style="text-align: left; vertical-align: middle;">
                    <?php echo $usulan->nama_barang?>
                  </td>
                  <td style="text-align: center; vertical-align: middle;">
                    <?php echo $usulan->ideal?>
                  </td>
                  <td style="text-align: center; vertical-align: middle;">
                    <?php echo $usulan->eksis?>
                  </td>
                  <td style="text-align: center; vertical-align: middle;">
                    <?php echo $usulan->real?>
                  </td>
                  <td style="text-align: left; vertical-align: middle;">
                    <?php echo $usulan->ket?>
                  </td>
                  <td style="text-align: center; vertical-align: middle;">
                    <a href="javascript:;" class="btn btn-sm btn-success edit_usulan"><i class="fas fa-search"></i></a>
                  </td>
                </tr>
                <?php $no++;} ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">NAMA OPD</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Pilih Komponen : </label>
                  <select class="form-control select2" style="width: 100%;" id="selectkomp" name="selectkomp" required>
                    <option disabled="disabled">Pilih Komponen Barang</option>
                      <?php foreach ($get_komponen->result() as $kompdata) { ?>
                        <option <?php ?>value="<?php echo $kompdata->id?>"><font size="10 "><?php echo $kompdata->kode_komponen?> - <?php echo $kompdata->nama_komponen?> - <?php echo $kompdata->spek1?> - <?php echo $kompdata->spek2?> - <?php echo $kompdata->merek?> -<?php echo "Rp.".number_format($kompdata->nilai,2,',','.');?></font>
                        </option>
                      <?php } ?>
                    </select>
                </div>
              </div>
              <div class="col-md-10">
                <div class="form-group">
                  <label>Kebutuhan Ideal : </label>
                  <input type="number" class="form-control" min="0" id="ideal" name="ideal" onInput="hitung()" value="10" placeholder="Banyaknya..." required>
                </div>
              </div>
              <div class="col-md-10">
                <div class="form-group">
                  <label>Eksisting : </label>
                  <input type="number" class="form-control" min="0" id="eksis" name="eksis" onInput="hitung()" value="4" placeholder="Banyaknya..." required>
                </div>
              </div>
              <div class="col-md-10">
                <div class="form-group">
                    <label>Kebutuhan Real : </label>
                    <input type="number" class="form-control" id="hasil" placeholder="0" disabled>
                    <input type="hidden" id="gethasil" name="gethasil">
                </div>
              </div>
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
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Update Data</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </div>
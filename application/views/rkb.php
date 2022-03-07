          <section class="content">
            <div class="container-fluid">
            <?php if ($notice == 1) { ?>
              <div class="callout callout-danger">
                <h4>Warning!</h4>
                Maaf! Jumlah Alokasi Barang Setiap Kegiatan Yang Anda Inputkan Melebihi Jumlah Kebutuhan Anda. Silahkan Inputkan Kembali Dengan Benar.
            <?php } elseif ($notice == 2) { ?>
              <div class="callout callout-danger">
                <h4>Warning!</h4>
                Maaf! Jumlah Alokasi Barang Setiap Kegiatan Yang Anda Inputkan Melebihi Jumlah Kebutuhan Yang Sudah Anda Inputkan Pada Kegiatan Sebelumnya. <p>Silahkan Cek Di <a href="<?php echo site_url('/home/tabel_rkb');?>"><font color="red">Tabel Kegiatan</font></a>
            <?php } else { ?>
              <div class="callout callout-info">
                <h4>Notice!</h4>
                Silahkan Entry Rencana Kebutuhan Barang
            <?php } ?>
            </div>
            <!-- general form elements disabled -->
              <div class="card card-info">
                <center>
                  <div class="card-header">
                    <h3 class="card-title">Entry Data Rencana Kebutuhan Barang</h3>
                  </div>
                </center>
                <!-- /.card-header -->
                <div class="card-body">
                  <form role="form" action="showtabelrkb" method="post">
                    <!-- select -->
                    <div class="form-group">
                      <p><label>Pilih Komponen : </label><br>
                      <select class="form-control select col-md-8" id="selectkomponen" name="selectkomponen" onchange="get_option()" required>
                          <option></option>
                          <option disabled="disabled">Pilih Komponen Barang</option>
                          <?php foreach ($get_komponen->result() as $kompdata) { ?>
                              <option <?php if (in_array($kompdata->id, $disabled)) { ?> disabled="disabled" <?php }?>value="<?php echo $kompdata->id?>"><font size="10 "><?php echo $kompdata->kode_komponen?> - <?php echo $kompdata->nama_komponen?> - <?php echo $kompdata->spek1?> - <?php echo $kompdata->spek2?> - <?php echo $kompdata->merek?> -<?php echo "Rp.".number_format($kompdata->nilai,2,',','.');?></font></option>
                          <?php } ?>
                        </select>

                        </div>
                        <!-- text input -->
                        <div class="form-group form_input">
                          <label>Input Jumlah Kebutuhan Ideal : </label>
                          <input type="number" class="form-control col-md-2" min="0" placeholder="Banyaknya" id="var1" onInput="hitung()" name="keb_ideal" required>
                          <label>Input Jumlah Existing : </label>
                          <input type="number" class="form-control col-md-2" min="0" placeholder="Banyaknya" id="var2" onInput="hitung()" name="existing" required>
                          <input type="hidden" name="cek" id="cek">
                          <input type="hidden" name="var1baru" id="var1baru">
                          <input type="hidden" name="var2baru" id="var2baru">
                          <input type="hidden" name="vartotalbaru" id="vartotalbaru">
                        </div>
                        <div class="form-group">
                          <label>Kebutuhan Barang : 
                            <span id="vartotal" class="form-control"></span>
                            <input type="hidden" name="vartotal" id="vartotal2">
                            <input type="hidden" name="kebutuhan" id="gettotal">
                          </label>
                        </div>
                        <hr>
                        <h5><strong> Alokasi Kebutuhan Barang Pada Kegiatan </strong></h5>
                          <div class="form-group custom_form">
                            <p><label>Pilih Kegiatan : </label><br>
                            <select class="form-control col-sm-6 selectkeg" name="selectkegiatan1" required>
                              <option></option>
                              <option disabled="disabled">Pilih Jenis Kegiatan</option> 
                              <?php foreach ($get_kegiatan->result() as $kegdata ) {?>
                                <option value="<?php echo $kegdata->id?>"><?php echo $kegdata->kode_kegiatan?> - <?php echo $kegdata->nama_kegiatan?></option>
                              <?php } ?>
                            </select>
                            <div class="input-group">
                              <input type="number" class="form-control col-md-2" min="1" placeholder="Banyaknya" name="saldokeg1" required>
                                <div class="input-group-append">
                                  <span class="input-group-text" id="satuan"></span>
                                </div>
                            </div>
                            <p>
                            <p>
                            <input type="hidden" id="cektanda">
                            <!-- textarea -->
                              <textarea class="form-control col-sm-6" rows="3" placeholder="Keterangan" name="keterangan1" id="ket"></textarea>
                          </div>
                           <div class="btn-group">
                              <a href="#" class="btn btn-success tambah"><i class="far fa-plus-square"></i></a>
                              <a href="#" class="btn btn-danger hapus"><i class="far fa-minus-square"></i></a>
                           </div>
                           <p>
                        <!-- Select multiple-->
                        <center>
                        <div class="col-md-4">
                          <button type="button" class="btn btn-success btn-block btn-lg" data-toggle="modal" data-target="#modal-sm">Save Data</button>
                        </div>
                      </center>
                      <div class="modal fade" id="modal-sm">
                        <div class="modal-dialog modal-dialog modal-dialog-centered modal-sm">
                          <div class="modal-content">
                            <div class="modal-header">
                              <center><h4 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Notice!!</h4></center>
                          </div>
                          <div class="modal-body">
                            <style type="text/css"> #modal-body</style>
                            <center><strong><p>Apakah Anda Yakin Ingin Menyimpan Data Tersebut ?</p></strong></center>
                          </div>
                          <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                          <button type="submit" class="btn btn-success">Simpan Data</button>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                  </form>
                </div>
                <!-- /.card-body -->
              </div>
            <!-- /.card -->
          </div>
        </div>

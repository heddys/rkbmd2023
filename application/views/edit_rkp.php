            <!-- general form elements disabled -->
          <section class="content">
            <div class="container-fluid">
              <?php if ($varcek == 1) { ?>
              <div class="callout callout-danger">
                <h4>Warning!</h4>
                Maaf! Jumlah Alokasi Barang Setiap Kegiatan Yang Anda Inputkan Melebihi Jumlah Kebutuhan Anda. Silahkan Inputkan Kembali Dengan Benar.
            <?php } else { ?>
              <div class="callout callout-info">
                <h4>Notice!</h4>
                Silahkan Update Rencana Kebutuhan Barang OPD Anda
            <?php } ?>
            </div>
              <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title"><center>Edit Data Rencana Kebutuhan Barang</center></h3>
                  </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <form role="form" action="save_update_rkp" method="post">
                    <!-- select -->
                    <div class="form-group">
                          <center>
                          <h5>
                              <strong><?php echo $perkomp->kode_komponen?> - <?php echo $perkomp->nama_komponen?> - <?php echo $perkomp->spek1?> - <?php echo $perkomp->spek2?> - <?php echo $perkomp->merek?></strong>
                          </h5></center><hr>
                      </div>
                        <!-- text input -->
                        <div class="form-group">
                          <label>Jumlah Kebutuhan Ideal : </label>
                          <input type="number" class="form-control col-md-2" min="0" value="<?php echo $perkomp->saldo_ideal_komponen?>" placeholder="Banyaknya" id="var1" name="keb_ideal" onInput="hitung()" required>
                        </div>
                        <div class="form-group">
                          <label>Jumlah Existing : </label>
                          <input type="number" class="form-control col-md-2" min="0" value="<?php echo $perkomp->saldo_existing_komponen?>" placeholder="Banyaknya" id="var2" name="existing" onInput="hitung()" required>
                        </div>
                        <div class="form-group">
                          <label>Kebutuhan Barang : 
                            <span id="vartotal" class="form-control"><?php echo $perkomp->saldo_komponen?></span>
                            <input type="hidden" name="vartotal" id="vartotal2">
                            <input type="hidden" name="kebutuhan" id="gettotal" value="<?php echo $perkomp->saldo_komponen?>">
                            <input type="hidden" name="id_rkb" value="<?php echo $perkomp->id?>">
                            <input type="hidden" name="id_komp" value="<?php echo $perkomp->id_komponen?>">
                          </label>
                        </div>
                        <div class="form-group">
                          <label>Saldo Barang Pada Kegiatan : </label>
                          <input type="number" class="form-control col-md-2" min="1" value="<?php echo $perkomp->saldo_kegiatan?>" placeholder="Banyaknya" name="salkeg" required>
                        </div>
                        <hr>
                        <div class="card-body col-sm-11">
                        <h4>Alokasi Barang Pada Kegiatan :  </h4>
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                 <th><center>No.</center></th> 
                                 <th><center>Register</center></th>  
                                 <th><center>Kode Kegiatan</center></th>
                                 <th><center>Nama Kegiatan</center></th>
                                 <th><center>Saldo Barang Pada Kegiatan</center></th>
                                 <th><center>Satuan</center></th>
                                 <th><center>Keterangan</center></th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php $x=1; $tot=0;  
                              foreach ($get_komponen as $row) {
                              $tot+=$row->saldo_kegiatan;  
                              if ($row->id==$perkomp->id) { ?><tr class="table-success"> <?php } else { ?><tr> <?php } ?>
                                <th><center><?php echo $x?></center></th>
                                <th><center><?php echo $row->register?></center></th>
                                <th><center><?php echo $row->kode_kegiatan?></center></th>
                                <th><?php echo $row->nama_kegiatan?></th>
                                <th><center><?php echo $row->saldo_kegiatan?></center></th>
                                <th><center><?php echo $row->satuan?></center></th>
                                <th><center><?php echo $row->keterangan?></center></th>
                              </tr>  
                              <?php $x++;} ?>
                              <tr>
                                <th colspan="4"><center>TOTAL</center></th>
                                <th><center><?php echo $tot;?></center></th>
                                <th colspan="2"><input type="hidden" name="tot_komp" value="<?php echo $tot?>"></center></th>
                              </tr>
                            </tbody>
                          </table>
                          </div>  
                        <hr>
                        <label>Keterangan : </label>
                        <textarea class="form-control col-sm-6" rows="3" placeholder="Keterangan" name="keterangan"><?php echo $perkomp->keterangan?></textarea>
                        <!-- Select multiple-->
                        <center>
                        <p>
                        <div class="col-md-3">
                          <button type="button" class="btn btn-success btn-block btn-lg" data-toggle="modal" data-target="#modal-sm">Update Komponen</button>
                        </div>
                      </center>
                      <a href="<?php echo site_url('/home/tabel_rkp');?>" class="btn btn-danger btn-flat">Kembali</a>
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


          <section class="content">
            <div class="container-fluid">
            <?php if ($notice == 1) { ?>
              <div class="callout callout-danger">
                <h4>Warning!</h4>
                Maaf! Jumlah Alokasi Barang Setiap Kegiatan / Register Yang Anda Inputkan Melebihi Jumlah Kebutuhan Anda. Silahkan Inputkan Kembali Dengan Benar.
            <?php } elseif ($notice == 2) { ?>
              <div class="callout callout-danger">
                <h4>Warning!</h4>
                Maaf! Jumlah Alokasi Barang Setiap Kegiatan Yang Anda Inputkan Melebihi Jumlah Kebutuhan Yang Sudah Anda Inputkan Pada Kegiatan Sebelumnya. <p>Silahkan Cek Di <a href="<?php echo site_url('/home/tabel_rkp');?>"><font color="red">Tabel Kegiatan</font></a>
            <?php } else { ?>
              <div class="callout callout-info">
                <h4>Notice!</h4>
                Silahkan Entry Rencana Persediaan Barang
            <?php } ?>
            </div>
            <!-- general form elements disabled -->
              <div class="card card-success">
                <center>
                  <div class="card-header">
                    <h3 class="card-title">Entry Data Rencana Persediaan Barang</h3>
                  </div>
                </center>
                <!-- /.card-header -->
                <div class="card-body">
                  <form role="form" action="showtabelrkp" method="post">
                    <!-- select -->
                    <div class="form-group">
                      <p><label>Pilih Komponen : </label><br>
                      <select class="form-control select2 col-md-6" id="selectkomponen" name="selectkomponen" onchange="get_option()" required>
                          <option value="null"></option>
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
                          <input type="hidden" id="simpanreg" value="">
                          <input type="hidden" id="kodeopd" value="<?php echo $this->session->userdata('kode_opd');?>">

                        </div>
                        <div class="form-group">
                          <label>Kebutuhan Barang : 
                            <span id="vartotal" class="form-control"></span>
                            <input type="hidden" name="vartotal" id="vartotal2">
                            <input type="hidden" name="kebutuhan" id="gettotal">
                          </label>
                        </div>
                        <hr>
                        <input type="hidden" id="cektanda" name="cektanda">
                        <input type="hidden" id="satuansave">
                        <!--<h5><strong> Alokasi Kebutuhan Barang Pada Kegiatan </strong></h5>
                          <div class="form-group custom_form">
                            <p><label>Pilih Kegiatan : </label><br>
                            <select class="form-control col-sm-6 selopt" name="selectkegiatan1" required>
                              <option></option>
                              <option disabled="disabled">Pilih Jenis Kegiatan</option> 
                              <?php foreach ($get_kegiatan->result() as $kegdata ) {?>
                                <option value="<?php echo $kegdata->id?>"><?php echo $kegdata->kode_kegiatan?> - <?php echo $kegdata->nama_kegiatan?></option>
                              <?php } ?>
                            </select>                 
                             <input type="number" class="form-control col-md-2" min="1" placeholder="Banyaknya" name="saldokeg1" required>
                                <div class="input-group-append">
                                  <span class="input-group-text" id="satuan"></span>
                                </div>
                             <p>
                           <div class="btn-group">
                              <a href="#" class="btn btn-success tambahrkp"><i class="far fa-plus-square"></i></a>
                              <a href="#" class="btn btn-danger hapus"><i class="far fa-minus-square"></i></a>
                           </div> 
                           <p>
                            <p> 
                            <textarea class="form-control col-sm-6" rows="3" placeholder="Keterangan" name="keterangan1" id="ket"></textarea>
                          </div>
                        -->
                        <!-- Select multiple-->
                         
                        <center>
                        <div class="col-md-5">
                          <a href="#" class="btn btn-success next">Lanjutkan</a>
                        </div>
                        </center>
                        
                      <!--<div class="modal fade" id="modal-sm">
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
                    </div>
                  </div>-->

                  <div class="modal fade" id="modal-reg">
                        <div class="modal-dialog modal-dialog modal-dialog-centered modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <center><h4 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Silahkan Isi Data Berikut</h4></center>
                          </div>
                          <div class="modal-body">
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-success">Simpan Data</button>
                          </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog --> 
                  </div>
                </div>
              </form> 

                <div class="modal fade" id="modal-carireg">
                        <div class="modal-dialog modal-dialog modal-dialog-centered modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <center><h4 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Silahkan Isi Data Berikut</h4></center>
                          </div>
                          <style type="text/css"> #modal-body
                          </style>
                           <div class="modal-body">
                           <div class="card-body" style="overflow-x:auto;">
                            <p><label>Pilih Kode Barang : </label><br>
                              <div class="form-group">
                              <select class="form-control select3" id="select_kodebar" onchange="get_tabel()" required>
                                <option></option>
                                <option disabled="disabled">Pilih Jenis Kegiatan</option>
                                <?php foreach ($get_kodebar->result() as $kode ) {?>
                                  <option value="<?php echo $kode->kode_sub_sub_kelompok?>"><?php echo $kode->sub_kelompok?> - <?php echo $kode->sub_sub_kelompok?></option>
                                <?php } ?>
                              </select><p>
                              </div>
                              <hr>
                              <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                  <th><center>Register</center></th>
                                  <th><center>Nama Barang</center></th>
                                  <th><center>Merek</center></th>
                                  <th><center>Tipe</center></th>
                                  <th><center>No. Polisi</center></th>
                                  <th><center>Aksi</center></th>
                                </tr>
                                </thead>
                               <tbody id="tampil_tabel">
                              </tbody>
                              </table>
                           </div>
                           </div>
                          
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger back" data-dismiss="modal">Exit</button>
                          </div>
                          </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->

                  </div>
                </div> 
                </section>
                </div>
                <!-- /.card-body -->
              </div>
            </div>
            <!-- /.card -->

          </div>
        </div>

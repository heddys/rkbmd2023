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
                              <option <?php if (in_array($kompdata->id, $disabled)) { ?> disabled="disabled" <?php }?>value="<?php echo $kompdata->id?>"><font size="10 "><?php echo $kompdata->komponen_id?> - <?php echo $kompdata->nama_komponen?> - <?php echo "Rp.".number_format($kompdata->harga_komponen,2,',','.');?></font></option>
                          <?php } ?>
                        </select>
                        <label for="id_label_single">
                            Click this to focus the single select element
                            <select class="js-example-basic-single js-states form-control select2-hidden-accessible" id="id_label_single" data-select2-id="select2-data-id_label_single" tabindex="-1" aria-hidden="true">
                                <optgroup label="Alaskan/Hawaiian Time Zone" data-select2-id="select2-data-18-kuqu">
                                  <option value="AK" data-select2-id="select2-data-17-rii0">Alaska</option>
                                  <option value="HI" data-select2-id="select2-data-19-81es">Hawaii</option>
                                </optgroup>
                                <optgroup label="Pacific Time Zone" data-select2-id="select2-data-20-56k4">
                                  <option value="CA" data-select2-id="select2-data-21-fvoo">California</option>
                                  <option value="NV" data-select2-id="select2-data-22-6ddw">Nevada</option>
                                  <option value="OR" data-select2-id="select2-data-23-rzae">Oregon</option>
                                  <option value="WA" data-select2-id="select2-data-24-4ic6">Washington</option>
                                </optgroup>
                                <optgroup label="Mountain Time Zone" data-select2-id="select2-data-25-i36n">
                                  <option value="AZ" data-select2-id="select2-data-26-ay6y">Arizona</option>
                                  <option value="CO" data-select2-id="select2-data-27-nzxj">Colorado</option>
                                  <option value="ID" data-select2-id="select2-data-28-gthy">Idaho</option>
                                  <option value="MT" data-select2-id="select2-data-29-j3z2">Montana</option>
                                  <option value="NE" data-select2-id="select2-data-30-1q5q">Nebraska</option>
                                  <option value="NM" data-select2-id="select2-data-31-mz87">New Mexico</option>
                                  <option value="ND" data-select2-id="select2-data-32-i9ad">North Dakota</option>
                                  <option value="UT" data-select2-id="select2-data-33-13l3">Utah</option>
                                  <option value="WY" data-select2-id="select2-data-34-v462">Wyoming</option>
                                </optgroup>
                                <optgroup label="Central Time Zone" data-select2-id="select2-data-35-krsu">
                                  <option value="AL" data-select2-id="select2-data-36-n6hr">Alabama</option>
                                  <option value="AR" data-select2-id="select2-data-37-drsa">Arkansas</option>
                                  <option value="IL" data-select2-id="select2-data-38-item">Illinois</option>
                                  <option value="IA" data-select2-id="select2-data-39-3w1q">Iowa</option>
                                  <option value="KS" data-select2-id="select2-data-40-n25s">Kansas</option>
                                  <option value="KY" data-select2-id="select2-data-41-08tx">Kentucky</option>
                                  <option value="LA" data-select2-id="select2-data-42-okv2">Louisiana</option>
                                  <option value="MN" data-select2-id="select2-data-43-2gs7">Minnesota</option>
                                  <option value="MS" data-select2-id="select2-data-44-43jb">Mississippi</option>
                                  <option value="MO" data-select2-id="select2-data-45-256l">Missouri</option>
                                  <option value="OK" data-select2-id="select2-data-46-a2v9">Oklahoma</option>
                                  <option value="SD" data-select2-id="select2-data-47-6m9s">South Dakota</option>
                                  <option value="TX" data-select2-id="select2-data-48-p5em">Texas</option>
                                  <option value="TN" data-select2-id="select2-data-49-piwk">Tennessee</option>
                                  <option value="WI" data-select2-id="select2-data-50-3ktw">Wisconsin</option>
                                </optgroup>
                                <optgroup label="Eastern Time Zone" data-select2-id="select2-data-51-jvil">
                                  <option value="CT" data-select2-id="select2-data-52-0pvw">Connecticut</option>
                                  <option value="DE" data-select2-id="select2-data-53-416i">Delaware</option>
                                  <option value="FL" data-select2-id="select2-data-54-gf3e">Florida</option>
                                  <option value="GA" data-select2-id="select2-data-55-f8cn">Georgia</option>
                                  <option value="IN" data-select2-id="select2-data-56-mvs0">Indiana</option>
                                  <option value="ME" data-select2-id="select2-data-57-qh1j">Maine</option>
                                  <option value="MD" data-select2-id="select2-data-58-wmnx">Maryland</option>
                                  <option value="MA" data-select2-id="select2-data-59-7plh">Massachusetts</option>
                                  <option value="MI" data-select2-id="select2-data-60-hgfv">Michigan</option>
                                  <option value="NH" data-select2-id="select2-data-61-jif5">New Hampshire</option>
                                  <option value="NJ" data-select2-id="select2-data-62-x8s6">New Jersey</option>
                                  <option value="NY" data-select2-id="select2-data-63-vano">New York</option>
                                  <option value="NC" data-select2-id="select2-data-64-gbpv">North Carolina</option>
                                  <option value="OH" data-select2-id="select2-data-65-y86c">Ohio</option>
                                  <option value="PA" data-select2-id="select2-data-66-srha">Pennsylvania</option>
                                  <option value="RI" data-select2-id="select2-data-67-fxon">Rhode Island</option>
                                  <option value="SC" data-select2-id="select2-data-68-l401">South Carolina</option>
                                  <option value="VT" data-select2-id="select2-data-69-zpjo">Vermont</option>
                                  <option value="VA" data-select2-id="select2-data-70-psht">Virginia</option>
                                  <option value="WV" data-select2-id="select2-data-71-qukj">West Virginia</option>
                                </optgroup>
                      </select>
                  
                          </label>
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
                            <select class="form-control col-sm-6 select" name="selectkegiatan1" required>
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

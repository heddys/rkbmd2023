<section class="content">
            <!-- <div class="container-fluid">
            
                -----
            </div> -->
            <!-- general form elements disabled -->
            <div class="card-body">
                <?php if ($status==1) { ?>
                <div class="alert alert-warning alert-dismissible">
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Informasi</h5>
                  <u><b>REGISTER INI MASIH DALAM PROSES VERIFIKASI OLEH PEJABAT PENATAUSAHAAN ASET</b></u>
                </div>
                <?php } elseif($status==3) {?>
                <div class="alert alert-danger alert-dismissible">
                  <h5><i class="icon fas fa-ban"></i> Informasi!</h5>
                  <b><u>REGISTER INI TELAH DI TOLAK OLEH PEJABAT PENATAUSAHAAN ASET</u></b>
                </div>
                <?php } else { ?>
                <div class="alert alert-success alert-dismissible">
                  <h5><i class="icon fas fa-check"></i> Informasi!</h5>
                  <b><u>REGISTER TELAH DI VERIFIKASI DAN DI SETUJUI</u></b>
                </div>
                <?php } ?>
            </div>
            <div class="card card-dark">
                <center>
                  <div class="card-header">
                    <h3 class="card-title">Hasil Pengisian Form Data Register - <?php echo $data_register->lokasi?></h3>
                  </div>
                </center>
                <!-- /.card-header -->
                <div class="card-body">
                        <!-- select -->
                        <h4><?php echo $data_register->register." - ".$data_register->nama_barang;?></h4>
                        <hr style="padding: 2px">
                        <center>
                        <div class="row">
                            <!-- Mulai Form -->
                            <div class="form-group col-md-5">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Kode Register :</label>
                                        </div>
                                            <input type="text" class="form-control" name="register" id="kode_register" readonly="true" value="<?php echo $data_register->register;?>">
                                        </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary1" name="radio_kode_reg" value="0" checked="checked" />
                                        <label for="primary1">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary2" name="radio_kode_reg" disabled="disabled" value="1" readonly="true"/>
                                        <label for="primary2">Tidak Sesuai</label>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>

                            <!-- Batas Per Form -->

                            <div class="form-group col-md-5">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Kode Barang :</label>
                                        </div>
                                        <input type="text" class="form-control" name="kode_barang" id="kode_barang" readonly="true" value="<?php echo $data_register->kode_barang;?>">
                                    </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary3" name="radio_kode_bar" value="0" <?php 
                                                if ($data_is_register->is_kode_barang == 0) { echo "checked='checked'";} else {echo "disabled='disabled'";}
                                            ?>
                                        />
                                        <label for="primary3">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary4" name="radio_kode_bar" <?php 
                                                if ($data_is_register->is_kode_barang == 1) { echo "checked='checked'";} else {echo "disabled='disabled'";}
                                            ?>
                                            value="1"/>
                                        <label for="primary4">Tidak Sesuai</label>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>

                            <!-- Mulai Form -->
                            <div class="form-group col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Nama Barang :</label>
                                        </div>
                                            <input type="text" class="form-control" name="nama_barang" id="input_nama_barang" readonly="true" value="<?php echo $data_register->nama_barang;?>">
                                    </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-2">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary5" name="radio_nama_bar" value="0" <?php 
                                                if ($data_is_register->is_nama_barang == 0) { echo "checked='checked'";} else {echo "disabled='disabled'";}
                                            ?>/>
                                        <label for="primary5">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary6" name="radio_nama_bar" <?php 
                                                if ($data_is_register->is_nama_barang == 1) { echo "checked='checked'";} else {echo "disabled='disabled'";}
                                            ?> value="1"/>
                                        <label for="primary6">Tidak Sesuai</label>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>

                            <!-- Batas Per Form -->

                            <!-- Mulai Form -->
                            <div class="form-group col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Lokasi : </label>
                                        </div>
                                            <input type="text" class="form-control" name="alamat" disabled="disabled" value="<?php echo $data_register->nomor_lokasi." - ".$data_register->lokasi;?>" >
                                    </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-2">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary7" name="radio_spek_nama" value="spek0"  <?php 
                                                if ($data_is_register->is_lokasi == 0) { echo "checked='checked'";} else {echo "disabled='disabled'";}
                                            ?> />
                                        <label for="primary7">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary8" name="radio_spek_nama" value="spek1" <?php 
                                                if ($data_is_register->is_lokasi == 1) { echo "checked='checked'";} else {echo "disabled='disabled'";}
                                            ?>/>
                                        <label for="primary8">Tidak Sesuai</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Batas Per Form -->

                                                       <!-- Mulai Form -->
                            <div class="form-group col-md-5">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Jumlah Barang : </label>
                                        </div>
                                            <input type="text" class="form-control" id="kode_register" readonly="true" placeholder="1">
                                    </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary9" name="radio_jumlah_bar" checked="checked" value="0" />
                                        <label for="primary9">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary10" name="radio_jumlah_bar" readonly="true" disabled="disabled" value="1"/>
                                        <label for="primary10">Tidak Sesuai</label>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>

                            <!-- Batas Per Form -->


                            <!-- Mulai Form -->
                            <div class="form-group col-md-5">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Satuan  :</label>
                                        </div>
                                            <input type="text" class="form-control" name="satuan" id="satuan_barang" readonly="true" value="<?php echo $data_register->satuan;?>">
                                    </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary11" name="radio_satuan" <?php 
                                                if ($data_is_register->is_satuan == 0) { echo "checked='checked'";} else {echo "disabled='disabled'";}
                                            ?> value="0" />
                                        <label for="primary11">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary12" name="radio_satuan" <?php 
                                                if ($data_is_register->is_satuan == 1) { echo "checked='checked'";} else {echo "disabled='disabled'";}
                                            ?>  value="1"/>
                                        <label for="primary12">Tidak Sesuai</label>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>

                            <!-- Batas Per Form -->


                            <!-- Mulai Form -->
                            <div class="form-group col-md-5 ">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Keberadaan Barang : </label>
                                    </div>
                                    <input type="text" class="form-control" name="keberadaan" id="keberadaan_bar" readonly="true" placeholder="Ada" value="<?php echo $data_register->keberadaan_barang?>">
                                </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary13" name="radio_keberadaan" <?php 
                                                if ($data_is_register->is_keberadaan_barang == 0) { echo "checked='checked'";} else {echo "disabled='disabled'";}
                                            ?> value="0" />
                                        <label for="primary13">Ada</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary14" name="radio_keberadaan" <?php 
                                                if ($data_is_register->is_keberadaan_barang == 1) { echo "checked='checked'";} else {echo "disabled='disabled'";}
                                            ?> value="1"/>
                                        <label for="primary14">Tidak Ada</label>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>

                            <!-- Batas Per Form -->


                            <!-- Mulai Form -->
                            <div class="form-group col-md-5">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text">Nilai Perolehan (Rp.)</label>
                                    </div>
                                    <input type="text" class="form-control" name="nilai" id="nilai_perolehan" readonly="true" value="<?php echo number_format($data_register->nilai_perolehan,2,',','.');?>">
                                </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary15" name="radio_nilai" <?php 
                                                if ($data_is_register->is_nilai_perolehan == 0) { echo "checked='checked'";} else {echo "disabled='disabled'";}
                                            ?> value="0" />
                                        <label for="primary15">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary16" name="radio_nilai" <?php 
                                                if ($data_is_register->is_nilai_perolehan == 1) { echo "checked='checked'";} else {echo "disabled='disabled'";}
                                            ?> value="1"/>
                                        <label for="primary16">Tidak Sesuai</label>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>

                            <!-- Batas Per Form -->


                            <!-- Mulai Form -->
                            <div class="form-group col-md-5">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text">Apakah Aset Atribusi / Kapitalisasi</label>
                                    </div>
                                    <input type="text" class="form-control" name="aset_atrib" id="kode_register" readonly="true" placeholder="-" value="<?php echo $data_register->merupakan_anak?>">
                                    
                                </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary17" name="radio_kap_atrib" <?php 
                                                if ($data_is_register->is_aset_atrib == 0) { echo "checked='checked'";} else {echo "disabled='disabled'";}
                                            ?> value="0" />
                                        <label for="primary17">Bukan</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary18" name="radio_kap_atrib" <?php 
                                                if ($data_is_register->is_aset_atrib == 1) { echo "checked='checked'";} else {echo "disabled='disabled'";}
                                            ?> value="1"/>
                                        <label for="primary18">Ya.</label>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>

                            <!-- Batas Per Form -->


                            <!-- Mulai Form -->
                            <div class="form-group col-md-5">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Merk : </label>
                                        </div>
                                            <input type="text" class="form-control" name="merk" id="merk_barang" readonly="true" value="<?php echo $data_register->spesifikasi_barang_merk;?>">
                                    </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary19" name="radio_merk" <?php 
                                                if ($data_is_register->is_spesifikasi_barang_merk == 0) { echo "checked='checked'";} else {echo "disabled='disabled'";}
                                            ?> value="0" />
                                        <label for="primary19">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary20" name="radio_merk" <?php 
                                                if ($data_is_register->is_spesifikasi_barang_merk == 1) { echo "checked='checked'";} else {echo "disabled='disabled'";}
                                            ?>value="1"/>
                                        <label for="primary20">Tidak Sesuai</label>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>

                            <!-- Batas Per Form -->


                            <!-- Mulai Form -->
                            <div class="form-group col-md-5">
                                <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Kondisi Barang : </label>
                                        </div>
                                            <input type="text" class="form-control" name="kondisi_bar" id="kondisi_barang" readonly="true" value="<?php echo $data_register->kondisi_barang?>">
                                </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary21" name="radio_kondisi" <?php 
                                                if ($data_is_register->is_kondisi_barang == 0) { echo "checked='checked'";} else {echo "disabled='disabled'";}
                                            ?>value="0" />
                                        <label for="primary21">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary22" name="radio_kondisi" <?php 
                                                if ($data_is_register->is_kondisi_barang == 1) { echo "checked='checked'";} else {echo "disabled='disabled'";}
                                            ?> value="1"/>
                                        <label for="primary22">Tidak Sesuai</label>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>

                            <!-- Batas Per Form -->


                            <!-- Mulai Form -->
                            <div class="form-group col-md-5">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Tipe :</label>
                                        </div>
                                            <input type="text" class="form-control" name="tipe_barang" id="tipe_barang" readonly="true" value="<?php echo $data_register->tipe;?>">
                                    </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary23" name="radio_tipe" <?php 
                                                if ($data_is_register->is_tipe == 0) { echo "checked='checked'";} else {echo "disabled='disabled'";}
                                            ?> value="0" />
                                        <label for="primary23">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary24" name="radio_tipe" <?php 
                                                if ($data_is_register->is_tipe == 1) { echo "checked='checked'";} else {echo "disabled='disabled'";}
                                            ?>value="1"/>
                                        <label for="primary24">Tidak Sesuai</label>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>

                            <!-- Batas Per Form -->


                            <!-- Mulai Form -->
                            <div class="form-group col-md-5">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Nomor Polisi :</label>
                                        </div>
                                            <input type="text" class="form-control" name="nopol" id="nopol" style="text-transform:uppercase" readonly="true" value="<?php echo $data_register->nopol;?>">
                                    </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary25" name="radio_nopol" <?php 
                                                if ($data_is_register->is_nopol == 0) { echo "checked='checked'";} else {echo "disabled='disabled'";}
                                            ?> value="0" />
                                        <label for="primary25">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary26" name="radio_nopol" <?php 
                                                if ($data_is_register->is_nopol == 1) { echo "checked='checked'";} else {echo "disabled='disabled'";}
                                            ?> value="1"/>
                                        <label for="primary26">Tidak Sesuai</label>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>

                            <!-- Batas Per Form -->


                            <!-- Mulai Form -->
                            <div class="form-group col-md-5">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Nomor Rangka Seri :</label>
                                        </div>
                                            <input type="text" class="form-control" name="noka" id="noka" style="text-transform:uppercase" readonly="true" value="<?php echo $data_register->no_rangka_seri;?>">
                                    </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary27" name="radio_no_rangka" <?php 
                                                if ($data_is_register->is_no_rangka == 0) { echo "checked='checked'";} else {echo "disabled='disabled'";}
                                            ?> value="0" />
                                        <label for="primary27">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary28" name="radio_no_rangka" <?php 
                                                if ($data_is_register->is_no_rangka == 1) { echo "checked='checked'";} else {echo "disabled='disabled'";}
                                            ?> value="1"/>
                                        <label for="primary28">Tidak Sesuai</label>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>

                            <!-- Batas Per Form -->


                            <!-- Mulai Form -->
                            <div class="form-group col-md-5">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Nomor Mesin :</label>
                                        </div>
                                            <input type="text" class="form-control" name="no_mesin" id="no_mesin" style="text-transform:uppercase" readonly="true" value="<?php echo $data_register->no_mesin;?>">
                                    </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary29" name="radio_mesin" <?php 
                                                if ($data_is_register->is_no_mesin == 0) { echo "checked='checked'";} else {echo "disabled='disabled'";}
                                            ?> value="0" />
                                        <label for="primary29">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary30" name="radio_mesin" <?php 
                                                if ($data_is_register->is_no_mesin == 1) { echo "checked='checked'";} else {echo "disabled='disabled'";}
                                            ?> value="1"/>
                                        <label for="primary30">Tidak Sesuai</label>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>

                            <!-- Batas Per Form -->

                            <!-- Mulai Form -->
                            <div class="form-group col-md-5">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Nomor BPKB :</label>
                                        </div>
                                            <input type="text" class="form-control" style="text-transform:uppercase" name="no_bpkb" id="no_bpkb" readonly="true" value="<?php echo $data_register->no_bpkb?>">
                                    </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary31" name="radio_bpkb" <?php 
                                                if ($data_is_register->is_no_bpkb == 0) { echo "checked='checked'";} else {echo "disabled='disabled'";}
                                            ?>value="0" />
                                        <label for="primary31">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary32" name="radio_bpkb" <?php 
                                                if ($data_is_register->is_no_bpkb == 1) { echo "checked='checked'";} else {echo "disabled='disabled'";}
                                            ?>value="1"/>
                                        <label for="primary32">Tidak Sesuai</label>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>

                            <!-- Batas Per Form -->

                            <!-- Mulai Form -->
                            <div class="form-group col-md-5 ">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Penggunaan Barang : </label>
                                    </div>
                                    <input type="text" class="form-control" name="penggunaan" id="penggunaan" readonly="true" value="<?php echo $data_register->penggunaan_barang;?>">
                                </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary33" name="radio_pengguna" <?php 
                                                if ($data_is_register->is_penggunaan_barang == 0) { echo "checked='checked'";} else {echo "disabled='disabled'";}
                                            ?>value="0" />
                                        <label for="primary33">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary34" name="radio_pengguna" <?php 
                                                if ($data_is_register->is_penggunaan_barang == 1) { echo "checked='checked'";} else {echo "disabled='disabled'";}
                                            ?>value="1"/>
                                        <label for="primary34">Tidak Sesuai</label>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>

                            <!-- Batas Per Form -->

                            <!-- Mulai Form -->
                            <div class="form-group col-md-5">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Data Tercatat Ganda :</label>
                                        </div>
                                            <input type="text" class="form-control" name="catat_ganda" id="catat_ganda" readonly="true" placeholder="-" value="<?php echo $data_register->register_ganda?>">
                                    </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary35" name="radio_ganda" <?php 
                                                if ($data_is_register->is_catat_ganda == 0) { echo "checked='checked'";} else {echo "disabled='disabled'";}
                                            ?>value="0" />
                                        <label for="primary35">Tidak</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary36" name="radio_ganda" <?php 
                                                if ($data_is_register->is_catat_ganda == 1) { echo "checked='checked'";} else {echo "disabled='disabled'";}
                                            ?> value="1"/>
                                        <label for="primary36">Ya.</label>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>

                            <div class="form-group col-md-8">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Titik Koordinat :</label>
                                        </div>
                                            <input type="text" class="form-control" id="koordinat" name="koordinat" value="<?php echo $data_register->koordinat?>" readonly="true">
                                    </div>
                            </div>
                            <div class="form-group col-md-8">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Lainnya</label>
                                        </div>
                                            <input type="text" class="form-control" name="lainnya" id="kode_register" value="<?php echo $data_register->lainnya?>" readonly="true">
                                    </div>
                            </div>
                            <div class="form-group col-md-8">
                                    <div class="mb-3">
                                        <label><h5><b>Keterangan</b></h5></label>
                                        <textarea class="form-control" name="keterangan" rows="3" readonly="true"><?php echo $data_register->keterangan?></textarea>
                                    </div>
                            </div>

                            <div class="form-group col-md-8 gambar">
                                <div class="mb-3">
                                <label><h5><b>Foto atau Denah Aset</b></h5></label>
                                    <div class="mb-3">
                                        <?php foreach ($image as $i) {?>
                                            <img style="Padding-top: 5px;" src="<?php echo base_url();?>/ini_assets/upload/<?php echo $i->file_upload?>" alt="checkbox" width="20%">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Batas Per Form -->
                        </div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-4">
                                    <a href="javascript:history.back()" class="btn btn-danger btn-block btn-lg">Kembali</a>
                                </div>
                                <div class="col-4">
                                    <?php if ($status == 2) {?>
                                    <form action="cetak_form" method="post" target="_blank">
                                        <button type="submit" class="btn btn-info btn-block btn-lg" >Cetak Data</button>
                                          <input type="hidden" name="no_lokasi" value="<?php echo $data_register->nomor_lokasi;?>">
                                          <input type="hidden" name="register" value="<?php echo $data_register->register;?>">  
                                    </form>
                                    <?php } else {?>
                                        <button type="submit" class="btn btn-info btn-block btn-lg" disabled>Cetak Data</button>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </center>
                </div>
            </div>

        </div>

                    

                    

        

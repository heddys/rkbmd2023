
<section class="content">
            <!-- <div class="container-fluid">
                -----
            </div> -->
            <!-- general form elements disabled -->
              <div class="card card-dark">
                <center>
                  <div class="card-header">
                    <h3 class="card-title">Verifikasi Data Register</h3>
                  </div>
                </center>
                <!-- /.card-header -->
                <div class="card-body">
                    <?php $left_108 = substr($data_register->kode108_baru,0,11);?>
                    <form role="form" action="save_isi_form_jij" method="post" enctype="multipart/form-data">
                        <!-- select -->

                        <h4><?php echo $data_register->register." - ".$data_register->nama_barang_baru;?></h4>
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
                                            <input type="hidden" class="form-control" name="register2" id="kode_register" value="<?php echo $data_register->register;?>">
                                        </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <!-- <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary1" name="radio_kode_reg" value="0" checked="checked" required="required"/>
                                        <label for="primary1">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary2" name="radio_kode_reg" value="1" disabled/>
                                        <label for="primary2">Tidak Sesuai</label>
                                    </div>
                                </div> -->
                            </div>

                            <!-- Batas Per Form -->

                            <div class="form-group col-md-5">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Kode Barang :</label>
                                        </div>
                                        <input type="text" class="form-control" name="kode_barang" id="kode_barang" readonly="true" value="<?php echo $data_register->kode108_baru;?>">
                                        <input type="hidden" name="kode_barang_lama" value="<?php echo $data_register->kode108_baru;?>">
                                    </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary3" name="radio_kode_bar" checked="checked" value="0" required="required"/>
                                        <label for="primary3">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary4" name="radio_kode_bar" value="1"/>
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
                                            <input type="text" class="form-control" name="nama_barang" id="input_nama_barang" readonly="true" value="<?php echo $data_register->nama_barang_baru;?>">
                                    </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-2">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary5" name="radio_nama_bar" checked="checked" value="0" required="required"/>
                                        <label for="primary5">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary6" name="radio_nama_bar" value="1"/>
                                        <label for="primary6">Tidak Sesuai</label>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>

                            <!-- Batas Per Form -->

                            <!-- Mulai Form -->
                            <div class="form-group col-md-5">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Lokasi Pencatatan: </label>
                                        </div>
                                            <input type="text" class="form-control" id="input_alamat" name="lokasi" value="<?php echo $data_register->nomor_lokasi_baru?>" readonly="true" style="width:100px;" placeholder="">
                                            <input type="hidden" name="no_lokasi_awal" value="<?php echo $data_register->nomor_lokasi_baru;?>">
                                            <div class="input-group-append">
                                                <label class="input-group-text" id="label_lokasi"><?php echo $data_register->lokasi?></label>
                                            </div>   
                                    </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary7" name="radio_alamat" checked="checked" value="0" required="required"/>
                                        <label for="primary7">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary8" name="radio_alamat" value="1"/>
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
                                        <input type="radio" id="primary9" name="radio_jumlah_bar" checked="checked" value="0" required="required"/>
                                        <label for="primary9">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary10" name="radio_jumlah_bar" readonly="true" value="1" disabled/>
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
                                        <input type="radio" id="primary11" name="radio_satuan" value="0" checked="checked" required="required"/>
                                        <label for="primary11">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary12" name="radio_satuan" value="1"/>
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
                                    <input type="text" class="form-control" name="keberadaan" id="keberadaan_bar" readonly="true" placeholder="Ada" value="Ada">
                                </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary13" name="radio_keberadaan" value="0" checked="checked" required="required"/>
                                        <label for="primary13">Ada</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary14" name="radio_keberadaan" value="1"/>
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
                                    <input type="text" class="form-control" name="nilai" id="nilai_perolehan" readonly="true" value="<?php echo number_format($data_register->harga_baru,2,',','.');?>">
                                    <input type="hidden" name="tahun_pengadaan" value="<?php echo $data_register->tahun_pengadaan;?>">
                                </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary15" name="radio_nilai" value="0" checked="checked" required="required"/>
                                        <label for="primary15">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary16" name="radio_nilai" value="1" disabled/>
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
                                        <label class="input-group-text">Apakah Aset Yang Akan Di Atribusi / Kapitalisasi</label>
                                    </div>
                                    <input type="text" class="form-control" name="aset_atrib" id="aset_atrib" readonly="true" placeholder="-" value="-">
                                </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary17" name="radio_kap_atrib" value="0" checked="checked" required="required"/>
                                        <label for="primary17">Bukan</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary18" name="radio_kap_atrib" value="1"/>
                                        <label for="primary18">Ya</label>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>

                            <!-- Batas Per Form -->


                            <!-- Mulai Form -->
                            <div class="form-group col-md-5">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Alamat : </label>
                                        </div>
                                            <input type="text" class="form-control" name="merk" id="merk_barang" readonly="true" value="<?php echo  str_replace('"', '', $data_register->merk_alamat_baru);?>">
                                    </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary19" name="radio_merk" value="0" checked="checked" required="required"/>
                                        <label for="primary19">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary20" name="radio_merk" value="1"/>
                                        <label for="primary20">Tidak Sesuai</label>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>

                            <!-- Batas Per Form -->

                            <?php if ($left_108 == '1.3.4.01.01') { ?>
                                <!-- Mulai Form -->
                                <div class="form-group col-md-5 ">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Jenis Perkerasan Jalan : </label>
                                        </div>
                                        <input type="text" class="form-control" name="perkerasan" id="perkerasan" readonly="true">
                                    </div>
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class=" mt-2 mb-6 col-lg-4">
                                    <div class="form-group clearfix">
                                        <div class="radio icheck-primary d-inline">
                                            <input type="radio" id="primaryperkerasan1" name="radio_perkerasan" value="0" required="required" disabled/>
                                            <label for="primaryperkerasan1">Sesuai</label>
                                        </div>
                                        <div class="radio icheck-primary d-inline">
                                            <input type="radio" id="primaryperkerasan2" name="radio_perkerasan" value="1"/>
                                            <label for="primaryperkerasan2">Tidak Sesuai</label>
                                        </div>
                                    </div>
                                    <!-- /input-group -->
                                </div>

                                <!-- Batas Per Form -->
                            <?php } else {?>

                                <!-- Mulai Form -->
                                <div class="form-group col-md-5 ">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Jenis Perkerasan Jalan : </label>
                                        </div>
                                        <input type="text" class="form-control" name="perkerasan" id="perkerasan" value="-" readonly="true">
                                    </div>
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class=" mt-2 mb-6 col-lg-4">
                                    <div class="form-group clearfix">
                                        <div class="radio icheck-primary d-inline">
                                            <input type="radio" id="primaryperkerasan1" name="radio_perkerasan" value="0" required="required" checked="checked" disabled/>
                                            <label for="primaryperkerasan1">Sesuai</label>
                                        </div>
                                        <div class="radio icheck-primary d-inline">
                                            <input type="radio" id="primaryperkerasan2" name="radio_perkerasan" value="1" disabled/>
                                            <label for="primaryperkerasan2">Tidak Sesuai</label>
                                        </div>
                                    </div>
                                    <!-- /input-group -->
                                </div>

                                <!-- Batas Per Form -->
                            <?php } ?>
                            
                            <?php if ($left_108 == '1.3.4.01.02') { ?>
                            <!-- Mulai Form -->
                            <div class="form-group col-md-5 ">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Jenis Bahan Struktur Jembatan : </label>
                                    </div>
                                    <input type="text" class="form-control" name="struktur_jembatan" id="struktur_jembatan" readonly="true">
                                </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="jenis_jembatan1" name="radio_jembatan" value="0" required="required" disabled/>
                                        <label for="jenis_jembatan1">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="jenis_jembatan2" name="radio_jembatan" value="1"/>
                                        <label for="jenis_jembatan2">Tidak Sesuai</label>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>

                            <!-- Batas Per Form -->
                             <?php } else {?>

                            <!-- Mulai Form -->
                            <div class="form-group col-md-5 ">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Jenis Bahan Struktur Jembatan : </label>
                                    </div>
                                    <input type="text" class="form-control" name="struktur_jembatan" id="struktur_jembatan" value="-" readonly="true">
                                </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="jenis_jembatan1" name="radio_jembatan" value="0" checked="checked" required="required" disabled/>
                                        <label for="jenis_jembatan1">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="jenis_jembatan2" name="radio_jembatan" value="1" disabled/>
                                        <label for="jenis_jembatan2">Tidak Sesuai</label>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>

                            <!-- Batas Per Form -->
                             <?php } ?>
                            <!-- Mulai Form -->
                            <?php if ($left_108 == '1.3.4.01.01' || $left_108 == '1.3.4.01.02') { ?>
                            <div class="form-group col-md-6 ">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Nomor / Nama Ruas Jalan : </label>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <input type="text" class="form-control" name="nama_ruas" id="nama_ruas" placeholder="Nama / Nomor Ruas" readonly="true">
                                        </div>
                                        <div class="col-4">
                                            <input type="text" class="form-control" name="ujung_ruas" id="ujung_ruas" placeholder="Nama Ujung Ruas" readonly="true">
                                        </div>
                                        <div class="col-4">
                                            <input type="text" class="form-control" name="pangkal_ruas" id="pangkal_ruas" placeholder="Nama Pangkal Ruas" readonly="true">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-md-2">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="radio_ruas_jalan1" name="radio_ruas_jalan" value="0" required="required" disabled/>
                                        <label for="radio_ruas_jalan1">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="radio_ruas_jalan2" name="radio_ruas_jalan" value="1"/>
                                        <label for="radio_ruas_jalan2">Tidak Sesuai</label>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>

                            <!-- Batas Per Form -->
                             <?php } else { ?>
                                <div class="form-group col-md-6 ">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Nomor / Nama Ruas Jalan : </label>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <input type="text" class="form-control" name="nama_ruas" id="nama_ruas" placeholder="Nama / Nomor Ruas" value="-" readonly="true">
                                        </div>
                                        <div class="col-4">
                                            <input type="text" class="form-control" name="ujung_ruas" id="ujung_ruas" placeholder="Nama Ujung Ruas" value="-" readonly="true">
                                        </div>
                                        <div class="col-4">
                                            <input type="text" class="form-control" name="pangkal_ruas" id="pangkal_ruas" placeholder="Nama Pangkal Ruas" value="-" readonly="true">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-md-2">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="radio_ruas_jalan1" name="radio_ruas_jalan" value="0" checked="checked" required="required" disabled/>
                                        <label for="radio_ruas_jalan1">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="radio_ruas_jalan2" name="radio_ruas_jalan" value="1" disableds/>
                                        <label for="radio_ruas_jalan2">Tidak Sesuai</label>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>

                            <!-- Batas Per Form -->
                             <?php } ?>


                            <!-- Mulai Form -->
                            <div class="form-group col-md-5">
                                <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Kondisi Barang : </label>
                                        </div>
                                            <input type="text" class="form-control" name="kondisi_bar" id="kondisi_barang" readonly="true" value="<?php 
                                                if($data_register->kondisi == "B") {
                                                    echo "Baik";
                                                } elseif ($data_register->kondisi == "KB") {
                                                    echo "Kurang Baik";
                                                    } else { 
                                                        echo "Rusak Berat";
                                                    }
                                            ?>">
                                </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary21" name="radio_kondisi" checked="checked" value="0" required="required"/>
                                        <label for="primary21">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary22" name="radio_kondisi" value="1"/>
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
                                            <input type="text" class="form-control" name="tipe_barang" id="tipe_barang" readonly="true" value="<?php echo $data_register->tipe_baru;?>">
                                    </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary23" name="radio_tipe" value="0" checked="checked" required="required"/>
                                        <label for="primary23">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary24" name="radio_tipe" value="1"/>
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
                                            <label class="input-group-text" id="basic-addon3">Luas Aset JIJ (m2) :</label>
                                        </div>
                                            <input type="text" class="form-control" name="luas_bangunan" id="luas_bangunan" readonly="true" value="<?php echo number_format($data_register->luas_bangunan,2,',','.');?>">
                                    </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary25" name="radio_luas" value="0" checked="checked" required="required"/>
                                        <label for="primary25">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary26" name="radio_luas" value="1"/>
                                        <label for="primary26">Tidak Sesuai</label>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>
                            
                            <?php if ($left_108 == '1.3.4.02.01' || $left_108 == '1.3.4.02.02' || $left_108 == '1.3.4.02.03' || $left_108 == '1.3.4.02.04' || $left_108 == '1.3.4.02.05' || $left_108 == '1.3.4.02.06' || $left_108 == '1.3.4.02.07' ) { ?>
                            <!-- Mulai Form -->
                            <div class="form-group col-md-5">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Nomor Jaringan Irigasi :</label>
                                        </div>
                                            <input type="text" class="form-control" name="nomor_irigasi" id="nomor_irigasi" readonly="true" placeholder="Input Nomor Jaringan Irigasi..">
                                    </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary_nomor_irigasi1" name="radio_nomor_irigasi" value="0" checked="checked" required="required"/>
                                        <label for="primary_nomor_irigasi1">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary_nomor_irigasi2" name="radio_nomor_irigasi" value="1"/>
                                        <label for="primary_nomor_irigasi2">Tidak Sesuai</label>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>

                            <!-- Batas Per Form -->
                             
                            <?php } else { ?>
                            
                            <!-- Mulai Form -->
                            <div class="form-group col-md-5">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Nomor Jaringan Irigasi :</label>
                                        </div>
                                            <input type="text" class="form-control" name="nomor_irigasi" id="nomor_irigasi" value="-" readonly="true" placeholder="Input Nomor Jaringan Irigasi..">
                                    </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary_nomor_irigasi1" name="radio_nomor_irigasi" value="0" checked="checked" required="required" disabled/>
                                        <label for="primary_nomor_irigasi1">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary_nomor_irigasi2" name="radio_nomor_irigasi" value="1" disabled/>
                                        <label for="primary_nomor_irigasi2">Tidak Sesuai</label>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>

                            <!-- Batas Per Form -->
                            <?php } ?>

                            <!-- Mulai Form -->
                            <div class="form-group col-md-5">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Kelurahan, Kecamatan dan Kota :</label>
                                        </div>
                                            <input type="text" class="form-control" name="show_kelurahan" readonly="true" id="show_kelurahan" value="<?php echo "Kel. ".$data_register->kelurahan." - Kec. ".$data_register->kecamatan." - Kota ".$data_register->kota;?>">
                                            <input type="hidden" name="kamus_kelurahan" id="hidden_kelurahan">
                                    </div>
                            </div>
                            <!-- /.col-lg-6 -->

                            <?php if ($data_register->kota == '') {?>

                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary29" name="radio_kelurahan" value="0" disabled/>
                                        <label for="primary29">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary30" name="radio_kelurahan" value="1" required="required"/>
                                        <label for="primary30">Tidak Sesuai</label>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>

                            <?php } else {?>
                                <input type="hidden" name="kelurahan" value="<?php echo $data_register->kelurahan;?>">
                                <input type="hidden" name="kecamatan" value="<?php echo $data_register->kecamatan;?>">
                                <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary29" name="radio_kelurahan" value="0" checked="checked" required="required"/>
                                        <label for="primary29">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary30" name="radio_kelurahan" value="1"/>
                                        <label for="primary30">Tidak Sesuai</label>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>
                            
                            <?php } ?>

                            <!-- Batas Per Form -->

                            <!-- Mulai Form -->
                            <div class="form-group col-md-5 ">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Pengguna Barang : </label>
                                    </div>
                                    <input type="text" class="form-control" name="penggunaan" id="penggunaan" readonly="true" value="Pemerintah Kota">
                                </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary33" name="radio_pengguna" value="0" checked="checked" required="required"/>
                                        <label for="primary33">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary34" name="radio_pengguna" value="1"/>
                                        <label for="primary34">Tidak Sesuai</label>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>

                            <!-- Batas Per Form -->
                            

                            <!-- Mulai Form -->  
                            <div class="form-group col-md-5 mb-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <b>No. Keputusan Penetapan Status Penggunaan :</b>
                                        </span>
                                    </div>
                                        <input type="text" class="form-control" value="<?php echo ($sk_penggunaan == "NULL") ? "Belum Ada SK Penetapan Status Penggunaan" : $sk_penggunaan->nomor;?>" readonly="true">
                                </div>
                            </div>
                            <div class=" mt-0 mb-3 col-lg-1">
                                <button type="button" class="btn btn-success btn-block btn-md" id="show_sk_pengguna" <?php echo ($sk_penggunaan == "NULL") ? "disabled" : ""?>><i class="fas fa-eye"> Lihat Dokumen</i></button>
                                <!-- <a class="btn btn-success btn-block btn-md" href="172.18.1.59/Dokumen/sk_pengguna/sk_asli/<?php echo $sk_penggunaan->file?>" target="_blank" rel="noopener noreferrer" <?php echo ($sk_penggunaan == "NULL") ? "disabled" : ""?>><i class="fas fa-eye">Lihat Dokumen</a> -->
                            </div> 
                            <div class=" mt-0 mb-3 col-lg-3">
                                
                            </div> 
                            <!-- Batas Per Form -->  



                            <!-- Mulai Form -->
                            <div class="form-group col-md-5">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Data Tercatat Ganda :</label>
                                        </div>
                                            <input type="text" class="form-control" name="catat_ganda" id="catat_ganda" readonly="true" placeholder="-" value="-">
                                    </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary35" name="radio_ganda" value="0" checked="checked" required="required"/>
                                        <label for="primary35">Tidak</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary36" name="radio_ganda" value="1"/>
                                        <label for="primary36">Ya</label>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>

                            <!-- Batas Per Form -->

                            <!-- Mulai Form -->

                            <div class="form-group col-md-5">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" id="basic-addon3">Data Register Tanah :</label>
                                    </div>
                                        <input type="text" class="form-control" name="register_tanah" id="register_tanah" readonly="true" placeholder="-" value="<?php echo $data_register->register_tanah?>">
                                        <input type="hidden" name="status_tanah" id="status_tanah" value="Pemerintah Daerah">
                                </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary37" name="radio_reg_tanah" value="0"  required="required" required="required"/>
                                        <label for="primary37">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary38" name="radio_reg_tanah" value="1"/>
                                        <label for="primary38">Tidak</label>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>

                            <!-- Batas Per Form -->

                            <!-- <div class="form-group col-md-8">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Titik Koordinat :</label>
                                        </div>
                                            <input type="text" class="form-control" id="koordinat" name="koordinat" placeholder="Input Titik Koordinat">
                                    </div>
                            </div> -->
                            <div class="form-group col-md-8">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Pemanfaatan Aset : </label>
                                        </div>
                                            <input type="text" class="form-control" name="pemanfaatan" id="kode_register" placeholder="Tulis Penggunaan Aset Saat Ini Digunakan Untuk Apa" value="<?php echo $data_register->penggunaan;?>" required="required">
                                    </div>
                            </div>
                            
                            <div class="form-group col-md-8">
                                    <div class="mb-3">
                                        <label><h5><b>Keterangan</b></h5></label>
                                        <textarea class="form-control" name="keterangan" rows="4" ><?php echo $data_register->keterangan;?></textarea>
                                    </div>
                            </div>

                            <div class="form-group col-md-8 file_upload">
                                <div class="mb-3">
                                <label><h5><b>Upload Foto atau Denah Aset</b></h5></label> (Tipe Gambar : .jpeg |.jpg , Ukuran File Max : 5MB dan Foto Disertai Geotag)
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" multiple="" name="files[]" required="required" accept="image/jpeg,image/jpg,image/png">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                    <p>
                                    <div id="alert">
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                        </center>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-4">
                                    <a href="javascript:history.back()" class="btn btn-danger btn-block btn-lg">Kembali</a>
                                </div>
                                <div class="col-6">
                                    <button type="button" class="btn btn-success btn-block btn-lg" id="save_form" data-toggle="modal" data-target="#modal-sm">Save Data</button>
                                </div>
                            </div>
                        </div>
                        

                        <!-- Modal -->
                        <div class="modal fade" id="modal-sm">
                            <div class="modal-dialog modal-dialog modal-dialog-centered modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <center><h4 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Notice!!</h4></center>
                                    </div>
                                    <div class="modal-body">
                                        <style type="text/css"> </style>
                                        <center><strong><p>Apakah Anda Yakin Ingin Menyimpan Data Tersebut ?</p></strong></center>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                                        <button type="submit" class="btn btn-success">Simpan Data</button>
                                    </div>
                            </div>
                                <!-- modal-content --> 
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

                        <!-- Modal Untuk Pilih Kode Barang -->
                        <div class="modal fade" id="modal-kode-bar">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <center><h4 class="modal-title"><i class="	fas fa-anchor"></i> Sebutkan yang sebenarnya</h4></center>
                                    </div>
                                    <div class="modal-body">
                                        <style type="text/css"> </style>
                                        <div style="overflow-x:auto;">
                                            <table id="tblkodebar" class="table table-striped table-hover responsive">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th><center>No.</center></th>
                                                        <th><center>Kode Kelompok</center></th>
                                                        <th><center>Kelompok</center></th>
                                                        <th><center>Kode Sub Kelompok</center></th>
                                                        <th><center>Sub Kelompok</center></th>
                                                        <th><center>Kode Sub Sub Kelompok</center></th>
                                                        <th><center>Deskripsi Sub Sub Kelompok</center></th>
                                                        <th><center>Aksi</center></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $x=1; foreach ($kode_barang->result() as $row) {?>
                                                    <tr>
                                                        <td><?php echo $x;?></td>
                                                        <td><?php echo $row->kode_kelompok;?></td>
                                                        <td><?php echo $row->kelompok;?></td>
                                                        <td><?php echo $row->kode_sub_kelompok;?></td>
                                                        <td><?php echo $row->sub_kelompok;?></td>
                                                        <td><?php echo $row->kode_sub_sub_kelompok;?></td>
                                                        <td><?php echo $row->sub_sub_kelompok;?></td>
                                                        <td>
                                                            <center>
                                                                <a href="#" class="btn btn-sm btn-success ambil_kode_barang" data-id="<?php echo $row->kode_sub_sub_kelompok;?>" onclick="klik_kode_bar(this.getAttribute('data-id'));" data-dismiss="modal"><i class="fa fa-plus"></i></a>
                                                            </center>
                                                        </td>
                                                    </tr>
                                                    <?php $x++; }?>
                                                </tbody>
                                            </table> 
                                        </div> 
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-danger batal" onclick="klik_kode_bar(false)" data-dismiss="modal">Batal</button>
                                        <!-- <button type="submit" class="btn btn-success simpan" data-dismiss="modal">Simpan Data</button> -->
                                    </div>
                            </div>
                                 <!-- modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->

                        <div class="modal fade" id="modal-spek-barang">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <center><h4 class="modal-title"><i class="	fas fa-anchor"></i> Sebutkan yang sebenarnya</h4></center>
                                    </div>
                                    <div class="modal-body">
                                        <style type="text/css"> </style>
                                        <div style="overflow-x:auto;">
                                            <table id="tblalamatbarang" class="table table-striped table-hover responsive" style="overflow:auto;">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th><center>No.</center></th>
                                                        <th><center>Nomor Unit</center></th>
                                                        <th><center>unit</center></th>
                                                        <th><center>Nomor Sub Unit</center></th>
                                                        <th><center>Sub Unit</center></th>
                                                        <th><center>Nomor Lokasi</center></th>
                                                        <th><center>Lokasi</center></th>
                                                        <th><center>Aksi</center></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $x=1; foreach ($kamus_lokasi->result() as $data_row) {?>
                                                    <tr>
                                                        <td><?php echo $x;?></td>
                                                        <td><?php echo $data_row->nomor_unit;?></td>
                                                        <td><?php echo $data_row->unit;?></td>
                                                        <td><?php echo $data_row->nomor_sub_unit;?></td>
                                                        <td><?php echo $data_row->sub_unit;?></td>
                                                        <td><?php echo $data_row->nomor_lokasi;?></td>
                                                        <td><?php echo $data_row->lokasi;?></td>
                                                        <td>
                                                            <center>
                                                                <a href="#" class="btn btn-sm btn-success ambil_kode_barang" data-id="<?php echo $data_row->nomor_lokasi;?>" data_id2="<?php echo $data_row->lokasi?>" onclick="klik_spek_barang('<?php echo $data_row->nomor_lokasi;?>','<?php echo $data_row->lokasi?>');" data-dismiss="modal"><i class="fa fa-plus"></i></a>
                                                            </center>
                                                        </td>
                                                    </tr>
                                                    <?php $x++; }?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-danger batal" onclick="klik_spek_barang(false)" data-dismiss="modal">Batal</button>
                                        <!-- <button type="submit" class="btn btn-success simpan" data-dismiss="modal">Simpan Data</button> -->
                                    </div>
                            </div>
                                 <!-- modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                        
                        <!-- Modal Untuk Input Nama Barang -->
                        <div class="modal fade" id="modal-nama-barang">
                            <div class="modal-dialog modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <center><h4 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Notice!!</h4></center>
                                    </div>
                                    <div class="modal-body">
                                        <style type="text/css"> </style>
                                        <input type="text" class="form-control" id="nama_barang" placeholder="Peralatan Kantor Serbaguna">
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-danger" onclick="klik_nama_barang(false)" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success" onclick="klik_nama_barang(true)" data-dismiss="modal">Simpan Data</button>
                                    </div>
                            </div>
                                <!-- modal-content --> 
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    <!-- /.modal -->
                    
                    <!-- Modal Untuk Input Nama Spesifikasi Barang -->
                        <!-- <div class="modal fade" id="modal-spek-barang">
                            <div class="modal-dialog modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <center><h4 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Notice!!</h4></center>
                                    </div>
                                    <div class="modal-body">
                                        <style type="text/css"> </style>
                                        <input type="text" class="form-control" id="spek_barang" placeholder="4 Pintu, 250 cc, Memory 500GB">
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-danger" onclick="klik_spek_barang(false)" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success" onclick="klik_spek_barang(true)" data-dismiss="modal">Simpan Data</button>
                                    </div>
                            </div> -->
                                <!-- modal-content --> 
                            <!-- </div> -->
                            <!-- /.modal-dialog -->
                        <!-- </div> -->
                    <!-- /.modal -->

                    <!-- Modal Untuk Input Satuan -->
                    <div class="modal fade" id="modal-satuan-barang">
                            <div class="modal-dialog modal-dialog modal-dialog-centered modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <center><h4 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Notice!!</h4></center>
                                    </div>
                                    <div class="modal-body">
                                        <style type="text/css"> </style>
                                        <select class="custom-select" id="select_satuan">
                                            <option selected disable="disabled">Pilih Satuan</option>
                                            <?php $x=1; foreach ($satuan->result() as $row) {?>
                                                <option value="<?php echo $row->satuan;?>"><?php echo $row->satuan;?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-danger" onclick="klik_satuan_barang(false)" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success" onclick="klik_satuan_barang(true)" data-dismiss="modal">Simpan Data</button>
                                    </div>
                            </div>
                                <!-- modal-content --> 
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    <!-- /.modal -->
                    
                    <!-- Modal Untuk Input Keberadaan Barang -->
                    <div class="modal fade" id="modal-keberadaan">
                            <div class="modal-dialog modal-dialog modal-dialog-centered modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <center><h4 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Pilih Status Keberadaan Barang</h4></center>
                                    </div>
                                    <div class="modal-body">
                                        <style type="text/css"> </style>
                                        <select class="custom-select" id="keberadaan">
                                            <option value="Hilang">Hilang</option>
                                            <option value="Tidak Diketemukan">Tidak Diketemukan</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-danger" onclick="klik_keberadaan(false)" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success" onclick="klik_keberadaan(true)" data-dismiss="modal">Simpan Data</button>
                                    </div>
                                </div>
                                <!-- modal-content --> 
                            </div>
                            <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                    
                    <!-- Modal Untuk Input Nilai Perolehan -->
                    <div class="modal fade" id="modal-nilai">
                            <div class="modal-dialog modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <center><h4 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Notice!!</h4></center>
                                    </div>
                                    <div class="modal-body">
                                        <style type="text/css"> </style>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text">Nilai Perolehan (Rp.)</label>
                                            </div>  
                                            <input type="text" class="form-control" name="input_nilai" id="input_nilai" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="Rp1,000,000">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-danger" onclick="klik_nilai(false)" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success" onclick="klik_nilai(true)" data-dismiss="modal">Simpan Data</button>
                                    </div>
                                </div>
                                <!-- modal-content --> 
                            </div>
                            <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->

                    <!-- Modal Untuk Input Nama Merk Barang -->
                    <div class="modal fade" id="modal-merk-barang">
                            <div class="modal-dialog modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <center><h4 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Notice!!</h4></center>
                                    </div>
                                    <div class="modal-body">
                                        <style type="text/css"> </style>
                                        <input type="text" class="form-control" id="input_merk" placeholder="Diisi Merk Barang....">
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-danger" onclick="klik_merk_barang(false)" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success" onclick="klik_merk_barang(true)" data-dismiss="modal">Simpan Data</button>
                                    </div>
                            </div>
                                <!-- modal-content --> 
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    <!-- /.modal -->

                    <!-- Modal Untuk Input Kondisi Barang -->
                    <div class="modal fade" id="modal-kondisi-barang">
                            <div class="modal-dialog modal-dialog modal-dialog-centered modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <center><h4 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Pilih Kondisi Barang</h4></center>
                                    </div>
                                    <div class="modal-body">
                                        <style type="text/css"> </style>
                                        <select class="custom-select" id="input_kondisi">
                                            <option value="Baik">Baik</option>
                                            <option value="Kurang Baik">Kurang Baik</option>
                                            <option value="Rusak Berat">Rusak Berat</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-danger" onclick="klik_kondisi_barang(false)" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success" onclick="klik_kondisi_barang(true)" data-dismiss="modal">Simpan Data</button>
                                    </div>
                                </div>
                                <!-- modal-content --> 
                            </div>
                            <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->

                    <!-- Modal Untuk Input Tipe Barang -->
                    <div class="modal fade" id="modal-tipe-barang">
                            <div class="modal-dialog modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <center><h4 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Notice!!</h4></center>
                                    </div>
                                    <div class="modal-body">
                                        <style type="text/css"> </style>
                                        <input type="text" class="form-control" id="input_tipe" placeholder="Diisi Tipe Barang....">
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-danger" onclick="klik_tipe_barang(false)" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success" onclick="klik_tipe_barang(true)" data-dismiss="modal">Simpan Data</button>
                                    </div>
                            </div>
                                <!-- modal-content --> 
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    <!-- /.modal -->

                    <!-- Modal Untuk Input Luas -->
                    <div class="modal fade" id="modal-luas-bangunan">
                            <div class="modal-dialog modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <center><h4 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Input Luas : (Gunakan tanda " , " untuk memberi koma pada luas)</h4></center>
                                    </div>
                                    <div class="modal-body">
                                        <style type="text/css"> </style>
                                        <input type="number" class="form-control" id="edit_luas" pattern="(/[^0-9 \,]/, '')" placeholder="Isi Luas Bangunan (m2)">
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-danger" onclick="klik_luas(false)" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success" onclick="klik_luas(true)" data-dismiss="modal">Simpan Data</button>
                                    </div>
                            </div>
                                <!-- modal-content --> 
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    <!-- /.modal -->

                     <!-- Modal Untuk Input No Sertifikat -->
                     <div class="modal fade" id="modal-no-sertif">
                            <div class="modal-dialog modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <center><h4 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Input Nomor Sertifikat</h4></center>
                                    </div>
                                    <div class="modal-body">
                                        <style type="text/css"> </style>
                                        <input type="text" class="form-control" id="input_no_sertif" placeholder="Isi Nomor Sertifikatnya">
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-danger" onclick="klik_nosertif(false)" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success" onclick="klik_nosertif(true)" data-dismiss="modal">Simpan Data</button>
                                    </div>
                            </div>
                                <!-- modal-content --> 
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    <!-- /.modal -->

                    <!-- Modal Untuk Input Lokasi -->
                    <div class="modal fade" id="modal-kelurahan">
                            <div class="modal-dialog modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <center><h4 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Pilih Lokasi Aset :</h4></center>
                                    </div>
                                    <div class="modal-body">
                                    <div class="form-group col-lg-4">
                                        <select class="form-control select_lokasi_edit"  name="lokasi" id="lokasi_select" required style="width: 300%">
                                            <?php foreach ($list_kelurahan->result() as $lok ) {?>
                                                <option value="<?php echo $lok->id;?>"><?php echo "Kel. ".$lok->des_kel." - Kec. ".$lok->kec." - Kota ".$lok->kab_kota;?></option>
                                            <?php } ?> 
                                        </select>
                                    </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-danger" onclick="klik_lokasi(false)" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success" onclick="klik_lokasi(true)" data-dismiss="modal">Simpan Data</button>
                                    </div>
                            </div>
                                <!-- modal-content --> 
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    <!-- /.modal -->

                    <!-- Modal Untuk Input No BPKB -->
                    <div class="modal fade" id="modal-bpkb">
                            <div class="modal-dialog modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <center><h4 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Notice!!</h4></center>
                                    </div>
                                    <div class="modal-body">
                                        <style type="text/css"> </style>
                                        <input type="text" class="form-control" id="input_nobpkb"  style="text-transform:uppercase" placeholder="Jika Kendaraan, Diisi No BPKB Kendaraan">
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-danger" onclick="klik_nobpkb(false)" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success" onclick="klik_nobpkb(true)" data-dismiss="modal">Simpan Data</button>
                                    </div>
                            </div>
                                <!-- modal-content --> 
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    <!-- /.modal -->

                    <!-- Modal Untuk Input Penggunaan Daerah -->
                    <div class="modal fade" id="modal-penggunaan">
                            <div class="modal-dialog modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <center><h4 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Notice!!</h4></center>
                                    </div>
                                    <div class="modal-body">
                                        <style type="text/css"> </style>
                                        <select class="custom-select" id="input_penggunaan">
                                            <option selected value="Pemerintah Kota">Pemerintah Kota</option>
                                            <option value="Pemerintah Pusat">Pemerintah Pusat</option>
                                            <option value="Pemerintah Daerah Lainnya">Pemerintah Daerah Lainnya</option>
                                            <option value="Pihak Lainnya">Pihak Lainnya</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-danger" onclick="klik_penggunaan(false)" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success" onclick="klik_penggunaan(true)" data-dismiss="modal">Simpan Data</button>
                                    </div>
                            </div>
                                <!-- modal-content --> 
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    <!-- /.modal -->

                    <!-- Modal Untuk Cari Register Atribusi -->
                    <div class="modal fade" id="modal-search-register-atrib">
                            <div class="modal-dialog modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <center><h4 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Notice!!</h4></center>
                                    </div>
                                        <div class="modal-body">
                                            <style type="text/css"> </style>
                                            <input type="text" class="form-control" id="search_register_atrib" placeholder="Cari Berdasarkan Register atau Nama Barang">
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-danger" onclick="klik_cari_atrib(false)" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-info" onclick="klik_cari_atrib(true)" data-dismiss="modal">Cari Data</button>
                                        </div>
                            </div>
                                <!-- modal-content --> 
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    <!-- /.modal -->

                    <!-- Modal Untuk Cari Register Ganda -->
                    <div class="modal fade" id="modal-search-register-ganda">
                            <div class="modal-dialog modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <center><h4 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Notice!!</h4></center>
                                    </div>
                                    <div class="modal-body">
                                        <style type="text/css"> </style>
                                        <input type="text" class="form-control" id="search_register_ganda" placeholder="Cari Berdasarkan Register atau Nama Barang">
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-danger" onclick="klik_cari_ganda(false)" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-info" onclick="klik_cari_ganda(true)" data-dismiss="modal">Cari Data</button>
                                    </div>
                            </div>
                                <!-- modal-content --> 
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    <!-- /.modal -->

                    <!-- Modal Untuk Isi Status Tanah -->
                    <div class="modal fade" id="modal-isi_status_tanah">
                            <div class="modal-dialog modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <center><h4 class="modal-title"></i><div id="title_status"></div></h4></center>
                                    </div>
                                    <div class="modal-body">
                                        <style type="text/css"> </style>
                                        <input type="text" class="form-control" id="isi_status_tanah" placeholder="">
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-danger" onclick="klik_status_tanah(false)" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-info" onclick="klik_status_tanah(true)" data-dismiss="modal">Cari Data</button>
                                    </div>
                            </div>
                                <!-- modal-content --> 
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    <!-- /.modal -->

                    <!-- Modal Untuk Cari Register Tanah -->
                    <div class="modal fade" id="modal-register-tanah">
                            <div class="modal-dialog modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <center><h4 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Pilih Status Tanah </h4></center>
                                    </div>
                                    <div class="modal-body">
                                        <style type="text/css"> </style>
                                        <select class="custom-select" id="status_tanah">
                                            <option selected value="1">Pemerintah Kota</option>
                                            <option value="2">Pemerintah Pusat</option>
                                            <option value="3">Pemerintah Daerah Lainnya</option>
                                            <option value="4">Pihak Lainnya</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-danger" onclick="klik_reg_tanah(false)" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-info" onclick="klik_reg_tanah(true)" data-dismiss="modal">Proses</button>
                                    </div>
                            </div>
                                <!-- modal-content --> 
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    <!-- /.modal -->

                    <!-- Modal Untuk Cari Register Atribusi -->
                    <div class="modal fade" id="modal-sk_pengguna">
                            <div class="modal-dialog modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <center><h4 class="modal-title"><i class="fas fa-cloud"></i> Informasi Status Penggunaan</h4></center>
                                    </div>
                                        <div class="modal-body">
                                            <object width="100%" height="1100" type="application/pdf" data="172.18.1.59/Dokumen/sk_pengguna/sk_asli/<?php echo $sk_penggunaan->file?>">
                                                <p>PDF Tidak Bisa Dibuka...</p>
                                            </object>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                        </div>
                            </div>
                                <!-- modal-content --> 
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    <!-- /.modal -->

                    <!-- Menampilkan Hasil Pencarian Register                                                 -->
                    <div class="modal fade" id="modal-list-register">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <center><h4 class="modal-title"><i class="	fas fa-anchor"></i> Cari Data</h4></center>
                                    </div>
                                    <div class="modal-body" style="overflow-x:auto;">
                                        <style type="text/css"> </style>
                                        <table id="tblregister" class="table table-striped table-hover responsive">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th><center>No.</center></th>
                                                    <th><center>Kode Barang</center></th>
                                                    <th><center>Register</center></th>
                                                    <th><center>Nama Barang</center></th>
                                                    <th><center>Tipe</center></th>
                                                    <th><center>Alamat</center></th>
                                                    <th><center>Tahun Perolehan</center></th>
                                                    <th><center>Nilai</center></th>
                                                    <th><center>Aksi</center></th>
                                                </tr>
                                            </thead>
                                            <tbody id="tampil_data">
                                            </tbody>
                                        </table>  
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-danger batal" onclick="klik_destroy()">Batal</button>
                                        <!-- <button type="submit" class="btn btn-success simpan" data-dismiss="modal">Simpan Data</button> -->
                                    </div>
                            </div>
                               
                            </div>
                            
                        </div>
                      

                        <!-- Menampilkan Hasil Pencarian Register                                                 -->
                        <div class="modal fade" id="modal-list-register2">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <center><h4 class="modal-title"><i class="	fas fa-anchor"></i> Cari Data</h4></center>
                                    </div>
                                    <div class="modal-body" style="overflow-x:auto;">
                                        <style type="text/css"> </style>
                                            <table id="tblregister2" class="table table-striped table-hover responsive">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th><center>No.</center></th>
                                                        <th><center>Kode Barang</center></th>
                                                        <th><center>Register</center></th>
                                                        <th><center>Nama Barang</center></th>
                                                        <th><center>Tipe</center></th>
                                                        <th><center>Alamat</center></th>
                                                        <th><center>Tahun Perolehan</center></th>
                                                        <th><center>Nilai</center></th>
                                                        <th><center>Aksi</center></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tampil_data2">
                                                </tbody>
                                            </table>  
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-danger batal" onclick="klik_destroy2()">Batal</button>
                                            <!-- <button type="submit" class="btn btn-success simpan" data-dismiss="modal">Simpan Data</button> -->
                                    </div>
                                </div>
                                    <!-- modal-content -->
                            </div>
                                <!-- /.modal-dialog --> 
                        </div>

                        <!-- Modal Untuk Input Perkerasan Jalan -->
                        <div class="modal fade" id="modal-perkerasan">
                            <div class="modal-dialog modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <center><h4 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Pilih Jenis Perkerasan Jalan :</h4></center>
                                    </div>
                                    <div class="modal-body">
                                        <style type="text/css"> </style>
                                        <select class="custom-select" id="jenis_perkerasan">
                                            <option selected value="Aspal">Aspal</option>
                                            <option value="Beton">Beton</option>
                                            <option value="Paving">Paving</option>
                                            <option value="Kayu">Kayu</option>
                                            <option value="Pasangan Batu">Pasangan Batu</option>
                                            <option value="PJU">PJU</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-danger" onclick="klik_perkerasan(false)" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-info" onclick="klik_perkerasan(true)" data-dismiss="modal">Simpan</button>
                                    </div>
                            </div>
                                <!-- modal-content --> 
                            </div>
                            <!-- /.modal-dialog -->
                        </div>

                        <!-- Modal Untuk Input Bahan Jembatan -->
                        <div class="modal fade" id="modal-jenis_jembatan">
                            <div class="modal-dialog modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <center><h4 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Pilih Jenis Bahan Struktur Jembatan :</h4></center>
                                    </div>
                                    <div class="modal-body">
                                        <style type="text/css"> </style>
                                        <select class="custom-select" id="bahan_jembatan">
                                            <option selected value="Aspal">Aspal</option>
                                            <option value="Beton">Beton</option>
                                            <option value="Paving">Paving</option>
                                            <option value="Kayu">Kayu</option>
                                            <option value="Baja">Baja</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-danger" onclick="klik_jembatan(false)" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-info" onclick="klik_jembatan(true)" data-dismiss="modal">Simpan</button>
                                    </div>
                            </div>
                                <!-- modal-content --> 
                            </div>
                            <!-- /.modal-dialog -->
                        </div>

                        <!-- Modal Untuk Input Bahan Jembatan -->
                        <div class="modal fade" id="modal-ruas_jalan">
                            <div class="modal-dialog modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <center><h4 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Input Nomor / Nama Ruas Jalan, Ujung Ruas dan Pangkal Ruas :</h4></center>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-4">
                                                <input type="text" class="form-control" id="input_ruas" placeholder="Nama / Nomor Ruas">
                                            </div>
                                            <div class="col-4">
                                                <input type="text" class="form-control" id="input_ujung" placeholder="Nama Ujung Ruas">
                                            </div>
                                            <div class="col-4">
                                                <input type="text" class="form-control" id="input_pangkal" placeholder="Nama Pangkal Ruas">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-danger" onclick="klik_ruas(false)" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-info" onclick="klik_ruas(true)" data-dismiss="modal">Simpan</button>
                                    </div>
                            </div>
                                <!-- modal-content --> 
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        
                        <!-- Modal Untuk Input Bahan Jembatan -->
                        <div class="modal fade" id="modal-nomor_irigasi">
                            <div class="modal-dialog modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <center><h4 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Input Nomor Jaringan Irigasi :</h4></center>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <style type="text/css"> </style>
                                            <input type="text" class="form-control" id="input_nomor_irigasi" placeholder="Input Nomor Jaringan Irigasi">
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-danger" onclick="klik_no_irigasi(false)" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-info" onclick="klik_no_irigasi(true)" data-dismiss="modal">Simpan</button>
                                    </div>
                            </div>
                                <!-- modal-content --> 
                            </div>
                            <!-- /.modal-dialog -->
                        </div>

                        <!-- Menampilkan Hasil Pencarian Register -->
                        <div class="modal fade" id="modal-list-register3">
                            <div class="modal-dialog modal-dialog-centered modal-xxl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <center><h4 class="modal-title"><i class="fas fa-anchor"></i> Cari Data</h4></center>
                                    </div>
                                    <div class="modal-body" style="overflow-x:auto;">
                                            <table id="tblregister3" class="table table-striped table-hover responsive">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th><center>No.</center></th>
                                                        <th><center>Nama PD</center></th>
                                                        <th><center>Lokasi</center></th>
                                                        <th><center>Kode Barang</center></th>
                                                        <th><center>Register</center></th>
                                                        <th><center>Nama Barang</center></th>
                                                        <th><center>Tipe</center></th>
                                                        <th><center>Alamat</center></th>
                                                        <th><center>Tahun Perolehan</center></th>
                                                        <th><center>Nilai</center></th>
                                                        <th><center>Peta</center></th>
                                                        <th><center>Aksi</center></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tampil_data3">
                                                </tbody>
                                            </table>  
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-danger batal" onclick="klik_destroy3()">Batal</button>
                                            <!-- <button type="submit" class="btn btn-success simpan" data-dismiss="modal">Simpan Data</button> -->
                                    </div>
                                </div>
                                    <!-- modal-content -->
                            </div>
                                <!-- /.modal-dialog --> 
                        </div>
                        

                    

        

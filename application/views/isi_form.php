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
                    <form role="form" action="cetak_form" method="post">
                        <!-- select -->
                        <center>
                        <div class="row">
                            <!-- Mulai Form -->
                            <div class="form-group col-md-5">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Kode Register :</label>
                                        </div>
                                            <input type="text" class="form-control" id="kode_register" disabled="disabled" value="<?php echo $data_register->register;?>">
                                    </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary1" name="radio_kode_reg" value="reg0" checked="checked"/>
                                        <label for="primary1">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary2" name="radio_kode_reg" value="reg1" disabled="disabled"/>
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
                                        <input type="text" class="form-control" id="kode_barang" disabled="disabled" value="<?php echo $data_register->kode108_baru;?>">
                                    </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary3" name="radio_kode_bar" value="barang0"/>
                                        <label for="primary3">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary4" name="radio_kode_bar" value="barang1"/>
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
                                            <input type="text" class="form-control" id="input_nama_barang" disabled="disabled" value="<?php echo $data_register->nama_barang;?>">
                                    </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-2">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary5" name="radio_nama_bar" value="nama0"/>
                                        <label for="primary5">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary6" name="radio_nama_bar" value="nama1"/>
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
                                            <label class="input-group-text" id="basic-addon3">Nama Spesifikasi Barang :</label>
                                        </div>
                                            <input type="text" class="form-control" id="nama_spek_barang" required="required" placeholder="Diisi Spesifikasi Aset...">
                                    </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <!-- <div class=" mt-2 mb-6 col-lg-2">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary7" name="radio_spek_nama" value="spek0"/>
                                        <label for="primary7">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary8" name="radio_spek_nama" value="spek1"/>
                                        <label for="primary8">Tidak Sesuai</label>
                                    </div>
                                </div> -->
                            <!-- </div> -->

                            <!-- Batas Per Form -->

                            <div class=" mt-2 mb-6 col-lg-2">
                                &nbsp;
                            </div>

                            <!-- Mulai Form -->
                            <div class="form-group col-md-5">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Jumlah Barang : </label>
                                        </div>
                                            <input type="text" class="form-control" id="kode_register" disabled="disabled" placeholder="1">
                                    </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary9" name="radio_jumlah_bar" checked="checked" value="jumlah0"/>
                                        <label for="primary9">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary10" name="radio_jumlah_bar" disabled="disabled" value="jumlah1"/>
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
                                            <input type="text" class="form-control" id="satuan_barang" disabled="disabled" value="<?php echo $data_register->satuan;?>">
                                    </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary11" name="radio_satuan" value="satuan0"/>
                                        <label for="primary11">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary12" name="radio_satuan" value="satuan1"/>
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
                                    <input type="text" class="form-control" id="keberadaan_bar" disabled="disabled" placeholder="Ada">
                                </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary13" name="radio_keberadaan" value="ada0"/>
                                        <label for="primary13">Ada</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary14" name="radio_keberadaan" value="ada1"/>
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
                                    <input type="text" class="form-control" name="input_nilai" id="nilai_perolehan" disabled="disabled" value="<?php echo $data_register->harga_baru;?>">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary15" name="radio_nilai" value="reg0"/>
                                        <label for="primary15">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary16" name="radio_nilai" value="reg1"/>
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
                                    <input type="text" class="form-control" id="kode_register" disabled="disabled" placeholder="12345678-2022-200901-2">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button">Pilih Register</button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary17" name="radio_kap_atrib" value="atrib0"/>
                                        <label for="primary17">Ya</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary18" name="radio_kap_atrib" value="atrib1"/>
                                        <label for="primary18">Bukan</label>
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
                                            <input type="text" class="form-control" id="alamat_barang" disabled="disabled" value="<?php echo $data_register->merk_alamat;?>">
                                    </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary19" name="radio_alamat" value="alamat0"/>
                                        <label for="primary19">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary20" name="radio_alamat" value="alamat1"/>
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
                                            <input type="text" class="form-control" id="kondisi_barang" disabled="disabled" value="<?php 
                                                if($data_register->register = "B") {
                                                    echo "Baik";
                                                } elseif ($data_register->register = "KB") {
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
                                        <input type="radio" id="primary21" name="radio_kondisi" value="kondisi0"/>
                                        <label for="primary21">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary22" name="radio_kondisi" value="kondisi1"/>
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
                                            <label class="input-group-text" id="basic-addon3">Merk / Tipe :</label>
                                        </div>
                                            <input type="text" class="form-control" id="merk_tipe" disabled="disabled" value="<?php echo $data_register->tipe;?>">
                                    </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary23" name="radio_merk" value="merk0"/>
                                        <label for="primary23">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary24" name="radio_merk" value="merk1"/>
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
                                            <input type="text" class="form-control" id="nopol" style="text-transform:uppercase" disabled="disabled" value="<?php echo $data_register->nopol;?>">
                                    </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary25" name="radio_nopol" value="nopol0"/>
                                        <label for="primary25">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary26" name="radio_nopol" value="nopol1"/>
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
                                            <input type="text" class="form-control" id="noka" style="text-transform:uppercase" disabled="disabled" value="<?php echo $data_register->no_rangka_seri;?>">
                                    </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary27" name="radio_no_rangka" value="rangka0"/>
                                        <label for="primary27">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary28" name="radio_no_rangka" value="rangka1"/>
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
                                            <input type="text" class="form-control" id="no_mesin" style="text-transform:uppercase" disabled="disabled" value="<?php echo $data_register->no_mesin;?>">
                                    </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary29" name="radio_mesin" value="mesin0"/>
                                        <label for="primary29">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary30" name="radio_mesin" value="mesin1"/>
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
                                            <input type="text" class="form-control" style="text-transform:uppercase" id="no_bpkb" disabled="disabled" value="<?php echo $data_register->no_bpkb?>">
                                    </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary31" name="radio_bpkb" value="bpkb0"/>
                                        <label for="primary31">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary32" name="radio_bpkb" value="bpkb1"/>
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
                                    <input type="text" class="form-control" id="penggunaan" disabled="disabled" placeholder="12345678-2022-200901-2">
                                </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary33" name="radio_pengguna" value="pengguna0"/>
                                        <label for="primary33">Sesuai</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary34" name="radio_pengguna" value="pengguna1"/>
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
                                            <input type="text" class="form-control" id="catat_ganda" disabled="disabled" placeholder="12345678-2022-200901-2">
                                    </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class=" mt-2 mb-6 col-lg-4">
                                <div class="form-group clearfix">
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary35" name="radio_ganda" value="ganda0"/>
                                        <label for="primary35">Ya</label>
                                    </div>
                                    <div class="radio icheck-primary d-inline">
                                        <input type="radio" id="primary36" name="radio_ganda" value="ganda1"/>
                                        <label for="primary36">Tidak</label>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>

                            <div class="form-group col-md-8">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Titik Koordinat :</label>
                                        </div>
                                            <input type="text" class="form-control" id="kode_register" placeholder="Input Titik Koordinat">
                                    </div>
                            </div>
                            <div class="form-group col-md-8">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Lainnya</label>
                                        </div>
                                            <input type="text" class="form-control" id="kode_register" placeholder="......">
                                    </div>
                            </div>
                            <div class="form-group col-md-8">
                                    <div class="mb-3">
                                        <label><h5><b>Keterangan</b></h5></label>
                                        <textarea class="form-control" rows="3" value="<?php echo $data_register->keterangan?>"></textarea>
                                    </div>
                            </div>

                            <div class="form-group col-md-8">
                                <div class="mb-3">
                                <label><h5><b>Upload Foto atau Denah Aset</b></h5></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="filename">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>


                            <!-- Batas Per Form -->
                            


                                
                                <!-- <div class="row justify-content-md-center">
                                    <div class="col col-md-auto">
                                        <center><button type="button" class="btn btn-success btn-block btn-lg" data-toggle="modal" data-target="#modal-sm">Save Data</button></center>
                                    </div>
                                </div> -->
                        </div>
                        </center>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-4">
                                    <a href="javascript:history.back()" class="btn btn-danger btn-block btn-lg">Kembali</a>
                                </div>
                                <div class="col-6">
                                    <button type="button" class="btn btn-success btn-block btn-lg" data-toggle="modal" data-target="#modal-sm">Save Data</button>
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
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-danger batal" onclick="klik_kode_bar(false)" data-dismiss="modal">Batal</button>
                                        <!-- <button type="submit" class="btn btn-success simpan" data-dismiss="modal">Simpan Data</button> -->
                                    </div>
                            </div>
                                /* <!-- modal-content --> */
                            </div>
                            /* <!-- /.modal-dialog --> */
                        </div>
                        /* <!-- /.modal --> */
                        
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
                        <div class="modal fade" id="modal-spek-barang">
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
                            </div>
                                <!-- modal-content --> 
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
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
                                        <center><h4 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Notice!!</h4></center>
                                    </div>
                                    <div class="modal-body">
                                        <style type="text/css"> </style>
                                        <select class="custom-select" id="keberadaan">
                                            <option selected disabled="disabled">Pilih Status Keberadaan Barang</option>
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

                    <!-- Modal Untuk Input Nama Alamat Barang -->
                    <div class="modal fade" id="modal-alamat-barang">
                            <div class="modal-dialog modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <center><h4 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Notice!!</h4></center>
                                    </div>
                                    <div class="modal-body">
                                        <style type="text/css"> </style>
                                        <input type="text" class="form-control" id="input_alamat" placeholder="4 Pintu, 250 cc, Memory 500GB">
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-danger" onclick="klik_alamat_barang(false)" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success" onclick="klik_alamat_barang(true)" data-dismiss="modal">Simpan Data</button>
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
                                        <center><h4 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Notice!!</h4></center>
                                    </div>
                                    <div class="modal-body">
                                        <style type="text/css"> </style>
                                        <select class="custom-select" id="input_kondisi">
                                            <option selected disabled="disabled">Pilih Kondisi Barang</option>
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

                    <!-- Modal Untuk Input Merk/Tipe Barang -->
                    <div class="modal fade" id="modal-merk-barang">
                            <div class="modal-dialog modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <center><h4 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Notice!!</h4></center>
                                    </div>
                                    <div class="modal-body">
                                        <style type="text/css"> </style>
                                        <input type="text" class="form-control" id="input_merk" placeholder="Diisi Merk/Tipe Barang">
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

                    <!-- Modal Untuk Input Nopol -->
                    <div class="modal fade" id="modal-nopol">
                            <div class="modal-dialog modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <center><h4 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Notice!!</h4></center>
                                    </div>
                                    <div class="modal-body">
                                        <style type="text/css"> </style>
                                        <input type="text" class="form-control" id="input_nopol" style="text-transform:uppercase" placeholder="Jika Kendaraan, Diisi Nopol Kendaraan">
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-danger" onclick="klik_nopol(false)" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success" onclick="klik_nopol(true)" data-dismiss="modal">Simpan Data</button>
                                    </div>
                            </div>
                                <!-- modal-content --> 
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    <!-- /.modal -->

                     <!-- Modal Untuk Input No Rangka Seri -->
                     <div class="modal fade" id="modal-norangka">
                            <div class="modal-dialog modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <center><h4 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Notice!!</h4></center>
                                    </div>
                                    <div class="modal-body">
                                        <style type="text/css"> </style>
                                        <input type="text" class="form-control" id="input_norangka"  style="text-transform:uppercase" placeholder="Jika Kendaraan, Diisi No Rangka Seri Kendaraan">
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-danger" onclick="klik_noka(false)" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success" onclick="klik_noka(true)" data-dismiss="modal">Simpan Data</button>
                                    </div>
                            </div>
                                <!-- modal-content --> 
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    <!-- /.modal -->

                    <!-- Modal Untuk Input No Mesin -->
                    <div class="modal fade" id="modal-nomesin">
                            <div class="modal-dialog modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <center><h4 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Notice!!</h4></center>
                                    </div>
                                    <div class="modal-body">
                                        <style type="text/css"> </style>
                                        <input type="text" class="form-control" id="input_nomesin" style="text-transform:uppercase" placeholder="Jika Kendaraan, Diisi No Mesin Kendaraan">
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-danger" onclick="klik_nomesin(false)" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success" onclick="klik_nomesin(true)" data-dismiss="modal">Simpan Data</button>
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
                                            <option selected disabled="disabled">Pemerintah Kota</option>
                                            <option value="Pemerintah Kota">Pemerintah Kota</option>
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

                    

        

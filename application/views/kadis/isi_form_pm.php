<section class="content">
            <!-- <div class="container-fluid">
                -----
            </div> -->
            <!-- general form elements disabled -->
              <div class="card card-dark">
                <center>
                  <div class="card-header">
                    <h3 class="card-title">Review Data Register</h3>
                  </div>
                </center>
                <!-- /.card-header -->
                <div class="card-body">
                    <form role="form" action="save_isi_form_peralatan_mesin" method="post" enctype="multipart/form-data">
                        <!-- select -->
                       
                        <h4><?php echo $data_register->register." - ".$data_register->nama_barang_baru;?></h4>
                        <hr style="padding: 2px">
                        <center>
                        <div class="row">
                            <!-- Mulai Form -->
                            <div class="form-group col-md-6">
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

                            

                            <!-- Mulai Form -->
                            <div class="form-group col-md-12">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Nama Barang :</label>
                                        </div>
                                            <input type="text" class="form-control" name="nama_barang" id="input_nama_barang" readonly="true" value="<?php echo $data_register->nama_barang_baru;?>">
                                    </div>
                            </div>

                            <!-- Batas Per Form -->

                            <div class="form-group col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Kode Barang :</label>
                                        </div>
                                        <input type="text" class="form-control" name="kode_barang" id="kode_barang" readonly="true" value="<?php echo $data_register->kode108_baru;?>">
                                        <input type="hidden" name="kode_barang_lama" value="<?php echo $data_register->kode108_baru;?>">
                                    </div>
                            </div>


                            <!-- Mulai Form -->
                            <div class="form-group col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Lokasi Pencatatan : </label>
                                        </div>
                                            <input type="text" class="form-control" id="input_alamat" name="lokasi" value="<?php echo $data_register->nomor_lokasi?>" readonly="true" style="width:100px;" placeholder="">
                                            <input type="hidden" name="no_lokasi_awal" value="<?php echo $data_register->nomor_lokasi_baru;?>">
                                            <div class="input-group-append">
                                                <label class="input-group-text" id="label_lokasi"><?php echo $data_register->lokasi?></label>
                                            </div>   
                                    </div>
                            </div>
                            <!-- Batas Per Form -->

                            <!-- Mulai Form -->
                            <div class="form-group col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Jumlah Barang : </label>
                                        </div>
                                            <input type="text" class="form-control" id="kode_register" readonly="true" placeholder="1">
                                    </div>
                            </div>

                            <!-- Batas Per Form -->


                            <!-- Mulai Form -->
                            <div class="form-group col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Satuan  :</label>
                                        </div>
                                            <input type="text" class="form-control" name="satuan" id="satuan_barang" readonly="true" value="<?php echo $data_register->satuan;?>">
                                    </div>
                            </div>

                            <!-- Batas Per Form -->


                            <!-- Mulai Form -->
                            <div class="form-group col-md-6 ">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Keberadaan Barang : </label>
                                    </div>
                                    <input type="text" class="form-control" name="keberadaan" id="keberadaan_bar" readonly="true" placeholder="Ada" value="Ada">
                                </div>
                            </div>

                            <!-- Batas Per Form -->


                            <!-- Mulai Form -->
                            <div class="form-group col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text">Nilai Perolehan (Rp.)</label>
                                    </div>
                                    <input type="text" class="form-control" name="nilai" id="nilai_perolehan" readonly="true" value="<?php echo number_format($data_register->harga_baru,2,',','.');?>">
                                    <input type="hidden" name="tahun_pengadaan" value="<?php echo $data_register->tahun_pengadaan;?>">
                                </div>
                            </div>
                            <!-- Batas Per Form -->


                            <!-- Mulai Form -->
                            <div class="form-group col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text">Apakah Aset Atribusi / Kapitalisasi</label>
                                    </div>
                                    <input type="text" class="form-control" name="aset_atrib" id="aset_atrib" readonly="true" placeholder="-" value="-">
                                </div>
                            </div>

                            <!-- Batas Per Form -->


                            <!-- Mulai Form -->
                            <div class="form-group col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Merk : </label>
                                        </div>
                                            <input type="text" class="form-control" name="merk" id="merk_barang" readonly="true" value="<?php echo  str_replace('"', '', $data_register->merk_alamat_baru);?>">
                                            <!-- <textarea class="form-control" name="merk" rows="3" id="merk_barang" value="<?php echo str_replace('"', '', $data_register->merk_alamat_baru);?>"></textarea> -->
                                    </div>
                            </div>

                            <!-- Batas Per Form -->


                            <!-- Mulai Form -->
                            <div class="form-group col-md-6">
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
                            <!-- Batas Per Form -->


                            <!-- Mulai Form -->
                            <div class="form-group col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Tipe :</label>
                                        </div>
                                            <input type="text" class="form-control" name="tipe_barang" id="tipe_barang" readonly="true" value="<?php echo $data_register->tipe_baru;?>">
                                    </div>
                            </div>

                            <!-- Batas Per Form -->
                  

                            <!-- Mulai Form -->
                            <div class="form-group col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Nomor Polisi :</label>
                                        </div>
                                            <input type="text" class="form-control" name="nopol" id="nopol" style="text-transform:uppercase" readonly="true" value="<?php echo $data_register->nopol;?>">
                                    </div>
                            </div>

                            <!-- Batas Per Form -->


                            <!-- Mulai Form -->
                            <div class="form-group col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Nomor Rangka Seri :</label>
                                        </div>
                                            <input type="text" class="form-control" name="noka" id="noka" style="text-transform:uppercase" readonly="true" value="<?php echo $data_register->no_rangka_seri;?>">
                                    </div>
                            </div>

                            <!-- Batas Per Form -->


                            <!-- Mulai Form -->
                            <div class="form-group col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Nomor Mesin :</label>
                                        </div>
                                            <input type="text" class="form-control" name="no_mesin" id="no_mesin" style="text-transform:uppercase" readonly="true" value="<?php echo $data_register->no_mesin;?>">
                                    </div>
                            </div>

                            <!-- Batas Per Form -->

                            <!-- Mulai Form -->
                            <div class="form-group col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Nomor BPKB :</label>
                                        </div>
                                            <input type="text" class="form-control" style="text-transform:uppercase" name="no_bpkb" id="no_bpkb" readonly="true" value="<?php echo $data_register->no_bpkb?>">
                                    </div>
                            </div>

                            <!-- Batas Per Form -->
                            

                            <!-- Mulai Form -->
                            <div class="form-group col-md-6 ">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Pengguna Barang : </label>
                                    </div>
                                    <input type="text" class="form-control" name="penggunaan" id="penggunaan" readonly="true" value="Pemerintah Kota">
                                </div>
                            </div>
                            <!-- Batas Per Form -->

                            <!-- Mulai Form -->
                            <div class="form-group col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Data Tercatat Ganda :</label>
                                        </div>
                                            <input type="text" class="form-control" name="catat_ganda" id="catat_ganda" readonly="true" placeholder="-" value="-">
                                    </div>
                            </div>

                            <!-- <div class="form-group col-md-8">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Titik Koordinat :</label>
                                        </div>
                                            <input type="text" class="form-control" id="koordinat" name="koordinat" placeholder="Input Titik Koordinat">
                                    </div>
                            </div> -->
                            <div class="form-group col-md-12">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" id="basic-addon3">Lainnya : </label>
                                        </div>
                                            <input type="text" class="form-control" name="lainnya" id="kode_register" placeholder="......">
                                    </div>
                            </div>
                            
                            <div class="form-group col-md-12">
                                    <div class="mb-3">
                                        <label><h5><b>Keterangan</b></h5></label>
                                        <textarea class="form-control" name="keterangan" rows="4" ><?php echo $data_register->keterangan?></textarea>
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
                                <div class="col-6">
                                    <a href="javascript:history.back()" class="btn btn-danger btn-block btn-lg">Kembali</a>
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
                        

                    

        

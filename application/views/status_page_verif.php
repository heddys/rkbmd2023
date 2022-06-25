
<section class="content">
      <div class="row">

      <div class="col-12">
          
          <hr>
        	<div class="card">
	            <div class="card-header">
	              <h3 class="card-title">
                  <center>LIST DATA YANG TELAH DI VERIFIKASI  - <?php echo $dummy['data']." ".$dummy['status'];?>
                          <?php if ($kib_apa == 1) { 
                                    echo "ASET TETAP TANAH";
                                } 
                                elseif ($kib_apa == 2) {
                                        echo "ASET TETAP PERALATAN DAN MESIN";
                                } 
                                elseif ($kib_apa == 3) {
                                        echo "ASET TETAP GEDUNG DAN BANGUNAN";
                                } 
                                elseif ($kib_apa == 4) {
                                        echo "ASET TETAP JALAN, IRIGASI DAN JARINGAN";
                                }
                                elseif ($kib_apa == 5) {
                                    echo "ASET TETAP LAINNYA";
                                }
                                elseif ($kib_apa == 6) {
                                    echo "ASET TIDAK BERWUJUD";
                                } 
                                ?>
                        </center></h3>
                      
	            </div>
	            <!-- /.card-header -->
	            <div class="card-body" style="overflow-x:auto;">
                    <?php if ($this->session->userdata('role') == "Pengurus Barang Pembantu UPTD") {?>
                        <table id="tabel_cetak2" class="table table-bordered table-hover">
                            <thead class="thead-dark">
                            <tr>
                            <th><center>No.</center></th>
                            <th><center>Register</center></th>
                            <th><centeR>Loaksi</center></th>
                            <th><center>Kode Neraca</center></th>
                            <th><center>Nama Barang</center></th>
                            <th><center>Merk / Tipe Barang</center></th>
                            <th><center>Nilai Perolehan </center></th>
                            <th><center>Cetak</center></th>
                            <th><center>Edit Data</center></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $x=1; foreach ($register as $c) {?>
                                <tr>
                                    <td><center><?php echo $x?></center></td>
                                    <td><center><?php echo $c->register?></center></td>
                                    <td><center><?php echo $c->lokasi?></center></td>
                                    <td><center><?php echo $c->kode64_baru?></center></td>
                                    <td><center><?php echo $c->nama_barang?></center></td>
                                    <td><center><?php echo $c->merk_alamat." - ".$c->tipe?></center></td>
                                    <td><center><?php echo number_format($c->harga_baru,2,',','.');?></center></td>
                                    <td>  
                                        <form role="form" action="<?php echo site_url();?>/status_form/cetak_form" method="post" target="_blank" >
                                            <center>
                                            <button type="submit" class="btn btn-sm btn-success" title="Isi Form Inventarisasi"><i class="fa fa-print"></i>
                                                <input type="hidden" name="register" value="<?php echo $c->register?>">
                                            </center>
                                        </form>
                                    </td>
                                    <td>
                                        <form role="form" action="<?php echo site_url();?>/form_inv/edit_form_verif" method="post">
                                        <center>
                                        <button type="submit" class="btn btn-sm btn-primary" title="Edit Form Inventarisasi"><i class="fa fa-align-left"></i>
                                            <input type="hidden" name="register" value="<?php echo $c->register?>">
                                        </center>
                                        </form>
                                    </td>  
                                </tr>
                            <?php $x++; }?>
                            </tbody>
                        </table>

                    <?php } else {?>
                        <table>
                        <thead>
                            <tr>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td width="70%">
                                <form role="form" action="<?php echo base_url();?>index.php/status_form/verif_page/2" method="post">
                                <div class="col-md-5">
                                    <select class="form-control select2" id="select_lokasi" name="select_lokasi">
                                    <option selected disable="disabled">Cari Berdasarkan Lokasi</option>
                                    <option value="<?php echo $this->session->userdata('no_lokasi_asli');?>">Semua Lokasi</option>
                                        <?php $x=1; foreach ($lokasi->result() as $row) {?>
                                        <option value="<?php echo $row->nomor_lokasi;?>"><?php echo $row->lokasi;?></option>
                                        <?php }?>
                                    </select> 
                                </div>
                                <div class="col-md-5 mt-2">
                                    <button type="submit" class="btn btn-sm btn-info" style="width: 100%;">Cari Lokasi</a>
                                </div>                        
                                </form>
                            </td>
                            <td>
                            </td>
                            <td width="50%">
                            <form role="form" action="<?php echo base_url();?>index.php/status_form/verif_page/2" method="post">
                                <div class="input-group">
                                    <input type="text"  class="form-control" name="cariregname" placeholder="Cari Berdasarkan Register atau Nama Barang" >
                                    <button class="btn btn-primary" type="submit" id="button-addon2"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                            </td>
                            </tr>
                            
                        </tbody>
                        </table>

                        <p>
                        <table id="example1" class="table table-bordered table-hover">
                        <thead class="thead-dark" > 
                            <tr>
                            <th><center>No.</center></th>
                            <th><center>Register</center></th>
                            <th><centeR>Loaksi</center></th>
                            <th><center>Kode Neraca</center></th>
                            <th><center>Nama Barang</center></th>
                            <th><center>Merk / Tipe Barang</center></th>
                            <th><center>Nilai Perolehan </center></th>
                            <th><center>Tahun</center></th>
                            <th><center>Cetak</center></th>
                            <th><center>Edit Data</center></th>
                            </tr>
                            </thead>
                        <tbody>
                            <?php $x=$offset+1; foreach ($register as $row) {?>
                                <tr>
                                    <td><center><?php echo $x++;?></center></td>
                                    <td><center><?php echo $row->register;?></center></td>
                                    <td><center><?php echo $row->lokasi;?></center></td>
                                    <td><center><?php echo $row->kode64_baru;?></center></td>
                                    <td><center><?php echo $row->nama_barang;?></center></td>
                                    <td><center><?php echo $row->merk_alamat." - ".$row->tipe;?></center></td>
                                    <td><center><?php echo $row->tahun_pengadaan;?></center></td>
                                    <td><center><?php echo number_format($row->harga_baru,2,',','.');?></center></td>
                                    <td>  
                                        <form role="form" action="<?php echo site_url();?>/status_form/cetak_form" method="post" target="_blank" >
                                            <center>
                                            <button type="submit" class="btn btn-sm btn-success" title="Isi Form Inventarisasi"><i class="fa fa-print"></i>
                                                <input type="hidden" name="register" value="<?php echo $row->register?>">
                                            </center>
                                        </form>
                                    </td>
                                    <td>
                                        <form role="form" action="<?php echo site_url();?>/form_inv/edit_form_verif" method="post">
                                        <center>
                                        <button type="submit" class="btn btn-sm btn-primary" title="Edit Form Inventarisasi"><i class="fa fa-align-left"></i>
                                            <input type="hidden" name="register" value="<?php echo $row->register?>">
                                        </center>
                                        </form>
                                    </td>  
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>
                        <br>
                        <b><u>Silahkan Pilih Banyak Data Per Halaman : </b></u>
                        <form role="form" action="<?php echo site_url();?>/form_inv/index/2" method="post">
                        <select class="form-control select_limit" name="limit" id="limit">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <button type="submit" class="btn btn-sm btn-info" title="Rubah Banyak List Register"><i class="fa fa-bomb"></i></button>
                        </form>
                        <?php echo $this->pagination->create_links(); } ?>

	            </div>
                
	            <!-- /.card-body -->
	          </div>
	          <!-- /.card --> 
	        </div>
	        <!-- /.col -->
	      </div>
	      <!-- /.row -->
                            </div>

<section class="content">
      <div class="row">
        <div class="col-12">
          <!-- <a href="<?php echo site_url('/home/rkbform');?>" class="btn btn-primary btn-flat">Tambah Kegiatan </a>
          <a href="#" class="btn btn-success btn-flat excel" disabled>Export Excel</a> -->
          <hr>
        	<div class="card">
	            <div class="card-header">
	              <h3 class="card-title">
                  
                      <center>KARTU INVENTARIS BARANG <?php echo $dummy['rows']." = ".$dummy['form']?> - 
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
                                ?></center></h3>
	            </div>
	            <!-- /.card-header -->
	          <div class="card-body" style="overflow-x:auto;">
              <div class="row" style="float:right;">
                
                <!-- <div class="col-md-6">
                  <div class="input-group mb-3">
                    <input type="text"  class="form-control" placeholder="Cari Nama Barang">
                    <button class="btn btn-primary" type="submit" id="button-addon2"><i class="fa fa-search"></i></button>
                  </div>
                </div> -->
              </div>

                
                    

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
                        <form role="form" action="<?php echo base_url();?>index.php/form_inv/index/2" method="post">
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
                      <form role="form" action="<?php echo base_url();?>index.php/form_inv/index/2" method="post">
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
                    <th><center>Lokasi</center></th>
	                  <th><center>Kode Neraca</center></th>
	                  <th><center>Nama Barang</center></th>
	                  <th><center>Spesifikasi Barang</center></th>
	                  <th><center>Nilai Perolehan </center></th>
	                  <th><center>Aksi</center></th>
	                </tr>
	                </thead>
                  <tbody>
                    <?php foreach ($register as $row) {?>
	                	<tr>
	                  		<td><center><?php echo $offset++;?></center></td>
	                  		<td><center><?php echo $row->register;?></center></td>
                        <td><center><?php echo $row->lokasi;?></center></td>
	                  		<td><center><?php echo $row->kode64_baru;?></center></td>
                            <td><center><?php echo $row->nama_barang;?></center></td>
                            <td><center><?php echo $row->merk_alamat." - ".$row->tipe;?></center></td>
                            <td><center><?php echo number_format($row->harga_baru,2,',','.');?></center></td>
	                  		<td>  
                              <form role="form" action="<?php echo site_url();?>/form_inv/isi_formulir" method="post">
                                <center>
                                  <button type="submit" class="btn btn-sm btn-info" title="Isi Form Inventarisasi"><i class="fas fa-edit"></i></a>
                                    <input type="hidden" name="register" value="<?php echo $row->register?>">
                                </center></td>
                              </form>
	                  	</tr>
	                  <?php }?>
	                </tbody>
	              </table>
                <p>
                <?php echo $this->pagination->create_links(); ?>
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
                    </div>
                    </div>
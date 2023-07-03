<section class="content">
      <div class="row">
        <div class="col-12">
          <!-- <a href="<?php echo site_url('/home/rkbform');?>" class="btn btn-primary btn-flat">Tambah Kegiatan </a>
          <a href="#" class="btn btn-success btn-flat excel" disabled>Export Excel</a> -->
          <hr>
        	<div class="card">
	            <div class="card-header">
	              <h3 class="card-title">
                  
                      <center>KARTU INVENTARIS BARANG - ALL STATUS</center></h3>
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
                        <form role="form" action="<?php echo base_url();?>index.php/status_form/cari_status_reg" method="post">
                          <div class="col-md-7">
                            <select class="form-control select2" id="select_lokasi" name="select_lokasi" style="width: 100%">
                              <option selected disable="disabled">Cari Berdasarkan Lokasi</option>
                              <option value="<?php echo $this->session->userdata('no_lokasi_asli');?>">Semua OPD</option>
                                <?php $x=1; foreach ($lokasi->result() as $row) {?>
                                <option value="<?php echo $row->nomor_lokasi;?>"><?php echo $row->nomor_lokasi." - ".$row->lokasi;?></option>
                                <?php }?>
                            </select> 
                          </div>
                          <div class="col-md-7 mt-2">
                            <button type="submit" class="btn btn-sm btn-info" style="width: 100%;">Cari Lokasi</a>
                          </div>                        
                        </form>
                      </td>
                      <td>
                      </td>
                      <td width="50%">
                      <form role="form" action="<?php echo base_url();?>index.php/status_form/cari_status_reg" method="post">
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
                        <th><center>Status</center></th>
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
                            <td><center><?php echo number_format($row->harga_baru,2,',','.');?></center></td>
	                  		<td>
                                <?php if ($row->status==1 && $row->status_simbada == NULL) {?>
                                    <center><a href="<?php echo site_url('status_form/show_form_inv_user?status=1&amp;register='.$row->register)?>" class="btn btn-sm btn-warning" title="Dalam Proses Verifikasi Pejabat Penatausahaan Aset" target="_blank"><i class="fa fa-spinner"></i></a></center>
                                <?php } elseif ($row->status==2 && $row->status_simbada == NULL) { ?>
                                    <center><a href="<?php echo site_url('status_form/show_form_inv_user?status=2&amp;register='.$row->register)?>" class="btn btn-sm btn-success" title="Register Telah Di Verifikasi" target="_blank"><i class="fas fa-eye"></i></a></center>
                                <?php } elseif ($row->status==3 && $row->status_simbada == NULL) { ?>
                                    <center><a href="<?php echo site_url('status_form/show_form_inv_user?status=3&amp;register='.$row->register)?>" class="btn btn-sm btn-danger" title="Register Di Tolak Verifikator" target="_blank"><i class="fa fa-ban"></i></a></center>
                                <?php } elseif ($row->status==NULL && $row->status_simbada == NULL) { ?> <center><h5><span class="badge badge-warning"> Belum Di Lakukan Invetarisasi </span></h5></center> 
                                <?php } else { ?> <center><h5><span class="badge badge-danger"> Register Terhapus Pada SIMBADA </span></h5></center> <?php } ?>
                            </td>
	                  	</tr>
	                  <?php }?>
	                </tbody>
	              </table>
                <br>
                        <b><u>Silahkan Pilih Banyak Data Per Halaman : </b></u>
                        <form role="form" action="<?php echo site_url();?>/status_form/cari_status_reg" method="post">
                        <select class="form-control select_limit" name="limit" id="limit">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <button type="submit" class="btn btn-sm btn-info" title="Rubah Banyak List Register"><i class="fa fa-bomb"></i></button>
                        </form>
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
    </div>S

<section class="content">
      <div class="row">
        <div class="col-12">   
          <hr>
        	<div class="card">
	            <div class="card-header">
	              <h3 class="card-title">
                      <center>STATUS REGISTER PROSES VERIFIKASI <button type='button' class='btn btn-sm btn-warning' title='Register Masih Dalam Proses Verifikasi'><i class='fa fa-exclamation-triangle'></i></button> / REGISTER DI TOLAK <button type="button" class="btn btn-sm btn-info" title="Edit Form Inventarisasi"><i class="far fa-edit"></i></button></center></h3>
                      
	            </div>
	            <!-- /.card-header -->
	            <div class="card-body" style="overflow-x:auto;">
					<?php if ($this->session->userdata('role') == "Pengurus Barang Pembantu UPTD") {?>
                        <table id="tabel_proses_verif2" class="table table-bordered table-hover">
                            <thead class="thead-dark">
                            <tr>
								<th><center>No.</center></th>
								<th><center>Register</center></th>
								<th><centeR>Loaksi</center></th>
								<th><center>Kode Neraca</center></th>
								<th><center>Nama Barang</center></th>
								<th><center>Merk / Tipe Barang</center></th>
								<th><center>Nilai Perolehan </center></th>
								<th><center>Aksi</center></th>
							</tr>
                            </thead>
                            <tbody>
                            <?php $x=1; foreach ($register->result() as $row) {?>
								<?php if ($row->status == 3) {echo "<tr class='table-danger'>";} else {echo "<tr>";}?>
									<td><center><?php echo $x?></center></td>
									<td><center><?php echo $row->register?></center></td>
									<td><center><?php echo $row->lokasi?></center></td>  
									<td><center><?php echo $row->kode64_baru?></center></td>
									<td><center><?php echo $row->nama_barang?></center></td>
									<td><center><?php echo $row->merk_alamat." - ".$row->tipe?></center></td>
									<td><center><?php echo number_format($row->harga_baru,2,',','.');?></center></td>
									<td> 
									<?php if ($row->status == 3) {?>
									<form role="form" action="<?php echo site_url();?>/form_inv/isi_formulir_edit" method="post">
										<center>
										<button type="submit" class="btn btn-sm btn-info" title="Edit Form Inventarisasi"><i class="far fa-edit"></i>
											<input type="hidden" name="register" value="<?php echo $row->register?>">
										</center>
									</form>
									<?php } else { echo "<center><button type='button' class='btn btn-sm btn-warning' title='Register Masih Dalam Proses Verifikasi'><i class='fa fa-exclamation-triangle'></i></center>";}?>
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
                                <form role="form" action="<?php echo base_url();?>index.php/status_form/index/2" method="post">
                                <div class="col-md-5">
                                    <select class="form-control select2" id="select_lokasi" name="select_lokasi" required="required">
                                    <option selected value="">Cari Berdasarkan Lokasi</option>
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
                            <form role="form" action="<?php echo base_url();?>index.php/status_form/index/2" method="post">
                                <div class="input-group">
                                    <input type="text"  class="form-control" name="cariregname" placeholder="Cari Berdasarkan Register atau Nama Barang" required="required">
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
								<th><center>Tahun Pengadaan</center></th>
								<th><center>Nilai Perolehan </center></th>
								<th><center>Aksi</center></th>
                            </tr>
                            </thead>
                        <tbody>
                            <?php $x=$offset+1; foreach ($register as $row) {?>
                                <?php if ($row->status == 3) {echo "<tr class='table-danger'>";} else {echo "<tr>";}?>
                                    <td><center><?php echo $x++;?></center></td>
                                    <td><center><?php echo $row->register;?></center></td>
                                    <td><center><?php echo $row->lokasi;?></center></td>
                                    <td><center><?php echo $row->kode64_baru;?></center></td>
                                    <td><center><?php echo $row->nama_barang;?></center></td>
                                    <td><center><?php echo $row->merk_alamat." - ".$row->tipe;?></center></td>
                                    <td><center><?php echo $row->tahun_pengadaan;?></center></td>
                                    <td><center><?php echo number_format($row->harga_baru,2,',','.');?></center></td>
                                    <td> 
									<?php if ($row->status == 3) {?>
									<form role="form" action="<?php echo site_url();?>/form_inv/isi_formulir_edit" method="post">
										<center>
										<button type="submit" class="btn btn-sm btn-info" title="Edit Form Inventarisasi"><i class="far fa-edit"></i>
											<input type="hidden" name="register" value="<?php echo $row->register?>">
										</center>
									</form>
									<?php } else { echo "<center><button type='button' class='btn btn-sm btn-warning' title='Register Masih Dalam Proses Verifikasi'><i class='fa fa-exclamation-triangle'></i></center>";}?>
									</td> 
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>
                        <br>
                        <b><u>Silahkan Pilih Banyak Data Per Halaman : </b></u>
                        <form role="form" action="<?php echo site_url();?>/status_form/index/2" method="post">
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

          
	    </section>
	    <!-- /.content -->
	    <div class="modal fade" id="modal-detail-barang">
           <div class="modal-dialog modal-xl ">
              <div class="modal-content">
                 <div class="modal-header">
                 	<style type="text/css">.capitalize{text-transform: capitalize;}</style>
                    <div class="alert alert-success">
						<h5><i class="icon fas fa-info"></i></span><b>Nama Komponen</b></h5>
						<h5><p class="modal-title" id="idku"></p></h5>
                 	</div>
                 </div>
				 
                 <div class="modal-body" style="overflow-x:auto;">
                      
                          <table id="example1" class="table table-bordered table-hover">
                            <thead class="thead-dark" > 
				                <tr>
				                  <th><center>No.</center></th>
				                  <th><center>Kode Kegiatan</center></th>
				                  <th><center>Nama Kegiatan</center></th>
				                  <th><center>Volume Per Kegiatan</center>
				                  <th><center>Total Nilai (Rp.)</center></th>
				                  <th><center>Keterangan</center>	
				                  <th><center>Aksi</center></th>
				                </tr>
				            </thead>
                            <tbody id="tampil_data">
                            	
                            </tbody>
                          </table>
                     </div>
                   <div class="modal-footer ">
                      <button type="button" class="btn btn-warning" data-dismiss="modal">Kembali</button>
                   </div>
                 </div>
                      <!-- /.modal-content -->
               </div>
                    <!-- /.modal-dialog -->
            </div>
          <div class="modal fade" id="modal-delete">
           <div class="modal-dialog modal-sm-danger">
              <div class="modal-content">
                 <div class="modal-header">
                 	<style type="text/css">.capitalize{text-transform: capitalize;}</style>
                     <center><h4 class="modal-title"><i class="icon fas fa-exclamation-triangle"></i></h4></center>
                 </div>
                 <div class="modal-body">
	                    <input type="hidden" id="id">
	                <center><strong>Apakah Anda Yakin Ingin Menghapus Data ? </strong></center>
	             </div>
	                   <div class="modal-footer">
	                      <button type="button" class="btn btn-info batal" data-dismiss="modal">Batalkan</button>
	                      <button type="submit" class="btn btn-danger delete" data-dismiss="modal">Ya! Hapus</button>
	                   </div>
                 </div>
                      <!-- /.modal-content -->
               </div>
                    <!-- /.modal-dialog -->
            </div>
            <div class="modal fade" id="modal-edit">
           <div class="modal-dialog modal-lg">
              <div class="modal-content">
                 <div class="modal-header">
                 	<style type="text/css">.capitalize{text-transform: capitalize;}</style>
                     <center><i class="modal-title"><i class="fas fa-network-wired"></i></i></center>
                 </div>
                 <div class="modal-body">
                    <div class="card-header">
				         <center><h3 class="card-title capitalize" id="idku"></h3></center>
				    </div>
	                	<div id="isibody"></div>    
	             	</div>
	                   <div class="modal-footer ">
	                      <button type="button" class="btn btn-info batal" data-dismiss="modal">Batalkan</button>
	                      <button type="submit" class="btn btn-danger delete" data-dismiss="modal">Ya! Hapus</button>
	                   </div>
                 </div>
                      <!-- /.modal-content -->
               </div>
                    <!-- /.modal-dialog -->
            </div>
		</div>
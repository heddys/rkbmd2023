<section class="content">
      <div class="row">
        <div class="col-12">
          <!-- <a href="<?php echo site_url('/home/rkbform');?>" class="btn btn-primary btn-flat">Tambah Kegiatan </a>
          <a href="#" class="btn btn-success btn-flat excel" disabled>Export Excel</a> -->
          <hr>
        	<div class="card">
	            <div class="card-header">
	              <h3 class="card-title">
                      <center>LIST REGISTER YANG HARUS DI VERIFIKASI - PERALATAN DAN MESIN</center></h3>
	            </div>
	            <!-- /.card-header -->
	            <div class="card-body" style="overflow-x:auto;">
	              <table id="tabel_proses_register" class="table table-bordered table-hover ">
	                <thead class="thead-dark">
	                <tr>
	                  <th><center>No.</center></th>
	                  <th><center>Register</center></th>
	                  <th><center>Kode Neraca</center></th>
	                  <th><center>Nama Barang</center></th>
	                  <th><center>Spesifikasi Barang</center></th>
	                  <th><center>Nilai Perolehan </center></th>
	                  <th><center>Aksi</center></th>
	                </tr>
	                </thead>
                  <tbody>
                    <?php $x=1; foreach ($register->result() as $row) {?>
	                	<tr>
	                  		<td><center><?php echo $x?></center></td>
	                  		<td><center><?php echo $row->register?></center></td>
	                  		<td><center><?php echo $row->kode64_baru?></center></td>
                            <td><center><?php echo $row->nama_barang?></center></td>
                            <td><center><?php echo $row->merk_alamat." - ".$row->tipe?></center></td>
                            <td><center><?php echo number_format($row->harga_baru,2,',','.');?></center></td>
	                  		<td>  
							  <form role="form" action="<?php echo site_url();?>/home_verifikator/verif_register" method="post">
                                <center>
                                  <button type="submit" class="btn btn-sm btn-info" title="Isi Form Inventarisasi"><i class="fas fa-edit"></i></a>
                                    <input type="hidden" name="register" value="<?php echo $row->register?>">
                                </center></td>
                              </form>
                            </td>
	                  	</tr>
	                  <?php $x++; }?>
	                </tbody>
	              </table>
	            </div>
	            <!-- /.card-body -->
	          </div>
	          <!-- /.card --> 
	        </div>
	        <!-- /.col -->
	      </div>
	      <!-- /.row -->

		  <div class="row">
        <div class="col-12">
          <!-- <a href="<?php echo site_url('/home/rkbform');?>" class="btn btn-primary btn-flat">Tambah Kegiatan </a>
          <a href="#" class="btn btn-success btn-flat excel" disabled>Export Excel</a> -->
          <hr>
        	<div class="card">
	            <div class="card-header">
	              <h3 class="card-title">
                      <center>LIST REGISTER YANG TELAH DI TOLAK - PERALATAN DAN MESIN</center></h3>
	            </div>
	            <!-- /.card-header -->
	            <div class="card-body" style="overflow-x:auto;">
	              <table id="tabel_tolak_register" class="table table-bordered table-hover ">
	                <thead class="thead-dark">
	                <tr>
	                  <th><center>No.</center></th>
	                  <th><center>Register</center></th>
	                  <th><center>Kode Neraca</center></th>
	                  <th><center>Nama Barang</center></th>
	                  <th><center>Spesifikasi Barang</center></th>
	                  <th><center>Nilai Perolehan </center></th>
	                  <th><center>Aksi</center></th>
	                </tr>
	                </thead>
                  <tbody>
                    <?php $x=1; foreach ($tolak->result() as $t) {?>
	                	<tr>
	                  		<td><center><?php echo $x?></center></td>
	                  		<td><center><?php echo $t->register?></center></td>
	                  		<td><center><?php echo $t->kode64_baru?></center></td>
                            <td><center><?php echo $t->nama_barang?></center></td>
                            <td><center><?php echo $t->merk_alamat." - ".$t->tipe?></center></td>
                            <td><center><?php echo number_format($t->harga_baru,2,',','.');?></center></td>
	                  		<td>  
							  <center><button type='button' class='btn btn-sm btn-warning' title='Register Masih Dalam Proses Pembenaran'><i class='fa fa-exclamation-triangle'></i></center>
                            </td>
	                  	</tr>
	                  <?php $x++; }?>
	                </tbody>
	              </table>
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
	    	<div class="modal fade" id="detail-register">
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
							<div class="isi_body"></div>
						</div>
						<div class="modal-footer ">
							<button type="button" class="btn btn-warning" data-dismiss="modal">Kembali</button>
						</div>
					</div>
				</div>
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
		</div>
	</div>
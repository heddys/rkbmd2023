<section class="content">
      <div class="row">
        <div class="col-12">
          <!-- <a href="<?php echo site_url('/home/rkbform');?>" class="btn btn-primary btn-flat">Tambah Kegiatan </a>
          <a href="#" class="btn btn-success btn-flat excel" disabled>Export Excel</a> -->
          <hr>
        	<div class="card">
	            <div class="card-header">
	              <h3 class="card-title">
                      <center>LIST PENYELIA</center></h3>
	            </div>
	            <!-- /.card-header -->
	            <div class="card-body" >
	              <table id="tabel_penyelia" class="table table-bordered table-hover">
	                <thead class="thead-dark">
						<tr>
							<th><center>No.</center></th>
							<th><center>Nama</center></th>
							<th><center>NIP</center></th>
							<th><center>Pangkat</center></th>
							<th><center>Aksi</center></th>
						</tr>
	                </thead>
                  	<tbody>
						  <?php $x=1; foreach ($penyelia as $user) {?>
						  <tr>
							  	<td><center><?php echo $x++?></center></td>
								<td><center><?php echo $user->nama?></center></td>
								<td><center><?php echo $user->nip?></center></td>
								<td><center><?php echo $user->pangkat?></center></td>
                                <td width="100px">  
									<center>
										<button class="btn btn-sm btn-success" title="Lihat List OPD" onclick="klik_detail_penyelia('<?php echo $user->nip;?>')"><i class="fas fa-eye"></i></a>
									</center>
								</td>
						  </tr>
						  <?php }?>
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
                      <center>LIST OPD</center></h3>
	            </div>
	            <!-- /.card-header -->
	            <div class="card-body" >
	              <table id="tabel_opd" class="table table-bordered table-hover">
	                <thead class="thead-dark">
						<tr>
							<th><center>No.</center></th>
							<th><center>No. Unit</center></th>
							<th><center>Nama OPD</center></th>
							<th><center>Aksi</center></th>
						</tr>
	                </thead>
                  	<tbody>
						  <?php $x=1; foreach ($opd as $id) {?>
						  <tr <?php if ($id->status == 1) {?>class='table-info'<?php } ?>>
							  	<td><center><?php echo $x++?></center></td>
								<td><center><?php echo $id->nomor_unit?></center></td>
								<td><center><?php echo $id->unit?></center></td>
                                <td width="100px">
									<center>
										<?php if ($id->status == 1) { ?>
											<button disabled="disabled" class="btn btn-sm btn-info" title="Tambahkan Ke Penyelia" onclick="klik_tambah_penyelia('<?php echo $id->id;?>')"><i class="fas fa-plus"></i></a>
										<?php } else {?> 
											<button class="btn btn-sm btn-info" title="Tambahkan Ke Penyelia" onclick="klik_tambah_penyelia('<?php echo $id->id;?>')"><i class="fas fa-plus"></i></a>
											<?php } ?>
									</center>
								</td>
						  </tr>
						  <?php }?>
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
	    	<div class="modal fade" id="list_opd_penyelia">
				<div class="modal-dialog modal-xl ">
					<div class="modal-content">
						<div class="modal-header">
							<style type="text/css">.capitalize{text-transform: capitalize;}</style>
							<div class="alert alert-success">
								<h5><b>List OPD Pemangku</b></h5>
								<h5><p class="modal-title" id="idku"></p></h5>
							</div>
						</div>
						
						<div class="modal-body" style="overflow-x:auto;">
						<div class="card-body" >
							<table id="tabel_list_opd" class="table table-bordered table-hover">
								<thead class="thead-dark">
									<tr>
										<th><center>No.</center></th>
										<th><center>No. Unit</center></th>
										<th><center>Nama OPD</center></th>
										<th><center>Aksi</center></th>
									</tr>
								</thead>
								<tbody class="isi_body">
									
								</tbody>
							</table>
							</div>
						</div>
						<div class="modal-footer ">
							<button type="button" class="btn btn-warning" data-dismiss="modal">Kembali</button>
						</div>
					</div>
				</div>
          	</div>
			  <div class="modal fade" id="list_pilih_penyelia">
				<div class="modal-dialog modal-xl ">
					<div class="modal-content">
						<div class="modal-header">
							<style type="text/css">.capitalize{text-transform: capitalize;}</style>
							<div class="alert alert-success">
								<h5></span><b>List Nama Penyelia</b></h5>
								<h5><p class="modal-title" id="data_list"></p></h5>
							</div>
						</div>
						<div class="modal-body" style="overflow-x:auto;">
						<div class="card-body" >
							<table id="tabel_penyelia2" class="table table-bordered table-hover">
								<thead class="thead-dark">
									<tr>
										<th><center>No.</center></th>
										<th><center>Nama</center></th>
										<th><center>NIP</center></th>
										<th><center>Pangkat</center></th>
										<th><center>Aksi</center></th>
									</tr>
								</thead>
								<tbody>
									<?php $x=1; foreach ($penyelia as $user) {?>
									<tr>
											<td><center><?php echo $x++?></center></td>
											<td><center><?php echo $user->nama?></center></td>
											<td><center><?php echo $user->nip?></center></td>
											<td><center><?php echo $user->pangkat?></center></td>
											<td width="100px">  
												<form role="form" action="save_opd_penyelia" method="post">
													<center>
														<button type="submit" class="btn btn-sm btn-success" ><i class="fas fa-plus"></i>
														<input type="hidden" name="nip" value="<?php echo $user->nip;?>">
														<input type="hidden" name="nama" value="<?php echo $user->nama;?>">
														<input type="hidden" name="pangkat" value="<?php echo $user->pangkat;?>">
														<input type="hidden" id="id_kamus" name="id_kamus_penyelia">
														<!-- <input type="text" name="" id="id_kamus"> -->
													</center>
												</form>
											</td>
									</tr>
									<?php }?>
								</tbody>
							</table>
							</div>
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
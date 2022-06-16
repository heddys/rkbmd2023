<section class="content">
    <div class="row">
        <div class="col-12">
          <hr>
        	<div class="card">
	            <div class="card-header">
	              <h3 class="card-title">
                      <center>LIST KODE BARANG</center></h3>
	            </div>
	            <!-- /.card-header -->
	            <div class="card-body" >
	              <table id="tabel_kodebar" class="table table-bordered table-hover">
	                <thead class="thead-dark">
						<tr>
							<th><center>No.</center></th>
							<th><center>Kode Kelompok</center></th>
							<th><center>Kelompok</center></th>
							<th><center>Kode Sub Kelompok</center></th>
							<th><center>Sub Kelompok</center></th>
							<th><center>Kode Sub Sub Kelompok</center></th>
							<th><center>Sub Sub Kelompok</center></th>
							<th><center>Aksi</center></th>
						</tr>
	                </thead>
                  	<tbody>
						  <?php $x=1; foreach ($kodebar as $row) {
							if($row->kunci == 1) {?>
						  <tr class="table-warning">
							  	<td><center><?php echo $x?></center></td>
								<td><center><?php echo $row->kode_kelompok?></center></td>
								<td><center><?php echo $row->kelompok?></center></td>
								<td><center><?php echo $row->kode_sub_kelompok?></center></td>
								<td><center><?php echo $row->sub_kelompok?></center></td>
								<td><center><?php echo $row->kode_sub_sub_kelompok?></center></td>
								<td><center><?php echo $row->sub_sub_kelompok?></center></td>
                                <td width="100px">  
									<center>
										<button class="btn btn-sm btn-info" title="Kunci Kode Sub Kelompok" onclick="klik_buka_kunci_kode('<?php echo $row->kode_sub_sub_kelompok;?>')"><i class="fa fa-unlock" aria-hidden="true"></i></a>
									</center>
								</td>
						  </tr>
						  <?php } else { ?>
							<tr>
							  	<td><center><?php echo $x?></center></td>
								<td><center><?php echo $row->kode_kelompok?></center></td>
								<td><center><?php echo $row->kelompok?></center></td>
								<td><center><?php echo $row->kode_sub_kelompok?></center></td>
								<td><center><?php echo $row->sub_kelompok?></center></td>
								<td><center><?php echo $row->kode_sub_sub_kelompok?></center></td>
								<td><center><?php echo $row->sub_sub_kelompok?></center></td>
                                <td width="100px">  
									<center>
										<button class="btn btn-sm btn-danger" title="Kunci Kode Sub Kelompok" onclick="klik_kunci_kode('<?php echo $row->kode_sub_sub_kelompok;?>')"><i class="fa fa-lock" aria-hidden="true"></i></a>
									</center>
								</td>
						  </tr>

						 <?php }$x++;}?>
	                </tbody>
	              </table>
	            </div>
	            <!-- /.card-body -->
	        </div>
	          <!-- /.card --> 
	    </div>
	        <!-- /.col -->
	</div>
</section>
	    <!-- /.content -->
	    	<div class="modal fade" id="list_detail_kode">
				<div class="modal-dialog modal-xl ">
					<div class="modal-content">
						<div class="modal-header">
							<style type="text/css">.capitalize{text-transform: capitalize;}</style>
							<div class="alert alert-success">
								<p class="modal-title" id="title"></p>
							</div>
						</div>
						
						<div class="modal-body" style="overflow-x:auto;">
						<div class="card-body" >
							<table id="tabel_rincian_kode" class="table table-bordered table-hover">
								<thead class="thead-dark">
									<tr>
										<th><center>No.</center></th>
										<th><center>Kode Sub Sub Kelompok</center></th>
										<th><center>Sub Sub Kelompok</center></th>
										<th><center>Kunci</center></th>
									</tr>
								</thead>
								<tbody class="rincian_kode">
									
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
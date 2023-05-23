<section class="content">
      <div class="row">
        <div class="col-12">
          <!-- <a href="<?php echo site_url('/home/rkbform');?>" class="btn btn-primary btn-flat">Tambah Kegiatan </a>
          <a href="#" class="btn btn-success btn-flat excel" disabled>Export Excel</a> -->
			<div class="row">	
		  		<div class="col-lg-6 col-6">	
					<div class="small-box bg-success">
						<div class="inner">
							<center><h3>Banyak User Yang Dapat Akses</h3></center>
							<center><p></p><h4><?php echo "24";?> User</h4><p></p></center>
						</div>
						<div class="icon">
							<i class="ion ion-bag"></i>
						</div>
						<a href="javascript:;" class="small-box-footer open_all">Buka Akses Semua User <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<div class="col-lg-6 col-6">	
					<div class="small-box bg-danger">
						<div class="inner">
						<center><h3>Banyak User Yang Di Kunci</h3></center>
							<center><p></p><h4><?php echo "122";?> User</h4><p></p></center>
						</div>
						<div class="icon">
							<i class="ion ion-bag"></i>
						</div>
						<a href="javascript:;" class="small-box-footer kunci_all">Kunci Akses Semua User <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
			</div>
            <hr>
        	<div class="card">
	            <div class="card-header">
	              <h3 class="card-title"><center>List Perangkat Daerah</center></h3>
	            </div>
	            <!-- /.card-header -->
	            <div class="card-body" style="overflow-x:auto;">
	              <table id="tabel_user" class="table table-bordered table-hover">
	                <thead class="thead-dark">
						<tr>
							<th><center>No.</center></th>
							<th><center>Kode Unit</center></th>
							<th><center>Nama OPD</center></th>
							<th><center>NIP</center></th>
							<th><center>Nama User</center></th>
							<th><center>Pangkat</center></th>
							<th><center>Role</center></th>
							<th><center>Detail</center></th>
						</tr>
	                </thead>
	                <tbody>
						<?php $x=1; foreach ($user as $row) {?>
	                	<tr>
							<td><center><?php echo $x;?></center></td>
							<td><center><?php echo $row->opd?></center></td>
							<td><?php echo $row->nama_opd?></td>
							<td><center><?php echo $row->nip?><center></td>
							<td><center><?php echo $row->nama?><center></td>
							<td><center><?php echo $row->pangkat?><center></td>
							<td><center><?php echo $row->fungsi?><center></td>
							<td style="width:50px">
										<span class="d-inline-block" data-toggle="tooltip" title="Kunci Semua Akses Bidang Di OPD Ini">
											<a href="javascript:;" class="btn btn-block btn-outline-danger kunci_opd" data="<?php echo $row->id?>"><i class="fa fa-lock"></i></a>
										</span>
										<span class="d-inline-block" data-toggle="tooltip" title="Kunci Semua Akses Bidang Di OPD Ini">
											<a href="javascript:;" class="btn btn-block btn-outline-danger kunci_opd" data="<?php echo $row->id?>"><i class="fa fa-lock"></i></a>
										</span>
							</td>
						</tr>
						<?php $x++;}?>
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
	    <div class="modal fade" id="rincian_user">
           <div class="modal-dialog modal-xl ">
              <div class="modal-content">
                 <div class="modal-header">
                 	<style type="text/css">.capitalize{text-transform: capitalize;}</style>
                     <center><span class="oi oi-heart"></span><h4 class="modal-title" id="idku"></h4></center>
                 </div>
                 <div class="modal-body" style="overflow-x:auto;">
                      
                          <table id="example1" class="table table-bordered table-hover">
                            <thead>
				                <tr>
				                  <th><center>No.</center></th>
				                  <th><center>Bidang</center></th>
				                  <th><center>Username</center>
				                  <th><center>Password</center></th>
				                  <th><center>Role</center></th>
				                  <th><center>Akses</center>
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
          <div class="modal fade" id="modal-kunci">
           <div class="modal-dialog modal-sm-danger">
              <div class="modal-content">
                 <div class="modal-header">
                 	<style type="text/css">.capitalize{text-transform: capitalize;}</style>
                     <center><h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i>Notifikasi !</h4></center>
                 </div>
                 <div class="modal-body">
	                    <input type="hidden" id="id_kunci">
	                <center><strong>Apakah Anda Yakin Ingin Mengunci Semua Akun Di Perangkat Daerah Tersebut ? </strong></center>
	             </div>
	                   <div class="modal-footer ">
	                      <button type="button" class="btn btn-info batal" data-dismiss="modal">Batalkan</button>
	                      <button type="submit" class="btn btn-danger kunci" data-dismiss="modal">Ya! Kunci</button>
	                   </div>
                 </div>
                      <!-- /.modal-content -->
               </div>
                    <!-- /.modal-dialog -->
            </div>


          <div class="modal fade" id="modal-buka_kunci">
           <div class="modal-dialog modal-sm-danger">
              <div class="modal-content">
                 <div class="modal-header">
                 	<style type="text/css">.capitalize{text-transform: capitalize;}</style>
                     <center><h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i>Notifikasi !</h4></center>
                 </div>
                 <div class="modal-body">
	                    <input type="hidden" id="id_buka">
	                <center><strong>Apakah Anda Yakin Ingin Membuka Semua Akun Di Perangkat Daerah Tersebut ? </strong></center>
	             </div>
	                   <div class="modal-footer ">
	                      <button type="button" class="btn btn-danger batal" data-dismiss="modal">Batalkan</button>
	                      <button type="submit" class="btn btn-success buka" data-dismiss="modal">Ya! Buka</button>
	                   </div>
                 </div>
                      <!-- /.modal-content -->
               </div>
                    <!-- /.modal-dialog -->
            </div>


          <div class="modal fade" id="modal-buka_bidang">
           <div class="modal-dialog modal-sm-danger">
              <div class="modal-content">
                 <div class="modal-header">
                 	<style type="text/css">.capitalize{text-transform: capitalize;}</style>
                     <center><h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i>Notifikasi !</h4></center>
                 </div>
                 <div class="modal-body">
	                    <input type="hidden" id="id_buka_bidang">
	                <center><strong>Apakah Anda Yakin Ingin Membuka Akun Bidang Tersebut ? </strong></center>
	             </div>
	                   <div class="modal-footer ">
	                      <button type="button" class="btn btn-danger batal" data-dismiss="modal">Batalkan</button>
	                      <button type="submit" class="btn btn-success buka_bidang" data-dismiss="modal">Ya! Buka</button>
	                   </div>
                 </div>
                      <!-- /.modal-content -->
               </div>
                    <!-- /.modal-dialog -->
            </div>

          <div class="modal fade" id="modal-kunci_bidang">
           <div class="modal-dialog modal-sm-danger">
              <div class="modal-content">
                 <div class="modal-header">
                 	<style type="text/css">.capitalize{text-transform: capitalize;}</style>
                     <center><h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i>Notifikasi !</h4></center>
                 </div>
                 <div class="modal-body">
	                    <input type="hidden" id="id_kunci_bidang">
	                <center><strong>Apakah Anda Yakin Ingin Mengunci Akun Bidang Tersebut ? </strong></center>
	             </div>
	                   <div class="modal-footer ">
	                      <button type="button" class="btn btn-danger batal" data-dismiss="modal">Batalkan</button>
	                      <button type="submit" class="btn btn-success kunci_bidang" data-dismiss="modal">Ya! Kunci</button>
	                   </div>
                 </div>
                      <!-- /.modal-content -->
               </div>
                    <!-- /.modal-dialog -->
            </div>

		<div class="modal fade" id="modal-buka-all">
           <div class="modal-dialog modal-sm-danger">
              <div class="modal-content">
                 <div class="modal-header">
                 	<style type="text/css">.capitalize{text-transform: capitalize;}</style>
                     <center><h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i>Notifikasi !</h4></center>
                 </div>
                 <div class="modal-body">
	                <center><strong>Apakah Anda Yakin Ingin Membuka Semua Akun Bidang ? </strong></center>
	             </div>
	                   <div class="modal-footer ">
	                      <button type="button" class="btn btn-danger batal" data-dismiss="modal">Batalkan</button>
	                      <button type="submit" class="btn btn-success buka_all" data-dismiss="modal">Ya! Buka</button>
	                   </div>
                 </div>
                      <!-- /.modal-content -->
               </div>
                    <!-- /.modal-dialog -->
        	</div>

          <div class="modal fade" id="modal-kunci-all">
           <div class="modal-dialog modal-sm-danger">
              <div class="modal-content">
                 <div class="modal-header">
                 	<style type="text/css">.capitalize{text-transform: capitalize;}</style>
                     <center><h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i>Notifikasi !</h4></center>
                 </div>
                 <div class="modal-body">
	                <center><strong>Apakah Anda Yakin Ingin Mengunci Semua Akun Bidang ? </strong></center>
	             </div>
	                   <div class="modal-footer ">
	                      <button type="button" class="btn btn-danger batal" data-dismiss="modal">Batalkan</button>
	                      <button type="submit" class="btn btn-success kunci_all" data-dismiss="modal">Ya! Kunci</button>
	                   </div>
                 </div>
                      <!-- /.modal-content -->
               </div>
                    <!-- /.modal-dialog -->
        	</div>



</div>
						</div>

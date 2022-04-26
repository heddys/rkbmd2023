
<section class="content">
      <div class="row">

      <div class="col-12">
          
          <hr>
        	<div class="card">
	            <div class="card-header">
	              <h3 class="card-title">
                      <center>STATUS REGISTER SUDAH BISA CETAK FORM - PERALATAN DAN MESIN</center></h3>
                      
	            </div>
	            <!-- /.card-header -->
	            <div class="card-body">
	              <table id="tabel_cetak2" class="table table-bordered table-hover">
	                <thead class="thead-dark">
	                <tr>
	                  <th><center>No.</center></th>
	                  <th><center>Register</center></th>
	                  <th><center>Kode Neraca</center></th>
	                  <th><center>Nama Barang</center></th>
	                  <th><center>Merk / Tipe Barang</center></th>
	                  <th><center>Nilai Perolehan </center></th>
	                  <th><center>Cetak</center></th>
					  <th><center>Edit Data</center></th>
	                </tr>
	                </thead>
                  <tbody>
                    <?php $x=1; foreach ($cetak->result() as $c) {?>
	                	<tr>
	                  		<td><center><?php echo $x?></center></td>
	                  		<td><center><?php echo $c->register?></center></td>
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
	            </div>
                
	            <!-- /.card-body -->
	          </div>
	          <!-- /.card --> 
	        </div>
	        <!-- /.col -->

            
	      </div>
	      <!-- /.row -->


        <div class="col-12">   
          <hr>
        	<div class="card">
	            <div class="card-header">
	              <h3 class="card-title">
                      <center>STATUS REGISTER PROSES VERIFIKASI <button type='button' class='btn btn-sm btn-warning' title='Register Masih Dalam Proses Verifikasi'><i class='fa fa-exclamation-triangle'></i></button> / REGISTER DI TOLAK <button type="button" class="btn btn-sm btn-info" title="Edit Form Inventarisasi"><i class="far fa-edit"></i></button></center></h3>
                      
	            </div>
	            <!-- /.card-header -->
	            <div class="card-body">
	              <table id="tabel_proses_verif2" class="table table-bordered table-hover">
	                <thead>
	                <tr>
	                  <th><center>No.</center></th>
	                  <th><center>Register</center></th>
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
                                </center></td>
                              </form>
							 <?php } else { echo "<center><button type='button' class='btn btn-sm btn-warning' title='Register Masih Dalam Proses Verifikasi'><i class='fa fa-exclamation-triangle'></i></center>";}?>
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
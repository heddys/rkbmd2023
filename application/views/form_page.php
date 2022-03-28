<section class="content">
      <div class="row">
        <div class="col-12">
          <!-- <a href="<?php echo site_url('/home/rkbform');?>" class="btn btn-primary btn-flat">Tambah Kegiatan </a>
          <a href="#" class="btn btn-success btn-flat excel" disabled>Export Excel</a> -->
          <hr>
        	<div class="card">
	            <div class="card-header">
	              <h3 class="card-title">
                      <center>KARTU INVENTARIS BARANG - 
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
	              <table id="example1" class="table table-bordered table-hover ">
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
                    <?php $x=1; foreach ($register->result() as $row) {?>
	                	<tr>
	                  		<td><center><?php echo $x?></center></td>
	                  		<td><center><?php echo $row->register?></center></td>
	                  		<td><center><?php echo $row->kode64_baru?></center></td>
                            <td><center><?php echo $row->nama_barang_baru?></center></td>
                            <td><center><?php echo $row->merk_alamat_baru." - ".$row->tipe_baru?></center></td>
                            <td><center><?php echo $row->harga_baru?></center></td>
	                  		<td>
                                <center>
	                  		        <a href="<?php echo site_url('/Form_inv/isi_formulir');?>" class="btn btn-sm btn-success rincian_kegiatan" data="<?php echo $row->register?>" ><i class="far fa-eye"></i></a>
                    	        </center></td>
	                  	</tr>
	                  <?php $x++; }?>
	                <tbody>
	                
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
	    <div class="modal fade" id="modal-xl">
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
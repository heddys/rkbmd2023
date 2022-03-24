<section class="content">
      <div class="row">
        <div class="col-12">
          <!-- <a href="<?php echo site_url('/home/rkbform');?>" class="btn btn-primary btn-flat">Tambah Kegiatan </a>
          <a href="#" class="btn btn-success btn-flat excel" disabled>Export Excel </a>
          <hr> -->
        	<div class="card">
	            <div class="card-header">
	              <h3 class="card-title"><center>Tabel Rencana Kebutuhan Barang Aset Tetap</center></h3>
	            </div>
	            <!-- /.card-header -->
	            <div class="card-body" style="overflow-x:auto;">
	              <table id="example1" class="table table-bordered table-hover">
	                <thead>
	                <tr>
	                  <th><center>No.</center></th>
	                  <th><center>OPD</center></th>
	                  <th><center>Kode Rekening</center></th>
	                  <th><center>Nama Barang</center></th>
	                  <th><center>Volume</center></th>
	                  <th><center>Nilai (Rp.)</center></th>
	                  <th><center>Jumlah Kegiatan</center></th>
	                  <th><center>Action</center></th>
	                </tr>
	                </thead>
	                <tbody>
	               		<?php $x=1;
	                foreach ($data_budget->result() as $row) {?>
	                <tr>
	                  <td><center><?php echo $x;?></center></td>
	                  <td align="left"><?php echo $row->unit_name;?></td>
	                  <td><center><?php echo $row->rekening_kode;?></center></td>
	                  <td><?php echo $row->komp_name;?></td>
	                  <td><?php echo $row->vol." ".$row->satuan;?></td>
	                  <td><?php echo number_format($row->nilai,2,',','.');?></td>
	                  <td><center><?php echo $row->jumkeg;?></center></td>
	                  <td>
	                  	<center>
	                  		<a href="javascript:;" class="btn btn-sm btn-success rincian_kegiatan" data="<?php echo $row->id;?>" ><i class="far fa-eye"></i></a>
                    	</center>
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
	    <div class="modal fade" id="modal-xl">
           <div class="modal-dialog modal-xl ">
              <div class="modal-content">
                 <div class="modal-header">
                 	<style type="text/css">.capitalize{text-transform: capitalize;}</style>
                     <center><h4 class="modal-title"><i class="fas fa-network-wired"></i> List Komponen</h4></center>
                 </div>
                 <div class="modal-body" style="overflow-x:auto;">
                    <style type="text/css"> #modal-body</style>
                      <div class="card-header">
				         <center><h3 class="card-title capitalize" id="idku"></h3></center><hr>
				      </div>
                          <table id="example1" class="table table-bordered table-hover">
                            <thead>
                            	<tr>
                            	   <th><center>No.</center></th>	
					               <th><center>Kode Kegiatan</center></th>
					               <th><center>Nama Kegiatan</center></th>
					               <th><center>Saldo Per Kegiatan</center></th>
					               <th><center>Total Nilai (Rp.)</center></th>
					               <th><center>Keterangan</center></th>
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
                     <center><h4 class="modal-title"><i class="fas fa-network-wired"></i>Notice!!!</h4></center>
                 </div>
                 <div class="modal-body">
                    <style type="text/css"> #modal-body</style>
	                    <input type="hidden" id="id">
	                <center><strong>Apakah Anda Yakin Ingin Menghapus Data ? </strong></center>
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
            <div class="modal fade" id="modal-edit">
           <div class="modal-dialog modal-lg">
              <div class="modal-content">
                 <div class="modal-header">
                 	<style type="text/css">.capitalize{text-transform: capitalize;}</style>
                     <center><h4 class="modal-title"><i class="fas fa-network-wired"></i></h4></center>
                 </div>
                 <div class="modal-body">
                    <style type="text/css"> #modal-body</style>
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
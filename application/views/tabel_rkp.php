<section class="content">
      <div class="row">
        <div class="col-12">
          <a href="<?php echo site_url('/home/rkpform');?>" class="btn btn-primary btn-flat">Tambah Kegiatan </a>
          <a href="#" class="btn btn-success btn-flat excel">Export Excel </a>
          <hr>
        	<div class="card">
	            <div class="card-header">
	              <h3 class="card-title"><center>List Data Kegiatan - Rencana Kebutuhan Barang Persediaan</center></h3>
	            </div>
	            <!-- /.card-header -->
	            <div class="card-body" style="overflow-x:auto;">
	              <table id="example1" class="table table-bordered table-hover">
	                <thead>
	                <tr>
	                  <th><center>No.</center></th>
	                  <th><center>Waktu Update</center></th>
	                  <th><center>Kode Kegiatan</center></th>
	                  <th><center>Nama Kegiatan</center></th>
	                  <th><center>Aksi</center></th>
	                </tr>
	                </thead>
	                <tbody>
	                <?php $x=1;
	                if ($tabel_rkb == false){
	                	?></tbody><?php } else {
	                foreach ($tabel_rkb->result() as $row) {?>
	                <tr <?php if (in_array($row->id_kegiatan, $minuskeg)) { ?> class="table-danger" <?php }?> >
	                  <td><center><?php echo $x;?></center></td>
	                  <td><center><?php echo $row->date;?></center></td>
	                  <td><center><?php echo $row->kode_kegiatan;?></center></td>
	                  <td><?php echo $row->nama_kegiatan;?></td>
	                  <td>
	                  	<center>
	                  		<a href="javascript:;" class="btn btn-sm btn-success rincian_kegiatan" data="<?php echo $row->id_kegiatan?>" ><i class="far fa-eye"></i></a>
                    	</center>
                      </td>
	                </tr>
	            	<?php $x++; }}?>
	                </tbody>
	              </table>
	            </div>
	            <!-- /.card-body -->
	          </div>
	          <!-- /.card -->
	        </div>
	        <!-- /.col -->
	       <input type="hidden" id="kodeopd" value="<?php echo $this->session->userdata('kode_opd');?>">
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
                 <div class="modal-body">
                    <style type="text/css"> #modal-body</style>
                      <div class="card-header">
				         <center><h3 class="card-title capitalize" id="idku"></h3></center><hr>
				      </div>
				      	<div style="overflow-x:auto;">
                          <table id="example1" class="table table-bordered table-hover" >
                            <thead>
                            	<tr>	
					               <th><center>Kode Komponen</center></th>
					               <th><center>Nama Komponen</center></th>
					               <th><center>Register</center></th>
					               <th><center>Merek / Tipe</center></th>
					               <th><center>Saldo Ideal</center></th>
					               <th><center>Existing</center></th>
					               <th><center>Kebutuhan</center></th>
					               <th><center>Saldo Komponen Pada Kegiatan</center></th>
					               <th><center>Satuan</center></th>
					               <th><center>Keterangan</center></th>
					               <th><center>Aksi</center></th>
					             </tr>
                            </thead>
                            <tbody id="tampil_data">	
                            </tbody>
                          </table>
                      	</div>
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

            <div class="modal fade" id="modal-inforeg">
           <div class="modal-dialog modal-xl">
              <div class="modal-content">
                 <div class="modal-header">
                 	<style type="text/css">.capitalize{text-transform: capitalize;}</style>
                     <center><h4 class="modal-title"><i class="fas fa-info-circle"></i> &nbsp Info Register</h4></center>
                 </div>
                 <div class="modal-body">
                    <style type="text/css"> #modal-body</style>
	                    <input type="hidden" id="id">
	                <div style="overflow-x:auto;">
                          <table class="table table-bordered table-hover" >
                            <thead>
                            	<tr>
                                  <th><center>Register</center></th>
                                  <th><center>Nama Barang</center></th>
                                  <th><center>Tahun</center></th>
                                  <th><center>Merek</center></th>
                                  <th><center>Tipe</center></th>
                                </tr>
                            </thead>
                            <tbody id="tampil_data">	
                            </tbody>
                          </table>
                      	</div>
	             </div>
	                   <div class="modal-footer ">
	                      <button type="button" class="btn btn-info batal" data-dismiss="modal" data-toggle="modal" data-target="#modal-xl" >Kembali</button>
	                   </div>
                 </div>
                      <!-- /.modal-content -->
               </div>
                    <!-- /.modal-dialog -->
            </div>

            

            <div class="modal fade" id="modal-edit">
	           <div class="modal-dialog modal-l
	           g">
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
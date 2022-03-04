<section class="content">
      <div class="row">
        <div class="col-12">
          <a href="<?php echo site_url('/home/rkbform');?>" class="btn btn-primary btn-flat">Tambah Kegiatan </a>
          <a href="#" class="btn btn-success btn-flat excel" disabled>Export Excel</a>
          <hr>
        	<div class="card">
	            <div class="card-header">
	              <h3 class="card-title"><center>List Data Kegiatan - Rencana Kebutuhan Barang Aset</center></h3>
	            </div>
	            <!-- /.card-header -->
	            <div class="card-body" style="overflow-x:auto;">
	              <table id="example1" class="table table-bordered table-hover">
	                <thead>
	                <tr>
	                  <th><center>No.</center></th>
	                  <th><center>Kode Rekening</center></th>
	                  <th><center>Nama Barang</center></th>
	                  <th><center>Usulan</center></th>
	                  <th><center>Volume Existing</center></th>
	                  <th><center>Volume Ideal</center></th>
	                  <th><center>Satuan</center></th>
	                  <th><center>Total Nilai (Rp.)</center></th>
	                  <th><center>Aksi</center></th>
	                </tr>
	                </thead>
	                <tbody>
	                <?php $x=1;
	                if ($tabel_rkb == false){
	                	?></tbody><?php } else {
	                foreach ($tabel_rkb->result() as $row) {?>
	                <tr <?php if (in_array($row->id_komponen, $minuskomp)) { ?> class="table-danger" <?php }?> >
	                  <td><center><?php echo $x;?></center></td>
	                  <td><center><?php echo $row->kode_rekening;?></center></td>
	                  <td><center><?php echo $row->nama_komponen;?></center></td>
	                  <td><center><?php echo $row->volume;?></center></td>
	                  <td><center><?php echo $row->saldo_existing_komponen;?></center></td>
	                  <td><center><?php echo $row->saldo_ideal_komponen;?></center></td>
	                  <td><center><?php echo $row->satuan;?></center></td>
	                  <td class="text-right"><?php echo number_format($row->nilai*$row->volume,2,',','.');?></td>
	                  <td>
	                  	<center>
	                  		<a href="javascript:;" class="btn btn-sm btn-success rincian_kegiatan" data="<?php echo $row->id_komponen?>" ><i class="far fa-eye"></i></a>
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
	      </div>
	      <!-- /.row -->
	    </section>
	    <!-- /.content -->
	    <div class="modal fade" id="modal-xl">
           <div class="modal-dialog modal-xl ">
              <div class="modal-content">
                 <div class="modal-header">
                 	<style type="text/css">.capitalize{text-transform: capitalize;}</style>
                     <center><span class="oi oi-heart"></span><h3 class="modal-title" id="idku"></h3></center>
                 </div>
                 <div class="modal-body" style="overflow-x:auto;">
                    <style type="text/css"> #modal-body </style>
                      
                          <table id="example1" class="table table-bordered table-hover">
                            <thead>
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
                     <center><h4 class="modal-title"><i class="fas fa-network-wired"></i>Notice!!!</h4></center>
                 </div>
                 <div class="modal-body">
                    <style type="text/css"> #modal-body </style>
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
                    <style type="text/css"> #modal-body </style>
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
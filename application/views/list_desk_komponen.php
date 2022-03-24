<section class="content">
      <div class="row">
        <div class="col-12">
          <hr>
        	<div class="card">
	            <div class="card-header">
	              <h3 class="card-title"><center>LIST DATA BARANG EKSISTING</center></h3>
	            </div>
	            <!-- /.card-header -->
	            <div class="card-body" style="overflow-x:auto;">
	              <table id="example1" class="table table-bordered table-hover">
	                <thead>
	                <tr>
	                  <th><center>No.</center></th>
	                  <th><center>Kode Komponen</center></th>
	                  <th><center>Nama Komponen</center></th>
	                  <th><center>Merek dan Spek</center></th>
	                  <th><center>Saldo Eksisting</center></th>
	                  <th><center>Aksi</center></th>
	                </tr>
	                </thead>
	                <tbody>
	                <?php $x=1;
	                if ($tabel_rkb == false){
	                	?></tbody><?php } else {
	                foreach ($tabel_rkb->result() as $row) {?>
	                <tr <?php if ($row->updated == "false"){?>class="table-warning" <?php } else if ($row->updated == "lebih") {?> class="table-danger" <?php } else{} ?> >
	                  <td><center><?php echo $x;?></center></td>
	                  <td><center><?php echo $row->kode_komponen;?></center></td>
	                  <td><center><?php echo $row->nama_komponen;?></center></td>
	                  <td><?php echo $row->merek." - ".$row->spek1." - ".$row->spek2;?></td>
	                  <td><center><?php echo $row->saldo_existing;?></center></td>
	                  <td>
	                  	<center>
	                  		<a href="javascript:;" class="btn btn-sm btn-success rincian_kegiatan" data="<?php echo $row->id_komponen?>" ><i class="fas fa-search"></i></a>
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
        <input type="hidden" id="kodeopd" value="<?php echo $this->session->userdata('kode_opd');?>">
        
	      <!-- /.row -->
	    </section>
	    <!-- /.content -->
	    <div class="modal fade" id="modal-xl">
           <div class="modal-dialog modal-xl ">
              <div class="modal-content">
                 <div class="modal-header">
                 	<style type="text/css">.capitalize{text-transform: capitalize;}</style>
                     <center><h4 class="modal-title"><i class="fas fa-network-wired"></i> List Barang Eksisting</h4></center>
                 </div>
                 <div class="modal-body" style="overflow-x:auto;">
                    <style type="text/css"> #modal-body</style>
                      <div class="card-header">
				         <h3 class="card-title capitalize" id="idku"></h3><button class="btn btn-primary btn-flat" id="tmbahrincian">Tambah Rincian </button><hr>
				      </div>
                          <table class="table table-bordered table-hover">
                            <thead>
                            	<tr>	
					               <th><center>Register</center></th>
					               <th><center>Kondisi Barang</center></th>
					               <th><center>Pemanfaatan</center></th>
					               <th><center>Digunakan Oleh</center></th>
					               <th><center>Keterangan</center></th>
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
                    <style type="text/css"> #modal-body</style>
	                    <input type="hidden" id="id">
                      <input type="hidden" id="idkomp">
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
           <div class="modal fade" id="modal-tambah">
           <div class="modal-dialog modal-lg">
              <div class="modal-content">
                 <div class="modal-header">
                 	<style type="text/css">.capitalize{text-transform: capitalize;}</style>
                     <center><h4 class="modal-title"><i class="fas fa-network-wired"></i> Rincian Eksisting Barang</h4></center>
                 </div>
                 <div class="modal-body">
                    <style type="text/css"> #modal-body</style>
                    <div class="card-header">
				          <center><h3 class="card-title capitalize" id="idku"></h3></center>
      				    </div>
      				    <form role="form" action="saverincianexist" method="post">
      				      <div class="form-group form_input">
                      <!--<input type="hidden" id="regsave" name="regsave">
                      <input type="hidden" id="idsementara" name="idsementara">-->
                      <div id="isi_exist">
                        
                      </div>
                        </div>   
      	                   <div class="modal-footer ">
      	                      <button type="button" class="btn btn-danger batal" data-dismiss="modal">Kembali</button>
      	                      <button type="submit" class="btn btn-info save" >Simpan</button>
      	                   </div>
      	               </form>
                       </div>
                       </div>
                      <!-- /.modal-content -->
               </div>
             </div>
           </div>

           <div class="modal fade" id="modal-carireg">
                        <div class="modal-dialog modal-dialog modal-dialog-centered modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <center><h4 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Silahkan Isi Data Berikut</h4></center>
                          </div>
                          <style type="text/css"> #modal-body
                          </style>
                           <div class="modal-body">
                           <div class="card-body" style="overflow-x:auto;">
                            <p><label>Pilih Kode Barang : </label><br>
                              <div class="form-group">
                              <select class="form-control select2" id="select_kodebar" onchange="get_tabel()" required>
                                <option></option>
                                <option disabled="disabled">Pilih Jenis Kegiatan</option>
                                <?php foreach ($get_kodebar->result() as $kode ) {?>
                                  <option value="<?php echo $kode->kode_sub_sub_kelompok?>"><?php echo $kode->sub_kelompok?> - <?php echo $kode->sub_sub_kelompok?></option>
                                <?php } ?>
                              </select><p>
                              </div>
                              <hr>
                              <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                  <th><center>Register</center></th>
                                  <th><center>Nama Barang</center></th>
                                  <th><center>Merek</center></th>
                                  <th><center>Tipe</center></th>
                                  <th><center>Aksi</center></th>
                                </tr>
                                </thead>
                               <tbody id="tampil_tabel">
                              </tbody>
                              </table>
                           </div>
                           </div>
                          
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger back" data-dismiss="modal">Exit</button>
                          </div>
                          </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog --> 
                  </div>  
                </div>



            </div>
		</div>
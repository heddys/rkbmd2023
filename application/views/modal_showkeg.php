  	    <div class="modal fade" id="modal-lg">
           <div class="modal-dialog modal-lg">
              <div class="modal-content">
                 <div class="modal-header">
                     <center><h4 class="modal-title"><i class="fas fa-network-wired"></i> Nama Kegiatan</h4></center>
                 </div>
                 <div class="modal-body">
                    <style type="text/css"> #modal-body</style>
                      <div class="card-header">
				                  <center><h3 class="card-title" id="idku"></h3></center><hr>
				              </div>
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                            	<tr>
					               <th><center>No.</center></th>
					               <th><center>Waktu Update</center></th>
					               <th><center>Kode Kegiatan</center></th>
					               <th><center>Nama Kegiatan</center></th>
					             </tr>
                            </thead>
                            <tbody>
					           <?php $x=1; 
					              foreach ($getdata->result() as $row) {?>
					                <tr>
					                  <td><center><?php echo $x;?></center></td>
					                  <td><center><?php echo $row->kode_komponen;?></center></td>
					                  <td><?php echo $row->nama_komponen;?></td>
					                  <td><?php echo $row->spek1;?></td>
                          </tr>
                      <?php $x++; }?>
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
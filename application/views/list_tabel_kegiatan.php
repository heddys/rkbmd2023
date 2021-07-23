<section class="content">
      <div class="row">
        <div class="col-12">
          <hr>
        	<div class="card">
	            <div class="card-header">
	              <h3 class="card-title"><center>List Data Kegiatan</center></h3>
	            </div>
	            <!-- /.card-header -->
	            <div class="card-body" style="overflow-x:auto;">
	              <table id="example1" class="table table-bordered table-hover">
	                <thead>
	                <tr>
	                  <th><center>No.</center></th>
	                  <th><center>Tahun</center></th>
	                  <th><center>Kode Kegiatan</center></th>
	                  <th><center>Nama Kegiatan</center></th>
	                </tr>
	                </thead>
	                <tbody>
	                	 <?php $x=1; foreach ($get_keg->result() as $row) {?>
	                	<tr>
	                  		<td><center><?php echo $x?></center></td>
	                  		<td><center><?php echo $row->tahun?></center></td>
	                  		<td><center><?php echo $row->kode_kegiatan?></center></td>
	                  		<td><?php echo $row->nama_kegiatan?></td>
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
	</div>
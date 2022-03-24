<section class="content">
      <div class="row">
        <div class="col-12">
          <hr>
        	<div class="card">
	            <div class="card-header">
	              <h3 class="card-title"><center>List Data Komponen - Khusus 5.2.2</center></h3>
	            </div>
	            <!-- /.card-header -->
	            <div class="card-body" style="overflow-x:auto;">
	              <table id="example1" class="table table-bordered table-hover">
	                <thead>
	                <tr>
	                  <th><center>No.</center></th>
	                  <th><center>Kode Komponen</center></th>
	                  <th><center>Kode Rekening</center></th>
	                  <th><center>Nama Komponen</center></th>
	                  <th><center>Spek</center></th>
	                  <th><center>Merek</center></th>
	                  <th><center>Satuan</center></th>
	                  <th><center>Nilai</center></th>
	                  <th><center>Rincian Kode Rekening</center></th>



	                </tr>
	                </thead>
	                <tbody>
	                	 <?php $x=1; foreach ($get_keg->result() as $row) {?>
	                	<tr>
	                  		<td><center><?php echo $x?></center></td>
	                  		<td><center><?php echo $row->kode_komponen?></center></td>
	                  		<td><?php echo $row->kode_rekening?></td>
	                  		<td><?php echo $row->nama_komponen?></td>
	                  		<td><?php echo $row->spek1." - ".$row->spek2?></td>
	                  		<td><?php echo $row->merek?></td>
	                  		<td><?php echo $row->satuan?></td>
	                  		<td><?php echo "Rp.".number_format($row->nilai,2,',','.')?></td>
	                  		<td><?php echo $row->rincian_kode_rek?></td>

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
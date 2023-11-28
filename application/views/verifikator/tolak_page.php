
<section class="content">
    <div class="row">
        <div class="col-12">
          <!-- <a href="<?php echo site_url('/home/rkbform');?>" class="btn btn-primary btn-flat">Tambah Kegiatan </a>
          <a href="#" class="btn btn-success btn-flat excel" disabled>Export Excel</a> -->
          <hr>
        	<div class="card">
	            <div class="card-header">
	              <h3 class="card-title">
				  <center>LIST REGISTER YANG DI TOLAK - <?php if ($kib_apa == 1) { 
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
	              <table id="tabel_tolak_register" class="table table-bordered table-hover ">
	                <thead class="thead-dark">
	                <tr>
	                  <th><center>No.</center></th>
	                  <th><center>Register</center></th>
	                  <th><center>Lokasi</center></th>
	                  <th><center>Kode Neraca</center></th>
	                  <th><center>Nama Barang</center></th>
	                  <th><center>Spesifikasi Barang</center></th>
	                  <th><center>Nilai Perolehan </center></th>
	                  <th><center>Aksi</center></th>
	                </tr>
	                </thead>
                  <tbody>
                    <?php $x=1; foreach ($tolak->result() as $t) {?>
	                	<tr>
	                  		<td><center><?php echo $x?></center></td>
	                  		<td><center><?php echo $t->register?></center></td>
	                  		<td><center><?php echo $t->lokasi?></center></td>
	                  		<td><center><?php echo $t->kode64_baru?></center></td>
                            <td><center><?php echo $t->nama_barang?></center></td>
                            <td><center><?php echo $t->merk_alamat." - ".$t->tipe?></center></td>
                            <td><center><?php echo number_format($t->harga_baru,2,',','.');?></center></td>
	                  		<td>  
							  <center><button type='button' class='btn btn-sm btn-warning' title='Register Masih Dalam Proses Pembenaran'><i class='fa fa-exclamation-triangle'></i></center>
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
 </div>
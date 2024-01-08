<section class="content">
      <div class="row">
        <div class="col-12" id="main">
          <!-- <a href="#" class="btn btn-warning btn-flat add_pengadaan">Check Data Penambahan Register</a> -->
          <!-- <?php echo $dummy['data']; ?> -->
          <hr>
        	<div class="card">
	            <div class="card-header">
	              <h3 class="card-title">
                      <center>KARTU INVENTARIS BARANG  - LIST KENDARAAN PD</center></h3>
	            </div>
	            <!-- /.card-header -->
	          <div class="card-body" style="overflow-x:auto;">
               <table id="tabel_kendaraan" class="table table-bordered table-hover ">
                 <thead class="thead-dark"> 
	                <tr>
                        <th><center>No.</center></th>
                        <th><center>Lokasi</center></th>
                        <th><center>Register</center></th>
                        <th><center>Kode Neraca</center></th>
                        <th><center>Nama Barang</center></th>
                        <th><center>Merk dan Tipe</center></th>
                        <th><center>Nopol</center></th>
                        <th><center>No. Rangka </center></th>
                        <th><center>No. Mesin</center></th>
                        <th><center>Tahun Pengadaan</center></th>
                        <th><center>Nilai (Rp.)</center></th>
	                    <th><center>Aksi</center></th>
	                </tr>
	                </thead>
                  <tbody>
                    <?php $x=1; foreach ($data_kendaraan as $row) {?>
	                	<tr>
	                  		<td><center><?php echo $x++;?></center></td>
                            <td><center><?php echo $row->lokasi;?></center></td>
	                  		<td><center><?php echo $row->register;?></center></td>
	                  		<td><center><?php echo $row->kode64_baru;?></center></td>
                            <td><center><?php echo $row->nama_barang_baru;?></center></td>
                            <td><center><?php echo $row->merk_alamat_baru." - ".$row->tipe_baru;?></center></td>
                            <td><center><?php echo $row->nopol;?></center></td>
                            <td><center><?php echo $row->no_rangka_seri;?></center></td>
                            <td><center><?php echo $row->no_mesin;?></center></td>
                            <td><center><?php echo $row->tahun_pengadaan;?></center></td>
                            <td><center><?php echo number_format($row->harga_baru,2,',','.');?></center></td>
	                  		<td>  
                              <form role="form" action="<?php echo site_url();?>/home_admin/isi_form_kendaraan" method="post">
                                <center>
                                  <button type="submit" class="btn btn-sm btn-info" title="Isi Form Inventarisasi"><i class="fas fa-edit"></i></a>
                                  <input type="hidden" name="register" value="<?php echo $row->register?>">
                                </center></td>
                              </form>
	                  	</tr>
	                  <?php }?>
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
        </div>
	    </section>
	    <!-- /.content -->  
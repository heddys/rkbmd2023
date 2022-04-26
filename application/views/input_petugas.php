
<section class="content">
    <div class="row">
        <div class="col-12">
            <button type="button" class="btn btn-lg btn-success" data-toggle="modal" data-target="#exampleModal"><i class="far fa-plus-square"></i> &nbsp;&nbsp;Tambah Petugas</button> 
          <hr>
        	<div class="card">
	            <div class="card-header">
	              <h3 class="card-title">
                      <center>LIST PETUGAS INVENTARISASI - <?php echo $this->session->userdata('no_lokasi_asli');?></center></h3>   
	            </div>
	            <!-- /.card-header -->
	            <div class="card-body" style="overflow-x:auto;">
	              <table id="tabel_petugas" class="table table-bordered table-hover ">
	                <thead class="thead-dark" >
	                <tr>
	                  <th><center>No.</center></th>
	                  <th><center>Nama Petugas</center></th>
                      <th><center>Lokasi</center></th>
	                  <th><center>NIP / NIK</center></th>
	                  <th><center>Pangkat</center></th>
	                  <th><center>Aksi</center></th>
	                </tr>
	                </thead>
                    <tbody>
                    <?php $x=1; foreach ($petugas->result() as $row) {?>
	                	<tr>
	                  		<td><center><?php echo $x?></center></td>
	                  		<td><center><?php echo $row->nama_petugas?></center></td>
                              <td><center><?php echo $row->lokasi?></center></td>
	                  		<td><center><?php echo $row->nip_petugas?></center></td>
                            <td><center><?php echo $row->pangkat_petugas?></center></td>
                            <td><center><a class="btn btn-danger" href="<?php echo site_url('/form_inv/hapus_petugas/'.$row->id);?>"><i class="fa fa-trash" aria-hidden="true"></i></a></center></td>
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

    <div class="modal fade" id="exampleModal"  data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Isi Data Petugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form role="form" action="<?php echo site_url();?>/form_inv/simpan_petugas" method="post">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Nama Petugas</label>
                                <input type="text" name="nama_petugas" class="form-control" placeholder="Input Nama Petugas" required>
                            </div>
                            <div class="form-group">
                                <label>NIP / NIK Petugas</label>
                                <input type="text" name="nip" class="form-control" placeholder="Input NIP Jika PNS dan NIK Jika Non PNS" required>
                            </div>

                            <!-- select -->
                            <div class="form-group">
                                <label>Pilih Pangkat :</label>
                                <select class="form-control" name="pangkat" required>
                                    <option></option>
                                    <option disabled="disabled">Pilih Jenis Pangkat</option>
                                    <?php foreach ($pangkat->result() as $data ) {?>
                                        <option value="<?php echo $data->PANGKAT;?>"><?php echo $data->PANGKAT;?></option>
                                    <?php } ?> 
                                </select>
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Pilih Lokasi Petugas :</label>
                                <select class="form-control select_lokasi"  name="lokasi" required style="width: 300%">
                                    <option selected disable="disabled"></option>
                                    <option disabled="disabled">Pilih Lokasi</option>
                                    <?php foreach ($lokasi->result() as $lok ) {?>
                                        <option value="<?php echo $lok->nomor_lokasi;?>"><?php echo $lok->lokasi;?></option>
                                    <?php } ?> 
                                </select>
                            </div>
                        
                        <!-- /.card-body -->
                    </div>
            </div><!-- Modal Body -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>

          
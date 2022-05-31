
<section class="content">
    <div class="row">
        <div class="col-12">
            <button type="button" class="btn btn-lg btn-success" data-toggle="modal" data-target="#exampleModal"><i class="far fa-plus-square"></i> &nbsp;&nbsp;Tambah Petugas</button>

            
                <button type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#show_sk"><i class="fa fa-upload" aria-hidden="true"></i>  &nbsp; Upload SP Petugas</button>
            
            <!-- <button type="button" class="btn btn-lg btn-warning" onclick="show_sk()"><i class="fa fa-address-book"></i> &nbsp;&nbsp;Lihat SP Petugas Inventarisasi</button> -->
            <?php if($cek_exist_sk > 0) {?>
                <a href="<?php echo base_url();?>/ini_assets/sk_petugas_inv/<?php echo $dokumen_sk->nama_file_sk?>" target="_blank" rel="noopener noreferrer" class="btn btn-lg btn-warning" type="button"><i class="fa fa-address-book"></i> &nbsp;&nbsp;Lihat SP Petugas Inventarisasi</a>
            <?php }?>
          <hr>
        	<div class="card">
	            <div class="card-header">
	              <h3 class="card-title">
                      <center>LIST PETUGAS INVENTARISASI</center></h3>   
	            </div>
	            <!-- /.card-header -->
	            <div class="card-body" style="overflow-x:auto;">
	              <table id="tabel_petugas" class="table table-bordered table-hover dataTable js-exportable">
	                <thead class="thead-dark" >
	                <tr>
	                  <th><center>No.</center></th>
	                  <th><center>Nama Petugas</center></th>
                      <th><center>Lokasi</center></th>
	                  <th><center>NIP / NIK</center></th>
	                  <th><center>Pangkat</center></th>
	                  <th><center>Edit</center></th>
                      <th><center>Hapus</center></th>
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
                            <td style="width:50px">
                                <center><a class="btn btn-info" href="#"><i onclick="get_data_petugas(<?php echo $row->id?>)" class="fa fa-align-justify" title="Edit Data Pegawai"></i></a></center>
                            </td>
                            <td style="width:50px">
                                <center><a class="btn btn-danger" href="<?php echo site_url('/form_inv/hapus_petugas/'.$row->id);?>"><i class="fa fa-trash" aria-hidden="true" title="Hapus Data Pegawai"></i></a></center>
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
                                <input type="number" name="nip" class="form-control" maxlength="10" placeholder="Input NIP Jika PNS dan NIK Jika Non PNS" required>
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

<div class="modal fade" id="edit_modal"  data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                        <form role="form" action="<?php echo site_url();?>/form_inv/update_petugas" method="post">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Nama Petugas</label>
                                <input type="text" name="nama_petugas" id="nama" class="form-control" placeholder="Input Nama Petugas" required>
                            </div>
                            <div class="form-group">
                                <label>NIP / NIK Petugas</label>
                                <input type="number" name="nip" id="nip" class="form-control" placeholder="Input NIP Jika PNS dan NIK Jika Non PNS" required>
                            </div>  

                            <input type="hidden" name="id" id="id">

                            <!-- select -->
                            <div class="form-group">
                                <label>Pilih Pangkat :</label>
                                <select class="form-control" name="pangkat" id="pangkat_select" required>
                                    <?php foreach ($pangkat->result() as $data ) {?>
                                        <option value="<?php echo $data->PANGKAT;?>"><?php echo $data->PANGKAT;?></option>
                                    <?php } ?> 
                                </select>
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Pilih Lokasi Petugas :</label>
                                <select class="form-control select_lokasi_edit"  name="lokasi" id="lokasi_select" required style="width: 300%">
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

<div class="modal fade" id="show_sk">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Dokumen Untuk Surat Perintah Petugas Inventarisasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="save_dokumen_sk" method="post" enctype="multipart/form-data">
                <label><h5><b>(Tipe FIle : PDF | Ukuran Maks File : 8Mb)</b></h5></label> 
                    <div class="custom-file">
                        <input type="file" class="form-control custom-file-input" id="customFile" name="dokumen" accept="application/pdf"/>
                        <label class="custom-file-label" for="customFile">Choose file</label>
                        
                    </div>
                    <p>
                    <div id="alert"></div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" value="upload"><i class="fa fa-upload" aria-hidden="true"></i> Upload File</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
  
</script>

          

<!-- Main content -->
<section class="content">
         <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Table With Full Features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="overflow-x:auto;">
              <table id="tabel_usulan" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align: center; ">No.</th>
                  <th style="text-align: center; ">OPD</th>
                  <th style="text-align: center; ">Komponen</th>
                  <th style="text-align: center; ">Ideal</th>
                  <th style="text-align: center; ">Eksisting</th>
                  <th style="text-align: center; ">Real</th>
                  <th style="text-align: center; ">Keterangan</th>
                  <th style="text-align: center; ">Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach ($data_usulan->result() as $usulan) { ?>
                <tr>
                  <td style="text-align: center; vertical-align: middle;">
                    <?php echo $no?>
                  </td>
                  <td style="text-align: left; vertical-align: middle;">
                    <?php echo $usulan->opd?>
                  </td>
                  <td style="text-align: left; vertical-align: middle;">
                    <?php echo $usulan->nama_barang?>
                  </td>
                  <td style="text-align: center; vertical-align: middle;">
                    <?php echo $usulan->ideal?>
                  </td>
                  <td style="text-align: center; vertical-align: middle;">
                    <?php echo $usulan->eksis?>
                  </td>
                  <td style="text-align: center; vertical-align: middle;">
                    <?php echo $usulan->real?>
                  </td>
                  <td style="text-align: left; vertical-align: middle;">
                    <?php echo $usulan->ket?>
                  </td>
                  <td style="text-align: center; vertical-align: middle;">
                    <a href="javascript:;" class="btn btn-sm btn-success edit_usulan"><i class="fas fa-search"></i></a>
                  </td>
                </tr>
                <?php $no++;} ?>
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
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Extra Large Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
  </div>
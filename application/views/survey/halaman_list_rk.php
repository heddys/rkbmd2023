
<!-- Main content -->
<section class="content">
         <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Table With Full Features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>OPD</th>
                  <th>Komponen</th>
                  <th>Ideal</th>
                  <th>Eksisting</th>
                  <th>Real</th>
                  <th>Keterangan</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach ($data_usulan->result() as $usulan) { ?>
                <tr>
                  <td>
                    <?php echo $no?>
                  </td>
                  <td>
                    <?php echo $usulan->kode_opd?>
                  </td>
                  <td>
                    <?php echo $usulan->id_komponen?>
                  </td>
                  <td>
                    <?php echo $usulan->keb_ideal?>
                  </td>
                  <td>
                    <?php echo $usulan->eksisting?>
                  </td>
                  <td>
                    <?php echo $usulan->keb_real?>
                  </td>
                  <td>
                    <?php echo $usulan->keterangan?>
                  </td>
                </tr>
                <?php $no++;} ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>OPD</th>
                  <th>Komponen</th>
                  <th>Ideal</th>
                  <th>Eksisting</th>
                  <th>Real</th>
                  <th>Keterangan</th>
                </tr>
                </tfoot>
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
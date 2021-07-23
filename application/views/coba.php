
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- Untuk Pemberitahuan -->
        <div class="callout callout-info">
          <h4>Notice!</h4>
          Selamat Datang, Ini adalah aplikasi RKBMD. 
          <a href="#"><font color="red">Bootstrap documentation</font></a>
        </div>
        <?php echo "Komponen : ".$id_komponen;?><br>
        <?php echo "Kebutuhan Ideal : ".$ideal;?><br>
        <?php echo "Kebutuhan Existing : ".$exist;?><br>
        <?php $total=$ideal-$exist;?>
        <?php echo "Kebutuhan : ".$total." / ".$count;?><br>
        <br>
        <?php for ($i=1,$x=0; $i <= $count ; $i++,$x++) {
              echo "Kegiatan Ke ".$i." : ".$arrkeg[$x];
              echo "<br>";
              echo "Saldo Kegiatan Ke ".$i." : ".$arrbnykkeg[$x];
              echo "<br>";
              }
        ?>
        <br>
        <!-- Main row --> 
      </div>
    </section>
    <!-- /.content -->
  </div>
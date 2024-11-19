<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>ini_assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icon tab -->
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>ini_assets/image/surabaya1.png" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>ini_assets/plugins/ionicons/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url();?>ini_assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>ini_assets/dist/css/adminlte.min.css">
    <style>

    p.ex2 {
        margin: 0px;
    }
    .rectangle {
        height: 230px;
        width: 340px;
        border: 2px solid black;
    }

    /* Atur orientasi default di sini */
    @media print {
            @page {
                size: landscape;
            }
    }
    
    </style>
</head>
<body class="sidebar-mini layout-fixed" style="height: auto;">
<?php
function to_rp($val)
{
    return number_format($val,2,',','.');
}

function tgl_indo($tanggal){
    $bulan = array (
      1 => 'Januari',
      2 => 'Februari',
      3 => 'Maret',
      4 => 'April',
      5 => 'Mei',
      6 => 'Juni',
      7 => 'Juli',
      8 => 'Agustus',
      9 => 'September',
      10 => 'Oktober',
      11 => 'November',
      12 => 'Desember'
    );
    $pecahkan = explode('-', $tanggal);
    
    // variabel pecahkan 0 = tahun
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tanggal
   
    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
  }
?>
<?php if ($kib_apa == '1.3.01') { 
            $aset="ASET TETAP TANAH";
        } 
        elseif ($kib_apa == '1.3.02') {
            $aset="ASET TETAP PERALATAN DAN MESIN";
        } 
        elseif ($kib_apa == '1.3.03') {
            $aset="ASET TETAP GEDUNG DAN BANGUNAN";
        } 
        elseif ($kib_apa == '1.3.04') {
            $aset="ASET TETAP JALAN, IRIGASI DAN JARINGAN";
        }
        elseif ($kib_apa == '1.3.05') {
            $aset="ASET TETAP LAINNYA";
        }
        elseif ($kib_apa == '1.5.03') {
            $aset="ASET TIDAK BERWUJUD";
        }
?>

<center>
    <h5>
        <b>
            <p class="ex2">LEMBAR HASIL INVENTARISASI (LHI)</p>
            <p class="ex2">REKAPITULASI BMD TERJADI PERUBAHAN KONDISI FISIK BARANG</p>
            <p class="ex2">BMD BERUPA <?php echo $aset;?></p>
            <p class="ex2"><?php echo strtoupper($this->session->userdata('skpd'));?> KOTA SURABAYA</p>
        </b>
    </h5>
</center>
<p>
<table style="font-size : 12px; width: 20%; border: none;">
        <thead>    
        </thead>
        <tbody>
            <tr>
                <td style="border: none;">Kuasa Pengguna Barang</td>
                <td style="border: none;">:</td>
                <td style="border: none;">-</td>
            </tr>
            <tr>
                <td style="border: none;">Pengguna Barang</td>
                <td style="border: none;">:</td>
                <td style="border: none;"><?php echo $this->session->userdata('kepala_opd');?></td>
                
            </tr>
            <tr>
                <td style="border: none;">Pengelola Barang</td>
                <td style="border: none;">:</td>
                <td style="border: none;">Dr. IKHSAN, S.Psi. M.M</td>
            </tr>
        </tbody>
</table>
<hr>
<p>
<table style="width: 100%; border:1px solid; border-collapse: collapse; font-size:11px;">
    <center>
    <tr style="border:1px solid">
        <th style="border:1px solid" rowspan="2">No.</th>
        <th style="border:1px solid" rowspan="2">Kode Register</th>
        <th style="border:1px solid" rowspan="2">Kode Barang</th>
        <th style="border:1px solid" rowspan="2">Nama Spesifikasi Barang</th>
        <th style="border:1px solid" rowspan="2">Merk / Tipe</th>
        <th style="border:1px solid" rowspan="2">Jumlah</th>
        <th style="border:1px solid" rowspan="2">Satuan Barang</th>
        <th style="border:1px solid" rowspan="2">Nilai Perolehan Barang (Rp.)</th>
        <th style="border:1px solid" colspan="3">Kondisi Fisik Sebelum Inventarisasi (v)</th>
        <th style="border:1px solid" colspan="3">Kondisi Fisik Setelah Inventarisasi (v)</th>
        <th style="border:1px solid" rowspan="2">Keterangan</th>
    </tr>
    </center>
    <center>
    <tr style="border:1px solid">
       <th style="border:1px solid">Baik (B)</th>
       <th style="border:1px solid">Kurang Baik (KB)</th>
       <th style="border:1px solid">Rusak Berat (RB)</th>
       <th style="border:1px solid">Baik (B)</th>
       <th style="border:1px solid">Kurang Baik (KB)</th>
       <th style="border:1px solid">Rusak Berat (RB)</th>
    </tr>
    </center>
    <!-- Isi Datanya -->
    
        <?php $x=1;$jumlah=0; foreach ($data_kondisi as $row) {?>
            <tr style="border:1px solid">
                <td style="border:1px solid; text-align: center; vertical-align: middle;"><?php echo $x?></td>
                <td style="border:1px solid"><?php echo $row['register']?></td>
                <td style="border:1px solid; text-align: center; vertical-align: middle;"><?php echo $row['kode108']?></td>
                <td style="border:1px solid"><?php echo $row['nama_barang']?></td>
                <td style="border:1px solid"><?php echo $row['merk']." / ".$row['tipe']?></td>
                <td style="border:1px solid; text-align: center; vertical-align: middle;">1</td>
                <td style="border:1px solid; text-align: center; vertical-align: middle;"><?php echo $row['satuan']?></td>
                <td style="border:1px solid; text-align: right; vertical-align: middle;"><?php echo to_rp($row['harga']);?></td>

                <!-- Isi Kondisi Awal -->

                <?php if ($row['kondisi_awal'] == "B"){?>
                    <td style="border:1px solid; text-align: center; vertical-align: middle;">v</td>
                    <td style="border:1px solid"></td>
                    <td style="border:1px solid"></td>
                <?php } elseif ($row['kondisi_awal'] == "KB") { ?>
                    <td style="border:1px solid"></td>
                    <td style="border:1px solid; text-align: center; vertical-align: middle;">v</td>
                    <td style="border:1px solid"></td> 
                <?php } else {?>
                    <td style="border:1px solid"></td>
                    <td style="border:1px solid"></td> 
                    <td style="border:1px solid; text-align: center; vertical-align: middle;">v</td>
                <?php }?> 

                  <!-- Isi Kondisi Akhir  -->

                <?php if ($row['kondisi_baru'] == "B"){?>
                    <td style="border:1px solid; text-align: center; vertical-align: middle;">v</td>
                    <td style="border:1px solid"></td>
                    <td style="border:1px solid"></td>
                <?php } elseif ($row['kondisi_baru'] == "KB") { ?>
                    <td style="border:1px solid"></td>
                    <td style="border:1px solid; text-align: center; vertical-align: middle;">v</td>
                    <td style="border:1px solid"></td> 
                <?php } else {?>
                    <td style="border:1px solid"></td>
                    <td style="border:1px solid"></td> 
                    <td style="border:1px solid; text-align: center; vertical-align: middle;">v</td>
                <?php }?>   
                <td style="border:1px solid"><?php echo $row['keterangan']?></td>
            </tr>
        <?php $x++; $jumlah+=$row['harga'];}?>
    <tr>
        <td style="border:1px solid; text-align: center; vertical-align: middle;" colspan="7">Jumlah (Rp.)</td>
        <td style="border:1px solid; text-align: right; vertical-align: middle;"><?php echo to_rp($jumlah)?></td>
        <td style="border:1px solid;" colspan="7"></td>
    </tr>
</table>
<p>
<table id="tabel_ttd" border="1" style="font-size:12px; width:100%;">
    <tr>
        <td></td>
        <td><b>Catatan : </b></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td width="18%">Total <?php echo ucwords(strtolower($aset));?></td>
        <td colspan="13"><b> : <?php echo number_format($total_reg->jum_kib);?> Register</b></td>
        <td width="20%" style="text-align: center; vertical-align: middle;">Surabaya, <?php echo ($data_spesimen === 'Kosong') ? "" : $data_spesimen->tanggal_lhi; ?></td>
    </tr>
    <tr>
        <td></td>
        <td>Jumlah Aset Masih Belum Di Inventarisasi</td>
        <td colspan="13"><b> : <?php echo number_format($belum_inv);?> Register</b></td>
        <td style="text-align: center; vertical-align: middle;">Pengguna Barang</td>
    </tr>
    <tr>
        <td></td>
        <td>Jumlah Aset Masih Proses Inventarisasi</td>
        <td colspan="13"><b> : <?php echo number_format($proses_inv->jum_reg);?> Register</b></td>
    </tr>
    <tr>
        <td></td>
        <td><b>Aset <?php echo ucwords(strtolower($aset))." Yang Sudah Di Inventarisasi </b>"?></td>
        <td colspan="13"><b> : <?php echo number_format($sudah_inv->jum_reg);?> Register</b></td>
        <td></td>
    </tr>
    
    
    <?php if ($data_spesimen === 'Kosong') { ?>
            <tr>
                <td></td>
                <td></td>
                <td colspan="13"></td>
                <td style="text-align: center; vertical-align: middle;"><button id="button_verif" class="btn btn-md btn-danger" data-toggle="modal" data-target="#modal-verif">Verifikasi LHI</button></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan="13"><br></td>
                <td></td>
            </tr>
    <?php } else {?>
        <tr>
            <td></td>
            <td></td>
            <td colspan="13"></td>
            <td rowspan="3" style="text-align: center; vertical-align: middle;"><img src="<?php echo base_url()."ini_assets/spesimen/".$data_spesimen->nip_kepala.".png";?>" alt="Spesimen" srcset="" style="width: 50%; height: 50%; object-fit: cover;"></td>
        </tr>
    <?php } ?>
    <tr>
        <td></td>
        <td></td>
        <td colspan="13"></td>
        <td style="text-align: center; vertical-align: middle;"><b><?php echo $data_pb->nama_kepala?></b></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td colspan="13"></td>
        <td style="text-align: center; vertical-align: middle;"><b>NIP. <?php echo $data_pb->nip_kepala?></b></td>
    </tr>
</table>


<!-- Modal Untuk Cari Register Ganda -->
<div class="modal fade" id="modal-verif">
        <div class="modal-dialog modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <center><h4 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Notice!!</h4></center>
                </div>
                <form action="<?php echo site_url('/home_kadis/save_verif');?>" method="post">
                    <div class="modal-body">
                        <label for="tanggal">Pilih Tanggal : </label>
                        <input type="date" id="tanggal" name="tanggal" value="" required>
                        <br>
                        <br>
                        <label for="agree">Centang Jika Data LHI Ini Sudah Benar : </label>
                        <input type="checkbox" id="checkbox-verif"> Saya Telah Membaca LHI Ini

                    </div>
                    <div class="modal-footer justify-content-between">
                        <input type="hidden" name="nip" value="<?php echo $data_pb->nip_kepala; ?>">
                        <input type="hidden" name="nama" value="<?php echo $data_pb->nama_kepala; ?>">
                        <input type="hidden" name="jenis_lhi" value="2">
                        <input type="hidden" name="kib" value="<?php echo $kib_apa; ?>">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-info" id="btn-submit" disabled>Saya Setuju</button>
                    </div>
                </form>
            </div>
            <!-- modal-content --> 
        </div>
        <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script src="<?php echo base_url();?>ini_assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url();?>ini_assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>ini_assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url();?>ini_assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url();?>ini_assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url();?>ini_assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>ini_assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>ini_assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url();?>ini_assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>ini_assets/dist/js/demo.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url();?>ini_assets/plugins/select2/js/select2.full.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url();?>ini_assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>ini_assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>ini_assets/plugins/datatables/dataTables.bootstrap4.js"></script>


<script>
    $('#button_verif').on('click', function(){
        $('#modal-verif').modal('show');
    });

    $('#checkbox-verif').on('change', function() {
        // alert('nanana');
        $('#btn-submit').prop('disabled', !this.checked);
    });
</script>

</body>
</html>
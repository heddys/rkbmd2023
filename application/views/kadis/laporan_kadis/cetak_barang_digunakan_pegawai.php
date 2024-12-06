<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <p class="ex2">REKAPITULASI BMD DIGUNAKAN OLEH PEGEAWAI PEMERINTAH DAERAH YANG BERSANGKUTAN</p>
            <p class="ex2">BMD BERUPA <?php echo $aset; ?></p>
            <p class="ex2"><?php echo strtoupper($this->session->userdata('skpd'));?> KOTA SURABAYA</p>
        </b>
    </h5>
</center>
<p>
<table style="font-size : 12px;">
        <thead>    
        </thead>
        <tbody>
            <tr>
                <td width="200px">Kuasa Pengguna Barang</td>
                <td width="25px">:</td>
                <td width="150px">-</td>
            </tr>
            <tr>
                <td width="200px">Pengguna Barang</td>
                <td width="25px">:</td>
                <td width="60%"><?php echo $this->session->userdata('kepala_opd');?></td>
                
            </tr>
            <tr>
                <td width="200px">Pengelola Barang</td>
                <td width="25px">:</td>
                <td width="150px">Dr. IKHSAN, S.Psi. M.M</td>
            </tr>
        </tbody>
</table>
<hr>
<p>
<table style="width: 100%; border:1px solid; border-collapse: collapse; font-size:11px;">
    <center>
    <thead>
        <tr style="border:1px solid">
            <th style="border:1px solid" rowspan="3">No.</th>
            <th style="border:1px solid" rowspan="3">OPD</th>
            <th style="border:1px solid" rowspan="3">Lokasi</th>
            <th style="border:1px solid" rowspan="3">Kode Register</th>
            <th style="border:1px solid" rowspan="3">Kode Barang</th>
            <th style="border:1px solid" rowspan="3">Nama Spesifikasi Barang</th>
            <th style="border:1px solid" rowspan="3">Merk / Tipe</th>
            <th style="border:1px solid" rowspan="3">Jumlah</th>
            <th style="border:1px solid" rowspan="3">Satuan Barang</th>
            <th style="border:1px solid" rowspan="3">Nilai Perolehan Barang (Rp.)</th>
            <th style="border:1px solid" rowspan="3">Alamat</th>
            <th style="border:1px solid" colspan="6">Pemakai</th>
            <th style="border:1px solid" rowspan="3">Keterangan</th>
        </tr>
        </center>
        <center>
        <tr style="border:1px solid">
            <th style="border:1px solid" rowspan="2">Nama Pemakai</th>
            <th style="border:1px solid" rowspan="2">Status Pemakai</th>
            <th style="border:1px solid" colspan="2">BAST Pemakai</th>
            <th style="border:1px solid" colspan="2">Surat Ijin Penghunian</th>
        </tr>
        <tr>
            <th style="border:1px solid">Ada</th>
            <th style="border:1px solid">Tidak Ada</th>
            <th style="border:1px solid">Ada</th>
            <th style="border:1px solid">Tidak Ada</th>
        </tr>
        </center>
    </thead>
    <tbody>
    <?php if(count($data_barang) == 0) {?>
        <center>
            <tr>
                <td style="border:1px solid; text-align: center; vertical-align: middle;" colspan="18"><h4>N I H I L</h4></td>
            </tr>
        </center>
        <tr>
            <td style="border:1px solid; text-align: center; vertical-align: middle;" colspan="9">Jumlah (Rp.)</td>
            <td style="border:1px solid; text-align: right; vertical-align: middle;">0,00</td>
        </tr>
    <?php } else {?>
    <!-- Isi Datanya -->
    
        <?php $x=1;$jumlah=0; foreach ($data_barang as $row) {?>
            <tr style="border:1px solid">
                <td style="border:1px solid; text-align: center; vertical-align: middle;"><?php echo $x?></td>
                <td style="border:1px solid"><?php echo strtoupper($row->unit);?></td>
                <td style="border:1px solid"><?php echo $row->lokasi?></td>
                <td style="border:1px solid"><?php echo $row->register?></td>
                <td style="border:1px solid; text-align: center; vertical-align: middle;"><?php echo $row->kode108_baru?></td>
                <td style="border:1px solid"><?php echo $row->nama_barang?></td>
                <td style="border:1px solid"><?php echo $row->merk_alamat." / ".$row->tipe?></td>
                <td style="border:1px solid; text-align: center; vertical-align: middle;">1</td>
                <td style="border:1px solid; text-align: center; vertical-align: middle;">Unit</td>
                <td style="border:1px solid; text-align: right; vertical-align: middle;"><?php echo to_rp($row->harga_baru);?></td>
                <td style="border:1px solid; text-align: center; vertical-align: middle;">-</td>
                <td style="border:1px solid; vertical-align: middle;"><?php echo $row->nama_penanggung_jawab;?></td>
                <td style="border:1px solid; text-align: center; vertical-align: middle;">Pegawai Pemerintah</td>
                <td style="border:1px solid; text-align: center; vertical-align: middle;">v</td>
                <td style="border:1px solid; text-align: center; vertical-align: middle;"></td>
                <td style="border:1px solid; text-align: center; vertical-align: middle;"></td>
                <td style="border:1px solid; text-align: center; vertical-align: middle;"></td>
                <td style="border:1px solid; text-align: center; vertical-align: middle;"><?php echo $row->keterangan;?></td>
            </tr>
        <?php $x++; $jumlah+=$row->harga_baru;}?>
    <tr>
        <td style="border:1px solid; text-align: center; vertical-align: middle;" colspan="9">Jumlah (Rp.)</td>
        <td style="border:1px solid; text-align: right; vertical-align: middle;"><?php echo to_rp($jumlah);?></td>
    </tr>
    <?php } ?>
    </tbody>
</table>
<p>
<table id="tabel_ttd" style="font-size:12px; width:100%;">
    <tr>
        <td></td>
        <td><b>Catatan : </b></td>
        <td colspan="13"></td>
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
        <td></td>
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
            <td style="text-align: center; vertical-align: middle;"><img src="<?php echo base_url()."ini_assets/spesimen/".$data_spesimen->nip_kepala.".png";?>" alt="Spesimen" srcset="" style="width: 50%; height: 50%; object-fit: cover;"></td>
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
                        <input type="hidden" name="jenis_lhi" value="9">
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
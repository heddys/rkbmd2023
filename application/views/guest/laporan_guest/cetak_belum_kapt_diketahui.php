<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

    p.ex2 {
        margin: 0px;
    }
    .rectangle {
        height: 230px;
        width: 340px;
        border: 2px solid black;
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
  if($kib=='1.3.1') {
    $jenis_aset = "TANAH";
    } 
    elseif ($kib=='1.3.2') {
        $jenis_aset = "PERALATAN DAN MESIN";
    } elseif ($kib=='1.3.3') {
        $jenis_aset = "GEDUNG DAN BANGUNAN";
    } elseif ($kib=='1.3.4') {
        $jenis_aset = "JALAN, IRIGASI DAN JARINGAN";
    } elseif ($kib=='1.3.5') {
        $jenis_aset = "ASET TETAP LAINNYA";
    } else { 
        $jenis_aset = "ASET TAK BERWUJUD";
    }
?>

<center>
    <h5>
        <b>
            <p class="ex2">LEMBAR HASIL INVENTARISASI (LHI)</p>
            <p class="ex2">REKAPITULASI BMD BELUM DIKAPITALISASI DAN DIKETAHUI DATA AWAL/DATA INDUKNYA</p>
            <p class="ex2">BMD BERUPA <?php echo $jenis_aset;?></p>
            <p class="ex2">KOTA SURABAYA</p>
        </b>
    </h5>
</center>
<p>
<table class="table table-bordered" style="font-size : 12px;">
      <p></p>
</table>
<hr>
<p>
<table style="width: 100%; border:1px solid; border-collapse: collapse; font-size:11px;">
    <center>
    <tr style="border:1px solid">
        <th style="border:1px solid" rowspan="2">No.</th>
        <th style="border:1px solid" rowspan="2">OPD</th>
        <th style="border:1px solid" rowspan="2">Lokasi</th>
        <th style="border:1px solid" rowspan="2">Kode Register</th>
        <th style="border:1px solid" rowspan="2">Kode Barang</th>
        <th style="border:1px solid" rowspan="2">Nama Spesifikasi Barang</th>
        <th style="border:1px solid" rowspan="2">Merk / Tipe</th>
        <th style="border:1px solid" rowspan="2">Jumlah</th>
        <th style="border:1px solid" rowspan="2">Satuan Barang</th>
        <th style="border:1px solid" rowspan="2">Nilai Perolehan Barang (Rp.)</th>
        <th style="border:1px solid" colspan="5">Data Awal/Induk</th>
        <th style="border:1px solid" rowspan="2">Keterangan</th>
    </tr>
    </center>
    <center>
    <tr style="border:1px solid">
       <th style="border:1px solid">Kode Register</th>
       <th style="border:1px solid">Kode Barang</th>
       <th style="border:1px solid">Kode Lokasi</th>
       <th style="border:1px solid">Nama Spesifikasi Barang</th>
       <th style="border:1px solid">Merk / Tipe</th>
    </tr>
    </center>
    <!-- Isi Datanya -->
    
        <?php $x=1;$jumlah=0; foreach ($data_barang as $row) {?>
            <tr style="border:1px solid">
                <td style="border:1px solid; text-align: center; vertical-align: middle;"><?php echo $x?></td>
                <td style="border:1px solid"><?php echo strtoupper($row->unit);?></td>
                <td style="border:1px solid"><?php echo $row->lokasi?></td>
                <td style="border:1px solid"><?php echo $row->register?></td>
                <td style="border:1px solid; text-align: center; vertical-align: middle;"><?php echo $row->kode_barang?></td>
                <td style="border:1px solid"><?php echo $row->nama_barang?></td>
                <td style="border:1px solid"><?php echo $row->spesifikasi_barang_merk." / ".$row->tipe?></td>
                <td style="border:1px solid; text-align: center; vertical-align: middle;">1</td>
                <td style="border:1px solid; text-align: center; vertical-align: middle;"><?php echo $row->satuan?></td>
                <td style="border:1px solid; text-align: right; vertical-align: middle;"><?php echo to_rp($row->nilai_perolehan);?></td>
                <td style="border:1px solid; text-align: center; vertical-align: middle;"><?php echo $row->merupakan_anak;?></td>
                <td style="border:1px solid; text-align: center; vertical-align: middle;"><?php echo $row->kode108_baru;?></td>
                <td style="border:1px solid; text-align: center; vertical-align: middle;"><?php echo $row->nomor_lokasi;?></td>
                <td style="border:1px solid; text-align: center; vertical-align: middle;"><?php echo $row->name_anak;?></td>
                <td style="border:1px solid; text-align: center; vertical-align: middle;"><?php echo $row->merk_anak." / ".$row->tipe_anak;?></td>
                <td style="border:1px solid; text-align: center; vertical-align: middle;"><?php echo $row->keterangan;?></td>
            </tr>
        <?php $x++; $jumlah+=$row->nilai_perolehan;}?>
    <tr>
        <td style="border:1px solid; text-align: center; vertical-align: middle;" colspan="9">Jumlah (Rp.)</td>
        <td style="border:1px solid; text-align: right; vertical-align: middle;"><?php echo to_rp($jumlah)?></td>
        <td style="border:1px solid;" colspan="7"></td>
    </tr>
</table>
<p>

    
</body>
</html>
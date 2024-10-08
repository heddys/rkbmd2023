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
            <p class="ex2">REKAPITULASI BMD DIGUNAKAN OLEH PEGEAWAI PEMERINTAH DAERAH YANG BERSANGKUTAN</p>
            <p class="ex2">BMD BERUPA <?php echo $jenis_aset;?></p>
            <p class="ex2">KOTA SURABAYA</p>
        </b>
    </h5>
</center>
<p>
<table class="table table-bordered" style="font-size : 12px;">
<p>
	
</p>
        
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
            <th style="border:1px solid" rowspan="2">Nama Pemakai / Penanggung Jawab</th>
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
        <td style="border:1px solid;" colspan="7"></td>
    </tr>
</tbody>
<?php } ?>
</table>
<p>

    
</body>
</html>
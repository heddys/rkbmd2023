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
?>

<center>
    <h5>
        <b>
            <p class="ex2">LAPORAN HASIL INVENTARISASI (LHI)</p>
            <p class="ex2">REKAPITULASI TIDAK ADA KARENA TIDAK DIKETEMUKAN</p>
            <p class="ex2">BMD BERUPA <?php if ($kib_apa == '1.3.1') { 
                                    echo "ASET TETAP TANAH";
                                } 
                                elseif ($kib_apa == '1.3.2') {
                                        echo "ASET TETAP PERALATAN DAN MESIN";
                                } 
                                elseif ($kib_apa == '1.3.3') {
                                        echo "ASET TETAP GEDUNG DAN BANGUNAN";
                                } 
                                elseif ($kib_apa == '1.3.4') {
                                        echo "ASET TETAP JALAN, IRIGASI DAN JARINGAN";
                                }
                                elseif ($kib_apa == '1.3.5') {
                                    echo "ASET TETAP LAINNYA";
                                }
                                elseif ($kib_apa == '1.5.3') {
                                    echo "ASET TIDAK BERWUJUD";
                                } 
                                ?></p>
            <p class="ex2">KOTA SURABAYA</p>
        </b>
    </h5>
</center>
<p>
<table style="font-size : 12px;">
        <p></p>
</table>
<hr>
<p>
<table style="width: 100%; border:1px solid; border-collapse: collapse; font-size:11px;">
    <center>
    <tr style="border:1px solid">
        <th style="border:1px solid">No.</th>
        <th style="border:1px solid">OPD</th>
        <th style="border:1px solid">Lokasi</th>
        <th style="border:1px solid">Kode Register</th>
        <th style="border:1px solid">Kode Barang</th>
        <th style="border:1px solid">Nama Spesifikasi Barang</th>
        <th style="border:1px solid">Merk / Tipe</th>
        <th style="border:1px solid">Jumlah</th>
        <th style="border:1px solid">Satuan Barang</th>
        <th style="border:1px solid">Nilai Perolehan Barang (Rp.)</th>
        <th style="border:1px solid">Keterangan</th>
    </tr>
    </center>
    <!-- Isi Datanya -->
    
        <?php $x=1;$jumlah=0; foreach ($data_barang as $row) {?>
            <tr style="border:1px solid">
                <td style="border:1px solid; text-align: center; vertical-align: middle;"><?php echo $x?></td>
                <td style="border:1px solid;"><?php echo $row->unit;?></td>
                <td style="border:1px solid;"><?php echo $row->lokasi;?></td>
                <td style="border:1px solid"><?php echo $row->register?></td>
                <td style="border:1px solid; text-align: center; vertical-align: middle;"><?php echo $row->kode108_baru?></td>
                <td style="border:1px solid"><?php echo $row->nama_barang?></td>
                <td style="border:1px solid"><?php echo $row->merk_alamat." / ".$row->tipe?></td>
                <td style="border:1px solid; text-align: center; vertical-align: middle;">1</td>
                <td style="border:1px solid; text-align: center; vertical-align: middle;"><?php echo $row->satuan?></td>
                <td style="border:1px solid; text-align: right; vertical-align: middle;"><?php echo to_rp($row->harga_baru);?></td>
                <td style="border:1px solid"><?php echo $row->ket_baru?></td>
            </tr>
        <?php $x++; $jumlah+=$row->harga_baru;}?>
    <tr>
        <td style="border:2px solid; text-align: center; vertical-align: middle;" colspan="9"><b>Jumlah (Rp.)</b></td>
        <td style="border:2px solid; text-align: right; vertical-align: middle;"><b><?php echo to_rp($jumlah)?></b></td>
    </tr>
</table>
<p>
<table style="font-size:12px; width:100%;">
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="13"></td>
        <td width="13%" style="margin-left: 70%; vertical-align: middle;">
        <?php for($i=1;$i<=12;$i++){ ?>
            &nbsp;
        <?php } ?>
        Surabaya,</td>
    </tr>
    <tr>
        <td colspan="13"></td>
        <td style="text-align: center; vertical-align: middle;">PEJABAT PENATAUSAHAAN PENGGUNA BARANG KOTA SURABAYA</td>
    </tr>
    <tr>
        <td colspan="13"></td>
        <td><br><br></td>
    </tr>
    <tr>
        <td colspan="13"></td>
        <td><br><br></td>
    </tr>
    <tr>
        <td colspan="13"></td>
        <td style="text-align: center; vertical-align: middle;"></td>
    </tr>
    <tr>
        <td colspan="13"></td>
        <td style="text-align: center; vertical-align: middle;"></td>
    </tr>
    <tr>
        <td colspan="13"></td>
        <td style="text-align: center; vertical-align: middle;"></td>
    </tr>
    <tr>
        <td colspan="13"></td>
        <td style="text-align: center; vertical-align: middle;"><b><u>SYAMSUL HARIADI, ST. MT</u></b></td>
    </tr>
    <tr>
        <td colspan="13"></td>
        <td style="text-align: center; vertical-align: middle;"><b>Pembina Tingkat I</b></td>
    </tr>
    <tr>
        <td colspan="13"></td>
        <td style="text-align: center; vertical-align: middle;"><b>NIP. 197211032001121003</b></td>
    </tr> 
</table>
    
</body>
</html>
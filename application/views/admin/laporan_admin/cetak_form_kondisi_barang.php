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
            <p class="ex2">LEMBAR HASIL INVENTARISASI (LHI)</p>
            <p class="ex2">REKAPITULASI BMD TERJADI PERUBAHAN KONDISI FISIK BARANG</p>
            <p class="ex2">BMD BERUPA PERALATAN DAN MESIN</p>
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
                <td style="border:1px solid"><?php echo strtoupper($row->unit);?></td>
                <td style="border:1px solid"><?php echo $row->lokasi?></td>
                <td style="border:1px solid"><?php echo $row->register?></td>
                <td style="border:1px solid; text-align: center; vertical-align: middle;"><?php echo $row->kode108_baru?></td>
                <td style="border:1px solid"><?php echo $row->nama_barang?></td>
                <td style="border:1px solid"><?php echo $row->merk_alamat." / ".$row->tipe?></td>
                <td style="border:1px solid; text-align: center; vertical-align: middle;">1</td>
                <td style="border:1px solid; text-align: center; vertical-align: middle;"><?php echo $row->satuan?></td>
                <td style="border:1px solid; text-align: right; vertical-align: middle;"><?php echo to_rp($row->harga_baru);?></td>

                <!-- Isi Kondisi Awal -->

                <?php if ($row->kondisi == "B"){?>
                    <td style="border:1px solid; text-align: center; vertical-align: middle;">v</td>
                    <td style="border:1px solid"></td>
                    <td style="border:1px solid"></td>
                <?php } elseif ($row->kondisi == "KB") { ?>
                    <td style="border:1px solid"></td>
                    <td style="border:1px solid; text-align: center; vertical-align: middle;">v</td>
                    <td style="border:1px solid"></td> 
                <?php } else {?>
                    <td style="border:1px solid"></td>
                    <td style="border:1px solid"></td> 
                    <td style="border:1px solid; text-align: center; vertical-align: middle;">v</td>
                <?php }?> 

                  <!-- Isi Kondisi Akhir  -->

                <?php if ($row->kondisi_barang == "B"){?>
                    <td style="border:1px solid; text-align: center; vertical-align: middle;">v</td>
                    <td style="border:1px solid"></td>
                    <td style="border:1px solid"></td>
                <?php } elseif ($row->kondisi_barang == "KB") { ?>
                    <td style="border:1px solid"></td>
                    <td style="border:1px solid; text-align: center; vertical-align: middle;">v</td>
                    <td style="border:1px solid"></td> 
                <?php } else {?>
                    <td style="border:1px solid"></td>
                    <td style="border:1px solid"></td> 
                    <td style="border:1px solid; text-align: center; vertical-align: middle;">v</td>
                <?php }?>   
                <td style="border:1px solid"><?php echo $row->keterangan?></td>
            </tr>
        <?php $x++; $jumlah+=$row->harga_baru;}?>
    <tr>
        <td style="border:1px solid; text-align: center; vertical-align: middle;" colspan="9">Jumlah (Rp.)</td>
        <td style="border:1px solid; text-align: right; vertical-align: middle;"><?php echo to_rp($jumlah)?></td>
        <td style="border:1px solid;" colspan="7"></td>
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
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
            <p class="ex2">LAPORAN HASIL INVENTARISASI(LHI)</p>
            <p class="ex2">REKAPITULASI BMD TERKAIT PERUBAHAN DATA</p>
            <p class="ex2">BMD BERUPA PERALATAN DAN MESIN</p>
            <p class="ex2">KOTA SURABAYA</p>
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
                <td width="150px">Ir. Hendro Gunawan, MA</td>
            </tr>
        </tbody>
</table>
<hr>
<p>
<table style="width: 100%; border:1px solid; border-collapse: collapse; font-size:11px;">
    <center>
        <tr style="border:1px solid">
            <th style="border:1px solid" rowspan="2">No.</th>
            <th style="border:1px solid" rowspan="2">OPD</th>
            <th style="border:1px solid" rowspan="2">Lokasi</th>
            <th style="border:1px solid" rowspan="2">NIBAR</th>
            <th style="border:1px solid" colspan="6">Sebelum Inventarisasi</th>
            <th style="border:1px solid" colspan="6">Setelah Inventarisasi</th>
            <th style="border:1px solid" rowspan="2">Satuan Barang</th>
            <th style="border:1px solid" rowspan="2">Nilai Perolehan Barang (Rp.)</th>
            <th style="border:1px solid" rowspan="2">Keterangan</th>
        </tr>
    </center>
    <center>
        <tr>
            <th style="border:1px solid">Kode Barang</th>
            <th style="border:1px solid">Nama Barang</th>
            <th style="border:1px solid">Kode Register</th>
            <th style="border:1px solid">Nama Spesifikasi Barang</th>
            <th style="border:1px solid">Jumlah</th>
            <th style="border:1px solid">Merk / Alamat</th>
            <th style="border:1px solid">Kode Barang</th>
            <th style="border:1px solid">Nama Barang</th>
            <th style="border:1px solid">Kode Register</th>
            <th style="border:1px solid">Nama Spesifikasi Barang</th>
            <th style="border:1px solid">Jumlah</th>
            <th style="border:1px solid">Merk / Alamat</th>
        </tr>
    </center>
    <?php $x=1;$jumtot=0; foreach ($data_barang as $row) {?>
        <tr>
            <td style="border:1px solid"><?php echo $x;?></td>
            <td style="border:1px solid"><?php echo $row->unit;?></td>
            <td style="border:1px solid"><?php echo $row->lokasi;?></td>
            <td style="border:1px solid"><?php echo $row->register;?></td>
            <td style="border:1px solid"><?php echo $row->kode108_baru;?></td>
            <td style="border:1px solid"><?php echo $row->name_awal;?></td>
            <td style="border:1px solid" width="6%"><?php echo $row->register;?></td>
            <td style="border:1px solid"><?php echo $row->tipe_awal;?></td>
            <td style="border:1px solid; text-align: center; vertical-align: middle;">1</td>
            <td style="border:1px solid"><?php echo $row->merk_alamat;?></td>
            <td style="border:1px solid"><?php echo $row->kode_barang;?></td>
            <td style="border:1px solid"><?php echo $row->name_baru;?></td>
            <td style="border:1px solid" width="6%"><?php echo $row->register;?></td>
            <td style="border:1px solid"><?php echo $row->tipe_baru;?></td>
            <td style="border:1px solid; text-align: center; vertical-align: middle;">1</td>
            <td style="border:1px solid"><?php echo $row->spesifikasi_barang_merk;?></td>
            <td style="border:1px solid"><?php echo $row->satuan;?></td>
            <td style="border:1px solid; text-align: right; vertical-align: middle;"><?php echo to_rp($row->harga_baru)?></td>
            <td style="border:1px solid"><?php echo $row->keterangan;?></td>
        </tr>
    <?php $x++; $jumtot+=$row->harga_baru;} ?>
    <tr>
        <td style="border:1px solid; text-align: center; vertical-align: middle;" colspan="17">Jumlah (Rp.)</td>
        <td style="border:1px solid; text-align: right; vertical-align: middle;"><?php echo to_rp($jumtot)?></td>
        <td style="border:1px solid;"></td>
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
        <td width="20%" style="text-align: center; vertical-align: middle;"><?php echo "Surabaya, " . tgl_indo(date("Y-m-d"));?></td>
    </tr>
    <tr>
        <td colspan="13"></td>
        <td style="text-align: center; vertical-align: middle;">Pejabat Penatausahaan Barang Pengelola</td>
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
        <td style="text-align: center; vertical-align: middle;">................................................</td>
    </tr>
    <tr>
        <td colspan="13"></td>
        <td style="text-align: center; vertical-align: middle;"><b>IRA TURSILOWATI, SH, MH</b></td>
    </tr>
    <tr>
        <td colspan="13"></td>
        <td style="text-align: center; vertical-align: middle;"><b>PEMBINA UTAMA MUDA</b></td>
    </tr>
    <tr>
        <td colspan="13"></td>
        <td style="text-align: center; vertical-align: middle;"><b>NIP. 196910171993032006</b></td>
    </tr>
</table>
    
</body>
</html>
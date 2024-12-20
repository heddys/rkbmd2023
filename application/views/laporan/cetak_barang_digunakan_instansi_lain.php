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
            <p class="ex2">REKAPITULASI BMD DIGUNAKAN OLEH PEMERINTAH PUSAT/PEMERINTAH DAERAH LAINNYA/PIHAK LAIN</p>
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
            <p class="ex2"><?php echo strtoupper($this->session->userdata('skpd'));?> KOTA SURABAYA</p>
        </b>
    </h5>
</center>
<p>
<table class="table table-bordered" style="font-size : 12px;">
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
                <td width="150px"><?php echo $this->session->userdata('kepala_opd');?></td>
                
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
            <th style="border:1px solid" rowspan="4">No.</th>
            <th style="border:1px solid" rowspan="4">OPD</th>
            <th style="border:1px solid" rowspan="4">Lokasi</th>
            <th style="border:1px solid" rowspan="4">Kode Register</th>
            <th style="border:1px solid" rowspan="4">Kode Barang</th>
            <th style="border:1px solid" rowspan="4">Nama Spesifikasi Barang</th>
            <th style="border:1px solid" rowspan="4">Merk / Tipe</th>
            <th style="border:1px solid" rowspan="4">Jumlah</th>
            <th style="border:1px solid" rowspan="4">Satuan Barang</th>
            <th style="border:1px solid" rowspan="4">Nilai Perolehan Barang (Rp.)</th>
            <th style="border:1px solid" rowspan="4">Alamat</th>
            <th style="border:1px solid" colspan="9">Penggunaan</th>
            <th style="border:1px solid" rowspan="4">Keterangan</th>
        </tr>
        </center>
        <center>
        <tr style="border:1px solid">
        <th style="border:1px solid" colspan="3">Pemerintah Pusat</th>
        <th style="border:1px solid" colspan="3">Pemerintah Daerah Lainnya</th>
        <th style="border:1px solid" colspan="3">Pihak Lain</th>
        </tr>
        <tr>
        <th style="border:1px solid" colspan="2">Ada</th>
        <th style="border:1px solid" rowspan="2">Tidak ada dokumen penggunaan</th>
        <th style="border:1px solid" colspan="2">Ada</th>
        <th style="border:1px solid" rowspan="2">Tidak ada dokumen penggunaan</th>
        <th style="border:1px solid" colspan="2">Ada</th>
        <th style="border:1px solid" rowspan="2">Tidak ada dokumen penggunaan</th>
        </tr>
        <tr>
            <th style="border:1px solid">Nama Instansi</th>
            <th style="border:1px solid">Nama Dokumen</th>
            <th style="border:1px solid">Nama Instansi</th>
            <th style="border:1px solid">Nama Dokumen</th>
            <th style="border:1px solid">Nama Instansi</th>
            <th style="border:1px solid">Nama Dokumen</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <!-- <td style="border:1px solid">1</td>
            <td style="border:1px solid">1</td>
            <td style="border:1px solid">1</td>
            <td style="border:1px solid">1</td>
            <td style="border:1px solid">1</td>
            <td style="border:1px solid">1</td>
            <td style="border:1px solid">1</td>
            <td style="border:1px solid">1</td>
            <td style="border:1px solid">1</td>
            <td style="border:1px solid">1</td>
            <td style="border:1px solid">1</td>
            <td style="border:1px solid">1</td>
            <td style="border:1px solid">1</td>
            <td style="border:1px solid">1</td>
            <td style="border:1px solid">1</td>
            <td style="border:1px solid">1</td>
            <td style="border:1px solid">1</td>
            <td style="border:1px solid">1</td>
            <td style="border:1px solid">1</td>
            <td style="border:1px solid">1</td>
            <td style="border:1px solid">1</td> -->
            <td style="border:1px solid; text-align: center; vertical-align: middle;" colspan="21"><h4>N I H I L</h4></td>
        </tr>
    </tbody>
    </center>
    <!-- Isi Datanya -->
    
        <!-- <?php $x=1;$jumlah=0; foreach ($data_barang as $row) {?>
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
                <td style="border:1px solid; text-align: center; vertical-align: middle;"><?php echo $row->register_ganda;?></td>
                <td style="border:1px solid; text-align: center; vertical-align: middle;"><?php echo $row->kode108_baru;?></td>
                <td style="border:1px solid; text-align: center; vertical-align: middle;"><?php echo $row->nomor_lokasi;?></td>
                <td style="border:1px solid; text-align: center; vertical-align: middle;"><?php echo $row->name_anak;?></td>
                <td style="border:1px solid; text-align: center; vertical-align: middle;"><?php echo $row->merk_anak." / ".$row->tipe_anak;?></td>
                <td style="border:1px solid; text-align: center; vertical-align: middle;">1</td>
                <td style="border:1px solid; text-align: center; vertical-align: middle;"><?php echo $row->satuan_anak;?></td>
                <td style="border:1px solid; text-align: center; vertical-align: middle;"><?php echo to_rp($row->harga_baru);?></td>
                <td style="border:1px solid; text-align: center; vertical-align: middle;"><?php echo $row->tahun_pengadaan;?></td>
                <td style="border:1px solid; text-align: center; vertical-align: middle;"><?php echo $row->nama_kepala;?></td>
                <td style="border:1px solid; text-align: center; vertical-align: middle;"><?php echo $row->keterangan;?></td>
            </tr>
        <?php $x++; $jumlah+=$row->nilai_perolehan;}?> -->
    <!-- <tr>
        <td style="border:1px solid; text-align: center; vertical-align: middle;" colspan="9">Jumlah (Rp.)</td>
        <td style="border:1px solid; text-align: right; vertical-align: middle;"></td>
        <td style="border:1px solid;" colspan="7"></td>
    </tr> -->
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
        <td style="text-align: center; vertical-align: middle;">Pengguna Barang</td>
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
        <td style="text-align: center; vertical-align: middle;"><b><?php echo $data_pb->nama_kepala?></b></td>
    </tr>
    <tr>
        <td colspan="13"></td>
        <td style="text-align: center; vertical-align: middle;"><b>NIP. <?php echo $data_pb->nip_kepala?></b></td>
    </tr>
</table>
    
</body>
</html>
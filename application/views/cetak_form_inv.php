<!DOCTYPE html>
<html style="height: auto;">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-RKBMD APP KOTA SURABAYA</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url();?>ini_assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">  
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>ini_assets/dist/css/adminlte.min.css">
    <!-- Icon Theme -->
    <link rel="stylesheet" href="<?php echo base_url();?>ini_assets/plugins/fontawesome-free/css/all.min.css">
    <style>
    table,thead,tbody,tr,th,td{
        text-align: left;
        padding: 1px;
        /* border-bottom: 2px solid red;
        background-color: #0000ff66; */
        table-layout:fixed;
    }
    p.ex2 {
        margin: 0px;
    }
    tr { 
          line-height: 40px;
          }
    th { 
          line-height: 20px;
          font-size: 11px;
          }
    td { 
          line-height: 20px;
          font-size: 11px;
        }
    .rectangle {
        height: 230px;
        width: 340px;
        border: 2px solid black;
        }
    </style>
</head>
<body class="sidebar-mini layout-fixed" style="height: auto;">
    <!--  -->
    <center>
        <h5>
            <b>
            <p class="ex2">LEMBAR KERJA INVENTARISASI (LKI)</p>
            <p class="ex2">PERALATAN DAN MESIN</p>
            <p class="ex2">KOTA SURABAYA</p>
            </b>
        </h5>
    </center>
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th width="320px" style="text-align: right;">No. Register : 12345678-2020-556458-1</th>   
            </tr>
    
        </thead>
        <tbody>
            <tr>
                <th width="200px">Kode Lokasi</th>
                <th width="25px">:</th>
                <th width="150px">13.20.225.0224.04241</th>
            </tr>
            <tr>
                <th width="200px">Kuasa Pengguna Barang</th>
                <th width="25px">:</th>
                <th width="150px">-</th>
            </tr>
            <tr>
                <th width="200px">Pengguna Barang</th>
                <th width="25px">:</th>
                <th width="150px"><?php echo $coba;?></th>
                
            </tr>
            <tr>
                <th width="200px">Pengelola Barang</th>
                <th width="25px">:</th>
                <th width="150px">Hakim Jaksa Agung</th>
            </tr>
        </tbody>
    </table>
    <hr style="height:2px;border:none;color:#333;background-color:#333;">

    <table class="table table-sm table-borderless">
        <thead>
            <tr>    
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th width="150px">A. Kode Register</th>
                <th width="25x">:</th>
                <th width="130px">12345678-2020-556458-1</th>
                <td width="20px"><center>
                    <img src="./ini_assets/dist/img/checkbox_checked.png" alt="checkbox" width="12" height="12">
                </center></td>
                <th>Sesuai</th>
                <td width="20px"><center>
                    <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                </center></td>
                <th colspan="3">Tidak Sesuai, sebutkan yang seharusnya :</th>
            </tr>
            <tr>    
                <th width="120px">B. Kode Barang</th>
                <th width="25px">:</th>
                <th width="150px">1.3.3.04.05.002</th>
                <td width="20px"><center>
                    <img src="./ini_assets/dist/img/checkbox_checked.png" alt="checkbox" width="12" height="12">
                </center></td>
                <th>Sesuai</th>
                <td width="20px"><center>
                    <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                </center></td>
                <th colspan="3">Tidak Sesuai, sebutkan yang seharusnya :</th>
            <tr>
                <th width="120px">C. Nama Barang</th>
                <th width="25px">:</th>
                <th width="200px">Biaya Perencanaan Fisik (sederhana), Nilai Pekerjaan  2 M  (PAKET O5) Lapangan Tembak Indoor Surabaya- FISIK TAHUN 2018</th>
                <td width="20px"><center>
                    <img src="./ini_assets/dist/img/checkbox_checked.png" alt="checkbox" width="12" height="12">
                </center></td>
                <th>Sesuai</th>
                <td width="20px"><center>
                    <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                </center></td>
                <th colspan="3">Tidak Sesuai, sebutkan yang seharusnya :</th>
            </tr>
            <tr>
                <th width="120px">D. Nama Spesifikasi Barang</th>
                <th width="25px">:</th>
                <th width="150px">jl. Gayungan Timur VII-IX Kelurahan Menanggal Kecamatan Gayungan</th>
                <td width="20px"><center>
                    <img src="./ini_assets/dist/img/checkbox_checked.png" alt="checkbox" width="12" height="12">
                </center></td>
                <th>Sesuai</th>
                <td width="20px"><center>
                    <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                </center></td>
                <th colspan="3">Tidak Sesuai, sebutkan yang seharusnya :</th>
            </tr>
            <tr>
                <th width="120px">E. Jumlah Barang</th>
                <th width="25px">:</th>
                <th width="150px">1</th>
            </tr>
            <tr>
                <th width="120px">F. Satuan Barang</th>
                <th width="25px">:</th>
                <th width="150px">Unit</th>
            </tr>
            <tr>
                <th width="120px">G. Keberadaan Barang</th>
                <th width="25px">:</th>
                <th width="150px">Ada</th>
                <td width="20px"><center>
                    <img src="./ini_assets/dist/img/checkbox_checked.png" alt="checkbox" width="12" height="12">
                </center></td>
                <th>Sesuai</th>
                <td width="20px"><center>
                    <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                </center></td>
                <th colspan="3">Tidak Sesuai, sebutkan yang seharusnya :</th>
            </tr>
            <tr>
                <th width="120px">H. Nilai Perolehan Barang</th>
                <th width="25px">:</th>
                <th width="150px">Rp. 300.256.025,03</th>
                <td width="20px"><center>
                    <img src="./ini_assets/dist/img/checkbox_checked.png" alt="checkbox" width="12" height="12">
                </center></td>
                <th>Sesuai</th>
                <td width="20px"><center>
                    <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                </center></td>
                <th colspan="3">Tidak Sesuai, sebutkan yang seharusnya :</th>
            </tr>
            <tr>
                <th width="120px">I. Apakah nilai perolehan merupakan biaya atribusi/biaya yang menambah kapasitas manfaat</th>
                <th width="25px">:</th>
                <th width="150px">Bukan</th>
                <td width="20px"><center>
                    <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                </center></td>
                <th>Sesuai</th>
                <td width="20px"><center>
                    <img src="./ini_assets/dist/img/checkbox_checked.png" alt="checkbox" width="12" height="12">
                </center></td>
                <th colspan="3">Bukan merupakan biaya atribusi/biaya yang menambah kapasitas manfaat</th>
            </tr>
            <tr>
                <th width="120px"></th>
                <th width="25px"></th>
                <th width="150px"></th>
                <th width="20px"><center>a.</center></th>
                <th width="20px"><center>
                    <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                </center></th>
                <th colspan="3">Ya, Diketahui data awal/induknya dan sebutkan data barang awal/induknya:</th>
                <th></th>
            </tr>
            <tr>
                <th width="120px"></th>
                <th width="25px"></th>
                <th width="150px"></th>
                <td width="20px"></td>
                <th width="20px"></th>
                <th colspan="2">1). No. Register</th>
                <th><center>:</center></th>
                <th>.....................................</th>
            </tr>
            <tr>
                <th width="120px"></th>
                <th width="25px"></th>
                <th width="150px"></th>
                <td width="20px"></td>
                <th width="20px"></th>
                <th colspan="2">2). Kode Barang</th>
                <th><center>:</center></th>
                <th>.....................................</th>
            </tr>
            <tr>
                <th width="120px"></th>
                <th width="25px"></th>
                <th width="150px"></th>
                <td width="20px"></td>
                <th width="20px"></th>
                <th colspan="2">3). Kode Lokasi</th>
                <th><center>:</center></th>
                <th>.....................................</th>
            </tr>
            <tr>
                <th width="120px"></th>
                <th width="25px"></th>
                <th width="150px"></th>
                <td width="20px"></td>
                <th width="20px"></th>
                <th colspan="2">4). Kode Register</th>
                <th><center>:</center></th>
                <th>.....................................</th>
            </tr>
            <tr>
                <th width="120px"></th>
                <th width="25px"></th>
                <th width="150px"></th>
                <td width="20px"></td>
                <th width="20px"></th>
                <th colspan="2">5). Nama Barang</th>
                <th><center>:</center></th>
                <th>.....................................</th>
            </tr>
            <tr>
                <th width="120px"></th>
                <th width="25px"></th>
                <th width="150px"></th>
                <td width="20px"></td>
                <th width="20px"></th>
                <th colspan="2">6). Spesifikasi Nama Barang</th>
                <th><center>:</center></th>
                <th>.....................................</th>
            </tr>
            <tr>
                <th width="120px">J. Alamat</th>
                <th width="25px">:</th>
                <th width="150px">jl. Gayungan Timur VII-IX Kelurahan Menanggal Kecamatan Gayungan</th>
                <th width="20px"><center>
                    <img src="./ini_assets/dist/img/checkbox_checked.png" alt="checkbox" width="12" height="12">
                </center></th>
                <th>Sesuai</th>
                <th width="20px"><center>
                    <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                </center></td>
                <th colspan="3">Tidak Sesuai, sebutkan yang seharusnya :</th>
            </tr>
            <tr>
                <th width="120px">K. Kondisi Barang</th>
                <th width="25px">:</th>
                <th width="150px">Baik</th>
                <th width="20px"><center>
                    <img src="./ini_assets/dist/img/checkbox_checked.png" alt="checkbox" width="12" height="12">
                </center></th>
                <th>Baik</th>
                <th width="20px"><center>
                    <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                </center></th>
                <th>Kurang Baik</th>
                <th width="20px"><center>
                    <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                </center></th>
                <th>Rusak Berat</th>
            </tr>
            <tr>
                <th width="120px">L. Penggunaan Barang</th>
                <th width="25px">:</th>
                <th width="150x">1. &nbsp; <img style="Padding-top: 5px;" src="./ini_assets/dist/img/checkbox_checked.png" alt="checkbox" width="12" height="12"> &nbsp; Pemerintah Daerah</th>
                <th width="20px"><center></center></th>
                <th width="20px"></th>
                <th></th>
                <th></th>
                <th width="20px"></th>
                <th></th>
            </tr>
            <tr>
                <th width="120px"></th>
                <th width="25px"></th>
                <th width="150px">Nama Kuasa Pengguna Barang atau Pengguna Barang Lainnya</th>
                <th width="20px"><center>:</center></th>
                <th colspan="4">Heddy Sebastian E. P</th>
            </tr>
            <tr>
                <th width="120px"></th>
                <th width="25px"></th>
                <th width="150x">2. &nbsp; <img style="Padding-top: 5px;" src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12"> &nbsp; Pemerintah Pusat</th>
                <th colspan="4">Dasar Penggunaan :</th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th width="120px"></th>
                <th width="25px"></th>
                <th width="150x"></th>
                <th colspan="5">a. &nbsp; <img style="Padding-top: 5px;" src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12"> &nbsp; Ada, sebutkan..........</th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th width="120px"></th>
                <th width="25px"></th>
                <th width="150x"></th>
                <th colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.) &nbsp; Nama</th>
                <th width="20px"><center>:</center></th>
                <th>.....................................</th>
            </tr>
            <tr>
                <th width="120px"></th>
                <th width="25px"></th>
                <th width="150x"></th>
                <th colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.) &nbsp; Nama Dokumen</th>
                <th width="20px"><center>:</center></th>
                <th>.....................................</th>
            </tr>
            <tr>
                <th width="120px"></th>
                <th width="25px"></th>
                <th width="150x"></th>
                <th colspan="6">b. &nbsp; <img style="Padding-top: 5px;" src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12"> &nbsp; Tidak Ada dasar penggunaan...</th>
            </tr>
            <tr>
                <th width="120px"></th>
                <th width="25px"></th>
                <th width="150x"></th>
                <th colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.) &nbsp; Nama</th>
                <th width="20px"><center>:</center></th>
                <th>.....................................</th>
            </tr>
            
            <tr>
                <th width="120px"></th>
                <th width="25px"></th>
                <th width="150x">3. &nbsp; <img style="Padding-top: 5px;" src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12"> &nbsp; Pemerintahan Daerah Lainnya</th>
                <th colspan="4">Dasar Penggunaan :</th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th width="120px"></th>
                <th width="25px"></th>
                <th width="150x"></th>
                <th colspan="4">a. &nbsp; <img style="Padding-top: 5px;" src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12"> &nbsp; Ada, sebutkan..........</th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th width="120px"></th>
                <th width="25px"></th>
                <th width="150x"></th>
                <th colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.) &nbsp; Nama</th>
                <th width="20px" ><center>:</center></th>
                <th>.....................................</th>
            </tr>
            <tr>
                <th width="120px"></th>
                <th width="25px"></th>
                <th width="150x"></th>
                <th colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.) &nbsp; Nama Dokumen</th>
                <th width="20px"><center>:</center></th>
                <th>.....................................</th>
            </tr>
            <tr>
                <th width="120px"></th>
                <th width="25px"></th>
                <th width="150x"></th>
                <th colspan="6">b. &nbsp; <img style="Padding-top: 5px;" src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12"> &nbsp; Tidak Ada dasar penggunaan...</th>
            </tr>
            <tr>
                <th width="120px"></th>
                <th width="25px"></th>
                <th width="150x"></th>
                <th colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.) &nbsp; Nama</th>
                <th width="20px"><center>:</center></th>
                <th>.....................................</th>
            </tr>
            <tr>
                <th width="120px"></th>
                <th width="25px"></th>
                <th width="150x">4. &nbsp; <img style="Padding-top: 5px;" src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12"> &nbsp; Pihak Lain</th>
                <th colspan="4">Dasar Penggunaan :</th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th width="120px"></th>
                <th width="25px"></th>
                <th width="150x"></th>
                <th colspan="4">a. &nbsp; <img style="Padding-top: 5px;" src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12"> &nbsp; Ada, sebutkan..........</th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th width="120px"></th>
                <th width="25px"></th>
                <th width="150x"></th>
                <th colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.) &nbsp; Nama Pihak Lain</th>
                <th width="20px" ><center>:</center></th>
                <th>.....................................</th>
            </tr>
            <tr>
                <th width="120px"></th>
                <th width="25px"></th>
                <th width="150x"></th>
                <th colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.) &nbsp; Nama Dokumen</th>
                <th width="20px"><center>:</center></th>
                <th>.....................................</th>
            </tr>
            <tr>
                <th width="120px"></th>
                <th width="25px"></th>
                <th width="150x"></th>
                <th colspan="6">b. &nbsp; <img style="Padding-top: 5px;" src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12"> &nbsp; Tidak Ada dasar penggunaan...</th>
            </tr>
            <tr>
                <th width="120px"></th>
                <th width="25px"></th>
                <th width="150x"></th>
                <th colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.) &nbsp; Nama Pihak Lain</th>
                <th width="20px"><center>:</center></th>
                <th>.....................................</th>
            </tr>
            <tr>
                <th width="120px">M. Data Barang tercatat ganda</th>
                <th width="25px">:</th>
                <th width="150px">jl. Gayungan Timur VII-IX Kelurahan Menanggal Kecamatan Gayungan</th>
                <th width="20px"><center>
                    <img src="./ini_assets/dist/img/checkbox_checked.png" alt="checkbox" width="12" height="12">
                </center></th>
                <th>Tidak</th>
                <th width="20px"><center>
                    <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                </center></th>
                <th colspan="4">Ya, Jika ya sebutkan pencatatan ganda dengan :</th>
            </tr>
            <tr>
                <th width="120px"></th>
                <th width="25px"></th>
                <th width="150px"></th>
                <th width="20px"></th>
                <th></th>
                <th></td>
                <th width="100px">a. No. Register</th>
                <th>:</th>
                <th>.....................................</th>
            </tr>
            <tr>
                <th width="120px"></th>
                <th width="25px"></th>
                <th width="150px"></th>
                <th width="20px"></th>
                <th></th>
                <th></td>
                <th width="100px">b. Kode Register</th>
                <th>:</th>
                <th>.....................................</th>
            </tr>
            <tr>
                <th width="120px"></th>
                <th width="25px"></th>
                <th width="150px"></th>
                <th width="20px"></th>
                <th></th>
                <th></td>
                <th width="100px">c. Kode Barang</th>
                <th>:</th>
                <th>.....................................</th>
            </tr>
            <tr>
                <th width="120px"></th>
                <th width="25px"></th>
                <th width="150px"></th>
                <th width="20px"></th>
                <th></th>
                <th></td>
                <th width="100px">d. Nama Barang</th>
                <th>:</th>
                <th>.....................................</th>
            </tr>
            <tr>
                <th width="120px"></th>
                <th width="25px"></th>
                <th width="150px"></th>
                <th width="20px"></th>
                <th></th>
                <th></td>
                <th width="100px">e. Nama Spesifikasi Barang</th>
                <th>:</th>
                <th>.....................................</th>
            </tr>
            <tr>
                <th width="120px"></th>
                <th width="25px"></th>
                <th width="150px"></th>
                <th width="20px"></th>
                <th></th>
                <th></td>
                <th width="100px">f. Jumlah</th>
                <th>:</th>
                <th>.....................................</th>
            </tr>
            <tr>
                <th width="120px"></th>
                <th width="25px"></th>
                <th width="150px"></th>
                <th width="20px"></th>
                <th></th>
                <th></td>
                <th width="100px">g. Satuan</th>
                <th>:</th>
                <th>.....................................</th>
            </tr>
            <tr>
                <th width="120px"></th>
                <th width="25px"></th>
                <th width="150px"></th>
                <th width="20px"></th>
                <th></th>
                <th></td>
                <th width="100px">h. Nilai Perolehan Barang</th>
                <th>:</th>
                <th>.....................................</th>
            </tr>
            <tr>
                <th width="120px"></th>
                <th width="25px"></th>
                <th width="150px"></th>
                <th width="20px"></th>
                <th></th>
                <th></td>
                <th width="100px">i. Tanggal, Bulan, Tahun perolehan</th>
                <th>:</th>
                <th>.....................................</th>
            </tr>
            <tr>
                <th width="120px"></th>
                <th width="25px"></th>
                <th width="150px"></th>
                <th width="20px"></th>
                <th></th>
                <th></td>
                <th width="100px">j. Kuasa Pengguna Barang Lainnya, Pengguna Barang Lainnya, atau Pengelola Barang</th>
                <th>:</th>
                <th>.....................................</th>
            </tr>
            <tr>
                <th width="120px">N. Titik Koordinat</th>
                <th width="25px">:</th>
                <th width="150px">-7.2564168,112.7506758</th>
            </tr>
            <tr>
                <th width="120px">O. Lainnya</th>
                <th width="25px">:</th>
                <th>................................................................</th>
            </tr>
            <tr>
                <th width="120px">P. Keterangan</th>
                <th width="25px">:</th>
                <th>................................................................</th>
            </tr>
            <tr>
                <th width="120px">Q. Foto/Denah</th>
                <th width="25px">:</th>
                <th>................................................................</th>
            </tr>
            <tr>
                <!-- <th width="120px" rowspan="4"><div class="rectangle"></div></th> -->
                <th width="120px">
                        <img style="Padding-top: 5px;" src="./ini_assets/dist/img/photo1.png" alt="checkbox" width="150" height="150">
                        <img style="Padding-top: 5px;" src="./ini_assets/dist/img/photo2.png" alt="checkbox" width="150" height="150">
                        <img style="Padding-top: 5px;" src="./ini_assets/dist/img/photo4.jpg" alt="checkbox" width="150" height="150">
                        <img style="Padding-top: 5px;" src="./ini_assets/dist/img/avatar04.png" alt="checkbox" width="150" height="150">
                <th>
                <th width="25px"></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th>&nbsp;</th>
            </tr>
            <tr>
                <th width="120px"></th>
                <th></th>
                <th></th>
                <th colspan="4" width="100px" style="text-align: right;"><center><?php echo "Surabaya, " . date("Y-m-d");?></center></th>
            </tr>
            <tr>
                <th width="120px"></th>
                <th width="25px"></th>
                <th></th>
                <th colspan="4" width="100px" style="text-align: right;"><center>Pelaksana/Petugas Inventarisasi</center></th>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th style="text-align: right;">No. &nbsp;&nbsp;</th>
                <th colspan="3">Nama</th>
                <th></th>
                <th></th>
            </tr>   
            <tr>
                <th></th>
                <th></th>
                <th style="text-align: right;">1. &nbsp;&nbsp;</th>
                <th colspan="5">Iftita Nuria K. S.Kom, S.AK, S.Pd, M.TR</th>
                <th>...............</th>
                <th></th>
            </tr><tr>
                <th></th>
                <th></th>
                <th style="text-align: right;">2. &nbsp;&nbsp;</th>
                <th colspan="5">M. Ali Fikri, S.KK, S.Kom, M.Sc.</th>
                <th>................</th>
                <th></th>
            </tr>  
            
            
        </tbody>
    </table>

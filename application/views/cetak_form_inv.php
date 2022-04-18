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
            <p class="ex2"><?php echo strtoupper($this->session->userdata('skpd'));?> KOTA SURABAYA</p>
            </b>
        </h5>
    </center>
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th width="320px" style="text-align: right;">No. Register : <?php echo $data_kib->register; ?></th>   
            </tr>
    
        </thead>
        <tbody>
            <tr>
                <th width="200px">Kode Lokasi</th>
                <th width="25px">:</th>
                <th width="150px"><?php echo $data_kib->nomor_lokasi; ?></th>
            </tr>
            <tr>
                <th width="200px">Kuasa Pengguna Barang</th>
                <th width="25px">:</th>
                <th width="150px">-</th>
            </tr>
            <tr>
                <th width="200px">Pengguna Barang</th>
                <th width="25px">:</th>
                <th width="150px"><?php echo $this->session->userdata('kepala_opd');?></th>
                
            </tr>
            <tr>
                <th width="200px">Pengelola Barang</th>
                <th width="25px">:</th>
                <th width="150px">Ir. Hendro Gunawan, MA</th>
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
                <th width="130px"><?php echo $data_kib->register; ?></th>
                <td width="20px">
                    <center>
                        <img src="./ini_assets/dist/img/checkbox_checked.png" alt="checkbox" width="12" height="12">
                    </center>
                </td>
                <th>Sesuai</th>
                <td width="20px">
                    <center>
                        <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                    </center>
                </td>
                <th colspan="3">Tidak Sesuai, sebutkan yang seharusnya :</th>
            </tr>
            <tr>    
                <th width="120px">B. Kode Barang</th>
                <th width="25px">:</th>
                <th width="150px"><?php echo $data_kib->kode108_baru; ?></th>
                <td width="20px">
                <?php if($data_is_register->is_kode_barang == 0) {?>
                        <center>
                            <img src="./ini_assets/dist/img/checkbox_checked.png" alt="checkbox" width="12" height="12">
                        </center>
                    </td>
                    <th>Sesuai</th>
                    <td width="20px">
                        <center>
                            <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                        </center>
                <?php } else { ?>
                    <center>
                            <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                        </center>
                    </td>
                    <th>Sesuai</th>
                    <td width="20px">
                        <center>
                            <img src="./ini_assets/dist/img/checkbox_checked.png" alt="checkbox" width="12" height="12">
                        </center>
                    <?php } ?>
                </td>
                <th colspan="3">Tidak Sesuai, sebutkan yang seharusnya :
                        <?php if ($data_is_register->is_kode_barang == 1) { echo $data_register->kode_barang;}?> 
                </th>
            <tr>
                <th width="120px">C. Nama Barang</th>
                <th width="25px">:</th>
                <th width="200px"><?php echo $data_kib->nama_barang; ?></th>
                <td width="20px"><?php if($data_is_register->is_nama_barang == 0) {?>
                        <center>
                            <img src="./ini_assets/dist/img/checkbox_checked.png" alt="checkbox" width="12" height="12">
                        </center>
                    </td>
                    <th>Sesuai</th>
                    <td width="20px">
                        <center>
                            <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                        </center>
                <?php } else { ?>
                    <center>
                            <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                        </center>
                    </td>
                    <th>Sesuai</th>
                    <td width="20px">
                        <center>
                            <img src="./ini_assets/dist/img/checkbox_checked.png" alt="checkbox" width="12" height="12">
                        </center>
                    <?php } ?></td>
                <th colspan="3">Tidak Sesuai, sebutkan yang seharusnya : 
                    <?php if ($data_is_register->is_nama_barang == 1) { echo $data_register->nama_barang;}?>
                </th>
            </tr>
            <tr>
                <th width="120px">D. Nama Spesifikasi Barang</th>
                <th width="25px">:</th>
                <th width="150px"><?php echo $data_kib->merk_alamat; ?></th>
                <td width="20px">
                <?php if($data_is_register->is_spesifikasi_barang_merk == 0) {?>
                        <center>
                            <img src="./ini_assets/dist/img/checkbox_checked.png" alt="checkbox" width="12" height="12">
                        </center>
                    </td>
                    <th>Sesuai</th>
                    <td width="20px">
                        <center>
                            <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                        </center>
                <?php } else { ?>
                    <center>
                            <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                        </center>
                    </td>
                    <th>Sesuai</th>
                    <td width="20px">
                        <center>
                            <img src="./ini_assets/dist/img/checkbox_checked.png" alt="checkbox" width="12" height="12">
                        </center>
                    <?php } ?></td>
                <th colspan="3">Tidak Sesuai, sebutkan yang seharusnya : 
                    <?php if ($data_is_register->is_spesifikasi_barang_merk == 1) { echo $data_register->spesifikasi_barang_merk;}?>
                </th>
            </tr>
            <tr>
                <th width="120px">E. Jumlah Barang</th>
                <th width="25px">:</th>
                <th width="150px">1</th>
            </tr>
            <tr>
                <th width="120px">F. Satuan Barang</th>
                <th width="25px">:</th>
                <th width="150px"><?php echo $data_register->satuan; ?></th>
            </tr>
            <tr>
                <th width="120px">G. Keberadaan Barang</th>
                <th width="25px">:</th>
                <th width="150px">Ada</th>
                <td width="20px"><?php if($data_is_register->is_keberadaan_barang == 0) {?>
                        <center>
                            <img src="./ini_assets/dist/img/checkbox_checked.png" alt="checkbox" width="12" height="12">
                        </center>
                    </td>
                    <th>Sesuai</th>
                    <td width="20px">
                        <center>
                            <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                        </center>
                <?php } else { ?>
                    <center>
                            <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                        </center>
                    </td>
                    <th>Sesuai</th>
                    <td width="20px">
                        <center>
                            <img src="./ini_assets/dist/img/checkbox_checked.png" alt="checkbox" width="12" height="12">
                        </center>
                    <?php } ?></td>
                <th colspan="3">Tidak Sesuai, sebutkan yang seharusnya : 
                    <?php if ($data_is_register->is_keberadaan_barang == 1) { echo $data_register->keberadaan_barang;}?>
                </th>
            </tr>
            <tr>
                <th width="120px">H. Nilai Perolehan Barang</th>
                <th width="25px">:</th>
                <th width="150px"><?php echo $data_kib->harga_baru; ?></th>
                <td width="20px"><?php if($data_is_register->is_nilai_perolehan == 0) {?>
                        <center>
                            <img src="./ini_assets/dist/img/checkbox_checked.png" alt="checkbox" width="12" height="12">
                        </center>
                    </td>
                    <th>Sesuai</th>
                    <td width="20px">
                        <center>
                            <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                        </center>
                <?php } else { ?>
                    <center>
                            <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                        </center>
                    </td>
                    <th>Sesuai</th>
                    <td width="20px">
                        <center>
                            <img src="./ini_assets/dist/img/checkbox_checked.png" alt="checkbox" width="12" height="12">
                        </center>
                    <?php } ?></td>
                <th colspan="3">Tidak Sesuai, sebutkan yang seharusnya : 
                    <?php if ($data_is_register->is_nilai_perolehan == 1) { echo $data_register->nilai_perolehan;}?>
                </th>
            </tr>
            <tr>
                <th width="120px">I. Apakah nilai perolehan merupakan biaya atribusi/biaya yang menambah kapasitas manfaat</th>
                <th width="25px">:</th>
                <th width="150px"><?php echo $data_register->merupakan_anak; ?></th>
                <td width="20px"><?php if($data_is_register->is_aset_atrib == 0) {?>
                        <center>
                            <img src="./ini_assets/dist/img/checkbox_checked.png" alt="checkbox" width="12" height="12">
                        </center>
                    </td>
                    <th>Sesuai</th>
                    <td width="20px">
                        <center>
                            <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                        </center>
                <?php } else { ?>
                    <center>
                            <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                        </center>
                    </td>
                    <th>Sesuai</th>
                    <td width="20px">
                        <center>
                            <img src="./ini_assets/dist/img/checkbox_checked.png" alt="checkbox" width="12" height="12">
                        </center>
                    <?php } ?></td>
                <th colspan="3">Tidak Sesuai, sebutkan yang seharusnya : 
                    <?php if ($data_is_register->is_aset_atrib == 1) { echo $data_register->merupakan_anak;}?>
                </th>
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
                <th width="150px"><?php echo $data_register->alamat; ?></th>
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
                <th width="150px"><?php if ($data_kib->kondisi == "B") {echo "Baik";} elseif ($data_kib->kondisi == "KB") {echo "Kurang Baik" ;} else {echo "Rusak Berat";}?></th>
                <th width="20px">
                <?php if ($data_kib->kondisi == "B") {?>
                    <center>
                        <img src="./ini_assets/dist/img/checkbox_checked.png" alt="checkbox" width="12" height="12">
                    </center>
                </th>
                <th>Baik</th>
                <th width="20px">
                    <center>
                        <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                    </center>
                </th>
                <th>Kurang Baik</th>
                <th width="20px">
                    <center>
                        <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                    </center>
                </th>
                <th>Rusak Berat</th>
                <?php } elseif ($data_kib->kondisi == "KB") {?>
                    <center>
                        <img src="./ini_assets/dist/img/checkbox_non_checked.png" alt="checkbox" width="12" height="12">
                    </center>
                </th>
                <th>Baik</th>
                <th width="20px">
                    <center>
                        <img src="./ini_assets/dist/img/checkbox_checked.png" alt="checkbox" width="12" height="12">
                    </center>
                </th>
                <th>Kurang Baik</th>
                <th width="20px">
                    <center>
                        <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                    </center>
                </th>
                <th>Rusak Berat</th>
                <?php } else {?>
                    <center>
                        <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                    </center>
                </th>
                <th>Baik</th>
                <th width="20px">
                    <center>
                        <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                    </center>
                </th>
                <th>Kurang Baik</th>
                <th width="20px">
                    <center>
                        <img src="./ini_assets/dist/img/checkbox_checked.png" alt="checkbox" width="12" height="12">
                    </center>
                </th>
                <th>Rusak Berat</th>
                <?php } ?>
            </tr>
            <tr>
                <th width="120px">L. Tipe</th>
                <th width="25px">:</th>
                <th width="150px"><?php echo $data_kib->tipe; ?></th>
                <th width="20px"><?php if($data_is_register->is_tipe == 0) {?>
                        <center>
                            <img src="./ini_assets/dist/img/checkbox_checked.png" alt="checkbox" width="12" height="12">
                        </center>
                    </td>
                    <th>Sesuai</th>
                    <td width="20px">
                        <center>
                            <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                        </center>
                <?php } else { ?>
                    <center>
                            <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                        </center>
                    </td>
                    <th>Sesuai</th>
                    <td width="20px">
                        <center>
                            <img src="./ini_assets/dist/img/checkbox_checked.png" alt="checkbox" width="12" height="12">
                        </center>
                    <?php } ?></td>
                <th colspan="3">Tidak Sesuai, sebutkan yang seharusnya : 
                    <?php if ($data_is_register->is_tipe == 1) { echo $data_register->tipe;}?>
                </th>
            </tr>
            <tr>
                <th width="120px">M. Nomor Polisi</th>
                <th width="25px">:</th>
                <th width="150px"><?php echo $data_kib->nopol; ?></th>
                <th width="20px"><?php if($data_is_register->is_nopol == 0) {?>
                        <center>
                            <img src="./ini_assets/dist/img/checkbox_checked.png" alt="checkbox" width="12" height="12">
                        </center>
                    </td>
                    <th>Sesuai</th>
                    <td width="20px">
                        <center>
                            <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                        </center>
                <?php } else { ?>
                    <center>
                            <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                        </center>
                    </td>
                    <th>Sesuai</th>
                    <td width="20px">
                        <center>
                            <img src="./ini_assets/dist/img/checkbox_checked.png" alt="checkbox" width="12" height="12">
                        </center>
                    <?php } ?></td>
                <th colspan="3">Tidak Sesuai, sebutkan yang seharusnya : 
                    <?php if ($data_is_register->is_nopol == 1) { echo $data_register->nopol;}?>
                </th>
            </tr>
            <tr>
                <th width="120px">N. Nomor Rangka</th>
                <th width="25px">:</th>
                <th width="150px"><?php echo $data_kib->no_rangka_seri; ?></th>
                <th width="20px"><?php if($data_is_register->is_no_rangka == 0) {?>
                        <center>
                            <img src="./ini_assets/dist/img/checkbox_checked.png" alt="checkbox" width="12" height="12">
                        </center>
                    </td>
                    <th>Sesuai</th>
                    <td width="20px">
                        <center>
                            <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                        </center>
                <?php } else { ?>
                    <center>
                            <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                        </center>
                    </td>
                    <th>Sesuai</th>
                    <td width="20px">
                        <center>
                            <img src="./ini_assets/dist/img/checkbox_checked.png" alt="checkbox" width="12" height="12">
                        </center>
                    <?php } ?></td>
                <th colspan="3">Tidak Sesuai, sebutkan yang seharusnya : 
                    <?php if ($data_is_register->is_no_rangka == 1) { echo $data_register->no_rangka_seri;}?>
                </th>
            </tr>
            <tr>
                <th width="120px">O. Nomor BPKB</th>
                <th width="25px">:</th>
                <th width="150px"><?php echo $data_kib->no_bpkb; ?></th>
                <th width="20px"><?php if($data_is_register->is_no_bpkb == 0) {?>
                        <center>
                            <img src="./ini_assets/dist/img/checkbox_checked.png" alt="checkbox" width="12" height="12">
                        </center>
                    </td>
                    <th>Sesuai</th>
                    <td width="20px">
                        <center>
                            <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                        </center>
                <?php } else { ?>
                    <center>
                            <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                        </center>
                    </td>
                    <th>Sesuai</th>
                    <td width="20px">
                        <center>
                            <img src="./ini_assets/dist/img/checkbox_checked.png" alt="checkbox" width="12" height="12">
                        </center>
                    <?php } ?></td>
                <th colspan="3">Tidak Sesuai, sebutkan yang seharusnya : 
                    <?php if ($data_is_register->is_no_bpkb == 1) { echo $data_register->no_bpkb;}?>
                </th>
            </tr>
            <tr>
                <th width="120px">P. Penggunaan Barang</th>
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
                <th colspan="4"><?php echo $this->session->userdata('kepala_opd');?></th>
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
                <th width="120px">Q. Data Barang tercatat ganda</th>
                <th width="25px">:</th>
                <th width="150px"><?php echo $data_register->register_ganda; ?></th>
                <th width="20px"><?php if($data_is_register->is_catat_ganda == 0) {?>
                        <center>
                            <img src="./ini_assets/dist/img/checkbox_checked.png" alt="checkbox" width="12" height="12">
                        </center>
                    </td>
                    <th>Tidak</th>
                    <td width="20px">
                        <center>
                            <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                        </center>
                <?php } else { ?>
                    <center>
                            <img src="./ini_assets/dist/img/checkbox_non-checked.png" alt="checkbox" width="12" height="12">
                        </center>
                    </td>
                    <th>Tidak</th>
                    <td width="20px">
                        <center>
                            <img src="./ini_assets/dist/img/checkbox_checked.png" alt="checkbox" width="12" height="12">
                        </center>
                    <?php } ?></td>
                <th colspan="3">Ya, sebutkan yang seharusnya : 
                    <?php if ($data_is_register->is_catat_ganda == 1) { echo $data_register->register_ganda;}?>
                </th>
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
            <!-- <tr>
                <th width="120px">N. Titik Koordinat</th>
                <th width="25px">:</th>
                <th width="150px"><?php echo $data_kib->koordinat; ?></th>
            </tr> -->
            <tr>
                <th width="120px">R. Lainnya</th>
                <th width="25px">:</th>
                <th><?php echo $data_register->lainnya;?></th>
            </tr>
            <tr>
                <th width="120px">S. Keterangan</th>
                <th width="25px">:</th>
                <th><?php echo $data_kib->keterangan;?></th>
            </tr>
            <tr>
                <th width="120px">T. Foto/Denah</th>
                <th width="25px">:</th>
                <th></th>
            </tr>
            <tr>
                <!-- <th width="120px" rowspan="4"><div class="rectangle"></div></th> -->
                <th width="120px">
                        <?php foreach ($image as $key) {?>
                            <img style="Padding-top: 5px;" src="./ini_assets/upload/<?php echo $key->file_upload?>" alt="checkbox" width="150" height="150">
                        <?php } ?>
                        
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
            <?php $x=1; foreach ($petugas->result() as $row) {?>   
            <tr>
                <th></th>
                <th></th>
                <th style="text-align: right;"><?php echo $x?>. &nbsp;&nbsp;</th>
                <th colspan="5"><?php echo $row->nama_petugas?></th>
                <th>............................</th>
                <th></th>
            </tr>
            <?php $x++; } ?> 
            
            
        </tbody>
    </table>

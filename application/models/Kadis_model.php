<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Kadis_model extends CI_Model{

    public function __construct() {
            parent::__construct();
            // $simbada = $this->load->database('simbada', TRUE);
        }


    public function get_kib_per_aset($kode,$unit) {

        $db_simbada=$this->load->database('simbada',TRUE);
        
        if ($this->session->userdata('role') == "Pengurus Barang Pembantu UPTD") {
            $query = $db_simbada->query(
                "SELECT
                    sum(
                    COALESCE ( sawal.x, 0 )+ COALESCE ( tambah.y, 0 )) as jum_kib
                    FROM
                    (
                    SELECT
                        sum( saldo_barang ) x 
                    FROM
                        kib_awal 
                    WHERE
                        hapus = '' 
                        AND LEFT ( kode64_baru, 6 ) = '".$kode."' 
                        AND extrakomtabel_baru = '' AND nomor_lokasi_baru in ( '".implode("','",$unit)."' )
                    ) sawal,
                    (
                    SELECT
                        sum( saldo_barang ) y 
                    FROM
                        kib 
                    WHERE
                        hapus = '' 
                        AND LEFT ( kode64_baru, 6 ) = '".$kode."'  
                        AND extrakomtabel_baru = '' AND nomor_lokasi_baru in ( '".implode("','",$unit)."' )
                    ) tambah"
            );
        } else { 
            $query = $db_simbada->query(
                "SELECT
                    sum(
                    COALESCE ( sawal.x, 0 )+ COALESCE ( tambah.y, 0 )) as jum_kib
                    FROM
                    (
                    SELECT
                        sum( saldo_barang ) x 
                    FROM
                        kib_awal 
                    WHERE
                        hapus = '' 
                        AND LEFT ( kode64_baru, 6 ) = '".$kode."' 
                        AND extrakomtabel_baru = '' AND nomor_lokasi_baru like '".$unit."%'
                    ) sawal,
                    (
                    SELECT
                        sum( saldo_barang ) y 
                    FROM
                        kib 
                    WHERE
                        hapus = '' 
                        AND LEFT ( kode64_baru, 6 ) = '".$kode."'  
                        AND extrakomtabel_baru = '' AND nomor_lokasi_baru like '".$unit."%'
                    ) tambah"
            );
        }
    
        return $query;
    }


    function data_progres_opd_tanah($lokasi){
        // return $query;
        if($this->session->userdata('role') == "Pengurus Barang Pembantu UPTD" ){
            $query=$this->db->query(
                "SELECT
                    COUNT(
                    IF
                    ( a.STATUS = 1, 1, NULL )) AS proses,
                    COUNT(
                    IF
                    ( a.STATUS = 2, 1, NULL )) AS verif,
                    COUNT(
                    IF
                    ( a.STATUS = 3, 1, NULL )) AS tolak
                FROM
                    register_isi a 
                WHERE
                    a.extrakomtabel <> 1 and a.hapus <> 1 and kode_barang like '1.3.1%' and a.nomor_lokasi_awal IN ( '".implode("','",$lokasi)."' )");
        } else {
        $query=$this->db->query(
            "SELECT
                    COUNT(
                    IF
                    ( a.STATUS = 1, 1, NULL )) AS proses,
                    COUNT(
                    IF
                    ( a.STATUS = 2, 1, NULL )) AS verif,
                    COUNT(
                    IF
                    ( a.STATUS = 3, 1, NULL )) AS tolak
                FROM
                    register_isi a 
                WHERE
                    a.extrakomtabel <> 1 and a.hapus <> 1 and kode_barang like '1.3.1%' and a.nomor_lokasi_awal like '".$lokasi."%'");
        }
        return $query;
    }

    function data_progres_opd_pm($lokasi){
         // return $query;
         if($this->session->userdata('role') == "Pengurus Barang Pembantu UPTD" ){
            $query=$this->db->query(
                "SELECT
                    COUNT(
                    IF
                    ( a.STATUS = 1, 1, NULL )) AS proses,
                    COUNT(
                    IF
                    ( a.STATUS = 2, 1, NULL )) AS verif,
                    COUNT(
                    IF
                    ( a.STATUS = 3, 1, NULL )) AS tolak
                FROM
                    register_isi a 
                WHERE
                    a.extrakomtabel <> 1 and a.hapus <> 1 and kode_barang like '1.3.2%' and a.nomor_lokasi_awal IN ( '".implode("','",$lokasi)."' )");
        } else {
        $query=$this->db->query(
            "SELECT
                    COUNT(
                    IF
                    ( a.STATUS = 1, 1, NULL )) AS proses,
                    COUNT(
                    IF
                    ( a.STATUS = 2, 1, NULL )) AS verif,
                    COUNT(
                    IF
                    ( a.STATUS = 3, 1, NULL )) AS tolak
                FROM
                    register_isi a 
                WHERE
                    a.extrakomtabel <> 1 and a.hapus <> 1 and kode_barang like '1.3.2%' and a.nomor_lokasi_awal like '".$lokasi."%'");
        }
        return $query;
    }

    function data_progres_opd_gdb($lokasi){
         // return $query;
         if($this->session->userdata('role') == "Pengurus Barang Pembantu UPTD" ){
            $query=$this->db->query(
                "SELECT
                    COUNT(
                    IF
                    ( a.STATUS = 1, 1, NULL )) AS proses,
                    COUNT(
                    IF
                    ( a.STATUS = 2, 1, NULL )) AS verif,
                    COUNT(
                    IF
                    ( a.STATUS = 3, 1, NULL )) AS tolak
                FROM
                    register_isi a 
                WHERE
                    a.extrakomtabel <> 1 and a.hapus <> 1 and kode_barang like '1.3.3%' and a.nomor_lokasi_awal IN ( '".implode("','",$lokasi)."' )");
        } else {
        $query=$this->db->query(
            "SELECT
                    COUNT(
                    IF
                    ( a.STATUS = 1, 1, NULL )) AS proses,
                    COUNT(
                    IF
                    ( a.STATUS = 2, 1, NULL )) AS verif,
                    COUNT(
                    IF
                    ( a.STATUS = 3, 1, NULL )) AS tolak
                FROM
                    register_isi a 
                WHERE
                    a.extrakomtabel <> 1 and a.hapus <> 1 and kode_barang like '1.3.3%' and a.nomor_lokasi_awal like '".$lokasi."%'");
        }
        return $query;
    }

    function data_progres_opd_jij($lokasi){
         // return $query;
         if($this->session->userdata('role') == "Pengurus Barang Pembantu UPTD" ){
            $query=$this->db->query(
                "SELECT
                    COUNT(
                    IF
                    ( a.STATUS = 1, 1, NULL )) AS proses,
                    COUNT(
                    IF
                    ( a.STATUS = 2, 1, NULL )) AS verif,
                    COUNT(
                    IF
                    ( a.STATUS = 3, 1, NULL )) AS tolak
                FROM
                    register_isi a 
                WHERE
                    a.extrakomtabel <> 1 and a.hapus <> 1 and kode_barang like '1.3.4%' and a.nomor_lokasi_awal IN ( '".implode("','",$lokasi)."' )");
        } else {
        $query=$this->db->query(
            "SELECT
                    COUNT(
                    IF
                    ( a.STATUS = 1, 1, NULL )) AS proses,
                    COUNT(
                    IF
                    ( a.STATUS = 2, 1, NULL )) AS verif,
                    COUNT(
                    IF
                    ( a.STATUS = 3, 1, NULL )) AS tolak
                FROM
                    register_isi a 
                WHERE
                    a.extrakomtabel <> 1 and a.hapus <> 1 and kode_barang like '1.3.4%' and a.nomor_lokasi_awal like '".$lokasi."%'");
        }
        return $query;
    }

    function data_progres_opd_atl($lokasi){
         // return $query;
         if($this->session->userdata('role') == "Pengurus Barang Pembantu UPTD" ){
            $query=$this->db->query(
                "SELECT
                    COUNT(
                    IF
                    ( a.STATUS = 1, 1, NULL )) AS proses,
                    COUNT(
                    IF
                    ( a.STATUS = 2, 1, NULL )) AS verif,
                    COUNT(
                    IF
                    ( a.STATUS = 3, 1, NULL )) AS tolak
                FROM
                    register_isi a 
                WHERE
                    a.extrakomtabel <> 1 and a.hapus <> 1 and kode_barang like '1.3.5%' and a.nomor_lokasi_awal IN ( '".implode("','",$lokasi)."' )");
        } else {
        $query=$this->db->query(
            "SELECT
                    COUNT(
                    IF
                    ( a.STATUS = 1, 1, NULL )) AS proses,
                    COUNT(
                    IF
                    ( a.STATUS = 2, 1, NULL )) AS verif,
                    COUNT(
                    IF
                    ( a.STATUS = 3, 1, NULL )) AS tolak
                FROM
                    register_isi a 
                WHERE
                    a.extrakomtabel <> 1 and a.hapus <> 1 and kode_barang like '1.3.5%' and a.nomor_lokasi_awal like '".$lokasi."%'");
        }
        return $query;
    }

    function data_progres_opd_atb($lokasi){
        // return $query;
        if($this->session->userdata('role') == "Pengurus Barang Pembantu UPTD" ){
            $query=$this->db->query(
                "SELECT
                    COUNT(
                    IF
                    ( a.STATUS = 1, 1, NULL )) AS proses,
                    COUNT(
                    IF
                    ( a.STATUS = 2, 1, NULL )) AS verif,
                    COUNT(
                    IF
                    ( a.STATUS = 3, 1, NULL )) AS tolak
                FROM
                    register_isi a 
                WHERE
                    a.extrakomtabel <> 1 and a.hapus <> 1 and kode_barang like '1.5.3%' and a.nomor_lokasi_awal IN ( '".implode("','",$lokasi)."' )");
        } else {
        $query=$this->db->query(
            "SELECT
                    COUNT(
                    IF
                    ( a.STATUS = 1, 1, NULL )) AS proses,
                    COUNT(
                    IF
                    ( a.STATUS = 2, 1, NULL )) AS verif,
                    COUNT(
                    IF
                    ( a.STATUS = 3, 1, NULL )) AS tolak
                FROM
                    register_isi a 
                WHERE
                    a.extrakomtabel <> 1 and a.hapus <> 1 and kode_barang like '1.5.3%' and a.nomor_lokasi_awal like '".$lokasi."%'");
        }
        return $query;
    }

    public function get_sisa_per_aset($kib,$lokasi) {

        if($this->session->userdata('role') == "Pengurus Barang Pembantu UPTD" ) {
            $query = $this->db->query("SELECT a.register FROM `2023_v1`.`kib_awal` a where a.extrakomtabel_baru = '' and a.hapus = '' and a.kode64_baru like '".$kib."%' and a.nomor_lokasi_baru IN ( '".implode("','",$lokasi)."' ) and NOT EXISTS (SELECT y.register from `rkbmd2023`.register_isi y where a.register=y.register) union SELECT a.register FROM `2023_v1`.`kib` a where a.extrakomtabel_baru = '' and a.hapus = '' and a.kode64_baru like '".$kib."%' and a.nomor_lokasi_baru IN ( '".implode("','",$lokasi)."' ) and NOT EXISTS (SELECT y.register from `rkbmd2023`.register_isi y where a.register=y.register)");
        } else {
            $query = $this->db->query("SELECT a.register FROM `2023_v1`.`kib_awal` a where a.extrakomtabel_baru = '' and a.hapus = '' and a.kode64_baru like '".$kib."%' and a.`nomor_lokasi_baru` like '".$lokasi."%' and NOT EXISTS (SELECT y.register from `rkbmd2023`.register_isi y where a.register=y.register) union SELECT a.register FROM `2023_v1`.`kib` a where a.extrakomtabel_baru = '' and a.hapus = '' and a.kode64_baru like '".$kib."%' and a.`nomor_lokasi_baru` like '".$lokasi."%'  and NOT EXISTS (SELECT y.register from `rkbmd2023`.register_isi y where a.register=y.register)");
        }

         return $query;

    }


    //Query Untuk Register Yang Belum Di Inventarisasi ==========================>

    public function hitungBanyakRowRegister($data,$kib,$form)
    {
        
            
            if($form == 2){
                $no_lokasi=$this->session->userdata('no_lokasi_asli');
                $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi_baru,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru,'SALDO AWAL' as status_register FROM `2023_v1`.`kib_awal` a inner join `2023_v1`.kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi where a.extrakomtabel_baru = '' and a.hapus = '' and a.kode64_baru like '".$kib."%' and a.`nomor_lokasi_baru` like '".$no_lokasi."%' and (a.`register` like '%".$data."%' or a.nama_barang_baru like '%".$data."%') and not EXISTS (select x.register from `rkbmd2023`.register_tambak x where x.register=a.register) and NOT EXISTS (SELECT y.register from `rkbmd2023`.register_isi y where a.register=y.register) union SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi_baru,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru,'PENAMBAHAN' as status_register FROM `2023_v1`.`kib` a inner join `2023_v1`.kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi where a.extrakomtabel_baru = '' and a.hapus = '' and a.kode64_baru like '".$kib."%' and a.`nomor_lokasi_baru` like '".$no_lokasi."%' and (a.`register` like '%".$data."%' or a.nama_barang_baru like '%".$data."%') and not EXISTS (select x.register from `rkbmd2023`.register_tambak x where x.register=a.register) and NOT EXISTS (SELECT y.register from `rkbmd2023`.register_isi y where a.register=y.register)");

            } else {
                $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi_baru,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru, 'SALDO AWAL' as status_register FROM `2023_v1`.`kib_awal` a inner join `2023_v1`.`kamus_lokasi` b on a.nomor_lokasi_baru=b.nomor_lokasi where a.extrakomtabel_baru = '' and a.hapus = '' and a.kode64_baru like '".$kib."%' and a.`nomor_lokasi_baru` like '".$data."%' and not EXISTS (select x.register from register_tambak x where x.register=a.register) and NOT EXISTS (SELECT y.register from register_isi y where a.register=y.register) union SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi_baru,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru,'PENAMBAHAN' as status_register FROM `2023_v1`.`kib` a inner join `2023_v1`.`kamus_lokasi` b on a.nomor_lokasi_baru=b.nomor_lokasi where a.extrakomtabel_baru = '' and a.hapus = '' and a.kode64_baru like '".$kib."%' and a.`nomor_lokasi_baru` like '".$data."%' and not EXISTS (select x.register from register_tambak x where x.register=a.register) and NOT EXISTS (SELECT y.register from register_isi y where a.register=y.register)");
            }


        return $query;
    }

    public function get_lokasi_per_opd($no_lokasi)
    {
        $simbadadb = $this->load->database('simbada',TRUE);
        return $simbadadb->get_where('kamus_lokasi',array('nomor_unit' => $no_lokasi));
    }

    public function get_all_register_pagination($data,$kib, $limit, $offset,$form){

        $this->simbada = $this->load->database('simbada',TRUE);

            // if($form == 2){
            //     $no_lokasi=$this->session->userdata('no_lokasi_asli');
            //     $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi_baru,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru,a.status_register FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi where a.ekstrakomtabel is NULL and a.status_simbada is null and a.`status` is null and a.kode108_baru like '%".$kib."%' and left(a.`nomor_lokasi_baru`,12) like '%".$no_lokasi."%' and (a.`register` like '%".$data."%' or a.nama_barang like '%".$data."%') and not EXISTS (select x.register from register_tambak x where x.register=a.register) limit ".$limit." offset ".$offset."");

            // } else {
            //     $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi_baru,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru,a.status_register FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi where a.ekstrakomtabel is NULL and a.status_simbada is null and a.`status` is null and a.kode108_baru like '%".$kib."%' and left(a.`nomor_lokasi_baru`,12) like '%".$data."%' and not EXISTS (select x.register from register_tambak x where x.register=a.register) limit ".$limit." offset ".$offset."");
            // }

            if($form == 2){
                $no_lokasi=$this->session->userdata('no_lokasi_asli');
                $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi_baru,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru,'SALDO AWAL' as status_register FROM `2023_v1`.`kib_awal` a inner join `2023_v1`.kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi where a.extrakomtabel_baru = '' and a.hapus = '' and a.kode64_baru like '".$kib."%' and a.`nomor_lokasi_baru` like '".$no_lokasi."%' and (a.`register` like '".$data."%' or a.nama_barang_baru like '".$data."%') and not EXISTS (select x.register from `rkbmd2023`.register_tambak x where x.register=a.register) and NOT EXISTS (SELECT y.register from `rkbmd2023`.register_isi y where a.register=y.register) union SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi_baru,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru,'PENAMBAHAN' as status_register FROM `2023_v1`.`kib` a inner join `2023_v1`.kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi where a.extrakomtabel_baru = '' and a.hapus = '' and a.kode64_baru like '".$kib."%' and a.`nomor_lokasi_baru` like '".$no_lokasi."%' and (a.`register` like '%".$data."%' or a.nama_barang_baru like '%".$data."%') and not EXISTS (select x.register from `rkbmd2023`.register_tambak x where x.register=a.register) and NOT EXISTS (SELECT y.register from `rkbmd2023`.register_isi y where a.register=y.register) limit ".$limit." offset ".$offset."");

            } else {
                $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi_baru,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru, 'SALDO AWAL' as status_register FROM `2023_v1`.`kib_awal` a inner join `2023_v1`.`kamus_lokasi` b on a.nomor_lokasi_baru=b.nomor_lokasi where a.extrakomtabel_baru = '' and a.hapus = '' and a.kode64_baru like '".$kib."%' and a.`nomor_lokasi_baru` like '".$data."%' and not EXISTS (select x.register from `rkbmd2023`.register_tambak x where x.register=a.register) and NOT EXISTS (SELECT y.register from `rkbmd2023`.register_isi y where a.register=y.register) union SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi_baru,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru,'PENAMBAHAN' as status_register FROM `2023_v1`.`kib` a inner join `2023_v1`.`kamus_lokasi` b on a.nomor_lokasi_baru=b.nomor_lokasi where a.extrakomtabel_baru = '' and a.hapus = '' and a.kode64_baru like '".$kib."%' and a.`nomor_lokasi_baru` like '".$data."%' and not EXISTS (select x.register from `rkbmd2023`.register_tambak x where x.register=a.register) and NOT EXISTS (SELECT y.register from `rkbmd2023`.register_isi y where a.register=y.register) limit ".$limit." offset ".$offset."");
            }
        

        return $query->result(); 
    }

    //END OF Query Untuk Register Yang Belum Di Inventarisasi ==========================> 

}
    
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



}
    
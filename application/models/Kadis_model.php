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
                        AND kode108_baru like '".$kode."%'
                        AND extrakomtabel_baru = '' AND nomor_lokasi_baru in ( '".implode("','",$unit)."' )
                    ) sawal,
                    (
                    SELECT
                        sum( saldo_barang ) y 
                    FROM
                        kib 
                    WHERE
                        hapus = '' 
                        AND kode108_baru like '".$kode."%'
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
                        AND kode108_baru like '".$kode."%' 
                        AND extrakomtabel_baru = '' AND nomor_lokasi_baru like '".$unit."%'
                    ) sawal,
                    (
                    SELECT
                        sum( saldo_barang ) y 
                    FROM
                        kib 
                    WHERE
                        hapus = '' 
                        AND kode108_baru like '".$kode."%'  
                        AND extrakomtabel_baru = '' AND nomor_lokasi_baru like '".$unit."%'
                    ) tambah"
            );
        }
    
        return $query;
    }


    public function get_register_proses_inv($kib,$lokasi) {
        $query=$this->db->query("SELECT count(register) as jum_reg FROM `register_isi` WHERE kode_barang like '".$kib."%' and nomor_lokasi_awal like '".$lokasi."%' and status <> '2'");
        
        return $query; 
    }

    public function get_register_sudah_inv($kib,$lokasi) {
        $query=$this->db->query("SELECT count(register) as jum_reg FROM `register_isi` WHERE kode_barang like '".$kib."%' and nomor_lokasi_awal like '".$lokasi."%' and status = '2'");
        
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
            $query = $this->db->query("SELECT a.register FROM `2024_v8`.`kib_awal` a where a.extrakomtabel_baru = '' and a.hapus = '' and a.kode108_baru like '".$kib."%' and a.nomor_lokasi_baru IN ( '".implode("','",$lokasi)."' ) and NOT EXISTS (SELECT y.register from `rkbmd2023`.register_isi y where a.register=y.register) union SELECT a.register FROM `2024_v8`.`kib` a where a.extrakomtabel_baru = '' and a.hapus = '' and a.kode108_baru like '".$kib."%' and a.nomor_lokasi_baru IN ( '".implode("','",$lokasi)."' ) and NOT EXISTS (SELECT y.register from `rkbmd2023`.register_isi y where a.register=y.register)");
        } else {
            $query = $this->db->query("SELECT a.register FROM `2024_v8`.`kib_awal` a where a.extrakomtabel_baru = '' and a.hapus = '' and a.kode108_baru like '".$kib."%' and a.`nomor_lokasi_baru` like '".$lokasi."%' and NOT EXISTS (SELECT y.register from `rkbmd2023`.register_isi y where a.register=y.register) union SELECT a.register FROM `2024_v8`.`kib` a where a.extrakomtabel_baru = '' and a.hapus = '' and a.kode108_baru like '".$kib."%' and a.`nomor_lokasi_baru` like '".$lokasi."%'  and NOT EXISTS (SELECT y.register from `rkbmd2023`.register_isi y where a.register=y.register)");
        }

         return $query;

    }


    //Query Untuk Register Yang Belum Di Inventarisasi ==========================>

    public function hitungBanyakRowRegister($data,$kib,$form)
    {
        
            
            if($form == 2){
                $no_lokasi=$this->session->userdata('no_lokasi_asli');
                $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi_baru,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru,'SALDO AWAL' as status_register FROM `2024_v8`.`kib_awal` a inner join `2024_v8`.kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi where a.extrakomtabel_baru = '' and a.hapus = '' and a.kode64_baru like '".$kib."%' and a.`nomor_lokasi_baru` like '".$no_lokasi."%' and (a.`register` like '%".$data."%' or a.nama_barang_baru like '%".$data."%') and not EXISTS (select x.register from `rkbmd2023`.register_tambak x where x.register=a.register) and NOT EXISTS (SELECT y.register from `rkbmd2023`.register_isi y where a.register=y.register) union SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi_baru,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru,'PENAMBAHAN' as status_register FROM `2024_v8`.`kib` a inner join `2024_v8`.kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi where a.extrakomtabel_baru = '' and a.hapus = '' and a.kode64_baru like '".$kib."%' and a.`nomor_lokasi_baru` like '".$no_lokasi."%' and (a.`register` like '%".$data."%' or a.nama_barang_baru like '%".$data."%') and not EXISTS (select x.register from `rkbmd2023`.register_tambak x where x.register=a.register) and NOT EXISTS (SELECT y.register from `rkbmd2023`.register_isi y where a.register=y.register)");

            } else {
                $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi_baru,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru, 'SALDO AWAL' as status_register FROM `2024_v8`.`kib_awal` a inner join `2024_v8`.`kamus_lokasi` b on a.nomor_lokasi_baru=b.nomor_lokasi where a.extrakomtabel_baru = '' and a.hapus = '' and a.kode64_baru like '".$kib."%' and a.`nomor_lokasi_baru` like '".$data."%' and not EXISTS (select x.register from register_tambak x where x.register=a.register) and NOT EXISTS (SELECT y.register from register_isi y where a.register=y.register) union SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi_baru,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru,'PENAMBAHAN' as status_register FROM `2024_v8`.`kib` a inner join `2024_v8`.`kamus_lokasi` b on a.nomor_lokasi_baru=b.nomor_lokasi where a.extrakomtabel_baru = '' and a.hapus = '' and a.kode64_baru like '".$kib."%' and a.`nomor_lokasi_baru` like '".$data."%' and not EXISTS (select x.register from register_tambak x where x.register=a.register) and NOT EXISTS (SELECT y.register from register_isi y where a.register=y.register)");
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
                $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi_baru,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru,'SALDO AWAL' as status_register FROM `2024_v8`.`kib_awal` a inner join `2024_v8`.kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi where a.extrakomtabel_baru = '' and a.hapus = '' and a.kode64_baru like '".$kib."%' and a.`nomor_lokasi_baru` like '".$no_lokasi."%' and (a.`register` like '".$data."%' or a.nama_barang_baru like '".$data."%') and not EXISTS (select x.register from `rkbmd2023`.register_tambak x where x.register=a.register) and NOT EXISTS (SELECT y.register from `rkbmd2023`.register_isi y where a.register=y.register) union SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi_baru,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru,'PENAMBAHAN' as status_register FROM `2024_v8`.`kib` a inner join `2024_v8`.kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi where a.extrakomtabel_baru = '' and a.hapus = '' and a.kode64_baru like '".$kib."%' and a.`nomor_lokasi_baru` like '".$no_lokasi."%' and (a.`register` like '%".$data."%' or a.nama_barang_baru like '%".$data."%') and not EXISTS (select x.register from `rkbmd2023`.register_tambak x where x.register=a.register) and NOT EXISTS (SELECT y.register from `rkbmd2023`.register_isi y where a.register=y.register) limit ".$limit." offset ".$offset."");

            } else {
                $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi_baru,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru, 'SALDO AWAL' as status_register FROM `2024_v8`.`kib_awal` a inner join `2024_v8`.`kamus_lokasi` b on a.nomor_lokasi_baru=b.nomor_lokasi where a.extrakomtabel_baru = '' and a.hapus = '' and a.kode64_baru like '".$kib."%' and a.`nomor_lokasi_baru` like '".$data."%' and not EXISTS (select x.register from `rkbmd2023`.register_tambak x where x.register=a.register) and NOT EXISTS (SELECT y.register from `rkbmd2023`.register_isi y where a.register=y.register) union SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi_baru,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru,'PENAMBAHAN' as status_register FROM `2024_v8`.`kib` a inner join `2024_v8`.`kamus_lokasi` b on a.nomor_lokasi_baru=b.nomor_lokasi where a.extrakomtabel_baru = '' and a.hapus = '' and a.kode64_baru like '".$kib."%' and a.`nomor_lokasi_baru` like '".$data."%' and not EXISTS (select x.register from `rkbmd2023`.register_tambak x where x.register=a.register) and NOT EXISTS (SELECT y.register from `rkbmd2023`.register_isi y where a.register=y.register) limit ".$limit." offset ".$offset."");
            }
        

        return $query->result(); 
    }

    //END OF Query Untuk Register Yang Belum Di Inventarisasi ==========================> 

    //Query Untuk Cetak Laporan Hasil Inventarsisasi

    public function ambil_data_pb($nomor_lokasi)
    {
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->like('nomor_lokasi', $nomor_lokasi);
        $this->db->where_in('fungsi', array('Pengurus Barang','Verifikator'));
        return $this->db->get();
    }

    public function get_register_sudah_verf($lokasi,$kib)
    {   

        $simbadadb = $this->load->database('simbada',TRUE);

        $query = $simbadadb->query(
                    "SELECT
                        a.nomor_lokasi_baru,
                        a.register,
                        b.unit,
                        b.lokasi,
                        a.kondisi,
                        a.kode108_baru,
                        a.nama_barang_baru,
                        a.merk_alamat_baru,
                        a.tipe_baru,
                        a.satuan,
                        a.harga_baru
                    FROM
                        kib_awal a
                        INNER JOIN kamus_lokasi b ON a.nomor_lokasi_baru = b.nomor_lokasi 
                    WHERE
                        a.nomor_lokasi_baru LIKE '".$lokasi."%' 
                        AND a.kode64_baru LIKE '".$kib."%'
                        AND a.hapus <> 1
                        AND a.extrakomtabel_baru <> 1
                    UNION
                    SELECT
                        a.nomor_lokasi_baru,
                        a.register,
                        b.unit,
                        b.lokasi,
                        a.kondisi,
                        a.kode108_baru,
                        a.nama_barang_baru,
                        a.merk_alamat_baru,
                        a.tipe_baru,
                        a.satuan,
                        a.harga_baru
                    FROM
                        kib a
                        INNER JOIN kamus_lokasi b ON a.nomor_lokasi_baru = b.nomor_lokasi 
                    WHERE
                        a.nomor_lokasi_baru LIKE '".$lokasi."%' 
                        AND a.kode64_baru LIKE '".$kib."%'
                        AND a.hapus <> 1
                        AND a.extrakomtabel_baru <> 1"
                );
        
        return $query;
    }

    public function get_kondisi_update($register)
    {
        $query = $this->db->query("SELECT * FROM register_isi where register = '".$register."' and status = 2 ORDER BY created_date desc, created_time desc limit 1");
        return $query;
    }

    public function info_verif($nip,$kib,$kode_lhi)
    {
        return $this->db->get_where('jurnal_verif_lhi', array('nip_kepala' => $nip, 'kode_aset' => $kib, 'kode_lhi' => $kode_lhi));
    }

    public function cek_data_lhi($nip,$kode_lhi,$kib) {
        return $this->db->get_where('jurnal_verif_lhi',array('nip_kepala' => $nip, 'kode_lhi' => $kode_lhi, 'kode_aset' => $kib));
    }

    public function get_data_hilang($kib,$lokasi)
    {
        $query = $this->db->query("SELECT a.*,b.unit,b.lokasi,c.kondisi_barang,c.register,c.keterangan as ket_baru from data_kib a join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi inner join register_isi c on a.register=c.register where a.nomor_lokasi like '".$lokasi."%' and a.kode108_baru like '".$kib."%' and a.status = '2' and c.keberadaan_barang = 'Hilang' group by c.register");

        return $query;
    }

    public function save_verif_lhi($data){
        $this->db->insert('jurnal_verif_lhi', $data); // 'nama_tabel' adalah nama tabel di database

        if ($this->db->affected_rows() > 0) {
            return "TRUE";
        } else {
            return "FALSE";
        }
    }

    public function update_verif_lhi($nip,$kode_lhi,$kib,$tanggal_verif){

        $this->db->where('nip_kepala', $nip); // Ganti 'id' dan '1' dengan kolom dan nilai yang sesuai
        $this->db->where('kode_lhi', $kode_lhi); // Ganti 'id' dan '1' dengan kolom dan nilai yang sesuai
        $this->db->where('kode_aset', $kib); // Ganti 'id' dan '1' dengan kolom dan nilai yang sesuai
        $this->db->update('jurnal_verif_lhi', array('tanggal_lhi' => $tanggal_verif));

        if ($this->db->affected_rows() > 0) {
            return "TRUE";
        } else {
            return "FALSE";
        }

    }

    public function get_keberadaan_barang_update($register)
    {
        $query = $this->db->query("SELECT * FROM register_isi where register = '".$register."' ORDER BY created_date desc, created_time desc limit 1");
        return $query;
    }

    public function get_belum_kapt_ada_induk($kib,$lokasi)
    {
        $query = $this->db->query("SELECT b.unit,b.lokasi,a.register,a.kode_barang,a.nama_barang,a.spesifikasi_barang_merk,a.tipe,a.satuan,a.nilai_perolehan,a.merupakan_anak,c.kode108_baru,c.nomor_lokasi,c.nama_barang as name_anak,c.merk_alamat as merk_anak,c.tipe as tipe_anak,a.keterangan FROM `register_isi` a inner join kamus_lokasi b on a.nomor_lokasi_awal=b.nomor_lokasi inner join data_kib c on a.merupakan_anak=c.register where a.nomor_lokasi_awal like '%".$lokasi."%' and a.kode_barang like '%".$kib."%' and c.status = '2' and a.register <> a.merupakan_anak");

        return $query;
    }

    public function get_data_ganda($kib,$lokasi)
    {
        $query = $this->db->query("SELECT b.unit,b.lokasi,a.register,a.kode_barang,a.nama_barang,a.spesifikasi_barang_merk,a.tipe,a.satuan,a.nilai_perolehan,a.register_ganda,c.kode108_baru,c.nomor_lokasi,c.nama_barang as name_anak,c.merk_alamat as merk_anak,c.tipe as tipe_anak,c.satuan as satuan_anak,c.harga_baru,c.tahun_pengadaan,d.nama_kepala,a.keterangan FROM `register_isi` a inner join kamus_lokasi b on a.nomor_lokasi_awal=b.nomor_lokasi inner join data_kib c on a.register_ganda=c.register inner join pengguna d on left(c.nomor_lokasi,11) = d.nomor_lokasi where a.nomor_lokasi_awal like '%".$lokasi."%' and a.register <> a.register_ganda and c.`status` = '2' and a.kode_barang like '%".$kib."%' GROUP BY a.register");

        return $query;
    }

    public function get_data_dipakai_pegawai($kib,$lokasi)
    {
        $query = $this->db->query("SELECT b.unit,b.lokasi,a.register,a.nama_barang,a.kode108_baru,a.merk_alamat,a.tipe,a.satuan,a.harga_baru,c.nama_penanggung_jawab,d.keterangan FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi inner join data_pemegang_kendaraan c on a.register=c.register inner join register_isi d on a.register=d.register where a.`status` = '2' and a.nomor_lokasi like '%".$lokasi."%' and a.kode108_baru like '%".$kib."%' and (c.nama_penanggung_jawab <> '' and c.nama_penanggung_jawab <> '-')");

        return $query;
    }


    public function get_perubahan_data_verif($nomor_lokasi,$kib)
    {
        $query = $this->db->query(
        "SELECT
            a.kode108_baru,
            a.nama_barang AS name_awal,
            a.register,
            a.merk_alamat,
            a.tipe AS tipe_awal,
            a.satuan,
            a.harga_baru,
            b.kode_barang,
            b.nama_barang AS name_baru,
            b.spesifikasi_barang_merk,
            b.register,
            b.tipe AS tipe_baru,
            b.keterangan,
            b.lainnya,
            c.unit,
            c.lokasi 
        FROM
            `2024_v8`.kib_awal a
            INNER JOIN `rkbmd2023`.register_isi b ON a.register = b.register
            INNER JOIN kamus_lokasi c ON a.nomor_lokasi = c.nomor_lokasi
            INNER JOIN `rkbmd2023`.register_status d ON a.register = d.is_register 
        WHERE
            a.nomor_lokasi LIKE '".$nomor_lokasi."%' 
            AND a.kode108_baru LIKE '".$kib."%' 
            AND b.STATUS = 2
            AND ( d.is_kode_barang = 1 OR d.is_nama_barang = 1 OR d.is_spesifikasi_barang_merk = 1 OR d.is_tipe = 1 ) UNION
        SELECT
            a.kode108_baru,
            a.nama_barang AS name_awal,
            a.register,
            a.merk_alamat,
            a.tipe AS tipe_awal,
            a.satuan,
            a.harga_baru,
            b.kode_barang,
            b.nama_barang AS name_baru,
            b.spesifikasi_barang_merk,
            b.register,
            b.tipe AS tipe_baru,
            b.keterangan,
            b.lainnya,
            c.unit,
            c.lokasi 
        FROM
            `2024_v8`.kib a
            INNER JOIN `rkbmd2023`.register_isi b ON a.register = b.register
            INNER JOIN kamus_lokasi c ON a.nomor_lokasi = c.nomor_lokasi
            INNER JOIN `rkbmd2023`.register_status d ON a.register = d.is_register 
        WHERE
            a.nomor_lokasi LIKE '".$nomor_lokasi."%' 
            AND a.kode108_baru LIKE '".$kib."%' 
            AND b.STATUS = 2
            AND ( d.is_kode_barang = 1 OR d.is_nama_barang = 1 OR d.is_spesifikasi_barang_merk = 1 OR d.is_tipe = 1 ) 
        GROUP BY
            b.register");

        return $query;
    }

}
    
<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Admin_model extends CI_Model{	


   public function get_pangkuan($nip)
   {
       $this->db->select('nomor_unit');
       $this->db->from('kamus_penyelia');
       $this->db->where('nip_penyelia',$nip);
       return $this->db->get();
   }

   public function get_proses_reg($list)
   {
       if($list==1) {
        $query = $this->db->query("SELECT
                b.unit,
                a.nomor_lokasi,
                a.nama_barang,
                a.register,
                COUNT( a.register ) as jumlah
            FROM
                `data_kib` a
                INNER JOIN (select * from kamus_lokasi GROUP BY nomor_unit) b ON b.nomor_unit = left(a.nomor_lokasi_baru,12)
            WHERE
                a.`status` = '1'
            GROUP BY
                left(a.nomor_lokasi,12)");

       } else {
                $query = $this->db->query("SELECT
                b.unit,
                a.nomor_lokasi,
                a.nama_barang,
                a.register,
                COUNT( a.register ) as jumlah
            FROM
                `data_kib` a
                INNER JOIN (select * from kamus_lokasi GROUP BY nomor_unit) b ON b.nomor_unit = left(a.nomor_lokasi,12) 
            WHERE
                a.`status` = '1' and left(a.nomor_lokasi,12) in ('".implode("','",$list)."')
            GROUP BY
                left(a.nomor_lokasi,12)");
       }
        

        return $query->result();
   }

   public function get_tolak_reg($list)
   {
    
    if($list==1) {
        $query = $this->db->query("SELECT
                b.unit,
                left(a.nomor_lokasi,12),
                a.nama_barang,
                a.register,
                COUNT( a.register ) as jumlah
            FROM
                `data_kib` a
                INNER JOIN (select * from kamus_lokasi GROUP BY nomor_unit) b ON b.nomor_unit = left(a.nomor_lokasi,12) 
            WHERE
                a.`status` = '3'
            GROUP BY
                left(a.nomor_lokasi,12)");
    } else {

        $query = $this->db->query("SELECT
                b.unit,
                left(a.nomor_lokasi,12),
                a.nama_barang,
                a.register,
                COUNT( a.register ) as jumlah
            FROM
                `data_kib` a
                INNER JOIN (select * from kamus_lokasi GROUP BY nomor_unit) b ON b.nomor_unit = left(a.nomor_lokasi,12) 
            WHERE
                a.`status` = '3' and left(a.nomor_lokasi,12) in ('".implode("','",$list)."')
            GROUP BY
                left(a.nomor_lokasi,12)");
        }

        return $query->result();
   }

    function get_kerjaan_pb($unit,$kode) {
        
        $query=$this->db->query(
            "SELECT
                b.unit,
                b.nomor_unit,
                LEFT ( a.kode_barang, 5 ) AS kode_barang,
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
                INNER JOIN ( SELECT nomor_unit, unit FROM kamus_lokasi WHERE kode_binprog <> '' GROUP BY nomor_unit ) b ON left(a.nomor_lokasi_awal,12)= b.nomor_unit 
            WHERE
                LEFT ( a.kode_barang, 5 ) = '".$kode."'
                AND left(a.nomor_lokasi_awal,12) = '".$unit."'
                AND a.hapus <> 1 
                AND a.extrakomtabel <> 1
            GROUP BY
                b.unit,
                LEFT ( a.kode_barang, 5 ) 
            ORDER BY
                b.nomor_unit DESC,
                LEFT ( a.kode_barang, 5 ) ASC");

        return $query;
    }

    function data_progres_opd_tanah($unit){
        // return $query;
        $query=$this->db->query(
            "SELECT
                COUNT(
                IF
                ( status = 1, 1, NULL )) AS proses,
                COUNT(
                IF
                ( status = 2, 1, NULL )) AS verif,
                COUNT(
                IF
                ( status = 3, 1, NULL )) AS tolak
            FROM
                register_isi a 
            WHERE
            hapus <> 1 and extrakomtabel <> 1 and kode_barang_lama like '1.3.1%' and left(a.nomor_lokasi_awal,12) like '%".$unit."%'");
        
        return $query;
    }

    function data_progres_opd_pm($unit){
        // return $query;
        $query=$this->db->query(
            "SELECT
                COUNT(
                IF
                ( status = 1, 1, NULL )) AS proses,
                COUNT(
                IF
                ( status = 2, 1, NULL )) AS verif,
                COUNT(
                IF
                ( status = 3, 1, NULL )) AS tolak
            FROM
                register_isi a 
            WHERE
            hapus <> 1 and extrakomtabel <> 1 and kode_barang_lama like '1.3.2%' and left(a.nomor_lokasi_awal,12) like '%".$unit."%'");

        return $query;
    }

    function data_progres_opd_gdb($unit){
        // return $query;
        $query=$this->db->query(
            "SELECT
                COUNT(
                IF
                ( status = 1, 1, NULL )) AS proses,
                COUNT(
                IF
                ( status = 2, 1, NULL )) AS verif,
                COUNT(
                IF
                ( status = 3, 1, NULL )) AS tolak
            FROM
                register_isi a 
            WHERE
            hapus <> 1 and extrakomtabel <> 1 and kode_barang_lama like '1.3.3%' and left(a.nomor_lokasi_awal,12) like '%".$unit."%'");
        
        return $query;
    }

    function data_progres_opd_jij($unit){
        // return $query;
        $query=$this->db->query(
            "SELECT
                COUNT(
                IF
                ( status = 1, 1, NULL )) AS proses,
                COUNT(
                IF
                ( status = 2, 1, NULL )) AS verif,
                COUNT(
                IF
                ( status = 3, 1, NULL )) AS tolak
            FROM
                register_isi a 
            WHERE
            hapus <> 1 and extrakomtabel <> 1 and kode_barang_lama like '1.3.4%' and left(a.nomor_lokasi_awal,12) like '%".$unit."%'");

        return $query;
    }

    function data_progres_opd_atl($unit){
        // return $query;
        $query=$this->db->query(
            "SELECT
                COUNT(
                IF
                ( status = 1, 1, NULL )) AS proses,
                COUNT(
                IF
                ( status = 2, 1, NULL )) AS verif,
                COUNT(
                IF
                ( status = 3, 1, NULL )) AS tolak
            FROM
                register_isi a 
            WHERE
            hapus <> 1 and extrakomtabel <> 1 and kode_barang_lama like '1.3.5%' and left(a.nomor_lokasi_awal,12) like '%".$unit."%'");

        return $query;
    }

    function data_progres_opd_atb($unit){
        // return $query;
        $query=$this->db->query(
            "SELECT
                COUNT(
                IF
                ( status = 1, 1, NULL )) AS proses,
                COUNT(
                IF
                ( status = 2, 1, NULL )) AS verif,
                COUNT(
                IF
                ( status = 3, 1, NULL )) AS tolak
            FROM
                register_isi a 
            WHERE
            hapus <> 1 and extrakomtabel <> 1 and kode_barang_lama like '1.5.3%' and left(a.nomor_lokasi_awal,12) like '%".$unit."%'");

        return $query;
    }


   public function get_data_chart($list)
   {
        if($list==1) {
            $query = $this->db->query("SELECT (select count(register) from data_kib where status ='1') as jumlah_proses, (select count(register) from data_kib where status ='3') as jumlah_tolak, (select count(register) from data_kib where status ='2') as jumlah_terverif, (select count(register) from data_kib where status is null and ekstrakomtabel is null) as jumlah_reg_belum_diisi");
        } else {
                $query = $this->db->query("SELECT (select count(register) from data_kib where left(nomor_lokasi_baru,12) in ('".implode("','",$list)."') and status ='1') as jumlah_proses, (select count(register) from data_kib where left(nomor_lokasi_baru,12) in ('".implode("','",$list)."') and status ='3') as jumlah_tolak, (select count(register) from data_kib where left(nomor_lokasi_baru,12) in ('".implode("','",$list)."') and status ='2') as jumlah_terverif, (select count(register) from data_kib where left(nomor_lokasi_baru,12) in ('".implode("','",$list)."') and status is null) as jumlah_reg_belum_diisi");
            }
    
       return $query->row();
   }

   public function get_db_kendaraan($lokasi='13.30'){
    
    $db_simbada=$this->load->database('simbada',TRUE);
       
    $query = $db_simbada->query("SELECT a.register,a.nomor_lokasi_baru,b.lokasi,a.kode108_baru,a.kode64_baru,a.nama_barang_baru,a.merk_alamat_baru,a.tipe_baru,a.tahun_pengadaan,a.nopol,a.no_rangka_seri,a.no_mesin,a.harga_baru FROM `kib` a INNER JOIN kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi WHERE left(a.kode108_baru,11) in ('1.3.2.01.01','1.3.2.02.01') and a.kode108_baru not like '1.5.4%' and a.hapus <> 1 and a.nomor_lokasi_baru like '%".$lokasi."%' union SELECT c.register,c.nomor_lokasi_baru,d.lokasi,c.kode108_baru,c.kode64_baru,c.nama_barang_baru,c.merk_alamat_baru,c.tipe_baru,c.tahun_pengadaan,c.nopol,c.no_rangka_seri,c.no_mesin,c.harga_baru FROM `kib_awal` c INNER JOIN kamus_lokasi d on c.nomor_lokasi_baru=d.nomor_lokasi WHERE left(c.kode108_baru,11) in ('1.3.2.01.01','1.3.2.02.01') and c.kode108_baru not like '1.5.4%' and c.hapus <> 1 and c.nomor_lokasi_baru like '%".$lokasi."%'");

    return $query;


   }

   public function get_data_per_kendaraan($register){
    
    $db_simbada=$this->load->database('simbada',TRUE);
       
    $query = $db_simbada->query("SELECT a.register,a.nomor_lokasi_baru,b.lokasi,a.kode108_baru,a.kode64_baru,a.nama_barang_baru,a.merk_alamat_baru,a.tipe_baru,a.tahun_pengadaan,a.nopol,a.no_rangka_seri,a.no_mesin,a.harga_baru,a.kondisi,a.no_bpkb FROM `kib` a INNER JOIN kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi WHERE a.hapus <> 1 and a.register = '".$register."' union SELECT c.register,c.nomor_lokasi_baru,d.lokasi,c.kode108_baru,c.kode64_baru,c.tahun_pengadaan,c.nama_barang_baru,c.merk_alamat_baru,c.tipe_baru,c.nopol,c.no_rangka_seri,c.no_mesin,c.harga_baru,c.kondisi,c.no_bpkb FROM `kib_awal` c INNER JOIN kamus_lokasi d on c.nomor_lokasi_baru=d.nomor_lokasi WHERE c.hapus <> 1 and c.register = '".$register."'");

    return $query;


   }

   public function get_register_simbada()
   {
    $db_simbada = $this->load->database('simbada',TRUE);

    $query=$db_simbada->query("SELECT * FROM kib where hapus = '' and extrakomtabel_baru = '' and kode108_baru like '1.3.2%'");
    return $query;

   }

   public function get_kib_simbada()
   {
    return $this->db->get_where('data_kib',array('status !=' => NULL));
   }

//    public function update_sawal_simbada()
//    {
//     $db_simbada = $this->load->database('simbada',TRUE);

//     $query=$db_simbada->query("SELECT register, nomor_lokasi, nomor_lokasi_baru, kode_64,kode_108,kode64_baru, kode108_baru, nama_barang_baru, merk_alamat_baru, tipe_baru, satuan, harga_baru, tahun_pengadaan, kondisi, luas_tanah, luas_bangunan, no_sertifikat, kelurahan, kecamatan, kota, nopol, no_rangka_seri,no_mesin,no_bpkb,register_tanah,penggunaan, keterangan, penghapusan,koreksi_hapus, hibah_keluar,extrakomtabel_baru,hapus FROM kib_awal where left(kode64_baru,6) in ('1.3.01','1.3.02','1.3.03','1.3.04','1.3.05','1.5.03'.'1.5.04') and tgl_update BETWEEN '2023-01-01' and '2023-11-06' union SELECT register, nomor_lokasi, nomor_lokasi_baru, kode_64,kode_108,kode64_baru, kode108_baru, nama_barang_baru, merk_alamat_baru, tipe_baru, satuan, harga_baru, tahun_pengadaan, kondisi, luas_tanah, luas_bangunan, no_sertifikat, kelurahan, kecamatan, kota, nopol, no_rangka_seri, no_mesin, no_bpkb, register_tanah, penggunaan, keterangan, penghapusan, NULL, hibah_keluar, extrakomtabel_baru,hapus FROM kib where left(kode64_baru,6) in ('1.3.01','1.3.02','1.3.03','1.3.04','1.3.05','1.5.03'.'1.5.04') and tgl_update BETWEEN '2023-01-01' and '2023-11-06'");
//     return $query;
//    }

   public function update_sawal_simbada()
   {
    $db_simbada = $this->load->database('simbada',TRUE);

    $query=$db_simbada->query("SELECT register, nomor_lokasi, nomor_lokasi_baru, kode_64,kode_108,kode64_baru, kode108_baru, nama_barang_baru, merk_alamat_baru, tipe_baru, satuan, harga_perolehan,harga_baru, tahun_pengadaan, kondisi, luas_tanah, luas_bangunan, no_sertifikat, kelurahan, kecamatan, kota, nopol, no_rangka_seri,no_mesin,no_bpkb,register_tanah,penggunaan, keterangan, penghapusan,koreksi_hapus, hibah_keluar,extrakomtabel_baru,hapus FROM kib_awal where left(kode_108,5) <> '1.5.2' and (nomor_lokasi <> nomor_lokasi_baru or kode_108 <> kode108_baru or harga_perolehan <> harga_baru or penghapusan <> '' or koreksi_hapus <> '' or hibah_keluar <> '' or catat_intraextra <> '' or catat_extraintra <> '' or atribusi <> '' or kapitalisasi <> '')");
    return $query;
   }

   public function update_pengadaan_simbada()
   {
    $db_simbada = $this->load->database('simbada',TRUE);

    $query=$db_simbada->query("SELECT register, nomor_lokasi, nomor_lokasi_baru, kode_64,kode_108,kode64_baru, kode108_baru, nama_barang_baru, merk_alamat_baru, tipe_baru, satuan, harga_perolehan,harga_baru, tahun_pengadaan, kondisi, luas_tanah, luas_bangunan, no_sertifikat, kelurahan, kecamatan, kota, nopol, no_rangka_seri,no_mesin,no_bpkb,register_tanah,penggunaan, keterangan, penghapusan, hibah_keluar,extrakomtabel_baru,hapus FROM kib");
    return $query;
   }

   public function insert_register($data)
   {
    return $this->db->insert('data_kib',$data);
   }

   public function cek_register($register,$tabel)
   {
    return $this->db->get_where($tabel, array ('register' => $register));
   }

   public function get_user_penyelia()
   {
       return $this->db->get_where('pengguna', array ('fungsi' => 'Penyelia'));
   }

   public function get_kamus_penyelia()
   {
       return $this->db->get('kamus_penyelia');
   }

   public function get_kodebar()
   {
    $this->db->select('*');
    $this->db->from('kamus_barang');
    $this->db->like('kode_bidang','1.3.2');
    $this->db->order_by('kunci','DESC');
    return $this->db->get();
   }

   public function get_rincian_kode_sub($id)
   {
        return $this->db->get_where('kamus_barang',array('kode_sub_kelompok' => $id));
   }

   public function get_kodebar_kunci()
   {
        $this->db->select('*');
        $this->db->from('kamus_barang');
        $this->db->where('kunci',1);
        $this->db->like('kode_bidang','1.3.2');
        $this->db->group_by('kode_sub_kelompok');
        return $this->db->get();
   }

   public function simpan_status_penyelia($id_kamus,$data)
   {
        $this->db->where('id', $id_kamus);
        $this->db->update('kamus_penyelia',$data);
        $this->db->error(); 
   }

   public function get_data_opd_penyelia($id)
   {
      return $this->db->get_where('kamus_penyelia',array('nip_penyelia' => $id));
   }

   public function hapus_opd_pemangku($id,$data)
   {
       $this->db->where('nomor_unit', $id);
       $this->db->update('kamus_penyelia', $data);
       $this->db->error();
   }

   public function get_row_petugas($id)
   {
       return $this->db->get_where('petugas_inv', array('id' => $id));
   }

   public function get_rekap_opd($unit)
   {
       $query=$this->db->query(
            "SELECT
                b.unit,b.nomor_unit,
                count( a.register ) as total,
                COUNT(
                IF
                ( a.STATUS = 1, 1, NULL )) AS proses,
                COUNT(
                IF
                ( a.STATUS = 2, 1, NULL )) AS verif,
                COUNT(
                IF
                ( a.STATUS = 3, 1, NULL )) AS tolak,
                COUNT(
                IF
                    ( a.STATUS IS NULL, 1, NULL )) AS sisa,(
                    count( a.register )- COUNT(
                    IF
                    ( STATUS IS NULL, 1, NULL )))/ count( register )*100 AS persentase 
            FROM
                data_kib a inner join (SELECT nomor_unit,unit from kamus_lokasi where kode_binprog <> '' GROUP BY nomor_unit) b on left(a.nomor_lokasi_baru,12)=b.nomor_unit
            WHERE
                left(a.nomor_lokasi_baru,12) IN ( '".implode("','",$unit)."')
            GROUP BY
                b.unit");
        
        return $query->result();
   }

   public function get_rekap_opd_admin()
   {
    //    $query=$this->db->query(
    //     "SELECT
    //         b.unit,
    //         b.nomor_unit,
    //         LEFT ( a.kode_108, 5 ) AS kode_barang,
    //         count( a.register ) AS total,
    //         COUNT(
    //         IF
    //         ( a.STATUS = 1, 1, NULL )) AS proses,
    //         COUNT(
    //         IF
    //         ( a.STATUS = 2, 1, NULL )) AS verif,
    //         COUNT(
    //         IF
    //         ( a.STATUS = 3, 1, NULL )) AS tolak,
    //         COUNT(
    //         IF
    //             ( a.STATUS IS NULL, 1, NULL )) AS sisa,(
    //             count( a.register )- COUNT(
    //             IF
    //             ( STATUS IS NULL, 1, NULL )))/ count( register )* 100 AS persentase 
    //     FROM
    //         data_kib a
    //         INNER JOIN ( SELECT nomor_unit, unit FROM kamus_lokasi WHERE kode_binprog <> '' GROUP BY nomor_unit ) b ON LEFT ( a.nomor_lokasi, 12 )= b.nomor_unit 
    //     WHERE
    //         LEFT ( a.kode_108, 5 ) IN ( '1.3.1', '1.3.2', '1.3.3' ) 
    //         AND a.status_simbada IS NULL 
    //         AND a.ekstrakomtabel IS NULL 
    //     GROUP BY
    //         b.unit,
    //         LEFT ( a.kode_108, 5 ) 
    //     ORDER BY
    //         b.nomor_unit DESC,
    //         LEFT ( a.kode_108, 5 ) ASC,
    //         persentase DESC");
        $db_simbada = $this->load->database('simbada',TRUE);
        $query=$db_simbada->query(
            "SELECT 
                b.unit,
                b.nomor_unit,
                LEFT(a.kode108_baru, 5) AS kode_barang,
                COUNT(a.register) AS jumlah
            FROM (
                -- Mengambil data dari kib_awal
                SELECT 
                    nomor_lokasi_baru, 
                    kode108_baru, 
                    register, 
                    hapus, 
                    extrakomtabel_baru 
                FROM kib_awal
                UNION ALL
                -- Mengambil data dari kib
                SELECT 
                    nomor_lokasi_baru, 
                    kode108_baru, 
                    register, 
                    hapus, 
                    extrakomtabel_baru 
                FROM kib
            ) a
            INNER JOIN (
                SELECT 
                    x.nomor_unit, 
                    x.unit 
                FROM kamus_lokasi x 
                WHERE x.kode_binprog <> '' 
                GROUP BY x.nomor_unit
            ) b ON LEFT(a.nomor_lokasi_baru, 12) = b.nomor_unit 
            WHERE 
                LEFT(a.kode108_baru, 5) IN ('1.3.1', '1.3.2', '1.3.3', '1.3.4') 
                AND a.hapus <> 1 
                AND a.extrakomtabel_baru <> 1 
            GROUP BY 
                b.unit, 
                b.nomor_unit, 
                LEFT(a.kode108_baru, 5);");
        
        return $query->result();
   }

   public function get_rekap_opd_admin_dashboard()
   {
       $query=$this->db->query(
            "SELECT
                COUNT(
                IF
                ( STATUS = 1, 1, NULL )) AS proses,
                COUNT(
                IF
                ( STATUS = 2, 1, NULL )) AS verif,
                COUNT(
                IF
                ( STATUS = 3, 1, NULL )) AS tolak 
             FROM
                register_isi
             WHERE
                LEFT ( kode_barang_lama, 5 ) IN ('1.3.1','1.3.2','1.3.3','1.3.4') and  hapus <> 1 and extrakomtabel <> 1");

        return $query;
   }

   public function get_kib() {
    
    $db_simbada=$this->load->database('simbada',TRUE);

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
                AND LEFT ( kode64_baru, 6 ) IN ( '1.3.01', '1.3.02', '1.3.03', '1.3.04' ) 
                AND extrakomtabel_baru = ''
            ) sawal,
            (
            SELECT
                sum( saldo_barang ) y 
            FROM
                kib 
            WHERE
                hapus = '' 
                AND LEFT ( kode64_baru, 6 ) IN ( '1.3.01', '1.3.02', '1.3.03', '1.3.04' ) 
            AND extrakomtabel_baru = ''
            ) tambah"
    );

    return $query;
   }

   public function get_kib_per_aset($aset,$unit) {
    
    $db_simbada=$this->load->database('simbada',TRUE);

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
                AND LEFT ( kode64_baru, 6 ) = '".$aset."' 
                AND extrakomtabel_baru = '' AND nomor_lokasi_baru like '%".$unit."%'
            ) sawal,
            (
            SELECT
                sum( saldo_barang ) y 
            FROM
                kib 
            WHERE
                hapus = '' 
                AND LEFT ( kode64_baru, 6 ) = '".$aset."'
                AND extrakomtabel_baru = '' AND nomor_lokasi_baru like '%".$unit."%'
            ) tambah"
    );

    return $query;
   }

   public function get_opd() {
    $db_simbada=$this->load->database('simbada',TRUE);

        $db_simbada->select('nomor_unit,unit');
        $db_simbada->from('kamus_lokasi');
        $db_simbada->where('kode_binprog <>','');
        $db_simbada->group_by('kode_binprog');
        return $db_simbada->get()->result();
   }

   public function get_opd_data() {
        $db_simbada = $this->load->database('simbada', TRUE);

        // Combined query with fully qualified table names
        $db_simbada->select('
            kl.nomor_unit,
            kl.unit,
            (
                SELECT SUM(COALESCE(sawal.x, 0) + COALESCE(tambah.y, 0)) 
                FROM (
                    SELECT SUM(saldo_barang) x FROM kib_awal 
                    WHERE hapus = "" 
                    AND LEFT(kode64_baru, 6) IN ("1.3.01", "1.3.02", "1.3.03", "1.3.04") 
                    AND extrakomtabel_baru = ""
                ) sawal,
                (
                    SELECT SUM(saldo_barang) y FROM kib 
                    WHERE hapus = "" 
                    AND LEFT(kode64_baru, 6) IN ("1.3.01", "1.3.02", "1.3.03", "1.3.04") 
                    AND extrakomtabel_baru = ""
                ) tambah
            ) AS jum_kib,
            COUNT(IF(rg.STATUS = 1, 1, NULL)) AS proses,
            COUNT(IF(rg.STATUS = 2, 1, NULL)) AS verif,
            COUNT(IF(rg.STATUS = 3, 1, NULL)) AS tolak
        ');
        $db_simbada->from('kamus_lokasi kl');
        $db_simbada->join('rkbmd2023.register_isi rg', 'rg.nomor_lokasi_awal = kl.nomor_unit', 'left');
        $db_simbada->where('kl.kode_binprog <>', '');
        $db_simbada->group_by('kl.nomor_unit');

        return $db_simbada->get()->result();
   }



   public function get_per_opd_penyelia($list_unit)
   {
    
        $this->db->select('*');
        $this->db->from('kamus_lokasi');
        $this->db->where('kode_binprog <>','');
        $this->db->where_in('nomor_unit',$list_unit);
        $this->db->group_by('nomor_unit');
        return $this->db->get();
   }

   public function get_per_opd_penyelia_peropd($list_unit)
   {
    
        $this->db->select('*');
        $this->db->from('kamus_lokasi');
        $this->db->where('kode_binprog <>','');
        $this->db->where_in('nomor_unit',$list_unit);
        return $this->db->get();
   }

   public function kunci_kode($kodebar)
   {
    $this->db->where('kode_sub_sub_kelompok', $kodebar);
    return $this->db->update('kamus_barang', array('kunci' => 1));
        
   }

   public function buka_kode($kodebar)
   {
    $this->db->where('kode_sub_sub_kelompok', $kodebar);
    return $this->db->update('kamus_barang', array('kunci' => NULL));
        
   }


   public function get_status_for_penyelia($data,$kib, $limit, $offset,$form){

        if($form == 2){
            $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,b.unit,a.satuan,a.harga_baru,a.status FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi where kode108_baru like '%".$kib."%' and (a.`register` like '%".$data."%' or a.nama_barang like '%".$data."%') order by a.status desc limit ".$limit." offset ".$offset."");
        } elseif ($form == 1) {
            $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,b.unit,a.satuan,a.harga_baru,a.status FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi where left(a.`nomor_lokasi_baru`,12) = '".$data."' and kode108_baru like '%".$kib."%' order by a.status desc limit ".$limit." offset ".$offset."");
        } else {
            $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,b.unit,a.satuan,a.harga_baru,a.status FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi where left(a.`nomor_lokasi_baru`,12) IN ( '".implode("','",$data)."' ) and kode108_baru like '%".$kib."%' order by a.status desc limit ".$limit." offset ".$offset."");
        }

        return $query->result();
    }

    public function get_status_for_penyelia_peropd($data,$kib, $limit, $offset,$form){

        if($form == 2){
            $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,b.unit,a.satuan,a.harga_baru FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi where a.`register` like '%".$data."%' or a.nama_barang like '%".$data."%' limit ".$limit." offset ".$offset."");
        } else {
            $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,b.unit,a.satuan,a.harga_baru,a.status FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi where a.`nomor_lokasi_baru` like '%".$data."%' limit ".$limit." offset ".$offset."");
        } 

        return $query->result();
    }

    public function hitungBanyakRowRegister_peropd($data,$kib,$form)
    {
                // $this->db->where(array('register' => '19012142-2019-1140133-1-143-1'));
                if ($form == 2){
                    $no_lokasi=$this->session->userdata('data_temp');
                    $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.harga_baru FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi where a.ekstrakomtabel is NULL and a.`status` is null and a.`nomor_lokasi_baru` like '".$no_lokasi."%' and (a.`register` like '%".$data."%' or a.nama_barang like '%".$data."%')");

                    return $query;
                } else {
                    $this->db->select('*');
                    $this->db->from('data_kib');
                    $this->db->like('nomor_lokasi_baru',$data);
                    $this->db->like('kode108_baru',$kib);

                    return $this->db->get();
                } 
    }

    public function ambil_register_form_penyelia($register) {
                // return $this->db->from("register_isi")->where($where)->order_by('created_time DESC, created_date DESC')->get();

                // $this->db->select('*');
                // $this->db->from('register_isi');
                // $this->db->join('kamus_lokasi', 'kamus_lokasi.nomor_lokasi = register_isi.lokasi');
                // $this->db->where('register_isi.register',$where);
                // $this->db->order_by('created_date', 'DESC');
                // $this->db->order_by('created_time', 'DESC');
                // return $this->db->get();

                $query = $this->db->query("SELECT a.*,b.* FROM `register_isi` a join kamus_lokasi b on a.lokasi=b.nomor_lokasi where a.register = '".$register."' order by created_date DESC, created_time DESC");
                return $query;
    }

    public function ambil_status_register_form($register){

                return $this->db->from("register_status")->where(array('is_register' => $register))->order_by('created_date DESC, created_time DESC')->get();
    }

    public function ambil_file($data) {
                return $this->db->get_Where('jurnal_upload',array('register' => $data));
    }

    public function ambil_jurnal_penolakan($data)
    {
                // $query = $this->db->get_where('jurnal_penolakan', $data);
                return $this->db->from("jurnal_penolakan")->where($data)->order_by('created_time desc, created_time desc')->get();
                // return $query->row();
    }

    public function ambil_register_form($register)
    {
                // return $this->db->from("register_isi")->where($where)->order_by('created_time DESC, created_date DESC')->get();

                // $this->db->select('*');
                // $this->db->from('register_isi');
                // $this->db->join('kamus_lokasi', 'kamus_lokasi.nomor_lokasi = register_isi.lokasi');
                // $this->db->where('register_isi.register',$where);
                // $this->db->order_by('created_date', 'DESC');
                // $this->db->order_by('created_time', 'DESC');
                // return $this->db->get();

                $query = $this->db->query("SELECT a.*,b.* FROM `register_isi` a join kamus_lokasi b on a.lokasi=b.nomor_lokasi where a.register = '".$register."' order by created_date DESC, created_time DESC");
                return $query;
    }

    public function ambil_register($register)
    {   

                $query = $this->db->query("SELECT a.*,b.* FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi where a.register = '".$register."'");

                // return $query->result();
                // $query = $this->db->get_where('data_kib', $where);
                return $query->row();
    }

    public function data_kode_barang()
    {
        return $this->db->get('kamus_barang');
    }

    public function kamus_kelurahan()
    {
        return $this->db->get('kamus_kelurahan');
    }

    public function data_satuan()
    {
        return $this->db->get('satuan');
    }

    public function data_kamus_lokasi()
    {
        return $this->db->get_where('kamus_lokasi',array('kode_binprog !=' => ''));
    }

    public function pb_verif($nomor_lokasi)
    {   

                $this->db->select('*');
                $this->db->from('pengguna');
                $this->db->like('nomor_lokasi', $nomor_lokasi);
                $this->db->where_not_in('fungsi', array('Penyelia','Admin'));
                return $this->db->get();
    }


    public function get_perubahan_fisik_barang($kib)
    {
        $query = $this->db->query("SELECT a.*,b.unit,b.lokasi,c.kondisi_barang,c.register from data_kib a join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi inner join register_isi c on a.register=c.register  where a.kode108_baru like '%".$kib."%' and a.status = '2' and a.kondisi <> c.kondisi_barang");
        
        return $query;
    }

    public function get_data_tidak_ditemukan($kib)
    {
        $query = $this->db->query("SELECT a.*,b.unit,b.lokasi,c.kondisi_barang,c.register,c.keterangan as ket_baru from data_kib a join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi inner join register_isi c on a.register=c.register where a.kode108_baru like '%".$kib."%' and a.status = '2' and c.keberadaan_barang = 'Tidak Diketemukan' group by c.register");
        
        return $query;
    }

    public function get_perubahan_data_barang($kib)
    {
        $query = $this->db->query("SELECT a.kode108_baru,a.nama_barang as name_awal,a.register,a.merk_alamat,a.tipe as tipe_awal,a.satuan,a.harga_baru,b.kode_barang,b.nama_barang as name_baru,b.spesifikasi_barang_merk,b.register,b.tipe as tipe_baru,b.keterangan,b.lainnya,c.unit,c.lokasi from data_kib a inner join register_isi b on a.register=b.register INNER JOIN kamus_lokasi c on a.nomor_lokasi=c.nomor_lokasi inner join register_status d on a.register=d.is_register where a.kode108_baru like '%".$kib."%' and a.status = 2 and (d.is_kode_barang=1 or d.is_nama_barang=1 or d.is_spesifikasi_barang_merk=1 or d.is_tipe=1) GROUP BY b.register");

        return $query;
    
    }

    public function get_data_hilang($kib)
    {
        $query = $this->db->query("SELECT a.*,b.unit,b.lokasi,c.kondisi_barang,c.register,c.keterangan as ket_baru from data_kib a join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi inner join register_isi c on a.register=c.register where a.kode108_baru like '%".$kib."%' and a.status = '2' and c.keberadaan_barang = 'Hilang' group by c.register");

        return $query;
    }

    public function get_belum_kapt_ada_induk($kib)
    {
        $query = $this->db->query("SELECT b.unit,b.lokasi,a.register,a.kode_barang,a.nama_barang,a.spesifikasi_barang_merk,a.tipe,a.satuan,a.nilai_perolehan,a.merupakan_anak,c.kode108_baru,c.nomor_lokasi,c.nama_barang as name_anak,c.merk_alamat as merk_anak,c.tipe as tipe_anak,a.keterangan FROM `register_isi` a inner join kamus_lokasi b on a.nomor_lokasi_awal=b.nomor_lokasi inner join data_kib c on a.merupakan_anak=c.register where a.kode_barang like '%".$kib."%' and c.status = '2' and a.register <> a.merupakan_anak");

        return $query;
    }

    public function get_data_ganda($kib)
    {
        $query = $this->db->query("SELECT b.unit,b.lokasi,a.register,a.kode_barang,a.nama_barang,a.spesifikasi_barang_merk,a.tipe,a.satuan,a.nilai_perolehan,a.register_ganda,c.kode108_baru,c.nomor_lokasi,c.nama_barang as name_anak,c.merk_alamat as merk_anak,c.tipe as tipe_anak,c.satuan as satuan_anak,c.harga_baru,c.tahun_pengadaan,d.nama_kepala,a.keterangan FROM `register_isi` a inner join kamus_lokasi b on a.nomor_lokasi_awal=b.nomor_lokasi inner join data_kib c on a.register_ganda=c.register inner join pengguna d on left(c.nomor_lokasi,11) = d.nomor_lokasi where a.register <> a.register_ganda and c.`status` = '2' and a.kode_barang like '%".$kib."%' GROUP BY a.register");

        return $query;
    }

    public function get_data_dipakai_pegawai($kib)
    {
        $query = $this->db->query("SELECT b.unit,b.lokasi,a.register,a.nama_barang,a.kode108_baru,a.merk_alamat,a.tipe,a.satuan,a.harga_baru,c.nama_penanggung_jawab,a.keterangan FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi inner join data_pemegang_kendaraan c on a.register=c.register where a.`status` = '2' and a.kode108_baru like '%".$kib."%' and (c.nama_penanggung_jawab <> '' and c.nama_penanggung_jawab <> '-')");

        return $query;
    }

    public function get_users()
    {
        return $this->db->get_where('pengguna',array ('fungsi !=' => 'Admin'));
    }

    public function get_data_user($id)
    {
        return $this->db->get_where('pengguna', array ('id' => $id));
    }

    public function update_data($register,$data,$table)
    {   

        $this->db->where('register',$register);
        return $this->db->update($table,$data);
    }

    public function insert_data_history($data,$table)
    {
        return $this->db->insert($table,$data);
    }

    public function get_data_reg_isi($register)
    {
        return $this->db->get_where('register_isi', array ('register' => $register));
    }

    public function hitungBanyakRowRegister($data,$kib,$form)
    {

        if ($form == 2){    

            $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi_baru,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.harga_baru FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi where a.ekstrakomtabel is NULL and kode108_baru like '%".$kib."%' and  (a.`register` like '%".$data."%' or a.nama_barang like '%".$data."%') and not EXISTS (select x.kode_sub_kelompok from kamus_barang x where x.kode_sub_kelompok=left(a.kode108_baru,14) and x.kunci = 1) ");

        } elseif ($form == 1) {

            $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,b.unit,a.satuan,a.harga_baru,a.status FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi where left(a.`nomor_lokasi_baru`,12) = '".$data."' and kode108_baru like '%".$kib."%' order by a.status desc ");

        } else {
            $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi_baru,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi where a.ekstrakomtabel is NULL and kode108_baru like '%".$kib."%' and left(a.`nomor_lokasi_baru`,12) IN ( '".implode("','",$data)."' ) and not EXISTS (select x.kode_sub_kelompok from kamus_barang x where x.kode_sub_kelompok=left(a.kode108_baru,14) and x.kunci = 1)");
                       
            }

        return $query;
    }

    public function list_unit()
    {
        return $this->db->get_where('kamus_lokasi');
    }


    public function save_isi_form($data)
    {
        $this->db->insert('register_isi', $data);
        return $this->db->insert_id();
    }


    public function save_isi_form_history($data)
    {
        $this->db->insert('register_isi_history', $data);
    }


    public function save_status_register($data)
    {
        $this->db->insert('register_status',$data);
        return $this->db->insert_id();
    }


    public function update_register_isi($data,$register) {
        $this->db->where('register', $register);
        $this->db->update('register_isi', $data);
    }

    public function update_status_register ($data,$id){

        $this->db->where('id', $id);
        $this->db->update('register_status', $data);
        $this->db->error();
    }

    public function save_status_register_history($data)
    {
        $this->db->insert('register_status_history',$data);
        $this->db->error();
    }

    public function tandai_kib($register)
    {
        
        $this->db->where('id', $register);
        $this->db->update('register_isi', array('status' => 1));
        $this->db->error();
    }

    public function save_image($data = array())
    {
        return $this->db->insert_batch('jurnal_upload',$data);
    }

    public function get_path($id)
    {
        return $this->db->get_where('jurnal_upload',array('id' => $id));
    }

    public function hapus_image_record($id)
    {
        return $this->db->delete('jurnal_upload',array('id' => $id));
    }


    public function get_pangkat()
    {
        $this->db->select('*');
        $this->db->from('pangkat');
        $this->db->order_by('urut','ASC');
        return $this->db->get();
    }

    public function update_row_user($id,$data)
    {
        $this->db->where('id', $id);
        return $this->db->update('pengguna', $data);

    }

    public function get_all_register_pagination($data,$kib, $limit, $offset,$form)
    
    {
        if($form == 2){
            $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru,a.status_register FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi where a.ekstrakomtabel is NULL and kode108_baru like '%".$kib."%' and (a.`register` like '%".$data."%' or a.nama_barang like '%".$data."%') limit ".$limit." offset ".$offset."");

        } else {
            $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru,a.status_register FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi where a.ekstrakomtabel is NULL  and kode108_baru like '%".$kib."%' and a.`nomor_lokasi_baru` like '%".$data."%' limit ".$limit." offset ".$offset."");
        } 
        return $query->result();
    }    
    
}

?>
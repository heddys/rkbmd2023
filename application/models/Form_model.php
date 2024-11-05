
<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Form_model extends CI_Model{

    public function __construct() {
            parent::__construct();
            // $simbada = $this->load->database('simbada', TRUE);
        }    


            public function get_all_register_proses_tolak($lokasi,$kib){

                if ($this->session->userdata('role') == 'Pengurus Barang Pembantu UPTD') {
                    $query = $this->db->query("SELECT a.*,b.lokasi FROM data_kib a inner join kamus_lokasi b on b.nomor_lokasi=a.nomor_lokasi where a.ekstrakomtabel IS NULL and (a.status = '1' or a.status = '3') and a.nomor_lokasi IN ( '".implode("','",$lokasi)."' ) and a.kode108_baru like '".$kib."%' order by a.status DESC");
                } else {

                    $query = $this->db->query("SELECT a.*,b.lokasi FROM data_kib a inner join kamus_lokasi b on b.nomor_lokasi=a.nomor_lokasi where a.ekstrakomtabel IS NULL and (a.status = '1' or a.status = '3') and a.`nomor_lokasi` like '".$lokasi."%' and a.kode108_baru like '".$kib."%' order by a.status DESC");
                }
                

                return $query;
            }

            public function get_kib_for_excel($lokasi,$kib)
            {
                // $query = $this->db->query("SELECT a.*,b.lokasi,DATE_FORMAT(c.created_date, '%m/%e/%Y') as tanggal FROM data_kib a left join kamus_lokasi b on b.nomor_lokasi=a.nomor_lokasi_baru left join register_isi c on a.register=c.register where a.ekstrakomtabel IS NULL and a.status_simbada is NULL and left(a.`nomor_lokasi_baru`,12) like '%".$lokasi."%' and a.kode108_baru like '%".$kib."%' group by a.register order by a.status DESC");

                // $query = $this->db->query("SELECT a.register,b.lokasi,a.status,a.kode_barang,a.nama_barang,a.spesifikasi_barang_merk,a.nilai_perolehan,a.tipe,a.tahun,DATE_FORMAT(a.created_date, '%m/%e/%Y') as tanggal FROM `rkbmd2023`.register_isi a inner join `2023_v1`.kamus_lokasi b on a.nomor_lokasi_awal = b.nomor_lokasi WHERE a.hapus <> 1 and a.extrakomtabel <> 1 and left(a.nomor_lokasi_awal,12) like '".$lokasi."%' and kode_barang like '".$kib."%' group by a.register order by a.status DESC");

                $query = $this->db->query(
                    "SELECT
                        a.register,
                        b.lokasi,
                        DATE_FORMAT( c.created_date, '%m/%e/%Y' ) AS tanggal,
                        a.kode108_baru,
                        a.nama_barang,
                        a.merk_alamat,
                        a.tipe,
                        a.tahun_pengadaan,
                        a.harga_baru,
                        c.status 
                    FROM
                        `2023_v1`.`kib_awal` a
                        LEFT JOIN `rkbmd2023`.register_isi c ON a.register = c.register
                        JOIN `2023_v1`.kamus_lokasi b on a.nomor_lokasi_baru = b.nomor_lokasi
                    WHERE
                        a.hapus <> 1 
                        AND a.extrakomtabel_baru <> 1 
                        AND a.kode108_baru LIKE '".$kib."%'
                        AND a.kode64_baru not like '1.2.02%'
                        AND a.nomor_lokasi_baru LIKE '".$lokasi."%'
                    UNION
                    SELECT
                        x.register,
                        d.lokasi,
                        DATE_FORMAT( e.created_date, '%m/%e/%Y' ) AS tanggal,
                        x.kode108_baru,
                        x.nama_barang,
                        x.merk_alamat,
                        x.tipe,
                        x.tahun_pengadaan,
                        x.harga_baru,
                        e.status 
                    FROM
                        `2023_v1`.`kib` x
                        LEFT JOIN `rkbmd2023`.register_isi e ON x.register = e.register
                        JOIN `2023_v1`.kamus_lokasi d on x.nomor_lokasi_baru = d.nomor_lokasi
                    WHERE
                        x.hapus <> 1 
                        AND x.extrakomtabel_baru <> 1 
                        AND x.kode108_baru LIKE '".$kib."%'
                        AND x.kode64_baru not like '1.2.02%'
                        AND x.nomor_lokasi_baru LIKE '".$lokasi."%'
                        ORDER BY status DESC");

                return $query;
            }

            public function get_kib_dikerjakan_excel($lokasi,$kib)
            {
                $query = $this->db->query("SELECT a.*,b.lokasi as lokasi_awal,c.lokasi as lokasi_baru,d.status,d.tahun_pengadaan FROM register_isi a inner join kamus_lokasi b on a.nomor_lokasi_awal=b.nomor_lokasi inner join kamus_lokasi c on a.lokasi=c.nomor_lokasi inner join data_kib d on a.register=d.register where a.nomor_lokasi_awal like '".$lokasi."%' and a.kode_barang like '%".$kib."%' group by a.register");

                return $query;
            }

            public function get_kib_for_excel_pbp($lokasi,$kib)
            {
                $query = $this->db->query("SELECT a.*,b.lokasi FROM data_kib a inner join kamus_lokasi b on b.nomor_lokasi=a.nomor_lokasi where a.ekstrakomtabel IS NULL and left(a.`nomor_lokasi`,12) like '".$lokasi."%' and a.kode108_baru like '%".$kib."%' order by a.status DESC");
                
                return $query;
            }

            public function get_perubahan_data_verif($nomor_lokasi,$kib)
            {
                $query = $this->db->query("SELECT a.kode108_baru,a.nama_barang as name_awal,a.register,a.merk_alamat,a.tipe as tipe_awal,a.satuan,a.harga_baru,b.kode_barang,b.nama_barang as name_baru,b.spesifikasi_barang_merk,b.register,b.tipe as tipe_baru,b.keterangan,b.lainnya,c.unit,c.lokasi from data_kib a inner join register_isi b on a.register=b.register INNER JOIN kamus_lokasi c on a.nomor_lokasi=c.nomor_lokasi inner join register_status d on a.register=d.is_register where a.nomor_lokasi like '".$nomor_lokasi."%' and a.kode108_baru like '".$kib."%' and a.status = 2 and (d.is_kode_barang=1 or d.is_nama_barang=1 or d.is_spesifikasi_barang_merk=1 or d.is_tipe=1) GROUP BY b.register");

                return $query;
            }

            public function get_register_sudah_verf($lokasi,$kib)
            {
                $query = $this->db->query("SELECT a.*,b.unit,b.lokasi from data_kib a join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi where a.nomor_lokasi like '".$lokasi."%' and a.kode108_baru like '".$kib."%' and a.status = '2'");
                
                return $query;
            }

            public function get_register_lokasi_baru($lokasi,$kib)
            {
                $query=$this->db->query("SELECT a.*,b.unit as opd_lama,b.lokasi as lokasi_lama,c.register,c.lokasi,d.unit as opd_baru,d.lokasi as lokasi_baru,c.kode_barang,c.nama_barang as nama_baru, c.spesifikasi_barang_merk from data_kib a join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi INNER JOIN register_isi c on a.register=c.register inner join kamus_lokasi d on c.lokasi=d.nomor_lokasi where a.nomor_lokasi_baru like '".$lokasi."%' and a.kode108_baru like '".$kib."%' and a.status = '2' and a.nomor_lokasi <> c.lokasi");

                return $query;
            }
            
            public function get_kamus_kelurahan($kms_kel) {
                
                return $this->db->get_where('kamus_kelurahan', array ('id' => $kms_kel));
            }

            public function get_sisa_per_aset($kib,$lokasi) {

                if($this->session->userdata('role') == "Pengurus Barang Pembantu UPTD" ) {
                    $query = $this->db->query("SELECT a.register FROM `2023_v1`.`kib_awal` a where a.extrakomtabel_baru = '' and a.hapus = '' and a.kode64_baru like '".$kib."%' and a.nomor_lokasi_baru IN ( '".implode("','",$lokasi)."' ) and NOT EXISTS (SELECT y.register from `rkbmd2023`.register_isi y where a.register=y.register) union SELECT a.register FROM `2023_v1`.`kib` a where a.extrakomtabel_baru = '' and a.hapus = '' and a.kode64_baru like '".$kib."%' and a.nomor_lokasi_baru IN ( '".implode("','",$lokasi)."' ) and NOT EXISTS (SELECT y.register from `rkbmd2023`.register_isi y where a.register=y.register)");
                } else {
                    $query = $this->db->query("SELECT a.register FROM `2023_v1`.`kib_awal` a where a.extrakomtabel_baru = '' and a.hapus = '' and a.kode64_baru like '".$kib."%' and a.`nomor_lokasi_baru` like '".$lokasi."%' and NOT EXISTS (SELECT y.register from `rkbmd2023`.register_isi y where a.register=y.register) union SELECT a.register FROM `2023_v1`.`kib` a where a.extrakomtabel_baru = '' and a.hapus = '' and a.kode64_baru like '".$kib."%' and a.`nomor_lokasi_baru` like '".$lokasi."%'  and NOT EXISTS (SELECT y.register from `rkbmd2023`.register_isi y where a.register=y.register)");
                }

                

                return $query;

            }

            public function get_kondisi_update($register)
            {
                $query = $this->db->query("SELECT * FROM register_isi where register = '".$register."' ORDER BY created_date desc, created_time desc limit 1");
                return $query;
            }

            public function get_keberadaan_barang_update($register)
            {
                $query = $this->db->query("SELECT * FROM register_isi where register = '".$register."' ORDER BY created_date desc, created_time desc limit 1");
                return $query;
            }

            public function get_all_register($status,$lokasi,$kib=''){
                

                    if ($kib == '' ) {

                    $query=$this->db->query("SELECT
                        a.*,
                        b.lokasi 
                    FROM
                        `rkbmd2023`.`register_isi` a
                        INNER JOIN `2023_v1`.kamus_lokasi b ON b.nomor_lokasi = a.nomor_lokasi_awal 
                    WHERE
                        a.status = '".$status."'
                        AND a.kode_barang not like '1.5.4%'
                        AND left(a.`nomor_lokasi_awal`,12) LIKE '".$lokasi."%'
                        AND a.extrakomtabel <> 1
                        AND a.hapus <> 1"
                    );


                    } else {  
                        $query=$this->db->query("SELECT
                            a.*,
                            b.lokasi 
                        FROM
                            `rkbmd2023`.`register_isi` a
                            INNER JOIN `2023_v1`.kamus_lokasi b ON b.nomor_lokasi = a.nomor_lokasi_awal 
                        WHERE
                            a.status = '".$status."'
                            AND a.kode_barang like '".$kib."%'
                            AND left(a.`nomor_lokasi_awal`,12) LIKE '".$lokasi."%'
                            AND a.extrakomtabel <> 1
                            AND a.hapus <> 1"
                        );
                    }

                return $query;
            }

            public function get_db_kendaraan($lokasi){
    
                $db_simbada=$this->load->database('simbada',TRUE);
                   
                $query = $db_simbada->query("SELECT a.register,a.nomor_lokasi_baru,b.lokasi,a.kode108_baru,a.kode64_baru,a.nama_barang_baru,a.merk_alamat_baru,a.tipe_baru,a.tahun_pengadaan,a.nopol,a.no_rangka_seri,a.no_mesin,a.harga_baru FROM `kib` a INNER JOIN kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi WHERE left(a.kode108_baru,11) in ('1.3.2.01.01','1.3.2.02.01') and a.kode108_baru not like '1.5.4%' and a.hapus <> 1 and a.nomor_lokasi_baru like '%".$lokasi."%' union SELECT c.register,c.nomor_lokasi_baru,d.lokasi,c.kode108_baru,c.kode64_baru,c.nama_barang_baru,c.merk_alamat_baru,c.tipe_baru,c.tahun_pengadaan,c.nopol,c.no_rangka_seri,c.no_mesin,c.harga_baru FROM `kib_awal` c INNER JOIN kamus_lokasi d on c.nomor_lokasi_baru=d.nomor_lokasi WHERE left(c.kode108_baru,11) in ('1.3.2.01.01','1.3.2.02.01') and c.kode108_baru not like '1.5.4%' and c.hapus <> 1 and c.nomor_lokasi_baru like '%".$lokasi."%'");
            
                return $query;
            
            
            }

            public function hitungBanyakRowRegister($data,$kib,$form)
            {
                

                    // if ($form == 2){
                    //     $no_lokasi=$this->session->userdata('no_lokasi_asli');
                    //     $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.harga_baru FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi where a.ekstrakomtabel is NULL and a.status_simbada is null and a.`status` is null and a.`nomor_lokasi_baru` like '%".$no_lokasi."%' and a.kode108_baru like '%".$kib."%' and (a.`register` like '%".$data."%' or a.nama_barang like '%".$data."%') and not EXISTS (select x.register from register_tambak x where x.register=a.register) ");

                    // } else {
                    //     $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi where a.ekstrakomtabel is NULL and a.status_simbada is null and a.`status` is null and a.`nomor_lokasi_baru` like '%".$data."%' and a.kode108_baru like '%".$kib."%' and not EXISTS (select x.register from register_tambak x where x.register=a.register)");

                       
                    // }
                    
                    if($form == 2){
                        $no_lokasi=$this->session->userdata('no_lokasi_asli');
                        $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi_baru,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru,'SALDO AWAL' as status_register FROM `2023`.`kib_awal` a inner join `2023`.kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi where a.extrakomtabel_baru = '' and a.hapus = '' and a.kode64_baru like '".$kib."%' and a.`nomor_lokasi_baru` like '".$no_lokasi."%' and (a.`register` like '%".$data."%' or a.nama_barang_baru like '%".$data."%') and not EXISTS (select x.register from `rkbmd2023`.register_tambak x where x.register=a.register) and NOT EXISTS (SELECT y.register from `rkbmd2023`.register_isi y where a.register=y.register) union SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi_baru,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru,'PENAMBAHAN' as status_register FROM `2023`.`kib` a inner join `2023`.kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi where a.extrakomtabel_baru = '' and a.hapus = '' and a.kode64_baru like '".$kib."%' and a.`nomor_lokasi_baru` like '".$no_lokasi."%' and (a.`register` like '%".$data."%' or a.nama_barang_baru like '%".$data."%') and not EXISTS (select x.register from `rkbmd2023`.register_tambak x where x.register=a.register) and NOT EXISTS (SELECT y.register from `rkbmd2023`.register_isi y where a.register=y.register)");
        
                    } else {
                        $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi_baru,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru, 'SALDO AWAL' as status_register FROM `2023`.`kib_awal` a inner join `2023`.`kamus_lokasi` b on a.nomor_lokasi_baru=b.nomor_lokasi where a.extrakomtabel_baru = '' and a.hapus = '' and a.kode64_baru like '".$kib."%' and a.`nomor_lokasi_baru` like '".$data."%' and not EXISTS (select x.register from register_tambak x where x.register=a.register) and NOT EXISTS (SELECT y.register from register_isi y where a.register=y.register) union SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi_baru,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru,'PENAMBAHAN' as status_register FROM `2023`.`kib` a inner join `2023`.`kamus_lokasi` b on a.nomor_lokasi_baru=b.nomor_lokasi where a.extrakomtabel_baru = '' and a.hapus = '' and a.kode64_baru like '".$kib."%' and a.`nomor_lokasi_baru` like '".$data."%' and not EXISTS (select x.register from register_tambak x where x.register=a.register) and NOT EXISTS (SELECT y.register from register_isi y where a.register=y.register)");
                    }


                return $query;
            }

            public function RowRegisterTambak($data,$kib,$form)
            {
                

                    if ($form == 2){
                        $no_lokasi=$this->session->userdata('no_lokasi_asli');
                        $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.harga_baru FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi where a.ekstrakomtabel is NULL and a.`nomor_lokasi_baru` like '".$no_lokasi."%' and (a.`register` like '%".$data."%' or a.nama_barang like '%".$data."%') and EXISTS (select x.register from register_tambak x where x.register=a.register) ");

                    } else {
                        $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi where a.ekstrakomtabel is NULL and a.`nomor_lokasi_baru` like '".$data."%' and EXISTS (select x.register from register_tambak x where x.register=a.register)");

                       
                    }

                return $query;
            }


            public function hitungBanyakRowCariRegister($data,$form)
            {
                

                    // if ($form == 2){
                    //     $no_lokasi=$this->session->userdata('no_lokasi_asli');
                    //     $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi_baru,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.harga_baru FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi where a.`nomor_lokasi_baru` like '%".$no_lokasi."%' and a.hapus <> 1 and extrakomtabel <> 1 and (a.`register` like '%".$data."%' or a.nama_barang like '%".$data."%') and not EXISTS (select x.kode_sub_kelompok from kamus_barang x where x.kode_sub_kelompok=left(a.kode108_baru,14) and x.kunci = 1)");

                    // } else {
                    //     $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi where a.`nomor_lokasi_baru` like '%".$data."%' and a.hapus <> 1 and extrakomtabel <> 1 and not EXISTS (select x.kode_sub_kelompok from kamus_barang x where x.kode_sub_kelompok=left(a.kode108_baru,14) and x.kunci = 1) order by a.kode108_baru ASC");                      
                    // }

                    if($form == 2) {
                        $no_lokasi=$this->session->userdata('no_lokasi_asli');
                        $query = $this->db->query("SELECT
                            a.register,
                            b.lokasi,
                            a.kode108_baru,
                            a.kode64_baru,
                            a.nama_barang,
                            a.merk_alamat,
                            a.tipe,
                            a.tahun_pengadaan,
                            a.harga_baru,
                            c.status 
                        FROM
                            `2023_v1`.`kib_awal` a
                            LEFT JOIN `rkbmd2023`.register_isi c ON a.register = c.register
                            JOIN `2023_v1`.kamus_lokasi b on a.nomor_lokasi_baru = b.nomor_lokasi
                        WHERE
                            a.hapus <> 1 
                            AND a.extrakomtabel_baru <> 1 
                            AND a.kode64_baru NOT LIKE '1.2.02%'
                            AND a.nomor_lokasi_baru LIKE '".$no_lokasi."%'
                            AND (a.register like '%".$data."%' or a.nama_barang_baru like '%".$data."%' or a.merk_alamat like '%".$data."%')
                        UNION
                        SELECT
                            x.register,
                            d.lokasi,
                            x.kode108_baru,
                            x.kode64_baru,
                            x.nama_barang,
                            x.merk_alamat,
                            x.tipe,
                            x.tahun_pengadaan,
                            x.harga_baru,
                            e.status 
                        FROM
                            `2023_v1`.`kib` x
                            LEFT JOIN `rkbmd2023`.register_isi e ON x.register = e.register
                            JOIN `2023_v1`.kamus_lokasi d on x.nomor_lokasi_baru = d.nomor_lokasi
                            AND (x.register like '%".$data."%' or x.nama_barang_baru like '%".$data."%' or x.merk_alamat like '%".$data."%')
                        WHERE
                            x.hapus <> 1 
                            AND x.extrakomtabel_baru <> 1 
                            AND x.kode64_baru NOT LIKE '1.2.02%'
                            AND x.nomor_lokasi_baru LIKE '".$no_lokasi."%'");
                    } else {
                        $query = $this->db->query("SELECT
                            a.register,
                            b.lokasi,
                            a.kode108_baru,
                            a.kode64_baru,
                            a.nama_barang,
                            a.merk_alamat,
                            a.tipe,
                            a.tahun_pengadaan,
                            a.harga_baru,
                            c.status 
                        FROM
                            `2023_v1`.`kib_awal` a
                            LEFT JOIN `rkbmd2023`.register_isi c ON a.register = c.register
                            JOIN `2023_v1`.kamus_lokasi b on a.nomor_lokasi_baru = b.nomor_lokasi
                        WHERE
                            a.hapus <> 1 
                            AND a.extrakomtabel_baru <> 1 
                            AND a.kode64_baru NOT LIKE '1.2.02%'
                            AND a.nomor_lokasi_baru LIKE '".$data."%'
                        UNION
                        SELECT
                            x.register,
                            d.lokasi,
                            x.kode108_baru,
                            x.kode64_baru,
                            x.nama_barang,
                            x.merk_alamat,
                            x.tipe,
                            x.tahun_pengadaan,
                            x.harga_baru,
                            e.status 
                        FROM
                            `2023_v1`.`kib` x
                            LEFT JOIN `rkbmd2023`.register_isi e ON x.register = e.register
                            JOIN `2023_v1`.kamus_lokasi d on x.nomor_lokasi_baru = d.nomor_lokasi
                        WHERE
                            x.hapus <> 1 
                            AND x.extrakomtabel_baru <> 1 
                            AND x.kode64_baru NOT LIKE '1.2.02%'
                            AND x.nomor_lokasi_baru LIKE '".$data."%'");
                    }


                return $query;
            }

            public function hitungBanyakRowRegister_verifikator($data,$kib,$form)
            {

                  
                // if ($form == 2){
                //         $no_lokasi=$this->session->userdata('no_lokasi_asli');
                //         $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.harga_baru FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi where a.ekstrakomtabel is NULL and a.status_simbada is null and a.`status` = 1 and a.kode108_baru like '%".$kib."%' and left(a.`nomor_lokasi_baru`,12) like '%".$no_lokasi."%' and (a.`register` like '%".$data."%' or a.nama_barang like '%".$data."%') and not EXISTS (select x.kode_sub_kelompok from kamus_barang x where x.kode_sub_kelompok=left(a.kode108_baru,14) and x.kunci = 1)");

                //     } else {
                //         $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi where a.ekstrakomtabel is NULL and a.status_simbada is null and a.`status` = 1 and a.kode108_baru like '%".$kib."%' and left(a.`nomor_lokasi_baru`,12) like '%".$data."%' and not EXISTS (select x.kode_sub_kelompok from kamus_barang x where x.kode_sub_kelompok=left(a.kode108_baru,14) and x.kunci = 1)");
                //     }

                if($form == 2){
                    $no_lokasi=$this->session->userdata('no_lokasi_asli');
                    $query = $this->db->query("SELECT a.register,a.kode_barang_lama as kode64_baru,a.nomor_lokasi_awal as nomor_lokasi,a.nama_barang,a.spesifikasi_barang_merk as merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun as tahun_pengadaan,a.nilai_perolehan as harga_baru FROM `register_isi` a inner join kamus_lokasi b on a.nomor_lokasi_awal=b.nomor_lokasi where a.`status` = 1 and a.hapus <> 1 and extrakomtabel <> 1 and a.kode_barang_lama like '".$kib."%' and a.`nomor_lokasi_awal` like '".$no_lokasi."%' and (a.`register` like '%".$data."%' or a.nama_barang like '%".$data."%')");
                } else {
                    $query = $this->db->query("SELECT a.register,a.kode_barang_lama as kode64_baru,a.nomor_lokasi_awal as nomor_lokasi,a.nama_barang,a.spesifikasi_barang_merk as merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun as tahun_pengadaan,a.nilai_perolehan as harga_baru FROM `register_isi` a inner join kamus_lokasi b on a.nomor_lokasi_awal=b.nomor_lokasi where a.`status` = 1 and a.hapus <> 1 and extrakomtabel <> 1 and a.kode_barang_lama like '%".$kib."%' and left(a.`nomor_lokasi_awal`,12) like '%".$data."%'");
                }

                return $query;
            }

            public function hitungBanyakRowRegister_sudahdiverif($data,$kib,$form)
            {


                    // if ($form == 2){
                    //     $no_lokasi=$this->session->userdata('no_lokasi_asli');
                    //     $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.harga_baru FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi where a.ekstrakomtabel is NULL and a.status_simbada is null and a.status = '2' and a.`nomor_lokasi_baru` like '%".$no_lokasi."%' and a.kode108_baru like '%".$kib."%' and (a.`register` like '%".$data."%' or a.nama_barang like '%".$data."%') and not EXISTS (select x.kode_sub_kelompok from kamus_barang x where x.kode_sub_kelompok=left(a.kode108_baru,14) and x.kunci = 1) ");

                    // } else {
                    //     $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi where a.ekstrakomtabel is NULL and a.status_simbada is null and a.status = '2' and a.kode108_baru like '%".$kib."%' and a.`nomor_lokasi_baru` like '%".$data."%' and not EXISTS (select x.kode_sub_kelompok from kamus_barang x where x.kode_sub_kelompok=left(a.kode108_baru,14) and x.kunci = 1)");

                       
                    // }

                    if($form == 2) {
                        $no_lokasi=$this->session->userdata('no_lokasi_asli');
                        $query = $this->db->query("SELECT a.register,a.lokasi,a.kode_neraca as kode64_baru,a.nama_barang,a.spesifikasi_barang_merk as merk_alamat,a.tipe,a.kondisi_barang,a.tahun as tahun_pengadaan,a.nilai_perolehan as harga_baru,a.status,b.lokasi as lokasi_baru,c.lokasi as lokasi_awal FROM `rkbmd2023`.register_isi a inner join `2023_v1`.kamus_lokasi b on a.lokasi = b.nomor_lokasi inner join `2023_v1`.kamus_lokasi c on a.nomor_lokasi_awal = c.nomor_lokasi WHERE a.status = '2' and a.hapus <> 1 and extrakomtabel <> 1 and a.lokasi like '".$no_lokasi."%' and a.kode_barang like '%".$kib."%' and (a.register like '%".$data."%' or a.nama_barang like '%".$data."%' or a.spesifikasi_barang_merk like '%".$data."%')");
                    } else {
                        $query = $this->db->query("SELECT a.register,a.lokasi,a.kode_neraca as kode64_baru,a.nama_barang,a.spesifikasi_barang_merk as merk_alamat,a.tipe,a.kondisi_barang,a.tahun as tahun_pengadaan,a.nilai_perolehan as harga_baru,a.status,b.lokasi as lokasi_baru,c.lokasi as lokasi_awal FROM `rkbmd2023`.register_isi a inner join `2023_v1`.kamus_lokasi b on a.lokasi = b.nomor_lokasi inner join `2023_v1`.kamus_lokasi c on a.nomor_lokasi_awal = c.nomor_lokasi WHERE a.status = '2' and a.hapus <> 1 and extrakomtabel <> 1 and a.lokasi like '".$data."%' and a.kode_barang like '".$kib."%'");
                    }

                return $query;
            }

            public function hitungBanyakRowRegister_tolak_proses($data,$kib,$form)
            {


                    // if ($form == 2){
                    //     $no_lokasi=$this->session->userdata('no_lokasi_asli');
                    //     $query = $this->db->query("SELECT a.*,b.lokasi FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi where a.ekstrakomtabel is NULL and a.status_simbada is null and (a.status = '1' or a.status = '3') and a.kode108_baru like '%".$kib."%' and left(a.`nomor_lokasi_baru`,12) like '%".$no_lokasi."%' and (a.`register` like '%".$data."%' or a.nama_barang like '%".$data."%') and not EXISTS (select x.kode_sub_kelompok from kamus_barang x where x.kode_sub_kelompok=left(a.kode108_baru,14) and x.kunci = 1) order by a.status DESC");

                    // } else {
                    //     $query = $this->db->query("SELECT a.*,b.lokasi FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi where a.ekstrakomtabel is NULL and a.status_simbada is null and (a.status = '1' or a.status = '3') and a.kode108_baru like '%".$kib."%' and left(a.`nomor_lokasi_baru`,12) like '%".$data."%' and not EXISTS (select x.kode_sub_kelompok from kamus_barang x where x.kode_sub_kelompok=left(a.kode108_baru,14) and x.kunci = 1) order by a.status DESC");

                        
                    // }

                    if($form == 2) {
                        $no_lokasi=$this->session->userdata('no_lokasi_asli');
                        $query = $this->db->query("SELECT a.register,a.lokasi,a.kode_neraca as kode64_baru,a.nama_barang,a.spesifikasi_barang_merk as merk_alamat,a.tipe,a.tahun as tahun_pengadaan,a.nilai_perolehan as harga_baru,a.status,b.lokasi as lokasi_pd FROM `rkbmd2023`.register_isi a inner join `2023_v1`.kamus_lokasi b on a.lokasi = b.nomor_lokasi WHERE a.status <> '2' and a.hapus <> 1 and extrakomtabel <> 1 and a.lokasi like '".$no_lokasi."%' and a.kode_barang like '".$kib."%' and (a.register like '%".$data."%' or a.nama_barang like '%".$data."%' or a.spesifikasi_barang_merk like '%".$data."%')");
                    } else {
                        $query = $this->db->query("SELECT a.register,a.lokasi,a.kode_neraca as kode64_baru,a.nama_barang,a.spesifikasi_barang_merk as merk_alamat,a.tipe,a.tahun as tahun_pengadaan,a.nilai_perolehan as harga_baru,a.status,b.lokasi as lokasi_pd FROM `rkbmd2023`.register_isi a inner join `2023_v1`.kamus_lokasi b on a.lokasi = b.nomor_lokasi WHERE a.status <> '2' and a.hapus <> 1 and extrakomtabel <> 1 and a.lokasi like '".$data."%' and a.kode_barang like '".$kib."%'");
                    }

                return $query;
            }

            
            public function save_image($data = array())
            {
                return $this->db->insert_batch('jurnal_upload',$data);
            }

            public function ambil_file($data)
            {
                return $this->db->get_Where('jurnal_upload',array('register' => $data));
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

            public function list_register_tambak($data,$kib, $limit, $offset,$form){

                    if($form == 2){
                        $no_lokasi=$this->session->userdata('no_lokasi_asli');
                        $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi_baru,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru,a.status_register,c.status_isian FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi inner join register_tambak c on a.register=c.register where a.ekstrakomtabel is NULL and a.status_simbada is null and a.kode108_baru like '%".$kib."%' and left(a.`nomor_lokasi_baru`,12) like '%".$no_lokasi."%' and (a.`register` like '%".$data."%' or a.nama_barang like '%".$data."%') and EXISTS (select x.register from register_tambak x where x.register=a.register) order by c.status_isian desc limit ".$limit." offset ".$offset."");
        
                    } else {
                        $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi_baru,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru,a.status_register,c.status_isian FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi inner join register_tambak c on a.register=c.register where a.ekstrakomtabel is NULL and a.status_simbada is null and a.kode108_baru like '%".$kib."%' and left(a.`nomor_lokasi_baru`,12) like '%".$data."%' and EXISTS (select x.register from register_tambak x where x.register=a.register) order by c.status_isian desc limit ".$limit." offset ".$offset."");
                    }
                

                return $query->result();
            }

            public function get_status_register($data, $limit, $offset,$form){

                    // if($form == 2){
                    //     $no_lokasi=$this->session->userdata('no_lokasi_asli');
                    //     $query = $this->db->query("SELECT a.register,a.kode_barang,a.nomor_lokasi_awal,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru,a.status_register,a.status,a.status_simbada FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi where a.ekstrakomtabel is NULL and a.`nomor_lokasi_baru` like '%".$no_lokasi."%' and (a.`register` like '%".$data."%' or a.nama_barang like '%".$data."%') limit ".$limit." offset ".$offset."");
        
                    // } else {
                    //     $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi_baru,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru,a.status_register,a.status,a.status_simbada FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi where a.ekstrakomtabel is NULL and a.`nomor_lokasi_baru` like '%".$data."%' order by a.kode108_baru ASC limit ".$limit." offset ".$offset."");
                    // }
                    if($form == 2) {
                        $no_lokasi=$this->session->userdata('no_lokasi_asli');
                        $query = $this->db->query("SELECT
                            a.register,
                            b.lokasi,
                            a.kode108_baru,
                            a.kode64_baru,
                            a.nama_barang,
                            a.merk_alamat,
                            a.tipe,
                            a.tahun_pengadaan,
                            a.harga_baru,
                            a.hapus,
                            c.status 
                        FROM
                            `2023_v1`.`kib_awal` a
                            LEFT JOIN `rkbmd2023`.register_isi c ON a.register = c.register
                            JOIN `2023_v1`.kamus_lokasi b on a.nomor_lokasi_baru = b.nomor_lokasi
                        WHERE
                            a.hapus <> 1 
                            AND a.extrakomtabel_baru <> 1 
                            AND a.kode64_baru NOT LIKE '1.2.02%'
                            AND a.nomor_lokasi_baru LIKE '".$no_lokasi."%'
                            AND (a.register like '%".$data."%' or a.nama_barang_baru like '%".$data."%' or a.merk_alamat like '%".$data."%')
                        UNION
                        SELECT
                            x.register,
                            d.lokasi,
                            x.kode108_baru,
                            x.kode64_baru,
                            x.nama_barang,
                            x.merk_alamat,
                            x.tipe,
                            x.tahun_pengadaan,
                            x.harga_baru,
                            x.hapus,
                            e.status 
                        FROM
                            `2023_v1`.`kib` x
                            LEFT JOIN `rkbmd2023`.register_isi e ON x.register = e.register
                            JOIN `2023_v1`.kamus_lokasi d on x.nomor_lokasi_baru = d.nomor_lokasi
                            AND (x.register like '%".$data."%' or x.nama_barang_baru like '%".$data."%' or x.merk_alamat like '%".$data."%')
                        WHERE
                            x.hapus <> 1 
                            AND x.extrakomtabel_baru <> 1 
                            AND x.kode64_baru NOT LIKE '1.2.02%'
                            AND x.nomor_lokasi_baru LIKE '".$no_lokasi."%'
                            ORDER BY kode64_baru DESC limit ".$limit." offset ".$offset."");
                    } else {
                        $query = $this->db->query("SELECT
                            a.register,
                            b.lokasi,
                            a.kode108_baru,
                            a.kode64_baru,
                            a.nama_barang,
                            a.merk_alamat,
                            a.tipe,
                            a.tahun_pengadaan,
                            a.harga_baru,
                            a.hapus,
                            c.status 
                        FROM
                            `2023_v1`.`kib_awal` a
                            LEFT JOIN `rkbmd2023`.register_isi c ON a.register = c.register
                            JOIN `2023_v1`.kamus_lokasi b on a.nomor_lokasi_baru = b.nomor_lokasi
                        WHERE
                            a.hapus <> 1 
                            AND a.extrakomtabel_baru <> 1 
                            AND a.kode64_baru NOT LIKE '1.2.02%'
                            AND a.nomor_lokasi_baru LIKE '".$data."%'
                        UNION
                        SELECT
                            x.register,
                            d.lokasi,
                            x.kode108_baru,
                            x.kode64_baru,
                            x.nama_barang,
                            x.merk_alamat,
                            x.tipe,
                            x.tahun_pengadaan,
                            x.harga_baru,
                            x.hapus,
                            e.status 
                        FROM
                            `2023_v1`.`kib` x
                            LEFT JOIN `rkbmd2023`.register_isi e ON x.register = e.register
                            JOIN `2023_v1`.kamus_lokasi d on x.nomor_lokasi_baru = d.nomor_lokasi
                        WHERE
                            x.hapus <> 1 
                            AND x.extrakomtabel_baru <> 1 
                            AND x.kode64_baru NOT LIKE '1.2.02%'
                            AND x.nomor_lokasi_baru LIKE '".$data."%'
                            ORDER BY kode64_baru DESC limit ".$limit." offset ".$offset."");
                    }

                return $query->result();
            }

            public function get_verif_register_pagination($data,$kib, $limit, $offset,$form)
            {

            
                    // if($form == 2){
                    //     $no_lokasi=$this->session->userdata('no_lokasi_asli');
                    //     $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi_baru,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi as lokasi_awal,a.satuan,d.kondisi_barang,a.tahun_pengadaan,a.harga_baru,d.lokasi,e.lokasi as lokasi_baru FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi inner join register_isi d on a.register=d.register inner join kamus_lokasi e on d.lokasi=e.nomor_lokasi where a.ekstrakomtabel is NULL and a.status_simbada is null and a.`status` = '2' and a.kode108_baru like '%".$kib."%' and a.`nomor_lokasi_baru` like '%".$no_lokasi."%' and (a.`register` like '%".$data."%' or a.nama_barang like '%".$data."%') and not EXISTS (select x.kode_sub_kelompok from kamus_barang x where x.kode_sub_kelompok=left(a.kode108_baru,14) and x.kunci = 1) limit ".$limit." offset ".$offset."");
        
        
                    // } else {
                    //     $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi_baru,a.nama_barang,a.merk_alamat,d.kondisi_barang,a.tipe,b.lokasi as lokasi_awal,a.satuan,a.tahun_pengadaan,a.harga_baru,d.lokasi,e.lokasi as lokasi_baru FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi inner join register_isi d on a.register=d.register inner join kamus_lokasi e on d.lokasi=e.nomor_lokasi where a.ekstrakomtabel is NULL and a.status_simbada is null and a.status = '2' and a.kode108_baru like '%".$kib."%' and a.`nomor_lokasi_baru` like '%".$data."%' and not EXISTS (select x.kode_sub_kelompok from kamus_barang x where x.kode_sub_kelompok=left(a.kode108_baru,14) and x.kunci = 1) limit ".$limit." offset ".$offset."");
                    // } 

                    if($form == 2) {
                        $no_lokasi=$this->session->userdata('no_lokasi_asli');
                        $query = $this->db->query("SELECT a.register,a.lokasi,a.kode_neraca as kode64_baru,a.nama_barang,a.spesifikasi_barang_merk as merk_alamat,a.tipe,a.kondisi_barang,a.tahun as tahun_pengadaan,a.nilai_perolehan as harga_baru,a.status,b.lokasi as lokasi_baru,c.lokasi as lokasi_awal FROM `rkbmd2023`.register_isi a inner join `2023_v1`.kamus_lokasi b on a.lokasi = b.nomor_lokasi inner join `2023_v1`.kamus_lokasi c on a.nomor_lokasi_awal = c.nomor_lokasi WHERE a.status = '2' and a.hapus <> 1 and extrakomtabel <> 1 and a.hapus <> 1 and extrakomtabel <> 1 and a.lokasi like '".$no_lokasi."%' and a.kode_barang like '".$kib."%' and (a.register like '%".$data."%' or a.nama_barang like '%".$data."%' or a.spesifikasi_barang_merk like '%".$data."%') order by a.status desc limit ".$limit." offset ".$offset."");
                    } else {
                        $query = $this->db->query("SELECT a.register,a.lokasi,a.kode_neraca as kode64_baru,a.nama_barang,a.spesifikasi_barang_merk as merk_alamat,a.tipe,a.kondisi_barang,a.tahun as tahun_pengadaan,a.nilai_perolehan as harga_baru,a.status,b.lokasi as lokasi_baru,c.lokasi as lokasi_awal FROM `rkbmd2023`.register_isi a inner join `2023_v1`.kamus_lokasi b on a.lokasi = b.nomor_lokasi inner join `2023_v1`.kamus_lokasi c on a.nomor_lokasi_awal = c.nomor_lokasi WHERE a.status = '2' and a.hapus <> 1 and extrakomtabel <> 1 and a.hapus <> 1 and extrakomtabel <> 1 and a.lokasi like '".$data."%' and a.kode_barang like '".$kib."%' order by a.status desc limit ".$limit." offset ".$offset."");
                    }
                

                return $query->result();
            }

            public function get_tolak_register_pagination($data,$kib, $limit, $offset,$form)
            {   

                    // if($form == 2){
                    //     $no_lokasi=$this->session->userdata('no_lokasi_asli');
                    //     $query = $this->db->query("SELECT a.*,b.lokasi FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi where a.ekstrakomtabel is NULL and a.status_simbada is null and (a.status = '1' or a.status = '3') and left(a.`nomor_lokasi_baru`,12) like '%".$no_lokasi."%' and a.kode108_baru like '%".$kib."%' and (a.`register` like '%".$data."%' or a.nama_barang like '%".$data."%') and not EXISTS (select x.kode_sub_kelompok from kamus_barang x where x.kode_sub_kelompok=left(a.kode108_baru,14) and x.kunci = 1) order by a.status desc limit ".$limit." offset ".$offset."");
        
        
                    // } else {
                    //     $query = $this->db->query("SELECT a.*,b.lokasi FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi where a.ekstrakomtabel is NULL and a.status_simbada is null and (a.status = '1' or a.status = '3') and a.kode108_baru like '%".$kib."%' and left(a.`nomor_lokasi_baru`,12) like '%".$data."%' and not EXISTS (select x.kode_sub_kelompok from kamus_barang x where x.kode_sub_kelompok=left(a.kode108_baru,14) and x.kunci = 1) order by a.status desc limit ".$limit." offset ".$offset."");
                    // }

                    if($form == 2) {
                        $no_lokasi=$this->session->userdata('no_lokasi_asli');
                        $query = $this->db->query("SELECT a.register,a.lokasi,a.kode_neraca as kode64_baru,a.nama_barang,a.spesifikasi_barang_merk as merk_alamat,a.tipe,a.tahun as tahun_pengadaan,a.nilai_perolehan as harga_baru,a.status,b.lokasi as lokasi_pd FROM `rkbmd2023`.register_isi a inner join `2023_v1`.kamus_lokasi b on a.lokasi = b.nomor_lokasi WHERE a.status <> '2' and a.hapus <> 1 and extrakomtabel <> 1 and a.lokasi like '".$no_lokasi."%' and a.kode_barang like '".$kib."%' and (a.register like '%".$data."%' or a.nama_barang like '%".$data."%' or a.spesifikasi_barang_merk like '%".$data."%') order by a.status desc limit ".$limit." offset ".$offset."");
                    } else {
                        $query = $this->db->query("SELECT a.register,a.lokasi,a.kode_neraca as kode64_baru,a.nama_barang,a.spesifikasi_barang_merk as merk_alamat,a.tipe,a.tahun as tahun_pengadaan,a.nilai_perolehan as harga_baru,a.status,b.lokasi as lokasi_pd FROM `rkbmd2023`.register_isi a inner join `2023_v1`.kamus_lokasi b on a.lokasi = b.nomor_lokasi WHERE a.status <> '2' and a.hapus <> 1 and extrakomtabel <> 1 and a.lokasi like '".$data."%' and a.kode_barang like '".$kib."%' order by a.status desc limit ".$limit." offset ".$offset."");
                    }

                return $query->result();
            }

            public function get_all_register_pagination_verifikator($data,$kib, $limit, $offset,$form){


                // if($form == 2){
                //     $no_lokasi=$this->session->userdata('no_lokasi_asli');
                //     $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi where a.ekstrakomtabel is NULL and a.status_simbada is null and a.`status` = 1 and a.kode108_baru like '%".$kib."%' and left(a.`nomor_lokasi_baru`,12) like '%".$no_lokasi."%' and (a.`register` like '%".$data."%' or a.nama_barang like '%".$data."%') and not EXISTS (select x.kode_sub_kelompok from kamus_barang x where x.kode_sub_kelompok=left(a.kode108_baru,14) and x.kunci = 1) limit ".$limit." offset ".$offset."");
                // } else {
                //     $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi where a.ekstrakomtabel is NULL and a.status_simbada is null and a.`status` = 1 and a.kode108_baru like '%".$kib."%' and left(a.`nomor_lokasi_baru`,12) like '%".$data."%' and not EXISTS (select x.kode_sub_kelompok from kamus_barang x where x.kode_sub_kelompok=left(a.kode108_baru,14) and x.kunci = 1) limit ".$limit." offset ".$offset."");
                // }

                if($form == 2){
                    $no_lokasi=$this->session->userdata('no_lokasi_asli');
                    $query = $this->db->query("SELECT a.register,a.kode_barang_lama as kode64_baru,a.nomor_lokasi_awal as nomor_lokasi,a.nama_barang,a.spesifikasi_barang_merk as merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun as tahun_pengadaan,a.nilai_perolehan as harga_baru FROM `rkbmd2023`.`register_isi` a inner join `2023_v1`.kamus_lokasi b on a.nomor_lokasi_awal=b.nomor_lokasi where a.`status` = 1 and a.hapus <> 1 and a.extrakomtabel <> 1 and a.kode_barang_lama like '".$kib."%' and a.`nomor_lokasi_awal` like '".$no_lokasi."%' and (a.`register` like '%".$data."%' or a.nama_barang like '%".$data."%') limit ".$limit." offset ".$offset."");
                } else {
                    $query = $this->db->query("SELECT a.register,a.kode_barang_lama as kode64_baru,a.nomor_lokasi_awal as nomor_lokasi,a.nama_barang,a.spesifikasi_barang_merk as merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun as tahun_pengadaan,a.nilai_perolehan as harga_baru FROM `rkbmd2023`.`register_isi` a inner join `2023_v1`.kamus_lokasi b on a.nomor_lokasi_awal=b.nomor_lokasi where a.`status` = 1 and a.hapus <> 1 and a.extrakomtabel <> 1 and a.kode_barang_lama like '".$kib."%' and a.`nomor_lokasi_awal` like '".$data."%' limit ".$limit." offset ".$offset."");
                } 

                return $query->result();
            }

            public function get_all_register_pagination_Pbp($kib,$no_lokasi){

                $simbadadb = $this->load->database('simbada',TRUE);

                // $query=$this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi where a.ekstrakomtabel is NULL and a.status_simbada is null and a.`status` is null and a.kode108_baru like '%".$kib."%' and a.nomor_lokasi_baru IN ( '".implode("','",$no_lokasi)."' ) and not EXISTS (select x.kode_sub_kelompok from kamus_barang x where x.kode_sub_kelompok=left(a.kode108_baru,14) and x.kunci = 1) ");

                $query=$simbadadb->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi_baru,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru, 'SALDO AWAL' as status_register FROM `2023_v1`.`kib_awal` a inner join `2023_v1`.`kamus_lokasi` b on a.nomor_lokasi_baru=b.nomor_lokasi where a.extrakomtabel_baru = '' and a.hapus = '' and a.kode64_baru like '".$kib."%' and a.nomor_lokasi_baru IN ( '".implode("','",$no_lokasi)."' ) and not EXISTS (select x.register from `rkbmd2023`.register_tambak x where x.register=a.register) and NOT EXISTS (SELECT y.register from `rkbmd2023`.register_isi y where a.register=y.register) union SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi_baru,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru,'PENAMBAHAN' as status_register FROM `2023_v1`.`kib` a inner join `2023_v1`.`kamus_lokasi` b on a.nomor_lokasi_baru=b.nomor_lokasi where a.extrakomtabel_baru = '' and a.hapus = '' and a.kode64_baru like '".$kib."%' and a.nomor_lokasi_baru IN ( '".implode("','",$no_lokasi)."' ) and not EXISTS (select x.register from `rkbmd2023`.register_tambak x where x.register=a.register) and NOT EXISTS (SELECT y.register from `rkbmd2023`.register_isi y where a.register=y.register)");

                return $query->result();
            }

            public function get_verif_register_pagination_Pbp($kib,$no_lokasi)
            {
                $query=$this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi where a.ekstrakomtabel is NULL and a.status_simbada is null and  a.`status` = 2 and a.kode108_baru like '".$kib."%' and a.nomor_lokasi IN ( '".implode("','",$no_lokasi)."' ) and not EXISTS (select x.kode_sub_kelompok from kamus_barang x where x.kode_sub_kelompok=left(a.kode108_baru,14) and x.kunci = 1) ");

                return $query->result();
            }

            public function get_tolak_register_pagination_Pbp($kib,$no_lokasi)
            {
                $query=$this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru,a.status FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi where a.ekstrakomtabel is NULL and a.status_simbada is null and a.kode108_baru like '%".$kib."%' and (a.status = '1' or a.status = '3') and a.nomor_lokasi IN ( '".implode("','",$no_lokasi)."' ) and not EXISTS (select x.kode_sub_kelompok from kamus_barang x where x.kode_sub_kelompok=left(a.kode108_baru,14) and x.kunci = 1) order by a.status DESC");

                return $query->result();
            }

            public function ambil_register($register)
            {   
                $simbadadb = $this->load->database('simbada',TRUE);

                // $query = $this->db->query("SELECT a.*,b.nomor_unit,b.unit,b.nomor_lokasi,b.lokasi FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi where a.register = '".$register."'");
                $query = $simbadadb->query(
                        "SELECT
                            a.nomor_lokasi_baru,
                            a.register,
                            a.nama_barang_baru,
                            a.merk_alamat_baru,
                            a.tipe_baru,
                            a.satuan,
                            a.kode108_baru,
                            a.harga_baru,
                            a.kondisi,
                            a.luas_bangunan,
                            a.luas_tanah,
                            a.kelurahan,
                            a.kecamatan,
                            a.kota,
                            a.no_sertifikat,
                            a.register_tanah,
                            a.keterangan,
                            a.nopol,
                            a.no_rangka_seri,
                            a.no_mesin,
                            a.no_bpkb,
                            a.tahun_pengadaan,
                            a.penggunaan,
                            b.nomor_unit,
                            b.unit,
                            b.nomor_lokasi,
                            b.lokasi 
                        FROM
                            `kib_awal` a
                            INNER JOIN kamus_lokasi b ON a.nomor_lokasi_baru = b.nomor_lokasi 
                        WHERE
                            a.register = '".$register."' and a.hapus <> 1 UNION
                        SELECT
                            c.nomor_lokasi_baru,
                            c.register,
                            c.nama_barang_baru,
                            c.merk_alamat_baru,
                            c.tipe_baru,
                            c.satuan,
                            c.kode108_baru,
                            c.harga_baru,
                            c.kondisi,
                            c.luas_bangunan,
                            c.luas_tanah,
                            c.kelurahan,
                            c.kecamatan,
                            c.kota,
                            c.no_sertifikat,
                            c.register_tanah,
                            c.keterangan,
                            c.nopol,
                            c.no_rangka_seri,
                            c.no_mesin,
                            c.no_bpkb,
                            c.tahun_pengadaan,
                            c.penggunaan,
                            d.nomor_unit,
                            d.unit,
                            d.nomor_lokasi,
                            d.lokasi 
                        FROM
                            `kib` c
                            INNER JOIN kamus_lokasi d ON c.nomor_lokasi_baru = d.nomor_lokasi 
                        WHERE
                            c.register = '".$register."' and c.hapus <> 1");

                // return $query->result();
                // $query = $this->db->get_where('data_kib', $where);
                return $query->row();
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

                $query = $this->db->query("SELECT a.*,b.kode_binprog,b.nomor_lokasi,b.unit,b.lokasi as nama_lokasi,c.lokasi as nama_lokasi_awal FROM `rkbmd2023`.`register_isi` a left join `2023_v1`.kamus_lokasi b on a.lokasi=b.nomor_lokasi left join kamus_lokasi c on a.nomor_lokasi_awal = c.nomor_lokasi where a.register = '".$register."' order by created_date DESC, created_time DESC");
                return $query;
            }

            public function ambil_status_register_form($register)
            {
                return $this->db->from("register_status")->where(array('is_register' => $register))->order_by('created_date DESC, created_time DESC')->get();
            }

            public function data_kode_barang()
            {
                $db_simbada=$this->load->database('simbada',TRUE);
                return $db_simbada->get('kamus_barang');
            }

            public function kamus_kelurahan()
            {
                return $this->db->get('kamus_kelurahan');
            }
            
            public function tandai_status_register($where,$update)
            {
                
                $this->db->where('register', $where);
                $this->db->update('register_isi', $update);
                
            }

            public function update_data_tambak($data,$register) {
                $this->db->where('register', $register);
                $this->db->update('register_tambak', $data);
            }

            public function buat_jurnal_tolak($data)
            {
                $this->db->insert('jurnal_penolakan', $data);
            }

            public function data_satuan()
            {
                return $this->db->get('satuan');
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

            public function save_status_register_history($data)
            {
                $this->db->insert('register_status_history',$data);
                $this->db->error();
            }

            public function tandai_kib($register)
            {
                
                $this->db->where('register', $register);
                $this->db->update('data_kib', array('status' => 1));
                $this->db->error();
            }

            public function update_isi_form ($data,$id){

                $this->db->where('id', $id);
                $this->db->update('register_isi', $data);
                $this->db->error();
            }

            public function update_status_register ($data,$id){

                $this->db->where('id', $id);
                $this->db->update('register_status', $data);
                $this->db->error();
            }

            public function ambil_jurnal_penolakan($data)
            {
                // $query = $this->db->get_where('jurnal_penolakan', $data);
                return $this->db->from("jurnal_penolakan")->where($data)->order_by('created_time desc, created_time desc')->get();
                // return $query->row();
            }

            public function tandai_jurnal_penolakan($data)
            {
                $this->db->where($data);
                $this->db->update('jurnal_penolakan', array('status_register' => 2));
                $this->db->error();
            }

            public function get_data_kib_json($data)
            {
                // $this->db->select('nomor_lokasi,register,kode108_baru,kode64_baru,nama_barang,merk_alamat,tipe,harga_baru,tahun_pengadaan');
                // $this->db->from('data_kib');
                // $this->db->where($where = array ('ekstrakomtabel !=' => 1));
                // $this->db->group_start();
                // $this->db->like('register',$data);
                // $this->db->or_like('nama_barang',$data);
                // $this->db->or_like('merk_alamat',$data);
                // $this->db->group_end();

                $query = $this->db->query("SELECT * FROM data_kib where register like '%".$data."%' or nama_barang like '%".$data."%' or merk_alamat like '%".$data."%' or tipe like '%".$data."%' and ekstrakomtabel <> 1");

                // $query = $this->db->get();
                
                return $query->result();

            }

            public function get_reg_tanah()
            {
                $simbadadb = $this->load->database('simbada',TRUE);

                // $query = $this->db->query("SELECT * FROM data_kib where kode108_baru like '%1.3.1%' and ekstrakomtabel is null and status_simbada is null");
                $query = $simbadadb->query(
                    "SELECT
                        a.nomor_lokasi_baru,
                        b.unit,
                        b.lokasi,
                        a.register,
                        a.kode108_baru,
                        a.nama_barang_baru AS nama_barang,
                        a.tipe_baru AS tipe,
                        a.merk_alamat_baru AS merk_alamat,
                        a.tahun_pengadaan,
                        a.harga_baru 
                    FROM
                        kib_awal a
                        INNER JOIN kamus_lokasi b ON a.nomor_lokasi_baru = b.nomor_lokasi 
                    WHERE
                        kode108_baru LIKE '%1.3.1%' 
                        AND a.extrakomtabel_baru = '' 
                        AND a.hapus = '' UNION
                    SELECT
                        a.nomor_lokasi_baru,
                        b.unit,
                        b.lokasi,
                        a.register,
                        a.kode108_baru,
                        a.nama_barang_baru AS nama_barang,
                        a.tipe_baru AS tipe,
                        a.merk_alamat_baru AS merk_alamat,
                        a.tahun_pengadaan,
                        a.harga_baru 
                    FROM
                        kib a
                        INNER JOIN kamus_lokasi b ON a.nomor_lokasi_baru = b.nomor_lokasi 
                    WHERE
                        kode108_baru LIKE '%1.3.1%' 
                        AND a.extrakomtabel_baru = '' 
                        AND a.hapus = ''"
                );
                
                return $query->result();
            }

            public function get_lokasi_per_opd($no_lokasi)
            {
                $simbadadb = $this->load->database('simbada',TRUE);
                return $simbadadb->get_where('kamus_lokasi',array('nomor_unit' => $no_lokasi));
            }

            public function get_pangkat()
            {
                return $this->db->get('pangkat');
            }

            public function get_petugas($nomor_lokasi)
            {   
                // $this->db->select('*');
                // $this->db->from('petugas_inv');
                // $this->db->join('kamus_lokasi', 'kamus_lokasi.nomor_lokasi = petugas_inv.nomor_lokasi');
                // $this->db->where(array('petugas_inv.status' => NULL, 'petugas_inv.status' => 2));
                // $this->db->like('petugas_inv.nomor_lokasi',$nomor_lokasi);
                // return $this->db->get();

                $query=$this->db->query("SELECT a.*,b.lokasi FROM `petugas_inv` a INNER JOIN kamus_lokasi b ON a.nomor_lokasi=b.nomor_lokasi where a.nomor_lokasi like '%".$nomor_lokasi."%' and a.status is null");
                return $query;
            }

            public function cek_sk_petugas($nip)
            {
                return $this->db->get_where('jurnal_sk_petugas_inv',array('nip_pb' => $nip));
            }

            public function save_sk_db($data,$cek_exist)
            {
                if($cek_exist == 0) {
                    $this->db->insert('jurnal_sk_petugas_inv', $data);
                    $this->db->error(); 
                } else {
                    $this->db->where('nip_pb', $data['nip_pb']);
                    $this->db->update('jurnal_sk_petugas_inv',$data);
                    $this->db->error();
                }
            }

            public function save_petugas($data)
            {
                $this->db->insert('petugas_inv', $data);
                $this->db->error(); 
            }

            public function hapus_petugas($id)
            {
                $this->db->where('id', $id);
                $this->db->update('petugas_inv',array('status' => 1));
                $this->db->error();
            }

            public function data_kamus_lokasi()
            {
                $db_simbada=$this->load->database('simbada',TRUE);
                return $db_simbada->get_where('kamus_lokasi',array('kode_binprog !=' => ''));
            }

            public function get_path($id)
            {
                return $this->db->get_where('jurnal_upload',array('id' => $id));
            }

            public function hapus_image_record($id)
            {
                return $this->db->delete('jurnal_upload',array('id' => $id));
            }

            public function update_petugas($id,$update_data)
            {
                $this->db->where('id', $id);
                $this->db->update('petugas_inv',$update_data);
                $this->db->error();
            }

            public function pb_verif($nomor_lokasi)
            {   
                
                $this->db->select('*');
                $this->db->from('pengguna');
                $this->db->like('nomor_lokasi', $nomor_lokasi);
                $this->db->where_not_in('fungsi', array('Penyelia','Admin'));
                return $this->db->get();
            }

            public function ambil_data_pb($nomor_lokasi)
            {
                $this->db->select('*');
                $this->db->from('pengguna');
                $this->db->like('nomor_lokasi', $nomor_lokasi);
                $this->db->where_in('fungsi', array('Pengurus Barang','Verifikator'));
                return $this->db->get();
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


            public function data_progres_opd($lokasi)
            {
                // return $query;
                if($this->session->userdata('role') == "Pengurus Barang Pembantu UPTD"){
                    $query=$this->db->query(
                        "SELECT
                            b.unit,
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
                            data_kib a inner join (SELECT nomor_unit,unit from kamus_lokasi GROUP BY nomor_unit) b on left(a.nomor_lokasi_baru,12)=b.nomor_unit 
                        WHERE
                            a.ekstrakomtabel is null and a.status_simbada is null and kode108_baru not like '1.5.4%' and a.nomor_lokasi_baru IN ( '".implode("','",$lokasi)."' )
                            GROUP BY a.register");
                } else {
                $query=$this->db->query(
                    "SELECT
                        b.unit,
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
                        data_kib a inner join (SELECT nomor_unit,unit from kamus_lokasi GROUP BY nomor_unit) b on left(a.nomor_lokasi_baru,12)=b.nomor_unit 
                    WHERE
                    a.ekstrakomtabel is null and a.status_simbada is null and kode108_baru not like '1.5.4%' and a.nomor_lokasi_baru like '".$lokasi."%'
                    GROUP BY a.register");
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

            public function ambil_data_pbp()
            {   
                $nip=$this->session->userdata('nip');
                return $this->db->get_where('kamus_pengurus_barang_pembantu',array('nip_pbp' => $nip));
            }

            public function get_rekap_per_uptd($lokasi)
            {
                $query=$this->db->query(
                        "SELECT
                        b.nama_lokasi,
                        count( a.register ) AS total,
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
                            ( STATUS IS NULL, 1, NULL )))/ count( register )* 100 AS persentase 
                    FROM
                        data_kib a
                    INNER JOIN kamus_pengurus_barang_pembantu b ON a.nomor_lokasi = b.nomor_lokasi
                    WHERE b.nomor_lokasi like '".$lokasi."%'
                    GROUP BY
                        b.nip_pbp
                    ORDER BY
                        persentase DESC");
                    
                    return $query->result();
            }

            public function get_data_dinkes_only()
            {
                $query=$this->db->query(
                    "SELECT
                        count( register ) as total,
                        COUNT(
                        IF
                        ( STATUS = 1, 1, NULL )) AS proses,
                        COUNT(
                        IF
                        ( STATUS = 2, 1, NULL )) AS verif,
                        COUNT(
                        IF
                        ( STATUS = 3, 1, NULL )) AS tolak,
                        COUNT(
                        IF
                            ( STATUS IS NULL, 1, NULL )) AS sisa,(
                            count( register )- COUNT(
                            IF
                            ( STATUS IS NULL, 1, NULL )))/ count( register )*100 AS persentase 
                    FROM
                        data_kib
                    WHERE
                    ekstrakomtabel is null and nomor_lokasi in ('13.30.07.01.00.01','13.30.07.01.00.03','13.30.07.01.00.04','13.30.07.01.00.06')");

                    return $query;
            }

            public function get_data_hilang($kib,$lokasi)
            {
                $query = $this->db->query("SELECT a.*,b.unit,b.lokasi,c.kondisi_barang,c.register,c.keterangan as ket_baru from data_kib a join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi inner join register_isi c on a.register=c.register where a.nomor_lokasi like '".$lokasi."%' and a.kode108_baru like '".$kib."%' and a.status = '2' and c.keberadaan_barang = 'Hilang' group by c.register");

                return $query;
            }

            public function info_verif($nip)
            {
                return $this->db->get_where('jurnal_verif_lhi', array('nip_kepala' => $nip));
            }

            public function get_spesimen_simbada($nip)
            {
                $db_simbada = $this->load->database('simbada',TRUE);
                return $db_simbada->get_where('pengguna', array ('nip_pengelola' => $nip),1);
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

            function get_sk_penggunaan($register) {
                $db_simbada = $this->load->database('simbada',TRUE);

                $query=$db_simbada->query("SELECT a.register,b.id_sk,c.nomor,c.tentang,c.file FROM `kib` a inner join rincian_sk_pengguna b on a.register=b.register inner join sk_pengguna c on b.id_sk=c.id where a.sk_pengguna <> '' and c.kunci = 1 and a.register = '".$register."' union SELECT a.register,b.id_sk,c.nomor,c.tentang,c.file FROM `kib_awal` a inner join rincian_sk_pengguna b on a.register=b.register inner join sk_pengguna c on b.id_sk=c.id  where a.sk_pengguna <> '' and c.kunci = 1 and a.register = '".$register."'");
                
                return $query;
            }

            function ambil_data_tambak($register) {
                return $this->db->get_where('register_tambak',array('register' => $register));
            }
 }
 ?>
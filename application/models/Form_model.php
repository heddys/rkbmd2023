
<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Form_model extends CI_Model{

    public function __construct() {
            parent::__construct();
            // $this->simbada = $this->load->database('simbada', TRUE);
        }    


            public function get_all_register_proses_tolak($lokasi,$kib){

                if ($this->session->userdata('role') == 'Pengurus Barang Pembantu UPTD') {
                    $query = $this->db->query("SELECT a.*,b.lokasi FROM data_kib a inner join kamus_lokasi b on b.nomor_lokasi=a.nomor_lokasi where a.ekstrakomtabel IS NULL and (a.status = '1' or a.status = '3') and a.nomor_lokasi IN ( '".implode("','",$lokasi)."' ) and a.kode108_baru like '%".$kib."%' order by a.status DESC");
                } else {

                    $query = $this->db->query("SELECT a.*,b.lokasi FROM data_kib a inner join kamus_lokasi b on b.nomor_lokasi=a.nomor_lokasi where a.ekstrakomtabel IS NULL and (a.status = '1' or a.status = '3') and a.nomor_lokasi_baru like '".$lokasi."%' and a.kode108_baru like '%".$kib."%' order by a.status DESC");
                }
                

                return $query;
            }

            public function get_kib_for_excel($lokasi,$kib)
            {
                $query = $this->db->query("SELECT a.*,b.lokasi FROM data_kib a inner join kamus_lokasi b on b.nomor_lokasi=a.nomor_lokasi where a.ekstrakomtabel IS NULL and a.nomor_lokasi_baru like '".$lokasi."%' and a.kode108_baru like '%".$kib."%' order by a.status DESC");

                return $query;
            }

            public function get_kib_for_excel_pbp($lokasi,$kib)
            {
                $query = $this->db->query("SELECT a.*,b.lokasi FROM data_kib a inner join kamus_lokasi b on b.nomor_lokasi=a.nomor_lokasi where a.ekstrakomtabel IS NULL and a.nomor_lokasi_baru like '".$lokasi."%' and a.kode108_baru like '%".$kib."%' order by a.status DESC");
                
                return $query;
            }

            public function get_register_sudah_verf($lokasi,$kib)
            {
                $query = $this->db->query("SELECT a.*,b.unit,b.lokasi from data_kib a join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi where a.unit_baru like '%".$lokasi."%' and a.kode108_baru like '%".$kib."%' and a.status = '2'");
                
                return $query;
            }

            public function get_kondisi_update($register)
            {
                $query = $this->db->query("SELECT * FROM register_isi where register = '".$register."' ORDER BY created_date desc, created_time desc limit 1");
                return $query;
            }

            public function get_all_register($where,$lokasi,$kib){
                if ($this->session->userdata('role') == 'Pengurus Barang Pembantu UPTD') {
                    $query=$this->db->query("SELECT
                        a.*,
                        b.lokasi
                    FROM
                        `data_kib` a
                        INNER JOIN kamus_lokasi b ON b.nomor_lokasi = a.nomor_lokasi
                    WHERE
                        a.ekstrakomtabel IS NULL
                        AND a.STATUS = ".$where['status']."
                        AND a.nomor_lokasi IN ( '".implode("','",$lokasi)."' )
                        AND a.kode108_baru like '".$kib."%'");
                    
                } else {

                    $query=$this->db->query("SELECT
                        a.*,
                        b.lokasi
                    FROM
                        `data_kib` a
                        INNER JOIN kamus_lokasi b ON b.nomor_lokasi = a.nomor_lokasi
                    WHERE
                        a.ekstrakomtabel IS NULL
                        AND a.STATUS = ".$where['status']."
                        AND a.nomor_lokasi_baru LIKE '".$lokasi."%'
                        AND a.kode108_baru like '".$kib."%'"
                    );

                }

                return $query;
            }

            public function hitungBanyakRowRegister($where,$data,$kib,$form)
            {
                // $this->db->where(array('register' => '19012142-2019-1140133-1-143-1'));
                // if ($form == 2){
                //     $no_lokasi=$this->session->userdata('no_lokasi_asli');
                //     $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.harga_baru FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi where a.ekstrakomtabel is NULL and a.`status` is null and left(a.`kode108_baru`,14) in ('1.3.2.02.01.01',
                //     '1.3.2.02.01.02',
                //     '1.3.2.02.01.03',
                //     '1.3.2.02.01.06',
                //     '1.3.2.02.01.04',
                //     '1.3.2.02.01.05',
                //     '1.3.2.05.01.04',
                //     '1.3.2.05.01.05',
                //     '1.3.2.05.02.01',
                //     '1.3.2.05.02.04',
                //     '1.3.2.05.02.05',
                //     '1.3.2.10.01.01',
                //     '1.3.2.10.01.02',
                //     '1.3.2.10.01.03',
                //     '1.3.2.10.02.02',
                //     '1.3.2.10.02.03',
                //     '1.3.2.05.03.01',
                //     '1.3.2.05.03.02',
                //     '1.3.2.05.03.03',
                //     '1.3.2.05.03.04',
                //     '1.3.2.05.03.05',
                //     '1.3.2.05.03.06',
                //     '1.3.2.05.03.07') and a.`nomor_lokasi_baru` like '".$no_lokasi."%' and (a.`register` like '%".$data."%' or a.nama_barang like '%".$data."%')");

                //     return $query;
                // } else {

                //     $query = $this->db->query("SELECT * FROM data_kib WHERE ekstrakomtabel is null and status is null and left(kode108_baru,14) in ('1.3.2.02.01.01',
                //     '1.3.2.02.01.02',
                //     '1.3.2.02.01.03',
                //     '1.3.2.02.01.06',
                //     '1.3.2.02.01.04',
                //     '1.3.2.02.01.05',
                //     '1.3.2.05.01.04',
                //     '1.3.2.05.01.05',
                //     '1.3.2.05.02.01',
                //     '1.3.2.05.02.04',
                //     '1.3.2.05.02.05',
                //     '1.3.2.10.01.01',
                //     '1.3.2.10.01.02',
                //     '1.3.2.10.01.03',
                //     '1.3.2.10.02.02',
                //     '1.3.2.10.02.03',
                //     '1.3.2.05.03.01',
                //     '1.3.2.05.03.02',
                //     '1.3.2.05.03.03',
                //     '1.3.2.05.03.04',
                //     '1.3.2.05.03.05',
                //     '1.3.2.05.03.06',
                //     '1.3.2.05.03.07') and nomor_lokasi_baru like '%".$data."%'");

                //     return $query;
                // } 
                if ($form == 2){
                    $no_lokasi=$this->session->userdata('no_lokasi_asli');
                    $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.harga_baru FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi where a.ekstrakomtabel is NULL and a.`status` is null and a.`nomor_lokasi_baru` like '".$no_lokasi."%' and (a.`register` like '%".$data."%' or a.nama_barang like '%".$data."%')");

                    return $query;
                } else {
                    $this->db->select('*');
                    $this->db->from('data_kib');
                    $this->db->where($where);
                    $this->db->like('nomor_lokasi_baru',$data,'both');
                    $this->db->like('kode108_baru',$kib);

                    return $this->db->get();
                }
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

                // if($form == 2){
                //     $no_lokasi=$this->session->userdata('no_lokasi_asli');
                //     $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.harga_baru FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi where a.ekstrakomtabel is NULL and a.`status` is null and a.`nomor_lokasi_baru` like '".$no_lokasi."%' and left(a.`kode108_baru`,14) in ('1.3.2.02.01.02',
                //     '1.3.2.02.01.03',
                //     '1.3.2.02.01.06',
                //     '1.3.2.02.01.04',
                //     '1.3.2.02.01.05',
                //     '1.3.2.05.01.04',
                //     '1.3.2.05.01.05',
                //     '1.3.2.05.02.01',
                //     '1.3.2.05.02.04',
                //     '1.3.2.05.02.05',
                //     '1.3.2.10.01.01',
                //     '1.3.2.10.01.02',
                //     '1.3.2.10.01.03',
                //     '1.3.2.10.02.02',
                //     '1.3.2.10.02.03',
                //     '1.3.2.05.03.01',
                //     '1.3.2.05.03.02',
                //     '1.3.2.05.03.03',
                //     '1.3.2.05.03.04',
                //     '1.3.2.05.03.05',
                //     '1.3.2.05.03.06',
                //     '1.3.2.05.03.07') and (a.`register` like '%".$data."%' or a.nama_barang like '%".$data."%') limit ".$limit." offset ".$offset."");
                // } else {
                //     $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.harga_baru FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi where a.ekstrakomtabel is NULL and a.`status` is null and left(a.`kode108_baru`,14) in ('1.3.2.02.01.02',
                //     '1.3.2.02.01.03',
                //     '1.3.2.02.01.06',
                //     '1.3.2.02.01.04',
                //     '1.3.2.02.01.05',
                //     '1.3.2.05.01.04',
                //     '1.3.2.05.01.05',
                //     '1.3.2.05.02.01',
                //     '1.3.2.05.02.04',
                //     '1.3.2.05.02.05',
                //     '1.3.2.10.01.01',
                //     '1.3.2.10.01.02',
                //     '1.3.2.10.01.03',
                //     '1.3.2.10.02.02',
                //     '1.3.2.10.02.03',
                //     '1.3.2.05.03.01',
                //     '1.3.2.05.03.02',
                //     '1.3.2.05.03.03',
                //     '1.3.2.05.03.04',
                //     '1.3.2.05.03.05',
                //     '1.3.2.05.03.06',
                //     '1.3.2.05.03.07') and a.`nomor_lokasi_baru` like '%".$data."%' limit ".$limit." offset ".$offset."");
                // } 

                // return $query->result();

                if($form == 2){
                    $no_lokasi=$this->session->userdata('no_lokasi_asli');
                    $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi where a.ekstrakomtabel is NULL and a.`status` is null and a.`nomor_lokasi_baru` like '".$no_lokasi."%' and (a.`register` like '%".$data."%' or a.nama_barang like '%".$data."%') limit ".$limit." offset ".$offset."");
                } else {
                    $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi where a.ekstrakomtabel is NULL and a.`status` is null and a.`nomor_lokasi_baru` like '%".$data."%' limit ".$limit." offset ".$offset."");
                } 

                return $query->result();
            }

            public function get_all_register_pagination_Pbp($kib,$no_lokasi){

                $query=$this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi where a.ekstrakomtabel is NULL and a.`status` is null and a.nomor_lokasi IN ( '".implode("','",$no_lokasi)."' )");

                return $query->result();
            }

            public function ambil_register($register)
            {   

                $query = $this->db->query("SELECT a.*,b.* FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi where a.register = '".$register."'");

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

                $query = $this->db->query("SELECT a.*,b.* FROM `register_isi` a join kamus_lokasi b on a.lokasi=b.nomor_lokasi where a.register = '".$register."' order by created_date DESC, created_time DESC");
                return $query;
            }

            public function ambil_status_register_form($register)
            {
                return $this->db->from("register_status")->where(array('is_register' => $register))->order_by('created_date DESC, created_time DESC')->get();
            }

            public function data_kode_barang()
            {
                return $this->db->get('kamus_barang');
            }

            public function tandai_status_register($where,$tanda)
            {
                if($tanda == 1) {
                    $this->db->where('register', $where);
                    $this->db->update('data_kib', array('status' => 3));

                }
                else {
                    $this->db->where('register', $where);
                    $this->db->update('data_kib', array('status' => 2));
                }

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
                $this->db->error(); 
            }

            public function save_status_register($data)
            {
                $this->db->insert('register_status',$data);
                $this->db->error();
            }

            public function tandai_kib($register)
            {
                $this->db->where('register', $register);
                $this->db->update('data_kib', array('status' => 1));
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


            public function get_lokasi_per_opd($no_lokasi)
            {
                return $this->db->get_where('kamus_lokasi',array('unit_baru' => $no_lokasi, 'kode_binprog !=' => ''));
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
                return $this->db->get_where('kamus_lokasi',array('kode_binprog !=' => ''));
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
               return $this->db->get_where('pengguna',array('nomor_lokasi' => $nomor_lokasi));
            }

            public function data_progres_opd($lokasi)
            {
                // $query=$this->db->query(
                //     "SELECT
                //         b.unit,
                //         count( a.register ) as total,
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
                //             ( STATUS IS NULL, 1, NULL )))/ count( register )*100 AS persentase 
                //     FROM
                //         data_kib a inner join (SELECT unit_baru,unit from kamus_lokasi where kode_binprog <> '' GROUP BY unit_baru) b on a.unit_baru=b.unit_baru 
                //     WHERE
                //         a.unit_baru like '%".$lokasi."%' and left(a.kode108_baru,14) in ('1.3.2.02.01.02',
                //     '1.3.2.02.01.03',
                //     '1.3.2.02.01.06',
                //     '1.3.2.02.01.04',
                //     '1.3.2.02.01.05',
                //     '1.3.2.05.01.04',
                //     '1.3.2.05.01.05',
                //     '1.3.2.05.02.01',
                //     '1.3.2.05.02.04',
                //     '1.3.2.05.02.05',
                //     '1.3.2.10.01.01',
                //     '1.3.2.10.01.02',
                //     '1.3.2.10.01.03',
                //     '1.3.2.10.02.02',
                //     '1.3.2.10.02.03',
                //     '1.3.2.05.03.01',
                //     '1.3.2.05.03.02',
                //     '1.3.2.05.03.03',
                //     '1.3.2.05.03.04',
                //     '1.3.2.05.03.05',
                //     '1.3.2.05.03.06',
                //     '1.3.2.05.03.07')");
                
                // return $query;
                if($this->session->userdata('role') == "Pengurus Barang Pembantu UPTD" ){
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
                            data_kib a inner join (SELECT unit_baru,unit from kamus_lokasi where kode_binprog <> '' GROUP BY unit_baru) b on a.unit_baru=b.unit_baru 
                        WHERE
                            a.ekstrakomtabel is null and a.nomor_lokasi IN ( '".implode("','",$lokasi)."' )");
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
                        data_kib a inner join (SELECT unit_baru,unit from kamus_lokasi where kode_binprog <> '' GROUP BY unit_baru) b on a.unit_baru=b.unit_baru 
                    WHERE
                    a.ekstrakomtabel is null and a.unit_baru like '%".$lokasi."%'");
                }
                return $query;
            }

            public function ambil_data_pbp()
            {   
                $nip=$this->session->userdata('nip');
                return $this->db->get_where('kamus_pengurus_barang_pembantu',array('nip_pbp' => $nip));
            }

            public function get_rekap_per_puskesmas($lokasi)
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
        GROUP BY
            b.nip_pbp
        ORDER BY
            persentase DESC");
        
        return $query->result();
   }
 }
 ?>
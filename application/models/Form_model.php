
<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Form_model extends CI_Model{

    public function __construct() {
            parent::__construct();
            // $this->simbada = $this->load->database('simbada', TRUE);
        }    


            public function get_all_register_proses_tolak($lokasi,$kib){

                $query = $this->db->query("SELECT * FROM data_kib where ekstrakomtabel IS NULL and (status = '1' or status = '3') and nomor_lokasi like '%".$lokasi."%' and kode108_baru like '%".$kib."%' LIMIT 100 ");

                // $this->db->select('nomor_lokasi,register,kode64_baru,nama_barang,merk_alamat,tipe,harga_baru,status');*
                // $this->db->from('data_kib');*
                // $this->db->where($where);*
                // $this->db->or_where('status = ', 1);*

                
                // $this->db->like('nomor_lokasi',$lokasi);*
                // $this->db->like('kode108_baru',$kib);*
                // $this->db->order_by("status","DESC");*
                // $q1=$this->db->get();

                // $this->db->select('nomor_lokasi_baru,register,kode64_baru,nama_barang_baru,merk_alamat_baru,tipe_baru,harga_baru');
                // $this->db->from('kib');
                // $this->db->where($where);
                // $this->db->like('nomor_lokasi_baru',$lokasi);
                // $this->db->like('kode64_baru','1.3.02');
                // $q2=$this->db->get_compiled_select();

                // $query = $this->db->query($q1 . ' UNION ' . $q2);
                // return $this->db->get();

                return $query;
            }

            public function get_all_register($where,$lokasi,$kib){

                $this->db->select('*');
                $this->db->from('data_kib');
                $this->db->where($where);
                
                // $this->db->where(array('register' => '19012142-2019-1140133-1-143-1'));
                $this->db->like('nomor_lokasi',$lokasi);
                $this->db->like('kode108_baru',$kib);
                // $this->db->limit(200,1);
                // $q1=$this->db->get();

                // $this->db->select('nomor_lokasi_baru,register,kode64_baru,nama_barang_baru,merk_alamat_baru,tipe_baru,harga_baru');
                // $this->db->from('kib');
                // $this->db->where($where);
                // $this->db->like('nomor_lokasi_baru',$lokasi);
                // $this->db->like('kode64_baru','1.3.02');
                // $q2=$this->db->get_compiled_select();

                // $query = $this->db->query($q1 . ' UNION ' . $q2);
                return $this->db->get();
            }

            public function hitungBanyakRowRegister($where,$lokasi,$kib,$limit,$offset)
            {
                $this->db->select('*');
                $this->db->from('data_kib');
                $this->db->where($where);
                
                // $this->db->where(array('register' => '19012142-2019-1140133-1-143-1'));
                $this->db->like('nomor_lokasi',$lokasi);
                $this->db->like('kode108_baru',$kib);
                $this->db->limit($limit,$offset);

                return $this->db->get();
            }
            
            public function save_image($data = array())
            {
                return $this->db->insert_batch('jurnal_upload',$data);
            }

            public function ambil_file($data)
            {
                return $this->db->get_Where('jurnal_upload',$data);
            }

            public function get_all_register_pagination($where,$lokasi,$kib, $limit, $offset){

                $this->db->select('a.nomor_lokasi,a.register,a.kode64_baru,a.nama_barang,a.merk_alamat,a.tipe,a.harga_baru,b.lokasi');
                $this->db->from('data_kib');
                $this->db->where($where);
                // $this->db->where(array('register' => '19012142-2019-1140133-1-143-1'));
                $this->db->like('nomor_lokasi',$lokasi);
                $this->db->like('kode108_baru',$kib);
                $this->db->limit($limit, $offset);
                // $q1=$this->db->get();

                // $this->db->select('nomor_lokasi_baru,register,kode64_baru,nama_barang_baru,merk_alamat_baru,tipe_baru,harga_baru');
                // $this->db->from('kib');
                // $this->db->where($where);
                // $this->db->like('nomor_lokasi_baru',$lokasi);
                // $this->db->like('kode64_baru','1.3.02');
                // $q2=$this->db->get_compiled_select();

                // $query = $this->db->query($q1 . ' UNION ' . $q2);
                return $this->db->get();
            }

            public function ambil_register($where)
            {
                $query = $this->db->get_where('data_kib', $where);
                return $query->row();
            }

            public function ambil_register_form($where)
            {
                return $this->db->from("register_isi")->where($where)->order_by('created_time DESC, created_date DESC')->get();
            }

            public function ambil_status_register_form($where)
            {
                return $this->db->from("register_status")->where($where)->order_by('created_time DESC, created_date DESC')->get();
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


            public function get_pangkat()
            {
                return $this->db->get('pangkat');
            }

            public function get_petugas($nomor_lokasi)
            {
                return $this->db->get_where('petugas_inv',array('nomor_lokasi' => $nomor_lokasi));
            }

            public function save_petugas($data)
            {
                $this->db->insert('petugas_inv', $data);
                $this->db->error(); 
            }
 }
 ?>
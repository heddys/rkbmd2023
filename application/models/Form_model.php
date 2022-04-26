
<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Form_model extends CI_Model{

    public function __construct() {
            parent::__construct();
            // $this->simbada = $this->load->database('simbada', TRUE);
        }    


            public function get_all_register_proses_tolak($lokasi,$kib){

                $query = $this->db->query("SELECT * FROM data_kib where ekstrakomtabel IS NULL and (status = '1' or status = '3') and nomor_lokasi_baru like '".$lokasi."%' and kode108_baru like '%".$kib."%'");

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
                $this->db->like('nomor_lokasi_baru',$lokasi,'after');
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

            public function hitungBanyakRowRegister($where,$data,$kib,$form)
            {
                // $this->db->where(array('register' => '19012142-2019-1140133-1-143-1'));
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

                // $this->db->select('nomor_lokasi,register,kode64_baru,nama_barang,merk_alamat,tipe,harga_baru');
                // $this->db->from('data_kib');
                // $this->db->where($where);
               
                // $this->db->like('nomor_lokasi',$lokasi);
                // $this->db->like('kode108_baru',$kib);
                // $this->db->limit($limit, $offset);
                

            //    return $this->db->get();
                if($form == 2){
                    $no_lokasi=$this->session->userdata('no_lokasi_asli');
                    $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.harga_baru FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi where a.ekstrakomtabel is NULL and a.`status` is null and a.`nomor_lokasi_baru` like '".$no_lokasi."%' and (a.`register` like '%".$data."%' or a.nama_barang like '%".$data."%') limit ".$limit." offset ".$offset."");
                } else {
                    $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.harga_baru FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi where a.ekstrakomtabel is NULL and a.`status` is null and a.`nomor_lokasi_baru` like '%".$data."%' limit ".$limit." offset ".$offset."");
                } 

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
                return $this->db->get_where('kamus_lokasi',array('unit_baru' => $no_lokasi));
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
                return $this->db->get('kamus_lokasi');
            }

            public function get_path($id)
            {
                return $this->db->get_where('jurnal_upload',array('id' => $id));
            }

            public function hapus_image_record($id)
            {
                return $this->db->delete('jurnal_upload',array('id' => $id));
            }
 }
 ?>

<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Form_model extends CI_Model{

    public function __construct() {
            parent::__construct();
            $this->simbada = $this->load->database('simbada', TRUE);
        }    


            public function get_all_register($where,$lokasi){

                $this->db->select('nomor_lokasi,register,kode64_baru,nama_barang,merk_alamat,tipe,harga_baru');
                $this->db->from('data_kib');
                // $this->db->where($where);
                $this->db->where(array('register' => '19012142-2019-1140133-1-143-1'));
                // $this->db->like('nomor_lokasi',$lokasi);
                // $this->db->like('kode64_baru','1.3.02');
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

            public function data_kode_barang()
            {
                return $this->db->get('kamus_barang');
            }

            public function data_satuan()
            {
                return $this->db->get('satuan');
            }

 }
 ?>
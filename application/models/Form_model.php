
<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Form_model extends CI_Model{

    public function __construct() {
            parent::__construct();
            //$this->simbada = $this->load->database('simbada', TRUE);
        }    


            public function get_register($where){

                $this->simbada->select('nomor_lokasi_baru,register,kode64_baru,nama_barang_baru,merk_alamat_baru,tipe_baru,harga_baru');
                $this->simbada->from('kib_awal');
                $this->simbada->where($where);
                $this->simbada->like('nomor_lokasi_baru','13.30.05.01');
                $this->simbada->like('kode64_baru','1.3.01');
                $q1=$this->simbada->get_compiled_select();

                $this->simbada->select('nomor_lokasi_baru,register,kode64_baru,nama_barang_baru,merk_alamat_baru,tipe_baru,harga_baru');
                $this->simbada->from('kib');
                $this->simbada->where($where);
                $this->simbada->like('nomor_lokasi_baru','13.30.05.01');
                $this->simbada->like('kode64_baru','1.3.01');
                $q2=$this->simbada->get_compiled_select();

                $query = $this->simbada->query($q1 . ' UNION ' . $q2);
                return $query;
            }

            public function data_kode_barang()
            {
                return $this->db->get('kamus_barang');
            }

 }
 ?>
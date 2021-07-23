
<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Survey_model extends CI_Model{
 
 
 
     function cek_bmaset(){
             $this->db->select('id,komp_id,komp_name,unit_id,unit_name,rekening_kode,sum(volume) as vol,satuan,sum(nilai_anggaran) as nilai,count(kode_keg) as jumkeg,detail_name');
             $this->db->from('ebudgeting2021');
             $this->db->like('rekening_kode','5.2.3','after');
             $this->db->group_by(array('komp_id','unit_id'));
             return $this->db->get();
             
         }
 
     function cek_persediaan(){
             $this->db->select('id,komp_id,komp_name,unit_id,unit_name,rekening_kode,sum(volume) as vol,satuan,sum(nilai_anggaran) as nilai,count(kode_keg) as jumkeg,detail_name');
             $this->db->from('ebudgeting2021');
             $this->db->like('rekening_kode','5.2.2','after');
             $this->db->group_by(array('komp_id','unit_id'));
             return $this->db->get();
             
         }
 
     function get_tabel_budgeting_rkb(){
             $this->db->select('id,komp_id,komp_name,unit_id,unit_name,rekening_kode,sum(volume) as vol,satuan,sum(nilai_anggaran) as nilai,count(kode_keg) as jumkeg,detail_name');
             $this->db->from('ebudgeting2021');
             $this->db->like('rekening_kode','5.2.3','after');
             $this->db->group_by(array('komp_id','unit_id'));
             return $this->db->get();
         }
 
     function get_tabel_budgeting_rkp(){
             $this->db->select('id,komp_id,komp_name,unit_id,unit_name,rekening_kode,sum(volume) as vol,satuan,sum(nilai_anggaran) as nilai,count(kode_keg) as jumkeg,detail_name');
             $this->db->from('ebudgeting2021');
             $this->db->like('rekening_kode','5.2.2','after');
             $this->db->group_by(array('komp_id','unit_id'));
             return $this->db->get();
         }
 
     function get_rincian_kegiatan_tarik($where){
             $this->db->select('id,unit_id,komp_name,kode_keg,nama_keg,komp_id,ket_koefisien,nilai_anggaran,detail_name,volume,satuan');		
             $this->db->from('ebudgeting2021');
             $this->db->where($where);
             $query = $this->db->get();
             return $query->result();
         }
 
     function getopd($id){
             $where=array('id' => $id);
             $this->db->select('unit_id,komp_id');
             $this->db->from('ebudgeting2021');
             $this->db->where($where);
             $query = $this->db->get();
             return $query->row();
 
     }	
 
 }
 ?>
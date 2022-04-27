<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Admin_model extends CI_Model{	


   public function get_pangkuan($nip)
   {
       $this->db->select('unit');
       $this->db->from('list_penyelia');
       $this->db->where('nip_penyelia',$nip);
       return $this->db->get();
   }

   public function get_proses_reg($list)
   {
       if($list==1) {
        $query = $this->db->query("SELECT
                b.unit,
                a.unit_baru,
                a.nama_barang,
                a.register,
                COUNT( a.register ) as jumlah
            FROM
                `data_kib` a
                INNER JOIN (select * from kamus_lokasi GROUP BY unit_baru) b ON b.unit_baru = a.unit_baru 
            WHERE
                a.`status` = '1'
            GROUP BY
                a.unit_baru");

       } else {
                $query = $this->db->query("SELECT
                b.unit,
                a.unit_baru,
                a.nama_barang,
                a.register,
                COUNT( a.register ) as jumlah
            FROM
                `data_kib` a
                INNER JOIN (select * from kamus_lokasi GROUP BY unit_baru) b ON b.unit_baru = a.unit_baru 
            WHERE
                a.`status` = '1' and a.unit_baru in ('".implode("','",$list)."')
            GROUP BY
                a.unit_baru");
       }
        

        return $query->result();
   }

   public function get_tolak_reg($list)
   {
    
    if($list==1) {
        $query = $this->db->query("SELECT
                b.unit,
                a.unit_baru,
                a.nama_barang,
                a.register,
                COUNT( a.register ) as jumlah
            FROM
                `data_kib` a
                INNER JOIN (select * from kamus_lokasi GROUP BY unit_baru) b ON b.unit_baru = a.unit_baru 
            WHERE
                a.`status` = '3'
            GROUP BY
                a.unit_baru");
    } else {

        $query = $this->db->query("SELECT
                b.unit,
                a.unit_baru,
                a.nama_barang,
                a.register,
                COUNT( a.register ) as jumlah
            FROM
                `data_kib` a
                INNER JOIN (select * from kamus_lokasi GROUP BY unit_baru) b ON b.unit_baru = a.unit_baru 
            WHERE
                a.`status` = '3' and a.unit_baru in ('".implode("','",$list)."')
            GROUP BY
                a.unit_baru");
        }

        return $query->result();
   }

   public function get_data_chart($list)
   {
        if($list==1) {
            $query = $this->db->query("SELECT (select count(register) from data_kib where status ='1') as jumlah_proses, (select count(register) from data_kib where status ='3') as jumlah_tolak, (select count(register) from data_kib where status ='2') as jumlah_terverif, (select count(register) from data_kib where status is null) as jumlah_reg_belum_diisi");
        } else {
                $query = $this->db->query("SELECT (select count(register) from data_kib where unit_baru in ('".implode("','",$list)."') and status ='1') as jumlah_proses, (select count(register) from data_kib where unit_baru in ('".implode("','",$list)."') and status ='3') as jumlah_tolak, (select count(register) from data_kib where unit_baru in ('".implode("','",$list)."') and status ='2') as jumlah_terverif, (select count(register) from data_kib where unit_baru in ('".implode("','",$list)."') and status is null) as jumlah_reg_belum_diisi");
            }

       return $query->row();
   }

   


}

?>
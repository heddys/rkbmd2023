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

    return $query->result();
   }


}

?>
<?php defined('BASEPATH') OR exit ('No direct script access allowed');

class Pagination_model extends CI_Model {

     public function getAll()
     {
          $this->db->select('*');
          $this->db->from('pengguna');
          $this->db->order_by('id', 'ASC');

          return $this->db->get();
     }

     public function getDataPagination($limit, $offset)
     {
          $this->db->select('*');
          $this->db->from('pengguna');
          $this->db->order_by('id', 'ASC');
          $this->db->limit($limit, $offset);

          return $this->db->get();
     }

}
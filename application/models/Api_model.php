<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Api_model extends CI_Model{	

    public function __construct() {
        parent::__construct();
    }



    public function get_list_by_register($register) {
        $this->db->select('register,file_upload,created_date,created_time');
        $this->db->from('jurnal_upload');
        $this->db->where('register', $register);
        $query = $this->db->get();
        return $query->result();
    }


}
?>

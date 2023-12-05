<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Api_rkp_aset extends REST_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->model('Api_model');
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
	// public function index_get($id = 0)
	// {
    //     if(!empty($id)){
    //         $data = $this->db->get_where("items", ['id' => $id])->row_array();
    //     }else{
    //         $data = $this->db->get_where("tabel_usulan_rk", ['status_telaah' => '1'])->result();
    //     }
     
    //     $this->response($data, REST_Controller::HTTP_OK);
	// }

    // public function disetujui_get()
    // {
    //     $unit_id = $this->get('unit_id');
    //     if(!empty($unit_id)){
    //         $data = $this->Api_model->get_rkp_unit($unit_id)->result();
    //     }   else {

    //         $data = $this->Api_model->get_rkp()->result();
    //     }
    
    //     $this->response($data, REST_Controller::HTTP_OK);
    // }

    // public function rkbmd_pemeliharaan_get()
    // {
    //     $unit_id = $this->get('unit_id');
    //     $komp_id = $this->get('komp_id');
    //     $sub_keg = $this->get('sub_keg');

    //     if(!empty($unit_id)){
    //         $data = $this->Api_model->ambil_rk_pemeliharaan($unit_id,$komp_id,$sub_keg)->result();
    //     }   else {

    //         $data = $this->Api_model->get_rkp()->result();
    //     }
    
    //     $this->response($data, REST_Controller::HTTP_OK);
    // }

    // public function rkbmd_pemeliharaan_budgeting_get()
    // {
    //     $unit_id = $this->get('unit_id');
    //     $komp_id = $this->get('komp_id');
    //     $sub_id = $this->get('sub_id');

    //     if(!empty($unit_id)){
    //         $data = $this->Api_model->ambil_rk_pemeliharaan_budgeting($unit_id,$komp_id,$sub_id)->result();
    //     }   else {

    //         $data = $this->Api_model->get_rkp()->result();
    //     }
    
    //     $this->response($data, REST_Controller::HTTP_OK);
    // }
      
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    // public function index_post()
    // {
    //     $input = $this->input->post();
    //     $this->db->insert('items',$input);
     
    //     $this->response(['Item created successfully.'], REST_Controller::HTTP_OK);
    // } 
     
    // /**
    //  * Get All Data from this method.
    //  *
    //  * @return Response
    // */
    // public function index_put($id)
    // {
    //     $input = $this->put();
    //     $this->db->update('items', $input, array('id'=>$id));
     
    //     $this->response(['Item updated successfully.'], REST_Controller::HTTP_OK);
    // }
     
    // /**
    //  * Get All Data from this method.
    //  *
    //  * @return Response
    // */
    // public function index_delete($id)
    // {
    //     $this->db->delete('items', array('id'=>$id));
       
    //     $this->response(['Item deleted successfully.'], REST_Controller::HTTP_OK);
    // }
    	
}
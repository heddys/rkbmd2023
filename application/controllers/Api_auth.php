<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Api_auth extends REST_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
    //    $this->load->model('Api_model');
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
    public function index_post()
    {
          
            $data = $this->input->request_headers();
            // $this->db->insert('items',$input);

            // $data = array ('user' => $usr, 'psswd' => $psswd);

            //Data BODY
            $username =  $this->input->post('username');
            // $password =  $this->input->post('password');

            $cekuser= array(
                'username' => $username
                // 'password' => $password
            );
            
            $this->load->model('auth_model');
            $ceklog=$this->auth_model->ceklogin("pengguna",$cekuser)->num_rows();
            $get=$this->auth_model->ceklogin("pengguna",$cekuser)->row();
                     
            
            if($ceklog > 0) {
                if($get->fungsi == "Pengurus Barang Pembantu UPTD") {
                    $ambil_lokasi_pbp=$this->auth_model->ambil_data_pbp($cekuser['username'])->row();
                    $role=$ambil_lokasi_pbp->nama_lokasi;
                } else {$role=$get->fungsi;}
                        $data_session = array(	
                                'id' => $get->id,
                                'skpd' => $get->nama_opd,
                                'kode_opd' =>$get->opd,
                                'nama_login' =>$get->nama,
                                'data' =>$get->nomor_lokasi,
                                'role' => $get->fungsi,
                                'jabatan' => $get->fungsi." (".$role.")",
                                'kepala_opd' => $get->nama_kepala,
                                'no_lokasi_asli' => $get->nomor_lokasi,
                                'status' => 0,
                                'nip' => $get->nip
                            );
                
                $this->session->set_userdata($data_session);
                // echo $this->session->userdata('no_lokasi_asli');
                // var_dump($data_session);
                if ($this->session->userdata('role')=='Verifikator'){
                    $this->response(redirect('home_verifikator'), REST_Controller::HTTP_OK);
                    // redirect('home_verifikator');
                } elseif ($this->session->userdata('role')=='Penyelia') {
                    $this->response(redirect('home_penyelia'), REST_Controller::HTTP_OK);
                    // redirect('home_penyelia');
                } elseif ($this->session->userdata('role')=='Admin') {
                    $this->response(redirect('home_admin'), REST_Controller::HTTP_OK);
                    // redirect('home_admin');
                } elseif ($this->session->userdata('role')=='Guest') {
                    $this->response(redirect('home_guest'), REST_Controller::HTTP_OK);
                    // redirect('home_guest');
                }
                else {
                    $this->response($this->session->session_id, REST_Controller::HTTP_OK);
                    // redirect('home');
                }
            }
            else {
                // redirect('https://bpkad.surabaya.go.id/sso-bpkad');
                echo "Session Adalah : ".$this->session->userdata('kode_opd');
                // $this->response("Fail To Login", REST_Controller::HTTP_OK);
            }
     
    } 
     
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
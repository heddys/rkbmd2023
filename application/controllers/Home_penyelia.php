<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_penyelia extends CI_Controller {

    public function index()
    {
        $this->cek_sess();

        $data['page']="Dashboard Penyelia";

        $list_pangkuan=$this->get_list_pangkuan();
        
        $data_unit=array();
        foreach ($list_pangkuan as $key) {
            $data_unit[] = $key->unit;
        }
        $data['get_proses_reg']=$this->admin_model->get_proses_reg($data_unit);
        $data['get_tolak_reg']=$this->admin_model->get_tolak_reg($data_unit);
        // var_dump($data['get_proses_reg']);

        $this->load->view('admin/header_penyelia',$data);		
		$this->load->view('admin/home_penyelia');
		$this->load->view('admin/footer_penyelia');	
    }

    private function cek_sess() 
	{
		if($this->session->userdata('id') !=NULL){
			$opd=$this->session->userdata('skpd');
			$this->load->model('admin_model');
			return;
			} else { 
				$par=2;
				redirect('auth/index/'.$par);
			}
	}

    private function get_list_pangkuan()
    {
        $this->cek_sess();
        $nip=$this->session->userdata('nip');
        return $this->admin_model->get_pangkuan($nip)->result();
    }
}
?>
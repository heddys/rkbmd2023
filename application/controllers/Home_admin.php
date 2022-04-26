<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_admin extends CI_Controller {



    public function index()
    {
        $this->cek_sess();

        $data['page']="Dashboard Admin";

        $this->load->view('admin/header_admin',$data);		
		$this->load->view('admin/admin_page');
		$this->load->view('admin/footer_admin');
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

    

    

}
?>

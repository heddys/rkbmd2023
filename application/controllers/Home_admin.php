<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_admin extends CI_Controller {



    public function index()
    {
        $this->cek_sess();

        $data['page']="Dashboard Admin";

		$data['get_data_chart']=$this->admin_model->get_data_chart(1);
		$data['get_proses_reg']=$this->admin_model->get_proses_reg(1);
        $data['get_tolak_reg']=$this->admin_model->get_tolak_reg(1);

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

	public function setting_penyelia()
	{
		$this->cek_sess();

		$data['page']="Setting Penyelia";

		$this->load->view('admin/header_admin',$data);
		$this->load->view('admin/setting_penyelia_page');
		$this->load->view('admin/footer_admin');
	}

    

    

}
?>

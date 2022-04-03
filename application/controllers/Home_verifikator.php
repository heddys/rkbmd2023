<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_verifikator extends CI_Controller {

    public function index()
    {
        $this->cek_sess();
        $data['page']="Dashboard";
		// $data['bmaset']=$this->cek_jumlah_bmaset();
		// $data['bmpersediaan']=$this->cek_jumlah_persediaan();
		$this->load->view('verifikator/h_verifikator',$data);		
		$this->load->view('verifikator/home_verifikator');
		$this->load->view('verifikator/f_verifikator');
    }
    
    
    private function cek_sess() 
	{
		if($this->session->userdata('id') !=NULL){
			$opd=$this->session->userdata('skpd');
			$this->load->model('survey_model');
			return;
			} else { 
				$par=2;
				redirect('auth/index/'.$par);
			}
	}

    public function verif_page()
    {

        $this->load->view('h_verif_page');		
		$this->load->view('verif_page');
		$this->load->view('f_verif_page');	
    }


}

?>
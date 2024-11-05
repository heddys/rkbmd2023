<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_kadis extends CI_Controller {



	public function index() {
			
	}



    public function cek_sess() 
	{
		if($this->session->userdata('role') =="KPB"){
			$opd=$this->session->userdata('skpd');
			$this->load->model('kadis_model');
			return;
			} else { 
				$par=2;
				redirect('auth/index/'.$par);
			}
	}

}
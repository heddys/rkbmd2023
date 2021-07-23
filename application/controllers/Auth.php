<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function index($error=NULL)
	{	
		$data['error']=$error;
		$this->load->view('login',$data);
	}
	public function do_login()
	{
		$user=$this->input->post('usr');
		$pass=$this->input->post('psswd');
			$cekuser= array(
				'user_baru' => $user, 
				'pass_baru' => md5($pass)
			);
		$this->load->model('auth_model');
		$ceklog=$this->auth_model->ceklogin("skpd",$cekuser)->num_rows();
		$get=$this->auth_model->ceklogin("skpd",$cekuser);
		if($ceklog > 0) {
				foreach ($get->result() as $row) {
					$data_session = array(	
						'id' => $row->id,
						'skpd' => $row->skpd,
						'kode_opd' =>$row->kode_binprog		
					);
				}
			$skpdget = $data_session['kode_opd'];
			$this->session->set_userdata($data_session);
			if ($skpdget!='SUR01'){
				redirect('home');
			} else {redirect('home_survey');}
		} 
		  else {
			$this->index($error=1);
		  }
	}

	public function logout ()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}

	public function test(){
		
	}

}
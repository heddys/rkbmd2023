<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function index($error=NULL)
	{	
		$data['error']=$error;
		if($this->session->userdata('kode_opd') !=NULL)
		{
			$skpdget = $this->session->userdata('kode_opd');
			if ($skpdget!='SUR01'){
				echo $skpdget;
				redirect('home');				
			} else {redirect('home_survey');}
		} else 
			{
				$this->load->view('login',$data);
			}
		
	}
	public function do_login()
	{
		$user=$this->input->post('usr');
		$pass=$this->input->post('psswd');
			$cekuser= array(
				'username' => $user, 
				'password' => $pass
			);
		$this->load->model('auth_model');
		$ceklog=$this->auth_model->ceklogin("pengguna",$cekuser)->num_rows();
		$get=$this->auth_model->ceklogin("pengguna",$cekuser);
		if($ceklog > 0) {
				foreach ($get->result() as $row) {
					$data_session = array(	
						'id' => $row->id,
						'skpd' => $row->nama_opd,
						'kode_opd' =>$row->opd,
						'nama_login' =>$row->nama,
						'data' =>$row->nomor_lokasi,
						'role' => $row->fungsi,
						'kepala_opd' => $row->nama_kepala,
						'no_lokasi_asli' => $row->nomor_lokasi,
						'status' => 0,
						'nip' => $row->nip
					);
				}
			
			$this->session->set_userdata($data_session);
			if ($this->session->userdata('role')=='Verifikator'){
				redirect('home_verifikator');
			} elseif ($this->session->userdata('role')=='Penyelia') {
				redirect('home_penyelia');
			} elseif ($this->session->userdata('role')=='Admin') {
				redirect('home_admin');
			} else {
				redirect('home');
			}
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


}
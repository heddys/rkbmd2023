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
		$get=$this->auth_model->ceklogin("pengguna",$cekuser)->row();
		// var_dump($get);
		
		
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
				redirect('home_verifikator');
			} elseif ($this->session->userdata('role')=='Penyelia') {
				redirect('home_penyelia');
			} elseif ($this->session->userdata('role')=='Admin') {
				redirect('home_admin');
			} elseif ($this->session->userdata('role')=='Guest') {
				redirect('home_guest');
			}
			else {
				redirect('home');
			}
		}
		  else {
			$this->index($error=1);
		  }
	}

	public function logged_in($nip)
	{
		// $user=$this->input->post('usr');
		// $pass=$this->input->post('psswd');
		
		$cekuser= array(
				'username' => $nip,
		);
		$this->load->model('auth_model');
		$ceklog=$this->auth_model->ceklogin("pengguna",$cekuser)->num_rows();
		$get=$this->auth_model->ceklogin("pengguna",$cekuser)->row();
		// var_dump($get);
		
		
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
				redirect('home_verifikator');
			} elseif ($this->session->userdata('role')=='Penyelia') {
				redirect('home_penyelia');
			} elseif ($this->session->userdata('role')=='Admin') {
				redirect('home_admin');
			} elseif ($this->session->userdata('role')=='Guest') {
				redirect('home_guest');
			}
			else {
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
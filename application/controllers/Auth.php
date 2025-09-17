<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	// public function index($error=NULL)
	// {	
	// 	$data['error']=$error;
	// 	if($this->session->userdata('kode_opd') !=NULL)
	// 	{
	// 		$skpdget = $this->session->userdata('kode_opd');
	// 		if ($skpdget!='SUR01'){
	// 			echo $skpdget;
	// 			redirect('home');				
	// 		} else {redirect('home_survey');}
	// 	} else 
	// 		{	
	// 			// redirect('https://bpkad.surabaya.go.id/sso-bpkad');
	// 			// echo "Session Adalah : ".$this->session->userdata('kode_opd');
	// 			$this->load->view('login',$data);
	// 		}

	// 	// redirect('home');
		
	// }

	public function index($error=NULL)
	{	
		$data['error']=$error;
		if($this->session->userdata('role') !=NULL)
		{
			if ($this->session->userdata('role')=='Verifikator'){
					redirect('home_verifikator');
					echo "Verif";
				} elseif ($this->session->userdata('role')=='Penyelia') {
					redirect('home_penyelia');
					// echo "Penyelia";
				} elseif ($this->session->userdata('role')=='Admin') {
					redirect('home_admin');
					// var_dump ($this->session->userdata());
					// echo " Token = ".$token;
					// echo "Admin";
				} elseif ($this->session->userdata('role')=='Guest') {
					redirect('home_guest');
					// echo "Guest";
				}
				elseif ($this->session->userdata('role')=='Pengurus Barang') {
					redirect('home');
	
				} elseif ($this->session->userdata('role') == 'Pengurus Barang Pembantu UPTD') {
					redirect('home');
				} else {
					$this->logout();
				}
		} else 
			{	
				// redirect('https://bpkad.surabaya.go.id/sso-bpkad');
				// echo "Session Adalah : ".$this->session->userdata('kode_opd');
				$this->load->view('login',$data);
			}

		// redirect('home');
		
	}

	// public function index()
	// {	

	// 	if(isset($_GET['token'])) {
	// 		$token = $_GET['token'];
	// 		$cek_token = array('token_login' => $token);
	// 		$get_data_user = $this->auth_model->ceklogin("pengguna",$cek_token);

	// 		if($get_data_user->num_rows() > 0) {
				
	// 			$data_user = $get_data_user->row();

	// 			if($data_user->fungsi == "Pengurus Barang Pembantu UPTD") {
	// 				$ambil_lokasi_pbp=$this->auth_model->ambil_data_pbp($cekuser['username'])->row();
	// 				$role=$ambil_lokasi_pbp->nama_lokasi;
	// 			} else {$role=$data_user->fungsi;}
	// 					$data_session = array(	
	// 							'id' => $data_user->id,
	// 							'skpd' => $data_user->nama_opd,
	// 							'kode_opd' =>$data_user->opd,
	// 							'nama_login' =>$data_user->nama,
	// 							'data' =>$data_user->nomor_lokasi,
	// 							'role' => $data_user->fungsi,
	// 							'jabatan' => $data_user->fungsi." (".$role.")",
	// 							'kepala_opd' => $data_user->nama_kepala,
	// 							'no_lokasi_asli' => $data_user->nomor_lokasi,
	// 							'status' => 0,
	// 							'nip' => $data_user->nip
	// 						);
				
	// 			$this->session->set_userdata($data_session);
	// 			// echo $this->session->userdata('no_lokasi_asli');
	// 			// var_dump($data_session);

	// 			// echo $this->session->userdata('role');

	// 			if ($this->session->userdata('role')=='Verifikator'){
	// 				redirect('home_verifikator');
	// 				echo "Verif";
	// 			} elseif ($this->session->userdata('role')=='Penyelia') {
	// 				redirect('home_penyelia');
	// 				// echo "Penyelia";
	// 			} elseif ($this->session->userdata('role')=='Admin') {
	// 				redirect('home_admin');
	// 				// var_dump ($this->session->userdata());
	// 				// echo " Token = ".$token;
	// 				// echo "Admin";
	// 			} elseif ($this->session->userdata('role')=='Guest') {
	// 				redirect('home_guest');
	// 				// echo "Guest";
	// 			}
	// 			else {
	// 				// echo $this->session->userdata('role');
	// 				// echo "Pengurus Barang";
	// 				redirect('home');
	
	// 			}

	// 		} else { 
	// 			// echo " Token = ".$token;
	// 			redirect('https://bpkad.surabaya.go.id/sso-bpkad'); 
	// 		}
	// 	} else { redirect('https://bpkad.surabaya.go.id/sso-bpkad'); } 

	// }

	public function do_login()
	{
		$user=$this->input->post('usr');
		$pass=$this->input->post('psswd');
		$cekuser= array(
			'username' => $user, 
			'password' => $pass
		);
		$this->load->model('auth_model');
		// $ceklog=$this->auth_model->ceklogin("pengguna",$cekuser)->num_rows();
		// $get=$this->auth_model->ceklogin("pengguna",$cekuser)->row();

		$ceklog = $this->auth_model->ceklogin("pengguna",$cekuser);
		// var_dump($get);
		
		
		if($ceklog->num_rows() > 0) {
			$get = $ceklog->row();
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
			} elseif ($this->session->userdata('role') == 'Kepala OPD') {
				redirect('home_kadis');
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
		// var_dump($this->session->userdata());
		$this->session->sess_destroy();
		redirect('Auth');
	}


}
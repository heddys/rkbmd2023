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
				$data['captcha']=$this->add_captcha();
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

	public function add_captcha() {
		$options = array(
			'img_path'=>'./ini_assets/captcha/', #folder captcha yg sudah dibuat tadi
			'img_url'=>base_url().'ini_assets/captcha/', #ini arahnya juga ke folder captcha
			'img_width'=>'100', #lebar image captcha
			'img_height'=>'45', #tinggi image captcha
			'expiration'=>7200, #waktu expired
			'font_path' => FCPATH . 'assets/font/coolvetica.ttf', #load font jika mau ganti fontnya
			'word_length' => '5',
			'pool' => '0123456789', #tipe captcha (angka/huruf, atau kombinasi dari keduanya)
	 
			# atur warna captcha-nya di sini ya.. gunakan kode RGB
			'colors' => array(
					'background' => array(242, 242, 242),
					'border' => array(255, 255, 255),
					'text' => array(0, 0, 0),
					'grid' => array(255, 120, 40))
			   );

		$cap = create_captcha($options);
		
		
		
		// Save captcha word in session for validation
		$this->session->set_userdata('captcha_word', $cap['word']);
		// $data['captcha'] = $this->create_captcha();
		return $cap['image'];
	}

	public function refresh_captcha() {
		$options = array(
			'img_path'=>'./ini_assets/captcha/', #folder captcha yg sudah dibuat tadi
			'img_url'=>base_url().'ini_assets/captcha/', #ini arahnya juga ke folder captcha
			'img_width'=>'90', #lebar image captcha
			'img_height'=>'45', #tinggi image captcha
			'expiration'=>7200, #waktu expired
			'font_path' => FCPATH . 'assets/font/coolvetica.ttf', #load font jika mau ganti fontnya
			'word_length' => '5',
			'pool' => '0123456789', #tipe captcha (angka/huruf, atau kombinasi dari keduanya)
	 
			# atur warna captcha-nya di sini ya.. gunakan kode RGB
			'colors' => array(
					'background' => array(242, 242, 242),
					'border' => array(255, 255, 255),
					'text' => array(0, 0, 0),
					'grid' => array(255, 120, 40))
			   );

		$cap = create_captcha($options);
		
		
		
		// Save captcha word in session for validation
		$this->session->set_userdata('captcha_word', $cap['word']);
		// $data['captcha'] = $this->create_captcha();
		echo $cap['image'];
	}

	public function do_login()
	{
		$user=$this->input->post('usr');
		$pass=$this->input->post('psswd');
		$captcha_input=$this->input->post('captcha');
		$stored_captcha = $this->session->userdata('captcha_word');


		if (!$stored_captcha || $captcha_input != $stored_captcha) {
			$this->index($error=2); // Error 2 for CAPTCHA mismatch
			return;
		}

		$cekuser= array(
			'username' => $user, 
			'password' => $pass
		);
		$this->load->model('auth_model');
		// $ceklog=$this->auth_model->ceklogin("pengguna",$cekuser)->num_rows();
		// $get=$this->auth_model->ceklogin("pengguna",$cekuser)->row();

		$ceklog = $this->auth_model->ceklogin("pengguna",$cekuser);
		// var_dump($get);
		
		if($captcha_input === $stored_captcha) {
			if($ceklog->num_rows() > 0) {
				$get = $ceklog->row();
				if($get->fungsi == "Pengurus Barang Pembantu UPTD") {
					$ambil_lokasi_pbp=$this->auth_model->ambil_data_pbp($cekuser['username'])->row();
					$role=$ambil_lokasi_pbp->nama_lokasi;
				} else {
					$role=$get->fungsi;
				}

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
				
				// Tambahkan debug logging
				file_put_contents('debug_login.txt', "Login Attempt:\nUser: $user\nSuccess: 1\nData Session: " . print_r($data_session, true) . "\n", FILE_APPEND);
				
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
				$this->index($error=1); // Error 1 for Wrong Username/Password
			}
		} else {
			$this->index($error=2);
		}
	}


	public function logout ()
	{
		// var_dump($this->session->userdata());
		$this->session->sess_destroy();
		redirect('Auth');
	}


}
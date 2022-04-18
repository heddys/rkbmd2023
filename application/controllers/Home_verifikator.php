<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_verifikator extends CI_Controller {

    public function index()
    {
        $this->cek_sess();
        $data['page']="Dashboard";
		// $data['bmaset']=$this->cek_jumlah_bmaset();
		// $data['bmpersediaan']=$this->cek_jumlah_persediaan();

		$where_proses = array (
            'ekstrakomtabel' =>  NULL,
			'status' => 1
        );
		$where_terverifikasi = array (
            'ekstrakomtabel' =>  NULL,
			'status' => 2
        );
		$where_tolak = array (
            'ekstrakomtabel' =>  NULL,
			'status' => 3
        );

		$kib="1.3.2";

		$nomor_lokasi=$this->session->userdata('no_lokasi');
		$data['jumlah_proses']=$this->form_model->get_all_register($where_proses,$nomor_lokasi,$kib)->num_rows();
		$data['jumlah_tolak']=$this->form_model->get_all_register($where_tolak,$nomor_lokasi,$kib)->num_rows();
		$data['jumlah_terverifikasi']=$this->form_model->get_all_register($where_terverifikasi,$nomor_lokasi,$kib)->num_rows();

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
		$this->cek_sess();	
		$data['page']="Halaman List Register Proses Verifikasi";
		$where_proses = array (
            'ekstrakomtabel' =>  NULL,
			'status' => 1
        );
		$where_tolak = array (
            'ekstrakomtabel' =>  NULL,
			'status' => 3
        );

		$kib="1.3.2";

		$nomor_lokasi=$this->session->userdata('no_lokasi');
		$data['register']=$this->form_model->get_all_register($where_proses,$nomor_lokasi,$kib);
		$data['tolak']=$this->form_model->get_all_register($where_tolak,$nomor_lokasi,$kib);

        $this->load->view('verifikator/h_verif_page',$data);		
		$this->load->view('verifikator/verif_page');
		$this->load->view('verifikator/f_verif_page');	
    }

	public function approved_page(Type $var = null)
	{
		$this->cek_sess();	
		$data['page']="Halaman List Register Approved";
		$where = array (
            'ekstrakomtabel' =>  NULL,
			'status' => 2
        );

		$kib="1.3.2";

		$nomor_lokasi=$this->session->userdata('no_lokasi');
		$data['register']=$this->form_model->get_all_register($where,$nomor_lokasi,$kib);

        $this->load->view('verifikator/h_verif_page',$data);		
		$this->load->view('verifikator/approved_page');
		$this->load->view('verifikator/f_verif_page');
	}

	public function verif_register()
	{	
		$this->cek_sess();	
		$data['page']="Halaman Verifikasi Detail Register";

		$register = $_POST['register'];
		$where = array ( 'register' => $register );
		$whereis = array ( 'is_register' => $register );
		
		
		$data['data_register'] = $this->form_model->ambil_register_form($where)->row();
		$data['data_is_register'] = $this->form_model->ambil_status_register_form($whereis)->row();
		$data['image'] = $this->form_model->ambil_file($where)->result();

		$this->load->view('verifikator/h_verifikator',$data);		
		$this->load->view('verifikator/detail_form_verif');
		$this->load->view('verifikator/f_verifikator');	
	}

	public function tandai_status_register(){
		
		$register=$_POST['register'];
		$tanda=$_POST['tanda'];
		if($tanda == 1) {
			$penolakan=$_POST['penolakan'];
			date_default_timezone_set("Asia/Jakarta");	
			$updated_date=date("Y-m-d");
			$updated_time=date("H:i:s");

			$data = array (

				'register' => $register,
				'dasar_penolakan' => $penolakan,
				'created_date' => $updated_date,
				'created_time' => $updated_time,
				'status_register' => 1
			);

			$this->form_model->tandai_status_register($register,$tanda);
			$this->form_model->buat_jurnal_tolak($data);
			redirect('home_verifikator/verif_page/');
			
		} else {
			$this->form_model->tandai_status_register($register,$tanda); 
			redirect('home_verifikator/approved_page/');
		}

		
	}



}

?>
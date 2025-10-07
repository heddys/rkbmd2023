<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_verifikator extends CI_Controller {

    public function index()
    {
        $this->cek_sess();
        $data['page']="Dashboard";
		// $data['bmaset']=$this->cek_jumlah_bmaset();
		// $data['bmpersediaan']=$this->cek_jumlah_persediaan();

		// $where_proses = array (
        //     'ekstrakomtabel' => NULL,
		// 	'status_simbada' => NULL,
		// 	'status' => 1
        // );
		// $where_terverifikasi = array (
        //     'ekstrakomtabel' => NULL,
		// 	'status_simbada' => NULL,
		// 	'status' => 2
        // );
		// $where_tolak = array (
        //     'ekstrakomtabel' => NULL,
		// 	'status_simbada' => NULL,
		// 	'status' => 3
        // );

		$kib = '';

		$nomor_lokasi=$this->session->userdata('no_lokasi_asli');
		$data['jumlah_proses']=$this->form_model->get_all_register(1,$nomor_lokasi)->num_rows();
		$data['jumlah_proses_tanah']=$this->form_model->get_all_register(1,$nomor_lokasi,'1.3.1')->num_rows();
		$data['jumlah_proses_pm']=$this->form_model->get_all_register(1,$nomor_lokasi,'1.3.2')->num_rows();
		$data['jumlah_proses_gdb']=$this->form_model->get_all_register(1,$nomor_lokasi,'1.3.3')->num_rows();
		$data['jumlah_proses_jij']=$this->form_model->get_all_register(1,$nomor_lokasi,'1.3.4')->num_rows();
		$data['jumlah_proses_atl']=$this->form_model->get_all_register(1,$nomor_lokasi,'1.3.5')->num_rows();
		$data['jumlah_proses_atb']=$this->form_model->get_all_register(1,$nomor_lokasi,'1.5.3')->num_rows();
		$data['jumlah_tolak']=$this->form_model->get_all_register(3,$nomor_lokasi)->num_rows();
		$data['jumlah_terverifikasi']=$this->form_model->get_all_register(2,$nomor_lokasi)->num_rows();

		$this->load->view('verifikator/h_verifikator',$data);		
		$this->load->view('verifikator/home_verifikator');
		$this->load->view('verifikator/f_verifikator');
    }
    
    
    private function cek_sess() 
	{
		if($this->session->userdata('id') !=NULL){
			$this->load->model('survey_model');
			return;
			} else { 
				redirect('auth');
			}
	}

    public function verif_page($id=0)
    {
			$this->cek_sess();	
			$data['page']="Halaman List Register Proses Verifikasi";


			// $nomor_lokasi=$this->session->userdata('no_lokasi_asli');
			// $data['register']=$this->form_model->get_all_register($where_proses,$nomor_lokasi,"1.3.2");

			$data_cari=$this->session->userdata('data');
			
			
			//Set Session untuk jumlah limit pagination
			if(isset($_POST['limit'])){
				$this->session->set_userdata('limit',$_POST['limit']);
				$limit=$_POST['limit'];
			} 
	
			if($this->session->userdata('limit')){
				$limit=$this->session->userdata('limit');
			} else {$limit=10;}
	
		
			//Session Status 1, Artinya Lagi di Isi Search By Lokasi dan untuk Session Status 2, Artinya Lagi di Isi Search By Register dan Nama
	
			//Kondisi Untuk Fungsi User Pengurus Barang Pembantu
			
				if(isset($_POST['select_lokasi'])){
					$data_cari = $_POST['select_lokasi'];
					$form = 1;
					$this->session->set_userdata('data',$data_cari);
					$this->session->set_userdata('status',1);
				} else {
					if($this->session->userdata('status')==0) {
						$form = 0;
						$data_cari=$this->session->userdata('no_lokasi_asli');
					} elseif($this->session->userdata('status')==1) {
						$form = 1;
						$data_cari=$this->session->userdata('data');
					} else {
						$form = 2;
					}
				}
	
				if(isset($_POST['cariregname'])){
					$data_cari=$_POST['cariregname'];
					$form=2;
					$this->session->set_userdata('data',$data_cari);
					$this->session->set_userdata('status',2);
				}
	
	
				$data['kib_apa']=$id;
				
				if($id=='1') {
					$this->session->set_userdata('kib','1.3.1');
					$kib = $this->session->userdata('kib');
				} 
				elseif ($id=='2') {
					$this->session->set_userdata('kib','1.3.2');
					$kib = $this->session->userdata('kib');
				} elseif ($id=='3') {
					$this->session->set_userdata('kib','1.3.3');
					$kib = $this->session->userdata('kib');
				} elseif ($id=='4') {
					$this->session->set_userdata('kib','1.3.4');
					$kib = $this->session->userdata('kib');
				} elseif ($id=='5') {
					$this->session->set_userdata('kib','1.3.5');
					$kib = $this->session->userdata('kib');
				} else { 
					$this->session->set_userdata('kib','1.5.3');
					$kib = $this->session->userdata('kib');
				} 



				
					//Load Library Pagination
					$this->load->library('pagination');
					$data['offset']=($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
					//Config Pagination
					$config['total_rows'] = $this->form_model->hitungBanyakRowRegister_verifikator($data_cari,$kib,$form)->num_rows();
					$config['per_page'] = $limit;
					$config['base_url'] = site_url('/home_verifikator/verif_page/'.$id);
					$config['num_links'] = 3;
	
					//Pagination Bootstrap Theme
					$config['full_tag_open']='<nav aria-label="Page navigation example"><ul class="pagination justify-content-center">';
					$config['full_tag_close']='</ul></nav>';
	
					$config['first_link'] = 'First';
					$config['first_tag_open'] = '<li class="page-item">';
					$config['first_tag_close'] = '</li>';
	
					$config['last_link'] = 'Last';
					$config['last_tag_open'] = '<li class="page-item">';
					$config['last_tag_close'] = '</li>';
	
					$config['next_link'] = '&raquo';
					$config['next_tag_open'] = '<li class="page-item">';
					$config['next_tag_close'] = '</li>';
	
					$config['prev_link'] = '&laquo';
					$config['prev_tag_open'] = '<li class="page-item">';
					$config['prev_tag_close'] = '</li>';
	
					$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
					$config['cur_tag_close'] = '</a></li>';
	
					$config['num_tag_open'] = '<li class="page-item">';
					$config['num_tag_close'] = '</li>';
	
					$config['attributes'] = array ('class' => 'page-link'); 
					
					
					$this->pagination->initialize($config);
					
				$data['lokasi']=$this->form_model->get_lokasi_per_opd($this->session->userdata('no_lokasi_asli'));
				$data['dummy'] = array ('rows' => $config['total_rows'],'form' => $form,'data' => $data_cari);
				$data['register']=$this->form_model->get_all_register_pagination_verifikator($data_cari,$kib,$config['per_page'],$data['offset'],$form);
			

			$this->load->view('verifikator/h_verif_page',$data);		
			$this->load->view('verifikator/verif_page',$data);
			$this->load->view('verifikator/f_verif_page');	
    }

	public function tolak_page($id)
	{
		$this->cek_sess();	
		$data['page']="Halaman List Register Ditolak";
		

		if($id=='1') {
			$kib = '1.3.1';
		} 
		elseif ($id=='2') {
			$kib = '1.3.2';
		} elseif ($id=='3') {
			$kib = '1.3.3';
		} elseif ($id=='4') {
			$kib = '1.3.4';
		} elseif ($id=='5') {
			$kib = '1.3.5';
		} else { 
			$kib = '1.5.3';
		}

		$data['kib_apa']= $id;

		$nomor_lokasi=$this->session->userdata('no_lokasi_asli');
		$data['tolak']=$this->form_model->get_all_register(3,$nomor_lokasi,$kib);

        $this->load->view('verifikator/h_verif_page',$data);		
		$this->load->view('verifikator/tolak_page');
		$this->load->view('verifikator/f_verif_page');	
	}

	public function approved_page()
	{
		
		$this->cek_sess();	
		$data['page']="Halaman List Register Approved";
		$where = array (
            'ekstrakomtabel' =>  NULL,
			'status' => 2
        );

		$kib="1.3.2";

		$nomor_lokasi=$this->session->userdata('no_lokasi_asli');
		$data['register']=$this->form_model->get_all_register($where,$nomor_lokasi,$kib);
		ini_set('memory_limit', '2048M');

        $this->load->view('verifikator/h_verif_page',$data);		
		$this->load->view('verifikator/approved_page');
		$this->load->view('verifikator/f_verif_page');
	}

	public function verif_register_1()
	{	
		$this->cek_sess();	
		$data['page']="Halaman Verifikasi Detail Register";

		$register = $_POST['register'];
		$data['kib_apa']='1';
		
		// echo $register;
		
		$data['data_register'] = $this->form_model->ambil_register_form($register)->row();
		$data['data_is_register'] = $this->form_model->ambil_status_register_form($register)->row();
		$data['image'] = $this->form_model->ambil_file($register)->result();

		// echo $register;
		// var_dump($data['data_register']);

		$this->load->view('verifikator/h_verifikator',$data);		
		$this->load->view('verifikator/detail_form_verif_tanah',$data);
		$this->load->view('verifikator/f_verifikator');	
	}

	public function verif_register_2()
	{	
		$this->cek_sess();	
		$data['page']="Halaman Verifikasi Detail Register";

		$register = $_POST['register'];
		$data['kib_apa']='2';
		
		// echo $register;
		
		$data['data_register'] = $this->form_model->ambil_register_form($register)->row();
		$data['data_is_register'] = $this->form_model->ambil_status_register_form($register)->row();
		$data['image'] = $this->form_model->ambil_file($register)->result();

		// echo $register;
		// var_dump($data['data_register']);

		$this->load->view('verifikator/h_verifikator',$data);		
		$this->load->view('verifikator/detail_form_verif_pm',$data);
		$this->load->view('verifikator/f_verifikator');	
	}

	public function verif_register_3()
	{	
		$this->cek_sess();	
		$data['page']="Halaman Verifikasi Detail Register";

		$register = $_POST['register'];
		$data['kib_apa']='3';
		
		// echo $register;
		
		$data['data_register'] = $this->form_model->ambil_register_form($register)->row();
		$data['data_is_register'] = $this->form_model->ambil_status_register_form($register)->row();
		$data['image'] = $this->form_model->ambil_file($register)->result();

		// echo $register;
		// var_dump($data['data_register']);

		$this->load->view('verifikator/h_verifikator',$data);		
		$this->load->view('verifikator/detail_form_verif_gdb',$data);
		$this->load->view('verifikator/f_verifikator');	
	}

	public function verif_register_4()
	{	
		$this->cek_sess();	
		$data['page']="Halaman Verifikasi Detail Register Jalan, Irigasi dan Jaringan";

		$register = $_POST['register'];
		$data['kib_apa']='4';
		
		// echo $register;
		
		$data['data_register'] = $this->form_model->ambil_register_form($register)->row();
		$data['data_is_register'] = $this->form_model->ambil_status_register_form($register)->row();
		$data['image'] = $this->form_model->ambil_file($register)->result();

		// echo $register;
		// var_dump($data['data_register']);

		$this->load->view('verifikator/h_verifikator',$data);		
		$this->load->view('verifikator/detail_form_verif_jij',$data);
		$this->load->view('verifikator/f_verifikator');	
	}

	public function verif_register_5()
	{	
		$this->cek_sess();	
		$data['page']="Halaman Verifikasi Detail Register";

		$register = $_POST['register'];
		$data['kib_apa']='5';
		
		// echo $register;
		
		$data['data_register'] = $this->form_model->ambil_register_form($register)->row();
		$data['data_is_register'] = $this->form_model->ambil_status_register_form($register)->row();
		$data['image'] = $this->form_model->ambil_file($register)->result();

		// echo $register;
		// var_dump($data['data_register']);

		$this->load->view('verifikator/h_verifikator',$data);		
		$this->load->view('verifikator/detail_form_verif_atl',$data);
		$this->load->view('verifikator/f_verifikator');	
	}

	public function verif_register_6()
	{	
		$this->cek_sess();	
		$data['page']="Halaman Verifikasi Detail Register";

		$register = $_POST['register'];
		$data['kib_apa']='5';
		
		// echo $register;
		
		$data['data_register'] = $this->form_model->ambil_register_form($register)->row();
		$data['data_is_register'] = $this->form_model->ambil_status_register_form($register)->row();
		$data['image'] = $this->form_model->ambil_file($register)->result();

		// echo $register;
		// var_dump($data['data_register']);

		$this->load->view('verifikator/h_verifikator',$data);		
		$this->load->view('verifikator/detail_form_verif_atb',$data);
		$this->load->view('verifikator/f_verifikator');	
	}

	public function tandai_status_register(){
		
		$register=$_POST['register'];
		$tanda=$_POST['tanda'];
		$kib=$_POST['kib'];
		date_default_timezone_set("Asia/Jakarta");	
		$updated_date=date("Y-m-d");
		$updated_time=date("H:i:s");
		
		if($tanda == 1) {
			$penolakan=$_POST['penolakan'];

			$data = array (

				'register' => $register,
				'dasar_penolakan' => $penolakan,
				'created_date' => $updated_date,
				'created_time' => $updated_time,
				'status_register' => 1
			);

			$data_update = array (

				'update_at_date_verif' => $updated_date,
				'update_at_time_verif' => $updated_time,
				'status' => 3
			);

			ini_set('memory_limit', '2048M');
			$this->form_model->tandai_status_register($register,$data_update);
			$this->form_model->buat_jurnal_tolak($data);
			redirect('home_verifikator/verif_page/'.$kib);
			
		} else {

			$data = array (

				'update_at_date_verif' => $updated_date,
				'update_at_time_verif' => $updated_time,
				'status' => 2
			);

			ini_set('memory_limit', '2048M');
			$this->form_model->tandai_status_register($register,$data); 
			redirect('home_verifikator/verif_page/'.$kib);
		}

		
	}



}

?>
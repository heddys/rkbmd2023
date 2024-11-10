<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_kadis extends CI_Controller {

	public function index() {
		$this->cek_sess();
		$jabatan=$this->session->userdata('role');
		$data['page']="Dashboard";
		$nomor_lokasi=$this->session->userdata('no_lokasi_asli');
		
		// var_dump($nomor_lokasi);
		// die();

		// if($this->session->userdata('no_lokasi_asli') == "13.30.000701") {
		// 	$data['rekap_upt'] = $this->kadis_model->get_rekap_per_uptd($nomor_lokasi);
		// 	$data['only_opd'] = $this->kadis_model->get_data_dinkes_only()->row();
		// }

		// if($this->session->userdata('no_lokasi_asli') == "13.30.000801"){
		// 	$data['rekap_upt'] = $this->kadis_model->get_rekap_per_uptd($nomor_lokasi);
		// 	// $data['only_opd'] = $this->kadis_model->get_data_dinkes_only()->row();
		// }
		$data['lok'] = $nomor_lokasi;
		// $data['rekap']=$this->kadis_model->data_progres_opd($nomor_lokasi)->row();

		$data['total_tanah']=$this->kadis_model->get_kib_per_aset('1.3.01',$nomor_lokasi)->row();
		$data['total_pm']=$this->kadis_model->get_kib_per_aset('1.3.02',$nomor_lokasi)->row();
		$data['total_gdb']=$this->kadis_model->get_kib_per_aset('1.3.03',$nomor_lokasi)->row();
		$data['total_jij']=$this->kadis_model->get_kib_per_aset('1.3.04',$nomor_lokasi)->row();
		$data['total_atl']=$this->kadis_model->get_kib_per_aset('1.3.05',$nomor_lokasi)->row();
		$data['total_atb']=$this->kadis_model->get_kib_per_aset('1.5.03',$nomor_lokasi)->row();
		$data['rekap_tanah']=$this->kadis_model->data_progres_opd_tanah($nomor_lokasi)->row();
		$data['rekap_pm']=$this->kadis_model->data_progres_opd_pm($nomor_lokasi)->row();
		$data['rekap_gdb']=$this->kadis_model->data_progres_opd_gdb($nomor_lokasi)->row();
		$data['rekap_jij']=$this->kadis_model->data_progres_opd_jij($nomor_lokasi)->row();
		$data['rekap_atl']=$this->kadis_model->data_progres_opd_atl($nomor_lokasi)->row();
		$data['rekap_atb']=$this->kadis_model->data_progres_opd_atb($nomor_lokasi)->row();
		$data['sisa_tanah']=$this->kadis_model->get_sisa_per_aset('1.3.01',$nomor_lokasi)->num_rows();
		$data['sisa_pm']=$this->kadis_model->get_sisa_per_aset('1.3.02',$nomor_lokasi)->num_rows();
		$data['sisa_gdb']=$this->kadis_model->get_sisa_per_aset('1.3.03',$nomor_lokasi)->num_rows();
		$data['sisa_jij']=$this->kadis_model->get_sisa_per_aset('1.3.04',$nomor_lokasi)->num_rows();
		$data['sisa_atl']=$this->kadis_model->get_sisa_per_aset('1.3.05',$nomor_lokasi)->num_rows();
		$data['sisa_atb']=$this->kadis_model->get_sisa_per_aset('1.5.03',$nomor_lokasi)->num_rows();

		$this->load->view('kadis/header_kds',$data);		
		$this->load->view('kadis/home_kadis');
		$this->load->view('kadis/footer_kds');	
	}

	public function register_belum_inv($id) {
		$this->cek_sess();
		$data['page']="Form Inventarisasi";
     	$data['exist']=$this->cek_jumlah_exist();
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
				$data_cari=$this->session->userdata('data');
				$form = 2;
			}
		}

		if(isset($_POST['cariregname'])){
			$data_cari=$_POST['cariregname'];
			$form=2;
			$this->session->set_userdata('data',$data_cari);
			$this->session->set_userdata('status',2);
		}


		$where = array (
			'ekstrakomtabel' =>  NULL,
			'status' => NULL,
			'status_simbada' => NULL
		);

		$data['kib_apa']=$id;

		if($id=='1') {
			$this->session->set_userdata('kib','1.3.01');
			$kib = $this->session->userdata('kib');
		} 
		elseif ($id=='2') {
			$this->session->set_userdata('kib','1.3.02');
			$kib = $this->session->userdata('kib');
		} elseif ($id=='3') {
			$this->session->set_userdata('kib','1.3.03');
			$kib = $this->session->userdata('kib');
		} elseif ($id=='4') {
			$this->session->set_userdata('kib','1.3.04');
			$kib = $this->session->userdata('kib');
		} elseif ($id=='5') {
			$this->session->set_userdata('kib','1.3.05');
			$kib = $this->session->userdata('kib');
		} else { 
			$this->session->set_userdata('kib','1.5.03');
			$kib = $this->session->userdata('kib');
		}
		
		//Load Library Pagination
		$this->load->library('pagination');
		$data['offset']=($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		//Config Pagination
		$config['total_rows'] = $this->kadis_model->hitungBanyakRowRegister($data_cari,$kib,$form)->num_rows();
		$config['per_page'] = $limit;
		$config['base_url'] = site_url('/home_kadis/register_belum_inv/'.$id.'/');
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
			
		$data['lokasi']=$this->kadis_model->get_lokasi_per_opd($this->session->userdata('no_lokasi_asli'));
		$data['dummy'] = array ('rows' => $config['total_rows'],'form' => $form, 'data' => $data_cari, 'lokasi_asli' => $this->session->userdata('no_lokasi_asli'), 'status' => $this->session->userdata('status'), 'kib' => $kib);
		$data['register']=$this->kadis_model->get_all_register_pagination($data_cari,$kib,$config['per_page'],$data['offset'],$form);

		$this->load->view('kadis/header_list_reg_belum',$data);		
		$this->load->view('kadis/view_list_reg_belum',$data);
		$this->load->view('kadis/footer_list_reg_belum');
	}



    public function cek_sess() 
	{
		if($this->session->userdata('role') =="Kepala OPD"){
			$opd=$this->session->userdata('skpd');
			$this->load->model('kadis_model');
			return;
			} else { 
				$par=2;
				redirect('auth/index/'.$par);
			}
	}

	public function cek_jumlah_exist(){
		$kode_opd=$this->session->userdata('kode_opd');
		$result=$this->auth_model->cek_exist($kode_opd)->num_rows();
		return $result;
	}

}
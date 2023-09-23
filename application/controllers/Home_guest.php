<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home_guest extends CI_Controller {

    private function cek_sess() 
	{
		if($this->session->userdata('role') =="Guest" ){
			$opd=$this->session->userdata('skpd');
			$this->load->model('guest_model');
			return;
			} else { 
				$par=2;
				redirect('auth/index/'.$par);
			}
	}
    
    public function index()
    {
        $this->cek_sess();

        $data['page']="Dashboard Admin";

		$data['rekap_opd']=$this->guest_model->get_rekap_opd_admin();

        $this->load->view('guest/header_guest',$data);		
		$this->load->view('guest/guest_home_page');
		$this->load->view('guest/footer_guest');
    }

    public function cari_register($id)
	{
		$this->cek_sess();
		$data['page']="Register Searching System";
     	// $data['exist']=$this->cek_jumlah_exist();
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
            $this->session->set_userdata('kib','1.3.6');
            $kib = $this->session->userdata('kib');
        }
        
            //Load Library Pagination
            $this->load->library('pagination');
            $data['offset']=($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            //Config Pagination
            $config['total_rows'] = $this->guest_model->hitungBanyakRowRegister($data_cari,$kib,$form)->num_rows();
            $config['per_page'] = $limit;
            $config['base_url'] = site_url('/home_guest/cari_register/'.$id);
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
            
        $data['lokasi']=$this->guest_model->list_unit();
        // $data['dummy'] = array ('rows' => $config['total_rows'],'form' => $form, 'data' => $data_cari, 'lokasi_asli' => $this->session->userdata('no_lokasi_asli'), 'status' => $this->session->userdata('status'));
        $data['register']=$this->guest_model->get_all_register_pagination($data_cari,$kib,$config['per_page'],$data['offset'],$form);
        

		$this->load->view('guest/header_guest',$data);		
		$this->load->view('guest/list_register_guest',$data);
		$this->load->view('guest/footer_guest');
	}

    public function show_form_inv_user()
	{
		$this->cek_sess();

		$data['page']="Lihat Form Inventarisasi OPD";
		$data['status'] = $_GET['status'];
		$register=$_GET['register'];
		$data['data_register'] = $this->form_model->ambil_register_form($register)->row();
		$data['data_is_register'] = $this->form_model->ambil_status_register_form($register)->row();
		$data['image'] = $this->form_model->ambil_file($register)->result();
		if($data['status']==3) {
			$data['penolakan'] =$this->admin_model->ambil_jurnal_penolakan($data_penolakan=array('register' => $register,'status_register' => 1))->row();
		}

		$this->load->view('guest/header_guest',$data);		
		$this->load->view('guest/detail_register_guest',$data);
		$this->load->view('guest/footer_guest');	

	}

    public function halaman_laporan()
	{
		$this->cek_sess();

		$data['page']="Halaman Cetak Laporan";

		$this->load->view('guest/header_guest',$data);
		$this->load->view('guest/cetak_laporan_guest_page');
		$this->load->view('guest/footer_guest');

	}

    // CONTROLLER LAPORAN - ////////////////////////////////////////////////////////////

    public function laporan_perubahan_kondisi_fisik_barang($kib)
	{
		$this->cek_sess();
		ini_set('memory_limit', '4056M');
        $data['kib']= $kib;
		$data['data_kondisi']=$this->admin_model->get_perubahan_fisik_barang($kib)->result();

		$this->load->view('guest/laporan_guest/cetak_form_kondisi_barang',$data);	
	}

	public function laporan_barang_tidak_ditemukan($kib)
	{
		$this->cek_sess();
		ini_set('memory_limit', '2048M');
        $data['kib']= $kib;
		$data['data_barang']=$this->admin_model->get_data_tidak_ditemukan($kib)->result();

		$this->load->view('guest/laporan_guest/cetak_barang_tidak_ditemukan',$data);
	}

	public function laporan_barang_hilang($kib)
	{
		$this->cek_sess();
		ini_set('memory_limit', '2048M');
        $data['kib']= $kib;
		$data['data_barang']=$this->admin_model->get_data_hilang($kib)->result();

		$this->load->view('guest/laporan_guest/cetak_barang_hilang',$data);
	}

	public function laporan_perubahan_data_barang($kib)
	{
		$this->cek_sess();
		ini_set('memory_limit', '2048M');
        $data['kib']= $kib;
		$data['data_barang']=$this->admin_model->get_perubahan_data_barang($kib)->result();

		$this->load->view('guest/laporan_guest/cetak_perubahan_data_barang',$data);
	}

	public function laporan_belum_dikapt_diketahui_induk($kib)
	{
		$this->cek_sess();
		ini_set('memory_limit', '2048M');
        $data['kib']= $kib;
		$data['data_barang']=$this->admin_model->get_belum_kapt_ada_induk($kib)->result();

		$this->load->view('guest/laporan_guest/cetak_belum_kapt_diketahui',$data);
	}

	public function laporan_belum_dikapt_tidak_diketahui_induk($kib)
	{
		$this->cek_sess();
		// ini_set('memory_limit', '2048M');
        $data['kib']= $kib;
		// $data['data_barang']=$this->admin_model->get_belum_kapt_ada_induk($kib)->result();

		$this->load->view('guest/laporan_guest/cetak_belum_kapt_tidak_diketahui_induk',$data);
	}

	public function laporan_data_tercatat_ganda($kib)
	{
		$this->cek_sess();
		ini_set('memory_limit', '2048M');
        $data['kib']= $kib;
		$data['data_barang']=$this->admin_model->get_data_ganda($kib)->result();

		$this->load->view('guest/laporan_guest/cetak_barang_ganda',$data);
	}

	public function laporan_data_digunakan_pihak_lain($kib)
	{
		$this->cek_sess();
		ini_set('memory_limit', '2048M');
        $data['kib']= $kib;
		// $data['data_barang']=$this->admin_model->get_data_ganda($kib)->result();

		$this->load->view('guest/laporan_guest/cetak_barang_digunakan_instansi_lain',$data);
	}

	public function laporan_data_digunakan_pegawai_pemda($kib)
	{
		$this->cek_sess();
		ini_set('memory_limit', '2048M');
        $data['kib']= $kib;
		$data['data_barang']=$this->admin_model->get_data_dipakai_pegawai($kib)->result();

		$this->load->view('guest/laporan_guest/cetak_barang_digunakan_pegawai',$data);
	}




}

?>
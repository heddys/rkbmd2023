<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_penyelia extends CI_Controller {

    public function index()
    {
        $this->cek_sess();

        $data['page']="Dashboard Penyelia";

        $list_pangkuan=$this->get_list_pangkuan();
        
        $data_unit=array();
        foreach ($list_pangkuan as $key) {
            $data_unit[] = $key->nomor_unit;
        }
        $data['get_proses_reg']=$this->admin_model->get_proses_reg($data_unit);
        $data['get_tolak_reg']=$this->admin_model->get_tolak_reg($data_unit);
        $data['get_data_chart']=$this->admin_model->get_data_chart($data_unit);
        $data['rekap_opd']=$this->admin_model->get_rekap_opd($data_unit);

        // echo $data['get_data_chart']->jumlah_proses; 
        // var_dump($data['rekap_opd']);
        $this->load->view('admin/header_penyelia',$data);		
		$this->load->view('admin/home_penyelia');
		$this->load->view('admin/footer_penyelia');	
    }

    private function cek_sess() 
	{
		if($this->session->userdata('id') !=NULL){
			$opd=$this->session->userdata('skpd');
			$this->load->model('admin_model');
			return;
			} else { 
				$par=2;
				redirect('auth/index/'.$par);
			}
	}

    private function get_list_pangkuan()
    {
        $this->cek_sess();
        $nip=$this->session->userdata('nip');
        return $this->admin_model->get_pangkuan($nip)->result();
    }

    public function get_data_petugas()
    {
        $this->cek_sess();
        $id=$this->input->post('id');

        $result=$this->admin_model->get_row_petugas($id)->row();

        echo json_encode($result);
    }

    public function list_status_register($id)
    {
        $this->cek_sess();
		$data['page']="Form Inventarisasi";
        $list_pangkuan=$this->get_list_pangkuan();
		$data_cari=$this->session->userdata('data');
		$list_unit=array();
		foreach ($list_pangkuan as $key) {
			$list_unit[] = $key->nomor_unit;
		}
        
        if(isset($_POST['select_lokasi'])){
			if($_POST['select_lokasi'] == "semua_opd") {
				$this->session->set_userdata('status',0);
				$form=0;
				$data_cari=array();
				foreach ($list_pangkuan as $key) {
					$data_cari[] = $key->nomor_unit;
				}
				$this->session->set_userdata('data',$data_cari);
			} else {
				$this->session->set_userdata('data',array($_POST['select_lokasi']));
				$data_cari=$this->session->userdata('data');
				$form=0;
				$this->session->set_userdata('status',1);
			}
			
		} else {
			if($this->session->userdata('status')==0) {
				$form=0;
				$data_cari=array();
				foreach ($list_pangkuan as $key) {
					$data_cari[] = $key->nomor_unit;
				}
				$this->session->set_userdata('data',$data_cari);
			} elseif($this->session->userdata('status')==1) {
				$form = 0;
				$data_cari=$this->session->userdata('data');
			} else {
				$form = 2;
			}
			
		}

        $data['kib_apa']=$id;

			if($id=='1') {
				$kib = "1.3.1";
			} 
			elseif ($id=='2') {
				$kib = "1.3.2";
			} elseif ($id=='3') {
				$kib = "1.3.3";
			} elseif ($id=='4') {
				$kib = "1.3.4";
			} elseif ($kib=='5') {
				$kib = "1.3.5";
			} else { 
				$kib = "1.5.3";
			}
		
			//Load Library Pagination
			$this->load->library('pagination');
			$data['offset']=($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
			//Config Pagination
			$config['total_rows'] = $this->admin_model->hitungBanyakRowRegister($data_cari,$kib,$form)->num_rows();
			$config['per_page'] = 10;
			$config['base_url'] = '/rkbmd2023/index.php/home_penyelia/list_status_register/2';
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
			
			$data['lokasi']=$this->admin_model->get_per_opd_penyelia($list_unit);
			$data['dummy'] = array ('rows' => $config['total_rows'],'form' => $form);
			$data['register']=$this->admin_model->get_status_for_penyelia($data_cari,$kib,$config['per_page'],$data['offset']-1,$form);
        
        // foreach ($data['lokasi'] as $key) {
        //     echo $key->unit." - ".$key->unit_baru."<p>";
        // }

        $this->load->view('admin/header_penyelia',$data);		
		$this->load->view('admin/list_status_kib_penyelia',$data);
		$this->load->view('admin/footer_penyelia');		

		// var_dump($this->session->userdata('data'));
		// var_dump($data_cari);

		
    }

    
}
?>
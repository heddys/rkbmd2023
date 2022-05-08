<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_admin extends CI_Controller {



    public function index()
    {
        $this->cek_sess();

        $data['page']="Dashboard Admin";

		$data['get_data_chart']=$this->admin_model->get_data_chart(1);
		$data['get_proses_reg']=$this->admin_model->get_proses_reg(1);
        $data['get_tolak_reg']=$this->admin_model->get_tolak_reg(1);

        $this->load->view('admin/header_admin',$data);		
		$this->load->view('admin/admin_page');
		$this->load->view('admin/footer_admin');
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

	public function setting_penyelia()
	{
		$this->cek_sess();

		$data['page']="Setting Penyelia";
		$data['penyelia']=$this->admin_model->get_user_penyelia()->result();
		$data['opd']=$this->admin_model->get_kamus_penyelia()->result();

		// var_dump($data['penyelia']);

		$this->load->view('admin/header_admin',$data);
		$this->load->view('admin/setting_penyelia_page');
		$this->load->view('admin/footer_admin');
	}

	public function save_opd_penyelia()
	{
		$this->cek_sess();

		$id_kamus=$_POST['id_kamus_penyelia'];
		$data=array(
			'nip_penyelia' => $_POST['nip'],
			'nama_penyelia' => $_POST['nama'],
			'pangkat_penyelia' => $_POST['pangkat'],
			'status' => 1
		);

		$this->admin_model->simpan_status_penyelia($id_kamus,$data);
		
		redirect('home_admin/setting_penyelia');
	}
	public function get_list_opd_penyelia()
	{
		$this->cek_sess();
		$id = $this->input->post('id');
		// $id="197902062009011001";
		$result = $this->admin_model->get_data_opd_penyelia($id)->result();

		// var_dump($result);
		echo json_encode($result);
	}

	public function hapus_opd_pemangku()
	{
		$this->cek_sess();
		$id = $this->input->post('id');
		// $id=17;
		$data = array(

			'nip_penyelia' => NULL,
			'nama_penyelia' => NULL,
			'pangkat_penyelia' => NULL,
			'status' => NULL
		);
		$result = $this->admin_model->hapus_opd_pemangku($id,$data);

		echo json_decode($result);
	}


}
?>

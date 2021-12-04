<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_survey extends CI_Controller {

	
	public function index ()
	{	
		$this->cek_sess();
		$data['page']="Dashboard";
		$data['bmaset']=$this->cek_jumlah_bmaset();
		$data['bmpersediaan']=$this->cek_jumlah_persediaan();
		$this->load->view('survey/header_survey',$data);		
		$this->load->view('survey/home_survey');
		$this->load->view('survey/footer_survey');
		
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

	public function cek_jumlah_bmaset(){
		$result=$this->survey_model->cek_bmaset()->num_rows();
		return $result;
	}

	public function cek_jumlah_persediaan(){
		$result=$this->survey_model->cek_persediaan()->num_rows();
		return $result;
	}

	public function tabel_rkb (){

		$this->cek_sess();
		$data['page']="Tabel Rencana Kebutuhan Barang Modal";

		$data['data_budget']=$this->survey_model->get_tabel_budgeting_rkb();

		$this->load->view('survey/h_tablerkb_survey',$data);
		$this->load->view('survey/tabel_rkb_survey',$data);
		$this->load->view('survey/h_footerrkb_survey');
	}

	public function tabel_rkp (){

		$this->cek_sess();
		$data['page']="Tabel Rencana Kebutuhan Barang Persediaan";

		$data['datarkp']=$this->survey_model->get_tabel_budgeting_rkp();

		$this->load->view('survey/h_tablerkb_survey',$data);
		$this->load->view('survey/tabel_rkp_survey',$data);
		$this->load->view('survey/footerrkp_survey');
	}

	public function show_data_komponen(){
		$this->cek_sess();
		$id = $this->input->post('id');
		$getopd = $this->survey_model->getopd($id);

		$whereis = array (
						  'komp_id' => $getopd->komp_id,
						  'unit_id' => $getopd->unit_id
						);

		$result = $this->survey_model->get_rincian_kegiatan_tarik($whereis);
		echo json_encode($result);
	}

	public function entry_page(){
		$this->cek_sess();

		$data['page']="Input RKBMD";
		$bmsaja= array(
			'kode_rek_lvl1' => '5.2.3'
		);
		$where=array(
			'nama_pb !=' => ''
		);

		$data['get_komponen']=$this->survey_model->get_data_komponen("tabel_kode_komponen",$bmsaja);
		$data['get_opd']=$this->survey_model->get_opd("skpd",$where);


		$this->load->view('survey/h_tablerkb_survey',$data);
		$this->load->view('survey/halaman_input',$data);
		$this->load->view('survey/h_footerrkb_survey');


	}
	
	public function save_usulan_rk(){

		$this->cek_sess();

		$id_opd = $_POST['selectopd'];
		$id_komp = $_POST['selectkomp'];
		$ideal=$_POST['ideal'];
		$eksis=$_POST['eksis'];
		$real=$_POST['gethasil'];
		$keterangan=$_POST['keterangan'];

		$data=array (
			'id' => '',
			'kode_opd' => $id_opd,
			'id_komponen' => $id_komp,
			'keb_ideal' => $ideal,
			'eksisting' => $eksis,
			'keb_real' => $real,
			'keterangan' => $keterangan,
			'hapus' => 0
		);

		$this->survey_model->save_rk($data);
		redirect('home_survey/list_usulan_rk');
	
	}

	public function list_usulan_rk() {
		
		$this->cek_sess();
		$data['page']="List Usulan RKBMD";

		$data['data_usulan'] = $this->survey_model->ambil_list_rk($y=1,$x=0);

		$bmsaja= array(
			'kode_rek_lvl1' => '5.2.3'
		);
		$data['get_komponen']=$this->survey_model->get_data_komponen("tabel_kode_komponen",$bmsaja);

		$this->load->view('survey/h_tablerkb_survey',$data);
		$this->load->view('survey/halaman_list_rk',$data);
		$this->load->view('survey/h_footerrkb_survey');
	
	
	}

	public function get_usulan(){
		$this->cek_sess();
		$id = $this->input->post('id');
		$whereis = array (
				'id' => $id
 		);
		$result = $this->survey_model->ambil_rk($id);
		echo json_encode($result);
		
	}

	public function delete_usul_rk(){
		$this->cek_sess();
		$id = $this->input->post('id');
		$hapus = array (
				'hapus' => 1
 		);
		$result = $this->survey_model->delete_rk($id,$hapus);
		echo json_encode($result);
		
	}

	public function edit_rk()
	{
		$this->cek_sess();
		$data['page']="Halaman Edit Usulan RKBMD";
		$data_id = $this->uri->segment(3);

		$bmsaja= array(
			'kode_rek_lvl1' => '5.2.3'
		);
		$where=array(
			'nama_pb !=' => ''
		);

		$data['get_komponen']=$this->survey_model->get_data_komponen("tabel_kode_komponen",$bmsaja);
		$data['get_opd']=$this->survey_model->get_opd("skpd",$where);
		$data['ambil_rk']=$this->survey_model->ambil_rk($data_id);
		

		$this->load->view('survey/h_tablerkb_survey',$data);
		$this->load->view('survey/halaman_edit',$data);
		$this->load->view('survey/h_footerrkb_survey');
	}

}
?>
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
		// 	$data['rekap_upt'] = $this->form_model->get_rekap_per_uptd($nomor_lokasi);
		// 	$data['only_opd'] = $this->form_model->get_data_dinkes_only()->row();
		// }

		// if($this->session->userdata('no_lokasi_asli') == "13.30.000801"){
		// 	$data['rekap_upt'] = $this->form_model->get_rekap_per_uptd($nomor_lokasi);
		// 	// $data['only_opd'] = $this->form_model->get_data_dinkes_only()->row();
		// }
		$data['lok'] = $nomor_lokasi;
		// $data['rekap']=$this->form_model->data_progres_opd($nomor_lokasi)->row();

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

}
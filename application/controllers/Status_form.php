<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_form extends CI_Controller {

    
    public function index($id)
    {
        $this->cek_sess();
		$data['page']="Form Inventarisasi";
        $data['exist']=$this->cek_jumlah_exist();
		$nomor_lokasi=$this->session->userdata('no_lokasi');

        $data_proses_verif = array (

            'ekstrakomtabel' => NULL,
            'status' => 1
        );

        $data_dicetak = array (

            'ekstrakomtabel' => NULL,
            'status' => 2
        );

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

        $data['register']=$this->form_model->get_all_register($data_proses_verif,$nomor_lokasi,$kib);
        $data['cetak']=$this->form_model->get_all_register($data_dicetak,$nomor_lokasi,$kib);

        $this->load->view('h_tablerkb',$data);		
		$this->load->view('status_page');
		$this->load->view('h_footerrkb');	
    }

    private function cek_sess() 
	{
		if($this->session->userdata('id') !=NULL){
			$opd=$this->session->userdata('skpd');
			$this->load->model('auth_model');
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

    public function cetak_form()
	{

        $data['coba'] = "Heddy Sebastian E P22";
        
       	$this->pdf->load_view('cetak_form_inv',$data);
		$this->pdf->set_paper("legal", "portrait");
		$this->pdf->render();
		// $this->pdf->stream("name-file.pdf");
		$this->pdf->stream("dompdf_out.pdf", array("Attachment" => false));
		
	}

}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_inv extends CI_Controller {

    
    public function index ($id)
	{	
		$this->cek_sess();
		$data['page']="Form Inventarisasi";
        $data['exist']=$this->cek_jumlah_exist();
		$nomor_lokasi=$this->session->userdata('nomor_lokasi');

        $where = array (
            'ekstrakomtabel' =>  NULL
        );

        $data['kib_apa']=$id;

        $data['register']=$this->form_model->get_all_register($where,$nomor_lokasi);
        $this->load->view('h_tablerkb',$data);		
		$this->load->view('form_page');
		$this->load->view('h_footerrkb');		
		
	}

    public function isi_formulir()
    {
        $this->cek_sess();
		$data['page']="Isi Form Inventarisasi";
        $data['exist']=$this->cek_jumlah_exist();
		$data['kode_barang']=$this->form_model->data_kode_barang();
		$data['satuan']=$this->form_model->data_satuan();

		
		$register = $_POST['register'];
		$where = array ( 'register' => $register );
		
		$data['data_register'] = $this->form_model->ambil_register($where);

        $this->load->view('header',$data);		
		$this->load->view('isi_form',$data);
		$this->load->view('footer_isi_form');
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
       	$this->pdf->load_view('cetak_form_inv');
		$this->pdf->set_paper("legal", "portrait");
		$this->pdf->render();
		// $this->pdf->stream("name-file.pdf");
		$this->pdf->stream("dompdf_out.pdf", array("Attachment" => false));
		
	}


}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_inv extends CI_Controller {

    
    public function index ($id)
	{	
		$this->cek_sess();
		$data['page']="Form Inventarisasi";
        $data['exist']=$this->cek_jumlah_exist();

        $where = array (
            'hapus' => '',
            'extrakomtabel_baru' =>  ''
        );
        $data['kib_apa']=$id;

        //$data['register']=$this->form_model->get_register($where);
        $this->load->view('h_tablerkb',$data);		
		$this->load->view('form_page');
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


}
?>
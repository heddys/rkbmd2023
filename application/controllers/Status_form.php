<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_form extends CI_Controller {

    
    public function index($id)
    {
        $this->cek_sess();
		$data['page']="Form Inventarisasi";
        $data['exist']=$this->cek_jumlah_exist();
        if($this->session->userdata('role') == 'Pengurus Barang Pembantu UPTD') {
			$get_lokasi_pbp=$this->form_model->ambil_data_pbp()->result();
			$nomor_lokasi=array();
			foreach ($get_lokasi_pbp as $key) {
				$nomor_lokasi[]=$key->nomor_lokasi;
			} 
        }else {
		    $nomor_lokasi=$this->session->userdata('no_lokasi_asli');
        }
        // $data_proses_verif = array (

        //     'ekstrakomtabel' => NULL,
        //     'status' => 2
        // );

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

        $data['register']=$this->form_model->get_all_register_proses_tolak($nomor_lokasi,$kib);
        $data['cetak']=$this->form_model->get_all_register($data_dicetak,$nomor_lokasi,$kib);

        $this->load->view('h_tablerkb',$data);		
		$this->load->view('status_page');
		$this->load->view('h_footerrkb');	
        // echo $nomor_lokasi."<p>";
        // var_dump($this->form_model->get_all_register_proses_tolak($nomor_lokasi,$kib));
        // echo "<p>";
        // var_dump($this->form_model->get_all_register($data_dicetak,$nomor_lokasi,$kib)->result());
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
        
        $this->cek_sess();
        ini_set('max_execution_time', 2000);
        $nomor_lokasi=$this->session->userdata('no_lokasi_asli');
        $register=$_POST['register'];

        $data['data_register'] = $this->form_model->ambil_register_form($register)->row();
        $data['data_is_register'] = $this->form_model->ambil_status_register_form($register)->row();
        $data['image']=$this->form_model->ambil_file($register)->result();
        $data['data_kib'] = $this->form_model->ambil_register($register);

        $nomor_lokasi_petugas=$data['data_kib']->nomor_lokasi;
        

        $data['pb_verif']=$this->form_model->pb_verif($nomor_lokasi)->result();
        $data['petugas']=$this->form_model->get_petugas($nomor_lokasi_petugas);

        // // var_dump($data['pengguna']);
        // // echo $nomor_lokasi;

       	$this->pdf->load_view('cetak_form_inv',$data);
		$this->pdf->set_paper("legal", "potrait");
		$this->pdf->render();
        ob_end_clean();
		$this->pdf->stream("dompdf_out.pdf", array("Attachment" => false));
		
	}

}
?>
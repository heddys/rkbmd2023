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

       	$this->pdf->load_view('laporan/cetak_form_inv',$data);
		$this->pdf->set_paper("legal", "potrait");
		$this->pdf->render();
        ob_end_clean();
		$this->pdf->stream("Cetak Form Inventarisasi.pdf", array("Attachment" => false));
		
	}

    public function cetak_form_kondisi_barang()
    {
        $this->cek_sess();
        $nomor_lokasi=$this->session->userdata('no_lokasi_asli');
        $get_data_pb=$this->form_model->ambil_data_pb($nomor_lokasi)->row();
		$get_data_register=$this->form_model->get_register_sudah_verf($nomor_lokasi,'1.3.2')->result();
		$data_register=array();
		$data_register_updated=array();
		foreach ($get_data_register as $key) {
			$data_register[]=array(
				'no_lokasi' => $key->nomor_lokasi,
				'register' =>$key->register,
				'opd' => $key->unit,
				'lokasi' => $key->lokasi,
				'kondisi_awal' => $key->kondisi,
				'kode108' => $key->kode108_baru,
				'nama_barang' => $key->nama_barang,
				'merk' => $key->merk_alamat,
				'tipe' => $key->tipe,
				'satuan' => $key->satuan,
				'harga' => $key->harga_baru,
			);
		}

		
		foreach ($data_register as $row) {
			$data_updated=$this->form_model->get_kondisi_update($row['register'])->row();
			$data_register_updated[]=array(
				'no_lokasi' => $row['no_lokasi'],
				'register' =>$row['register'],
				'opd' => $row['opd'],
				'lokasi' => $row['lokasi'],
				'kondisi_awal' => $row['kondisi_awal'],
				'kondisi_baru' => $data_updated->kondisi_barang,
				'kode108' => $row['kode108'],
				'nama_barang' => $row['nama_barang'],
				'merk' => $row['merk'],
				'tipe' => $row['tipe'],
				'satuan' => $row['satuan'],
				'harga' => $row['harga'],
				'keterangan' => $data_updated->keterangan
			);
		}

        $data['data_kondisi']=$data_register_updated;
        $data['data_pb']=$get_data_pb;

		// ini_set('memory_limit','0');
        // $this->pdf->load_view('laporan/cetak_form_kondisi_barang',$data);
		// $this->pdf->set_paper("legal", "landscape");
		// $this->pdf->render();
        // ob_end_clean();
		// $this->pdf->stream("Cetak Form Kondisi Barang.pdf", array("Attachment" => false));
		$this->load->view('laporan/cetak_form_kondisi_barang',$data);		
    }



}
?>
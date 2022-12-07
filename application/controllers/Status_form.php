<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_form extends CI_Controller {

    
    // public function index($id)
    // {
    //     $this->cek_sess();
	// 	$data['page']="Form Inventarisasi";
    //     if($this->session->userdata('role') == 'Pengurus Barang Pembantu UPTD') {
	// 		$get_lokasi_pbp=$this->form_model->ambil_data_pbp()->result();
	// 		$nomor_lokasi=array();
	// 		foreach ($get_lokasi_pbp as $key) {
	// 			$nomor_lokasi[]=$key->nomor_lokasi;
	// 		} 
    //     }else {
	// 	    $nomor_lokasi=$this->session->userdata('no_lokasi_asli');
    //     }
    //     // $data_proses_verif = array (

    //     //     'ekstrakomtabel' => NULL,
    //     //     'status' => 2
    //     // );
		

    //     $data_dicetak = array (

    //         'ekstrakomtabel' => NULL,
    //         'status' => 2
    //     );

    //     $data['kib_apa']=$id;

    //     if($id=='1') {
    //         $kib = "1.3.1";
    //     } 
    //     elseif ($id=='2') {
    //         $kib = "1.3.2";
    //     } elseif ($id=='3') {
    //         $kib = "1.3.3";
    //     } elseif ($id=='4') {
    //         $kib = "1.3.4";
    //     } elseif ($id=='5') {
    //         $kib = "1.3.5";
    //     } else { 
    //         $kib = "1.5.3";
    //     }

    //     $data['register']=$this->form_model->get_all_register_proses_tolak($nomor_lokasi,$kib);
    //     $data['cetak']=$this->form_model->get_all_register($data_dicetak,$nomor_lokasi,$kib);

    //  $this->load->view('h_tablerkb',$data);		
	// 	$this->load->view('status_page_tolak');
	// 	$this->load->view('h_footerrkb');	
    //     // echo $nomor_lokasi."<p>";
    //     // var_dump($this->form_model->get_all_register_proses_tolak($nomor_lokasi,$kib));
    //     // echo "<p>";
    //     // var_dump($this->form_model->get_all_register($data_dicetak,$nomor_lokasi,$kib)->result());
    // }

	public function index($id)
	{
		$this->cek_sess();
		$data['page']="List Status Register Proses Verifikasi / Di Tolak";
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
				} elseif ($id=='5') {
					$kib = "1.3.5";
				} else { 
					$kib = "1.5.3";
				} 
        if($this->session->userdata('role') == 'Pengurus Barang Pembantu UPTD') {
			$get_lokasi_pbp=$this->form_model->ambil_data_pbp()->result();
			$nomor_lokasi=array();
			foreach ($get_lokasi_pbp as $key) {
				$nomor_lokasi[]=$key->nomor_lokasi;
			} 
        }else {
		    $nomor_lokasi=$this->session->userdata('no_lokasi_asli');
        }

		//Set Session untuk jumlah limit pagination
		if(isset($_POST['limit'])){
			$this->session->set_userdata('limit',$_POST['limit']);
			$limit=$_POST['limit'];
		} 

		if($this->session->userdata('limit')){	
			$limit=$this->session->userdata('limit');
		} else {$limit=10;}

		//Kondisi Untuk Fungsi User Pengurus Barang Pembantu
		if($this->session->userdata('role') == 'Pengurus Barang Pembantu UPTD') {
			$get_lokasi_pbp=$this->form_model->ambil_data_pbp()->result();
			$nomor_lokasi=array();
			foreach ($get_lokasi_pbp as $key) {
				$nomor_lokasi[]=$key->nomor_lokasi;
			}
				
			$data['register']=$this->form_model->get_tolak_register_pagination_Pbp($kib,$nomor_lokasi);
		
			
		// Kondisi Untuk Fungsi User Bukan Pengurus Barang Pembantu.	
		} else {
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
					$data_cari=$this->session->userdata('no_lokasi_asli');
					$form = 0;
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
				'status' => NULL
			);

			
				//Load Library Pagination
				$this->load->library('pagination');
				$data['offset']=($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
				//Config Pagination
				$config['total_rows'] = $this->form_model->hitungBanyakRowRegister_tolak_proses($where,$data_cari,$kib,$form)->num_rows();
				$config['per_page'] = $limit;
				$config['base_url'] = site_url('/status_form/index/2/');
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
				
				$data['lokasi']=$this->form_model->get_lokasi_per_opd($this->session->userdata('no_lokasi_asli'));
				// $data['dummy'] = array ('rows' => $config['total_rows'],'form' => $form, 'data' => $data_cari, 'lokasi_asli' => $this->session->userdata('no_lokasi_asli'), 'offset' => $data['offset'], 'status' => $this->session->userdata('status'));
				$data['register']=$this->form_model->get_tolak_register_pagination($data_cari,$kib,$config['per_page'],$data['offset'],$form);

				
			}
			
		   $this->load->view('h_tablerkb',$data);		
		   $this->load->view('status_page_tolak');
		   $this->load->view('h_footerrkb');
		}

	public function verif_page($id)
	{
		
		$this->cek_sess();
		$data['page']="List Status Register Yang Terverifikasi";
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
				} elseif ($id=='5') {
					$kib = "1.3.5";
				} else { 
					$kib = "1.5.3";
				} 
        if($this->session->userdata('role') == 'Pengurus Barang Pembantu UPTD') {
			$get_lokasi_pbp=$this->form_model->ambil_data_pbp()->result();
			$nomor_lokasi=array();
			foreach ($get_lokasi_pbp as $key) {
				$nomor_lokasi[]=$key->nomor_lokasi;
			} 
        }else {
		    $nomor_lokasi=$this->session->userdata('no_lokasi_asli');
        }

		//Set Session untuk jumlah limit pagination
		if(isset($_POST['limit'])){
			$this->session->set_userdata('limit',$_POST['limit']);
			$limit=$_POST['limit'];
		} 

		if($this->session->userdata('limit')){	
			$limit=$this->session->userdata('limit');
		} else {$limit=10;}

		//Kondisi Untuk Fungsi User Pengurus Barang Pembantu
		if($this->session->userdata('role') == 'Pengurus Barang Pembantu UPTD') {
			$get_lokasi_pbp=$this->form_model->ambil_data_pbp()->result();
			$nomor_lokasi=array();
			foreach ($get_lokasi_pbp as $key) {
				$nomor_lokasi[]=$key->nomor_lokasi;
			}
				
			$data['register']=$this->form_model->get_verif_register_pagination_Pbp($kib,$nomor_lokasi);
		
			
		// Kondisi Untuk Fungsi User Bukan Pengurus Barang Pembantu.	
		} else {
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
					$data_cari=$this->session->userdata('no_lokasi_asli');
					$form = 0;
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
				'status' => NULL
			);

			
				//Load Library Pagination
				$this->load->library('pagination');
				$data['offset']=($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
				//Config Pagination
				$config['total_rows'] = $this->form_model->hitungBanyakRowRegister_sudahdiverif($where,$data_cari,$kib,$form)->num_rows();
				$config['per_page'] = $limit;
				$config['base_url'] = site_url('/status_form/verif_page/2/');
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
				
			$data['lokasi']=$this->form_model->get_lokasi_per_opd($this->session->userdata('no_lokasi_asli'));
			$data['dummy'] = array ('rows' => $config['total_rows'],'form' => $form, 'data' => $data_cari, 'lokasi_asli' => $this->session->userdata('no_lokasi_asli'), 'offset' => $data['offset'], 'status' => $this->session->userdata('status'));
			$data['register']=$this->form_model->get_verif_register_pagination($data_cari,$kib,$config['per_page'],$data['offset'],$form);
        
		}

		$this->load->view('h_tablerkb',$data);		
		$this->load->view('status_page_verif');
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

	public function halaman_cetak_laporan()
	{
		$this->cek_sess();
		$data['page']="List Cetak Laporan";

		$this->load->view('header',$data);		
		$this->load->view('halaman_cetak_laporan_user');
		$this->load->view('footer');	
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
		ini_set('memory_limit', '2048M');
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
			if($row['kondisi_awal'] != $data_updated->kondisi_barang) {
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

	public function cetak_barang_tidak_ditemukan()
    {
        $this->cek_sess();
        $nomor_lokasi=$this->session->userdata('no_lokasi_asli');
        $get_data_pb=$this->form_model->ambil_data_pb($nomor_lokasi)->row();
		$get_data_register=$this->form_model->get_register_sudah_verf($nomor_lokasi,'1.3.2')->result();
		ini_set('memory_limit', '2048M');
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
			$data_updated=$this->form_model->get_keberadaan_barang_update($row['register'])->row();
			if($data_updated->keberadaan_barang == "Tidak Diketemukan"){
				$data_register_updated[]=array(
					'no_lokasi' => $row['no_lokasi'],
					'register' =>$row['register'],
					'opd' => $row['opd'],
					'lokasi' => $row['lokasi'],
					'kondisi_awal' => $row['kondisi_awal'],
					'kode108' => $row['kode108'],
					'nama_barang' => $row['nama_barang'],
					'merk' => $row['merk'],
					'tipe' => $row['tipe'],
					'satuan' => $row['satuan'],
					'harga' => $row['harga'],
					'keterangan' => $data_updated->keterangan
				);
			}
		}

        $data['data_kondisi']=$data_register_updated;
        $data['data_pb']=$get_data_pb;

		// ini_set('memory_limit','0');
        // $this->pdf->load_view('laporan/cetak_form_kondisi_barang',$data);
		// $this->pdf->set_paper("legal", "landscape");
		// $this->pdf->render();
        // ob_end_clean();
		// $this->pdf->stream("Cetak Form Kondisi Barang.pdf", array("Attachment" => false));
		$this->load->view('laporan/cetak_barang_tidak_diketemukan',$data);		
    }


	public function cetak_perubahan_data_barang()
    {
        $this->cek_sess();
        $nomor_lokasi=$this->session->userdata('no_lokasi_asli');
        $get_data_pb=$this->form_model->ambil_data_pb($nomor_lokasi)->row();
		
		$data['data_register']=$this->form_model->get_perubahan_data_verif($nomor_lokasi,'1.3.2')->result();
		

		// 
        // $this->pdf->load_view('laporan/cetak_form_kondisi_barang',$data);
		// $this->pdf->set_paper("legal", "landscape");
		// $this->pdf->render();
        // ob_end_clean();
		// $this->pdf->stream("Cetak Form Kondisi Barang.pdf", array("Attachment" => false));
		$data['data_pb']=$get_data_pb;
		$this->load->view('laporan/cetak_perubahan_data_barang',$data);		
    }

	public function laporan_barang_hilang()
	{
		$this->cek_sess();
		ini_set('memory_limit', '2048M');
		$nomor_lokasi=$this->session->userdata('no_lokasi_asli');
		$data['data_pb']=$this->form_model->ambil_data_pb($nomor_lokasi)->row();
		$data['data_barang']=$this->form_model->get_data_hilang('1.3.2',$nomor_lokasi)->result();

		$this->load->view('laporan/cetak_barang_hilang',$data);
	}

	public function laporan_belum_dikapt_diketahui_induk()
	{
		$this->cek_sess();
		ini_set('memory_limit', '2048M');
		$nomor_lokasi=$this->session->userdata('no_lokasi_asli');
		$data['data_pb']=$this->form_model->ambil_data_pb($nomor_lokasi)->row();
		$data['data_barang']=$this->form_model->get_belum_kapt_ada_induk('1.3.2',$nomor_lokasi)->result();

		$this->load->view('laporan/cetak_belum_kapt_diketahui',$data);
	}

	public function laporan_belum_dikapt_tidak_diketahui_induk()
	{
		$this->cek_sess();
		$nomor_lokasi=$this->session->userdata('no_lokasi_asli');
		$data['data_pb']=$this->form_model->ambil_data_pb($nomor_lokasi)->row();
		// ini_set('memory_limit', '2048M');
		// $data['data_barang']=$this->admin_model->get_belum_kapt_ada_induk('1.3.2')->result();

		$this->load->view('laporan/cetak_belum_kapt_tidak_diketahui_induk',$data);
	}

	public function laporan_data_tercatat_ganda()
	{
		$this->cek_sess();
		ini_set('memory_limit', '2048M');
		$nomor_lokasi=$this->session->userdata('no_lokasi_asli');
		$data['data_pb']=$this->form_model->ambil_data_pb($nomor_lokasi)->row();
		$data['data_barang']=$this->form_model->get_data_ganda('1.3.2',$nomor_lokasi)->result();

		$this->load->view('laporan/cetak_barang_ganda',$data);
	}

	public function laporan_data_digunakan_pihak_lain()
	{
		$this->cek_sess();
		ini_set('memory_limit', '2048M');
		$nomor_lokasi=$this->session->userdata('no_lokasi_asli');
		$data['data_pb']=$this->form_model->ambil_data_pb($nomor_lokasi)->row();
		// $data['data_barang']=$this->admin_model->get_data_ganda('1.3.2')->result();

		$this->load->view('laporan/cetak_barang_digunakan_instansi_lain',$data);
	}

	public function laporan_data_digunakan_pegawai_pemda()
	{
		$this->cek_sess();
		ini_set('memory_limit', '2048M');
		$nomor_lokasi=$this->session->userdata('no_lokasi_asli');
		$data['data_pb']=$this->form_model->ambil_data_pb($nomor_lokasi)->row();
		$data['data_barang']=$this->form_model->get_data_dipakai_pegawai('1.3.2',$nomor_lokasi)->result();

		$this->load->view('laporan/cetak_barang_digunakan_pegawai',$data);
	}







}
?>
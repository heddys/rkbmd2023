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
		// 	$data['rekap_upt'] = $this->kadis_model->get_rekap_per_uptd($nomor_lokasi);
		// 	$data['only_opd'] = $this->kadis_model->get_data_dinkes_only()->row();
		// }

		// if($this->session->userdata('no_lokasi_asli') == "13.30.000801"){
		// 	$data['rekap_upt'] = $this->kadis_model->get_rekap_per_uptd($nomor_lokasi);
		// 	// $data['only_opd'] = $this->kadis_model->get_data_dinkes_only()->row();
		// }
		$data['lok'] = $nomor_lokasi;
		// $data['rekap']=$this->kadis_model->data_progres_opd($nomor_lokasi)->row();

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

	public function register_belum_inv($id) {
		$this->cek_sess();
		$data['page']="Form Inventarisasi";
     	$data['exist']=$this->cek_jumlah_exist();
		$data_cari=$this->session->userdata('data');
		
		
		//Set Session untuk jumlah limit pagination
		if(isset($_POST['limit'])){
			$this->session->set_userdata('limit',$_POST['limit']);
			$limit=$_POST['limit'];
		} 

		if($this->session->userdata('limit')){
			$limit=$this->session->userdata('limit');
		} else {$limit=10;}



		//Session Status 1, Artinya Lagi di Isi Search By Lokasi dan untuk Session Status 2, Artinya Lagi di Isi Search By Register dan Nama

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
				$data_cari=$this->session->userdata('data');
				$form = 2;
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
			'status' => NULL,
			'status_simbada' => NULL
		);

		$data['kib_apa']=$id;

		if($id=='1') {
			$this->session->set_userdata('kib','1.3.01');
			$kib = $this->session->userdata('kib');
		} 
		elseif ($id=='2') {
			$this->session->set_userdata('kib','1.3.02');
			$kib = $this->session->userdata('kib');
		} elseif ($id=='3') {
			$this->session->set_userdata('kib','1.3.03');
			$kib = $this->session->userdata('kib');
		} elseif ($id=='4') {
			$this->session->set_userdata('kib','1.3.04');
			$kib = $this->session->userdata('kib');
		} elseif ($id=='5') {
			$this->session->set_userdata('kib','1.3.05');
			$kib = $this->session->userdata('kib');
		} else { 
			$this->session->set_userdata('kib','1.5.03');
			$kib = $this->session->userdata('kib');
		}
		
		//Load Library Pagination
		$this->load->library('pagination');
		$data['offset']=($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		//Config Pagination
		$config['total_rows'] = $this->kadis_model->hitungBanyakRowRegister($data_cari,$kib,$form)->num_rows();
		$config['per_page'] = $limit;
		$config['base_url'] = site_url('/home_kadis/register_belum_inv/'.$id.'/');
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
			
		$data['lokasi']=$this->kadis_model->get_lokasi_per_opd($this->session->userdata('no_lokasi_asli'));
		$data['dummy'] = array ('rows' => $config['total_rows'],'form' => $form, 'data' => $data_cari, 'lokasi_asli' => $this->session->userdata('no_lokasi_asli'), 'status' => $this->session->userdata('status'), 'kib' => $kib);
		$data['register']=$this->kadis_model->get_all_register_pagination($data_cari,$kib,$config['per_page'],$data['offset'],$form);

		$this->load->view('kadis/header_list_reg_belum',$data);		
		$this->load->view('kadis/view_list_reg_belum',$data);
		$this->load->view('kadis/footer_list_reg_belum');
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

	public function save_verif(){
		$this->cek_sess();
		
		$nip = $_POST['nip'];
		$nama = $_POST['nama'];
		$kode_lhi = $_POST['jenis_lhi'];
		$kib = $_POST['kib'];
		$tanggal_verif = $_POST['tanggal'];

		date_default_timezone_set("Asia/Jakarta");	
		$updated_date=date("Y-m-d");

		echo $this->session->userdate('')

	}

	public function cek_jumlah_exist(){
		$kode_opd=$this->session->userdata('kode_opd');
		$result=$this->auth_model->cek_exist($kode_opd)->num_rows();
		return $result;
	}

	public function isi_formulir_1()
    {
        $this->cek_sess();
		$data['page']="Isi Form Inventarisasi";
		$data['kode_barang']=$this->form_model->data_kode_barang();
		$data['satuan']=$this->form_model->data_satuan();
		$data['kamus_lokasi']=$this->form_model->data_kamus_lokasi();

		
		$register = $_POST['register'];
		
		$data['data_register'] = $this->form_model->ambil_register($register);
		$data['list_kelurahan']=$this->form_model->kamus_kelurahan();
		$sk_penggunaan=$this->form_model->get_sk_penggunaan($register);

		if($sk_penggunaan->num_rows() > 0) {
			$data['sk_penggunaan']=$sk_penggunaan->row();
		} else {
			$data['sk_penggunaan']="NULL";
		}
		
		$this->load->view('kadis/header_kds',$data);		
		$this->load->view('kadis/isi_form_tanah',$data);
		$this->load->view('kadis/footer_isi_form_tanah');

	}

	public function isi_formulir_2()
    {
        $this->cek_sess();
		$data['page']="Isi Form Inventarisasi";
		$data['kode_barang']=$this->form_model->data_kode_barang();
		$data['satuan']=$this->form_model->data_satuan();
		$data['kamus_lokasi']=$this->form_model->data_kamus_lokasi();

		
		$register = $_POST['register'];
		
		$data['data_register'] = $this->form_model->ambil_register($register);
		$data['list_kelurahan']=$this->form_model->kamus_kelurahan();
		
		$this->load->view('kadis/header_kds',$data);	
		$this->load->view('kadis/isi_form_pm',$data);
		$this->load->view('kadis/footer_isi_form_pm');

	}

	public function isi_formulir_3()
    {
        $this->cek_sess();
		$data['page']="Isi Form Inventarisasi";
		$data['kode_barang']=$this->form_model->data_kode_barang();
		$data['satuan']=$this->form_model->data_satuan();
		$data['kamus_lokasi']=$this->form_model->data_kamus_lokasi();

		
		$register = $_POST['register'];
		
		$data['data_register'] = $this->form_model->ambil_register($register);
		$data['list_kelurahan']=$this->form_model->kamus_kelurahan();
		$sk_penggunaan=$this->form_model->get_sk_penggunaan($register);

		if($sk_penggunaan->num_rows() > 0) {
			$data['sk_penggunaan']=$sk_penggunaan->row();
		} else {
			$data['sk_penggunaan']="NULL";
		}
		
		$this->load->view('kadis/header_kds',$data);	
		$this->load->view('kadis/isi_form_gdb',$data);
		$this->load->view('kadis/footer_isi_form_gdb');

	}

	public function isi_formulir_4()
    {
        $this->cek_sess();
		$data['page']="Isi Form Inventarisasi";
		$data['kode_barang']=$this->form_model->data_kode_barang();
		$data['satuan']=$this->form_model->data_satuan();
		$data['kamus_lokasi']=$this->form_model->data_kamus_lokasi();

		
		$register = $_POST['register'];
		
		$data['data_register'] = $this->form_model->ambil_register($register);
		$data['list_kelurahan']=$this->form_model->kamus_kelurahan();
		$sk_penggunaan=$this->form_model->get_sk_penggunaan($register);

		if($sk_penggunaan->num_rows() > 0) {
			$data['sk_penggunaan']=$sk_penggunaan->row();
		} else {
			$data['sk_penggunaan']="NULL";
		}
		
		$this->load->view('kadis/header_kds',$data);	
		$this->load->view('kadis/isi_form_jij',$data);
		$this->load->view('kadis/footer_isi_form_jij');

	}
		
	public function isi_formulir_5()
    {
        $this->cek_sess();
		$data['page']="Isi Form Inventarisasi";
		$data['kode_barang']=$this->form_model->data_kode_barang();
		$data['satuan']=$this->form_model->data_satuan();
		$data['kamus_lokasi']=$this->form_model->data_kamus_lokasi();

		
		$register = $_POST['register'];
		
		$data['data_register'] = $this->form_model->ambil_register($register);
		$data['list_kelurahan']=$this->form_model->kamus_kelurahan();
		
		$this->load->view('kadis/header_kds',$data);	
		$this->load->view('kadis/isi_form_atl',$data);
		$this->load->view('kadis/footer_isi_form_atl');

	}		

		
	public function isi_formulir_6()
    {
        $this->cek_sess();
		$data['page']="Isi Form Inventarisasi";
		$data['kode_barang']=$this->form_model->data_kode_barang();
		$data['satuan']=$this->form_model->data_satuan();
		$data['kamus_lokasi']=$this->form_model->data_kamus_lokasi();

		
		$register = $_POST['register'];
		
		$data['data_register'] = $this->form_model->ambil_register($register);
		$data['list_kelurahan']=$this->form_model->kamus_kelurahan();
		

		$this->load->view('kadis/header_kds',$data);	
		$this->load->view('kadis/isi_form_atb',$data);
		$this->load->view('kadis/footer_isi_form_atb');

    }

	public function halaman_cetak_laporan()
	{
		$this->cek_sess();
		$data['page']="List Cetak Laporan";

		$this->load->view('kadis/header_kds',$data);		
		$this->load->view('kadis/laporan_kadis/halaman_cetak_laporan_kadis');
		$this->load->view('kadis/footer_kds');	
	}

	public function cetak_form_kondisi_barang($kib)
    {
        $this->cek_sess();
        $nomor_lokasi=$this->session->userdata('no_lokasi_asli');
        $get_data_pb=$this->kadis_model->ambil_data_pb($nomor_lokasi)->row();
		$get_data_register=$this->kadis_model->get_register_sudah_verf($nomor_lokasi,$kib)->result();
		ini_set('memory_limit', '2048M');
		$data_register=array();
		$data_register_updated=array();
		foreach ($get_data_register as $key) {
			$data_register[]=array(
				'no_lokasi' => $key->nomor_lokasi_baru,
				'register' =>$key->register,
				'opd' => $key->unit,
				'lokasi' => $key->lokasi,
				'kondisi_awal' => $key->kondisi,
				'kode108' => $key->kode108_baru,
				'nama_barang' => $key->nama_barang_baru,
				'merk' => $key->merk_alamat_baru,
				'tipe' => $key->tipe_baru,
				'satuan' => $key->satuan,
				'harga' => $key->harga_baru,
			);
		}
		
		foreach ($data_register as $row) {
			// echo $row['register']."<br>";
			$data_inv=$this->kadis_model->get_kondisi_update($row['register']);

			if($data_inv->num_rows() > 0){
				$data_updated = $data_inv->row();
				if($row['kondisi_awal'] != $data_updated->kondisi_barang) {
					$data_register_updated[]=array(
						'no_lokasi' => $row['no_lokasi'],
						'register' =>$row['register'],
						'opd' => $row['opd'],
						'lokasi' => $row['lokasi'],
						'kondisi_awal' => $row['kondisi_awal'],
						'kondisi_baru' => $data_updated['kondisi_barang'],
						'kode108' => $row['kode108'],
						'nama_barang' => $row['nama_barang'],
						'merk' => $row['merk'],
						'tipe' => $row['tipe'],
						'satuan' => $row['satuan'],
						'harga' => $row['harga'],
						'keterangan' => $data_updated['keterangan']
					);
				}
			}
		
		}
		// echo '<pre style="background: #DEDEDE; color: #484848;">'; var_dump( $data_register_updated ); echo '</pre>';
		// die();
		
		$cek_verif = $this->kadis_model->info_verif($get_data_pb->nip_kepala);

		if ($cek_verif->num_rows() <= 0) {
			$data['data_spesimen'] = 'Kosong';
		} else {
			$data_nip = $cek_verif->row();
			$date['data_spesimen'] = $this->kadis_model->get_spesimen_simbada($data_nip->nip_kepala)->row();
		}

		
        $data['data_kondisi']=$data_register_updated;
        $data['data_pb']=$get_data_pb;

		// ini_set('memory_limit','0');
        // $this->pdf->load_view('laporan/cetak_form_kondisi_barang',$data);
		// $this->pdf->set_paper("legal", "landscape");
		// $this->pdf->render();
        // ob_end_clean();
		// $this->pdf->stream("Cetak Form Kondisi Barang.pdf", array("Attachment" => false));


		$data['kib_apa'] = $kib;
		$this->load->view('kadis/laporan_kadis/cetak_form_kondisi_barang',$data);		
    }

	public function cetak_barang_tidak_ditemukan($kib)
    {
        $this->cek_sess();
        $nomor_lokasi=$this->session->userdata('no_lokasi_asli');
        $get_data_pb=$this->kadis_model->ambil_data_pb($nomor_lokasi)->row();
		$get_data_register=$this->kadis_model->get_register_sudah_verf($nomor_lokasi,$kib)->result();
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
			$data_updated=$this->kadis_model->get_keberadaan_barang_update($row['register'])->row();
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
		$data['kib_apa'] = $kib;

		// ini_set('memory_limit','0');
        // $this->pdf->load_view('laporan_kadis/cetak_form_kondisi_barang',$data);
		// $this->pdf->set_paper("legal", "landscape");
		// $this->pdf->render();
        // ob_end_clean();
		// $this->pdf->stream("Cetak Form Kondisi Barang.pdf", array("Attachment" => false));
		$this->load->view('kadis/laporan_kadis/cetak_barang_tidak_diketemukan',$data);		
    }


	public function cetak_perubahan_data_barang($kib)
    {
        $this->cek_sess();
        $nomor_lokasi=$this->session->userdata('no_lokasi_asli');
        $get_data_pb=$this->kadis_model->ambil_data_pb($nomor_lokasi)->row();
		
		$data['data_register']=$this->kadis_model->get_perubahan_data_verif($nomor_lokasi,$kib)->result();
		

		// 
        // $this->pdf->load_view('kadis/laporan_kadis/cetak_form_kondisi_barang',$data);
		// $this->pdf->set_paper("legal", "landscape");
		// $this->pdf->render();
        // ob_end_clean();
		// $this->pdf->stream("Cetak Form Kondisi Barang.pdf", array("Attachment" => false));
		$data['data_pb']=$get_data_pb;
		$data['kib_apa'] = $kib;
		$this->load->view('kadis/laporan_kadis/cetak_perubahan_data_barang',$data);		
    }

	public function laporan_barang_hilang($kib)
	{
		$this->cek_sess();
		ini_set('memory_limit', '2048M');
		$nomor_lokasi=$this->session->userdata('no_lokasi_asli');
		$data['data_pb']=$this->kadis_model->ambil_data_pb($nomor_lokasi)->row();
		$data['data_barang']=$this->kadis_model->get_data_hilang($kib,$nomor_lokasi)->result();
		$data['kib_apa'] = $kib;

		$this->load->view('kadis/laporan_kadis/cetak_barang_hilang',$data);
	}

	public function laporan_belum_dikapt_diketahui_induk($kib)
	{
		$this->cek_sess();
		ini_set('memory_limit', '2048M');
		$nomor_lokasi=$this->session->userdata('no_lokasi_asli');
		$data['data_pb']=$this->kadis_model->ambil_data_pb($nomor_lokasi)->row();
		$data['data_barang']=$this->kadis_model->get_belum_kapt_ada_induk($kib,$nomor_lokasi)->result();
		$data['kib_apa'] = $kib;

		$this->load->view('kadis/laporan_kadis/cetak_belum_kapt_diketahui',$data);
	}

	public function laporan_belum_dikapt_tidak_diketahui_induk($kib)
	{
		$this->cek_sess();
		$nomor_lokasi=$this->session->userdata('no_lokasi_asli');
		$data['data_pb']=$this->kadis_model->ambil_data_pb($nomor_lokasi)->row();
		// ini_set('memory_limit', '2048M');
		$data['kib_apa'] = $kib;
		// $data['data_barang']=$this->admin_model->get_belum_kapt_ada_induk('1.3.2')->result();

		$this->load->view('kadis/laporan_kadis/cetak_belum_kapt_tidak_diketahui_induk',$data);
	}

	public function laporan_data_tercatat_ganda($kib)
	{
		$this->cek_sess();
		ini_set('memory_limit', '2048M');
		$nomor_lokasi=$this->session->userdata('no_lokasi_asli');
		$data['data_pb']=$this->kadis_model->ambil_data_pb($nomor_lokasi)->row();
		$data['data_barang']=$this->kadis_model->get_data_ganda($kib,$nomor_lokasi)->result();

		$data['kib_apa'] = $kib;

		$this->load->view('kadis/laporan_kadis/cetak_barang_ganda',$data);
	}

	public function laporan_data_digunakan_pihak_lain($kib)
	{
		$this->cek_sess();
		ini_set('memory_limit', '2048M');
		$nomor_lokasi=$this->session->userdata('no_lokasi_asli');
		$data['data_pb']=$this->kadis_model->ambil_data_pb($nomor_lokasi)->row();
		// $data['data_barang']=$this->admin_model->get_data_ganda('1.3.2')->result();
		$data['kib_apa'] = $kib;


		$this->load->view('kadis/laporan_kadis/cetak_barang_digunakan_instansi_lain',$data);
	}

	public function laporan_data_digunakan_pegawai_pemda($kib)
	{
		$this->cek_sess();
		ini_set('memory_limit', '2048M');
		$nomor_lokasi=$this->session->userdata('no_lokasi_asli');
		$data['data_pb']=$this->kadis_model->ambil_data_pb($nomor_lokasi)->row();
		$data['data_barang']=$this->kadis_model->get_data_dipakai_pegawai($kib,$nomor_lokasi)->result();

		$data['kib_apa'] = $kib;
		$this->load->view('kadis/laporan_kadis/cetak_barang_digunakan_pegawai',$data);
	}



}
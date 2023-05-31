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
		$data['rekap_opd']=$this->admin_model->get_rekap_opd_admin();

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

	public function update_data_pengadaan()
	{
		$this->cek_sess();

		$get_simbada = $this->admin_model->get_register_simbada()->result();
		$count = TRUE;
		ini_set('memory_limit', '4056M');
		ini_set('max_execution_time', '5000');
		date_default_timezone_set("Asia/Jakarta");	
		$date=date("Y-m-d");
		$time=date("H:i:s");
		foreach ($get_simbada as $row) {

			$exist = $this->admin_model->cek_register($row->register);
			
			
			if($exist < 1) {
				$data_reg= array (

					'register' => $row->register,
 					'kode108_baru' => $row->kode108_baru,
					'kode64_baru' => $row->kode64_baru,
					'nomor_lokasi' => $row->nomor_lokasi_baru,
					'nama_barang' => $row->nama_barang_baru,
					'merk_alamat' => $row->merk_alamat_baru,
					'tipe' => $row->tipe_baru,
					'satuan' => $row->satuan,
					'harga_baru' => $row->harga_baru,
					'tahun_pengadaan' => $row->tahun_pengadaan,
					'no_bpkb' => $row->no_bpkb,
					'no_rangka_seri' => $row->no_rangka_seri,
					'nopol' => $row->nopol,
					'no_mesin' => $row->no_mesin,
					'kondisi' => $row->kondisi,
					'keterangan' => $row->keterangan,
					'ekstrakomtabel' => NULL,
					'status' => NULL,
					'unit_baru' => substr($row->nomor_lokasi_baru,0,11),
					'nomor_lokasi_baru' => substr($row->nomor_lokasi_baru,0,11).'_'.$row->nomor_lokasi_baru,
					'status_simbada' => $row->hapus,
					'koreksi_hapus' => NULL,
					'penghapusan' => $row->penghapusan,
					'status_register' => 'PENAMBAHAN',
					'created_at_date' => $date,
					'created_at_time' => $time
				);				
				
				$this->admin_model->insert_register($data_reg);
			} else {

				$register = $row->register;

				$data_for_kib=array (
					'nomor_lokasi' => $row->nomor_lokasi_baru,
					'unit_baru' => substr($row->nomor_lokasi_baru,0,11),
					'nomor_lokasi_baru' => substr($row->nomor_lokasi_baru,0,11).'_'.$row->nomor_lokasi_baru,
					'status_simbada' => $row->hapus,
					'penghapusan' => $row->penghapusan,
					'update_at_date' => $date,
					'update_at_time' => $time
				);

				$this->admin_model->update_data($register,$data_for_kib,'data_kib');

				$data_for_isi=array(
					'nomor_lokasi_awal' => $row->nomor_lokasi_baru,
					'lokasi' => $row->nomor_lokasi_baru,
					'update_at_date' => $date,
					'update_at_time' => $time
				);

				$this->admin_model->update_data($register,$data_for_isi,'register_isi');

				$data_for_isi_history=array(
					'nomor_lokasi_awal' => $row->nomor_lokasi_baru,
					'lokasi' => $row->nomor_lokasi_baru
				);
				$this->admin_model->update_data($register,$data_for_isi_history,'register_isi_history');

			} 

		}
		$result=TRUE;
		echo json_encode($result);


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

	public function setting_kode_barang()
	{
		$this->cek_sess();

		$data['page']="Setting Kode Barang";

		$data['kodebar']=$this->admin_model->get_kodebar()->result();
		$this->load->view('admin/header_admin',$data);
		$this->load->view('admin/setting_kodebar_page');
		$this->load->view('admin/footer_admin');
	}

	public function kunci_kodebar()
	{
		$this->cek_sess();
		$id = $this->input->post('id');
		// $id="1.3.2.01.01.01";
		$result = $this->admin_model->kunci_kode($id);

		// echo $id;
		// var_dump($result);
		echo json_encode($result);
	}



	public function buka_kunci_kodebar()
	{
		$this->cek_sess();
		$id = $this->input->post('id');
		// $id="1.3.2.01.01.01";
		$result = $this->admin_model->buka_kode($id);

		// echo $id;
		// var_dump($result);
		echo json_encode($result);
	}

	public function get_list_rincian_kode()
	{
		$this->cek_sess();
		$id = $this->input->post('id');
		// $id="197902062009011001";
		$result = $this->admin_model->get_rincian_kode_sub($id)->result();

		// var_dump($result);
		echo json_encode($result);
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

	public function halaman_setting_user()
	{
		$this->cek_sess();
		$data['page']="Setting Akses User";

		$data['user'] = $this->admin_model->get_users()->result();
		$data['jabatan'] = $this->admin_model->get_pangkat()->result();

		$this->load->view('admin/header_admin',$data);
		$this->load->view('admin/setting_user_page',$data);
		$this->load->view('admin/footer_admin');

	}

	public function get_detail_user()
	{
		$this->cek_sess();
		$id = $this->input->post('id');
		$data = $this->admin_model->get_data_user($id)->row();

		echo json_encode($data);
	}

	public function cari_register($id)
	{
		$this->cek_sess();
		$data['page']="Register Searching System";
     	// $data['exist']=$this->cek_jumlah_exist();
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
				'status' => NULL
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
				} elseif ($id=='5') {
					$kib = "1.3.5";
				} else { 
					$kib = "1.5.3";
				}
			
				//Load Library Pagination
				$this->load->library('pagination');
				$data['offset']=($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
				//Config Pagination
				$config['total_rows'] = $this->admin_model->hitungBanyakRowRegister($where,$data_cari,$kib,$form)->num_rows();
				$config['per_page'] = $limit;
				$config['base_url'] = site_url('/home_admin/cari_register/2/');
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
				
			$data['lokasi']=$this->admin_model->list_unit();
			$data['dummy'] = array ('rows' => $config['total_rows'],'form' => $form, 'data' => $data_cari, 'lokasi_asli' => $this->session->userdata('no_lokasi_asli'), 'status' => $this->session->userdata('status'));
			$data['register']=$this->admin_model->get_all_register_pagination($data_cari,$kib,$config['per_page'],$data['offset'],$form);
        

		$this->load->view('admin/header_admin',$data);		
		$this->load->view('admin/list_reg_admin',$data);
		$this->load->view('admin/footer_admin');
	}



	// HALAMAN LAPORAN DAN CONTROLLER CETAK LAPORAN
	// ===================================================================================================================

	public function halaman_laporan()
	{
		$this->cek_sess();

		$data['page']="Halaman Cetak Laporan";

		$this->load->view('admin/header_admin',$data);
		$this->load->view('admin/cetak_laporan_admin_page');
		$this->load->view('admin/footer_admin');

	}

	public function laporan_perubahan_kondisi_fisik_barang()
	{
		$this->cek_sess();
		ini_set('memory_limit', '4056M');
		$data['data_kondisi']=$this->admin_model->get_perubahan_fisik_barang('1.3.2')->result();

		$this->load->view('admin/laporan_admin/cetak_form_kondisi_barang',$data);	
	}

	public function laporan_barang_tidak_ditemukan()
	{
		$this->cek_sess();
		ini_set('memory_limit', '2048M');
		$data['data_barang']=$this->admin_model->get_data_tidak_ditemukan('1.3.2')->result();

		$this->load->view('admin/laporan_admin/cetak_barang_tidak_ditemukan',$data);
	}

	public function laporan_barang_hilang()
	{
		$this->cek_sess();
		ini_set('memory_limit', '2048M');
		$data['data_barang']=$this->admin_model->get_data_hilang('1.3.2')->result();

		$this->load->view('admin/laporan_admin/cetak_barang_hilang',$data);
	}

	public function laporan_perubahan_data_barang()
	{
		$this->cek_sess();
		ini_set('memory_limit', '2048M');
		$data['data_barang']=$this->admin_model->get_perubahan_data_barang('1.3.2')->result();

		$this->load->view('admin/laporan_admin/cetak_perubahan_data_barang',$data);
	}

	public function laporan_belum_dikapt_diketahui_induk()
	{
		$this->cek_sess();
		ini_set('memory_limit', '2048M');
		$data['data_barang']=$this->admin_model->get_belum_kapt_ada_induk('1.3.2')->result();

		$this->load->view('admin/laporan_admin/cetak_belum_kapt_diketahui',$data);
	}

	public function laporan_belum_dikapt_tidak_diketahui_induk()
	{
		$this->cek_sess();
		// ini_set('memory_limit', '2048M');
		// $data['data_barang']=$this->admin_model->get_belum_kapt_ada_induk('1.3.2')->result();

		$this->load->view('admin/laporan_admin/cetak_belum_kapt_tidak_diketahui_induk');
	}

	public function laporan_data_tercatat_ganda()
	{
		$this->cek_sess();
		ini_set('memory_limit', '2048M');
		$data['data_barang']=$this->admin_model->get_data_ganda('1.3.2')->result();

		$this->load->view('admin/laporan_admin/cetak_barang_ganda',$data);
	}

	public function laporan_data_digunakan_pihak_lain()
	{
		$this->cek_sess();
		ini_set('memory_limit', '2048M');
		// $data['data_barang']=$this->admin_model->get_data_ganda('1.3.2')->result();

		$this->load->view('admin/laporan_admin/cetak_barang_digunakan_instansi_lain');
	}

	public function laporan_data_digunakan_pegawai_pemda()
	{
		$this->cek_sess();
		ini_set('memory_limit', '2048M');
		$data['data_barang']=$this->admin_model->get_data_dipakai_pegawai('1.3.2')->result();

		$this->load->view('admin/laporan_admin/cetak_barang_digunakan_pegawai',$data);
	}


	public function export_excel_rekap_admin()
	{
		$this->cek_sess();

		$rekap_opd=$this->admin_model->get_rekap_opd_admin();

		$objPHPExcel = new PHPExcel();
        
        // Set document properties
        $objPHPExcel->getProperties()->setCreator("SIIBMD-BPKAD")
							 ->setLastModifiedBy("SIIBMD-BPKAD")
							 ->setTitle("Office 2007 XLS Test Document")
							 ->setSubject("Office 2007 XLS Test Document")
							 ->setDescription("List Data Status KIB OPD")
							 ->setKeywords("SIIBMD")
							 ->setCategory("Test result file");
							 

		 // Merge Cells
		$skpd=$this->session->userdata('skpd');
        $objPHPExcel->getActiveSheet()->mergeCells('A1:H1');
        $objPHPExcel->getActiveSheet()->setCellValue('A1', "REKAP PRESENTASE REGISTER INVENTARISASI - SEMUA OPD");
        

        // Create a first sheet
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setCellValue('A3', "No.");
        $objPHPExcel->getActiveSheet()->setCellValue('B3', "OPD");
        $objPHPExcel->getActiveSheet()->setCellValue('C3', "Total Register");
        $objPHPExcel->getActiveSheet()->setCellValue('D3', "Register Telah Di Verif");
        $objPHPExcel->getActiveSheet()->setCellValue('E3', "Register Masih Proses Verif");
        $objPHPExcel->getActiveSheet()->setCellValue('F3', "Register Di Tolak");
        $objPHPExcel->getActiveSheet()->setCellValue('G3', "Register Belum Di Kerjakan");
        $objPHPExcel->getActiveSheet()->setCellValue('H3', "Persentase");
		
		$objPHPExcel->getActiveSheet()->getStyle('A3:H3')->getFont()->setBold( true );
		
        // Hide F and G column
        // $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setVisible(false);
        // $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setVisible(false);

        // Set auto size
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
		
        // Add data
		$i=4;
		$no=1;

		
        foreach ($rekap_opd as $row) 
        {
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A' . $i, $no);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B' . $i, strtoupper($row->unit));
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C' . $i, number_format($row->total));
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D' . $i, number_format($row->verif));
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E' . $i, number_format($row->proses));
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F' . $i, number_format($row->tolak));
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G' . $i, number_format($row->sisa));
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H' . $i, round((float)$row->persentase,3).'%');

			$i++;
			$no++;
        }

        // Set Font Color, Font Style and Font Alignment
        $stil=array(
            'borders' => array(
              'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN,
                'color' => array('rgb' => '000000')
              )
            ),
            'alignment' => array(
              'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            )
        );
		$i=$i-1;
        $objPHPExcel->getActiveSheet()->getStyle('A3:H3')->applyFromArray($stil);
		$objPHPExcel->getActiveSheet()->getStyle('A1:H1')->applyFromArray($stil);
		$objPHPExcel->getActiveSheet()->getStyle('A4:H'.$i)->applyFromArray($stil);
		
		

        
        
        // Save Excel xls File
        $filename="Rekap Persentase Register Inventarisasi - ".date('Ymd').".xls";
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        ob_end_clean();
		header('Last-Modified:'. gmdate("D, d M Y H:i:s").'GMT');
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename='.$filename);
        $objWriter->save('php://output');    

	}


	//===================================== END OF LAPORAN CONTROLLER =========================//


}
?>

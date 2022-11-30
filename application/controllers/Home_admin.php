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

	public function halaman_laporan()
	{
		$this->cek_sess();

		$data['page']="Halaman Cetak Laporan";

		$this->load->view('admin/header_admin',$data);
		$this->load->view('admin/cetak_laporan_admin_page');
		$this->load->view('admin/footer_admin');

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
		// $data['data_barang']=$this->admin_model->get_data_ganda('1.3.2')->result();

		$this->load->view('admin/laporan_admin/cetak_barang_digunakan_pegawai');
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
        $objPHPExcel->getActiveSheet()->setCellValue('E3', "Register Masih Proses Verif	");
        $objPHPExcel->getActiveSheet()->setCellValue('F3', "Register Di Tolak");
        $objPHPExcel->getActiveSheet()->setCellValue('G3', "Register Belum Terjamah	");
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


}
?>

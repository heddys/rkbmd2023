<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_penyelia extends CI_Controller {

    public function index()
    {
        $this->cek_sess();

        $data['page']="Dashboard Penyelia";

        $list_pangkuan=$this->get_list_pangkuan();
        
        $data_unit=array();
        foreach ($list_pangkuan as $key) {
            $data_unit[] = $key->nomor_unit;
        }
        $data['get_proses_reg']=$this->admin_model->get_proses_reg($data_unit);
        $data['get_tolak_reg']=$this->admin_model->get_tolak_reg($data_unit);
        $data['get_data_chart']=$this->admin_model->get_data_chart($data_unit);
        $data['rekap_opd']=$this->admin_model->get_rekap_opd($data_unit);

        // echo $data['get_data_chart']->jumlah_proses; 
        // var_dump($data['rekap_opd']);
        $this->load->view('admin/header_penyelia',$data);		
		$this->load->view('admin/home_penyelia');
		$this->load->view('admin/footer_penyelia');	
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

    private function get_list_pangkuan()
    {
        $this->cek_sess();
        $nip=$this->session->userdata('nip');
        return $this->admin_model->get_pangkuan($nip)->result();
    }
	
	public function get_rekapan_aset() {
		$this->cek_sess();
        $nomor_unit=$this->input->post('unit');

		$rekap_tanah=$this->admin_model-->data_progres_opd_tanah($nomor_unit)->row();
		$rekap_pm=$this->admin_model-->data_progres_opd_pm($nomor_unit)->row();
		$rekap_gdb=$this->admin_model-->data_progres_opd_gdb($nomor_unit)->row();
		$rekap_jij=$this->admin_model-->data_progres_opd_jij($nomor_unit)->row();
		$rekap_atl=$this->admin_model-->data_progres_opd_atl($nomor_unit)->row();
		$rekap_atb=$this->admin_model-->data_progres_opd_atb($nomor_unit)->row();

		$data_rekap = array (
			'presentase_tanah' => $rekap_tanah->presentase,
			'presentase_pm' => $rekap_pm->presentase,
			'presentase_gdb' => $rekap_gdb->presentase,
			'presentase_jij' => $rekap_jij->presentase,
			'presentase_atl' => $rekap_atl->presentase,
			'presentase_atb' => $rekap_atb->presentase,
		);

		echo json_encode($data_rekap);
	}

    public function get_data_petugas()
    {
        $this->cek_sess();
        $id=$this->input->post('id');

        $result=$this->admin_model->get_row_petugas($id)->row();

        echo json_encode($result);
    }

    public function list_status_register($id)
    {
        $this->cek_sess();
		$data['page']="Form Inventarisasi";
        $list_pangkuan=$this->get_list_pangkuan();
		if($this->session->userdata('status') >= 10){
			$this->session->set_userdata('data',$this->session->userdata('no_lokasi_asli'));
			$this->session->set_userdata('status',0);
		}
		$list_unit=array();
		foreach ($list_pangkuan as $key) {
			$list_unit[] = $key->nomor_unit;
		}
        
        if(isset($_POST['select_lokasi'])){
			if($_POST['select_lokasi'] == "semua_opd") {
				$this->session->set_userdata('status',0);
				$form=0;
				$data_cari=array();
				foreach ($list_pangkuan as $key) {
					$data_cari[] = $key->nomor_unit;
				}
				$this->session->set_userdata('data',$data_cari);
			} else {
				$this->session->set_userdata('data',$_POST['select_lokasi']);
				$data_cari=$this->session->userdata('data');
				$form=1;
				$this->session->set_userdata('status',1);
			}
			
		} else {
			if($this->session->userdata('status')==0) {
				$form=0;
				$data_cari=array();
				foreach ($list_pangkuan as $key) {
					$data_cari[] = $key->nomor_unit;
				}
				$this->session->set_userdata('data',$data_cari);
			} elseif($this->session->userdata('status')==1) {
				$form = 1;
				$data_cari=$this->session->userdata('data');
			} else {
				$form = 2;
				$data_cari=$this->session->userdata('data');

			}
			
		}

		if(isset($_POST['cariregname'])){
			$data_cari=$_POST['cariregname'];
			$form=2;
			$this->session->set_userdata('data',$data_cari);
			$this->session->set_userdata('status',2);
		}

        $data['kib_apa']=$id;

		if($id=='1') {
			$this->session->set_userdata('kib','1.3.1');
			$kib = $this->session->userdata('kib');
		} 
		elseif ($id=='2') {
			$this->session->set_userdata('kib','1.3.2');
			$kib = $this->session->userdata('kib');
		} elseif ($id=='3') {
			$this->session->set_userdata('kib','1.3.3');
			$kib = $this->session->userdata('kib');
		} elseif ($id=='4') {
			$this->session->set_userdata('kib','1.3.4');
			$kib = $this->session->userdata('kib');
		} elseif ($id=='5') {
			$this->session->set_userdata('kib','1.3.5');
			$kib = $this->session->userdata('kib');
		} else { 
			$this->session->set_userdata('kib','1.5.3');
			$kib = $this->session->userdata('kib');
		} 
		
			//Load Library Pagination
			$this->load->library('pagination');
			$data['offset']=($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			//Config Pagination
			$config['total_rows'] = $this->admin_model->hitungBanyakRowRegister($data_cari,$kib,$form)->num_rows();
			$config['per_page'] = 10;
			$config['base_url'] = site_url('/home_penyelia/list_status_register/'.$id);
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
			// var_dump ($data_cari);
			$data['lokasi']=$this->admin_model->get_per_opd_penyelia($list_unit);
			$data['dummy'] = array ('rows' => $config['total_rows'],'form' => $form);
			$data['register']=$this->admin_model->get_status_for_penyelia($data_cari,$kib,$config['per_page'],$data['offset'],$form);
        
        
        $this->load->view('admin/header_penyelia',$data);		
		$this->load->view('admin/list_status_kib_penyelia',$data);
		$this->load->view('admin/footer_penyelia');		

		
    }
	

	public function show_form_inv_penyelia()
	{
		$this->cek_sess();

		$data['page']="Lihat Form Inventarisasi OPD";
		$data['status'] = $_GET['status'];
		$register=$_GET['register'];
		$data['data_register'] = $this->form_model->ambil_register_form($register)->row();
		$data['data_is_register'] = $this->form_model->ambil_status_register_form($register)->row();
		$data['image'] = $this->form_model->ambil_file($register)->result();
		if($data['status']==3) {
			$data['penolakan'] =$this->admin_model->ambil_jurnal_penolakan($data_penolakan=array('register' => $register,'status_register' => 1))->row();
		}
		
		$this->load->view('admin/header_penyelia',$data);		
		$this->load->view('admin/detail_form_penyelia',$data);
		$this->load->view('admin/footer_penyelia');		

	}

	public function cetak_form_inv_penyelia()
	{
		$this->cek_sess();
        ini_set('max_execution_time', 2000);
        $register=$_POST['register'];
		$nomor_lokasi=substr($_POST['no_lokasi'],0,-6);

        $data['data_register'] = $this->admin_model->ambil_register_form($register)->row();
        $data['data_is_register'] = $this->admin_model->ambil_status_register_form($register)->row();
        $data['image']=$this->admin_model->ambil_file($register)->result();
        $data['data_kib'] = $this->admin_model->ambil_register($register);

        $data['pb_verif']=$this->admin_model->pb_verif($nomor_lokasi)->row();

        // // var_dump($data['pengguna']);
        // // echo $nomor_lokasi;

       	$this->pdf->load_view('admin/cetak_register_inventarisasi_penyelia',$data);
		$this->pdf->set_paper("legal", "potrait");
		$this->pdf->render();
        ob_end_clean();
		$this->pdf->stream("dompdf_out.pdf", array("Attachment" => false));

	}

	public function show_list_status_per_opd($id)
	{
        $this->cek_sess();

		$data['page']="List KIB OPD";
		if(isset($_GET['lokasi'])) {
			$list_unit=$_GET['lokasi'];
			$this->session->set_userdata('data_temp',$list_unit);
			$this->session->set_userdata('status',10);
		} else {$list_unit=$this->session->userdata('data_temp');}

        if(isset($_POST['select_lokasi'])){
			if($_POST['select_lokasi'] == "semua_opd") {
				$this->session->set_userdata('status',10);
				$form=0;
				$data_cari=$this->session->userdata('data_temp');
				$this->session->set_userdata('data',$data_cari);
			} else {
				$this->session->set_userdata('data',$_POST['select_lokasi']);
				$data_cari=$this->session->userdata('data');
				$form=0;
				$this->session->set_userdata('status',11);
			}
			
		} else {
			if($this->session->userdata('status')==10) {
				$form=0;
				$data_cari=$this->session->userdata('data_temp');;
				$this->session->set_userdata('data',$data_cari);
			} elseif($this->session->userdata('status')==11) {
				$form = 0;
				$data_cari=$this->session->userdata('data');
			} else {
				$form = 2;
			}
			
		}

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
			$config['total_rows'] = $this->admin_model->hitungBanyakRowRegister_peropd($data_cari,$kib,$form)->num_rows();
			$config['per_page'] = 10;
			$config['base_url'] = site_url('/home_penyelia/show_list_status_per_opd/2');
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
			
			$data['lokasi']=$this->admin_model->get_per_opd_penyelia_peropd($list_unit);
			$data['dummy'] = array ('rows' => $config['total_rows'],'form' => $form);
			$data['register']=$this->admin_model->get_status_for_penyelia_peropd($data_cari,$kib,$config['per_page'],$data['offset'],$form);
        
        // foreach ($data['lokasi'] as $key) {
        //     echo $key->unit." - ".$key->unit_baru."<p>";
        // }
		$data['lok']=$list_unit;
		$data['lok2']=$data_cari;
        $this->load->view('admin/header_penyelia',$data);		
		$this->load->view('admin/list_status_kib_penyelia_peropd',$data);
		$this->load->view('admin/footer_penyelia');		

		// var_dump($this->session->userdata('data'));
		// var_dump($data_cari);

	}

	public function export_excel_rekap_penyelia()
	{
		$this->cek_sess();
		$list_pangkuan=$this->get_list_pangkuan();

		foreach ($list_pangkuan as $key) {
			$list_unit[] = $key->nomor_unit;
		}

		$rekap_opd=$this->admin_model->get_rekap_opd($list_unit);

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
        $objPHPExcel->getActiveSheet()->setCellValue('A1', "REKAP PRESENTASE REGISTER INVENTARISASI - PENYELIA");
        

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
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        $objWriter->save('php://output');    




	}


    
}
?>
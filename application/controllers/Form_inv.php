<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_inv extends CI_Controller {

    
   	public function index ($id)
	{	
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

		//Kondisi Untuk Fungsi User Pengurus Barang Pembantu
		if($this->session->userdata('role') == 'Pengurus Barang Pembantu UPTD') {
			$get_lokasi_pbp=$this->form_model->ambil_data_pbp()->result();
			$nomor_lokasi=array();
			foreach ($get_lokasi_pbp as $key) {
				$nomor_lokasi[]=$key->nomor_lokasi;
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
				
			$data['register']=$this->form_model->get_all_register_pagination_Pbp($kib,$nomor_lokasi);
		
			
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
				$config['total_rows'] = $this->form_model->hitungBanyakRowRegister($data_cari,$kib,$form)->num_rows();
				$config['per_page'] = $limit;
				$config['base_url'] = site_url('/form_inv/index/'.$id.'/');
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
			$data['dummy'] = array ('rows' => $config['total_rows'],'form' => $form, 'data' => $data_cari, 'lokasi_asli' => $this->session->userdata('no_lokasi_asli'), 'status' => $this->session->userdata('status'));
			$data['register']=$this->form_model->get_all_register_pagination($data_cari,$kib,$config['per_page'],$data['offset'],$form);
        
		}

		$this->load->view('h_tablerkb',$data);		
		$this->load->view('form_page',$data);
		$this->load->view('h_footerrkb');
		
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
		
		$this->load->view('header',$data);		
		$this->load->view('isi_form_tanah',$data);
		$this->load->view('footer_isi_form_tanah');

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
		
		$this->load->view('header',$data);	
		$this->load->view('isi_form_pm',$data);
		$this->load->view('footer_isi_form_pm');

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
		
		$this->load->view('header',$data);	
		$this->load->view('isi_form_gdb',$data);
		$this->load->view('footer_isi_form_gdb');

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
		
		$this->load->view('header',$data);	
		$this->load->view('isi_form_jij',$data);
		$this->load->view('footer_isi_form_jij');

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
		
		$this->load->view('header',$data);	
		$this->load->view('isi_form_atl',$data);
		$this->load->view('footer_isi_form_atl');

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
		

		$this->load->view('header',$data);	
		$this->load->view('isi_form_atb',$data);
		$this->load->view('footer_isi_form_atb');

    }

	public function isi_formulir_edit_1()
    {
        $this->cek_sess();
		$data['page']="Edit Form Inventarisasi";
		$data['kode_barang']=$this->form_model->data_kode_barang();
		$data['satuan']=$this->form_model->data_satuan();
		$data['kamus_lokasi']=$this->form_model->data_kamus_lokasi();
		$data['list_kelurahan']=$this->form_model->kamus_kelurahan();

		
		$register = $_POST['register'];
		
		$data['data_register'] = $this->form_model->ambil_register_form($register)->row();
		$data['data_is_register'] = $this->form_model->ambil_status_register_form($register)->row();
		$data['image'] = $this->form_model->ambil_file($register)->result();
		$data['penolakan'] =$this->form_model->ambil_jurnal_penolakan($data_penolakan=array('register' => $register,'status_register' => 1))->row();
		$sk_penggunaan=$this->form_model->get_sk_penggunaan($register);

		if($sk_penggunaan->num_rows() > 0) {
			$data['sk_penggunaan']=$sk_penggunaan->row();
		} else {
			$data['sk_penggunaan']="NULL";
		}	

        $this->load->view('header',$data);		
		$this->load->view('edit_form_tanah',$data);
		$this->load->view('footer_isi_form_tanah');
    }

	public function isi_formulir_edit_2()
    {
        $this->cek_sess();
		$data['page']="Edit Form Inventarisasi";
		$data['kode_barang']=$this->form_model->data_kode_barang();
		$data['satuan']=$this->form_model->data_satuan();
		$data['kamus_lokasi']=$this->form_model->data_kamus_lokasi();

		
		$register = $_POST['register'];
		
		$data['data_register'] = $this->form_model->ambil_register_form($register)->row();
		$data['data_is_register'] = $this->form_model->ambil_status_register_form($register)->row();
		$data['image'] = $this->form_model->ambil_file($register)->result();
		$data['penolakan'] =$this->form_model->ambil_jurnal_penolakan($data_penolakan=array('register' => $register,'status_register' => 1))->row();

        $this->load->view('header',$data);		
		$this->load->view('edit_form_pm',$data);
		$this->load->view('footer_isi_form_pm');
    }

	public function isi_formulir_edit_3()
    {
        $this->cek_sess();
		$data['page']="Edit Form Inventarisasi";
		$data['kode_barang']=$this->form_model->data_kode_barang();
		$data['satuan']=$this->form_model->data_satuan();
		$data['kamus_lokasi']=$this->form_model->data_kamus_lokasi();
		$data['list_kelurahan']=$this->form_model->kamus_kelurahan();

		
		$register = $_POST['register'];
		
		$data['data_register'] = $this->form_model->ambil_register_form($register)->row();
		$data['data_is_register'] = $this->form_model->ambil_status_register_form($register)->row();
		$data['image'] = $this->form_model->ambil_file($register)->result();
		$data['penolakan'] =$this->form_model->ambil_jurnal_penolakan($data_penolakan=array('register' => $register,'status_register' => 1))->row();

		$sk_penggunaan=$this->form_model->get_sk_penggunaan($register);

		if($sk_penggunaan->num_rows() > 0) {
			$data['sk_penggunaan']=$sk_penggunaan->row();
		} else {
			$data['sk_penggunaan']="NULL";
		}	

        $this->load->view('header',$data);		
		$this->load->view('edit_form_gdb',$data);
		$this->load->view('footer_isi_form_gdb');
    }
	

	public function edit_form_verif_1()
	{
		$this->cek_sess();
		$data['page']="Edit Form Inventarisasi";
		$data['kode_barang']=$this->form_model->data_kode_barang();
		$data['satuan']=$this->form_model->data_satuan();
		$data['kamus_lokasi']=$this->form_model->data_kamus_lokasi();
		$data['list_kelurahan']=$this->form_model->kamus_kelurahan();

		
		$register = $_POST['register'];
		
		$data['data_register'] = $this->form_model->ambil_register_form($register)->row();
		$data['data_is_register'] = $this->form_model->ambil_status_register_form($register)->row();
		$data['image'] = $this->form_model->ambil_file($register)->result();
		
		$sk_penggunaan=$this->form_model->get_sk_penggunaan($register);

		if($sk_penggunaan->num_rows() > 0) {
			$data['sk_penggunaan']=$sk_penggunaan->row();
		} else {
			$data['sk_penggunaan']="NULL";
		}	

        $this->load->view('header',$data);		
		$this->load->view('edit_form_verif_tanah',$data);
		$this->load->view('footer_isi_form_tanah');
	}
	
	
	
	public function edit_form_verif_2()
	{
		$this->cek_sess();
		$data['page']="Edit Form Inventarisasi";
        $data['exist']=$this->cek_jumlah_exist();
		$data['kode_barang']=$this->form_model->data_kode_barang();
		$data['satuan']=$this->form_model->data_satuan();
		$data['kamus_lokasi']=$this->form_model->data_kamus_lokasi();

		
		$register = $_POST['register'];
		
		$data['data_register'] = $this->form_model->ambil_register_form($register)->row();
		$data['data_is_register'] = $this->form_model->ambil_status_register_form($register)->row();
		$data['image'] = $this->form_model->ambil_file($register)->result();
		
		// var_dump($data['data_register']);
		// echo $register;

        $this->load->view('header',$data);		
		$this->load->view('edit_form_verif_pm',$data);
		$this->load->view('footer_isi_form_pm');
	}

	public function edit_form_verif_3()
	{
		$this->cek_sess();
		$data['page']="Edit Form Inventarisasi";
		$data['kode_barang']=$this->form_model->data_kode_barang();
		$data['satuan']=$this->form_model->data_satuan();
		$data['kamus_lokasi']=$this->form_model->data_kamus_lokasi();
		$data['list_kelurahan']=$this->form_model->kamus_kelurahan();

		
		$register = $_POST['register'];
		
		$data['data_register'] = $this->form_model->ambil_register_form($register)->row();
		$data['data_is_register'] = $this->form_model->ambil_status_register_form($register)->row();
		$data['image'] = $this->form_model->ambil_file($register)->result();
		
		$sk_penggunaan=$this->form_model->get_sk_penggunaan($register);

		if($sk_penggunaan->num_rows() > 0) {
			$data['sk_penggunaan']=$sk_penggunaan->row();
		} else {
			$data['sk_penggunaan']="NULL";
		}	

        $this->load->view('header',$data);		
		$this->load->view('edit_form_verif_gdb',$data);
		$this->load->view('footer_isi_form_gdb');
	}

    private function cek_sess() 
	{
		if($this->session->userdata('role') =="Pengurus Barang" ){
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

	public function save_isi_form_peralatan_mesin()
	{
		$register=$_POST['register'];
		//$radio_register=$_POST['radio_kode_reg'];

		$kode_barang=$_POST['kode_barang'];
		$radio_kode_bar=$_POST['radio_kode_bar'];

		$nama_barang=$_POST['nama_barang'];
		$radio_nama_bar=$_POST['radio_nama_bar'];

		$merk=$_POST['merk'];
		$radio_merk=$_POST['radio_merk'];

		$jumlah_bar=1;
		$radio_jum_bar=0;

		$satuan=$_POST['satuan'];
		$radio_satuan=$_POST['radio_satuan'];

		$keberadaan=$_POST['keberadaan'];
		$radio_keberadaan=$_POST['radio_keberadaan'];

		$nilai=str_replace(".", "",$_POST['nilai']);
		$radio_nilai=$_POST['radio_nilai'];

		$aset_atrib=$_POST['aset_atrib'];
		$radio_kap_atrib=$_POST['radio_kap_atrib'];

		$alamat=$_POST['lokasi'];
		$radio_alamat=$_POST['radio_alamat'];
		$lokasi_awal=$_POST['no_lokasi_awal'];

		if($_POST['kondisi_bar'] == "Baik") {
			$kondisi_bar="B";
		} elseif ($_POST['kondisi_bar'] == "Kurang Baik") {
			$kondisi_bar="KB";
		} else {$kondisi_bar="RB";}
		
		$radio_kondisi=$_POST['radio_kondisi'];

		$tipe=$_POST['tipe_barang'];
		$radio_tipe=$_POST['radio_tipe'];

		$nopol=$_POST['nopol'];
		$radio_nopol=$_POST['radio_nopol'];

		$noka=$_POST['noka'];
		$radio_no_rangka=$_POST['radio_no_rangka'];

		$no_mesin=$_POST['no_mesin'];
		$radio_mesin=$_POST['radio_mesin'];

		$no_bpkb=$_POST['no_bpkb'];
		$radio_bpkb=$_POST['radio_bpkb'];
		
		$penggunaan=$_POST['penggunaan'];
		$radio_pengguna=$_POST['radio_pengguna'];

		$ganda=$_POST['catat_ganda'];
		$radio_ganda=$_POST['radio_ganda'];

		// if (isset($_POST['koordinat'])){
		// 	$koordinat = $_POST['koordinat'];
		// } else {$koordinat = "-";}

		if (isset($_POST['lainnya'])){
			$lainnya = $_POST['lainnya'];
		} else {$lainnya = "-";}

		if (isset($_POST['keterangan'])){
			$keterangan=$_POST['keterangan'];
		} else {$keterangan="-";}

		date_default_timezone_set("Asia/Jakarta");	
		$updated_date=date("Y-m-d");
		$updated_time=date("H:i:s");

		// echo $register." = ".$radio_register."<p><hr></p>";
		// echo $kode_barang." = ".$radio_kode_bar."<p><hr></p>";
		// echo $nama_barang." = ".$radio_nama_bar."<p><hr></p>";
		// echo $merk." = ".$radio_merk."<p><hr></p>";
		// echo $satuan." = ".$radio_satuan."<p><hr></p>";
		// echo $keberadaan." = ".$radio_keberadaan."<p><hr></p>";
		// echo $nilai." = ".$radio_nilai."<p><hr></p>";
		// echo $aset_atrib." = ".$radio_kap_atrib."<p><hr></p>";
		// echo $alamat."<p><hr></p>";
		// echo $kondisi_bar." = ".$radio_kondisi."<p><hr></p>";
		// echo $tipe." = ".$radio_tipe."<p><hr></p>";
		// echo $nopol." = ".$radio_nopol."<p><hr></p>";
		// echo $noka." = ".$radio_no_rangka."<p><hr></p>";
		// echo $no_mesin." = ".$radio_mesin."<p><hr></p>";
		// echo $no_bpkb." = ".$radio_bpkb."<p><hr></p>";
		// echo $penggunaan." = ".$radio_pengguna."<p><hr></p>";
		// echo "Lainnya = ".$lainnya."<p><hr></p>";
		// echo "Koordinat = ".$koordinat."<p><hr></p>";
		// echo "Keterangan = ".$keterangan."<p><hr></p>";

		$data = array(); 
        $errorUploadType = $statusMsg = ''; 
         
            // If files are selected to upload 
            if(!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0){ 
                $filesCount = count($_FILES['files']['name']); 
                for($i = 0; $i < $filesCount; $i++){

                    $_FILES['file']['name']     = preg_replace('/[^A-Za-z0-9\-.]/', '', $register."-pm-".$_FILES['files']['name'][$i]); 
                    $_FILES['file']['type']     = $_FILES['files']['type'][$i]; 
                    $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i]; 
                    $_FILES['file']['error']     = $_FILES['files']['error'][$i]; 
                    $_FILES['file']['size']     = $_FILES['files']['size'][$i]; 
                     
                    // File upload configuration 
                    $uploadPath = 'ini_assets/upload/'; 
                    $config['upload_path'] = $uploadPath; 
                    $config['allowed_types'] = 'jpg|jpeg|png'; 
                    $config['max_size']    = '7000'; 
                    //$config['max_width'] = '1024'; 
                    //$config['max_height'] = '768'; 
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
                     
                    // Upload file to server 
                    if($this->upload->do_upload('file')){ 
                        // Uploaded file data 
                        $fileData = $this->upload->data();
						$uploadData[$i]['register'] = $register;
                        $uploadData[$i]['file_upload'] = $fileData['file_name']; 
                        $uploadData[$i]['created_date'] = $updated_date;
						$uploadData[$i]['created_time'] = $updated_time; 
                    }else{  
                        $errorUploadType .= $_FILES['file']['name'].' | ';  
                    }

                } 
                 
                $errorUploadType = !empty($errorUploadType)?'<br/>File Type Error: '.trim($errorUploadType, ' | '):''; 
                if(!empty($uploadData)){ 
                    // Insert files data into the database 
                    $insert = $this->form_model->save_image($uploadData); 
                    //  var_dump($insert);
                    // Upload status message 
                   echo $insert?'Files uploaded successfully!'.$errorUploadType:'Some problem occurred, please try again.'; 
                }else{ 
                    echo "Sorry, there was an error uploading your file.".$errorUploadType; 
                } 
            }else{ 
                $statusMsg = 'Please select image files to upload.'; 
            } 
		
		$data_form_isian = array(
		'register' => $register,
		'kode_barang' => $kode_barang,
		'nama_barang' => $nama_barang,
		'spesifikasi_barang_merk' => $merk,
		'satuan' => $satuan,
		'keberadaan_barang' => $keberadaan,
		'nilai_perolehan' => $nilai,
		'merupakan_anak' => $aset_atrib,
		'nomor_lokasi_awal' => $lokasi_awal,
		'lokasi' => $alamat,
		'jumlah' => 1,
		'kondisi_barang' => $kondisi_bar,
		'tipe' => $tipe,
		'nopol' => $nopol,
		'no_rangka_seri' => $noka,
		'no_mesin' => $no_mesin,
		'no_bpkb' =>$no_bpkb,
		'penggunaan_barang' => $penggunaan,
		'register_ganda' => $ganda,
		'Lainnya' => $lainnya,
		// 'koordinat' => $koordinat,
		'keterangan' => $keterangan,
		'created_date' => $updated_date,
		'created_time' => $updated_time
		);

		$data_is_form = array(
			'is_register' => $register,
			'is_kode_barang' => $radio_kode_bar,
			'is_nama_barang' => $radio_nama_bar,
			'is_spesifikasi_barang_merk' => $radio_merk,
			'is_lokasi' => $radio_alamat,
			'is_satuan' => $radio_satuan,
			'is_jumlah' => 0,
			'is_keberadaan_barang' => $radio_keberadaan,
			'is_nilai_perolehan' => $radio_nilai,
			'is_aset_atrib' =>$radio_kap_atrib,
			'is_kondisi_barang' => $radio_kondisi,
			'is_tipe' => $radio_tipe,
			'is_nopol' => $radio_nopol,
			'is_no_rangka' => $radio_no_rangka,
			'is_no_mesin' => $radio_mesin,
			'is_no_bpkb' => $radio_bpkb,
			'is_penggunaan_barang' =>$radio_pengguna,
			'is_catat_ganda' => $radio_ganda,
			'created_date' => $updated_date,
			'created_time' => $updated_time
		);

		var_dump($data_form_isian);
		// echo "<p>";
		// var_dump($data_is_form);

		//Save Di tabel register_isi
		$id_register_isi=$this->form_model->save_isi_form($data_form_isian);


		$data_form_isian += array(
			'id_register_isi' => $id_register_isi
		);

		//Save Di Tabel register_isi_history
		$this->form_model->save_isi_form_history($data_form_isian);


		//Save Di tabel register status
		$id_register_status=$this->form_model->save_status_register($data_is_form);

		$data_is_form += array (

			'id_status_register' => $id_register_status

		);

		$this->form_model->save_status_register_history($data_is_form);

		//Membuat tanda di data kib
		$this->form_model->tandai_kib($register);

		redirect('/form_inv/index/2');

	}

	public function save_isi_form_tanah()
	{
		$register=$_POST['register'];
		
		$kode_barang=$_POST['kode_barang'];
		$radio_kode_bar=$_POST['radio_kode_bar'];

		$nama_barang=$_POST['nama_barang'];
		$radio_nama_bar=$_POST['radio_nama_bar'];

		$merk=$_POST['merk'];
		$radio_merk=$_POST['radio_merk'];

		$rtrw=$_POST['rtrw'];
		$radio_rt=$_POST['radio_rt'];

		$jumlah_bar=1;
		$radio_jum_bar=0;

		$satuan=$_POST['satuan'];
		$radio_satuan=$_POST['radio_satuan'];

		$keberadaan=$_POST['keberadaan'];
		$radio_keberadaan=$_POST['radio_keberadaan'];

		$nilai=str_replace(".", "",$_POST['nilai']);
		$radio_nilai=$_POST['radio_nilai'];

		$aset_atrib=$_POST['aset_atrib'];
		$radio_kap_atrib=$_POST['radio_kap_atrib'];

		$alamat=$_POST['lokasi'];
		$radio_alamat=$_POST['radio_alamat'];
		$lokasi_awal=$_POST['no_lokasi_awal'];

		if($_POST['kondisi_bar'] == "Baik") {
			$kondisi_bar="B";
		} elseif ($_POST['kondisi_bar'] == "Kurang Baik") {
			$kondisi_bar="KB";
		} else {$kondisi_bar="RB";}
		
		$radio_kondisi=$_POST['radio_kondisi'];


		$luas_tanah=$_POST['luas_tanah'];
		$radio_luas=$_POST['radio_luas'];

		$no_sertif=$_POST['no_sertif'];
		$radio_no_sertif=$_POST['radio_no_sertif'];

		$kms_kel=$_POST['kamus_kelurahan'];
		$radio_kms_kel=$_POST['radio_kelurahan'];

		// $no_bpkb=$_POST['no_bpkb'];
		// $radio_bpkb=$_POST['radio_bpkb'];
		
		$penggunaan=$_POST['penggunaan'];
		$radio_pengguna=$_POST['radio_pengguna'];

		$ganda=$_POST['catat_ganda'];
		$radio_ganda=$_POST['radio_ganda'];

		
		$pemanfaatan = $_POST['pemanfaatan'];

		if (isset($_POST['keterangan'])){
			$keterangan=$_POST['keterangan'];
		} else {$keterangan="-";}

		date_default_timezone_set("Asia/Jakarta");	
		$updated_date=date("Y-m-d");
		$updated_time=date("H:i:s");

		$data = array(); 
        $errorUploadType = $statusMsg = ''; 
         
            // If files are selected to upload 
            if(!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0){ 
                $filesCount = count($_FILES['files']['name']); 
                for($i = 0; $i < $filesCount; $i++){

                    $_FILES['file']['name']     = preg_replace('/[^A-Za-z0-9\-.]/', '', $register."-tanah-".$_FILES['files']['name'][$i]); 
                    $_FILES['file']['type']     = $_FILES['files']['type'][$i]; 
                    $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i]; 
                    $_FILES['file']['error']     = $_FILES['files']['error'][$i]; 
                    $_FILES['file']['size']     = $_FILES['files']['size'][$i]; 
                     
                    // File upload configuration 
                    $uploadPath = 'ini_assets/upload/'; 
                    $config['upload_path'] = $uploadPath; 
                    $config['allowed_types'] = 'jpg|jpeg|png';
                    $config['max_size']    = '7000'; 
                    //$config['max_width'] = '1024'; 
                    //$config['max_height'] = '768'; 
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
                     
                    // Upload file to server 
                    if($this->upload->do_upload('file')){ 
                        // Uploaded file data 
                        $fileData = $this->upload->data();
						$uploadData[$i]['register'] = $register;
                        $uploadData[$i]['file_upload'] = $fileData['file_name']; 
                        $uploadData[$i]['created_date'] = $updated_date;
						$uploadData[$i]['created_time'] = $updated_time; 
                    }else{  
                        $errorUploadType .= $_FILES['file']['name'].' | ';  
                    }

                } 
                 
                $errorUploadType = !empty($errorUploadType)?'<br/>File Type Error: '.trim($errorUploadType, ' | '):''; 
                if(!empty($uploadData)){ 
                    // Insert files data into the database 
                    $insert = $this->form_model->save_image($uploadData); 
                    //  var_dump($insert);
                    // Upload status message 
                   echo $insert?'Files uploaded successfully!'.$errorUploadType:'Some problem occurred, please try again.'; 
                }else{ 
                    echo "Sorry, there was an error uploading your file.".$errorUploadType; 
                } 
            }else{ 
            	  $statusMsg = 'Please select image files to upload.'; 
            } 
		
		
		if($kms_kel == NULL ) {
			$kota = "Surabaya";
			$kelurahan = $_POST['kelurahan'];
			$kecamata = $_POST['kecamatan'];
		} else {
			$get_kelurahan = $this->form_model->get_kamus_kelurahan($kms_kel)->row();
			$kota = $get_kelurahan->kab_kota;
			$kelurahan = $get_kelurahan->des_kel;
			$kecamatan = $get_kelurahan->kec;
		}

		$data_form_isian = array(
		'register' => $register,
		'kode_barang' => $kode_barang,
		'nama_barang' => $nama_barang,
		'spesifikasi_barang_merk' => $merk,
		'satuan' => $satuan,
		'keberadaan_barang' => $keberadaan,
		'nilai_perolehan' => $nilai,
		'merupakan_anak' => $aset_atrib,
		'nomor_lokasi_awal' => $lokasi_awal,
		'lokasi' => $alamat,
		'jumlah' => 1,
		'rt_rw' => $rtrw,
		'kondisi_barang' => $kondisi_bar,
		'luas' => $luas_tanah,
		'no_sertifikat' => $no_sertif,
		'kota' => $kota,
		'kelurahan' => $kelurahan,
		'kecamatan' => $kecamata,
		'penggunaan_barang' => $penggunaan,
		'pemanfaatan_aset' => $pemanfaatan,
		'register_ganda' => $ganda,
		// 'koordinat' => $koordinat,
		'keterangan' => $keterangan,
		'created_date' => $updated_date,
		'created_time' => $updated_time
		);

		$data_is_form = array(
			'is_register' => $register,
			'is_kode_barang' => $radio_kode_bar,
			'is_nama_barang' => $radio_nama_bar,
			'is_spesifikasi_barang_merk' => $radio_merk,
			'is_lokasi' => $radio_alamat,
			'is_satuan' => $radio_satuan,
			'is_jumlah' => 0,
			'is_luas' => $radio_luas,
			'is_kelurahan' => $radio_kms_kel,
			'is_keberadaan_barang' => $radio_keberadaan,
			'is_nilai_perolehan' => $radio_nilai,
			'is_aset_atrib' =>$radio_kap_atrib,
			'is_kondisi_barang' => $radio_kondisi,
			'is_no_sertif' => $radio_no_sertif,
			'is_penggunaan_barang' =>$radio_pengguna,
			'is_catat_ganda' => $radio_ganda,
			'created_date' => $updated_date,
			'created_time' => $updated_time
		);

		// var_dump($data_form_isian);
		// echo "<p>";
		// var_dump($data_is_form);

		// echo "<h1>ASDSADSAD</h1>";

		//Save Di tabel register_isi
		$id_register_isi=$this->form_model->save_isi_form($data_form_isian);


		$data_form_isian += array(
			'id_register_isi' => $id_register_isi
		);

		//Save Di Tabel register_isi_history
		$this->form_model->save_isi_form_history($data_form_isian);


		//Save Di tabel register status
		$id_register_status=$this->form_model->save_status_register($data_is_form);

		$data_is_form += array (

			'id_status_register' => $id_register_status

		);

		$this->form_model->save_status_register_history($data_is_form);

		//Membuat tanda di data kib
		$this->form_model->tandai_kib($register);

		redirect('/form_inv/index/1');

	}

	public function save_isi_form_gdb()
	{
		$register=$_POST['register'];
		
		$kode_barang=$_POST['kode_barang'];
		$radio_kode_bar=$_POST['radio_kode_bar'];

		$nama_barang=$_POST['nama_barang'];
		$radio_nama_bar=$_POST['radio_nama_bar'];

		$merk=$_POST['merk'];
		$radio_merk=$_POST['radio_merk'];

		$jumlah_bar=1;
		$radio_jum_bar=0;

		$rtrw=$_POST['rtrw'];
		$radio_rt=$_POST['radio_rt'];

		$satuan=$_POST['satuan'];
		$radio_satuan=$_POST['radio_satuan'];

		$keberadaan=$_POST['keberadaan'];
		$radio_keberadaan=$_POST['radio_keberadaan'];

		$nilai=str_replace(".", "",$_POST['nilai']);
		$radio_nilai=$_POST['radio_nilai'];

		$aset_atrib=$_POST['aset_atrib'];
		$radio_kap_atrib=$_POST['radio_kap_atrib'];

		$alamat=$_POST['lokasi'];
		$radio_alamat=$_POST['radio_alamat'];
		$lokasi_awal=$_POST['no_lokasi_awal'];

		if($_POST['kondisi_bar'] == "Baik") {
			$kondisi_bar="B";
		} elseif ($_POST['kondisi_bar'] == "Kurang Baik") {
			$kondisi_bar="KB";
		} else {$kondisi_bar="RB";}
		
		$radio_kondisi=$_POST['radio_kondisi'];

		$tipe=$_POST['tipe_barang'];
		$radio_tipe=$_POST['radio_tipe'];

		$luas_bangunan=$_POST['luas_bangunan'];

		$radio_luas=$_POST['radio_luas'];
		$radio_luas=$_POST['radio_luas'];
		
		$kms_kel=$_POST['kamus_kelurahan'];
		$radio_kms_kel=$_POST['radio_kelurahan'];
		
		// $no_bpkb=$_POST['no_bpkb'];
		// $radio_bpkb=$_POST['radio_bpkb'];
		
		$penggunaan=$_POST['penggunaan'];
		$radio_pengguna=$_POST['radio_pengguna'];
		
		$ganda=$_POST['catat_ganda'];
		$radio_ganda=$_POST['radio_ganda'];
		
		$register_tanah=$_POST['register_tanah'];
		$radio_reg_tanah=$_POST['radio_reg_tanah'];

		$status_tanah=$_POST['status_tanah'];
		
		$pemanfaatan = $_POST['pemanfaatan'];

		if (isset($_POST['keterangan'])){
			$keterangan=$_POST['keterangan'];
		} else {$keterangan="-";}

		date_default_timezone_set("Asia/Jakarta");	
		$updated_date=date("Y-m-d");
		$updated_time=date("H:i:s");

		$data = array(); 
        $errorUploadType = $statusMsg = ''; 
         
            // If files are selected to upload 
            if(!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0){ 
                $filesCount = count($_FILES['files']['name']); 
                for($i = 0; $i < $filesCount; $i++){

                    $_FILES['file']['name']     = preg_replace('/[^A-Za-z0-9\-.]/', '', $register."-gdb-".$_FILES['files']['name'][$i]); 
                    $_FILES['file']['type']     = $_FILES['files']['type'][$i]; 
                    $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i]; 
                    $_FILES['file']['error']     = $_FILES['files']['error'][$i]; 
                    $_FILES['file']['size']     = $_FILES['files']['size'][$i]; 
                     
                    // File upload configuration 
                    $uploadPath = 'ini_assets/upload/'; 
                    $config['upload_path'] = $uploadPath; 
                    $config['allowed_types'] = 'jpg|jpeg|png'; 
                    $config['max_size']    = '7000'; 
                    //$config['max_width'] = '1024'; 
                    //$config['max_height'] = '768'; 
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
                     
                    // Upload file to server 
                    if($this->upload->do_upload('file')){ 
                        // Uploaded file data 
                        $fileData = $this->upload->data();
						$uploadData[$i]['register'] = $register;
                        $uploadData[$i]['file_upload'] = $fileData['file_name']; 
                        $uploadData[$i]['created_date'] = $updated_date;
						$uploadData[$i]['created_time'] = $updated_time; 
                    }else{  
                        $errorUploadType .= $_FILES['file']['name'].' | ';  
                    }

                } 
                 
                $errorUploadType = !empty($errorUploadType)?'<br/>File Type Error: '.trim($errorUploadType, ' | '):''; 
                if(!empty($uploadData)){ 
                    // Insert files data into the database 
                    $insert = $this->form_model->save_image($uploadData); 
                    //  var_dump($insert);
                    // Upload status message 
                   echo $insert?'Files uploaded successfully!'.$errorUploadType:'Some problem occurred, please try again.'; 
                }else{ 
                    echo "Sorry, there was an error uploading your file.".$errorUploadType; 
                } 
            }else{ 
                $statusMsg = 'Please select image files to upload.'; 
            } 
		

		if($kms_kel == NULL ) {
			$kota = "Surabaya";
			$kelurahan = $_POST['kelurahan'];
			$kecamata = $_POST['kecamatan'];
		} else {
			$get_kelurahan = $this->form_model->get_kamus_kelurahan($kms_kel)->row();
			$kota = $get_kelurahan->kab_kota;
			$kelurahan = $get_kelurahan->des_kel;
			$kecamatan = $get_kelurahan->kec;
		}

		$data_form_isian = array(
		'register' => $register,
		'kode_barang' => $kode_barang,
		'nama_barang' => $nama_barang,
		'spesifikasi_barang_merk' => $merk,
		'satuan' => $satuan,
		'keberadaan_barang' => $keberadaan,
		'nilai_perolehan' => $nilai,
		'merupakan_anak' => $aset_atrib,
		'nomor_lokasi_awal' => $lokasi_awal,
		'lokasi' => $alamat,
		'jumlah' => 1,
		'rt_rw' => $rtrw,
		'kondisi_barang' => $kondisi_bar,
		'tipe' => $tipe,
		'luas' => $luas_bangunan,
		'kota' => $kota,
		'kelurahan' => $kelurahan,
		'kecamatan' => $kecamata,
		'penggunaan_barang' => $penggunaan,
		'pemanfaatan_aset' => $pemanfaatan,
		'register_ganda' => $ganda,
		'register_tanah' => $register_tanah,
		'status_kepemilikan_tanah' => $status_tanah,
		'keterangan' => $keterangan,
		'created_date' => $updated_date,
		'created_time' => $updated_time
		);

		$data_is_form = array(
			'is_register' => $register,
			'is_kode_barang' => $radio_kode_bar,
			'is_nama_barang' => $radio_nama_bar,
			'is_spesifikasi_barang_merk' => $radio_merk,
			'is_lokasi' => $radio_alamat,
			'is_satuan' => $radio_satuan,
			'is_jumlah' => 0,
			'is_luas' => $radio_luas,
			'is_kelurahan' => $radio_kms_kel,
			'is_keberadaan_barang' => $radio_keberadaan,
			'is_nilai_perolehan' => $radio_nilai,
			'is_aset_atrib' =>$radio_kap_atrib,
			'is_kondisi_barang' => $radio_kondisi,
			'is_tipe' => $radio_tipe,
			'is_register_tanah' => $radio_reg_tanah,
			'is_penggunaan_barang' =>$radio_pengguna,
			'is_catat_ganda' => $radio_ganda,
			'created_date' => $updated_date,
			'created_time' => $updated_time
		);

		// var_dump($data_form_isian);
		// echo "<p>";
		// var_dump($data_is_form);

		//Save Di tabel register_isi
		$id_register_isi=$this->form_model->save_isi_form($data_form_isian);


		$data_form_isian += array(
			'id_register_isi' => $id_register_isi
		);

		//Save Di Tabel register_isi_history
		$this->form_model->save_isi_form_history($data_form_isian);


		//Save Di tabel register status
		$id_register_status=$this->form_model->save_status_register($data_is_form);

		$data_is_form += array (

			'id_status_register' => $id_register_status

		);

		$this->form_model->save_status_register_history($data_is_form);

		//Membuat tanda di data kib
		$this->form_model->tandai_kib($register);

		redirect('/form_inv/index/3');

	}

	public function update_isi_form_tanah() {
		
		$register=$_POST['register'];
		$id_isi_register=$_POST['id_isi_register'];
		$id_status_register=$_POST['id_status_register'];
		
		$kode_barang=$_POST['kode_barang'];
		$radio_kode_bar=$_POST['radio_kode_bar'];

		$nama_barang=$_POST['nama_barang'];
		$radio_nama_bar=$_POST['radio_nama_bar'];

		$merk=$_POST['merk'];
		$radio_merk=$_POST['radio_merk'];

		$rtrw=$_POST['rtrw'];
		$radio_rt=$_POST['radio_rt'];

		$jumlah_bar=1;
		$radio_jum_bar=0;

		$satuan=$_POST['satuan'];
		$radio_satuan=$_POST['radio_satuan'];

		$keberadaan=$_POST['keberadaan'];
		$radio_keberadaan=$_POST['radio_keberadaan'];

		$nilai=str_replace(".", "",$_POST['nilai']);
		$radio_nilai=$_POST['radio_nilai'];

		$aset_atrib=$_POST['aset_atrib'];
		$radio_kap_atrib=$_POST['radio_kap_atrib'];

		$alamat=$_POST['lokasi'];
		$radio_alamat=$_POST['radio_alamat'];
		$lokasi_awal=$_POST['no_lokasi_awal'];

		if($_POST['kondisi_bar'] == "Baik") {
			$kondisi_bar="B";
		} elseif ($_POST['kondisi_bar'] == "Kurang Baik") {
			$kondisi_bar="KB";
		} else {$kondisi_bar="RB";}
		
		$radio_kondisi=$_POST['radio_kondisi'];


		$luas_tanah=$_POST['luas_tanah'];
		$radio_luas=$_POST['radio_luas'];

		$no_sertif=$_POST['no_sertif'];
		$radio_no_sertif=$_POST['radio_no_sertif'];

		$kms_kel=$_POST['kamus_kelurahan'];
		$radio_kms_kel=$_POST['radio_kelurahan'];

		// $no_bpkb=$_POST['no_bpkb'];
		// $radio_bpkb=$_POST['radio_bpkb'];
		
		$penggunaan=$_POST['penggunaan'];
		$radio_pengguna=$_POST['radio_pengguna'];

		$ganda=$_POST['catat_ganda'];
		$radio_ganda=$_POST['radio_ganda'];

		
		$pemanfaatan = $_POST['pemanfaatan'];

		if (isset($_POST['keterangan'])){
			$keterangan=$_POST['keterangan'];
		} else {$keterangan="-";}

		date_default_timezone_set("Asia/Jakarta");	
		$updated_date=date("Y-m-d");
		$updated_time=date("H:i:s");

		$data = array(); 
        $errorUploadType = $statusMsg = ''; 
         
            // If files are selected to upload 
            if(!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0){ 
                $filesCount = count($_FILES['files']['name']); 
                for($i = 0; $i < $filesCount; $i++){

                    $_FILES['file']['name']     = preg_replace('/[^A-Za-z0-9\-.]/', '', $register."-tanah-".$_FILES['files']['name'][$i]); 
                    $_FILES['file']['type']     = $_FILES['files']['type'][$i]; 
                    $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i]; 
                    $_FILES['file']['error']     = $_FILES['files']['error'][$i]; 
                    $_FILES['file']['size']     = $_FILES['files']['size'][$i]; 
                     
                    // File upload configuration 
                    $uploadPath = 'ini_assets/upload/'; 
                    $config['upload_path'] = $uploadPath; 
                    $config['allowed_types'] = 'jpg|jpeg|png'; 
                    $config['max_size']    = '7000'; 
                    //$config['max_width'] = '1024'; 
                    //$config['max_height'] = '768'; 
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
                     
                    // Upload file to server 
                    if($this->upload->do_upload('file')){ 
                        // Uploaded file data 
                        $fileData = $this->upload->data();
						$uploadData[$i]['register'] = $register;
                        $uploadData[$i]['file_upload'] = $fileData['file_name']; 
                        $uploadData[$i]['created_date'] = $updated_date;
						$uploadData[$i]['created_time'] = $updated_time; 
                    }else{  
                        $errorUploadType .= $_FILES['file']['name'].' | ';  
                    }

                } 
                 
                $errorUploadType = !empty($errorUploadType)?'<br/>File Type Error: '.trim($errorUploadType, ' | '):''; 
                if(!empty($uploadData)){ 
                    // Insert files data into the database 
                    $insert = $this->form_model->save_image($uploadData); 
                    //  var_dump($insert);
                    // Upload status message 
                   echo $insert?'Files uploaded successfully!'.$errorUploadType:'Some problem occurred, please try again.'; 
                }else{ 
                    echo "Sorry, there was an error uploading your file.".$errorUploadType; 
                } 
            }else{ 
            	  $statusMsg = 'Please select image files to upload.'; 
            } 
		
		
		if($kms_kel == NULL ) {
			$kota = "Surabaya";
			$kelurahan = $_POST['kelurahan'];
			$kecamata = $_POST['kecamatan'];
		} else {
			$get_kelurahan = $this->form_model->get_kamus_kelurahan($kms_kel)->row();
			$kota = $get_kelurahan->kab_kota;
			$kelurahan = $get_kelurahan->des_kel;
			$kecamatan = $get_kelurahan->kec;
		}

		$data_form_isian = array(
		'register' => $register,
		'kode_barang' => $kode_barang,
		'nama_barang' => $nama_barang,
		'spesifikasi_barang_merk' => $merk,
		'satuan' => $satuan,
		'keberadaan_barang' => $keberadaan,
		'nilai_perolehan' => $nilai,
		'merupakan_anak' => $aset_atrib,
		'nomor_lokasi_awal' => $lokasi_awal,
		'lokasi' => $alamat,
		'jumlah' => 1,
		'rt_rw' => $rtrw,
		'kondisi_barang' => $kondisi_bar,
		'luas' => $luas_tanah,
		'no_sertifikat' => $no_sertif,
		'kota' => $kota,
		'kelurahan' => $kelurahan,
		'kecamatan' => $kecamata,
		'penggunaan_barang' => $penggunaan,
		'pemanfaatan_aset' => $pemanfaatan,
		'register_ganda' => $ganda,
		// 'koordinat' => $koordinat,
		'keterangan' => $keterangan,
		'update_at_date' => $updated_date,
		'update_at_time' => $updated_time
		);

		$data_is_form = array(
			'is_register' => $register,
			'is_kode_barang' => $radio_kode_bar,
			'is_nama_barang' => $radio_nama_bar,
			'is_spesifikasi_barang_merk' => $radio_merk,
			'is_lokasi' => $radio_alamat,
			'is_satuan' => $radio_satuan,
			'is_jumlah' => 0,
			'is_luas' => $radio_luas,
			'is_kelurahan' => $radio_kms_kel,
			'is_keberadaan_barang' => $radio_keberadaan,
			'is_nilai_perolehan' => $radio_nilai,
			'is_aset_atrib' =>$radio_kap_atrib,
			'is_kondisi_barang' => $radio_kondisi,
			'is_no_sertif' => $radio_no_sertif,
			'is_penggunaan_barang' =>$radio_pengguna,
			'is_catat_ganda' => $radio_ganda,
			'update_at_date' => $updated_date,
			'update_at_time' => $updated_time
		);

		// var_dump($data_form_isian);
		// echo "<p>";
		// var_dump($data_is_form);

		// echo "<h1>ASDSADSAD</h1>";

		//Update Di tabel register_isi
		$this->form_model->update_isi_form($data_form_isian,$id_isi_register);

		$data_form_isian += array(
			'id_register_isi' => $id_isi_register
		);

		//Save Di tabel register_isi
		$this->form_model->save_isi_form_history($data_form_isian);

		//Save Di tabel register status
		$this->form_model->update_status_register($data_is_form,$id_status_register);

		$data_is_form += array(
			'id_status_register' => $id_status_register
		);

		//Save Di tabel register status
		$this->form_model->save_status_register_history($data_is_form);

		//Membuat tanda di data kib
		$this->form_model->tandai_kib($register);

		redirect('/status_form/index/1');
	}

	public function update_isi_form_pm()
	{
	
		$register=$_POST['register'];
		$id_isi_register=$_POST['id_isi_register'];
		$id_status_register=$_POST['id_status_register'];

		$kode_barang=$_POST['kode_barang'];
		$radio_kode_bar=$_POST['radio_kode_bar'];

		$nama_barang=$_POST['nama_barang'];
		$radio_nama_bar=$_POST['radio_nama_bar'];

		$merk=$_POST['merk'];
		$radio_merk=$_POST['radio_merk'];

		$jumlah_bar=1;
		$radio_jum_bar=0;

		$satuan=$_POST['satuan'];
		$radio_satuan=$_POST['radio_satuan'];

		$keberadaan=$_POST['keberadaan'];
		$radio_keberadaan=$_POST['radio_keberadaan'];

		$nilai=str_replace(".", "",$_POST['nilai']);
		$radio_nilai=$_POST['radio_nilai'];

		$aset_atrib=$_POST['aset_atrib'];
		$radio_kap_atrib=$_POST['radio_kap_atrib'];

		$alamat=$_POST['lokasi'];
		$radio_alamat=$_POST['radio_alamat'];
		$lokasi_awal=$_POST['no_lokasi_awal'];

		if($_POST['kondisi_bar'] == "Baik") {
			$kondisi_bar="B";
		} elseif ($_POST['kondisi_bar'] == "Kurang Baik") {
			$kondisi_bar="KB";
		} else {$kondisi_bar="RB";}
		$radio_kondisi=$_POST['radio_kondisi'];

		$tipe=$_POST['tipe_barang'];
		$radio_tipe=$_POST['radio_tipe'];

		$nopol=$_POST['nopol'];
		$radio_nopol=$_POST['radio_nopol'];

		$noka=$_POST['noka'];
		$radio_no_rangka=$_POST['radio_no_rangka'];

		$no_mesin=$_POST['no_mesin'];
		$radio_mesin=$_POST['radio_mesin'];

		$no_bpkb=$_POST['no_bpkb'];
		$radio_bpkb=$_POST['radio_bpkb'];
		
		$penggunaan=$_POST['penggunaan'];
		$radio_pengguna=$_POST['radio_pengguna'];

		$ganda=$_POST['catat_ganda'];
		$radio_ganda=$_POST['radio_ganda'];

		// if (isset($_POST['koordinat'])){
		// 	$koordinat = $_POST['koordinat'];
		// } else {$koordinat = "-";}

		if (isset($_POST['lainnya'])){
			$lainnya = $_POST['lainnya'];
		} else {$lainnya = "-";}

		if (isset($_POST['keterangan'])){
			$keterangan=$_POST['keterangan'];
		} else {$keterangan= "-";}


		date_default_timezone_set("Asia/Jakarta");	
		$updated_date=date("Y-m-d");
		$updated_time=date("H:i:s");



		// echo "REGISTER = ".$register." = ".$radio_register." ID = ".$id_jurnal_penolakan."<p><hr></p>";
		// echo "KODE BARANG = ".$kode_barang." = ".$radio_kode_bar."<p><hr></p>";
		// echo "NAMA_BARANG = ".$nama_barang." = ".$radio_nama_bar."<p><hr></p>";
		// echo "MERK = ".$merk." = ".$radio_merk."<p><hr></p>";
		// echo "SATUAN = ".$satuan." = ".$radio_satuan."<p><hr></p>";
		// echo "KEBERADAAN BARANG =".$keberadaan." = ".$radio_keberadaan."<p><hr></p>";
		// echo "NILAI = ".$nilai." = ".$radio_nilai."<p><hr></p>";
		// echo "ASET ATRIBUSI = ".$aset_atrib." = ".$radio_kap_atrib."<p><hr></p>";
		// echo "ALAMAT = ".$alamat."<p><hr></p>";
		// echo "KONDISI BARANG =".$kondisi_bar." = ".$radio_kondisi."<p><hr></p>";
		// echo "TIPE = ".$tipe." = ".$radio_tipe."<p><hr></p>";
		// echo "NOPOL = ".$nopol." = ".$radio_nopol."<p><hr></p>";
		// echo "NOKA = ".$noka." = ".$radio_no_rangka."<p><hr></p>";
		// echo "NO MESIN = ".$no_mesin." = ".$radio_mesin."<p><hr></p>";
		// echo "NO BPKB = ".$no_bpkb." = ".$radio_bpkb."<p><hr></p>";
		// echo "PENGGUNAAN = ".$penggunaan." = ".$radio_pengguna."<p><hr></p>";
		// echo "Lainnya = ".$lainnya."<p><hr></p>";
		// echo "Koordinat = ".$koordinat."<p><hr></p>";
		// echo "Keterangan = ".$keterangan."<p><hr></p>";

		$data = array(); 
        $errorUploadType = $statusMsg = ''; 
         
            //If files are selected to upload 
            if(!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0){ 
                $filesCount = count($_FILES['files']['name']); 
                for($i = 0; $i < $filesCount; $i++){

                    $_FILES['file']['name']     = preg_replace('/[^A-Za-z0-9\-.]/', '', $register."--".$_FILES['files']['name'][$i]); 
                    $_FILES['file']['type']     = $_FILES['files']['type'][$i]; 
                    $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i]; 
                    $_FILES['file']['error']     = $_FILES['files']['error'][$i]; 
                    $_FILES['file']['size']     = $_FILES['files']['size'][$i]; 
                     
                    // File upload configuration 
                    $uploadPath = 'ini_assets/upload/'; 
                    $config['upload_path'] = $uploadPath; 
                    $config['allowed_types'] = 'jpg|jpeg|png';
                    $config['max_size']    = '7000'; 
                    //$config['max_width'] = '1024'; 
                    //$config['max_height'] = '768'; 
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
                     
                    // Upload file to server 
                    if($this->upload->do_upload('file')){ 
                        // Uploaded file data 
                        $fileData = $this->upload->data();
						$uploadData[$i]['register'] = $register;
                        $uploadData[$i]['file_upload'] = $fileData['file_name']; 
                        $uploadData[$i]['created_date'] = $updated_date;
						$uploadData[$i]['created_time'] = $updated_time; 
                    }else{  
                        $errorUploadType .= $_FILES['file']['name'].' | ';  
                    }

                } 
                 
                $errorUploadType = !empty($errorUploadType)?'<br/>File Type Error: '.trim($errorUploadType, ' | '):''; 
                if(!empty($uploadData)){ 
                    // Insert files data into the database 
                    $insert = $this->form_model->save_image($uploadData); 
					// var_dump($uploadData);
                     
                    // Upload status message 
                   echo $insert?'Files uploaded successfully!'.$errorUploadType:'Some problem occurred, please try again.'; 
                }else{ 
                    echo "Sorry, there was an error uploading your file.".$errorUploadType; 
                } 
            }else{ 
                $statusMsg = 'Please select image files to upload.'; 
        	}

		$data_form_isian = array(
			'register' => $register,
			'kode_barang' => $kode_barang,
			'nama_barang' => $nama_barang,
			'spesifikasi_barang_merk' => $merk,
			'satuan' => $satuan,
			'keberadaan_barang' => $keberadaan,
			'nilai_perolehan' => $nilai,
			'merupakan_anak' => $aset_atrib,
			'nomor_lokasi_awal' => $lokasi_awal,
			'lokasi' => $alamat,
			'jumlah' => 1,
			'kondisi_barang' => $kondisi_bar,
			'tipe' => $tipe,
			'nopol' => $nopol,
			'no_rangka_seri' => $noka,
			'no_mesin' => $no_mesin,
			'no_bpkb' =>$no_bpkb,
			'penggunaan_barang' => $penggunaan,
			'register_ganda' => $ganda,
			'Lainnya' => $lainnya,
			'keterangan' => $keterangan,
			'update_at_date' => $updated_date,
			'update_at_time' => $updated_time,
		);
	
			$data_is_form = array(
				'is_register' => $register,
				'is_kode_barang' => $radio_kode_bar,
				'is_nama_barang' => $radio_nama_bar,
				'is_spesifikasi_barang_merk' => $radio_merk,
				'is_satuan' => $radio_satuan,
				'is_lokasi' => $radio_alamat,	
				'is_jumlah' => 0,
				'is_keberadaan_barang' => $radio_keberadaan,
				'is_nilai_perolehan' => $radio_nilai,
				'is_aset_atrib' =>$radio_kap_atrib,
				'is_kondisi_barang' => $radio_kondisi,
				'is_tipe' => $radio_tipe,
				'is_nopol' => $radio_nopol,
				'is_no_rangka' => $radio_no_rangka,
				'is_no_mesin' => $radio_mesin,
				'is_no_bpkb' => $radio_bpkb,
				'is_penggunaan_barang' =>$radio_pengguna,
				'is_catat_ganda' => $radio_ganda,
				'update_at_date' => $updated_date,
				'update_at_time' => $updated_time,
			);
		
		// var_dump($data_form_isian);
		// echo "<p>";
		// var_dump($data_is_form);

		//Save Di tabel register_isi
		$this->form_model->update_isi_form($data_form_isian,$id_isi_register);

		$data_form_isian += array(
			'id_register_isi' => $id_isi_register
		);

		//Save Di tabel register_isi
		$this->form_model->save_isi_form_history($data_form_isian);

		//Save Di tabel register status
		$this->form_model->update_status_register($data_is_form,$id_status_register);

		$data_is_form += array(
			'id_status_register' => $id_status_register
		);

		//Save Di tabel register status
		$this->form_model->save_status_register_history($data_is_form);

		//Membuat tanda di data kib
		$this->form_model->tandai_kib($register);

		redirect('/status_form/index/2');
	}

	public function update_isi_form_gdb() {
		
		$register=$_POST['register'];
		$id_isi_register=$_POST['id_isi_register'];
		$id_status_register=$_POST['id_status_register'];
		
		$kode_barang=$_POST['kode_barang'];
		$radio_kode_bar=$_POST['radio_kode_bar'];

		$nama_barang=$_POST['nama_barang'];
		$radio_nama_bar=$_POST['radio_nama_bar'];

		$merk=$_POST['merk'];
		$radio_merk=$_POST['radio_merk'];

		$jumlah_bar=1;
		$radio_jum_bar=0;

		$rtrw=$_POST['rtrw'];
		$radio_rt=$_POST['radio_rt'];

		$satuan=$_POST['satuan'];
		$radio_satuan=$_POST['radio_satuan'];

		$keberadaan=$_POST['keberadaan'];
		$radio_keberadaan=$_POST['radio_keberadaan'];

		$nilai=str_replace(".", "",$_POST['nilai']);
		$radio_nilai=$_POST['radio_nilai'];

		$aset_atrib=$_POST['aset_atrib'];
		$radio_kap_atrib=$_POST['radio_kap_atrib'];

		$alamat=$_POST['lokasi'];
		$radio_alamat=$_POST['radio_alamat'];
		$lokasi_awal=$_POST['no_lokasi_awal'];

		if($_POST['kondisi_bar'] == "Baik") {
			$kondisi_bar="B";
		} elseif ($_POST['kondisi_bar'] == "Kurang Baik") {
			$kondisi_bar="KB";
		} else {$kondisi_bar="RB";}
		
		$radio_kondisi=$_POST['radio_kondisi'];

		$tipe=$_POST['tipe_barang'];
		$radio_tipe=$_POST['radio_tipe'];

		$luas_bangunan=$_POST['luas_bangunan'];

		$radio_luas=$_POST['radio_luas'];
		$radio_luas=$_POST['radio_luas'];
		
		$kms_kel=$_POST['kamus_kelurahan'];
		$radio_kms_kel=$_POST['radio_kelurahan'];
		
		// $no_bpkb=$_POST['no_bpkb'];
		// $radio_bpkb=$_POST['radio_bpkb'];
		
		$penggunaan=$_POST['penggunaan'];
		$radio_pengguna=$_POST['radio_pengguna'];
		
		$ganda=$_POST['catat_ganda'];
		$radio_ganda=$_POST['radio_ganda'];
		
		$register_tanah=$_POST['register_tanah'];
		$radio_reg_tanah=$_POST['radio_reg_tanah'];

		$status_tanah=$_POST['status_tanah'];
		
		$pemanfaatan = $_POST['pemanfaatan'];

		if (isset($_POST['keterangan'])){
			$keterangan=$_POST['keterangan'];
		} else {$keterangan="-";}

		date_default_timezone_set("Asia/Jakarta");	
		$updated_date=date("Y-m-d");
		$updated_time=date("H:i:s");

		$data = array(); 
        $errorUploadType = $statusMsg = ''; 
         
            // If files are selected to upload 
            if(!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0){ 
                $filesCount = count($_FILES['files']['name']); 
                for($i = 0; $i < $filesCount; $i++){

                    $_FILES['file']['name']     = preg_replace('/[^A-Za-z0-9\-.]/', '', $register."-gdb-".$_FILES['files']['name'][$i]); 
                    $_FILES['file']['type']     = $_FILES['files']['type'][$i]; 
                    $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i]; 
                    $_FILES['file']['error']     = $_FILES['files']['error'][$i]; 
                    $_FILES['file']['size']     = $_FILES['files']['size'][$i]; 
                     
                    // File upload configuration 
                    $uploadPath = 'ini_assets/upload/'; 
                    $config['upload_path'] = $uploadPath; 
                    $config['allowed_types'] = 'jpg|jpeg|png';
                    $config['max_size']    = '7000'; 
                    //$config['max_width'] = '1024'; 
                    //$config['max_height'] = '768'; 
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
                     
                    // Upload file to server 
                    if($this->upload->do_upload('file')){ 
                        // Uploaded file data 
                        $fileData = $this->upload->data();
						$uploadData[$i]['register'] = $register;
                        $uploadData[$i]['file_upload'] = $fileData['file_name']; 
                        $uploadData[$i]['created_date'] = $updated_date;
						$uploadData[$i]['created_time'] = $updated_time; 
                    }else{  
                        $errorUploadType .= $_FILES['file']['name'].' | ';  
                    }

                } 
                 
                $errorUploadType = !empty($errorUploadType)?'<br/>File Type Error: '.trim($errorUploadType, ' | '):''; 
                if(!empty($uploadData)){ 
                    // Insert files data into the database 
                    $insert = $this->form_model->save_image($uploadData); 
                    //  var_dump($insert);
                    // Upload status message 
                   echo $insert?'Files uploaded successfully!'.$errorUploadType:'Some problem occurred, please try again.'; 
                }else{ 
                    echo "Sorry, there was an error uploading your file.".$errorUploadType; 
                } 
            }else{ 
                $statusMsg = 'Please select image files to upload.'; 
            } 
		

		if($kms_kel == NULL ) {
			$kota = "Surabaya";
			$kelurahan = $_POST['kelurahan'];
			$kecamata = $_POST['kecamatan'];
		} else {
			$get_kelurahan = $this->form_model->get_kamus_kelurahan($kms_kel)->row();
			$kota = $get_kelurahan->kab_kota;
			$kelurahan = $get_kelurahan->des_kel;
			$kecamatan = $get_kelurahan->kec;
		}

		$data_form_isian = array(
		'register' => $register,
		'kode_barang' => $kode_barang,
		'nama_barang' => $nama_barang,
		'spesifikasi_barang_merk' => $merk,
		'satuan' => $satuan,
		'keberadaan_barang' => $keberadaan,
		'nilai_perolehan' => $nilai,
		'merupakan_anak' => $aset_atrib,
		'nomor_lokasi_awal' => $lokasi_awal,
		'lokasi' => $alamat,
		'jumlah' => 1,
		'rt_rw' => $rtrw,
		'kondisi_barang' => $kondisi_bar,
		'tipe' => $tipe,
		'luas' => $luas_bangunan,
		'kota' => $kota,
		'kelurahan' => $kelurahan,
		'kecamatan' => $kecamata,
		'penggunaan_barang' => $penggunaan,
		'pemanfaatan_aset' => $pemanfaatan,
		'register_ganda' => $ganda,
		'register_tanah' => $register_tanah,
		'status_kepemilikan_tanah' => $status_tanah,
		'keterangan' => $keterangan,
		'update_at_date' => $updated_date,
		'update_at_time' => $updated_time,
		);

		$data_is_form = array(
			'is_register' => $register,
			'is_kode_barang' => $radio_kode_bar,
			'is_nama_barang' => $radio_nama_bar,
			'is_spesifikasi_barang_merk' => $radio_merk,
			'is_lokasi' => $radio_alamat,
			'is_satuan' => $radio_satuan,
			'is_jumlah' => 0,
			'is_luas' => $radio_luas,
			'is_kelurahan' => $radio_kms_kel,
			'is_keberadaan_barang' => $radio_keberadaan,
			'is_nilai_perolehan' => $radio_nilai,
			'is_aset_atrib' =>$radio_kap_atrib,
			'is_kondisi_barang' => $radio_kondisi,
			'is_tipe' => $radio_tipe,
			'is_register_tanah' => $radio_reg_tanah,
			'is_penggunaan_barang' =>$radio_pengguna,
			'is_catat_ganda' => $radio_ganda,
			'update_at_date' => $updated_date,
			'update_at_time' => $updated_time,
		);

		// var_dump($data_form_isian);
		// echo "<p>";
		// var_dump($data_is_form);

		//Update Di tabel register_isi
		$this->form_model->update_isi_form($data_form_isian,$id_isi_register);

		$data_form_isian += array(
			'id_register_isi' => $id_isi_register
		);

		//Save Di tabel register_isi
		$this->form_model->save_isi_form_history($data_form_isian);

		//Save Di tabel register status
		$this->form_model->update_status_register($data_is_form,$id_status_register);

		$data_is_form += array(
			'id_status_register' => $id_status_register
		);

		//Save Di tabel register status
		$this->form_model->save_status_register_history($data_is_form);

		//Membuat tanda di data kib
		$this->form_model->tandai_kib($register);

		redirect('/status_form/index/3');

	}

	public function cari_data_register()
	{
		$this->cek_sess();
		$id = $this->input->post('id');
		
		if($id == "reg_tanah") {

			$result = $this->form_model->get_reg_tanah();
			
		} else {

			$result = $this->form_model->get_data_kib_json($id);
		}
		echo json_encode($result);
		
	}

	public function input_petugas()
	{
		$this->cek_sess();
		$data['page']="Halaman Input Petugas Inventarisasi";
		$nomor_lokasi=$this->session->userdata('no_lokasi_asli');
		$nip=$this->session->userdata('nip');


		$data['pangkat']=$this->form_model->get_pangkat();
		$data['petugas']=$this->form_model->get_petugas($nomor_lokasi);
		$data['lokasi']=$this->form_model->get_lokasi_per_opd($nomor_lokasi);
		$data['cek_exist_sk']=$this->form_model->cek_sk_petugas($nip)->num_rows();
		$data['dokumen_sk']=$this->form_model->cek_sk_petugas($nip)->row();


		$this->load->view('h_tablerkb',$data);
		$this->load->view('input_petugas',$data);
		$this->load->view('h_footerrkb');	
	}

	public function simpan_petugas()
	{	
		$this->cek_sess();
		// $nomor_lokasi=$this->session->userdata('no_lokasi_asli');
		date_default_timezone_set("Asia/Jakarta");	
		$updated_date=date("Y-m-d");
		$updated_time=date("H:i:s");

		$save_data = array (
			'nama_petugas' => $_POST['nama_petugas'],
			'nip_petugas' => $_POST['nip'],
			'pangkat_petugas' => $_POST['pangkat'],
			'nomor_lokasi' => $_POST['lokasi'],
			'date' => $updated_date,
			'time' => $updated_time
		);

		// var_dump($save_data);

		$this->form_model->save_petugas($save_data);

		redirect('/form_inv/input_petugas');
	}

	public function hapus_petugas($id)
	{
		$this->form_model->hapus_petugas($id);
		redirect('/form_inv/input_petugas/');
	}

	public function hapus_image()
	{
		$this->cek_sess();
		$id = $this->input->post('id');
		$path=$this->form_model->get_path($id)->row();
		$link="ini_assets/upload/".$path->file_upload;
		
		unlink($link);

		$result = $this->form_model->hapus_image_record($id);
		echo json_encode($result);
	}

	public function update_petugas() {
		$this->cek_sess();

		$id=$_POST['id'];

		$updated_date=date("Y-m-d");
		$updated_time=date("H:i:s");
		$update_data = array (
			'nama_petugas' => $_POST['nama_petugas'],
			'nip_petugas' => $_POST['nip'],
			'pangkat_petugas' => $_POST['pangkat'],
			'nomor_lokasi' => $_POST['lokasi'],
			'date' => $updated_date,
			'time' => $updated_time
		);
		$this->form_model->update_petugas($id,$update_data);
		redirect('/form_inv/input_petugas');
	}

	public function save_dokumen_sk() {
		$this->cek_sess();

		$nip=$this->session->userdata('nip');
		$lokasi = $this->session->userdata('no_lokasi_asli'); 
		$dokumen_sk=$this->form_model->cek_sk_petugas($nip);
		$cek_exist=0;

		date_default_timezone_set("Asia/Jakarta");
		$timestamp = date("Y-m-d H:i:s");
		
		$data=array();

		$uploadPath = 'ini_assets/sk_petugas_inv/'; 
		$config['upload_path']          = $uploadPath;
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 8000;

		// Load and initialize upload library 
		$this->load->library('upload', $config); 
		$this->upload->initialize($config); 

		// ambil data file
		
		
		$dokumen=$dokumen_sk->row();
		$link='ini_assets/sk_petugas_inv/'.$dokumen->nama_file_sk;

		if (! $this->upload->do_upload('dokumen')) {
			
			$error = array('error' => $this->upload->display_errors());

			var_dump($error);
		} else {
			$namaFile = $this->upload->data('file_name'); 
			if($dokumen_sk->num_rows() > 0){
				unlink($link);
				$cek_exist=1;
			}

			$data=array(
				'nomor_unit' =>$lokasi,
				'nip_pb' => $nip,
				'nama_file_sk' => $namaFile,
				'updated_on' => $timestamp
			);
			$this->form_model->save_sk_db($data,$cek_exist);
			redirect('/form_inv/input_petugas');
		}
	}

	public function export_excel_all_kibpm_user($kib) {

		$this->cek_sess();
		// // Read an Excel File
        // $tmpfname = "example.xls";
        // $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
        // $objPHPExcel = $excelReader->load($tmpfname);
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
        $objPHPExcel->getActiveSheet()->mergeCells('A1:K1');
        $objPHPExcel->getActiveSheet()->setCellValue('A1', "DATA STATUS INVENTARISASI KIB - ".$skpd);
        

        // Create a first sheet
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setCellValue('A3', "No.");
        $objPHPExcel->getActiveSheet()->setCellValue('B3', "Register");
        $objPHPExcel->getActiveSheet()->setCellValue('C3', "Lokasi");
        $objPHPExcel->getActiveSheet()->setCellValue('D3', "Kode Barang");
        $objPHPExcel->getActiveSheet()->setCellValue('E3', "Nama Barang");
        $objPHPExcel->getActiveSheet()->setCellValue('F3', "Merk");
        $objPHPExcel->getActiveSheet()->setCellValue('G3', "Tipe");
        $objPHPExcel->getActiveSheet()->setCellValue('H3', "Tahun Pengadaan");
        $objPHPExcel->getActiveSheet()->setCellValue('I3', "Nilai");
        $objPHPExcel->getActiveSheet()->setCellValue('J3', "Status");
        $objPHPExcel->getActiveSheet()->setCellValue('K3', "Tanggal Inventarisasi");
		
		$objPHPExcel->getActiveSheet()->getStyle('A3:K3')->getFont()->setBold( true );
		
        // Hide F and G column
        // $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setVisible(false);
        // $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setVisible(false);

        // Set auto size
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(50);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(50);
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(50);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
		
        // Add data
		ini_set('memory_limit', '2048M');
		$nomor_lokasi=$this->session->userdata('no_lokasi_asli');
		$data_kib=$this->form_model->get_kib_for_excel($nomor_lokasi,$kib);
		$i=4;
		$no=1;

		function to_rp($val)
		{
    		return number_format($val,2,',','.');
		}

        foreach ($data_kib->result() as $kib) 
        {
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A' . $i, $no);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B' . $i, $kib->register);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C' . $i, $kib->lokasi);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D' . $i, $kib->kode108_baru);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E' . $i, $kib->nama_barang);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F' . $i, $kib->merk_alamat);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G' . $i, $kib->tipe);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H' . $i, $kib->tahun_pengadaan);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I' . $i, to_rp($kib->harga_baru));

				if($kib->status == 1) {
                      $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J' . $i, "Register Dalam Proses Verifikasi");
				} elseif ($kib->status == 2) {
					  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J' . $i, "Register Telah Di Verifikasi");
				} elseif ($kib->status == 3) {
					  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J' . $i, "Register Di Tolak");
				}	else {
						  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J' . $i, "");
					}
			
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K' . $i, $kib->tanggal);
			
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
        $objPHPExcel->getActiveSheet()->getStyle('A3:K3')->applyFromArray($stil);
		$objPHPExcel->getActiveSheet()->getStyle('A1:K1')->applyFromArray($stil);
		$objPHPExcel->getActiveSheet()->getStyle('A4:K'.$i)->applyFromArray($stil);
		$objPHPExcel->getActiveSheet()->getStyle('K4:K'.$i)->getNumberFormat()->setFormatCode('dd-mmm-yyyy');
		
		

        
        
        // Save Excel xls File
        $filename="Data Status KIB - ".$skpd." - ".date('Ymd').".xls";
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        ob_end_clean();
		header('Last-Modified:'. gmdate("D, d M Y H:i:s").'GMT');
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        $objWriter->save('php://output');    
	}

	public function export_excel_kondisi_kibpm_user($kib) {

		$this->cek_sess();
		// // Read an Excel File
        // $tmpfname = "example.xls";
        // $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
        // $objPHPExcel = $excelReader->load($tmpfname);
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
        $objPHPExcel->getActiveSheet()->mergeCells('A1:N1');
        $objPHPExcel->getActiveSheet()->setCellValue('A1', "DATA KONDISI BARANG INVENTARISASI KIB - ".$skpd);
        

        // Create a first sheet
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setCellValue('A3', "No.");
        $objPHPExcel->getActiveSheet()->setCellValue('B3', "Nomor Lokasi");
        $objPHPExcel->getActiveSheet()->setCellValue('C3', "OPD");
        $objPHPExcel->getActiveSheet()->setCellValue('D3', "Lokasi");
        $objPHPExcel->getActiveSheet()->setCellValue('E3', "Kode Register");
        $objPHPExcel->getActiveSheet()->setCellValue('F3', "Kode Barang");
        $objPHPExcel->getActiveSheet()->setCellValue('G3', "Nama Spesifikasi Barang");
        $objPHPExcel->getActiveSheet()->setCellValue('H3', "Merek/Tipe");
        $objPHPExcel->getActiveSheet()->setCellValue('I3', "Jumlah");
        $objPHPExcel->getActiveSheet()->setCellValue('J3', "Satuan Barang");
        $objPHPExcel->getActiveSheet()->setCellValue('K3', "Nilai Perolehan Barang (Rp.)");
        $objPHPExcel->getActiveSheet()->setCellValue('L3', "Kondisi Fisik Sebelum Inventarisasi");
        $objPHPExcel->getActiveSheet()->setCellValue('M3', "Kondisi Fisik Sesudah Inventarisasi");
        $objPHPExcel->getActiveSheet()->setCellValue('N3', "Keterangan");
		
		$objPHPExcel->getActiveSheet()->getStyle('A3:N3')->getFont()->setBold( true );
		
        // Hide F and G column
        // $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setVisible(false);
        // $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setVisible(false);

        // Set auto size
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(50);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(50);
		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(50);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(50);
		
        // Add data

		$nomor_lokasi=$this->session->userdata('no_lokasi_asli');
		$get_data_register=$this->form_model->get_register_sudah_verf($nomor_lokasi,$kib)->result();
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
		$i=4;
		$no=1;

		function to_rp2($val)
		{
    		return number_format($val,2,',','.');
		}
		
        foreach ($data_register_updated as $kib) 
        {
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A' . $i, $no);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B' . $i, $kib['no_lokasi']);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C' . $i, $kib['opd']);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D' . $i, $kib['lokasi']);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E' . $i, $kib['register']);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F' . $i, $kib['kode108']);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G' . $i, $kib['nama_barang']);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H' . $i, $kib['merk']." / ".$kib['tipe']);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I' . $i, "1");
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J' . $i, $kib['satuan']);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('K' . $i, to_rp2($kib['harga']));

			if($kib['kondisi_awal'] == "B") {
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L' . $i, "Baik");
			} elseif ($kib['kondisi_awal'] == "KB") {
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L' . $i, "Kurang Baik");
			} else {
						$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L' . $i, "Rusak Berat");
				}

            if($kib['kondisi_baru'] == "B") {
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M' . $i, "Baik");
			} elseif ($kib['kondisi_baru'] == "KB") {
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M' . $i, "Kurang Baik");
			} else {
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M' . $i, "Rusak Berat");
				}
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('N' . $i, $kib['keterangan']);

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
        $objPHPExcel->getActiveSheet()->getStyle('A3:N3')->applyFromArray($stil);
		$objPHPExcel->getActiveSheet()->getStyle('A1:N1')->applyFromArray($stil);
		$objPHPExcel->getActiveSheet()->getStyle('A4:N'.$i)->applyFromArray($stil);
		
	
        
        // Save Excel xls File
        $filename="Data Kondisi KIB - ".$skpd." - ".date('Ymd').".xls";
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        ob_end_clean();
		header('Last-Modified:'. gmdate("D, d M Y H:i:s").'GMT');
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        $objWriter->save('php://output');    
	}

	public function export_excel_lokasi_kibpm_user($kib) {

		$this->cek_sess();
		// // Read an Excel File
        // $tmpfname = "example.xls";
        // $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
        // $objPHPExcel = $excelReader->load($tmpfname);
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
        $objPHPExcel->getActiveSheet()->mergeCells('A1:N1');
        $objPHPExcel->getActiveSheet()->setCellValue('A1', "DATA PERUBAHAN LOKASI BARANG INVENTARISASI KIB - ".$skpd);
		

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

        // Create a first sheet
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setCellValue('A3', "No.");
        $objPHPExcel->getActiveSheet()->setCellValue('B3', "Kode Register");
        $objPHPExcel->getActiveSheet()->setCellValue('C3', "Perubahan Lokasi");
        $objPHPExcel->getActiveSheet()->setCellValue('I3', "Kode Barang");
        $objPHPExcel->getActiveSheet()->setCellValue('J3', "Nama Spesifikasi Barang");
        $objPHPExcel->getActiveSheet()->setCellValue('K3', "Merek/Tipe");
        $objPHPExcel->getActiveSheet()->setCellValue('L3', "Jumlah");
        $objPHPExcel->getActiveSheet()->setCellValue('M3', "Satuan Barang");
        $objPHPExcel->getActiveSheet()->setCellValue('N3', "Nilai Perolehan Barang (Rp.)");
        $objPHPExcel->getActiveSheet()->setCellValue('O3', "Keterangan");


		$objPHPExcel->getActiveSheet()->setCellValue('C4', "Nomor Lokasi Lama");
		$objPHPExcel->getActiveSheet()->setCellValue('D4', "OPD Lama");
		$objPHPExcel->getActiveSheet()->setCellValue('E4', "Lokasi Lama");
		$objPHPExcel->getActiveSheet()->setCellValue('F4', "Nomor Lokasi Baru");
		$objPHPExcel->getActiveSheet()->setCellValue('G4', "OPD Baru");
		$objPHPExcel->getActiveSheet()->setCellValue('H4', "Lokasi Baru");
		
		$objPHPExcel->getActiveSheet()->getStyle('A3:O4')->getFont()->setBold( true );
		$objPHPExcel->getActiveSheet()->mergeCells('C3:H3');
		$objPHPExcel->getActiveSheet()->mergeCells('A3:A4');
		$objPHPExcel->getActiveSheet()->mergeCells('B3:B4');
		$objPHPExcel->getActiveSheet()->mergeCells('I3:I4');
		$objPHPExcel->getActiveSheet()->mergeCells('J3:J4');
		$objPHPExcel->getActiveSheet()->mergeCells('K3:K4');
		$objPHPExcel->getActiveSheet()->mergeCells('L3:L4');
		$objPHPExcel->getActiveSheet()->mergeCells('M3:M4');
		$objPHPExcel->getActiveSheet()->mergeCells('N3:N4');
		$objPHPExcel->getActiveSheet()->mergeCells('O3:O4');
		$objPHPExcel->getActiveSheet()->getStyle('B3:G3')->applyFromArray($stil);
		
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
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
		
        //Add data

		function to_rp3($val)
		{
    		return number_format($val,2,',','.');
		}
		


		$nomor_lokasi=$this->session->userdata('no_lokasi_asli');
		$get_data_register=$this->form_model->get_register_lokasi_baru($nomor_lokasi,$kib)->result();

		$i=5;
		$no=1;

		
        foreach ($get_data_register as $kib) 
        {
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A' . $i, $no);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B' . $i, $kib->register);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C' . $i, $kib->nomor_lokasi);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D' . $i, $kib->opd_lama);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E' . $i, $kib->lokasi_lama);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F' . $i, $kib->lokasi);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G' . $i, $kib->opd_baru);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H' . $i, $kib->lokasi_baru);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I' . $i, $kib->kode_barang);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J' . $i, $kib->nama_baru);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('K' . $i, $kib->spesifikasi_barang_merk);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('L' . $i, "1");
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('M' . $i, $kib->satuan);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('N' . $i, to_rp3($kib->harga_baru));
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('O' . $i, $kib->keterangan);

			$i++;
			$no++;
        }

       
		$i=$i-1;
        $objPHPExcel->getActiveSheet()->getStyle('A3:O4')->applyFromArray($stil);
		$objPHPExcel->getActiveSheet()->getStyle('A1:O1')->applyFromArray($stil);
		$objPHPExcel->getActiveSheet()->getStyle('A4:O'.$i)->applyFromArray($stil);
		
	
        
        // Save Excel xls File
        $filename="Data Perubahan Lokasi KIB - ".$skpd." - ".date('Ymd').".xls";
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        ob_end_clean();
		header('Last-Modified:'. gmdate("D, d M Y H:i:s").'GMT');
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        $objWriter->save('php://output');  


	}

	

	public function export_excel_reg_sudah_dikerjakan($kib) {

		function to_rp_verif($val)
		{
			return number_format($val,2,',','.');
		}
		
		$this->cek_sess();
		// // Read an Excel File
        // $tmpfname = "example.xls";
        // $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
        // $objPHPExcel = $excelReader->load($tmpfname);
		$objPHPExcel = new PHPExcel();
        
        // Set document properties
        $objPHPExcel->getProperties()->setCreator("SIIBMD-BPKAD")
							 ->setLastModifiedBy("SIIBMD-BPKAD")
							 ->setTitle("Office 2007 XLS Test Document")
							 ->setSubject("Office 2007 XLS Test Document")
							 ->setDescription("List Detial Register Di Tolak atau Di Verifikasi")
							 ->setKeywords("SIIBMD")
							 ->setCategory("Test result file");
							 

		 // Merge Cells
		$skpd=$this->session->userdata('skpd');
        $objPHPExcel->getActiveSheet()->mergeCells('A1:M1');
        $objPHPExcel->getActiveSheet()->setCellValue('A1', "DETAIL DATA STATUS INVENTARISASI KIB - ".$skpd);
        

        // Create a first sheet
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setCellValue('A3', "No.");
        $objPHPExcel->getActiveSheet()->setCellValue('B3', "Register");
        $objPHPExcel->getActiveSheet()->setCellValue('C3', "Lokasi Awal");
        $objPHPExcel->getActiveSheet()->setCellValue('D3', "Lokasi Baru");
        $objPHPExcel->getActiveSheet()->setCellValue('E3', "Kode Barang");
        $objPHPExcel->getActiveSheet()->setCellValue('F3', "Nama Barang");
        $objPHPExcel->getActiveSheet()->setCellValue('G3', "Merk");
        $objPHPExcel->getActiveSheet()->setCellValue('H3', "Tipe");
        $objPHPExcel->getActiveSheet()->setCellValue('I3', "Tahun Pengadaan");
        $objPHPExcel->getActiveSheet()->setCellValue('J3', "Nilai");
        $objPHPExcel->getActiveSheet()->setCellValue('K3', "Keterangan");
        $objPHPExcel->getActiveSheet()->setCellValue('L3', "Lainnya");
        $objPHPExcel->getActiveSheet()->setCellValue('M3', "Status");
		
		$objPHPExcel->getActiveSheet()->getStyle('A3:M3')->getFont()->setBold( true );
		
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
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
		
        // Add data
		ini_set('memory_limit', '2048M');
		$nomor_lokasi=$this->session->userdata('no_lokasi_asli');
		$data_kib=$this->form_model->get_kib_dikerjakan_excel($nomor_lokasi,$kib);
		$i=4;
		$no=1;

		

        foreach ($data_kib->result() as $kib) 
        {
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A' . $i, $no);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B' . $i, $kib->register);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C' . $i, $kib->lokasi_awal);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D' . $i, $kib->lokasi_baru);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E' . $i, $kib->kode_barang);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F' . $i, $kib->nama_barang);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G' . $i, $kib->spesifikasi_barang_merk);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H' . $i, $kib->tipe);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I' . $i, $kib->tahun_pengadaan);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J' . $i, to_rp_verif($kib->nilai_perolehan));
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('K' . $i, $kib->keterangan);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('L' . $i, $kib->lainnya);

				if($kib->status == 1) {
                      $objPHPExcel->setActiveSheetIndex(0)->setCellValue('M' . $i, "Register Dalam Proses Verifikasi");
				} elseif ($kib->status == 2) {
					  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('M' . $i, "Register Telah Di Verifikasi");
				} elseif ($kib->status == 3) {
					  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('M' . $i, "Register Di Tolak");
				}	else {
						  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('M' . $i, "");
					}
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
        $objPHPExcel->getActiveSheet()->getStyle('A3:M3')->applyFromArray($stil);
		$objPHPExcel->getActiveSheet()->getStyle('A1:M1')->applyFromArray($stil);
		$objPHPExcel->getActiveSheet()->getStyle('A4:M'.$i)->applyFromArray($stil);
		
		

        
        
        // Save Excel xls File
        $filename="Detail Data Status KIB - ".$skpd." - ".date('Ymd').".xls";
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        ob_end_clean();
		header('Last-Modified:'. gmdate("D, d M Y H:i:s").'GMT');
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        $objWriter->save('php://output');    
	}

}
?>
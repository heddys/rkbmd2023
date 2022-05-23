<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_inv extends CI_Controller {

    
    // public function index ($id, $num = '')
	// {	
	// 	$this->cek_sess();
	// 	$data['page']="Form Inventarisasi";
    //     $data['exist']=$this->cek_jumlah_exist();
	// 	$nomor_lokasi=$this->session->userdata('no_lokasi');

    //     $where = array (
    //         'ekstrakomtabel' =>  NULL,
	// 		'status' => NULL
    //     );

    //     $data['kib_apa']=$id;

	// 		if($id=='1') {
	// 			$kib = "1.3.1";
	// 		} 
	// 		elseif ($id=='2') {
	// 			$kib = "1.3.2";
	// 		} elseif ($id=='3') {
	// 			$kib = "1.3.3";
	// 		} elseif ($id=='4') {
	// 			$kib = "1.3.4";
	// 		} elseif ($kib=='5') {
	// 			$kib = "1.3.5";
	// 		} else { 
	// 			$kib = "1.5.3";
	// 		}

	// 	// $perpage = 10;
	// 	// $config['next_link'] = 'Selanjutnya';
	// 	// $config['prev_link'] = 'Sebelumnya';
	// 	// $config['first_link'] = 'Awal';
	// 	// $config['last_link'] = 'Akhir';
	// 	// $config['full_tag_open'] = '<ul class="pagination">';
	// 	// $config['full_tag_close'] = '</ul>';
	// 	// $config['num_tag_open'] = '<li>';
	// 	// $config['num_tag_close'] = '</li>';
	// 	// $config['cur_tag_open'] = '<li class="active"><a href="#">';
	// 	// $config['cur_tag_close'] = '</a></li>';
	// 	// $config['prev_tag_open'] = '<li>';
	// 	// $config['prev_tag_close'] = '</li>';
	// 	// $config['next_tag_open'] = '<li>';
	// 	// $config['next_tag_close'] = '</li>';
	// 	// $config['last_tag_open'] = '<li>';
	// 	// $config['last_tag_close'] = '</li>';
	// 	// $config['first_tag_open'] = '<li>';
	// 	// $config['first_tag_close'] = '</li>';
	// 	// $offset = $this->uri->segment(1);
	// 	// $data['semua_pengguna'] = $this->form_model->get_all_register_pagination($where,$nomor_lokasi,$kib,$perpage, $offset)->result();

	// 	$config['base_url'] = 'http://localhost/rkbmd2023/index.php/form_inv/index/2/';
	// 	$config['total_rows'] = $this->form_model->get_all_register($where,$nomor_lokasi,$kib)->num_rows();
	// 	$config['per_page'] = $perpage;
	// 	$this->pagination->initialize($config);

    //     $this->load->view('h_tablerkb',$data);
	// 	$this->load->view('form_page');
	// 	$this->load->view('h_footerrkb');		
		
	// }

	public function index ($id)
	{	
		$this->cek_sess();
		$data['page']="Form Inventarisasi";
        $data['exist']=$this->cek_jumlah_exist();
		$data_cari=$this->session->userdata('data');
		
		
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
				} elseif ($kib=='5') {
					$kib = "1.3.5";
				} else { 
					$kib = "1.5.3";
				}
			
				//Load Library Pagination
				$this->load->library('pagination');
				$data['offset']=($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
				//Config Pagination
				$config['total_rows'] = $this->form_model->hitungBanyakRowRegister($where,$data_cari,$kib,$form)->num_rows();
				$config['per_page'] = 10;
				$config['base_url'] = site_url('/form_inv/index/2/');
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
			$data['dummy'] = array ('rows' => $config['total_rows'],'form' => $form);
			$data['register']=$this->form_model->get_all_register_pagination($data_cari,$kib,$config['per_page'],$data['offset']-1,$form);
        
		}

		$this->load->view('h_tablerkb',$data);		
		$this->load->view('form_page',$data);
		$this->load->view('h_footerrkb');
		
	}

    public function isi_formulir()
    {
        $this->cek_sess();
		$data['page']="Isi Form Inventarisasi";
        $data['exist']=$this->cek_jumlah_exist();
		$data['kode_barang']=$this->form_model->data_kode_barang();
		$data['satuan']=$this->form_model->data_satuan();
		$data['kamus_lokasi']=$this->form_model->data_kamus_lokasi();

		
		$register = $_POST['register'];
		
		$data['data_register'] = $this->form_model->ambil_register($register);

        $this->load->view('header',$data);		
		$this->load->view('isi_form',$data);
		$this->load->view('footer_isi_form');
    }

	public function isi_formulir_edit()
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
		$data['penolakan'] =$this->form_model->ambil_jurnal_penolakan($data_penolakan=array('register' => $register,'status_register' => 1))->row();

        $this->load->view('header',$data);		
		$this->load->view('edit_form',$data);
		$this->load->view('footer_isi_form');
    }

	public function edit_form_verif()
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
		$this->load->view('edit_form_verif',$data);
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

		$kondisi_bar=$_POST['kondisi_bar'];
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

                    $_FILES['file']['name']     = $_FILES['files']['name'][$i]; 
                    $_FILES['file']['type']     = $_FILES['files']['type'][$i]; 
                    $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i]; 
                    $_FILES['file']['error']     = $_FILES['files']['error'][$i]; 
                    $_FILES['file']['size']     = $_FILES['files']['size'][$i]; 
                     
                    // File upload configuration 
                    $uploadPath = 'ini_assets/upload/'; 
                    $config['upload_path'] = $uploadPath; 
                    $config['allowed_types'] = 'jpg|jpeg'; 
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

		// var_dump($data_form_isian);
		// echo "<p>";
		// var_dump($data_is_form);

		//Save Di tabel register_isi
		$this->form_model->save_isi_form($data_form_isian);

		//Save Di tabel register status
		$this->form_model->save_status_register($data_is_form);

		//Membuat tanda di data kib
		$this->form_model->tandai_kib($register);

		redirect('/form_inv/index/2');

	}

	public function update_isi_form_peralatan_mesin()
	{
		$register=$_POST['register'];
		$radio_register=$_POST['radio_kode_reg'];

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

		$kondisi_bar=$_POST['kondisi_bar'];
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
         
            // If files are selected to upload 
            if(!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0){ 
                $filesCount = count($_FILES['files']['name']); 
                for($i = 0; $i < $filesCount; $i++){

                    $_FILES['file']['name']     = $_FILES['files']['name'][$i]; 
                    $_FILES['file']['type']     = $_FILES['files']['type'][$i]; 
                    $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i]; 
                    $_FILES['file']['error']     = $_FILES['files']['error'][$i]; 
                    $_FILES['file']['size']     = $_FILES['files']['size'][$i]; 
                     
                    // File upload configuration 
                    $uploadPath = 'ini_assets/upload/'; 
                    $config['upload_path'] = $uploadPath; 
                    $config['allowed_types'] = 'jpg|jpeg'; 
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
			'created_date' => $updated_date,
			'created_time' => $updated_time
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
				'created_date' => $updated_date,
				'created_time' => $updated_time
			);
		
		// var_dump($data_form_isian);
		// echo "<p>";
		// var_dump($data_is_form);

		//Save Di tabel register_isi
		$this->form_model->save_isi_form($data_form_isian);

		//Save Di tabel register status
		$this->form_model->save_status_register($data_is_form);

		//Membuat tanda di data kib
		$this->form_model->tandai_kib($register);

		redirect('/status_form/index/2');
		
	}

	public function cari_data_register()
	{
		$this->cek_sess();
		$id = $this->input->post('id');
		// $id="Power Supply";
		$result = $this->form_model->get_data_kib_json($id);
		echo json_encode($result);
		// var_dump($result);
	}

	public function input_petugas()
	{
		$this->cek_sess();
		$data['page']="Halaman Input Petugas Inventarisasi";
		$nomor_lokasi=$this->session->userdata('no_lokasi_asli');


		$data['pangkat']=$this->form_model->get_pangkat();
		$data['petugas']=$this->form_model->get_petugas($nomor_lokasi);
		$data['lokasi']=$this->form_model->get_lokasi_per_opd($this->session->userdata('no_lokasi_asli'));

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

	public function export_excel_all_kibpm_user() {

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
        $objPHPExcel->getActiveSheet()->mergeCells('A1:J1');
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
		
		$objPHPExcel->getActiveSheet()->getStyle('A3:J3')->getFont()->setBold( true );
		
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
		
        // Add data

		$nomor_lokasi=$this->session->userdata('no_lokasi_asli');
		$data_kib=$this->form_model->get_kib_for_excel($nomor_lokasi,'1.3.2');
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
        $objPHPExcel->getActiveSheet()->getStyle('A3:J3')->applyFromArray($stil);
		$objPHPExcel->getActiveSheet()->getStyle('A1:J1')->applyFromArray($stil);
		$objPHPExcel->getActiveSheet()->getStyle('A4:J'.$i)->applyFromArray($stil);
		
		

        
        
        // Save Excel xls File
        $filename="Data Status KIB - ".$skpd." - ".date('Ymd').".xls";
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        ob_end_clean();
		header('Last-Modified:'. gmdate("D, d M Y H:i:s").'GMT');
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        $objWriter->save('php://output');    
	}
}
?>
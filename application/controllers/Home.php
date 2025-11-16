<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index ()
	{	
		$this->cek_sess();
		$jabatan=$this->session->userdata('role');
		$data['page']="Dashboard";
		// $data['exist']=$this->cek_jumlah_exist();
		// $data['bmaset']=$this->cek_jumlah_bmaset();
		// $data['bmpersediaan']=$this->cek_jumlah_persediaan();
		if($jabatan == "Pengurus Barang Pembantu UPTD"){
			$get_lokasi_pbp=$this->form_model->ambil_data_pbp()->result();
			$nomor_lokasi=array();
			foreach ($get_lokasi_pbp as $key) {
				$nomor_lokasi[]=$key->nomor_lokasi;
			} 
		}
		else {
			$nomor_lokasi=$this->session->userdata('no_lokasi_asli');
		}

		// var_dump($nomor_lokasi);
		// die();

		if($this->session->userdata('no_lokasi_asli') == "13.30.000701") {
			$data['rekap_upt'] = $this->form_model->get_rekap_per_uptd($nomor_lokasi);
			$data['only_opd'] = $this->form_model->get_data_dinkes_only()->row();
		}

		if($this->session->userdata('no_lokasi_asli') == "13.30.000801"){
			$data['rekap_upt'] = $this->form_model->get_rekap_per_uptd($nomor_lokasi);
			// $data['only_opd'] = $this->form_model->get_data_dinkes_only()->row();
		}
		$data['lok'] = $nomor_lokasi;
		// $data['rekap']=$this->form_model->data_progres_opd($nomor_lokasi)->row();

		$data['total_tanah']=$this->form_model->get_kib_per_aset('1.3.1',$nomor_lokasi)->row();
		$data['total_pm']=$this->form_model->get_kib_per_aset('1.3.2',$nomor_lokasi)->row();
		$data['total_gdb']=$this->form_model->get_kib_per_aset('1.3.3',$nomor_lokasi)->row();
		$data['total_jij']=$this->form_model->get_kib_per_aset('1.3.4',$nomor_lokasi)->row();
		$data['total_atl']=$this->form_model->get_kib_per_aset('1.3.5',$nomor_lokasi)->row();
		$data['total_atb']=$this->form_model->get_kib_per_aset('1.5.3',$nomor_lokasi)->row();
		$data['rekap_tanah']=$this->form_model->data_progres_opd_tanah($nomor_lokasi)->row();
		$data['rekap_pm']=$this->form_model->data_progres_opd_pm($nomor_lokasi)->row();
		$data['rekap_gdb']=$this->form_model->data_progres_opd_gdb($nomor_lokasi)->row();
		$data['rekap_jij']=$this->form_model->data_progres_opd_jij($nomor_lokasi)->row();
		$data['rekap_atl']=$this->form_model->data_progres_opd_atl($nomor_lokasi)->row();
		$data['rekap_atb']=$this->form_model->data_progres_opd_atb($nomor_lokasi)->row();
		$data['sisa_tanah']=$this->form_model->get_sisa_per_aset('1.3.1',$nomor_lokasi)->num_rows();
		$data['sisa_pm']=$this->form_model->get_sisa_per_aset('1.3.2',$nomor_lokasi)->num_rows();
		$data['sisa_gdb']=$this->form_model->get_sisa_per_aset('1.3.3',$nomor_lokasi)->num_rows();
		$data['sisa_jij']=$this->form_model->get_sisa_per_aset('1.3.4',$nomor_lokasi)->num_rows();
		$data['sisa_atl']=$this->form_model->get_sisa_per_aset('1.3.5',$nomor_lokasi)->num_rows();
		$data['sisa_atb']=$this->form_model->get_sisa_per_aset('1.5.3',$nomor_lokasi)->num_rows();

		$this->load->view('header',$data);		
		$this->load->view('home');
		$this->load->view('footer');
		
	}

	public function cek_sess() 
	{
		if($this->session->userdata('role') =="Pengurus Barang" || $this->session->userdata('role') == 'Pengurus Barang Pembantu UPTD' ){
			$opd=$this->session->userdata('skpd');
			$this->load->model('form_model');
			return;
			} else { 
				$par=2;
				redirect('auth/index/'.$par);
			}
	}

	// public function jsonjson(){
	// 	$this->cek_sess();

    //     $url = 'https://ebudgeting.surabaya.go.id/2022/index.php/view_rka/apiKomponen.html';  
   	// 	 // set HTTP header for json 
	// 	$headers = array('Content-Type: application/json');

	// 	// set the url for the service you are contacting 
	// 	// example has an id that is passed 

	// 	// Open connection
	// 	$ch = curl_init($url);

	// 	// Set the url, number of GET vars, GET data
	// 	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	// 	curl_setopt($ch, CURLOPT_HTTPGET, 1);
	// 	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );

	// 	// this is controversial 
	// 	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	// 	// Execute request
	// 	$result = curl_exec($ch);

	// 	// get the result and parse to JSON
	// 	$kegiatan = json_decode($result, true);

	// 	// Close connection
	// 	curl_close($ch);
	// 	foreach ($kegiatan['komponen'] as $key1 => $valkomp) {
	// 		$rekening=array();
	// 		$nama_rek=array();
	// 		$komponen_id=$valkomp['komponen_id'];
	// 		$komponen_name=$valkomp['komponen_name'];
	// 		$satuan=$valkomp['satuan'];
	// 		$harga=$valkomp['komponen_harga'];
	// 		$pajak=$valkomp['pajak'];
	// 		$rek=$valkomp['rekening'];
	// 		$name_rek=$valkomp['rekening_name'];


	// 		// echo "Komponen ID : ".$komponen_id."<p>";		  
	// 		// echo "Nama Komponen : ".$komponen_name."<p>";
	// 		// echo "Satuan : ".$satuan."<p>";
	// 		// echo "Harga Komponen : ".$harga."<p>";
	// 		// echo "Pajak : ".$pajak."<p>";
	// 		// $rek=$kegiatan['komponen'][1]['rekening'];
	// 		// $name_rek=$kegiatan['komponen'][1]['rekening_name'];
			
	// 		foreach ($rek as $key2 => $val1){
	// 			$rekening[]=$val1;
	// 		}
	// 		foreach ($name_rek as $key3 => $val2) {
	// 			$nama_rek[]=$val2;
	// 		}
	// 		$jumlah_array=count($rekening);
	// 		for ($i=0; $i < $jumlah_array; $i++) { 
	// 			//disini untuk insert into database
	// 			$entrydata=array(
	// 				'id' => '',
	// 				'komponen_id' => $komponen_id,
	// 				'nama_komponen' => $komponen_name,
	// 				'satuan' => $satuan,
	// 				'harga_komponen' => $harga,
	// 				'pajak' => $pajak,
	// 				'kode_rekening' => $rekening[$i],
	// 				'nama_rekening' => $nama_rek[$i]
	// 			);
	// 			$this->auth_model->entry_data_komponen($entrydata);
	// 			// echo "Komponen ID : ".$komponen_id."<p>";		  
	// 			// echo "Nama Komponen : ".$komponen_name."<p>";
	// 			// echo "Satuan : ".$satuan."<p>";
	// 			// echo "Harga Komponen : ".$harga."<p>";
	// 			// echo "Pajak : ".$pajak."<p>";
	// 			// echo "Kode Rekening : ".$rekening[$i]."<p>";
	// 			// echo "Nama Rekening : ".$nama_rek[$i]."<p><hr>";
	// 		}
	// 	}
	// }

	public function cek_jumlah_exist(){
		$kode_opd=$this->session->userdata('kode_opd');
		$result=$this->auth_model->cek_exist($kode_opd)->num_rows();
		return $result;
	}

	public function cek_jumlah_bmaset(){
		$kode_opd=$this->session->userdata('kode_opd');
		$result=$this->auth_model->cek_bmaset($kode_opd)->num_rows();
		return $result;
	}

	public function cek_jumlah_persediaan(){
		$kode_opd=$this->session->userdata('kode_opd');
		$result=$this->auth_model->cek_persediaan($kode_opd)->num_rows();
		return $result;
	}
		
	public function rkbform($var=0)
	{	
		$this->cek_sess();
		$data['page']="Rencana Kebutuhan / Barang Modal";
		$bmsaja= array(
				'tanda'	=>	'Aset'
			);
		$kode_opd=$this->session->userdata('kode_opd');
		$ambildinas = array (
				'kode_binprog' => $kode_opd,
				'tahun'	=> '2022'
			);
		$data['get_kegiatan']=$this->auth_model->get_kegiatan('tabel_kegiatan',$ambildinas);
		$data['get_komponen']=$this->auth_model->get_data_komponen("list_komponen",$bmsaja); 
		$data['notice']=$var;

		$wherehps=array(
			'kode_binprog' => $kode_opd,
			'hapus !=' => 1
		);
		$cekjum=$this->auth_model->cek_jumlah($wherehps);
		$arrayjumlah=array();
		
		foreach ($cekjum->result() as $row) {
			$sum=0;
			$kebutuhan=$row->jumlah;
			$ideal=$row->saldo_ideal_komponen;
			$existing=$row->saldo_existing_komponen;
			$where=array(

				'id_komponen' => $row->id_komponen,
				'kode_binprog' => $kode_opd,
				'hapus !=' => 1

			);
			$jumlahkomp=$this->auth_model->get_jumlah_komp($where);
			foreach ($jumlahkomp->result() as $key) {
				$sum+=$key->saldo_kegiatan;
			}
			//echo $row->id_komponen." / ";
			//echo $sum." + ".$existing." = ".$ideal."<p>";2323		
			if(($sum+$existing) == $ideal){
				$arrayjumlah[]=$row->id_komponen;
			}
		}

		
		$data['disabled']=$arrayjumlah;
		$data['exist']=$this->cek_jumlah_exist();
		$this->load->view('header',$data);
		$this->load->view('rkb',$data);
		$this->load->view('footerrkbform');
				
	}

	public function cek_data(){
		$this->cek_sess();
		$id=$this->input->post('id');
		$kode_opd=$this->session->userdata('kode_opd');
		
		$wherehps=array(
			'kode_binprog' => $kode_opd,
			'hapus !=' => 1,
			'id_komponen' => $id
		);
		$cekjum=$this->auth_model->cek_data($wherehps);

		if ($cekjum == false) {
			
			$bmsaja= array(
				'id' => $id
			);

			$get_komp=$this->auth_model->satuan_komp($bmsaja);

			$dataarray = array (

				'status' => 'false',	
				'satuan' => $get_komp->satuan,
				'tanda' => $get_komp->tanda,
				'id' => $id
			);
		} else {

			$dataarray = array (

				'status' => 'true',	
				'ideal' => $cekjum->saldo_ideal_komponen,
				'existing' => $cekjum->saldo_existing_komponen,
				'kebutuhan' => $cekjum->saldo_komponen,
				'satuan' => $cekjum->satuan,
				'tanda' => $cekjum->tanda
			);

		}
		/*$arrayjumlah=array();
			$ideal=$cekjum['saldo_ideal_komponen'];
			$existing=$cekjum->saldo_existing_komponen;
			$arrayjumlah=array(
				'id_komponen' => $cekjum->id_komponen,
				'ideal'	=> $ideal,
				'existing' => $existing,
				'kebutuhan' => $cek_jumlah->saldo_komponen
			);*/

		//print_r($arrayjumlah);

		//$hasil=$this->auth_model->cek_data($where);
		echo json_encode($dataarray);
	}

	public function cek_data_rkp(){
		$this->cek_sess();
		$id=$this->input->post('id');
		$kode_opd=$this->session->userdata('kode_opd');
		
		$wherehps=array(
			'kode_binprog' => $kode_opd,
			'hapus !=' => 1,
			'id_komponen' => $id
		);
		$cekjum=$this->auth_model->cek_data_rkp($wherehps);

		if ($cekjum == false) {
			
			$bmsaja= array(
				'id' => $id
			);

			$get_komp=$this->auth_model->satuan_komp($bmsaja);

			$dataarray = array (

				'status' => 'false',	
				'satuan' => $get_komp->satuan,
				'tanda' => $get_komp->tanda,
				'id' => $id
			);
		} else {

			$dataarray = array (

				'status' => 'true',	
				'ideal' => $cekjum->saldo_ideal_komponen,
				'existing' => $cekjum->saldo_existing_komponen,
				'kebutuhan' => $cekjum->saldo_komponen,
				'satuan' => $cekjum->satuan,
				'tanda' => $cekjum->tanda
			);

		}
		/*$arrayjumlah=array();
			$ideal=$cekjum['saldo_ideal_komponen'];
			$existing=$cekjum->saldo_existing_komponen;
			$arrayjumlah=array(
				'id_komponen' => $cekjum->id_komponen,
				'ideal'	=> $ideal,
				'existing' => $existing,
				'kebutuhan' => $cek_jumlah->saldo_komponen
			);*/

		//print_r($arrayjumlah);

		//$hasil=$this->auth_model->cek_data($where);
		echo json_encode($dataarray);
	}

	public function rkpform($var=0)
	{
		$this->cek_sess();
		$data['page']="Rencana Kebutuhan / Persediaan";
		$bmsaja= array(
				'kode_rek_lvl1' => '5.2.2'
			);
		$kode_opd=$this->session->userdata('kode_opd');
		$ambildinas = array (
				'kode_binprog' => $kode_opd
			);
		$data['get_kegiatan']=$this->auth_model->get_kegiatan('tabel_kegiatan',$ambildinas);
		$data['get_komponen']=$this->auth_model->get_data_komponen("tabel_kode_komponen",$bmsaja);
		$data['get_kodebar']=$this->auth_model->get_kodebar("kamus_barang");
		$data['notice']=$var;

		$wherehps=array(
			'kode_binprog' => $kode_opd,
			'hapus !=' => 1
		);
		$cekjum=$this->auth_model->cek_jumlah_rkp($wherehps);
		$arrayjumlah=array();
		
		foreach ($cekjum->result() as $row) {
			$sum=0;
			$kebutuhan=$row->jumlah;
			$ideal=$row->saldo_ideal_komponen;
			$existing=$row->saldo_existing_komponen;
			$where=array(

				'id_komponen' => $row->id_komponen,
				'kode_binprog' => $kode_opd,
				'hapus !=' => 1

			);
			$jumlahkomp=$this->auth_model->get_jumlah_komprkp($where);
			foreach ($jumlahkomp->result() as $key) {
				$sum+=$key->saldo_kegiatan;
			}
			//echo $row->id_komponen." / ";
			//echo $sum." + ".$existing." = ".$ideal."<p>";
			if(($sum+$existing) == $ideal){
				$arrayjumlah[]=$row->id_komponen;
			}
		}

		
		$data['disabled']=$arrayjumlah;
		$data['exist']=$this->cek_jumlah_exist();
		$this->load->view('header',$data);
		$this->load->view('rkp',$data);
		$this->load->view('footerrkpform');
	}


	public function tandai_komponen($id_komp,$existing){
		$this->cek_sess();
		$kode_opd=$this->session->userdata('kode_opd');
		$where=array(
			'id' => $id_komp
		);
		$get_komp=$this->auth_model->get_data_komponen('tabel_kode_komponen',$where)->row();

		$update=array(
			'id_komponen' => $id_komp,
			'kode_binprog' => $kode_opd,
			'tanda_hapus' => 0,
			'updated' => "false",
			'nama_komponen' => $get_komp->nama_komponen,
			'merek' => $get_komp->merek,
			'spek1' => $get_komp->spek1,
			'spek2' => $get_komp->spek2,
			'kode_komponen' => $get_komp->kode_komponen,
			'saldo_existing' => $existing
		);
		$this->auth_model->tandai_komp($update);
		return;
	}


	public function showtabelrkb()
	{	
		$this->cek_sess();
		$data['page']="Dashboard";
		$kode_opd=$this->session->userdata('kode_opd');

		if($this->input->post('cek') == 1) {
			$keb_ideal = $_POST['keb_ideal'];
			$existing = $_POST['existing'];
			$cekvar=1;
		} else {
			$keb_ideal = $_POST['var1baru'];
			$existing = $_POST['var2baru'];
			$cekvar=2;
			}

		$id_komponen = $_POST['selectkomponen'];
		$count = $_POST['vartotal'];
		$kebutuhan=$_POST['kebutuhan'];

		$arrkeg = array();
		$arrbnykkeg = array();
		$data_rkb = array(
		
			'kode_binprog' 				=> $kode_opd, 
			'kode_komponen' 			=> $id_komponen,
			'kebutuhan'			 		=> $kebutuhan,
			'saldo_existing_komponen' 	=> $existing,
			'saldo_ideal_komponen' 		=> $keb_ideal,
			'jumlah_form'				=> $count

		);

		$jumlahsaldokeg=0;
		for ($i=1,$x=0; $i <= $count; $i++,$x++) { 
			$arrkeg[$x]=$_POST['selectkegiatan'.$i];
			$arrbnykkeg[$x]=$_POST['saldokeg'.$i];
			$arrket[$x]=$_POST['keterangan'.$i];
			$jumlahsaldokeg +=$_POST['saldokeg'.$i];
		}
		$where=array(

				'id_komponen' => $data_rkb['kode_komponen'],
				'kode_binprog' => $kode_opd,
				'hapus !=' => 1
			);

		$jumlahkomp=$this->auth_model->get_jumlah_komp($where);
		$var=0;
		$jmlhkeb=0;
		foreach ($jumlahkomp->result() as $jmlh) {
			$var+=$jmlh->saldo_kegiatan;
			$jmlhkeb=$jmlh->saldo_komponen;
		}
		$varkeb=$jmlhkeb-$var;
		//Cek Apakah Inputan Jumlah , kurang dari Jumlah Kebutuhan.

		if ($cekvar==1) {
			if ($jumlahsaldokeg > $kebutuhan) {
				$this->rkbform(1);
			} else {
			 	date_default_timezone_set("Asia/Jakarta");	
					$date=date("Y-m-d");
					$time=date("H:i:s");
					for ($i=1,$x=0; $i <= $count; $i++,$x++) {
						$savedata=array (
									'date'				=> $date,
									'time'				=> $time,
									'kode_binprog' 		=>  $data_rkb['kode_binprog'],
									'id_kegiatan'		=>  $arrkeg[$x],
									'saldo_kegiatan'	=>	$arrbnykkeg[$x],
									'id_komponen'		=>	$data_rkb['kode_komponen'],
									'saldo_komponen'	=>	$data_rkb['kebutuhan'],
									'saldo_existing_komponen'	=>	$data_rkb['saldo_existing_komponen'],
									'saldo_ideal_komponen'		=>	$data_rkb['saldo_ideal_komponen'],
									'keterangan'				=>	$arrket[$x]
						);
						$this->auth_model->save_data_rkb($savedata);
						
					}
					if($existing != 0) {
						$this->tandai_komponen($savedata['id_komponen'],$existing);
					}
					redirect('/home/tabel_rkb');
				}
		} else {
			if($varkeb >= $jumlahsaldokeg) {
				for ($i=1,$x=0; $i <= $count; $i++,$x++) {
					$wherecek=array(
								'kode_binprog' => $kode_opd,
								'id_komponen' => $data_rkb['kode_komponen'],
								'id_kegiatan' => $arrkeg[$x],
								'hapus !=' => 1
								);
					$cekthis=$this->auth_model->cek_list_rkb($wherecek);
					if($cekthis == false) {
						date_default_timezone_set("Asia/Jakarta");	
						$date=date("Y-m-d");
						$time=date("H:i:s");
							$savedata=array (
								'date'				=> $date,
								'time'				=> $time,
								'kode_binprog' 		=>  $data_rkb['kode_binprog'],
								'id_kegiatan'		=>  $arrkeg[$x],
								'saldo_kegiatan'	=>	$arrbnykkeg[$x],
								'id_komponen'		=>	$data_rkb['kode_komponen'],
								'saldo_komponen'	=>	$data_rkb['kebutuhan'],
								'saldo_existing_komponen'	=>	$data_rkb['saldo_existing_komponen'],
								'saldo_ideal_komponen'		=>	$data_rkb['saldo_ideal_komponen'],
								'keterangan'				=>	$arrket[$x]

							);
							$this->auth_model->save_data_rkb($savedata);
					} else {

							$whereget=array(

									'id_komponen' => $data_rkb['kode_komponen'],
									'id_kegiatan' => $arrkeg[$x],
									'kode_binprog' => $kode_opd,
									'hapus !=' => 1
								);
							$jumlahkomp1=$this->auth_model->get_jumlah_komp($whereget);
							$var1=0;
							$var2=0;
							foreach ($jumlahkomp1->result() as $jmlh) {
								$var1+=$jmlh->saldo_kegiatan;

							}
							$wheredatacurrent=array(
								'kode_binprog' => $kode_opd,
								'id_komponen' => $data_rkb['kode_komponen'],
								'id_kegiatan' => $arrkeg[$x]
							);
							$var2=$var1+$arrbnykkeg[$x];
						$this->auth_model->savedatacurrent($wheredatacurrent,$var2 );
					}redirect('/home/tabel_rkb');
				}
			} else {$this->rkbform(2);} 
		}
		// echo $count;
	}

	public function showtabelrkp (){
		$this->cek_sess();
		$data['page']="Dashboard";
		$kode_opd=$this->session->userdata('kode_opd');
		$tanda=$_POST['cektanda'];
		$id_komponen = $_POST['selectkomponen'];
		$count = $_POST['vartotal'];
		$kebutuhan=$_POST['kebutuhan'];

		if($this->input->post('cek') == 1) {
				$keb_ideal = $_POST['keb_ideal'];
				$existing = $_POST['existing'];
				$cekvar=1;
			} else {

					$keb_ideal = $_POST['var1baru'];
					$existing = $_POST['var2baru'];
					$cekvar=2;
				}

		
		$data_rkb = array(
				
					'kode_binprog' 				=> $kode_opd, 
					'kode_komponen' 			=> $id_komponen,
					'kebutuhan'			 		=> $kebutuhan,
					'saldo_existing_komponen' 	=> $existing,
					'saldo_ideal_komponen' 		=> $keb_ideal,
					'jumlah_form'				=> $count

				);

		$where=array(
			'id_komponen' => $data_rkb['kode_komponen'],
			'kode_binprog' => $kode_opd,
			'hapus !=' => 1
		);

		$jumlahkomp=$this->auth_model->get_jumlah_komprkp($where);
		$var=0;
		$jmlhkeb=0;
		foreach ($jumlahkomp->result() as $jmlh) {
				$var+=$jmlh->saldo_kegiatan;
				$jmlhkeb=$jmlh->saldo_komponen;
		}
		$varkeb=$jmlhkeb-$var;
//==========================Untuk Format Ber Register========================================

		if($tanda == 1){ 

			$kegiatareg=$_POST['selectkegiatan1'];
			$reg=$_POST['reg'];
			$saldo=$_POST['saldokeg'];
			$countreg=count($reg);
			$keterangan=$_POST['keterangan1'];
			$nama=$_POST['nama_barang'];
			$merk=$_POST['merk'];
			$tipe=$_POST['tipe'];
			$tahun=$_POST['tahun'];
			$nopol=$_POST['nopol'];
			$mesin=$_POST['mesin'];
			$rangka=$_POST['rangka'];

			date_default_timezone_set("Asia/Jakarta");	
			$date=date("Y-m-d");
			$time=date("H:i:s");
			$getjumsaldokomp=0;
			for($x=0;$x<$countreg;$x++){
				$getjumsaldokomp+=$saldo[$x];
			}

			if($cekvar == 1){
				if($getjumsaldokomp > $kebutuhan) { // Cek apabila jumlah saldo per register lebih dari jumlah kebutuhan barang
					$this->rkpform(1);
				 	} else {
						for($x=0;$x<$countreg;$x++){
							$savedata=array (

									'date'				=> $date,
									'time'				=> $time,
									'kode_binprog' 		=>  $kode_opd,
									'id_kegiatan'		=>  $kegiatareg,
									'register'			=>  $reg[$x],
									'saldo_kegiatan'	=>	$saldo[$x],
									'id_komponen'		=>	$id_komponen,
									'saldo_komponen'	=>	$kebutuhan,
									'saldo_existing_komponen'	=>	$existing,
									'saldo_ideal_komponen'		=>	$keb_ideal,
									'keterangan'				=>	$keterangan[$x],
									'tanda'						=> 'reg'
								);
							$this->auth_model->save_data_rkp($savedata);
							$saveketregister=array(

								'register' 		=> $reg[$x],
								'nama_barang' 	=> $nama[$x],
								'merk_tipe'		=> $merk[$x],
								'tahun'			=> $tahun[$x],
								'no_mesin'		=> $mesin[$x],
								'no_rangka'		=> $rangka[$x],
								'nopol'			=> $nopol[$x]

							);
							$this->auth_model->save_data_register($saveketregister);
											
						}redirect('/home/tabel_rkp');
					}
			   	} elseif ($varkeb >= $getjumsaldokomp){
			   			for($x=0;$x<$countreg;$x++){
			   				$wherecek=array(
										'kode_binprog' => $kode_opd,
										'id_komponen' => $data_rkb['kode_komponen'],
										'register'	 => $reg[$x],
										'hapus !=' => 1
										);
							$cekthis=$this->auth_model->cek_list_rkp($wherecek);
							if($cekthis == false){

								$savedata=array (

									'date'				=> $date,
									'time'				=> $time,
									'kode_binprog' 		=>  $kode_opd,
									'id_kegiatan'		=>  $kegiatareg,
									'register'			=>  $reg[$x],
									'saldo_kegiatan'	=>	$saldo[$x],
									'id_komponen'		=>	$id_komponen,
									'saldo_komponen'	=>	$kebutuhan,
									'saldo_existing_komponen'	=>	$existing,
									'saldo_ideal_komponen'		=>	$keb_ideal,
									'keterangan'				=>	$keterangan[$x],
									'tanda'						=> 'reg'
								);
								$this->auth_model->save_data_rkp($savedata);
								$saveketregister=array(

									'register' 		=> $reg[$x],
									'nama_barang' 	=> $nama[$x],
									'merk_tipe'		=> $merk[$x],
									'tahun'			=> $tahun[$x],
									'no_mesin'		=> $mesin[$x],
									'no_rangka'		=> $rangka[$x],
									'nopol'			=> $nopol[$x]

								);
								$this->auth_model->save_data_register($saveketregister);
								redirect('/home/tabel_rkp');

							} else { $this->rkpform(2); }

							}

			   			} else { $this->rkpform(2); }

			}  else { //==== End Format Ber Register ====

//========================== Untuk Format Non Register ======================================	

				$arrkeg = array();
				$arrbnykkeg = array();
				
				$jumlahsaldokeg=0;
				for ($i=1,$x=0; $i <= $count; $i++,$x++) { 

					$arrkeg[$x]=$_POST['selectkegiatan'.$i];
					$arrbnykkeg[$x]=$_POST['saldokeg'.$i];
					$arrket[$x]=$_POST['keterangan'.$i];
					$jumlahsaldokeg +=$_POST['saldokeg'.$i];
				}

				//Cek Apakah Inputan Jumlah , kurang dari Jumlah Kebutuhan.

				if ($cekvar==1) {
					if ($jumlahsaldokeg > $kebutuhan) {
						$this->rkpform(1);
					} else {
					 	date_default_timezone_set("Asia/Jakarta");	
							$date=date("Y-m-d");
							$time=date("H:i:s");
							for ($i=1,$x=0; $i <= $count; $i++,$x++) {
								$savedata=array (
											'date'				=> $date,
											'time'				=> $time,
											'kode_binprog' 		=>  $data_rkb['kode_binprog'],
											'id_kegiatan'		=>  $arrkeg[$x],
											'saldo_kegiatan'	=>	$arrbnykkeg[$x],
											'id_komponen'		=>	$data_rkb['kode_komponen'],
											'saldo_komponen'	=>	$data_rkb['kebutuhan'],
											'saldo_existing_komponen'	=>	$data_rkb['saldo_existing_komponen'],
											'saldo_ideal_komponen'		=>	$data_rkb['saldo_ideal_komponen'],
											'keterangan'				=>	$arrket[$x],
											'tanda'						=> 'nonreg'
								);
								$this->auth_model->save_data_rkp($savedata);
							}
							redirect('/home/tabel_rkp');
						}
				} else {
					if($varkeb >= $jumlahsaldokeg) {
						for ($i=1,$x=0; $i <= $count; $i++,$x++) {
							$wherecek=array(
										'kode_binprog' => $kode_opd,
										'id_komponen' => $data_rkb['kode_komponen'],
										'id_kegiatan' => $arrkeg[$x],
										'hapus !=' => 1
										);
							$cekthis=$this->auth_model->cek_list_rkp($wherecek);
							if($cekthis == false) {
								date_default_timezone_set("Asia/Jakarta");	
								$date=date("Y-m-d");
								$time=date("H:i:s");
									$savedata=array (
										'date'				=> $date,
										'time'				=> $time,
										'kode_binprog' 		=>  $data_rkb['kode_binprog'],
										'id_kegiatan'		=>  $arrkeg[$x],
										'saldo_kegiatan'	=>	$arrbnykkeg[$x],
										'id_komponen'		=>	$data_rkb['kode_komponen'],
										'saldo_komponen'	=>	$data_rkb['kebutuhan'],
										'saldo_existing_komponen'	=>	$data_rkb['saldo_existing_komponen'],
										'saldo_ideal_komponen'		=>	$data_rkb['saldo_ideal_komponen'],
										'keterangan'				=>	$arrket[$x],
										'tanda'						=> 'nonreg'

									);
									$this->auth_model->save_data_rkp($savedata);

							} else {

									$whereget=array(

											'id_komponen' => $data_rkb['kode_komponen'],
											'id_kegiatan' => $arrkeg[$x],
											'kode_binprog' => $kode_opd,
											'hapus !=' => 1
										);
									$jumlahkomp1=$this->auth_model->get_jumlah_komprkp($whereget);
									$var1=0;
									$var2=0;
									foreach ($jumlahkomp1->result() as $jmlh) {
										$var1+=$jmlh->saldo_kegiatan;

									}
									$wheredatacurrent=array(
										'kode_binprog' => $kode_opd,
										'id_komponen' => $data_rkb['kode_komponen'],
										'id_kegiatan' => $arrkeg[$x]
									);
									$var2=$var1+$arrbnykkeg[$x];
								$this->auth_model->savedatacurrentrkp($wheredatacurrent,$var2);
							}redirect('/home/tabel_rkp');
						}
					} else {$this->rkpform(2);}
				} 
		} // ========== End Format Non Register =======================================================================
	}

	// public function tabel_rkb (){

	// 	$this->cek_sess();
	// 	$kode_opd=$this->session->userdata('kode_opd');
	// 	$data['page']="Tabel Rencana Kebutuhan Barang Modal";
	// 	$data['exist']=$this->cek_jumlah_exist();

	// 	$where=array(

	// 			'unit_id' => $kode_opd
	// 	);	

	// 	$data['data_budget']=$this->auth_model->get_tabel_budgeting_rkb($where);

		
	// 	$this->load->view('h_tablerkb',$data);
	// 	$this->load->view('tabel_rkb_2',$data);
	// 	$this->load->view('h_footerrkb');
	// }

	public function tabel_rkb (){

		$this->cek_sess();
		$kode_opd=$this->session->userdata('kode_opd');
		$data['page']="Tabel Rencana Kebutuhan Barang Modal";
		$data['tabel_rkb']=$this->auth_model->get_tabel_komponen($kode_opd);
		$data['kodeopd']=$kode_opd;
		$data['exist']=$this->cek_jumlah_exist();

		$where=array(

				'kode_binprog' => $kode_opd,
				'hapus !=' => 1

		);

		$cek=$this->auth_model->get_count_rkb($where);
		$simpankeg=array();
		$simpankomp=array();
		foreach ($cek->result() as $key) {
			if ($key->total < 0) {
				$simpankeg[]=$key->id_kegiatan;
				$simpankomp[]=$key->id_komponen;
			}
		}

		$data['minuskeg']=$simpankeg;
		$data['minuskomp']=$simpankomp;
		$this->load->view('h_tablerkb',$data);
		$this->load->view('tabel_rkb',$data);
		$this->load->view('h_footerrkb');
	}


	public function cek_count(){
		$this->cek_sess();
		$kode_opd=$this->session->userdata('kode_opd');

		$wherecek=array(

				'kode_binprog' => $kode_opd,
				'hapus !=' => 1
		);	
		$x=0;
		$cek=$this->auth_model->get_count_rkb($wherecek);

		foreach ($cek->result() as $test) {
			if($test->total != 0){
				$x=1;
				break;
			}
		}

		echo json_encode($x);

	}

	public function cek_count_rkp(){
		$this->cek_sess();
		$kode_opd=$this->session->userdata('kode_opd');

		$wherecek=array(

				'kode_binprog' => $kode_opd,
				'hapus !=' => 1
		);	
		$x=0;
		$cek=$this->auth_model->get_count_rkp($wherecek);

		foreach ($cek->result() as $test) {
			if($test->total != 0){
				$x=1;
				break;
			}
		}

		echo json_encode($x);

	}


	public function desk_komponen (){

		$this->cek_sess();
		$data['page']="List Barang Eksisting";
		$kode_opd=$this->session->userdata('kode_opd');
		$opd=array(
			'kode_binprog' => $kode_opd,
			'tanda_hapus != ' => 1,
			'saldo_existing !=' => 0 

		);
		$data['tabel_rkb']=$this->auth_model->get_tabel_eksisting($opd);
		$data['get_kodebar']=$this->auth_model->get_kodebar("kamus_barang");
		$data['kodeopd']=$kode_opd;
		$data['exist']=$this->cek_jumlah_exist();
		$this->load->view('h_tablerkb',$data);
		$this->load->view('list_desk_komponen',$data);
		$this->load->view('h_footerexist');
	}

	public function show_data_exist(){
		$this->cek_sess();
		$kode_opd=$this->session->userdata('kode_opd');
		$id=$_POST['id'];
		$where=array(
			'id_komponen' => $id,
			'kode_binprog' => $kode_opd,
			'updated !=' => 1  
		);

		$where2=array(
			'id_komponen' => $id,
			'kode_binprog' => $kode_opd,
			'tanda_hapus !=' => 1
		);		
		
		$hasil=$this->auth_model->get_info_exist($where);
		$get_saldoeksisting=$this->auth_model->get_tabel_eksisting($where2);
		$eksisting=$get_saldoeksisting->row();
		if($hasil != false) {
			if($eksisting->saldo_existing == $hasil->num_rows()){
				$status='true';
			} else {$status='false';}
		}

		$x=0;

		if($hasil == false) {
			$result[0]=array('status' => $status);
		} else {

		foreach ($hasil->result() as $key) {

			$result[$x]=array(
				'id' => $key->id,
				'id_komponen' => $key->id_komponen,
				'dipakai_oleh' => $key->dipakai_oleh,
				'penggunaan' => $key->penggunaan,
				'kondisi' => $key->kondisi,
				'register' => $key->register,
				'ket' => $key->keterangan,
				'status' => $status
			);
			$x++;
		 }
		}

		echo json_encode($result);

	}	

	public function tabel_rkp (){

		$this->cek_sess();
		$data['page']="Tabel Rencana Kebutuhan Barang Persediaan";
		$kode_opd=$this->session->userdata('kode_opd');
		$data['kodeopd']=$kode_opd;
		$data['exist']=$this->cek_jumlah_exist();


		$where=array(

				'unit_id' => $kode_opd,

		);

		$data['datarkp']=$this->auth_model->get_tabel_budgeting_rkp($where);

		$this->load->view('h_tablerkb',$data);
		$this->load->view('tabel_rkp_2',$data);
		$this->load->view('footerrkp');




		// $this->cek_sess();
		// $data['page']="Tabel Rencana Kebutuhan Barang Persediaan";
		// $kode_opd=$this->session->userdata('kode_opd');
		// $data['tabel_rkb']=$this->auth_model->get_tabel_kegiatan_rkp($kode_opd);
		// $data['kodeopd']=$kode_opd;
		// $data['exist']=$this->cek_jumlah_exist();


		// $where=array(

		// 		'kode_binprog' => $kode_opd,
		// 		'hapus !=' => 1

		// );

		// $cek=$this->auth_model->get_count_rkp($where);
		// $simpankeg=array();
		// $simpankomp=array();
		// foreach ($cek->result() as $key) {
		// 	if ($key->total < 0) {
		// 		$simpankeg[]=$key->id_kegiatan;
		// 		$simpankomp[]=$key->id_komponen;
		// 	}
		// }
		
		// $data['minuskeg']=$simpankeg;
		// $data['minuskomp']=$simpankomp;
		// $this->load->view('h_tablerkb',$data);
		// $this->load->view('tabel_rkp',$data);
		// $this->load->view('footerrkp');
	}

	public function show_data_komponen(){
		$this->cek_sess();
		$kode_opd=$this->session->userdata('kode_opd');
		$id = $this->input->post('id');
		$whereis = array (
				'tabel_list_rkb.kode_binprog' => $kode_opd,
				'tabel_list_rkb.id_komponen' => $id,
				'tabel_list_rkb.hapus !=' => 1
 		);
		$result = $this->auth_model->get_rincian_kegiatan($whereis);
		echo json_encode($result);
	}

	public function show_data_komponen_rkp(){
		$this->cek_sess();
		$kode_opd=$this->session->userdata('kode_opd');
		$id = $this->input->post('id');
		$whereis = array (
				'tabel_list_rkp.kode_binprog' => $kode_opd,
				'tabel_list_rkp.id_kegiatan' => $id,
				'tabel_list_rkp.hapus !=' => 1
 			);
		$result = $this->auth_model->get_komponen_rkp($whereis,1);
		echo json_encode($result);
	}

	public function delete_data(){
		$this->cek_sess();
		$kode_opd=$this->session->userdata('kode_opd');
		$idrkb=$this->input->post('id');
		date_default_timezone_set("Asia/Jakarta");
		$date=date("Y-m-d");
		$time=date("H:i:s");
		$hapus= array (
			'date'		=> $date,
			'time'		=> $time,
			'hapus' => 1
		);
		$result = $this->auth_model->hapus_data($idrkb,$hapus);
		$where=array('id' => $idrkb);
		$cekdata = $this->auth_model->get_tabel_rkb($where)->row();

		$whereis = array(

			'id_komponen' => $cekdata->id_komponen,
			'kode_binprog' => $kode_opd,
			'hapus !=' => 1
		);

		$gethasil= $this->auth_model->get_tabel_rkb($whereis);

		if ($gethasil->num_rows() <= 0) {

			$whereisbarang = array(

				'id_komponen' => $cekdata->id_komponen,
				'kode_binprog' => $kode_opd
			);

			$this->auth_model->update_barang_exist($whereisbarang,$hapus=array('tanda_hapus' => 1));
			$this->auth_model->update_keterangan_exist($whereisbarang,$hapus=array('updated' => 1));
		}

		echo json_encode($result);
	}

	public function delete_data_exist(){
		$this->cek_sess();
		$kode_opd=$this->session->userdata('kode_opd');
		$ket_exist=$this->input->post('id');
		$idkomp=$this->input->post('idkomp');
		date_default_timezone_set("Asia/Jakarta");
		$date=date("Y-m-d");
		$time=date("H:i:s");
		$hapus2= array (
			'date'		=> $date,
			'time'		=> $time,
			'updated' => 1
		);
		
		
		$result = $this->auth_model->hapus_data_exist($ket_exist,$hapus2);

		$whereexist=array('id_komponen' => $idkomp, 'kode_binprog' => $kode_opd);
		$whereexist2=array('id_komponen' => $idkomp, 'kode_binprog' => $kode_opd, 'updated !=' => 1);
		$hasil_keteranganeksist = $this->auth_model->get_info_exist($whereexist2 ); //Tabel Keterangan
		$hasil_barangeksist = $this->auth_model->get_tabel_eksisting($whereexist); //Tabel Barang Eksisting


		
		if ($result == true) {
			if($hasil_keteranganeksist != false and $hasil_barangeksist != false) {	

				if ($hasil_barangeksist->num_rows() == $hasil_keteranganeksist->num_rows()) {

					$hapus = array ('updated' => "true");

				} else if ($hasil_keteranganeksist->num_rows() > $hasil_barangeksist->num_rows()) {
					$hapus = array ('updated' => "lebih");
				} else { $hapus = array ('updated' => "false"); }

			} else {$hapus = array ('updated' => "false");} 	
			

			$updt=array(
					'kode_binprog' => $kode_opd,
					'id_komponen' => $idkomp
				);
			$this->auth_model->update_barang_exist($updt,$hapus);
			$json = "Penghapusan Data Komponen Berhasil";

		} else {$json = "Maaf Penghapusan Data Komponen Gagal";}

		echo json_encode($json);
	}

	public function delete_data_rkp(){
		$this->cek_sess();
		$idrkb=$this->input->post('id');
		date_default_timezone_set("Asia/Jakarta");
		$date=date("Y-m-d");
		$time=date("H:i:s");
		$hapus= array (
			'date'		=> $date,
			'time'		=> $time,
			'hapus' => 1
		);
		$result = $this->auth_model->hapus_data_rkp($idrkb,$hapus);
		echo json_encode($result);
	}

	public function edit_data($idrkb1="null",$idkomp1="null"){
		$this->cek_sess();
		$kode_opd=$this->session->userdata('kode_opd');
		$varcek=0;
		if($idrkb1 == "null" and $idkomp1 == "null") {
			$idrkb=$this->input->post('idrkb');
			$idkompnya=$this->input->post('idkomp');
		} else {
			$idrkb=$idrkb1;
			$idkompnya=$idkomp1;
			$varcek=1;
		}
		$bmsaja= array(
				'tabel_list_rkb.kode_binprog' => $kode_opd,
				'tabel_list_rkb.id_komponen' => $idkompnya,
				'tabel_list_rkb.hapus !=' => 1
			);
		$ambildinas = array (
				'kode_binprog' => $kode_opd
		);
		$idwhere = array (
				'tabel_list_rkb.id' => $idrkb,
 			);
		$data['get_kegiatan']=$this->auth_model->get_kegiatan('tabel_kegiatan',$ambildinas);
		$data['get_komponen']=$this->auth_model->get_komponen($bmsaja,1);
		$data['perkomp']=$this->auth_model->get_perkomponen($idwhere);
		$data['page']="Rencana Kebutuhan / Edit Barang Modal";
		$data['varcek']=$varcek;
		$data['exist']=$this->cek_jumlah_exist();
		$this->load->view('header',$data);
		$this->load->view('edit_rkb',$data);
		$this->load->view('footerrkbform');
	}

	public function edit_data_rkp($idrkb1="null",$idkomp1="null"){
		$this->cek_sess();
		$kode_opd=$this->session->userdata('kode_opd');
		$varcek=0;
		if($idrkb1 == "null" and $idkomp1 == "null") {
			$idrkb=$this->input->post('idrkb');
			$idkompnya=$this->input->post('idkomp');
		} else {
			$idrkb=$idrkb1;
			$idkompnya=$idkomp1;
			$varcek=1;
		}
		$bmsaja= array(
				'tabel_list_rkp.kode_binprog' => $kode_opd,
				'tabel_list_rkp.id_komponen' => $idkompnya,
				'tabel_list_rkp.hapus !=' => 1
			);
		$kode_opd=$this->session->userdata('kode_opd');
		$ambildinas = array (
				'kode_binprog' => $kode_opd
		);
		$idwhere = array (
				'tabel_list_rkp.id' => $idrkb,
 			);
		$data['get_kegiatan']=$this->auth_model->get_kegiatan('tabel_kegiatan',$ambildinas);
		$data['get_komponen']=$this->auth_model->get_komponen_rkp($bmsaja,1);
		$data['perkomp']=$this->auth_model->get_perkomponen_rkp($idwhere);
		$data['page']="Rencana Kebutuhan / Edit Barang Persediaan";
		$data['varcek']=$varcek;
		$data['exist']=$this->cek_jumlah_exist();
		$this->load->view('header',$data);
		$this->load->view('edit_rkp',$data);
		$this->load->view('footerrkpform');
	}


	public function update_eksisting ($id_komp,$existing){
		$this->cek_sess();
		$kode_opd=$this->session->userdata('kode_opd');

		$whereexist=array('id_komponen' => $id_komp, 'kode_binprog' => $kode_opd, 'updated !=' => 1);
		$hasil = $this->auth_model->get_info_exist($whereexist);



		$where = array (

				'id_komponen' => $id_komp,
				'kode_binprog' => $kode_opd,
				'tanda_hapus != ' => 1
		);


		if($hasil != false){

			if($hasil->num_rows() == $existing){

				$update = array (

					'saldo_existing' => $existing,
					'tanda_hapus' => 2,
					'updated' => "true"

				);	
			} else if ($hasil->num_rows() > $existing){

					$update = array (

							'saldo_existing' => $existing,
							'tanda_hapus' => 2,
							'updated' => "lebih"

					);
				} else {

					$update = array (

							'saldo_existing' => $existing,
							'tanda_hapus' => 2,
							'updated' => "false"

					);

				 }

		} else {

			$update = array (

							'saldo_existing' => $existing,
							'tanda_hapus' => 2,
							'updated' => "false"

					);

			}

		$this->auth_model->update_barang($update,$where);

		
		return;
	}


	public function save_update() {
		$this->cek_sess();
		$kode_opd=$this->session->userdata('kode_opd');
		$id_rkb = $_POST['id_rkb'];
		$keb_ideal = $_POST['keb_ideal'];
		$existing = $_POST['existing'];
		$kebutuhan=$_POST['kebutuhan'];
		$keterangan=$_POST['keterangan'];
		$keterangan=$_POST['keterangan'];
		$salkeg=$_POST['salkeg'];
		$total_saldo_komp=$_POST['tot_komp'];
		$id_komp=$_POST['id_komp'];

		//======================================================================================//
		$whereis = array (
					'tabel_list_rkb.id' => $id_rkb
				);

		$getkomp=$this->auth_model->get_komponen($whereis,2);
		$getsaldokegcurrent=$getkomp->saldo_kegiatan;
		$selisihsaldokeg = $salkeg - $getsaldokegcurrent;
		$bandingkebutuhan = $total_saldo_komp + $selisihsaldokeg;  


		if($bandingkebutuhan <= $kebutuhan) {

				$savedata=array (
								'id_tbl_rkb'			=>$id_rkb,
								'date_lama'				=> $getkomp->date,
								'time_lama'				=> $getkomp->time,
								'kode_binprog' 		=>  $getkomp->kode_binprog,
								'id_kegiatan'		=>  $getkomp->id_kegiatan,
								'saldo_kegiatan_lama'	=>	$getkomp->saldo_kegiatan,
								'id_komponen'		=>	$getkomp->id_komponen,
								'saldo_komponen_lama'	=>	$getkomp->saldo_komponen,
								'saldo_existing_komponen_lama'	=>	$getkomp->saldo_existing_komponen,
								'saldo_ideal_komponen_lama'		=>	$getkomp->saldo_ideal_komponen,
								'keterangan_lama'				=>	$getkomp->keterangan

				);
					//print_r($savedata);
					//echo "<p>";
					//echo "<p>";

					$this->auth_model->save_update_lama($savedata);

					date_default_timezone_set("Asia/Jakarta");
					$date=date("Y-m-d");
					$time=date("H:i:s");
					$update= array(
						'date'	=> $date,
						'time'	=> $time,
						'saldo_ideal_komponen' => $keb_ideal,
						'saldo_existing_komponen' => $existing,
						'saldo_komponen'	=> $kebutuhan,
						'saldo_kegiatan'	=> $salkeg,
						'keterangan'	=> $keterangan,
						'hapus'			=> 2
					);

					$this->auth_model->save_update_baru($id_rkb,$update);
					$where = array(

						'kode_binprog' => $kode_opd,
						'id_komponen' => $id_komp,
						'id != ' => $id_rkb

					);
					$update2 = array(

						'saldo_ideal_komponen' => $keb_ideal,
						'saldo_existing_komponen' => $existing,
						'saldo_komponen'	=> $kebutuhan,
					);
					$this->auth_model->save_update_baru2($where,$update2);
					$this->update_eksisting($id_komp,$existing);
					redirect('home/tabel_rkb');

			} else { $this->edit_data($id_rkb,$id_komp); }

	}

	
	public function save_update_rkp() {
		$this->cek_sess();
		$kode_opd=$this->session->userdata('kode_opd');
		$id_rkp = $_POST['id_rkb'];
		$keb_ideal = $_POST['keb_ideal'];
		$existing = $_POST['existing'];
		$kebutuhan=$_POST['kebutuhan'];
		$keterangan=$_POST['keterangan'];
		$keterangan=$_POST['keterangan'];
		$salkeg=$_POST['salkeg'];
		$total_saldo_komp=$_POST['tot_komp'];
		$id_komp=$_POST['id_komp'];

		//======================================================================================//

		$whereis = array (
					'tabel_list_rkp.id' => $id_rkp
				);
		$getkomp=$this->auth_model->get_komponen_rkp($whereis,2);
		$getsaldokegcurrent=$getkomp->saldo_kegiatan;
		$selisihsaldokeg = $salkeg - $getsaldokegcurrent;
		$bandingkebutuhan = $total_saldo_komp + $selisihsaldokeg;  


		if($bandingkebutuhan <= $kebutuhan) {
				$savedata=array (
								'id_tbl_rkp'			=>$id_rkp,
								'date_lama'				=> $getkomp->date,
								'time_lama'				=> $getkomp->time,
								'register'			=> $getkomp->register,
								'kode_binprog' 		=>  $getkomp->kode_binprog,
								'id_kegiatan'		=>  $getkomp->id_kegiatan,
								'saldo_kegiatan_lama'	=>	$getkomp->saldo_kegiatan,
								'id_komponen'		=>	$getkomp->id_komponen,
								'saldo_komponen_lama'	=>	$getkomp->saldo_komponen,
								'saldo_existing_komponen_lama'	=>	$getkomp->saldo_existing_komponen,
								'saldo_ideal_komponen_lama'		=>	$getkomp->saldo_ideal_komponen,
								'keterangan_lama'				=>	$getkomp->keterangan

				);
					//print_r($savedata);
					//echo "<p>";
					//echo "<p>";
					$this->auth_model->save_update_lamarkp($savedata);


					date_default_timezone_set("Asia/Jakarta");
					$date=date("Y-m-d");
					$time=date("H:i:s");
					$update= array(
						'date'	=> $date,
						'time'	=> $time,
						'saldo_ideal_komponen' => $keb_ideal,
						'saldo_existing_komponen' => $existing,
						'saldo_komponen'	=> $kebutuhan,
						'saldo_kegiatan'	=> $salkeg,
						'keterangan'	=> $keterangan,
						'hapus'			=> 2
					);
					//print_r($update);
					//echo "<p><p>".$kebutuhan." >= ".$total_saldo_komp;
					//echo "<p><p>".$kebutuhan." >= ".$salkeg;
					$this->auth_model->save_update_barurkp($id_rkp,$update);

					$where = array(

						'kode_binprog' => $kode_opd,
						'id_komponen' => $id_komp,
						'id != ' => $id_rkp

					);
					$update2 = array(

						'saldo_ideal_komponen' => $keb_ideal,
						'saldo_existing_komponen' => $existing,
						'saldo_komponen'	=> $kebutuhan,
					);

					$this->auth_model->save_update_barurkp2($where,$update2);
					redirect('home/tabel_rkp');
			} else { $this->edit_data_rkp($id_rkp,$id_komp); }

	}

	public function list_kegiatan(){
		$this->cek_sess();
		$data['page']="List Kegiatan";
		$kode_opd=$this->session->userdata('kode_opd');
		$where = array(

			'kode_binprog' => $kode_opd,
 		);

		$data['get_keg']=$this->auth_model->get_kegiatan_all($where);
		$data['exist']=$this->cek_jumlah_exist();
		$this->load->view('h_tablerkb',$data);
		$this->load->view('list_tabel_kegiatan',$data);
		$this->load->view('h_footerrkb');
	}

	public function list_komponen(){
		$this->cek_sess();
		$data['page']="List Kegiatan";
		$kode_opd=$this->session->userdata('kode_opd');
		$where = array(

			'kode_rek_lvl1' => '5.2.3'
		);
		$data['get_keg']=$this->auth_model->get_komponen_all($where);
		$data['exist']=$this->cek_jumlah_exist();
		$this->load->view('h_tablerkb',$data);
		$this->load->view('list_tabel_komponen',$data);
		$this->load->view('h_footerrkb');
	}

	public function list_komponen522(){
		$this->cek_sess();
		$data['page']="List Kegiatan";
		$kode_opd=$this->session->userdata('kode_opd');
		$where = array(

			'kode_rek_lvl1' => '5.2.2'
		);
		$data['get_keg']=$this->auth_model->get_komponen_all($where);
		$data['exist']=$this->cek_jumlah_exist();
		$this->load->view('h_tablerkb',$data);
		$this->load->view('list_tabel_komponen522',$data);
		$this->load->view('h_footerrkb');
	}

	public function showhistory(){
		$this->cek_sess();
		$kode_opd=$this->session->userdata('kode_opd');


		$where = array (

			'jurnal_update.kode_binprog' => $kode_opd,
		);
		$get=$this->auth_model->showhistory($where);

	}

	public function saverincianexist(){
		$this->cek_sess();
		$kode_opd=$this->session->userdata('kode_opd');
		$idkomponen=$_POST['idsementara'];
		$register=$_POST['regsave'];
		$kondisi=$_POST['kondisi'];
		$pemanfaatan=$_POST['pemanfaatan'];
		$digunakan=$_POST['digunakan'];
		$ketlanjut=$_POST['ketlanjut'];
		date_default_timezone_set("Asia/Jakarta");
		$date=date("Y-m-d");
 		$time=date("H:i:s");

		$exist=array(

			'id_komponen' => $idkomponen,
			'kode_binprog' => $kode_opd,
			'date' => $date,
			'time' => $time,
			'register' => $register,
			'kondisi' => $kondisi,
			'penggunaan' => $pemanfaatan,
			'dipakai_oleh' => $digunakan,
			'keterangan' => $ketlanjut
		);

		$this->auth_model->save_register_existing('keterangan_eksisting',$exist);

		$where=array(
			'id_komponen' => $idkomponen,
			'kode_binprog' => $kode_opd,
			'updated !=' => 1  
		);
		$hasil=$this->auth_model->get_info_exist($where);

		$where2=array(
			'id_komponen' => $idkomponen,
			'kode_binprog' => $kode_opd,
			'tanda_hapus !=' => 1  
		);	

		$get_saldoeksisting=$this->auth_model->get_tabel_eksisting($where2)->row();

		if($get_saldoeksisting->saldo_existing == $hasil->num_rows()){
			 $jumlah="true";
		} else {$jumlah="false";}
		echo $jumlah;

		$jumlahnya=array('updated' => $jumlah);
		$where=array('kode_binprog' => $kode_opd, 'id_komponen' => $idkomponen);
		$this->auth_model->update_barang($jumlahnya,$where);

		redirect('home/desk_komponen');


	}

	function find()
	{	
		if ($handle = opendir('ini_assets/upload/')) {
			while (false !== ($fileName = readdir($handle))) {
				$newName = str_replace("Certificate","?",$fileName);
				rename($fileName, $newName);
			}
			closedir($handle);
		}

	}


	//=============== EXPORT EXCEL ==========================//

    public function export_excel_rekap_perupt()
	{
		$this->cek_sess();

		
		
		// echo '<pre>' , var_dump($rekap_opd) , '</pre>';
		// die()

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
        $objPHPExcel->getActiveSheet()->setCellValue('C3', "Jenis Aset");
        $objPHPExcel->getActiveSheet()->setCellValue('D3', "Total Register");
        $objPHPExcel->getActiveSheet()->setCellValue('E3', "Register Telah Di Verif");
        $objPHPExcel->getActiveSheet()->setCellValue('F3', "Register Masih Proses Verif");
        $objPHPExcel->getActiveSheet()->setCellValue('G3', "Register Di Tolak");
        $objPHPExcel->getActiveSheet()->setCellValue('H3', "Register Belum Di Kerjakan");
        // $objPHPExcel->getActiveSheet()->setCellValue('I3', "Persentase");
		
		$objPHPExcel->getActiveSheet()->getStyle('A3:H3')->getFont()->setBold( true );
		$objPHPExcel->getActiveSheet()->getStyle('A1')->getNumberFormat()->setFormatCode('#,##0.00');
		
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
        // $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
		
        // Add data
		$i=4;
		$no=1;

		$jumlah_register=$this->form_model->get_rekap_opd_admin();
		
        foreach ($jumlah_register as $row) 
        {
			if($row->kode_barang == '1.3.1') {
				$kode_barang = 'Tanah';
			} elseif ($row->kode_barang == '1.3.2') {
				$kode_barang = 'Peralatan dan Mesin';
			} elseif ($row->kode_barang == '1.3.3') {
				$kode_barang = 'Gedung dan Bangunan';
			} elseif ($row->kode_barang == '1.3.4') {
				$kode_barang = 'Jalan, Irigasi dan Jaringan';
			} elseif ($row->kode_barang == '1.3.5') {
				$kode_barang = 'Aset Tetap Lainnya';	
			} else{
				$kode_barang = 'Aset Tak Berwujud';
			}

			$proses_inv=$this->form_model->get_kerjaan_pb($row->nomor_unit,$row->kode_barang);

			// echo $proses_inv->num_rows()."<p>";
			
			if($proses_inv->num_rows() < 1) {

				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A' . $i, $no);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B' . $i, strtoupper($row->unit));
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C' . $i, strtoupper($kode_barang));;
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D' . $i, (int)$row->jumlah);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E' . $i, '0');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F' . $i, '0');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G' . $i, '0');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H' . $i, (int)$row->jumlah);
			} else {
				$get=$proses_inv->row();
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A' . $i, $no);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B' . $i, strtoupper($row->unit));
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C' . $i, strtoupper($kode_barang));;
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D' . $i, (int)$row->jumlah);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E' . $i, (int)$get->verif);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F' . $i, (int)$get->proses);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G' . $i, (int)$get->tolak);
				
				 $selisih = $row->jumlah - ($get->verif + $get->proses + $get->tolak);
        		 $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H' . $i, $selisih < 0 ? 0 : (int)$selisih);
				// $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I' . $i, round((float)$row->persentase,3).'%');
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
        $objPHPExcel->getActiveSheet()->getStyle('A3:H3')->applyFromArray($stil);
		$objPHPExcel->getActiveSheet()->getStyle('A1:H1')->applyFromArray($stil);
		$objPHPExcel->getActiveSheet()->getStyle('A4:H'.$i)->applyFromArray($stil);
		
		

        
        
        // Save Excel xls File
        $filename="Rekap Persentase Register Inventarisasi All OPD - ".date('Ymd').".xls";
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        ob_end_clean();
		header('Last-Modified:'. gmdate("D, d M Y H:i:s").'GMT');
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename='.$filename);
        $objWriter->save('php://output');    

	}


    //=========================== END EXCEL =============================================================//
}


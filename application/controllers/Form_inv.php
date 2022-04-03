<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_inv extends CI_Controller {

    
    public function index ($id)
	{	
		$this->cek_sess();
		$data['page']="Form Inventarisasi";
        $data['exist']=$this->cek_jumlah_exist();
		$nomor_lokasi=$this->session->userdata('no_lokasi');

        $where = array (
            'ekstrakomtabel' =>  NULL
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

        $data['register']=$this->form_model->get_all_register($where,$nomor_lokasi,$kib);
        $this->load->view('h_tablerkb',$data);		
		$this->load->view('form_page');
		$this->load->view('h_footerrkb');		
		
	}

    public function isi_formulir()
    {
        $this->cek_sess();
		$data['page']="Isi Form Inventarisasi";
        $data['exist']=$this->cek_jumlah_exist();
		$data['kode_barang']=$this->form_model->data_kode_barang();
		$data['satuan']=$this->form_model->data_satuan();

		
		$register = $_POST['register'];
		$where = array ( 'register' => $register );
		
		$data['data_register'] = $this->form_model->ambil_register($where);

        $this->load->view('header',$data);		
		$this->load->view('isi_form',$data);
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

	public function cetak_form()
	{
       	$this->pdf->load_view('cetak_form_inv');
		$this->pdf->set_paper("legal", "portrait");
		$this->pdf->render();
		// $this->pdf->stream("name-file.pdf");
		$this->pdf->stream("dompdf_out.pdf", array("Attachment" => false));
		
	}

	public function save_isi_form_peralatan_mesin()
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

		$alamat=$_POST['alamat'];

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

		if (isset($_POST['koordinat'])){
			$koordinat = $_POST['koordinat'];
		} else {$koordinat = "-";}

		if (isset($_POST['lainnya'])){
			$lainnya = $_POST['lainnya'];
		} else {$lainnya = "-";}

		$keterangan=$_POST['keterangan'];

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

		$data_form_isian = array(
		'register' => $register,
		'kode_barang' => $kode_barang,
		'nama_barang' => $nama_barang,
		'spesifikasi_barang_merk' => $merk,
		'satuan' => $satuan,
		'keberadaan_barang' => $keberadaan,
		'nilai_perolehan' => $nilai,
		'merupakan_anak' => $aset_atrib,
		'alamat' => $alamat,
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
		'koordinat' => $koordinat,
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

		//Save Di tabel register_isi
		$this->form_model->save_isi_form($data_form_isian);

		//Save Di tabel register status
		$this->form_model->save_status_register($data_is_form);

		//Membuat tanda di data kib
		$this->form_model->tandai_kib($register);

		redirect('/Form_inv/index/2');


	}


}
?>
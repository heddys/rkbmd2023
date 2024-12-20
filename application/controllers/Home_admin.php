<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_admin extends CI_Controller {

    public function index()
    {
        $this->cek_sess();

        $data['page']="Dashboard Admin";

		// $data['get_data_chart']=$this->admin_model->get_data_chart(1);
		// $data['get_proses_reg']=$this->admin_model->get_proses_reg(1);
        // $data['get_tolak_reg']=$this->admin_model->get_tolak_reg(1);
		// $data['rekap_opd']=$this->admin_model->get_rekap_opd_admin_dashboard();

		$data_rekap = array();

		// $get_opd = $this->admin_model->get_opd();

		// foreach ($get_opd as $row) {
		// 	$get_total_kib = $this->admin_model->get_kib($row->nomor_unit)->row();
		// 	$get_proses = $this->admin_model->get_rekap_opd_admin_dashboard($row->nomor_unit)->row();

		// 	$sisa_inv = $get_total_kib->jum_kib-($get_proses->proses+$get_proses->verif+$get_proses->tolak);
		// 	$persentase = ($get_proses->proses+$get_proses->verif+$get_proses->tolak)/$get_total_kib->jum_kib*100;

		// 	$data_rekap[] = array(
		// 			'unit' => $row->unit,
		// 			'nomor_unit' => $row->nomor_unit,
		// 			'total' => $get_total_kib->jum_kib,
		// 			'proses' => $get_proses->proses,
		// 			'verif' => $get_proses->verif,
		// 			'tolak' => $get_proses->tolak,
		// 			'sisa' => $sisa_inv,
		// 			'persentase' => $persentase
		// 	);
			
		// }	

		// Fetch all data in one go
		// $get_opd_data = $this->admin_model->get_opd_data();

		// foreach ($get_opd_data as $row) {
		// 	$sisa_inv = $row->jum_kib - ($row->proses + $row->verif + $row->tolak);
		// 	$persentase = ($row->proses + $row->verif + $row->tolak) / $row->jum_kib * 100;

		// 	$data_rekap[] = array(
		// 		'unit' => $row->unit,
		// 		'nomor_unit' => $row->nomor_unit,
		// 		'total' => $row->jum_kib,
		// 		'proses' => $row->proses,
		// 		'verif' => $row->verif,
		// 		'tolak' => $row->tolak,
		// 		'sisa' => $sisa_inv,
		// 		'persentase' => $persentase
		// 	);
		// }

		// echo '<pre>' , var_dump($data_rekap) , '</pre>';
		// die();

		$data['rekap_opd'] = $data_rekap;

        $this->load->view('admin/header_admin',$data);		
		$this->load->view('admin/admin_page');
		$this->load->view('admin/footer_admin');
    }

    private function cek_sess() 
	{
		if($this->session->userdata('role') =="Admin" ){
			$this->load->model('admin_model');
			return;
			} else { 
				redirect('auth');
			}
	}

	public function get_rekapan_aset() {
		$this->cek_sess();

        $nomor_unit=$this->input->post('unit');

		$rekap_tanah=$this->admin_model->data_progres_opd_tanah($nomor_unit)->row();
		$rekap_pm=$this->admin_model->data_progres_opd_pm($nomor_unit)->row();
		$rekap_gdb=$this->admin_model->data_progres_opd_gdb($nomor_unit)->row();
		$rekap_jij=$this->admin_model->data_progres_opd_jij($nomor_unit)->row();
		$rekap_atl=$this->admin_model->data_progres_opd_atl($nomor_unit)->row();
		$rekap_atb=$this->admin_model->data_progres_opd_atb($nomor_unit)->row();
		$total_tanah = $this->admin_model->get_kib_per_aset('1.3.01',$nomor_unit)->row();
		$total_pm = $this->admin_model->get_kib_per_aset('1.3.02',$nomor_unit)->row();
		$total_gdb = $this->admin_model->get_kib_per_aset('1.3.03',$nomor_unit)->row();
		$total_jij = $this->admin_model->get_kib_per_aset('1.3.04',$nomor_unit)->row();
		$total_atl = $this->admin_model->get_kib_per_aset('1.3.05',$nomor_unit)->row();
		$total_atb = $this->admin_model->get_kib_per_aset('1.5.03',$nomor_unit)->row();

		$sisa_tanah = $total_tanah->jum_kib - ($rekap_tanah->proses + $rekap_tanah->verif + $rekap_tanah->tolak);
		$sisa_pm = $total_pm->jum_kib - ($rekap_pm->proses + $rekap_pm->verif + $rekap_pm->tolak);
		$sisa_gdb = $total_gdb->jum_kib - ($rekap_gdb->proses + $rekap_gdb->verif + $rekap_gdb->tolak);
		$sisa_jij = $total_jij->jum_kib - ($rekap_jij->proses + $rekap_jij->verif + $rekap_jij->tolak);
		$sisa_atl = $total_atl->jum_kib - ($rekap_atl->proses + $rekap_atl->verif + $rekap_atl->tolak);
		$sisa_atb = $total_atb->jum_kib - ($rekap_atb->proses + $rekap_atb->verif + $rekap_atb->tolak);

		if($total_tanah->jum_kib == 0) {
			$persentase_tanah = 0.00;
		} else {
			$persentase_tanah = ($rekap_tanah->proses + $rekap_tanah->verif + $rekap_tanah->tolak) / $total_tanah->jum_kib*100;
		}

		if($total_pm->jum_kib == 0) {
			$persentase_pm = 0.000;
		} else {
			$persentase_pm = ($rekap_pm->proses + $rekap_pm->verif + $rekap_pm->tolak) / $total_pm->jum_kib*100;
		}
		
		if($total_gdb->jum_kib == 0) {
			$persentase_gdb = 0.000;
		} else {
			$persentase_gdb = ($rekap_gdb->proses + $rekap_gdb->verif + $rekap_gdb->tolak) / $total_gdb->jum_kib*100;
		}

		if($total_jij->jum_kib == 0) {
			$persentase_jij = 0.000;
		} else {
			$persentase_jij = ($rekap_jij->proses + $rekap_jij->verif + $rekap_jij->tolak) / $total_jij->jum_kib*100;
		}

		if($total_atl->jum_kib == 0) {
			$persentase_atl = 0.000;
		} else {
			$persentase_atl = ($rekap_atl->proses + $rekap_atl->verif + $rekap_atl->tolak) / $total_atl->jum_kib*100;
		}

		if($total_atb->jum_kib == 0) {
			$persentase_atb = 0.000;
		} else {
			$persentase_atb = ($rekap_atb->proses + $rekap_atb->verif + $rekap_atb->tolak) / $total_atb->jum_kib*100;
		}

		// $persentase_gdb = ($rekap_gdb->proses + $rekap_gdb->verif + $rekap_gdb->tolak) / $total_gdb->jum_kib*100;
		// $persentase_jij = ($rekap_jij->proses + $rekap_jij->verif + $rekap_jij->tolak) / $total_jij->jum_kib*100;
		// $persentase_atl = ($rekap_atl->proses + $rekap_atl->verif + $rekap_atl->tolak) / $total_atl->jum_kib*100;
		// $persentase_atb = ($rekap_atb->proses + $rekap_atb->verif + $rekap_atb->tolak) / $total_atb->jum_kib*100;

		$data_rekap = array (
			'persentase_tanah' => round((float)$persentase_tanah,3),
			'persentase_pm' => round((float)$persentase_pm,3),
			'persentase_gdb' => round((float)$persentase_gdb,3),
			'persentase_jij' => round((float)$persentase_jij,3),
			'persentase_atl' => round((float)$persentase_atl,3),
			'persentase_atb' => round((float)$persentase_atb,3),
			'rekap_tot_tanah' => number_format($total_tanah->jum_kib),
			'rekap_tot_pm' => number_format($total_pm->jum_kib),
			'rekap_tot_gdb' => number_format($total_gdb->jum_kib),
			'rekap_tot_jij' => number_format($total_jij->jum_kib),
			'rekap_tot_atl' => number_format($total_atl->jum_kib),
			'rekap_tot_atb' => number_format($total_atb->jum_kib),
			'rekap_pros_tanah' => number_format($rekap_tanah->proses),
			'rekap_pros_pm' => number_format($rekap_pm->proses),
			'rekap_pros_gdb' => number_format($rekap_gdb->proses),
			'rekap_pros_jij' => number_format($rekap_jij->proses),
			'rekap_pros_atl' => number_format($rekap_atl->proses),
			'rekap_pros_atb' => number_format($rekap_atb->proses),
			'rekap_tolak_tanah' => number_format($rekap_tanah->tolak),
			'rekap_tolak_pm' => number_format($rekap_pm->tolak),
			'rekap_tolak_gdb' => number_format($rekap_gdb->tolak),
			'rekap_tolak_jij' => number_format($rekap_jij->tolak),
			'rekap_tolak_atl' => number_format($rekap_atl->tolak),
			'rekap_tolak_atb' => number_format($rekap_atb->tolak),
			'rekap_verif_tanah' => number_format($rekap_tanah->verif),
			'rekap_verif_pm' => number_format($rekap_pm->verif),
			'rekap_verif_gdb' => number_format($rekap_gdb->verif),
			'rekap_verif_jij' => number_format($rekap_jij->verif),
			'rekap_verif_atl' => number_format($rekap_atl->verif),
			'rekap_verif_atb' => number_format($rekap_atb->verif),
			'rekap_sisa_tanah' => number_format($sisa_tanah),
			'rekap_sisa_pm' => number_format($sisa_pm),
			'rekap_sisa_gdb' => number_format($sisa_gdb),
			'rekap_sisa_jij' => number_format($sisa_jij),
			'rekap_sisa_atl' => number_format($sisa_atl),
			'rekap_sisa_atb' => number_format($sisa_atb)
		);

		// echo "<pre>";
		// var_dump($data_rekap);
		// echo "</pre>";

		echo json_encode($data_rekap);
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

			$exist = $this->admin_model->cek_register($row->register,'data_kib');
			
			
			if($exist->num_rows() < 1) {
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

				$exist = $this->admin_model->cek_register($row->register,'data_kib');

				if($exist < 1) { 

					$data_for_kib=array (
						'nomor_lokasi' => $row->nomor_lokasi_baru,
						'kode64_baru' => $row->$row->kode64_baru,
						'kode108_baru' => $row->kode108_baru,
						'status_simbada' => $row->hapus,
						'penghapusan' => $row->penghapusan,
						'update_at_date' => $date,
						'update_at_time' => $time
					);

					$this->admin_model->update_data($register,$data_for_kib,'data_kib');

				} else {

					$data_for_isi=array(
						'nomor_lokasi_awal' => $row->nomor_lokasi_baru,
						'lokasi' => $row->nomor_lokasi_baru,
						'kode_barang' => $row->kode108_baru,
						'update_at_date' => $date,
						'update_at_time' => $time
					);

					$this->admin_model->update_data($register,$data_for_isi,'register_isi');
					$get_data_register_isi=$this->admin_model->get_data_reg_isi($register)-row();

					$data_for_isi_history=array(
						`register` => $register,
						`nomor_lokasi_awal` => $get_data_register_isi->nomor_lokasi_baru,
						`kode_barang` => $get_data_register_isi->kode108_baru,
						`nama_barang` => $get_data_register_isi->nama_barang,
						`spesifikasi_barang_merk` => $get_data_register_isi-> spesifikasi_barang_merk,
						`satuan` => $get_data_register_isi->satuan,
						`keberadaan_barang` => $get_data_register_isi->keberadaan_barang,
						`nilai_perolehan` => $get_data_register_isi->nilai_perolehan,
						`merupakan_anak` => $get_data_register_isi->merupakan_anak,
						`lokasi` => $get_data_register_isi->lokasi,
						`jumlah` => $get_data_register_isi->jumlah,
						`kondisi_barang` => $get_data_register_isi->kondisi_barang,
						`penggunaan_barang` => $get_data_register_isi->penggunaan_barang,
						`register_ganda` => $get_data_register_isi->register_ganda,
						`status_kepemilikan_tanah` => $get_data_register_isi->status_kepemilikan_tanah,
						`tipe` => $get_data_register_isi->tipe,
						`nopol` => $get_data_register_isi->nopol,
						`no_rangka_seri` => $get_data_register_isi->no_rangka_seri,
						`no_mesin`=> $get_data_register_isi->no_mesin,
						`no_bpkb`=> $get_data_register_isi->no_bpkb,
						`jenis_perkerasan_jalan`=> $get_data_register_isi->jenis_perkerasan_jalan,
						`jenis_bahan_jembatan`=> $get_data_register_isi->jenis_bahan_jembatan,
						`no_ruas`=> $get_data_register_isi->no_ruas,
						`no_jaringan_irigasi`=> $get_data_register_isi->no_jaringan_irigasi,
						`luas_tanah`=> $get_data_register_isi->luas_tanah,
						`luas_bangunan`=> $get_data_register_isi->luas_bangunan,
						`no_sertifikat`=> $get_data_register_isi->no_sertifikat,
						`kota`=> $get_data_register_isi->kota,
						`kecamatan`=> $get_data_register_isi->kecamatan,
						`kelurahan`=> $get_data_register_isi->kelurahan,
						`created_date`=> $date,
						`created_time`=> $time,
						`lainnya`=> $get_data_register_isi->lainnya,
						`koordinat`=> $get_data_register_isi->koordinat,
						`keterangan`=> $get_data_register_isi->keterangan,
						`update_at_date`=> $date,
						`update_at_time`=> $time
					);
					$this->admin_model->insert_data_history($data_for_isi_history,'register_isi_history');	
				}
			} 

		}
		$result=TRUE;
		echo json_encode($result);


	}

	public function update_data_fix()
	{
		$this->cek_sess();

		ini_set('memory_limit', '-1');
		ini_set('max_execution_time', '0');
		date_default_timezone_set("Asia/Jakarta");	
		$date=date("Y-m-d");
		$time=date("H:i:s");
		$get_sawal = $this->admin_model->update_sawal_simbada()->result();

		echo "<h2>Proses Updating Data Saldo Awal </h2>";

		foreach ($get_sawal as $row) {
			$get_154=substr($row->kode108_baru, 0, 5);
			$exist = $this->admin_model->cek_register($row->register,'data_kib');
			$get_status=$exist->row();
			
			if($exist->num_rows() < 1 && $get_154 != '1.5.4') {

				$data_reg= array (

					'register' => $row->register,
 					'kode_108' => $row->kode_108,
					'kode_64' => $row->kode_64,
					'nomor_lokasi' => $row->nomor_lokasi,
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
					'nomor_lokasi_baru' => $row->nomor_lokasi_baru,
					'kode108_baru' => $row->kode108_baru,
					'kode64_baru' => $row->kode64_baru,
					'harga_baru' => $row->harga_baru,
					'keterangan' => $row->keterangan,
					'status_simbada' => $row->hapus,
					'penghapusan' => $row->penghapusan,
					'koreksi_hapus' => $row->koreksi_hapus,
					'hibah_keluar' => $row->hibah_keluar,
					'luas_tanah' => $row->luas_tanah,
					'luas_bangunan' => $row->luas_bangunan,
					'no_sertifikat' => $row->no_sertifikat,
					'register_tanah' => $row->register_tanah,
					'penggunaan' => $row->penggunaan,
					'kota' => $row->kota,
					'kecamatan' => $row->kecamatan,
					'kelurahan' => $row->kelurahan,
					'ekstrakomtabel' => $row->extrakomtabel_baru,
					'status_register' => 'SAWAL',
					'created_at_date' => $date,
					'created_at_time' => $time,
					'update_at_date' => $date,
					'update_at_time' => $time
				);	

					$this->admin_model->insert_register($data_reg);

			} else {

				$register = $row->register;
				
				if($get_status->status == NULL) {
					$data_for_kib=array (
					'kode_108' => $row->kode_108,
					'kode_64' => $row->kode_64,
					'nomor_lokasi' => $row->nomor_lokasi,
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
					'nomor_lokasi_baru' => $row->nomor_lokasi_baru,
					'kode108_baru' => $row->kode108_baru,
					'kode64_baru' => $row->kode64_baru,
					'harga_baru' => $row->harga_baru,
					'keterangan' => $row->keterangan,
					'status_simbada' => $row->hapus,
					'penghapusan' => $row->penghapusan,
					'koreksi_hapus' => $row->koreksi_hapus,
					'hibah_keluar' => $row->hibah_keluar,
					'luas_tanah' => $row->luas_tanah,
					'luas_bangunan' => $row->luas_bangunan,
					'no_sertifikat' => $row->no_sertifikat,
					'register_tanah' => $row->register_tanah,
					'penggunaan' => $row->penggunaan,
					'kota' => $row->kota,
					'kecamatan' => $row->kecamatan,
					'kelurahan' => $row->kelurahan,
					'ekstrakomtabel' => $row->extrakomtabel_baru,
					'status_register' => 'SAWAL',
					'update_at_date' => $date,
					'update_at_time' => $time
					);
					$this->admin_model->update_data($register,$data_for_kib,'data_kib');
				} else {

					$data_for_kib=array (
						'nomor_lokasi_baru' => $row->nomor_lokasi_baru,
						'kode64_baru'	=> $row->kode64_baru,
						'kode108_baru' => $row->kode108_baru,
						'harga_baru' => $row->harga_baru,
						'status_simbada' => $row->hapus,
						'penghapusan' => $row->penghapusan,
						'koreksi_hapus' => $row->koreksi_hapus,
						'hibah_keluar' => $row->hibah_keluar,
						'ekstrakomtabel' => $row->extrakomtabel_baru,
						'update_at_date' => $date,
						'update_at_time' => $time
					);

					$this->admin_model->update_data($register,$data_for_kib,'data_kib');

					$subs=substr($row->kode108_baru, 0, 5);

					if($subs == '1.5.4') {
						$kondisi = 'RB';
					} else { $kondisi = $row->kondisi; }

					$data_for_reg_isi=array (
						'lokasi' => $row->nomor_lokasi_baru,
						'kode_barang' => $row->kode108_baru,
						'kondisi_barang' => $kondisi,
						'nilai_perolehan' => $row->harga_baru,
						'update_at_date' => $date,
						'update_at_time' => $time
					);

					$this->admin_model->update_data($row->register,$data_for_reg_isi,'register_isi');

					$get_data_register_isi=$this->admin_model->get_data_reg_isi($register)->row();

					$data_for_isi_history=array(
						'register' => $row->register,
						'nomor_lokasi_awal' => $get_data_register_isi->nomor_lokasi_awal,
						'kode_barang' => $get_data_register_isi->kode_barang,
						'nama_barang' => $get_data_register_isi->nama_barang,
						'spesifikasi_barang_merk' => $get_data_register_isi->spesifikasi_barang_merk,
						'satuan' => $get_data_register_isi->satuan,
						'keberadaan_barang' => $get_data_register_isi->keberadaan_barang,
						'nilai_perolehan' => $get_data_register_isi->nilai_perolehan,
						'merupakan_anak' => $get_data_register_isi->merupakan_anak,
						'lokasi' => $get_data_register_isi->lokasi,
						'jumlah' => $get_data_register_isi->jumlah,
						'kondisi_barang' => $get_data_register_isi->kondisi_barang,
						'penggunaan_barang' => $get_data_register_isi->penggunaan_barang,
						'register_ganda' => $get_data_register_isi->register_ganda,
						'status_kepemilikan_tanah' => $get_data_register_isi->status_kepemilikan_tanah,
						'tipe' => $get_data_register_isi->tipe,
						'nopol' => $get_data_register_isi->nopol,
						'no_rangka_seri' => $get_data_register_isi->no_rangka_seri,
						'no_mesin'=> $get_data_register_isi->no_mesin,
						'no_bpkb'=> $get_data_register_isi->no_bpkb,
						'jenis_perkerasan_jalan'=> $get_data_register_isi->jenis_perkerasan_jalan,
						'jenis_bahan_jembatan'=> $get_data_register_isi->jenis_bahan_jembatan,
						'no_ruas'=> $get_data_register_isi->no_ruas,
						'no_jaringan_irigasi'=> $get_data_register_isi->no_jaringan_irigasi,
						'no_sertifikat' => $get_data_register_isi->no_sertifikat,
						'register_tanah' => $get_data_register_isi->register_tanah,
						'kota' => $get_data_register_isi->kota,
						'kelurahan' => $get_data_register_isi->kelurahan,
						'kecamatan' => $get_data_register_isi->kecamatan,
						'pemanfaatan_aset' => $get_data_register_isi->pemanfaatan_aset,
						'created_date'=> $date,
						'created_time'=> $time,
						'lainnya'=> $get_data_register_isi->lainnya,
						'koordinat'=> $get_data_register_isi->koordinat,
						'keterangan'=> $get_data_register_isi->keterangan,
						'update_at_date'=> $date,
						'update_at_time'=> $time
					);

					$this->admin_model->insert_data_history($data_for_isi_history,'register_isi_history');

				}
			}
		}

		echo "<h2>DONE !!! Pengeditan Register Yang Telah Di Kerjakan Telah Selesai Di Edit !! </h2>";

		echo "<h2>Penyesuaian Saldo Pengadaan Baru</h2>";

		$get_pengadaan = $this->admin_model->update_pengadaan_simbada()->result();

		foreach ($get_pengadaan as $row_peng) {
			
			$exist_peng = $this->admin_model->cek_register($row_peng->register,'data_kib');
			$get_data=$exist_peng->row();

			if ($exist_peng->num_rows() < 1 && $row_peng->hapus != 1) {
				
				$data_peng= array (

					'register' => $row_peng->register,
 					'kode_108' => $row_peng->kode_108,
					'kode_64' => $row_peng->kode_64,
					'nomor_lokasi' => $row_peng->nomor_lokasi,
					'nama_barang' => $row_peng->nama_barang_baru,
					'merk_alamat' => $row_peng->merk_alamat_baru,
					'tipe' => $row_peng->tipe_baru,
					'satuan' => $row_peng->satuan,
					'harga_baru' => $row_peng->harga_baru,
					'tahun_pengadaan' => $row_peng->tahun_pengadaan,
					'no_bpkb' => $row_peng->no_bpkb,
					'no_rangka_seri' => $row_peng->no_rangka_seri,
					'nopol' => $row_peng->nopol,
					'no_mesin' => $row_peng->no_mesin,
					'kondisi' => $row_peng->kondisi,
					'nomor_lokasi_baru' => $row_peng->nomor_lokasi_baru,
					'kode108_baru' => $row_peng->kode108_baru,
					'kode64_baru' => $row_peng->kode64_baru,
					'harga_baru' => $row_peng->harga_baru,
					'keterangan' => $row_peng->keterangan,
					'status_simbada' => $row_peng->hapus,
					'penghapusan' => $row_peng->penghapusan,
					'hibah_keluar' => $row_peng->hibah_keluar,
					'luas_tanah' => $row_peng->luas_tanah,
					'luas_bangunan' => $row_peng->luas_bangunan,
					'no_sertifikat' => $row_peng->no_sertifikat,
					'register_tanah' => $row_peng->register_tanah,
					'penggunaan' => $row_peng->penggunaan,
					'kota' => $row_peng->kota,
					'kecamatan' => $row_peng->kecamatan,
					'kelurahan' => $row_peng->kelurahan,
					'ekstrakomtabel' => $row_peng->extrakomtabel_baru,
					'status_register' => 'PENGADAAN',
					'created_at_date' => $date,
					'created_at_time' => $time,
					'update_at_date' => $date,
					'update_at_time' => $time
				);	

				$this->admin_model->insert_register($data_reg);
				
			} else {

				if($get_data->status == NULL) {
					$datapeng_for_kib=array (
						'kode_108' => $row_peng->kode_108,
						'kode_64' => $row_peng->kode_64,
						'nomor_lokasi' => $row_peng->nomor_lokasi,
						'nama_barang' => $row_peng->nama_barang_baru,
						'merk_alamat' => $row_peng->merk_alamat_baru,
						'tipe' => $row_peng->tipe_baru,
						'satuan' => $row_peng->satuan,
						'harga_baru' => $row_peng->harga_baru,
						'tahun_pengadaan' => $row_peng->tahun_pengadaan,
						'no_bpkb' => $row_peng->no_bpkb,
						'no_rangka_seri' => $row_peng->no_rangka_seri,
						'nopol' => $row_peng->nopol,
						'no_mesin' => $row_peng->no_mesin,
						'kondisi' => $row_peng->kondisi,
						'nomor_lokasi_baru' => $row_peng->nomor_lokasi_baru,
						'kode108_baru' => $row_peng->kode108_baru,
						'kode64_baru' => $row_peng->kode64_baru,
						'harga_baru' => $row_peng->harga_baru,
						'keterangan' => $row_peng->keterangan,
						'status_simbada' => $row_peng->hapus,
						'penghapusan' => $row_peng->penghapusan,
						'hibah_keluar' => $row_peng->hibah_keluar,
						'luas_tanah' => $row_peng->luas_tanah,
						'luas_bangunan' => $row_peng->luas_bangunan,
						'no_sertifikat' => $row_peng->no_sertifikat,
						'register_tanah' => $row_peng->register_tanah,
						'penggunaan' => $row_peng->penggunaan,
						'kota' => $row_peng->kota,
						'kecamatan' => $row_peng->kecamatan,
						'kelurahan' => $row_peng->kelurahan,
						'ekstrakomtabel' => $row_peng->extrakomtabel_baru,
						'status_register' => 'PENGADAAN',
						'update_at_date' => $date,
						'update_at_time' => $time
						);

						$this->admin_model->update_data($row_peng->register,$datapeng_for_kib,'data_kib');

				} else {

					$datapeng_for_kib=array (
						'nomor_lokasi_baru' => $row_peng->nomor_lokasi_baru,
						'kode64_baru'	=> $row_peng->kode64_baru,
						'kode108_baru' => $row_peng->kode108_baru,
						'harga_baru' => $row_peng->harga_baru,
						'status_simbada' => $row_peng->hapus,
						'penghapusan' => $row_peng->penghapusan,
						'hibah_keluar' => $row_peng->hibah_keluar,
						'ekstrakomtabel' => $row_peng->extrakomtabel_baru,
						'update_at_date' => $date,
						'update_at_time' => $time
					);

					$this->admin_model->update_data($row_peng->register,$datapeng_for_kib,'data_kib');

					$data_for_reg_isi2=array (
						'lokasi' => $row_peng->nomor_lokasi_baru,
						'kode_barang' => $row_peng->kode108_baru,
						'kondisi_barang' => $kondisi,
						'nilai_perolehan' => $row_peng->harga_baru,
						'update_at_date' => $date,
						'update_at_time' => $time
					);

					$this->admin_model->update_data($row_peng->register,$data_for_reg_isi2,'register_isi');

					$get_data_register_isi2=$this->admin_model->get_data_reg_isi($row_peng->register)->row();

					$data_for_isi_history2=array(
						'register' => $row_peng->register,
						'nomor_lokasi_awal' => $get_data_register_isi2->nomor_lokasi_awal,
						'kode_barang' => $get_data_register_isi2->kode_barang,
						'nama_barang' => $get_data_register_isi2->nama_barang,
						'spesifikasi_barang_merk' => $get_data_register_isi2->spesifikasi_barang_merk,
						'satuan' => $get_data_register_isi2->satuan,
						'keberadaan_barang' => $get_data_register_isi2->keberadaan_barang,
						'nilai_perolehan' => $get_data_register_isi2->nilai_perolehan,
						'merupakan_anak' => $get_data_register_isi2->merupakan_anak,
						'lokasi' => $get_data_register_isi2->lokasi,
						'jumlah' => $get_data_register_isi2->jumlah,
						'kondisi_barang' => $get_data_register_isi2->kondisi_barang,
						'penggunaan_barang' => $get_data_register_isi2->penggunaan_barang,
						'register_ganda' => $get_data_register_isi2->register_ganda,
						'status_kepemilikan_tanah' => $get_data_register_isi2->status_kepemilikan_tanah,
						'tipe' => $get_data_register_isi2->tipe,
						'nopol' => $get_data_register_isi2->nopol,
						'no_rangka_seri' => $get_data_register_isi2->no_rangka_seri,
						'no_mesin'=> $get_data_register_isi2->no_mesin,
						'no_bpkb'=> $get_data_register_isi2->no_bpkb,
						'jenis_perkerasan_jalan'=> $get_data_register_isi2->jenis_perkerasan_jalan,
						'jenis_bahan_jembatan'=> $get_data_register_isi2->jenis_bahan_jembatan,
						'no_ruas'=> $get_data_register_isi2->no_ruas,
						'no_jaringan_irigasi'=> $get_data_register_isi2->no_jaringan_irigasi,
						'no_sertifikat' => $get_data_register_isi2->no_sertifikat,
						'register_tanah' => $get_data_register_isi2->register_tanah,
						'kota' => $get_data_register_isi2->kota,
						'kelurahan' => $get_data_register_isi2->kelurahan,
						'kecamatan' => $get_data_register_isi2->kecamatan,
						'pemanfaatan_aset' => $get_data_register_isi2->pemanfaatan_aset,
						'created_date'=> $date,
						'created_time'=> $time,
						'lainnya'=> $get_data_register_isi2->lainnya,
						'koordinat'=> $get_data_register_isi2->koordinat,
						'keterangan'=> $get_data_register_isi2->keterangan,
						'update_at_date'=> $date,
						'update_at_time'=> $time
					);

					$this->admin_model->insert_data_history($data_for_isi_history2,'register_isi_history');

				}

			}

		}

		echo "<h2> Penyesuaian Dengan Pengadaan Baru, Berhasil !!</h2>";

	}

	public function run_map()
	{
		$this->load->view('admin/jalan_map');
	}

	public function list_kendaraan() {
		
		$this->cek_sess();
		$data['page']="List Kendaraan";
		$data['data_kendaraan'] = $this->admin_model->get_db_kendaraan()->result();



		$this->load->view('admin/header_admin',$data);		
		$this->load->view('admin/list_kendaraan',$data);
		$this->load->view('admin/footer_admin');
		

	}

	public function list_survey() {
		$this->cek_sess();
		
	}

	public function isi_form_kendaraan() {

		$this->cek_sess();
		$data['page']="Isi Form Kendaraan";
		$data['kode_barang']=$this->admin_model->data_kode_barang();
		$data['satuan']=$this->admin_model->data_satuan();
		$data['kamus_lokasi']=$this->admin_model->data_kamus_lokasi();
		
		$register = $_POST['register'];

		$cek_register = $this->admin_model->ambil_register_form($register)->num_rows();

		if($cek_register > 0) {

			$get_register_isi = $this->admin_model->ambil_register_form($register)->row();
			$data_checkbox = $this->admin_model->ambil_status_register_form($register)->row();
			$data['image'] = $this->admin_model->ambil_file($register)->result();

			// echo '<pre>' , var_dump($this->admin_model->ambil_status_register_form($register)->row()) , '</pre>';
			// die();

			$data['data_register'] = array (

				"id"=> $get_register_isi->id,
				"register"=> $get_register_isi->register,
				"nomor_lokasi"=> $get_register_isi->nomor_lokasi,
				"kode_barang"=> $get_register_isi->kode_barang,
				"nama_barang"=> $get_register_isi->nama_barang,
				"spesifikasi_barang_merk"=> $get_register_isi->spesifikasi_barang_merk,
				"satuan"=> $get_register_isi->satuan,
				"keberadaan_barang"=> $get_register_isi->keberadaan_barang,
				"nilai_perolehan"=> $get_register_isi->nilai_perolehan,
				"lokasi"=> $get_register_isi->lokasi,
				"jumlah"=> "1",
				"kondisi_barang"=> $get_register_isi->kondisi_barang,
				"penggunaan_barang"=> $get_register_isi->penggunaan_barang,
				"pemanfaatan_aset"=> $get_register_isi->pemanfaatan_aset,
				"tipe"=> $get_register_isi->tipe,
				"nopol"=> $get_register_isi->nopol,
				"no_rangka_seri"=> $get_register_isi->no_rangka_seri,
				"no_mesin"=> $get_register_isi->no_mesin,
				"no_bpkb"=> $get_register_isi->no_bpkb,
				"lainnya"=> $get_register_isi->lainnya,
				"keterangan"=> $get_register_isi->keterangan,
				"nama_pj"=> $get_register_isi->nama_pj,
				"jenis_penggunaan"=> $get_register_isi->jenis_penggunaan,
				'flag' => 0
			
			);

			$data['data_is_register'] = array (

				"id"=> $data_checkbox->id,
				"is_register"=> $data_checkbox->is_register,
				"is_kode_barang"=> $data_checkbox->is_kode_barang,
				"is_nama_barang"=> $data_checkbox->is_nama_barang,
				"is_spesifikasi_barang_merk"=> $data_checkbox->is_spesifikasi_barang_merk,
				"is_satuan"=> $data_checkbox->is_satuan,
				"is_keberadaan_barang"=> $data_checkbox->is_keberadaan_barang,
				"is_nilai_perolehan"=> $data_checkbox->is_nilai_perolehan,
				"is_aset_atrib"=> $data_checkbox->is_aset_atrib,
				"is_tipe"=> $data_checkbox->is_tipe,
				"is_kondisi_barang"=> $data_checkbox->is_kondisi_barang,
				"is_penggunaan_barang"=> $data_checkbox->is_penggunaan_barang,
				"is_catat_ganda"=> $data_checkbox->is_catat_ganda,
				"is_jumlah"=> $data_checkbox->is_jumlah,
				"is_nopol"=> $data_checkbox->is_nopol,
				"is_no_rangka"=> $data_checkbox->is_no_rangka,
				"is_no_mesin"=> $data_checkbox->is_no_mesin,
				"is_no_bpkb"=> $data_checkbox->is_no_bpkb,
				"is_lokasi"=> $data_checkbox->is_lokasi
			);

		} else {

			$data['image'] = NULL;
			$get_kib_simbada = $this->admin_model->get_data_per_kendaraan($register)->row();
			// echo '<pre>' , var_dump($this->admin_model->get_data_per_kendaraan($register)->row()) , '</pre>';
			// die();
			$data['data_register'] = array (

				"id"=> $get_kib_simbada->register,
				"register"=> $get_kib_simbada->register,
				"nomor_lokasi"=> $get_kib_simbada->nomor_lokasi_baru,
				"kode_barang"=> $get_kib_simbada->kode108_baru,
				"nama_barang"=> $get_kib_simbada->nama_barang_baru,
				"spesifikasi_barang_merk"=> $get_kib_simbada->merk_alamat_baru,
				"satuan"=> "Unit",
				"keberadaan_barang"=> "Ada",
				"nilai_perolehan"=> $get_kib_simbada->harga_baru,
				"lokasi"=> $get_kib_simbada->lokasi,
				"jumlah"=> "1",
				"kondisi_barang"=> $get_kib_simbada->kondisi,
				"penggunaan_barang"=> "Pemerintah Kota",
				"pemanfaatan_aset"=> NULL,
				"tipe"=> $get_kib_simbada->tipe_baru,
				"nopol"=> $get_kib_simbada->nopol,
				"no_rangka_seri"=> $get_kib_simbada->no_rangka_seri,
				"no_mesin"=> $get_kib_simbada->no_mesin,
				"no_bpkb"=> $get_kib_simbada->no_bpkb,
				"lainnya"=> "",
				"keterangan"=> "",
				'flag' => 1
			
			);

			$data['data_is_register'] = array (

				"id"=> $get_kib_simbada->register,
				"is_register"=> 0,
				"is_kode_barang"=> 0,
				"is_nama_barang"=> 0,
				"is_spesifikasi_barang_merk"=> 0,
				"is_satuan"=> 0,
				"is_keberadaan_barang"=> 0,
				"is_nilai_perolehan"=> 0,
				"is_aset_atrib"=> 0,
				"is_tipe"=> 0,
				"is_kondisi_barang"=> 0,
				"is_penggunaan_barang"=> 0,
				"is_catat_ganda"=> 0,
				"is_jumlah"=> 0,
				"is_nopol"=> 0,
				"is_no_rangka"=> 0,
				"is_no_mesin"=> 0,
				"is_no_bpkb"=> 0,
				"is_lokasi"=> 0
			);

		} 		

		
        $this->load->view('admin/header_admin',$data);		
		$this->load->view('admin/isi_list_kendaraan',$data);
		$this->load->view('admin/footer_isi_kendaraan_admin');
	}

	public function simpan_isi_kendaraan () {

		$register=$_POST['register'];
		//$radio_register=$_POST['radio_kode_reg'];
		$flag=$_POST['flag'];

		if($flag == 0) {
			$id_isi_register=$_POST['id_isi_register'];
			$id_status_register=$_POST['id_status_register'];
		}
		
		$id_isi_register=$_POST['id_isi_register'];
		$id_status_register=$_POST['id_status_register'];

		$kode_barang=$_POST['kode_barang'];
		$radio_kode_bar=$_POST['radio_kode_bar'];

		$nama_barang=$_POST['nama_barang'];
		$radio_nama_bar=$_POST['radio_nama_bar'];

		$merk=$_POST['merk'];
		$radio_merk=$_POST['radio_merk'];

		$alamat=$_POST['lokasi'];
		$jumlah_bar=1;
		$radio_jum_bar=0;

		$satuan=$_POST['satuan'];
		$radio_satuan=$_POST['radio_satuan'];

		$keberadaan=$_POST['keberadaan'];
		$radio_keberadaan=$_POST['radio_keberadaan'];

		$nilai=str_replace(".", "",$_POST['nilai']);
		$radio_nilai=$_POST['radio_nilai'];

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
		$jenis_penggunaan=$_POST['jenis_penggunaan'];

		// if (isset($_POST['koordinat'])){
		// 	$koordinat = $_POST['koordinat'];
		// } else {$koordinat = "-";}

		if (isset($_POST['lokasi_kendaraan'])){
			$lainnya = $_POST['lokasi_kendaraan'];
		} else {$lainnya = "-";}

		if (isset($_POST['isi_penanggung_jawab'])){
			$penanggung_jawab = $_POST['isi_penanggung_jawab'];
		} else {$penanggung_jawab = "-";}

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
                    $insert = $this->admin_model->save_image($uploadData); 
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
				'jenis_penggunaan' => $jenis_penggunaan,
				'nama_pj' => $penanggung_jawab,
				'lainnya' => $lainnya,
				'keterangan' => $keterangan
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
				'is_kondisi_barang' => $radio_kondisi,
				'is_tipe' => $radio_tipe,
				'is_nopol' => $radio_nopol,
				'is_no_rangka' => $radio_no_rangka,
				'is_no_mesin' => $radio_mesin,
				'is_no_bpkb' => $radio_bpkb
			);
		
				// var_dump($data_form_isian);
				// echo '<pre>' , var_dump($data_form_isian) , '</pre>';
				// echo "<p>";
				// var_dump($data_is_form);

				if($flag == 0) {

					//Save Di tabel register_isi
					$id_register_isi=$this->admin_model->update_register_isi($data_form_isian);
			
			
					$data_form_isian += array(
						'id_register_isi' => $id_register_isi,
						'created_date' => $updated_date,
						'created_time' => $updated_time
					);
			
					//Save Di Tabel register_isi_history
					$this->admin_model->save_isi_form_history($data_form_isian);
			
			
					//Save Di tabel register status
					$id_register_status=$this->admin_model->update_status_register($data_is_form,$id_status_register);
			
					$data_is_form += array (
			
						'id_status_register' => $id_register_status,
						'created_date' => $updated_date,
						'created_time' => $updated_time
			
					);
			
					$this->admin_model->save_status_register_history($data_is_form);
			
					// //Membuat tanda di data kib
					$this->admin_model->tandai_kib($id_register_isi);



				} else {

					//Save Di tabel register_isi
					$id_register_isi=$this->admin_model->save_isi_form($data_form_isian);
			
			
					$data_form_isian += array(
						'id_register_isi' => $id_register_isi,
						'update_at_date' => $updated_date,
						'update_at_time' => $updated_time
					);
			
					//Save Di Tabel register_isi_history
					$this->admin_model->save_isi_form_history($data_form_isian);
			
			
					//Save Di tabel register status
					$id_register_status=$this->admin_model->save_status_register($data_is_form);
			
					$data_is_form += array (
			
						'id_status_register' => $id_register_status,
						'update_at_date' => $updated_date,
						'update_at_time' => $updated_time
			
					);
			
					$this->admin_model->save_status_register_history($data_is_form);
			
					// //Membuat tanda di data kib
					$this->admin_model->tandai_kib($id_register_isi);

				}
		
				redirect('/home_admin/list_kendaraan');

	}

	public function hapus_image()
	{
		$this->cek_sess();
		$id = $this->input->post('id');
		$path=$this->admin_model->get_path($id)->row();
		$link="ini_assets/upload/".$path->file_upload;
		
		unlink($link);

		$result = $this->admin_model->hapus_image_record($id);
		echo json_encode($result);
	}

	public function trynerror()
	{
		$this->cek_sess();
		$get_data_register_isi=$this->admin_model->get_data_reg_isi('18020960-2018-522401-1')->row();
		
		echo $get_data_register_isi->register;
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

		echo json_encode($result);
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

	public function save_edit_user()
	{
		$this->cek_sess();
		
		$id = $this->input->post('id');
		date_default_timezone_set("Asia/Jakarta");	
		$tgl_update=date("Y-m-d H:i:s");
		$data = array(
			'nama' => $this->input->post('nama'),
			'nip' => $this->input->post('nip'),
			'pangkat' => $this->input->post('pangkat'),
			'fungsi' => $this->input->post('tugas'),
			'username' => $this->input->post('nip'),
			'password' => $this->input->post('nip'),
			'tgl_update' => $tgl_update

		);
		
		$result = $this->admin_model->update_row_user($id,$data);

		echo json_encode($result);
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

		$jumlah_register=$this->admin_model->get_rekap_opd_admin();
		
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

			$proses_inv=$this->admin_model->get_kerjaan_pb($row->nomor_unit,$row->kode_barang);

			// echo $proses_inv->num_rows()."<p>";
			
			if($proses_inv->num_rows() < 1) {

				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A' . $i, $no);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B' . $i, strtoupper($row->unit));
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C' . $i, strtoupper($kode_barang));;
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D' . $i, number_format($row->jumlah));
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E' . $i, '0');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F' . $i, '0');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G' . $i, '0');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H' . $i, number_format($row->jumlah));
			} else {
				$get=$proses_inv->row();
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A' . $i, $no);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B' . $i, strtoupper($row->unit));
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C' . $i, strtoupper($kode_barang));;
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D' . $i, number_format($row->jumlah));
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E' . $i, number_format($get->verif));
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F' . $i, number_format($get->proses));
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G' . $i, number_format($get->tolak));
				if($row->jumlah-($get->verif+$get->proses+$get->tolak) < 0) {
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H' . $i, '0');
				} else {
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H' . $i, number_format($row->jumlah-($get->verif+$get->proses+$get->tolak)));
				}
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


	//===================================== END OF LAPORAN CONTROLLER =========================//


}
?>

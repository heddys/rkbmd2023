<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Auth_model extends CI_Model{	
	function ceklogin($table,$where){
		return $this->db->get_where($table,$where);
	}

	function get_data_komponen($table,$where){
		return $this->db->get_where($table,$where);
	}

	function get_kodebar($table){
		return $this->db->get($table);
	}
	
	function get_kegiatan_all($where){
		
		return $this->db->get_where('tabel_kegiatan',$where);
	}
	function get_komponen_all($where){
		return $this->db->get_where('tabel_kode_komponen',$where);
	}

	function tandai_komp($where){
		return $this->db->insert('barang_eksisting',$where);
	}

	function get_tabel_eksisting($opd){
		return $this->db->get_where('barang_eksisting',$opd);
	}

	function update_barang($jum,$where){
		$this->db->where($where);
		$this->db->update('barang_eksisting',$jum);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}


	function entry_data_budgeting($entrydata){
		return $this->db->insert('ebudgeting2021',$entrydata);

	}

	function mark_for_loggin($where,$token){

		$this->db->where('username', $where);
        $this->db->update('pengguna', array('token_login' => $token));
	}
	
	function entry_data_komponen($entrydata){
		return $this->db->insert('list_komponen',$entrydata);

	}


	function ambil_kodeopd($where){
		return $this->db->get_where('skpd',$where);
	}

	function get_info_exist($where){
		$query = $this->db->get_where('keterangan_eksisting',$where);
		if($query->num_rows() > 0) {
			return $query;
		} else {
			return false;
			}
	}

	function get_count_rkb($where){
		$this->db->select('id_komponen, id_kegiatan, (sum(saldo_kegiatan)-saldo_komponen) as total');
		$this->db->from('tabel_list_rkb');
		$this->db->Where($where);
		$this->db->group_by('id_komponen');
		return $this->db->get();
	}

	function get_count_rkp($where){
		$this->db->select('id_komponen, id_kegiatan, (sum(saldo_kegiatan)-saldo_komponen) as total');
		$this->db->from('tabel_list_rkp');
		$this->db->Where($where);
		$this->db->group_by('id_komponen');
		return $this->db->get();
	}

	function get_kegiatan($table,$where){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($where);
		$this->db->group_by('kode_kegiatan');
		$this->db->order_by("nama_kegiatan","asc");
		return $this->db->get();
	}

	function get_tabel_budgeting_rkb($where){
		$this->db->select('komp_id,komp_name,rekening_kode,ket_koefisien,nilai_anggaran,detail_name');
		$this->db->from('ebudgeting2021');
		$this->db->where($where);
		$this->db->like('rekening_kode','5.2.3','after');
		return $this->db->get();
	}

	function get_tabel_budgeting_rkp($where){
		$this->db->select('komp_id,komp_name,rekening_kode,ket_koefisien,nilai_anggaran,detail_name');
		$this->db->from('ebudgeting2021');
		$this->db->where($where);
		$this->db->like('rekening_kode','5.2.2','after');
		return $this->db->get();
	}

	function save_data_rkb($savedata){
		return $this->db->insert('tabel_list_rkb',$savedata);
	}
	
	function save_data_rkp($savedata){
		return $this->db->insert('tabel_list_rkp',$savedata);

	}

	function save_data_register ($savedata){
		return $this->db->insert('keterangan_register',$savedata);
	}

	function ambil_skpd($where){
		$query = $this->db->get_where('skpd',$where);
		return $query->row();
	}

	function get_tabel_komponen($where){
		$this->db->select('tabel_list_rkb.id,tabel_list_rkb.date,tabel_list_rkb.time,tabel_list_rkb.id_komponen,tabel_list_rkb.saldo_komponen,tabel_list_rkb.saldo_existing_komponen,tabel_list_rkb.saldo_ideal_komponen,tabel_list_rkb.keterangan,list_komponen.komponen_id,list_komponen.nama_komponen,list_komponen.satuan,list_komponen.harga_komponen,list_komponen.kode_rekening,list_komponen.nama_rekening,sum(tabel_list_rkb.saldo_kegiatan) as volume');    
		$this->db->from('tabel_list_rkb');
		$this->db->join('list_komponen', 'tabel_list_rkb.id_komponen = list_komponen.id');
		$this->db->where('tabel_list_rkb.kode_binprog',$where);
		$this->db->where('tabel_list_rkb.hapus != ',1,FALSE);
		$this->db->order_by("sum(tabel_list_rkb.saldo_kegiatan)-saldo_komponen", "asc");
		$this->db->group_by('tabel_list_rkb.id_komponen');
		$query = $this->db->get();

		if($query->num_rows() > 0) {
			return $query;
		} else {
			return false;
			}
	}

	function get_tabel_kegiatan_rkp($where){
		$this->db->select('tabel_list_rkp.id,tabel_list_rkp.date,tabel_list_rkp.register,tabel_list_rkp.time,tabel_list_rkp.id_kegiatan,tabel_list_rkp.saldo_kegiatan,tabel_list_rkp.id_komponen,tabel_list_rkp.saldo_komponen,tabel_list_rkp.saldo_existing_komponen,tabel_list_rkp.saldo_ideal_komponen,tabel_list_rkp.keterangan,tabel_kegiatan.kode_kegiatan,tabel_kegiatan.nama_kegiatan,tabel_kode_komponen.kode_komponen,tabel_kode_komponen.nama_komponen,tabel_kode_komponen.spek1,tabel_kode_komponen.spek2,tabel_kode_komponen.merek,tabel_kode_komponen.satuan,tabel_kode_komponen.nilai,tabel_kode_komponen.kode_rekening,tabel_kode_komponen.rincian_kode_rek');    
		$this->db->from('tabel_list_rkp');
		$this->db->join('tabel_kegiatan', 'tabel_list_rkp.id_kegiatan = tabel_kegiatan.id');
		$this->db->join('tabel_kode_komponen', 'tabel_list_rkp.id_komponen = tabel_kode_komponen.id');
		$this->db->where('tabel_list_rkp.kode_binprog',$where);
		$this->db->where('tabel_list_rkp.hapus != ',1,FALSE);
		$this->db->order_by("date", "desc");
		$this->db->order_by("time", "desc");
		$this->db->group_by('tabel_list_rkp.id_kegiatan');
		$query = $this->db->get();

		if($query->num_rows() > 0) {
			return $query;
		} else {
			return false;
			}
	}

	function satuan_komp ($where){

		$this->db->select('*');
		$this->db->from('list_komponen');
		$this->db->where($where);
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $query->row();
		} else {
			return false;
			}

	}

	function save_register_existing($table,$data){
			return $this->db->insert($table,$data);
	}


	function get_jumlah_komp($where){
		$this->db->select('*');
		$this->db->from('tabel_list_rkb');
		$this->db->where($where);
		return $this->db->get();

	}

	function get_jumlah_komprkp($where){
		$this->db->select('*');
		$this->db->from('tabel_list_rkp');
		$this->db->where($where);
		return $this->db->get();

	}

	function get_rincian_kegiatan($where){
		$this->db->select('tabel_list_rkb.id,tabel_list_rkb.id_kegiatan,tabel_list_rkb.saldo_kegiatan,tabel_list_rkb.id_komponen,tabel_list_rkb.saldo_komponen,tabel_list_rkb.saldo_existing_komponen,tabel_list_rkb.saldo_ideal_komponen,tabel_list_rkb.keterangan,tabel_list_rkb.saldo_kegiatan,tabel_kegiatan.kode_kegiatan,tabel_kegiatan.nama_kegiatan,list_komponen.id as id_komp,list_komponen.komponen_id,list_komponen.nama_komponen,list_komponen.satuan,list_komponen.harga_komponen,list_komponen.kode_rekening,list_komponen.nama_rekening');
		$this->db->from('tabel_list_rkb');
		$this->db->join('tabel_kegiatan', 'tabel_list_rkb.id_kegiatan = tabel_kegiatan.id');
		$this->db->join('list_komponen', 'tabel_list_rkb.id_komponen = list_komponen.id');
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result();
	}	

	function get_komponen($where,$i){
		$this->db->select('tabel_list_rkb.date,tabel_list_rkb.time,tabel_list_rkb.kode_binprog,tabel_list_rkb.id,tabel_list_rkb.id_kegiatan,tabel_list_rkb.saldo_kegiatan,tabel_list_rkb.id_komponen,tabel_list_rkb.saldo_komponen,tabel_list_rkb.saldo_existing_komponen,tabel_list_rkb.saldo_ideal_komponen,tabel_list_rkb.keterangan,tabel_kegiatan.kode_kegiatan,tabel_kegiatan.nama_kegiatan,list_komponen.komponen_id,list_komponen.nama_komponen,list_komponen.satuan,list_komponen.harga_komponen,list_komponen.kode_rekening,list_komponen.nama_rekening');    
		$this->db->from('tabel_list_rkb');
		$this->db->join('tabel_kegiatan', 'tabel_list_rkb.id_kegiatan = tabel_kegiatan.id');
		$this->db->join('list_komponen', 'tabel_list_rkb.id_komponen = list_komponen.id');
			if($i=="excel") {
				$this->db->group_by('tabel_list_rkb.id_komponen');
			}
		$this->db->where($where);
		$query = $this->db->get();

		if($query->num_rows() > 0) {
			if($i==1 or $i=="excel") {
				return $query->result();
			} else {
				return $query->row();
			  }
		} else {
			return false;
			}
	}


	function get_ket_register($where){
		$query=$this->db->get_where('keterangan_register',$where);
		return $query->row();
	}

	function get_komponen_rkp($where,$i){

		$this->db->select('tabel_list_rkp.id,tabel_list_rkp.date,tabel_list_rkp.register,tabel_list_rkp.kode_binprog,tabel_list_rkp.time,tabel_list_rkp.id_kegiatan,tabel_list_rkp.saldo_kegiatan,tabel_list_rkp.id_komponen,tabel_list_rkp.saldo_komponen,tabel_list_rkp.saldo_existing_komponen,tabel_list_rkp.saldo_ideal_komponen,tabel_list_rkp.keterangan,tabel_kegiatan.kode_kegiatan,tabel_kegiatan.nama_kegiatan,tabel_kode_komponen.kode_komponen,tabel_kode_komponen.nama_komponen,tabel_kode_komponen.spek1,tabel_kode_komponen.spek2,tabel_kode_komponen.merek,tabel_kode_komponen.satuan,tabel_kode_komponen.nilai,tabel_kode_komponen.kode_rekening,tabel_kode_komponen.rincian_kode_rek');
		$this->db->from('tabel_list_rkp');
		$this->db->join('tabel_kegiatan', 'tabel_list_rkp.id_kegiatan = tabel_kegiatan.id');
		$this->db->join('tabel_kode_komponen', 'tabel_list_rkp.id_komponen = tabel_kode_komponen.id');
			if($i=="excel") {
				$this->db->group_by('tabel_list_rkp.id_komponen');
			}
		$this->db->where($where);
		$query = $this->db->get();

		if($query->num_rows() > 0) {
			if($i==1 or $i=="excel") {return $query->result();} else {return $query->row();}
		} else {
			return false;
			}
	}

	function get_perkomponen($where){
		$this->db->select('tabel_list_rkb.id,tabel_list_rkb.id_kegiatan,tabel_list_rkb.saldo_kegiatan,tabel_list_rkb.id_komponen,tabel_list_rkb.saldo_komponen,tabel_list_rkb.saldo_existing_komponen,tabel_list_rkb.saldo_ideal_komponen,tabel_list_rkb.keterangan,tabel_kegiatan.kode_kegiatan,tabel_kegiatan.nama_kegiatan,list_komponen.komponen_id,list_komponen.nama_komponen,list_komponen.satuan,list_komponen.harga_komponen,list_komponen.kode_rekening,list_komponen.nama_rekening');    
		$this->db->from('tabel_list_rkb');
		$this->db->join('tabel_kegiatan', 'tabel_list_rkb.id_kegiatan = tabel_kegiatan.id');
		$this->db->join('list_komponen', 'tabel_list_rkb.id_komponen = list_komponen.id');
		$this->db->where($where);
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $query->row();
		} else {
			return false;
			}
	}

	function get_komponen_rkpexcel($where){
		$this->db->select('tabel_list_rkp.id,tabel_list_rkp.date,tabel_list_rkp.register,tabel_list_rkp.kode_binprog,tabel_list_rkp.time,tabel_list_rkp.id_kegiatan,tabel_list_rkp.saldo_kegiatan,tabel_list_rkp.id_komponen,tabel_list_rkp.saldo_komponen,tabel_list_rkp.saldo_existing_komponen,tabel_list_rkp.saldo_ideal_komponen,tabel_list_rkp.keterangan,tabel_kegiatan.kode_kegiatan,tabel_kegiatan.nama_kegiatan,tabel_kode_komponen.kode_komponen,tabel_kode_komponen.nama_komponen,tabel_kode_komponen.spek1,tabel_kode_komponen.spek2,tabel_kode_komponen.merek,tabel_kode_komponen.satuan,tabel_kode_komponen.nilai,tabel_kode_komponen.kode_rekening,tabel_kode_komponen.rincian_kode_rek,keterangan_register.nama_barang,keterangan_register.merk_tipe');    
		$this->db->from('tabel_list_rkp');
		$this->db->join('tabel_kegiatan', 'tabel_list_rkp.id_kegiatan = tabel_kegiatan.id');
		$this->db->join('keterangan_register', 'tabel_list_rkp.register = keterangan_register.register','left');
		$this->db->join('tabel_kode_komponen', 'tabel_list_rkp.id_komponen = tabel_kode_komponen.id');
		$this->db->where($where);
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
			}
	}


	function get_tabel_rkb($where){
		return $this->db->get_where('tabel_list_rkb',$where);

	}


	function get_perkomponen_rkp($where){
		$this->db->select('tabel_list_rkp.id,tabel_list_rkp.id_kegiatan,tabel_list_rkp.saldo_kegiatan,tabel_list_rkp.register,tabel_list_rkp.id_komponen,tabel_list_rkp.saldo_komponen,tabel_list_rkp.saldo_existing_komponen,tabel_list_rkp.saldo_ideal_komponen,tabel_list_rkp.keterangan,tabel_kegiatan.kode_kegiatan,tabel_kegiatan.nama_kegiatan,tabel_kode_komponen.kode_komponen,tabel_kode_komponen.nama_komponen,tabel_kode_komponen.spek1,tabel_kode_komponen.spek2,tabel_kode_komponen.spek2,tabel_kode_komponen.merek,tabel_kode_komponen.satuan,tabel_kode_komponen.nilai,tabel_kode_komponen.kode_rekening,tabel_kode_komponen.rincian_kode_rek');    
		$this->db->from('tabel_list_rkp');
		$this->db->join('tabel_kegiatan', 'tabel_list_rkp.id_kegiatan = tabel_kegiatan.id');
		$this->db->join('tabel_kode_komponen', 'tabel_list_rkp.id_komponen = tabel_kode_komponen.id');
		$this->db->where($where);
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $query->row();
		} else {
			return false;
			}
	}

	function hapus_data($where,$hapus){
		$this->db->where('id',$where);
		$this->db->update('tabel_list_rkb',$hapus);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function hapus_data_exist($where,$hapus){
		$this->db->where('id',$where);
		$this->db->update('keterangan_eksisting',$hapus);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function update_barang_exist($where,$hapus){
		$this->db->where($where);
		$this->db->update('barang_eksisting',$hapus);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function update_keterangan_exist($where,$hapus){
		$this->db->where($where);
		$this->db->update('keterangan_eksisting',$hapus);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function hapus_data_rkp($where,$hapus){
		$this->db->where('id',$where);
		$this->db->update('tabel_list_rkp',$hapus);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}


	function cek_data($where){
		$this->db->select('tabel_list_rkb.saldo_existing_komponen,tabel_list_rkb.saldo_ideal_komponen,tabel_list_rkb.saldo_komponen,list_komponen.satuan,list_komponen.tanda');
		$this->db->from('tabel_list_rkb');
		$this->db->join('list_komponen','tabel_list_rkb.id_komponen = list_komponen.id');
		$this->db->where($where);
		$query=$this->db->get();
		if($query->num_rows() > 0) {
			return $query->row();
		} else {
			return false;
			}
	}

	function cek_data_rkp($where){
		$this->db->select('tabel_list_rkp.saldo_existing_komponen,tabel_list_rkp.saldo_ideal_komponen,tabel_list_rkp.saldo_komponen,tabel_kode_komponen.satuan,tabel_kode_komponen.tanda');
		$this->db->from('tabel_list_rkp');
		$this->db->join('tabel_kode_komponen','tabel_list_rkp.id_komponen = tabel_kode_komponen.id');
		$this->db->where($where);
		$query=$this->db->get();
		if($query->num_rows() > 0) {
			return $query->row();
		} else {
			return false;
			}
	}

	function save_update_baru($where,$update){
		$this->db->where('id',$where);
		$this->db->update('tabel_list_rkb',$update);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function save_update_baru2($where,$update){
		$this->db->where($where);
		$this->db->update('tabel_list_rkb',$update);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function save_update_barurkp($where,$update){
		$this->db->where('id',$where);
		$this->db->update('tabel_list_rkp',$update);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function save_update_barurkp2($where,$update){
		$this->db->where($where);
		$this->db->update('tabel_list_rkp',$update);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function save_update_lama($savedata){
		$this->db->insert('jurnal_update',$savedata);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function save_update_lamarkp($savedata){
		$this->db->insert('jurnal_update_rkp',$savedata);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function cek_list_rkb($where){
		$query=$this->db->get_where('tabel_list_rkb',$where);
		if($query->num_rows() > 0){
			return true;
		} else {
			return false;
			}
	}
	function cek_list_rkp($where){
		$query=$this->db->get_where('tabel_list_rkp',$where);
		if($query->num_rows() > 0){
			return true;
		} else {
			return false;
			}
	}

	function savedatacurrent($where,$data){
		$salkeg=array('saldo_kegiatan' => $data);
		$this->db->where($where);
		$this->db->update('tabel_list_rkb',$salkeg);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function savedatacurrentrkp($where,$data){
		$salkeg=array('saldo_kegiatan' => $data);
		$this->db->where($where);
		$this->db->update('tabel_list_rkp',$salkeg);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function cek_exist($opd){
		$where=array('kode_binprog' => $opd, 'tanda_hapus !=' => 1, 'updated !=' => "true", 'saldo_existing !=' => 0);
		return $this->db->get_where('barang_eksisting',$where);
		
	}

	function cek_bmaset($opd){
		$where=array('kode_binprog' => $opd, 'hapus !=' => 1);
		$this->db->select('id_komponen');
		$this->db->from('tabel_list_rkb');
		$this->db->Where($where);
		$this->db->group_by('id_komponen');
		return $this->db->get();
		
	}

	function cek_persediaan($opd){
		$where=array('kode_binprog' => $opd, 'hapus !=' => 1);
		$this->db->select('id_komponen');
		$this->db->from('tabel_list_rkp');
		$this->db->Where($where);
		$this->db->group_by('id_komponen');
		return $this->db->get();
		
	}


	function cek_jumlah($where){
		$this->db->select('id_komponen,sum(saldo_kegiatan) as jumlah,saldo_ideal_komponen,saldo_existing_komponen');
		$this->db->from('tabel_list_rkb');
		$this->db->Where($where);
		$this->db->group_by('id_komponen');
		return $this->db->get();
	}
	function cek_jumlah_rkp($where){
		$this->db->select('id_komponen,sum(saldo_kegiatan) as jumlah,saldo_ideal_komponen,saldo_existing_komponen');
		$this->db->from('tabel_list_rkp');
		$this->db->Where($where);
		$this->db->group_by('id_komponen');
		return $this->db->get();
	}

	public function ambil_data_pbp($nip)
	{
		return $this->db->get_where('kamus_pengurus_barang_pembantu',array('nip_pbp' => $nip));
	}

}

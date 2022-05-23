<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Admin_model extends CI_Model{	


   public function get_pangkuan($nip)
   {
       $this->db->select('nomor_unit');
       $this->db->from('kamus_penyelia');
       $this->db->where('nip_penyelia',$nip);
       return $this->db->get();
   }

   public function get_proses_reg($list)
   {
       if($list==1) {
        $query = $this->db->query("SELECT
                b.unit,
                a.unit_baru,
                a.nama_barang,
                a.register,
                COUNT( a.register ) as jumlah
            FROM
                `data_kib` a
                INNER JOIN (select * from kamus_lokasi GROUP BY unit_baru) b ON b.unit_baru = a.unit_baru 
            WHERE
                a.`status` = '1'
            GROUP BY
                a.unit_baru");

       } else {
                $query = $this->db->query("SELECT
                b.unit,
                a.unit_baru,
                a.nama_barang,
                a.register,
                COUNT( a.register ) as jumlah
            FROM
                `data_kib` a
                INNER JOIN (select * from kamus_lokasi GROUP BY unit_baru) b ON b.unit_baru = a.unit_baru 
            WHERE
                a.`status` = '1' and a.unit_baru in ('".implode("','",$list)."')
            GROUP BY
                a.unit_baru");
       }
        

        return $query->result();
   }

   public function get_tolak_reg($list)
   {
    
    if($list==1) {
        $query = $this->db->query("SELECT
                b.unit,
                a.unit_baru,
                a.nama_barang,
                a.register,
                COUNT( a.register ) as jumlah
            FROM
                `data_kib` a
                INNER JOIN (select * from kamus_lokasi GROUP BY unit_baru) b ON b.unit_baru = a.unit_baru 
            WHERE
                a.`status` = '3'
            GROUP BY
                a.unit_baru");
    } else {

        $query = $this->db->query("SELECT
                b.unit,
                a.unit_baru,
                a.nama_barang,
                a.register,
                COUNT( a.register ) as jumlah
            FROM
                `data_kib` a
                INNER JOIN (select * from kamus_lokasi GROUP BY unit_baru) b ON b.unit_baru = a.unit_baru 
            WHERE
                a.`status` = '3' and a.unit_baru in ('".implode("','",$list)."')
            GROUP BY
                a.unit_baru");
        }

        return $query->result();
   }

   public function get_data_chart($list)
   {
        if($list==1) {
            $query = $this->db->query("SELECT (select count(register) from data_kib where status ='1') as jumlah_proses, (select count(register) from data_kib where status ='3') as jumlah_tolak, (select count(register) from data_kib where status ='2') as jumlah_terverif, (select count(register) from data_kib where status is null and ekstrakomtabel is null) as jumlah_reg_belum_diisi");
        } else {
                $query = $this->db->query("SELECT (select count(register) from data_kib where unit_baru in ('".implode("','",$list)."') and status ='1') as jumlah_proses, (select count(register) from data_kib where unit_baru in ('".implode("','",$list)."') and status ='3') as jumlah_tolak, (select count(register) from data_kib where unit_baru in ('".implode("','",$list)."') and status ='2') as jumlah_terverif, (select count(register) from data_kib where unit_baru in ('".implode("','",$list)."') and status is null) as jumlah_reg_belum_diisi");
            }

       return $query->row();
   }

   public function get_user_penyelia()
   {
       return $this->db->get_where('pengguna', array ('fungsi' => 'Penyelia'));
   }

   public function get_kamus_penyelia()
   {
       return $this->db->get('kamus_penyelia');
   }

   public function simpan_status_penyelia($id_kamus,$data)
   {
        $this->db->where('id', $id_kamus);
        $this->db->update('kamus_penyelia',$data);
        $this->db->error(); 
   }

   public function get_data_opd_penyelia($id)
   {
      return $this->db->get_where('kamus_penyelia',array('nip_penyelia' => $id));
   }

   public function hapus_opd_pemangku($id,$data)
   {
       $this->db->where('nomor_unit', $id);
       $this->db->update('kamus_penyelia', $data);
       $this->db->error();
   }

   public function get_row_petugas($id)
   {
       return $this->db->get_where('petugas_inv', array('id' => $id));
   }

   public function get_rekap_opd($unit)
   {
       $query=$this->db->query(
            "SELECT
                b.unit,b.unit_baru,
                count( a.register ) as total,
                COUNT(
                IF
                ( a.STATUS = 1, 1, NULL )) AS proses,
                COUNT(
                IF
                ( a.STATUS = 2, 1, NULL )) AS verif,
                COUNT(
                IF
                ( a.STATUS = 3, 1, NULL )) AS tolak,
                COUNT(
                IF
                    ( a.STATUS IS NULL, 1, NULL )) AS sisa,(
                    count( a.register )- COUNT(
                    IF
                    ( STATUS IS NULL, 1, NULL )))/ count( register )*100 AS persentase 
            FROM
                data_kib a inner join (SELECT unit_baru,unit from kamus_lokasi where kode_binprog <> '' GROUP BY unit_baru) b on a.unit_baru=b.unit_baru 
            WHERE
                a.unit_baru IN ( '".implode("','",$unit)."' ) 
            GROUP BY
                b.unit 
            ORDER BY
                persentase DESC");
        
        return $query->result();
   }

   public function get_rekap_opd_admin()
   {
       $query=$this->db->query(
            "SELECT
                b.unit,
                count( a.register ) as total,
                COUNT(
                IF
                ( a.STATUS = 1, 1, NULL )) AS proses,
                COUNT(
                IF
                ( a.STATUS = 2, 1, NULL )) AS verif,
                COUNT(
                IF
                ( a.STATUS = 3, 1, NULL )) AS tolak,
                COUNT(
                IF
                    ( a.STATUS IS NULL, 1, NULL )) AS sisa,(
                    count( a.register )- COUNT(
                    IF
                    ( STATUS IS NULL, 1, NULL )))/ count( register )*100 AS persentase 
            FROM
                data_kib a inner join (SELECT unit_baru,unit from kamus_lokasi where kode_binprog <> '' GROUP BY unit_baru) b on a.unit_baru=b.unit_baru
            GROUP BY
                b.unit 
            ORDER BY
                persentase DESC");
        
        return $query->result();
   }

   public function get_per_opd_penyelia($list_unit)
   {
    
        $this->db->select('*');
        $this->db->from('kamus_lokasi');
        $this->db->where('kode_binprog <>','');
        $this->db->where_in('unit_baru',$list_unit);
        $this->db->group_by('unit_baru');
        return $this->db->get();
   }

   public function get_per_opd_penyelia_peropd($list_unit)
   {
    
        $this->db->select('*');
        $this->db->from('kamus_lokasi');
        $this->db->where('kode_binprog <>','');
        $this->db->where_in('unit_baru',$list_unit);
        return $this->db->get();
   }


   public function get_status_for_penyelia($data,$kib, $limit, $offset,$form){

        if($form == 2){
            $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,b.unit,a.satuan,a.harga_baru FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi where a.`nomor_lokasi_baru` like '".$no_lokasi."%' and (a.`register` like '%".$data."%' or a.nama_barang like '%".$data."%') limit ".$limit." offset ".$offset."");
        } else {
            $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,b.unit,a.satuan,a.harga_baru,a.status FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi where a.`unit_baru` IN ( '".implode("','",$data)."' ) limit ".$limit." offset ".$offset."");
        } 

        return $query->result();
    }

    public function get_status_for_penyelia_peropd($data,$kib, $limit, $offset,$form){

        if($form == 2){
            $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,b.unit,a.satuan,a.harga_baru FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi where a.`nomor_lokasi_baru` like '".$no_lokasi."%' and (a.`register` like '%".$data."%' or a.nama_barang like '%".$data."%') limit ".$limit." offset ".$offset."");
        } else {
            $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,b.unit,a.satuan,a.harga_baru,a.status FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi where a.`unit_baru` ='".$data."' limit ".$limit." offset ".$offset."");
        } 

        return $query->result();
    }

    public function hitungBanyakRowRegister($data,$kib,$form)
    {
                // $this->db->where(array('register' => '19012142-2019-1140133-1-143-1'));
                if ($form == 2){
                    $no_lokasi=$this->session->userdata('no_lokasi_asli');
                    $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.harga_baru FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi where a.ekstrakomtabel is NULL and a.`status` is null and a.`nomor_lokasi_baru` like '".$no_lokasi."%' and (a.`register` like '%".$data."%' or a.nama_barang like '%".$data."%')");

                    return $query;
                } else {
                    $this->db->select('*');
                    $this->db->from('data_kib');
                    $this->db->where_in('unit_baru',$data);
                    $this->db->like('kode108_baru',$kib);

                    return $this->db->get();
                } 
    }

    public function ambil_register_form_penyelia($register) {
                // return $this->db->from("register_isi")->where($where)->order_by('created_time DESC, created_date DESC')->get();

                // $this->db->select('*');
                // $this->db->from('register_isi');
                // $this->db->join('kamus_lokasi', 'kamus_lokasi.nomor_lokasi = register_isi.lokasi');
                // $this->db->where('register_isi.register',$where);
                // $this->db->order_by('created_date', 'DESC');
                // $this->db->order_by('created_time', 'DESC');
                // return $this->db->get();

                $query = $this->db->query("SELECT a.*,b.* FROM `register_isi` a join kamus_lokasi b on a.lokasi=b.nomor_lokasi where a.register = '".$register."' order by created_date DESC, created_time DESC");
                return $query;
    }

    public function ambil_status_register_form($register){

                return $this->db->from("register_status")->where(array('is_register' => $register))->order_by('created_date DESC, created_time DESC')->get();
    }

    public function ambil_file($data) {
                return $this->db->get_Where('jurnal_upload',array('register' => $data));
    }

    public function ambil_jurnal_penolakan($data)
    {
                // $query = $this->db->get_where('jurnal_penolakan', $data);
                return $this->db->from("jurnal_penolakan")->where($data)->order_by('created_time desc, created_time desc')->get();
                // return $query->row();
    }

    public function ambil_register_form($register)
    {
                // return $this->db->from("register_isi")->where($where)->order_by('created_time DESC, created_date DESC')->get();

                // $this->db->select('*');
                // $this->db->from('register_isi');
                // $this->db->join('kamus_lokasi', 'kamus_lokasi.nomor_lokasi = register_isi.lokasi');
                // $this->db->where('register_isi.register',$where);
                // $this->db->order_by('created_date', 'DESC');
                // $this->db->order_by('created_time', 'DESC');
                // return $this->db->get();

                $query = $this->db->query("SELECT a.*,b.* FROM `register_isi` a join kamus_lokasi b on a.lokasi=b.nomor_lokasi where a.register = '".$register."' order by created_date DESC, created_time DESC");
                return $query;
    }

    public function ambil_register($register)
    {   

                $query = $this->db->query("SELECT a.*,b.* FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi where a.register = '".$register."'");

                // return $query->result();
                // $query = $this->db->get_where('data_kib', $where);
                return $query->row();
    }

    public function pb_verif($nomor_lokasi)
    {   

                $this->db->select('*');
                $this->db->from('pengguna');
                $this->db->like('nomor_lokasi', $nomor_lokasi);
                $this->db->where_not_in('fungsi', array('Penyelia','Admin'));
                return $this->db->get();
    }
}

?>
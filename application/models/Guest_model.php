<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Guest_model extends CI_Model{	
 
    public function get_proses_reg($list)
    {
        if($list==1) {
            $query = $this->db->query("SELECT
                    b.unit,
                    a.nomor_lokasi,
                    a.nama_barang,
                    a.register,
                    COUNT( a.register ) as jumlah
                FROM
                    `data_kib` a
                    INNER JOIN (select * from kamus_lokasi GROUP BY nomor_unit) b ON b.nomor_unit = left(a.nomor_lokasi_baru,12)
                WHERE
                    a.`status` = '1'
                GROUP BY
                    left(a.nomor_lokasi,12)");

        } else {
                    $query = $this->db->query("SELECT
                    b.unit,
                    a.nomor_lokasi,
                    a.nama_barang,
                    a.register,
                    COUNT( a.register ) as jumlah
                FROM
                    `data_kib` a
                    INNER JOIN (select * from kamus_lokasi GROUP BY nomor_unit) b ON b.nomor_unit = left(a.nomor_lokasi,12) 
                WHERE
                    a.`status` = '1' and left(a.nomor_lokasi,12) in ('".implode("','",$list)."')
                GROUP BY
                    left(a.nomor_lokasi,12)");
        }
            

            return $query->result();
    }

    public function get_tolak_reg($list)
    {
        
        if($list==1) {
            $query = $this->db->query("SELECT
                    b.unit,
                    left(a.nomor_lokasi,12),
                    a.nama_barang,
                    a.register,
                    COUNT( a.register ) as jumlah
                FROM
                    `data_kib` a
                    INNER JOIN (select * from kamus_lokasi GROUP BY nomor_unit) b ON b.nomor_unit = left(a.nomor_lokasi,12) 
                WHERE
                    a.`status` = '3'
                GROUP BY
                    left(a.nomor_lokasi,12)");
        } else {

            $query = $this->db->query("SELECT
                    b.unit,
                    left(a.nomor_lokasi,12),
                    a.nama_barang,
                    a.register,
                    COUNT( a.register ) as jumlah
                FROM
                    `data_kib` a
                    INNER JOIN (select * from kamus_lokasi GROUP BY nomor_unit) b ON b.nomor_unit = left(a.nomor_lokasi,12) 
                WHERE
                    a.`status` = '3' and left(a.nomor_lokasi,12) in ('".implode("','",$list)."')
                GROUP BY
                    left(a.nomor_lokasi,12)");
            }

            return $query->result();
    }

    public function get_data_chart($list)
    {
            if($list==1) {
                $query = $this->db->query("SELECT (select count(register) from data_kib where status ='1') as jumlah_proses, (select count(register) from data_kib where status ='3') as jumlah_tolak, (select count(register) from data_kib where status ='2') as jumlah_terverif, (select count(register) from data_kib where status is null and ekstrakomtabel is null) as jumlah_reg_belum_diisi");
            } else {
                    $query = $this->db->query("SELECT (select count(register) from data_kib where left(nomor_lokasi_baru,12) in ('".implode("','",$list)."') and status ='1') as jumlah_proses, (select count(register) from data_kib where left(nomor_lokasi_baru,12) in ('".implode("','",$list)."') and status ='3') as jumlah_tolak, (select count(register) from data_kib where left(nomor_lokasi_baru,12) in ('".implode("','",$list)."') and status ='2') as jumlah_terverif, (select count(register) from data_kib where left(nomor_lokasi_baru,12) in ('".implode("','",$list)."') and status is null) as jumlah_reg_belum_diisi");
                }
        
        return $query->row();
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
                    data_kib a inner join (SELECT nomor_unit,unit from kamus_lokasi where kode_binprog <> '' GROUP BY nomor_unit) b on left(a.nomor_lokasi,12)=b.nomor_unit
                WHERE
                    left(kode108_baru,5) in ('1.3.1','1.3.2','1.3.3')
                GROUP BY
                    b.unit 
                ORDER BY
                    persentase DESC");
            
            return $query->result();
    }

    public function list_unit()
    {
        
        $this->db->select('nomor_unit,unit');
        $this->db->from('kamus_lokasi');
        $this->db->where('kode_binprog <>','');
        $this->db->group_by('nomor_unit');
        return $this->db->get();
    }

    public function hitungBanyakRowRegister($data,$kib,$form)
    {

        if ($form == 2){    

            $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi_baru,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.harga_baru FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi where a.ekstrakomtabel is NULL and kode108_baru like '%".$kib."%' and  (a.`register` like '%".$data."%' or a.nama_barang like '%".$data."%')");

        } elseif ($form == 1) {

            $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,b.unit,a.satuan,a.harga_baru,a.status FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi where left(a.`nomor_lokasi_baru`,12) = '".$data."' and kode108_baru like '%".$kib."%' order by a.status desc ");

        } else {
            $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi_baru,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi_baru=b.nomor_lokasi where a.ekstrakomtabel is NULL and kode108_baru like '%".$kib."%'");
                       
            }

        return $query;
    }

    public function get_all_register_pagination($data,$kib, $limit, $offset,$form)
    
    {
        if($form == 2){
            $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru,a.status FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi where a.ekstrakomtabel is NULL and kode108_baru like '%".$kib."%' and (a.`register` like '%".$data."%' or a.nama_barang like '%".$data."%') limit ".$limit." offset ".$offset."");

        } elseif ($form == 1) {
            $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru,a.status FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi where a.ekstrakomtabel is NULL  and kode108_baru like '%".$kib."%' and a.`nomor_lokasi_baru` like '%".$data."%' limit ".$limit." offset ".$offset."");
        } else {
            $query = $this->db->query("SELECT a.register,a.kode64_baru,a.kode108_baru,a.nomor_lokasi,a.nama_barang,a.merk_alamat,a.tipe,b.lokasi,a.satuan,a.tahun_pengadaan,a.harga_baru,a.status FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi where a.ekstrakomtabel is NULL  and kode108_baru like '%".$kib."%' limit ".$limit." offset ".$offset."");
        }
        return $query->result();
    }    


    // MODEL UNTUK CETAK LAPORAN //////////////////////////////////////////////////////////

    public function get_perubahan_fisik_barang($kib)
    {
        $query = $this->db->query("SELECT a.*,b.unit,b.lokasi,c.kondisi_barang,c.register from data_kib a join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi inner join register_isi c on a.register=c.register  where a.kode108_baru like '%".$kib."%' and a.status = '2' and a.kondisi <> c.kondisi_barang");
        
        return $query;
    }

    public function get_data_tidak_ditemukan($kib)
    {
        $query = $this->db->query("SELECT a.*,b.unit,b.lokasi,c.kondisi_barang,c.register,c.keterangan as ket_baru from data_kib a join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi inner join register_isi c on a.register=c.register where a.kode108_baru like '%".$kib."%' and a.status = '2' and c.keberadaan_barang = 'Tidak Diketemukan' group by c.register");
        
        return $query;
    }

    public function get_perubahan_data_barang($kib)
    {
        $query = $this->db->query("SELECT a.kode108_baru,a.nama_barang as name_awal,a.register,a.merk_alamat,a.tipe as tipe_awal,a.satuan,a.harga_baru,b.kode_barang,b.nama_barang as name_baru,b.spesifikasi_barang_merk,b.register,b.tipe as tipe_baru,b.keterangan,b.lainnya,c.unit,c.lokasi from data_kib a inner join register_isi b on a.register=b.register INNER JOIN kamus_lokasi c on a.nomor_lokasi=c.nomor_lokasi inner join register_status d on a.register=d.is_register where a.kode108_baru like '%".$kib."%' and a.status = 2 and (d.is_kode_barang=1 or d.is_nama_barang=1 or d.is_spesifikasi_barang_merk=1 or d.is_tipe=1) GROUP BY b.register");

        return $query;
    
    }

    public function get_data_hilang($kib)
    {
        $query = $this->db->query("SELECT a.*,b.unit,b.lokasi,c.kondisi_barang,c.register,c.keterangan as ket_baru from data_kib a join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi inner join register_isi c on a.register=c.register where a.kode108_baru like '%".$kib."%' and a.status = '2' and c.keberadaan_barang = 'Hilang' group by c.register");

        return $query;
    }

    public function get_belum_kapt_ada_induk($kib)
    {
        $query = $this->db->query("SELECT b.unit,b.lokasi,a.register,a.kode_barang,a.nama_barang,a.spesifikasi_barang_merk,a.tipe,a.satuan,a.nilai_perolehan,a.merupakan_anak,c.kode108_baru,c.nomor_lokasi,c.nama_barang as name_anak,c.merk_alamat as merk_anak,c.tipe as tipe_anak,a.keterangan FROM `register_isi` a inner join kamus_lokasi b on a.nomor_lokasi_awal=b.nomor_lokasi inner join data_kib c on a.merupakan_anak=c.register where a.kode_barang like '%".$kib."%' and c.status = '2' and a.register <> a.merupakan_anak");

        return $query;
    }

    public function get_data_ganda($kib)
    {
        $query = $this->db->query("SELECT b.unit,b.lokasi,a.register,a.kode_barang,a.nama_barang,a.spesifikasi_barang_merk,a.tipe,a.satuan,a.nilai_perolehan,a.register_ganda,c.kode108_baru,c.nomor_lokasi,c.nama_barang as name_anak,c.merk_alamat as merk_anak,c.tipe as tipe_anak,c.satuan as satuan_anak,c.harga_baru,c.tahun_pengadaan,d.nama_kepala,a.keterangan FROM `register_isi` a inner join kamus_lokasi b on a.nomor_lokasi_awal=b.nomor_lokasi inner join data_kib c on a.register_ganda=c.register inner join pengguna d on left(c.nomor_lokasi,11) = d.nomor_lokasi where a.register <> a.register_ganda and c.`status` = '2' and a.kode_barang like '%".$kib."%' GROUP BY a.register");

        return $query;
    }

    public function get_data_dipakai_pegawai($kib)
    {
        $query = $this->db->query("SELECT b.unit,b.lokasi,a.register,a.nama_barang,a.kode108_baru,a.merk_alamat,a.tipe,a.satuan,a.harga_baru,c.nama_penanggung_jawab,a.keterangan FROM `data_kib` a inner join kamus_lokasi b on a.nomor_lokasi=b.nomor_lokasi inner join data_pemegang_kendaraan c on a.register=c.register where a.`status` = '2' and a.kode108_baru like '%".$kib."%' and (c.nama_penanggung_jawab <> '' and c.nama_penanggung_jawab <> '-')");

        return $query;
    }

    // END MODEL UNTUK CETAK LAPORAN //////////////////////////////////////////////////////////





}
?>
<?php
class M_kategori extends CI_Model{
	private $primary="id_kategori";
	private $state="status";
	private $tabledos="kategori_dosen";
	private $tabletu="kategori_tu";
	private $tablemhs="kategori_mahasiswa";
	private $uploaddos="upload_dosen";
	private $uploadtu="upload_tu";
	private $uploadmhs="upload_mahasiswa";
    
    function ambil_data($limit,$offset,$order_column,$order_type='asc'){
        $q=$this->db->query(" select * from kategori_dosen
							where status='aktif' ORDER BY id_kategori DESC LIMIT $limit OFFSET $offset ");
        return $q;
    }
	function ambil_datatu($limit,$offset,$order_column,$order_type='asc'){
        $q=$this->db->query(" select * from kategori_tu
							where status='aktif' ORDER BY id_kategori DESC LIMIT $limit OFFSET $offset ");
        return $q;
    }
	function ambil_datamhs($limit,$offset,$order_column,$order_type='asc'){
        $q=$this->db->query(" select * from kategori_mahasiswa
							where status='aktif' ORDER BY id_kategori DESC LIMIT $limit OFFSET $offset ");
        return $q;
    }
	function jumlahaktif(){
		$this->db->where($this->state, 'aktif');
		$this->db->from($this->tabledos);
		return $this->db->count_all_results();
    }
	function jumlahaktiftu(){
		$this->db->where($this->state, 'aktif');
		$this->db->from($this->tabletu);
		return $this->db->count_all_results();
    }
	function jumlahaktifmhs(){
		$this->db->where($this->state, 'aktif');
		$this->db->from($this->tablemhs);
		return $this->db->count_all_results();
    }
	function ambil_non($limit,$offset,$order_column,$order_type='asc'){
        $q=$this->db->query(" select * from kategori_dosen
							where status='nonaktif' ORDER BY id_kategori DESC LIMIT $limit OFFSET $offset ");
        return $q;
    }
	function ambil_nontu($limit,$offset,$order_column,$order_type='asc'){
        $q=$this->db->query(" select * from kategori_tu
							where status='nonaktif' ORDER BY id_kategori DESC LIMIT $limit OFFSET $offset ");
        return $q;
    }
	function ambil_nonmhs($limit,$offset,$order_column,$order_type='asc'){
        $q=$this->db->query(" select * from kategori_mahasiswa
							where status='nonaktif' ORDER BY id_kategori DESC LIMIT $limit OFFSET $offset ");
        return $q;
    }
	function jumlahnonaktif(){
		$this->db->where($this->state, 'nonaktif');
		$this->db->from($this->tabledos);
		return $this->db->count_all_results();
    }
	function jumlahnonaktiftu(){
		$this->db->where($this->state, 'nonaktif');
		$this->db->from($this->tabletu);
		return $this->db->count_all_results();
    }
	function jumlahnonaktifmhs(){
		$this->db->where($this->state, 'nonaktif');
		$this->db->from($this->tablemhs);
		return $this->db->count_all_results();
    }
	function cek($kode){
        $this->db->where($this->primary,$kode);
        $query=$this->db->get($this->tabledos);        
        return $query;
    }
	function cektu($kode){
        $this->db->where($this->primary,$kode);
        $query=$this->db->get($this->tabletu);        
        return $query;
    }
	function cekmhs($kode){
        $this->db->where($this->primary,$kode);
        $query=$this->db->get($this->tablemhs);        
        return $query;
    }
	function simpan($info){
        $this->db->insert($this->tabledos,$info);
        return $this->db->insert_id();
    }
	function simpandosen($id_k,$nama){
        $q=$this->db->query(" insert into kategori_dosen
								values('$id_k','$nama','aktif')");
        return $q;
	}
	function simpantu($id_k,$nama){
        $q=$this->db->query(" insert into kategori_tu
								values('$id_k','$nama','aktif')");
        return $q;
	}
	function simpanmhs($id_k,$nama){
        $q=$this->db->query(" insert into kategori_mahasiswa
								values('$id_k','$nama','aktif')");
        return $q;
	}
	function ceki($id_kategori){
        $this->db->where($this->primary,$id_kategori);
        $query=$this->db->get($this->tabledos);        
        return $query;
    }
	function cekitu($id_kategori){
        $this->db->where($this->primary,$id_kategori);
        $query=$this->db->get($this->tabletu);        
        return $query;
    }
	function cekimhs($id_kategori){
        $this->db->where($this->primary,$id_kategori);
        $query=$this->db->get($this->tablemhs);        
        return $query;
    }
	function cekn($id_kategori){
        $this->db->where($this->primary,$id_kategori);
        $query=$this->db->get($this->tabledos);        
        return $query;
    }
	function cekntu($id_kategori){
        $this->db->where($this->primary,$id_kategori);
        $query=$this->db->get($this->tabletu);        
        return $query;
    }
	function ceknmhs($id_kategori){
        $this->db->where($this->primary,$id_kategori);
        $query=$this->db->get($this->tablemhs);        
        return $query;
    }
	function update($info, $id){
        $this->db->where($this->primary, $id);
		$this->db->update($this->tabledos, $info);
    }
	function updatetu($info, $id){
        $this->db->where($this->primary, $id);
		$this->db->update($this->tabletu, $info);
    }
	function updatemhs($info, $id){
        $this->db->where($this->primary, $id);
		$this->db->update($this->tablemhs, $info);
    }
	function update_hapus($info,$id){
        $this->db->where($this->primary, $id);
		$this->db->update($this->tabledos, $info);
    }
	function update_hapustu($info,$id){
        $this->db->where($this->primary, $id);
		$this->db->update($this->tabletu, $info);
    }
	function update_hapusmhs($info,$id){
        $this->db->where($this->primary, $id);
		$this->db->update($this->tablemhs, $info);
    }
	function cekaktif($id_kategori){
        $this->db->where($this->primary,$id_kategori);
        $query=$this->db->get($this->tabledos);        
        return $query;
    }
	function cekaktiftu($id_kategori){
        $this->db->where($this->primary,$id_kategori);
        $query=$this->db->get($this->tabletu);        
        return $query;
    }
	function cekaktifmhs($id_kategori){
        $this->db->where($this->primary,$id_kategori);
        $query=$this->db->get($this->tablemhs);        
        return $query;
    }
	function update_aktif($info,$id){
        $this->db->where($this->primary, $id);
		$this->db->update($this->tabledos, $info);
    }
	function update_aktiftu($info,$id){
        $this->db->where($this->primary, $id);
		$this->db->update($this->tabletu, $info);
    }
	function update_aktifmhs($info,$id){
        $this->db->where($this->primary, $id);
		$this->db->update($this->tablemhs, $info);
    }
	function cari($cari){
        $q=$this->db->query("
							select * from kategori_dosen where nama_kategori LIKE '%$cari%' and status='aktif'
							");
        return $q;
    }
	function caritu($cari){
        $q=$this->db->query("
							select * from kategori_tu where nama_kategori LIKE '%$cari%' and status='aktif'
							");
        return $q;
    }
	function carimhs($cari){
        $q=$this->db->query("
							select * from kategori_mahasiswa where nama_kategori LIKE '%$cari%' and status='aktif'
							");
        return $q;
    }
	function cariid($cari){
        $q=$this->db->query("
							select * from kategori_dosen where id_kategori LIKE '%$cari%' and status='aktif'
							");
        return $q;
    }
	function cariidtu($cari){
        $q=$this->db->query("
							select * from kategori_tu where id_kategori LIKE '%$cari%' and status='aktif'
							");
        return $q;
    }
	function cariidmhs($cari){
        $q=$this->db->query("
							select * from kategori_mahasiswa where id_kategori LIKE '%$cari%' and status='aktif'
							");
        return $q;
    }
	function carinon($cari){
        $q=$this->db->query("
							select * from kategori_dosen where nama_kategori LIKE '%$cari%' and status='nonaktif'
							");
        return $q;
    }
	function carinontu($cari){
        $q=$this->db->query("
							select * from kategori_tu where nama_kategori LIKE '%$cari%' and status='nonaktif'
							");
        return $q;
    }
	function carinonmhs($cari){
        $q=$this->db->query("
							select * from kategori_mahasiswa where nama_kategori LIKE '%$cari%' and status='nonaktif'
							");
        return $q;
    }
	function simpan_gambardos($info){
		$this->db->insert($this->uploaddos,$info);
        return $this->db->insert_id();
	}
	function simpan_gambartu($info){
		$this->db->insert($this->uploadtu,$info);
        return $this->db->insert_id();
	}
	function simpan_gambarmhs($info){
		$this->db->insert($this->uploadmhs,$info);
        return $this->db->insert_id();
	}
	function cekdos($id_upload){
        $q=$this->db->query("
							select * from upload_dosen where id_upload = '$id_upload'");       
        return $q;
    }
	function cekdoss($id_upload){
        $q=$this->db->query("
							select * from kategori_dosen, upload_dosen 
							where kategori_dosen.id_kategori = upload_dosen.id_kategori
							and id_upload = '$id_upload'");       
        return $q;
    }
	function cektuu($id_upload){
        $q=$this->db->query("
							select * from kategori_tu, upload_tu 
							where kategori_tu.id_kategori = upload_tu.id_kategori
							and id_upload = '$id_upload'");       
        return $q;
    }
	function cekmhss($id_upload){
        $q=$this->db->query("
							select * from kategori_mahasiswa, upload_mahasiswa 
							where kategori_mahasiswa.id_kategori = upload_mahasiswa.id_kategori
							and id_upload = '$id_upload'");       
        return $q;
    }
    function getIdkategori($query,$value)
    {
        $q = $this->db->query("select MAX(LEFT(id_kategori,3)) as kd_max from $query");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return $kd.$value;
    }
	function jajal(){
		$q=$this->db->query(" select id_kategori from kategori_dosen");
        return $q;
	}
}
<?php
class M_dosen extends CI_Model{
    private $table="dosen";
	private $primary="id_dosen";
	private $state="status_keanggotaan";
	public $order = 'DESC';
	
	var $gallery_path;
	var $gallery_path_url;
  
	function __construct() {
	parent::__construct();
   
		  $this->gallery_path = realpath(APPPATH . '../gambar');
		  $this->gallery_path_url = base_url().'gambar/';
	}
	
    function ambil_data($limit,$offset,$order_column,$order_type='asc'){
        $q=$this->db->query(" select * from dosen
							where status_keanggotaan='aktif' ORDER BY id_dosen DESC LIMIT $limit OFFSET $offset ");
        return $q;
    }
	function ambil_data_semua(){
        $q=$this->db->query(" select * from dosen");
        return $q;
    }
     function ambil_data_dos($user_dos){
        $q=$this->db->query(" select * from dosen
                            where username='$user_dos'");
        return $q;
    }
	function jumlahaktif(){
		$this->db->where($this->state, 'aktif');
		$this->db->from($this->table);
		return $this->db->count_all_results();
    }
	function ambil_non($limit,$offset,$order_column,$order_type='asc'){
        $q=$this->db->query(" select * from dosen
							where status_keanggotaan='nonaktif' ORDER BY id_dosen DESC LIMIT $limit OFFSET $offset ");
        return $q;
    }
	function jumlahnonaktif(){
		$this->db->where($this->state, 'nonaktif');
		$this->db->from($this->table);
		return $this->db->count_all_results();
    }
	function cek($id_dosen){
        $this->db->where($this->primary,$id_dosen);
        $query=$this->db->get($this->table);        
        return $query;
    }
	function simpan($info){
        $this->db->insert($this->table,$info);
        return $this->db->insert_id();
    }
	function simakses($user,$akses){
       $this->db->query("INSERT INTO hak_akses_user (id_user,id_akses) VALUES ('$user','$akses')");
    }
	function ceki($id_dosen){
        $this->db->where($this->primary,$id_dosen);
        $query=$this->db->get($this->table);        
        return $query;
    }
	function cekn($id_dosen){
        $this->db->where($this->primary,$id_dosen);
        $query=$this->db->get($this->table);        
        return $query;
    }
	function cekg($id_d){
        $this->db->where($this->primary,$id_d);
        $query=$this->db->get($this->table);        
        return $query;
    }
	function update($info, $id){
        $this->db->where($this->primary, $id);
		$this->db->update($this->table, $info);
    }
	function update_hapus($info,$id){
        $this->db->where($this->primary, $id);
		$this->db->update($this->table, $info);
    }
	function cekaktif($id_dosen){
        $this->db->where($this->primary,$id_dosen);
        $query=$this->db->get($this->table);        
        return $query;
    }
		function update_aktif($info,$id){
        $this->db->where($this->primary, $id);
		$this->db->update($this->table, $info);
    }
	function cari($cari){
        $q=$this->db->query("
							select * from dosen where nama_dosen LIKE '%$cari%' and status_keanggotaan='aktif'
							");
        return $q;
    }
	function cariid($cari){
        $q=$this->db->query("
							select * from dosen where id_dosen LIKE '%$cari%' and status_keanggotaan='aktif'
							");
        return $q;
    }
	function carinon($cari){
        $q=$this->db->query("
							select * from dosen where nama_dosen LIKE '%$cari%' and status_keanggotaan='nonaktif'
							");
        return $q;
    }
	function kategori(){
        $q=$this->db->query(" select * from kategori_dosen
							where status='aktif'");
        return $q;
    }
	
	
	function loaddata($dataarray) {
        for ($i = 0; $i < count($dataarray); $i++) {
            $data = array(
                'id_dosen' => $dataarray[$i]['id_dosen'],
                'nama_dosen' => $dataarray[$i]['nama_dosen'],
                'tmpt_lahir' => $dataarray[$i]['tmpt_lahir'],
                'tgl_lahir' => $dataarray[$i]['tgl_lahir'],
                'jenis_kelamin' => $dataarray[$i]['jenis_kelamin'],
                'agama' => $dataarray[$i]['agama'],
                'pendidikan_akhir' => $dataarray[$i]['pendidikan_akhir'],
                'status_kepegawaian' => $dataarray[$i]['status_kepegawaian'],
                'status_keanggotaan' => $dataarray[$i]['status_keanggotaan'],
                'alamat' => $dataarray[$i]['alamat'],
                'username' => $dataarray[$i]['username'],
                'password' => $dataarray[$i]['password']
            );
			$cek=$this->db->where('id_dosen', $this->input->post('id_dosen'));  
            if($cek){
				$this->db->insert($this->table, $data);
			}
		}
	}
	function loaddata2($dataarray) {
        for ($a = 0; $a < count($dataarray); $a++) {
            $data = array(
                'id_user' => $dataarray[$a]['id_dosen'],
                'id_akses' => 'akses002'
            );
				$this->db->insert('hak_akses_user', $data);
		}
	}
	function cekgambar($dosen, $idkat){
        $q=$this->db->query(" select * from dosen, kategori_dosen, upload_dosen
							where dosen.id_dosen='$dosen' 
							and upload_dosen.id_kategori='$idkat'
							and upload_dosen.id_dosen=dosen.id_dosen
							and kategori_dosen.id_kategori=upload_dosen.id_kategori");
        return $q;
    }
	function cekgamba($idkat,$id){
        $q=$this->db->query(" select * from upload_dosen
							where id_kategori='$idkat'
							and id_dosen='$id'");
        return $q;
    }
	function cekupload($idup){
        $q=$this->db->query(" select * from upload_dosen
							where id_upload='$idup'");
        return $q;
    }
	function hapusgambar ($idup){
		$q=$this->db->query(" delete from upload_dosen
							where id_upload='$idup'");
        return $q;
	}
}
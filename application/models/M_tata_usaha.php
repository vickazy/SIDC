<?php
class M_tata_usaha extends CI_Model{
    private $table="tata_usaha";
	private $primary="id_tu";
	private $state="status_keanggotaan";
    
    function ambil_data($limit,$offset,$order_column,$order_type='asc'){
        $q=$this->db->query(" select * from tata_usaha 
							where status_keanggotaan='aktif' ORDER BY id_tu DESC LIMIT $limit OFFSET $offset ");
        return $q;
    }
	function ambil_data_semua(){
        $q=$this->db->query(" select * from tata_usaha");
        return $q;
    }
    function ambil_data_tu($user_tu){
        $q=$this->db->query(" select * from tata_usaha 
                            where username='$user_tu'");
        return $q;
    }
	function ambil_non($limit,$offset,$order_column,$order_type='asc'){
        $q=$this->db->query(" select * from tata_usaha 
							where status_keanggotaan='nonaktif' ORDER BY id_tu DESC LIMIT $limit OFFSET $offset ");
        return $q;
    }
	function level($id){
		$q=$this->db->query(" select * from hak_akses
								where hak_akses.id_hak_akses='$id'
							");
		return $q;
	}
	function jumlahaktif(){
		$this->db->where($this->state, 'aktif');
		$this->db->from($this->table);
		return $this->db->count_all_results();
    }
	function jumlahnonaktif(){
		$this->db->where($this->state, 'nonaktif');
		$this->db->from($this->table);
		return $this->db->count_all_results();
    }
	function cek($kode){
        $this->db->where($this->primary,$kode);
        $query=$this->db->get($this->table);        
        return $query;
    }
	function cekaktif($id){
        $this->db->where($this->primary,$id);
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
	function ceki($id){
        $this->db->where($this->primary,$id);
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
	function update_aktif($info,$id){
        $this->db->where($this->primary, $id);
		$this->db->update($this->table, $info);
    }
	function cari($cari){
        $q=$this->db->query("
							select * from tata_usaha where nama_tu LIKE '%$cari%' and status_keanggotaan='aktif'
							");
        return $q;
    }
	function cariid($cari){
        $q=$this->db->query("
							select * from tata_usaha where id_tu LIKE '%$cari%' and status_keanggotaan='aktif'
							");
        return $q;
    }
	function carinon($cari){
        $q=$this->db->query("
							select * from tata_usaha where nama_tu LIKE '%$cari%' and status_keanggotaan='nonaktif'
							");
        return $q;
    }
	function kategori(){
        $q=$this->db->query(" select * from kategori_tu
							where status='aktif'");
        return $q;
    }
	function akses_tu($id_tu){
        $q=$this->db->query("select * from tata_usaha, hak_akses, hak_akses_user
							where tata_usaha.id_tu=hak_akses_user.id_user
							and hak_akses_user.id_akses=hak_akses.id_hak_akses
							and tata_usaha.id_tu='$id_tu'");
        return $q;
    }
	function akses(){
        $q=$this->db->query("select * from hak_akses
							where nama_akses!='mahasiswa'
							and nama_akses!='dosen'");
        return $q;
    }
	function cekakses($id,$id_akses){
        $q=$this->db->query("select * from hak_akses_user
							where hak_akses_user.id_akses='$id_akses'
							and hak_akses_user.id_user='$id'");
        return $q;
    }
	function simpanakses($id,$id_akses){
        $q=$this->db->query("INSERT INTO hak_akses_user (id_user,id_akses) VALUES ('$id','$id_akses')");
        return $q;
    }
	function hapusakses($id,$id_akses){
        $q=$this->db->query("delete from hak_akses_user
							where id_user='$id'
							and id_akses='$id_akses'");
        return $q;
    }
	function hapusakses2($id){
        $q=$this->db->query("delete from hak_akses_user
							where id_user='$id'");
        return $q;
    }
	function loaddata($dataarray) {
        for ($i = 0; $i < count($dataarray); $i++) {
            $data = array(
                'id_tu' => $dataarray[$i]['id_tu'],
                'nama_tu' => $dataarray[$i]['nama_tu'],
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
			$cek=$this->db->where('id_tu', $this->input->post('id_tu'));  
            if($cek){
				$this->db->insert($this->table, $data);
			}
		}
	}
	function loaddata2($dataarray) {
        for ($a = 0; $a < count($dataarray); $a++) {
            $data = array(
                'id_user' => $dataarray[$a]['id_tu'],
                'id_akses' => 'akses003'
            );
				$this->db->insert('hak_akses_user', $data);
		}
	}
	function cekgambar($tu, $idkat){
        $q=$this->db->query(" select * from tata_usaha, kategori_tu, upload_tu
							where tata_usaha.id_tu='$tu' 
							and upload_tu.id_kategori='$idkat'
							and upload_tu.id_tu=tata_usaha.id_tu
							and kategori_tu.id_kategori=upload_tu.id_kategori");
        return $q;
    }
	function cekgamba($idkat,$id){
        $q=$this->db->query(" select * from upload_tu
							where id_kategori='$idkat'
							and id_tu='$id'");
        return $q;
    }
	function hapusgambar ($idup){
		$q=$this->db->query("delete from upload_tu
							where id_upload='$idup'");
        return $q;
	}
	function cekupload($idup){
        $q=$this->db->query(" select * from upload_tu
							where id_upload='$idup'");
        return $q;
    }
}
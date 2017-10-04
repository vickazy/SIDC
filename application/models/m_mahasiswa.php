<?php
class M_mahasiswa extends CI_Model{
    private $table="mahasiswa";
	private $primary="nim";
	private $state="status";
    
    function ambil_data($limit,$offset,$order_column,$order_type='asc'){
        $q=$this->db->query(" select * from mahasiswa
							where status='aktif' ORDER BY nim ASC LIMIT $limit OFFSET $offset ");
        return $q;
    }
	function ambil_data_semua(){
        $q=$this->db->query(" select * from mahasiswa");
        return $q;
    }
    function ambil_data_mhs($user_mhs){
        $q=$this->db->query(" select * from mahasiswa
                            where username='$user_mhs'");
        return $q;
    }
	function jumlahaktif(){
		$this->db->where($this->state, 'aktif');
		$this->db->from($this->table);
		return $this->db->count_all_results();
    }
	function cekpass($username,$password){
        $this->db->where("username",$username);
        $this->db->where("password",$password);
        return $this->db->get("mahasiswa");
    }
	function akses($id){
        $q=$this->db->query(" select * from mahasiswa,hak_akses,hak_akses_user
							where mahasiswa.nim=hak_akses_user.id_user
							and hak_akses.id_hak_akses=hak_akses_user.id_akses
							and hak_akses_user.id_user='$id'");
        return $q;
    }
	function jumakses($id){
		$q=$this->db->query(" 	select id_user, count(id_user) as jml
								from hak_akses_user
								where hak_akses_user.id_user='$id'
								group by id_user
							");
		return $q;
	}
	function profil1($session_id){
        $q=$this->db->query(" select * from mahasiswa,hak_akses,hak_akses_user
							where mahasiswa.nim=hak_akses_user.id_user
							and hak_akses.id_hak_akses=hak_akses_user.id_akses
							and hak_akses_user.id_user='$session_id'");
        return $q;
    }
	function ambil_non($limit,$offset,$order_column,$order_type='asc'){
        $q=$this->db->query(" select * from mahasiswa
							where status='nonaktif' ORDER BY nim DESC LIMIT $limit OFFSET $offset ");
        return $q;
    }
	function gelombang(){
        $q=$this->db->query("
							select * from gelombang;
							");
        return $q;
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
	function simpan($info){
        $this->db->insert($this->table,$info);
        return $this->db->insert_id();
    }
	function simakses($user,$akses){
       $this->db->query("INSERT INTO hak_akses_user (id_user,id_akses) VALUES ('$user','$akses')");
    }
	function ceki($nim){
        $this->db->where($this->primary,$nim);
        $query=$this->db->get($this->table);        
        return $query;
    }
	function cekn($nim){
        $this->db->where($this->primary,$nim);
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
	function cekaktif($nim){
        $this->db->where($this->primary,$nim);
        $query=$this->db->get($this->table);        
        return $query;
    }
	function update_aktif($info,$id){
        $this->db->where($this->primary, $id);
		$this->db->update($this->table, $info);
    }
	function cari($cari){
        $q=$this->db->query("
							select * from mahasiswa where nama_mahasiswa LIKE '%$cari%' and status='aktif'
							");
        return $q;
    }
	function cariid($cari){
        $q=$this->db->query("
							select * from mahasiswa where nim LIKE '%$cari%' and status='aktif'
							");
        return $q;
    }
	function carinon($cari){
        $q=$this->db->query("
							select * from mahasiswa where nama_mahasiswa LIKE '%$cari%' and status='nonaktif'
							");
        return $q;
    }
	function kategori(){
        $q=$this->db->query(" select * from kategori_mahasiswa
							where status='aktif'");
        return $q;
    }
	function loaddata($dataarray) {
        for ($i = 0; $i < count($dataarray); $i++) {
            $data = array(
				'nim'=>$dataarray[$i]['nim'],
				'nama_mahasiswa'=>$dataarray[$i]['nama_mahasiswa'],
				'tahun_masuk'=>$dataarray[$i]['tahun_masuk'],
				'jalan'=>$dataarray[$i]['jalan'],
				'rt'=>$dataarray[$i]['rt'],
				'rw'=>$dataarray[$i]['rw'],
				'desa'=>$dataarray[$i]['desa'],
				'kecamatan'=>$dataarray[$i]['kecamatan'],
				'kota'=>$dataarray[$i]['kota'],
				'kode_pos'=>$dataarray[$i]['kode_pos'],
				'provinsi'=>$dataarray[$i]['provinsi'],
				'phone'=>$dataarray[$i]['phone'],
				'gol_darah'=>$dataarray[$i]['gol_darah'],
				'jk'=>$dataarray[$i]['jk'],
				'agama'=>$dataarray[$i]['agama'],
				'jurusan_asal'=>$dataarray[$i]['jurusan_asal'],
				'ayah'=>$dataarray[$i]['ayah'],
				'ibu'=>$dataarray[$i]['ibu'],
				'pendidikan_ayah'=>$dataarray[$i]['pendidikan_ayah'],
				'pendidikan_ibu'=>$dataarray[$i]['pendidikan_ibu'],
				'pekerjaan_ayah'=>$dataarray[$i]['pekerjaan_ayah'],
				'pekerjaan_ibu'=>$dataarray[$i]['pekerjaan_ibu'],
				'penghasilan_ayah'=>$dataarray[$i]['penghasilan_ayah'],
				'penghasilan_ibu'=>$dataarray[$i]['penghasilan_ibu'],
				'kota_lahir'=>$dataarray[$i]['kota_lahir'],
				'tanggal_lahir'=>$dataarray[$i]['tanggal_lahir'],
				'anak_ke'=>$dataarray[$i]['anak_ke'],
				'jumlah_anak'=>$dataarray[$i]['jumlah_anak'],
				'asal_sekolah'=>$dataarray[$i]['asal_sekolah'],
				'kota_sekolah'=>$dataarray[$i]['kota_sekolah'],
				'nilai_stl'=>$dataarray[$i]['nilai_stl'],
				'nilai_rstl'=>$dataarray[$i]['nilai_rstl'],
				'jumlah_mp'=>$dataarray[$i]['jumlah_mp'],
                'gelombang' => $dataarray[$i]['gelombang'],
				'username'=>$dataarray[$i]['username'],
				'password'=>$dataarray[$i]['password']
            );
			$cek=$this->db->where('nim', $this->input->post('nim'));  
            if($cek){
				$this->db->insert($this->table, $data);
			}
		}
	}
	function loaddata2($dataarray) {
        for ($a = 0; $a < count($dataarray); $a++) {
            $data = array(
                'id_user' => $dataarray[$a]['nim'],
                'id_akses' => 'akses001'
            );
				$this->db->insert('hak_akses_user', $data);
		}
	}
	function cekgambar($mahasiswa, $idkat){
        $q=$this->db->query(" select * from mahasiswa, kategori_mahasiswa, upload_mahasiswa
							where mahasiswa.nim='$mahasiswa' 
							and upload_mahasiswa.id_kategori='$idkat'
							and upload_mahasiswa.id_mahasiswa=mahasiswa.nim
							and kategori_mahasiswa.id_kategori=upload_mahasiswa.id_kategori");
        return $q;
    }
	function cekgamba($idkat,$nim){
        $q=$this->db->query(" select * from upload_mahasiswa
							where id_kategori='$idkat'
							and id_mahasiswa='$nim'");
        return $q;
    }
	function hapusgambar ($idup){
		$q=$this->db->query(" delete from upload_mahasiswa
							where id_upload='$idup'");
        return $q;
	}
	function cekupload($idup){
        $q=$this->db->query(" select * from upload_mahasiswa
							where id_upload='$idup'");
        return $q;
    }
}
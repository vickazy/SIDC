<?php
class Dosen extends CI_Controller{
    private $limit=5;
    
	function __construct(){
        parent::__construct();
		$this->load->helper('back','url'); // helper yg di atas
		backButtonHandle();
		$this->load->library(array('pagination','form_validation','upload','tools'));
		$this->load->model('m_mahasiswa');
		$this->load->model('m_dosen');
		$this->load->model('m_tata_usaha');
		$this->load->model('m_kategori');
		$this->load->model('m_login');
		$this->load->database();
        $this->load->helper(array('form','url','file'));
		$this->load->library('upload','tools');
		if(!$this->session->userdata('username')){
            redirect('home');
		}
    }
    
    function index($offset=0,$order_column='id_dosen',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='id_dosen';
        if(empty($order_type)) $order_type='asc';
		
		//hak akses menu
		include('menu_akses.php');
		
		$data['title']="Dosen | SI DC AKN Bojonegoro";
		$data['judul']="MASTER DATA > Dosen";
		$data['content']="dosen/index.php";
		$data['dosen']=$this->m_dosen->ambil_data($this->limit,$offset,$order_column,$order_type)->result();
		//pengalamatan
		$config['base_url']		=site_url('dosen/index/');
        $config['total_rows']	=$this->m_dosen->jumlahaktif();
        $config['per_page']		=$this->limit;
        $config['uri_segment']	=3;
		
		//style untuk pengalamatan dengan bootstrap
		$config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";	
		
		//parser
        $this->pagination->initialize($config);
        $data['pagination']=$this->pagination->create_links();		
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->load->view('admin/template',$data);
    }
    function dosen1($offset=0,$order_column='id_dosen',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='id_dosen';
        if(empty($order_type)) $order_type='asc';
		
		//hak akses menu
		include('menu_akses.php');
		
		$data['title']="Dosen | SI DC AKN Bojonegoro";
		$data['judul']="MASTER DATA > Dosen";
		$data['content']="dosen1/index.php";
		$user_dos=$this->session->userdata('username');
		$data['dosen']=$this->m_dosen->ambil_data_dos($user_dos)->result();
		//pengalamatan
		$config['base_url']		=site_url('dosen/dosen1/');
        $config['total_rows']	=$this->m_dosen->jumlahaktif();
        $config['per_page']		=$this->limit;
        $config['uri_segment']	=3;
		$this->load->view('admin/template',$data);
	}
	function tambah(){
		//hak akses menu
		include('menu_akses.php');
		
		$data['title']="Dosen | SI DC AKN Bojonegoro";
		$data['judul']="MASTER DATA > Dosen > Tambah";		
		$data['content']="dosen/tambah.php";
		$this->load->view('admin/template',$data);
	}
	
	function tambah_proses(){
		$id=$this->input->post('id_dosen'); 	// mendapatkan input dari kode
		$nama=$this->input->post('nama_dosen'); 	// mendapatkan input dari kode
		$tmpt_lahir=$this->input->post('tmpt_lahir'); 	// mendapatkan input dari kode
		$tgl_lahir=$this->input->post('tgl_lahir'); 	// mendapatkan input dari kode
		$jenis_kelamin=$this->input->post('jenis_kelamin'); 	// mendapatkan input dari kode
		$agama=$this->input->post('agama'); 	// mendapatkan input dari kode
		$pendidikan=$this->input->post('pendidikan'); 	// mendapatkan input dari kode
		$status_kepegawaian=$this->input->post('status_kepegawaian'); 	// mendapatkan input dari kode
		$status_keanggotaan=$this->input->post('status_keanggotaan'); 	// mendapatkan input dari kode
		$akses='akses002'; 
		$alamat=$this->input->post('alamat'); 
		$cek=$this->m_dosen->cek($id); 			// cek kode di database
		if($cek->num_rows()>0){ 				// jika kode sudah ada, maka tampilkan pesan
			$this->session->set_flashdata('m_eror','Dosen <b>'.$id."-".$nama. '</b> sudah ada!');
			redirect('dosen/tambah');
		}else { 								// jika id dosen belum ada, maka simpan
			$info=array(
				'id_dosen'=>$id,
				'nama_dosen'=>$nama,
				'tmpt_lahir'=>$tmpt_lahir,
				'tgl_lahir'=>$tgl_lahir,
				'jenis_kelamin'=>$jenis_kelamin,
				'agama'=>$agama,
				'pendidikan_akhir'=>$pendidikan,
				'status_kepegawaian'=>$status_kepegawaian,
				'status_keanggotaan'=>$status_keanggotaan,
				'alamat'=>$alamat,
				'username'=>$id,
				'password'=>md5($id)
			);
			$this->m_dosen->simpan($info);
			$this->m_dosen->simakses($id,$akses);
			$this->session->set_flashdata('m_sukses','Dosen <b>'.$id."-".$nama. '</b> berhasil ditambahkan!');
			redirect('dosen');
		}
	}
	function edit($id_dosen){
		//hak akses menu
		include('menu_akses.php');		
		$data['title']	="edit Dosen"; 		//judul
		$data['judul']="MASTER DATA > Dosen > Edit";	
        $data['content']="dosen/edit.php"; 	//konten
        $data['dosen']	=$this->m_dosen->ceki($id_dosen)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function edit1($id_dosen){
		//hak akses menu
		include('menu_akses.php');		
		$data['title']	="edit Dosen"; 		//judul
		$data['judul']="MASTER DATA > Dosen > Edit";	
        $data['content']="dosen1/edit.php"; 	//konten
        $data['dosen']	=$this->m_dosen->ceki($id_dosen)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function edit_proses($id_dosenkirim){
		$info=array(
			'id_dosen'=>$id_dosenkirim,
			'nama_dosen'=>$this->input->post('nama'),
			'tmpt_lahir'=>$this->input->post('tempat'),
			'tgl_lahir'=>$this->input->post('tgl_lahir'),
			'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
			'agama'=>$this->input->post('agama'),
			'pendidikan_akhir'=>$this->input->post('pendidikan'),
			'status_kepegawaian'=>$this->input->post('status_kepegawaian'),
			'status_keanggotaan'=>$this->input->post('status_keanggotaan'),
			'alamat'=>$this->input->post('alamat')
		);
		$this->m_dosen->update($info, $id_dosenkirim);
		$this->session->set_flashdata('m_sukses','Data Dosen sudah berhasil diedit!');
		$level=$this->session->userdata('level');
		if($level=='dosen'){
		redirect('dosen/dosen1');	
		}else{
			redirect('dosen');
		}
	}
	function edit_proses2($id_dosenkirim){
		$info=array(
			'id_dosen'=>$id_dosenkirim,
			'nama_dosen'=>$this->input->post('nama'),
			'tmpt_lahir'=>$this->input->post('tempat'),
			'tgl_lahir'=>$this->input->post('tgl_lahir'),
			'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
			'agama'=>$this->input->post('agama'),
			'pendidikan_akhir'=>$this->input->post('pendidikan'),
			'status_kepegawaian'=>$this->input->post('status_kepegawaian'),
			'status_keanggotaan'=>$this->input->post('status_keanggotaan'),
			'alamat'=>$this->input->post('alamat')
		);
		$this->m_dosen->update($info, $id_dosenkirim);
		$this->session->set_flashdata('m_sukses','Data berhasil diedit!');
		redirect('dosen/detail/'.$id_dosenkirim);
	}
	function editpass($id_dosenkirim){
		$info=array(
			'username'=>$this->input->post('username'),
			'password'=>md5($this->input->post('password'))
		);
		$this->m_dosen->update($info, $id_dosenkirim);
		$this->session->set_flashdata('m_sukses','Username dan Password <b>'.$id_dosenkirim. '</b> berhasil diedit!');
		redirect('dosen/detail/'.$id_dosenkirim);
	}
	function hapus($id_dosen){
		//hak akses menu
		include('menu_akses.php');
		
		$data['title']		="hapus dosen";
		$data['judul']		="MASTER DATA > Dosen > Hapus";//judul
        $data['content']	="dosen/hapus.php"; //konten
        $data['dosen']		=$this->m_dosen->ceki($id_dosen)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function hapus_proses($id_dosenkirim){
		$status_keanggotaan='nonaktif';
		$info=array(
			'id_dosen'=>$id_dosenkirim,
			'status_keanggotaan'=>$status_keanggotaan,
		);
        $this->m_dosen->update_hapus($info,$id_dosenkirim);
		$this->session->set_flashdata('m_sukses','Data Dosen sudah berhasil dinonaktifkan!');
		redirect('dosen');
    }
	function detail($id_dosen){
		//hak akses menu
		include('menu_akses.php');		
		$data['title']		="detail dosen";
		$data['judul']		="MASTER DATA > Dosen > Detail"; //judul
        $data['content']	="dosen/detail.php"; //konten
        $data['dosen']		=$this->m_dosen->ceki($id_dosen)->row_array(); //ambil data
        $data['akses']		=$this->m_login->akses_dos($id_dosen)->row_array(); //ambil data
		$data['kategori']	=$this->m_dosen->kategori()->result(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function detail1($id_dosen){
		//hak akses menu
		include('menu_akses.php');		
		$data['title']		="detail dosen";
		$data['judul']		="MASTER DATA > Dosen > Detail"; //judul
        $data['content']	="dosen1/detail.php"; //konten
        $data['dosen']		=$this->m_dosen->ceki($id_dosen)->row_array(); //ambil data
        $data['akses']		=$this->m_login->akses_dos($id_dosen)->row_array(); //ambil data
		$data['kategori']	=$this->m_dosen->kategori()->result(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function detailnon($id_dosen){
		//hak akses menu
		include('menu_akses.php');
		$data['title']		="detail dosen";
		$data['judul']		="MASTER DATA > Dosen > Detail Nonaktif"; //judul
        $data['content']	="dosen/detailnon.php"; //konten
        $data['dosen']		=$this->m_dosen->cekn($id_dosen)->row_array(); //ambil data
        $data['akses']		=$this->m_dosen->akses($id_dosen)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function aktifkan($id_dosen){
		//hak akses menu
		include('menu_akses.php');
		$data['title']="aktifkan Dosen";
		$data['judul']="MASTER DATA > Dosen > Aktifkan";//judul
        $data['content']="dosen/aktifkan.php"; //konten
        $data['dosen']=$this->m_dosen->cekaktif($id_dosen)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function aktifkan_proses($id_dosenkirim){
		$status='aktif';
		$info=array(
			'id_dosen'=>$id_dosenkirim,
			'status_keanggotaan'=>$status,
		);
        $this->m_dosen->update_aktif($info,$id_dosenkirim);
		$this->session->set_flashdata('m_sukses','Data Dosen sudah berhasil diaktifkan!');
		redirect('dosen/nonaktif');
    }
	function nonaktif($offset=0,$order_column='id_dosen',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='id_dosen';
        if(empty($order_type)) $order_type='asc';
		
		//hak akses menu
		include('menu_akses.php');
		$data['title']="Dosen | SI DC AKN Bojonegoro";
		$data['judul']="MASTER DATA > Dosen Nonaktif";
		$data['content']="dosen/nonaktif.php";
		$data['dosen']=$this->m_dosen->ambil_non($this->limit,$offset,$order_column,$order_type)->result();
		//pengalamatan
		$config['base_url']		=site_url('dosen/nonaktif/');
        $config['total_rows']	=$this->m_dosen->jumlahnonaktif();
        $config['per_page']		=$this->limit;
        $config['uri_segment']	=3;
		
		//style untuk pengalamatan dengan bootstrap
		$config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";	
		
		//parser
        $this->pagination->initialize($config);
        $data['pagination']=$this->pagination->create_links();		
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->load->view('admin/template',$data);
    }
	function cari(){
		//hak akses menu
		include('menu_akses.php');
		$data['title']=" Dosen Cari | SI DC AKN Bojonegoro";
		$data['judul']="MASTER DATA > Dosen Cari";
		$data['content']="dosen/cari.php";
		$cari=$this->input->post('cari');
		if ($cari==null){
			redirect(dosen);
		}
		else{
			$cek=$this->m_dosen->cari($cari);
			$cekid=$this->m_dosen->cariid($cari);
			$hasil=$cek->num_rows();
			$hasilid=$cekid->num_rows();
			if($hasil>0){
				$data['dosen']=$cek->result();
				$data['ketemu']='<b>'.$hasil.'</b> data ditemukan berdasarkan <b>'.$cari.'</b>';
				$data['jumlah']=$hasil;
				$this->load->view('admin/template',$data);
			}elseif($hasilid>0){
				$data['dosen']=$cekid->result();
				$data['ketemu']='<b>'.$hasilid.'</b> data ditemukan berdasarkan <b>'.$cari.'</b>';
				$data['jumlah']=$hasilid;
				$this->load->view('admin/template',$data);
			}else{
				$this->session->set_flashdata('m_eror','Pencarian data tidak ditemukan!');
				$data['dosen']=$cek->result();
				redirect('dosen/');
			}
		}
    }
	function carinon(){
		//hak akses menu
		include('menu_akses.php');
		$data['title']=" Dosen Cari | SI DC AKN Bojonegoro";
		$data['judul']="MASTER DATA > Dosen Cari Nonaktif";
		$data['content']="dosen/carinon.php";
		$cari=$this->input->post('carinon');
		if ($cari==null){
			redirect(dosen);
		}
		else{
			$cek=$this->m_dosen->carinon($cari);
			$hasil=$cek->num_rows();
			if($hasil>0){
				$data['dosen']=$cek->result();
				$data['ketemu']='<b>'.$hasil.'</b>data ditemukan berdasarkan <b>'.$cari.'</b>';
				$data['jumlah']=$hasil;
				$this->load->view('admin/template',$data);
			}else{
				$this->session->set_flashdata('m_eror','Pencarian data tidak ditemukan!');
				$data['dosen']=$cek->result();
				redirect('dosen/nonaktif');
			}
		}
    }
	function importdata(){
		 if ($this->input->post('save')) {
			$fileName = $_FILES['import']['name'];
			$config['upload_path'] = './assets/file/';
            $config['file_name'] = $fileName;
            $config['allowed_types'] = 'xls|xlsx';
            $config['max_size']        = 10000;
			$this->load->library('upload');
            $this->upload->initialize($config);
			if (!$this->upload->do_upload('import')) {
				$this->session->set_flashdata('m_eror','Data Gagal Di Impor!');
				redirect('dosen/tambah');
			} else {
			  $upload_data = $this->upload->data('import');
			  $this->load->library('Excel_reader');
			  $this->excel_reader->setOutputEncoding('230787');
			  $file = './assets/file/'.$fileName;
			  $this->excel_reader->read($file);
			  error_reporting(E_ALL ^ E_NOTICE);
			  $data = $this->excel_reader->sheets[0];
			  $dataexcel = array();
			  for ($i = 2; $i <= $data['numRows']; $i++) {
				   if ($data['cells'][$i][2] == '') break;
				   $dataexcel[$i - 2]['id_dosen'] = $data['cells'][$i][1];
				   $dataexcel[$i - 2]['nama_dosen'] = $data['cells'][$i][2];
				   $dataexcel[$i - 2]['tmpt_lahir'] = $data['cells'][$i][3];
				   $dataexcel[$i - 2]['tgl_lahir'] = $data['cells'][$i][4];
				   $dataexcel[$i - 2]['jenis_kelamin'] = $data['cells'][$i][5];
				   $dataexcel[$i - 2]['agama'] = $data['cells'][$i][6];
				   $dataexcel[$i - 2]['pendidikan_akhir'] = $data['cells'][$i][7];
				   $dataexcel[$i - 2]['status_kepegawaian'] = $data['cells'][$i][8];
				   $dataexcel[$i - 2]['status_keanggotaan'] = $data['cells'][$i][9];
				   $dataexcel[$i - 2]['alamat'] = $data['cells'][$i][10];
				   $dataexcel[$i - 2]['username'] = $data['cells'][$i][1];
				   $dataexcel[$i - 2]['password'] = md5($data['cells'][$i][1]);
			  }
			  for ($a = 2; $a <= $data['numRows']; $a++) {
					if ($data['cells'][$a][2] == '') break;
				   $dataexcel2[$a - 2]['id_dosen'] = $data['cells'][$a][1];
			  }
			  $file = $upload_data['file_name'];
			  $path = './assets/file/' . $file;
			  delete_files($path);
			   $this->load->model('M_dosen');
			  $this->m_dosen->loaddata($dataexcel);
			  $this->m_dosen->loaddata2($dataexcel2);
			}
			$this->session->set_flashdata('m_sukses','Data Berhasil Di Impor!');
			redirect('dosen');
		}
	}

	function kompres_jadi(){
		$filename 	= $_FILES['gambar']['name'];
		$dir		= "gambar/";
		$dir1		= "gambardosen/";
		$file		= 'gambar';
		$new_name	= 'kompres'.date('Y-m-d-H-i-s');
		$tipe 		= $_FILES['gambar']['type'];
		$ukuran 	= $_FILES['gambar']['size'];
		
		$vdir_upload	= $dir;
		$file_name		= $_FILES[''.$file.'']["name"];
		$vfile_upload	= $vdir_upload.$file;
		$tmp_file		= $_FILES[''.$file.'']["tmp_name"];
		move_uploaded_file ($tmp_file, $dir.$file_name);
		$id_dosen 	= $this->input->post('id_dosen');
		$id_kategori = $this->input->post('id_kategori');
		date_default_timezone_get('Asia/Jakarta');
		$id_upload = $id_dosen.$id_kategori;
		
		$source_url=$dir.$file_name;
		$info=getimagesize($source_url);
		if ($ukuran <= 200000) {	
			$quality=100;// anda bisa menysesuaikan dengan mengganti valuenya
		}
		elseif ($ukuran > 200000 and $ukuran < 300000) {	
			$quality=90;// anda bisa menysesuaikan dengan mengganti valuenya
		}
		elseif ($ukuran > 300000 and $ukuran < 400000) {	
			$quality=85;// anda bisa menysesuaikan dengan mengganti valuenya
		}
		elseif ($ukuran > 400000 and $ukuran < 500000) {	
			$quality=80;// anda bisa menysesuaikan dengan mengganti valuenya
		}
		elseif ($ukuran > 500000 and $ukuran < 600000) {	
			$quality=75;// anda bisa menysesuaikan dengan mengganti valuenya
		}
		elseif ($ukuran > 600000 and $ukuran < 700000) {	
			$quality=70;// anda bisa menysesuaikan dengan mengganti valuenya
		}
		elseif ($ukuran > 700000 and $ukuran < 800000) {	
			$quality=65;// anda bisa menysesuaikan dengan mengganti valuenya
		}
		elseif ($ukuran > 800000 and $ukuran < 900000) {	
			$quality=60;// anda bisa menysesuaikan dengan mengganti valuenya
		}
		elseif ($ukuran > 1000000 and $ukuran < 1100000) {	
			$quality=55;// anda bisa menysesuaikan dengan mengganti valuenya
		}
		elseif ($ukuran > 1100000 and $ukuran < 1500000) {	
			$quality=50;// anda bisa menysesuaikan dengan mengganti valuenya
		}
		elseif ($ukuran > 1500000 and $ukuran < 2000000) {	
			$quality=40;// anda bisa menysesuaikan dengan mengganti valuenya
		}
		elseif ($ukuran > 2000000 and $ukuran < 2500000) {	
			$quality=35;// anda bisa menysesuaikan dengan mengganti valuenya
		}
		elseif ($ukuran > 2500000 and $ukuran < 3000000) {	
			$quality=30;// anda bisa menysesuaikan dengan mengganti valuenya
		}
		elseif ($ukuran > 3000000) {	
			$quality=25;// anda bisa menysesuaikan dengan mengganti valuenya
		}
			if ($info['mime'] == 'image/jpeg') {
				$gambar = imagecreatefromjpeg($source_url);
				$ext='.jpeg';}
			elseif ($info['mime'] == 'image/gif') {
				$gambar = imagecreatefromgif($source_url);
				$ext='.gif';}
			elseif ($info['mime'] == 'image/png') {
				$gambar = imagecreatefrompng($source_url);
				$ext='.png';}
		 
	if (imagejpeg($gambar, $dir1.$new_name.$ext, $quality)){
		unlink($source_url);
	}else{
		unlink($source_url);
	}
	
		$info=array(
				'id_upload'		=> $id_upload,
				'id_kategori'	=> $id_kategori,
				'id_dosen'		=> $id_dosen,
				'nama_gambar'	=> $new_name.$ext,
				'tipe'			=> $tipe,
				'ukuran'		=> $ukuran
			);
		$this->m_kategori->simpan_gambardos($info);
		$this->session->set_flashdata('m_sukses', 'Gambar Berhasil Diupload');
		$level=$this->session->userdata('level');
			redirect('dosen/detail'.'/'.$id_dosen.'/'.$quality);
	}
	
	function hapusgambardos($idup,$id){
		$upload=$this->m_dosen->cekupload($idup)->row_array();
		$nama = $upload['nama_gambar'];
		$dir = "gambardosen/".$nama;
		unlink($dir);
		$hapus=$this->m_dosen->hapusgambar($idup);
		$this->session->set_flashdata('m_sukses', 'Gambar Berhasil Dihapus');
		redirect('dosen/detail'.'/'.$id);
	}
	function hapusgbr($id_upload){
		//hak akses menu
		include('menu_akses.php');
		$id_d=$this->uri->segment(4);
		$data['title']		="Hapus Gambar Dosen";
		$data['judul']		="MASTER DATA > Dosen > Hapus";//judul
        $data['content']	="dosen/hapusgambar.php"; //konten
        $data['kategori']	=$this->m_kategori->cekdoss($id_upload)->row_array(); //ambil data
        $data['dosen']		=$this->m_dosen->cekg($id_d)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
}
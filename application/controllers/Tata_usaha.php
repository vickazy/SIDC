<?php
class Tata_usaha extends CI_Controller{
    private $limit=5;
    
	function __construct(){
        parent::__construct();
		$this->load->helper('back'); // helper yg di atas
		backButtonHandle();
		$this->load->library(array('pagination','form_validation','upload','tools'));
		$this->load->model('M_mahasiswa');
		$this->load->model('M_dosen');
		$this->load->model('M_tata_usaha');
		$this->load->model('M_kategori');
		$this->load->model('M_login');
		$this->load->database();
        $this->load->helper(array('form','url','file'));
		$this->load->library('Excel_reader');
		if(!$this->session->userdata('username')){
            redirect('home');
		}
    }
    function index($offset=0,$order_column='id_tu',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='id_tu';
        if(empty($order_type)) $order_type='asc';
		
		//hak akses menu
		include('menu_akses.php');		
		$data['title']="Tata Usaha | SI DC AKN Bojonegoro";
		$data['judul']="MASTER DATA > Tata Usaha";
		$session_id = $this->session->userdata('username');
		$tu=($session_id);
		$data['jumlahakses']=$this->M_login->akses_tu($tu)->result();
		$data['content']="tata_usaha/index.php";
		$data['tata_usaha']=$this->M_tata_usaha->ambil_data($this->limit,$offset,$order_column,$order_type)->result();
		//pengalamatan
		$config['base_url']		=site_url('tata_usaha/index/');
        $config['total_rows']	=$this->M_tata_usaha->jumlahaktif();
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
    function tata_usaha1($offset=0,$order_column='id_tu',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='id_tu';
        if(empty($order_type)) $order_type='asc';
		
		//hak akses menu
		include('menu_akses.php');
		
		$data['title']="Tata Usaha | SI DC AKN Bojonegoro";
		$data['judul']="MASTER DATA > Tata Usaha";
		$data['content']="tata_usaha1/index.php";
		$user_tu=$this->session->userdata('username');
		$data['tata_usaha']=$this->M_tata_usaha->ambil_data_tu($user_tu)->result();
		//pengalamatan
		$config['base_url']		=site_url('tata_usaha/tata_usaha1/');
        $config['total_rows']	=$this->M_tata_usaha->jumlahaktif();
        $config['per_page']		=$this->limit;
        $config['uri_segment']	=3;
		$this->load->view('admin/template',$data);
	}
	function nonaktif($offset=0,$order_column='id_tu',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='id_tu';
        if(empty($order_type)) $order_type='asc';
		
		//hak akses menu
		include('menu_akses.php');
		$data['title']="Tata Usaha | SI DC AKN Bojonegoro";
		$data['judul']="MASTER DATA > Tata_usaha";
		$data['content']="tata_usaha/nonaktif.php";
		$data['tata_usaha']=$this->M_tata_usaha->ambil_non($this->limit,$offset,$order_column,$order_type)->result();
		//pengalamatan
		$config['base_url']		=site_url('tata_usaha/nonaktif/');
        $config['total_rows']	=$this->M_tata_usaha->jumlahnonaktif();
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
	function tambah(){
		//hak akses menu
		include('menu_akses.php');
		$data['title']="Tata Usaha | SI DC AKN Bojonegoro";
		$data['judul']="MASTER DATA > Tata Usaha > Tambah";		
		$data['content']="tata_usaha/tambah.php";
		$this->load->view('admin/template',$data);
	}
	function tambah_proses(){
		$id=$this->input->post('id_tu'); 	// mendapatkan input dari kode
		$nama=$this->input->post('nama_tu'); 	// mendapatkan input dari kode
		$tmpt_lahir=$this->input->post('tmpt_lahir'); 	// mendapatkan input dari kode
		$tgl_lahir=$this->input->post('tgl_lahir'); 	// mendapatkan input dari kode
		$jenis_kelamin=$this->input->post('jenis_kelamin'); 	// mendapatkan input dari kode
		$agama=$this->input->post('agama'); 	// mendapatkan input dari kode
		$pendidikan=$this->input->post('pendidikan'); 	// mendapatkan input dari kode
		$status_kepegawaian=$this->input->post('status_kepegawaian'); 	// mendapatkan input dari kode
		$status_keanggotaan=$this->input->post('status_keanggotaan'); 	// mendapatkan input dari kode
		$alamat=$this->input->post('alamat'); 	// mendapatkan input dari kode
		$akses='akses003';
		$cek=$this->M_tata_usaha->cek($id); 			// cek kode di database
		if($cek->num_rows()>0){ 				// jika kode sudah ada, maka tampilkan pesan
			$this->session->set_flashdata('m_eror','Tata Usaha <b>'.$id."-".$nama. '</b> sudah ada!');
			redirect('tata_usaha/tambah');
		}else { 								// jika id tata_usaha belum ada, maka simpan
			$info=array(
				'id_tu'=>$id,
				'nama_tu'=>$nama,
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
			$this->M_tata_usaha->simpan($info);
			$this->M_tata_usaha->simakses($id,$akses);
			$this->session->set_flashdata('m_sukses','Tata Usaha <b>'.$id.'</b> berhasil ditambahkan!');
			redirect('tata_usaha');
		}
	}
	function importdata(){
		 if ($this->input->post('save')) {
			$fileNam = $_FILES['import']['name'];
			$config['upload_path'] = './assets/file/';
            $config['file_name'] = $fileNam;
            $config['allowed_types'] = 'xls|xlsx';
            $config['max_size']        = 10000;
			$this->load->library('upload');
            $this->upload->initialize($config);
			if (!$this->upload->do_upload('import')) {
				$this->session->set_flashdata('m_eror','Data Gagal Di Impor!');
				redirect('tata_usaha/tambah');
			} else {
			  $upload_data = $this->upload->data('import');
			  $this->load->library('Excel_reader');
			  $this->excel_reader->setOutputEncoding('230787');
			  $fil = './assets/file/'.$fileNam;
			  $this->excel_reader->read($fil);
			  error_reporting(E_ALL ^ E_NOTICE);
			  $data = $this->excel_reader->sheets[0];
			  $dataexcel = array();
			  for ($i = 1; $i <= $data['numRows']; $i++) {
				   if ($data['cells'][$i][1] == '') break;
				   $dataexcel[$i - 1]['id_tu'] = $data['cells'][$i][1];
				   $dataexcel[$i - 1]['nama_tu'] = $data['cells'][$i][2];
				   $dataexcel[$i - 1]['tmpt_lahir'] = $data['cells'][$i][3];
				   $dataexcel[$i - 1]['tgl_lahir'] = $data['cells'][$i][4];
				   $dataexcel[$i - 1]['jenis_kelamin'] = $data['cells'][$i][5];
				   $dataexcel[$i - 1]['agama'] = $data['cells'][$i][6];
				   $dataexcel[$i - 1]['pendidikan_akhir'] = $data['cells'][$i][7];
				   $dataexcel[$i - 1]['status_kepegawaian'] = $data['cells'][$i][8];
				   $dataexcel[$i - 1]['status_keanggotaan'] = $data['cells'][$i][9];
				   $dataexcel[$i - 1]['alamat'] = $data['cells'][$i][10];
				   $dataexcel[$i - 1]['username'] = $data['cells'][$i][1];
				   $dataexcel[$i - 1]['password'] = md5($data['cells'][$i][1]);
			  }
			  for ($a = 1; $a <= $data['numRows']; $a++) {
					if ($data['cells'][$a][1] == '') break;
				   $dataexcel2[$a - 1]['id_tu'] = $data['cells'][$a][1];
			  }
			  $fil = $upload_data['file_name'];
			  $path = './assets/file/' . $fil;
			  delete_files($path);
			  $this->load->model('M_tata_usaha');
			  $this->M_tata_usaha->loaddata($dataexcel);
			  $this->M_tata_usaha->loaddata2($dataexcel2);
			}
			$this->session->set_flashdata('m_sukses','Data Berhasil Di Impor!');
			redirect('tata_usaha');
		}
	}
	function edit($id_tu){
		//hak akses menu
		include('menu_akses.php');
		$data['title']	="edit Tata Usaha"; 		//judul
		$data['judul']="MASTER DATA > Tata Usaha > Edit";	
        $data['content']="tata_usaha/edit.php"; 	//konten
        $data['tata_usaha']	=$this->M_tata_usaha->ceki($id_tu)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function edit_proses($id_tukirim){
		$info=array(
			'id_tu'=>$id_tukirim,
			'nama_tu'=>$this->input->post('nama'),
			'tmpt_lahir'=>$this->input->post('tempat'),
			'tgl_lahir'=>$this->input->post('tgl_lahir'),
			'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
			'agama'=>$this->input->post('agama'),
			'pendidikan_akhir'=>$this->input->post('pendidikan'),
			'status_kepegawaian'=>$this->input->post('status_kepegawaian'),
			'status_keanggotaan'=>$this->input->post('status_keanggotaan'),
			'alamat'=>$this->input->post('alamat')
		);
		$this->M_tata_usaha->update($info, $id_tukirim);
		$this->session->set_flashdata('m_sukses','Data Tata Usaha <b>'.$id_tukirim. '</b> berhasil diedit!');
		$level=$this->session->userdata('level');
		if($level=='tata_usaha'){
			redirect('tata_usaha/tata_usaha1');
		}else{
			redirect('tata_usaha');
		}
	}
	function edit_proses2($id_tukirim){
		$info=array(
			'id_tu'=>$id_tukirim,
			'nama_tu'=>$this->input->post('nama'),
			'tmpt_lahir'=>$this->input->post('tempat'),
			'tgl_lahir'=>$this->input->post('tgl_lahir'),
			'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
			'agama'=>$this->input->post('agama'),
			'pendidikan_akhir'=>$this->input->post('pendidikan'),
			'status_kepegawaian'=>$this->input->post('status_kepegawaian'),
			'status_keanggotaan'=>$this->input->post('status_keanggotaan'),
			'alamat'=>$this->input->post('alamat')
		);
		$this->M_tata_usaha->update($info, $id_tukirim);
		$this->session->set_flashdata('m_sukses','Data Tata Usaha <b>'.$id_tukirim. '</b> berhasil diedit!');
		redirect('tata_usaha/detail/'.$id_tukirim);
	}
	function editpass($id_tukirim){
		$info=array(
			'username'=>$this->input->post('username'),
			'password'=>md5($this->input->post('password'))
		);
		$this->M_tata_usaha->update($info, $id_tukirim);
		$this->session->set_flashdata('m_sukses','Username dan Password <b>'.$id_tukirim. '</b> berhasil diedit!');
		redirect('tata_usaha/detail/'.$id_tukirim);
	}
	function hapus($id_tu){
		//hak akses menu
		include('menu_akses.php');
		$data['title']		="hapus Tata Usaha";
		$data['judul']="MASTER DATA > Tata Usaha > Non Aktifkan";//judul
        $data['content']	="tata_usaha/hapus.php"; //konten
        $data['tata_usaha']		=$this->M_tata_usaha->ceki($id_tu)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function hapus_proses($id_tukirim){
		$status_keanggotaan='nonaktif';
		$info=array(
			'id_tu'=>$id_tukirim,
			'status_keanggotaan'=>$status_keanggotaan,
		);
        $this->M_tata_usaha->update_hapus($info,$id_tukirim);
		$this->session->set_flashdata('m_sukses','Data Tata Usaha <b>'.$id_tukirim. '</b> berhasil dinonaktifkan!');
		redirect('tata_usaha/nonaktif');
    }
	function aktif_proses($id_tukirim){
		$status_keanggotaan='aktif';
		$info=array(
			'id_tu'=>$id_tukirim,
			'status_keanggotaan'=>$status_keanggotaan,
		);
        $this->M_tata_usaha->update_hapus($info,$id_tukirim);
		$this->session->set_flashdata('m_sukses','Data Tata Usaha <b>'.$id_tukirim. '</b> berhasil dinonaktifkan!');
		redirect('tata_usaha/nonaktif');
    }
	function detail($id_tu){
		//hak akses menu
		include('menu_akses.php');
		$data['title']		="Detail Tata Usaha";
		$data['judul']		="MASTER DATA > Tata Usaha > Detail"; //judul
        $data['content']	="tata_usaha/detail.php"; //konten
        $data['tata_usaha']	=$this->M_tata_usaha->ceki($id_tu)->row_array(); //ambil data
		$data['kategori']	=$this->M_tata_usaha->kategori()->result(); //ambil data
		$data['akses_tu']	=$this->M_tata_usaha->akses_tu($this->uri->segment(3))->result(); //ambil data
		$data['akses']		=$this->M_tata_usaha->akses()->result(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function detail1($id_tu){
		//hak akses menu
		include('menu_akses.php');
		$data['title']		="Detail Tata Usaha";
		$data['judul']		="MASTER DATA > Tata Usaha > Detail"; //judul
        $data['content']	="tata_usaha/detail1.php"; //konten
        $data['tata_usaha']	=$this->M_tata_usaha->ceki($id_tu)->row_array(); //ambil data
		$data['kategori']	=$this->M_tata_usaha->kategori()->result(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function detailnon($id_tu){
		//hak akses menu
		include('menu_akses.php');
		$data['title']		="detail tata_usaha";
		$data['judul']		="MASTER DATA > Tata Usaha > Detail"; //judul
        $data['content']	="tata_usaha/detailnon.php"; //konten
        $data['tata_usaha']	=$this->M_tata_usaha->ceki($id_tu)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}

	function aktifkan($id_tu){ 
		//hak akses menu
		include('menu_akses.php');
		$data['title']		="aktifkanTata_Usaha";
		$data['judul']="MASTER DATA > Tata Usaha> Aktifkan";//judul
        $data['content']	="tata_usaha/aktifkan.php"; //konten
        $data['tata_usaha']		=$this->M_tata_usaha->cekaktif($id_tu)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function aktifkan_proses($id_tukirim){
		$status='aktif';
		$info=array(
			'id_tu'=>$id_tukirim,
			'status_keanggotaan'=>$status,
		);
        $this->M_tata_usaha->update_aktif($info,$id_tukirim);
		$this->session->set_flashdata('m_sukses','Data Tata Usaha <b>'.$id_tukirim. '</b> berhasil diaktifkan!');
		redirect('tata_usaha/nonaktif');
    }
	function cari(){
		//hak akses menu
		include('menu_akses.php');
		$data['title']=" tata_usaha Cari | SI DC AKN Bojonegoro";
		$data['judul']="MASTER DATA > tata_usaha Cari";
		$data['content']="tata_usaha/cari.php";
		$cari=$this->input->post('cari');
		if ($cari==null){
			redirect(tata_usaha);
		}
		else{
			$cek=$this->M_tata_usaha->cari($cari);
			$cekid=$this->M_tata_usaha->cariid($cari);
			$hasil=$cek->num_rows();
			$hasilid=$cekid->num_rows();
			if($hasil>0){
				$data['tata_usaha']=$cek->result();
				$data['ketemu']='<b>'.$hasil.'</b> data ditemukan berdasarkan <b>'.$cari.'</b>';
				$data['jumlah']=$hasil;
				$this->load->view('admin/template',$data);
			}elseif($hasilid>0){
				$data['tata_usaha']=$cekid->result();
				$data['ketemu']='<b>'.$hasilid.'</b> data ditemukan berdasarkan <b>'.$cari.'</b>';
				$data['jumlah']=$hasilid;
				$this->load->view('admin/template',$data);
			}else{
				$this->session->set_flashdata('m_eror','Pencarian data tidak ditemukan!');
				$data['tata_usaha']=$cek->result();
				redirect('tata_usaha/');
			}
		}
    }
	function carinon(){
		//hak akses menu
		include('menu_akses.php');
		$data['title']=" tata_usaha Cari | SI DC AKN Bojonegoro";
		$data['judul']="MASTER DATA > tata_usaha Cari";
		$data['content']="tata_usaha/carinon.php";
		$cari=$this->input->post('carinon');
		if ($cari==null){
			redirect(tata_usaha);
		}
		else{
			$cek=$this->M_tata_usaha->carinon($cari);
			$hasil=$cek->num_rows();
			if($hasil>0){
				$data['tata_usaha']=$cek->result();
				$data['ketemu']='<b>'.$hasil.'</b>data ditemukan berdasarkan <b>'.$cari.'</b>';
				$data['jumlah']=$hasil;
				$this->load->view('admin/template',$data);
			}else{
				$this->session->set_flashdata('m_eror','Pencarian data tidak ditemukan!');
				$data['tata_usaha']=$cek->result();
				redirect('tata_usaha/nonaktif');
			}
		}
    }
	function kompres_jadi(){
		$filename 	= $_FILES['gambar']['name'];
		$dir		= "gambar/";
		$dir1		= "gambartu/";
		$file		= 'gambar';
		$new_name	= 'kompres'.date('Y-m-d-H-i-s');
		$tipe 		= $_FILES['gambar']['type'];
		$ukuran 	= $_FILES['gambar']['size'];
		
		$vdir_upload	= $dir;
		$file_name		= $_FILES[''.$file.'']["name"];
		$vfile_upload	= $vdir_upload.$file;
		$tmp_file		= $_FILES[''.$file.'']["tmp_name"];
		move_uploaded_file ($tmp_file, $dir.$file_name);
		$id_tu 		= $this->input->post('id_tu');
		$id_kategori = $this->input->post('id_kategori');
		date_default_timezone_get('Asia/Jakarta');
		$date = date('YmdHis');
		$id_upload = $id_tu.$id_kategori;
		
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
				'id_tu'			=> $id_tu,
				'nama_gambar'	=> $new_name.$ext,
				'tipe'			=> $tipe,
				'ukuran'		=> $ukuran
			);
		$this->M_kategori->simpan_gambartu($info);
		$this->session->set_flashdata('m_sukses', 'Gambar Berhasil Diupload');
		$level=$this->session->userdata('level');
		if ($level=='tata_usaha'){
			redirect('tata_usaha/detail1'.'/'.$id_tu);
		}else{
			redirect('tata_usaha/detail'.'/'.$id_tu);
		}
	}
	function hapusgbr($id_upload){
		//hak akses menu
		include('menu_akses.php');
		$id=$this->uri->segment(4);
		$data['title']		="Hapus Gambar Tata Usaha";
		$data['judul']		="MASTER DATA > Tata Usaha > Hapus";//judul
        $data['content']	="tata_usaha/hapusgambar.php"; //konten
        $data['kategori']	=$this->M_kategori->cektuu($id_upload)->row_array(); //ambil data
        $data['tata_usaha']		=$this->M_tata_usaha->ceki($id)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function hapusgambartu($idup,$id){
		$upload=$this->M_tata_usaha->cekupload($idup)->row_array();
		$nama = $upload['nama_gambar'];
		$dir = "gambartu/".$nama;
		unlink($dir);
		$hapus=$this->M_tata_usaha->hapusgambar($idup);
		$this->session->set_flashdata('m_sukses', 'Gambar Berhasil Dihapus');
		$level=$this->session->userdata('level');
		if ($level=='tata_usaha'){
			redirect('tata_usaha/detail1'.'/'.$id);
		}else{
			redirect('tata_usaha/detail'.'/'.$id);
		}
	}
	function tambahakses(){
		$id=$this->input->post('id_tu');
		$akses=$this->input->post('akses');
		$cekakses=$this->M_tata_usaha->cekakses($id,$akses)->num_rows();
		if ($cekakses>0){
			$this->session->set_flashdata('m_eror', 'Akses Sudah Ada!');
			redirect('tata_usaha/detail'.'/'.$id);
		}else{
		$this->M_tata_usaha->simpanakses($id,$akses);
		$this->session->set_flashdata('m_sukses', 'Akses Berhasil Ditambahkan');
		redirect('tata_usaha/detail'.'/'.$id);
		}
	}
	function hapusakses(){
		$id=$this->uri->segment(3);
		$akses=$this->uri->segment(4);
		$this->M_tata_usaha->hapusakses($id,$akses);
		$this->session->set_flashdata('m_sukses', 'Akses Berhasil Dihapus');
		redirect('tata_usaha/detail'.'/'.$id);
	}
}	
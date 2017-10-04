<?php
class Mahasiswa extends CI_Controller{
    private $limit=5;
    
	function __construct(){
        parent::__construct();
		$this->load->helper('back'); // helper yg di atas
		backButtonHandle();
		$this->load->library(array('pagination','form_validation','upload','tools'));
		$this->load->model('m_mahasiswa');
		$this->load->model('m_dosen');
		$this->load->model('m_tata_usaha');
		$this->load->model('m_kategori');
		$this->load->model('m_login');
		$this->load->database();
        $this->load->helper(array('form','url','file'));
		$this->load->library('Excel_reader');
		if(!$this->session->userdata('username')){
            redirect('home');
		}
    }
    
    function index($offset=0,$order_column='nim',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='nim';
        if(empty($order_type)) $order_type='asc';
		
		//hak akses menu
		include('menu_akses.php');
		$data['title']="Mahasiswa | SI DC AKN Bojonegoro";
		$data['judul']="MASTER DATA > Mahasiswa";
		$data['content']="mahasiswa/index.php";
		$data['mahasiswa']=$this->m_mahasiswa->ambil_data($this->limit,$offset,$order_column,$order_type)->result();
		//pengalamatan
		$config['base_url']		=site_url('mahasiswa/index/');
        $config['total_rows']	=$this->m_mahasiswa->jumlahaktif();
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
    function mahasiswa1($offset=0,$order_column='nim',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='nim';
        if(empty($order_type)) $order_type='asc';
		
		//hak akses menu
		include('menu_akses.php');
		
		$data['title']="Mahasiswa | SI DC AKN Bojonegoro";
		$data['judul']="MASTER DATA > Mahasiswa";
		$data['content']="mahasiswa1/index.php";
		$user_mhs=$this->session->userdata('username');
		$data['mahasiswa']=$this->m_mahasiswa->ambil_data_mhs($user_mhs)->result();
		//pengalamatan
		$config['base_url']		=site_url('mahasiswa/mahasiswa1/');
        $config['total_rows']	=$this->m_mahasiswa->jumlahaktif();
        $config['per_page']		=$this->limit;
        $config['uri_segment']	=3;
		$this->load->view('admin/template',$data);
	}
	function tambah(){
		//hak akses menu
		include('menu_akses.php');
		$data['title']="Mahasiswa | SI DC AKN Bojonegoro";
		$data['judul']="MASTER DATA > Mahasiswa > Tambah";		
		$data['content']="mahasiswa/tambah.php";
		$data['gelombang']=$this->m_mahasiswa->gelombang();
		$this->load->view('admin/template',$data);
	}
	function tambah_proses(){
		$id=$this->input->post('nim'); 	// mendapatkan input dari kode
		$nama=$this->input->post('nama_mahasiswa'); 	// mendapatkan input dari kode
		$jk=$this->input->post('jk'); 	// mendapatkan input dari kode
		$jalan=$this->input->post('jalan'); 	// mendapatkan input dari kode
		$rt=$this->input->post('rt'); 	// mendapatkan input dari kode
		$rw=$this->input->post('rw'); 	// mendapatkan input dari kode
		$desa=$this->input->post('desa'); 	// mendapatkan input dari kode
		$kecamatan=$this->input->post('kecamatan'); 	// mendapatkan input dari kode
		$kota=$this->input->post('kota'); 	// mendapatkan input dari kode
		$kode_pos=$this->input->post('kode_pos'); 	// mendapatkan input dari kode
		$provinsi=$this->input->post('provinsi'); 	// mendapatkan input dari kode
		$phone=$this->input->post('phone'); 	// mendapatkan input dari kode
		$gol_darah=$this->input->post('gol_darah'); 	// mendapatkan input dari kode
		$agama=$this->input->post('agama'); 	// mendapatkan input dari kode
		$jurusan_asal=$this->input->post('jurusan_asal'); 	// mendapatkan input dari kode
		$tahun_masuk=$this->input->post('tahun_masuk'); 	// mendapatkan input dari kode
		$nama_ayah=$this->input->post('nama_ayah'); 	// mendapatkan input dari kode
		$nama_ibu=$this->input->post('nama_ibu'); 	// mendapatkan input dari kode
		$pendidikan_ayah=$this->input->post('pendidikan_ayah'); 	// mendapatkan input dari kode
		$pendidikan_ibu=$this->input->post('pendidikan_ibu'); 	// mendapatkan input dari kode
		$pekerjaan_ayah=$this->input->post('pekerjaan_ayah'); 	// mendapatkan input dari kode
		$pekerjaan_ibu=$this->input->post('pekerjaan_ibu'); 	// mendapatkan input dari kode
		$penghasilan_ayah=$this->input->post('penghasilan_ayah'); 	// mendapatkan input dari kode
		$penghasilan_ibu=$this->input->post('penghasilan_ibu'); 	// mendapatkan input dari kode
		$kota_lahir=$this->input->post('kota_lahir'); 	// mendapatkan input dari kode
		$tanggal_lahir=$this->input->post('tanggal_lahir'); 	// mendapatkan input dari kode
		$anak_ke=$this->input->post('anak_ke'); 	// mendapatkan input dari kode
		$jumlah_anak=$this->input->post('jumlah_anak'); 	// mendapatkan input dari kode
		$asal_sekolah=$this->input->post('asal_sekolah'); 	// mendapatkan input dari kode
		$kota_sekolah=$this->input->post('kota_sekolah'); 	// mendapatkan input dari kode
		$gelombang=$this->input->post('gelombang'); 	// mendapatkan input dari kode
		$akses='akses001';
		$cek=$this->m_mahasiswa->cek($id); 			// cek kode di database
		if($cek->num_rows()>0){ 				// jika kode sudah ada, maka tampilkan pesan
			$this->session->set_flashdata('m_eror','Mahasiswa <b>'.$id." - ".$nama. '</b> sudah ada!');
			redirect('mahasiswa/tambah');
		}else { 								// jika kode buku belum ada, maka simpan
			$info=array(
				'nim'=>$id,
				'nama_mahasiswa'=>$nama,
				'jk'=>$jk,
				'jalan'=>$jk,
				'rt'=>$rt,
				'rw'=>$rw,
				'desa'=>$desa,
				'kecamatan'=>$kecamatan,
				'kota'=>$kota,
				'kode_pos'=>$kode_pos,
				'provinsi'=>$provinsi,
				'phone'=>$phone,
				'gol_darah'=>$gol_darah,
				'agama'=>$agama,
				'jurusan_asal'=>$jurusan_asal,
				'tahun_masuk'=>$tahun_masuk,
				'ayah'=>$nama_ayah,
				'ibu'=>$nama_ibu,
				'pendidikan_ayah'=>$pendidikan_ayah,
				'pendidikan_ibu'=>$pendidikan_ibu,
				'pekerjaan_ayah'=>$pekerjaan_ayah,
				'pekerjaan_ibu'=>$pekerjaan_ibu,
				'penghasilan_ayah'=>$penghasilan_ayah,
				'penghasilan_ibu'=>$penghasilan_ibu,
				'kota_lahir'=>$kota_lahir,
				'tanggal_lahir'=>$tanggal_lahir,
				'anak_ke'=>$anak_ke,
				'jumlah_anak'=>$jumlah_anak,
				'asal_sekolah'=>$asal_sekolah,
				'kota_sekolah'=>$kota_sekolah,
				'gelombang'=>$gelombang,
				'username'=>$id,
				'password'=>md5($id)
			);
			$this->m_mahasiswa->simpan($info);
			$this->m_mahasiswa->simakses($id,$akses);
			$this->session->set_flashdata('m_sukses','Mahasiswa <b>'.$id." - ".$nama. '</b> berhasil ditambahkan!');
			redirect('mahasiswa');
		}
	}
	function importdata(){
		 if ($this->input->post('save')) {
			$fileNames = $_FILES['import']['name'];
			$config['upload_path'] = './assets/file/';
            $config['file_name'] = $fileNames;
            $config['allowed_types'] = 'xls|xlsx';
            $config['max_size']        = 10000;
			$this->load->library('upload');
            $this->upload->initialize($config);
			if (!$this->upload->do_upload('import')) {
				$this->session->set_flashdata('m_eror','Data Gagal Di Impor!');
				redirect('mahasiswa/tambah');
			} else {
			  $upload_data = $this->upload->data('import');
			  $this->load->library('Excel_reader');
			  $this->excel_reader->setOutputEncoding('230787');
			  $files = './assets/file/'.$fileNames;
			  $this->excel_reader->read($files);
			  error_reporting(E_ALL ^ E_NOTICE);
			  $data = $this->excel_reader->sheets[0];
			  $dataexcel = array();
			  for ($i = 2; $i <= $data['numRows']; $i++) {
				   if ($data['cells'][$i][2] == '') break;
				   $dataexcel[$i - 2]['nim'] = $data['cells'][$i][1];
				   $dataexcel[$i - 2]['nama_mahasiswa'] = $data['cells'][$i][2];
				   $dataexcel[$i - 2]['tahun_masuk'] = $data['cells'][$i][3];
				   $dataexcel[$i - 2]['jalan'] = $data['cells'][$i][4];
				   $dataexcel[$i - 2]['rt'] = $data['cells'][$i][5];
				   $dataexcel[$i - 2]['rw'] = $data['cells'][$i][6];
				   $dataexcel[$i - 2]['desa'] = $data['cells'][$i][7];
				   $dataexcel[$i - 2]['kecamatan'] = $data['cells'][$i][8];
				   $dataexcel[$i - 2]['kota'] = $data['cells'][$i][9];
				   $dataexcel[$i - 2]['kode_pos'] = $data['cells'][$i][10];
				   $dataexcel[$i - 2]['provinsi'] = $data['cells'][$i][11];
				   $dataexcel[$i - 2]['phone'] = $data['cells'][$i][12];
				   $dataexcel[$i - 2]['gol_darah'] = $data['cells'][$i][13];
				   $dataexcel[$i - 2]['jk'] = $data['cells'][$i][14];
				   $dataexcel[$i - 2]['agama'] = $data['cells'][$i][15];
				   $dataexcel[$i - 2]['nilai_stl'] = $data['cells'][$i][16];
				   $dataexcel[$i - 2]['nilai_rstl'] = $data['cells'][$i][17];
				   $dataexcel[$i - 2]['jumlah_mp'] = $data['cells'][$i][18];
				   $dataexcel[$i - 2]['jurusan_asal'] = $data['cells'][$i][19];
				   $dataexcel[$i - 2]['ayah'] = $data['cells'][$i][20];
				   $dataexcel[$i - 2]['ibu'] = $data['cells'][$i][21];
				   $dataexcel[$i - 2]['pendidikan_ayah'] = $data['cells'][$i][22];
				   $dataexcel[$i - 2]['pendidikan_ibu'] = $data['cells'][$i][23];
				   $dataexcel[$i - 2]['pekerjaan_ayah'] = $data['cells'][$i][24];
				   $dataexcel[$i - 2]['pekerjaan_ibu'] = $data['cells'][$i][25];
				   $dataexcel[$i - 2]['penghasilan_ayah'] = $data['cells'][$i][26];
				   $dataexcel[$i - 2]['penghasilan_ibu'] = $data['cells'][$i][27];
				   $dataexcel[$i - 2]['kota_lahir'] = $data['cells'][$i][28];
				   $dataexcel[$i - 2]['tanggal_lahir'] = $data['cells'][$i][29];
				   $dataexcel[$i - 2]['anak_ke'] = $data['cells'][$i][30];
				   $dataexcel[$i - 2]['jumlah_anak'] = $data['cells'][$i][31];
				   $dataexcel[$i - 2]['asal_sekolah'] = $data['cells'][$i][32];
				   $dataexcel[$i - 2]['kota_sekolah'] = $data['cells'][$i][33];
				   $dataexcel[$i - 2]['gelombang'] = $data['cells'][$i][34];
				   $dataexcel[$i - 2]['username'] = $data['cells'][$i][1];
				   $dataexcel[$i - 2]['password'] = md5($data['cells'][$i][1]);
			  }
			  for ($a = 2; $a <= $data['numRows']; $a++) {
					if ($data['cells'][$a][2] == '') break;
				   $dataexcel2[$a - 2]['nim'] = $data['cells'][$a][1];
			  }
			  $files = $upload_data['file_name'];
			  $path = './assets/file/'.$files;
			  delete_files($path);
			  $this->load->model('M_mahasiswa');
			  $this->m_mahasiswa->loaddata($dataexcel);
			  $this->m_mahasiswa->loaddata2($dataexcel2);
			}
			$this->session->set_flashdata('m_sukses','Data Berhasil Di Impor!');
			redirect('mahasiswa');
		}
	}
	function edit($nim){
		//hak akses menu
		include('menu_akses.php');
		$data['title']	="edit Mahasiswa"; 		//judul
		$data['judul']="MASTER DATA > Mahasiswa > Edit";	
        $data['content']="mahasiswa/edit.php"; 	//konten
        $data['mahasiswa']	=$this->m_mahasiswa->ceki($nim)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function edit1($nim){
		//hak akses menu
		include('menu_akses.php');
		$data['title']	="edit Mahasiswa"; 		//judul
		$data['judul']="MASTER DATA > Mahasiswa > Edit";	
        $data['content']="mahasiswa1/edit.php"; 	//konten
        $data['mahasiswa']	=$this->m_mahasiswa->ceki($nim)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}	
		
	function edit_proses($nimkirim){
		$info=array(
			'nim'=>$nimkirim,
			'nama_mahasiswa'=>$this->input->post('nama_mahasiswa'),
			'jk'=>$this->input->post('jenis_kelamin'),
			'tanggal_lahir'=>$this->input->post('tanggal_lahir'),
			'agama'=>$this->input->post('agama'),
			'rt'=>$this->input->post('rt'),
			'rw'=>$this->input->post('rw'),
			'desa'=>$this->input->post('desa'),
			'kecamatan'=>$this->input->post('kecamatan'),
			'kota'=>$this->input->post('kota'),
			'kode_pos'=>$this->input->post('kode_pos'),
			'provinsi'=>$this->input->post('provinsi'),
			'phone'=>$this->input->post('phone'),
			'gol_darah'=>$this->input->post('gol_darah'),
			'jurusan_asal'=>$this->input->post('jurusan_asal'),
			'pekerjaan_ayah'=>$this->input->post('pekerjaan_ayah'),
			'pekerjaan_ibu'=>$this->input->post('pekerjaan_ibu'),
			'pendidikan_ayah'=>$this->input->post('pendidikan_ayah'),
			'pendidikan_ibu'=>$this->input->post('pendidikan_ibu'),
			'penghasilan_ayah'=>$this->input->post('penghasilan_ayah'),
			'penghasilan_ibu'=>$this->input->post('penghasilan_ibu'),
			'anak_ke'=>$this->input->post('anak_ke'),
			'jumlah_anak'=>$this->input->post('jumlah_anak'),
			'kota_lahir'=>$this->input->post('kota_lahir'),
			'kota_sekolah'=>$this->input->post('kota_sekolah'),
			'asal_sekolah'=>$this->input->post('asal_sekolah'),
			'tahun_masuk'=>$this->input->post('tahun_masuk'),
			'ibu'=>$this->input->post('nama_ibu'),
			'ayah'=>$this->input->post('nama_ayah')
		);
		$this->m_mahasiswa->update($info, $nimkirim);
		$this->session->set_flashdata('m_sukses','Data sudah berhasil diedit!');
		redirect('mahasiswa');
	}
	function edit_proses1($nimkirim){
		$info=array(
			'nim'=>$nimkirim,
			'nama_mahasiswa'=>$this->input->post('nama_mahasiswa'),
			'jk'=>$this->input->post('jenis_kelamin'),
			'tanggal_lahir'=>$this->input->post('tanggal_lahir'),
			'agama'=>$this->input->post('agama'),
			'rt'=>$this->input->post('rt'),
			'rw'=>$this->input->post('rw'),
			'desa'=>$this->input->post('desa'),
			'kecamatan'=>$this->input->post('kecamatan'),
			'kota'=>$this->input->post('kota'),
			'kode_pos'=>$this->input->post('kode_pos'),
			'provinsi'=>$this->input->post('provinsi'),
			'phone'=>$this->input->post('phone'),
			'gol_darah'=>$this->input->post('gol_darah'),
			'jurusan_asal'=>$this->input->post('jurusan_asal'),
			'pekerjaan_ayah'=>$this->input->post('pekerjaan_ayah'),
			'pekerjaan_ibu'=>$this->input->post('pekerjaan_ibu'),
			'pendidikan_ayah'=>$this->input->post('pendidikan_ayah'),
			'pendidikan_ibu'=>$this->input->post('pendidikan_ibu'),
			'penghasilan_ayah'=>$this->input->post('penghasilan_ayah'),
			'penghasilan_ibu'=>$this->input->post('penghasilan_ibu'),
			'anak_ke'=>$this->input->post('anak_ke'),
			'jumlah_anak'=>$this->input->post('jumlah_anak'),
			'kota_lahir'=>$this->input->post('kota_lahir'),
			'kota_sekolah'=>$this->input->post('kota_sekolah'),
			'asal_sekolah'=>$this->input->post('asal_sekolah'),
			'tahun_masuk'=>$this->input->post('tahun_masuk'),
			'ibu'=>$this->input->post('nama_ibu'),
			'ayah'=>$this->input->post('nama_ayah')
		);
		$this->m_mahasiswa->update($info, $nimkirim);
		$this->session->set_flashdata('m_sukses','Data sudah berhasil diedit!');
		redirect('mahasiswa/mahasiswa1');
	}
	function edit_proses2($nimkirim){
		$info=array(
			'nim'=>$nimkirim,
			'nama_mahasiswa'=>$this->input->post('nama_mahasiswa'),
			'jk'=>$this->input->post('jenis_kelamin'),
			'tanggal_lahir'=>$this->input->post('tanggal_lahir'),
			'agama'=>$this->input->post('agama'),
			'rt'=>$this->input->post('rt'),
			'rw'=>$this->input->post('rw'),
			'desa'=>$this->input->post('desa'),
			'kecamatan'=>$this->input->post('kecamatan'),
			'kota'=>$this->input->post('kota'),
			'kode_pos'=>$this->input->post('kode_pos'),
			'provinsi'=>$this->input->post('provinsi'),
			'phone'=>$this->input->post('phone'),
			'gol_darah'=>$this->input->post('gol_darah'),
			'jurusan_asal'=>$this->input->post('jurusan_asal'),
			'pekerjaan_ayah'=>$this->input->post('pekerjaan_ayah'),
			'pekerjaan_ibu'=>$this->input->post('pekerjaan_ibu'),
			'pendidikan_ayah'=>$this->input->post('pendidikan_ayah'),
			'pendidikan_ibu'=>$this->input->post('pendidikan_ibu'),
			'penghasilan_ayah'=>$this->input->post('penghasilan_ayah'),
			'penghasilan_ibu'=>$this->input->post('penghasilan_ibu'),
			'anak_ke'=>$this->input->post('anak_ke'),
			'jumlah_anak'=>$this->input->post('jumlah_anak'),
			'kota_lahir'=>$this->input->post('kota_lahir'),
			'kota_sekolah'=>$this->input->post('kota_sekolah'),
			'asal_sekolah'=>$this->input->post('asal_sekolah'),
			'tahun_masuk'=>$this->input->post('tahun_masuk'),
			'ibu'=>$this->input->post('nama_ibu'),
			'ayah'=>$this->input->post('nama_ayah')
		);
		$this->m_mahasiswa->update($info, $nimkirim);
		$this->session->set_flashdata('m_sukses','Data sudah berhasil diedit!');
		redirect('mahasiswa/detail/'.$nimkirim);
	}
	function editpass($nimkirim){
		$info=array(
			'password'=>md5($this->input->post('password'))
		);
		$this->m_mahasiswa->update($info, $nimkirim);
		$this->session->set_flashdata('m_sukses','Password <b>'.$nimkirim. '</b> berhasil diedit!');
		redirect('mahasiswa/detail/'.$nimkirim);
	}
	function hapus($nim){
		//hak akses menu
		$level = $this->session->userdata('level');
		$session_id = $this->session->userdata('username');
		$akses=($session_id);
		$cek1=$this->m_login->cektu($akses)->row_array();
		$cek2=$this->m_login->cekdosen($akses)->row_array();
		if ($level=='administrator'){
			$data['menu']		="menu.php";
			if($cek1>0){
				$data['jumlahakses']=$this->m_login->akses_tu($akses)->result();
			}elseif($cek2>0){
				$data['jumlahakses']=$this->m_login->akses_dos($akses)->result();
			}
		}elseif($level=='dosen'){
			$data['menu']		="menu_dosen.php";
			if($cek1>0){
				$data['jumlahakses']=$this->m_login->akses_tu($akses)->result();
			}elseif($cek2>0){
				$data['jumlahakses']=$this->m_login->akses_dos($akses)->result();
			}
		}elseif($level=='tata_usaha'){
			$data['menu']		="menu_tata_usaha.php";
			if($cek1>0){
				$data['jumlahakses']=$this->m_login->akses_tu($akses)->result();
			}elseif($cek2>0){
				$data['jumlahakses']=$this->m_login->akses_dos($akses)->result();
			}
		}elseif($level=='mahasiswa'){
			$data['menu']		="menu_mahasiswa.php";
			$cek3=$this->m_login->cekmaha($akses)->row_array();
			if($cek1>0){
				$data['jumlahakses']=$this->m_login->akses_tu($akses)->result();
			}elseif($cek2>0){
				$data['jumlahakses']=$this->m_login->akses_dos($akses)->result();
			}elseif($cek3>0){
				$data['nim']=$this->m_login->akses_maha($akses)->result();
			}
		}elseif($level=='pimpinan'){
			$data['menu']		="menu_pimpinan.php";
			if($cek1>0){
				$data['jumlahakses']=$this->m_login->akses_tu($akses)->result();
			}elseif($cek2>0){
				$data['jumlahakses']=$this->m_login->akses_dos($akses)->result();
			}
		}elseif($level=='superadmin'){
			$data['menu']		="menu_super.php";
			if($cek1>0){
				$data['jumlahakses']=$this->m_login->akses_tu($akses)->result();
			}elseif($cek2>0){
				$data['jumlahakses']=$this->m_login->akses_dos($akses)->result();
			}
		}else{
			$data['menu']		="menu_rektor.php";
			if($cek1>0){
				$data['jumlahakses']=$this->m_login->akses_tu($akses)->result();
			}elseif($cek2>0){
				$data['jumlahakses']=$this->m_login->akses_dos($akses)->result();
			}
		}
		
		$data['title']="hapus mahasiswa";
		$data['judul']="MASTER DATA > Mahasiswa > Hapus";//judul
        $data['content']="mahasiswa/hapus.php"; //konten
        $data['mahasiswa']=$this->m_mahasiswa->ceki($nim)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}

	function hapus_proses($nimkirim){
		$status='nonaktif';
		$info=array(
			'nim'=>$nimkirim,
			'status'=>$status,
		);
        $this->m_mahasiswa->update_hapus($info,$nimkirim);
		$this->session->set_flashdata('m_sukses','Data Mahasiswa sudah berhasil dinonaktifkan!');
		redirect('mahasiswa');
    }
	function detail($nim){
		//hak akses menu
		include ('menu_akses.php');
		$data['title']		="detail mahasiswa";
		$data['judul']		="MASTER DATA > Mahasiswa > Detail"; //judul
        $data['content']	="mahasiswa/detail.php"; //konten
        $data['mahasiswa']	=$this->m_mahasiswa->ceki($nim)->row_array(); //ambil data
		$data['kategori']	=$this->m_mahasiswa->kategori()->result(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function detail1($nim){
		//hak akses menu
		include ('menu_akses.php');
		$data['title']		="detail mahasiswa";
		$data['judul']		="MASTER DATA > Mahasiswa > Detail"; //judul
        $data['content']	="mahasiswa1/detail.php"; //konten
        $data['mahasiswa']	=$this->m_mahasiswa->ceki($nim)->row_array(); //ambil data
		$data['kategori']	=$this->m_mahasiswa->kategori()->result(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function detailnon($nim){
		//hak akses menu
		include ('menu_akses.php');
		$data['title']="detail mahasiswa";
		$data['judul']="MASTER DATA > Mahasiswa > Detail"; //judul
        $data['content']="mahasiswa/detailnon.php"; //konten
        $data['mahasiswa']=$this->m_mahasiswa->cekn($nim)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function aktifkan($nim){
		//hak akses menu
		$level = $this->session->userdata('level');
		$session_id = $this->session->userdata('username');
		$akses=($session_id);
		$cek1=$this->m_login->cektu($akses)->row_array();
		$cek2=$this->m_login->cekdosen($akses)->row_array();
		if ($level=='superadmin'){
			$data['menu']		="menu_super.php";
			if($cek1>0){
				$data['jumlahakses']=$this->m_login->akses_tu($akses)->result();
			}elseif($cek2>0){
				$data['jumlahakses']=$this->m_login->akses_dos($akses)->result();
			}
		}elseif($level=='dosen'){
			$data['menu']		="menu_dosen.php";
			if($cek1>0){
				$data['jumlahakses']=$this->m_login->akses_tu($akses)->result();
			}elseif($cek2>0){
				$data['jumlahakses']=$this->m_login->akses_dos($akses)->result();
			}
		}elseif($level=='tata_usaha'){
			$data['menu']		="menu_tata_usaha.php";
			if($cek1>0){
				$data['jumlahakses']=$this->m_login->akses_tu($akses)->result();
			}elseif($cek2>0){
				$data['jumlahakses']=$this->m_login->akses_dos($akses)->result();
			}
		}elseif($level=='mahasiswa'){
			$data['menu']		="menu_mahasiswa.php";
			$cek3=$this->m_login->cekmaha($akses)->row_array();
			if($cek1>0){
				$data['jumlahakses']=$this->m_login->akses_tu($akses)->result();
			}elseif($cek2>0){
				$data['jumlahakses']=$this->m_login->akses_dos($akses)->result();
			}elseif($cek3>0){
				$data['nim']=$this->m_login->akses_maha($akses)->result();
			}
		}
		
		$data['title']="aktifkan Mahasiswa";
		$data['judul']="MASTER DATA > Mahasiswa > Aktifkan";//judul
        $data['content']="mahasiswa/aktifkan.php"; //konten
        $data['mahasiswa']=$this->m_mahasiswa->cekaktif($nim)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function aktifkan_proses($nimkirim){
		$status='aktif';
		$info=array(
			'nim'=>$nimkirim,
			'status'=>$status,
		);
        $this->m_mahasiswa->update_aktif($info,$nimkirim);
		$this->session->set_flashdata('m_sukses','Data Mahasiswa sudah berhasil diaktifkan!');
		redirect('mahasiswa/nonaktif');
    }
	function nonaktif($offset=0,$order_column='nim',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='nim';
        if(empty($order_type)) $order_type='asc';
		
		//hak akses menu
		include ('menu_akses.php');
		$data['title']="Mahasiswa | SI DC AKN Bojonegoro";
		$data['judul']="MASTER DATA > Mahasiswa";
		$data['content']="mahasiswa/nonaktif.php";
		$data['mahasiswa']=$this->m_mahasiswa->ambil_non($this->limit,$offset,$order_column,$order_type)->result();
		//pengalamatan
		$config['base_url']		=site_url('mahasiswa/nonaktif/');
        $config['total_rows']	=$this->m_mahasiswa->jumlahnonaktif();
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
		$data['title']=" Mahasiswa Cari | SI DC AKN Bojonegoro";
		$data['judul']="MASTER DATA > Mahasiswa Cari";
		$data['content']="mahasiswa/cari.php";
		$cari=$this->input->post('cari');
		if ($cari==null){
			redirect(mahasiswa);
		}
		else{
			$cek=$this->m_mahasiswa->cari($cari);
			$cekid=$this->m_mahasiswa->cariid($cari);
			$hasil=$cek->num_rows();
			$hasilid=$cekid->num_rows();
			if($hasil>0){
				$data['mahasiswa']=$cek->result();//mahasiswa di panggil view
				$data['ketemu']='<b>'.$hasil.'</b> data ditemukan berdasarkan <b>'.$cari.'</b>';
				$data['jumlah']=$hasil;
				$this->load->view('admin/template',$data);
			}elseif($hasilid>0){
				$data['mahasiswa']=$cekid->result();//mahasiswa di panggil view
				$data['ketemu']='<b>'.$hasilid.'</b> data ditemukan berdasarkan <b>'.$cari.'</b>';
				$data['jumlah']=$hasilid;
				$this->load->view('admin/template',$data);
			}else{
				$this->session->set_flashdata('m_eror','Pencarian data tidak ditemukan!');
				$data['mahasiswa']=$cek->result();
				redirect('mahasiswa/');
			}
		}
    }
	function carinon(){
		//hak akses menu
		$level = $this->session->userdata('level');
		$session_id = $this->session->userdata('username');
		$akses=($session_id);
		$cek1=$this->m_login->cektu($akses)->row_array();
		$cek2=$this->m_login->cekdosen($akses)->row_array();
		if ($level=='dosen'){
			$data['menu']		="menu_dosen.php";
			if($cek1>0){
				$data['jumlahakses']=$this->m_login->akses_tu($akses)->result();
			}elseif($cek2>0){
				$data['jumlahakses']=$this->m_login->akses_dos($akses)->result();
			}
		}elseif($level=='tata_usaha'){
			$data['menu']		="menu_tata_usaha.php";
			if($cek1>0){
				$data['jumlahakses']=$this->m_login->akses_tu($akses)->result();
			}elseif($cek2>0){
				$data['jumlahakses']=$this->m_login->akses_dos($akses)->result();
			}
		}elseif($level=='mahasiswa'){
			$data['menu']		="menu_mahasiswa.php";
			$cek3=$this->m_login->cekmaha($akses)->row_array();
			if($cek1>0){
				$data['jumlahakses']=$this->m_login->akses_tu($akses)->result();
			}elseif($cek2>0){
				$data['jumlahakses']=$this->m_login->akses_dos($akses)->result();
			}elseif($cek3>0){
				$data['nim']=$this->m_login->akses_maha($akses)->result();
			}
		}elseif($level=='superadmin'){
			$data['menu']		="menu_super.php";
			if($cek1>0){
				$data['jumlahakses']=$this->m_login->akses_tu($akses)->result();
			}elseif($cek2>0){
				$data['jumlahakses']=$this->m_login->akses_dos($akses)->result();
			}
		}
		
		$data['title']=" Mahasiswa Cari | SI DC AKN Bojonegoro";
		$data['judul']="MASTER DATA > Mahasiswa Cari";
		$data['content']="mahasiswa/carinon.php";
		$cari=$this->input->post('carinon');
		if ($cari==null){
			redirect(mahasiswa);
		}
		else{
			$cek=$this->m_mahasiswa->carinon($cari);
			$hasil=$cek->num_rows();
			if($hasil>0){
				$data['mahasiswa']=$cek->result();
				$data['ketemu']='<b>'.$hasil.'</b>data ditemukan berdasarkan <b>'.$cari.'</b>';
				$data['jumlah']=$hasil;
				$this->load->view('admin/template',$data);
			}else{
				$this->session->set_flashdata('m_eror','Pencarian data tidak ditemukan!');
				$data['mahasiswa']=$cek->result();
				redirect('mahasiswa/nonaktif');
			}
		}
    }
	function kompres_jadi(){
		$filename 	= $_FILES['gambar']['name'];
		$dir		= "gambar/";
		$dir1		= "gambarmhs/";
		$file		= 'gambar';
		$new_name	= 'kompres'.date('Y-m-d-H-i-s');
		$tipe 		= $_FILES['gambar']['type'];
		$ukuran 	= $_FILES['gambar']['size'];
		
		$vdir_upload	= $dir;
		$file_name		= $_FILES[''.$file.'']["name"];
		$vfile_upload	= $vdir_upload.$file;
		$tmp_file		= $_FILES[''.$file.'']["tmp_name"];
		move_uploaded_file ($tmp_file, $dir.$file_name);
		$id_mhs 		= $this->input->post('id_mhs');
		$id_kategori = $this->input->post('id_kategori');
		date_default_timezone_get('Asia/Jakarta');
		$date = date('YmdHis');
		$id_upload = $id_mhs.$id_kategori;
		
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
				'id_mahasiswa'	=> $id_mhs,
				'nama_gambar'	=> $new_name.$ext,
				'tipe'			=> $tipe,
				'ukuran'		=> $ukuran
			);
		$this->m_kategori->simpan_gambarmhs($info);
		$this->session->set_flashdata('m_sukses', 'Gambar Berhasil Diupload');
		redirect('mahasiswa/detail'.'/'.$id_mhs.'/'.$quality);
	}
	function hapusgbr($id_upload){
		//hak akses menu
		include('menu_akses.php');
		$id=$this->uri->segment(4);
		$data['title']		="Hapus Gambar Mahasiswa";
		$data['judul']		="MASTER DATA > Mahasiswa > Hapus";//judul
        $data['content']	="mahasiswa/hapusgambar.php"; //konten
        $data['kategori']	=$this->m_kategori->cekmhss($id_upload)->row_array(); //ambil data
        $data['mahasiswa']		=$this->m_mahasiswa->ceki($id)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function hapusgambarmhs($idup,$id){
		$upload=$this->m_mahasiswa->cekupload($idup)->row_array();
		$nama = $upload['nama_gambar'];
		$dir = "gambarmhs/".$nama;
		unlink($dir);
		$hapus=$this->m_mahasiswa->hapusgambar($idup);
		$this->session->set_flashdata('m_sukses', 'Gambar Berhasil Dihapus');
		redirect('mahasiswa/detail'.'/'.$id);
	}
}
<?php
class Kategori extends CI_Controller{
    private $limit=5;
    
	function __construct(){
        parent::__construct();
		$this->load->helper('back'); // helper yg di atas
		backButtonHandle();
		$this->load->library(array('pagination','form_validation','upload'));
		$this->load->model('m_mahasiswa');
		$this->load->model('m_dosen');
		$this->load->model('m_tata_usaha');
		$this->load->model('m_login');
		$this->load->model('m_kategori');
		if(!$this->session->userdata('username')){
            redirect('home');
		}
    }
    
    function index($offset=0,$order_column='id_kategori',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='id_kategori';
        if(empty($order_type)) $order_type='asc';
		
		//hak akses menu
		include('menu_akses.php');
		$data['title']="Kategori Dosen| Si Data Center AKN Bojonegoro";
		$data['judul']="MASTER DATA > Kategori Dosen";
		$data['content']="kategori/index.php";
		$data['kategori']=$this->m_kategori->ambil_data($this->limit,$offset,$order_column,$order_type)->result();
		$data['kategori_tu']=$this->m_kategori->ambil_datatu($this->limit,$offset,$order_column,$order_type)->result();
		$data['kategori_mahasiswa']=$this->m_kategori->ambil_datamhs($this->limit,$offset,$order_column,$order_type)->result();
		//pengalamatan
		$config['base_url']		=site_url('kategori/index/');
        $config['total_rows']	=$this->m_kategori->jumlahaktif();
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
	function kategori_mahasiswa($offset=0,$order_column='id_kategori',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='id_kategori';
        if(empty($order_type)) $order_type='asc';
		
		//hak akses menu
		include('menu_akses.php');
		$data['title']="Kategori Mahasiswa| Si Data Center AKN Bojonegoro";
		$data['judul']="MASTER DATA > Kategori Mahasiswa";
		$data['content']="kategori/kategori_mahasiswa.php";
		$data['kategori']=$this->m_kategori->ambil_data($this->limit,$offset,$order_column,$order_type)->result();
		$data['kategori_tu']=$this->m_kategori->ambil_datatu($this->limit,$offset,$order_column,$order_type)->result();
		$data['kategori_mahasiswa']=$this->m_kategori->ambil_datamhs($this->limit,$offset,$order_column,$order_type)->result();
		//pengalamatan
		$config['base_url']		=site_url('kategori/kategori_mahasiswa/');
        $config['total_rows']	=$this->m_kategori->jumlahaktifmhs();
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
	function kategori_tu($offset=0,$order_column='id_kategori',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='id_kategori';
        if(empty($order_type)) $order_type='asc';
		
		//hak akses menu
		include('menu_akses.php');
		$data['title']="Kategori Tata Usaha| Si Data Center AKN Bojonegoro";
		$data['judul']="MASTER DATA > Kategori Tata Usaha";
		$data['content']="kategori/kategori_tu.php";
		$data['kategori']=$this->m_kategori->ambil_data($this->limit,$offset,$order_column,$order_type)->result();
		$data['kategori_tu']=$this->m_kategori->ambil_datatu($this->limit,$offset,$order_column,$order_type)->result();
		$data['kategori_mahasiswa']=$this->m_kategori->ambil_datamhs($this->limit,$offset,$order_column,$order_type)->result();
		//pengalamatan
		$config['base_url']		=site_url('kategori/kategori_tu/');
        $config['total_rows']	=$this->m_kategori->jumlahaktiftu();
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
		$data['title']="Kategori Dosen| Si Data Center AKN Bojonegoro";
		$data['judul']="MASTER DATA > Kategori Dosen > Tambah";	
		$data['kode']=$this->m_kategori->getIdkategori('kategori_dosen','dosen');		
		$data['content']="kategori/tambah.php";
		$this->load->view('admin/template',$data);
	}
	function tambah_tu(){
		//hak akses menu
		include('menu_akses.php');
		$data['title']="Kategori Tata Usaha| Si Data Center AKN Bojonegoro";
		$data['judul']="MASTER DATA > Kategori Tata Usaha> Tambah";
		$data['kode']=$this->m_kategori->getIdkategori('kategori_tu','tu');		
		$data['content']="kategori/tambah_tu.php";
		$this->load->view('admin/template',$data);
	}
	function tambah_mhs(){
		//hak akses menu
		include('menu_akses.php');
		$data['title']="Kategori Mahasiswa| Si Data Center AKN Bojonegoro";
		$data['judul']="MASTER DATA > Kategori Mahasiswa> Tambah";		
		$data['kode']=$this->m_kategori->getIdkategori('kategori_mahasiswa','mahasiswa');		
		$data['content']="kategori/tambah_mhs.php";
		$this->load->view('admin/template',$data);
	}
	function tambah_proses(){
		$id=$this->input->post('id_kategori'); 	// mendapatkan input dari kode
		$nama=$this->input->post('nama_kategori'); 	// mendapatkan input dari kode
		
			$this->m_kategori->simpandosen($id, $nama);
			$this->session->set_flashdata('m_sukses','kategori <b>'.$id."-".$nama. '</b> berhasil ditambahkan!');
			redirect('kategori');	
	}
	function tambah_proses_tu(){
		$id=$this->input->post('id_kategori'); 	// mendapatkan input dari kode
		$nama=$this->input->post('nama_kategori'); 	// mendapatkan input dari kode
		
			$this->m_kategori->simpantu($id, $nama);
			$this->session->set_flashdata('m_sukses','kategori <b>'.$id."-".$nama. '</b> berhasil ditambahkan!');
			redirect('kategori/kategori_tu');	
	}
	function tambah_proses_mhs(){
		$id=$this->input->post('id_kategori'); 	// mendapatkan input dari kode
		$nama=$this->input->post('nama_kategori'); 	// mendapatkan input dari kode
		
			$this->m_kategori->simpanmhs($id, $nama);
			$this->session->set_flashdata('m_sukses','kategori <b>'.$id."-".$nama. '</b> berhasil ditambahkan!');
			redirect('kategori/kategori_mahasiswa');	
	}
	function edit($id_kategori){
		//hak akses menu
		include('menu_akses.php');
		$data['title']		="Edit Kategori Dosen"; 		//judul
		$data['judul']		="MASTER DATA > Kategori Dosen > Edit";	
        $data['content']	="kategori/edit.php"; 	//konten
        $data['kategori']	=$this->m_kategori->ceki($id_kategori)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function edittu($id_kategori){
		//hak akses menu
		include('menu_akses.php');
		$data['title']		="Edit Kategori Tata Usaha"; 		//judul
		$data['judul']		="MASTER DATA > Kategori Tata Usaha > Edit";	
        $data['content']	="kategori/edit_tu.php"; 	//konten
        $data['kategori']	=$this->m_kategori->cekitu($id_kategori)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function editmhs($id_kategori){
		//hak akses menu
		include('menu_akses.php');
		$data['title']	="Edit Kategori Mahasiswa"; 		//judul
		$data['judul']="MASTER DATA > Kategori Mahasiswa > Edit";	
        $data['content']="kategori/edit_mhs.php"; 	//konten
        $data['kategori']	=$this->m_kategori->cekimhs($id_kategori)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	
	function edit_proses($id_kategorikirim){
		$info=array(
			'id_kategori'=>$id_kategorikirim,
			'nama_kategori'=>$this->input->post('nama'),
		);
		$this->m_kategori->update($info, $id_kategorikirim);
		$this->session->set_flashdata('m_sukses','Data kategori sudah berhasil diedit!');
		redirect('kategori');	
	}
	function edit_prosestu($id_kategorikirim){
		$info=array(
			'id_kategori'=>$id_kategorikirim,
			'nama_kategori'=>$this->input->post('nama'),
		);
		$this->m_kategori->updatetu($info, $id_kategorikirim);
		$this->session->set_flashdata('m_sukses','Data kategori sudah berhasil diedit!');
		redirect('kategori/kategori_tu');
	}
	function edit_prosesmhs($id_kategorikirim){
		$info=array(
			'id_kategori'=>$id_kategorikirim,
			'nama_kategori'=>$this->input->post('nama'),
		);
		$this->m_kategori->updatemhs($info, $id_kategorikirim);
		$this->session->set_flashdata('m_sukses','Data kategori sudah berhasil diedit!');
		redirect('kategori/kategori_mahasiswa');
	}
	function hapus($id_kategori){
		//hak akses menu
		include('menu_akses.php');
		$data['title']		="Hapus Kategori Dosen";
		$data['judul']		="MASTER DATA > Kategori Dosen > Hapus";//judul
        $data['content']	="kategori/hapus.php"; //konten
        $data['kategori']	=$this->m_kategori->ceki($id_kategori)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function hapustu($id_kategori){
		//hak akses menu
		include('menu_akses.php');
		$data['title']		="Hapus Kategori Tata Usaha";
		$data['judul']		="MASTER DATA > Kategori Tata Usaha > Hapus";//judul
        $data['content']	="kategori/hapus_tu.php"; //konten
        $data['kategori']	=$this->m_kategori->cekitu($id_kategori)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function hapusmhs($id_kategori){
		//hak akses menu
		include('menu_akses.php');
		$data['title']		="Hapus Kategori Mahasiswa";
		$data['judul']		="MASTER DATA > Kategori Mahasiswa > Hapus";//judul
        $data['content']	="kategori/hapus_mhs.php"; //konten
        $data['kategori']	=$this->m_kategori->cekimhs($id_kategori)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function hapus_proses($id_kategorikirim){
		$status='nonaktif';
		$info=array(
			'id_kategori'=>$id_kategorikirim,
			'status'=>$status,
		);
        $this->m_kategori->update_hapus($info,$id_kategorikirim);
		$this->session->set_flashdata('m_sukses','Data kategori sudah berhasil dinonaktifkan!');
		redirect('kategori');
    }function hapus_prosestu($id_kategorikirim){
		$status='nonaktif';
		$info=array(
			'id_kategori'=>$id_kategorikirim,
			'status'=>$status,
		);
        $this->m_kategori->update_hapustu($info,$id_kategorikirim);
		$this->session->set_flashdata('m_sukses','Data kategori sudah berhasil dinonaktifkan!');
		redirect('kategori/kategori_tu');
    }
	function hapus_prosesmhs($id_kategorikirim){
		$status='nonaktif';
		$info=array(
			'id_kategori'=>$id_kategorikirim,
			'status'=>$status,
		);
        $this->m_kategori->update_hapusmhs($info,$id_kategorikirim);
		$this->session->set_flashdata('m_sukses','Data kategori sudah berhasil dinonaktifkan!');
		redirect('kategori/kategori_mahasiswa');
    }
	function detail($id_kategori){
		//hak akses menu
		include('menu_akses.php');
		$data['title']="detail kategori";
		$data['judul']="MASTER DATA > Kategori Dosen > Detail"; //judul
        $data['content']="kategori/detail.php"; //konten
        $data['kategori']=$this->m_kategori->ceki($id_kategori)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function detailnon($id_kategori){
		//hak akses menu
		include('menu_akses.php');
		$data['title']="detail kategori";
		$data['judul']="MASTER DATA > Kategori Dosen > Detail"; //judul
        $data['content']="kategori/detailnon.php"; //konten
        $data['kategori']=$this->m_kategori->cekn($id_kategori)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function aktifkan($id_kategori){
		//hak akses menu
		include('menu_akses.php');
		$data['title']="aktifkan kategori";
		$data['judul']="MASTER DATA > Kategori Dosen > Aktifkan";//judul
        $data['content']="kategori/aktifkan.php"; //konten
        $data['kategori']=$this->m_kategori->cekaktif($id_kategori)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function aktifkantu($id_kategori){
		//hak akses menu
		include('menu_akses.php');
		$data['title']="aktifkan kategori";
		$data['judul']="MASTER DATA > Kategori Tata Usaha > Aktifkan";//judul
        $data['content']="kategori/aktifkan_tu.php"; //konten
        $data['kategori']=$this->m_kategori->cekaktiftu($id_kategori)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function aktifkanmhs($id_kategori){
		//hak akses menu
		include('menu_akses.php');
		$data['title']="aktifkan kategori";
		$data['judul']="MASTER DATA > Kategori Mahasiswa > Aktifkan";//judul
        $data['content']="kategori/aktifkan_mahasiswa.php"; //konten
        $data['kategori']=$this->m_kategori->cekaktifmhs($id_kategori)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function aktifkan_proses($id_kategorikirim){
		$status='aktif';
		$info=array(
			'id_kategori'=>$id_kategorikirim,
			'status'=>$status,
		);
        $this->m_kategori->update_aktif($info,$id_kategorikirim);
		$this->session->set_flashdata('m_sukses','Data kategori sudah berhasil diaktifkan!');
		redirect('kategori');
    }
	function aktifkan_prosestu($id_kategorikirim){
		$status='aktif';
		$info=array(
			'id_kategori'=>$id_kategorikirim,
			'status'=>$status,
		);
        $this->m_kategori->update_aktiftu($info,$id_kategorikirim);
		$this->session->set_flashdata('m_sukses','Data kategori sudah berhasil diaktifkan!');
		redirect('kategori/kategori_tu');
    }
	function aktifkan_prosesmhs($id_kategorikirim){
		$status='aktif';
		$info=array(
			'id_kategori'=>$id_kategorikirim,
			'status'=>$status,
		);
        $this->m_kategori->update_aktifmhs($info,$id_kategorikirim);
		$this->session->set_flashdata('m_sukses','Data kategori sudah berhasil diaktifkan!');
		redirect('kategori/kategori_mahasiswa');
    }
	function dosen_nonaktif($offset=0,$order_column='id_kategori',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='id_kategori';
        if(empty($order_type)) $order_type='asc';
		
		//hak akses menu
		include('menu_akses.php');
		$data['title']="Kategori | Si Data Center AKN Bojonegoro";
		$data['judul']="MASTER DATA > Kategori Dosen Nonaktif";
		$data['content']="kategori/dosen_nonaktif.php";
		$data['kategori']=$this->m_kategori->ambil_non($this->limit,$offset,$order_column,$order_type)->result();
		//pengalamatan
		$config['base_url']		=site_url('kategori/dosen_nonaktif/');
        $config['total_rows']	=$this->m_kategori->jumlahnonaktif();
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
	function tu_nonaktif($offset=0,$order_column='id_kategori',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='id_kategori';
        if(empty($order_type)) $order_type='asc';
		
		//hak akses menu
		include('menu_akses.php');
		$data['title']="Kategori | Si Data Center AKN Bojonegoro";
		$data['judul']="MASTER DATA > Kategori Tata Usaha Nonaktif";
		$data['content']="kategori/tu_nonaktif.php";
		$data['kategori']=$this->m_kategori->ambil_nontu($this->limit,$offset,$order_column,$order_type)->result();
		//pengalamatan
		$config['base_url']		=site_url('kategori/tu_nonaktif/');
        $config['total_rows']	=$this->m_kategori->jumlahnonaktiftu();
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
	function mahasiswa_nonaktif($offset=0,$order_column='id_kategori',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='id_kategori';
        if(empty($order_type)) $order_type='asc';
		
		//hak akses menu
		include('menu_akses.php');
		$data['title']="Kategori | Si Data Center AKN Bojonegoro";
		$data['judul']="MASTER DATA > Kategori Mahasiswa Nonaktif";
		$data['content']="kategori/mahasiswa_nonaktif.php";
		$data['kategori']=$this->m_kategori->ambil_nonmhs($this->limit,$offset,$order_column,$order_type)->result();
		//pengalamatan
		$config['base_url']		=site_url('kategori/mahasiswa_nonaktif/');
        $config['total_rows']	=$this->m_kategori->jumlahnonaktifmhs();
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
		$data['title']=" Kategori Dosen Cari | Si Data Center AKN Bojonegoro";
		$data['judul']="MASTER DATA > Kategori Dosen Cari";
		$data['content']="kategori/cari.php";
		$cari=$this->input->post('cari');
		if ($cari==null){
			redirect(kategori);
		}
		else{
			$cek=$this->m_kategori->cari($cari);
			$cekid=$this->m_kategori->cariid($cari);
			$hasil=$cek->num_rows();
			$hasilid=$cekid->num_rows();
			if($hasil>0){
				$data['kategori']=$cek->result();
				$data['ketemu']='<b>'.$hasil.'</b>data ditemukan berdasarkan <b>'.$cari.'</b>';
				$data['jumlah']=$hasil;
				$this->load->view('admin/template',$data);
			}elseif($hasilid>0){
				$data['kategori']=$cekid->result();
				$data['ketemu']='<b>'.$hasilid.'</b>data ditemukan berdasarkan <b>'.$cari.'</b>';
				$data['jumlah']=$hasilid;
				$this->load->view('admin/template',$data);
			}
			else{
				$this->session->set_flashdata('m_eror','Pencarian data tidak ditemukan!');
				$data['kategori']=$cek->result();
				redirect('kategori');
			}
		}
    }
	function caritu(){
		//hak akses menu
		include('menu_akses.php');
		$data['title']=" Kategori Tata Usaha Cari | Si Data Center AKN Bojonegoro";
		$data['judul']="MASTER DATA > Kategori Tata Usaha Cari";
		$data['content']="kategori/cari_tu.php";
		$cari=$this->input->post('cari');
		if ($cari==null){
			redirect(kategori);
		}
		else{
			$cek=$this->m_kategori->caritu($cari);
			$cekid=$this->m_kategori->cariidtu($cari);
			$hasil=$cek->num_rows();
			$hasilid=$cekid->num_rows();
			if($hasil>0){
				$data['kategori']=$cek->result();
				$data['ketemu']='<b>'.$hasil.'</b>data ditemukan berdasarkan <b>'.$cari.'</b>';
				$data['jumlah']=$hasil;
				$this->load->view('admin/template',$data);
			}elseif($hasilid>0){
				$data['kategori']=$cekid->result();
				$data['ketemu']='<b>'.$hasilid.'</b>data ditemukan berdasarkan <b>'.$cari.'</b>';
				$data['jumlah']=$hasilid;
				$this->load->view('admin/template',$data);
			}
			else{
				$this->session->set_flashdata('m_eror','Pencarian data tidak ditemukan!');
				$data['kategori']=$cek->result();
				redirect('kategori/kategori_tu');
			}
		}
    }
	function carimhs(){
		//hak akses menu
		include('menu_akses.php');
		$data['title']=" Kategori Mahasiswa Cari | Si Data Center AKN Bojonegoro";
		$data['judul']="MASTER DATA > Kategori Mahasiswa Cari";
		$data['content']="kategori/cari_mhs.php";
		$cari=$this->input->post('cari');
		if ($cari==null){
			redirect(kategori);
		}
		else{
			$cek=$this->m_kategori->carimhs($cari);
			$cekid=$this->m_kategori->cariidmhs($cari);
			$hasil=$cek->num_rows();
			$hasilid=$cekid->num_rows();
			if($hasil>0){
				$data['kategori']=$cek->result();
				$data['ketemu']='<b>'.$hasil.'</b>data ditemukan berdasarkan <b>'.$cari.'</b>';
				$data['jumlah']=$hasil;
				$this->load->view('admin/template',$data);
			}elseif($hasilid>0){
				$data['kategori']=$cekid->result();
				$data['ketemu']='<b>'.$hasilid.'</b>data ditemukan berdasarkan <b>'.$cari.'</b>';
				$data['jumlah']=$hasilid;
				$this->load->view('admin/template',$data);
			}
			else{
				$this->session->set_flashdata('m_eror','Pencarian data tidak ditemukan!');
				$data['kategori']=$cek->result();
				redirect('kategori/kategori_mahasiswa');
			}
		}
    }
	function carinon(){
		//hak akses menu
		include('menu_akses.php');
		$data['title']=" Kategori Dosen Cari | Si Data Center AKN Bojonegoro";
		$data['judul']="MASTER DATA >Kategori Dosen Cari";
		$data['content']="kategori/carinon.php";
		$cari=$this->input->post('carinon');
		if ($cari==null){
			redirect(kategori);
		}
		else{
			$cek=$this->m_kategori->carinon($cari);
			$hasil=$cek->num_rows();
			if($hasil>0){
				$data['kategori']=$cek->result();
				$data['ketemu']='<b>'.$hasil.'</b>data ditemukan berdasarkan <b>'.$cari.'</b>';
				$data['jumlah']=$hasil;
				$this->load->view('admin/template',$data);
			}else{
				$this->session->set_flashdata('m_eror','Pencarian data tidak ditemukan!');
				$data['kategori']=$cek->result();
				redirect('kategori/nonaktif');
			}
		}
    }
}

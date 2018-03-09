<?php
class Dashboard extends CI_Controller{
    private $limit=20;
    
	function __construct(){
        parent::__construct();
		$this->load->model('m_mahasiswa');
		$this->load->model('m_dosen');
		$this->load->model('m_tata_usaha');
		$this->load->model('m_login');
		$this->load->model('m_kategori');
		$this->load->library(array('pagination','form_validation','upload'));
		 if(!$this->session->userdata('username')){
            redirect('home');
		}
    }
    
    function index(){
		//hak akses menu
		include('menu_akses.php');
		$data['title']="Dashboard | SI Data Center AKN Bojonegoro";
		$data['judul']="HALAMAN UTAMA";
		$data['content']="dashboard/index.php";
		$data['dosen']=$this->m_dosen->ambil_data_semua()->num_rows();
		$data['tata_usaha']=$this->m_tata_usaha->ambil_data_semua()->num_rows();
		$data['mahasiswa']=$this->m_mahasiswa->ambil_data_semua()->num_rows();
		$data['kateg_dos']=$this->m_kategori->jumlahaktif();
		$data['kateg_tu']=$this->m_kategori->jumlahaktiftu();
		$data['kateg_maha']=$this->m_kategori->jumlahaktifmhs();
		$data['unggah']=$this->m_kategori->jajal()->row_array();
		$this->load->view('admin/template',$data);
    }
	function profil($id){
		//hak akses menu
		include ('menu_profil.php');
		$data['title']="Profil | SI Data Center AKN Bojonegoro";
		$data['judul']="Profil Anda";
		$this->load->view('admin/template',$data);
    }	
	function logout(){
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        redirect('home');
    }
}
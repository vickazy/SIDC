<?php
class Dashboard extends CI_Controller{
    private $limit=20;
    
	function __construct(){
        parent::__construct();
		$this->load->model('M_mahasiswa');
		$this->load->model('M_dosen');
		$this->load->model('M_tata_usaha');
		$this->load->model('M_login');
		$this->load->model('M_kategori');
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
		$data['dosen']=$this->M_dosen->ambil_data_semua()->num_rows();
		$data['tata_usaha']=$this->M_tata_usaha->ambil_data_semua()->num_rows();
		$data['mahasiswa']=$this->M_mahasiswa->ambil_data_semua()->num_rows();
		$data['kateg_dos']=$this->M_kategori->jumlahaktif();
		$data['kateg_tu']=$this->M_kategori->jumlahaktiftu();
		$data['kateg_maha']=$this->M_kategori->jumlahaktifmhs();
		$data['unggah']=$this->M_kategori->jajal()->row_array();
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
<?php
class Download extends CI_Controller{
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
        $this->load->helper(array('form','url','file','download'));
		$this->load->library('upload','tools');
		if(!$this->session->userdata('username')){
            redirect('home');
		}
    }
    function download_dos(){
		$path = file_get_contents('gambardosen/'.$this->uri->segment(3));
		$nama_pdf = $this->uri->segment(3);
		force_download($nama_pdf, $path);
	}
	function download_tu(){
		$path = file_get_contents('gambartu/'.$this->uri->segment(3));
		$nama_pdf = $this->uri->segment(3);
		force_download($nama_pdf, $path);
	}
	function download_mhs(){
		$path = file_get_contents('gambarmhs/'.$this->uri->segment(3));
		$nama_pdf = $this->uri->segment(3);
		force_download($nama_pdf, $path);
	}
}
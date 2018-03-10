<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper('back'); // helper yg di atas
		backButtonHandle();
		$this->load->helper(array('form', 'url'));
        $this->load->model('M_login');
        $this->load->library('form_validation');
        $this->load->library(array('pagination','form_validation','upload'));
        if($this->session->userdata('username')){
            redirect('dashboard');
		}
    }
	
	public function index()	{
		$data['title']="Login | SI DC AKN Bojonegoro";
		$data['judul']="Login <br/> Aplikasi Sistem Informasi Data Center AKN Bojonegoro";
		$this->load->view('home/index.php',$data);
	}
	
	public function proses(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
        
        if($this->form_validation->run()==false){
            $this->session->set_flashdata('m_eror','Validasi gagal!');
            redirect('home');
        }else{
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $cek_mahasiswa=$this->M_login->cek_mahasiswa($username,md5($password));
            $cek_dosen=$this->M_login->cek_dosen($username,md5($password));
            $cek_tu=$this->M_login->cek_tu($username,md5($password));
            if($cek_mahasiswa->num_rows()>0){
                $this->session->set_userdata('username',$username);
				$session_id = $this->session->userdata('username');
				$data_mahasiswa=$this->M_login->data_mahasiswa($session_id)->row_array();
				$level=$data_mahasiswa['nama_akses'];
				$this->session->set_userdata('level',$level);
				$this->session->set_flashdata('m_sukses','Sukses Login!');
                redirect('validasi/validasi/'.$level.'/'.$username);
            }elseif($cek_dosen->num_rows()>0){
				$this->session->set_userdata('username',$username);
				$session_id = $this->session->userdata('username');
				$data_dosen=$this->M_login->data_dosen($session_id)->row_array();
				$level=$data_dosen['nama_akses'];
				$this->session->set_userdata('level',$level);
				$this->session->set_flashdata('m_sukses','Sukses Login!');
				redirect('dashboard');		
            }elseif($cek_tu->num_rows()>0){
               $cekakses=$this->M_login->ambilakses_tu($username)->num_rows();
				if($cekakses>1){
					 redirect('validasi/akses/'.$username);
				}elseif($cekakses>0){
					$this->session->set_userdata('username',$username);
					$session_id = $this->session->userdata('username');
					$data_tu=$this->M_login->data_tu($session_id)->row_array();
					$level=$data_tu['nama_akses'];
					$this->session->set_userdata('level',$level);
					$this->session->set_flashdata('m_sukses','Sukses Login!');
					redirect('dashboard');
				}
            }else{
                //login gagal
				$this->session->set_flashdata('m_eror','GAGAL!');
                redirect('home');
            }
        }
	}
}
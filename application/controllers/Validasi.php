<?php
class Validasi extends CI_Controller{
    
	function __construct(){
        parent::__construct();
		$this->load->model('M_mahasiswa');
		$this->load->model('M_dosen');
		$this->load->model('M_tata_usaha');
		$this->load->model('M_login');
		$this->load->library(array('pagination','form_validation','upload'));
		$this->load->helper('back'); // helper yg di atas
		backButtonHandle();
    }
    function validasi(){
		$data['title']="Validasi Mahasiswa | SI DC AKN Bojonegoro";
		$data['judul']="Validasi Mahasiswa";
		$data['content']="validasimaha/index.php";
		$user=$this->uri->segment(4);
		$data['session_id']=$user;
		$data['mahasiswa']=$this->M_login->maha($user)->row_array();
		$this->load->view('admin/template_maha',$data);
    }
    function validasi_pass(){
		$data['title']="Validasi Mahasiswa | SI DC AKN Bojonegoro";
		$data['judul']="Validasi Mahasiswa";
		$data['content']="validasimaha/password.php";
		$user=$this->uri->segment(4);
		$data['session_id']=$user;
		$data['mahasiswa']=$this->M_login->maha($user)->row_array();
		$this->load->view('admin/template_maha',$data);
    }
	function akses(){
		$data['title']="Pilih Hak Akses | SI DC AKN Bojonegoro";
		$data['judul']="Pilih Hak Akses Anda";
		$akses=$this->uri->segment(3);
		$data['session_id']=$akses;
		$cek1=$this->M_login->cektu($akses)->row_array();
		$cek2=$this->M_login->cekdosen($akses)->row_array();
		if($cek1>0){
			$data['jumlahakses']=$this->M_login->akses_tu($akses)->result();
		}elseif($cek2>0){
			$data['jumlahakses']=$this->M_login->akses_dos($akses)->result();
		}
		$this->load->view('admin/akses/index',$data);
    }	
	function validasi_proses($nimkirim){
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
		$this->M_mahasiswa->update($info, $nimkirim);
		$this->session->set_flashdata('m_sukses','Validasi Data sudah berhasil!');
		$level='mahasiswa';
		$this->session->set_userdata('level',$level);
		redirect('validasi/validasi_pass/'.$level.'/'.$nimkirim);
	}	
	function validasi_pass_pro($nimkirim){
		$info=array(
			'password'=>md5($this->input->post('password'))
		);
		$this->M_mahasiswa->update($info, $nimkirim);
		$this->session->set_flashdata('m_sukses','Validasi Data sudah berhasil!');
		$level='mahasiswa';
		$this->session->set_userdata('level',$level);
		redirect('mahasiswa/mahasiswa1');
	}
	function pilih($username,$a){
		if($a=='tata_usaha'){
			$this->session->set_userdata('u_id',$username);
			$session_id = $this->session->userdata('u_id');
			$level='tata_usaha';
			$this->session->set_userdata('level',$level);
			redirect('dashboard');
		}elseif($a=='dosen'){
			$this->session->set_userdata('u_id',$username);
			$session_id = $this->session->userdata('u_id');
			$level='dosen';
			$this->session->set_userdata('level',$level);
			redirect('dashboard');
		}elseif($a=='mahasiswa'){
			$this->session->set_userdata('u_id',$username);
			$session_id = $this->session->userdata('u_id');
			$level='mahasiswa';
			$this->session->set_userdata('level',$level);
			redirect('dashboard');
		}elseif($a=='superadmin'){
			$this->session->set_userdata('u_id',$username);
			$session_id = $this->session->userdata('u_id');
			$level='superadmin';
			$this->session->set_userdata('level',$level);
			redirect('dashboard');
		}
	}
	function logout(){
        $this->session->unset_userdata('u_id');
        redirect('home');
    }
}
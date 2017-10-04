<?php
	//hak akses menu
	$level = $this->session->userdata('level');
	$session_id = $this->session->userdata('username');
	if($level=='dosen'){
		$data['menu']		="menu_dosen.php";
		$data['jumlahakses']=$this->m_login->akses_dos($session_id)->result();
	}
	elseif($level=='tata_usaha'){
		$data['menu']		="menu_tu.php";
		$data['jumlahakses']=$this->m_login->akses_tu($session_id)->result();
	}
	elseif($level=='mahasiswa'){
		$data['menu']		="menu_mahasiswa.php";
		$data['jumlahakses']=$this->m_login->akses_maha($session_id)->result();
	}
	elseif($level=='superadmin'){
		$data['menu']		="menu_super.php";
		$data['jumlahakses']=$this->m_login->akses_tu($session_id)->result();
	}
	
?>
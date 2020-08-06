<?php 
 class mMaster extends CI_Model{
	function LoadPage($akses, $page, $data=null) {
		if($this->session->userdata('masuk')) {
			if($this->session->userdata('akses')==$akses) {
				$this->load->view('header/header'.$akses, $data);
				$this->load->view('master/'.$page, $data);
				$this->load->view('footer/footer', $data);
			} else if($this->session->userdata('akses')==null) {
				$this->load->view('errorLogin');
			}
		} else {
			$this->load->view('error');
		}
	}

	function CekAkses($akses) {
		if($this->uri->segment(1)==$akses) {
			$this->session->set_userdata('masuk',TRUE);
		} else {
			$this->session->set_userdata('masuk',FALSE);
		}
	}
}
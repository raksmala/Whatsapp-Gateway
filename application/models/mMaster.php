<?php 
 class mMaster extends CI_Model{
	function LoadPage($akses, $page, $data=null) {
		if($this->session->userdata('akses')!=$akses) {
			$this->load->view('error');
		} else if($this->session->userdata('akses')==null) {
			$this->load->view('errorLogin');
		} else {
			$this->load->view('header/header'.$akses, $data);
			$this->load->view('master/'.$page, $data);
			$this->load->view('footer/footer', $data);
		}
	}
}
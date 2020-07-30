<?php 
 class mMaster extends CI_Model{
	function LoadPage($page, $data=null) {
		if($this->uri->segment(1)=="Pengelola") {
			$this->load->view('header/headerPengelola', $data);
			$this->load->view('master/'.$page, $data);
			$this->load->view('footer/footer', $data);
		} else if($this->uri->segment(1)=="Administrator") {
			$this->load->view('header/headerAdministrator', $data);
			$this->load->view('master/'.$page, $data);
			$this->load->view('footer/footer', $data);
		} else if($this->uri->segment(1)=="Superadmin") {
			$this->load->view('header/headerSuperadmin', $data);
			$this->load->view('master/'.$page, $data);
			$this->load->view('footer/footer', $data);
		}
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('mLogin');
		$this->load->helper('url');
		$this->load->library('session');
	}

	public function index()	{
		if($this->session->userdata('akses')==null) {
			$this->load->view('login');
		} else {
			$this->mMaster->LoadPage($this->session->userdata('akses'), strtolower($this->session->userdata('akses')), null);
		}
	}

	function auth() {
        $this->mLogin->auth();
	}

	function logout() {
		$this->session->sess_destroy();
		$url=base_url('Login');
		redirect($url);
	}
}

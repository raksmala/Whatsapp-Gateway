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
		$this->load->view('login');
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

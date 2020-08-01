<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {
	public function index() {
		$this->mMaster->LoadPage($this->session->userdata('akses'), 'kelas');
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {
	public function index() {
		$this->mMaster->CekAkses($this->session->userdata('akses'));
		$this->mMaster->LoadPage($this->session->userdata('akses'), 'superadmin', null);
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {
	public function index() {
        $this->mMaster->LoadPage($this->session->userdata('akses'), 'pegawai');
	}
}

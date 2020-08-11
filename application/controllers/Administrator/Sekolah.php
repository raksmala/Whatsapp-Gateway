<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah extends CI_Controller {
	public function index() {

		$data['query'] = $this->mMaster->TampilData("*", "ms_sekolah", null, null);
		$this->mMaster->CekAkses($this->session->userdata('akses'));
		$this->mMaster->LoadPage($this->session->userdata('akses'), 'sekolah', $data);
	}
}

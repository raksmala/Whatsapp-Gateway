<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {
	public function index() {
		$data['query'] = $this->mMaster->TampilData("*", "ms_pegawai", null, null);
		$this->mMaster->CekAkses($this->session->userdata('akses'));
        $this->mMaster->LoadPage($this->session->userdata('akses'), 'pegawai', $data);
	}
}

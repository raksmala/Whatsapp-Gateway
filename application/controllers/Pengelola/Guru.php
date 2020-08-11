<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {
	public function index() {
		$join = array(
			"ms_sekolah" => "ms_guru.npsn = ms_sekolah.npsn"
		);

		$npsn = $this->session->userdata('npsn');
		$where = array(
			"ms_sekolah.npsn" => "= " .$npsn. ""
		);

		$data['query'] = $this->mMaster->TampilData("*", "ms_guru", $join, $where);
		$this->mMaster->CekAkses($this->session->userdata('akses'));
		$this->mMaster->LoadPage($this->session->userdata('akses'), 'guru', $data);
	}
}

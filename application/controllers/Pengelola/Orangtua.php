<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orangtua extends CI_Controller {
	public function index() {
		$join = array(
			"ms_siswa" => "ms_orangtua.idOrangtua = ms_siswa.idOrangtua",
			"ms_kelas" => "ms_siswa.idKelas = ms_kelas.idKelas",
			"ms_sekolah" => "ms_kelas.npsn = ms_sekolah.npsn"
		);

		$npsn = $this->session->userdata('npsn');
		$where = array(
			"ms_sekolah.npsn" => "= " .$npsn. ""
		);

		$data['menu'] = $this->mMenu->LoadMenu();
		$data['submenu'] = $this->mMenu->LoadSubMenu();
		$data['query'] = $this->mMaster->TampilData("*", "ms_orangtua", $join, null, $where);
		$this->mMaster->LoadPage('orangtua', $data);
	}
}

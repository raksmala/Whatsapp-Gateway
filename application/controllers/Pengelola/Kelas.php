<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {
	public function index() {
		$join = array(
			"ms_sekolah" => "ms_kelas.npsn = ms_sekolah.npsn",
			"ms_siswa" => "ms_siswa.idKelas = ms_kelas.idKelas"
		);

		$npsn = $this->session->userdata('npsn');
		$where = array(
			"ms_sekolah.npsn" => "= " .$npsn. ""
		);

		$data['query'] = $this->mMaster->TampilData("*", "ms_kelas", $join, $where);
		$this->mMaster->CekAkses($this->session->userdata('akses'));
		$this->mMaster->LoadPage($this->session->userdata('akses'), 'kelas', $data);
	}
}

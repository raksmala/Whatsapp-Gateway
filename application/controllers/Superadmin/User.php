<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function index() {
		$join = array(
			"ms_pegawai" => "ms_user.idPegawai = ms_pegawai.idPegawai",
			"ms_sekolah" => "ms_user.npsn = ms_sekolah.npsn"
		);

		$data['query'] = $this->mMaster->TampilData("*", "ms_user", $join, null);
		$this->mMaster->CekAkses($this->session->userdata('akses'));
        $this->mMaster->LoadPage($this->session->userdata('akses'), 'user', $data);
	}
}

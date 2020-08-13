<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailKelas extends CI_Controller {
	public function index() {
		$join = array(
			"ms_kelas" => "ms_siswa.idKelas = ms_kelas.idKelas",
			"ms_sekolah" => "ms_kelas.npsn = ms_sekolah.npsn"
		);

		$npsn = $this->session->userdata('npsn');
        $idKelas = $this->input->get('id');
		$where = array(
            "ms_sekolah.npsn" => "= " .$npsn. "",
            "ms_siswa.idKelas" => "= " .$idKelas. "",
			"ms_siswa.status" => "= 'aktif'"
		);

		$data['query'] = $this->mMaster->TampilData("*", "ms_siswa", $join, $where);
		$this->mMaster->CekAkses($this->session->userdata('akses'));
		$this->mMaster->LoadPage($this->session->userdata('akses'), 'detailKelas', $data);
	}
}

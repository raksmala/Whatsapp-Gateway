<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {
	public function index() {
		$join = array(
			"ms_kelas" => "ms_siswa.idKelas = ms_kelas.idKelas",
			"ms_sekolah" => "ms_kelas.npsn = ms_sekolah.npsn",
			"ms_orangtua" => "ms_siswa.idOrangtua = ms_orangtua.idOrangtua"
		);

		$npsn = $this->session->userdata('npsn');
		$where = array(
			"ms_sekolah.npsn" => "= " .$npsn. ""
		);

		$data['query'] = $this->mMaster->TampilData("*", "ms_siswa", $join, $where);
		$this->mMaster->CekAkses($this->session->userdata('akses'));
		$this->mMaster->LoadPage($this->session->userdata('akses'), 'siswa', $data);
	}

	public function add() {
		$nisn = $this->input->post('nisn');
		$data = array(
			'nisn' => $nisn,
			'namaSiswa' => $this->input->post('namaSiswa'),
			'jenisKelamin' => $this->input->post('jenisKelamin'),
			'alamatSiswa' => $this->input->post('alamatSiswa'),
			'idKelas' => $this->input->post('idKelas'),
			'idOrangtua' => $this->input->post('idOrangtua')
		);
		$table = 'ms_siswa';
		$where = array('nisn' => $nisn);

		$query = $this->db->get_where($table, $where);
		if($query->num_rows() > 0) {
			$this->mMaster->UpdateData($table, $data, $where);
		} else {
			$this->mMaster->TambahData($table, $data);
		}
	}

	public function delete() {
		$nisn = $this->input->post('nisn2');
		$table = 'ms_siswa';
		$where = array('nisn' => $nisn);

		$this->mMaster->DeleteData($table, $where);
	}
}

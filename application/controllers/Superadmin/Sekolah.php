<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah extends CI_Controller {
	public function index() {
		$data['query'] = $this->mMaster->TampilData("*", "ms_sekolah", null, null);
		$this->mMaster->CekAkses($this->session->userdata('akses'));
		$this->mMaster->LoadPage($this->session->userdata('akses'), 'sekolah', $data);
	}

	public function add() {
		$npsn = $this->input->post('npsn');
		$data = array(
			'npsn' => $npsn,
			'namaSekolah' => $this->input->post('namaSekolah'),
			'alamatSekolah' => $this->input->post('alamatSekolah'),
			'noTlp' => $this->input->post('noTlp'),
			'email' => $this->input->post('email'),
			'kepalaSekolah' => $this->input->post('kepalaSekolah'),
			'noHpKepsek' => $this->input->post('noHpKepsek')
		);
		$table = 'ms_sekolah';
		$where = array('npsn' => $npsn);

		$query = $this->db->get_where($table, $where);
		if($query->num_rows() > 0) {
			$this->mMaster->UpdateData($table, $data, $where);
		} else {
			$this->mMaster->TambahData($table, $data);
		}
	}

	public function delete() {
		$npsn = $this->input->post('npsn2');
		$table = 'ms_sekolah';
		$where = array('npsn' => $npsn);

		$this->mMaster->DeleteData($table, $where);
	}
}

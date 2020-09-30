<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah extends CI_Controller {
	public function index() {
		$data['menu'] = $this->mMenu->LoadMenu();
		$data['submenu'] = $this->mMenu->LoadSubMenu();
		$data['query'] = $this->mMaster->TampilData("*", "ms_sekolah", null, null, null);
		$this->mMaster->LoadPage('sekolah', $data);
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
		$data2 = array(
			'npsn' => $npsn,
			'namaKelas' => 'Default'
		);
		$table = 'ms_sekolah';
		$table2 = 'ms_kelas';
		$where = array('npsn' => $npsn);

		$query = $this->db->get_where($table, $where);
		if($query->num_rows() > 0) {
			$this->mMaster->UpdateData($table, $data, $where);
		} else {
			$this->mMaster->TambahData($table, $data);
			$this->mMaster->TambahData($table2, $data2);
		}
	}

	public function delete() {
		$npsn = $this->input->post('npsn2');
		$table = 'ms_sekolah';
		$where = array('npsn' => $npsn);

		$this->mMaster->DeleteData($table, $where);
	}
}

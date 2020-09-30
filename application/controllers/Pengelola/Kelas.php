<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {
	public function index() {
		$join = array(
			"ms_sekolah" => "ms_kelas.npsn = ms_sekolah.npsn"
		);

		$npsn = $this->session->userdata('npsn');
		$where = array(
			"ms_sekolah.npsn" => "= " .$npsn. ""
		);

		$data['menu'] = $this->mMenu->LoadMenu();
		$data['submenu'] = $this->mMenu->LoadSubMenu();
		$data['query'] = $this->mMaster->TampilData("*", "ms_kelas", $join, null, $where);
		$this->mMaster->LoadPage('kelas', $data);
	}
	
	public function add() {
		$idKelas = $this->input->post('idKelas');
		$data = array(
			'idKelas' => $idKelas,
			'npsn' => $this->session->userdata('npsn'),
			'namaKelas' => $this->input->post('namaKelas')
		);
		$table = 'ms_kelas';
		$where = array('idKelas' => $idKelas);

		$query = $this->db->get_where($table, $where);
		if($query->num_rows() > 0) {
			$this->mMaster->UpdateData($table, $data, $where);
		} else {
			$this->mMaster->TambahData($table, $data);
		}
	}

	public function delete() {
		$idKelas = $this->input->post('idKelas2');
		$table = 'ms_kelas';
		$where = array('idKelas' => $idKelas);

		$this->mMaster->DeleteData($table, $where);
	}
}

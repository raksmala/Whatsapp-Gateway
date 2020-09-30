<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pulang extends CI_Controller {
	public function index() {
		$join = array(
			"ms_sekolah" => "ms_mode.npsn = ms_sekolah.npsn"
		);

		$npsn = $this->session->userdata('npsn');
		$where = array(
			"ms_sekolah.npsn" => "= " .$npsn. ""
		);

		$data['menu'] = $this->mMenu->LoadMenu();
		$data['submenu'] = $this->mMenu->LoadSubMenu();
		$data['query'] = $this->mMaster->TampilData("*", "ms_mode", $join, null, $where);
		$this->mMaster->LoadPage('pulang', $data);
	}

	public function add() {
		$npsn = $this->session->userdata('npsn');
		$data = array(
			'npsn' => $npsn,
			'mulaiPulang' => $this->input->post('mulaiPulang'),
			'selesaiPulang' => $this->input->post('selesaiPulang'),
			'formatPulang' => $this->input->post('formatPulang')
		);
		$table = 'ms_mode';
		$where = array('npsn' => $npsn);

		$query = $this->db->get_where($table, $where);
		if($query->num_rows() > 0) {
			$this->mMaster->UpdateData($table, $data, $where);
		} else {
			$this->mMaster->TambahData($table, $data);
		}
	}

	public function delete() {
		$nisn = $this->input->post('npsn2');
		$table = 'ms_mode';
		$where = array('npsn' => $npsn);

		$this->mMaster->DeleteData($table, $where);
	}
}

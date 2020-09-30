<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {
	public function index() {
		$data['menu'] = $this->mMenu->LoadMenu();
		$data['submenu'] = $this->mMenu->LoadSubMenu();
		$data['query'] = $this->mMaster->TampilData("*", "ms_pegawai", null, null, null);
        $this->mMaster->LoadPage('pegawai', $data);
	}

	public function add() {
		$idPegawai = $this->input->post('idPegawai');
		$data = array(
			'idPegawai' => $idPegawai,
			'namaPegawai' => $this->input->post('namaPegawai'),
			'jenisKelamin' => $this->input->post('jenisKelamin'),
			'alamatPegawai' => $this->input->post('alamatPegawai'),
			'noHp' => $this->input->post('noHp')
		);
		$table = 'ms_pegawai';
		$where = array('idPegawai' => $idPegawai);

		$query = $this->db->get_where($table, $where);
		if($query->num_rows() > 0) {
			$this->mMaster->UpdateData($table, $data, $where);
		} else {
			$this->mMaster->TambahData($table, $data);
		}
	}

	public function delete() {
		$idPegawai = $this->input->post('idPegawai2');
		$table = 'ms_pegawai';
		$where = array('idPegawai' => $idPegawai);

		$this->mMaster->DeleteData($table, $where);
	}
}

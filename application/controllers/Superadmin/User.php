<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function index() {
		$join = array(
			"ms_pegawai" => "ms_user.idPegawai = ms_pegawai.idPegawai",
			"ms_sekolah" => "ms_user.npsn = ms_sekolah.npsn"
		);

		$where = array(
			"level" => "!= 'superadmin'"
		);

		$data['menu'] = $this->mMenu->LoadMenu();
		$data['submenu'] = $this->mMenu->LoadSubMenu();
		$data['query'] = $this->mMaster->TampilData("*", "ms_user", $join, "left", $where);
        $this->mMaster->LoadPage('user', $data);
	}

	public function add() {
		if($this->input->post('idPegawai') != null) {
			$idUser = $this->input->post('idUser');
			if($this->input->post('password')!=null) {
				$data = array(
					'idUser' => $idUser,
					'idPegawai' => $this->input->post('idPegawai'),
					'username' => $this->input->post('username'),
					'password' => MD5($this->input->post('password')),
					'level' => 'admin',
					'statusUser' => $this->input->post('statusUser')
				);
			} else {
				$data = array(
					'idUser' => $idUser,
					'idPegawai' => $this->input->post('idPegawai'),
					'username' => $this->input->post('username'),
					'level' => 'admin',
					'statusUser' => $this->input->post('statusUser')
				);
			}
		} else if($this->input->post('npsn3') != null) {
			$idUser = $this->input->post('idUser3');
			if($this->input->post('password3')!=null) {
				$data = array(
					'idUser' => $idUser,
					'npsn' => $this->input->post('npsn3'),
					'username' => $this->input->post('username3'),
					'password' => MD5($this->input->post('password3')),
					'level' => 'pengelola',
					'statusUser' => $this->input->post('statusUser3')
				);
			} else {
				$data = array(
					'idUser' => $idUser,
					'npsn' => $this->input->post('npsn3'),
					'username' => $this->input->post('username3'),
					'level' => 'pengelola',
					'statusUser' => $this->input->post('statusUser3')
				);
			}
		}
		$table = 'ms_user';
		$where = array('idUser' => $idUser);

		$query = $this->db->get_where($table, $where);
		if($query->num_rows() > 0) {
			$this->mMaster->UpdateData($table, $data, $where);
		} else {
			$this->mMaster->TambahData($table, $data);
		}
	}

	public function delete() {
		$idUser = $this->input->post('idUser2');
		$table = 'ms_user';
		$where = array('idUser' => $idUser);

		$this->mMaster->DeleteData($table, $where);
	}
}

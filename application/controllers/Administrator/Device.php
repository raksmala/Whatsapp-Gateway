<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Device extends CI_Controller {
	public function index() {
		$join = array(
			"ms_sekolah" => "ms_device.npsn = ms_sekolah.npsn"
		);

		$data['menu'] = $this->mMenu->LoadMenu();
		$data['submenu'] = $this->mMenu->LoadSubMenu();
		$data['query'] = $this->mMaster->TampilData("*", "ms_device", $join, null, null);
		$this->mMaster->LoadPage('device', $data);
	}

	public function add() {
        $id = $this->input->post('id');
		$data = array(
            'id' => $id,
			'npsn' => $this->input->post('npsn'),
			'serial' => $this->input->post('serial')
		);
		$table = 'ms_device';
		$where = array('id' => $id);

		$query = $this->db->get_where($table, $where);
		if($query->num_rows() > 0) {
			$this->mMaster->UpdateData($table, $data, $where);
		} else {
			$this->mMaster->TambahData($table, $data);
		}
	}

	public function delete() {
		$id = $this->input->post('id2');
		$table = 'ms_device';
		$where = array('id' => $id);

		$this->mMaster->DeleteData($table, $where);
	}
}

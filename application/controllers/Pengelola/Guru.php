<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {
	public function index() {
		$join = array(
			"ms_sekolah" => "ms_guru.npsn = ms_sekolah.npsn"
		);

		$npsn = $this->session->userdata('npsn');
		$where = array(
			"ms_sekolah.npsn" => "= " .$npsn. ""
		);

		$data['query'] = $this->mMaster->TampilData("*", "ms_guru", $join, $where);
		$this->mMaster->CekAkses($this->session->userdata('akses'));
		$this->mMaster->LoadPage($this->session->userdata('akses'), 'guru', $data);
	}

	public function add() {
		$nip = $this->input->post('nip');
		$data = array(
			'nip' => $nip,
			'npsn' => $this->session->userdata('npsn'),
			'namaGuru' => $this->input->post('namaGuru'),
			'jenisKelamin' => $this->input->post('jenisKelamin'),
			'alamatGuru' => $this->input->post('alamatGuru')
		);
		$table = 'ms_guru';
		$where = array('nip' => $nip);

		$query = $this->db->get_where($table, $where);
		if($query->num_rows() > 0) {
			$this->mMaster->UpdateData($table, $data, $where);
		} else {
			$this->mMaster->TambahData($table, $data);
		}
	}

	public function delete() {
		$nip = $this->input->post('nip2');
		$table = 'ms_guru';
		$where = array('nip' => $nip);

		$this->mMaster->DeleteData($table, $where);
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah extends CI_Controller {
	public function index() {
		$npsn = $this->session->userdata('npsn');
		$where = array(
			"ms_sekolah.npsn" => "= " .$npsn. ""
		);

		$data['menu'] = $this->mMenu->LoadMenu();
		$data['submenu'] = $this->mMenu->LoadSubMenu();
		$data['query'] = $this->mMaster->TampilData("*", "ms_sekolah", null, null, $where);
		$this->mMaster->LoadPage('profilSekolah', $data);
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

	public function logo() {
		$data = $_POST['image'];

		$image_array_1 = explode(';', $data);
		$image_array_2 = explode(',', $image_array_1[1]);

		$data = base64_decode($image_array_2[1]);
		$imageName = time().'.png';
		file_put_contents("assets/Logo/".$imageName, $data);
		unlink("assets/Logo/".$this->session->userdata('logo'));
		$this->session->set_userdata('logo', $imageName);

		$npsn = $this->session->userdata('npsn');
		$data = array(
			'logo' => $imageName
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
}

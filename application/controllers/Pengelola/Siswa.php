<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {
	public function index() {
		$join = array(
			"ms_kelas" => "ms_siswa.idKelas = ms_kelas.idKelas",
			"ms_sekolah" => "ms_kelas.npsn = ms_sekolah.npsn"
		);

		$npsn = $this->session->userdata('npsn');
		$where = array(
			"ms_sekolah.npsn" => "= " .$npsn. "",
			"status" => "= 'aktif'"
		);

		$data['menu'] = $this->mMenu->LoadMenu();
		$data['submenu'] = $this->mMenu->LoadSubMenu();
		$data['query'] = $this->mMaster->TampilData("*", "ms_siswa", $join, null, $where);
		$this->mMaster->LoadPage('siswa', $data);
	}

	public function add() {
		$nisn = $this->input->post('nisn');
		$data = array(
			'nisn' => $nisn,
			'namaSiswa' => $this->input->post('namaSiswa'),
			'jenisKelamin' => $this->input->post('jenisKelamin'),
			'alamatSiswa' => $this->input->post('alamatSiswa'),
			'idKelas' => $this->input->post('idKelas'),
			'namaOrangtua' => $this->input->post('namaOrangtua'),
			'noHp' => $this->input->post('noHp'),
			'status' => $this->input->post('status')
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

	public function excel() {
		force_download('assets/Excel/format_siswa.xlsx',NULL);
	}

	public function import() {
		if(isset($_FILES["file"]["name"])) {
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();

				for($row=2; $row<=$highestRow; $row++) {
					$nisn = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$namaSiswa = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$jenisKelamin = strtoupper($worksheet->getCellByColumnAndRow(2, $row)->getValue());
					if($jenisKelamin=='L') {
						$jenisKelamin = 'Laki-laki';
					} else if($jenisKelamin=='P') {
						$jenisKelamin = 'Perempuan';
					}
					$alamatSiswa = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$namaOrangtua = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$noHp = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$noHp = '+62'.substr(trim($noHp), 1);
					$where = array(
						"npsn" => "= " .$this->session->userdata('npsn'). "",
						"namaKelas" => "= 'Default'"
					);
					$idKelas = $this->mMaster->TampilData('idKelas', 'ms_kelas', null, null, $where);
					foreach($idKelas->result() as $id)
					$data[] = array(
					'nisn'  => $nisn,
					'idKelas'   => $id->idKelas,
					'namaSiswa'   => $namaSiswa,
					'jenisKelamin'    => $jenisKelamin,
					'alamatSiswa'  => $alamatSiswa,
					'namaOrangtua'   => $namaOrangtua,
					'noHp'  => $noHp,
					'status'  => 'aktif'
					);
				}
			}
			$this->mMaster->TambahDataBatch('ms_siswa', $data);
		} 
	}
}

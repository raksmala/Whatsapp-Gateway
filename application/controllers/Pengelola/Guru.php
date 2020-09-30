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

		$data['menu'] = $this->mMenu->LoadMenu();
		$data['submenu'] = $this->mMenu->LoadSubMenu();
		$data['query'] = $this->mMaster->TampilData("*", "ms_guru", $join, null, $where);
		$this->mMaster->LoadPage('guru', $data);
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
	
	public function excel() {
		force_download('assets/Excel/format_guru.xlsx',NULL);
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
					$nip = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$npsn = $this->session->userdata('npsn');
					$namaGuru = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$jenisKelamin = strtoupper($worksheet->getCellByColumnAndRow(2, $row)->getValue());
					if($jenisKelamin=='L') {
						$jenisKelamin = 'Laki-laki';
					} else if($jenisKelamin=='P') {
						$jenisKelamin = 'Perempuan';
					}
					$alamatGuru = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$data[] = array(
					'nip'  => $nip,
					'npsn'   => $npsn,
					'namaGuru'   => $namaGuru,
					'jenisKelamin'    => $jenisKelamin,
					'alamatGuru'  => $alamatGuru
					);
				}
			}
			$this->mMaster->TambahDataBatch('ms_guru', $data);
		} 
	}
}

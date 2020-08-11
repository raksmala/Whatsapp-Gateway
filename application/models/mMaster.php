<?php 
 class mMaster extends CI_Model{
	function LoadPage($akses, $page, $data) {
		if($this->session->userdata('masuk')) {
			if($this->session->userdata('akses')==$akses) {
				$this->load->view('header/header'.$akses, $data);
				$this->load->view('master/'.$page, $data);
				$this->load->view('footer/footer', $data);
			} else if($this->session->userdata('akses')==null) {
				$this->load->view('errorLogin');
			}
		} else {
			$this->load->view('error');
		}
	}

	function CekAkses($akses) {
		if($this->uri->segment(1)==$akses) {
			$this->session->set_userdata('masuk',TRUE);
		} else {
			$this->session->set_userdata('masuk',FALSE);
		}
	}

	function TampilData($select, $from, $join, $where) {
        $this->db->select($select);
		$this->db->from($from);
		if($join!=null) {
			foreach($join as $table=>$on) {
				if($from = 'ms_user') {
					$this->db->join($table, $on, 'left');
				} else {
					$this->db->join($table, $on);
				}
			}
		}
		if($where!=null) {
			foreach($where as $condition1=>$condition2) {
				$this->db->where("" .$condition1. " " .$condition2. "");
			}
		}
        return $this->db->get();
	}
	
	function TambahData($table, $data) {
		$this->db->insert($table, $data);
		redirect($this->uri->segment(1)."/".$this->uri->segment(2));
	}

	function UpdateData($table, $data, $where) {
		$this->db->where($where);
		$this->db->update($table, $data);
		redirect($this->uri->segment(1)."/".$this->uri->segment(2));
	}

	function DeleteData($table, $where) {
		$this->db->where($where);
		$this->db->delete($table);
		redirect($this->uri->segment(1)."/".$this->uri->segment(2));
	}
}
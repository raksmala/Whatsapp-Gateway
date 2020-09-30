<?php
class mLogin extends CI_Model{
	function auth(){
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
		$password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
		
		$query=$this->db->query("SELECT * FROM ms_user WHERE username='".$username."' AND password='".MD5($password)."' AND statusUser='aktif'");
		foreach ($query->result() as $row) {
            $this->db->from('ms_user');
            if($row->npsn != null) {
			    $this->db->join('ms_sekolah', 'ms_sekolah.npsn ='.$row->npsn.'');
            } else if($row->idPegawai != null) {
                $this->db->join('ms_pegawai', 'ms_pegawai.idPegawai ='.$row->idPegawai.'');
            }
			$query2=$this->db->get();
			foreach ($query2->result() as $row2) {
                $this->session->set_userdata('login',TRUE);
                $this->session->set_userdata('id', $row->idUser);
                if($row->npsn != null) {
                    $this->session->set_userdata('npsn', $row->npsn);
                    $this->session->set_userdata('username', $row2->namaSekolah);
                    $this->session->set_userdata('logo', $row2->logo);
                } else if($row->idPegawai != null) {
                    $this->session->set_userdata('idPegawai', $row->idPegawai);
                    $this->session->set_userdata('username', $row2->namaPegawai);
                    $this->session->set_userdata('logo', 'default.png');
                } else {
                    $this->session->set_userdata('logo', 'default.png');
                }
                if ($row->level=='superadmin') {
                    $this->session->set_userdata('akses','Superadmin');
                    redirect('Superadmin/Beranda');
                } else if ($row->level=='admin') {
                    $this->session->set_userdata('akses','Administrator');
                    redirect('Administrator/Beranda');
                } else if ($row->level=='pengelola') {
                    $this->session->set_userdata('akses','Pengelola');
                    redirect('Pengelola/Beranda');
                }
            }
		}
		echo $this->session->set_flashdata('msg','Username Atau Password Salah');
		redirect(base_url(login));
    }
}

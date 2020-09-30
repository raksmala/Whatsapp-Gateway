<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Hadir extends REST_Controller {

    function __construct() {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    public function index_get() {
        // Users from a data store e.g. database

        $npsn = $this->get('npsn');
        $idSiswa = explode(">", $this->get('id'));
        $space = str_replace('%20', ' ', $this->get('time'));
        $waktu = explode(">", $space);

        // If the id parameter doesn't exist return all the users

        if ($idSiswa == NULL) {
            $this->response([
                'status' => FALSE,
                'message' => 'No id were found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }

        // Find and return a single record for a particular user.
        else {
            for($a = 0; $a >= 0; $a++) {
                if(isset($idSiswa[$a])) {
                    // Validate the id.
                    if($idSiswa[$a] == null) {
                        continue;
                    } else if ($idSiswa[$a] <= 0) {
                        continue;    
                    }

                    $this->db->query("INSERT INTO ms_hadir (id, idSiswa, waktu) VALUES ('', '$idSiswa[$a]', '$waktu[$a]')");

                    $noHp = "";
                    $checkNoHp = $this->db->query("SELECT * FROM ms_siswa where idSiswa='".$idSiswa[$a]."'");
                    foreach($checkNoHp->result() as $no) {
                        if(strlen($no->noHp)<=14) {
                            $noHp = substr(trim($no->noHp), 0, 3).' '.substr(trim($no->noHp), 3, 3).'-'.substr(trim($no->noHp), 6, 4).'-'.substr(trim($no->noHp), 10, 4);
                        }
                        else if(strlen($no->noHp)>14) {
                            $noHp = substr(trim($no->noHp), 0, 3).' '.substr(trim($no->noHp), 3, 3).'-'.substr(trim($no->noHp), 6, 4).'-'.substr(trim($no->noHp), 10, 4).'-'.substr(trim($no->noHp), 14, 4);
                        }
                    }

                    $this->db->select('*');
                    $this->db->where(array("wa_no='" .$noHp. "'"));
                    $check = $this->db->get("inbox");

                    if($check->num_rows() > 0) {
                        echo "Data di inbox cocok";
                        $jadwal = $this->db->query("SELECT * FROM ms_mode WHERE npsn='" .$npsn."'");

                        foreach ($jadwal->result() as $row)
                        $explode = explode(" ", $waktu[$a]);
                        $tanggal = $explode[0];
                        $jam = $explode[1];
                        $mode = "";
                        if($jam >= $row->mulaiDatang && $jam <= $row->selesaiDatang) {
                            $pesan = $row->formatDatang;
                            $dataSiswa = $this->db->query("SELECT * FROM ms_siswa where idSiswa = $idSiswa[$a]");
                            foreach($dataSiswa->result() as $siswa)
                            $pesan = str_replace('{{nama}}', $siswa->namaSiswa, $pesan);
                            $pesan = str_replace('{{tanggal}}', $tanggal, $pesan);
                            $pesan = str_replace('{{jam}}', $jam, $pesan);

                            $this->db->query("INSERT INTO outbox (wa_mode, wa_no, wa_text) VALUES (0, '".$siswa->noHp."', '".$pesan."')");
                        } else if ($jam >= $row->mulaiPulang && $jam <= $row->selesaiPulang) {
                            $pesan = $row->formatPulang;
                            $dataSiswa = $this->db->query("SELECT * FROM ms_siswa where idSiswa = $idSiswa[$a]");
                            foreach($dataSiswa->result() as $siswa)
                            $pesan = str_replace('{{nama}}', $siswa->namaSiswa, $pesan);
                            $pesan = str_replace('{{tanggal}}', $tanggal, $pesan);
                            $pesan = str_replace('{{jam}}', $jam, $pesan);

                            $this->db->query("INSERT INTO outbox (wa_mode, wa_no, wa_text) VALUES (0, '".$siswa->noHp."', '".$pesan."')");
                        }


                    }else {
                       echo "Data di inbox tidak cocok";
                    }

                    $this->response("Sukses", REST_Controller::HTTP_OK);
                } else {
                    break;
                }
            }
        }
    }
}

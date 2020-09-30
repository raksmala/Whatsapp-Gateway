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
class Get_last_time extends REST_Controller {

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

        $id = $this->get('npsn');

        // If the id parameter doesn't exist return all the users

        if ($id === NULL) {
            $this->response([
                'status' => FALSE,
                'message' => 'No users were found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }

        // Find and return a single record for a particular user.
        else {

            // Validate the id.
            if ($id <= 0) {
                // Invalid id, set the response and exit.
                $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
            }

            // Get the user from the array, using the id as key for retrieval.
            // Usually a model is to be used for this.

            $this->db->select('waktu');
            $this->db->join("ms_siswa", "ms_hadir.idSiswa = ms_siswa.idSiswa");
            $this->db->join("ms_kelas", "ms_siswa.idKelas = ms_kelas.idKelas");
            $this->db->join("ms_sekolah", "ms_kelas.npsn = ms_sekolah.npsn");
            $this->db->where(array("ms_sekolah.npsn"=>$id, "status"=>'aktif'));
            $this->db->order_by('waktu', 'desc');
            $this->db->limit(1);
            $users = $this->db->get("ms_hadir");

            $waktu = "";
            foreach($users->result() as $row) {
                echo $row->waktu;
            }

            $this->response(NULL, REST_Controller::HTTP_OK);
        }
    }
}

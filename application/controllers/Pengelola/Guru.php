<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {
	public function index() {
        $this->mMaster->LoadPage('guru');
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orangtua extends CI_Controller {
	public function index() {
		$this->mMaster->LoadPage('orangtua');
	}
}

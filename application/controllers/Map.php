<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Map extends MY_Controller {

	public function index() {
		$this->load->view('template', $this->data);
	}

}


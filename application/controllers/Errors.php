<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {

	public function index()
	{
		$data['title'] = '404 Not Found';
		$this->load->view('error', $data);
	}
}
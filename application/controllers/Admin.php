<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends RW_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->is_level('admin');
	}

	public function index()
	{
		$data = [
			'title' => 'Dashboard Administrator',
			'hal' => 'admin/index'
		];
		$this->load->view('templates/admin', $data, FALSE);
	}

}

/* End of file Administrator.php */
/* Location: ./application/controllers/Administrator.php */
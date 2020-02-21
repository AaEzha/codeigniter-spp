<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level extends RW_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->is_level('admin');
		$this->load->model('Level_model','mlevel');
	}

	public function index()
	{
		$data = [
			'title' => 'Data Level User',
			'hal' => 'admin/level',
			'data' => $this->mlevel->data()
		];
		$this->load->view('templates/admin', $data, FALSE);
	}

}

/* End of file Level.php */
/* Location: ./application/controllers/Level.php */
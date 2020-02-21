<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelajar extends RW_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->is_level('pelajar');
	}

	public function index()
	{
		
	}

}

/* End of file Pelajar.php */
/* Location: ./application/controllers/Pelajar.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RW_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(@!$this->session->id) redirect('auth','refresh');
	}

	public function is_level($level)
	{
		if($this->session->level != $level) redirect('auth','refresh');
	}

}

/* End of file RZ_Controller.php */
/* Location: ./application/core/RZ_Controller.php */
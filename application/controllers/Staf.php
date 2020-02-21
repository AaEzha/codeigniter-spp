<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staf extends RW_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->is_level('staf');
	}

	public function index()
	{
		$this->load->model('Dashboard_model','mdash');
		$data = [
			'title' => 'Dashboard Staf Tata Usaha',
			'hal' => 'staf/index',
			'jumadmin' => $this->mdash->jumlah_admin(),
			'jumstaf' => $this->mdash->jumlah_staf(),
			'jumguru' => $this->mdash->jumlah_guru(),
			'jumsiswa' => $this->mdash->jumlah_siswa()
		];
		$this->load->view('templates/staf', $data, FALSE);
	}

}

/* End of file Staf.php */
/* Location: ./application/controllers/Staf.php */
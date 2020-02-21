<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends RW_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->is_level('siswa');
	}

	public function index()
	{
		redirect('siswa/bayar','refresh');
	}

	public function bayar()
	{
		$this->load->model('Keuangan_model','mkeu');
		$data = [
			'title' => 'Histori Pembayaran SPP',
			'hal' => 'sis/bayaran',
			'data' => $this->mkeu->bayaran_data($this->session->nis)
		];
		$this->load->view('templates/siswa', $data, FALSE);
	}

}

/* End of file Siswa.php */
/* Location: ./application/controllers/Siswa.php */
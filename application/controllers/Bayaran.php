<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bayaran extends RW_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->is_level('staf');
		$this->load->model('Keuangan_model','mkeu');
	}

	public function index()
	{
		$data = [
			'title' => 'Laporan Pembayaran',
			'hal' => 'bayaran/index'
		];
		$this->load->view('templates/staf', $data, FALSE);
	}

	public function individu()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nis', 'NIS', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Data Bayaran Individu - Cari Siswa',
				'hal' => 'bayaran/cari'
			];
			$this->load->view('templates/staf', $data, FALSE);
		} else {
			$this->load->model('Siswa_model','msiswa');
			$post = $this->input->post();
			$nis = htmlspecialchars(trim($post['nis']));

			$cek = $this->msiswa->cari($nis);
			if ($cek) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pencarian berhasil mendapatkan hasil!</div>');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pencarian gagal mendapatkan hasil!</div>');
			}
			
			$data = [
				'title' => 'Data Bayaran Individu - Hasil Pencarian',
				'hal' => 'bayaran/daftar',
				'siswa' => $this->msiswa->cari($nis)
			];
			$this->load->view('templates/staf', $data, FALSE);
		}
	}

	public function detail($nis)
	{
		$this->load->model('Siswa_model','msiswa');
		$nis = htmlspecialchars(trim($nis));

		$cek = $this->msiswa->cari($nis);
		if ($cek) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pencarian berhasil mendapatkan hasil!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pencarian gagal mendapatkan hasil!</div>');
		}
		
		$data = [
			'title' => 'Data Bayaran Individu',
			'hal' => 'bayaran/detail',
			'siswa' => $this->msiswa->tampilByNis($nis),
			'data' => $this->mkeu->bayaran_data($nis)
		];
		$this->load->view('templates/staf', $data, FALSE);
	}

	public function laporan()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('dari', 'Dari', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			redirect('bayaran','refresh');
		} else {
			$post = $this->input->post();
			$dari = htmlspecialchars(trim($post['dari']));
			$ke = htmlspecialchars(trim($post['ke']));
			if($post['ke']==''){
				$data = [
					'title' => 'Laporan Bayaran SPP',
					'hal' => 'bayaran/laporan',
					'data' => $this->mkeu->data_bayaran($dari),
					'dari' => $dari,
					'ke' => ''
				];
			}else{
				$data = [
					'title' => 'Laporan Bayaran SPP',
					'hal' => 'bayaran/laporan',
					'data' => $this->mkeu->data_bayaran($dari, $ke),
					'dari' => $dari,
					'ke' => $ke
				];
			}
			$this->load->view('templates/staf', $data, FALSE);
		}
	}

	public function hapus($id='')
	{
		if($id=='') redirect('bayaran','refresh');
		$cek = $this->mkeu->hapus_bayaran($id);
		if ($cek) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal dihapus!</div>');
		}
		redirect('bayaran','refresh');
	}

}

/* End of file Bayaran.php */
/* Location: ./application/controllers/Bayaran.php */
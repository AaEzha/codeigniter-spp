<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tapel extends RW_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->is_level('admin');
		$this->load->model('Tapel_model','mtapel');
	}

	public function index()
	{
		$data = [
			'title' => 'Data Tahun Pelajaran',
			'hal' => 'tapel/index',
			'data' => $this->mtapel->data()
		];
		$this->load->view('templates/admin', $data, FALSE);
	}

	public function tambah()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required|min_length[4]|max_length[4]|is_unique[tapel.tahun]');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Tambah Data - Tahun Pelajaran',
				'hal' => 'tapel/tambah'
			];
			$this->load->view('templates/admin', $data, FALSE);
		} else {
			$cek = $this->mtapel->tambah();
			if ($cek) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
				redirect('tapel','refresh');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
				redirect('tapel','refresh');
			}
		}
	}

	public function aktifkan($id)
	{
		$cek = $this->mtapel->aktifkan($id);
		if ($cek) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
			redirect('tapel','refresh');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
			redirect('tapel','refresh');
		}
	}

	public function hapus($id)
	{
		$cek = $this->mtapel->hapus($id);
		if ($cek) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
			redirect('tapel','refresh');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal dihapus!</div>');
			redirect('tapel','refresh');
		}
	}

	public function ubah($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required|min_length[4]|max_length[4]');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Ubah Data - Tahun Pelajaran',
				'hal' => 'tapel/ubah',
				'data' => $this->mtapel->tampil($id)
			];
			$this->load->view('templates/admin', $data, FALSE);
		} else {
			$cek = $this->mtapel->ubah($id);
			if ($cek) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
				redirect('tapel','refresh');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
				redirect('tapel','refresh');
			}
		}
	}

}

/* End of file Tapel.php */
/* Location: ./application/controllers/Tapel.php */
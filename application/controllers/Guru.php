<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends RW_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->is_level('staf');
		$this->load->model('User_model','muser');
	}

	public function index()
	{
		$data = [
			'title' => 'Data Guru',
			'hal' => 'guru/index',
			'data' => $this->muser->dataguru()
		];
		$this->load->view('templates/staf', $data, FALSE);
	}

	public function tambah()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[2]|max_length[16]|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[128]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[128]');
		$this->form_validation->set_rules('nohp', 'No.Handphone', 'trim|required|max_length[128]');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Tambah Data Guru',
				'hal' => 'guru/tambah'
			];
			$this->load->view('templates/staf', $data, FALSE);
		} else {
			$cek = $this->muser->tambahguru();
			if ($cek) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
			}
			redirect('guru','refresh');
		}
	}

	public function hapus($id)
	{
		$cek = $this->muser->hapus($id);
		if ($cek) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal dihapus!</div>');
		}
		redirect('guru','refresh');
	}

	public function ubah($id)
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[16]');
		// $this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[128]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[128]');
		$this->form_validation->set_rules('nohp', 'No.Handphone', 'trim|required|max_length[128]');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Ubah Data Guru',
				'hal' => 'guru/ubah',
				'data' => $this->muser->tampil($id)
			];
			$this->load->view('templates/staf', $data, FALSE);
		} else {
			$cek = $this->muser->ubahguru($id);
			if ($cek) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
			}
			redirect('guru','refresh');
		}
	}

}

/* End of file Guru.php */
/* Location: ./application/controllers/Guru.php */
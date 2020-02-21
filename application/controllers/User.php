<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends RW_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->is_level('admin');
		$this->load->model('User_model','muser');
	}

	public function index()
	{
		$data = [
			'title' => 'Data User',
			'hal' => 'user/index',
			'data' => $this->muser->data()
		];
		$this->load->view('templates/admin', $data, FALSE);
	}

	public function tambah()
	{
		$this->load->library('form_validation');
		$this->load->model('Level_model','mlevel');

		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[16]|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[128]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[128]');
		$this->form_validation->set_rules('nohp', 'No.Handphone', 'trim|required|max_length[128]');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Tambah Data User',
				'hal' => 'user/tambah',
				'level' => $this->mlevel->data()
			];
			$this->load->view('templates/admin', $data, FALSE);
		} else {
			$cek = $this->muser->tambah();
			if ($cek) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
				redirect('user','refresh');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
				redirect('user','refresh');
			}
		}
	}

	public function hapus($id)
	{
		$cek = $this->muser->hapus($id);
		if ($cek) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
			redirect('user','refresh');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal dihapus!</div>');
			redirect('user','refresh');
		}
	}

	public function ubah($id)
	{
		$this->load->library('form_validation');
		$this->load->model('Level_model','mlevel');
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[16]');
		// $this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[128]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[128]');
		$this->form_validation->set_rules('nohp', 'No.Handphone', 'trim|required|max_length[128]');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Ubah Data User',
				'hal' => 'user/ubah',
				'data' => $this->muser->tampil($id),
				'level' => $this->mlevel->data()
			];
			$this->load->view('templates/admin', $data, FALSE);
		} else {
			$cek = $this->muser->ubah($id);
			if ($cek) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
				redirect('user','refresh');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
				redirect('user','refresh');
			}
		}
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
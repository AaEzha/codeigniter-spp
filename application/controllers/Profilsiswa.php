<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profilsiswa extends RW_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->is_level('siswa');
	}

	public function index()
	{
		$this->load->model('User_model','muser');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[128]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[128]|valid_email');
		$this->form_validation->set_rules('nohp', 'No.Handphone', 'trim|required|max_length[16]');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Ubah Profil',
				'hal' => 'profil/index',
				'data' => $this->muser->tampil($this->session->id)
			];

			$this->load->view('templates/'.$this->session->level, $data, FALSE);
		} else {
			$cek = $this->mprofil->ubah();
			if ($cek) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
				redirect('profil','refresh');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
				redirect('profil','refresh');
			}
		}
	}

	public function password()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('passbaru', 'Password Baru', 'trim|required');
		$this->form_validation->set_rules('passkonf', 'Password Konfirmasi', 'trim|required|matches[passbaru]');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Ubah Password',
				'hal' => 'profil/password'
			];

			$this->load->view('templates/'.$this->session->level, $data, FALSE);
		} else {
			$cek = $this->mprofil->password();
			if ($cek) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
				redirect('profil/password','refresh');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
				redirect('profil/password','refresh');
			}
		}
	}

}

/* End of file Profilsiswa.php */
/* Location: ./application/controllers/Profilsiswa.php */
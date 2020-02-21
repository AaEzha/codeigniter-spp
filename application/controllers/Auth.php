<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$this->load->model('Auth_model','mauth');
		$this->load->model('Tapel_model','mtapel');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Login Sistem'
			];
			$this->load->view('auth/index', $data);
		} else {
			$tapel = $this->mtapel->tapel();
			$cek = $this->mauth->login();
			if ($cek) {
				$data = [
					'id' => $cek->id,
					'username' => $cek->username,
					'nama' => $cek->nama,
					'level' => $cek->level,
					'idtapel' => $tapel->id
				];
				$this->session->set_userdata($data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat datang kembali!</div>');
				redirect($this->session->level,'refresh');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal masuk sistem!</div>');
				redirect('auth','refresh');
			}
		}
	}

	public function siswa()
	{
		$this->load->model('Auth_model','mauth');
		$this->load->model('Tapel_model','mtapel');
		$this->load->model('Siswa_model','msiswa');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Login Sistem Siswa'
			];
			$this->load->view('auth/siswa', $data);
		} else {
			$tapel = $this->mtapel->tapel();
			$cek = $this->mauth->login_siswa();
			if ($cek) {
				$data = [
					'id' => $cek->id,
					'nis' => $cek->nis,
					'nama' => $cek->nama,
					'level' => 'siswa',
					'idtapel' => $tapel->id
				];
				$this->session->set_userdata($data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat datang kembali!</div>');
				redirect('siswa/bayar','refresh');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal masuk sistem!</div>');
				redirect('auth/siswa','refresh');
			}
		}
	}

	public function keluar()
	{
		unset($_SESSION['id']);
		unset($_SESSION['idtapel']);
		unset($_SESSION['username']);
		unset($_SESSION['nama']);
		unset($_SESSION['level']);
		session_destroy();
		redirect('auth','refresh');
	}

	public function keluar_siswa()
	{
		unset($_SESSION['id']);
		unset($_SESSION['idtapel']);
		unset($_SESSION['nis']);
		unset($_SESSION['nama']);
		unset($_SESSION['level']);
		session_destroy();
		redirect('auth','refresh');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kesiswaan extends RW_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->is_level('staf');
		$this->load->model('Siswa_model','msiswa');
	}

	public function index()
	{
		$data = [
			'title' => 'Data Siswa',
			'hal' => 'siswa/index',
			'data' => $this->msiswa->data()
		];
		$this->load->view('templates/staf', $data, FALSE);
	}

	public function tambah()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[128]');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[128]|valid_email');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|max_length[256]');
		$this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'trim|required|max_length[128]');
		$this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'trim|required|max_length[128]');
		$this->form_validation->set_rules('nohp_ibu', 'No.HP Ibu', 'trim|numeric');
		$this->form_validation->set_rules('nohp_ayah', 'No.HP Ayah', 'trim|numeric');
		$this->form_validation->set_rules('nisn', 'NISN', 'trim|numeric');
		$this->form_validation->set_rules('email_ortu', 'Email Orang Tua', 'trim|required|max_length[128]|valid_email');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Tambah Data Siswa',
				'hal' => 'siswa/tambah'
			];
			$this->load->view('templates/staf', $data, FALSE);
		} else {
			$cek = $this->msiswa->tambah();
			if ($cek) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
			}
			redirect('kesiswaan','refresh');
		}
	}

	public function ubah($id)
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[128]');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[128]|valid_email');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|max_length[256]');
		$this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'trim|required|max_length[128]');
		$this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'trim|required|max_length[128]');
		$this->form_validation->set_rules('nohp_ibu', 'No.HP Ibu', 'trim|numeric');
		$this->form_validation->set_rules('nohp_ayah', 'No.HP Ayah', 'trim|numeric');
		$this->form_validation->set_rules('nisn', 'NISN', 'trim|numeric');
		$this->form_validation->set_rules('email_ortu', 'Email Orang Tua', 'trim|required|max_length[128]|valid_email');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Ubah Data Siswa',
				'hal' => 'siswa/ubah',
				'data' => $this->msiswa->tampil($id)
			];
			$this->load->view('templates/staf', $data, FALSE);
		} else {
			$cek = $this->msiswa->ubah();
			if ($cek) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
			}
			redirect('kesiswaan','refresh');
		}
	}

	public function hapus($id)
	{
		$cek = $this->msiswa->hapus($id);
		if ($cek) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal dihapus!</div>');
		}
		redirect('kesiswaan','refresh');
	}

}

/* End of file Siswa.php */
/* Location: ./application/controllers/Kesiswaan.php */
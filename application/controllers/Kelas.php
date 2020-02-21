<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends RW_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->is_level('staf');
		$this->load->model('Kelas_model','mkelas');
	}

	public function index()
	{
		$this->load->model('Tapel_model','mtapel');
		$data = [
			'title' => 'Data Kelas',
			'hal' => 'kelas/index',
			'tapel' => $this->mtapel->tapel(),
			'kelas' => $this->mkelas->data()
		];
		$this->load->view('templates/staf', $data, FALSE);
	}

	public function tambah($idtapel)
	{
		$this->load->library('form_validation');
		$this->load->model('Tapel_model','mtapel');
		$this->load->model('User_model','muser');

		$this->form_validation->set_rules('idtapel', 'ID Tapel', 'trim|required');
		$this->form_validation->set_rules('kelas', 'Kelas', 'trim|required');
		$this->form_validation->set_rules('idguru', 'Wali Kelas', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Tambah Data Kelas',
				'hal' => 'kelas/tambah',
				'idtapel' => $idtapel,
				'guru' => $this->muser->dataguru(),
				'js' => 'kelas/js'
			];
			$this->load->view('templates/staf', $data, FALSE);
		} else {
			// cek valid tahun pelajaran
			$__idtapel = helper_tapel();
			if($idtapel!=$__idtapel)
			{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">ID Tahun Pelajaran tidak valid!</div>');
				redirect('kelas','refresh');
			}

			$cek = $this->mkelas->tambah();
			if ($cek) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Terjadi kesalahan input atau duplikat data!</div>');
			}
			redirect('kelas','refresh');
		}
	}

	public function hapus($idkelas)
	{
		$cek = $this->mkelas->hapus($idkelas);
		if ($cek) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal dihapus!</div>');
		}
		redirect('kelas','refresh');
	}

	public function detail($idkelas)
	{
		$this->load->library('form_validation');

		$this->load->model('Siswa_model','msiswa');

		$this->form_validation->set_rules('idsiswa', 'ID Siswa', 'trim|required');
		$this->form_validation->set_rules('idkelas', 'ID Kelas', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Detail Kelas',
				'hal' => 'kelas/detail',
				'idkelas' => htmlspecialchars(trim($idkelas)),
				'data' => $this->mkelas->detail($idkelas),
				'siswa' => $this->mkelas->rombel($idkelas),
				'calon' => $this->msiswa->data(),
				'js' => 'kelas/js'
			];
			$this->load->view('templates/staf', $data);
		} else {
			$cek = $this->mkelas->tambahsiswa();
			if ($cek) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Terjadi kesalahan input atau duplikat data!</div>');
			}
			redirect('kelas/detail/'.$idkelas,'refresh');
		}
	}

	public function hps($idrombel,$idkelas)
	{
		$cek = $this->mkelas->hps($idrombel);
		if ($cek) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal dihapus!</div>');
		}
		redirect('kelas/detail/'.$idkelas,'refresh');
	}

}

/* End of file Kelas.php */
/* Location: ./application/controllers/Kelas.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan extends RW_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->is_level('staf');
		$this->load->model('Keuangan_model','mkeu');
	}

	public function index()
	{
		$data = [
			'title' => 'Pengaturan Keuangan',
			'hal' => 'keuangan/index',
			'data' => $this->mkeu->data()
		];
		$this->load->view('templates/staf', $data, FALSE);
	}

	public function hapus($id='')
	{
		if($id){
			$cek = $this->mkeu->cekBayaran($id);
			if ($cek) {
				$hapus = $this->mkeu->hapus($id);
				if ($hapus) {
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal dihapus!</div>');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Error: Invalid data bayaran!</div>');
			}			
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Error: Invalid data input!</div>');
		}
		redirect('keuangan','refresh');
	}

	public function tambah()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama', 'Bayaran', 'trim|required|max_length[64]');
		$this->form_validation->set_rules('lokera', 'Pos 1', 'trim|required|numeric');
		$this->form_validation->set_rules('lokerb', 'Pos 2', 'trim|required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Tambah Data Bayaran',
				'hal' => 'keuangan/tambah'
			];
			$this->load->view('templates/staf', $data, FALSE);
		} else {
			$cek = $this->mkeu->tambah();
			if ($cek) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');	
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
			}
			redirect('keuangan','refresh');
		}
	}

	public function input()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nis', 'NIS', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Input Bayaran - Cari Siswa',
				'hal' => 'keuangan/cari'
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
				'title' => 'Input Bayaran - Hasil Pencarian Siswa',
				'hal' => 'keuangan/daftar',
				'siswa' => $this->msiswa->cari($nis)
			];
			$this->load->view('templates/staf', $data, FALSE);
		}
	}

	public function bayaran($nis)
	{
		$this->load->model('Siswa_model','msiswa');
		$cek = $this->msiswa->tampilByNis($nis);
		if ($cek) {
			$data = [
				'title' => 'Input Bayaran',
				'hal' => 'keuangan/bayar',
				'siswa' => $this->msiswa->tampilByNis($nis),
				'data' => $this->mkeu->tagihan($nis)
			];
			$this->load->view('templates/staf', $data, FALSE);
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Error: Data siswa tidak ditemukan!</div>');
			redirect('keuangan/input','refresh');
		}
		
	}

	public function checkout()
	{
		$this->load->library('form_validation');
		$this->load->model('Siswa_model','msiswa');

		$this->form_validation->set_rules('nis', 'NIS', 'trim|required');
		$this->form_validation->set_rules('id', 'ID Siswa', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Error: Lakukan transaksi terlebih dahulu!</div>');
			redirect('keuangan/input','refresh');
		} else {
			$cek = $this->mkeu->keranjang();
			if ($cek) {
				$data = [
					'title' => 'Review Transaksi',
					'hal' => 'keuangan/keranjang',
					'siswa' => $this->msiswa->tampilByNis($this->input->post('nis')),
					'data' => $this->mkeu->keranjang_data($this->input->post('nis'))
				];
				$this->load->view('templates/staf', $data, FALSE);
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
			}
			
		}
	}

	public function kembali()
	{
		$this->load->model('Siswa_model','msiswa');
		$this->mkeu->bayarin($this->input->post('nis'));

		$databayaran = $this->mkeu->keranjang_data($this->input->post('nis'));
		$datasiswa = $this->msiswa->tampilByNis($this->input->post('nis'));

		$email_akun = ""; // Email account @gmail.com
		$email_pass = ""; // Its password

		$config = [
		    'mailtype'  => 'html',
		    'charset'   => 'utf-8',
		    'protocol'  => 'smtp',
		    'smtp_host' => 'smtp.gmail.com',
		    'smtp_user' => $email_akun,
		    'smtp_pass'   => $email_pass,
		    'smtp_crypto' => 'ssl',
		    'smtp_port'   => 465,
		    'crlf'    => "\r\n",
		    'newline' => "\r\n"
		];

		$this->load->library('email', $config);

		$this->email->from($email_akun, 'Keuangan Ummul Rhodiyah');
		$this->email->to($datasiswa->email_ortu);

		$this->email->subject('Notifikasi Pembayaran SPP');
		$isi = "<p><em>Assalamualaikum warahmatullahi wabarakatuh</em></p>";
		$isi .= "Berikut adalah detail bayaran SPP atas nama:";
		$isi .= "<ul>";
		$isi .= "<li>Nama: ".$datasiswa->nama."</li>";
		$isi .= "</ul>";
		$isi .= "<ol>";
		foreach($databayaran as $databayaran):
		$isi .= "<li>".$databayaran->nama." : Rp.".number_format($databayaran->total,'0',',','.')."</li>";
		endforeach;
		$isi .= "</ol>";
		$isi .= "<em>Jika Antum tidak merasa melakukan pembayaran atau ada ketidaksesuaian, harap segera melaporkan hal ini ke kantor keuangan Ummul Rhodiyah.</em>";
		$isi .= "<p>Wassalamualaikum warahmatullahi wabarakatuh</p>";
		$this->email->message($isi);

		// $this->email->send();
		if ( ! $this->email->send())
		{
		    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email: Gagal terkirim. ['.$datasiswa->email_ortu.']</div>');
		}
		else
		{
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Email: Sukses terkirim. ['.$datasiswa->email_ortu.']</div>');
		}

		$data = [
			'title' => 'Transaksi Selesai',
			'hal' => 'keuangan/kembali',
			// 'data' => $this->mkeu->keranjang_data($this->input->post('nis'))
			'nis' => htmlspecialchars(trim($this->input->post('nis'))),
			'total' => htmlspecialchars(trim($this->input->post('total'))),
			'bayar' => htmlspecialchars(trim($this->input->post('bayar')))
		];
		$this->load->view('templates/staf', $data, FALSE);
	}

	public function cetak($nis)
	{
		# code...
	}

}

/* End of file Keuangan.php */
/* Location: ./application/controllers/Keuangan.php */

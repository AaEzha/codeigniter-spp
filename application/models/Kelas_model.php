<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_model extends CI_Model {

	public function data()
	{
		$this->db->select('k.id, k.kelas, t.tahun, u.nama');
		$this->db->join('user u', 'u.id = k.idguru');
		$this->db->join('tapel t', 't.id = k.idtapel');
		$this->db->where('t.aktif', '1');
		return $this->db->get('kelas k')->result();
	}

	public function detail($idkelas)
	{
		$this->db->select('k.id, k.kelas, t.tahun, u.nama, k.idtapel, k.idguru');
		$this->db->join('user u', 'u.id = k.idguru');
		$this->db->join('tapel t', 't.id = k.idtapel');
		$this->db->where('t.aktif', '1');
		$this->db->where('k.id', $idkelas);
		return $this->db->get('kelas k')->row();
	}

	public function tambah()
	{
		$post = $this->input->post();

		// cek supaya tidak dobel wali kelasnya pada tapel yang sama
		// tanpa melihat kelasnya sama atau tidak
		// karena biasanya 1 wali kelas untuk 1 kelas pada 1 tapel
		$this->db->where('idtapel', $post['idtapel']);
		$this->db->where('idguru', $post['idguru']);
		$cek = $this->db->get('kelas')->num_rows();
		if ($cek >= 1 ) {
			return false;
		} else {
			$data = [
				'idtapel' => htmlspecialchars(trim($post['idtapel'])),
				'kelas' => htmlspecialchars(trim($post['kelas'])),
				'idguru' => htmlspecialchars(trim($post['idguru']))
			];
			return $this->db->insert('kelas', $data);
		}
	}

	public function hapus($idkelas)
	{
		$this->db->delete('kelas', ['id'=>$idkelas]);
		return $this->db->delete('rombel', ['idkelas'=>$idkelas]);
	}

	public function rombel($idkelas)
	{
		$this->db->select('s.nama, s.nis, s.jk, r.id');
		$this->db->from('siswa s');
		$this->db->join('rombel r', 'r.idsiswa = s.id');
		$this->db->join('kelas k', 'k.id = r.idkelas');
		$this->db->where('r.idkelas', $idkelas);
		return $this->db->get()->result();
	}

	public function tambahsiswa()
	{
		$post = $this->input->post();
		$idkelas = htmlspecialchars(trim($post['idkelas']));
		$idsiswa = htmlspecialchars(trim($post['idsiswa']));
		$data = [
			'idkelas' => $idkelas,
			'idsiswa' => $idsiswa
		];
		// ambil tapel
		$this->db->where('aktif', '1');
		$tapel = $this->db->get('tapel')->row();
		$idtapel = $tapel->id;

		// cek dulu, sudah ada atau tidak
		$this->db->join('kelas k', 'k.id = r.idkelas');
		$this->db->where('r.idsiswa', $idsiswa);
		$this->db->where('k.idtapel', $idtapel);
		$cek = $this->db->get('rombel r')->num_rows();
		if($cek>=1){
			return false;
		}else{
			return $this->db->insert('rombel', $data);
		}
	}

	public function hps($idrombel)
	{
		return $this->db->delete('rombel', ['id'=>$idrombel]);
	}

	public function jumlahsiswa($idkelas)
	{
		$this->db->where('idkelas', $idkelas);
		return $this->db->get('rombel')->num_rows();
	}

}

/* End of file Kelas_model.php */
/* Location: ./application/models/Kelas_model.php */
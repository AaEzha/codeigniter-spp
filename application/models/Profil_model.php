<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_model extends CI_Model {

	public function ubah()
	{
		$data = $this->input->post();
		$id = $this->session->id;

		$obj = [
			'nama' => $data['nama'],
			'email' => $data['email'],
			'nohp' => $data['nohp']
		];

		return $this->db->update('user', $obj, ['id'=>$id]);
	}

	public function ubahsiswa()
	{
		$data = $this->input->post();
		$id = $this->session->id;

		$obj = [
			'nama' => $data['nama'],
			'email' => $data['email'],
			'nohp' => $data['nohp'],
			'nisn' => $data['nisn'],
			'alamat' => $data['alamat'],
			'nama_ayah' => $data['nama_ayah'],
			'nohp_ayah' => $data['nohp_ayah'],
			'nama_ibu' => $data['nama_ibu'],
			'nohp_ibu' => $data['nohp_ibu'],
			'email_ortu' => $data['email_ortu']
		];

		return $this->db->update('siswa', $obj, ['id'=>$id]);
	}

	public function password()
	{
		$data = $this->input->post();
		$id = $this->session->id;

		$obj = [
			'password' => htmlspecialchars(trim(md5($data['passbaru'])))
		];

		return $this->db->update('user', $obj, ['id'=>$id]);
	}

	public function passwordsiswa()
	{
		$data = $this->input->post();
		$id = $this->session->id;

		$obj = [
			'password' => htmlspecialchars(trim(md5($data['passbaru'])))
		];

		return $this->db->update('siswa', $obj, ['id'=>$id]);
	}

}

/* End of file Profil_model.php */
/* Location: ./application/models/Profil_model.php */
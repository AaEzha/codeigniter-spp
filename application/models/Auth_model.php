<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function login()
	{
		$data = $this->input->post();
		$this->db->select('u.id, u.nama, u.username, l.level');
		$this->db->join('level l', 'l.id = u.idlevel');
		$this->db->where('u.username', $data['username']);
		$this->db->where('u.password', md5($data['password']));
		return $this->db->get('user u')->row();
	}

	public function login_siswa()
	{
		$data = $this->input->post();
		$this->db->select('u.id, u.nama, u.nis');
		$this->db->where('u.nis', $data['username']);
		$this->db->where('u.password', md5($data['password']));
		$this->db->where('u.hapus', '0');
		return $this->db->get('siswa u')->row();
	}

}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */
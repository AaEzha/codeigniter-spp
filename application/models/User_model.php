<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function data()
	{
		$this->db->select('u.id, u.username, u.nama, l.level');
		$this->db->join('level l', 'l.id = u.idlevel');
		$this->db->where('u.hapus', '0');
		$this->db->where('l.id !=', '3');
		return $this->db->get('user u')->result();
	}

	public function dataguru()
	{
		$this->db->select('u.id, u.username, u.nama, l.level');
		$this->db->join('level l', 'l.id = u.idlevel');
		$this->db->where('u.hapus', '0');
		$this->db->where('l.id', '3');
		return $this->db->get('user u')->result();
	}

	public function hapus($id)
	{
		return $this->db->update('user', ['hapus'=>'1'], ['id'=>$id]);
	}

	public function tambah()
	{
		$data = $this->input->post();

		$obj = [
			'idlevel' => $data['idlevel'],
			'username' => $data['username'],
			'password' => md5($data['password']),
			'nama' => $data['nama'],
			'email' => $data['email'],
			'nohp' => $data['nohp']
		];

		return $this->db->insert('user', $obj);
	}

	public function tambahguru()
	{
		$data = $this->input->post();

		$obj = [
			'idlevel' => '3',
			'username' => $data['username'],
			'password' => md5($data['password']),
			'nama' => $data['nama'],
			'email' => $data['email'],
			'nohp' => $data['nohp']
		];

		return $this->db->insert('user', $obj);
	}

	public function tampil($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('user')->row();
	}

	public function ubah()
	{
		$data = $this->input->post();
		$id = htmlspecialchars(trim($data['id']));

		if($data['password']!=""){
			$password = md5(htmlspecialchars(trim($data['password'])));
			$this->db->query("update user set password='$password' where id='$id'");
		}

		$obj = [
			'idlevel' => $data['idlevel'],
			'username' => $data['username'],
			'nama' => $data['nama'],
			'email' => $data['email'],
			'nohp' => $data['nohp']
		];

		return $this->db->update('user', $obj, ['id'=>$id]);
	}

	public function ubahguru()
	{
		$data = $this->input->post();
		$id = htmlspecialchars(trim($data['id']));

		if($data['password']!=""){
			$password = md5(htmlspecialchars(trim($data['password'])));
			$this->db->query("update user set password='$password' where id='$id'");
		}

		$obj = [
			'username' => $data['username'],
			'nama' => $data['nama'],
			'email' => $data['email'],
			'nohp' => $data['nohp']
		];

		return $this->db->update('user', $obj, ['id'=>$id]);
	}

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
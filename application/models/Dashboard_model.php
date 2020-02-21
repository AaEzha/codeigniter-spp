<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	public function jumlah_admin()
	{
		$this->db->where('idlevel', '1');
		return $this->db->get('user')->num_rows();
	}

	public function jumlah_staf()
	{
		$this->db->where('idlevel', '2');
		return $this->db->get('user')->num_rows();
	}

	public function jumlah_guru()
	{
		$this->db->where('idlevel', '3');
		return $this->db->get('user')->num_rows();
	}

	public function jumlah_siswa()
	{
		$this->db->where('hapus', '0');
		return $this->db->get('siswa')->num_rows();
	}

}

/* End of file Dashboard_model.php */
/* Location: ./application/models/Dashboard_model.php */
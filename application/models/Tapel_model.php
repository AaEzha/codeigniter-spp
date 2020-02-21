<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tapel_model extends CI_Model {

	public function data()
	{
		$this->db->order_by('aktif', 'desc');
		$this->db->order_by('tahun', 'asc');
		$this->db->where('hapus', '0');
		return $this->db->get('tapel')->result();
	}

	public function tampil($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('tapel')->row();
	}

	public function tambah()
	{
		$data = $this->input->post();

		return $this->db->insert('tapel', ['tahun'=>$data['tahun']]);
	}

	public function aktifkan($id)
	{
		$this->db->query("update tapel set aktif='0'");

		return $this->db->update('tapel', ['aktif'=>'1'], ['id'=>$id]);
	}

	public function hapus($id)
	{
		return $this->db->update('tapel', ['hapus'=>'1'], ['id'=>$id]);
	}

	public function ubah($id)
	{
		$data = $this->input->post();
		return $this->db->update('tapel', ['tahun'=>$data['tahun']], ['id'=>$id]);
	}

	public function tapel()
	{
		$this->db->where('aktif', '1');
		return $this->db->get('tapel')->row();
	}

	public function cektapel($id)
	{
		$tapel = $this->tapel();
		if($id == $tapel->id)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

}

/* End of file Tapel_model.php */
/* Location: ./application/models/Tapel_model.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model {

	public function data($hapus='0')
	{
		$this->db->where('hapus', $hapus);
		$this->db->order_by('jk', 'asc');
		$this->db->order_by('nama', 'asc');
		return $this->db->get('siswa')->result();
	}

	public function databelumdapatkelas()
	{
		$query = "select s.id, s.nama, s.nis 
					from siswa s
					where s.id not in(
						select r.idsiswa from rombel r
						join kelas k on k.id=r.idsiswa
						join tapel t on t.id=k.idtapel
						where t.id
					)
					";
		return $this->db->query($query)->result();
	}

	public function nisbaru()
	{
		// ambil tapel aktif
		$t = $this->db->query("select tahun from tapel where aktif='1'");
		$dt = $t->row();
		if(isset($dt))
		{
			$tapel = $dt->tahun;
		}

		// ambil jumlah siswa berdasarkan id(+1)
		$q = $this->db->query("select id from siswa order by id desc");
		$dq = $q->row();
		$jum = $q->num_rows();

		if($jum==0)
		{
			$nis = $tapel . "0001";
		}
		else
		{
			if(isset($dq))
			{
				$id = $dq->id+1;
			}
			$nis = $tapel . "000" . $id;
		}

		return $nis;
	}

	public function tambah()
	{
		$post = $this->input->post();
		$nis = htmlspecialchars(trim($this->nisbaru()));

		$data = [
			'nama' => htmlspecialchars(trim($post['nama'])),
			'nis' => $nis,
			'nisn' => htmlspecialchars(trim($post['nisn'])),
			'password' => md5($nis),
			'jk' => htmlspecialchars(trim($post['jk'])),
			'nohp' => htmlspecialchars(trim($post['nohp'])),
			'alamat' => htmlspecialchars(trim($post['alamat'])),
			'nama_ayah' => htmlspecialchars(trim($post['nama_ayah'])),
			'nohp_ayah' => htmlspecialchars(trim($post['nohp_ayah'])),
			'nama_ibu' => htmlspecialchars(trim($post['nama_ibu'])),
			'nohp_ibu' => htmlspecialchars(trim($post['nohp_ibu'])),
			'email' => htmlspecialchars(trim($post['email'])),
			'email_ortu' => htmlspecialchars(trim($post['email_ortu']))
		];

		return $this->db->insert('siswa', $data);
	}

	public function ubah()
	{
		$post = $this->input->post();
		$id = htmlspecialchars(trim($post['id']));

		if($post['password']!="")
		{
			$password = md5(htmlspecialchars(trim($post['password'])));
			$this->db->query("update siswa set password='$password' where id='$id'");
		}

		$data = [
			'nama' => htmlspecialchars(trim($post['nama'])),
			'nisn' => htmlspecialchars(trim($post['nisn'])),
			'jk' => htmlspecialchars(trim($post['jk'])),
			'nohp' => htmlspecialchars(trim($post['nohp'])),
			'alamat' => htmlspecialchars(trim($post['alamat'])),
			'nama_ayah' => htmlspecialchars(trim($post['nama_ayah'])),
			'nohp_ayah' => htmlspecialchars(trim($post['nohp_ayah'])),
			'nama_ibu' => htmlspecialchars(trim($post['nama_ibu'])),
			'nohp_ibu' => htmlspecialchars(trim($post['nohp_ibu'])),
			'email' => htmlspecialchars(trim($post['email'])),
			'email_ortu' => htmlspecialchars(trim($post['email_ortu']))
		];
		return $this->db->update('siswa', $data, ['id'=>$id]);
	}

	public function hapus($id)
	{
		return $this->db->update('siswa', ['hapus'=>'1'], ['id'=>$id]);
	}

	public function tampil($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('siswa')->row();
	}

	public function tampilByNis($nis)
	{
		$this->db->where('nis', $nis);
		return $this->db->get('siswa')->row();
	}

	public function cari($kunci)
	{
		$this->db->like('nis', $kunci);
		$this->db->or_like('nama', $kunci);
		return $this->db->get('siswa')->result();
	}

}

/* End of file Siswa_model.php */
/* Location: ./application/models/Siswa_model.php */
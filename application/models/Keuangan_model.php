<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan_model extends CI_Model {

	public function data()
	{
		$idtapel = helper_tapel();

		$this->db->where('idtapel', $idtapel);
		$this->db->where('aktif', '1');
		$this->db->order_by('id', 'asc');
		return $this->db->get('bayaran')->result();
	}

	public function cekBayaran($id)
	{
		$this->db->where('idtapel', helper_tapel());
		$this->db->where('id', $id);
		return $this->db->get('bayaran')->row();
	}

	public function hapus($id)
	{
		$id = htmlspecialchars(trim($id));
		return $this->db->update('bayaran', ['aktif'=>'0'], ['id'=>$id]);
	}

	public function tambah()
	{
		$post = $this->input->post();
		$data = [
			'idtapel' => helper_tapel(),
			'nama' => htmlspecialchars(trim($post['nama'])),
			'lokera' => htmlspecialchars(trim($post['lokera'])),
			'lokerb' => htmlspecialchars(trim($post['lokerb'])),
			'usrcrt' => $this->session->id
		];
		return $this->db->insert('bayaran', $data);
	}

	public function tagihan($nis)
	{
		// ambil idtapel aktif
		$idtapel = helper_tapel();

		// $query = "select a.id, a.nama, a.lokera, a.lokerb from bayaran a where a.id not in(select b.idbayaran from bayar b where b.idsiswa='$nis') and a.idtapel='$idtapel' and a.aktif='1'";
		$query = "select a.id, a.nama, a.lokera, a.lokerb from bayaran a where a.id not in(select b.idbayaran from bayar b where b.idsiswa='$nis') and a.aktif='1'";
		return $this->db->query($query)->result();
	}

	public function keranjang()
	{
		// hapus dulu
		$post = $this->input->post();
		$idsiswa = htmlspecialchars(trim($post['nis']));
		$this->db->delete('bayar_tmp', ['idsiswa'=>$idsiswa]);

		// baru input
		
		$usrcrt = $this->session->id;
		$query = "insert into bayar_tmp(idsiswa,idbayaran,lokera,lokerb,usrcrt) values ";

		foreach($post['idbayaran'] as $idbayaran){
			$lokera = $post['lokera-'.$idbayaran];
			$lokerb = $post['lokerb-'.$idbayaran];
			$query .= "('$idsiswa', '$idbayaran', '$lokera', '$lokerb', '$usrcrt'),";
		}
		$query = rtrim($query,',');
		return $this->db->query($query);
	}

	public function keranjang_data($nis)
	{
		$this->db->select('b.nama, (t.lokera + t.lokerb) as total');
		$this->db->join('bayaran b', 'b.id = t.idbayaran');
		$this->db->where('t.idsiswa', $nis);
		return $this->db->get('bayar_tmp t')->result();
	}

	public function bayaran_data($nis)
	{
		$this->db->select('t.id, b.nama, (t.lokera + t.lokerb) as total, t.dtmcrt');
		$this->db->join('bayaran b', 'b.id = t.idbayaran');
		$this->db->where('t.idsiswa', $nis);
		$this->db->order_by('t.dtmcrt', 'desc');
		return $this->db->get('bayar t')->result();
	}

	public function data_bayaran($a, $b='')
	{
		$post = $this->input->post();
		$a = htmlspecialchars(trim($post['dari']));
		if($b==''){
			// $this->db->select('t.id, b.nama, (t.lokera + t.lokerb) as total, t.dtmcrt');
			// $this->db->join('bayaran b', 'b.id = t.idbayaran');
			// $this->db->where('t.dtmcrt', $a);		
			// $this->db->order_by('t.dtmcrt', 'desc');
			// return $this->db->get('bayar t')->result();
			$query = "select t.id, b.nama, (t.lokera + t.lokerb) as total, t.dtmcrt, s.nis, s.nama as siswa from bayar t join bayaran b on b.id = t.idbayaran join siswa s on s.nis=t.idsiswa where t.dtmcrt like '$a%' order by t.dtmcrt desc";
			return $this->db->query($query)->result();
		}else{
			$b = htmlspecialchars(trim($post['ke']));
			$query = "select t.id, b.nama, (t.lokera + t.lokerb) as total, t.dtmcrt, s.nis, s.nama as siswa from bayar t join bayaran b on b.id = t.idbayaran join siswa s on s.nis=t.idsiswa where t.dtmcrt between '$a' and '$b' order by t.dtmcrt desc";
			return $this->db->query($query)->result();
		}		
	}

	public function bayarin($nis)
	{
		$query = "insert into bayar(idsiswa,idbayaran,lokera,lokerb,usrcrt,dtmcrt) select idsiswa,idbayaran,lokera,lokerb,usrcrt,dtmcrt from bayar_tmp where idsiswa='$nis'";
		return $this->db->query($query);
	}

	public function hapus_bayaran($id)
	{
		
		$id = htmlspecialchars(trim($id));
		return $this->db->delete('bayar',['id'=>$id]);
	}

}

/* End of file Keuangan_model.php */
/* Location: ./application/models/Keuangan_model.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level_model extends CI_Model {

	public function data()
	{
		return $this->db->get('level')->result();
	}

}

/* End of file Level_model.php */
/* Location: ./application/models/Level_model.php */
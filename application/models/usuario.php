<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		

	}

	function get_user($usuario, $senha)
	{
		$this->db->where('usuario', $usuario);
		$this->db->where('senha', $senha);
		
        $query = $this->db->get('usuario');
		return $query->result();
	}
	

	// get user
	function get_user_by_id($id)
	{
		$this->db->where('id', $id);
        $query = $this->db->get('user');
		return $query->result();
	}
	
	// insert
	function insert_user($data)
    {
		return $this->db->insert('user', $data);
	}

}

/* End of file usuario.php */
/* Location: ./application/models/usuario.php */


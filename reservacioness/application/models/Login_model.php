<?php

Class Login_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database('default');
	}

	public function authentication($username)
	{
		# Preparar los datos que llevará consulta.
		$user_data = ['username' => $username];

		# Preparar la consulta con los datos proporcionados y limitar el resultado 1 una fila.
		$this->db->where($user_data);
		$this->db->limit(1);

		# Ejecutar la consuta.
		$query = $this->db->get('users');

		# Verificar si hubo resultados
		if($query->num_rows() == 1)
		{
			return $query->row();
		}

		return false;
	}

}

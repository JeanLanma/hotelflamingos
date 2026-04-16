<?php

Class Room_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database('default');
	}

  public function add_room()
  {
    $data = array(
      'name' => $this->input->post('name'),
      'description' => $this->input->post('description'),
      'image_cover' => $this->input->post('image_cover'),
      'price' => $this->input->post('price'),
      'availability' => $this->input->post('availability')
    );

    return $this->db->insert('rooms', $data);
  }

  public function edit_room($room_id = null)
  {
    $data = array(
      'name' => $this->input->post('name'),
      'description' => $this->input->post('description'),
      'image_cover' => $this->input->post('image_cover'),
      'price' => $this->input->post('price'),
      'availability' => $this->input->post('availability')
    );

    # Si el campo de imagen viene vacio, no editar el valor por defecto en la base de datos.
    if(empty($data['image_cover']))
    {
      unset($data['image_cover']);
    }

    $query = $this->db->where('room_id', $room_id)->update('rooms', $data);

    return ($query === true) ? true : false;
  }

  public function get_room_type($room_id = null)
  {
    $query = $this
    ->db
    ->get_where('rooms', array('room_id' => $room_id));

    return $query->row_array();
  }

  public function list_room_types()
  {
    $query = $this->db->get('rooms');
    return $query->result_array();
  }
}

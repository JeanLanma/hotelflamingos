<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Rooms extends MY_Core {
  public function __construct()
  {
    parent::__construct();
    ($this->is_logged) ? '' : redirect(base_url() . 'login/'); // Solo permitir usuarios con sesión activa.
    $this->load->model('room_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $this->twig->display('rooms/rooms');
  }

  public function add_room()
  {
		$validator = ['success' => false, 'messages' => []];
    $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if($this->form_validation->run('room_validation') === true)
		{

			$add_room = $this->room_model->add_room();

			if($add_room === true)
			{
				$validator['success'] = true;
				$validator['messages'] = 'Añadido exitosamente';
			}
			else
			{
				$validator['success'] = false;
				$validator['messages'] = 'Error al actualizar la información';
			}

		}
		else
		{
			$validator['success'] = false;
			foreach($_POST as $key => $value)
			{
				$validator['messages'][$key] = form_error($key);
			}
		}

		header("Content-type: application/json; charset=utf-8");
		echo json_encode($validator);
  }

  public function edit_room($room_id = null)
	{
		if($room_id)
		{

			$validator = ['success' => false, 'messages' => []];
			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if($this->form_validation->run('room_validation') === true)
			{

				$edit_room = $this->room_model->edit_room($room_id);

				if($edit_room === true)
				{
					$validator['success'] = true;
					$validator['messages'] = 'Actualizado exitosamente';
				}
				else
				{
					$validator['success'] = false;
					$validator['messages'] = 'Error al actualizar la información';
				}

			}
			else
			{
				$validator['success'] = false;
				foreach($_POST as $key => $value)
				{
					$validator['messages'][$key] = form_error($key);
				}
			}

			header("Content-type: application/json; charset=utf-8");
			echo json_encode($validator);
		}
	}

  public function get_room_type($id = null)
  {
    if ($id == null) {
			return null;
		}

		$data = $this->room_model->get_room_type(intval($id));

		$result = [
			'name' => $data['name'] ?? null,
			'description' => $data['description'] ?? null,
      'image_cover' => $data['image_cover'] ?? null,
			'price' => number_format($data['price'], 2, '.', '') ?? null,
      'availability' => $data['availability'] ?? null,
		];

		# Codificar el arreglo en formato JSON
		header('Content-Type: application/json');
		echo json_encode($result);
  }

  public function list_room_types()
  {
		$result = ['data' =>[]];
		$data = $this->room_model->list_room_types();

		foreach($data as $key => $value)
		{
			# Botones de Acción
			$buttons =
			'
			<div class="btn-group">
				<button type="button" class="btn btn-default">Opciones</button>
				<button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
					<span class="sr-only">Toggle Dropdown</span>
					<div class="dropdown-menu" role="menu">
						<a class="dropdown-item" href="#" onclick="editRoomModel('.$value['room_id'].')">Editar Habitación</a>
					</div>
				</button>
			</div>
			';

			# Crear el arreglo con la información recibida desde la base de datos
			$result['data'][$key] = array(
				$value['name'],
				$price = number_format($value['price'], 2),
				$value['availability'] = ($value['availability'] > 0) ? '<button class="btn btn-success btn-sm"> '. $value['availability'] . ' Disponible(s)</button>' : '<button class="btn btn-danger btn-sm">Sin disponibilidad</button>',
				$value['updated_at'],
				$buttons,
			);
		}

		# Codificar el arreglo en formato JSON
		header('Content-Type: application/json');
		echo json_encode($result);
  }
}

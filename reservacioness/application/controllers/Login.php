<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Login extends MY_Core {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        ($this->is_logged) ? redirect(base_url()) : '' ; // Si el usuario esta logueado, redireccionar a la página de inicio.
    }

	public function index()
	{
		# Si el usuario no está identificado, mostrar el login y si existierá el mensaje de error de login.
        $this->twig->display('login/login',
        [
        	'error_type' => $this->session->flashdata('error_type'),
        	'error_message' => $this->session->flashdata('error_message'),
        	'csrf' => [
        		'name' => $this->security->get_csrf_token_name(),
        		'hash' => $this->security->get_csrf_hash()
        	]
        ]);
	}

	public function authentication()
	{
		# Las credenciales de acceso recibidas desde el formulario.
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		# Consulta a la base de datos.
		$user = $this->login_model->authentication($username);

		# Comprobar que la contraseña sea correcta y que el usuario tenga la cuenta activada.
		if($this->check_pass($user, $password) && $this->check_status($user))
		{
			# Asignar los datos del usuario a variables de sesión.
			$user_data = [
				'user_id' => $user->user_id,
				'name' => $user->name,
				'username' => $user->username, //SE PUEDE QUITAR
				'status' => $user->status,
				'logged_in' => TRUE
			];

			$this->session->set_userdata($user_data);
		}

		# Si el inicio de sesión fue correcto, recargará la página de login y esta a su vez redireccionará a la página de inicio.
		# En caso de un inicio de sesión fallido, recarga la página y mostrar un error.
		redirect(base_url() . 'login/','refresh');

	}

	# Si se obtuvo un resultado de la consulta, comprobar que la contraseña sea correcta.
	public function check_pass($user, $password)
	{
		if(gettype($user) === 'object'):
			if(password_verify($password, $user->pass)):
				return true;
			else:
				# Mostrar mensaje al usuario de que el inicio de sesión no fue éxitoso.
				$this->session->set_flashdata('error_type', 'danger');
				$this->session->set_flashdata('error_message', 'El usuario y/o contraseña no coinciden.');
				return false;
			endif;
		else:
			# Retonar falso si la variable $user no es un objeto.
			$this->session->set_flashdata('error_type', 'danger');
			$this->session->set_flashdata('error_message', 'El usuario y/o contraseña no coinciden.');
			return false;
		endif;
	}

	# Comprobar que el usuario se encuentre activo.
	public function check_status($user)
	{
		if(gettype($user) === 'object'):
			if($user->status == 1):
				return true;
			else:
				# Mostrar mensaje al usuario de que su cuenta está inactiva.
				$this->session->set_flashdata('error_type', 'warning');
				$this->session->set_flashdata('error_message', 'Tu cuenta se encuentra inactiva.');
				return false;
			endif;
		endif;
	}

}

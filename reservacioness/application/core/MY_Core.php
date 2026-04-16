<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Core extends CI_Controller {

  protected $is_logged;

	public function __construct()
	{
		parent::__construct(); // CI_Controller

		# Verificar si está logeado el usuario.
		$this->is_logged = $this->session->userdata('logged_in') ?? false;

		# Añade variables globales para Twig.
    $this->twig->addGlobal('base_url', base_url());
    $this->twig->addGlobal("session", $this->session);
	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('Persona');	
		
	}
	public function index()
	{
		$this->load->view('login');
	}
	public function login(){

		//logica inicio de secion, si contiene mas que solo el email y la contraseña, debe hacer un  registro  a la db si solo trae el email y la contraseña, debe hacer un login
		
		//si se envia el formulario
		if($this->input->post()){

			$this->input->post('email');
			$this->input->post('contraseña');
			$this->input->post('name');

			if(empty($name)){
		        // Validar que los campos no estén vacíos
				if (empty($email) || empty($password)) {
				$this->session->set_flashdata('error', 'El email y la contraseña son obligatorios.');
				redirect('login');  // Redirige a la misma página si falta algún campo
				}else{
					
				}

			}
			

		}

		$data['personas'] = $this->Persona->get_all_personas();
		
		
		
		redirect($this->load->view('inicio', $data));
	
	}
}
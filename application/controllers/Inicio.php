<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('Persona');	
	}

	public function index()
	{
		// Obtener personas desde el modelo
		$data['personas'] = $this->Persona->get_all();
		
		// Cargar la vista y pasar los datos
		$this->load->view('inicio', $data);

		/* $this->load->view('camara');  */

	}

	public function insert(){
		$data = array(
			'nombre' => $this->input->post('nombre'),
			'apellidos' => $this->input->post('apellidos'),
/* 			'email'=> $this->input->post('email'),*/
/* 			'contraseña'=> $this->input->post('contraseña'),
 */			'fecha_nacimiento' => $this->input->post('fecha_nacimiento'),
			'genero' => $this->input->post('genero')
		);
 		$this->Persona->insert($data);
		redirect('inicio');
 	}

	public function get_by_id($id){
		$data = $this->Persona->get_persona_by_id($id);
		echo json_encode($data);
	}

	public function editar($id){
		$data = $this->Persona->get_persona_by_id($id);
		echo json_encode($data);
	}
	public function update($id){
		$data = array(
			'nombre' => $this->input->post('nombre'),
			'apellidos' => $this->input->post('apellidos'),
			'fecha_nacimiento' => $this->input->post('fecha_nacimiento'),
			'genero' => $this->input->post('genero')
		);
		$this->Persona->update($id, $data);
		redirect('inicio');
	}

	public function delete($id){
		$this->Persona->delete($id);
		redirect('inicio');
	}
}

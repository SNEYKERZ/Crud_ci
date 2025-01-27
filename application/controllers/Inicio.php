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
		$data['personas'] = $this->Persona->get_all_personas();
		
		// Cargar la vista y pasar los datos
		$this->load->view('inicio', $data);

		/* $this->load->view('camara');  */

	}

    public function get_by_email($email){

	}

	public function agregar(){
		$data = array(
			'nombre' => $this->input->post('nombre'),
			'apellidos' => $this->input->post('apellido'),
			'fecha_nacimiento' => $this->input->post('fecha_nacimiento'),
			'genero' => $this->input->post('genero')
		);
 		$this->Persona->agregar($data);
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
	public function actualizar(){
		$id = $this->input->post('id');
		$data = array(
			'nombre' => $this->input->post('nombre'),
			'apellidos' => $this->input->post('apellido'),
			'fecha_nacimiento' => $this->input->post('fecha_nacimiento'),
			'genero' => $this->input->post('genero')
		);
		$this->Persona->actualizar($id, $data);
		redirect('inicio');
	}

	public function eliminar($id){
		$this->Persona->eliminar($id);
		redirect('inicio');
	}
}

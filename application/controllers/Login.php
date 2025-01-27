<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(['url', 'form']);
        $this->load->library(['form_validation', 'session']);
        $this->load->model('Persona');
    }

    public function index() {
        $this->load->view('login');
    }

    public function login() {

        if ($this->input->post()) {
			$action = $this->input->post('action'); // Determina si es login o registro
            $email = trim($this->input->post('email'));
            $password = trim($this->input->post('password'));
            $name = trim($this->input->post('nombre')); // Solo estará presente si es registro

            // Validar email y contraseña para ambos casos
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

			if($action ==='login') {

				$persona = $this->Persona->search_by_email($email);

                if ($persona)  {
					if($password === $persona->contraseña){
						redirect('inicio');
					}else{
						$this->session->set_flashdata('error', 'Email o contraseña incorrectos.');
                    redirect('login');	
					}
                    
                } else {
                    $this->session->set_flashdata('error', 'Email o contraseña incorrectos.');
                    redirect('login');
                }

			}elseif ($action === 'registro') {
				 // Registro
				 $persona = [
                    'nombre' => $name,
                    'email' => $email,
                    'contraseña' => $password
					/* password_hash($password, PASSWORD_BCRYPT), */
                ];

                if ($this->Persona->search_by_email($email)) {
                    // Evitar registros duplicados
                    $this->session->set_flashdata('error', 'El correo ya está registrado.');
                    redirect('login');
                } else {
                    $this->Persona->insert($persona);
                    $this->session->set_flashdata('success', 'Registro exitoso. Ahora puedes iniciar sesión.');
                    redirect('login');
                }
			}
		}
	}
}

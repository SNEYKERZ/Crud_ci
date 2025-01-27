<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(['url', 'form']);
        $this->load->library(array('form_validation','session'));
        $this->load->model('Persona');
    }

    public function index() {
        $this->load->view('login');
    }

    public function login() {
        if ($this->input->post()) {
            $email = trim($this->input->post('email'));
            $password = trim($this->input->post('password'));
            $name = trim($this->input->post('name'));

            // Validación de datos
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('login');
                return;
            }

            if (!empty($name)) {
                // Registro
                $persona = [
                    'name' => $name,
                    'email' => $email,
                    'password' => password_hash($password, PASSWORD_BCRYPT),
                ];
                $this->Persona->agregar($persona);
                $this->session->set_flashdata('success', 'Registro exitoso');
                redirect('inicio');
            } else {
                // Login
                $persona = $this->Persona->get_by_email($email);
                if ($persona && password_verify($password, $persona['password'])) {
                    $this->session->set_userdata('user', $persona);
                    redirect('inicio');
                } else {
                    $this->session->set_flashdata('error', 'Email o contraseña incorrectos');
                    redirect('login');
                }
            }
        }
    }
}

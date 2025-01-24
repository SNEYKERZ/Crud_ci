<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Camara extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        
    }

    public function index()
    {
        $this->load->view('camara');  // Carga la vista donde se accede a la cámara en vivo
    }

    // si es en vivo no se necesita guardar la imagen por ende este metodo no se necesita
    // Método para recibir la imagen y guardarla
    // nota: se debe crear la carpeta uploads en la raiz del proyecto
    public function save_image()
    {
        $data = json_decode($this->input->raw_input_stream); // Recibimos los datos en formato JSON (por ejemplo, una imagen base64)
        $image_data = $data->image; // Aquí la imagen base64

        // Limpiamos los datos de la imagen
        $image_data = str_replace('data:image/png;base64,', '', $image_data);
        $image_data = str_replace(' ', '+', $image_data);
        
        // Generamos un nombre único para la imagen
        $file_name = 'captura_' . time() . '.png';
        $file_path = './uploads/' . $file_name;

        // Guardamos la imagen en el servidor
        if (file_put_contents($file_path, base64_decode($image_data))) {
            echo json_encode(['status' => 'success', 'message' => 'Imagen guardada correctamente']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al guardar la imagen']);
        }
    }
}

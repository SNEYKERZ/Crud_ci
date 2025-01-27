<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persona extends CI_Model {

    // Obtener todos los registros
    public function get_all() {
        $query = $this->db->get('personas');
        return $query->result();
    }

    // Insertar un nuevo registro
    public function insert($data) {
/*         if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT); // Cifrado de contraseña
        } */

        if ($this->db->insert('personas', $data)) {
            return $this->db->insert_id(); // Retornar el ID del nuevo registro
        }
        return false;
    }

    // Obtener un registro por ID
    public function get_by_id($id) {
        $query = $this->db->get_where('personas', ['id' => $id]);
        return $query->row();
    }

    // Actualizar un registro
    public function update($id, $data) {
       /*  if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT); // Cifrado de contraseña
        } */

        $this->db->where('id', $id);
        return $this->db->update('personas', $data);
    }

    // Eliminar un registro
    public function delete($id) {
        if (!$this->db->delete('personas', ['id' => $id])) {
            log_message('error', 'Error al eliminar persona con ID ' . $id);
            return false;
        }
        return true;
    }

    // Obtener registros con paginación
    public function get_paginated($limit, $offset) {
        $this->db->limit($limit, $offset);
        $query = $this->db->get('personas');
        return $query->result();
    }

    // Buscar por correo electrónico
    public function search_by_email($email) {
        $query = $this->db->get_where('personas', ['email' => $email]);
        return $query->row();
    }
}
?>

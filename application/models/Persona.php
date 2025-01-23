<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persona extends CI_Model {

    public function get_all_personas() {
        $query = $this->db->get('personas');
        return $query->result();
    }
    public function agregar($data) {
        return $this->db->insert('personas', $data);
    }
    public function get_persona_by_id($id) {
        $query = $this->db->get_where('personas', array('id' => $id));
        return $query->row();
    }

    public function actualizar($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('personas', $data);
    }

    public function eliminar($id) {
        $this->db->where('id', $id);
        return $this->db->delete('personas');
    }
}
?>
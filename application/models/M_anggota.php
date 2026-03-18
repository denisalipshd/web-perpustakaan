<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_anggota extends CI_Model {

    public function get()
    {
        return $this->db->get('anggota')->result_array();
    }

    public function store($data)
    {
        return $this->db->insert('anggota', $data);
    }

    public function get_anggota_by_id($id_anggota)
    {
        return $this->db->get_where('anggota', ['id_anggota' => $id_anggota])->row_array();
    }

    public function update($id_anggota, $data_update)
    {
        $this->db->where('id_anggota', $id_anggota);
        return $this->db->update('anggota', $data_update);
    }

    public function delete($id_anggota)
    {
        $this->db->where('id_anggota', $id_anggota);
        return $this->db->delete('anggota');
    }

    public function get_anggota_id($username)
    {
        $this->db->select('id_anggota');
        $this->db->where('username', $username);
        $query = $this->db->get('anggota');

        if($query->num_rows() > 0) {
            return $query->row()->id_anggota;
        }

        return null;
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_buku extends CI_Model {

    public function get()
    {
        return $this->db->get('buku')->result_array();
    }

    public function store($data)
    {
        return $this->db->insert('buku', $data);
    }

    public function get_buku_by_id($id_buku)
    {
        return $this->db->get_where('buku', ['id_buku' => $id_buku])->row_array();
    }

    public function update($id_buku, $data)
    {
        $this->db->where('id_buku', $id_buku);
        return $this->db->update('buku', $data);
    }

    public function delete($id_buku)
    {
        return $this->db->delete('buku', ['id_buku' => $id_buku]);
    }
}
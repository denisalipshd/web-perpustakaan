<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

    public function get()
    {
        $this->db->select('transaksi.*, anggota.nama_anggota, buku.judul_buku');
        $this->db->from('transaksi');
        $this->db->join('anggota', 'anggota.id_anggota = transaksi.id_anggota');
        $this->db->join('buku', 'buku.id_buku = transaksi.id_buku');

        return $this->db->get()->result_array();
    }

    public function delete($id_transaksi)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        return $this->db->delete('transaksi');
    }

    public function pinjam_buku($data)
    {
        return $this->db->insert('transaksi', $data);
    }
}
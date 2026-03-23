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

    public function pinjam_buku($data_simpan, $data_update, $id_buku)
    {
        $this->db->where('id_buku', $id_buku);
        $this->db->update('buku', $data_update);

        return $this->db->insert('transaksi', $data_simpan);
    }

    public function get_peminjaman_anggota($id_anggota)
    {
        $this->db->select('transaksi.*, buku.judul_buku');
        $this->db->from('transaksi');
        $this->db->join('buku', 'buku.id_buku = transaksi.id_buku');

        $this->db->where('transaksi.id_anggota', $id_anggota);
        $this->db->where('transaksi.status_transaksi', 'peminjaman');

        return $this->db->get()->result_array();
    }

    public function kembalikan_buku($id_transaksi, $transaksi_update, $id_buku, $buku_update)
    {
        $this->db->trans_start();

        $this->db->where('id_buku', $id_buku);
        $this->db->update('buku', $buku_update);

        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi', $transaksi_update);

        $this->db->trans_complete();
        
        return $this->db->trans_status();
    }

    public function get_pengembalian_anggota($id_anggota)
    {
        $this->db->select('transaksi.*, buku.judul_buku, buku.status');
        $this->db->from('transaksi');
        $this->db->join('buku', 'buku.id_buku = transaksi.id_buku');

        $this->db->where('transaksi.id_anggota', $id_anggota);
        $this->db->where('transaksi.status_transaksi', 'pengembalian');

        return $this->db->get()->result_array();
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_anggota');
        $this->load->model('M_buku'); 
        $this->load->model('M_transaksi');

        if($this->session->userdata('status') != 'login_anggota') {
            redirect(base_url('login'));
        }
    }

    public function index()
    {
        $this->load->view('anggota/v_dashboard');
    }

    public function daftar_buku()
    {
        $data = [
            'buku' => $this->M_buku->get()
        ];

        $this->load->view('anggota/v_daftar-buku', $data);
    }

    public function pinjam_buku($id_buku)
    {
        $this->form_validation->set_rules('tgl_pinjam', 'Tanggal Pinjam', 'required|trim');
        $this->form_validation->set_rules('tgl_kembali', 'Tanggal Kembali', 'required|trim');

        if($this->form_validation->run() == FALSE) {
            $data['id_buku'] = $id_buku;
            $this->load->view('anggota/v_pinjam', $data);
        } else {
            $username = $this->session->userdata('nama');
            $id_anggota = $this->M_anggota->get_anggota_id($username);

            $data_simpan = array(
                'id_anggota' => $id_anggota,
                'id_buku' => $id_buku,
                'tgl_pinjam' => $this->input->post('tgl_pinjam'),
                'tgl_kembali' => $this->input->post('tgl_kembali'),
                'status_transaksi' => 'peminjaman'
            );

            $this->M_transaksi->pinjam_buku($data_simpan);
            $this->session->set_flashdata('success', 'Buku berhasil di pinjam!');
            redirect(base_url('anggota/buku'));
        }
    } 
}
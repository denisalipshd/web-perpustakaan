<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_buku');
    }

    public function index()
    {
        $this->load->view('admin/v_dashboard');
    }

    public function buku()
    {
        $data = [
            'buku' => $this->M_buku->get()
        ];

        $this->load->view('admin/v_buku', $data);
    }

    public function buku_tambah()
    {
        $this->form_validation->set_rules('judul_buku', 'Judul', 'required|trim');
        $this->form_validation->set_rules('pengarang', 'Pengarang', 'required|trim');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required|trim');
        $this->form_validation->set_rules('tahun_terbit', 'Tahun Terbit', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('admin/v_buku-tambah');
        } else {
            $data = array(
                'judul_buku' => $this->input->post('judul_buku'),
                'pengarang' => $this->input->post('pengarang'),
                'penerbit' => $this->input->post('penerbit'),
                'tahun_terbit' => $this->input->post('tahun_terbit'),
                'status' => $this->input->post('status'),
            );

            $this->M_buku->store($data);
            $this->session->set_flashdata('success', 'Buku berhasil di tambahkan!');
            redirect(base_url('admin/buku'));
        }
    }

    public function buku_edit($id_buku)
    {
        $data = [
            'b' => $this->M_buku->get_buku_by_id($id_buku)
        ];

        $this->form_validation->set_rules('judul_buku', 'Judul', 'required|trim');
        $this->form_validation->set_rules('pengarang', 'Pengarang', 'required|trim');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required|trim');
        $this->form_validation->set_rules('tahun_terbit', 'Tahun Terbit', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('admin/v_buku-edit', $data);
        } else {
            $data = array(
                'judul_buku' => $this->input->post('judul_buku'),
                'pengarang' => $this->input->post('pengarang'),
                'penerbit' => $this->input->post('penerbit'),
                'tahun_terbit' => $this->input->post('tahun_terbit'),
                'status' => $this->input->post('status'),
            );

            $this->M_buku->update($id_buku, $data);
            $this->session->set_flashdata('success', 'Buku berhasil di perbarui!');
            redirect(base_url('admin/buku'));
        }
    }

    public function buku_delete($id_buku)
    {
        $this->M_buku->delete($id_buku);
        $this->session->set_flashdata('success', 'Buku berhasil di hapus!');
        redirect(base_url('admin/buku'));
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_buku');
        $this->load->model('M_anggota');
        $this->load->model('M_transaksi'); 

        if($this->session->userdata('status') != 'login_admin') {
            redirect(base_url('login'));
        }
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

        $this->load->view('admin/buku/v_buku', $data);
    }

    public function buku_tambah()
    {
        $this->form_validation->set_rules('judul_buku', 'Judul', 'required|trim');
        $this->form_validation->set_rules('pengarang', 'Pengarang', 'required|trim');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required|trim');
        $this->form_validation->set_rules('tahun_terbit', 'Tahun Terbit', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('admin/buku/v_buku-tambah');
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
            $this->load->view('admin/buku/v_buku-edit', $data);
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

    public function anggota()
    {
        $data = [
            'anggota' => $this->M_anggota->get()
        ];

        $this->load->view('admin/anggota/v_anggota', $data);
    }

    public function anggota_tambah()
    {
        $this->form_validation->set_rules('nama_anggota', 'Nama Anggota', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('nis', 'NIS', 'required|trim');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('admin/anggota/v_anggota-tambah');
        } else {
            $data = array(
                'nama_anggota' => $this->input->post('nama_anggota'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'nis' => $this->input->post('nis'),
                'kelas' => $this->input->post('kelas')
            );

            $this->M_anggota->store($data);
            $this->session->set_flashdata('success', 'Anggota berhasil di tambahkan!');
            redirect(base_url('admin/anggota'));
        }
    }

    public function anggota_edit($id_anggota)
    {
        $anggota = $this->M_anggota->get_anggota_by_id($id_anggota);

        $this->form_validation->set_rules('nama_anggota', 'Nama Anggota', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('nis', 'NIS', 'required|trim');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');

        if($this->form_validation->run() == FALSE) {
            $data['a'] = $anggota;
            $this->load->view('admin/anggota/v_anggota-edit', $data);
        } else {
            $data_update = array(
                'nama_anggota' => $this->input->post('nama_anggota'),
                'username' => $this->input->post('username'),
                'nis' => $this->input->post('nis'),
                'kelas' => $this->input->post('kelas')
            );

            $password_baru = $this->input->post('password');
            $password_lama = $this->input->post('password_lama');

            if(!empty($password_baru)) {
                $data_update['password'] = md5($password_baru);
            } else {
                $data_update['password'] = $anggota['password'];
            }

            $this->M_anggota->update($id_anggota, $data_update);
            $this->session->set_flashdata('success', 'Anggota berhasil di perbarui!');
            redirect(base_url('admin/anggota'));
        }

    }

    public function anggota_delete($id_anggota)
    {
        $this->M_anggota->delete($id_anggota);
        $this->session->set_flashdata('success', 'Anggota berhasil di hapus!');
        redirect(base_url('admin/anggota'));
    }

    public function transaksi()
    {
        $data = [
            'transaksi' => $this->M_transaksi->get()
        ];

        $this->load->view('admin/transaksi/v_transaksi', $data); 
    }

    public function transaksi_delete($id_transaksi)
    {
        $this->M_transaksi->delete($id_transaksi);
        $this->session->set_flashdata('success', 'Transaksi berhasil di hapus!');
        redirect(base_url('admin/transaksi'));
    }
}
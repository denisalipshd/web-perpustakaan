<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
    }

    public function index()
    {
        $this->load->view('v_login');
    }

    public function aksi_login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('v_login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $level = $this->input->post('level');

            $where = array(
                'username' => $username,
                'password' => md5($password)
            );  

            if($level == 'admin') {
                $cek_login = $this->M_login->cek_login('admin', $where)->num_rows();
                $tujuan = 'admin/dashboard';
                $status = 'login_admin';
            } else {
                $cek_login = $this->M_login->cek_login('anggota', $where)->num_rows();
                $tujuan = 'anggota';
                $status = 'login_anggota';
            }

            if($cek_login > 0) {
                $data_session = array(
                    'nama' => $username,
                    'status' => $status
                );

                $this->session->set_userdata($data_session);
                redirect(base_url($tujuan));
            } else {
                $this->session->set_flashdata('error', 'Username atau Password salah!');
                redirect(base_url('login'));
            }
        }

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}
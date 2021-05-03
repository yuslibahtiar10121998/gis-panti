<?php

class Admin_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('m_login');
    }

    public function login($username, $password)
    {
        $cek = $this->ci->m_login->login($username, $password);

        if ($cek) {

            if ($cek->is_dinas == "1") {
                $this->ci->session->set_userdata('user', $cek);
            } else {
                $this->ci->session->set_userdata('user', $cek);
            }
            redirect('home');
        } else {
            //notifikasi jika password salah
            $this->ci->session->set_flashdata('pesan', 'Username Atau Password Salah !');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->ci->session->unset_userdata('user');
        $this->ci->session->set_flashdata('pesan', 'Anda Berhasil Logout !');
        redirect('login');
    }
}

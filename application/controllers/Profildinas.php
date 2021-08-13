<?php

class Profildinas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_profildinas');
    }

    public function index()
    {
        $data = array(
            'title' => 'Profil Superadmin',
            'profildinas' => $this->m_profildinas->tampil(['id_admin' => get_user()->id_admin]),
            'isi'   => 'v_profil_dinas'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function batal()
    {
        redirect('profildinas');
    }

    public function edit($id_admin)
    {

        $this->form_validation->set_rules('nama_admin', 'Nama Admin', 'required', array(
            'required' => '%s Harus Diisi !'
        ));

        $this->form_validation->set_rules('email', 'email', 'required', array(
            'required' => '%s Harus Diisi !'
        ));

        $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required' => '%s Harus Diisi !'
        ));

        $this->form_validation->set_rules('nomor_telepon', 'Nomor Telepon', 'required', array(
            'required' => '%s Harus Diisi !'
        ));
        
        $this->form_validation->set_rules('password', 'Password');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title'     => 'Edit Data Admin Dinas',
                'profildinas' => $this->m_profildinas->detail($id_admin),
                'isi'       => 'v_edit_profildinas'
            );
            $this->load->view('layout/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                'id_admin'          => $id_admin,
                'nama_admin'        => $this->input->post('nama_admin'),
                'email'             => $this->input->post('email'),
                'username'          => $this->input->post('username'),
                'nomor_telepon'     => $this->input->post('nomor_telepon'),
                'password'          => md5($this->input->post('password')),

            );
            $this->m_profildinas->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit !');
            redirect('profildinas');
        }
    }

}

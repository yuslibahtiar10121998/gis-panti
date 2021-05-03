<?php

class Profiladmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_profiladmin');
    }

    public function index()
    {
        $data = array(
            'title' => 'Profil Admin Panti Asuhan',
            'profiladmin' => $this->m_profiladmin->tampil(['id_admin' => get_user()->id_admin]),
            'isi'   => 'v_profil_admin'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function batal()
    {
        redirect('profiladmin');
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
                'title'     => 'Edit Data Admin Panti Asuhan',
                'profiladmin' => $this->m_profiladmin->detail($id_admin),
                'isi'       => 'v_edit_profiladmin'
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
            $this->m_profiladmin->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit !');
            redirect('profiladmin');
        }
    }

}

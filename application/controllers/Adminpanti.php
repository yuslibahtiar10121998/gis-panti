<?php
class Adminpanti extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_adminpanti');
        $this->load->model('m_panti');
    }

    public function index()
    {

        $data = array(
            'title'      => 'Data Admin Panti Asuhan',
            'adminpanti' => $this->m_adminpanti->tampil(['wilayah_id' => $this->session->userdata('user')->id_wilayah, 'is_dinas' => 0]),
            'isi'        => 'v_data_adminpanti'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function batal()
    {
        redirect('adminpanti');
    }

    public function input()
    {


        $this->form_validation->set_rules('nama_admin', 'Nama Admin Panti Asuhan', 'required', array(
            'required' => '%s Harus Diisi !'
        ));

        $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required' => '%s Harus Diisi !'
        ));

        $this->form_validation->set_rules('email', 'Email', 'required', array(
            'required' => '%s Harus Diisi !'
        ));

        $this->form_validation->set_rules('nomor_telepon', 'Nomor Telepon', 'required', array(
            'required' => '%s Harus Diisi !'
        ));

        $this->form_validation->set_rules('password', 'Password');


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Input Data Admin Panti Asuhan',
                'isi'   => 'v_input_adminpanti',
                "list_panti" => $this->m_panti->tampil(['tbl_admin.wilayah_id' => get_user()->id_wilayah])
            );
            $this->load->view('layout/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                'wilayah_id' => get_user()->wilayah_id,
                'panas_id' => $this->input->post('id_panas'),
                'nama_admin'     => $this->input->post('nama_admin'),
                'username'       => $this->input->post('username'),
                'email'       => $this->input->post('email'),
                'nomor_telepon'       => $this->input->post('nomor_telepon'),
                'password'       => md5($this->input->post('password')),

            );
            $this->m_adminpanti->simpan($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan !');
            redirect('adminpanti/input');
        }
    }

    public function edit($id_admin)
    {

        $this->form_validation->set_rules('nama_admin', 'Nama Admin Panti Asuhan', 'required', array(
            'required' => '%s Harus Diisi !'
        ));

        $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required' => '%s Harus Diisi !'
        ));

        $this->form_validation->set_rules('email', 'Email', 'required', array(
            'required' => '%s Harus Diisi !'
        ));

        $this->form_validation->set_rules('nomor_telepon', 'Nomor Telepon', 'required', array(
            'required' => '%s Harus Diisi !'
        ));


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title'     => 'Edit Data Admin Panti Asuhan',
                'adminpanti' => $this->m_adminpanti->detail($id_admin),
                'isi'       => 'v_edit_adminpanti'
            );
            $this->load->view('layout/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                'id_admin'    => $id_admin,
                'nama_admin'     => $this->input->post('nama_admin'),
                'username'       => $this->input->post('username'),
                'email'       => $this->input->post('email'),
                'nomor_telepon'       => $this->input->post('nomor_telepon'),
                'password'       => md5($this->input->post('password')),

            );
            $this->m_adminpanti->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit !');
            redirect('adminpanti');
        }
    }

    public function hapus($id_admin)
    {

        $data = array('id_admin' => $id_admin);
        $this->m_adminpanti->hapus($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !');
        redirect('adminpanti');
    }
}

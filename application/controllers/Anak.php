<?php

class Anak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_anak');
    }

    public function index()
    {
        $data = array(
            'title' => 'Data Anak Asuh',
            'anak'  => $this->m_anak->tampil(['panas_id' => get_user()->id_panas]),
            'isi'   => 'v_dataanak'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function batal()
    {
        redirect('anak');
    }

    public function input()
    {
        if (!empty($this->input->post())) {
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required', array(
            'required' => '%s Harus Diisi !'
        ));

        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', array(
            'required' => '%s Harus Diisi !'
        ));

        $this->form_validation->set_rules('asal_tempat_lahir', 'Asal Tempat Lahir', 'required', array(
            'required' => '%s Harus Diisi !'
        ));

        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required', array(
            'required' => '%s Harus Diisi !'
        ));

        $this->form_validation->set_rules('umur', 'Umur', 'required', array(
            'required' => '%s Harus Diisi !'
        ));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Input Data Anak',
                'isi'   => 'v_input_dataanak',
                "list_pendidikan" => $this->m_anak->tampil(['panas_id' => get_user()->id_panas]),
                "list_status" => $this->m_anak->tampil(['panas_id' => get_user()->id_panas])
            );
            $this->load->view('layout/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                'pendidikan_id' => get_user()->pendidikan_id,
                'status_id' => get_user()->status_id,
                'nama_lengkap'           => $this->input->post('nama_lengkap'),
                'jenis_kelamin'          => $this->input->post('jenis_kelamin'),
                'asal_tempat_lahir'      => $this->input->post('asal_tempat_lahir'),
                'tanggal_lahir'          => $this->input->post('tanggal_lahir'),
                'umur'                   => $this->input->post('umur'),
                'id_pendidikan'             => $this->input->post('id_pendidikan'),
                'status_id'             => $this->input->post('status_id'),
            );
            $this->m_anak->simpan($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan !');
            redirect('anak');
        
        } {
        die(validation_errors());
    }

} else {
    $data = array(
        'title' => 'Input Data Anak Asuh',
        'isi'   => 'v_input_dataanak',
        'list_pendidikan' => get_tbl_pendidikan(get_user()->id_pendidikan)
    );
    $this->load->view('layout/v_wrapper', $data, FALSE);
    }
}

    public function edit($id_anak)
    {
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required', array(
            'required' => '%s Harus Diisi !'
        ));

        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', array(
            'required' => '%s Harus Diisi !'
        ));

        $this->form_validation->set_rules('asal_tempat_lahir', 'Asal Tempat Lahir', 'required', array(
            'required' => '%s Harus Diisi !'
        ));

        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required', array(
            'required' => '%s Harus Diisi !'
        ));

        $this->form_validation->set_rules('umur', 'Umur', 'required', array(
            'required' => '%s Harus Diisi !'
        ));


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Edit Data Anak',
                'anak'  => $this->m_anak->detail($id_anak),
                "list_pendidikan" => $this->m_anak->tampil(['panas_id' => get_user()->id_panas]),
                "list_status" => $this->m_anak->tampil(['panas_id' => get_user()->id_panas]),
                'isi'   => 'v_edit_dataanak'
            );
            $this->load->view('layout/v_wrapper', $data, FALSE);
        } else {
            $data = array(

                'id_anak'                => $id_anak,
                'nama_lengkap'           => $this->input->post('nama_lengkap'),
                'jenis_kelamin'          => $this->input->post('jenis_kelamin'),
                'asal_tempat_lahir'      => $this->input->post('asal_tempat_lahir'),
                'tanggal_lahir'          => $this->input->post('tanggal_lahir'),
                'umur'                   => $this->input->post('umur'),
                'pendidikan_id'             => $this->input->post('pendidikan_id'),

            );
            $this->m_anak->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan !');
            redirect('anak');
        }
    }

    public function hapus($id_anak)
    {
        $data = array('id_anak' => $id_anak);
        $this->m_anak->hapus($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !');
        redirect('anak');
    }
}

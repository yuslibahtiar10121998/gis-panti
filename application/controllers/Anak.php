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

            $this->form_validation->set_rules('kelamin_id', 'Jenis Kelamin', 'required', array(
                'required' => '%s Harus Diisi !'
            ));

            $this->form_validation->set_rules('pendidikan_id', 'Pendidikan', 'required', array(
                'required' => '%s Harus Diisi !'
            ));

            $this->form_validation->set_rules('status_id', 'status', 'required', array(
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
            $this->form_validation->set_rules('nama_lengkap_ibu', 'nama lengkap ibu');
            $this->form_validation->set_rules('nama_lengkap_ayah', 'nama lengkap ayah');

            if ($this->form_validation->run() == TRUE) {
                $config['upload_path']    = './gambar/';
                $config['allowed_types']  = 'gif|jpg|png|jpeg';
                $config['max_size']       = 3000;
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('gambar')) {
                    $data = array(
                    'title' => 'Input Data Anak',
                    'error_upload' => $this->upload->display_errors(),
                    'isi'   => 'v_input_dataanak',
                    "list_pendidikan" => get_pendidikan(),
                    "list_status" => get_status(),
                    "list_kelamin" => get_kelamin()
                );
                $this->load->view('layout/v_wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './gambar/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'panas_id' => get_user()->panas_id,
                    'pendidikan_id'          => $this->input->post('pendidikan_id'),
                    'status_id'              => $this->input->post('status_id'),
                    'kelamin_id'             => $this->input->post('kelamin_id'),
                    'nama_lengkap'           => $this->input->post('nama_lengkap'),
                    'asal_tempat_lahir'      => $this->input->post('asal_tempat_lahir'),
                    'tanggal_lahir'          => $this->input->post('tanggal_lahir'),
                    'umur'                   => $this->input->post('umur'),
                    'nama_lengkap_ibu'       => $this->input->post('nama_lengkap_ibu'),
                    'nama_lengkap_ayah'      => $this->input->post('nama_lengkap_ayah'),
                    'gambar'            => $upload_data['uploads']['file_name'],
                );
                // $res = $this->m_anak->simpan($data);
                // if ($res) {
                //     $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan !');
                //     redirect('anak');
                // } else {
                //     $this->session->set_flashdata('pesan', 'Data gagal Disimpan !');
                //     redirect('anak');
                // }
                $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan !');
                redirect('anak');
            }
            } else {
                die(validation_errors());
            }
        } else {
            $data = array(
                'title' => 'Input Data Anak Asuh',
                'isi'   => 'v_input_dataanak',
                "list_pendidikan" => get_pendidikan(),
                "list_status" => get_status(),
                "list_kelamin" => get_kelamin()
            );
            $this->load->view('layout/v_wrapper', $data, FALSE);
        }
    }

    public function edit($id_anak)
    {

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required', array(
            'required' => '%s Harus Diisi !'
        ));

        $this->form_validation->set_rules('kelamin_id', 'Jenis Kelamin', 'required', array(
            'required' => '%s Harus Diisi !'
        ));

        $this->form_validation->set_rules('pendidikan_id', 'Pendidikan', 'required', array(
            'required' => '%s Harus Diisi !'
        ));

        $this->form_validation->set_rules('status_id', 'status', 'required', array(
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
        $this->form_validation->set_rules('nama_lengkap_ibu', 'nama lengkap ibu');
        $this->form_validation->set_rules('nama_lengkap_ayah', 'nama lengkap ayah');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Edit Data Anak',
                'anak'  => $this->m_anak->detail($id_anak),
                "list_pendidikan" => get_pendidikan(),
                "list_status" => get_status(),
                "list_kelamin" => get_kelamin(),
                'isi'   => 'v_edit_dataanak'
            );
            $this->load->view('layout/v_wrapper', $data, FALSE);
        } else {
            $data = array(    
                'id_anak' => $id_anak,
                'pendidikan_id'          => $this->input->post('pendidikan_id'),
                'status_id'              => $this->input->post('status_id'),
                'kelamin_id'             => $this->input->post('kelamin_id'),
                'nama_lengkap'           => $this->input->post('nama_lengkap'),
                'asal_tempat_lahir'      => $this->input->post('asal_tempat_lahir'),
                'tanggal_lahir'          => $this->input->post('tanggal_lahir'),
                'umur'                   => $this->input->post('umur'),
                'nama_lengkap_ibu'       => $this->input->post('nama_lengkap_ibu'),
                'nama_lengkap_ayah'      => $this->input->post('nama_lengkap_ayah'),
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

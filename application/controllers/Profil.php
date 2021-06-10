<?php

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_profil');
    }

    public function index()
    {
        $data = array(
            'title' => 'Profil Panti Asuhan',
            'profil' => $this->m_profil->tampil(['id_panas' => get_user()->id_panas]),
            'isi'   => 'v_profil_panti'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function batal()
    {
        redirect('profil');
    }

    public function edit($id_panas)
    {
        $this->form_validation->set_rules('nama_panas', 'Nama Panti Asuhan', 'required', array(
            'required' => '%s Harus Diisi !'
        ));

        $this->form_validation->set_rules('jenis_panas', 'Jenis Panti Asuhan', 'required', array(
            'required' => '%s Harus Dipilih !'
        ));

        $this->form_validation->set_rules('jumlah_anak', 'Jumlah Anak Asuh', 'required', array(
            'required' => '%s Harus Diisi !'
        ));

        $this->form_validation->set_rules('daya_tampung', 'Daya Tampung Anak', 'required', array(
            'required' => '%s Harus Diisi !'
        ));

        $this->form_validation->set_rules('alamat', 'Alamat Panti Asuhan', 'required', array(
            'required' => '%s Harus Diisi !'
        ));

        $this->form_validation->set_rules('nomor_rekening', 'Nomor Rekening', 'required', array(
            'required' => '%s Harus Diisi !'
        ));
        
        $this->form_validation->set_rules('nomor_telepon', 'Nomor Telepon Panti Asuhan', 'required', array(
            'required' => '%s Harus Diisi !'
        ));

        $this->form_validation->set_rules('jumlah_pengurus', 'Jumlah Pengurus', 'required', array(
            'required' => '%s Harus Diisi !'
        ));

        $this->form_validation->set_rules('latitude', 'Latitude', 'required', array(
            'required' => '%s Harus Dipilih !'
        ));

        $this->form_validation->set_rules('longitude', 'Longitude', 'required', array(
            'required' => '%s Harus Dipilih !'
        ));

        if ($this->form_validation->run() == TRUE) {

            $config['upload_path']    = './gambar/';
            $config['allowed_types']  = 'gif|jpg|png|jpeg';
            $config['max_size']       = 3000;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar')) {
                $data = array(
                    'title' => 'Edit Data Panti Asuhan',
                    'error_upload' => $this->upload->display_errors(),
                    'profil' => $this->m_profil->detail($id_panas),
                    'isi'   => 'v_edit_profil'


                );
                $this->load->view('layout/v_wrapper', $data, FALSE);
            } else {
                //edit dengan ubah gambar
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './gambar/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_panas'          => $id_panas,
                    'nama_panas'        => $this->input->post('nama_panas'),
                    'jenis_panas'       => $this->input->post('jenis_panas'),
                    'pimpinan_panas'    => $this->input->post('pimpinan_panas'),
                    'jumlah_anak'       => $this->input->post('jumlah_anak'),
                    'daya_tampung'      => $this->input->post('daya_tampung'),
                    'alamat'            => $this->input->post('alamat'),
                    'nomor_rekening'    => $this->input->post('nomor_rekening'),
                    'npwp'              => $this->input->post('npwp'),
                    'nomor_telepon'     => $this->input->post('nomor_telepon'),
                    'jumlah_pengurus'   => $this->input->post('jumlah_pengurus'),
                    'latitude'          => $this->input->post('latitude'),
                    'longitude'         => $this->input->post('longitude'),
                    'gambar'            => $upload_data['uploads']['file_name'],

                );
                $this->m_profil->edit($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Diedit !');
                redirect('profil');
            }
            //edit tanpa ubah gambar
            $data = array(
                'id_panas'          => $id_panas,
                'nama_panas'        => $this->input->post('nama_panas'),
                'jenis_panas'       => $this->input->post('jenis_panas'),
                'pimpinan_panas'    => $this->input->post('pimpinan_panas'),
                'jumlah_anak'       => $this->input->post('jumlah_anak'),
                'daya_tampung'      => $this->input->post('daya_tampung'),
                'alamat'            => $this->input->post('alamat'),
                'nomor_rekening'    => $this->input->post('nomor_rekening'),
                'npwp'              => $this->input->post('npwp'),
                'nomor_telepon'     => $this->input->post('nomor_telepon'),
                'jumlah_pengurus'   => $this->input->post('jumlah_pengurus'),
                'latitude'          => $this->input->post('latitude'),
                'longitude'         => $this->input->post('longitude'),
            );
            $this->m_profil->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit !');
            redirect('profil');
        }
        $data = array(
            'title' => 'Edit Data Panti Asuhan',
            'profil' => $this->m_profil->detail($id_panas),
            'isi'   => 'v_edit_profil'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }
}

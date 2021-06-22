<?php

class Panti extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_panti');
        $this->load->model('m_data');
        $this->load->helper(array('url'));
    }

    public function index()
    {
        $data = array(
            'title' => 'Data Panti Asuhan',
            'panti' =>  $this->m_panti->tampil(['tbl_kecamatan.wilayah_id' => get_user()->id_wilayah]),
            'isi'   => 'v_datapanti'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
        // $this->load->database();
		// $jumlah_data = $this->m_data->jumlah_data();
		// $this->load->library('pagination');
		// $config['base_url'] = base_url().'index.php/panti/index/';
		// $config['total_rows'] = $jumlah_data;
		// $config['per_page'] = 2;
		// $from = $this->uri->segment(3);
		// $this->pagination->initialize($config);		
		// $data['tbl_panas'] = $this->m_data->data($config['per_page'],$from);
		// $this->load->view('v_datapanti',$data);
    }


    public function batal()
    {
        redirect('panti');
    }

    public function input()
    {
        if (!empty($this->input->post())) {

            $this->form_validation->set_rules('nama_panas', 'Nama Panti Asuhan', 'required', array(
                'required' => '%s Harus Diisi !'
            ));

            // $this->form_validation->set_rules('jenis_panas', 'Jenis Panti Asuhan', 'required', array(
            //     'required' => '%s Harus Dipilih !'
            // ));

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
                        'title' => 'Input Data Panti Asuhan',
                        'error_upload' => $this->upload->display_errors(),
                        'isi'   => 'v_input_datapanti'
                    );
                    $this->load->view('layout/v_wrapper', $data, FALSE);
                } else {
                    $upload_data = array('uploads' => $this->upload->data());
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './gambar/' . $upload_data['uploads']['file_name'];
                    $this->load->library('image_lib', $config);
                    $data = array(
                        'kecamatan_id'      => $this->input->post('kecamatan_id'),
                        'tahun_berdiri'     => $this->input->post('tahun_berdiri'),
                        'nama_panas'        => $this->input->post('nama_panas'),
                        // 'jenis_panas'       => $this->input->post('jenis_panas'),
                        'jumlah_anak'       => $this->input->post('jumlah_anak'),
                        'daya_tampung'      => $this->input->post('daya_tampung'),
                        'alamat'            => $this->input->post('alamat'),
                        'nomor_rekening'    => $this->input->post('nomor_rekening'),
                        'nomor_telepon'     => $this->input->post('nomor_telepon'),
                        'jumlah_pengurus'   => $this->input->post('jumlah_pengurus'),
                        'latitude'          => $this->input->post('latitude'),
                        'longitude'         => $this->input->post('longitude'),
                        'gambar'            => $upload_data['uploads']['file_name'],

                    );

                    $res = $this->m_panti->simpan($data);

                    if ($res) {
                        $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan !');
                        redirect('panti');
                    } else {
                        $this->session->set_flashdata('pesan', 'Data gagal Disimpan !');
                        redirect('panti');
                    }
                }
            } else {
                die(validation_errors());
            }
        } else {
            $data = array(
                'title' => 'Input Data Panti Asuhan',
                'isi'   => 'v_input_datapanti',
                'list_kecamatan' => get_kecamatan(get_user()->id_wilayah)
            );
            $this->load->view('layout/v_wrapper', $data, FALSE);
        }
    }

    public function edit($id_panas)
    {
        if (!empty($this->input->post())) {
            $this->form_validation->set_rules('nama_panas', 'Nama Panti Asuhan', 'required', array(
                'required' => '%s Harus Diisi !'
            ));

            // $this->form_validation->set_rules('jenis_panas', 'Jenis Panti Asuhan', 'required', array(
            //     'required' => '%s Harus Dipilih !'
            // ));

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
                        'panti' => $this->m_panti->detail($id_panas),
                        'isi'   => 'v_edit_datapanti'


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
                        'kecamatan_id'      => $this->input->post('kecamatan_id'),
                        'tahun_berdiri'     => $this->input->post('tahun_berdiri'),
                        'nama_panas'        => $this->input->post('nama_panas'),
                        // 'jenis_panas'       => $this->input->post('jenis_panas'),
                        'jumlah_anak'       => $this->input->post('jumlah_anak'),
                        'daya_tampung'      => $this->input->post('daya_tampung'),
                        'alamat'            => $this->input->post('alamat'),
                        'nomor_rekening'    => $this->input->post('nomor_rekening'),
                        'nomor_telepon'     => $this->input->post('nomor_telepon'),
                        'jumlah_pengurus'   => $this->input->post('jumlah_pengurus'),
                        'latitude'          => $this->input->post('latitude'),
                        'longitude'         => $this->input->post('longitude'),
                        'gambar'            => $upload_data['uploads']['file_name'],

                    );
                    $this->m_panti->edit($data);
                    $this->session->set_flashdata('pesan', 'Data Berhasil Diedit !');
                    redirect('panti');
                }
                //edit tanpa ubah gambar
                $data = array(
                    'id_panas'          => $id_panas,
                    'kecamatan_id'      => $this->input->post('kecamatan_id'),
                    'tahun_berdiri'     => $this->input->post('tahun_berdiri'),
                    'nama_panas'        => $this->input->post('nama_panas'),
                    // 'jenis_panas'       => $this->input->post('jenis_panas'),
                    'jumlah_anak'       => $this->input->post('jumlah_anak'),
                    'daya_tampung'      => $this->input->post('daya_tampung'),
                    'alamat'            => $this->input->post('alamat'),
                    'nomor_rekening'    => $this->input->post('nomor_rekening'),
                    'nomor_telepon'     => $this->input->post('nomor_telepon'),
                    'jumlah_pengurus'   => $this->input->post('jumlah_pengurus'),
                    'latitude'          => $this->input->post('latitude'),
                    'longitude'         => $this->input->post('longitude'),
                );
                $this->m_panti->edit($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Diedit !');
                redirect('panti');
            } else {
                die(validation_errors());
            }
        } else {
            $data = array(
                'title' => 'Edit Data Panti Asuhan',
                'panti' => $this->m_panti->detail($id_panas),
                'isi'   => 'v_edit_datapanti',
                'list_kecamatan' => get_kecamatan(get_user()->id_wilayah)

            );
            $this->load->view('layout/v_wrapper', $data, FALSE);
        }
    }
    public function hapus($id_panas)
    {
        $data = array('id_panas' => $id_panas);
        $this->m_panti->hapus($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !');
        redirect('panti');
    }

    public function lihatanak($id_panas = null)
    {
        if (!empty($id_panas)) {
            $data = [
                'title'    => 'List Anak Asuh',
                'listanak' => $this->m_panti->tampilanak(['panas_id' => $id_panas]),
                'isi'      => 'v_lihat_anak'
            ];
            $this->load->view('layout/v_wrapper', $data, FALSE);
        }
    }
}

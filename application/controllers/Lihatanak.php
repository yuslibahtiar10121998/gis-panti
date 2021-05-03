<?php

class lihatanak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_lihatanak');
    }

    public function index()
    {
        $data = array(
            'title' => 'Daftar Anak Asuh',
            'lihatanak'  => $this->m_lihatanak->tampil(['panas_id' => get_user()->id_panas]),
            'isi'   => 'v_lihat_anak'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }
}

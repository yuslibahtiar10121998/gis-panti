<?php

class Listanak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_listanak');
    }

    public function index()
    {
        $data = array(
            'title' => 'Anak asuh',
            'listanak' =>  $this->m_listanak->tampil(['wilayah_id' => get_user()->id_wilayah]),
            'isi'   => 'v_list_anak'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }
}

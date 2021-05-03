<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_rekap');
    }

    public function index()
    {
        $data = array(
            'title' => 'Rekap Data Statistik',
            'isi'   => 'v_rekap',
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }
    
    public function detailrekap()
    {
        $data = array(
        'title' => 'Detail Rekap',
        'jumlah'=> $this->m_rekap->statistik_jumlah(),
        'pendidikan'=> $this->m_rekap->statistik_pendidikan(),
        'status'=> $this->m_rekap->statistik_status(),
        'isi' => 'v_detail_rekap',
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }
}

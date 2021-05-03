<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekap extends CI_Controller
{

    public function index()
    {
        $data = array(
            'title' => 'Rekap Data Statistik',
            'isi'   => 'v_rekap',
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }
}

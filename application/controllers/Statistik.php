<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Statistik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_statistik');
    }

    public function index($id_kecamatan = null, $jenis_data = null, $tahun = null)
    {
        if (!empty($id_kecamatan) && !empty($jenis_data) && !empty($tahun)) {
            // $anak = $this->m_statistik->get_data($id_kecamatan);
            $res = $this->m_statistik->get_statistik($id_kecamatan, $tahun);
            $data_anak = $this->m_statistik->get_data_anak($id_kecamatan,$res['id_rekap']);
            
            $data = array(
                'title' => 'Statistik',
                'jenis_data' => $jenis_data,
                'tahun' => $tahun,
                'data_anak' => $data_anak,
                'statistik' => $res,
                'isi'   => 'v_statistik_kecamatan'

            );
            $this->load->view('front-end/v_wrapper', $data, FALSE);
        }
    }
}

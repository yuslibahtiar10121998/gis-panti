<?php
defined('BASEPATH') or exit('No direct script access allowed');

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

    public function do_rekap()
    {
        $wilayah_id = $this->input->post('wilayah_id');

        // Get kecamatan by wilayah
        $this->db->select('id_kecamatan');
        $kecamatan = $this->db->get_where('tbl_kecamatan', ['wilayah_id' => $wilayah_id])->result_array();

        // cek rekap
        $cek_rekap = $this->m_rekap->cek_rekap($wilayah_id, date('Y'));
        if (!empty($cek_rekap)) {
            // Hapus rekap
            $this->m_rekap->delete_rekap($wilayah_id, date('Y'));
        }

        $data_rekap = [];
        foreach ($kecamatan as $key => $value) {
            $rekap_kecamatan = $this->m_rekap->get_rekap_raw($value['id_kecamatan']);
            if (!empty($rekap_kecamatan['kecamatan_id'])) {
                $rekap_kecamatan['wilayah_id'] = $wilayah_id;
                array_push($data_rekap, $rekap_kecamatan);
            }
        }

        $result = $this->m_rekap->insert_rekap($data_rekap);

        var_dump($result);
    }

    public function detailrekap()
    {
        $data = array(
            'title' => 'Detail Rekap',
            'jumlah' => $this->m_rekap->statistik_jumlah(),
            'pendidikan' => $this->m_rekap->statistik_pendidikan(),
            'status' => $this->m_rekap->statistik_status(),
            'isi' => 'v_detail_rekap',
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }
}

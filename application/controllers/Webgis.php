<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Webgis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_panti');
        $this->load->model('m_statistik');
    }
    public function index()
    {
        if (!empty($this->input->post('cari'))) {
            $jns_data  = $this->input->post('jns_data');
            if (empty($jns_data)) {
                echo "<script>alert('Jenis Data harus diisi');</script>";
            }
            // $awal = $this->input->post('awal');
            // if ($awal < 0) {
            //     echo "<script>alert('Nilai awal harus diisi');</script>";
            // }
            // $akhir = $this->input->post('akhir');
            // if ($akhir < 0) {
            //     echo "<script>alert('Nilai akhir harus diisi');</script>";
            // }
            $tahun = $this->input->post('tahun');
            if (empty($tahun)) {
                echo "<script>alert('Tahun harus dipilih');</script>";
            }
            

            if (!empty($jns_data) &&
            //  $awal >= 0 && $akhir >= 0 && 
             !empty($tahun)) {
                if ($jns_data == "pendidikan") {
                    $data = [
                        'list_kecamatan' =>  $this->m_statistik->jmlpendidikan($tahun),
                        'jenis_data' => $jns_data,
                        'tahun' => $tahun,
                        'title' => 'Web GIS Panti Asuhan',
                        'panti' => $this->m_panti->tampil(),
                        'isi'   => 'v_webgis'
                    ];
                    $this->load->view('front-end/v_wrapper', $data, FALSE);
                } elseif ($jns_data == "status") {
                    $data = [
                        'list_kecamatan' =>  $this->m_statistik->jmlstatus($tahun),
                        'jenis_data' => $jns_data,
                        'tahun' => $tahun,
                        'title' => 'Web GIS Panti Asuhan',
                        'panti' => $this->m_panti->tampil(),
                        'isi'   => 'v_webgis'
                    ];
                    $this->load->view('front-end/v_wrapper', $data, FALSE);
                } elseif ($jns_data == "jk") {
                    $data = [
                        'list_kecamatan' =>  $this->m_statistik->jmlkelamin( $tahun),
                        'jenis_data' => $jns_data,
                        'tahun' => $tahun,
                        'title' => 'Web GIS Panti Asuhan',
                        'panti' => $this->m_panti->tampil(),
                        'isi'   => 'v_webgis'
                    ];
                    $this->load->view('front-end/v_wrapper', $data, FALSE);
                }
            } else {
                $data = array(
                    'title' => 'Web GIS Panti Asuhan',
                    'panti' => $this->m_panti->tampil(),
                    'isi'   => 'v_webgis'
                );
                $this->load->view('front-end/v_wrapper', $data, FALSE);
            }
        } else {
            $data = array(
                'title' => 'Web GIS Panti Asuhan',
                'panti' => $this->m_panti->tampil(),
                'isi'   => 'v_webgis'
            );
            $this->load->view('front-end/v_wrapper', $data, FALSE);
        }
        
    }

    public function about()
    {
        $data = array(
            'title' => 'Web GIS Panti Asuhan',
            'isi'   => 'v_about'
        );
        $this->load->view('front-end/v_wrapper', $data, FALSE);
    }

    public function detail($id_panas)
    {
        $data = array(
            'title' => 'Detail Panti Asuhan',
            'panti' => $this->m_panti->detail($id_panas),
            'isi'   => 'v_detail'
        );
        $this->load->view('front-end/v_wrapper', $data, FALSE);
    }
}

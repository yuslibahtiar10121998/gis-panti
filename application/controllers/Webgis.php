<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
		$data = array(
            'title' => 'Web GIS Panti Asuhan',
            'panti' => $this->m_panti->tampil(),
            'isi'   => 'v_webgis'
        );
        $this->load->view('front-end/v_wrapper', $data , FALSE);
	}

    public function about()
	{
		$data = array(
            'title' => 'Web GIS Panti Asuhan',
            'isi'   => 'v_about'
        );
        $this->load->view('front-end/v_wrapper', $data , FALSE);
	}

    public function detail($id_panas)
    {
        $data = array(
            'title' => 'Detail Panti Asuhan',
            'panti' => $this->m_panti->detail($id_panas),
            'jumlah'=> $this->m_statistik->statistik_jumlah(),
            'pendidikan'=> $this->m_statistik->statistik_pendidikan(),
            'status'=> $this->m_statistik->statistik_status(),
            'isi'   => 'v_detail'
        );
        $this->load->view('front-end/v_wrapper', $data , FALSE);
    }
}


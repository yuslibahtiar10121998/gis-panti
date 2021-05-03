<?php

class Home extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_panti');
    }

	public function index()
	{
        cek_login();
		$data = array(
            'title' => 'Pemetaan Panti Asuhan',
            'panti' => $this->m_panti->tampil(),
            'isi'   => 'v_pemetaan'
        );
        $this->load->view('layout/v_wrapper', $data , FALSE);
	}

    
}

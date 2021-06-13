<?php

class Login extends CI_Controller
{


    public function index()
    {

        $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required' => '%s Harus Diisi !'
        ));

        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Diisi !'
        ));

        if ($this->form_validation->run()) {
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $this->admin_login->login($username, $password);
        }

        $data = array(
            'title' => 'Login Admin'
        );
        $this->load->view('v_login', $data, FALSE);
    }

    public function logout()
    {
        $this->admin_login->logout();
    }

    // public function lupapassword()
    // {
    //     $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    //     if ($this->form_validation->run() == false) {
    //         $data['title'] = 'Lupa Password';
    //         $this->load->view('v_lupa_password', $data);
    //     }else {
    //         $email = $this->input->post('email');
    //         $tbl_admin = $this->db->get_where('tbl_admin', ['email' => $email])->row_array();

    //         if ($tbl_admin) {
                
    //         }else {
    //             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email anda tidak terdaftar!</div>');
    //             redirect('login/lupapassword');
                
    //         }
    //     }
    // }
}

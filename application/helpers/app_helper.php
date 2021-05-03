<?php

function get_wilayah($id_wilayah)
{
    $CI = &get_instance();

    return $CI->db->get_where('tbl_wilayah', ["id_wilayah" => $id_wilayah])->row();
}

function cek_login()
{
    $CI = &get_instance();

    if (empty($CI->session->userdata('user'))) {
        $CI->session->set_flashdata('pesan', 'Anda Belum Login, Silahkan Login Dulu !');
        redirect('login');
    }
}

function get_user()
{
    $CI = &get_instance();
    $user = $CI->session->userdata('user');
    if (!empty($user)) {
        return $user;
    }

    return false;
}

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

function get_kecamatan($id_wilayah = null)
{
    $CI = &get_instance();

    return $CI->db->get_where('tbl_kecamatan', ['wilayah_id' => $id_wilayah])->result_array();
}

function get_pendidikan($id_pendidikan = null)
{
    $data_pendidikan = [
        ID_PEND_SD => "SD",
        ID_PEND_SMP => "SMP",
        ID_PEND_SMA => "SMA",
        ID_PEND_TIDAK => "TIDAK"
    ];

    if ($id_pendidikan == null) {
        return $data_pendidikan;
    }

    return $data_pendidikan[$id_pendidikan];
}

function get_status($id_status = null)
{
    $data_status = [
        ID_STATUS_YATIM => "YATIM",
        ID_STATUS_PIATU => "PIATU",
        ID_STATUS_YPT => "YATIM DAN PIATU",
    ];

    if ($id_status == null) {
        return $data_status;
    }

    return $data_status[$id_status];
}

// function get_kelamin($id_kelamin = null)
// {
//     $data_kelamin = [
//         ID_LAKI_LAKI => "LAKI-LAKI",
//         ID_PEREMPUAN => "PEREMPUAN",
//     ];

//     if ($id_kelamin == null) {
//         return $data_kelamin;
//     }

//     return $data_kelamin[$id_kelamin];
// }

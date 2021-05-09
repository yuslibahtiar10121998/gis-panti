<?php

class M_login extends CI_Model
{

    public function login($username, $password)
    {
        $this->load->model('M_panti');

        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->join('tbl_wilayah', 'tbl_admin.wilayah_id = tbl_wilayah.id_wilayah');
        $this->db->where(array('username' => $username, 'password' => $password));
        $res = $this->db->get()->row();

        if (empty($res)) {
            return false;
        }

        if ($res->is_dinas != "1") {
            $panti = $this->M_panti->tampil(['id_admin' => $res->id_admin]);
            if (empty($panti)) {
                return false;
            }
            $res->id_panas = $panti[0]->id_panas;
        }

        return $res;
    }
}

<?php

class M_listanak extends CI_Model
{
    public function tampil($where = [])
    {
        $this->db->select('*');
        $this->db->from('tbl_panas');
        $this->db->join('tbl_kecamatan', 'tbl_panas.kecamatan_id = tbl_kecamatan.id_kecamatan');
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->order_by('id_panas', 'desc');
        return $this->db->get()->result();
    }
}

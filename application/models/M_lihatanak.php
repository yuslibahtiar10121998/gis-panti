<?php

class M_lihatanak extends CI_Model
{

    public function tampil($where = [])
    {
        $this->db->select('*');
        $this->db->from('tbl_anak');
        $this->db->join('tbl_pendidikan', 'tbl_anak.pendidikan_id = tbl_pendidikan.id_pendidikan');
        $this->db->join('tbl_status', 'tbl_anak.status_id = tbl_status.id_status');
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->order_by('id_anak', 'desc');
        return $this->db->get()->result();
    }
}

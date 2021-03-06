<?php

class M_adminpanti extends CI_Model
{
    public function simpan($data)
    {
        $this->db->insert('tbl_admin', $data);
    }

    public function tampil($where = [])
    {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->join('tbl_panas', 'tbl_admin.panas_id = tbl_panas.id_panas');
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->order_by('id_admin', 'desc');
        return $this->db->get()->result();
    }

    public function detail($id_admin)
    {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('id_admin', $id_admin);
        return $this->db->get()->row();
    }

    public function edit($data)
    {
        $this->db->where('id_admin', $data['id_admin']);
        $this->db->update('tbl_admin', $data);
    }

    public function hapus($data)
    {
        $this->db->where('id_admin', $data['id_admin']);
        $this->db->delete('tbl_admin', $data);
    }
}

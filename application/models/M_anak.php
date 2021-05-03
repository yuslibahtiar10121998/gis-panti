<?php

class M_anak extends CI_Model
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

    public function simpan($data)
    {
        $this->db->insert('tbl_anak', $data);
    }

    public function detail($id_anak)
    {
        $this->db->select('*');
        $this->db->from('tbl_anak');
        $this->db->where('id_anak', $id_anak);
        return $this->db->get()->row();
    }

    public function edit($data)
    {
        $this->db->where('id_anak', $data['id_anak']);
        $this->db->update('tbl_anak', $data);
    }

    public function hapus($data)
    {
        $this->db->where('id_anak', $data['id_anak']);
        $this->db->delete('tbl_anak', $data);
    }
}

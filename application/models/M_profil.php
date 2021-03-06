<?php

class M_profil extends CI_Model
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

    public function edit($data)
    {
        $this->db->where('id_panas', $data['id_panas']);
        $this->db->update('tbl_panas', $data);
    }

    public function simpan($data)
    {
        $this->db->insert('tbl_panas', $data);
    }

    public function detail($id_panas)
    {
        $this->db->select('*');
        $this->db->from('tbl_panas');
        $this->db->where('id_panas', $id_panas);
        return $this->db->get()->row();
    }
}

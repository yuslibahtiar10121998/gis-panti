<?php

class M_panti extends CI_Model
{
    public function simpan($data)
    {
        return $this->db->insert('tbl_panas', $data);
    }

    public function tampil($where = [])
    {
        $this->db->select('*');
        $this->db->from('tbl_panas');
        $this->db->join('tbl_kecamatan', 'tbl_panas.kecamatan_id = tbl_kecamatan.id_kecamatan');
        $this->db->join('tbl_admin', 'tbl_panas.id_panas = tbl_admin.panas_id',"left");
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->order_by('id_panas', 'desc');
        return $this->db->get()->result();
    }

    public function select_tampil($where = [])
    {
        $this->db->select('*');
        $this->db->from('tbl_panas');
        $this->db->join('tbl_kecamatan', 'tbl_panas.kecamatan_id = tbl_kecamatan.id_kecamatan');
        $this->db->join('tbl_admin', 'tbl_panas.id_panas = tbl_admin.panas_id', "LEFT");
        if (!empty($where)) {
            $this->db->where($where);
            $this->db->where("panas_id IS NULL");
        }
        $this->db->order_by('id_panas', 'desc');
        return $this->db->get()->result();
    }

    public function tampilanak($where = [])
    {
        $this->db->select('*');
        $this->db->from('tbl_anak');
        $this->db->where($where);
        return $this->db->get()->result_array();
    }

    public function detail($id_panas)
    {
        $this->db->select('*');
        $this->db->from('tbl_panas');
        $this->db->join('tbl_kecamatan', 'tbl_panas.kecamatan_id = tbl_kecamatan.id_kecamatan');
        $this->db->where('id_panas', $id_panas);
        return $this->db->get()->row();
    }

    public function edit($data)
    {
        $this->db->where('id_panas', $data['id_panas']);
        $this->db->update('tbl_panas', $data);
    }

    public function hapus($data)
    {
        $this->db->where('id_panas', $data['id_panas']);
        $this->db->delete('tbl_panas', $data);
    }
}

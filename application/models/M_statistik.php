<?php

class M_statistik extends CI_Model
{
    public function jmlpendidikan($minvalue, $maxvalue, $tahun)
    {
        $this->db->select('kecamatan_id');
        $this->db->from('tbl_rekap');
        $this->db->where("tahun", $tahun);
        $this->db->where("(sd+smp+sma+tidak_sekolah) BETWEEN '" . $minvalue . "' AND '" . $maxvalue . "'");
        $this->db->order_by('tahun', 'desc');
        return $this->db->get()->result_array();
    }

    public function jmlstatus($minvalue, $maxvalue, $tahun)
    {
        $this->db->select('kecamatan_id');
        $this->db->from('tbl_rekap');
        $this->db->where("tahun", $tahun);
        $this->db->where("(yatim+piatu+yatim_piatu) BETWEEN '" . $minvalue . "' AND '" . $maxvalue . "'");
        $this->db->order_by('tahun', 'desc');
        return $this->db->get()->result();
    }

    public function jmlkelamin($minvalue, $maxvalue, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_rekap');
        $this->db->where("tahun", $tahun);
        $this->db->where("(laki_laki+perempuan) BETWEEN '" . $minvalue . "' AND '" . $maxvalue . "'");
        $this->db->order_by('tahun', 'desc');
        return $this->db->get()->result();
    }

    public function get_statistik($id_kecamatan, $tahun = null, $jenis_data = null)
    {
        if ($tahun == null) {
            $tahun  = date('Y');
        }
        $this->db->order_by("updated_at", "desc");
        return $this->db->get_where("tbl_rekap", ['kecamatan_id' => $id_kecamatan, 'tahun' => $tahun])->row_array();
    }
}

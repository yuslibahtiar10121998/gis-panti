<?php

class M_rekap extends CI_Model
{

    public function cek_rekap($wilayah_id, $tahun)
    {
        return $this->db->get_where('tbl_rekap', ['wilayah_id' => $wilayah_id, 'tahun' => $tahun])->row_array();
    }

    public function insert_rekap($data = [])
    {
        return $this->db->insert_batch('tbl_rekap', $data);
    }

    public function delete_rekap($wilayah_id, $tahun)
    {
        return $this->db->delete('tbl_rekap', ['wilayah_id' => $wilayah_id, 'tahun' => $tahun]);
    }

    public function get_rekap_raw($kecamatan_id = null)
    {
        return $this->db->select('tbl_panas.kecamatan_id, SUM(CASE WHEN kelamin_id = 1 THEN 1 END) as laki_laki,
        SUM(CASE WHEN kelamin_id = 2 THEN 1 END) as perempuan,
        SUM(CASE WHEN status_id = 1 THEN 1 END)as yatim,
        SUM(CASE WHEN status_id = 2 THEN 1 END)as piatu,
        SUM(CASE WHEN status_id = 3 THEN 1 END)as yatim_piatu,
        SUM(CASE WHEN pendidikan_id = 1 THEN 1 END) as sd,
        SUM(CASE WHEN pendidikan_id = 2 THEN 1 END) as smp,
        SUM(CASE WHEN pendidikan_id = 3 THEN 1 END) as sma,
        SUM(CASE WHEN pendidikan_id = 4 THEN 1 END) as tidak_sekolah')
            ->from('tbl_panas')
            ->join('tbl_anak', 'tbl_panas.id_panas = tbl_anak.panas_id', 'inner')
            ->where(['tbl_panas.kecamatan_id' => $kecamatan_id])
            ->get()->row_array();
    }

    public function insert_rekap_anak($kecamatan_id = null, $id_rekap = null){
        $this->db->select('id_anak');
        $this->db->from('tbl_panas');
        $this->db->join('tbl_anak', 'tbl_panas.id_panas = tbl_anak.panas_id');
        $this->db->where('tbl_panas.kecamatan_id',$kecamatan_id);
        $data = $this->db->get()->result_array();

        foreach ($data as $val) {
            $result = $this->db->insert('tbl_rekap_anak',['id_anak' => $val['id_anak'],'id_rekap' => $id_rekap]);
        }

        return true;
    }

    public function get_all_rekap($wilayah_id = null, $tahun = null)
    {
        $this->db->order_by('tahun','desc');
        $this->db->where('wilayah_id',$wilayah_id);
        if($tahun != null){
            $this->db->where('tahun',$tahun);
        }else{
        $this->db->group_by('tahun');
        }
        return $this->db->get('tbl_rekap')->result_array();
    }

    public function statistik_jumlah()
    {
        $sql = "SELECT tahun , jumlah_anak FROM tbl_statistik_anak ORDER BY tahun ASC";
        return $this->db->query($sql)->result();
    }

    public function statistik_pendidikan()
    {
        $sql = "SELECT sd_sederajat , smp_sederajat , sma_sederajat , tidak_sekolah , tahun FROM tbl_statistik_pendidikan ORDER BY tahun ASC";
        return $this->db->query($sql)->result();
    }

    public function statistik_status()
    {
        $sql = "SELECT yatim , piatu , yatim_piatu , tahun FROM tbl_statistik_status ORDER BY tahun ASC";
        return $this->db->query($sql)->result();
    }
}

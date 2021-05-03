<?php

class M_rekap extends CI_Model {

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
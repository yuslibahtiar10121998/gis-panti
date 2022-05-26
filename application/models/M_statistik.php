<?php

class M_statistik extends CI_Model
{
    public function jmlpendidikan($tahun)
    {
        $this->db->select('kecamatan_id');
        $this->db->from('tbl_rekap');
        $this->db->where("tahun", $tahun);
        $this->db->where("sd != 0");
        $this->db->or_where("smp != 0");
        $this->db->or_where("sma != 0");
        $this->db->or_where("tidak_sekolah != 0");
        $this->db->order_by('tahun', 'desc');
        return $this->db->get()->result();
    }

    public function jmlstatus( $tahun)
    {
        $this->db->select('kecamatan_id');
        $this->db->from('tbl_rekap');
        $this->db->where("tahun", $tahun);
        $this->db->where("(yatim+piatu+yatim_piatu) != 0");
        $this->db->order_by('tahun', 'desc');
        return $this->db->get()->result();
    }

    public function jmlkelamin( $tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_rekap');
        $this->db->where("tahun", $tahun);
        $this->db->where("(laki_laki+perempuan) != 0");
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
    public function get_data_anak($kecamatan_id,$id_rekap)
    {

        $this->db->select('nama_lengkap,asal_tempat_lahir,tanggal_lahir,pendidikan,nama_panas,nama_kelamin,status');
        $this->db->from('tbl_rekap_anak');
        $this->db->join('tbl_anak', 'tbl_rekap_anak.id_anak = tbl_anak.id_anak','right');
        $this->db->join('tbl_kelamin', 'tbl_kelamin.id_kelamin = tbl_anak.kelamin_id','right');
        $this->db->join('tbl_status', 'tbl_status.id_status = tbl_anak.status_id','right');
        $this->db->join('tbl_pendidikan', 'tbl_pendidikan.id_pendidikan = tbl_anak.pendidikan_id','left');
        $this->db->join('tbl_panas', 'tbl_panas.id_panas = tbl_anak.panas_id','left');
        $this->db->where('tbl_rekap_anak.id_rekap', $id_rekap);
        $this->db->where('tbl_anak.kecamatan_id', $kecamatan_id);
        return $this->db->get()->result_array();
    }
    
}

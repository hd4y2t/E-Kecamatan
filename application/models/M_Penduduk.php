<?php

class M_Penduduk extends CI_Model
{
    function search_nik($nik)
    {
        $this->db->like('nik', $nik, 'both');
        $this->db->order_by('nik', 'ASC');
        $this->db->limit(10);
        return $this->db->get('penduduk')->result();
    }

    public function cek_penduduk($nik)
    {
        return $this->db->get_where('penduduk', array('nik' => $nik));
    }

    public function getSurat()
    {
        $query = "SELECT `pengajuan_surat`.*, `surat`.`nm_surat`
                   FROM `pengajuan_surat` JOIN `surat`
                   ON `pengajuan_surat`.`id_surat` = `surat`.`id_surat`
                   ";
        return $this->db->query($query)->result_array();
    }
}

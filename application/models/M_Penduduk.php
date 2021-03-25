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
        $data = $this->db->get_where('penduduk', ['nik' => $nik])->row_array();
        $aju =  $data['pengajuan'] + 1;
        $this->db->set('pengajuan', $aju);
        $this->db->where('nik', $nik);
        $this->db->update('penduduk');

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

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
        // $data = $this->db->get_where('penduduk', ['nik' => $nik])->row_array();
        // $aju =  $data['pengajuan'] + 1;
        // $this->db->set('pengajuan', $aju);
        // $this->db->where('nik', $nik);
        // $this->db->update('penduduk');

        return $this->db->get_where('penduduk', array('nik' => $nik));
    }

    public function pengajuan($nik)
    {
        $data = $this->db->get_where('penduduk', ['nik' => $nik])->row_array();
        $aju =  $data['pengajuan'] + 1;
        $this->db->set('pengajuan', $aju);
        $this->db->where('nik', $nik);
        $this->db->update('penduduk');

        return $this->db->query($data)->row_array();
    }

    public function getJoinPengajuan()
    {
        $query = "SELECT `pengajuan_surat`.*, `penduduk`.*
                   FROM `pengajuan_surat`
                   JOIN `penduduk` ON `pengajuan_surat`.`nik` = `penduduk`.`nik`
                   ";
        return $this->db->query($query)->row_array();
    }

    public function getSurat()
    {
        $query = "SELECT `pengajuan_surat`.*, `surat`.`nm_surat`
                   FROM `pengajuan_surat` JOIN `surat`
                   ON `pengajuan_surat`.`id_surat` = `surat`.`id_surat`
                   ";
        return $this->db->query($query)->result_array();
    }
    public function joinPenduduk()
    {
        $query = "SELECT `surat_keluar`.*, `penduduk`.*
                   FROM `surat_keluar`
                   JOIN `penduduk` ON `surat_keluar`.`nm_surat_keluar` = `penduduk`.`nik`
                   ";
        return $this->db->query($query)->result_array();
    }
    public function getJoinPenduduk($id)
    {
        $query = "SELECT `surat_keluar`.*, `penduduk`.*
                   FROM `surat_keluar`
                   JOIN `penduduk` ON `surat_keluar`.`nm_surat_keluar` = `penduduk`.`nik`
                   WHERE `surat_keluar`.`nm_surat_keluar` = $id
                   ";
        return $this->db->query($query)->row_array();
    }
}

<?php

class Pengajuan_track_model extends CI_Model
{
    public function insert_p_surat($data)
    {
        $query = $this->db->insert('pengajuan_surat', $data);
        if ($query) {
            return true;
            return $query;
        } else {
            return false;
        }
    }

    public function findById($id)
    {
        $query = $this->db->get_where('pengajuan_surat', ['id_pengaju' => $id])->row_array();
        return $query;
    }

    public function showById($id)
    {
        $this->db->select('*');
        $this->db->join('penduduk', 'penduduk.nik=pengajuan_surat.NIK');
        $this->db->join('surat', 'surat.id_surat=pengajuan_surat.id_surat');
        $query = $this->db->get_where('pengajuan_surat', ['id_pengaju' => $id])->row_array();
        return $query;
    }
    public function getPengajuanById($id)
    {
        $query = "SELECT `pengajuan_surat`.*, `penduduk`.* , `kelurahan`.`nm_kelurahan`
                   FROM `pengajuan_surat` 
                   JOIN `penduduk` ON `penduduk`.`nik` = `pengajuan_surat`.`nik`
                   JOIN `kelurahan` ON `kelurahan`.`id_kelurahan` = `penduduk`.`kelurahan`
                   WHERE `pengajuan_surat`.`id_pengaju` = '$id'
                   ";
        return $this->db->query($query)->row_array();
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mpegawai extends CI_Model
{

    // public function getKategori()
    // {
    //     $query = "SELECT `surat`.*, `kategori`.`nm_kategori`
    //                FROM `surat` JOIN `kategori`
    //                ON `surat`.`id_kategori` = `kategori`.`id_kategori`
    //                ";
    //     return $this->db->query($query)->result_array();
    // }

    public function joinDataSurat()
    {
        $query = "SELECT `surat`.* ,`kategori`.`nm_kategori`,`bidang`.`nm_bidang`
                    FROM `surat`
                    JOIN `kategori` ON `surat`.`id_kategori` = `kategori`.`id_kategori` 
                    JOIN `bidang` ON `surat`.`id_bidang`=`bidang`.`id`
                                    ";
        return $this->db->query($query)->result_array();
    }

    public function getSurat()
    {
        $query = "SELECT `surat_keluar`.*, `surat`.`nm_surat`
                   FROM `surat_keluar` JOIN `surat`
                   ON `surat_keluar`.`surat_id` = `surat`.`id_surat`
                   WHERE `surat_keluar`.`status` <=3    
                   ";
        return $this->db->query($query)->result_array();
    }
    public function getKelurahan()
    {
        $query = "SELECT `penduduk`.*, `kelurahan`.`nm_kelurahan`
                   FROM `penduduk`
                   JOIN `kelurahan` ON `penduduk`.`kelurahan` = `kelurahan`.`id_kelurahan`
                   ";
        return $this->db->query($query)->result_array();
    }
    public function getDataAntrian($id)
    {
        $query = "SELECT `surat_keluar`.*, `pengajuan_surat`.*
                   FROM `surat_keluar`
                   JOIN `pengajuan_surat` ON `surat_keluar`.`pengaju_id` = `pengajuan_surat`.`id`
                   WHERE `surat_keluar`.`id` = $id
                   ";
        return $this->db->query($query)->row_array();
    }


    // public function inputsubmenu($array)
    // {
    //     $this->db->insert('user_sub_menu', $array);
    // }

    // public function deleteSubmenu($id)
    // {
    //     $this->db->where('id', $id);
    //     $this->db->delete('user_sub_menu');
    // }
}

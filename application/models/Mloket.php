<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mloket extends CI_Model
{

    // public function getKategori()
    // {
    //     $query = "SELECT `surat`.*, `kategori`.`nm_kategori`
    //                FROM `surat` JOIN `kategori`
    //                ON `surat`.`id_kategori` = `kategori`.`id_kategori`
    //                ";
    //     return $this->db->query($query)->result_array();
    // }
    public function getSuratMasuk()
    {
        $query = "SELECT * FROM `surat_masuk` ORDER BY `id` DESC";
        return $this->db->query($query)->result_array();
    }
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
                   WHERE `surat_keluar`.`status` = 4
                   ";
        return $this->db->query($query)->result_array();
    }
    public function getAntri()
    {
        $query = "SELECT `pengajuan_surat`.*, `penduduk`.*,`surat`.*
                   FROM `pengajuan_surat` 
                   JOIN `penduduk` ON `penduduk`.`nik` = `pengajuan_surat`.`nik`
                   JOIN `surat` ON `surat`.`id_surat` = `pengajuan_surat`.`id_surat`
                   WHERE `pengajuan_surat`.`status` = 1
                   ORDER BY `tgl` DESC
                   ";
        return $this->db->query($query)->result_array();
    }
    public function getAntrian()
    {
        $query = "SELECT `pengajuan_surat`.*, `penduduk`.*,`surat`.*
                   FROM `pengajuan_surat` 
                   JOIN `penduduk` ON `penduduk`.`nik` = `pengajuan_surat`.`nik`
                   JOIN `surat` ON `surat`.`id_surat` = `pengajuan_surat`.`id_surat`
                   WHERE `pengajuan_surat`.`status` != 1
                   ORDER BY `tgl` DESC
                   ";
        return $this->db->query($query)->result_array();
    }

    // $this->db->select('*');
    // $this->db->from('pengajuan_surat');
    // $this->db->join('penduduk', 'penduduk.nik=pengajuan_surat.nik');
    // $this->db->join('surat', 'surat.id_surat=pengajuan_surat.id_surat');
    // $this->db->where('status =', 1);
    // $this->db->order_by("tgl", "desc");

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

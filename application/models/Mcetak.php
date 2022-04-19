<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mcetak extends CI_Model
{

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
        $query = "SELECT `pembuatan_surat`.* ,`penduduk`.*,`pengajuan_surat`.*
                    FROM `pembuatan_surat`
                    JOIN `penduduk` ON `penduduk`.`nik` = `pembuatan_surat`.`nik_pengaju` 
                    JOIN `pengajuan_surat` ON `pengajuan_surat`.`id_pengaju`=`pembuatan_surat`.`pengaju_id`
                    ORDER BY `pembuatan_surat`.`status_surat` ASC
                    ";
        return $this->db->query($query)->result_array();
    }
    public function getSuratById($id)
    {
        $query = "SELECT `pembuatan_surat`.*, `penduduk`.* , `kelurahan`.`nm_kelurahan`, `pengajuan_surat`.*
                   FROM `pembuatan_surat` 
                   JOIN `penduduk` ON `penduduk`.`nik` = `pembuatan_surat`.`nik_pengaju`
                   JOIN `kelurahan` ON `kelurahan`.`id_kelurahan` = `penduduk`.`kelurahan`
                   JOIN `pengajuan_surat` ON `pengajuan_surat`.`id_pengaju` = `pembuatan_surat`.`pengaju_id`
                   WHERE `pembuatan_surat`.`no_surat` = '$id'
                   ";
        return $this->db->query($query)->row_array();
    }

    public function getKelurahan()
    {
        $query = "SELECT `penduduk`.*, `kelurahan`.`nm_kelurahan`
                   FROM `penduduk`
                   JOIN `kelurahan` ON `penduduk`.`kelurahanaq` = `kelurahan`.`id_kelurahan`
                   ";
        return $this->db->query($query)->result_array();
    }

    public function profile()
    {
        $query = "SELECT *
                   FROM `profile`
                   where id = 1
                   ";
        return $this->db->query($query)->row_array();
    }
}

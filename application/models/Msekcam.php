<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Msekcam extends CI_Model
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
        $query = "SELECT `surat_keluar`.*, `surat`.`nm_surat`
                   FROM `surat_keluar` JOIN `surat`
                   ON `surat_keluar`.`surat_id` = `surat`.`id_surat`
                   WHERE  `status`<= 1
                   ";
        return $this->db->query($query)->result_array();
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mpegawai extends CI_Model
{

    public function getKategori()
    {
        $query = "SELECT `surat`.*, `kategori`.`id_kategori`
                   FROM `surat` JOIN `kategori`
                   ON `surat`.`id_kategori` = `kategori`.`id_kategori`
                   ";
        return $this->db->query($query)->result_array();
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
